
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->view('admin/files/header');


?>
<style>
.swal-footer{text-align: center !important;}
</style>
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
                           <h2>Purchase Order Action</h2>
                           </div>
                        </div>
                     </div>
                   
                     
                     <!-- graph -->
                     
                     <!-- end graph -->
                     <div class="row column3">
                        <!-- testimonial -->
                       
                        <!-- end testimonial -->
                        <!-- poStatus form -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2> <span class="text-info"><?php echo $this->uri->segment('3'); ?></span> Action - PO Status </h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-8">
<?php
 foreach($order_details as $order)
{
	$status=$order->status;
}
?>
 <div class="login_form">
 <form  id="book_op_form"    method="post"  enctype="multipart/form-data">
<fieldset class="row">                     
    
    <input type="hidden" id="po_idd" name="po_idd" value="<?php echo $this->uri->segment(3); ?>">
    <input type="hidden" id="order_details" name="order_details_id" value="<?php echo $this->uri->segment(4); ?>">

    <div class="form-group col-md-8">
    <label for="inputState">Action </label>
    <select id="inputState" class="form-control" name="status"  >
    <option value="Open">Open</option>
        <option <?php if($status=='Packed'){ ?> selected <?php } ?> value="Packed">Packed</option>
        <option <?php if($status=='Booked'){ ?> selected <?php } ?>  value="Booked">Booked</option>
        <option <?php if($status=='Enroute'){ ?> selected <?php } ?>  value="Enroute">Pick/Enroute</option>
        <option <?php if($status=='Delivered'){ ?> selected <?php } ?>  value="Delivered">Delivered</option>
        <option <?php if($status=='Tallied'){ ?> selected <?php } ?>  value="Tallied">Tallied</option>
        <option <?php if($status=='Deliver-Stuck'){ ?> selected <?php } ?>  value="Deliver-Stuck">Deliver-Stuck</option>
        <option <?php if($status=='Delay-Stuck'){ ?> selected <?php } ?>  value="Delay-Stuck">Delay-Stuck</option>
      </select>
    </div>
	<div class="form-group col-md-4">
	    <label for="inputState">&nbsp;</label><br>

    <button type="submit" class="btn btn-info">Submit</button>
    
    </div>
   <!-- <div class="form-group col-md-12">
    <label for="Update date">Purchase id</label>
    <input type="datetime-local" class="form-control" name="update_date" id="inputCity">
    </div>-->
   
  
  <div class="d-flex justify-content-end mt-3">
  <!--<a href="<?php echo site_url(); ?>Admin/poStatusList" type="" class="btn btn-success">Purchase List</a> --> 
  
                             
 </div>
 
  
  </fieldset>
 </form>
 
 
 <!--Packed model-->
          <form id="packedForm"   method="post"   enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">

 <div class="modal fade" id="packedModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Open -> Packed</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group col-md-12">
    <label>By</label>
	<select name="staff" class="form-control">
	<option value="">Select Staff</option>
    <?php foreach ($staff_list as $staff ): ?>
    <option value="<?php echo $staff->name; ?>"> <?php echo $staff->name; ?></option>
    <?php endforeach; ?>
	</select>
    </div>
    <div class="form-group col-md-12">
    <label> Remarks</label>
    <input type="text" class="form-control" name="remarks" >
    </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
 </form>
<!--model end-->

 <!--enrouteModel model-->
          <form id="enrouteForm"   method="post"   enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">

 <div class="modal fade" id="enrouteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Booked -> Enroute</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group col-md-12">
    <label>By</label>
    <select name="staff" class="form-control">
	<option value="">Select Staff</option>
    <?php foreach ($staff_list as $staff ): ?>
    <option value="<?php echo $staff->name; ?>"> <?php echo $staff->name; ?></option>
    <?php endforeach; ?>
	</select>
    </div>
    <div class="form-group col-md-12">
    <label> Remarks</label>
    <input type="text" class="form-control" name="remarks" >
    </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
 </form>
