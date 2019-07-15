<?php  
/**
 * 
 */
class Destinasi extends CI_Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function index()
	{
		$data['wisata'] = $this->db->query("SELECT * FROM tb_wisata ORDER BY id_wisata DESC")->result_array();

		$this->load->view('homepage/Header');
		$this->load->view('homepage/Destinasi', $data);
		$this->load->view('homepage/Footer');
	}

	public function detail($slug)
	{
		$data['wisata'] = $this->Admin_model->ambil_data_by_id('tb_wisata','slug_wisata',$slug);
		$data['galery'] = $this->Admin_model->ambil_data_by_id_result('tb_galery_wisata','id_wisata',$data['wisata']['id_wisata']);

		$this->load->view('homepage/Header');
		$this->load->view('homepage/Destinasi_detail', $data);
		$this->load->view('homepage/Footer');
	}
}
?>