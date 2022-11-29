<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends CI_Controller
{

    // Load Helper in and Start session.
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('array');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->helper('url', 'form');
        $this->load->library('user_agent');
        $this->load->model('AdminModel');

    }
    public function index()
    {  
        $this->load->view('admin/index');
    }
  //controller starting for  purchase order status 
public function poStatus()
{  
    $order_id=$this->uri->segment('4');

        $table = 'manufacture';
        $where_condition = array();
        $data['manufacture'] = $this->AdminModel->get_where_qry($table, $where_condition);

        $table = 'sent_to';
        $where_condition = array();
        $data['sent_to'] = $this->AdminModel->get_where_qry($table, $where_condition);

        $table = 'remark';
        $where_condition = array(
            "order_details_id" => $order_id
        );
        $data['remark_list'] = $this->AdminModel->get_where_qry($table, $where_condition);
       
        
        $table = 'order_details';
        $where_condition = array(    
            "id" => $order_id
        );
        $data['order_details'] = $this->AdminModel->get_where_qry($table, $where_condition);

        $table = 'profile';
        $where_condition = array(    
            "login_id>=2"
        );
        $data['staff_list'] = $this->AdminModel->get_where_qry($table, $where_condition);

        $this->load->view('admin/poStatus',$data);
}
public function poStatusAdd()
{ 
    // update order details 
    $table = 'order_details';
    $order_details=$this->input->post("order_details");
    $details = array( 
        "status" => $this->input->post("status"),        
    );

    $this->AdminModel->update_qry($table,$details,$order_details);

    // update po_status
        $table = 'po_status';
        
        $details = array(
        "po_id" => $this->input->post("po_id"),
        "status" => $this->input->post("status"),
        "update_date" => date("Y-m-d H:i:s",strtotime($this->input->post('update_date')))

       );

        $poStatus = $this->AdminModel->insert_qry($details,$table);
       // redirect($_SERVER['HTTP_REFERER']);
        $retutnData = array('error' => false, 'message' => 'Packed Successfully');  
        echo json_encode($retutnData); 
}
public function poStatusList()
{
    $table = 'po_status';
        $where_condition = array(           
        );
        $data['poStatusList'] = $this->AdminModel->get_where_qry($table, $where_condition);
        $this->load->view('admin/poStatusList', $data);
   
}
public function poStatusListUpdate()
{
    $id = $this->uri->segment('3');
    $table = 'po_status';
        $where_condition = array(    
            "id" => $id
        );
        $data['poStatusList'] = $this->AdminModel->get_where_qry($table, $where_condition);
        $this->load->view('admin/poStatusListUpdate', $data);
}
public function poStatusListUpdateSave()
{
    $table = 'po_status';
    $id=$this->input->post("id");
    $details = array(  
               
        "po_id" => $this->input->post("po_id"),
        "status" => $this->input->post("status"),  
        "update_date" => date("Y-m-d H:i:s",strtotime($this->input->post('update_date')))
    );

    $this->AdminModel->update_qry($table,$details,$id);
    redirect($_SERVER['HTTP_REFERER']); 
}
public function poStatusListDelete()
{
    $id= $this->uri->segment('3');
    $table = 'po_status';             
    $this->AdminModel->delete_qry($table, $id);
   redirect($_SERVER['HTTP_REFERER']); 

}

  //controller starting for  packed TO booked 