<!--enrouteModel model end-->

 <!--booked model-->
          <form id="packedTObookedAdd" action="<?php echo site_url(); ?>Admin/packedTObookedAdd" method="post"   enctype="multipart/form-data">

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Packed -> Booked</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                      
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">
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
	<select name="booked_by" class="form-control">
	<option value="">Select</option>
    <?php foreach ($sent_to as $sent ): ?>
    <option value="<?php echo $sent->location; ?>"> <?php echo $sent->location; ?></option>
    <?php endforeach; ?>
	</select>
    </div>
	 <div class="form-group col-md-12">
    <label for="">Booked Date</label>
    <input type="date" class="form-control" name="booked_date">
    </div>
    <div class="form-group col-md-12">
    <label for="">Contact Number</label>
    <input type="text" class="form-control" name="phone_number" >
    </div>
    <div class="form-group col-md-12">
    <label for="">Est. Pickup Date</label>
    <input type="date" class="form-control" name="est_pickup_date">
    </div>
	<div class="form-group col-md-12">
    <label for="">Remark</label>
    <input type="text" class="form-control" name="remarks">
    </div>
   
  
   
 
  
   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
 </form>
<!--model end-->

 <!--delivered model-->
          <form id="enrouteTodeliveredAdd" action="<?php echo site_url(); ?>Admin/enrouteTodeliveredAdd" method="post"   enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">

 <div class="modal fade" id="enrouteToDeliveredModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Enrout->Delivered</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
	  <div class="form-group col-md-12">
    <label for="">Received by</label>
	<select name="received_by" class="form-control">
	<option value="">Select</option>
    <?php foreach ($sent_to as $sent ): ?>
    <option value="<?php echo $sent->location; ?>"> <?php echo $sent->location; ?></option>
    <?php endforeach; ?>
	</select>
    </div>
    <div class="form-group col-md-12">
    <label for="">Any Charges</label>
    <input type="text" class="form-control" name="charges_paid" >
    </div>
	 <div class="form-group col-md-12">
    <label for="">Reason</label>
    <input type="text" class="form-control" name="reason" >
    </div>
	 <div class="form-group col-md-12">
    <label>By</label>
    <select name="staff" class="form-control">
	<option value="">Select Staff</option>
    <?php foreach ($staff_list as $staff ): ?>
    <option value="<?php echo $staff->name; ?>"> <?php echo $staff->name; ?></option>
    <?php endforeach; ?>
	</select>
    </div>
    <div class="form-group col-md-12">
    <label> Remarks</label>
    <input type="text" class="form-control" name="remarks" >
    </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
 </form>
<!--model end-->

<!--Tallied model-->
          <form id="delivereToTallied" action="<?php echo site_url(); ?>Admin/deliveredTOtalliedAdd" method="post"   enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">

 <div class="modal fade" id="DeliveredToTalliedModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Delivered -> Tallied</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group col-md-12">
    <label for="">Tallied by</label>
    <select name="staff" class="form-control">
	<option value="">Select Staff</option>
    <?php foreach ($staff_list as $staff ): ?>
    <option value="<?php echo $staff->name; ?>"> <?php echo $staff->name; ?></option>
    <?php endforeach; ?>
	</select>
    </div>
    <div class="form-group col-md-12">
    <label for=""> Remarks</label>
    <input type="text" class="form-control" name="remarks" >
    </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
 </form>
<!--model end-->
<!--stuck model-->
          <form id="riseIssue" action="<?php echo site_url(); ?>Admin/riseIssue" method="post"   enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">

 <div class="modal fade" id="riseIssueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Rise Issue </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group col-md-12">
    <label for="">Issue</label>
    <textarea type="text" class="form-control" name="issue" ></textarea>
    </div>
   
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
 </form>
<!--model end-->
 <!-- Deliver Stuck Model -->
          <form id="Deliver_Stuck_Form"   method="post"   enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">

 <div class="modal fade" id="Deliver_StuckModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Deliver Stuck </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group col-md-12">
    <label>By</label>
    <select name="staff" class="form-control">
	<option value="">Select Staff</option>
    <?php foreach ($staff_list as $staff ): ?>
    <option value="<?php echo $staff->name; ?>"> <?php echo $staff->name; ?></option>
    <?php endforeach; ?>
	</select>
    </div>
    <div class="form-group col-md-12">
    <label> Remarks</label>
    <input type="text" class="form-control" name="remarks" >
    </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
 </form>
