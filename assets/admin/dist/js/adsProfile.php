<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   ?>
<div class="content-wrapper" style="min-height: 916px;">
   <div style="padding: 20px 30px; background: rgb(243, 156, 18) none repeat scroll 0% 0%; z-index: 999999; font-size: 16px; font-weight: 600; display: none;">
      <a class="pull-right" href="#" data-toggle="tooltip" data-placement="left" title="" style="color: rgb(255, 255, 255); font-size: 20px;" data-original-title="Never show me this again!">
      ×
      </a>
      <a href="https://themequarry.com" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">
      Ready to sell your theme? Submit your theme to our new marketplace now and let over 200k visitors see it!</a>
      <a class="btn btn-default btn-sm" href="https://themequarry.com" style="margin-top: -5px; border: 0px none; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255) none repeat scroll 0% 0%;">
      Lets Do It!</a>
   </div>
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Classified Data
         <small></small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Classifieds List</a></li>
         <li class="active">Classified Profile</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Classified Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                  <center><h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3></center>
<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Questions</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Options</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Explanantion</p>
        </div>
    </div>
</div>
<form role="form">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Questions</h3>
                <div class="form-group">
                    <label class="control-label">Profession</label>
					<select name = "professionName" id = "professionName" required="required" class="form-control">
					   <option value = ""> --Select-- </option>
						 <?php foreach ($get_profession as $profession) { ?>
						 <option value = "<?php echo $profession['profId'];?>"><?php echo $profession['professionName'];?></option>
						<?php } ?>
					</select>
                </div>
				
				
                <div class="form-group">
                    <label class="control-label">Topic</label>
					<select name = "topicName" id = "topicName" required="required" class="form-control">
					   <option value = ""> --Select-- </option>
						 <?php foreach ($get_topic as $topic) { ?>
						 <option value = "<?php echo $topic['topicId'];?>"><?php echo $topic['topicName'];?></option>
						<?php } ?>
					</select>
                </div>
				
				 <div class="form-group">
                    <label class="control-label">Question</label>
              
					<textarea name = "questionText" id = "questionText" required="required" class="form-control"></textarea>
                </div>
				            


				<!--<div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                </div> -->
				
				
				
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Options</h3>
				
				
		 <div class="appenddiv">
            <div class="col-md-4">
              <label>Option</label>
            </div>
            <div class="col-md-8">
              <textarea name = "quizAnswer" id = "quizAnswer1"></textarea>
              <input type="radio" name="isCorrect" value="">
              <span> correct answer</span> 
			</div>
             
            <div class="col-md-4">
              <label>Option</label>
            </div>
            <div class="col-md-8">
              <textarea name = "quizAnswer" id = "quizAnswer2"></textarea>
              <input type="radio" name="isCorrect" value="">
              <span> correct answer</span> </div>
          </div>
				
				<!--
                <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Company Address</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
                </div> -->
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Explanantion</h3>
				
				 <div class="form-group">	
				  <label class="control-label">upload photo</label>
				</div>
				<div class="col-md-8">
				  <input type="file" name="explanationImage" required="required" class="control-label">
				</div>
		    </div>
             
            <div class="col-md-4">
              <label class="control-label">Explanation</label>
            </div>
            <div class="col-md-8">
              <textarea name = "explanationText" id="explanation" required="required" class="control-label"></textarea>
            </div>
				
				
                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </div>
</form>
</div>
                        </div>
                     </div>
                   
                  </div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
  <script>New
function adsApproveDecline(id,val){

      window.location.href="<?php echo base_url(); ?>admin/Dashboard/adsApproveDecline/?id="+id+"&status="+val;
 }
</script>


  <script>
function adsDelete(id){
 if(id){
     var x = confirm("Are you sure you want to delete ?");

    if (x){
      window.location.href="<?php echo base_url(); ?>admin/Dashboard/adsDelete/"+id;
   }
      
   else {
      return false;
   }
 }
 
}
</script>