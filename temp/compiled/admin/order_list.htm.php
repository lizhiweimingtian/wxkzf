<?php echo $this->fetch('store_appoint_notice.htm'); ?>
<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<!-- 订单搜索 -->

<?php if ($this->_var['store_list'] || $this->_var['sub_list']): ?>
<div class="form-div">
<table cellpadding=1 cellspacing=5 width="100%">
<tr><td width="80">请选择仓库：</td>
<td id="store_main" align=left >
<a href="order.php?act=list&sid=0" <?php if ($this->_var['filter']['sid'] == '0'): ?>class="store_curr"<?php endif; ?>>全部</a>&nbsp;&nbsp;
<?php $_from = $this->_var['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
<a href="order.php?act=list&sid=<?php echo $this->_var['store']['store_id']; ?>" <?php if ($this->_var['filter']['sid'] == $this->_var['store']['store_id']): ?>class="store_curr"<?php endif; ?>><?php echo $this->_var['store']['store_name']; ?></a>&nbsp;&nbsp;
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</td>
</tr>
<?php if ($this->_var['showck']): ?>
<tr><td width="80">请选择库房：</td>
<td id="store_sub">
<a href="order.php?act=list&sid=<?php echo $this->_var['filter']['sid']; ?>&ssid=0"  <?php if ($this->_var['filter']['ssid'] == '0'): ?>class="store_curr"<?php endif; ?>>全部</a>&nbsp;&nbsp;
<?php $_from = $this->_var['sub_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sub');if (count($_from)):
    foreach ($_from AS $this->_var['sub']):
?>
<a href="order.php?act=list&sid=<?php echo $this->_var['filter']['sid']; ?>&ssid=<?php echo $this->_var['sub']['store_id']; ?>" <?php if ($this->_var['filter']['ssid'] == $this->_var['sub']['store_id']): ?>class="store_curr"<?php endif; ?> ><?php echo $this->_var['sub']['store_name']; ?></a>&nbsp;&nbsp;
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</td>
</tr>
<?php endif; ?>
</table>
</div>
<?php endif; ?>

<div class="form-div">
  <form action="javascript:searchOrder()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    <?php echo $this->_var['lang']['order_sn']; ?><input name="order_sn" type="text" id="order_sn" size="15">
    <?php echo htmlspecialchars($this->_var['lang']['consignee']); ?><input name="consignee" type="text" id="consignee" size="15">
    <?php echo $this->_var['lang']['all_status']; ?>
    <select name="status" id="status">
      <option value="-1"><?php echo $this->_var['lang']['select_please']; ?></option>
      <?php echo $this->html_options(array('options'=>$this->_var['status_list'])); ?>
    </select>
	<?php if ($this->_var['supp_list']): ?>
	<select name="suppid" id="suppid">
      <option value="-1"><?php echo $this->_var['lang']['select_please']; ?></option>
      <?php $_from = $this->_var['supp_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'supp');if (count($_from)):
    foreach ($_from AS $this->_var['supp']):
?>
	  <option value='<?php echo $this->_var['supp']['supplier_id']; ?>' <?php if ($this->_var['supp']['supplier_id'] == $_REQUEST['suppid']): ?> checked <?php endif; ?>><?php echo $this->_var['supp']['supplier_name']; ?></option>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
	<?php endif; ?>
    	<!-- 代码增加_start   By www.ecshop68.com -->
    <?php echo $this->_var['lang']['order_type']; ?>
    <select name="order_type">
    	<option value="0"><?php echo $this->_var['lang']['select_please']; ?></option>
        <option value="1"><?php echo $this->_var['lang']['normal_order']; ?></option>
        <option value="2"><?php echo $this->_var['lang']['pickup_order']; ?></option>
    </select>
	<!-- 代码增加_end   By www.ecshop68.com -->
    <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" class="button" />
    <a href="order.php?act=list&supp=<?php echo empty($_REQUEST['supp']) ? '0' : $_REQUEST['supp']; ?>&composite_status=<?php echo $this->_var['os_unconfirmed']; ?>"><?php echo $this->_var['lang']['cs'][$this->_var['os_unconfirmed']]; ?></a>
    <a href="order.php?act=list&supp=<?php echo empty($_REQUEST['supp']) ? '0' : $_REQUEST['supp']; ?>&composite_status=<?php echo $this->_var['cs_await_pay']; ?>"><?php echo $this->_var['lang']['cs'][$this->_var['cs_await_pay']]; ?></a>
    <a href="order.php?act=list&supp=<?php echo empty($_REQUEST['supp']) ? '0' : $_REQUEST['supp']; ?>&composite_status=<?php echo $this->_var['cs_await_ship']; ?>"><?php echo $this->_var['lang']['cs'][$this->_var['cs_await_ship']]; ?></a>
  </form>
</div>

<!-- 订单列表 -->
<form method="post" action="order.php?act=operate" name="listForm" onsubmit="return check()">
  <div class="list-div" id="listDiv">
<?php endif; ?>

<table cellpadding="3" cellspacing="1">
  <tr>
    <th>
      <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" /><a href="javascript:listTable.sort('order_sn', 'DESC'); "><?php echo $this->_var['lang']['order_sn']; ?></a><?php echo $this->_var['sort_order_sn']; ?>
    </th>
	<?php if ($this->_var['supp_list']): ?>
	<th><a href="javascript:listTable.sort('supplier_name', 'DESC'); ">供货商家</a><?php echo $this->_var['sort_supplier_name']; ?></th>
	<?php endif; ?>
    <!-- 代码增加_start   By www.ecshop68.com -->
    <th><?php echo $this->_var['lang']['order_type']; ?></th>
	<!-- 代码增加_end   By www.ecshop68.com -->
    <th><a href="javascript:listTable.sort('add_time', 'DESC'); "><?php echo $this->_var['lang']['order_time']; ?></a><?php echo $this->_var['sort_order_time']; ?></th>
    <th><a href="javascript:listTable.sort('consignee', 'DESC'); "><?php echo $this->_var['lang']['consignee']; ?></a><?php echo $this->_var['sort_consignee']; ?></th>
    <th><a href="javascript:listTable.sort('total_fee', 'DESC'); "><?php echo $this->_var['lang']['total_fee']; ?></a><?php echo $this->_var['sort_total_fee']; ?></th>
    <th><a href="javascript:listTable.sort('order_amount', 'DESC'); "><?php echo $this->_var['lang']['order_amount']; ?></a><?php echo $this->_var['sort_order_amount']; ?></th>
	<th>订单来源</th>
    <th><?php echo $this->_var['lang']['all_status']; ?></th>
    <th><?php echo $this->_var['lang']['handler']; ?></th>
  <tr>
  <?php $_from = $this->_var['order_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('okey', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['okey'] => $this->_var['order']):
?>
  <tr>
    <td valign="top" nowrap="nowrap"><input type="checkbox" name="checkboxes" value="<?php echo $this->_var['order']['order_sn']; ?>" /><a href="order.php?act=info&order_id=<?php echo $this->_var['order']['order_id']; ?>" id="order_<?php echo $this->_var['okey']; ?>"><?php echo $this->_var['order']['order_sn']; ?><?php if ($this->_var['order']['extension_code'] == "group_buy"): ?><br /><div align="center"><?php echo $this->_var['lang']['group_buy']; ?></div><?php elseif ($this->_var['order']['extension_code'] == "exchange_goods"): ?><br /><div align="center"><?php echo $this->_var['lang']['exchange_goods']; ?></div><?php endif; ?></a></td>
	<?php if ($this->_var['supp_list']): ?>
	<td><?php echo htmlspecialchars($this->_var['order']['supplier_name']); ?></td>
	<?php endif; ?>
    <!-- 代码增加_start   By www.ecshop68.com -->
	<td><?php if ($this->_var['order']['is_pickup'] == 1): ?><?php echo $this->_var['lang']['pickup_order']; ?><?php else: ?><?php echo $this->_var['lang']['normal_order']; ?><?php endif; ?></td>
	<!-- 代码增加_end   By www.ecshop68.com -->
    <td><?php echo htmlspecialchars($this->_var['order']['buyer']); ?><br /><?php echo $this->_var['order']['short_order_time']; ?></td>
    <td align="left" valign="top"><a href="mailto:<?php echo $this->_var['order']['email']; ?>"> <?php echo htmlspecialchars($this->_var['order']['consignee']); ?></a><?php if ($this->_var['order']['tel']): ?> [TEL: <?php echo htmlspecialchars($this->_var['order']['tel']); ?>]<?php endif; ?> <br /><?php echo htmlspecialchars($this->_var['order']['address']); ?></td>
    <td align="right" valign="top" nowrap="nowrap"><?php echo $this->_var['order']['formated_total_fee']; ?></td>
    <td align="right" valign="top" nowrap="nowrap"><?php echo $this->_var['order']['formated_order_amount']; ?></td>
	<td align="right" valign="top" nowrap="nowrap"><?php echo $this->_var['order']['froms']; ?></td>
    <td align="center" valign="top" nowrap="nowrap"><?php echo $this->_var['lang']['os']['\$order']['order_status']; ?>,<?php echo $this->_var['lang']['ps']['\$order']['pay_status']; ?>,<?php echo $this->_var['lang']['ss']['\$order']['shipping_status']; ?></td>
    <td align="center" valign="top"  nowrap="nowrap">
     <a href="order.php?act=info&order_id=<?php echo $this->_var['order']['order_id']; ?>"><?php echo $this->_var['lang']['detail']; ?></a>
     <?php if ($this->_var['order']['can_remove']): ?>
     <br /><a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['order']['order_id']; ?>, remove_confirm, 'remove_order')"><?php echo $this->_var['lang']['remove']; ?></a>
     <?php endif; ?>
     <?php if ($this->_var['order']['tuihuan']): ?>
     <br /><span style="color:#F00">(有退款/退货或维修申请)</span>
     <?php endif; ?>
    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>

<!-- 分页 -->
<table id="page-table" cellspacing="0">
  <tr>
    <td align="right" nowrap="true">
    <?php echo $this->fetch('page.htm'); ?>
    </td>
  </tr>
</table>

<?php if ($this->_var['full_page']): ?>
  </div>
  <div>
    <input name="confirm" type="submit" id="btnSubmit" value="<?php echo $this->_var['lang']['op_confirm']; ?>" class="button" disabled="true" onclick="this.form.target = '_self'" />
    <input name="invalid" type="submit" id="btnSubmit1" value="<?php echo $this->_var['lang']['op_invalid']; ?>" class="button" disabled="true" onclick="this.form.target = '_self'" />
    <input name="cancel" type="submit" id="btnSubmit2" value="<?php echo $this->_var['lang']['op_cancel']; ?>" class="button" disabled="true" onclick="this.form.target = '_self'" />
    <input name="remove" type="submit" id="btnSubmit3" value="<?php echo $this->_var['lang']['remove']; ?>" class="button" disabled="true" onclick="this.form.target = '_self'" />
    <input name="print" type="submit" id="btnSubmit4" value="<?php echo $this->_var['lang']['print_order']; ?>" class="button" disabled="true" onclick="this.form.target = '_blank'" />
	<?php if ($_GET['supp'] == 0): ?>
	<input name="stock" type="button" id="btnSubmit4" value="指派订单" class="button" onclick="showDiv('listForm')" />
	<?php endif; ?>
    <input name="batch" type="hidden" value="1" />
	<input type="hidden" value="operate"  name="act">
    <input name="order_id" type="hidden" value="" />
  </div>
</form>
<script language="JavaScript">
listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


    onload = function()
    {
        // 开始检查订单
        startCheckOrder();
    }

    /**
     * 搜索订单
     */
    function searchOrder()
    {
        listTable.filter['order_sn'] = Utils.trim(document.forms['searchForm'].elements['order_sn'].value);
        listTable.filter['consignee'] = Utils.trim(document.forms['searchForm'].elements['consignee'].value);
        listTable.filter['composite_status'] = document.forms['searchForm'].elements['status'].value;
		<?php if ($this->_var['supp_list']): ?>
		listTable.filter['suppid'] = document.forms['searchForm'].elements['suppid'].value;
		<?php endif; ?>
		<!-- 代码增加_start   By www.ecshop68.com -->
		listTable.filter['order_type'] = document.forms['searchForm'].elements['order_type'].value;
		<!-- 代码增加_end   By www.ecshop68.com -->
        listTable.filter['page'] = 1;
        listTable.loadList();
    }

    function check()
    {
      var snArray = new Array();
      var eles = document.forms['listForm'].elements;
      for (var i=0; i<eles.length; i++)
      {
        if (eles[i].tagName == 'INPUT' && eles[i].type == 'checkbox' && eles[i].checked && eles[i].value != 'on')
        {
          snArray.push(eles[i].value);
        }
      }
      if (snArray.length == 0)
      {
        return false;
      }
      else
      {
        eles['order_id'].value = snArray.toString();
        return true;
      }
    }
    /**
     * 显示订单商品及缩图
     */
    var show_goods_layer = 'order_goods_layer';
    var goods_hash_table = new Object;
    var timer = new Object;

    /**
     * 绑定订单号事件
     *
     * @return void
     */
    function bind_order_event()
    {
        var order_seq = 0;
        while(true)
        {
            var order_sn = Utils.$('order_'+order_seq);
            if (order_sn)
            {
                order_sn.onmouseover = function(e)
                {
                    try
                    {
                        window.clearTimeout(timer);
                    }
                    catch(e)
                    {
                    }
                    var order_id = Utils.request(this.href, 'order_id');
                    show_order_goods(e, order_id, show_goods_layer);
                }
                order_sn.onmouseout = function(e)
                {
                    hide_order_goods(show_goods_layer)
                }
                order_seq++;
            }
            else
            {
                break;
            }
        }
    }
    listTable.listCallback = function(result, txt) 
    {
        if (result.error > 0) 
        {
            alert(result.message);
        }
        else 
        {
            try 
            {
                document.getElementById('listDiv').innerHTML = result.content;
                bind_order_event();
                if (typeof result.filter == "object") 
                {
                    listTable.filter = result.filter;
                }
                listTable.pageCount = result.page_count;
            }
            catch(e)
            {
                alert(e.message);
            }
        }
    }
    /**
     * 浏览器兼容式绑定Onload事件
     *
     */
    if (Browser.isIE)
    {
        window.attachEvent("onload", bind_order_event);
    }
    else
    {
        window.addEventListener("load", bind_order_event, false);
    }

    /**
     * 建立订单商品显示层
     *
     * @return void
     */
    function create_goods_layer(id)
    {
        if (!Utils.$(id))
        {
            var n_div = document.createElement('DIV');
            n_div.id = id;
            n_div.className = 'order-goods';
            document.body.appendChild(n_div);
            Utils.$(id).onmouseover = function()
            {
                window.clearTimeout(window.timer);
            }
            Utils.$(id).onmouseout = function()
            {
                hide_order_goods(id);
            }
        }
        else
        {
            Utils.$(id).style.display = '';
        }
    }

    /**
     * 显示订单商品数据
     *
     * @return void
     */
    function show_order_goods(e, order_id, layer_id)
    {
        create_goods_layer(layer_id);
        $layer_id = Utils.$(layer_id);
        $layer_id.style.top = (Utils.y(e) + 12) + 'px';
        $layer_id.style.left = (Utils.x(e) + 12) + 'px';
        if (typeof(goods_hash_table[order_id]) == 'object')
        {
            response_goods_info(goods_hash_table[order_id]);
        }
        else
        {
            $layer_id.innerHTML = loading;
            Ajax.call('order.php?is_ajax=1&act=get_goods_info&order_id='+order_id, '', response_goods_info , 'POST', 'JSON');
        }
    }

    /**
     * 隐藏订单商品
     *
     * @return void
     */
    function hide_order_goods(layer_id)
    {
        $layer_id = Utils.$(layer_id);
        window.timer = window.setTimeout('$layer_id.style.display = "none"', 500);
    }

    /**
     * 处理订单商品的Callback
     *
     * @return void
     */
    function response_goods_info(result)
    {
        if (result.error > 0)
        {
            alert(result.message);
            hide_order_goods(show_goods_layer);
            return;
        }
        if (typeof(goods_hash_table[result.content[0].order_id]) == 'undefined')
        {
            goods_hash_table[result.content[0].order_id] = result;
        }
        Utils.$(show_goods_layer).innerHTML = result.content[0].str;
    }
</script>


<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>