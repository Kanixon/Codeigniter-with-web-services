<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper" style="min-height: 946px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Add Book
         <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Book List</a></li>
         <li class="active">Add Book</li>
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
                  <h3 class="box-title">Book Form</h3>
               </div>
               <!-- /.box-header -->
               <h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3>
			   <?php $this->session->unset_userdata('message_name'); // print_r($restaurants);?>
			   
               <!-- form start -->
               <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
			 
                 <div class="box-body">
					<div class = "appenddiv" >
						
						
						 <div class="form-group">
							<label for="book_name">Book Name</label>
							<input class="form-control" name="book_name" placeholder="Enter Book Name"  type="text" required />
						 </div> 
						 
						 <div class="col-md-12">
							<a href="javascript:void(0);" id="addtextfield" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add More</a>
						 </div>
						 
						 <div class="form-group">
							<label>Author Name</label>
							<input type="text" name="author_name[]" class="form-control" placeholder="Enter Author Name" required />
						 </div>
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
</div>