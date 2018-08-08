<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
		<b>Version</b> 2.3.6
	</div>
    <strong>&copy; 2016-<?php echo date("Y");?> <a href="<?php echo base_url();?>admin">QuizApp</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
    <!-- Tab panes -->
    <div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane" id="control-sidebar-home-tab">
			<h3 class="control-sidebar-heading">Recent Activity</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-birthday-cake bg-red"></i>
						
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
							
							<p>Will be 23 on April 24th</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-user bg-yellow"></i>
						
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
							
							<p>New phone +1(800)555-1234</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
						
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
							
							<p>nora@example.com</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-file-code-o bg-green"></i>
						
						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
							
							<p>Execution time 5 seconds</p>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->
			
			<h3 class="control-sidebar-heading">Tasks Progress</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Custom Template Design
							<span class="label label-danger pull-right">70%</span>
						</h4>
						
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Update Resume
							<span class="label label-success pull-right">95%</span>
						</h4>
						
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-success" style="width: 95%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Laravel Integration
							<span class="label label-warning pull-right">50%</span>
						</h4>
						
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Back End Framework
							<span class="label label-primary pull-right">68%</span>
						</h4>
						
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->
			
		</div>
		<!-- /.tab-pane -->
		<!-- Stats tab content -->
		<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
		<!-- /.tab-pane -->
		<!-- Settings tab content -->
		<div class="tab-pane" id="control-sidebar-settings-tab">
			<form method="post">
				<h3 class="control-sidebar-heading">General Settings</h3>
				
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Report panel usage
						<input type="checkbox" class="pull-right" checked>
					</label>
					
					<p>
						Some information about this general settings option
					</p>
				</div>
				<!-- /.form-group -->
				
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Allow mail redirect
						<input type="checkbox" class="pull-right" checked>
					</label>
					
					<p>
						Other sets of options are available
					</p>
				</div>
				<!-- /.form-group -->
				
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Expose author name in posts
						<input type="checkbox" class="pull-right" checked>
					</label>
					
					<p>
						Allow the user to show his name in blog posts
					</p>
				</div>
				<!-- /.form-group -->
				
				<h3 class="control-sidebar-heading">Chat Settings</h3>
				
				
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Show me as online
						<input type="checkbox" class="pull-right" checked>
					</label>
				</div>
				<!-- /.form-group -->
				
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Turn off notifications
						<input type="checkbox" class="pull-right">
					</label>
				</div>
				<!-- /.form-group -->
				
				<div class="form-group">
					<label class="control-sidebar-subheading">
						Delete chat history
						<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
					</label>
				</div>
				<!-- /.form-group -->
			</form>
		</div>
		<!-- /.tab-pane -->
	</div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<!--- custom jquery --->
<script src="<?php echo base_url('assets/admin/custom/Admin_ajax_functions.js'); ?>"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Morris.js charts -->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!--script src="<?php echo base_url(); ?>assets/admin/plugins/morris/morris.min.js"></script-->
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/knob/jquery.knob.js"></script>


<!--08-Feb-2017 InputMask -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!------End Here -->

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- iCheck 1.0.1 -->
<!--script src="<?php echo base_url(); ?>assets/admin/plugins/iCheck/icheck.min.js"></script-->

<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--script src="<?php echo base_url(); ?>assets/admin/dist/js/pages/dashboard.js"></script-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/demo.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/dist/js/step.js"></script>



<!--<script src="<?php echo base_url(); ?>assets/admin/dist/js/main-jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/js/bootstrap.js"></script>-->


<!--<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

 Include Date Range Picker 
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />-->
<script>
	$(function () {
		$("#User_listingTable1").DataTable();
	});
</script>

<script> <!-- Script for Question OPTION-->
var last_val = $("input[name='isCorrect[]']:last").val(); //alert(last_val);
var option = ++last_val; 

$(function() {
$('#addtextarea').click(function(){
	var newDiv = $('<div><div class="col-md-4"><b>Option '+ ++option +' </b></div><div class="col-md-8"><textarea name = "quizAnswer[]" style="width: 605px; height: 58px;"></textarea><input type="radio" name="isCorrect[]" value="'+ last_val++ +'"> <span>correct answer</span></div></div>');
 $('.appenddiv').append(newDiv);
});

$("body").on("click", ".remove", function () {
        $(this).closest("div").remove();
    });
});
</script>


<script> <!-- Script for add Author name -->
var i='4';
var j='1';
$(function() {
$('#addtextfield').click(function(){
	//var newDiv = $('<div class = "box-body"><label>Author Name </label><input type="text" name="author_name[]" class="form-control" placeholder="Enter Author Name" ><input type="button" value="Remove" class="remove" /></div>');
	
	var newDiv = $('<div class = "form-group"><label>Author Name </label><input type="text" name="author_name[]" class="form-control" placeholder="Enter Author Name" ></div>');
 $('.appenddiv').append(newDiv);
});

  $("body").on("click", ".remove", function () {
        $(this).closest("div").remove();
    });
});
</script>


<script>
/* for open diaglog box on click */
$("#uploadTrigger").click(function(){
	   $("#uploadFile").click();
});
</script>

<script>
/* shown selected image of add AND edit question */
function readURL(input) 
{
     if (input.files && input.files[0]) 
	 {
         var reader = new FileReader();
          reader.onload = function (e) 
		  {
             $('#upload_post_image').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
     }
 }
$("#uploadTrigger").change(function(){
     readURL(this);
});
</script>

<script>
/* Validation on radio button of add AND edit question */
$(function() {
$('#alert').click(function(){
	 var radioValue = $("input[name='isCorrect[]']:checked").val();
      if(radioValue)
	  {
		  //  alert(radioValue);
      }
	 else
	 {
		 alert("Please select Correct Answer");
	 }
});
});
</script>
<script>
$('#finish').click(function(){
	 var radioValue 	= $("input[name='isCorrect[]']:checked").val();
	 var professionName = $('#professionName :selected').val();
	 var questionText 	= $('#questionText').val();
	 var quizAnswer 	= $("textarea[name='quizAnswer[]']").val();
	 
	 if(radioValue && professionName && questionText &&quizAnswer)
	 {
		 
	 }
	  else
	 { 
		 alert("Please fill all tab fields");
	 }
     
});
</script>
<script>
$(function() {
        $( "#datepicker1" ).datepicker({
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
    });
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>