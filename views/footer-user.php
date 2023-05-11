<div class="row">
				<footer id="admin-footer" class="clearfix">
					<div class="pull-left">
						<b>Copyright </b>&copy; 2019
					</div>
					<div class="pull-right">
						Online Film Festival
					</div>
				</footer>
			</div>
		
		</div>
	</div>
</div>

<script src="<?php echo URL ?>public/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo URL ?>public/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo URL ?>public/js/bootstrap-select.min.js" type="text/javascript"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>-->
<!--<script src="<?php echo URL ?>public/js/toastr.min.js" type="text/javascript"></script>-->

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo URL ?>public/js/datepicker/moment.min.js" type="text/javascript"></script>
<script src="<?php echo URL ?>public/js/datepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo URL ?>public/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript" ></script>
<!--<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="<?php echo URL ?>public/js/toast.js" type="text/javascript"></script>
<script src="<?php echo URL ?>public/js/default.js" type="text/javascript"></script>
<script src="<?php echo URL ?>public/js/pace.min.js" type="text/javascript"></script>
<script src="<?php echo URL ?>public/js/inputTags.jquery.min.js" type="text/javascript"></script>
	<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>

<?php
		$url = rtrim($_GET['url'],'/');
		$url = explode('/',$url);
		$myview = $url[0];
		$jsurl = URL.'views/'.$myview.'/js/default.js';
		echo "<script src='".$jsurl."' type='text/javascript'></script>";
?>
<script type="text/javascript">
			$(document).ready(function(){
				var url = '<?php echo URL ?>'+'login/xhrLogout';
				var loginurl = '<?php echo URL ?>'+'home/';
				//alert("Welcome");
				$('.dropdown-toggle').dropdown();
				$('#appLogout').on('click',function(){
				var data = {flag:1};
				$.ajax({
				url:url,
				type:'POST',
				data:data,
				processData:false,
				contentType:false,
				success:function(html){
					if(html == 1){
						location.href=loginurl;
					}
				}
				});
			});
			});
		</script>
	</body>
</html>