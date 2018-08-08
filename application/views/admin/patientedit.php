<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper" style="min-height: 946px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         User Edit
         <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo base_url()?>admin/Patientslisting">Users List</a></li>
         <li class="active">User Edit</li>
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
                  <h3 class="box-title">Users Data</h3>
               
               <!-- /.box-header -->
               <center><h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3></center>
			   <?php $this->session->unset_userdata('message_name');  echo "<pre>";
		print_r($client_data);
		echo "</pre>";  ?>
               <!-- form start -->
               <form  method="Post" role="form" action="" lpformnum="131">
			   <input type="hidden" name="hidd_id" id="hidd_id" value="<?php echo $patData[0]['id']; ?>"
                  <div class="box-body">
                    <div class="form-group">
                        <label for="username">UserName</label>
						<input class="form-control" id="username" name="username" placeholder="Enter UserName" value="<?php echo $patData[0]['userName'] ?>"  type="text" required readonly/>
                    </div>
					<div class="form-group">
                        <label for="firstname">User Email</label>
						<input class="form-control" id="userEmail" name="userEmail" placeholder="Enter email" value="<?php echo $patData[0]['userEmail'] ?>"  type="text" required />
                    </div>
					<div class="form-group">
                        <label for="lastname">Phone</label>
						<input class="form-control" id="Phone" name="Phone" placeholder="Enter phone" value="<?php echo $patData[0]['userContactNum'] ?>"  type="text" required />
                    </div>
				
					<!-- /.box-body -->
                    <div class="box-footer">
                      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </div>
				  </div>
               </form>
            </div>
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

