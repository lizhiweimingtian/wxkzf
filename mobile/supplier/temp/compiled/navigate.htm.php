<?php if ($this->_var['full_page'] == 1): ?>
<!DOCTYPE HTML>
<html>
  <head>
    <?php echo $this->fetch('html_header.htm'); ?>
    <script src='http://api.map.baidu.com/api?type=quick&ak=BFf34117b1d204dbf23d6a289b5bfdf5&v=1.0'></script>
    <script src='js/znavi.js'></script>
    <script>
      var destination = '<?php echo $this->_var['destination']; ?>';
      var region = '<?php echo $this->_var['region']; ?>';
      var mode = BMAP_MODE_DRIVING;
      function change_mode(_mode)
      {
        mode = _mode;
		$('.navigate_marker').removeClass('on');
		if(mode == BMAP_MODE_DRIVING)
		{
			$('#driving_marker').addClass('on');
		}
		else if(mode == BMAP_MODE_TRANSIT)
		{
			$('#bus_marker').addClass('on');
		}
		else if(mode == BMAP_MODE_WALKING)
		{
			$('#walk_marker').addClass('on');
		}
      }
      function route()
      {
        $.znavi.route(destination,region,mode);
      }
    </script>
  </head>
  <body>
    <div id='container'>
      <?php endif; ?>
      <?php echo $this->fetch('page_header.htm'); ?>
	  <section>
        <div class="order_con">
          <div class="order_pd">
            <div class="order">
			 <div class="order_list_buyer">
			 <table width='100%'>
			 <tr onclick='change_mode(BMAP_MODE_DRIVING)'>
			 <td>
			 <div class='navigate_mode_icon' id='driving' ></div>
			 </td>
			 <td>
			 驾车<i id='driving_marker' class='navigate_marker on'></i>
			 </td>
				<tr onclick='change_mode(BMAP_MODE_TRANSIT)'>
			 <td>
			<div class='navigate_mode_icon' id='bus' ></div>
			 </td>
			 <td>
			 公共交通<i id='bus_marker' class='navigate_marker'></i>
			 </td>
			 <tr onclick='change_mode(BMAP_MODE_WALKING)'>
			 <td>
			 <div class='navigate_mode_icon' id='walk' ></div>
			 </td>
			 <td>
			 步行<i id='walk_marker' class='navigate_marker'></i>
			 </td>
				
				</table>
			  <p>
			   <input type='button' class='button' onclick='javascript:route()' value='确定'/>
				<input type='button' class='button' onclick='javascript:window.close();' value='关闭'/>
			 </p>
			 </div>
			</div>
          </div>
        </div>
      </section>
      <?php echo $this->fetch('page_footer.htm'); ?>
      <?php if ($this->_var['full_page'] == 1): ?>
    </div>
    <?php echo $this->fetch('static_div.htm'); ?>
  </body>
</html>
<?php endif; ?>