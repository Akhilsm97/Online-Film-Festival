
<div class="">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="banner-left">
						<img src = "<?php echo URL."public/images/bannerleft.png"; ?>" width="100%">
					</div>
			</div>
			<div class="col-md-9">
				<div class="wrapHeading"><h3>Movie</h3></div>

				<div id="viewMovieData"></div>

				<div class="wrapHeading"><h3>Function</h3></div>

				<div id="viewFunctionData"></div>
			</div>
		</div>
	</div>
</div>

<!-- New Data -->
		<div class="modal fade" id="movieData" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head" id="movieName"></h2>
        </div>
        <div class="modal-body">
			<form role="form" id="movieForm" name="movieForm" action="<?php echo URL ?>userhome/xhrNewMovieBooking">
			<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<label>Movie Image</label>
				<div class="prImage"><img id="blah" class="postImage" src="#" alt=""></div>
					</div>
					<div class="col-md-6">
							<label>Video</label>
				

				<div id="divVideo">
								  <iframe src=""
   									width="100%" height="350" frameborder="0" allowfullscreen></iframe>
								</div>
					</div>
				</div>
				

			

				<div class="form-group">
					<label>Available Tickets :</label>
					<strong><span id="ticketAvailable"></span></strong>
					<input type="hidden" id="availableTickets">
				</div>	

				<div class="form-group">
					<label>Screen</label>
					<strong><span id="screenRun"></span></strong>
					<input type="hidden" id="runScreen" name="screen">
				</div>			

				<div class="form-group">
					<label>Number of Tickets</label>
					<input type="text" class="loginText" name="ticket" id="no_ticket" required>
				</div>

				<div class="form-group">
					<label>Select Payment Method</label>
					<img src="<?php echo URL ?>public/images/payment.png" width="100%">
				</div>



				<div class="form-group">
					<input type="text" class="loginText" name="moviePayment" id="moviePayment" value="120">
				</div>

				<input type="hidden" name="movieid" id="movieId">
				<Button type="submit" class="btn btn-primary movieSubmit" id="submitbtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;BOOK TICKETS</Button>

				<!--<input type="button" class="btn btn-danger" id="moviePoll" value="POLL">-->

			
		</div>
	</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>


  <!-- New Data -->
		<div class="modal fade" id="functionData" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head" id="functionName"></h2>
        </div>
        <div class="modal-body">
			<form role="form" id="functionForm" name="functionForm" action="<?php echo URL ?>userhome/xhrNewFunctionBooking">
			<div class="row">
			<div class="col-md-12">
				<label>Function Image</label>
				<div class="prImage"><img id="fblah" class="postImage" src="#" alt=""></div>

				<label>Video</label>
				

				<div id="divFVideo">
								  <iframe src=""
   									width="100%" height="300" frameborder="0" allowfullscreen></iframe>
								</div>

				<div class="form-group">
					<label>Number of Tickets</label>
					<input type="text" class="loginText" name="ticket" id="ticket" required>
				</div>
				<input type="hidden" name="movieid" id="functionId">
				<Button type="submit" class="btn btn-primary" id="submitbtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;BOOK TICKETS</Button>

			
		</div>
	</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>



  <!-- New Data -->
		<div class="modal fade" id="movieStatusData" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head" id="movieName"></h2>
        </div>
        <div class="modal-body">
        	<label>Movie Status</label>
			<div id="movieStatus"></div>


			<label>Function Status</label>
			<div id="functionStatus"></div>
        </div>
       
      </div>
    </div>
  </div>

  <!-- New Data -->
		<div class="modal fade" id="pollData" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head">Screen Poll</h2>
        </div>
        <div class="modal-body">
        	<form id="pollForm" name="pollForm">


        		<div class="form-group">
        	<label>Select Movie</label>
			<select class="loginText" name="movie" id="movieIds">
			<option value="">Select Movie</option>	
			</select>
		</div>

        	<div class="form-group">
        	<label>Select Screen</label>
			<select class="loginText" name="screen" id="screenId">
				<option value="1">Screen 1</option>
				<option value="2">Screen 2</option>
				<option value="3">Screen 3</option>
				<option value="4">Screen 4</option>
                                <option value="5">Screen 5</option>
				<option value="6">Screen 6</option>
			</select>
		</div>

			<div class="form-group">
			
				<Button type="submit" class="btn btn-primary" id="pollBtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;POLL</Button>

		</div>
	</form>

        </div>
       
      </div>
    </div>
  </div>


  <!-- New Data -->
		<div class="modal fade" id="questionData" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head" id="movieName">New Doubts</h2>
        </div>
        <div class="modal-body">
			<form role="form" id="questionForm" name="movieForm" action="<?php echo URL ?>userhome/xhrNewQuestion">
			<div class="row">
			<div class="col-md-12">
				

				<div class="form-group">
					<label>Question</label>
					<textarea class="loginText formclear" name="question" rows="10"></textarea>
				</div>
				
				<Button type="submit" class="btn btn-primary" id="submitbtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;SEND</Button>

			
		</div>
	</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>


    <!-- New Data -->
		<div class="modal fade" id="answerData" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head" id="movieName">Response from HelpDesk</h2>
        </div>
        <div class="modal-body">
			<div id="viewAnswer">
			</div>
        </div>
       
      </div>
    </div>
  </div>
