<!DOCTYPE html >
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>选择城市</title>
<meta name="Keywords" content="选择城市" />
<meta name="Description" content="选择城市" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="stylesheet" type="text/css" href="themesmobile/68ecshopcom_mobile/css/public.css"/>
<link rel="stylesheet" type="text/css" href="themesmobile/68ecshopcom_mobile/css/city.css"/>
<script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/jquery.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
</head>
<body>


<div id="page" class="showpage">
<div>


  <div class="tab_nav">
    <header class="header">
      <div class="h-left">
        <a class="sb-back" href="javascript:history.back(-1)" title="返回"></a>
      </div>
      <div class="h-mid">
        <h6>选择城市</h6>
      </div>
      <div class="h-right">
        <aside class="top_bar">
          <div onClick="show_menu();$('#close_btn').addClass('hid');" id="show_more">
            <a href="javascript:;"></a>
          </div>
        </aside>
      </div>
    </header>
  </div>
<?php echo $this->fetch('library/up_menu.lbi'); ?>

<div class="box nopadding">
<?php if ($this->_var['zimu_info']): ?>
<ul class="charlist">
<?php $_from = $this->_var['zimu_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'zimu');if (count($_from)):
    foreach ($_from AS $this->_var['zimu']):
?>
  <li><a class="react color-strong"><?php echo $this->_var['zimu']; ?></a> </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<?php endif; ?>
</div>
<div class="choose_city_content">
<div class="choose_city_content_inner">
<?php if ($this->_var['zimu_city']): ?>
<ul id="choose_city_content_inner_ul">
<?php $_from = $this->_var['zimu_city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'zcity');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['zcity']):
?>
<li id="<?php echo $this->_var['key']; ?>"><?php echo $this->_var['key']; ?></li>
<?php $_from = $this->_var['zcity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
<li><a href="javascript:select_city(<?php echo $this->_var['city']['region_id']; ?>,2)"><?php echo $this->_var['city']['region_name']; ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<?php endif; ?>
</div>
</div>

</div>
</div>
<script type="text/javascript"> 
$(".charlist li").click(function(){
	var scroll_offset =	$("#choose_city_content_inner_ul #"+$(this).find("a").html()).offset().top;
 //得到点击a标签对应的跳转层的offset，包含两个值，top和left 
$("body,html").animate({ 
scrollTop:scroll_offset //让body的scrollTop等于pos的top，就实现了滚动 
},600); 
})
</script>

<script>
function goTop(){
	$('html,body').animate({'scrollTop':0},600);
}
function select_city(kk,type)
{
	Ajax.call('region_city.php', 'act=setcity&rid=' + kk + '&type='+type , select_city_response, 'GET', 'JSON');
}
function select_city_response(result){
	 document.cookie="region_1="+result.cookieinfo['region_1'];
	 document.cookie="region_2="+result.cookieinfo['region_2'];
	 document.cookie="region_3="+result.cookieinfo['region_3'];
	 document.cookie="region_4="+result.cookieinfo['region_4'];
	top.location.href='index.php';
}
</script>
<a href="javascript:goTop();" class="gotop"><img src="themesmobile/68ecshopcom_mobile/images/topup.png"></a> 

</body>
</html>