<?php

/**
 * 管理中心 仓库返佣管理
 * $Author: yangsong
 * 
 */

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

//获取本系统中货到付款的支付id
function getPayHoudaofukuan(){
	global $db,$ecs;

	return $db->getOne('select pay_id from '.$ecs->table('payment').' where is_cod=1 and is_pickup=0');
}

//判断佣金信息是否存在
function rebateHave($rid){
	global $ecs,$db;
	$sql = "SELECT r.*, s.store_name, smr.* FROM " . $ecs->table('store_rebate') . " AS r left join ". $ecs->table('store_main'). 
		      "  AS s on r.store_id=s.store_id left join ".$ecs->table('store_main_rebate')." as smr on s.store_id=smr.store_id WHERE r.rebate_id = '$rid'";
    $rebate = $db->getRow($sql);
	return empty($rebate) ? false : $rebate;
}

//计算时间
function datecha($times){
	$i = 0;
	$tj = true;
	$nowtime = gmtime();
	while ($tj){
		if($times <= ($nowtime+$i*3600*24)){
			$tj=false;
		}else{
			$i++;
		}
	}
	return $i;
}

//佣金状态
function rebateStatus($status=-1){
	$status_info = array(0=>'冻结',1=>'可结算',2=>'等待商家确认',3=>'等待平台付款',4=>'结算完成');
	if(array_key_exists($status,$status_info)){
		return $status_info[$status];
	}else{
		return $status_info;
	}
}

//判断当前登陆人是不是有仓库确认结算权限
function haveDoQueRen($store_id,$supplier_user_id,$supplier_id=0){
	global $db,$ecs;
	$sql = "select count(rec_id) from ".$ecs->table('store_adminer')." where admin_id=".$supplier_user_id." and store_id=".$store_id." and supplier_id=".$supplier_id;
	$num = $db->getOne($sql);
	return ($num>0) ? true : false;
}

//根据佣金状态返回操作事件
function getRebateDo($status,$rid,$act){
	$do_info = array(
		'list'=>array(//佣金列表页
			0=>array(
				array('name'=>'查看明细','url'=>'supplier_store_order.php?act=view&rid='.$rid)
			),
			1=>array(
				array('name'=>'发起明细','url'=>'supplier_store_rebate.php?act=view&rid='.$rid),
				array('name'=>'查看明细','url'=>'supplier_store_order.php?act=view&rid='.$rid)
			),
			2=>array(
				array('name'=>'查看结算单','url'=>'supplier_store_rebate.php?act=view&rid='.$rid),
				array('name'=>'查看明细','url'=>'supplier_store_order.php?act=view&rid='.$rid)
			),
			3=>array(
				array('name'=>'查看结算单','url'=>'supplier_store_rebate.php?act=view&rid='.$rid),
				array('name'=>'查看明细','url'=>'supplier_store_order.php?act=view&rid='.$rid)
			),
			4=>array(
				array('name'=>'查看结算单','url'=>'supplier_store_rebate.php?act=view&rid='.$rid),
				array('name'=>'查看明细','url'=>'supplier_store_order.php?act=view&rid='.$rid)
			)
		),
		'view'=>array(//查看佣金明细页
			0=>array(
				array('name'=>'结算佣金','url'=>'')
			),
			1=>array(
				array('name'=>'撤销全部佣金','url'=>'')
			),
			2=>array(
				array('name'=>'查看结算单','url'=>'#'),
				array('name'=>'查看明细','url'=>'#')
			),
			3=>array(
				array('name'=>'查看结算单','url'=>'#'),
				array('name'=>'查看明细','url'=>'#')
			)
		),
		'rebate_view'=>array(//发起结算佣金明细页
			1=>array(
				array('name'=>'发起结算','type'=>'submit','act'=>'update','text'=>'')
			),
			2=>array(
				array('name'=>'取消发起结算','type'=>'submit','act'=>'cancel','text'=>'等待商家确认')
			),
			3=>array(
				array('name'=>'结算完成','type'=>'submit','act'=>'finish','text'=>'')
			),
			4=>array(
				array('name'=>'确认添加','type'=>'submit','act'=>'beizhu','text'=>'')
			)
		)
	);
	return $do_info[$act][$status];
}
//生成编号
function createSign($rid,$suppid){
	return $suppid.sprintf("%07s", $rid);
}

//获取佣金中相关的退换货的订单
function getBackOrderByRebate($rid){
	global $ecs,$db;
	$sql = "select oi.order_id,bo.back_type from ".$ecs->table('order_info')." as oi right join ".$ecs->table('back_order')." as bo on oi.order_id=bo.order_id and bo.status_back < 6 where oi.store_rebate_id=".$rid;
	$query = $db->query($sql);
	$ret = array();
	while($row = $db->fetchRow($query)){
		if($row['back_type']!=3){
			//排除维修的订单
			$ret[] = $row['order_id'];
		}
	}
	return (empty($ret)) ? false : $ret;
}

