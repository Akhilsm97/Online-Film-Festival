$(document).ready(function(){

	var URL = window.location.origin+"/film";
	getMovieData();
	getFunctionData();

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

	$('body').on('keypress','.alphaspace',function (e) 
				{
        		var key = e.keyCode;
        		if((key >= 97 && key <= 122) || (key >= 65 && key <= 90) || key == 32){
        			return true;
        		}
        		else
        		{
        			e.preventDefault();
        		}
   				});
	
	 //Allow Numeric Only
	$('body').on('keydown',".numeric", function(){

					// Allow special chars + arrows 

				

				if(event.ctrlKey && (event.which == 86))
					{	
						return;
					}
                else if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 

                    || event.keyCode == 27 || event.keyCode == 13 

                    || (event.keyCode == 65 && event.ctrlKey === true) 

                    || (event.keyCode >= 35 && event.keyCode <= 39)){

                        return;

                }
                else 
                {

                    // If it's not a number stop the keypress

                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {

                        event.preventDefault(); 

                    }   

                }

				});


	$('#dob').daterangepicker({
				singleDatePicker: true,
				autoUpdateInput: false,
				autoapply:false,
					locale: {
					format: 'DD/MM/YYYY'
			},
				startDate: moment().subtract(0, 'days')
			},function(start)
			{
				$('#dob').val(start.format('DD/MM/YYYY'));
				
			});

	$('#loginForm').on('submit',function(e){
		e.preventDefault();
		
		var url = $(this).attr('action');
		var data = new FormData(this);
		$.ajax({
			url : url,
			data : data,
			type : 'POST',
			processData:false,
			contentType:false,
			success:function(html){
				if(html == 1){
					alert("User Registered");
					location.href="../home/"
				}
				else
					error();
			}
		});
	});
});