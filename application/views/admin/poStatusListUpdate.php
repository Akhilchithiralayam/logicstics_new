
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
                              <h2>Purchase Order Status</h2>
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
                                    <h2>Purchase Order Edit</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

 <div class="login_form">
 <?php
								foreach($poStatusList as $poStatus)
								{
									
								?>
 <form action="<?php echo site_url(); ?>Admin/poStatusListUpdateSave" method="post" id="" enctype="multipart/form-data">
 <input name="id" value="<?php echo $poStatus->id; ?>" type="hidden" >
<fieldset>                     
   
    <div class="form-group col-md-12">
    <label for="Product id">Purchase id</label>
    <input type="text" class="form-control" name="po_id" id="inputCity" value="<?php echo $poStatus->po_id; ?>">
    </div>
    <div class="form-group col-md-12">
    <label for="inputState">Status</label>
    <select id="inputState" class="form-control" name="status" value="<?php echo $poStatus->status;?>">
    <option>Open</option>
        <option>Packed</option>
        <option>Booked</option>
        <option>Pick/enrout</option>
        <option>Delivered</option>
        <option>Tallied</option>
        <option>Stuck</option>
      </select>
    </div>
    <div class="form-group col-md-12">
    <label for="Product id">Update Date</label>
    <input type="datetime-local" class="form-control" name="update_date" id="inputCity" value="<?php echo $poStatus->update_date; ?>">
    </div>
   
 
  <div class="d-flex justify-content-end mt-3">
  <a href="<?php echo site_url(); ?>Admin/poStatusList" type="" class="btn btn-success">Purchase List</a> &nbsp;
  
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
