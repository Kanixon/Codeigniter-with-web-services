<?php
//exit("Here");
defined('BASEPATH') OR exit('No direct script access allowed');

$admin_session = $this->session->userdata('admin_session');
 if(!is_array($admin_session[0]) && $admin_session[0]==''){
	header("location:" . base_url() . "admin");
}
?>
<style>
	.lst-icon{color:#ff0000;}
</style>
<style>
.sus > div {
  background: rgba(7, 128, 0, 0.4) none repeat scroll 0 0;
  border: 1px solid rgb(4, 128, 0);
  border-radius: 3px;
  font-family: "Source Sans Pro",sans-serif!important;
  font-size: 14px!important;
  margin: 23px auto;
  padding: 10px;
  text-align: center;
  width: 92%;
}
/*responsive table add scrolll bar*/
@media screen and (max-width: 1157px) {
.responsive .col-sm-12 {overflow: auto;}
}

<!--for add desing to add author name button -->
<!------------------new style----------------->
body{margin-top:0px !important;}
.btn.btn-primary {padding: 0 39px 0 29px !important;}
.btn-default {
    background-color: #3c8dbc !important;border-color: #3c8dbc !important;color: #fff !important;font-size: 18px !important;
    padding: 0 39px 0 29px !important;
}
.btn-circle:hover{color:#444 !important;background:#f4f4f4 !important;}
.btn.disabled, .btn[disabled], fieldset[disabled] .btn{opacity:1 !important;}
.remove {
	bottom: 65px !important;position: absolute;right: 4px !important;
}
.form-control.validff {
    margin-top: 20px;
}
#step-2 .col-md-4 > label {
    margin-top: 15px;
}
#step-1 .btn.btn-primary {
	font-size: 18px;padding: 10px 30px !important;
}
.btn-success {
    background-color: #3c8dbc;
    border-color: #3c8dbc;
}
.btn-success:hover{background:#000;} 
<!---------------new style end-------------->
</style>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title;?></title> 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bootstrap/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bootstrap/css/step.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/AdminLTE.min.css">
<link rel="stylesheet"   href="<?php echo base_url();?>assets/admin/dist/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/morris/morris.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini" style="margin-top:0px">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url() ?>admin" class="logo">
      <span class="logo-mini"><b>Admin</b></span>
      <span class="logo-lg"><b>Admin</b>Panel</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!--li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data ->
                <ul class="menu">
                  <li><!-- start message ->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php //echo base_url();?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message ->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php //echo base_url();?>assets/admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php //echo base_url();?>assets/admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php //echo base_url();?>assets/admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php //echo base_url();?>assets/admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!--li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data ->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li-->
          <!-- Tasks: style can be found in dropdown.less -->
          <!--li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data ->
                <ul class="menu">
                  <li><!-- Task item ->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item ->
                  <li><!-- Task item ->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item ->
                  <li><!-- Task item ->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item ->
                  <li><!-- Task item ->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item ->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $admin_session[0]['email']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url();?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo $admin_session[0]['email']; ?> - Web Admin
                  <small>Member since Dec. 2016</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <!--div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div-->
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                   <!-- <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                 <a href="<?php echo base_url()?>admin/admin-profile" class="btn btn-default btn-flat">Profile</a> 
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>admin/Auth/logOut" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
      <!--    <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  
  
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $admin_session[0]['email']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		
		<li class="<?php echo (isset($nav) && $nav =='dashboard')? 'active' : "";  ?> treeview">
          <a href="<?php echo base_url();?>admin">
		  
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span> 
          </a> 
		</li>
		
         <li class="<?php echo (isset($nav) && $nav =='User')? 'active' : "";  ?> treeview">
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i> <span>User </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url()?>admin/clients-list"><i class="fa fa-circle-o"></i>Users List</a></li>         
          </ul>		   
        </li>
        <li class="<?php echo (isset($nav) && $nav =='Question')? 'active' : "";  ?> treeview">
          <a href="#">
           <i class="fa fa-question" aria-hidden="true"></i><span>Question</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url()?>admin/questiontList"><i class="fa fa-circle-o"></i>Questions List</a></li>         
          </ul>       
        </li>
		
		<li class="<?php echo (isset($nav) && $nav =='Article')? 'active' : "";  ?> treeview">
          <a href="#">
           <i class="fa fa-newspaper-o" aria-hidden="true"></i><span>Article</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url()?>admin/articles-List"><i class="fa fa-circle-o"></i>Articles List</a></li>         
          </ul>       
        </li>

		<li class="<?php echo (isset($nav) && $nav =='Books')? 'active' : "";  ?> treeview">
          <a href="#">
           <i class="fa fa-book" aria-hidden="true"></i><span>Book</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url()?>admin/book-list"><i class="fa fa-circle-o"></i>Books List</a></li>         
          </ul>       
        </li>
		
      </ul>
    </section>
     <!--/.sidebar -->
  </aside>