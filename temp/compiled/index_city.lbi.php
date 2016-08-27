<style type="text/css">
.bg {
	background-color: #000000;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;/*FF IE7*/
	filter: alpha(opacity=60);/*IE*/
	opacity: 0.6;/*FF*/
	z-index: 100000;
	position: fixed!important;/*FF IE7*/
	position: absolute;/*IE6*/
_top:       expression(eval(document.compatMode &&  document.compatMode=='CSS1Compat') ?  documentElement.scrollTop + (document.documentElement.clientHeight-this.offsetHeight)/2 :/*IE6*/
 document.body.scrollTop + (document.body.clientHeight - this.clientHeight)/2);/*IE5 IE5.5*/
}
#index_city_form {
	display: none;
	position: fixed;
	z-index: 100001;
	text-align: center;
	background: #ffffff;
	line-height: 40px;
	font-size: 14px;
	width: 600px;
	height: auto;
	border: 3px solid #808080;
}
.index_city_tit {
	background: #F3F3F3;
	font-size: 16px;
	height: 54px;
	line-height: 54px;
	text-indent: 23px;
	text-align: left;
	position: relative;
	color: #E31939;
}
.index_city_close {
	display: block;
	width: 13px;
	height: 13px;
	background: url(themes/68ecshopcom_360buy/images/dialog.png) no-repeat left top;
	position: absolute;
	right: 20px;
	top: 20px;
	cursor: pointer;
}
#index_city_form .index_city_con {
	width: 90%;
	min-height: 280px;
	height: 100%;
	padding: 20px 3% 20px 7%;
	margin: 0 auto;
	text-align: center
}
#index_city_form .index_city_con ul{
	width:100%;
	height:auto;
	margin:0 auto;
}
#index_city_form .index_city_con ul li {
	float: left;
	width: 16.5%;
	height: 35px;
	line-height: 35px;
	display: inline-block;
	text-align: left;
}
#index_city_form .index_city_con ul li a {
	padding: 3px 15px;
	font-weight: normal;
	color: #999;
}
#index_city_form .index_city_con ul li a:hover {
	background: #F3F3F3;
	color: #E31939;
	border-radius: 5px;
	text-decoration: none;
}
</style>

<div id="index_city_form">
  <div class="index_city_tit">请选择您的收货地区<span class="index_city_close"></span></div>
  <div class="index_city_con">
  	<ul>
	<?php $_from = $this->_var['citys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'ccity');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['ccity']):
?>
    	<li><a href="javascript:void(0)" onclick="select_city(<?php echo $this->_var['key']; ?>,2)"><?php echo $this->_var['ccity']['region_name']; ?></a></li>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
  </div>
</div>
<script>
$(function(){
	document.getElementById('index_city_form').style.display = 'block';
    document.getElementById('bg').style.display='block';
	$('#index_city_form').css('left',($(window).width()-500)/2);
	$('#index_city_form').css('top',($(window).height()-300)/2);
	$('.index_city_close').click(function(){
		$('#index_city_form').hide();	
		document.getElementById('bg').style.display='none';
	})
})

function select_city(kk,type)
{
	Ajax.call('region_city.php', 'act=setcity&rid=' + kk + '&type='+type , select_city_response, 'GET', 'JSON');
}
function select_city_response(result){
	 document.cookie="region_1="+result.cookieinfo['region_1'];
	 document.cookie="region_2="+result.cookieinfo['region_2'];
	 document.cookie="region_3="+result.cookieinfo['region_3'];
	 document.cookie="region_4="+result.cookieinfo['region_4'];
	 set_cookie_expires(result.cookieinfo['region_1'],result.cookieinfo['region_2'],result.cookieinfo['region_3'],result.cookieinfo['region_4']);
	top.location.reload();
}
function set_cookie_expires(region_1,region_2,region_3,region_4){
	var exp = new Date(); 
	exp.setTime(exp.getTime() + 365*24*60*60*1000);
	var value = region_1+','+region_2;
	if(region_3 > 0){
		value += ','+region_3;
	}
	if(region_4 > 0){
		value += ','+region_4;
	}
	document.cookie = "region_select="+value+";expires=" + exp.toGMTString();
}
</script> 