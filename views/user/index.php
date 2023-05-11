<div id="content">
	<header>
		<h2 class="page-title pull-left">User</h2>
		<a class="pull-right page-button" id="toggleButton">New&nbsp;<span class="glyphicon glyphicon-plus"></span></a>
	</header>
	<div class="content-inner">
		<div class="row">
			<div class="col-md-3">
				<input type="text" class="loginText searchText" placeholder="Search">
			</div>
		</div>
		<!-- New Data -->
		<div class="modal fade" id="newData" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head">New User</h2>
        </div>
        <div class="modal-body">
			<form role="form" id="newForm" name="newForm" action="<?php echo URL ?>user/xhrNew">
			<div class="row">
			<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" data-toggle="tooltip" title="First Name" placeholder="First Name" name="fname" id="fname" class="loginText formclear" required>
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" data-toggle="tooltip" title="Last Name" placeholder="Last Name" name="lname" id="lname" class="loginText formclear" required>
			</div>
			<div class="form-group">
				<label>Login Id</label>
				<input type="text" data-toggle="tooltip" title="Login Id" placeholder="Login Id" name="loginId" id="loginId" class="loginText formclear" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" id="password" data-toggle="tooltip" title="Password" placeholder="Password" name="password" class="loginText formclear password" required>
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" id="cpassword" data-toggle="tooltip" title="Confirm Password" placeholder="Confirm Password" name="cpassword" class="loginText formclear password" required>
			</div>
			
			</div>
			<div class="col-md-6">
			
				<div class="form-group">
				<label>Contact Number</label>
				<input type="text" data-toggle="tooltip" title="Contact Number" placeholder="Contact Number" name="contactNumber" id="contactNumber" class="loginText formclear" required>
			</div>

			<div class="form-group">
				<label>User Type</label>
				<select name="userType" data-toggle="tooltip" title="Active Status" class="loginText formclear" id="userType" required>
					<option value="">Select Type</option>
					<option value="1" selected>Admin</option>
					<?php
					if($usertype == 2)
					{
						?>
						<option value="2">Manager</option>
					<?php
					}
					?>
					<option value="3">Help Desk</option>
				</select>
				
			</div>

			<div class="form-group">
				<label>Status</label>
				<select name="status" data-toggle="tooltip" title="Active Status" class="loginText formclear" id="activeStatus" required>
					<option value="">Select Status</option>
					<option value="1" selected>Active</option>
					<option value="0">Deactive</option>
				</select>
				
			</div>

			<div class="form-group">
				<Button type="button" class="newClose btn btn-danger"><span class="glyphicon glyphicon-remove" area-hidden="true"></span>&nbsp;Cancel</Button>
			<Button type="submit" class="btn btn-primary" id="submitbtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;SAVE</Button>
			</div>
			
		</div>
	</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>

  


		<!-- View Data -->
		<div id="viewData" class="table-responsive">
			
		</div>

		<!-- Edit Data -->
		<div class="modal fade" id="editData" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head">Edit User</h2>
        </div>
        <div class="modal-body">
			<form role="form" id="editForm" name="editForm" action="<?php echo URL ?>user/xhrSaveEditData">
			<div class="row">
			<div class="col-md-6">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" data-toggle="tooltip" title="First Name" placeholder="First Name" name="fname" id="efname" class="loginText formclear" required>
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" data-toggle="tooltip" title="Last Name" placeholder="Last Name" name="lname" id="elname" class="loginText formclear" required>
			</div>
			<div class="form-group">
				<label>Login Id</label>
				<input type="text" data-toggle="tooltip" title="Login Id" placeholder="Login Id" name="loginId" id="eloginId" class="loginText formclear" required>
			</div>
			</div>
			<div class="col-md-6">
			


			<div class="form-group">
				<label>Contact Number</label>
				<input type="text" data-toggle="tooltip" title="Contact Number" placeholder="Contact Number" name="contactNumber" id="econtactNumber" class="loginText formclear" required>
			</div>

			<div class="form-group">
				<label>User Type</label>
				<select name="userType" data-toggle="tooltip" title="Active Status" class="loginText formclear" id="duserType" required>
					<option value="">Select Type</option>
					<option value="1" selected>Admin</option>
					<option value="2">Manager</option>
					<option value="3">Help Desk</option>
				</select>
				
			</div>

			<div class="form-group">
				<label>Status</label>
				<select name="status" data-toggle="tooltip" title="Active Status" class="loginText formclear" id="eactiveStatus" required>
					<option value="">Select Status</option>
					<option value="1" selected>Active</option>
					<option value="0">Deactive</option>
				</select>
				
			</div>
			<input type="hidden" name="eid" id="eid">

			<div class="form-group">
				<Button type="button" class="newEditClose btn btn-danger"><span class="glyphicon glyphicon-remove" area-hidden="true"></span>&nbsp;Cancel</Button>
			<Button type="submit" class="btn btn-primary" id="updatebtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;Update</Button>
			</div>
		</div>
		</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>


  <!-- Delete Data -->
		<div class="modal fade" id="deleteData" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head">Delete User</h2>
        </div>
        <div class="modal-body">
			<form role="form" id="deleteForm" name="deleteForm">
			<div class="row">
				<div class="col-md-12">

				<table class="table table-bordered">
					<tr>
						<td>Admin Name</td><td id="adName"></td>
					</tr>
				</table>	
			
			<input type="hidden" name="id" id="dId">

			<div class="form-group">
				<Button type="button" class="deleteClose btn btn-danger"><span class="glyphicon glyphicon-remove" area-hidden="true"></span>&nbsp;Cancel</Button>
			<Button type="submit" class="btn btn-primary" id="deletebtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;Delete</Button>
			</div>
		</div>
		</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>

	</div>
</div>