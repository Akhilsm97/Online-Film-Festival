<?php
class View{
	function __construct(){
		//echo "Main View";
	}

	public function render($name)
	{
		if($name == 'home'){
			require 'views/header-user.php';
			require 'views/'.$name.'/index.php';
			require 'views/footer-user.php';
		}
		else if($name == 'userhome'){
			require 'views/header-userhome.php';
			require 'views/'.$name.'/index.php';
			require 'views/footer-user.php';
		}
		else if($name == 'registration'){
			require 'views/header-user.php';
			require 'views/'.$name.'/index.php';
			require 'views/footer-user.php';
		}
		else if($name == 'login')
		{
			require 'views/header-login.php';
			require 'views/'.$name.'/index.php';
			require 'views/footer-login.php';
		}
		else if($name == 'export'){
			//require 'views/header.php';
			require 'views/export.php';
		}
		else
		{
		require 'views/header.php';
		require 'views/'.$name.'/index.php';
		require 'views/footer.php';
		}
		
	}
}
?>