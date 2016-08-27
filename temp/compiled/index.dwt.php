<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v4_0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />
<link rel="stylesheet" href="themes/68ecshopcom_360buy/css/index.css">
<link rel="stylesheet" type="text/css" href="themes/68ecshopcom_360buy/css/shopne_commin.css" />
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery-lazyload.js" ></script>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jqueryAll.index.min.js"></script>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jump.js"></script>
<script type="text/javascript">
$(function(){
	 $(".brand-wall-content img").each(function(k,img){
		new JumpObj(img,10);
	});
});
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js')); ?>
</head>
<body>
<div id="bg" class="bg" style="display:none;"></div>
<?php 
$k = array (
  'name' => 'index_city_div',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
<div id="site-nav"> <?php echo $this->fetch('library/page_headerindex.lbi'); ?>
  <div class="home-focus-layout"> <?php echo $this->fetch('library/index_ad3.lbi'); ?>
    <div class="right-sidebar"> <?php echo $this->fetch('library/order_type.lbi'); ?>
      <div class="proclamation">
        <ul class="tabs-nav">
          <li class="tabs-selected">
            <h3>招商入驻</h3>
          </li>
          <li class="">
            <h3>商城公告</h3>
          </li>
        </ul>
        <div class="tabs-panel"> <a href="apply_index.php" title="申请商家入驻；已提交申请，可查看当前审核状态。" class="store-join-btn" target="_blank">&nbsp;</a> <a href="supplier" target="_blank" class="store-join-help"><i class="icon-cog"></i>登录商家管理中心</a> </div>
        
<?php $this->assign('articles',$this->_var['articles_12']); ?><?php $this->assign('articles_cat',$this->_var['articles_cat_12']); ?><?php echo $this->fetch('library/cat_articles.lbi'); ?>
 </div>
    </div>
  </div>
  <?php echo $this->fetch('library/index_ad_group.lbi'); ?>
  <div class="blank5"></div>
  <div class="fp-brand-rec main-container" id="J_FpBrandRec"> <a class="brand-title" href="stores.php">热门品牌</a>
    <div class="brand-content clearfix">
      <div class="module">
        <div class="brand-first"> 
<?php $this->assign('ads_id','6'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
 </div>
      </div>
      <?php 
$k = array (
  'name' => 'supplier_list',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      <div class="module">
        <div class="brand-today-b"> 
<?php $this->assign('ads_id','7'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
 </div>
      </div>
    </div>
  </div>
  <div class="blank5"></div>
  <div class="home-sale-layout wrapper">
    <div class="left-layout"> <?php echo $this->fetch('library/stores_tab.lbi'); ?>
      <div class="tabs-panel sale-goods-list tabs-hide">
        <ul>
          <?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['index_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['index_goods']['iteration']++;
?> 
          <?php if ($this->_foreach['index_goods']['iteration'] < 6): ?>
          <li>
            <dl>
              <dt class="goods-name"> <a target="_blank" href="pro_goods.php?id=<?php echo $this->_var['goods']['id']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_style_name']); ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a> </dt>
              <dd class="goods-thumb"> <a target="_blank" href="pro_goods.php?id=<?php echo $this->_var['goods']['id']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_style_name']); ?>"> <img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_style_name']); ?>"> </a> </dd>
              <dd class="goods-price">商城价： <em> 
                <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
                <?php echo $this->_var['goods']['promote_price']; ?> 
                <?php else: ?> 
                <?php echo $this->_var['goods']['shop_price']; ?> 
                <?php endif; ?> 
                </em> </dd>
            </dl>
          </li>
          <?php endif; ?> 
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
      </div>
      <div class="tabs-panel sale-goods-list tabs-hide">
        <ul>
          <?php $_from = $this->_var['top_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['index_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['index_goods']['iteration']++;
?> 
          <?php if ($this->_foreach['index_goods']['iteration'] < 6): ?>
          <li>
            <dl>
              <dt class="goods-name"> <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_name']; ?></a> </dt>
              <dd class="goods-thumb"> <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> <img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> </a> </dd>
              <dd class="goods-price">商城价：<em><?php echo $this->_var['goods']['price']; ?></em></dd>
            </dl>
          </li>
          <?php endif; ?> 
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
      </div>
      <div class="tabs-panel sale-goods-list tabs-hide">
        <ul>
          <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['index_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['index_goods']['iteration']++;
?> 
          <?php if ($this->_foreach['index_goods']['iteration'] < 6): ?>
          <li>
            <dl>
              <dt class="goods-name"> <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_name']; ?></a> </dt>
              <dd class="goods-thumb"> <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> <img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> </a> </dd>
              <dd class="goods-price">商城价： <em> 
                <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
                <?php echo $this->_var['goods']['promote_price']; ?> 
                <?php else: ?> 
                <?php echo $this->_var['goods']['shop_price']; ?> 
                <?php endif; ?> 
                </em> </dd>
            </dl>
          </li>
          <?php endif; ?> 
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
      </div>
      <div class="tabs-panel sale-goods-list tabs-hide">
        <ul>
          <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['index_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['index_goods']['iteration']++;
?> 
          <?php if ($this->_foreach['index_goods']['iteration'] < 6): ?>
          <li>
            <dl>
              <dt class="goods-name"><a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_name']; ?></a></dt>
              <dd class="goods-thumb"> <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>"> <img src="<?php echo $this->_var['goods']['thumb']; ?>"  alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> </a></dd>
              <dd class="goods-price">商城价：<em> <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
                <?php echo $this->_var['goods']['promote_price']; ?> 
                <?php else: ?> 
                <?php echo $this->_var['goods']['shop_price']; ?> 
                <?php endif; ?></em></dd>
            </dl>
          </li>
          <?php endif; ?> 
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
      </div>
      <div class="tabs-panel sale-goods-list">
        <ul>
          <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['index_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['index_goods']['iteration']++;
?> 
          <?php if ($this->_foreach['index_goods']['iteration'] < 6): ?>
          <li>
            <dl>
              <dt class="goods-name"> <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_name']; ?></a> </dt>
              <dd class="goods-thumb"> <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> <img data-original="<?php echo $this->_var['goods']['thumb']; ?>" src="themes/68ecshopcom_360buy/images/loading.gif" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> </a> </dd>
              <dd class="goods-price">商城价： <em> 
                <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
                <?php echo $this->_var['goods']['promote_price']; ?> 
                <?php else: ?> 
                <?php echo $this->_var['goods']['shop_price']; ?> 
                <?php endif; ?> 
                </em> </dd>
            </dl>
          </li>
          <?php endif; ?> 
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
      </div>
    </div>
    <div class="right-sidebar">
      <div class="title">
        <h3><i></i>限时折扣</h3>
      </div>
      <div id="saleDiscount" class="sale-discount">
        <ul>
          <?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');$this->_foreach['index_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_goods']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
        $this->_foreach['index_goods']['iteration']++;
?> 
          <?php if ($this->_foreach['index_goods']['iteration'] > 5 && $this->_foreach['index_goods']['iteration'] < 10): ?>
          <li>
            <dl>
              <dt class="goods-name"><?php echo $this->_var['goods']['short_style_name']; ?></dt>
              <dd class="goods-thumb"> <a href="pro_goods.php?id=<?php echo $this->_var['goods']['id']; ?>"  title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> <img data-original="<?php echo $this->_var['goods']['thumb']; ?>" src="themes/68ecshopcom_360buy/images/loading.gif" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> </a> </dd>
              <dd class="goods-price"> 
                <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
                <?php echo $this->_var['goods']['promote_price']; ?> 
                <?php else: ?> 
                <?php echo $this->_var['goods']['shop_price']; ?> 
                <?php endif; ?> 
                <span class="original"><?php echo $this->_var['goods']['market_price']; ?></span> </dd>
              <dd class="goods-price-discount"><em><?php echo $this->_var['goods']['zhekou']; ?></em></dd>
              <dd class="time-remain" count_down="<?php echo $this->_var['goods']['lefttime']; ?>"><i></i><span id="leftTime<?php echo $this->_var['key']; ?>"><em time_id="d"></em>天<em time_id="h"></em>小时 <em time_id="m"></em>分<em time_id="s">59</em>秒 </span></dd>
              <dd class="goods-buy-btn"></dd>
            </dl>
          </li>
          <script>

Tday[<?php echo $this->_var['key']; ?>] = new Date("<?php echo $this->_var['goods']['gmt_end_time']; ?>");

window.setInterval(function()     

{clock(<?php echo $this->_var['key']; ?>);}, 1000);     

</script> 
          <?php endif; ?> 
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <div class="pagination"><span style="opacity: 0.4;"></span><span style="opacity: 0.4;"></span><span style="opacity: 0.4;"></span><span style="opacity: 1;"></span></div>
        <div class="arrow pre" style="opacity: 0;"></div>
        <div class="arrow next" style="opacity: 0;"></div>
      </div>
    </div>
  </div>
  
  <div class="blank5"></div>
  <div class="floorList">	
   <div class="floor"> </div>
  
  <script type="text/javascript">
function Move(btn1,btn2,box,btnparent,shu){
	var llishu=$(box).first().children().length;
	var liwidth=121;
	var boxwidth=llishu*liwidth-1;
	var shuliang=llishu-shu;
	$(box).css('width',''+boxwidth+'px');
	var num=0;
	$(btn1).click(function(){
		num++;
		if (num>shuliang) {
			num=shuliang;
		}
		var move=-liwidth*num;
		$(this).closest(btnparent).find(box).stop().animate({'left':''+move+'px'},300);
	});
	$(btn2).click(function(){
		num--;
		if (num<0) {
			num=0;
		}
		var move=liwidth*num;
		$(this).closest(btnparent).find(box).stop().animate({'left':''+-move+'px'},300);
	})
}
</script> 
  
<?php $this->assign('cat_goods',$this->_var['cat_goods_1']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_1']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 
 
 
 
 
 
 
 
   
  </div>
</div>
<script type="text/javascript">
$(function(){
	$(".anli_con").find(".anniu").hide();
	$(".anli_con").hover(function(){
		var num = $(this).find("li").length;
		if(num > 10){
	$(this).find(".anniu").show();
		}
},
function(){

	$(this).find(".anniu").hide();
})
}) 
</script>
<div class="wrapper">
  <div class="mt10"> 
 </div>
</div>
<div class="n-footer"> </div>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/indexPrivate.min.js"></script>
<?php echo $this->fetch('library/page_footerindex.lbi'); ?> 
<?php echo $this->fetch('library/site_bar.lbi'); ?>
<?php echo $this->fetch('library/left_bar.lbi'); ?>
</body>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/home_index.js"></script>
</html>