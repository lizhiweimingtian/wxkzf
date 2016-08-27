<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<meta name="Generator" content="ECSHOP v4_0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
		<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		
		<title>中房</title>
		
		
		
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="icon" href="animated_favicon.gif" type="image/gif" />
		<style>
			*{margin:0px;padding:0px;}
			/*最外框*/
			#zwk{width:1440px;height:100%;}
			/*顶部条*/
			#top{
				width:100%;
				height:30px;
				background-color:#F2F2F2;
				}
			#topnei{
					width:1200px;
					height:30px;
					margin:0 auto;
					}
			#topleft{
					width:450px;
					height:30px;
					float:left;
					line-height:30px;
					}
			#topright{
						width:430px;
						height:30px;
						float:right;
						line-height:30px;
						}
			#topleft span{margin-left:20px;}
			#topright span{margin-right:20px;}
			/*logo和搜索条开始*/
			#logohang{width:1400px;height:90px;}
			
			#logo{float:left;margin-left:115px;}
			
			#search{float:left;
					width:580px;
					height:45px;
					margin:20px 210px;
					}
			#search input{
							width:475px;
							height:26px;
							border:2px solid red;
						}
			#search div{ 
						float:left;
						margin-top:5px;
						
					}				
			/*logo和搜索条结束*/
			/*导航条*/
			#dh{/*外框*/
				width:1440px;
				height:30px;
				background-color:#DD2727;
			
				}
			#daohang{/*内框*/
					text-align:center;
					width:850px;
					height:30px;
					margin:0 auto;
					
					}
			#daohang div{
					text-align:center;
					width:150px;
					border:1px solid yellow;
					font-size:15px;
					float:left;
					font-family:微软雅黑;
					margin-top:4px;
					
					}
			/*a链接样式*/	
			
			#daohang a{color:white;}
			a:link{color:#999999;}
			a:hover{color:red;}		
			a{text-decoration:none;}
			
			
			
			/*主体框开始*/
			#main{
				width:1200px;
				height:660px;
				margin:0 auto;
				border:1px solid gray;
				border-radius:10px;
				padding-top:15px;
				}
			/*头像一栏*/
			#maintitle{
				width:1200px;
				height:60px;
				margin:0 auto;
				
				}
			#touxiang{float:left;}
			#titleinfo{
				width:1130px;
				height:40px;
				margin-top:20px;
				float:left;
				background:url("themes/68ecshopcom_360buy/images/gerenzx/maintitle_bg.gif")repeat-x;
				}
			#titleinfo span{
							float:left;
							text-align:center;
							line-height:40px;
							margin-left:45px;}
			/*清除浮动*/
			.clear{clear:both; height: 0; line-height: 0; font-size: 0}
			
			/*主体框内左边会员菜单列表部分*/	
			
			#mainleft{
					width:160px;
					height:560px;
					float:left;
					border:1px solid gray;
					border-radius:10px;
					}
	
			.mainmenu{
					width:120px;
					height:28px;
					background-color:#EEECEE;
					text-align:center;
					border:1px solid gray;
					border-radius:5px;
					margin:10px 20px;
			         }
			#mainleft p{margin-left:50px;}
			
			/*主体框内右边列表部分*/
			#mainright{
						width:1030px;
						height:560px;
						float:left;
						}
			#xiaji{
					width:1020px;
					height:185px;
					margin:0 auto;
					margin-top:8px;
					border-radius:3px;
					
					}
			/*主体右侧顶部条*/
			#mrtop{width:1000px;
					height:30px;
					border:1px solid white;
					}
			#nihao{width:400px;
					float:left;}	
		
			#nishi{width:400px;
					float:right;}
			
			#jifen{width:1000px;
					height:30px;
					}
			#jifen1{width:480px;
					height:30px;
					border:1px solid gray;
					border-radius:5px;
					margin-left:10px;
					float:left;
					}
			#jifen2{width:480px;
					height:30px;
					border:1px solid gray;
					border-radius:5px;
					margin-left:10px;
					float:left;}
			#jifen a{
						float:right;
						margin-right:20px;
						}
			#jifen span{
							margin-left:20px;
							text-align:center;
							line-height:30px;
							}		
					
			/*下级状态外大框*/
			#jihuo{width:1000px;
					height:80px;
					border:1px solid white;
					}
			#zhuangtai{width:1000px;
						height:30px;
						border:1px solid white;
						border-radius:5px;
						margin-top:5px;
						}
			#zhuangtai2 a{
						float:right;
						margin-right:20px;
						}
			#zhuangtai2 span{
							margin-left:20px;
							text-align:center;
							line-height:30px;
							}
			#jihuo1{width:480px;
					height:30px;
					border:1px solid gray;
					border-radius:5px;
					margin-left:10px;
					float:left;
					}
			#jihuo2{width:480px;
					height:30px;
					border:1px solid gray;
					float:left;
					border-radius:5px;
					margin-left:10px;
					}
				
			/*表格*/
			table {
					width:500px;
					height:90px;
					margin:20px 50px;}
			#biao{width:600px;
					height:400px;
					margin:50px 95px;
					}
			#biao p{text-align:center;}
			/*主体框结束*/
			
			
			/*页面底部*/		
			#bottom{width:100%;
					height:100px;
					background-color:#F2F2F2;
					}
			#botnei{width:1000px;
					height:85px;
					margin:0 auto;
					padding-top:15px;
					text-align:center;
					}
			
		</style>
	</head>
	<body>
		<div id="zwk">
			
			<div id="top">
				<div id="topnei">
					<div id="topleft">
						<font color="#999999"><span><a href="">【中房京宝官网】</a></span><span><a href="">【中房京宝微信】</a></span></font>
					</div> 
					<div id="topright">
						<font color="#999999"><span>您好：马到成功 &nbsp;&nbsp;&nbsp;<span><a href="user.php">[会员中心]</a></span> &nbsp; </span></font><span><a href="index.php">首页</a></span><span><a href="#">激活</a></span><span><a href="user.php?act=logout">退出</a></span>
					</div>
				</div>
			</div>
			
			
			
			<div id="logohang">
				<div id="logonei">
					<div id="logo"><a href="index.php"><img src="themes/68ecshopcom_360buy/images/gerenzx/logo.jpg" height='90px'></a></div>
					<div id="search">
						<div><input type="text" height='55px' placeholder="请输入要查询的关键词"></div>
						<div><a href=""><img src="themes/68ecshopcom_360buy/images/gerenzx/search.png" width="100px"></a></div>
					</div>
				</div>
			</div>
			
			
			
			<div id="dh">
				<div >
					<div id="daohang">
						<a href="#"><div> <a href="user.php">首 页</a> </div></a>
						<a href="#"><div id="zlgl" onclick="zlgl();" >个 人 资 料  </div></a>
						<a href="#"><div id="ywgl" onclick="ywgl();"> 加 盟 信 息 </div></a>
						<a href="#"><div id="fwgl" onclick="fwgl();"> 积 分 管 理 </div></a>
					</div>	
				</div> 
				
			</div>
			
			
			
			<div id="main">
				
				<div id="maintitle">
					<div id="touxiang"><img src="themes/68ecshopcom_360buy/images/gerenzx/touxiang.gif"></div>
					<div id="titleinfo"><span><b>您好：马到成功</b> &nbsp;&nbsp 开通日期：*年*月*日 </span><span>您的推荐人：马 到 &nbsp;&nbsp;  联系电话：18732991130</span></div>
				</div>
				
				
				<div class="clear"></div>
				
				
				<div id="mainleft">
					<div class="mainmenu">资 料 管 理</div>
					
						<p><a href="user.php?act=profile"> 资料查看 </a></p>
						<p><a href="user.php?act=profile"> 资料修改 </a></p>
						<p><a href="#"> 密码修改 </a></p>	
					<div class="mainmenu">业 务 管 理</div>
						<p><a href="#"> 推广注册 </a></p>
						<p><a href="#"> 激 活 </a></p>
							
					<div class="mainmenu">服 务 管 理</div>
						<p><a href="#"> 积分转账 </a></p>
						<p><a href="#"> 购买积分 </a></p>
						<p><a href="#"> 积分提现 </a></p>
						<p><a href="#"> 商城购物 </a></p>
					<div class="mainmenu">网 络 管 理</div>
						<p><a href="#"> 衔接市场 </a></p>
						<p><a href="#"> 衔接微信 </a></p>
					<div class="mainmenu">信 息 </div>
						<p><a href="#"> 公 告 </a></p>
						<p><a href="#"> 邮 件 </a></p>	
				</div>
				
				
				<div id="mainright">
					<div id="xiaji">
						
						<div id="mrtop">
							<div id="nihao"><span><b>您好，欢迎进入报单中心：</b></span></div>
							<div id="nishi"><span>您目前是[普通会员]，您的佣金积分为：6666666</span></div>
						</div>
						
						<div id="jifen">
							<div id="jifen1"><span>您目前总积分数为：<font color="#FF8442">66</font> 个</span><span><a href="">查看历史积分</a></span></div>
							<div id="jifen2"><span>您的订单交易总数：<font color="#FF8442">66</font> 个</span><span><a href="">历史订单</a></span></div>
						</div>
						
						<div id="jihuo">
							<div id="zhuangtai"><span><i>您的下级状态：</i></span></div>
							<div id="zhuangtai2">
								<div id="jihuo1"><span>待激活下级数：<font color="#FF8442">66</font> 个</span><span><a href="">待激活下级列表</a></span></div>
								<div id="jihuo2"><span>已激活下级数：<font color="#FF8442">66</font> 个</span><span><a href="">已激活下级列表</a></span></div>		
							</div>
						</div>
					</div>

					<div id="biao">
						<p><b>企 业 成 员 数 </b></p> 
						<table border='1' cellpadding="0" cellspacing="0">
							
							<tr>
								<th>县级</th><td>一组</td><td>XXX</td><td>二组</td><td>XXX</td><td>二组</td><td>XXX</td>
							</tr>
							<tr>
								<th>市级</th><td>一组</td><td>XXX</td><td>二组</td><td>XXX</td><td>二组</td><td>XXX
							</tr>
							<tr>
								<th>省级</th><td>一组</td><td>XXX</td><td>二组</td><td>XXX</td><td>二组</td><td>XXX
							</tr>
						
						</table>
					</div>
				</div>
				
			</div>
			
			
			<div id='bottom'>
				<div id="botnei">

					<p><a href="#">联系我们</a>  | <a href="#">帮助信息</a> | <a href="#">友情链接</a> </p>
					<p>COPYRIGHT©2015    版权所有 中房京宝（北京）电子商务有限公司<img src="themes/68ecshopcom_360buy/images/gerenzx/pic.gif"/>京公安网备13002055号</p>
					<p><img src="themes/68ecshopcom_360buy/images/gerenzx/why.gif" width="12" height="12" alt="疑问图标" align="absmiddle">&nbsp;&nbsp;如有疑问请您联系TEL：010-8888888-8888</p>

				</div>
			</div>
			
		</div>
	</body>
</html>
		