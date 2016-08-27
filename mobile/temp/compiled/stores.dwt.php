<!DOCTYPE html >
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="stylesheet" type="text/css" href="themesmobile/68ecshopcom_mobile/css/public.css"/>
<link rel="stylesheet" href="themesmobile/68ecshopcom_mobile/css/category_list.css">
<link rel="stylesheet" href="themesmobile/68ecshopcom_mobile/css/stores.css">
<script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/jquery.js"></script>
<style>
.goods_nav{width:30%; float:right; right:5px; overflow:hidden; position:fixed;margin-top:-20px; z-index:9999999}
</style>

</head>
<body style=" background:#F5F5F5">

      <header>
      <div class="tab_nav">
        <div class="header">
          <div class="h-left"><a class="sb-back" href="javascript:history.back(-1)" title="返回"></a></div>
          <div class="h-mid">店铺街</div>
          <div class="h-right">
            <aside class="top_bar">
              <div onClick="show_menu();$('#close_btn').addClass('hid');" id="show_more"><a href="javascript:;"></a> </div>
            </aside>
          </div>
        </div>
      </div>
      </header>
       	<?php echo $this->fetch('library/up_menu.lbi'); ?> 
                
        
        
        <section class="filtrate_term" id="product_sort" style="width: 100%;">
<div class="list_top" >
    	<div class="ub" >
            <div class="list_tab ub ub-ac ub-pc" style="width:50%" onclick="opentanchu1()"><div id="sort" class="list_tabcon">
        <?php echo $this->_var['cat_name']; ?>
            </div></div>            
             <div class="list_tab ub ub-ac ub-pc" style="width:45%" onClick="opentanchu2()" ><div id="quyu" class="list_tabcon"><?php echo $this->_var['areaName']; ?></div></div>
        </div>
        </div>        
    <div id="fenleitanchu" class='zitidian_div' style="display:none">
    <div class="f_bg fenleilist" style="overflow-y:scroll; height:auto">
       <div  onClick="javascript:location.href='stores.php'" >全部</div>
    <?php $_from = $this->_var['all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('i', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['i'] => $this->_var['cat']):
?>
    <div  onClick="javascript:location.href='<?php echo $this->_var['cat']['url']; ?>&cat_name=<?php echo $this->_var['cat']['str_name']; ?>'" <?php if ($_REQUEST['id'] == $this->_var['cat']['str_id']): ?> style="color:#F00;"<?php endif; ?>><?php echo $this->_var['cat']['str_name']; ?></div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     </div>
     <div class="close_div" onClick="closetanchu1()"></div>    
 </div>
 </div>
<?php 
$k = array (
  'name' => 'select_region_category',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
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

</section>
        
        
        
        
        
        
<!--<div class="Packages">
<div class="all"><a <?php if (! $_REQUEST['id']): ?> class="sele" <?php endif; ?> target="_self" href="stores.php" style="color:#FFF"><span>全部</span></a></div>
 <div class="page_guide_slider">
	<div class="page_guide_balloon" style=" display:none">
		<div class="page_guide_bar">
			<div class="page_guide_progress">
				<div></div>
			</div>
		</div>
	</div>	
	<div class="page_guide_container" onMouseDown="pageGuideMousedown(this,event)" onMouseMove="pageGuideMousemove(this,event)" onMouseUp="pageGuideMouseup(this,event)" onMouseOut="pageGuideMouseout(this,event)" ontouchstart="pageGuideTouchstart(this,event)" ontouchmove="pageGuideTouchmove(this,event)" ontouchend="pageGuideTouchend(this,event)">
    
		<div class="page_guide_items" style=" position:relative">		 
       
	<?php $_from = $this->_var['all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('i', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['i'] => $this->_var['cat']):
?> 
            <div  class="page_guide_item">
		<div class="page_guide_item_text"><a class="<?php if ($_REQUEST['id'] == $this->_var['cat']['str_id']): ?> sele <?php endif; ?>" target="_self" href="<?php echo $this->_var['cat']['url']; ?>#street_cat<?php echo $this->_var['i']; ?>"><?php echo $this->_var['cat']['str_name']; ?></a></div>
            </div>
            <div id="street_cat<?php echo $this->_var['i']; ?>"></div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   
		</div>
	</div>
</div>

	<?php if ($this->_var['address_info']['district']): ?>
	<?php $_from = $this->_var['address_info']['district']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'ainfo');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['ainfo']):
?>
        	<a target="_self" href="<?php echo $this->_var['ainfo']['url']; ?>" class="<?php if ($_COOKIE['region_3'] == $this->_var['key']): ?>selected<?php endif; ?>" ><span><?php echo $this->_var['ainfo']['name']; ?></span></a>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<?php endif; ?>
           
<?php if ($this->_var['child_info']['xiangcun']): ?>
<div id="cate_attr_con1" style="display:">
		<?php $_from = $this->_var['child_info']['xiangcun']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'ainfo');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['ainfo']):