//获取相关佣金所有订单金额
function getRebateOrderMoney($rid){
	global $ecs,$db;

	$back_and = '';
	if(($back_order_id = getBackOrderByRebate($rid)) != false){
		//获取退货订单中相关订单
		$back_and = "and order_id not in(".implode(',',$back_order_id).")";
	}
	$pay_id = getPayHoudaofukuan();//获取货到付款的id
	$sql = "select (" . order_amount_field() . ") AS total_fee,pay_id,order_id from ".$ecs->table('order_info')." where store_rebate_id=".$rid." $back_and and store_rebate_ispay=2";
	$query = $db->query($sql);
	$online = $online_rebate = $onout = $onout_rebate = 0;
	$online_ids = $onout_ids = array();
	while($row = $db->fetchRow($query)){
		if($row['pay_id'] == $pay_id){
			//货到付款
			$onout += $row['total_fee'];
			$onout_rebate += getGoodsOrderRebatePrice($row['order_id']);
			$onout_ids[] = $row['order_id'];
		}else{
			//在线支付
			$online += $row['total_fee'];
			$online_rebate += getGoodsOrderRebatePrice($row['order_id']);
			$online_ids[] = $row['order_id'];
		}
	}
	if(count($onout_ids)>0){
		//货到付款订单当中有商品发生的退货
		$sql = "select (goods_price * is_back) as price_out from ".$ecs->table('order_goods')." where order_id in(".implode(',',$onout_ids).")";
		$out_price = $db->getOne($sql);
		$onout = $onout - $out_price;
	}
	if(count($online_ids)>0){
		//在线支付订单当中有商品发生退货
		$sql = "select (goods_price * is_back) as price_out from ".$ecs->table('order_goods')." where order_id in(".implode(',',$online_ids).")";
		$line_price = $db->getOne($sql);
		$online = $online - $line_price;
	}
	return array('all'=>array('online'=>$online,'onout'=>$onout),'rebate'=>array('online'=>$online_rebate,'onout'=>$onout_rebate));
}

//计算佣金对应的时间范围内所产生的订单涉及到的商品的所有分销商(仓库)的佣金总和
function getGoodsRbatePrice($rid){
	global $ecs,$db;

	$sql = "select g.user_rebate_price,og.goods_number,og.is_back from ".$ecs->table('order_info')." as oi,".$ecs->table('order_goods')." as og,".$ecs->table('goods')." as g ".
			" where oi.store_rebate_id=".$rid." and oi.store_rebate_ispay=2 and oi.order_id=og.order_id and og.goods_id=g.goods_id";
	$query = $db->query($sql);
	$retPrice = 0;
	while($row = $db->fetchRow($query)){
		$retPrice += $row['user_rebate_price'] * ($row['goods_number'] - $row['is_back']);//去掉发生退货商品数量后的总钱数
	}
	return $retPrice;
	//return $db->getOne($sql);
}

//订单涉及到的商品的所有分销商(仓库)的佣金总和
function getGoodsOrderRebatePrice($orderid){
	global $ecs,$db;

	$sql = "select g.user_rebate_price,og.goods_number,og.is_back from ".$ecs->table('order_info')." as oi,".$ecs->table('order_goods')." as og,".$ecs->table('goods')." as g ".
			" where oi.order_id=".$orderid." and oi.order_id=og.order_id and og.goods_id=g.goods_id";
	$query = $db->query($sql);
	$retPrice = 0;
	while($row = $db->fetchRow($query)){
		$retPrice += $row['user_rebate_price'] * ($row['goods_number'] - $row['is_back']);//去掉发生退货商品数量后的总钱数
	}
	return $retPrice;
	//return $db->getOne($sql);
}

//查看当前登陆人，是否有仓库管理权限
function havePower($userid){
	global $db,$ecs;

	$sql = "select sa.store_id from ".$ecs->table('store_adminer')." as sa,".$ecs->table('store_main')." as sm where sa.admin_id=".$userid." and sm.parent_id=0 and sa.store_id=sm.store_id";
	$query = $db->query($sql);
	$ret = array();
	while($row = $db->fetchRow($query)){
		$ret[] = $row['store_id'];
	}

	return (empty($ret)) ? false : $ret;
}

//查看当前登陆人，是不是本店铺的创始人(超级管理员)
function isSupplierAdminUser(){
	if(isset($_SESSION['supplier_admin_id']) && $_SESSION['supplier_action_list'] == 'all'){
		return true;
	}
	return false;
}

//查看当前登陆人，是不是平台的创始人(超级管理员)
function isAdminUser(){
	if(isset($_SESSION['action_list']) && $_SESSION['action_list'] == 'all'){
		return true;
	}
	return false;
}

?>