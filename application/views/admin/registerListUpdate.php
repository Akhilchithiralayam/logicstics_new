
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->view('admin/files/header');


?>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php
            $this->load->view('admin/files/sidebar.php');
            ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
              <?php 
              $this->load->view('admin/files/topbar.php');
              ?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Staff  Details</h2>
                           </div>
                        </div>
                     </div>
                   
                     
                     <!-- graph -->
                     
                     <!-- end graph -->
                     <div class="row column3">
                        <!-- testimonial -->
                       
                        <!-- end testimonial -->
                        <!-- poStatus form -->
                        <div class="col-md-8">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2> Update Staff Details </h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

 <div class="login_form">
 <?php
								foreach($registerList as $register)
								{
									
								?>
 <form action="<?php echo site_url(); ?>Admin/registerListUpdateSave" method="post" id="" enctype="multipart/form-data">
 <input name="id" value="<?php echo $register->id; ?>" type="hidden" >
<fieldset>                     
<div class="form-group col-md-12">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $register->name; ?>" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $register->email; ?>" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Phone Number</label>
    <input type="text" class="form-control" name="phone_number" value="<?php echo $register->phone_number; ?>" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Address</label>
    <input type="text" class="form-control" name="address" value="<?php echo $register->address; ?>">
    </div>
  <div class="d-flex justify-content-end mt-3">
  <a href="<?php echo site_url(); ?>Admin/registerList" type="" class="btn btn-success">Staff List</a> &nbsp;

     <button type="submit" name="submit" class="btn btn-primary">Update</button>
 </div>
 
  
  </fieldset>
 </form>
 <?php  } ?>
                  </div>


                           </div>
                         </div>
                        <!-- end poStatus form-->
                      </div>
                    </div>
				  </div>
				</div>
			  </div>
			</div>
                  <!-- footer -->
                  <div style="height:100px;"> </div>   
                  



                  <?php
      $this->load->view('admin/files/footer');

?>
