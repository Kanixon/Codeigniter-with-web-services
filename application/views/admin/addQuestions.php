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
         Add Question
         <small></small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Questions List</a></li>
         <li class="active"> Add Question</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Question Data</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                  <center><h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3></center>
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Question</p>
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
 <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
               <!-- <h5> Questions</h5>--><h5> </h5>
                <div class="form-group">
                    <label class="control-label">Profession</label>
					<select name = "professionName[]" id = "professionName"  class="form-control validff" multiple required>
						 <?php foreach ($get_profession as $profession) { ?>
						 <option value = "<?php echo $profession['profId'];?>"><?php echo $profession['professionName'];?></option>
						<?php } ?>
					</select>
                </div>
				
                <div class="form-group">
                    <label class="control-label">Topic</label>
					<select name = "topicName" id = "topicName" class="form-control">
					   <option value = ""> --Select-- </option>
						 <?php foreach ($get_topic as $topic) { ?>
						 <option value = "<?php echo $topic['topicId'];?>"><?php echo $topic['topicName'];?></option>
						<?php } ?>
					</select>
                </div>
				
				 <div class="form-group">
                    <label class="control-label">Question</label>
                 
					<textarea name = "questionText" id = "questionText" required="required" class="form-control validff"></textarea>
				</div>
					<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
             </div>             
        </div>
     </div>
    <!--</div>-->
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
              <!--  <h5> Options</h5>	 --><h5> </h5>
				
		
			 <div class="col-md-12"> <a href="javascript:void(0);" id="addtextarea" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Add option</a></div>
				
				
		    <div class="form-group"> 
				<div class = "appenddiv">
					<div class="col-md-4">
					  <label>Option 1</label>
					</div>
					<div class="col-md-8">
					     <textarea name = "quizAnswer[]" required="required" class="form-control validff"></textarea>
					  
					     <input type="radio" name="isCorrect[]" value="0"  required="required" class="validff">
					  <span> Correct Answer</span> 
					</div>
					 
					<div class="col-md-4">
					  <label>Option 2</label>
					</div>
					<div class="col-md-8">
						 <textarea name = "quizAnswer[]" required="required" class="form-control validff"></textarea>
						
					     <input type="radio" name="isCorrect[]" value="1"  required="required" class="validff">
					  <span> Correct Answer</span>
					</div>
					
					
					
					<div class="col-md-4">
					  <label>Option 3</label>
					</div>
					<div class="col-md-8">
					     <textarea name = "quizAnswer[]" required="required" class="form-control validff"></textarea>
					  
					     <input type="radio" name="isCorrect[]" value="2"  required="required" class="validff">
					  <span> Correct Answer</span> 
					</div>
					 
					<div class="col-md-4">
					  <label>Option 4</label>
					</div>
					<div class="col-md-8">
						 <textarea name = "quizAnswer[]" required="required" class="form-control validff"></textarea>
						
					     <input type="radio" name="isCorrect[]" value="3"  required="required" class="validff">
					  <span> Correct Answer</span>
					</div>
				</div>
            </div>
			
                <button class="btn btn-primary nextBtn btn-lg pull-right"  id="alert" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
              <!--  <h5> Explanantion</h5> --><h5> </h5>
				
				
				 <div class="form-group">	
				  <label class="control-label">Upload Photo</label>
				  <input type="file" name="explanationImage" class="form-control">
				 </div>
			 
				<div class="form-group">
				  <label class="control-label">Explanation</label>
				  <textarea name = "explanationText" id="explanationText" required="required" class="form-control validff"></textarea>
				</div>
                <input class="btn btn-success btn-lg pull-right" name="submit" type="submit" id = "finish" value = "Finish"></button>
			</div>
        </div>
        </div>
    <!--</div>-->
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