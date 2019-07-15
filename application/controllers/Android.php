<?php 
/**
 * 
 */
class Android extends CI_Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function tampil_kuliner()
	{
		$data['hasil'] = $this->Admin_model->ambil_data('tb_kuliner','id_kuliner','DESC');
		$data['success'] = 1;
		
		echo json_encode($data);
	}
}
?>