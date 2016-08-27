<div class="w mt15">
<div id="filter">
      <div class='fore1' style="border:none;">
        <dl class='order'>
          <dt><?php echo $this->_var['lang']['goods_list']; ?>：</dt>
        </dl>
        <div class='total'><span>卡号：<strong><?php echo $this->_var['rowtg']['tg_sn']; ?>&nbsp;&nbsp;&nbsp;<a href="takegoods.php?act=logout">退出卡</a></strong></span></div>
     </div>
    </div>
</div>
<div class="w mt15">
<div class="act-list">
      <ul class="clearfix">
         <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods']['iteration']++;
?>
          <?php if ($this->_var['goods']['goods_id']): ?>
        <li <?php if ($this->_foreach['goods']['iteration'] % 4 == 1): ?>class="first"<?php endif; ?>>
            <div class="img">
                <a href='<?php echo $this->_var['goods']['url']; ?>' title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"><img  src='<?php echo $this->_var['goods']['goods_thumb']; ?>' width="200" height="200" alt='<?php echo htmlspecialchars($this->_var['goods']['name']); ?>' /></a>
                <p class="absBg"></p>
                <p class="absFg"><a href='<?php echo $this->_var['goods']['url']; ?>'  title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"><?php echo $this->_var['goods']['goods_shortname']; ?></a></p>
            </div>
            <div class="info">
                <div class="price"><strong class="red arial"><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></strong></div>
                <div class="discount"><span class="f16 yahei"><a href="javascript:showDiv(<?php echo $this->_var['goods']['goods_id']; ?>);" >提货</a></span></div>
            </div>
        </li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
      </ul>
  </div>
</div>




<script type="text/javascript">
  window.onload = function()
  {
    fixpng();
  }
</script>