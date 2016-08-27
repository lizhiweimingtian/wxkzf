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
<link rel="stylesheet" type="text/css" href="themes/68ecshopcom_360buy/css/shopne_commin.css" />
<link href="themes/68ecshopcom_360buy/css/store_joinin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery-1.9.1.min.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js')); ?>
</head>
<body>
<div id="site-nav"> 
	<?php echo $this->fetch('library/user_header.lbi'); ?> 
    <?php 
$k = array (
  'name' => 'apply_supplier',
  'id' => $this->_var['userid'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?> 
	<?php echo $this->fetch('library/page_footer.lbi'); ?> 
</div>
</body>
<script type="text/javascript">
function setImagePreview(docObj,localImagId,imgObjPreview) 
{
    if(docObj.files && docObj.files[0])
    {
	//火狐下，直接设img属性
	imgObjPreview.style.display = 'block';
	imgObjPreview.style.width = '300px';
	imgObjPreview.style.height = '200px';                    

	//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式  
	imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
    }
    else
    {
	//IE下，使用滤镜
	docObj.select();
	docObj.blur();
	var imgSrc = document.selection.createRange().text;

	//必须设置初始大小
	localImagId.style.width = "300px";
	localImagId.style.height = "200px";

	//图片异常的捕捉，防止用户修改后缀来伪造图片
	try
	{
	    localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
	    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
	 }
	 catch(e)
	 {
	    alert("您上传的图片格式不正确，请重新选择!");
	    return false;
	  }                          
	  imgObjPreview.style.display = 'none';
	  document.selection.empty();
    }
    return true;
}
</script>
</html>
