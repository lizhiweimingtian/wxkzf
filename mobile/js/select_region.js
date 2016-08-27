
     function get_regions(level, rid)
     {

		if(rid > 0)
		{
			Ajax.call('region_city.php', 'act=get_regions&level='+level+'&rid=' + rid , get_regions_response, 'GET', 'JSON');
		}
     }
     function get_regions_response(result)
     {	
		 if(result.cookeinfo){
			 document.cookie=result.cookeinfo.key+"="+result.cookeinfo.value;
			 for(i=1;i<=4;i++){
				 if(i>=result.level){
					$('#region_'+i).hide();
					document.cookie="region_"+i+"=0";
				 }
			 }
		 }
		 if(result.result == ''){
			 //location.reload();
			 location.href=location.href;
		 }else{
			 $('#region_'+result.level).html(result.result).show();
		 }

      }