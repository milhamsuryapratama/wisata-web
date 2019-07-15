<?php  
/**
 * 
 */
class Budaya extends CI_Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function index()
	{
		$data['budaya'] = $this->db->query("SELECT * FROM tb_budaya ORDER BY id_budaya DESC")->result_array();

		$this->load->view('homepage/Header');
		$this->load->view('homepage/Budaya', $data);
		$this->load->view('homepage/Footer');
	}

	public function detail($slug)
	{
		$data['budaya'] = $this->Admin_model->ambil_data_by_id('tb_budaya','slug_budaya',$slug);
		$data['galery'] = $this->Admin_model->ambil_data_by_id_result('tb_galery_budaya','id_budaya',$data['budaya']['id_budaya']);

		$this->load->view('homepage/Header');
		$this->load->view('homepage/Budaya_detail', $data);
		$this->load->view('homepage/Footer');
	}
}
?>