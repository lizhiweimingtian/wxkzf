<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<meta name="Generator" content="ECSHOP v4_0" />
		<title></title>
		<meta charset="utf-8" />
                <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
                <style type="text/css">
                    #is_act{color:#666;}
                    #is_actt{color:#000;}
                </style>
	</head>
	<body>
            <div id="act_box">
                <form action="activation.php" method="post">
                    <div id="act_at">
                        <span> 您当前的状态：</span>
                        <?php if ($this->_var['act_rs'] == "0"): ?>
                        <input id="is_act" type="text" value="未激活" readonly="0" />
                            <input id="submit" type="submit" name="submit" value="立即激活" />
                        <?php elseif ($this->_var['act_rs'] == "1"): ?>
                            <input id="is_actt" type="text" value="已激活" readonly="0" />
                        <?php endif; ?>
                       
                    </div>
                </form>
            </div>
	</body>
</html>