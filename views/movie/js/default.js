$(document).ready(function(){
var URL = window.location.origin+"/film/";
var editMode = 0;
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
						content += '<table class="table">';
						content += '<thead>';
						content += '<tr class="">';
									content += '<th>#</th>';
									content += '<th>Name</th>';
									content += '<th>Cast/Crew</th>';
									content += '<th>Screen</th>';
									
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
										content += '<td>'+element.cast_crew+'</td>';	
										content += '<td>'+element.screen+'</td>';
										content += '<td align="center"><a id="'+element.id+'" class="viewData"><i class="glyphicon glyphicon-eye-open"></i></a>'; 																		
										content += '<a id="'+element.id+'" class="editData"><i class="glyphicon glyphicon-edit"></i></a>'; 
										content += '<a id="'+element.id+'" class="deleteData"><i class="glyphicon glyphicon-remove-circle"></i></a></td>'; 
										content += '</tr>';
										content += '</tbody>';
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



	$('#newForm').on('submit',function(e){
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
				if(result.success == 1){
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

	$(document).on('change','.prevImage',function(){
		var imgid = this.id;
		var mode = 1;
  		readURL(this,mode,imgid);
	});

	$(document).on('change','.eprevImage',function(){
		var imgid = this.id;
		var mode = 2;
  		readURL(this,mode,imgid);
  		editMode = 1;
  		$('#imageChange').val(editMode);
	});

	function readURL(input,mode,imgid) {

  if (input.files && input.files[0]) 
  {
    var reader = new FileReader();

    reader.onload = function(e) {
		if(mode == 1)
		{
			var previd = '#blah';
		$(previd).attr('src', e.target.result);
		}
		else
		{
			$('#eblah').attr('src', e.target.result);
		}
    }

    reader.readAsDataURL(input.files[0]);
  }
}

	

$('#toggleButton').on('click',function(){
		$('#newData').modal({
							backdrop: 'static',
							keyboard: false
							});
		/*var id = "catName";
		var selValue = "";
		getCategory(id,selValue);*/
		var selValue = "";
		var id='chooseCategory';
		var storeid = 'chooseStoreCategory';
		getAllCategory(id,selValue,selValue);
		getStoreCategory(storeid,selValue);
		
	});


function getAllCategory(id,selCategory,selSubCategory){
	var selid = $('#'+id);
	$.ajax({
			url:URL+'category/xhrGetCategoryAll',
			type:'POST',
			dataType:'json',
			success:function(result){
				if(result.success == 1)
				{
					mcontent = "";
					item = result.data;
					if(selCategory != null)
					{
					selectedCat = selCategory.split(",");
					}
					if(selSubCategory != null)
					{
						selectedSubCat = selSubCategory.split(",");

					}
					$.each(item, function(index, element) 
					{
						mainid = 'emain-'+element.catId;
						mcontent += "<input type='checkbox' class='mainCategory' id='"+mainid+"' value='"+element.catId+"' name='cname[]'";
						if(selCategory != null){
							for(i=0;i<selectedCat.length;i++){
								if(selectedCat[i] == element.catId){
									mcontent += " checked";
								}
							}
						}
						mcontent +=">";
						mcontent += "&nbsp;"+element.catName+"<br>";
						if(element.sub == 1)
						{
							scontent = "";
							sitem = element.subcategory;
							$.each(sitem,function(sindex,selement)
							{
									subid = 'esub-'+element.catId+'-'+selement.scatid;
									subclass = 'esub-'+element.catId;
									scontent += "<input class='subContent subCategory "+subclass+"' id='"+subid+"' type='checkbox' value='"+element.catId+"-"+selement.scatid+"' name='sname[]'";
									if(selSubCategory != null)
									{
										for(i=0;i<selectedSubCat.length;i++)
										{
											selectedSCat = selectedSubCat[i].split("-")
											
											
											if(selectedSCat[0] == element.catId){
												if(selectedSCat[1] == selement.scatid){
													scontent += " checked";
												}
											}
										}
									}
									scontent +=">";
									scontent += "&nbsp;"+selement.scatName+"<br>";
							});
							mcontent += scontent;
						}
					});
					
				}
				selid.html(mcontent);
			}
		});
}

function getStoreCategory(id,selValue){
	var selid = $('#'+id);
	$.ajax({
			url:URL+'storecategory/xhrGetStoreCategory',
			type:'POST',
			dataType:'json',
			success:function(result){
				if(result.success == 1)
				{	
					if(selValue != null){
					selValue = selValue.split(",");
					}
					mcontent = "";
					item = result.data;
					$.each(item, function(index, element) 
					{
						
						mcontent += "<input type='checkbox' value='"+element.id+"' name='storecat[]'";
						if(selValue != null)
						{
						for(i=0;i<selValue.length;i++){
							if(selValue[i] == element.id){
								mcontent += " checked";
							}
							}
						}
						mcontent += ">";
						mcontent += "&nbsp;"+element.catName+"<br>";
						
					});
					
				}
				selid.html(mcontent);
			}
		});
}

$(document).on('change','.mainCategory',function(){
	var mid = this.id;
	main_id = $('#'+mid);
	if(main_id.prop("checked") == true)
	{
		var subID = mid.split("-");
		var sid = 'sub-'+subID[1];
		sub_id = $('.'+sid);
        if(sub_id.length){
			$(sub_id).prop("checked",true);
		}  
    }
    else{
    	var subID = mid.split("-");
		var sid = 'sub-'+subID[1];
		sub_id = $('.'+sid);
        if(sub_id.length){
			$(sub_id).prop("checked",false);
		}  
    }
});



/*$("#countries input:checkbox").change(function() {
    var ischecked= $(this).is(':checked');
    if(!ischecked)
    alert('uncheckd ' + $(this).val());
}); */


function getCategory(id,selValue){
		var selid = $('#'+id);
		$.ajax({
			url:URL+'subcategory/xhrGetCategory',
			type:'POST',
			dataType:'json',
			success:function(result){
				if(result.success == 1)
				{
					$(selid).find('option:gt(0)').remove();
					item = result.data;
					$.each(item, function(index, element) 
					{
						selid
						.append($("<option></option>")
						.attr("value",element.categoryId)
						.text(element.categoryName)
						); 
					});
					selid.val(selValue);
				}
			}
		});
	}

	$('#catName').on('change',function(){
		var selid = 'scatName';
		var selValue = "";
		var catid = $(this).val();
		getsubCategory(selid,selValue,catid);
	});

	$('#ecatName').on('change',function(){
		var selid = 'escatName';
		var selValue = "";
		var catid = $(this).val();
		getsubCategory(selid,selValue,catid);
	});


	

function getsubCategory(id,selValue,catId){
	var selid = $('#'+id);

	var data = {catid:catId};
		$.ajax({
			url:URL+'subcategory/xhrGetSubCategory',
			type:'POST',
			data:data,
			dataType:'json',
			success:function(result){
				if(result.success == 1)
				{
					$(selid).find('option:gt(0)').remove();
					item = result.data;
					$.each(item, function(index, element) 
					{
						selid
						.append($("<option></option>")
						.attr("value",element.id)
						.text(element.subcatName)
						); 
					});
					selid.val(selValue);
				}
			}
		});
}

	

$(document).on('click','.newClose',function(){
		$('#newData').modal('hide');
		$('.formclear').val("");
	});

$(document).on('click','.newEditClose',function(){
		$('#editData').modal('hide');
	});

$(document).on('click','.deleteClose',function(){
		$('#deleteData').modal('hide');
	});



$(document).on('change','.toggleSwitch',function(){
	var currentID = this.id;
	var id = currentID.split("-");
	status = 0;
	if($('#'+currentID).is(":checked")) 
	{
         status = 1;   
    }
    var data = {id:id[1],status:status};
    $.ajax({
    	url:'xhrChangeStatus',
    	type:'POST',
    	data:data,
    	dataType:'json',
    	success:function(result){
    		if(result.success)
    			getData();
    		else
    			error();
    	}
    });
	
}); 

$(document).on('click','.viewData',function(e){
		 var id = this.id;
		 var data = {id:id};
		 $.ajax({
		 	url:'xhrEditGetData',
		 	type:'POST',
		 	data:data,
		 	dataType:'json',
		 	success:function(result){
		 		$('#showData').modal({
							backdrop: 'static',
							keyboard: false
							});
		 		if(result.success == 1)
				{
						item = result.data;
						$.each(item, function(index, element)
						{
							$('#smovieName').html(element.name);
							
							imgURL = URL+element.image;
							$('#smovieImage').attr("src",imgURL);
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
		var data = {id:id};
		$.ajax({
			url:'xhrEditGetData',
			type:'POST',
			data:data,
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

					$('#emovieName').val(element.name);
					$('#emovieVideo').val(element.video);
					$('#emovieCast').val(element.cast_crew);
					
					$('#movieId').val(element.id);
					imgURL = URL+element.image;
					$('#eblah').attr('src', imgURL);
					
					
					});
				}
			}
		});
	});

	$('#ecatImage').on('change',function(){
		editMode = 1;
	});

	

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
			dataType:'json',
			success:function(result){
				if(result.success == 1)
				{
					$('#editData').modal('hide');
					getData();
					//success("Salesman Information Updated");
				}
				else
					error();
				

			}
		});
		
	});

	$(document).on('click','.deleteData',function(){
		var id = this.id;
		var data = {id:id};
		$.ajax({
			url:'xhrEditGetData',
			type:'POST',
			data:data,
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
						$('#dmovieName').html(element.name);
						$('#deleteId').val(element.id);	
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
			dataType:'json',
			success:function(result){
				if(result.success == 1){
					$('#deleteData').modal('hide');
					getData();
				}
			}
		});
	});
});