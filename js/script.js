$(document).ready(function() {
	$('.editing').live('blur',function(){
		//console.log();
		$.ajax({
			url: 'ProcessRecords.php',
			type: 'GET',
			data: 'id='+$(this).parent().parent().children('td:first-child').text()+'&data='+$(this).val()+'&field='+$(this).parent().index()+'&table='+$('.tabs .active').parent().index(),
			success: function(result){
				console.log(result);
			}
		});
		$(this).parent().html($(this).val());
	});
	$('.edit_text').live('click',function(){
		$(this).html('<input type="text" value="'+$(this).text()+'" style="background:url(text_bx.gif) no-repeat bottom;display:inline;padding: 0; margin: 0;" class="editing">');
		$(this).children('input').focus();
	});
});
