<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<meta name="Generator" content="ECSHOP v4_0" />
		<title>积分转账</title>
		<script type="text/javascript" src="themes/68ecshopcom_360buy/js/user.js"></script>
                <script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery-1.9.1.min.js"></script>
                <script type="text/javascript">
                    function scoreouts(){
                        var p=/^[\d]{1,4}$/;
                        var scoreout = document.getElementById("scoreout");
                        var scoreout_tip = document.getElementById("scoreout_tip");
                        if(p.test(scoreout.value)){
                            scoreout_tip.innerHTML = "您一次最多只能转9999积分";
                            scoreout_tip.style.color = "green";
                        }else{
                            scoreout_tip.innerHTML = "请输入正确的积分数字";
                            scoreout_tip.style.color = "red";
                        }
                    }
                </script>
		<style type="text/css">
                       
			#scorebox{
				position:absolute;
				top:30%;
				left:20%;
			}
			#scorebox table tr td{
				margin-bottom:20px;
			}
			#scorebox input{
				width:160px;
			}
                        #tb{width:600px;background-color:#cdcdcd;}
                        #tb tr td{background-color:#fff;}
                        #tb tr td:first-child{width:25%;}
                        #tb tr td:nth-child(2){width:30%;}
			.score{
				text-align:right;
			}
		</style>
	</head>
	<body>
		<div id="scorebox">
			<form method="post" action="user.php ? act=scoretran">
				<table id="tb" cellspacing="0" border="1">
					<tr>
						<td class="score">您当前的积分：</td>
						<td><input type="text" name="scorenow" value="<?php echo $this->_var['sub_one']['rank_points']; ?>" readonly="" /></td>
                                                <td></td>
                                        </tr>
					<tr>
						<td class="score">您要转出的积分：</td>
						<td><input type="text" name="scoreout" id="scoreout" onBlur="scoreouts()" value="" /></td>
                                                 <td><span id="scoreout_tip"></span></td>
					</tr>
                                        <tr>
						<td class="score">您要转入的账号是：</td>
						<td><input type="text" name="username"  value="" /></td>
                                                <td><span></span></td>
					</tr>
                                        <tr>
                                            <td class="score">手机验证码：</td>
                                            <td>
                                                <input id="mobile_code" class="text text_te" type="text" placeholder="手机验证码" name="mobile_code" />
                                                    <i class="i-phone"></i>
                                            </td>
                                            <td>
                                                <input id="zphone" class="zphone" style="width:110px;" type="button" value="获取手机验证码 " />
                                            </td>
                                        </tr>
					<tr>
						<td colspan="3" style="text-align:center;">
							<input style="width:80px;" id="submit" name="submit" type="submit" value="确认转账" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>