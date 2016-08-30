<?php
	define('IN_ECS', true);

	require(dirname(__FILE__) . '/includes/init.php');
	
	/* 载入语言文件 */
	//require(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/common.php');
	

	$smarty->display("mainright.dwt");
?>
