
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
                              <h2>PO Dashboard</h2>
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
                                    <h2>PO List</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">
<!--table for product status listing-->
<div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                            

                       
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <th>#</th>
                                             <th>Id</th>
                                             <th>Cart id</th>
                                             <th>PO id</th>
                                             <th>Amount</th>
                                             <th>Requested Date</th>
                                             <th>Sent TO</th>
                                             <th>Manufacture</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                             <th>Delete</th>
                                          </tr>
                                       </thead>
                                       <?php
									   $i=0;
								foreach($createPOlist as $list)
								{
									$i++;
                           
		
								?>
                                     <tbody>
                                          <tr>
                                             <td><?php echo $i; ?></td>
                                             <td><?php echo $list->id; ?></td>
                                             <td><?php echo $list->cart_id; ?></td>
                                             <td><?php echo $list->po_id;?></td>
                                             <td><?php echo $list->amount; ?></td>
                                             <td><?php echo $list->requested_date; ?></td>
                                             <td><?php echo $list->sent_to;?></td>
                                             <td><?php echo $list->manufacture; ?></td>
                                             <td><span class="<?php echo $list->status; ?> btn"><?php echo $list->status; ?></span></td>
                                             <td>
                               <a style="background-color:#FF5722;border-color:#FF5722;" href="<?php echo site_url(); ?>Admin/poStatus/<?php echo $list->po_id; ?>/<?php echo $list->id; ?>" class="btn btn-sm btn-success ">Action</a>


                                             </td>

                                             <td>				
                           		<a style="background-color:#C1C1C1;border-color:#C1C1C1;"  onclick="return confirm('Are you sure you want to delete?');" href="<?php echo site_url(); ?>Admin/PoListDelete/<?php echo $list->id; ?>" class="btn btn-sm btn-danger">Delete</a>
											</td>
                                          </tr>
                                       
                                       </tbody>
                                       <?php } ?>

                                    </table>
                                 </div>
                              </div>

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
