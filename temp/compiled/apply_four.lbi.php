<div class="headerLayout">
    <div class="headerCon ">
      <h1 id="mallLogo" style="padding-top:10px;"> <a href="index.php" class="header-logo"><img src="themes/68ecshopcom_360buy/images/header/logo.jpg" /></a></h1>
      <div class="header-extra">
       	 <div class="panel-heading">
            <div class="more">
                <div class="progress">
                    <div class="progress-wrap">
                        <div class="progress-item passed">
                            <div class="number">1</div>
                            <div class="progress-desc">入驻须知</div>
                        </div>
                    </div>
                    <div class="progress-wrap">
                        <div class="progress-item passed">
                            <div class="number">2</div>
                            <div class="progress-desc">公司信息认证</div>
                        </div>
                    </div>
                    <div class="progress-wrap">
                        <div class="progress-item passed">
                            <div class="number">3</div>
                            <div class="progress-desc">店铺信息认证</div>
                        </div>
                    </div>
                    <div class="progress-wrap">
                        <div class="progress-item passed">
                            <div class="number"><i class="tick"></i></div>
                            <div class="progress-desc">审核通过</div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
      </div>
    </div>
  </div>
<div class="store-joinin-apply">
  <div class="main">
	<div class="explain1"><i></i>您好，审核通过，您可以通过<a href="<?php echo $this->_var['mydomain']; ?>supplier/" target="_blank" style="color:#1381c0">供货商管理中心</a>来登录供货商后台！</div>
	<div class="joinin-pay">  
