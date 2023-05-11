$(document).ready(function(){
var URL = window.location.origin+"/film/";
getData();
function getData()
	{
		var content = "";
		var count = 0;
		
		$.ajax({
			url:'xhrGetData',
			type:'GET',
			dataType:'json',
			success:function(result){
				
				if(result.success == 1)
					{

						item = result.data;
						//i = result.start;
						i = 0;
						content += '<table class="table">';
						content += '<thead>';
						content += '<tr class="">';
									content += '<th>#</th>';
									content += '<th>Screen</th>';
									content += '<th>Movie</th>';
									content += '<th>Poll</th>';
									
									content += '</tr>';
								content += '</thead>';
						$.each(item, function(index, element) 
									{
										i++;
										count++;
										content += '<tbody>';
										content += '<tr>';
										content += '<td>'+i+'</td>';
										content += '<td>'+element.screen+'</td>';
										content += '<td>'+element.name+'</td>';
										content += '<td>'+element.poll+'</td>';	
										
										content += '</tr>';
										content += '</tbody>';
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += '</table>';	
					
					$('#viewData').html(content);
					//$('.wrap-hide').hide();
			}
		});	
	}


	$(document).on('click','.viewReply',function(){
		var id = this.id;

		$('#screenData').modal({
							backdrop: 'static',
							keyboard: false
							});
		$('#movieId').val(id);
	});

	$(document).on('submit','#screenForm',function(e){
		e.preventDefault();
		var url = $(this).attr('action');
		var data = new FormData(this);
		$.ajax({
			url : url,
			data : data,
			type : 'POST',
			processData:false,
			contentType:false,
			dataType:'json',
			success:function(result){
				if(result)
				{
					$('.formclear').val("");
					$('#screenData').modal('hide');
					alert("Screen Number Updated");
					getData();
				}
				else
					error();
			}
		});

	});
});