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
  <link rel="stylesheet" href="themesmobile/68ecshopcom_mobile/css/public.css">
  <link rel="stylesheet" href="themesmobile/68ecshopcom_mobile/css/flow.css">
  <link rel="stylesheet" href="themesmobile/68ecshopcom_mobile/css/style_jm.css">
  <script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/jquery.js"></script>
  <script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/ecsmart.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,utils.js,shopping_flow.js')); ?>

</head>
<body style="<?php if ($this->_var['step'] != 'ziti'): ?>background: rgb(235, 236, 237);<?php endif; ?>position:relative;">
<div class="tab_nav">
    <div class="header">
      <div class="h-left">
        <a class="sb-back" href="javascript:history.back(-1)" title="返回"></a>
      </div>
      <div class="h-mid">
      <?php if ($this->_var['step'] == 'cart'): ?>购物车<?php elseif ($this->_var['step'] == 'login'): ?>登录<?php elseif ($this->_var['step'] == 'consignee'): ?>填写收货地址<?php elseif ($this->_var['step'] == 'checkout'): ?>确认订单地址<?php elseif ($this->_var['step'] == 'ziti'): ?>自提点列表<?php elseif ($this->_var['step'] == 'done'): ?>提交订单<?php endif; ?>
      </div>
    </div>
  </div>
  

<div id="tbh5v0">
  <div id="back" class="screen-wrap fullscreen login">
  <?php if ($this->_var['step'] == 'cart'): ?>
    <?php if ($this->_var['goods_list']): ?>
    <div class="page-shopping ">

      <div class="cart_list">
          <form id="formCart" name="formCart" method="post" action="flow.php">
           <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('cartkey', 'cartgoods');$this->_foreach['goodslist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goodslist']['total'] > 0):
    foreach ($_from AS $this->_var['cartkey'] => $this->_var['cartgoods']):
        $this->_foreach['goodslist']['iteration']++;
?>
           <div  class="block" <?php if (($this->_foreach['goodslist']['iteration'] <= 1)): ?>style="margin-top:0px;"<?php endif; ?>>
           <div class="shop_title" >
                        <div class="fl"><a class="shopLink eclipse" href="supplier.php?suppId=<?php echo $this->_var['cartkey']; ?>"><?php echo $this->_var['cartgoods']['supplier_name']; ?></a><input type="hidden" name="supplierid" id="supplierid" value="<?php echo $this->_var['key']; ?>"></div><a class="fl right_arrow" href="supplier.php?suppId=<?php echo $this->_var['cartkey']; ?>"></a></div>

          <?php $_from = $this->_var['cartgoods']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?>
           
          <div class="item-list">
            <div class="item">

              <div class="inner">
                <div style="width:60%; float:left; height:98px;">
                  <div class="check-wrapper">
                   <span  class="cart-checkbox checked" >
                      <input type="checkbox" autocomplete="off" name="sel_cartgoods[]" value="<?php echo $this->_var['goods']['rec_id']; ?>" id="sel_cartgoods_<?php echo $this->_var['goods']['rec_id']; ?>" checked=checked  style="display:none;"></span>                   
                  </div>
                  <div  class="pic img_relative">
                  <?php if ($this->_var['goods']['goods_thumb']): ?>
                    <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>">
                        <img src="./<?php echo $this->_var['goods']['goods_thumb']; ?>"></a>
                        <?php else: ?>
                        <img src="themesmobile/68ecshopcom_mobile/images/flow/ico_cart_package.gif">
                        <?php endif; ?>
                          
                      <?php if ($this->_var['goods']['stock_dec'] == '无货'): ?><span>
                        无货
                          </span><?php endif; ?>
                           
                  </div>
                  
                  <div class="name">
                    <span>
        
                  <?php if ($this->_var['goods']['is_gift'] > 0): ?>
                  <font style="color:#FF0000">(<?php echo $this->_var['lang']['largess']; ?>)</font>
                  <?php endif; ?>
                  
                 <?php echo $this->_var['goods']['goods_name']; ?>
                    </span>
                  </div>
                  <div class="attr">
                    <span><?php if ($this->_var['goods']['goods_attr']): ?><?php echo $this->_var['goods']['goods_attr']; ?><?php endif; ?></span>
                  </div>

                  <div class="num">
                       <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?> 
                          <div class="xm-input-number">
                        <div class="act_wrap">
                          
                          <a href="javascript:;" onclick="minus_num(<?php echo $this->_var['goods']['rec_id']; ?>, <?php echo $this->_var['goods']['goods_id']; ?>);" id="jiannum<?php echo $this->_var['goods']['rec_id']; ?>" class="input-sub <?php if ($this->_var['goods']['goods_number'] < 2): ?><?php else: ?>active<?php endif; ?>"></a>
                          <input type="text" onKeyDown='if(event.keyCode == 13) event.returnValue = false' name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" class="input-num"  onblur="change_price(<?php echo $this->_var['goods']['rec_id']; ?>,<?php echo $this->_var['goods']['goods_id']; ?>)"/>
                          <input type="hidden" id="hidden_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>">
                          <a href="javascript:;" onclick='javascript:add_num(<?php echo $this->_var['goods']['rec_id']; ?>, <?php echo $this->_var['goods']['goods_id']; ?>)'  class="input-add active"></a>

                          </div>
                        </div>
                        <?php else: ?>
                         x<?php echo $this->_var['goods']['goods_number']; ?>
                        <?php endif; ?>
                   
                  </div>
                </div>
                <div style=" position:absolute; right:0px; top:20px; width:100px; height:98px;">
                  <div class="price">
                    <span class="mar_price"><?php echo $this->_var['goods']['market_price']; ?></span>
                    <br>
                    <span><?php echo $this->_var['goods']['goods_price']; ?></span>
                   </div>
                  <div class="delete">
                    <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>';">
                      <div class="icon-shanchu"></div>
                    </a>
                  </div>
                </div>
                <div style="height:0px; line-height:0px; clear:both;"></div>
              </div>
              <div class="append"></div>
            </div>
          </div>

          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  <?php if ($this->_var['cartgoods']['favourable'] || $this->_var['cartgoods']['discount']): ?>
                    <?php if ($this->_var['cartgoods']['favourable']): ?> 
                  <div class="have_gift" onclick="choose_gift(<?php echo $this->_var['cartkey']; ?>)" style="position:relative;">
                    <span>赠品</span>
                    <span id='discount_<?php echo $this->_var['key']; ?>'>请选择赠品
                    </span><a class="right_arrow" style="position:absolute; right:5px; top:0px;"></a>
                    </div>
                    <?php endif; ?>
                <?php if ($this->_var['cartgoods']['discount']): ?> 
               <div class="have_gift"><span></span>
              <span id="zk_<?php echo $this->_var['key']; ?>"><?php echo $this->_var['cartgoods']['discount']['your_discount']; ?></span> 
              </div>
              <?php endif; ?> 
                 <?php endif; ?>
          </div>
           <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         
			<div class="bottom-panel">
            <div class="quanxuan">
              <div class="check-wrapper">
                <span  class="cart-checkbox checked" onclick="return chkAll_onclick()"></span><span class="cart-checktext">全选</span>
              </div>
            </div>
            <div class="info">
              <span class="hot" id="cart_amount_desc"><em>总计：</em><?php echo $this->_var['shopping_money']; ?></span>
              <br>
              <span class="hot_text">不含运费</span>
            </div>
            <div class="right">
              
              <a href="javascript:void(0)" onclick="return selcart_submit();" class="xm-button">去结算</a>
              </div>
          </div>

          <input name="submit111" type="submit" value="更新购物车" id="updatecart" style="display:none"/>
          <input type="hidden" name="step" value="update_cart">

        </form>
      </div>
    </div>
    
    
     
    <script>
	  function add_num(rec_id,goods_id)
	 {
		document.getElementById("goods_number_"+rec_id+"").value++;
		if(document.getElementById("goods_number_"+rec_id+"").value > 1)
		{
			document.getElementById("jiannum"+rec_id).className = 'input-sub active';
			}else
			{
			document.getElementById("jiannum"+rec_id).className = 'input-sub';
			}
		var number = document.getElementById("goods_number_"+rec_id+"").value;
		Ajax.call('flow.php', 'step=update_group_cart&rec_id=' + rec_id +'&number=' + number+'&goods_id=' + goods_id, changePriceResponse, 'GET', 'JSON');
	 }

	function minus_num(rec_id,goods_id)
	{
		if (document.getElementById("goods_number_"+rec_id+"").value>1)
		{
			document.getElementById("goods_number_"+rec_id+"").value--;
			if(document.getElementById("goods_number_"+rec_id+"").value > 1)
		{
			document.getElementById("jiannum"+rec_id).className = 'input-sub active';
			}else
			{
			document.getElementById("jiannum"+rec_id).className = 'input-sub';
			}
		}
		var number = document.getElementById("goods_number_"+rec_id+"").value;
		Ajax.call('flow.php', 'step=update_group_cart&rec_id=' + rec_id +'&number=' + number+'&goods_id=' + goods_id, changePriceResponse, 'GET', 'JSON');
	}

