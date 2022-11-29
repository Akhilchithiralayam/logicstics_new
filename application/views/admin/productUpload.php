

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
                           <h2>Product  Status</h2>
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
                                    <h2> Add Product Details</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-8">

 <div class="login_form">
 <form action="<?php echo site_url(); ?>Admin/productUploadAdd" method="post" id="" enctype="multipart/form-data">
<fieldset>                     
<div class="form-group col-md-12">
    <label for="Product id">SKU</label>
    <input type="text" class="form-control" name="sku" id="inputCity">
    </div>
    <div class="form-group col-md-12">
    <label for="Product id">Product Name</label>
    <input type="text" class="form-control" name="product_name" id="inputCity">
    </div>
   
    <div class="form-group col-md-12">
    <label for="Update date">MRP</label>
    <input type="text" class="form-control" name="mrp" id="inputCity">
    </div>
    <div class="form-group col-md-12">
    <label for="Product id">SP</label>
    <input type="text" class="form-control" name="sp" id="inputCity">
    </div>
    <div class="form-group col-md-12">
    <label for="Product id">CP</label>
    <input type="text" class="form-control" name="cp" id="inputCity">
    </div>
   
  
  <div class="d-flex justify-content-end mt-3">
  <a href="<?php echo site_url(); ?>Admin/productUploadList" type="" class="btn btn-success">Product List</a> &nbsp;
  
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
