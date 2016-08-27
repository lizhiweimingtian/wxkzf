<?php
define('IN_ECS', true);
require (dirname(__FILE__) . '/includes/init.php');
$action = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'tm';
$function_name = 'action_' . $action;

if(! function_exists($function_name))
{
	$function_name = "action_tm";
}

call_user_func($function_name);

function action_tm($param) {
	die('团队管理');
}
function action_cnf($param) {
	die('配置管理');
}
function action_um($param) {
	die('用户管理');
}
function action_mn($param) {
	die('财务管理');
}