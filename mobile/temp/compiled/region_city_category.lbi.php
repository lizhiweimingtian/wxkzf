<div id="quyutanchu" class='zitidian_div ' style="display:none">
<div id="quyutanchu_con">
<div class='f_bg ub'>
     
	<div class='quyutanchu quyutanchu_left'>
		 <!-- <div id='left_change0' class='select district' onClick=setTabQuyu('left_change',0)>附近</div>-->
		  <?php $_from = $this->_var['info1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');$this->_foreach['info1name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['info1name']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
        $this->_foreach['info1name']['iteration']++;
?>
		 <!-- <div id='left_change<?php echo $this->_var['key']; ?>' class="district <?php if (($this->_foreach['info1name']['iteration'] <= 1)): ?>select<?php endif; ?>" onClick=setTabQuyu('left_change',<?php echo $this->_var['key']; ?>)><?php echo $this->_var['value']['region_name']; ?></div> -->
                    <div id='left_change<?php echo $this->_var['key']; ?>' class="district <?php if ($this->_var['value']['region_id'] == $_COOKIE['region_3']): ?>select<?php endif; ?>" onClick=setTabQuyu('left_change',<?php echo $this->_var['key']; ?>)><?php echo $this->_var['value']['region_name']; ?></div>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>

	<div class='quyutanchu quyutanchu_right'>
		<!--<div id='left_change_0' class="con xiangcun">
			<div class='one_ji' id = 'k_1'>1km</div>
			<div class='one_ji' id = 'k_3'>3km</div>
			<div class='one_ji' id = 'k_5'>5km</div>
			<div class='one_ji' id = 'k_10')>10km</div>
			<div class='one_ji'>全城</div>
		</div>-->

		<?php $_from = $this->_var['info1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
        $this->_foreach['name']['iteration']++;
?>
		   <!--<div id='left_change_<?php echo $this->_var['key']; ?>' <?php if (! ($this->_foreach['name']['iteration'] <= 1)): ?>style='display:none'<?php endif; ?> class="xiangcun"><?php if ($this->_var['info2'] [ $this->_var['key'] ]): ?><?php $_from = $this->_var['info2'][$this->_var['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key2', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key2'] => $this->_var['val']):
?><div class='one_ji' onclick="setAreaCookie(4,<?php echo $this->_var['val']['region_id']; ?>,'');"><?php echo $this->_var['val']['region_name']; ?></div><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?><?php endif; ?></div>-->
                       <div id='left_change_<?php echo $this->_var['key']; ?>' <?php if ($this->_var['value']['region_id'] != $_COOKIE['region_3']): ?>style='display:none'<?php endif; ?> class="xiangcun"><?php if ($this->_var['info2'] [ $this->_var['key'] ]): ?><div class='one_ji' onclick="setAreaCookie(4,0,'');">全部</div><?php $_from = $this->_var['info2'][$this->_var['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key2', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key2'] => $this->_var['val']):
?><div class='one_ji' onclick="setAreaCookie(4,<?php echo $this->_var['val']['region_id']; ?>,'');"><?php echo $this->_var['val']['region_name']; ?></div><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?><?php endif; ?></div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

	</div>	
 </div>
 </div>
 <div class="close_div" onClick='closetanchu2()'></div>
 </div>
<script>
function opentanchu1(){
	$('#fenleitanchu').show();
	$('#quyutanchu').hide();
	$('html').addClass("sidebar-move");
	}
function closetanchu1(){
	$('#fenleitanchu').hide();
		$('html').removeClass("sidebar-move");
	}
function opentanchu2(){
	$('#quyutanchu').show();
	$('#fenleitanchu').hide();
	$('html').addClass("sidebar-move");

	}
function closetanchu2(){
	$('#quyutanchu').hide();
	$('html').removeClass("sidebar-move");
	}
function setTabQuyu(name,cursel){
	$('.district').removeClass('select');
	$('#'+name+cursel).addClass('select');
	$('.xiangcun').removeClass('con').hide();
	$('#'+name+"_"+cursel).addClass('con').show();
	setAreaCookie(3,cursel,name);

}

function setAreaCookie(level,value,name){

	document.cookie="region_"+level+"="+value;
	if(level == 3){
	//三级城市设置cookie
		if($('#'+name+"_"+value).html() == ''){
			document.cookie="region_4=0";
			top.location.href=top.location.href;
		}
	}
	if(level == 4){
		top.location.href=top.location.href;
	}
}

</script>