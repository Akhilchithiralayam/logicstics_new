
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
                           <h2>Search</h2>
                           </div>
                        </div>
                     </div>
                   
                     
                     <!-- graph -->
                     
                     <!-- end graph -->




                     <div class="row column-3">
                        <!-- testimonial -->
        <!-- top bar style starting                -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                            
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style2">
                                          <div class="tabbar padding_infor_info">
                                             <nav>
                                                <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                                                   <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home_s2" role="tab" aria-controls="nav-home_s2" aria-selected="true">By Status</a>
                                                   <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile_s2" role="tab" aria-controls="nav-profile_s2" aria-selected="false">By Sent To</a>
                                                   <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-contact_s2" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">By Manufacturer</a>
                                                   <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-product" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">By Po Id</a>
                                                   <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-date" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">By Requested Date </a>

                                                </div>
                                             </nav>
                                             <div class="tab-content" id="nav-tabContent_2">
                                                <div class="tab-pane fade show active" id="nav-home_s2" role="tabpanel" aria-labelledby="nav-home-tab">
   <!-- topbar content -->
                                                <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

 <div class="login_form">
 <form action="<?php echo site_url(); ?>Admin/poListByStatus" method="post" id="" enctype="multipart/form-data">
<fieldset>                     
    <div class="row">
   
    <div class="form-group col-md-4 mt-3">
    <label for="inputState">Items</label>
  
    <select id="inputState" class="form-control" name="status" value="">
    <?php
   
   foreach($POlistStatus as $list)
  {
   
?>
    <option value="<?php echo $list->status;?>"><?php echo $list->status;?></option>
    
    <?php } ?>   
      </select> 
    </div>
    <div class="col-md-4 mt-5">

    <button type="submit" class="btn btn-md btn-block btn-success">Search</button> &nbsp;

    </div>

    </div>
  </fieldset>
 </form>
                  </div>


                           </div>

                         </div>
                        <!-- end poStatus form-->
                      </div>

                                                </div>
                                                <div class="tab-pane fade" id="nav-profile_s2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                              
                                                <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

 <div class="login_form">
 <form action="<?php echo site_url(); ?>Admin/poListByStatus" method="post" id="" enctype="multipart/form-data">
<fieldset>                     
    <div class="row">
   
    <div class="form-group col-md-4 mt-3">
    <label for="inputState">Sent To</label>
  
    <select id="inputState" class="form-control" name="sent_to" value="">
    <?php
   
   foreach($POlistSentto as $sent)
  {
   
?>
    <option value="<?php echo $sent->location;?>"><?php echo $sent->location;?></option>
    
    <?php } ?>   
      </select> 
    </div>
    <div class="col-md-4 mt-5">

    <button type="submit" class="btn btn-md btn-block btn-success">Search</button> &nbsp;

    </div>

    </div>
  </fieldset>
 </form>
                  </div>
                           </div>
                         </div>
                        <!-- end poStatus form-->
                      </div>

                                                </div>
                                                <div class="tab-pane fade" id="nav-contact_s2" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                
                                                <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

 <div class="login_form">
 <form action="<?php echo site_url(); ?>Admin/poListByStatus" method="post" id="" enctype="multipart/form-data">
<fieldset>                     
    <div class="row">
   
    <div class="form-group col-md-4 mt-3">
    <label for="inputState">Manufacture</label>
  
    <select id="inputState" class="form-control" name="manufacture" value="">
    <?php
   
   foreach($POlistManufacture as $manufacture)
  {
   
?>
    <option value="<?php echo $manufacture->manufacture;?>"><?php echo $manufacture->manufacture;?></option>
    
    <?php } ?>   
      </select> 
    </div>
    <div class="col-md-4 mt-5">

    <button type="submit" class="btn btn-md btn-block btn-success">Search</button> &nbsp;

    </div>

    </div>
  </fieldset>
 </form>
                  </div>
                           </div>
                         </div>
                        <!-- end poStatus form-->
                      </div>

                                                </div>

                                                <div class="tab-pane fade" id="nav-product" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                
                                                <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

 <div class="login_form">
 <form action="<?php echo site_url(); ?>Admin/poListByStatus" method="post" id="" enctype="multipart/form-data">
<fieldset>                     
    <div class="row">
   
    <div class="form-group col-md-4 mt-3">
    <label for="inputState">Po Id</label>
  
    <select id="inputState" class="form-control" name="po_id" value="">
    <?php
   
   foreach($poIdDetails as $poid)
  {
   
?>
    <option value="<?php echo $poid->po_id;?>"><?php echo $poid->po_id;?></option>
    
    <?php } ?>   
      </select> 
    </div>
    <div class="col-md-4 mt-5">

    <button type="submit" class="btn btn-md btn-block btn-success">Search</button> &nbsp;

    </div>

    </div>
  </fieldset>
 </form>
                  </div>
                           </div>

                         </div>
                        <!-- end poStatus form-->
                      </div>

                                                </div>
                                                <div class="tab-pane fade" id="nav-date" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                
                                                <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

 <div class="login_form">
 <form action="<?php echo site_url(); ?>Admin/poListByStatus" method="post" id="" enctype="multipart/form-data">
<fieldset>                     
    <div class="row">
   
    <div class="form-group col-sm-3 mt-3">
    <label for="Update date">From Date</label>
    <input type="date" class="form-control" name="from_date" id="inputCity" value="">
    </div>
    <div class="form-group col-sm-3 mt-3">
    <label for="Update date">To Date</label>
    <input type="date" class="form-control" name="to_date" id="inputCity" value="">
    </div> 
    <div class="col-md-3 mt-5">

    <button type="submit" class="btn btn-md btn-block btn-success">Search</button> &nbsp;

    </div>

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
                                 </div>
                              </div>
                           </div>
                        </div>  
                        
                        <!-- top bar ending -->
<!-- for table creation -->
              <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

                             <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>

                                          <tr>
                                             <th>PO Id</th>
                                             <th>Amount</th>                                            
                                             <th>Requested Date</th>
                                             <th>Manufacturer</th>
                                             <th>Send To</th>
                                             <th>Status</th>
                                             <th>Remark</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                      
                                     <tbody>
                                 
                                     <?php
								foreach($order_details_list as $list)
								{                        
		
								?>

                                          <tr>
                                             <td><?php echo $list->po_id; ?></td>
                                             <td><?php echo $list->amount; ?></td>
                                             <td><?php echo $list->requested_date; ?></td>
                                             <td><?php echo $list->manufacture ?></td>
                                             <td><?php echo $list->sent_to; ?></td>
                                             <td><?php echo $list->status; ?></td>
                                             <td><?php echo $list->remark; ?></td>
                                             <td>
                               <a style="background-color:#FF5722;border-color:#FF5722;" href="<?php echo site_url(); ?>Admin/poStatus/<?php echo $list->po_id; ?>/<?php echo $list->id; ?>" class="btn btn-sm btn-success ">Action</a>


                                             </td>
                                          </tr>  
                                          
                                          <?php  }?>
                                       </tbody>
                                     

                                    </table>
                                 </div>
                              </div>


                           </div>
                         </div>
                        <!-- end poStatus form-->
                      </div>
                    </div>
				  </div>

<!-- second form creation -->
				</div>
			  </div>
			</div>
                  <!-- footer -->
                  <div style="height:100px;"> </div>                    
                  <?php
      $this->load->view('admin/files/footer');

?>
