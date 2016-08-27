<?php
	 
	define('IN_ECS', true);
	
	require ( './init.php');
	/* 载入语言文件 */
require_once (ROOT_PATH . 'languages/' . $_CFG['lang'] . '/user.php');

$user_id = $_SESSION['user_id'];
	
	function chakanziliao()
	{
		//获取全局变量
		$user = $GLOBALS['user'];
		$_CFG = $GLOBALS['_CFG'];
		$_LANG = $GLOBALS['_LANG'];
		$smarty = $GLOBALS['smarty'];
		$db = $GLOBALS['db'];
		$ecs = $GLOBALS['ecs'];
		$user_id = $_SESSION['user_id'];
		
		
		$sql = "select * from " . $ecs->table('users') . " where user_id='" . $user_id . "'";
		$username = $db->getALL($sql);
		//var_dump($username);
		$smarty->assign('info',$username);
		$smarty->display("lib_zlck.dwt");
	}
	
	
	chakanziliao();




?>