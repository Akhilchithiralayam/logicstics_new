<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

 
	public function __construct()
    {
        parent::__construct();
    }
 

	public function login_process($login_details){
		$Username=$login_details['user_name'];
		$Password=$login_details['password']; 
		 
		$this->db->where('user_name', $Username);
		$this->db->where('password', md5($Password));
		$query = $this->db->get('login');
		$result=$query->row();
		$rowcount = $query->num_rows(); 
		
	if($rowcount>0){
	$passwordStatus='success';
	$login_id=$result->id;
	$role=$result->role;
	$this->session->set_userdata('login_id', $login_id); 
	$this->session->set_userdata('role', $role);
	$login_id = $this->session->userdata('login_id'); 
	return $role = $this->session->userdata('role');
	 
	
	}
	else
	{
	$passwordStatus='false';   
	?>
	<script type="text/javascript">
			alert("Incorrect Username or Password");
	</script>
	<?php
		  redirect('welcome/index','refresh');
	}
	
	  
	return "success";
	
	}

	public function save_login_details($login_details){ 

		$this->db->insert('login', $login_details);
        $id = $this->db->insert_id();
        return $id;

	}

	public function register_staff($register_details)
	{
		$this->db->insert('register', $register_details);
        $id = $this->db->insert_id();
        return $id;
	}
	///////////
public function get_logined_details(){ 
		$login_id = $this->session->userdata('login_id');
        $this->db->where('login_id', $login_id);      
        $query = $this->db->get('profile');
		$res   = $query->result();        
        return $res;

}

  

}
