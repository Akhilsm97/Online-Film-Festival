<div id="content">
	<header>
		<h2 class="page-title pull-left">Function</h2>
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
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head">New Function</h2>
        </div>
        <div class="modal-body">
			<form role="form" id="newForm" name="newForm" action="<?php echo URL ?>functions/xhrNew">
			<div class="row">
			<div class="col-md-12">
			<div class="form-group">
				<label>Name of the Function</label>
				<input type="text" data-toggle="tooltip" title="Function Name" placeholder="Function Name" name="movieName" id="movieName" class="loginText formclear" required>
			</div>
			<div class="form-group">
				<label>Function Photo</label>
				<!--<input type="text" data-toggle="tooltip" title="Category Image" placeholder="Category Image" name="ciname" id="ciname" class="loginText formclear" required>-->
				<input type="file" name="movieImage" id="movieImage" class="prevImage" data-toggle="tooltip" title="Function Image" placeholder="Function Image">

				<div class="prImage"><img id="blah" class="postImage" src="#" alt=""></div>
  
			</div>

			<div class="form-group">
				<label>Video Link</label>
				<textarea name="movieVideo" id="movieVideo" class="formclear loginText" required></textarea>
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


  <!-- Edit Data -->
		<div class="modal fade" id="editData" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head">Edit Function</h2>
        </div>
       <div class="modal-body">
			<form role="form" id="editForm" name="editForm" action="<?php echo URL ?>functions/xhrSaveEditData">
			<div class="row">
			<div class="col-md-12">
			<div class="form-group">
				<label>Name of the Function</label>
				<input type="text" data-toggle="tooltip" title="Function Name" placeholder="Function Name" name="movieName" id="emovieName" class="loginText formclear" required>
			</div>
			<div class="form-group">
				<label>Function Photo</label>
				<!--<input type="text" data-toggle="tooltip" title="Category Image" placeholder="Category Image" name="ciname" id="ciname" class="loginText formclear" required>-->
				<input type="file" name="movieImage" id="emovieImage" class="eprevImage" data-toggle="tooltip" title="Function Image" placeholder="Function Image">

				<div class="prImage"><img id="eblah" class="postImage" src="#" alt=""></div>
  
			</div>

			<div class="form-group">
				<label>Video Link</label>
				<textarea name="movieVideo" id="emovieVideo" class="formclear loginText" required></textarea>
			</div>

			

			<input type="hidden" name="movieId" id="movieId">
			<input type="hidden" name="imageChange" id="imageChange" value="0">
			<div class="form-group">
				<Button type="button" class="newEditClose btn btn-danger"><span class="glyphicon glyphicon-remove" area-hidden="true"></span>&nbsp;Cancel</Button>
			<Button type="submit" class="btn btn-primary" id="submitbtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;UPDATE</Button>
			</div>

			

			
			
		</div>

		
	</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>


  <!-- View Selected Data -->
		<div class="modal fade" id="showData" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head"><span id="smovieName"></span></h2>
        </div>
        <div class="modal-body">
			
			<table class="table table-bordered">
				<tr>
					<td>Image</td><td><img src="" id="smovieImage" width="100%"></td>
				</tr>
				
			</table>
		
        </div>
       
      </div>
    </div>
  </div>
		



		<!-- View Data -->
		<div id="viewData" class="table-responsive">
			
		</div>

		


  <!-- Delete Data -->
		<div class="modal fade" id="deleteData" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head">Delete Function</h2>
        </div>
        <div class="modal-body">
			<form role="form" id="deleteForm" name="deleteForm">
			<div class="row">
				<div class="col-md-12">
				<table class="table table-bordered">
					<tr>
						<td>Function Name</td><td id="dmovieName"></td>
					</tr>
					
				</table>	
			<input type="hidden" name="movieId" id="deleteId">
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