<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper" style="min-height: 946px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Update Book 
         <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Book List</a></li>
         <li class="active">Update Book</li>
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
			   <?php $this->session->unset_userdata('message_name');  //print_r($book_data);?>
			   
               <!-- form start -->
               <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
			 
                 <div class="box-body">
					<div class = "appenddiv" >
						 <div class="form-group">
							<label for="book_name">Book Name</label>
							<input class="form-control" name="book_name" value = "<?php echo $book_data[0]['book_name'];?>"  type="text" required />
						 </div> 
						 
						 <div class="col-md-12">
							<a href="javascript:void(0);" id="addtextfield" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add More</a>
						 </div>
						 
						 <?php foreach($book_data[0]['author_data'] as $author_name) { ?>
						 <div class="form-group">
							<label>Author Name</label>
							<input type="text" name="author_name[]" class="form-control" value = "<?php echo $author_name['author_name'];?>"required />
						 </div>
						 <?php } ?>
					</div>
					
                    <div class="box-footer">
                      <input type="submit" class="btn btn-primary" name="submit" value="Update">
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