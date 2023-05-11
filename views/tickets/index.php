<div id="content">
	<header>
		<h2 class="page-title pull-left">Ticket Request</h2>
		
	</header>
	<div class="content-inner">
		



		<!-- View Data -->
		<header>
		<h2 class="page-title pull-left">Movie Ticket Request</h2>
		
	</header>
		<div id="viewMovieData" class="table-responsive">
			
		</div>

		<header>
		<h2 class="page-title pull-left">Function Ticket Request</h2>
		
	</header>
		<!-- View Data -->
		<div id="viewFunctionData" class="table-responsive">
			
		</div>

	
</div>


<!-- New Data -->
		<div class="modal fade" id="newTicketData" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head">Ticket Booking</h2>
        </div>
        <div class="modal-body">
			<form role="form" id="movieForm" name="movieForm" action="<?php echo URL ?>tickets/xhrChangeMovieStatus">
			<div class="row">
			<div class="col-md-12">
			<div class="form-group">
				<label>Change Status</label>
				<select class="loginText" name="status">
					<option value="0">Pending</option>
					<option value="1">Accept</option>
				</select>
			</div>
			
			<input type="hidden" id="ticketId" name="ticketid">

			<div class="form-group">
			<Button type="submit" class="btn btn-primary" id="submitbtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;UPDATE</Button>
			</div>
		</div>

	</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>