public function packedTObooked()
{  
    $this->load->view('admin/packedTObooked');
}
public function packedTObookedAdd()
{   
        $table = 'booked';
        $details = array(
            "booked_with" => $this->input->post("booked_with"),
            "booked_date" => $this->input->post("booked_date"),
            "awb_no" => $this->input->post("awb_no"),  
        "cost" => $this->input->post("cost"),
        "booked_by" => $this->input->post("booked_by"), 
        "phone_number" => $this->input->post("phone_number"),
        "est_pickup_date" => $this->input->post('est_pickup_date'),          
        "order_id" => $this->input->post('id'),          
       );
        $poStatus = $this->AdminModel->insert_qry($details,$table);


        //update order list

        // update order details 
    $table = 'order_details';
    $order_details_id=$this->input->post("id");
    $details = array( 
        "status" => 'Booked',        
    );

    $this->AdminModel->update_qry($table,$details,$order_details_id);
    // add to remark
    // remark add
    $table = 'remark';
    $details = array(
     "status" => 'Booked',
     "staff" => $this->input->post("booked_by"),
     "remark" => $this->input->post("remarks"),         
     "order_details_id" => $this->input->post("id"),         
   );

    $poStatus = $this->AdminModel->insert_qry($details,$table);


        $retutnData = array('error' => false, 'message' => 'Booked Successfully');  
        echo json_encode($retutnData); 
       // redirect($_SERVER['HTTP_REFERER']); 
}

//controller starting for  Picked TO enroute 
public function pickedTOenroute()
{  
    $this->load->view('admin/pickedTOenroute');
}
public function pickedTOenrouteAdd()
{  
     
        // order details
        $table = 'order_details';
        $order_details_id=$this->input->post("id");
        $details = array( 
            "status" => 'Enroute',        
        );
    
        $this->AdminModel->update_qry($table,$details,$order_details_id);

        // remark add
       $table = 'remark';
       $details = array(
        "status" => 'Enroute',
        "staff" => $this->input->post("staff"),
        "remark" => $this->input->post("remarks"),         
        "order_details_id" => $this->input->post("id"),         
      );

       $poStatus = $this->AdminModel->insert_qry($details,$table);
	   

       // redirect($_SERVER['HTTP_REFERER']); 
       $retutnData = array('error' => false, 'message' => 'Picked/Entrout Successfully');  
       echo json_encode($retutnData);
}

public function poStatusPacked()
{  
     
        // order details
        $table = 'order_details';
        $order_details_id=$this->input->post("id");
        $details = array( 
            "status" => 'Packed',        
        );    
        $this->AdminModel->update_qry($table,$details,$order_details_id);

       // remark add
       $table = 'remark';
       $details = array(
        "status" => 'Packed',
        "staff" => $this->input->post("staff"),
        "remark" => $this->input->post("remarks"),         
        "order_details_id" => $this->input->post("id"),         
      );

       $poStatus = $this->AdminModel->insert_qry($details,$table);
       
       
       $retutnData = array('error' => false, 'message' => 'Packed Successfully');  
       echo json_encode($retutnData);
}


//controller starting for enroute TO Delivered
public function enrouteTodelivered()
{  
    $this->load->view('admin/enrouteTodelivered');
}
public function enrouteTodeliveredAdd()
{  
        $table = 'delivered';
        $details = array(
         "status" => 'Delivered',
         "received_by" => $this->input->post("received_by"),
         "charges_paid" => $this->input->post("charges_paid"),  
         "delivered_date" => date("Y-m-d H:i:s"),       
         "order_id" => $this->input->post('id'),          

       );

        $poStatus = $this->AdminModel->insert_qry($details,$table);



         // order details
         $table = 'order_details';
         $order_details_id=$this->input->post("id");
         $details = array( 
             "status" => 'Delivered',        
         );
     
         $this->AdminModel->update_qry($table,$details,$order_details_id);


         // remark add
       $table = 'remark';
       $details = array(
        "status" => 'Delivered',
        "staff" => $this->input->post("staff"),
        "remark" => $this->input->post("remarks"),         
        "order_details_id" => $this->input->post("id"),         
      );

       $poStatus = $this->AdminModel->insert_qry($details,$table);
	   

        $retutnData = array('error' => false, 'message' => 'Delivered Successfully');  
        echo json_encode($retutnData);
}
//controller starting for Delivered TO tailed
public function deliveredTOtallied()
{  
    $this->load->view('admin/deliveredTOtallied');
}
public function deliveredTOtalliedAdd()
{  
      
        $table = 'order_details';
        $order_details_id=$this->input->post("id");
        $details = array( 
            "status" => 'Tallied',        
        );

        $this->AdminModel->update_qry($table,$details,$order_details_id);

        // remark add
       $table = 'remark';
       $details = array(
        "status" => 'Tallied',
        "staff" => $this->input->post("staff"),
        "remark" => $this->input->post("remarks"),         
        "order_details_id" => $this->input->post("id"),         
      );

       $poStatus = $this->AdminModel->insert_qry($details,$table);

        $retutnData = array('error' => false, 'message' => 'Tallied Successfully');  
        echo json_encode($retutnData);
       // redirect($_SERVER['HTTP_REFERER']); 
}

