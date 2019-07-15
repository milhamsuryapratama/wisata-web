<?php  
/**
 * 
 */
class News extends CI_Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function index($offset=0)
	{
		$data['n'] = $this->Admin_model->ambil_data('tb_blog','id_blog','DESC');

		$jml = count($data['n']);

		$data['offset']=$offset;
		$config['total_rows'] = $jml;
		$config['base_url'] = base_url()."news/index";
		$config['per_page'] = 2;

		$config['full_tag_open']="<ul class='pagination'>";
		$config['full_tag_close']="</ul>";

		$config['num_tag_open']="<a class='pagin-number'>";
		$config['num_tag_close']="</a>";

		$config['next_tag_open']="<a class='pagin-number'>";
		$config['next_tag_close']="</a>";

		$config['prev_tag_open']="<a class='pagin-number'>";
		$config['prev_tag_close']="</a>";

		$config['first_tag_open']="<a class='pagin-number'>";
		$config['first_tag_close']="</a>";

		$config['last_tag_open']="<a class='pagin-number'>";
		$config['last_tag_close']="</a>";

		$config['cur_tag_open']="<a class='pagin-number active disable' style='margin-left: 50px'>";
		$config['cur_tag_close']="</a>";

		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();

		$data['news'] = $this->Admin_model->ambil_data_by_id_with_pagination($config['per_page'],$offset,'');

		$this->load->view('homepage/Header');
		$this->load->view('homepage/News', $data);
		$this->load->view('homepage/Footer');
	}

	public function detail($slug)
	{
		$data['news'] = $this->Admin_model->ambil_data_by_id('tb_blog','slug_blog',$slug);

		$this->load->view('homepage/Header');
		$this->load->view('homepage/News_detail', $data);
		$this->load->view('homepage/Footer');
	}

	public function cari($offset = 0)
	{

		if ($_GET['s'] == 'undefined' OR !empty($this->uri->segment(3))) {
			$s = $this->uri->segment(3);
		} else {
			$s = $_GET['s'];	
		}

		$n = $this->db->query("SELECT * FROM tb_blog WHERE judul LIKE '%".$s."%' ")->num_rows();

		$data['offset']=$offset;
		$config['total_rows'] = $n;
		$config['base_url'] = base_url()."news/cari/".$s;
		$config['uri_segment'] = 3;
		$config['per_page'] = 1;

		$config['full_tag_open']="<ul class='pagination'>";
		$config['full_tag_close']="</ul>";

		$config['num_tag_open']="<a class='pagin-number'>";
		$config['num_tag_close']="</a>";

		$config['next_tag_open']="<a class='pagin-number'>";
		$config['next_tag_close']="</a>";

		$config['prev_tag_open']="<a class='pagin-number'>";
		$config['prev_tag_close']="</a>";

		$config['first_tag_open']="<a class='pagin-number'>";
		$config['first_tag_close']="</a>";

		$config['last_tag_open']="<a class='pagin-number'>";
		$config['last_tag_close']="</a>";

		$config['cur_tag_open']="<a class='pagin-number active disable' style='margin-left: 50px'>";
		$config['cur_tag_close']="</a>";

		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();

		$data['news'] = $this->Admin_model->ambil_data_by_id_with_pagination($config['per_page'],$offset, $s);

		$this->load->view('homepage/Header');
		$this->load->view('homepage/News', $data);
		$this->load->view('homepage/Footer');
	}
}
?>