function change_price(rec_id,goods_id)
{
	var r = /^[1-9]+[0-9]*]*$/;
	var number = document.getElementById("goods_number_"+rec_id+"").value;
	if (!r.test(number))
	{
		alert("您输入的格式不正确！");
		document.getElementById("goods_number_"+rec_id+"").value=document.getElementById("hidden_"+rec_id+"").value;
	}
	else
	{
		Ajax.call('flow.php','step=update_group_cart&rec_id=' + rec_id +'&number=' + number+'&goods_id=' + goods_id, changePriceResponse, 'GET', 'JSON');
	}
}

function changePriceResponse(result)
{
if(result.error == 1)
{
	alert(result.content);
	document.getElementById("goods_number_"+result.rec_id+"").value =result.number;
	document.getElementById("hidden_"+result.rec_id+"").value =result.number;
}
else
{
	document.getElementById("hidden_"+result.rec_id+"").value =result.number;
	document.getElementById('cart_amount_desc').innerHTML = result.cart_amount_desc;//购物车商品总价说明
	show_div_text = "恭喜您！ 商品数量修改成功！ ";

}

}
</script> 
<script type="text/javascript" charset="utf-8">   
    $(".inner .cart-checkbox").click(function(){
  if($(this).hasClass('checked')){
    $(this).removeClass('checked');
    $(this).find('input').attr('checked',false);
  }
  else
  {
    $(this).addClass('checked');
    $(this).find('input').attr('checked',true);
  }

        
if($(".inner .cart-checkbox")==true)
{
$('.quanxuan .cart-checkbox').addClass('checked');
}
else
{
$('.quanxuan .cart-checkbox').removeClass('checked');
}

  var is_checked = true;
            $('.inner .cart-checkbox').each(function(){
        if(!$(this).hasClass('checked'))
          {
            is_checked = false;
            return false;
          }
               });
        if(is_checked){
        $('.quanxuan .cart-checkbox').addClass('checked'); 
        }else
        {
        $('.quanxuan .cart-checkbox').removeClass('checked'); 
        }
      select_cart_goods();
         
});

   
  function chkAll_onclick() 
  {
    var is_checked = false;
    if($('.quanxuan .cart-checkbox').hasClass('checked')){
      $('.quanxuan .cart-checkbox').removeClass('checked');
      $('.inner .cart-checkbox').removeClass('checked');
      is_checked = false;
    }   
    else{
      $('.quanxuan .cart-checkbox').addClass('checked');
      $('.inner .cart-checkbox').addClass('checked');
      is_checked = true;
    }
    for (var i=0;i<document.formCart.elements.length;i++)
    {
    var e = document.formCart.elements[i];
    e.checked = is_checked;
    }
    select_cart_goods();
  }
  function select_cart_goods()
  {
        var sel_goods = new Array();
        var obj_cartgoods = document.getElementsByName("sel_cartgoods[]");
        var j=0;
        for (i=0;i<obj_cartgoods.length;i++)
        {
      if(obj_cartgoods[i].checked == true)
      { 
        sel_goods[j] = obj_cartgoods[i].value;
        j++;
      }
        }
        Ajax.call('flow.php', 'act=selcart&sel_goods=' + sel_goods, selcartResponse, 'GET', 'JSON');
  }
  function selcartResponse(res)
  {
  if(res.result == '请选择要结算的商品！')
  {
        $('.xm-button').addClass('to_cart');
      $('.xm-button').attr('disable');
  }
  else{
      $('.xm-button').removeClass('to_cart');
      $('.xm-button').removeAttr('disable');
    }
    if (res.err_msg.length > 0)
    {
            alert(res.err_msg);
    }
    else
    {
     
       document.getElementById('cart_amount_desc').innerHTML=res.result;
    }
  }
  function selcart_submit()
  {
        var obj_cartgoods = document.getElementsByName("sel_cartgoods[]");
        var j=0;
        for (i=0;i<obj_cartgoods.length;i++)
        {
      if(obj_cartgoods[i].checked == true)
      { 
        j++;
      }
        }
        if (j>0)
        {
      document.formCart.action='flow.php?step=checkout';
      document.formCart.elements['step'].value='checkout';
      document.formCart.submit();
      return true;
       }
       else
      {   
      alert('请选择要结算的商品！');
      return false;
      }
  }
  </script>
     

    <?php else: ?>
    <section id="cart-content">
      <div class="qb_tac" style="padding:50px 0">
        <img src="themesmobile/68ecshopcom_mobile/images/flow/empty_cart.png" width="100" height="95">
        <br>购物车还是空的</div>
      <div class="qb_gap" style="width:60%; margin:0 auto;">
        <a href="./" class="mod_btn btn_strong" >马上逛逛</a>
      </div>