<!--Deliver StuckModel model  -->
<!-- Deliver Stuck Model -->
          <form id="Delay_Stuck_form"   method="post"   enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">

 <div class="modal fade" id="Delay_Stuck_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Delay-Stuck</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group col-md-12">
    <label>By</label>
    <select name="staff" class="form-control">
	<option value="">Select Staff</option>
    <?php foreach ($staff_list as $staff ): ?>
    <option value="<?php echo $staff->name; ?>"> <?php echo $staff->name; ?></option>
    <?php endforeach; ?>
	</select>
    </div>
    <div class="form-group col-md-12">
    <label> Remarks</label>
    <input type="text" class="form-control" name="remarks" >
    </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
 </form>
<!--Deliver StuckModel model  -->
                  </div>
 

                           </div>
                         </div>
                        <!-- end poStatus form-->
                      </div>
                    </div>
				  </div>
				
				
				
				
				
				<!--remark-->
				
				  <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>     Add Notes    </h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">
<?php
 foreach($order_details as $order)
{
	$status=$order->status;
	$remark=$order->remark;
		  $cart_id=$order->cart_id;

}
?>
 <div class="login_form">
 <form  id="remarkForm"    method="post" action="<?php echo site_url(); ?>Admin/createRemark" enctype="multipart/form-data">
<fieldset class="row">                     
    
    <input type="hidden" id="po_idd" name="po_idd" value="<?php echo $this->uri->segment(3); ?>">
    <input type="hidden" id="order_details" name="order_details_id" value="<?php echo $this->uri->segment(4); ?>">

    <div class="form-group col-md-10">
    <label for="inputState">Remark</label>
    <input type="text" id="inputState" class="form-control" name="remark" value="<?php echo $remark; ?>"  > 
    </div>
	<div class="form-group col-md-2">
	    <label for="inputState">&nbsp;</label><br>

    <button type="submit" class="btn btn-info">Submit</button>
    
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
				
				
				
				
				<!--End remark-->
				
				
				<!-- product list--->

				  <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2> Product List</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">
<?php
 $cart_array=explode(",",$cart_id);
    $cart_count=count($cart_array);
    $table = 'cart';      

   
?>
 
 <form  id="remarkForm"    method="post" action="<?php echo site_url(); ?>Admin/createRemark" enctype="multipart/form-data">
<fieldset class="row">                     
    
        <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                          <th>SKU</th>
                                             <th>Product Name </th>
                                             <th>Quantity </th>
                                             <th>MRP</th>
                                             <th>SP</th>
                                             
                                            
                                          </tr>
                                       </thead>
                                      
                                     <tbody>
									 <?php
									  for($i=0;$i<$cart_count;$i++)
										{
        
											   $c_id=$cart_array[$i];
           $this->db->select('c.id as cart_id,c.product_id,c.quantity,c.status,p.id,p.product_name,p.sku,p.mrp,p.sp');
        $this->db->from('cart c');
        $this->db->join('product_upload p', 'c.product_id=p.id','inner');
        $this->db->where("c.id=$c_id");
        $this->db->order_by('c.id asc');
        $this->db->group_by('c.id');
          $pro = $this->db->get()->row(); 
												
									 ?>
                                          <tr>
                                            <td><?php echo $pro->sku; ?> </td>
                                             <td><?php echo $pro->product_name; ?></td>
                                             <td><?php echo $pro->quantity; ?></td>
                                             <td><?php echo $pro->mrp; ?></td>
                                             <td><?php echo $pro->sp; ?></td>                                          
                                           
                                           
                                          </tr>
                                        <?php } ?>
                                       </tbody>
                                      

                                    </table>
                                 </div>
                              </div>

 
  
  </fieldset>
 </form>
 

                  
 

                           </div>
                         </div>
                      </div>
                    </div>
				  </div>
				<!-- end product list--->

				
				<!-- remark list--->

				  <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2> Remark List</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                             <div class="row">
                             <div class="col-md-12">
 
 
 <form  id="remarkForm"    method="post" action="<?php echo site_url(); ?>Admin/createRemark" enctype="multipart/form-data">
