$(document).ready(function(){
	var URL = window.location.origin+"/lofty";
	var activepage = "";
			Morris.Area({
		  element: 'area-example',
		  data: [
		    { y: '2006', a: 100, b: 90 },
		    { y: '2007', a: 75,  b: 65 },
		    { y: '2008', a: 50,  b: 40 },
		    { y: '2009', a: 75,  b: 65 },
		    { y: '2010', a: 50,  b: 40 },
		    { y: '2011', a: 75,  b: 65 },
		    { y: '2012', a: 100, b: 90 }
		  ],
		  xkey: 'y',
		  ykeys: ['a', 'b'],
		  labels: ['Series A', 'Series B']
		});

			Morris.Bar({
		  element: 'bar-example',
		  data: [
		    { y: '2006', a: 100, b: 90 },
		    { y: '2007', a: 75,  b: 65 },
		    { y: '2008', a: 50,  b: 40 },
		    { y: '2009', a: 75,  b: 65 },
		    { y: '2010', a: 50,  b: 40 },
		    { y: '2011', a: 75,  b: 65 },
		    { y: '2012', a: 100, b: 90 }
		  ],
		  xkey: 'y',
		  ykeys: ['a', 'b'],
		  labels: ['Series A', 'Series B']
		});

		getsalesmandata();
		function getsalesmandata(){
			var content = "";
			$.ajax({
				url:URL+'/salesman/xhrGetSalesmanData',
				type:'GET',
				dataType:'json',
				success:function(result){
					if(result.success == 1)
					{
						item = result.data;
						//i = result.start;
						i = 0;
						content += '<table class="table table-bordered">';
						$.each(item, function(index, element) 
									{
										i++;
										content += '<tr><td class="dash-salesman">';
										content += '<a class="dash-salesman-link" href="'+element.salesmanId+'">'+element.firstName+' '+element.lastName+'</a>';
										content += '</td></tr>';
									});
					}

					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += '</table>';	
					$('#wrap-salesman-data').html(content);
				}
			});
		}

		getOrderData();

	function getOrderData()
	{
		var content = "";
		var count = 0;
		var data = {activepage:activepage};
		$.ajax({
			url:URL+'/vieworder/xhrGetData',
			type:'GET',
			data:data,
			dataType:'json',
			success:function(result){
				if(result.success == 1)
					{

						item = result.data;
						//i = result.start;
						i = 0;
						content += '<div class="table-responsive">';
						content += '<table class="table table-bordered">';
						content += '<tr class="tableHeading">';
									content += '<th>Sl.No</th>';
									content += '<th>Customer Name</th>';									
									content += '<th>Quantity</th>';
									content += '<th>Amount</th>';
									content += '<th>Balance</th>';
									content += '<th>Status</th>';
									content += '</tr>';
						$.each(item, function(index, element) 
									{
										i++;
										count++;
										content += '<tr>';
										content += '<td>'+i+'</td>';
										content += '<td>'+element.customerName+'</td>';
										content += '<td>'+element.orderQuantity+'</td>';
										content += '<td>'+element.orderAmount+'</td>';
										content += '<td>'+element.orderBalance+'</td>';
										content += '<td>'+element.osName+'</td>';
										
										content += '</tr>';
									});
					}
					else
					{
						content += '<tr><td>There are no results for your search string...</td></tr>';
					}
					content += '</table>';	
					content +='</div>';
					pagination = result.pagination;
					content += pagination;
					$('#wrap-order-data').html(content);
					//$('.wrap-hide').hide();
			}
		});	
	}

	$(document).on('click','.spage',function(){
					activepage = this.id;
					getOrderData();
				});


});