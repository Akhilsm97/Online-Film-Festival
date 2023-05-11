<?php
error_reporting(0);
class Bootstrap{
	function __construct()
	{
		$url = rtrim($_GET['url'],'/');
		$url = explode('/',$url);
		$myview = $url[0];
		if(empty($url[0]))
		{
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false;
		}

		$file = 'controllers/'.$url[0].'.php';
		
		if(file_exists($file))
		{
			require $file;
			
		}
		else
		{
			require 'controllers/errors.php';
			$controller = new Errors;
			$controller->index();
			return false;
		}

		$controller = new $url[0];
		$controller->loadModel($url[0]);
		

		if(isset($url[2]))
		{
			if(method_exists($controller, $url[1]))
			{
				$controller->{$url[1]}($url[2]);
				return false;
			}
			else
			{

				require 'controllers/errors.php';
					$controller = new Errors;
					$controller->index();
					return false;
			}
			
		}
		else
		{
			if(isset($url[1]))
			{
				if(method_exists($controller, $url[1]))
				{
					$controller->{$url[1]}();
					return false;
				}
				else
				{
					if($url[1] == 'export.php')
					{
					header('location:export.php');
					}
					else
					{
					require 'controllers/errors.php';
					$controller = new Errors;
					$controller->index();
					return false;
					}
				}

			}

		}
		$controller->index();

	}
}
?>