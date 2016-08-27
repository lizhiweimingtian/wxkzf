<?php $_from = $this->_var['logdb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'log');$this->_foreach['keyword_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['keyword_list']['total'] > 0):
    foreach ($_from AS $this->_var['log']):
        $this->_foreach['keyword_list']['iteration']++;
?>

<div id="li_<?php echo ($this->_foreach['keyword_list']['iteration'] - 1); ?>" onclick="setTip('<?php echo $this->_var['log']['word']; ?>');" onmouseover="this.className='search_t_div_2';" onmouseout="this.className='search_t_div_1';" class="search_t_div_1" title="<?php echo $this->_var['log']['word']; ?>"><span><?php echo $this->_var['log']['items']; ?> 结果</span><?php echo $this->_var['log']['kword']; ?></div>

<?php if (($this->_foreach['keyword_list']['iteration'] - 1) == 0 && $this->_var['log']['keyword_cat_count'] > 0): ?>
<p  class="search_t_div_1" style="padding-left:20px;height:20px; padding-right:8px;border-bottom:1px solid #ddd;overflow:hidden;"><span style="float:right"><?php echo $this->_var['log']['keyword_cat_count']; ?> 结果</span><?php echo $this->_var['log']['keyword_cat']; ?></p>
<?php endif; ?>

<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>