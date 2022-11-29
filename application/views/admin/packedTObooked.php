
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
                           <h2>Booked Details</h2>
                           </div>
                        </div>
                     </div>
                   
                     
                     <!-- graph -->
                     
                     <!-- end graph -->
                     <div class="row column3">
                        <!-- testimonial -->
                       
                        <!-- end testimonial -->
                        <!-- poStatus form -->
                        <div class="col-md-10">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Booked Details</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-8">

 <div class="login_form">
 <form action="<?php echo site_url(); ?>Admin/packedTObookedAdd" method="post" id="" enctype="multipart/form-data">
<fieldset>                     
    
    <div class="form-group col-md-12">
    <label for="">Booked With</label>
    <input type="text" class="form-control" name="booked_with" >
    </div>
    <div class="form-group col-md-12">
    <label for="">AWB Number</label>
    <input type="text" class="form-control" name="awb_no" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Cost</label>
    <input type="text" class="form-control" name="cost" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Booked by</label>
    <input type="text" class="form-control" name="booked_by" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Contact Number</label>
    <input type="text" class="form-control" name="phone_number" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Pickup Date</label>
    <input type="datetime-local" class="form-control" name="est_pickup_date">
    </div>
   
  
  <div class="d-flex justify-content-end mt-3">
  <a href="<?php echo site_url(); ?>Admin/poStatusList" type="" class="btn btn-success">Booked List</a> &nbsp;
  
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 </div>
 
  
  </fieldset>
 </form>
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
