<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('array');
        $this->load->helper('url');
        $this->load->model('LoginModel');

    }

// ---------------------------------------------------------------------------
    //                 Login

// ---------------------------------------------------------------------------
public function Login()
{

if ($this->input->post('user_name')) {

         $Username = $this->input->post('user_name');
        $Password = $this->input->post('password');
      
        $login_details = array(
            "user_name" => $Username,
            "password" => $Password,
        );
       // print_r($login_details);

           $role = $this->LoginModel->login_process($login_details);
        
       
       $retutnData = array('error' => false,'role' => $role, 'message' => 'Login Successfully');  
        echo json_encode($retutnData); 
       /* if($role=='super_admin')
        {
            redirect('admin/dashboard','refresh');

        }
        if($role=='manager')
        {
            redirect('admin/ManagerStaffList','refresh');

        }

        if($role=='Staff')
        {
            redirect('admin/workUpload','refresh');

        }*/

    }



    //$this->load->view('admin/login');
    
}


  
// ------------------------------------------------------------------------------
 
    //                   logout Process
    // ------------------------------------------------------------------------------
// ---------------------------------------------------------------------------
 
}