<fieldset class="row">                     
    
        <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                          <th>#</th>
                                             <th>Status </th>
                                             <th>Remark </th>
                                             <th>Staff</th>
                                             
                                            
                                          </tr>
                                       </thead>
                                      
                                     <tbody>
									 <?php
									 $i=0;
                                       foreach($remark_list as $list)
										{
											$i++;
        
											  		
									 ?>
                                          <tr>
                                            <td><?php echo $i; ?> </td>
                                            <td><?php echo $list->status; ?> </td>
                                             <td><?php echo $list->remark; ?></td>
                                             <td><?php echo $list->staff; ?></td>                                          
                                           
                                          </tr>
                                        <?php } ?>
                                       </tbody>
                                      

                                    </table>
                                 </div>
                              </div>

 
  
  </fieldset>
 </form>
 

                  
 

                           </div>
                         </div>
                      </div>
                    </div>
				  </div>
				<!-- end remark list--->

				</div>
			  </div>
			</div>
                  <!-- footer -->
                  <div style="height:100px;"> </div>   
                  



                  <?php
      $this->load->view('admin/files/footer');

?>      

<script type="text/javascript">
function riseIssue() {
	 $("#riseIssueModal").modal('toggle');
	 $('#DeliveredToTalliedModel').modal('hide');

}

$('form#packedForm').submit(function(e) {
                                  

var form = $(this);

 e.preventDefault();
       
     //book_op_form
     
 $.ajax({
     type: "POST",
     url: "<?php echo site_url('admin/poStatusPacked'); ?>",
    data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         dataType : 'json',

     success: function(data){
          swal({
      title: "Success",
      text: data.message,
      icon: "success",
      buttons: [
        'PO Dashboard',
        'Further Action'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
		  			
		    $('#packedModel').modal('hide');



      } else {
		  					window.location.href = "<?php echo site_url(); ?>Admin/createPOlist/";

      }
    })
		    $('#exampleModal').modal('hide');
     }

});
      
     

   }); 

$('form#enrouteForm').submit(function(e) {
                                  

var form = $(this);

 e.preventDefault();
       
     //book_op_form
     
 $.ajax({
     type: "POST",
     url: "<?php echo site_url('admin/pickedTOenrouteAdd'); ?>",
    data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         dataType : 'json',

     success: function(data){
          swal({
      title: "Success",
      text: data.message,
      icon: "success",
      buttons: [
        'PO Dashboard',
        'Further Action'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
		  			
		    $('#enrouteModel').modal('hide');



      } else {
		  					window.location.href = "<?php echo site_url(); ?>Admin/createPOlist/";

      }
    })
		    $('#enrouteModel').modal('hide');
     }

});
      
     

   }); 

$('form#packedTObookedAdd').submit(function(e) {
                                  

var form = $(this);

 e.preventDefault();
       
     //book_op_form
     
 $.ajax({
     type: "POST",
     url: "<?php echo site_url('admin/packedTObookedAdd'); ?>",
    data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         dataType : 'json',

     success: function(data){
          
          swal({
      title: "Success",
      text: data.message,
      icon: "success",
      buttons: [
        'PO Dashboard',
        'Further Action'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
		  			
		    $('#exampleModal').modal('hide');



      } else {
		  					window.location.href = "<?php echo site_url(); ?>Admin/createPOlist/";

      }
    })
		    $('#exampleModal').modal('hide');
     }

});
      
     

   }); 



$('form#enrouteTodeliveredAdd').submit(function(e) {
                                  

var form = $(this);

 e.preventDefault();
       
     //book_op_form
     
 $.ajax({
     type: "POST",
     url: "<?php echo site_url('admin/enrouteTodeliveredAdd'); ?>",
    data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         dataType : 'json',

     success: function(data){
           swal("success", data.message, "success");
		             swal({
      title: "Success",
      text: data.message,
      icon: "success",
      buttons: [
        'PO Dashboard',
        'Further Action'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
		  			
		    $('#enrouteToDeliveredModel').modal('hide');



      } else {
		  					window.location.href = "<?php echo site_url(); ?>Admin/createPOlist/";

      }
    })
		    $('#enrouteToDeliveredModel').modal('hide');
      }

});
      
     

   });  