</section>
<?php endif; ?>
<div  style="height:72px;"></div>
<section class="f_mask" style="display: none;"></section>
<section class="f_block" id="choose" style="height:0px;"></section>
    <?php endif; ?>
    

    <?php if ($this->_var['step'] == 'consignee'): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'region.js')); ?> 

    <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?> 

    <?php if (! $this->_var['consignee']['consignee']): ?><a href="javascript:void(0);" class="textlink fl">新增收货地址+</a>
    <div class="clearfix"></div>
    <?php endif; ?>
    <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
      <?php echo $this->fetch('library/consignee.lbi'); ?>
    </form>
    <div style=" height:10px; line-height:10px; clear:both;"></div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    <script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script> 
    <?php endif; ?>
    
    
    
    <?php if ($this->_var['step'] == 'checkout'): ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
    <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkOrderForm(this)">
      <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
  </script>
  
     <section class="content" style="min-height: 294px;">
      <div class="wrap">
        <div class="active" style="min-height: 294px;">
          <div class="content-buy">
            <div class="wrap order-buy">
              <a href="flow.php?step=consignee">
                <section class="address " >
                  <div class="address-info" >
                    收货人:
                    
                    <p class="address-name"><?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?></p>
                    <p class="address-phone"><?php echo $this->_var['consignee']['tel']; ?></p>
                  </div>
                  <div class="address-details">收货地址：<?php echo htmlspecialchars($this->_var['consignee']['region']); ?><?php echo htmlspecialchars($this->_var['consignee']['address']); ?></div>
                </section>
              </a>
<div class="clearfix" style="background:#FFF; border-bottom:1px #ddd solid; height:45px; text-align:center;  line-height:45px; margin-bottom:10px;">
 <div class="free_freight">您的余额：<span>￥<?php echo empty($this->_var['your_surplus']) ? '0' : $this->_var['your_surplus']; ?></span></div>    
 </div>  
<section class="order " id="order4">
<div  class="order-info" style="margin-top:0;">
  
                    <h4 class="seller-name" >
                      <img src="themesmobile/68ecshopcom_mobile/images/flow/dingdan.png" width="28"> 订单详情
                      <?php if ($this->_var['allow_edit_cart']): ?><a class="modify" href="flow.php">修改</a>  <?php endif; ?>
                    </h4>


  </div>
 <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goodsinfo');$this->_foreach['glist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['glist']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goodsinfo']):
        $this->_foreach['glist']['iteration']++;
