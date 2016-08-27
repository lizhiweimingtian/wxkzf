<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
		<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		
		<title><?php echo $this->_var['page_title']; ?></title>
		
		
		
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="icon" href="animated_favicon.gif" type="image/gif" />
		<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery-1.9.1.min.js"></script>
		<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
		
		<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js')); ?>
	</head>
	<body>
		<div id="site-nav">
			
			<div class="blank"></div>
			
			<div class="block clearfix">
				
				<div class="AreaL">
			      <div class="box"> 
				  	 
					 
			      </div>
			    </div>
			     
			    
			    <div class="AreaR">
			    	<div class="clearfix usBox_y" style="text-align:center;margin-top: 160px">
			    		<input type="button" class="bnt_blue_1" onclick="javascript:openText(1);" value="经济型团队" style="width: 200px;height: 200px;font-size: 25px;border-radius: 100px">
			    		<input type="button" class="bnt_blue_1" onclick="javascript:openText(2);" value="创业型团队" style="width: 200px;height: 200px;font-size: 25px;border-radius: 100px;margin-left: 50px">
			    	</div>
			    </div>
			    
			    <div style="height:10px; line-height:10px; clear:both;"></div>
			    <div class="blank"></div>
			</div>
			 
			
			
		</div>
	</body>
</html>