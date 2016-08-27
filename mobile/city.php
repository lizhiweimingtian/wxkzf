<?php

/**
 * ECSHOP 首页文件
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: index.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

$sql = "select r.* from ".$ecs->table('store_shipping_region')." as ssr left join ".$ecs->table('region')." as r on ssr.city=r.region_id where ssr.city>0 group by ssr.city";
$res_region=$db->query($sql);

$zimu_city=array();
while ($row_region = $db->fetchRow($res_region))
{	
	$zimu=GetPinyin($row_region['region_name'],1);
	$zimu=strtoupper(substr($zimu,0,1));
	$zimu_city[$zimu][]=array(
		'region_id'=>$row_region['region_id'],
		'region_name' =>$row_region['region_name']
		);
}
$zimu_info = array_keys($zimu_city);
sort($zimu_info);
$smarty->assign('zimu_info', $zimu_info);

ksort($zimu_city);

$smarty->assign('zimu_city', $zimu_city);

$smarty->display('city.dwt');


?>