?>
 <section class="order-info" <?php if (($this->_foreach['glist']['iteration'] <= 1)): ?>style=" margin-top:0px;"<?php endif; ?>>
                  <div class="order-list">
      <div class="goods-list-title"> <?php echo $this->_var['goodsinfo']['goodlist']['0']['seller']; ?></div>
      <ul class="order-list-info">
         <?php $_from = $this->_var['goodsinfo']['goodlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?>       
         <li class="item" >
                      <div class="itemPay list-price-nums" id="itemPay17">
                        <p class="price"><?php echo $this->_var['goods']['subtotal']; ?></p>
                        <p class="nums">x<?php echo $this->_var['goods']['goods_number']; ?></p>
                      </div>
                      <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
                       <div class="itemInfo list-info" id="itemInfo12">
                        <div class="list-img img_relative">
                          <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>">
         
                            <?php if ($this->_var['goods']['goods_thumb']): ?><img src="./../<?php echo $this->_var['goods']['goods_thumb']; ?>"><?php else: ?><img src="themesmobile/68ecshopcom_mobile/images/no_picture.gif"><?php endif; ?></a>
                                         
                         <?php if ($this->_var['goods']['stock_num'] == 0): ?> <span>
                         无货
                          </span><?php endif; ?>
                           
                        </div>
                        <div class="list-cont">
                          <h5 class="goods-title"><?php echo $this->_var['goods']['goods_name']; ?>   <?php if ($this->_var['goods']['parent_id'] > 0): ?> 
                  <span style="color:#F00;"><?php echo $this->_var['lang']['accessories']; ?></span> 
                  <?php endif; ?> 
       
                  <?php if ($this->_var['goods']['is_gift'] > 0): ?> 
                  <span style="color:#F00;"><?php echo $this->_var['lang']['largess']; ?></span> 
                  <?php endif; ?> </h5>
                          <p class="godds-specification"><?php echo $this->_var['goods']['goods_attr']; ?></p>
                        </div>
                        
                      </div>
                      <?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
                      
                      
                      <div class="itemInfo list-info" id="itemInfo12">
                        <div class="list-img">
                          <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>">
         
                           <img src="themesmobile/68ecshopcom_mobile/images/flow/ico_cart_package.gif" style="border:#eee 1px solid;"></a>
                        </div>
                        <div class="list-cont">
                  <h5 class="goods-title"><?php echo $this->_var['goods']['goods_name']; ?>   
                  
                  <span style="color:#F00;"><?php echo $this->_var['lang']['remark_package']; ?></span> 
              	 </h5>
                      <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" ><span class="package">商品明细>></span></a>
                    
                        </div>

</div>

 <?php else: ?> 
 <?php echo $this->_var['goods']['goods_name']; ?> 
 <?php endif; ?>  
</li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        

                    
        <?php if ($this->_var['goodsinfo']['zhekou']): ?>
        <li class="flow_youhui_no">
       <?php if ($this->_var['goodsinfo']['zhekou']): ?><?php echo $this->_var['goodsinfo']['zhekou']['your_discount']; ?><?php endif; ?>
        </li>
        <?php endif; ?> 
        <?php if (( $this->_var['allow_use_bonus'] || $this->_var['allow_use_integral'] ) && $this->_var['goodsinfo']['goodlist']): ?>
        <li class="flow_youhui_no">
         
            <div class="checkout_other"> 
              <div class="jmbag" href="javascript:void(0);" onclick="showCheckoutOther(this);"><span class="right_arrow_flow"></span>使用店铺优惠券</div>
              <table class="subbox_other sub_bonus" width="100%">
                <?php if ($this->_var['allow_use_bonus']): ?>
                <tr>
             
                  <td  colspan="4"><select name="bonus[<?php echo $this->_var['key']; ?>]" onchange="changeBonus(this.value,<?php echo $this->_var['key']; ?>)" id="ECS_BONUS_<?php echo $this->_var['key']; ?>" class="">
                                <option value="0" <?php if ($this->_var['order']['bonus_id'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['lang']['please_select']; ?></option>
                                <?php $_from = $this->_var['goodsinfo']['redbag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');if (count($_from)):
    foreach ($_from AS $this->_var['bonus']):
?>
                                <option value="<?php echo $this->_var['bonus']['bonus_id']; ?>" <?php if ($this->_var['order']['bonus_id_info'] [ $this->_var['key'] ] == $this->_var['bonus']['bonus_id']): ?>selected<?php endif; ?>><?php echo $this->_var['bonus']['type_name']; ?>[<?php echo $this->_var['bonus']['bonus_money_formated']; ?>]</option>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                              </select><?php if ($this->_var['goodsinfo']['redbag']): ?><div class="clearfix" style="height:5px; line-height:5px;"></div><?php else: ?><?php endif; ?> <a href="javascript:void(0);" onclick="javascript:document.getElementById('Bonus_span_<?php echo $this->_var['key']; ?>').style.display='block';document.getElementById('Bonus_a_<?php echo $this->_var['key']; ?>').style.display='none';" class="a_other1_h" id="Bonus_a_<?php echo $this->_var['key']; ?>">或输入优惠券号</a>
                 <label id="Bonus_span_<?php echo $this->_var['key']; ?>" style="display:none; margin-top:10px;">
                                <input name="bonus_sn[<?php echo $this->_var['key']; ?>]" id="bonus_sn_<?php echo $this->_var['key']; ?>" type="text"  size="15" value="<?php if ($this->_var['order']['bonus_sn_info'] [ $this->_var['key'] ]): ?><?php echo $this->_var['order']['bonus_sn_info'][$this->_var['key']]; ?><?php else: ?>输入优惠券<?php endif; ?>" onfocus="if (value =='输入优惠券'){value =''}" onblur="if (value ==''){value='输入优惠券'}" class="txt1" style="width:120px;"/>
                                <input name="validate_bonus" type="button" value="使用" onclick="validateBonus(document.getElementById('bonus_sn_<?php echo $this->_var['key']; ?>').value,<?php echo $this->_var['key']; ?>)" class="BonusButton" />
                              </label>
                              </td>
                </tr>
                <?php endif; ?>              
              </table>
            </div>
       
        </li>
        <?php endif; ?> 
      
             <?php if ($this->_var['allow_use_surplus']): ?>
                <li class="flow_youhui_no">
         
            <div class="checkout_other">
            <div class="jmbag" href="javascript:void(0);" onclick="showCheckoutOther(this);"><span class="right_arrow_flow"></span>使用余额</div>
            <table class="subbox_other sub_bonus" width="100%">
                          <tr>
                       
                            <td >使用余额：<input name="surplus[<?php echo $this->_var['key']; ?>]" type="text" class="txt1" id="ECS_SURPLUS_<?php echo $this->_var['key']; ?>"  value="<?php echo empty($this->_var['order']['surplus_info'][$this->_var['key']]) ? '0' : $this->_var['order']['surplus_info'][$this->_var['key']]; ?>" onblur="changeSurplus(this.value,<?php echo $this->_var['key']; ?>)" <?php if ($this->_var['disable_surplus']): ?>disabled="disabled"<?php endif; ?> />
                              <span id="ECS_SURPLUS_NOTICE_<?php echo $this->_var['key']; ?>" class="notice"></span></td>
                          </tr>
                        </table>
            
            </div></li>
              
              <?php endif; ?> 

          <li class="flow_youhui_no" style="border:none;">
             <div class="checkout_other">
                <p class="flow_shipping">配送方式：</p><p><?php 
$k = array (
  'name' => 'get_shop_shipping',
  'suppid' => $this->_var['goodsinfo']['goodlist']['0']['supplier_id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
                
                <span id='picktxt<?php echo $this->_var['key']; ?>'>
		
        </span>
		</li>
            
        
     </ul>
     </div></section>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        


            
        <section class="f_mask" style="display: none;"></section>       

<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goodsinfo');$this->_foreach['glist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['glist']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goodsinfo']):
        $this->_foreach['glist']['iteration']++;
?> 
<?php $_from = $this->_var['goodsinfo']['goodlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?>    
<?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>                     
              
<div class="f_block" id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="position:fixed;bottom:0;left:0;height:0px;background:#FFF;z-index:99999999;overflow:hidden; width:100%;">
<p class="f_title"><span><?php echo $this->_var['goods']['goods_name']; ?></span><a class="c_close" href="javascript:void(0)" onClick="close_gift(<?php echo $this->_var['goods']['goods_id']; ?>)"></a></p>
<div class="f_content" style="">
<div class="choose-inner">

	<div class="gift-table">
	
        <div class="miblebox miblebox-cnt mible-suit">
      <ul class="list-suit">
    <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');$this->_foreach['package_goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['package_goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['package_goods_list']):
        $this->_foreach['package_goods_list']['iteration']++;
?>
              
              <li class="list-suit-item" <?php if (($this->_foreach['package_goods_list']['iteration'] == $this->_foreach['package_goods_list']['total'])): ?>style="border-bottom:none"<?php endif; ?> >
        <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" class="p-link">
        
							<div class="p-img" style="margin-left:10px;">
								<img src="./../<?php echo $this->_var['package_goods_list']['goods_thumb']; ?>" width="60" height="60">
                                
                                </div>
							<div class="p-info" style="margin-left:40px;">
								<h5 class="p-name"><?php echo $this->_var['package_goods_list']['goods_name']; ?></h5>
                               
								<div class="p-price"><?php echo $this->_var['package_goods_list']['shop_price']; ?> <span style="color:#000;">x <?php echo $this->_var['package_goods_list']['goods_number']; ?></span></div>
							</div>
						</a>
                        </li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </ul>
</div>
</div>
</div>
</div>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>     


    
                    
                    
                    
      </section>
  <script>selectShipping(document.getElementById('pay_ship_<?php echo $this->_var['goodsinfo']['goodlist']['0']['supplier_id']; ?>').value,<?php echo $this->_var['key']; ?>);</script>       
     <section class="order-info">
     <div class="order-list">
      <div class="content ptop0">

   <div class="panel panel-default info-box">
        
                 <?php if ($this->_var['is_exchange_goods'] != 1 || $this->_var['total']['real_goods_count'] != 0): ?>

                    <div class="panel-body" id="pay_div">

                      <div class="title" id="zhifutitle" style="border-bottom:1px solid #eeeeee;">
                        <span class="i-icon-arrow-down i-icon-arrow-up" id="zhifuip"></span>
                        <span class="text">支付方式</span>
                        <a href="javascript:void(0)" title="<?php echo $this->_var['lang']['modify']; ?><?php echo $this->_var['lang']['goods_list']; ?>" class="link">必选</a> <em class="qxz" id="emzhifu">请选择支付方式</em>
                      </div>
               <ul class="nav nav-list-sidenav" id="zhifu68" style="display:block; border-bottom:none;">
              <?php if ($this->_var['iswei']): ?>
              <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
              <?php if ($this->_var['payment']['pay_code'] == "weixin" || $this->_var['payment']['pay_code'] == "alipay" || $this->_var['payment']['pay_code'] == "balance" || $this->_var['payment']['pay_code'] == "cod"): ?>
              <li  class="clearfix">
                <label for="payment_method_<?php echo $this->_var['payment']['pay_id']; ?>" >
                  <input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?> checked="checked"<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?> class="c_checkbox_t" />
                  <div class="fl shipping_title"><?php echo $this->_var['payment']['pay_name']; ?><?php echo $this->_var['payment']['format_pay_fee']; ?></div></label>
                </li>
              <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <?php else: ?>
              <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
              <?php if ($this->_var['payment']['pay_code'] == "alipay" || $this->_var['payment']['pay_code'] == "balance" || $this->_var['payment']['pay_code'] == "cod"): ?>
              <li class="clearfix">
                <label for="payment_method_<?php echo $this->_var['payment']['pay_id']; ?>" class="ralabel">
                  <input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?> checked="checked"<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?> class="c_checkbox_t"/><div class="fl shipping_title">
                <?php echo $this->_var['payment']['pay_name']; ?></div></label>
              </li>
              <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <?php endif; ?>

                      </ul>

                    </div>
                    <?php else: ?>
                    <input type="radio" name="payment" value="-1" checked="checked" style="display:none"/>
                    <?php endif; ?>

              </div>
    <script type="text/javascript">
        $('li[name="payment_name"]:eq(3)').css('display', 'none');
    </script>
              
            </div>
      
      </div></section>
      
       <section class="order-info">
       <div class="order-list">
      <div class="content ptop0">
		<div class="panel panel-default info-box">
            <div class="orderInfo " >
                    <h4 class="seller-name">
                      <img src="themesmobile/68ecshopcom_mobile/images/flow/dingdan.png" width="28"> 其他选项                   
                    </h4>
      </div>
      <table border=0 cellpadding=0 cellspacing=0 width="100%" class="checkgoods">    
        <tr>
          <td colspan=4 class="tdother2" style="border-top:none;">
        <?php if ($this->_var['inv_content_list'] || $this->_var['how_oos_list']): ?>
        <div class="checkout_other" >
        <div class="jmbag" href="javascript:void(0);" onclick="showCheckoutOther(this);"><span class="right_arrow_flow"></span>开发票和缺货处理</div>
  
      
      <div class="subbox_other" width="100%">
    
        <?php if ($this->_var['inv_content_list']): ?>
          <div class="flow_bottom_list">

        <input name="need_inv" type="checkbox" id="ECS_NEEDINV" onclick="changeNeedInv()" value="1" class="b_checkbox" />
              <label class="mar-b" >是否开发票</label>              
              
           		<?php if ($this->_var['inv_type_list']): ?>
                 <div class="flow_bottom_list">
                <?php echo $this->_var['lang']['invoice_type']; ?>
                <select name="inv_type" disabled="disabled"  id="ECS_INVTYPE" onchange="changeNeedInv()">
                <?php echo $this->html_options(array('options'=>$this->_var['inv_type_list'],'selected'=>$this->_var['order']['inv_type'])); ?>
                </select>
                </div>
                <?php endif; ?>
               </div>
               
          <div class="flow_bottom_list"><?php echo $this->_var['lang']['invoice_content']; ?>
               <select name="inv_content" disabled="disabled" id="ECS_INVCONTENT" onchange="changeNeedInv()">
                  
						<?php echo $this->html_options(array('values'=>$this->_var['inv_content_list'],'output'=>$this->_var['inv_content_list'],'selected'=>$this->_var['order']['inv_content'])); ?>
							
                </select>
              </div>
        <div class="flow_bottom_list"><?php echo $this->_var['lang']['invoice_title']; ?>
                <input type="text" name="inv_payee" value="<?php echo $this->_var['order']['inv_payee']; ?>" disabled="disabled" class="txt1" id="ECS_INVPAYEE" onblur="changeNeedInv()"/>
                </div>
        <?php endif; ?> 

         <div class="flow_bottom_list">缺货处理：<?php $_from = $this->_var['how_oos_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('how_oos_id', 'how_oos_name');if (count($_from)):
    foreach ($_from AS $this->_var['how_oos_id'] => $this->_var['how_oos_name']):
?>
         <div style="margin-top:10px;">
          <label style="display:block; width:100%;"><input name="how_oos" class="c_checkbox_t" style="float:inherit" type="radio" value="<?php echo $this->_var['how_oos_id']; ?>" <?php if ($this->_var['order']['how_oos'] == $this->_var['how_oos_id']): ?>checked<?php endif; ?> onclick="changeOOS(this)" /><?php echo $this->_var['how_oos_name']; ?></label>
          </div>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         </div>
      </div>
       
    </div>
        <?php endif; ?> 
        </td>
      </tr>
      <tr>
       <td colspan=4 class="tdother2">
        <div class="checkout_other" id="show68" >
           <div class="jmbag" href="javascript:void(0);" onclick="showCheckoutOther(this);"><span class="right_arrow_flow" id="showip"></span> <span id="peisongtime">送货时间不限</span></div>
      <div class="subbox_other" width="100%" >
<div class="flow_bottom_list">
      <div style="margin-top:15px;">
      <label style="display:block; width:100%;"><input name='best_time' type="radio" value="送货时间不限"   style="float:inherit"  class="c_checkbox_t" checked=checked>送货时间不限</label></div><div style="margin-top:15px;"><label style="display:block; width:100%;" ><input name='best_time' type="radio" value="只双休日/节假日送货(工作日不用送)"  class="c_checkbox_t"  style="float:inherit">只双休日/节假日送货(工作日不用送)</label></div>
              <div style="margin-top:15px;"><label style="display:block; width:100%;"><input  style="float:inherit" name='best_time' type="radio" value="只工作日(双休日/节假日不用送)" class="c_checkbox_t">只工作日(双休日/节假日不用送)</label></div>       
          </div>   
        </div>
      </div>
      </td>
      </tr>
        <tr>
          <td colspan=4 class="tdother2">
        <div class="checkout_other" > 
           <div class="jmbag" href="javascript:void(0);" onclick="showCheckoutOther(this);"><span class="right_arrow_flow"></span>订单附言</div>
                <div class=" subbox_other">
                  <div class="flow_bottom_list">
                      <textarea name="postscript" cols="80" rows="3" id="postscript" style=" border:1px solid #e5e5e5"><?php echo htmlspecialchars($this->_var['order']['postscript']); ?></textarea>
                    </div>
                  </div>
                
            </div>
          </td>
        </tr>
    <script type="text/javascript">
    var fapiao_con = document.getElementById('ECS_INVCONTENT');
    if (fapiao_con.value=='0')
    {
      document.getElementById('ECS_INVPAYEE').disabled=true;
    }
    else
    {
      document.getElementById('ECS_INVPAYEE').disabled=false;
    }
    </script>
    </table>

<div class="con-ct fo-con"> <?php echo $this->fetch('library/order_total.lbi'); ?> </div>
<div class="panel panel-default info-box">
    <div class="pay-btn">
      <input onclick="return check_before_submit()" type="submit" class="sub-btn btnRadius" value="提交订单"/>
      <input type="hidden" name="step" value="done"></div>
  </div>
  </div></section></section>
 
  
  
      
    </form>
            <script type="text/javascript">
	
	function showCheckoutOther(obj)
	{
		var otherParent = obj.parentNode;
		otherParent.className = (otherParent.className=='checkout_other') ? 'checkout_other2' : 'checkout_other';
		var spanzi = obj.getElementsByTagName('span')[0];
	}
	
      </script>
    <?php endif; ?>
    <?php if ($this->_var['step'] == 'ziti'): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'order_pickpoint.js')); ?>
<link rel="stylesheet" href="themesmobile/68ecshopcom_mobile/css/ziti.css">
<div id="pickup_point_list" style="display: block;">
<div class="point-list" id="pointList">
<h3 class="title">选择自提点</h3>        
<?php $_from = $this->_var['pinfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
  <div  id="txt<?php echo $this->_var['key']; ?>" style="display:<?php if ($this->_var['key'] == $this->_var['district']): ?><?php else: ?>none<?php endif; ?>">
    <?php $_from = $this->_var['value']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'info');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['info']):
?>
      <div class="blockshow " >
      <div class="fl1 "> <a href="flow.php?step=doziti&sid=<?php echo $this->_var['suppid']; ?>&pid=<?php echo $this->_var['info']['id']; ?>">
        <ul>
          <li class="one"><img <?php if ($this->_var['info']['id'] == $this->_var['selectid']): ?>src="themesmobile/68ecshopcom_mobile/images/ziti_select.png"<?php else: ?>src="themesmobile/68ecshopcom_mobile/images/ziti_select_off.png"<?php endif; ?> width="20" height="20"></li>
          <li class="two">
            <h3><?php echo $this->_var['info']['shop_name']; ?></h3>
            <p><?php echo $this->_var['info']['address']; ?></p>
          </li>
          <div class="clear"></div>
        </ul>
        </a></div>
      <div class="telinfo"><span>联系人:<?php echo $this->_var['info']['contact']; ?></span><span><img src="themesmobile/68ecshopcom_mobile/images/tel.png"><?php echo $this->_var['info']['phone']; ?></span></div>
      </div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
<div class="point-list" id="pointList" style="display:none;"><h3 class="title">自提点列表</h3><div style="padding:10px 0;text-align:center; font-size:14px;">该区域下没有自提点</div></div>
<div style="height:20px; line-height:20px; clear:both;"></div>
    <?php endif; ?>
    <?php if ($this->_var['step'] == 'done'): ?>
    <div class="content_success " >
    <div class="con-ct   fo-con">
        <h4 class="successtijiao">订单已经提交成功！</h4>
      <ul class="ct-list">
     <?php if ($this->_var['split_order']['sub_order_count'] > 1): ?>
                <li style="height:auto;">由于您的商品由不同的商家发出，此订单将分为<font style="color:#ff3300;"><?php echo $this->_var['split_order']['sub_order_count']; ?></font>个不同的子订单配送：</li>
                  <?php else: ?>
                <li>您的商品将由<?php echo $this->_var['order']['shipping_name']; ?>为您配送：</li>
                <?php endif; ?>
                   <?php $_from = $this->_var['split_order']['suborder_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'suborder');if (count($_from)):
    foreach ($_from AS $this->_var['suborder']):
?>
                 <li >订单号：<em><?php echo $this->_var['suborder']['order_sn']; ?></em>

                </li>  

        <li>
         <?php echo $this->_var['order']['pay_name']; ?>：
          <em><?php echo $this->_var['suborder']['order_amount_formated']; ?></em>
        </li>
        <li>
          配送方式：
          <em class="price"><?php echo $this->_var['order']['shipping_name']; ?></em>
        </li>          
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>

    </div>
    <?php if ($this->_var['pay_online']): ?>
        <?php if ($this->_var['iswei']): ?>
   <?php if ($this->_var['order']['pay_name'] == "微信支付"): ?>
  <div class="pay-btn">
    <a href="weixinpay.php?oid=<?php echo $this->_var['order']['order_id']; ?>" class="sub-btn btnRadius">微支付</a>
  </div>
  <?php else: ?>
  <div class="pay-btn">
    <a href="./pay/alipayapi.php?out_trade_no=<?php echo $this->_var['order']['log_id']; ?>&total_fee=<?php echo $this->_var['total']['amount_formated_wap']; ?>" class="sub-btn btnRadius">去支付宝支付</a>
  </div>
  <?php endif; ?>
    <?php else: ?>
  <?php if ($this->_var['order']['pay_name'] == "支付宝"): ?>
  <div class="pay-btn">
    <a href="./pay/alipayapi.php?out_trade_no=<?php echo $this->_var['order']['log_id']; ?>&total_fee=<?php echo $this->_var['total']['amount_formated_wap']; ?>" class="sub-btn btnRadius">去支付宝支付</a>
  </div>
   <?php endif; ?>
  <?php endif; ?>
      <?php endif; ?>
<?php if ($this->_var['virtual_card']): ?>
  <div class="con-ct radius shadow fo-con">
    <ul class="ct-list">
       <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');$this->_foreach['virtual_card'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['virtual_card']['total'] > 0):
    foreach ($_from AS $this->_var['vgoods']):
        $this->_foreach['virtual_card']['iteration']++;
?>
          <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');$this->_foreach['vgoods_info'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['vgoods_info']['total'] > 0):
    foreach ($_from AS $this->_var['card']):
        $this->_foreach['vgoods_info']['iteration']++;
?>
      <li>
        <span class="type"><?php echo $this->_var['vgoods']['goods_name']; ?></span>
        <?php if ($this->_var['card']['card_sn']): ?>
        <span class="id"> <strong><?php echo $this->_var['lang']['card_sn']; ?><?php echo $this->_var['lang']['colon']; ?></strong>
          <?php echo $this->_var['card']['card_sn']; ?></em> 
      </span>
      <?php endif; ?>
            <?php if ($this->_var['card']['card_password']): ?>
      <span class="serial_code"> <strong><?php echo $this->_var['lang']['card_password']; ?><?php echo $this->_var['lang']['colon']; ?></strong>
        <em><?php echo $this->_var['card']['card_password']; ?></em>
      </span>
      <?php endif; ?>
            <?php if ($this->_var['card']['end_date']): ?>
      <span class="expire_date">
        <strong><?php echo $this->_var['lang']['end_date']; ?><?php echo $this->_var['lang']['colon']; ?></strong>
        <em><?php echo $this->_var['card']['end_date']; ?></em>
      </span>
      <?php endif; ?>
    </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </ul>
</div>
  <div class="con-ct radius shadow fo-con">
    <ul class="ct-list">
      <li><?php echo $this->_var['order_submit_back']; ?></li>
    </ul>
  </div>
<?php endif; ?>
</div>

    
    <?php endif; ?>
    <?php if ($this->_var['step'] != 'cart'): ?> <?php echo $this->fetch('library/page_footer.lbi'); ?> <?php endif; ?>
    <?php if ($this->_var['step'] != 'cart'): ?> <?php echo $this->fetch('library/footer_nav.lbi'); ?> <?php endif; ?> </div>

</div>
<script type="text/javascript">
function closeCustomer(){
	$("#choose").hide();
	}
function choose_gift(suppid)
{
	var sel_goods = new Array();
	var obj_cartgoods = document.getElementsByName("sel_cartgoods[]");
	var j = 0;
	for (i=0;i<obj_cartgoods.length;i++)
	{
		if(obj_cartgoods[i].checked == true)
		{	
			sel_goods[j] = obj_cartgoods[i].value;
			j++;
		}
	}
	Ajax.call('flow.php', 'is_ajax=1&suppid=' + suppid + '&sel_goods='+sel_goods, selgiftResponse, 'GET', 'JSON');
}
function selgiftResponse(res)
{
	$('#choose').html(res.result);
	$("#choose").animate({height:'80%'},[10000]);
		var total=0,h=$(window).height(),
        top =$('.f_title').height()||0,
        con = $('.f_content');
		total = 0.8*h;
		con.height(total-top+'px');
	$(".f_mask").show();

}
function close_choose(){	

	$(".f_mask").hide();
	$('#choose').animate({height:'0'},[10000]);

}
</script> 
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>

            
     
<div class="f_block" id="system_message" style="position:fixed;bottom:0;left:0;height:0px;background:#FFF;z-index:99999999;overflow:hidden; width:100%;">
<p class="f_title"><span>以下商品无货或库存不足</span><a class="c_close" href="javascript:void(0)" onClick="close_system()"></a></p>
<div class="f_content" style="">
<div class="choose-inner">

<div class="gift-table">

<div class="miblebox miblebox-cnt mible-suit">
      <ul class="list-suit">
    <?php $_from = $this->_var['out_of_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'out_of_goods');if (count($_from)):
    foreach ($_from AS $this->_var['out_of_goods']):
?>
     <li class="list-suit-item" <?php if (($this->_foreach['package_goods_list']['iteration'] == $this->_foreach['package_goods_list']['total'])): ?>style="border-bottom:none"<?php endif; ?> >
        <a href="goods.php?id=<?php echo $this->_var['out_of_goods']['goods_id']; ?>" class="p-link">
        <div class="p-img img_relative" style="margin-left:10px; margin-right:10px;">
        <?php if ($this->_var['out_of_goods']['goods_thumb']): ?>
								<img src="./../<?php echo $this->_var['out_of_goods']['goods_thumb']; ?>" width="60" height="60">
<?php else: ?>
<img src="themesmobile/68ecshopcom_mobile/images/flow/ico_cart_package.gif" width="60" height="60">
<?php endif; ?>
                                </div>
							<div class="p-info" style="margin-left:40px;">
								<h5 class="p-name"><?php echo $this->_var['out_of_goods']['goods_name']; ?></h5>
                               
								<div class="p-price">库存：<?php echo $this->_var['out_of_goods']['stock_num']; ?>&nbsp;&nbsp;<span style="color:#000;">购买数： <?php echo $this->_var['out_of_goods']['goods_number']; ?></span></div>
							</div>
						</a>
                        </li>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
            <div style="text-align:center;" class="btn_box">       
            <a href="flow.php?step=consignee" class="btn btn_cancel">改收货地址</a><a href="flow.php?step=cart"  class="btn btn_confirm">返回购物车</a> 
            </div>
</div>

</div>
</div>
</div>
</div>

<script>
function showdiv(){
	  $('#system_message').animate({height:'80%'},[10000]);
		var total=0,h=$(window).height(),
        top =$('#system_message').find('.f_title').height()||0,
		con = $('#system_message').find('.f_content');
		total = 0.8*h;
		con.height(total-top+'px');
		$('.f_mask').show();
	}
function close_system(){

	 $('.f_mask').hide();
	 var suit    = $('#system_message');
	 suit.animate({height:'0'},[10000]);

}
<?php if ($this->_var['out_of_goods']): ?>showdiv();<?php endif; ?>
</script>


 
</body>
</html>
