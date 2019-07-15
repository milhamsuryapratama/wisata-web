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
		$data['kuliner'] = $this->db->query("SELECT * FROM tb_kuliner ORDER BY id_kuliner DESC")->result_array();
		// $data['galery'] = $this->Admin_model->ambil_data_by_id_result('tb_galery_kuliner','id_galery_kuliner',$data['kuliner']['id_kuliner']);

		$this->load->view('homepage/Header');
		$this->load->view('homepage/Kuliner', $data);
		$this->load->view('homepage/Footer');
	}
}
?>