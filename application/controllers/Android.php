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

	public function kuliner()
	{
		$data['hasil'] = $this->Admin_model->ambil_data('tb_kuliner','id_kuliner','DESC');
		$data['success'] = 1;
		
		echo json_encode($data);
	}
	
	public function wisata()
	{
	    $data['hasil'] = $this->Admin_model->ambil_data('tb_wisata', 'id_wisata', 'DESC');
	    
	    echo json_encode($data);
	}
	
	public function budaya()
	{
	    $data['hasil'] = $this->Admin_model->ambil_data('tb_budaya','id_budaya','DESC');
	    
	    echo json_encode($data);
	}
	
	public function news()
	{
	    $data['hasil'] = $this->Admin_model->ambil_data('tb_blog','id_blog','DESC');
	    
	    echo json_encode($data);
	}
	
	public function hotel()
	{
		$data['hasil'] = $this->Admin_model->ambil_data('tb_hotel','id_hotel','DESC');
		$data['success'] = 1;
		
		echo json_encode($data);
	}
	
	//data by id
	
    public function kuliner_id()
	{
	    $id = $this->input->post("id_kuliner");
	    $data['success'] = 1;
	    $data['hasil'] = $this->Admin_model->ambil_data_by_id_result('tb_kuliner','id_kuliner',$id);
	    
	    echo json_encode($data);
	}
	
	public function wisata_id()
	{
	    $id = $this->input->post("id_wisata");
	    $data['success'] = 1;
	    $data['hasil'] = $this->Admin_model->ambil_data_by_id_result('tb_wisata','id_wisata',$id);
	    
	    echo json_encode($data);
	}
	
	
	public function budaya_id()
	{
	    $id = $this->input->post("id_budaya");;
	    $data['success'] = 1;
	    $data['hasil'] = $this->Admin_model->ambil_data_by_id_result('tb_budaya','id_budaya',$id);
	    
	    echo json_encode($data);
	}
	
	public function news_id()
	{
	    $id = $this->input->post("id_news");
	    $data['success'] = 1;
	    $data['hasil'] = $this->Admin_model->ambil_data_by_id_result('tb_blog','id_blog',$id);
	    
	    echo json_encode($data);
	}
	
	public function hotel_id()
	{
	    $id = $this->input->post("id_hotel");
	    $data['success'] = 1;
	    $data['hasil'] = $this->Admin_model->ambil_data_by_id_result('tb_hotel','id_hotel',$id);
	    
	    echo json_encode($data);
	}
	
	//data galery
	
	public function galery_wisata()
	{
	    $id = $this->input->post("id_wisata");
	    $data['success'] = 1;
	    $data['hasil'] = $this->Admin_model->ambil_data_by_id_result('tb_galery_wisata','id_wisata',$id);
	    echo json_encode($data);
	}
	
	public function galery_kuliner()
	{
	    $id = $this->input->post("id_kuliner");
	    $data['success'] = 1;
	    $data['hasil'] = $this->Admin_model->ambil_data_by_id_result('tb_kuiner','id_kuliner',$id);
	    echo json_encode($data);
	}
	
	public function galery_budaya()
	{
	    $id = $this->input->post("id_budaya");
	    $data['success'] = 1;
	    $data['hasil'] = $this->Admin_model->ambil_data_by_id_result('tb_budaya','id_budaya',$id);
	    echo json_encode($data);
	}
}
?>