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
  <section class="content-header">
      <h1>
        Books Data
         <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Books List</li>
      </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Books Data Table</h3>
          </div>
          <div class="box-body">
            <div style = "text-align: right; padding-right: 70px;">
			<input type="button" name="add" value="Add book" class = "btn-info btn" onClick="add_book()"/>
            </div> 
            
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              
              <div class="row">
                <div class="col-sm-12">
                  <center>
                    <h3>
                      <?php echo $this->session->flashdata('message_name');  ?>
                    </h3>
                  </center>
                  <div class = "responsive">
                
			    <table id="User_listingTable1" class="table table-bordered table-striped">
                     <thead>
                        <tr role="row">
                          <th>No</th> <th>Book name</th><th>Action</th>
                        </tr>
                     </thead>
                      <tbody>
                        <?php 
                          $count = 0; 
                          foreach($book_data as $book)
                          {
                            //print_r($usersData);die;
                          ?>
                          <tr role="row" class="odd">                            
                              <td><?php echo $count = $count+1; ?></td>                           
                              <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $book['book_id']; ?>"><?php echo $book['book_name']; ?></button></td>
							  
                            <td>
                            <a href="javascript:void(0)" onClick="bookDelete('<?php  echo $book['book_id']; ?>')"><i class="fa fa-fw fa-trash-o" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
							  
                              <a href="<?php  echo base_url().'admin/edit-book/'?><?php  echo $book['book_id'];?>"><i class="fa fa-fw fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                            </td>
                          </tr>
						  
						  
						  <div id="myModal<?php echo $book['book_id']; ?>" class="modal fade" role="dialog">
							 <div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header my-cont">
												<button type="button" class="close" data-dismiss="modal">×</button>
												<h3 class="modal-title my-title">Author</h3>
										</div>
										
										<div class="modal-body my-body">
										<?php		
										foreach($book['author_data'] as $author)
										{ ?>
										
											<h6> <?php  echo $author['author_name']; ?></h6>
										
										<?php	
										}
										?>						
										</div>			
										<div class="modal-footer save">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										</div>
									</div>
							
							</div>
						 </div>						  
                          <?php 
                          }
                        ?>
                      </tbody>
                </table>
					
					
					


                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  function add_book()
  {                       
    window.location.href="<?php echo base_url(); ?>admin/add-book/";
  }
</script>

 <!--cript>
  function userBlock(id)
  {
    var x = confirm("Are you sure you want to block this user ?");
    if (x)
    {
      window.location.href="<?php echo base_url(); ?>admin/Users/userBlock/"+id;
    }
    else
    {
      return false;
    }
  }
</script>
<script>
  function userUnBlock(id)
  {
    var x = confirm("Are you sure you want to unblock this user? ?");
    if (x)
    {
      window.location.href="<?php echo base_url(); ?>admin/Users/userBlock/"+id;
    }
    else
    {
      return false;
    }
  }
</script-->
<script>
  function bookDelete(id)
  {
    if(id)
    {
      var x = confirm("Are you sure you want to delete ?");      
      if (x)
      {
        window.location.href="<?php echo base_url(); ?>admin/Books/bookDelete/"+id;
      }      
      else 
      {
        return false;
      }
    }
  }
</script>