<?php  
/**
 * 
 */
class Kuliner extends CI_Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function index()
	{
		$data['kuliner'] = $this->db->query("SELECT * FROM tb_kuliner ORDER BY id_kuliner DESC LIMIT 4")->result_array();

		$this->load->view('homepage/Header');
		$this->load->view('homepage/Kuliner', $data);
		$this->load->view('homepage/Footer');
	}
}
?>