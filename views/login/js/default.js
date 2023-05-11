$(document).ready(function(){
	var URL = window.location.origin+"/film/";
	getMovieData();
	getFunctionData();
	$('#loginId').val("");
	$('#loginPass').val("");
	$('#loginForm').on('submit',function(e){
			e.preventDefault();
			var url = $(this).attr('action');
			var data = new FormData(this);
			$.ajax({
				url:url,
				data:data,
				type:'POST',
				processData:false,
				contentType:false,
				success:function(html){
					
					if(html == 1){
								location.href="../movie/"
					}
					else{
						alert("Invalid Credentials");
					}
				}
			});
	});


	function getMovieData()
	{
		var content = "";
		var count = 0;
		
		$.ajax({
			url:URL+'/userhome/xhrGetMovieData',
			type:'GET',
			dataType:'json',
			success:function(result){
				
				if(result.success == 1)
					{

						item = result.data;
						content += "<div class='row'>";
						
						$.each(item, function(index, element) 
									{
										content += "<div class='col-md-4'>";
										imgsrc = URL+"/"+element.image;
										content += "<img src='"+imgsrc+"' width='100%' height='300px'>";
										content += "</div>";
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += "</div>";
					
					$('.movie-latest').html(content);
					//$('.wrap-hide').hide();
			}
		});	
	}

	function getFunctionData()
	{
		var content = "";
		var count = 0;
		
		$.ajax({
			url:URL+'/userhome/xhrGetFunctionData',
			type:'GET',
			dataType:'json',
			success:function(result){
				
				if(result.success == 1)
					{

						item = result.data;
						content += "<div class='row'>";
						
						$.each(item, function(index, element) 
									{
										content += "<div class='col-md-4'>";
										imgsrc = URL+"/"+element.image;
										content += "<img src='"+imgsrc+"' width='100%' height='300px'>";
										content += "</div>";
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += "</div>";
					
					$('.movie-events').html(content);
					//$('.wrap-hide').hide();
			}
		});	
	}
});