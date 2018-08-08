  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>  <i class="fa fa-<?php echo $font_icon; ?>"></i>
			<?php echo $pagetitle; ?>
			<small>Update </small>
		</h1>
		<ol class="breadcrumb">
			<li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="">Users Listing</a></li>
			<li class="active">Update User</li>
		</ol>
    </section>

	<?php /* pr($singleUser); */ ?>
    <!-- Main content -->
    <section class="content">
		<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Users Entry Fields</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div class="col-md-12"><center><?php echo $this->session->flashdata('message_name'); ?></center></div> 
			 <?php $this->session->unset_userdata('message_name');?>
			 <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
				<div class="box-body">
				
				<div class="col-md-12">
					<h4>User Profile Image</h4>
					<div class="form-group">
							
						 <input type="file"  onchange="readURL(this);" style="display:none;" name="userProfile" id="uploadFile" />
			 
						 <a href="javascript:void(0);" id="uploadTrigger" name="userProfile">
							 <img class="img-circle  previewimg" height="130px" width="130px"  src="<?php echo base_url().$client_data[0]['userProfile'];?>" id="upload_post_image" >
						 </a>
						 <p> <b>Click on image to change profile image </b></p>
						 <input type="hidden"  name="userProfile" value = "<?php echo $client_data[0]['userProfile'];?>">
						
						
					</div>
				</div>
			
				
				
				
				<div class="col-md-6">
					 <div class="form-group">
                        <label for="firstName">First Name</label>
						<input class="form-control" id="firstName" name="firstName" value="<?php echo $client_data[0]['firstName'] ?>"  type="text" required />
                    </div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
                        <label for="lastName">Last Name</label>
						<input class="form-control" id="lastName" name="lastName" value="<?php echo $client_data[0]['lastName'] ?>"  type="text" required />
                    </div>
				</div>
				<br/>
				<div class="col-md-6">
						<div class="form-group">
                        <label for="userEmail">User Email</label>
						<input class="form-control" id="userEmail" name="userEmail" value="<?php echo $client_data[0]['userEmail'] ?>"  type="text" readonly/>
                    </div>
				</div> 
				<br/>
				<div class="col-md-6">	
				<div class="form-group">
                        <label for="userDOB">Date of Birth</label>
						<input class="form-control" id="datepicker1" name="userDOB" value="<?php echo $client_data[0]['userDOB'];?>" type="text" required />
                    </div>
				</div>
				<br/>
				
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Profession</label>
						<select name = "professionName" id = "professionName"  class="form-control" required>
						   <option value = ""> --Select-- </option>
							 <?php foreach ($get_profession as $profession) { ?>
							<option value="<?php echo $profession['profId'];?>" <?php echo (isset($profession['profId']) && $profession['profId']==$client_data[0]['userProfession'])? "selected":""; ?>><?php echo $profession['professionName'] ;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<br/>
				
				<div class="col-md-6">	
					<div class="form-group">
                        <label for="userCity">City</label>
						<input class="form-control" id="userCity" name="userCity" value="<?php echo $client_data[0]['userCity'];?>" type="text" required />
                    </div>
				</div>
				<br/>
				
				<div class="col-md-6">
					<div class="form-group">
                        <label for="userState">State</label>
						<input class="form-control" id="userState" name="userState" value="<?php echo $client_data[0]['userState'] ?>"  type="text" required />
                    </div>
				</div>
				
				<div class="col-md-6">				
					<div class="form-group">
                        <label for="userCountry">Country</label>
						<input class="form-control" id="userCountry" name="userCountry" value="<?php echo $client_data[0]['userCountry'] ?>"  type="text" required />
                    </div>
				</div>
				<br/>
				
				<hr/>

				</div>
				</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input class="btn btn-success btn-lg pull-right" name="submit" type="submit" value = "Update">
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
       
	   
	   
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<style type="text/css">
#updateCategory span {
  color: red;
}
</style>  