var prev_val,editing,new_val,pager_index=0;
$(document).ready(function() {
	$('.content table tbody tr').each(function(){
		if($(this).index()>4){
			$(this).hide();
		}
		//console.log($(this).children('td:first-child'));
	});
	$('.pagination #left').hide();
	if($('#content_1 table tbody tr:last-child').index()<5){
		$('#content_1 .pagination #right').hide();
	}
	if($('#content_2 table tbody tr:last-child').index()<5){
		$('#content_2 .pagination #right').hide();
	}
	$('.pagination #right').click(function(){
		limit=pager_index+5;
		for(pager_index;pager_index<limit;pager_index++){
			//console.log(pager_index);
			$(this).parent().parent().parent().children('table').children('tbody').children('tr:eq('+pager_index+')').hide();
			$(this).parent().parent().parent().children('table').children('tbody').children('tr:eq('+(pager_index+5)+')').show();			
		}
		if(pager_index>4){
			$(this).parent().children('#left').show();
		}
		if($(this).parent().parent().parent().children('table').children('tbody').children('tr:last-child').index()<(pager_index+5)){
			$(this).parent().children('#right').hide();
		}
	});
	$('.pagination #left').click(function(){
		limit=pager_index-5;
		for(pager_index;pager_index>limit;pager_index--){
			//console.log((pager_index+5)+" "+(pager_index-1));
			$(this).parent().parent().parent().children('table').children('tbody').children('tr:eq('+(pager_index+4)+')').hide();
			$(this).parent().parent().parent().children('table').children('tbody').children('tr:eq('+(pager_index-1)+')').show();			
		}
		if(pager_index>4){
			$(this).parent().children('#left').show();
		}
		if($(this).parent().parent().parent().children('table').children('tbody').children('tr:last-child').index()<(pager_index+5)){
			$(this).parent().children('#right').hide();
		}
	});
	$('.editing').live('blur',function(){
		//console.log();
		if($(this).val() == prev_val){
			
			$('.editing').parent().html(prev_val);
			$('.notifications').html("<p class='noti'>Not changed</p>");
			editing=0;
			setTimeout("$('.noti').hide('slow')",2000);

			return;
		}
		new_val=$(this).val();
		$.ajax({
			url: 'ProcessRecords.php',
			type: 'GET',
			data: 'id='+$(this).parent().parent().children('td:first-child').text()+'&data='+$(this).val()+'&field='+$(this).parent().index()+'&table='+$('.tabs .active').parent().index(),
			success: function(result){
				if(result.indexOf("error")<0){
					$('.editing').parent().html(new_val);
				}
				else{
					$('.editing').parent().html(prev_val);
				}
				$('.notifications').html("<p class='noti'>"+result+"</p>");
				editing=0;
				setTimeout("$('.noti').hide('slow')",2000);
			}
		});
		
	});
	$('.edit_text').live('click',function(){
		if (editing==1){
			return;
		}
		editing=1;
		prev_val=$(this).text();
		$(this).html('<input type="text" value="'+$(this).text()+'" style="background:url(text_bx.gif) no-repeat bottom;display:inline;padding: 0; margin: 0;" class="editing" >');
		$(this).children('input').focus();
		if ($(this).attr('id')=='date'){
			$(this).children('input').datepicker( "refresh");//"option", "dateFormat","yy-mm-dd");
		}
	});
});
