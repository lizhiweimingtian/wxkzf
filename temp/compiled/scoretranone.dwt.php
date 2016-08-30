<html>
	<head>
<meta name="Generator" content="ECSHOP v4_0" />
		<title>微信支付</title>
		<meta charset="utf-8" />
		<style type="text/css">
			*{margin:0; padding:0; list-style-type:none;}
			#scorebox{width:100%;height:100%}
			#jihuo{width:100%; height:50px; line-height:50px; text-align:left; padding-left:30px;}
			#tb{width:80%;}
			#tb tr td{background-color:#fff; height:100%; height:40px; line-height:40px;}
			#tb tr td:first-child{width:230px;text-align:right; padding-right:20px;}
			#account{width:200px; height:30px;}
			.ul_a li{width:50px; height:30px; text-align:center;line-height:30px; float:left; border:1px solid #cdcdcd; margin-right:20px;}
			.ul_a li:first-child{border:1px solid #DD2726;}
			.ul_b li{width:100px; height:30px; text-align:center;line-height:30px; float:left; border:1px solid #cdcdcd; margin-right:20px;}
			.ul_b li:nth-child(2){border:1px solid #DD2726;}
			#price{color:#DD2726;}
		</style>
	</head>
	<body>
		<div id="scorebox">
			<div id="jihuo">激活账户</div>
			<hr />
			<table id="tb" cellspacing="10">
				<tr>
					<td>激活账户：</td>
					<td>
						<input id="account" type="text" placeholder="请输入账号" value="" name="account" />
					</td>
				</tr>
				<tr>
					<td>充值金额：</td>
					<td>
						<ul class="ul_a">
							<li>50</li>
							<li>100</li>
							<li>500</li>
							<li>其他</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>充值方式：</td>
					<td>
						<ul class="ul_b">
							<li>快捷支付</li>
							<li>微信支付</li>
							<li>线下支付</li>
							<li>更多方式</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<div>　请用微信扫一扫进行支付<div>
						<img src="themes/68ecshopcom_360buy/images/android.jpg" title="微信二维码" alt="二维码"/>
					</td>
				</tr>
				<tr>
					<td>应付金额：</td>
					<td><span id="price">50.00元</span></td>
				</tr>
			</table>
		</div>
	</body>
</html>