public function Deliver_Stuck()
{
  $table = 'order_details';
        $order_details_id=$this->input->post("id");
        $details = array( 
            "status" => 'Deliver-Stuck',        
        );

        $this->AdminModel->update_qry($table,$details,$order_details_id);

        // remark add
       $table = 'remark';
       $details = array(
        "status" => 'Deliver-Stuck',
        "staff" => $this->input->post("staff"),
        "remark" => $this->input->post("remarks"),         
        "order_details_id" => $this->input->post("id"),         
      );

       $poStatus = $this->AdminModel->insert_qry($details,$table);

        $retutnData = array('error' => false, 'message' => 'Deliver-Stuck Updated Successfully');  
        echo json_encode($retutnData);   
}
public function Delay_Stuck()
{
  $table = 'order_details';
        $order_details_id=$this->input->post("id");
        $details = array( 
            "status" => 'Delay-Stuck',        
        );

        $this->AdminModel->update_qry($table,$details,$order_details_id);

        // remark add
       $table = 'remark';
       $details = array(
        "status" => 'Delay-Stuck',
        "staff" => $this->input->post("staff"),
        "remark" => $this->input->post("remarks"),         
        "order_details_id" => $this->input->post("id"),         
      );

       $poStatus = $this->AdminModel->insert_qry($details,$table);

        $retutnData = array('error' => false, 'message' => 'Delay-Stuck Updated Successfully');  
        echo json_encode($retutnData);   
}

public function riseIssue()
{  
        $table = 'stuck';
        $details = array(
         "status" => 'Stuck',
        "issue" => $this->input->post("issue"), 
        "order_id" => $this->input->post("id"),          
       );

        $poStatus = $this->AdminModel->insert_qry($details,$table);
       
        $table = 'order_details';
        $order_details_id=$this->input->post("id");
        $details = array( 
            "status" => 'Stuck',        
        );

        $this->AdminModel->update_qry($table,$details,$order_details_id);

        $retutnData = array('error' => false, 'message' => 'Issue Sent Successfully');  
        echo json_encode($retutnData);
       // redirect($_SERVER['HTTP_REFERER']); 
}


