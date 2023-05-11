<div id="content">
	<header>
		<h2 class="page-title pull-left">Doubts</h2>
	</header>
	<div class="content-inner">
		<div id="viewData"></div>
	</div>



	<!-- New Data -->
		<div class="modal fade" id="questionData" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-head" id="movieName">Reply</h2>
        </div>
        <div class="modal-body">
			<form role="form" id="questionForm" name="movieForm" action="<?php echo URL ?>doubts/xhrNewAnswer">
			<div class="row">
			<div class="col-md-12">
				

				<div class="form-group">
					<label>Enter Message</label>
					<textarea class="loginText formclear" name="answer" rows="10"></textarea>
				</div>

				<input type="hidden" name="doubtsId" id="doubtsId">
				
				<Button type="submit" class="btn btn-primary" id="submitbtn"><span class="glyphicon glyphicon-floppy-save" area-hidden="true"></span>&nbsp;SEND</Button>

			
		</div>
	</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>