<table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="6">公司及联系人信息</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">公司名称：</th>
        <td colspan="5"><?php echo $this->_var['supplier']['company_name']; ?></td>
      </tr>
      <tr>
        <th class="w150">公司所在地：</th>
        <td>
		<select name="country" id="selCountries_0" onchange="region.changed(this, 1, 'selProvinces_0')" disabled>
		  <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['0']; ?></option>
		  <?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
		  <option value="<?php echo $this->_var['country']['region_id']; ?>" <?php if ($this->_var['supplier_country'] == $this->_var['country']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['country']['region_name']; ?></option>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</select>
		<select name="province" id="selProvinces_0" onchange="region.changed(this, 2, 'selCities_0')" disabled>
		  <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></option>
		  <?php $_from = $this->_var['province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
		  <option value="<?php echo $this->_var['province']['region_id']; ?>" <?php if ($this->_var['supplier']['province'] == $this->_var['province']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</select>
		<select name="city" id="selCities_0" onchange="region.changed(this, 3, 'selDistricts_0')" disabled>
		  <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></option>
		  <?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
		  <option value="<?php echo $this->_var['city']['region_id']; ?>" <?php if ($this->_var['supplier']['city'] == $this->_var['city']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</select>
		<select name="district" id="selDistricts_0" <?php if (! $this->_var['district_list']): ?>style="display:none"<?php endif; ?> disabled>
		  <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></option>
		  <?php $_from = $this->_var['district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
		  <option value="<?php echo $this->_var['district']['region_id']; ?>" <?php if ($this->_var['supplier']['district'] == $this->_var['district']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</select>
		</td>
        <th class="w150">公司详细地址：</th>
        <td colspan="3"><?php echo $this->_var['supplier']['address']; ?></td>
      </tr>
      <tr>
        <th class="w150">公司电话：</th>
        <td><?php echo $this->_var['supplier']['tel']; ?></td>
        <th class="w150">公司规模：</th>
        <td><?php echo $this->_var['supplier']['guimo']; ?></td>
        <th class="w150">公司类型：</th>
        <td><?php echo $this->_var['supplier']['company_type']; ?></td>
      </tr>
      <tr>
        <th class="w150">联系人姓名：</th>
        <td><?php echo $this->_var['supplier']['contacts_name']; ?></td>
        <th class="w150">联系人电话：</th>
        <td><?php echo $this->_var['supplier']['contacts_phone']; ?></td>
        <th class="w150">电子邮箱：</th>
        <td><?php echo $this->_var['supplier']['email']; ?></td>
      </tr>
    </tbody>
  </table>


  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="2">营业执照信息（副本）</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">营业执照号：</th>
        <td><?php echo $this->_var['supplier']['business_licence_number']; ?></td></tr><tr>
      </tr>
      <tr>
        <th class="w150">法定经营范围：</th>
        <td colspan="20"><?php echo $this->_var['supplier']['business_sphere']; ?></td>
      </tr>
      <tr>
        <th class="w150">营业执照号<br>电子版：</th>
        <td colspan="20"><?php if ($this->_var['supplier']['zhizhao']): ?><img src="data/supplier/<?php echo $this->_var['supplier']['zhizhao']; ?>" width=50 height=50>&nbsp;&nbsp;<input type="button" onclick="window.open('data/supplier/<?php echo $this->_var['supplier']['zhizhao']; ?>');" value="查看原图"><?php endif; ?></td>
      </tr>
    </tbody>
  </table>

  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="2">组织机构代码证</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">组织机构代码：</th>
        <td><?php echo $this->_var['supplier']['organization_code']; ?></td>
      </tr>
      <tr>
        <th class="w150">组织机构代码证<br>电子版：</th>
        <td><?php if ($this->_var['supplier']['organization_code_electronic']): ?><img src="data/supplier/<?php echo $this->_var['supplier']['organization_code_electronic']; ?>" width=50 height=50>&nbsp;&nbsp;<input type="button" onclick="window.open('data/supplier/<?php echo $this->_var['supplier']['organization_code_electronic']; ?>');" value="查看原图"><?php endif; ?></td>
      </tr>
    </tbody>
  </table>

  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="2">一般纳税人证明</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">一般纳税人证明：</th>
        <td><?php if ($this->_var['supplier']['general_taxpayer']): ?><img src="data/supplier/<?php echo $this->_var['supplier']['general_taxpayer']; ?>" width=50 height=50>&nbsp;&nbsp;<input type="button" onclick="window.open('data/supplier/<?php echo $this->_var['supplier']['general_taxpayer']; ?>');" value="查看原图"><?php endif; ?></td>
      </tr>
    </tbody>
  </table>

  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="2">开户银行信息</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">银行开户名：</th>
        <td><?php echo $this->_var['supplier']['bank_account_name']; ?></td>
      </tr><tr>
        <th class="w150">公司银行账号：</th>
        <td><?php echo $this->_var['supplier']['bank_account_number']; ?></td></tr>
      <tr>
        <th class="w150">开户银行支行名称：</th>
        <td><?php echo $this->_var['supplier']['bank_name']; ?></td>
      </tr>
      <tr>
        <th class="w150">支行联行号：</th>
        <td><?php echo $this->_var['supplier']['bank_code']; ?></td>
      </tr>
      <tr>
        <th class="w150">开户银行许可证<br>电子版：</th>
        <td colspan="20"><?php if ($this->_var['supplier']['bank_licence_electronic']): ?><img src="data/supplier/<?php echo $this->_var['supplier']['bank_licence_electronic']; ?>" width=50 height=50>&nbsp;&nbsp;<input type="button" onclick="window.open('data/supplier/<?php echo $this->_var['supplier']['bank_licence_electronic']; ?>');" value="查看原图"><?php endif; ?></td>
      </tr>
    </tbody>
    
  </table>

  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="2">结算账号信息</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">银行开户名：</th>
        <td><?php echo $this->_var['supplier']['settlement_bank_account_name']; ?></td>
      </tr>
      <tr>
        <th class="w150">公司银行账号：</th>
        <td><?php echo $this->_var['supplier']['settlement_bank_account_number']; ?></td>
      </tr>
      <tr>
        <th class="w150">开户银行支行名称：</th>
        <td><?php echo $this->_var['supplier']['settlement_bank_name']; ?></td>
      </tr>
      <tr>
        <th class="w150">支行联行号：</th>
        <td><?php echo $this->_var['supplier']['settlement_bank_code']; ?></td>
      </tr>
    </tbody>
    
  </table>

  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="2">税务登记证</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">税务登记证号：</th>
        <td><?php echo $this->_var['supplier']['tax_registration_certificate']; ?></td>
      </tr>
      <tr>
        <th class="w150">纳税人识别号：</th>
        <td><?php echo $this->_var['supplier']['taxpayer_id']; ?></td>
      </tr>
      <tr>
        <th class="w150">税务登记证号<br>电子版：</th>
        <td><?php if ($this->_var['supplier']['tax_registration_certificate_electronic']): ?><img src="data/supplier/<?php echo $this->_var['supplier']['tax_registration_certificate_electronic']; ?>" width=50 height=50>&nbsp;&nbsp;<input type="button" onclick="window.open('data/supplier/<?php echo $this->_var['supplier']['tax_registration_certificate_electronic']; ?>');" value="查看原图"><?php endif; ?></td>
      </tr>
    </tbody>
  </table>


  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
      <thead>
        <tr>
          <th colspan="2">店铺经营信息</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th class="w150">供货商名称：</th>
          <td><?php echo $this->_var['supplier']['supplier_name']; ?></td>
        </tr>
        <tr>
          <th class="w150">店铺等级：</th>
          <td><?php echo $this->_var['supplier']['rank_name']; ?>
		  </td>
        </tr>
        <tr>
          <th class="w150">店铺分类：</th>
          <td><?php echo $this->_var['supplier']['type_name']; ?></td>
        </tr>
        <tr>
          <th class="w150">审核意见：</th>
          <td colspan="2"><?php echo $this->_var['supplier']['supplier_remark']; ?></td>
        </tr>
	<tr>
	<th class="w150">审核状态：</th>
	<td  colspan="2"><select name="status" size=1 disabled><option value="0" <?php if ($this->_var['supplier']['status'] == '0'): ?>selected<?php endif; ?>>未审核</option><option value="1" <?php if ($this->_var['supplier']['status'] == '1'): ?>selected<?php endif; ?>>审核通过</option><option value="-1" <?php if ($this->_var['supplier']['status'] == '-1'): ?>selected<?php endif; ?>>审核不通过</option></select></td>
	</tr>
      </tbody>
    </table>

  </div>
  </div>
</div>
