$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"live_search_assets/php/search.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#ls_result').html(data);
			}
		});
	}
	
	$('#ls_search_text').keyup(function(){
		var search = $(this).val();
		
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