//controller starting for register
public function register()
{  
    $this->load->view('admin/register');
}
public function registerAdd()
{  
    $name = $this->input->post("name");
    $email = $this->input->post("email");
    $password = $this->input->post("password");
    $phone_number = $this->input->post("phone_number");
    $address = $this->input->post("address");
    $role = $this->input->post("role");
    $passwordHash = $this->AdminModel->passwordHash($password);



    $table="login";
    $where_condition=array(
       "user_name" =>$email, 
    );
    $count = $this->AdminModel->getCount($table,$where_condition);
    if($count<='0')
    {      
    $table = 'login';
    $details = array(
        "user_name" => $email,
        "password" => $passwordHash,
        "role" => $role,
    );
    $login_id = $this->AdminModel->insert_qry($details, $table);

    $table = 'profile';
    $details = array(
        "login_id" => $login_id,
        "name" => $name,
        "email" => $email,
        "phone_number" => $phone_number,  
        "address" => $address,
    
    );
    $login_id = $this->AdminModel->insert_qry($details, $table);
    $retutnData = array('error' => false, 'message' => 'User Registered Successfully');


        redirect($_SERVER['HTTP_REFERER']); 
}
}
public function registerList()
{  

    $table = 'profile';
   
    $where_condition = array(           
    );
   
    $data['registerList'] = $this->AdminModel->get_where_qry($table,$where_condition);
    $table = 'login';
   
    $where_condition = array(           
    );
   
    $data['loginList'] = $this->AdminModel->get_where_qry($table,$where_condition);

    $this->load->view('admin/registerList', $data);

}
public function registerListUpdate()
{
    $id = $this->uri->segment('3');
    $table = 'profile';
        $where_condition = array(    
            "id" => $id
        );
        $data['registerList'] = $this->AdminModel->get_where_qry($table, $where_condition);
        $this->load->view('admin/registerListUpdate', $data);
}
public function registerListUpdateSave()
{
    $table = 'profile';
    $id=$this->input->post("id");
    $details = array(  
               
        "name" => $this->input->post("name"),
        "email" => $this->input->post("email"),
        "phone_number" => $this->input->post("phone_number"),
        "address" => $this->input->post("address"), 
        "status" => $this->input->post("status"),

    );

    $this->AdminModel->update_qry($table,$details,$id);
    redirect($_SERVER['HTTP_REFERER']); 
}
public function registerListDelete()
{
    $id= $this->uri->segment('3');
    $table = 'profile';             
    $this->AdminModel->delete_qry($table, $id);
   redirect($_SERVER['HTTP_REFERER']); 

}
//controller starting for product upload
public function productUpload()
{  
    $this->load->view('admin/productUpload');
}
public function productUploadAdd()
{  
    $table = 'product_upload';
    $details = array(
    
    "sku" => $this->input->post("sku"),
    "product_name" => $this->input->post("product_name"),
    "mrp" => $this->input->post("mrp"),  
    "sp" => $this->input->post("sp"),  
    "cp" => $this->input->post("cp"),  
   );
    $poStatus = $this->AdminModel->insert_qry($details,$table);
    redirect($_SERVER['HTTP_REFERER']); 
 }
public function productUploadList()
{
    $table = 'product_upload';
        $where_condition = array(           
        );
        $data['productUploadList'] = $this->AdminModel->get_where_qry($table, $where_condition);
        $this->load->view('admin/productUploadList', $data);
   
}
public function productUploadEdit()
{
    $id = $this->uri->segment('3');
    $table = 'product_upload';
        $where_condition = array(    
            "id" => $id
        );
        $data['productUploadList'] = $this->AdminModel->get_where_qry($table, $where_condition);
        $this->load->view('admin/productUploadEdit', $data);
}
public function productUploadEditSave()
{
    $table = 'product_upload';
    $id=$this->input->post("id");
    $details = array(  
               
        "sku" => $this->input->post("sku"),
        "product_name" => $this->input->post("product_name"),
        "mrp" => $this->input->post("mrp"),  
        "sp" => $this->input->post("sp"), 
        "cp" => $this->input->post("cp"),

    );

    $this->AdminModel->update_qry($table,$details,$id);
    redirect($_SERVER['HTTP_REFERER']); 
}
public function productUploadDelete()
{
    $id= $this->uri->segment('3');
    $table = 'product_upload';             
    $this->AdminModel->delete_qry($table, $id);
    redirect($_SERVER['HTTP_REFERER']);
}
//creating controller for purchase order creation
public function createPO(){
    

    $table = 'product_upload';
    $where_condition = array(           
    );
    $data['productList'] = $this->AdminModel->get_where_qry($table, $where_condition);

    $table = 'sent_to';
    $where_condition = array(           
    );
    $data['senttoList'] = $this->AdminModel->get_where_qry($table, $where_condition);

    $table = 'manufacture';
    $where_condition = array(           
    );
    $data['manufactureList'] = $this->AdminModel->get_where_qry($table, $where_condition);

    $data['createPoList'] = $this->AdminModel->listCreatePo();

    $this->load->view('admin/createPO',$data);

}
public function createPOAdd()
{  
    $table = 'cart';
        $details = array(
            "product_id" => $this->input->post("product_id"),
        "quantity" => $this->input->post("quantity"), 
       );
        $poStatus = $this->AdminModel->insert_qry($details,$table);
        redirect($_SERVER['HTTP_REFERER']); 
}
public function createPOAdd2()
{  
    $sent_to = $this->input->post("sent_to");
    $requested_date=date("Y-m-d",strtotime($this->input->post('requested_date')));
    $manufacture= $this->input->post("manufacture");
    $amount=$this->input->post("amount");
      $cart_id=$this->input->post("cart_id");
    date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

     
    $cart_array=explode(",",$cart_id);
    $cart_count=count($cart_array);
    $table = 'cart';      

    for($i=0;$i<$cart_count;$i++)
    {
        
          $cart_id=$cart_array[$i];
        $details = array(                 
            "status" => 'open',
        );    
        $this->AdminModel->update_qry($table,$details,$cart_id);   
    }
 
    $table = 'order_details';
    $cart_ids=$this->input->post("cart_id");

        $details = array(
        "sent_to" =>$sent_to,
        "requested_date" => $requested_date,
        "manufacture" =>$manufacture,
        "amount"=>$amount,
        "cart_id"=>$cart_ids,
        "order_placed_date"=>$date
       );
      
        $poStatus = $this->AdminModel->insert_qry($details,$table);
        $last_id=$this->db->insert_id(); 
        $po_id=$last_id.'-PO-'.$manufacture.'-'.$sent_to;
        $table = 'order_details';      
        $details = array(  
               
            "po_id" => $po_id,
        );    
        $this->AdminModel->update_qry($table,$details,$po_id);
        redirect($_SERVER['HTTP_REFERER']); 
}
public function createPOlist()
{
    
        $data['createPOlist'] = $this->AdminModel->createPOlist();
        $this->load->view('admin/createPOlist', $data);
   
}
 
