$(document).ready(function(){
	getMovieData();
	getFunctionData();

	function getMovieData()
	{
		var content = "";
		var count = 0;
		
		$.ajax({
			url:'xhrGetMovieData',
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
									content += '<th>User Name</th>';
									content += '<th>Movie</th>';
									content += '<th>Tickets</th>';
									content += '<th>Payment</th>';
									content += '<th align="left">Status</th>';
									content += '</tr>';
								content += '</thead>';
						$.each(item, function(index, element) 
									{
										i++;
										count++;
										content += '<tbody>';
										content += '<tr>';
										content += '<td>'+i+'</td>';
										content += '<td>'+element.username+'</td>';	
										content += '<td>'+element.movie+'</td>';	
										content += '<td>'+element.ticket+'</td>';	
										if(element.status == 0){
											status = "Pending";
										}
										else if(element.status == 1)
											status = "Accepted";
										content += '<td>'+element.payment+'</td>';	
										content += '<td align="center"><a id="'+element.id+'" class="viewMovieData">'+status+'</a></td>'; 
										content += '</tr>';
										content += '</tbody>';
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += '</table>';	
					
					$('#viewMovieData').html(content);
					//$('.wrap-hide').hide();
			}
		});	
	}


	function getFunctionData()
	{
		var content = "";
		var count = 0;
		
		$.ajax({
			url:'xhrGetFunctionData',
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
									content += '<th>User Name</th>';
									content += '<th>Function</th>';
									content += '<th>Tickets</th>';
									content += '<th align="left">Actions</th>';
									content += '</tr>';
								content += '</thead>';
						$.each(item, function(index, element) 
									{
										i++;
										count++;
										content += '<tbody>';
										content += '<tr>';
										content += '<td>'+i+'</td>';
										content += '<td>'+element.username+'</td>';	
										content += '<td>'+element.function+'</td>';	
										content += '<td>'+element.ticket+'</td>';	
										
										if(element.status == 0){
											status = "Pending";
										}
										else if(element.status == 1)
											status = "Accepted";
										content += '<td align="center"><a id="'+element.id+'" class="viewFunctionData">'+status+'</a></td>'; 
										content += '</tr>';
										content += '</tbody>';
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += '</table>';	
					
					$('#viewFunctionData').html(content);
					//$('.wrap-hide').hide();
			}
		});	
	}


	$(document).on('click','.viewMovieData',function(){
		var id = this.id;
		$('#newTicketData').modal({
							backdrop: 'static',
							keyboard: false
							});

		$('#ticketId').val(id);
	})

	$(document).on('click','.viewFunctionData',function(){
		var id = this.id;
		$('#newTicketData').modal({
							backdrop: 'static',
							keyboard: false
							});

		$('#ticketId').val(id);
	})


	$('#movieForm').on('submit',function(e){
		e.preventDefault();
		
		
		$.ajax({
			url : 'xhrChangeMovieStatus',
			data : new FormData(this),
			type : 'POST',
			processData:false,
			contentType:false,
			dataType:'json',
			success:function(result){
				if(result == 1)
				{
					$('#newTicketData').modal('hide');
					getMovieData();
					getFunctionData();
				}
				else
					error();
				

			}
		});
		
	});
});