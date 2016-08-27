<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v4_0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link rel="stylesheet" type="text/css" href="themes/68ecshopcom_360buy/css/pro_search.css"/>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery-1.9.1.min.js" ></script>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery-lazyload.js" ></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>

<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,common.js')); ?>
</head>
<body >
<div id="site-nav"> 
<?php echo $this->fetch('library/page_header.lbi'); ?>
  <div class="wdiv">
    <div class="w">
        <div class="pro"> 
          <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?> 
          <?php if ($this->_var['goods']['goods_name'] != ''): ?>
          <DIV class=product onmouseover="this.className='product hover1'" onmouseout="this.className='product'" <?php if ($this->_foreach['name']['iteration'] % 4 == 0): ?>style="margin-right:0px;"<?php endif; ?>> 
            <DIV class=pic>
            	<A href="pro_goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank">
                	<IMG title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" height=220 alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width=220 data-original="<?php echo $this->_var['goods']['goods_thumb']; ?>"  src="themes/68ecshopcom_360buy/images/loading.gif">
                </A> 
                <?php if ($this->_var['goods']['is_best']): ?>
              	<DIV class=t_icon_st></DIV>
              	<?php endif; ?> 
            </DIV>
            <DIV class=title>
            	<A title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" href="pro_goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><?php echo sub_str($this->_var['goods']['goods_name'],16); ?> </A>
            </DIV>
            
            <DIV class=buy3>
              <DIV class=n-tg><A title="查看详情" href="pro_goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank">查看详情</A></DIV>
              <DIV class=n-price> 
                <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
                <?php echo $this->_var['goods']['promote_price']; ?> 
                <?php else: ?> 
                <?php echo $this->_var['goods']['shop_price']; ?> 
                <?php endif; ?>
              </DIV>
             
            </DIV>
            <DIV class=price3> <DIV class=y-price><SPAN><?php echo $this->_var['goods']['zhekou']; ?>折</SPAN> <SPAN class=yp><?php echo $this->_var['goods']['shop_price']; ?></SPAN> </DIV><span><?php echo $this->_var['goods']['count1']; ?>人已购买</span> </DIV>
          </DIV>
          <?php endif; ?> 
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
        <div style="height:0px;line-height:0px;clear:both"></div>
        <?php echo $this->fetch('library/pages.lbi'); ?> 
    </div>
  </div>
  <?php echo $this->fetch('library/help.lbi'); ?> 
  <?php echo $this->fetch('library/page_footer.lbi'); ?> 
  <?php echo $this->fetch('library/site_bar.lbi'); ?> 
</div>

<script type="text/javascript">
$("img").lazyload({
    effect       : "fadeIn",
	 skip_invisible : true,
	 failure_limit : 20
});
</script>

</body>
</html>