$('form#delivereToTallied').submit(function(e) {
                                  

var form = $(this);

 e.preventDefault();
       
     //book_op_form
     
 $.ajax({
     type: "POST",
     url: "<?php echo site_url('admin/deliveredTOtalliedAdd'); ?>",
    data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         dataType : 'json',

     success: function(data){
           swal("success", data.message, "success");
		     swal({
      title: "Success",
      text: data.message,
      icon: "success",
      buttons: [
        'PO Dashboard',
        'Further Action'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
		  			
		    $('#DeliveredToTalliedModel').modal('hide');



      } else {
		  					window.location.href = "<?php echo site_url(); ?>Admin/createPOlist/";

      }
    })
		    $('#DeliveredToTalliedModel').modal('hide');
      }

});
      
     

   }); 


$('form#Deliver_Stuck_Form').submit(function(e) {
                                  

var form = $(this);

 e.preventDefault();
       
     //book_op_form
     
 $.ajax({
     type: "POST",
     url: "<?php echo site_url('admin/Deliver_Stuck'); ?>",
    data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         dataType : 'json',

     success: function(data){
           swal("success", data.message, "success");
		     swal({
      title: "Success",
      text: data.message,
      icon: "success",
      buttons: [
        'PO Dashboard',
        'Further Action'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
		  			
		    $('#Deliver_StuckModel').modal('hide');



      } else {
		  					window.location.href = "<?php echo site_url(); ?>Admin/createPOlist/";

      }
    })
		    $('#Deliver_StuckModel').modal('hide');
      }

});
      
     

   }); 



$('form#Delay_Stuck_form').submit(function(e) {
                                  

var form = $(this);

 e.preventDefault();
       
     //book_op_form
     
 $.ajax({
     type: "POST",
     url: "<?php echo site_url('admin/Delay_Stuck'); ?>",
    data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         dataType : 'json',

     success: function(data){
           swal("success", data.message, "success");
		     swal({
      title: "Success",
      text: data.message,
      icon: "success",
      buttons: [
        'PO Dashboard',
        'Further Action'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
		  			
		    $('#Delay_Stuck_model').modal('hide');



      } else {
		  					window.location.href = "<?php echo site_url(); ?>Admin/createPOlist/";

      }
    })
		    $('#Delay_Stuck_model').modal('hide');
      }

});
      
     

   }); 






$('form#riseIssue').submit(function(e) {
                                  

var form = $(this);

 e.preventDefault();
       
     //book_op_form
     
 $.ajax({
     type: "POST",
     url: "<?php echo site_url('admin/riseIssue'); ?>",
    data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         dataType : 'json',

     success: function(data){
           swal("success", data.message, "success");
		    $('#riseIssueModal').modal('hide');
     }

});
      
     

   }); 
 
   
  </script>
   
<script type="text/javascript">

   
$('form#book_op_form').submit(function(e) {
                                 
var form = $(this);

 e.preventDefault();

      var po_idd=document.getElementById("po_idd").value;
      var status=document.getElementById("inputState").value;
	  var order_details=document.getElementById("order_details").value;

	 if(po_idd==null || po_idd=="" || status==null || status=="")
	 {
       swal("warning", "Please enter all details", "info");
	 }
	 else
	 {
	 
	 
if(status=='Packed')
{
	
	 $("#packedModel").modal('toggle');
 
	
}  //if Packed
else
	if(status=='Booked')
{
	 $("#exampleModal").modal('toggle');

}
else if(status=='Enroute')
{	
 $("#enrouteModel").modal('toggle');	
}
else if(status=='Delivered')
{

	 $("#enrouteToDeliveredModel").modal('toggle');
	
}
else if(status=='Tallied')
{

	 $("#DeliveredToTalliedModel").modal('toggle');
	
}
else if(status=='Deliver-Stuck')
{

	 $("#Deliver_StuckModel").modal('toggle');
	
}
else if(status=='Delay-Stuck')
{

	 $("#Delay_Stuck_model").modal('toggle');
	
}


	 }// checking fields empty or not

     //book_op_form
    
      
     

   });
   </script>