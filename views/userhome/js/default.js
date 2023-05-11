$(document).ready(function(){
	$('#adminLogin').hide();
	var URL = window.location.origin+"/film/";
	getMovieData();
	getFunctionData();

	$('#screenPoll').on('click',function(){
		$('#pollData').modal({
			backdrop:'static',
			keyboard: false,
		});
		getAllMovie();
	});

	function getAllMovie(){
		$.ajax({
			url:'xhrGetAllMovie',
			type:'POST',
			dataType:'json',
			success:function(result){
				if(result.success == 1)
				{
					$('#movieIds').find('option:gt(0)').remove();
					item = result.data;
					$.each(item, function(index, element) 
					{
						$('#movieIds')
						.append($("<option></option>")
						.attr("value",element.id)
						.text(element.movie)
						); 
					});
					
				}
			}
		});
	}

	$('#no_ticket').on('blur',function(){
		var ticketNumber = $(this).val();
		var total = parseInt(ticketNumber)*120;
		$('#moviePayment').val(total);
	});

	$(document).on('submit','#pollForm',function(e){
		e.preventDefault();

		$.ajax({
			url : 'xhrScreenPoll',
			type : 'POST',
			data:new FormData(this),
			processData:false,
			contentType:false,
			success:function(result){
				if(result == 1){
					alert("Poll Submitted");
					$('#pollData').modal('hide');
				}
				else
					error();
			}
		});

	});

	$(document).on('click','#askQuestions',function(){
		$('#questionData').modal({
							backdrop: 'static',
							keyboard: false
							});
	});

	$(document).on('click','#questionResponse',function(){
		$('#answerData').modal({
							backdrop: 'static',
							keyboard: false
							});
		getResponse();
	});

	function getResponse(){
		var content = "";
		var count = 0;
		
		$.ajax({
			url:'xhrGetResponse',
			type:'GET',
			dataType:'json',
			success:function(result){
				
				if(result.success == 1)
					{

						item = result.data;
						//i = result.start;
						i=0;
						content += '<table class="table">';
						content += '<thead>';
						content += '<tr class="">';
									content += '<th>#</th>';
									content += '<th>Question</th>';
									content += '<th align="left">Response</th>';
									content += '</tr>';
								content += '</thead>';
						$.each(item, function(index, element) 
									{
										i++;
										count++;
										content += '<tbody>';
										content += '<tr>';
										content += '<td>'+i+'</td>';
										content += '<td>'+element.question+'</td>';	
										
										if(element.answer != null)
											answer = element.answer;
										else
											answer ="";
										content += '<td align="left">'+answer+'</td>'; 
										content += '</tr>';
										content += '</tbody>';
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += '</table>';	
					
					$('#viewAnswer').html(content);
					//$('.wrap-hide').hide();
			}
		});
	}

	$(document).on('submit','#questionForm',function(e){
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
					$('#questionData').modal('hide');
					alert("New Question Submitted");
				}
				else
					error();
			}
		});

	});

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
						i=0;
						content += '<table class="table">';
						content += '<thead>';
						content += '<tr class="">';
									content += '<th>#</th>';
									content += '<th>Movie Name</th>';
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
										content += '<td>'+element.name+'</td>';	
										
										
										content += '<td align="center"><a id="'+element.id+'" class="viewMovieData">Details</a></td>'; 
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
						i=0;
						content += '<table class="table">';
						content += '<thead>';
						content += '<tr class="">';
									content += '<th>#</th>';
									content += '<th>Funciton Name</th>';
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
										content += '<td>'+element.name+'</td>';	
										
										
										content += '<td align="center"><a id="'+element.id+'" class="viewFunctionData">Details</a></td>';
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
		 var data = {id:id};
		 $.ajax({
		 	url:'xhrGetMovieDataById',
		 	type:'POST',
		 	data:data,
		 	dataType:'json',
		 	success:function(result){
		 		$('#movieData').modal({
							backdrop: 'static',
							keyboard: false
							});
		 		if(result.success == 1)
				{
						item = result.data;
						$.each(item, function(index, element)
						{
							$('#movieName').html(element.name);
							imgURL = URL+element.image;
							$('#blah').attr("src",imgURL);
							$('#movieId').val(element.id);
							if(element.ticket == 0){
								$('#ticketAvailable').html("Seat Full");
								$('.movieSubmit').hide();
							}
							else
							{
								$('#ticketAvailable').html(element.ticket);
								$('.movieSubmit').show();
							}
							$('#availableTickets').val(element.ticket);
							$('#screenRun').html(element.screen);
							$('#runScreen').val(element.screen);
							var link = element.video;
							var myid = link.split("=")
							var videoid =myid[1];
							$("#divVideo iframe").remove();
							$('<iframe width="100%" height="150" frameborder="0" allowfullscreen></iframe>')
						    .attr("src", "http://www.youtube.com/embed/" + videoid)
						    .appendTo("#divVideo");
						
					});
				}
		 	}
		 });

	});

	$(document).on('click','#moviePoll',function(){
		var movieId = $('#movieId').val();
		var screenId = $('#runScreen').val();
		var data = {movieid:movieId,screenid:screenId};
		$.ajax({
			url : 'xhrScreenPoll',
			type : 'POST',
			data:data,
			success:function(result){
				if(result == 1){
					alert("Poll Submitted");
					//$('#pollData').modal('hide');
				}
				else
					error();
			}
		});
	});

	$(document).on('blur','#no_ticket',function(){
		var availableTickets = parseInt($('#availableTickets').val());
		if(parseInt($('#no_ticket').val()) > availableTickets){
			alert("Tickets Count excessed, Please Enter Available Tickets");
		}
	});

	$('#movieForm').on('submit',function(e){
		e.preventDefault();

		var availableTickets = parseInt($('#availableTickets').val());
		if(parseInt($('#no_ticket').val()) > availableTickets){
			alert("Tickets Count excessed, Please Enter Available Tickets");
		}
		else
		{
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
				if(result == 1){
					alert("Ticket Booked Successfully, Admin will notify as soons as possible, Thanking You");
					$('#movieData').modal('hide');
				}
				else
					error();
			}
		});
	}
	});


	$(document).on('click','.viewFunctionData',function(){

		var id = this.id;
		 var data = {id:id};
		 $.ajax({
		 	url:'xhrGetFunctionDataById',
		 	type:'POST',
		 	data:data,
		 	dataType:'json',
		 	success:function(result){
		 		$('#functionData').modal({
							backdrop: 'static',
							keyboard: false
							});
		 		if(result.success == 1)
				{
						item = result.data;
						$.each(item, function(index, element)
						{
							$('#functionName').html(element.name);
							imgURL = URL+element.image;
							$('#fblah').attr("src",imgURL);
							$('#functionId').val(element.id);
							var link = element.video;
						var myid = link.split("=")
						var videoid =myid[1];
						$("#divFVideo iframe").remove();
						$('<iframe width="100%" height="150" frameborder="0" allowfullscreen></iframe>')
					    .attr("src", "http://www.youtube.com/embed/" + videoid)
					    .appendTo("#divFVideo");
						
					});
				}
		 	}
		 });

	});

	$('#functionForm').on('submit',function(e){
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
				if(result == 1){
					alert("Ticket Booked Successfully, Admin will notify as soons as possible, Thanking You");
					$('#functionData').modal('hide');
				}
				else
					error();
			}
		});
	});


	$(document).on('click','.viewFunctionData',function(){

		var id = this.id;

	});

	$('#bookingStatus').click(function(){
		$('#movieStatusData').modal({
							backdrop: 'static',
							keyboard: false
							});
		getMovieStatus();
		getFunctionStatus();
	});

	function getMovieStatus()
	{
		var content = "";
		var count = 0;
		
		$.ajax({
			url:'xhrGetMovieStatus',
			type:'GET',
			dataType:'json',
			success:function(result){
				
				if(result.success == 1)
					{

						item = result.data;
						//i = result.start;
						i=0;
						content += '<table class="table">';
						content += '<thead>';
						content += '<tr class="">';
									content += '<th>#</th>';
									content += '<th>Movie Name</th>';
									content += '<th>Reference Id</th>';
									content += '<th align="left">Status</th>';
									content += '<th>Cancel</th>';
									content += '</tr>';
								content += '</thead>';
						$.each(item, function(index, element) 
									{
										i++;
										count++;
										content += '<tbody>';
										content += '<tr>';
										content += '<td>'+i+'</td>';
										content += '<td>'+element.name+'</td>';	
										content += '<td>'+element.ref+'</td>';
										
										if(element.status == 0)
											status = "Pending";
										else
											status = "Accepted"
										content += '<td align="center">'+status+'</td>';
										if(element.cancel == 1){
											content += '<td>Ticket Cancelled</td>';
										}
										else
										{
											content += '<td align="right"><a id="'+element.id+'" class="btn btn-danger cancelTicket">Cancel</a></td>';
										}
										
										content += '</tr>';
										content += '</tbody>';
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += '</table>';	
					
					$('#movieStatus').html(content);
					//$('.wrap-hide').hide();
			}
		});	
	}

	$(document).on('click','.cancelTicket',function(){
		var id = this.id;

		var data = {id:id};
		$.ajax({
			url : 'xhrCancelTicket',
			data : data,
			type : 'POST',
			success:function(result){
				if(result == 1){
					alert("Your ticket has been cancelled, But cant refund your amount, Thanking You");
					$('#movieStatusData').modal('hide');
				}
				else
					error();
			}
		});

	});


	function getFunctionStatus()
	{
		var content = "";
		var count = 0;
		
		$.ajax({
			url:'xhrGetFunctionStatus',
			type:'GET',
			dataType:'json',
			success:function(result){
				
				if(result.success == 1)
					{

						item = result.data;
						//i = result.start;
						i=0;
						content += '<table class="table">';
						content += '<thead>';
						content += '<tr class="">';
									content += '<th>#</th>';
									content += '<th>Function Name</th>';
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
										content += '<td>'+element.name+'</td>';	
										
										if(element.status == 0)
											status = "Pending";
										else
											status = "Accepted"
										content += '<td align="center">'+status+'</td>';
										content += '</tr>';
										content += '</tbody>';
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += '</table>';	
					
					$('#functionStatus').html(content);
					//$('.wrap-hide').hide();
			}
		});	
	}
});