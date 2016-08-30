
<style type="text/css">
#site-nav .sn-login-info{position:absolute;left:75px;top:0px}
#site-nav ul.region{position:absolute;left:0px;top:0px}
#site-nav ul.region .tubiao{background:url(themes/68ecshopcom_360buy/images/header/17.png) no-repeat scroll -5px 0px transparent;height: 18px;width: 12px;display: inline-block;float:left;margin:6px 2px 2px}
#site-nav ul.region li{float:left;position:relative;padding:1px 7px;line-height:20px;cursor:pointer;z-index:99999999;height:20px;margin:5px 0 0 5px;background:#ff3300;}
#site-nav ul.region li #city-box1{position:absolute;overflow-y:auto;overflow-x:hidden;padding:10px;border:1px solid #ccc;background:#fff;width:400px;height:200px;top:20px;left:0px;}
#site-nav ul.region li #city-box1 table td.nowcityname{border-bottom:1px solid #ddd;color:#333}
#site-nav ul.region li #city-box1 table td.city_key{padding:10px 0px 0px}
#site-nav ul.region li #city-box1 table td.city_key b{width:21px;height: 19px;background: url('themes/68ecshopcom_360buy/images/header/change_city3.gif') no-repeat;text-align: center;line-height: 19px;color: #FFF;font-family: Arial;font-size: 14px;font-weight: normal; display:inline-block;}
#site-nav a.region_name{padding:3px;color:#333}
#site-nav a.region_name:hover{background:#ff3300;color:#ffffff; text-decoration:none}
</style>
<ul class="region">
  <script type="text/javascript">
	function show_city1(){
	var qs=document.getElementById('city-box1');
	qs.style.display="block";
	}
	function hide_city1(){
	var qs=document.getElementById('city-box1');
	qs.style.display="none";
	}
	
	function chang_city(kk,level)
	{
		Ajax.call('region_city.php', 'act=setcity&rid=' + kk + '&type='+level , set_city_response, 'GET', 'JSON');
	}
	function set_city_response(result){
		 document.cookie="region_1="+result.cookieinfo['region_1'];
		 document.cookie="region_2="+result.cookieinfo['region_2'];
		 document.cookie="region_3="+result.cookieinfo['region_3'];
		 document.cookie="region_4="+result.cookieinfo['region_4'];
		//alert(result.result);
		top.location.reload();
	}
	
	</script> 
  <b class="tubiao"></b>
  <li onMouseOver="show_city1();" onMouseOut="hide_city1();"><font style="color:#fff;" id='header_city_name'><?php echo $this->_var['nowcityname']; ?></font>
    <div id="city-box1" style="display:none;">
      <table width="100%" cellpadding=5 cellspacing=1>
        <tr>
          <td class="nowcityname" colspan=2>当前城市：<b id='header_city_name2'><?php echo $this->_var['nowcityname']; ?></b></td>
        </tr>
        <?php $_from = $this->_var['zimu_city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('city_key', 'city_val');if (count($_from)):
    foreach ($_from AS $this->_var['city_key'] => $this->_var['city_val']):
?>
        <tr>
          <td width="8%" valign="top" class="city_key" style=""><b><?php echo $this->_var['city_key']; ?></b></td>
          <td valign="top"  class="city_key"> 
          <?php $_from = $this->_var['city_val']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ccity_0_38560000_1472526504');if (count($_from)):
    foreach ($_from AS $this->_var['ccity_0_38560000_1472526504']):
?> 
          	<a href="javascript:void(0)" onclick="chang_city(<?php echo $this->_var['ccity_0_38560000_1472526504']['region_id']; ?>,<?php echo $this->_var['ccity_0_38560000_1472526504']['level']; ?>)" class="region_name"><?php echo $this->_var['ccity_0_38560000_1472526504']['region_name']; ?></a>&nbsp;
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
          </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </table>
    </div>
  </li>
</ul>
