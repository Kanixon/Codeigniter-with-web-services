<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper" style="min-height: 946px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Add Article
         <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Articles List</a></li>
         <li class="active">Add Article</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Article Form</h3>
               </div>
               <!-- /.box-header -->
               <h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3>
			   <?php $this->session->unset_userdata('message_name'); ?>
			   
               <!-- form start -->
               <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
                 <div class="box-body">

					<div class="form-group">
						<label class="control-label">Topic</label>
							<select name = "topicName" id = "topicName" class="form-control" required>
							   <option value = ""> --Select-- </option>
								 <?php foreach ($get_topic as $topic) { ?>
								 <option value = "<?php echo $topic['topicId'];?>"><?php echo $topic['topicName'];?></option>
								<?php } ?>
							</select>
					</div>
						 <div class="form-group">
                        <label for="title">Title</label>
						<input class="form-control" name="title" placeholder="Enter Title"  type="text" required/>
					 </div> 
				
					 <div class="form-group">
                        <label for="articles_image">Article PDF</label>
						<input class="form-control" name="articles_image" type="file" accept="application/pdf"/>
					 </div>
					  
					
								
                    <div class="box-footer">
                      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </div>
				  </div>
               </form>
            
            <!-- /.box -->
            <!-- Form Element sizes -->
            <!-- /.box -->
            <!-- /.box -->
            <!-- Input addon -->
            <!-- /.box -->
         </div>
         <!--/.col (left) -->
         <!-- right column -->
         <!--/.col (right) -->
      </div>
      <!-- /.row -->
 
   </section>
   <!-- /.content -->
</div>