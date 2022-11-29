
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
                           <h2>Create PO</h2>
                           </div>
                        </div>
                     </div>
                   
                     
                     <!-- graph -->
                     
                     <!-- end graph -->
                     <div class="row column-3">
                        <!-- testimonial -->
                       
                        <!-- end testimonial -->
                        <!-- poStatus form -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Products </h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

 <div class="login_form">
 <form action="<?php echo site_url(); ?>Admin/createPOAdd" method="post" id="" enctype="multipart/form-data">
<fieldset>                     
    <div class="row">
   
    <div class="form-group col-md-4 mt-3">
    <label for="inputState">Items</label>
  
    <select id="inputState" class="form-control" name="product_id" value="">
	    <option value="" >Select Product</option>

    <?php
      	foreach($productList as $product)
         {
      ?>
    <option value="<?php echo $product->id;?>" ><?php echo $product->product_name; ?></option>
    
    <?php } ?> 
      </select>
     
    </div>
    <div class="form-group col-md-4 mt-3">
    <label for="Product id">Quantity</label>
    <input type="text" class="form-control" name="quantity" id="inputCity">
    </div>
    <div class="col-md-4 mt-5">
    <button type="submit" class="btn btn-md btn-block btn-success">Add to PO</button> &nbsp;

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

<!-- for table creation -->

              <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2> Selected Products</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">

                             <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <th>No</th>
                                             <th>SKU</th>                                            
                                             <th>Items for Ordering</th>
                                             <th>quantity</th>
                                             <th>MRP</th>
                                             <th>SP</th>
                                             <th>Edit</th>
                                             <th>Remove</th>
                                          </tr>
                                       </thead>
                      
                                     <tbody>
                                     <?php
                                     $totalamount=0;
                                     $product_id='';
                                     $c = 0;
                                     
      	foreach($createPoList as $poList)
         {
            $c++;
            $totalamount+=$poList->sp;
            if ($c >= 2) {
               $product_id = $product_id . "," . $poList->cart_id;
                } else {
                  $product_id=$poList->cart_id;
                  
            }

      ?>
                                          <tr>
                                             <td><?php echo $c;?></td>
                                             <td><?php echo $poList->sku;?></td>
                                             <td><?php echo $poList->product_name;?> </td>
                                             <td><?php echo $poList->quantity;?></td>
                                             <td><?php echo $poList->mrp;?></td>
                                             <td><?php echo $poList->sp;?></td>
											 <td>    <span type="button" class="btn btn-success" data-toggle="modal" data-target="#editModel<?php echo $c;?>">Edit Count</span>
</td>
<td>  <a onclick="return confirm('Are you sure you want to Remove?');" href="<?php echo site_url(); ?>Admin/createPOListDelete/<?php echo $poList->id; ?>" class="btn btn-sm btn-danger">Remove</a>  </td>                                       
  </tr>
  <form id="packedForm"   method="post" action="<?php echo site_url(); ?>Admin/editCount"   enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $poList->cart_id; ?>">

 <div class="modal fade" id="editModel<?php echo $c;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Count</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
   
    <div class="form-group col-md-12">
    <label> Quantity</label>
    <input type="text" class="form-control" name="qnty" value="<?php echo $poList->quantity;?>" >
    </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
 </form>
                                          <?php } ?>
                                       
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
              <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                             <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Place Order</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">
                       
                    
 <div class="login_form">
 <form action="<?php echo site_url(); ?>Admin/createPOAdd2" method="post" id="" enctype="multipart/form-data">
 <input type="hidden" value="<?php echo $totalamount ?>" class="form-control" name="amount" id="inputCity">
 <input type="hidden" value="<?php echo $product_id ?>" class="form-control" name="cart_id" id="inputCity">


<fieldset>                     
    <div class="row">
    <div class="form-group col-md-3 mt-3 ">
    <label for="inputState">Send to</label>
    <select id="inputState" class="form-control" name="sent_to" value="hgfcu">
    <?php
   
      	foreach($senttoList as $sentTO)
         {
          
      ?>

    <option><?php echo $sentTO->location;?> </option>
    <?php } ?>           
      </select>
    </div>
    <div class="form-group col-md-3 mt-3 ">
    <label for="Product id">Request Date</label>
    <input type="date" class="form-control" name="requested_date" id="inputCity">
    </div>
    <div class="form-group col-md-3 mt-3">
    <label for="inputState">Manufacture</label>
   
    <select id="inputState" class="form-control" name="manufacture" >
    <?php
      	foreach($manufactureList as $manufacture)
         {
      ?>
    <option><?php echo $manufacture->manufacture;?> </option>
    <?php } ?>
      </select>
     
    </div>
    <div class="col-md-3 mt-5">
    <button  type="submit" class="btn btn-md btn-block  btn-success">Place Order</button> &nbsp;

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
                  <!-- footer -->
                  <div style="height:100px;"> </div>                    
                  <?php
      $this->load->view('admin/files/footer');

?>
