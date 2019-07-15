<?php  
/**
 * 
 */
class Akomodasi extends CI_Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function index()
	{
		$data['hotel'] = $this->db->query("SELECT * FROM tb_hotel ORDER BY id_hotel DESC LIMIT 3")->result_array();

		$this->load->view('homepage/Header');
		$this->load->view('homepage/Akomodasi', $data);
		$this->load->view('homepage/Footer');
	}
}
?>