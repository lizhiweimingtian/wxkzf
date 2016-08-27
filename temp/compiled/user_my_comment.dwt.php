<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v4_0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.6.2.min.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
<script>
function select_tag(rec_id,tag_id)
{
	var a = document.getElementById("tag_select_"+rec_id).value;
	var b = false;
	var c = new Array();
	var d = new Array();
	var e = 0;
	if (a != '')
	{
		var sa=a.split(",");
		for (var i = 0 ; i < sa.length ; i ++)
		{
			if (sa[i] == tag_id)
			{
				b = true;
				//sa.splice(i,1);
			}
			else
			{
				c[i] = sa[i];
			}
		}
		if (b == false)
		{
			c[c.length] = tag_id;	
		}
	}
	else
	{
		c[0] = tag_id;
	}
	for (var i = 0 ; i < c.length ; i ++)
	{
		if (Number(c[i]) > 0)
		{
			d[e] = c[i];
			e ++;
		}
	}
	
	
	
	var now_tag = d.join(",");
	if (b == false)
	{
		document.getElementById("tag_dt_"+rec_id+"_"+tag_id).className = "cur";
	}
	else
	{
		document.getElementById("tag_dt_"+rec_id+"_"+tag_id).className = '';	
	}
	document.getElementById("tag_select_"+rec_id).value = now_tag;
}

function check_my_comment_send(rec_id)
{
	if (document.getElementById("tag_select_"+rec_id).value == '' && document.getElementById("tags_zi_"+rec_id).innerHTML == '')
	{
		alert("给商品打个标签呗？");
		show_add_tags(rec_id);
		return false;	
	}
	if (document.getElementById("content_"+rec_id).value == '')
	{
		alert("请输入购买心得！");
		document.getElementById("content_"+rec_id).focus();
		return false;	
	}
}

function show_commtr(rec_id)
{
	if (document.getElementById("commtr_"+rec_id).style.display == "none")
	{
		document.getElementById("commtr_"+rec_id).style.display = "";	
	}
	else
	{
		document.getElementById("commtr_"+rec_id).style.display = "none";	
	}
}

function check_shaidan_send()
{
	if (document.getElementById("title").value == '')
	{
		alert("请输入标题！");
		document.getElementById("title").focus();
		return false;	
	}

	editor.sync();
	if (document.getElementById("message").value == '')
	{
		alert("请输入内容！");
		document.getElementById("message").focus();
		return false;	
	}

	var pic = document.getElementById("J_imageView").innerHTML;
	if (pic == '')
	{
		alert("请上传图片！");
		return false;	
	}
}

function add_tag_one(rec_id)
{
	var s=document.getElementById('tags_zi_'+rec_id);
	var lis=s.getElementsByTagName("li");
	var li= document.createElement("li");
	var txt = document.getElementById("add_tag_text_"+rec_id).value;
	
	if (txt == '')
	{
		alert("请输入标签内容！");
		document.getElementById("add_tag_text_"+rec_id).focus();
		return false;
	}
	
	li.innerHTML="<span>X</span><strong>"+txt+"</strong><input type='hidden' name='tags_zi[]' value='"+txt+"' />";
	s.appendChild(li);
		
	for (var i=0;i<lis.length;i++)
	{
		var str = lis[i].getElementsByTagName("strong");
		lis[i].innerHTML = "<span onclick='del_tag_one("+rec_id+","+i+")'>X</span><strong>"+str[0].innerHTML+"</strong><input type='hidden' name='tags_zi[]' value='"+str[0].innerHTML+"' />";
	}
	document.getElementById("add_tag_text_"+rec_id).value = '';
}
function del_tag_one(rec_id,n)
{
	var s=document.getElementById('tags_zi_'+rec_id);
	var lis=s.getElementsByTagName("li");
	for (var i=0;i<lis.length;i++)
	{
		if (i==n)
		{
			s.removeChild(lis[i]);
		}
	}
}
function hide_add_tags(rec_id)
{
	document.getElementById("add_tags_"+rec_id).style.display = "none";
}
function show_add_tags(rec_id)
{
	document.getElementById("add_tags_"+rec_id).style.display = "";
}
</script>
</head>
<body>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/base-2011.js"></script>
<div id="site-nav">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="blank"></div>

  <?php echo $this->fetch('library/ur_here.lbi'); ?>

