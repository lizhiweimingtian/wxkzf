<div class="flow-wrap clearfix">
<?php $_from = $this->_var['shops_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shop');if (count($_from)):
    foreach ($_from AS $this->_var['shop']):
?> 
	<div class="flow-item" onMouseOver="store_focus(<?php echo $this->_var['shop']['supplier_id']; ?>)" onMouseOut="store_nofocus(<?php echo $this->_var['shop']['supplier_id']; ?>)"> <a href="supplier.php?suppId=<?php echo $this->_var['shop']['supplier_id']; ?>"> <img title="<?php echo $this->_var['shop']['supplier_name']; ?>" width="224" height="224" alt="" data-original="<?php echo $this->_var['shop']['logo']; ?>" src="themes/68ecshopcom_360buy/images/loading.gif" >
	  <p class="flow-logo"> <img id="j_logo_<?php echo $this->_var['shop']['supplier_id']; ?>" alt="" width="90" height="45" data-original="<?php echo $this->_var['logopath']; ?>logo_supplier<?php echo $this->_var['shop']['supplier_id']; ?>.jpg" src="themes/68ecshopcom_360buy/images/loading.gif"> </p>
	  <h4 class="flow-title"><?php echo $this->_var['shop']['supplier_title']; ?></h4>
	  <p class="flow-desc"><?php echo $this->_var['shop']['supplier_desc']; ?></p></a>
	  <b class="ui-brand-btn j_CollectBrand" style="display: none;" id="j_brand_<?php echo $this->_var['shop']['supplier_id']; ?>"><i></i><?php if ($this->_var['shop']['shop_closed']): ?><span>装修中..</span><?php else: ?><span onclick='guanzhu(<?php echo $this->_var['shop']['supplier_id']; ?>);'>关注</span><?php endif; ?><b></b></b>
	  <b class="flow-tag"><span><?php echo $this->_var['shop']['supplier_tags']; ?></span><b class="classic"></b></b>
	  <p class="box-num"><em class="j_SubjectCountNum" data-subjectid="730143">990</em>人捧场</p>
	  </div>
<?php endforeach; else: ?>
<div class="no_stores">
没有找到相应店铺！
</div>
<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>	
</div>