public function poListByStatus()
{
    $status = $this->input->post("status");
    $sent_to = $this->input->post("sent_to");
    $manufacture = $this->input->post("manufacture");
    $poid = $this->input->post("po_id");
    $from_date =$this->input->post('from_date');
    $to_date =$this->input->post('to_date');
    
  
    $table = 'po_status';
        $where_condition = array(           
        );
        $data['POlistStatus'] = $this->AdminModel->get_where_qry($table, $where_condition);

        $table = 'manufacture';
        $where_condition = array(           
        );
        $data['POlistManufacture'] = $this->AdminModel->get_where_qry($table, $where_condition);

        $table = 'sent_to';
        $where_condition = array(           
        );
        $data['POlistSentto'] = $this->AdminModel->get_where_qry($table, $where_condition);

        $table = 'order_details';
        $where_condition = array(           
        );
        $data['poIdDetails'] = $this->AdminModel->get_where_qry($table, $where_condition);
        

        // order details
        $table = 'order_details';
      
            if($status!=''){
                $where_condition = array(
                    "status" =>$status        
                );
                $data['order_details_list'] =$order_details_list= $this->AdminModel->get_where_qry($table,$where_condition);

            }
            
            else if($sent_to!=''){
                $where_condition = array(
                    "sent_to" =>$sent_to      
                );
                $data['order_details_list'] =$order_details_list= $this->AdminModel->get_where_qry($table,$where_condition);

            }
            else if($manufacture!=''){

                $where_condition = array(
                    "manufacture" =>$manufacture     
                );
                $data['order_details_list'] =$order_details_list= $this->AdminModel->get_where_qry($table,$where_condition);

                    }
                    else if($poid!=''){

                        $where_condition = array(
                            "po_id" =>$poid
                            
                            
                        );
                        $data['order_details_list'] =$order_details_list= $this->AdminModel->get_where_qry($table,$where_condition);

                            }
                            
                         
                            else if($from_date!=''){
                            
                             
                       $this->db->where('requested_date >=', $from_date);
                       $this->db->where('requested_date <=', $to_date);
                       $data['order_details_list'] = $this->db->get('order_details')->result(); 
                             
                                    }
                                  

       
         
        $this->load->view('admin/poListByStatus',$data);


}

