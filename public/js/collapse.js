var flag = 0;
		$('#wrap-top').click(function()
		{	if(flag == 0){
			$('#wrap-sidebar').addClass('wrap-collapse');
			$('#wrap-exp-right').css("width","94.8%");
			$('.wrap-text').css("display","none");
			$('.wrap-icon').css("width","100%");
			flag = 1;
			}
			else{
				$('#wrap-sidebar').removeClass('wrap-collapse');
				$('#wrap-exp-right').css("width","83.7%");
				$('.wrap-text').css("display","block");
				$('.wrap-icon').css("width","20%");
				flag = 0;
			}
		});