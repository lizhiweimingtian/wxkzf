<script>
;(function($){
	Zepto(function($){
		init_swipe();
		$.zcontent.add_success(init_swipe);
	})
	function init_swipe()
	{
		<?php $_from = $this->_var['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('scr_key', 'item_0_06856700_1442451263');if (count($_from)):
    foreach ($_from AS $this->_var['scr_key'] => $this->_var['item_0_06856700_1442451263']):
?>
		$('#store_list_<?php echo $this->_var['scr_key']; ?>').swipeLeft(function()
		{
			$('#store_list_<?php echo $this->_var['scr_key']; ?>').slideLeftOut(200,function(){
				$('#store_list_<?php if ($this->_var['scr_key'] >= $this->_var['store_list_count']): ?>1<?php else: ?><?php echo ($this->_var['scr_key']+1); ?><?php endif; ?>').slideLeftIn(200);
			});
		});
		$('#store_list_<?php echo $this->_var['scr_key']; ?>').swipeRight(function()
		{
			$('#store_list_<?php echo $this->_var['scr_key']; ?>').slideRightOut(200,function(){
				$('#store_list_<?php if ($this->_var['scr_key'] <= 1): ?><?php echo $this->_var['store_list_count']; ?><?php else: ?><?php echo ($this->_var['scr_key']-1); ?><?php endif; ?>').slideRightIn(200);
			});
		});
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		<?php $_from = $this->_var['sub_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('scr_key', 'item_0_06904000_1442451263');if (count($_from)):
    foreach ($_from AS $this->_var['scr_key'] => $this->_var['item_0_06904000_1442451263']):
?>
		$('#sub_list_<?php echo $this->_var['scr_key']; ?>').swipeLeft(function()
		{
			$('#sub_list_<?php echo $this->_var['scr_key']; ?>').slideLeftOut(200,function(){
				$('#sub_list_<?php if ($this->_var['scr_key'] >= $this->_var['sub_list_count']): ?>1<?php else: ?><?php echo ($this->_var['scr_key']+1); ?><?php endif; ?>').slideLeftIn(200);
			});
		});
		$('#sub_list_<?php echo $this->_var['scr_key']; ?>').swipeRight(function()
		{
			$('#sub_list_<?php echo $this->_var['scr_key']; ?>').slideRightOut(200,function(){
				$('#sub_list_<?php if ($this->_var['scr_key'] <= 1): ?><?php echo $this->_var['sub_list_count']; ?><?php else: ?><?php echo ($this->_var['scr_key']-1); ?><?php endif; ?>').slideRightIn(200);
			});
		});
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
}
})(Zepto)

function show_store_list()
{
	$('#store_menu_list').slideLeftOut(200,function(){$('#store_list_1').slideLeftIn(200)});
}
function show_sub_list()
{
	$('#store_menu_list').slideLeftOut(200,function(){$('#sub_list_1').slideLeftIn(200)});
}
function change_sid(sid)
{
	$.zcontent.set('sid',sid);
	search();
}

function change_ssid(ssid)
{
	$.zcontent.set('ssid',ssid);
	search();
}
</script>
<ul class="order_type_con" id='store_menu_list'>
<?php if ($this->_var['sel_store']['store_id'] > 0): ?>
<li class='curr'><a href='javascript:void(0);' onclick='show_store_list();'><?php echo $this->_var['sel_store']['store_name']; ?></a></li>
<?php else: ?>
<li><a href='javascript:void(0);' onclick='show_store_list();' ><?php echo $this->_var['sel_store']['store_name']; ?></a></li>
<?php endif; ?>
<?php if ($this->_var['showck']): ?>
<?php if ($this->_var['sel_sub']['store_id'] > 0): ?>
<li class='curr'><a href='javascript:void(0);' onclick='show_sub_list();'> <?php echo $this->_var['sel_sub']['store_name']; ?></a></li>
<?php else: ?>
<li><a href='javascript:void(0);' onclick='show_sub_list();' > <?php echo $this->_var['sel_sub']['store_name']; ?></a></li>
<?php endif; ?>
<?php endif; ?>
</ul>
<?php $_from = $this->_var['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('scr_key', 'screen');if (count($_from)):
    foreach ($_from AS $this->_var['scr_key'] => $this->_var['screen']):
?>
<ul class="order_type_con" id='store_list_<?php echo $this->_var['scr_key']; ?>' style='display:none;'>
<?php $_from = $this->_var['screen']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_06989000_1442451263');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_06989000_1442451263']):
?>
<li ><a href='javascript:void(0);' onclick="change_sid(<?php echo $this->_var['item_0_06989000_1442451263']['store_id']; ?>)"><?php echo $this->_var['item_0_06989000_1442451263']['store_name']; ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php $_from = $this->_var['sub_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('scr_key', 'screen');if (count($_from)):
    foreach ($_from AS $this->_var['scr_key'] => $this->_var['screen']):
?>
<ul class="order_type_con" id='sub_list_<?php echo $this->_var['scr_key']; ?>' style='display:none;'>
<?php $_from = $this->_var['screen']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_07016100_1442451263');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_07016100_1442451263']):
?>
<li ><a href='javascript:void(0);' onclick="change_ssid(<?php echo $this->_var['item_0_07016100_1442451263']['store_id']; ?>)"><?php echo $this->_var['item_0_07016100_1442451263']['store_name']; ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>