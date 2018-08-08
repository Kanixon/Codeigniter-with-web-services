    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper" style="min-height: 946px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Admin Edit
         <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Dashboard</a></li>
         <li class="active">Edit Profile</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Profile</h3>
               </div>
			   
			    <h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3>
				<?php $this->session->unset_userdata('message_name'); ?>
			     <!--div style = "margin-left:80px">
					<tr role="row" class="odd">											
					<div id="profile-image"><h3 style = "color:green"><img src = "<?php  echo base_url(). $admin_data[0]['profileImage']; ?>" height = "200px" width = "200px" ></h3></div>
				</div>
				<p> <b style = "margin-left:20px">Click on image to change profile image then click on button</b></p-->   
               <!-- /.box-header -->
              
               <!-- form start --> 
			  <?php //echo "<pre>"; print_r($admin_data); ?>
               <form  method="Post" role="form" action="" lpformnum="131" enctype="multipart/form-data">
			   <input type="hidden" name="hidd_id" id="hidd_id" value="<?php echo $admin_data[0]['id']; ?>">
			   
                  <div class="box-body">
                    <div class="form-group">
                        <label for="username">First Name</label>
						<input class="form-control" id="FirstName" name="FirstName" value="<?php echo $admin_data[0]['FirstName'];?>" type="text" required/>
                    </div>			
					<input id="profile-image-upload" class="hidden" type="file" id="profileImage" name="ProfileImage">
					
					<div class="form-group">
                        <label for="Email">Last Name</label>
						<input class="form-control" id="LastName" name="LastName"  value="<?php echo $admin_data[0]['LastName'];?>"type="text" required>
					</div>	
			 
				
					<div class="form-group">
                        <label for="Phone">Email</label>
						<input class="form-control" id="Email" name="Email"  value="<?php echo $admin_data[0]['email']; ?>" type="text" readonly/>
					</div>
					
                    <div class="box-footer"><input type="submit" class="btn btn-primary" name="submit" value="Update"></div>
				  </div>	
				</form>
			</div>
         </div>      
			   
<!--Change Password Form-->			   
	 <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <h3 class="sus"><?php echo $this->session->flashdata('true_message'); ?></h3>
           <center><h3 class=""><?php echo $this->session->flashdata('worng_message'); ?></h3></center>
			<?php $this->session->unset_userdata('true_message'); ?>
			<?php $this->session->unset_userdata('worng_message'); ?>
              	   
			   <form  method="Post" role="form" action="<?php echo base_url();?>admin/Auth/change_password" name = "change_pass">
			   
			  
			    <div class="box-body">
					<div class="form-group">
					<label for="old_password">Old Password</label>
					<input class="form-control" id="old_password" name="old_password"  type="password" required/>
					</div> 
					
					<div class="form-group">
					<label for="new_password">New Password</label>
					<input class="form-control" id="new_password" name="new_password"  type="password" required/>
					</div>
					
					<div class="form-group">
					<label for="confirm_password">Confirm Password</label>
					<input class="form-control" id="confirm_password" name="confirm_password"  type="password" required/>
					</div> 
				   
				   
				 
					<div class="box-footer">
						  <input type="submit" class="btn btn-primary password" name="change_pass" value="Submit">
					</div>
				
			    </div>
               </form>   
      </div> 
   </section>
 
</div>
<script type="text/javascript">
  var password = document.getElementById("new_password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>