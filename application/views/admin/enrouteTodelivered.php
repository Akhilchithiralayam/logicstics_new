
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
                           <h2>Delivered Details</h2>
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
                                    <h2>Add Delivered Details</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-8">

 <div class="login_form">
 <form action="" method="post" id="enrouteTodelivered" enctype="multipart/form-data">
<fieldset>                     
<div class="form-group col-md-12">
    <label for="">Status</label>
    <input type="text" class="form-control" name="status" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Received by</label>
    <input type="text" class="form-control" name="received_by" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Charges Paid</label>
    <input type="text" class="form-control" name="charges_paid" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Delivered date</label>
    <input type="datetime-local" class="form-control" name="delivered_date" >
    </div>
    <div class="col-12 mt-4 ">
    <div id="errorMsg" class="alert alert-danger d-none" role="alert">
                                       
                                       </div>
                              <div id="successMsg" class="alert alert-success  d-none" role="alert">
                                           
                                       </div>
    
  <div class="d-flex justify-content-end mt-3">
  <a href="<?php echo site_url(); ?>Admin/poStatusList" type="" class="btn btn-success">Enroute List</a> &nbsp;
     <button type="submit" name="submit" class="btn btn-primary">Save</button>
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
                  

   <script type="text/javascript">
 
 $('form#enrouteTodelivered').submit(function(e) {
                                  

                                  var form = $(this);
                                  
                                   e.preventDefault();
                                        
                                       //book_op_form
                                       
                                  
                                   $.ajax({
                                       type: "POST",
                                       url: "<?php echo site_url('Admin/enrouteTodeliveredAdd'); ?>",
                                      data:  new FormData(this),
                                           mimeType:"multipart/form-data",
                                           contentType: false,
                                           cache: false,
                                           processData:false,
                                           dataType : 'json',
                                  
                                       success: function(data){
                                                    if (data.error == false) { 
                                                            var message=data.message;       
                                                                
                                           swal({
                                            title: "Success",
                                            text: "Save Successfully!",
                                            icon: "success",
                                            buttons: 'ok',
                                            successMode: true,
                                          }).then(function(isConfirm) {
                                          
                                        window.location.reload();
                                          });
                                  
                                                   }
                                                    
                                  
                                  
                                       }
                                  
                                  });
                                        
                                       
                                  
                                     });
                                     

	  </script>
                  <?php
     $this->load->view('admin/files/footer');

?>


