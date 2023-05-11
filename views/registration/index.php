<body class="wrap-login-bg">
		<div class="container">
			
			<div class="row">
				<div class="col-md-3">


					<div class="loginMovie">
						<form id="loginForm" name="loginForm" action="<?php echo URL ?>registration/xhrNew">

				<label class="loginHead">
					New User Registration
				</label>
				<label>Name</label>
				<div class="myUserIcon">
					
				<input type="text" name="name" id="name"  class="wrap-text-login alphaspace" placeholder="User Name" required>
				</div>
				<label>Email</label>
				<div class="myUserIcon">
					
				<input type="email" name="email" id="email"  class="wrap-text-login" placeholder="Email" required>
				</div>
				<label>Date of Birth</label>
				<div class="myUserIcon">
					
				<input type="text" name="dob" id="dob"  class="wrap-text-login" placeholder="Date of Birth" required>
				</div>
				<label>Mobile Number</label>
				<div class="myUserIcon">
					
				<input type="text" name="mobile" id="mobile" maxlength="11"  class="wrap-text-login numeric" placeholder="Mobile Number" required>
				</div>
				<label>Login ID</label>
				<div class="myUserIcon">
					
				<input type="text" name="loginid" id="loginId"  class="wrap-text-login" placeholder="User Id" required>
				</div>
				<div class="clear"></div>
				<label>Password</label>
				<div class="myUserIcon">
					
				<input type="password" name="loginpass" id="loginPass"  class="wrap-text-login" placeholder="Password" required>
				</div>
				<input type="hidden" name="flag" value="1">
				<div class="clear"></div>
				
				<div class="clear"></div>
				<Button type="submit" class="loginBtn">Register</Button>
				<br>
				<br>
				<a href="<?php echo URL; ?>registration/" class="">New User Registration</a>
				
			</form>
					</div>

					<div class="banner-left">
						<img src = "<?php echo URL."public/images/bannerleft.png"; ?>" width="100%">
					</div>

				



				</div>
				<div class="col-md-9">
					<div class="viewHomeData">
					<h3>Latest Movies</h3>
					<div class="movie-latest">

					</div>

					<div class="movie-banner">
						<img src = "<?php echo URL."public/images/middlebanner.png"; ?>" width="100%">
					</div>

					<h3>Latest Events</h3>
					<div class="movie-events">

					</div>
				</div>
				</div>
			</div>
			

		</div>
