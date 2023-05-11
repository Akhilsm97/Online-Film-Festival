$(document).ready(function(){
var clickStatus = 0;
var activepage = 1;
var searchtext = "";
$('.searchText').focus();
	getData();
	function getData()
	{
		var content = "";
		var count = 0;
		var data = {activepage:activepage,searchtext:searchtext};
		$.ajax({
			url:'xhrGetData',
			type:'GET',
			data:data,
			dataType:'json',
			success:function(result){
				
				if(result.success == 1)
					{

						item = result.data;
						//i = result.start;
						if(activepage != 1){
							i = (activepage-1)*10;
						}
						else{
							i = 0;
						}
						content += '<table class="table table-bordered">';
						content += '<tr class="tableHeading">';
									content += '<th>Sl.No</th>';
									content += '<th>Name</th>';
									content += '<th>Login Id</th>';	
									content += '<th>Contact Number</th>';
									content += '<th>User Type</th>';
									content += '<th>Status</th>';
										
									content += '<th>Edit</td>';
									content += '<th>Delete</td>';
									content += '</tr>';
						$.each(item, function(index, element) 
									{
										i++;
										count++;
										content += '<tr>';
										content += '<td>'+i+'</td>';
										content += '<td>'+element.firstName+' '+element.lastName+'</td>';										
										content += '<td>'+element.loginId+'</td>';
										content += '<td>'+element.phoneNumber+'</td>';
										if(element.usertype == 1){
											content += '<td>Admin</td>';
										}
										else if(element.usertype == 2){
											content += '<td>Manager</td>';
										}
										else{
											content += '<td>Help Desk</td>';
										}
										if(element.status == 1)
											content += '<td>Active</td>';
										else
											content += '<td>Deactive</td>';
										
										content += '<td align="center"><a id="'+element.adminId+'" class="editData"><i class="glyphicon glyphicon-edit"></i></a></td>'; 
										content += '<td align="center"><a id="'+element.adminId+'" class="deleteData"><i class="glyphicon glyphicon-remove-circle"></i></a></td>'; 
										content += '</tr>';
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += '</table>';	
					pagination = result.pagination;
					content += pagination;
					$('#viewData').html(content);
					//$('.wrap-hide').hide();
			}
		});	
	}

	$(document).on('keyup','.searchText',function(){
		searchtext = $(this).val();
		getData();
	});

	$(document).on('click','.spage',function(){
					activepage = this.id;
					getData();
				});

	$(document).on('blur','#ncpassword',function()
	{
		if($('#npassword').val() != $('#ncpassword').val())
		{
			validationerror("Password and Confirm Password Should be Same");
			$('#ncpassword').focus();
			if($('#submitbtn').is(":visible")){
				$('#submitbtn').fadeOut();
			}
			
		}
		else
		{
			if($('#submitbtn').is(":visible")){
				
			}
			else
			{
				$('#submitbtn').fadeIn();
			}
		}
	})

	$('#newForm').on('submit',function(e){
		e.preventDefault();
		if($('#password').val() != $('#cpassword').val())
		{
			validationerror("Password and Confirm Password Should be Same");
			$('$cpassword').focus();
			return false;
		}
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
					$('.formclear').val("");
					$('#newData').modal('hide');
					getData();
					success("New User Saved");
				}
				else
					error();
			}
		});
	});

	$(document).on('blur','#smEmail',function(){
		var email = $(this).val();
		var data = {email:email};
		$.ajax({
			url:'xhrEmailCheck',
			type:'POST',
			data:data,
			success:function(result){
				if(result == 1)
				{
					validationerror("Email ID Already Exist!..");
					$('#smEmail').focus();
					if($("#submitbtn").is(":visible")){
						$('#submitbtn').fadeOut();	
					}
					return false;
				}
				else
				{
					if($("#submitbtn").is(":visible")){
							
					}
					else{
						$('#submitbtn').fadeIn();
					}
				}
			}
		});
	})
	$(document).on('blur','#sEmail',function(){
		var email = $(this).val();
		var userid = $('#sid').val();
		var data = {email:email,userid:userid};
		$.ajax({
			url:'xhrEmailCheck',
			type:'POST',
			data:data,
			success:function(result){
				if(result == 1)
				{
					validationerror("Email ID Already Exist!..");
					$('#sEmail').focus();
					if($("#updatebtn").is(":visible")){
						$('#updatebtn').fadeOut();	
					}
					return false;
					
				}
				else
				{
					if($("#updatebtn").is(":visible")){
							
					}
					else{
						$('#updatebtn').fadeIn();
					}
				}
			}
		});
	})

$('#toggleButton').on('click',function(){
		$('#newData').modal({
							backdrop: 'static',
							keyboard: false
							});
		$('#getArea').children('option:not(:first)').remove();
		$("#salesmanStatus").val("1").change();
		$('#sFsName').focus();
		var area = 'getArea';
		var selvalue = "";
		getArea(area,selvalue);
	});

$(document).on('click','.newClose',function(){
		$('#newData').modal('hide');
		$('.formclear').val("");
	});

$(document).on('click','.newEditClose',function(){
		$('#editData').modal('hide');
	});

$(document).on('click','.viewData',function(e){
		 var salesmanid = this.id;
		 var data = {salesman:salesmanid};
		 $.ajax({
		 	url:'xhrGetSingleData',
		 	type:'GET',
		 	data:data,
		 	dataType:'json',
		 	success:function(result){
		 		$('#openData').modal({
							backdrop: 'static',
							keyboard: false
							});
		 		if(result.success == 1)
				{
						item = result.data;
						$.each(item, function(index, element){
						$('.oid').attr('id', element.salesmanId);
						$('#osalesman').html(element.firstName+" "+element.lastName);
						
						$('#oaddress').html(element.addrStreet1+" "+element.addrStreet2);
						$('#oplace').html(element.Place);
						$('#oarea').html(element.areaName);
						$('#oemail').html(element.loginId);
					});
				}
		 	}
		 });
		
	});

$(document).on('click','#openClose',function(){
		$('#openData').modal('hide');
	});

$(document).on('click','.oid',function(){
		var id = this.id;
		$('#openData').modal('hide');
		editdata(id);
	});

	function getArea(area,selvalue){
		var selarea = $('#'+area);
		$(selarea).find('option').remove();
		selarea.append($("<option></option>")
						.attr("value","")
						.text("Select"));
		$.ajax({
			url:'xhrGetArea',
			type:'POST',
			dataType:'json',
			success:function(result){			
				$.each(result, function(index, element) 
							{
								selarea
						.append($("<option></option>")
						.attr("value",element.areaId)
						.text(element.areaName)); 
							});
				$(selarea).val(selvalue);
		}
		});	
	}
	$(document).on('click','.editData',function(){
		var id = this.id;
		editdata(id);
	});

	function editdata(id){
		
		$.ajax({
			url:'xhrEditGetData/'+id,
			type:'POST',
			dataType:'json',
			success:function(result)
			{
				$('#editData').modal({
							backdrop: 'static',
							keyboard: false
							});
				
				if(result.success == 1)
				{
					item = result.data;
					$.each(item, function(index, element)
					{
						$('#efname').val(element.firstName);
						$('#elname').val(element.lastName);
						$('#eloginId').val(element.loginId);	
						$('#econtactNumber').val(element.phoneNumber);
						$('#duserType').val(element.usertype);
						$('#eactiveStatus').val(element.status);						
						$('#eid').val(element.adminId);	

					});


				}
				

			}
		});
	}

	$('#editForm').on('submit',function(e){
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
				if(html == 1)
				{
					$('#editData').modal('hide');
					getData();
					//success("Salesman Information Updated");
				}
				

			}
		});
		
	});

	$(document).on('click','.deleteData',function(){
		var id = this.id;
		$.ajax({
			url:'xhrEditGetData/'+id,
			type:'POST',
			dataType:'json',
			success:function(result)
			{
				$('#deleteData').modal({
							backdrop: 'static',
							keyboard: false
							});
				
				if(result.success == 1)
				{
					item = result.data;
					$.each(item, function(index, element)
					{
						$('#adName').html(element.firstName+" "+element.lastName);
						$('#dId').val(element.adminId);	
					});


				}
				

			}
		});
		
		/*$.ajax({
			url:'xhrDeleteData/'+id,
			type:'POST',
			success:function(result){
				if(result == 1){
					success('Selected Salesman Information Deleted');
					getData();
				}
			}
		});*/
	});

	$(document).on('submit','#deleteForm',function(e){
		e.preventDefault();
		$.ajax({
			url:'xhrDeleteData',
			type:'POST',
			data:new FormData(this),
			processData:false,
			contentType:false,
			success:function(result){
				if(result == 1){
					$('#deleteData').modal('hide');
					//success('Selected Salesman Information Deleted');
					getData();
				}
			}
		});
	});
});