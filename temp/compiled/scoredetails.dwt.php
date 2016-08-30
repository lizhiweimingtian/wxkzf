<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<meta name="Generator" content="ECSHOP v4_0" />
		<title>积分详情</title>
		<meta charset="utf-8" />
                <script src="./js/jquery-1.9.1.min.js" type="text/javascript"></script>
                <style type="text/css">
                   #act_box{width:100%; height:100%;}
                   #tb{width:80%; background-color: #cdcdcd; margin-left: 10%; text-align: center;}
                   #tb tr{background-color: #fff;height: 30px;}
                   #tb tr td{background-color: #fff;line-height: 30px;}
                </style>
	</head>
	<body>
            <div id="act_box">
                <table id="tb" cellspacing="1" border="0">
                    <tr id="firsttr">
                        <td style="background-color: #666; color:#fff;">状态</td>
                        <td style="background-color: #666; color:#fff;">积分</td>
                        <td style="background-color: #666; color:#fff;">积分转账时间</td>
                        <td style="background-color: #666; color:#fff;">流水状态</td>
                    </tr>
                    <?php $_from = $this->_var['rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v');if (count($_from)):
    foreach ($_from AS $this->_var['v']):
?> 
                        <tr>
                            <?php if ($this->_var['v']['c'] == "0"): ?>
                            <td>充值</td>  
                            <?php elseif ($this->_var['v']['c'] == "1"): ?>
                             <td>转出</td>  
                             <?php elseif ($this->_var['v']['c'] == "2"): ?>
                             <td>转入</td>
                            <?php endif; ?>
                            <td><?php echo $this->_var['v']['indetail']; ?></td>
                            <td><?php echo $this->_var['v']['ntime']; ?></td>
                            <?php if ($this->_var['v']['state'] == "0"): ?>
                            <td>转账</td>
                            <?php elseif ($this->_var['v']['state'] == "1"): ?>
                            <td>消费</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                    <tr>
                        <td colspan="4">
                             <?php echo $this->fetch('library/pages.lbi'); ?>
                        </td>
                    </tr>
                </table>
            </div>
	</body>
</html>