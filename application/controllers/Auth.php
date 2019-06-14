<?php  
/**
 * 
 */
class Auth extends CI_Controller
{
	
	// function __construct()
	// {
	// 	parent::__construct();
	// 	if ($this->session->userdata('status') == 'logged') {
	// 		redirect(base_url().'administrator/dashboard');
	// 	}
	// }
	
	public function index()
	{
		$this->load->view('administrator/Login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek_auth = $this->db->query("SELECT * FROM tb_auth WHERE username = '$username' AND password = '$password' ")->row_array();

		if (count($cek_auth) > 0) {
			$session_auth = array(
				'username' => $cek_auth['username'],
				'id' => $cek_auth['id'],
				'role' => $cek_auth['role'],
				'status' => 'logged'
			);
			$this->session->set_userdata($session_auth);
        	redirect(base_url()."administrator/dashboard");
		} else {
			echo "HALO";
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect(base_url()."administrator");
	}

	public function md5()
	{
		echo md5('');
	}

	public function tes()
	{
		$this->load->view('administrator/Tes');
	}
}
?>