<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $data['wisata'] = $this->db->query("SELECT * FROM tb_wisata ORDER BY id_wisata DESC LIMIT 3")->result_array();
		// $data['hotel'] = $this->db->query("SELECT * FROM tb_hotel ORDER BY id_hotel DESC LIMIT 3")->result_array();
		// $data['kuliner'] = $this->db->query("SELECT * FROM tb_kuliner ORDER BY id_kuliner DESC LIMIT 3")->result_array();
		// $data['artikel'] = $this->db->query("SELECT * FROM tb_blog ORDER BY id_blog DESC LIMIT 2")->result_array();

		$this->load->view('homepage/Header');
		$this->load->view('homepage/Home');
		$this->load->view('homepage/Footer');
	}
}
