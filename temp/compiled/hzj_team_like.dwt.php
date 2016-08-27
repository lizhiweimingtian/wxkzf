<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<meta name="Generator" content="ECSHOP v4_0" />
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
			.win_dialog {
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
			.win_dialog_tit {
				background: #F3F3F3;
				font-size: 16px;
				height: 54px;
				line-height: 54px;
				text-indent: 23px;
				text-align: left;
				position: relative;
				color: #E31939;
			}
			.win_dialog_close {
				display: block;
				width: 13px;
				height: 13px;
				background: url(themes/68ecshopcom_360buy/images/dialog.png) no-repeat left top;
				position: absolute;
				right: 20px;
				top: 20px;
				cursor: pointer;
			}
			.win_dialog_con {
				width: 90%;
				min-height: 280px;
				height: 100%;
				padding: 20px 3% 20px 7%;
				margin: 0 auto;
				text-align: center
			}
		</style>
	</head>
	<body>
		<div id="site-nav">
			<?php echo $this->fetch('library/page_header.lbi'); ?>
			<div class="blank"></div>
			<?php echo $this->fetch('library/ur_here.lbi'); ?>
			<div class="block clearfix">
				
				<div class="AreaL">
			      <div class="box"> 
				  	<?php echo $this->fetch('library/user_info.lbi'); ?> 
					<?php echo $this->fetch('library/user_menu.lbi'); ?> 
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
			<?php echo $this->fetch('library/help.lbi'); ?> 
			<?php echo $this->fetch('library/page_footer.lbi'); ?>
			<?php echo $this->fetch('library/site_bar.lbi'); ?>
		</div>
		<div class="bg" style="display:none;"></div>
		<div style="display:none;" class="win_dialog">
			<div class="win_dialog_tit">[<span id="typeTitle">经济型</span>]加入协议<span class="win_dialog_close"></span></div>
			  <div class="win_dialog_con">
			  	中房协议免责声明
			  </div>
			  <input type="button" id="subin" class="bnt_blue_1" value="确定" style="margin:20px 0px;">
		</div>
		<script type="text/javascript">
		<!--
		function openText(flag) {
			var phoneStatus = <?php echo $this->_var['info']['validated']; ?>;
			/*if (phoneStatus == 0) {
				alert('手机尚未验证,请验证手机号！');
				return;
			}*/
			if (flag == 1) {
				$('#typeTitle').html('经济型团队');
			} else if (flag == 2) {
				$('#typeTitle').html('创业型团队');
			}
			$('.win_dialog').css('display','block');
			$('.bg').css('display','block');
			$('.win_dialog').css('left',($(window).width()-500)/2);
			$('.win_dialog').css('top',($(window).height()-450)/2);
			$('.win_dialog_close').click(function(){
				$('.win_dialog').css('display','none');
				$('.bg').css('display','none');
			});
			$('#subin').click(function(){
				window.location = "user.php?act=team_index&type="+flag;
			});
		}
		//-->
		</script>
	</body>
</html>