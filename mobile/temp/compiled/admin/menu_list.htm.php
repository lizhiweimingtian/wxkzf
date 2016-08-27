 <?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<div class="list-div" id="listDiv">
<?php endif; ?>
<form name="theForm" action="menu.php" enctype="multipart/form-data" method="post">
<table cellpadding="3" cellspacing="1">
  <tr>
    <th width="10%">编号</th>
	<th width="20%">菜单名称</th>
    <th width="20%">菜单图片</th>
    <th width="20%">链接地址</th>
    <th width="10%">排序</th>
    <th width="20%">操作</th>
  </tr>
   <?php $_from = $this->_var['menu_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
  <tr>
    <td align="center"><?php echo $this->_var['list']['id']; ?></td>
    <td align="center"><?php echo $this->_var['list']['menu_name']; ?></td>
    <td align="center"><img src="../<?php echo $this->_var['list']['menu_img']; ?>" width="100" height="100" style="border:none"/></td>
    <td align="center"><?php echo $this->_var['list']['menu_url']; ?></td>
    <td align="center"><?php echo $this->_var['list']['sort']; ?></td>
    <td align="center">
    <a href="menu.php?act=edit&id=<?php echo $this->_var['list']['id']; ?>"><img src="../images/icon_edit.gif" style="border:none" alt="编辑"/></a>
    <a href="menu.php?act=delete&id=<?php echo $this->_var['list']['id']; ?>"><img src="../images/icon_drop.gif" style="border:none" alt="删除"/></a>
    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>
</form>
<?php if ($this->_var['full_page']): ?>
</div>

<script type="text/javascript" language="JavaScript">
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
  
  
  
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>