public function createRemark()
{ 
    // update order details 
    $table = 'order_details';
    $order_details=$this->input->post("order_details_id");
    $details = array( 
        "remark" => $this->input->post("remark"),        
    );

    $this->AdminModel->update_qry($table,$details,$order_details);

    
    
        redirect($_SERVER['HTTP_REFERER']);
       
}

public function createPOlistDelete()
{
    $id= $this->uri->segment('3');
    $table = 'product_upload';            
    $this->AdminModel->delete_qry($table, $id);
    redirect($_SERVER['HTTP_REFERER']);
   
}
public function PoListDelete()
{
    
    $id= $this->uri->segment('3');
    $table = 'order_details';            
    $this->AdminModel->delete_qry($table, $id);
    redirect($_SERVER['HTTP_REFERER']);
}

public function editCount()
{
    $qnty = $this->input->post("qnty");
    $table = 'cart';
    $cart_id=$this->input->post("id"); 
    $details = array( 
        "quantity" => $this->input->post("qnty"),        
    );

    $this->AdminModel->update_qry($table,$details,$cart_id);
    redirect($_SERVER['HTTP_REFERER']);
     
}
public function toBeApprove()
{
 
    $data['toBeApproveList'] = $this->AdminModel->toBeApproveList();
    $this->load->view('admin/toBeApprove', $data);
}
public function approve()
{
    $order_details_id=$this->uri->segment('3');
    $table = 'profile';
    $where_condition = array(           
    );
  
    $data['approvelist'] = $this->AdminModel->get_where_qry($table,$where_condition);
   
    $this->load->view('admin/approve',$data);
    
}
public function approveSave()
{
   
    $table = 'remark';
    $details = array(
     "order_details_id"=>$this->input->post("id"),
    "status"=>'Approved',
    "staff" => $this->input->post("staff"),
    "remark" => $this->input->post("remark"),
   
   );
    $poStatus = $this->AdminModel->insert_qry($details,$table);


    $id=$this->input->post("id");
    $table = 'order_details';
    $details = array( 
        "status"=>'Approved', 
        "remark" => $this->input->post("remark"),    
    );

    $this->AdminModel->update_qry($table,$details,$id);

    redirect($_SERVER['HTTP_REFERER']); 
}
public function dashboard()
{
    $table = 'order_details';
    $where_condition = array(
        "status"=>'To_Be_Approve'
    );
    $data['To_Be_Approve'] = $this->AdminModel->get_where_qry($table, $where_condition);
    $where_condition = array(
        "status"=>'Approved'
    );
    $data['Approved'] = $this->AdminModel->get_where_qry($table, $where_condition);
    $where_condition = array(
        "status"=>'Packed'
    );
    $data['Packed'] = $this->AdminModel->get_where_qry($table, $where_condition);
    $where_condition = array(
        "status"=>'Booked'
    );
    $data['Booked'] = $this->AdminModel->get_where_qry($table, $where_condition);
    $where_condition = array(
        "status"=>'Enroute'
    );
    $data['Enroute'] = $this->AdminModel->get_where_qry($table, $where_condition);
    $where_condition = array(
        "status"=>'Delivered'
    );
    $data['Delivered'] = $this->AdminModel->get_where_qry($table, $where_condition);
    $where_condition = array(
        "status"=>'Tallied'
    );
    $data['Tallied'] = $this->AdminModel->get_where_qry($table, $where_condition);
    $where_condition = array(
        "status"=>'Deliver-Stuck'
    );
    $data['Deliver_Stuck'] = $this->AdminModel->get_where_qry($table, $where_condition);
    $where_condition = array(
        "status"=>'Delay-Stuck'
    );
    $data['Delay_Stuck'] = $this->AdminModel->get_where_qry($table, $where_condition);

    
    

    $this->load->view('admin/dashboard',$data);
   
}
 
}

?>
