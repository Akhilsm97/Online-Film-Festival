$(document).ready(function(){
	$('[data-toggle="offcanvas"]').click(function(){
		$('#sidemenu').toggleClass('hidden-xs');
	});


	$('#myMenu').click(function(){
		$('.toggleHidden').toggleClass('hidden-xs-up');
		$('#sidemenu').toggleClass('col-md-1');
		$('#maincontainer').toggleClass('col-md-11');
		$('#maincontainer').toggleClass('col-md-10');
		//$('#sidemenu').removeClass('col-md-2');
	});


	/* Common Variables*/

	

});