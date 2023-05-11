<?php
	session_start();
	error_reporting(1);
	if(!isset($_SESSION['userid'])){
		header('location:'.URL.'home/');
	}

	$usertype = $_SESSION['usertype'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Film Festival - Web Portal</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>public/css/default.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/
bootstrap-select.min.css" type="text/css">
<link href="<?php echo URL; ?>public/css/datepicker/daterangepicker.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>public/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
<!--<link href="<?php echo URL; ?>public/css/toastr.min.css" rel="stylesheet" type="text/css">-->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css
" type="text/css"></script>
<link href="<?php echo URL; ?>public/css/pace-theme.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>public/css/inputTags.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="manifest" href="<?php echo URL; ?>public/manifest.json">
</head>
<body>
	<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
<div class="container-fluid display-table">
		<div class="row display-table-row">
		<div class="col-md-2 col-sm-1 hidden-xs display-table-cell" id="sidemenu">
			<div id="myNavigation">
			<span class="glyphicon glyphicon-menu-hamburger hidden-xs hidden-sm" id="myMenu"></span>
			<h1 class="toggleHidden hidden-xs hidden-sm">FILM</h1>
			</div>
			<ul>
				<li class="header">MAIN NAVIGATION</li>
				<!--<li class="link">
					<a href="<?php echo URL; ?>index/" class="activeStatus">
						<span class="glyphicon glyphicon-th" area-hidden="true"></span>
						<span class="toggleHidden hidden-xs hidden-sm">Dashboard</span>
						</a>
				</li>-->
				
				<?php
				if($usertype == 2 || $usertype == 1)
				{
				?>
				<li class="link">
					<a data-toggle="collapse" href="#collapseMaster" aria-expanded="false" aria-controls="collapseMaster">
						<span class="glyphicon glyphicon-tasks" area-hidden="true"></span>
						<span class="toggleHidden hidden-xs hidden-sm">Master</span>
						</a>
					<ul class="collapse" id="collapseMaster">
						<li><a href="<?php echo URL; ?>user/"><span>Control</span></a></li>
						
						
					</ul>
				</li>
				<?php
			}
				if($usertype == 1 || $usertype == 2)
				{
				?>
				<li class="link">
					<a href="<?php echo URL;?>movie/" class="activeStatus">
						<span class="glyphicon glyphicon-shopping-cart" area-hidden="true"></span>
						<span class="toggleHidden hidden-xs hidden-sm">Movie</span>
						</a>
				</li>
				<li class="link">
					<a href="<?php echo URL;?>functions/" class="activeStatus">
						<span class="glyphicon glyphicon-shopping-cart" area-hidden="true"></span>
						<span class="toggleHidden hidden-xs hidden-sm">Function</span>
						</a>
				</li>
				<?php
				}
				if($usertype == 2)
				{
				?>

				<li class="link">
					<a href="<?php echo URL;?>screen/" class="activeStatus">
						<span class="glyphicon glyphicon-shopping-cart" area-hidden="true"></span>
						<span class="toggleHidden hidden-xs hidden-sm">Screen Management</span>
						</a>
				</li>
				<?php
				}
				if($usertype == 1 || $usertype == 2)
				{
				?>

				<li class="link">
					<a href="<?php echo URL;?>tickets/" class="activeStatus">
						<span class="glyphicon glyphicon-shopping-cart" area-hidden="true"></span>
						<span class="toggleHidden hidden-xs hidden-sm">Ticket Request</span>
						</a>
				</li>
				<?php
			}
				if($usertype == 3)
				{
				?>

				<li class="link">
					<a href="<?php echo URL;?>doubts/" class="activeStatus">
						<span class="glyphicon glyphicon-shopping-cart" area-hidden="true"></span>
						<span class="toggleHidden hidden-xs hidden-sm">User Doubts</span>
						</a>
				</li>
				<?php
			}
				if($usertype == 1 || $usertype == 2)
				{
				?>
				<li class="link">
					<a href="<?php echo URL;?>screenpoll/" class="activeStatus">
						<span class="glyphicon glyphicon-shopping-cart" area-hidden="true"></span>
						<span class="toggleHidden hidden-xs hidden-sm">Screen Poll</span>
						</a>
				</li>
				<?php
			}
				?>
				
				
			</ul>
		</div>
		<div class="col-md-10 col-sm-11 display-table-cell" id="maincontainer">
			<div class="row">
				<header id="nav-header" class="clearfix">	
					<div class="col-md-5 col-xs-6">
						<nav class="navbar-default pull-left">
						 <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#sidemenu" aria-expanded="false">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						</nav>
						<h1 class="hidden-xs hidden-sm pull-left">Welcome - <?php echo $_SESSION['username']; ?></h1>
					</div>
					<div class="col-md-7 col-xs-6">
						<ul class="pull-right">
							<li><a id="appLogout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</a></li>
						</ul>
					</div>
				</header>
			</div>
				
				
			