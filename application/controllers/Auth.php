<?php  
/**
 * 
 */
class Auth extends CI_Controller
{
	
	// function __construct()
	// {
	// 	parent::__construct();		
	// }

	public function index()
	{
		if ($this->session->userdata('status') == 'logged') {
			redirect(base_url().'administrator/dashboard');
		} else {
			$this->load->view('administrator/Login');
		}		
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
			$this->session->set_flashdata('loginError', 'Login Error, Silahkan Periksa Kembali Username atau Password anda.');
			redirect(base_url().'auth');
		}
	}

	public function lupa_password()
	{
		$this->load->view('administrator/Lupa_password');
	}

	public function kirim_email()
	{
		$this->load->library('email');

		$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_user' => 'ilhamsendgridaccount',
			'smtp_pass' => 'apaen1565487441setakbisacankok',
			'smtp_port' => 587,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		));

		$this->email->from('pratama@ilhamsurya.com', 'Email Konfirmasi Ulang Password');
		$this->email->to('luthfirobit@gmail.com');
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
		$this->email->send();

		echo $this->email->print_debugger();
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