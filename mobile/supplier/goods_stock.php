<?php
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'includes/lib_order.php');
require_once(ROOT_PATH . 'includes/lib_store.php');
require_once(ROOT_PATH . 'includes/lib_supplier_common_wap.php');
$act = empty($_REQUEST['act'])?'list':trim($_REQUEST['act']);
//库存查询
if($act == 'list')
{
	admin_priv('store_inout_goods');
    $data = get_inoutgoods_list();
    $goods = $data['arr'];
	
    $filter = $data['filter'];
	$sel_sid = $filter['sid'];
	$sel_ssid = $filter['ssid'];
	assign_store_list($sel_sid);
	assign_sub_list($sel_ssid);
    $smarty->assign('goods',$goods);
    $smarty->assign('filter',$filter);
    _wap_assign_header_info('库存列表');
    _wap_assign_footer_order_info();
    _wap_display_page('goods_stock_list.htm');
}

function get_inoutgoods_list()
{
    $result = get_filter();
    if ($result === false)
    {
        $filter = array();
        $filter['sid']    = empty($_REQUEST['sid']) ? '0' : intval($_REQUEST['sid']);
		$filter['ssid']    = empty($_REQUEST['ssid']) ? '0' : intval($_REQUEST['ssid']);
		$filter['inout_mode']    = empty($_REQUEST['inout_mode']) ? '0' : intval($_REQUEST['inout_mode']);
		$filter['inout_type']    = empty($_REQUEST['inout_type']) ? '0' : intval($_REQUEST['inout_type']);
		$filter['add_time1']    = empty($_REQUEST['add_time1']) ? '' : (strpos($_REQUEST['add_time1'], '-') > 0 ?  local_strtotime($_REQUEST['add_time1']) : $_REQUEST['add_time1']);
		$filter['add_time2']    = empty($_REQUEST['add_time2']) ? '' : (strpos($_REQUEST['add_time2'], '-') > 0 ?  local_strtotime($_REQUEST['add_time2']) : $_REQUEST['add_time2']);
		$filter['brand']    = empty($_REQUEST['brand']) ? '0' : intval($_REQUEST['brand']);
		$filter['goods_sn']    = empty($_REQUEST['goods_sn']) ? '' : trim($_REQUEST['goods_sn']);
		$filter['goods_name']    = empty($_REQUEST['goods_name']) ? '' : trim($_REQUEST['goods_name']);
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'b.book_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

        $where = ' AND b.supplier_id='.$_SESSION['supplier_id'];
        if ($filter['ssid'])
        {
            $where .= " AND l.store_id = '" . $filter['ssid']."' ";
        }
		else
		{
			if ($filter['sid'])
			{
				$where .= " AND l.store_id in " . get_ssid_list($filter['sid']);
			}
		}	
		if ($filter['inout_type'])
		{
			$where .= " AND l.inout_type = '" . $filter['inout_type']."' ";
		}
		if ($filter['add_time1'])
		{
			$where .= " AND l.add_time>=  '" . $filter['add_time1']."' ";
		}
		if ($filter['add_time2'])
		{
			$where .= " AND l.add_time<=  '" . $filter['add_time2']."' ";
		}
		if ($filter['inout_mode'])
		{
			$where .= " AND b.inout_mode = '" . $filter['inout_mode']."' ";
		}
		if ($filter['goods_sn'])
		{
			$where .= " AND g.goods_sn = '" . $filter['goods_sn']."' ";
		}
		if ($filter['goods_name'])
		{
			$where .= " AND g.goods_name like '%" . $filter['goods_name']."%' ";
		}
		if ($filter['brand'])
		{
			$where .= " AND g.brand_id = '" . $filter['brand']."' ";
		}
		

        /* 总数 */
        $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('store_inout_xushibu'). ' AS b '.
			   ' left join '.  $GLOBALS['ecs']->table('store_inout_list') .' AS l on b.inout_rec_id=l.rec_id  '.
				 ' left join '. $GLOBALS['ecs']->table('goods') .' AS g on b.goods_id = g.goods_id '.
               ' WHERE 1 ' .$where;
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        $filter = page_and_size($filter);

        /* 获取入库单数据 */
        $sql = 'SELECT b.book_id, b.attr_value, b.inout_mode, b.number_shishou, b.number_stock, g.goods_id, '.
				'g.goods_name, g.goods_sn, g.goods_thumb, l.store_id, l.inout_sn, l.order_sn, l.inout_type, l.takegoods_man, l.add_time  '.
               'FROM ' .$GLOBALS['ecs']->table('store_inout_xushibu'). ' AS b '.
				' left join '.  $GLOBALS['ecs']->table('store_inout_list') .' AS l on b.inout_rec_id=l.rec_id  '.
			   ' left join '. $GLOBALS['ecs']->table('goods') .' AS g on b.goods_id=g.goods_id '.
               ' WHERE 1 ' .$where. ' ORDER by '.$filter['sort_by'].' '.$filter['sort_order'];

        $filter['keyword'] = stripslashes($filter['keyword']);
        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $arr = array();
    $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);

    while ($rows = $GLOBALS['db']->fetchRow($res))
    {
		$rows['store_name'] = get_store_fullname($rows['store_id']);
		$rows['goods_attr_name'] = get_attr_name($rows['attr_value']);
        $rows['add_time'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);
		$rows['goods_thumb'] = get_image_path($rows['goods_id'], $rows['goods_thumb'], true);
		$rows['inout_type_name'] =get_inout_type_name($rows['inout_type']);
        $arr[] = $rows;
    }
    return array('arr' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}