?>
			<a target="_self" href="<?php echo $this->_var['ainfo']['url']; ?>" class="<?php if ($_COOKIE['region_4'] == $this->_var['key']): ?>selected<?php endif; ?>"><span><?php echo $this->_var['ainfo']['name']; ?></span></a>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		
            </div>            
<?php endif; ?> 
 </div> -->

<?php $_from = $this->_var['shops_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shop');$this->_foreach['shop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shop']['total'] > 0):
    foreach ($_from AS $this->_var['shop']):
        $this->_foreach['shop']['iteration']++;
?>
<section class="rzs_info">
<dl>
<dt> <a href="supplier.php?suppId=<?php echo $this->_var['shop']['supplier_id']; ?>" class="flow-datu" title="<?php echo $this->_var['shop']['shop_name']; ?>" style="background-image:url(./../<?php echo $this->_var['shop']['shop_logo']; ?>)"> </a></dt>
<dd><strong><a href="supplier.php?suppId=<?php echo $this->_var['shop']['supplier_id']; ?>"> 店铺：<?php echo $this->_var['shop']['shop_name']; ?></a></strong>
<p>所在地：<?php echo $this->_var['shop']['address']; ?></p>
</dd>
</dl>
<ul>
<li><span>宝贝描述</span><strong>:<?php if ($this->_var['shop']['comment_rand'] > 0): ?><?php echo $this->_var['shop']['comment_rand']; ?><?php else: ?>5.0<?php endif; ?></span></strong><em><?php if ($this->_var['shop']['comment_rand'] > 0): ?><?php if ($this->_var['shop']['comment_rand'] <= 2): ?>低<?php elseif ($this->_var['shop']['comment_rand'] > 2 && $this->_var['shop']['comment_rand'] <= 4): ?>中<?php else: ?>高<?php endif; ?><?php else: ?>高<?php endif; ?></em></li>
<li><span>卖家服务</span><strong>:<?php if ($this->_var['shop']['server'] > 0): ?><?php echo $this->_var['shop']['server']; ?><?php else: ?>5.0<?php endif; ?></strong><em><?php if ($this->_var['shop']['server'] > 0): ?><?php if ($this->_var['shop']['server'] <= 2): ?>低<?php elseif ($this->_var['shop']['server'] > 2 && $this->_var['shop']['server'] <= 4): ?>中<?php else: ?>高<?php endif; ?><?php else: ?>高<?php endif; ?></em></em></li>
<li><span>物流服务</span><strong>:<?php if ($this->_var['shop']['shipping'] > 0): ?><?php echo $this->_var['shop']['shipping']; ?><?php else: ?>5.0<?php endif; ?></strong><em><?php if ($this->_var['shop']['shipping'] > 0): ?><?php if ($this->_var['shop']['shipping'] <= 2): ?>低<?php elseif ($this->_var['shop']['shipping'] > 2 && $this->_var['shop']['shipping'] <= 4): ?>中<?php else: ?>高<?php endif; ?><?php else: ?>高<?php endif; ?></em></em></li>
</ul>
 <?php if ($this->_var['shop']['goods_info']): ?>
<div class="index_taocan">
    <h2>共<?php echo $this->_var['shop']['goods_number']; ?>件宝贝</h2>
<?php $_from = $this->_var['shop']['goods_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods']['iteration']++;
?>
 <a href="<?php echo $this->_var['goods']['url']; ?>"> 
    <dl>
        <dt><img src="./../<?php echo $this->_var['goods']['goods_thumb']; ?>" class="B_eee" ><em>￥<?php echo $this->_var['goods']['shop_p']; ?></em></dt>
        <dd><?php echo $this->_var['goods']['goods_name']; ?></dd>
    </dl>
    </a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
<?php endif; ?>
<div class="s_dianpu">
<span><a href="tel:<?php echo $this->_var['shop']['contacts_phone']; ?>" ><em class="bg1"></em>联系客服</a></span>
<span><a href="supplier.php?suppId=<?php echo $this->_var['shop']['supplier_id']; ?>"><em class="bg2"></em>进入店铺</a></span>
</div>
</section>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>



<?php echo $this->fetch('library/pages.lbi'); ?>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/footer_nav.lbi'); ?>

<script>
function goTop(){
	$('html,body').animate({'scrollTop':0},600);
}
</script>
<a href="javascript:goTop();" class="gotop"><img src="themesmobile/68ecshopcom_mobile/images/topup.png"></a> 


<script type="text/javascript">
//reg_package();
</script>
<script src="themesmobile/68ecshopcom_mobile/js/slider.js" type="text/javascript"></script>
</body>
</html>
