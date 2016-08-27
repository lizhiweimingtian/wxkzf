<?php

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}
/**
* 以下配置是多城市多仓库配置信息，请务轻易修改，后果自负!
**/

$province	= 10;//初始省id  必填
$city		= 145;//初始市id  必填
$district		= 1195;//初始县id  可选
$xiangcun		= 3415;//初始区，街道id 可选

/*以上四个值，可选的值可标记为空或者零，但不可在前面注释*/

//如果已经选择过城市
if(isset($_COOKIE['region_select']) && !empty($_COOKIE['region_select'])){
	$s = explode(',',$_COOKIE['region_select']);
	$province	=  $s[0];
	$city		= $s[1];
	$district		= isset($s[2]) ? $s[2] : 0;
	$xiangcun		= isset($s[3]) ? $s[3] : 0;
}



/*以下代码不可去掉，如果去掉，后果自负*/
$_REQUEST['province']	= (isset($_COOKIE['region_1'])) ? intval($_COOKIE['region_1']) : $province;
$_REQUEST['city'] 		= (isset($_COOKIE['region_2'])) ? intval($_COOKIE['region_2']) : $city;
$_REQUEST['district'] 	= (isset($_COOKIE['region_3'])) ? intval($_COOKIE['region_3']) : $district;
$_REQUEST['xiangcun'] 	= (isset($_COOKIE['region_4'])) ? intval($_COOKIE['region_4']) : $xiangcun;

$_REQUEST['datainfo'] = array(1=>'province',2=>'city',3=>'district',4=>'xiangcun');//ecs_store_shipping_region表中地区的字段名子

foreach($_REQUEST['datainfo'] as $k=>$v){
	setcookie('region_'.$k,$_REQUEST[$v]);
	$_COOKIE['region_'.$k] = $_REQUEST[$v];
}

?>