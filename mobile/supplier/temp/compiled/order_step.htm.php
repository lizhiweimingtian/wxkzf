<?php if ($this->_var['full_page'] == 1): ?>
<!DOCTYPE HTML>
<html>
  <head>
    <?php echo $this->fetch('html_header.htm'); ?>
    <script src='js/region.js'></script>
  </head>
  <body>
<div id='container'> <?php endif; ?>
  <?php echo $this->fetch('page_header.htm'); ?>
      <!--修改收货人信息-->
  <?php if ($this->_var['step'] == 'consignee'): ?>
  <section>
    <div class="order_con">
      <div class="order_pd">
        <div class="order">
          <form name="theForm" action="order.php?act=step_post&step=<?php echo $this->_var['step']; ?>&order_id=<?php echo $this->_var['order_id']; ?>&step_act=<?php echo $this->_var['step_act']; ?>" method="post" onsubmit="return checkConsignee()">
            <div class="order_list_buyer">
              <table width="100%" cellpadding="3" cellspacing="1" >
                <?php if ($this->_var['address_list']): ?>
                <tr>
                  <td align="left" colspan="2"><?php echo $this->_var['lang']['address_list']; ?></td>
                
                <tr>
                
                <tr>
                  <td colspan="2"><select onchange="loadAddress(this.value)">
                      <option value="0" selected><?php echo $this->_var['lang']['select_please']; ?></option>
                      
                          <?php $_from = $this->_var['address_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'address');if (count($_from)):
    foreach ($_from AS $this->_var['address']):
?>
                      <option value="<?php echo $this->_var['address']['address_id']; ?>" <?php if ($_GET['address_id'] == $this->_var['address']['address_id']): ?>selected<?php endif; ?>><?php echo htmlspecialchars($this->_var['address']['consignee']); ?> <?php echo $this->_var['address']['email']; ?> <?php echo htmlspecialchars($this->_var['address']['address']); ?> <?php echo htmlspecialchars($this->_var['address']['tel']); ?></option>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        
                    </select></td>
                </tr>
                <?php endif; ?>
                <tr>
                  <td align="left" width="30%"><?php echo $this->_var['lang']['label_consignee']; ?></td>
                  <td><input name="consignee" type="text" value="<?php echo $this->_var['order']['consignee']; ?>" class="input_buyer"/>
                    <?php echo $this->_var['lang']['require_field']; ?> </td>
                </tr>
                <?php if ($this->_var['exist_real_goods']): ?>
                <tr>
                  <td align="left"><?php echo $this->_var['lang']['label_area']; ?></td>
                  <td><select name="country" id="selCountries" onChange="region.changed(this, 1, 'selProvinces')">
                      <option value="0" selected="true"><?php echo $this->_var['lang']['select_please']; ?></option>
                      
                          <?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
                          
                      <option value="<?php echo $this->_var['country']['region_id']; ?>" <?php if ($this->_var['order']['country'] == $this->_var['country']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['country']['region_name']; ?></option>
                      
                          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        
                    </select>
                    <select name="province" id="selProvinces" onChange="region.changed(this, 2, 'selCities')">
                      <option value="0"><?php echo $this->_var['lang']['select_please']; ?></option>
                      
                          <?php $_from = $this->_var['province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
                          
                      <option value="<?php echo $this->_var['province']['region_id']; ?>" <?php if ($this->_var['order']['province'] == $this->_var['province']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
                      
                          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        
                    </select>
                    <select name="city" id="selCities" onchange="region.changed(this, 3, 'selDistricts')">
                      <option value="0"><?php echo $this->_var['lang']['select_please']; ?></option>
                      <!-- <?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?> -->
                      <option value="<?php echo $this->_var['city']['region_id']; ?>" <?php if ($this->_var['order']['city'] == $this->_var['city']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
                      <!-- <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> -->
                    </select>
                    <select name="district" id="selDistricts">
                      <option value="0"><?php echo $this->_var['lang']['select_please']; ?></option>
                      <!-- <?php $_from = $this->_var['district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?> -->
                      <option value="<?php echo $this->_var['district']['region_id']; ?>" <?php if ($this->_var['order']['district'] == $this->_var['district']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
                      <!-- <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> -->
                    </select>
                    <?php echo $this->_var['lang']['require_field']; ?> </td>
                </tr>
                <?php endif; ?>
                <tr>
                  <td align="left"><?php echo $this->_var['lang']['label_email']; ?></td>
                  <td><input name="email" type="text" value="<?php echo $this->_var['order']['email']; ?>"  class="input_buyer"/>
                    <?php echo $this->_var['lang']['require_field']; ?> </td>
                </tr>
                <?php if ($this->_var['exist_real_goods']): ?>
                <tr>
                  <td align="left"><?php echo $this->_var['lang']['label_address']; ?></td>
                  <td><input name="address" type="text" value="<?php echo $this->_var['order']['address']; ?>"  class="input_buyer"/>
                    <?php echo $this->_var['lang']['require_field']; ?> </td>
                </tr>
                <tr>
                  <td align="left"><?php echo $this->_var['lang']['label_zipcode']; ?></td>
                  <td><input name="zipcode" type="text" value="<?php echo $this->_var['order']['zipcode']; ?>"  class="input_buyer"/></td>
                </tr>
                <?php endif; ?>
                <tr>
                  <td align="left"><?php echo $this->_var['lang']['label_tel']; ?></td>
                  <td><input name="tel" type="text" value="<?php echo $this->_var['order']['tel']; ?>"  class="input_buyer"/>
                    <?php echo $this->_var['lang']['require_field']; ?> </td>
                </tr>
                <tr>
                  <td align="left"><?php echo $this->_var['lang']['label_mobile']; ?></td>
                  <td><input name="mobile" type="text" value="<?php echo $this->_var['order']['mobile']; ?>"  class="input_buyer"/></td>
                </tr>
                <?php if ($this->_var['exist_real_goods']): ?>
                <tr>
                  <td align="left"><?php echo $this->_var['lang']['label_sign_building']; ?></td>
                  <td><input name="sign_building" type="text" value="<?php echo $this->_var['order']['sign_building']; ?>"  class="input_buyer"/></td>
                </tr>
                <tr>
                  <td align="left"><?php echo $this->_var['lang']['label_best_time']; ?></td>
                  <td><input name="best_time" type="text" value="<?php echo $this->_var['order']['best_time']; ?>"  class="input_buyer"/></td>
                </tr>
                <?php endif; ?>
              </table>
              <p align="center">
                <input name="<?php if ($this->_var['step_act'] == 'add'): ?>next<?php else: ?>finish<?php endif; ?>" type="submit" class="button" value="确定" />
                <input type="button" value="取消" class="button" onclick="history.back()" />
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
      <!--修改费用信息-->
  <?php elseif ($this->_var['step'] == 'money'): ?>
  <section>
    <div class="order_con">
      <div class="order_pd">
        <div class="order">
          <form name="theForm" action="order.php?act=step_post&step=<?php echo $this->_var['step']; ?>&order_id=<?php echo $this->_var['order_id']; ?>&step_act=<?php echo $this->_var['step_act']; ?>" method="post">
            <div class="order_list_fee">
              <table width="100%" cellpadding="3" cellspacing="1" >
                <tr>
                  <td align="left" width="50%">商品总金额：<?php echo $this->_var['order']['formated_goods_amount']; ?></td>
                  <td align="left" width="50%">折扣：
                    <input name="discount" type="text" id="discount" value="<?php echo $this->_var['order']['discount']; ?>" class="input_fee"/></td>
                </tr>
                <tr>
                  <td>发票税额：
                    <input name="tax" type="text" id="tax" value="<?php echo $this->_var['order']['tax']; ?>" class="input_fee"/></td>
                  <td>订单总金额：<?php echo $this->_var['order']['formated_total_fee']; ?></td>
                </tr>
                <tr>
                  <td>配送费用：
                    <input name="shipping_fee" type="text" value="<?php echo $this->_var['order']['shipping_fee']; ?>" class="input_fee"/></td>
                  <td>已付款金额：<?php echo $this->_var['order']['formated_money_paid']; ?></td>
                </tr>
                <tr>
                  <td>保价费用：
                    <input name="insure_fee" type="text" value="<?php echo $this->_var['order']['insure_fee']; ?>" class="input_fee"/></td>
                  <td>支付费用：
                    <input name="pay_fee" type="text" value="<?php echo $this->_var['order']['pay_fee']; ?>" class="input_fee"/></td>
                </tr>
                <tr>
                  <td>包装费用：
                    <input name="pack_fee" type="text" value="" class="input_fee"/></td>
                  <td>贺卡费用：
                    <input name="card_fee" type="text" value="" class="input_fee"/></td>
                </tr>
                <tr>
                  <td colspan="2">使用余额：<?php if ($this->_var['order']['user_id'] > 0): ?>
                    <input name="surplus" type="text" value="<?php echo $this->_var['order']['surplus']; ?>" class="input_fee_t">
                    <?php endif; ?> <?php echo $this->_var['lang']['available_surplus']; ?><?php echo empty($this->_var['available_user_money']) ? '0' : $this->_var['available_user_money']; ?> </td>
                </tr>
                <tr>
                  <td colspan="2"><?php echo $this->_var['lang']['label_integral']; ?><?php if ($this->_var['order']['user_id'] > 0): ?>
                    <input name="integral" type="text" value="<?php echo $this->_var['order']['integral']; ?>"  class="input_fee_t">
                    <?php endif; ?> <?php echo $this->_var['lang']['available_integral']; ?><?php echo empty($this->_var['available_pay_points']) ? '0' : $this->_var['available_pay_points']; ?> </td>
                </tr>
                <tr>
                  <td colspan="2"> 使用红包：
                    <select name="bonus_id">
                      <option value="0" <?php if ($this->_var['order']['bonus_id'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['lang']['select_please']; ?></option>
                      
                        <?php $_from = $this->_var['available_bonus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');if (count($_from)):
    foreach ($_from AS $this->_var['bonus']):
?>
                        
                      <option value="<?php echo $this->_var['bonus']['bonus_id']; ?>" <?php if ($this->_var['order']['bonus_id'] == $this->_var['bonus']['bonus_id']): ?>selected<?php endif; ?> money="<?php echo $this->_var['bonus']['type_money']; ?>"><?php echo $this->_var['bonus']['type_name']; ?> - <?php echo $this->_var['bonus']['type_money']; ?></option>
                      
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        
                    </select></td>
                </tr>
                <tr>
                  <td colspan="2">应付款金额：622.00</td>
                </tr>
              </table>
              <p align="center">
                <input name="finish" type="submit" class="button" value="完成" />
                <input type="button" value="取消" class="button" onclick="history.back()" />
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
      <!--修改配送方式-->
      <?php elseif ($this->_var['step'] == "shipping"): ?>
      <section>
        <div class="order_con">
          <div class="order_pd">
            <div class="order">
              <form name="theForm" action="order.php?act=step_post&step=<?php echo $this->_var['step']; ?>&order_id=<?php echo $this->_var['order_id']; ?>&step_act=<?php echo $this->_var['step_act']; ?>" method="post" onsubmit="return checkShipping()">
            <div class="order_list_fee">
              <table cellpadding="" cellspacing="0" width="100%" class="shipping">
                <tr class="first">
                  <td width="5%">&nbsp;</td>
                  <td width="25%" align="left"><?php echo $this->_var['lang']['name']; ?></td>
                  <td width="25%" align="center"><?php echo $this->_var['lang']['shipping_fee']; ?></td>
                  <td width="25%" align="center"><?php echo $this->_var['lang']['free_money']; ?></td>
                  <td width="20%" align="center"><?php echo $this->_var['lang']['insure']; ?></td>
                </tr>
                    <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
                    <tr>
                      <td><input name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" <?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>checked<?php endif; ?> onclick="" /></td>
                      <td><?php echo $this->_var['shipping']['shipping_name']; ?></td>
                  <td align="center"><?php echo $this->_var['shipping']['format_shipping_fee']; ?></td>
                  <td align="center"><?php echo $this->_var['shipping']['free_money']; ?></td>
                  <td align="center"><?php echo $this->_var['shipping']['insure']; ?></td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <tr class="last">
                  <td colspan="5" align="right"><input name="insure" type="checkbox" value="1" <?php if ($this->_var['order']['insure_fee'] > 0): ?>checked<?php endif; ?> />
                    <?php echo $this->_var['lang']['want_insure']; ?>
                </tr>
                  </td>
                
              </table>
              <p align="center"> <?php if ($this->_var['step_act'] == "add"): ?>
                <input type="button" value="<?php echo $this->_var['lang']['button_prev']; ?>" class="button" onclick="history.back()" />
                <?php else: ?><span style="width:13%;display:inline-block;float:left;height:25px;"></span><?php endif; ?>
                <input name="<?php if ($this->_var['step_act'] == 'add'): ?>next<?php else: ?>finish<?php endif; ?>" type="submit" class="button" value="<?php if ($this->_var['step_act'] == 'add'): ?><?php echo $this->_var['lang']['button_next']; ?><?php else: ?><?php echo $this->_var['lang']['button_submit']; ?><?php endif; ?>" />
                <input type="button" value="<?php echo $this->_var['lang']['button_cancel']; ?>" class="button" onclick="location.href='order.php?act=process&func=cancel_order&order_id=<?php echo $this->_var['order_id']; ?>&step_act=<?php echo $this->_var['step_act']; ?>'" />
              </p>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </section>
      <!--修改支付方式-->
      <?php elseif ($this->_var['step'] == "payment"): ?>
      <section>
        <div class="order_con">
          <div class="order_pd">
            <div class="order">
              <form name="theForm" action="order.php?act=step_post&step=<?php echo $this->_var['step']; ?>&order_id=<?php echo $this->_var['order_id']; ?>&step_act=<?php echo $this->_var['step_act']; ?>" method="post" onsubmit="return checkPayment()">
            <div class="order_list_fee">
              <table cellpadding="" cellspacing="0" width="100%" class="shipping">
                <tr class="first">
                  <td width="5%">&nbsp;</td>
                  <td width="65%" align="left"><?php echo $this->_var['lang']['name']; ?></td>
                  <td width="30%" align="center"><?php echo $this->_var['lang']['pay_fee']; ?></td>
                </tr>
                <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                <tr>
                  <td><input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?>checked<?php endif; ?> /></td>
                  <td><?php echo $this->_var['payment']['pay_name']; ?></td>
                  <td align="center"><?php echo $this->_var['payment']['pay_fee']; ?></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </table>
              <p align="center"> <?php if ($this->_var['step_act'] == "add"): ?>
                <input type="button" value="<?php echo $this->_var['lang']['button_prev']; ?>" class="button" onclick="history.back()" />
                <?php else: ?><span style="width:13%;display:inline-block;float:left;height:25px;"></span><?php endif; ?>
                <input name="<?php if ($this->_var['step_act'] == 'add'): ?>next<?php else: ?>finish<?php endif; ?>" type="submit" class="button" value="<?php if ($this->_var['step_act'] == 'add'): ?><?php echo $this->_var['lang']['button_next']; ?><?php else: ?><?php echo $this->_var['lang']['button_submit']; ?><?php endif; ?>" />
                <input type="button" value="<?php echo $this->_var['lang']['button_cancel']; ?>" class="button" onclick="location.href='order.php?act=process&func=cancel_order&order_id=<?php echo $this->_var['order_id']; ?>&step_act=<?php echo $this->_var['step_act']; ?>'" />
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <?php echo $this->fetch('page_footer.htm'); ?>
  <?php if ($this->_var['full_page'] == 1): ?>
  <?php echo $this->fetch('static_div.htm'); ?> </div>
</body>
</html>
<?php endif; ?>