<div id="content">
	<header>
		<h2 class="page-title pull-left">Screen Management</h2>
	</header>
	<div class="content-inner">
		<div id="viewData"></div>
	</div>
</div>


<!-- New Data -->
		<div class="modal fade" id="screenData" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head" id="movieName">Change Screen</h2>
        </div>
        <div class="modal-body">
			<form role="form" id="screenForm" name="screenForm" action="<?php echo URL ?>screen/xhrChangeScreen">
			<div class="row">
			<div class="col-md-12">
				

				<div class="form-group">
					<label>Screen Number</label>
					<select class="loginText" name="screenNo" id="screenNo">
						<option value="1">Screen 1</option>
						<option value="2">Screen 2</option>
						<option value="3">Screen 3</option>
						<option value="4">Screen 4</option>
                                                <option value="5">Screen 5</option>
                                                <option value="6">Screen 6</option>
					</select>
					
				</div>

				<input type="hidden" name="movieId" id="movieId">
				
				<Button type="submit" class="btn btn-primary" id="submitbtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;CHANGE</Button>

			
		</div>
	</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>