<div class="block clearfix">
  
  <div class="AreaL">
    <div class="box"> <?php echo $this->fetch('library/user_info.lbi'); ?> <?php echo $this->fetch('library/user_menu.lbi'); ?> </div>
  </div>
  
  
  <div class="AreaR">
    <div class="box">
     <div class="box_1">
      <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">

			
            <?php if ($this->_var['action'] == 'my_comment'): ?>
            <div class="tabmenu">
            <ul class="tab pngFix">
              <li class="active"> <a href="#">商品评价/晒单（<?php echo $this->_var['num']['x']; ?>个待评价，<?php echo $this->_var['num']['y']; ?>个待晒单）</a> </li>
            </ul>
          </div>
            <div class="blank"></div>
            <table width="100%" border="0" cellspacing="1" cellpadding="0" class="item_list">
                <tr>
                    <th colspan="2">商品信息</th>
		            <th width="120">商品来源</th>
                    <th width="80">购买时间</th>
                    <th width="80">评价</th>
                    <th width="80">晒单</th>
                </tr>
                <?php $_from = $this->_var['item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                <tr>
                	<td width="50"><a href="<?php echo $this->_var['value']['url']; ?>" target="_blank">
                    <?php if ($this->_var['value']['goods_id'] > 0 && $this->_var['value']['extension_code'] != 'package_buy'): ?>
                       <img height="50" width="50" src="<?php echo $this->_var['value']['thumb']; ?>" />
                    <?php elseif ($this->_var['value']['goods_id'] > 0 && $this->_var['value']['extension_code'] == 'package_buy'): ?>
                                 <img src="themes/68ecshopcom_360buy/images/jmpic/ico_cart_package.gif" height="50" width="50"/>
                    <?php endif; ?> 
                    </a></td>
                    <td><a href="<?php echo $this->_var['value']['url']; ?>" target="_blank"><?php echo $this->_var['value']['goods_name']; ?></a></td>
		    <td align="center"><?php if ($this->_var['value']['supplier_id']): ?><a href="supplier.php?suppId=<?php echo $this->_var['value']['supplier_id']; ?>" target="_blank"><?php echo $this->_var['value']['shopname']; ?></a><?php else: ?><?php echo $this->_var['value']['shopname']; ?><?php endif; ?></td>
                    <td align="center"><?php echo $this->_var['value']['add_time_str']; ?></td>
                    <td align="center">
                    	<?php if ($this->_var['value']['comment_state'] == 0): ?><a href="javascript:;" onclick="show_commtr(<?php echo $this->_var['value']['rec_id']; ?>)">发表评价</a><?php endif; ?>
                        <?php if ($this->_var['value']['comment_state'] == 1): ?><a href="goods_comment.php?act=view&id=<?php echo $this->_var['value']['rec_id']; ?>" target="_blank">已评价</a><?php endif; ?>
                        <?php if ($this->_var['value']['comment_state'] == 1 && $this->_var['value']['comment_status'] == 0): ?><div style="color:#999">审核中</div><?php endif; ?>
                    </td>
                    <td align="center">
                    	<?php if ($this->_var['value']['shaidan_state'] == 0): ?><a href="user.php?act=shaidan_send&id=<?php echo $this->_var['value']['rec_id']; ?>" target="_blank">发表晒单</a><?php endif; ?>
                        <?php if ($this->_var['value']['shaidan_state'] == 1): ?><a href="goods_shaidan.php?act=view&id=<?php echo $this->_var['value']['shaidan_id']; ?>" target="_blank">已晒单</a><?php endif; ?>
                        <?php if ($this->_var['value']['shaidan_state'] == 1 && $this->_var['value']['shaidan_status'] == 0): ?><div style="color:#999">审核中</div><?php endif; ?>
                        <?php if ($this->_var['value']['shaidan_points'] > 0): ?><div style="color:#999">已获<?php echo $this->_var['value']['shaidan_points']; ?>积分</div><?php endif; ?>
                    </td>
                </tr>
                <?php if ($this->_var['value']['comment_state'] == 0): ?>
                <tr id="commtr_<?php echo $this->_var['value']['rec_id']; ?>" style="display:none">
                	<td colspan="6" style="background:#fffdee; padding:0px;">
                    	<div class="send_comment">
                        <form action="user.php?act=my_comment_send" method="post" onsubmit="return check_my_comment_send(<?php echo $this->_var['value']['rec_id']; ?>)">
                        <input type="hidden" name="goods_id" value="<?php echo $this->_var['value']['goods_id']; ?>" />
                        <input type="hidden" name="rec_id" value="<?php echo $this->_var['value']['rec_id']; ?>" />
                        <table width="100%" border="0" cellspacing="1" cellpadding="0">
                            <tr>
                                <th width="90">评分：</th>
                                <td>
                                	<input name="comment_rank" value="5" checked="checked" type="radio" /><img src="themes/68ecshopcom_360buy/images/stars5.gif" />
                                    <input name="comment_rank" value="4" type="radio" /><img src="themes/68ecshopcom_360buy/images/stars4.gif" />
                                    <input name="comment_rank" value="3" type="radio" /><img src="themes/68ecshopcom_360buy/images/stars3.gif" />
                                    <input name="comment_rank" value="2" type="radio" /><img src="themes/68ecshopcom_360buy/images/stars2.gif" />
                                    <input name="comment_rank" value="1" type="radio" /><img src="themes/68ecshopcom_360buy/images/stars1.gif" />
                                </td>
                            </tr>
                            <tr>
                                <th>标签：</th>
                                <td>
                                	<input type="hidden" id="tag_select_<?php echo $this->_var['value']['rec_id']; ?>" name="comment_tag" value="" />
                                	<dl class="tags clearfix">
                                    	<?php if ($this->_var['value']['goods_tags']): ?>
                                    	<?php $_from = $this->_var['value']['goods_tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?>
                                        <dt id="tag_dt_<?php echo $this->_var['value']['rec_id']; ?>_<?php echo $this->_var['tag']['tag_id']; ?>" onclick="select_tag(<?php echo $this->_var['value']['rec_id']; ?>,<?php echo $this->_var['tag']['tag_id']; ?>)"><?php echo $this->_var['tag']['tag_name']; ?></dt>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                        <?php endif; ?>
                                        <dd class="zdy" onclick="show_add_tags(<?php echo $this->_var['value']['rec_id']; ?>)">自定义</dd>
                                    </dl>
                                    
                                    <ul class="tags_zi clearfix" id="tags_zi_<?php echo $this->_var['value']['rec_id']; ?>"></ul>
                                    
                                    <div class="add_tags clearfix" id="add_tags_<?php echo $this->_var['value']['rec_id']; ?>" style="display:none">
                                    	<span onclick="hide_add_tags(<?php echo $this->_var['value']['rec_id']; ?>)">关闭</span>
                                    	<input type="text" id="add_tag_text_<?php echo $this->_var['value']['rec_id']; ?>" value="" />
                                        <input type="button" value="添加" onclick="add_tag_one(<?php echo $this->_var['value']['rec_id']; ?>)" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>心得：</th>
                                <td><textarea name="content" class="inputBorder" name="content" id="content_<?php echo $this->_var['value']['rec_id']; ?>" style="height:80px; width:580px;"></textarea></td>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <td>
                                	<input type="image" src="themes/68ecshopcom_360buy/images/send_comment.gif" style="float:left" />
                                    
                                    <div  style="float:left; padding:5px 0px 0 20px;"><input type="checkbox" name="hide_username" value="1" /> 匿名评价 </div>


                                </td>
                            </tr>
                        </table>

                        </form>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </table>

  			<div class="blank"></div>
            <?php if ($this->_var['item_list']): ?>
            <?php echo $this->fetch('library/pages.lbi'); ?>
            <?php else: ?>
            <table width="100%" border="0" cellspacing="1" cellpadding="0" class="item_list">
            	<tr>
           		   <td colspan="5" align="center">没有任何晒单评价记录</td>
              	</tr>
            </table>
            <?php endif; ?>
            <?php endif; ?>
            
            
            
            
            <?php if ($this->_var['action'] == 'shaidan_send'): ?>
            <div class="tabmenu">
            <ul class="tab pngFix">
              <li class="active"> <a href="#">发表晒单</a> </li>
            </ul>
          </div>
          <div class="blank"></div>
                <div style="padding:15px; border:dashed #ddd 1px;">
                	<strong>关于晒单帖：</strong><br />
　　您可以将自己的使用感受、选购建议、实物照片、使用场景、拆包过程等与网友们分享；<br />
　　每个商品前10位成功晒单者且图片数在3张及以上的客户可获得100个京豆奖励；其他用户不再奖励京豆；图书音像商品、赠品晒单帖不奖励京豆；<br />
　　请保证所上传的图片是原创的及合法的，否则京东商城有权删除图片及冻结帐号，且保留追究其法律责任的权利；<br />
　　<a target="_blank" href="article.php?id=36" style="color:#049">更多晒单说明</a>
                </div>
			
			
			
            	<div class="shaidan_form">
                    <form action="user.php?act=shaidan_save" method="post" onsubmit="return check_shaidan_send()">
                    <input type="hidden" name="goods_id" value="<?php echo $this->_var['goods']['goods_id']; ?>" />
                    <input type="hidden" name="rec_id" value="<?php echo $this->_var['goods']['rec_id']; ?>" />
                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <th width="90">晒单商品：</th>
                            <td><?php echo $this->_var['goods']['goods_name']; ?></td>
                        </tr>
                        <tr>
                            <th><span style="color:#F00">*</span> 标题：</th>
                            <td><input type="text" name="title" id="title" style="width:550px;" /></td>
                        </tr>
                        <tr>
                            <th><span style="color:#F00">*</span> 内容：</th>
                            <td>
							<script charset="utf-8" src="includes/kindeditor/kindeditor-min.js"></script>
                            <script charset="utf-8" src="includes/kindeditor/lang/zh_CN.js"></script>
                            <script>
                            	var editor;
                            	KindEditor.ready(function(K) {
									editor = K.create('textarea[name="message"]', {
									allowFileManager : false,
									items : [
										'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
										'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
										'insertunorderedlist', '|', 'emoticons']
									});
									
									K('#J_selectImage').click(function() {
										editor.loadPlugin('multiimage', function() {
											editor.plugin.multiImageDialog({
												clickFn : function(urlList) {
													var div = K('#J_imageView');
													div.html('');
													K.each(urlList, function(i, data) {
														div.append('<dl class="clearfix"><dt><img src="' + data.url + '" /></dt><dd><input type="hidden" name="img_srcs[]" value="' + data.url + '" /><textarea name="img_names[]" ></textarea></dd></dl>');
													});
													
													editor.hideDialog();
												}
											});
										});
									});
									
                            	});
				
                            </script>
                            <textarea name="message" id="message" style="width:90%;height:260px;visibility:hidden;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><span style="color:#F00">*</span> 上传图片：</th>
                            <td>
								<div><img style="cursor:pointer" id="J_selectImage" src="themes/68ecshopcom_360buy/images/send_shaidan_img.gif" /></div>
								<div id="J_imageView" class="simgs"></div>

                            </td>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <td>请上传3-20张照片，每张照片不超过4M，支持的照片格式为jpg，jpeg，png，gif； 可一次选择多张；</td>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <td>
                                <input type="image" src="themes/68ecshopcom_360buy/images/send_shaidan.gif" style="float:left" />
                                
                                <div  style="float:left; padding:5px 0px 0 20px;"><input type="checkbox" name="hide_username" value="1" /> 匿名评价 </div>
                                


                            </td>
                        </tr>
                    </table>
                    </form>
                </div>

            <?php endif; ?>

      </div>
     </div>
    </div>
  </div>
  
</div>
<div class="blank"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/site_bar.lbi'); ?>
</div>
</body>
<script type="text/javascript">
<?php $_from = $this->_var['lang']['clips_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</script>
</html>
