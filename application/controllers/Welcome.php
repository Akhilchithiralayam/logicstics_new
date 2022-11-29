<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
    {
        parent::__construct();

        $this->load->model('AdminModel'); 
        $this->load->model('LoginModel'); 
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('array');
        $this->load->helper('form');
        $this->load->helper('url');

    }

	public function index()
	{
       

        $this->load->view('admin/login');

      
	}
}
