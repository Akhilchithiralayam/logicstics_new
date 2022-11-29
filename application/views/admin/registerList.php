
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
                              <h2>Staff Details</h2>
                           </div>
                        </div>
                     </div>
                   
                     
                     <!-- graph -->
                     
                     <!-- end graph -->
                     <div class="row column3">
                        <!-- testimonial -->
                       
                        <!-- end testimonial -->
                        <!-- poStatus form -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2> Staff List</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">
<!--table for product status listing-->
<div class="col-md-12">
                           
                             

                       
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Contact Number</th>
                                             <th>Address</th>
                                          
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <?php
								foreach($registerList as $register)
								{
                           
		
								?>
                                     <tbody>
                                          <tr>
                                             <td><?php echo $register->name; ?></td>
                                             <td><?php echo $register->email; ?></td>
                                             <td><?php echo $register->phone_number;?></td>
                                             <td><?php echo $register->address; ?></td>
                                            
                                            
                                           
                                             <td>
                               <a href="<?php echo site_url(); ?>Admin/registerListUpdate/<?php echo $register->id; ?>" class="btn btn-sm btn-primary ">&nbsp; Edit &nbsp;</a>


                                             </td>
                                             <td>				
                           		<a onclick="return confirm('Are you sure you want to delete?');" href="<?php echo site_url(); ?>Admin/registerListDelete/<?php echo $register->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                                             </td>
                                          </tr>
                                       
                                       </tbody>
                                       <?php } ?>

                                    </table>
                                 </div>
                              </div>

       

                           

                           <div class="justify-content-end">
  <a href="<?php echo site_url(); ?>Admin/register" type="" class="btn btn-success float-right mb-4 mr-3"> Add Staff</a> &nbsp;

 </div>

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
