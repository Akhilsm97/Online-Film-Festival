	$(document).ajaxStart(function() { Pace.restart(); });

	$(function() {
     var pgurl = window.location.href;
     
     $(".link .activeStatus").each(function()
     {
     		
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          {
          	$(this).addClass("settings-btn");
          	
          }
          	
     })
});

	$('[data-toggle="tooltip"]').tooltip(); 
	
	function success(message)
	{
			var message = message;
			toastr.options.closeButton =  true;
			toastr.options.positionClass = 'toast-top-center';
			toastr.success(message);
	}

	function warning(message)
	{
		var message = message;
			toastr.options.closeButton =  true;
			toastr.options.positionClass = 'toast-top-center';
			toastr.warning(message);
	}

	function error(){
			toastr.options.closeButton =  true;
			toastr.options.positionClass = 'toast-top-center';
			toastr.error("Transaction Error");
	}

	function info(message,title){
		toastr.info(message,title);
	}

	function validationerror(message){
		toastr.options.closeButton =  true;
			toastr.options.positionClass = 'toast-top-center';
			toastr.error(message);
	}

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

	/*allow alpanumeric */
				$('body').on('keypress','.alpanumeric',function (event) {
				var regex = new RegExp("^[0-9A-Za-z]$");	
				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
				if (!regex.test(key)) {
				event.preventDefault();
				return false;
				}
	
				});

				/*allow numberic and () blankspace and + */
				$('body').on('keypress','.nsymbol',function (event) {
					alert("Event occured");
				var regex = new RegExp("^[0-9+() ]+$");	
				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
				if (!regex.test(key)) {
				event.preventDefault();
				return false;
				}
	
				});


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


   				$('body').on('keypress','.password',function (e) 
				{
        		var key = e.keyCode;
        		if(key == 32){
        			e.preventDefault();
        		}
   				});