<?php

/**
 * 切换城市，首页商品发生变化(yangsong)
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

//echo "<pre>";
//print_r($_COOKIE);

$stock_info = address_to_store();
//echo "<pre>";
//print_r($stock_info);



//根据城市获取所有仓库
function address_to_store(){
	$_COOKIE['region_3'] = 0;//把第三级设置成空
	$_COOKIE['region_4'] = 0;//把第四级设置成空
	$address = cookie_to_str();//组织地址
	$stockArray = get_address_by_store($address);//查询地址对应哪些仓库
	$goodsIds = get_index_goods($stockArray);//获取仓库下的所有商品id
	return $goodsIds;
}

//获取商品信息
function get_index_goods($stockInfo){
	global $db,$ecs;
	$stockInfo = array_unique($stockInfo);
	$sql = "select DISTINCT(s.goods_id) from ". $ecs->table('store_goods_stock')." AS s left join ".$ecs->table('store_main') .
				"AS m on s.store_id=m.store_id where m.parent_id in (".implode(',',$stockInfo).") and s.store_number>0 ";
	$goods_list_s = $db->getColCached($sql);
	return get_index_goods_info($goods_list_s);
}

//根据商品id获取商品详细信息
function get_index_goods_info($goodsIds){
	global $db,$ecs;
	$sql = 'SELECT g.goods_id, g.goods_name, g.goods_name_style, g.click_count, g.market_price, g.is_new, g.is_best, g.is_hot, g.shop_price AS org_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, g.promote_price, g.goods_type, " .
                'g.promote_start_date, g.promote_end_date, g.goods_brief, g.goods_thumb , g.goods_img, c.cat_name ' .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('member_price') . ' AS mp ' .
            "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' " .
		"left join ".$GLOBALS['ecs']->table('category')." as c on g.cat_id=c.cat_id " .
			" where g.goods_id in(".implode(',',$goodsIds).")";
	$query = $db->query($sql);
	$ret = array();
	while($row = $db->fetchRow($query)){
		$ret[$row['cat_id']][$row['goods_id']] = $row;
	}
	return $ret;
}



/*------------------------------------------------------ */
//-- 判断是否存在缓存，如果存在则调用缓存，反之读取相应内容
/*------------------------------------------------------ */
/* 缓存编号 */
$cache_id = sprintf('%X', crc32($_SESSION['user_rank'] . '-' . $_CFG['lang']));

if (!$smarty->is_cached('index2.dwt', $cache_id))
{
    assign_template();

    
    /* 页面中的动态内容 */
    assign_dynamic('index2');
}

$smarty->display('index2.dwt', $cache_id);


?>