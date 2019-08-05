<?php  
/**
 * 
 */
class Administrator extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'logged') {
			redirect(base_url().'auth');
		}
	}

	public function index()
	{
		redirect(base_url().'auth');
	}

	public function dashboard()
	{
		$data['title'] = "Dashboard - Admin Panel";
		$this->template->load('administrator/Template', 'administrator/Dashboard', $data);
	}

	public function wisata()
	{
		$data['title'] = "Wisata - Data Wisata";
		$data['wisata'] = $this->Admin_model->ambil_data('tb_wisata','id_wisata','DESC');
		$this->template->load('administrator/Template', 'administrator/mod_wisata/Wisata', $data);
	}

	public function tambah_wisata()
	{		
		$data['title'] = "Wisata - Tambah Data Wisata";

		if (isset($_POST['submit'])) {		

			$config['upload_path'] = 'assets/foto/wisata';
	        $config['allowed_types'] = '*';
	        $config['encrypt_name'] = TRUE;

	        $this->load->library('upload', $config);

	        if ($this->upload->do_upload('thumbnail')) {
	        	$foto = $this->upload->data();

	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/wisata/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 700;
	        	$config['height'] = 393;
	        	$config['new_image'] = 'assets/foto/wisata/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_wisata = array(
					'nama_wisata' => $this->input->post('nama_wisata'),
					'alamat_wisata' => $this->input->post('alamat_wisata'),
					'slug_wisata' => url_title($this->input->post('nama_wisata'), 'dash', TRUE),
					'deskripsi' => $this->input->post('deskripsi'),
					'peta_wisata' => $this->input->post('iframe'),
					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat'),
					'foto_wisata' => $foto['file_name']

				);

				$query = $this->Admin_model->tambah_data('tb_wisata', $data_wisata);

				if ($query) {
					$this->session->set_flashdata('tambahDataSukses', 'Sukses Menambahkan Data');
					redirect(base_url().'administrator/wisata');
				}

	        }
			
		} else {
			$this->template->load('administrator/Template', 'administrator/mod_wisata/Tambah', $data);
		}
	}

	public function edit_wisata($id)
	{
		$data['title'] = "Wisata - Update Data Wisata";
		$data['wisata'] = $this->Admin_model->ambil_data_by_id('tb_wisata','id_wisata',$id);
		
		$this->template->load('administrator/Template', 'administrator/mod_wisata/Edit', $data);
	}

	public function update_wisata($id)
	{
		if (isset($_POST['update'])) {
			$config['upload_path'] = 'assets/foto/wisata';
	        $config['allowed_types'] = '*';
	        $config['encrypt_name'] = TRUE;

	        $this->load->library('upload', $config);
	        $this->upload->do_upload('thumbnail');
	        $foto = $this->upload->data();

	        $iframe = $this->input->post('iframe');

	        if (empty($foto['file_name'])) {
	        	if ($iframe == '') {
	        		$data_wisata = array(
	        			'nama_wisata' => $this->input->post('nama_wisata'),
	        			'alamat_wisata' => $this->input->post('alamat_wisata'),
	        			'slug_wisata' => url_title($this->input->post('nama_wisata'), 'dash', TRUE),
	        			'deskripsi' => $this->input->post('deskripsi')
					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat')
	        		);
	        	} else {
	        		$data_wisata = array(
	        			'nama_wisata' => $this->input->post('nama_wisata'),
	        			'alamat_wisata' => $this->input->post('alamat_wisata'),
	        			'slug_wisata' => url_title($this->input->post('nama_wisata'), 'dash', TRUE),
	        			'deskripsi' => $this->input->post('deskripsi'),
	        			'peta_wisata' => $iframe
					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat')
	        		);
	        	}        	
	        } else {
	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/wisata/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 700;
	        	$config['height'] = 393;
	        	$config['new_image'] = 'assets/foto/wisata/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	if ($iframe == '') {
	        		$data_wisata = array(
	        			'nama_wisata' => $this->input->post('nama_wisata'),
	        			'alamat_wisata' => $this->input->post('alamat_wisata'),
	        			'slug_wisata' => url_title($this->input->post('nama_wisata'), 'dash', TRUE),
	        			'deskripsi' => $this->input->post('deskripsi'),					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat'),
	        			'foto_wisata' => $foto['file_name']

	        		);
	        	} else {
	        		$data_wisata = array(
	        			'nama_wisata' => $this->input->post('nama_wisata'),
	        			'alamat_wisata' => $this->input->post('alamat_wisata'),
	        			'slug_wisata' => url_title($this->input->post('nama_wisata'), 'dash', TRUE),
	        			'deskripsi' => $this->input->post('deskripsi'),
	        			'peta_wisata' => $iframe,
					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat'),
	        			'foto_wisata' => $foto['file_name']

	        		);
	        	}        	

				$unlink = $this->Admin_model->ambil_data_by_id('tb_wisata','id_wisata',$id);
	        	$path = 'assets/foto/wisata/';
    			@unlink($path.$unlink['foto_wisata']); 
	        }

	        $query = $this->Admin_model->update_data('tb_wisata','id_wisata',$id,$data_wisata);

	        if ($query) {
	        	$this->session->set_flashdata('updateDataSukses', 'Sukses Memperbarui Data');
	        	redirect(base_url().'administrator/wisata');
	        }

		}
	}

	public function hapus_wisata($id)
	{
		$unlink = $this->Admin_model->ambil_data_by_id('tb_wisata','id_wisata',$id);
	    $path = 'assets/foto/wisata/';
    	@unlink($path.$unlink['foto_wisata']); 

    	$query = $this->Admin_model->hapus_data('tb_wisata','id_wisata',$id);
    	if ($query) {
    		$this->session->set_flashdata('hapusDataSukses', 'Sukses Menghapus Data');
    		redirect(base_url().'administrator/wisata');
    	}
	}

	public function galery_wisata($id)
	{		
		$data['id'] = $id;
		$data['wisata'] = $this->Admin_model->ambil_data_by_id('tb_wisata','id_wisata',$id);
		$data['title'] = $data['wisata']['nama_wisata']." - Galery Wisata ";
		$data['gal_wis'] = $this->Admin_model->ambil_data_by_id_result('tb_galery_wisata','id_wisata',$id);
		$this->template->load('administrator/Template','administrator/mod_wisata/Galery_wisata', $data);
	}

	public function simpan_galery_wisata($id)
	{
		$segment = $id;

		$config['upload_path'] = 'assets/foto/galery/wisata';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        // $data = $this->upload->data();

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	//compress images
        	$config['image_library'] = 'gd2';
        	$config['source_image'] = 'assets/foto/galery/wisata/'.$nama;
        	$config['create_thumb'] = FALSE;
        	$config['maintain_ratio'] = FALSE;
        	$config['quality'] = '50%';
        	$config['width'] = 700;
        	$config['height'] = 393;
        	$config['new_image'] = 'assets/foto/galery/wisata/'.$nama;
        	$this->load->library('image_lib', $config);
        	$this->image_lib->resize();
        	
        	return $this->db->insert('tb_galery_wisata', array('filename'=>$nama, 'id_wisata' => $segment, 'token' => $token));
        }
	}

	public function hapus_galery_wisata()
	{
		$token = $this->input->post('token');
		$unlink = $this->Admin_model->ambil_data_by_id('tb_galery_wisata','token',$token);
	    $path = 'assets/foto/galery/wisata/';
    	@unlink($path.$unlink['filename']); 

    	$query = $this->Admin_model->hapus_data('tb_galery_wisata','token',$token);
    	if ($query) {
    		echo "{}";
    	}
	}

	public function hotel()
	{
		$data['title'] = "Wisata - Data Hotel";
		$data['hotel'] = $this->Admin_model->ambil_data('tb_hotel','id_hotel','DESC');
		$this->template->load('administrator/Template', 'administrator/mod_hotel/Hotel', $data);
	}

	public function tambah_hotel()
	{
		$data['title'] = "Wisata - Tambah Data Hotel";

		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/foto/hotel';
	        $config['allowed_types'] = '*';
	        $config['encrypt_name'] = TRUE;

	        $this->load->library('upload', $config);

	        if ($this->upload->do_upload('thumbnail')) {
	        	$foto = $this->upload->data();

	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/hotel/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 700;
	        	$config['height'] = 393;
	        	$config['new_image'] = 'assets/foto/hotel/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_hotel = array(
					'nama_hotel' => $this->input->post('nama_hotel'),
					'alamat_hotel' => $this->input->post('alamat_hotel'),
					'slug_hotel' => url_title($this->input->post('nama_hotel'), 'dash', TRUE),
					'deskripsi_hotel' => $this->input->post('deskripsi'),
					'peta_hotel' => $this->input->post('iframe'),
					'harga' => str_replace('.', '', $this->input->post('harga')),
					// 'long_hotel' => $this->input->post('long'),
					// 'lat_hotel' => $this->input->post('lat'),
					'foto_hotel' => $foto['file_name']

				);

				$query = $this->Admin_model->tambah_data('tb_hotel', $data_hotel);

				if ($query) {
					$this->session->set_flashdata('tambahDataSukses', 'Sukses Menambahkan Data');
					redirect(base_url().'administrator/hotel');
				}
			}

		} else {
			$this->template->load('administrator/Template', 'administrator/mod_hotel/Tambah', $data);
		}
	}

	public function edit_hotel($id)
	{		
		$data['hotel'] = $this->Admin_model->ambil_data_by_id('tb_hotel','id_hotel',$id);
		$data['title'] = $data['hotel']['nama_hotel']. " - Edit Data";
		$this->template->load('administrator/Template', 'administrator/mod_hotel/Edit', $data);		
	}

	public function update_hotel()
	{
		if (isset($_POST['update'])) {
			$id = $this->input->post('id_hotel');

			$config['upload_path'] = 'assets/foto/hotel';
	        $config['allowed_types'] = '*';
	        $config['encrypt_name'] = TRUE;

	        $this->load->library('upload', $config);
	        $this->upload->do_upload('thumbnail');
	        $foto = $this->upload->data();

	        $iframe = $this->input->post('iframe');

	        if (empty($foto['file_name'])) {
	        	if ($iframe == '') {
	        		$data_hotel = array(
	        			'nama_hotel' => $this->input->post('nama_hotel'),
	        			'alamat_hotel' => $this->input->post('alamat_hotel'),
	        			'slug_hotel' => url_title($this->input->post('nama_hotel'), 'dash', TRUE),
	        			'harga' => str_replace('.', '', $this->input->post('harga')),
	        			'deskripsi_hotel' => $this->input->post('deskripsi')
					// 'long_hotel' => $this->input->post('long'),
					// 'lat_hotel' => $this->input->post('lat')

	        		);
	        	} else {
	        		$data_hotel = array(
	        			'nama_hotel' => $this->input->post('nama_hotel'),
	        			'alamat_hotel' => $this->input->post('alamat_hotel'),
	        			'slug_hotel' => url_title($this->input->post('nama_hotel'), 'dash', TRUE),
	        			'deskripsi_hotel' => $this->input->post('deskripsi'),
	        			'harga' => str_replace('.', '', $this->input->post('harga')),
	        			'peta_hotel' => $this->input->post('iframe')
					// 'long_hotel' => $this->input->post('long'),
					// 'lat_hotel' => $this->input->post('lat')

	        		);
	        	}	        	
	        } else {
	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/hotel/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 700;
	        	$config['height'] = 393;
	        	$config['new_image'] = 'assets/foto/hotel/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	if ($iframe == '') {
	        		$data_hotel = array(
	        			'nama_hotel' => $this->input->post('nama_hotel'),
	        			'alamat_hotel' => $this->input->post('alamat_hotel'),
	        			'slug_hotel' => url_title($this->input->post('nama_hotel'), 'dash', TRUE),
	        			'deskripsi_hotel' => $this->input->post('deskripsi'),
	        			str_replace('.', '', $this->input->post('harga')),
					// 'long_hotel' => $this->input->post('long'),
					// 'lat_hotel' => $this->input->post('lat'),
	        			'foto_hotel' => $foto['file_name']

	        		);
	        	} else {
	        		$data_hotel = array(
	        			'nama_hotel' => $this->input->post('nama_hotel'),
	        			'alamat_hotel' => $this->input->post('alamat_hotel'),
	        			'slug_hotel' => url_title($this->input->post('nama_hotel'), 'dash', TRUE),
	        			'deskripsi_hotel' => $this->input->post('deskripsi'),
	        			'peta_hotel' => $this->input->post('iframe'),
	        			str_replace('.', '', $this->input->post('harga')),
					// 'long_hotel' => $this->input->post('long'),
					// 'lat_hotel' => $this->input->post('lat'),
	        			'foto_hotel' => $foto['file_name']

	        		);
	        	}	        	

				$unlink = $this->Admin_model->ambil_data_by_id('tb_hotel','id_hotel',$id);
	        	$path = 'assets/foto/hotel/';
    			@unlink($path.$unlink['foto_hotel']); 
	        }

	        $query = $this->Admin_model->update_data('tb_hotel','id_hotel', $id, $data_hotel);

			if ($query) {
				$this->session->set_flashdata('updateDataSukses', 'Sukses Memperbarui Data');
				redirect(base_url().'administrator/hotel');
			}

		}
	}

	public function hapus_hotel($id)
	{
		$unlink = $this->Admin_model->ambil_data_by_id('tb_hotel','id_hotel',$id);
	    $path = 'assets/foto/hotel/';
    	@unlink($path.$unlink['foto_hotel']); 

    	$query = $this->Admin_model->hapus_data('tb_hotel','id_hotel',$id);
    	if ($query) {
    		$this->session->set_flashdata('hapusDataSukses', 'Sukses Menghapus Data');
    		redirect(base_url().'administrator/hotel');
    	}
	}

	public function galery_hotel($id){
		$data['id'] = $id;
		$data['hotel'] = $this->Admin_model->ambil_data_by_id('tb_hotel','id_hotel',$id);
		$data['title'] = $data['hotel']['nama_hotel']. " - Galery Hotel";
		$data['gal_wis'] = $this->Admin_model->ambil_data_by_id_result('tb_galery_hotel','id_hotel',$id);
		$this->template->load('administrator/Template','administrator/mod_hotel/Galery_hotel', $data);
	}

	public function simpan_galery_hotel($id)
	{
		$segment = $id;

		$config['upload_path'] = 'assets/foto/galery/hotel';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        // $data = $this->upload->data();

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	//compress images
        	$config['image_library'] = 'gd2';
        	$config['source_image'] = 'assets/foto/galery/hotel/'.$nama;
        	$config['create_thumb'] = FALSE;
        	$config['maintain_ratio'] = FALSE;
        	$config['quality'] = '50%';
        	$config['width'] = 700;
        	$config['height'] = 393;
        	$config['new_image'] = 'assets/foto/galery/hotel/'.$nama;
        	$this->load->library('image_lib', $config);
        	$this->image_lib->resize();
        	
        	return $this->db->insert('tb_galery_hotel', array('filename'=>$nama, 'id_hotel' => $segment, 'token' => $token));
        }
	}

	public function hapus_galery_hotel()
	{
		$token = $this->input->post('token');
		$unlink = $this->Admin_model->ambil_data_by_id('tb_galery_hotel','token',$token);
	    $path = 'assets/foto/galery/hotel/';
    	@unlink($path.$unlink['filename']); 

    	$query = $this->Admin_model->hapus_data('tb_galery_hotel','token',$token);
    	if ($query) {
    		echo "{}";
    	}
	}

	public function kuliner()
	{
		$data['title'] = "Data Kuliner";
		$data['kuliner'] = $this->Admin_model->ambil_data('tb_kuliner','id_kuliner','DESC');
		$this->template->load('administrator/Template', 'administrator/mod_kuliner/Kuliner',$data);
	}

	public function tambah_kuliner()
	{
		$data['title'] = "Tambah Data Kuliner";

		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/foto/kuliner';
	        $config['allowed_types'] = '*';
	        $config['encrypt_name'] = TRUE;

	        $this->load->library('upload', $config);

	        if ($this->upload->do_upload('thumbnail')) {
	        	$foto = $this->upload->data();

	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/kuliner/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 700;
	        	$config['height'] = 393;
	        	$config['new_image'] = 'assets/foto/kuliner/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_wisata = array(
					'nama_kuliner' => $this->input->post('nama_kuliner'),
					// 'alamat_kuliner' => $this->input->post('alamat_kuliner'),
					'slug_kuliner' => url_title($this->input->post('nama_kuliner'), 'dash', TRUE),
					'deskripsi_kuliner' => $this->input->post('deskripsi'),
					// 'long_kuliner' => $this->input->post('long'),
					// 'lat_kuliner' => $this->input->post('lat'),
					'foto_kuliner' => $foto['file_name']

				);

				$query = $this->Admin_model->tambah_data('tb_kuliner', $data_wisata);

				if ($query) {
					$this->session->set_flashdata('tambahDataSukses', 'Sukses Menambahkan Data');
					redirect(base_url().'administrator/kuliner');
				}
			}
		} else {
			$this->template->load('administrator/Template', 'administrator/mod_kuliner/Tambah', $data);
		}
	}

	public function edit_kuliner($id)
	{
		$data['kuliner'] = $this->Admin_model->ambil_data_by_id('tb_kuliner','id_kuliner',$id);
		$data['title'] = $data['kuliner']['nama_kuliner']. " - Edit Data";

		if (isset($_POST['update'])) {
			$config['upload_path'] = 'assets/foto/kuliner';
	        $config['allowed_types'] = '*';
	        $config['encrypt_name'] = TRUE;

	        $this->load->library('upload', $config);
	        $this->upload->do_upload('thumbnail');
	        $foto = $this->upload->data();

	        if (empty($foto['file_name'])) {
	        	$data_wisata = array(
					'nama_kuliner' => $this->input->post('nama_kuliner'),
					// 'alamat_kuliner' => $this->input->post('alamat_kuliner'),
					'slug_kuliner' => url_title($this->input->post('nama_kuliner'), 'dash', TRUE),
					'deskripsi_kuliner' => $this->input->post('deskripsi'),
					// 'long_kuliner' => $this->input->post('long'),
					// 'lat_kuliner' => $this->input->post('lat')

				);
	        } else {
	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/kuliner/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 700;
	        	$config['height'] = 393;
	        	$config['new_image'] = 'assets/foto/kuliner/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_wisata = array(
					'nama_kuliner' => $this->input->post('nama_kuliner'),
					// 'alamat_kuliner' => $this->input->post('alamat_kuliner'),
					'slug_kuliner' => url_title($this->input->post('nama_kuliner'), 'dash', TRUE),
					'deskripsi_kuliner' => $this->input->post('deskripsi'),
					// 'long_kuliner' => $this->input->post('long'),
					// 'lat_kuliner' => $this->input->post('lat'),
					'foto_kuliner' => $foto['file_name']

				);
				$unlink = $this->Admin_model->ambil_data_by_id('tb_kuliner','id_kuliner',$id);
			    $path = 'assets/foto/kuliner/';
		    	@unlink($path.$unlink['foto_kuliner']); 
	        }

	        $query = $this->Admin_model->update_data('tb_kuliner','id_kuliner',$id, $data_wisata);

	        if ($query) {
	        	$this->session->set_flashdata('updateDataSukses', 'Sukses Memperbarui Data');
	        	redirect(base_url().'administrator/kuliner');
	        }

		} else {
			$this->template->load('administrator/Template','administrator/mod_kuliner/Edit',$data);
		}
	}

	public function hapus_kuliner($id)
	{
		$unlink = $this->Admin_model->ambil_data_by_id('tb_kuliner','id_kuliner',$id);
	    $path = 'assets/foto/kuliner/';
    	@unlink($path.$unlink['foto_kuliner']); 

    	$query = $this->Admin_model->hapus_data('tb_kuliner','id_kuliner',$id);
    	if ($query) {
    		$this->session->set_flashdata('hapusDataSukses', 'Sukses Menghapus Data');
    		redirect(base_url().'administrator/kuliner');
    	}
	}

	public function kirim_email()
	{
		$config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'blogsayailham@gmail.com',
            'smtp_pass' => 'bLogsaya21ilham', 
            'smtp_port' => 465,
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('blogsayailham@gmail.com', 'ILHAM SURYA PRATAMA');
        $this->email->to('reindrairawan@gmail.com'); 
        $this->email->subject('ILHAM SURYA PRATAMA | semprulshop');
        $this->email->message("HALO");
        $this->email->send();
	}

	public function galery_kuliner($id){
		$data['id'] = $id;
		$data['kuliner'] = $this->Admin_model->ambil_data_by_id('tb_kuliner','id_kuliner',$id);
		$data['title'] = $data['kuliner']['nama_kuliner']. " - Galery Foto";
		$data['gal_kul'] = $this->Admin_model->ambil_data_by_id_result('tb_galery_kuliner','id_kuliner',$id);
		$this->template->load('administrator/Template','administrator/mod_kuliner/Galery_kuliner', $data);
	}

	public function simpan_galery_kuliner($id)
	{
		$segment = $id;

		$config['upload_path'] = 'assets/foto/galery/kuliner';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        // $data = $this->upload->data();

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	//compress images
        	$config['image_library'] = 'gd2';
        	$config['source_image'] = 'assets/foto/galery/kuliner/'.$nama;
        	$config['create_thumb'] = FALSE;
        	$config['maintain_ratio'] = FALSE;
        	$config['quality'] = '50%';
        	$config['width'] = 700;
        	$config['height'] = 393;
        	$config['new_image'] = 'assets/foto/galery/kuliner/'.$nama;
        	$this->load->library('image_lib', $config);
        	$this->image_lib->resize();
        	
        	return $this->db->insert('tb_galery_kuliner', array('filename'=>$nama, 'id_kuliner' => $segment, 'token' => $token));
        }
	}

	public function hapus_galery_kuliner()
	{
		$token = $this->input->post('token');
		$unlink = $this->Admin_model->ambil_data_by_id('tb_galery_kuliner','token',$token);
	    $path = 'assets/foto/galery/kuliner/';
    	@unlink($path.$unlink['filename']); 

    	$query = $this->Admin_model->hapus_data('tb_galery_kuliner','token',$token);
    	if ($query) {
    		echo "{}";
    	}
	}

	public function budaya()
	{
		$data['title'] = "Budaya";
		$data['budaya'] = $this->Admin_model->ambil_data('tb_budaya','id_budaya','DESC');
		$this->template->load('administrator/Template', 'administrator/mod_budaya/Budaya', $data);
	}

	public function tambah_budaya()
	{
		$data['title'] = "Budaya - Tambah Data Budaya";

		if (isset($_POST['submit'])) {		

			$config['upload_path'] = 'assets/foto/budaya';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('thumbnail')) {
				$foto = $this->upload->data();

	        	//compress images
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'assets/foto/budaya/'.$foto['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '50%';
				$config['width'] = 700;
				$config['height'] = 393;
				$config['new_image'] = 'assets/foto/budaya/'.$foto['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data_budaya = array(
					'nama_budaya' => $this->input->post('nama_budaya'),
					// 'alamat_budaya' => $this->input->post('alamat_budaya'),
					'slug_budaya' => url_title($this->input->post('nama_budaya'), 'dash', TRUE),
					'deskripsi' => $this->input->post('deskripsi'),
					'peta_budaya' => $this->input->post('iframe'),
					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat'),
					'foto_budaya' => $foto['file_name']

				);

				$query = $this->Admin_model->tambah_data('tb_budaya', $data_budaya);

				if ($query) {
					$this->session->set_flashdata('tambahDataSukses', 'Sukses Menambahkan Data');
					redirect(base_url().'administrator/budaya');
				}

			}
			
		} else {
			$this->template->load('administrator/Template', 'administrator/mod_budaya/Tambah', $data);
		}
	}

	public function edit_budaya($id)
	{
		$data['title'] = "Budaya - Update Budaya Wisata";
		$data['budaya'] = $this->Admin_model->ambil_data_by_id('tb_budaya','id_budaya',$id);
		
		if (isset($_POST['update'])) {
			$config['upload_path'] = 'assets/foto/budaya';
	        $config['allowed_types'] = '*';
	        $config['encrypt_name'] = TRUE;

	        $this->load->library('upload', $config);
	        $this->upload->do_upload('thumbnail');
	        $foto = $this->upload->data();

	        $iframe = $this->input->post('iframe');

	        if (empty($foto['file_name'])) {
	        	if ($iframe == '') {
	        		$data_budaya = array(
	        			'nama_budaya' => $this->input->post('nama_budaya'),
	        			// 'alamat_budaya' => $this->input->post('alamat_budaya'),
	        			'slug_budaya' => url_title($this->input->post('nama_budaya'), 'dash', TRUE),
	        			'deskripsi' => $this->input->post('deskripsi')
					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat')
	        		);
	        	} else {
	        		$data_budaya = array(
	        			'nama_budaya' => $this->input->post('nama_budaya'),
	        			// 'alamat_budaya' => $this->input->post('alamat_budaya'),
	        			'slug_budaya' => url_title($this->input->post('nama_budaya'), 'dash', TRUE),
	        			'deskripsi' => $this->input->post('deskripsi'),
	        			'peta_budaya' => $iframe
					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat')
	        		);
	        	}        	
	        } else {
	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/budaya/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 700;
	        	$config['height'] = 393;
	        	$config['new_image'] = 'assets/foto/budaya/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	if ($iframe == '') {
	        		$data_budaya = array(
	        			'nama_budaya' => $this->input->post('nama_budaya'),
	        			// 'alamat_budaya' => $this->input->post('alamat_budaya'),
	        			'slug_budaya' => url_title($this->input->post('nama_budaya'), 'dash', TRUE),
	        			'deskripsi' => $this->input->post('deskripsi'),					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat'),
	        			'foto_budaya' => $foto['file_name']

	        		);
	        	} else {
	        		$data_budaya = array(
	        			'nama_budaya' => $this->input->post('nama_budaya'),
	        			// 'alamat_budaya' => $this->input->post('alamat_budaya'),
	        			'slug_budaya' => url_title($this->input->post('nama_budaya'), 'dash', TRUE),
	        			'deskripsi' => $this->input->post('deskripsi'),
	        			'peta_budaya' => $iframe,
					// 'lang_wisata' => $this->input->post('long'),
					// 'lat_wisata' => $this->input->post('lat'),
	        			'foto_wisata' => $foto['file_name']

	        		);
	        	}        	

				$unlink = $this->Admin_model->ambil_data_by_id('tb_budaya','id_budaya',$id);
	        	$path = 'assets/foto/budaya/';
    			@unlink($path.$unlink['foto_budaya']); 
	        }

	        $query = $this->Admin_model->update_data('tb_budaya','id_budaya',$id,$data_budaya);

	        if ($query) {
	        	$this->session->set_flashdata('updateDataSukses', 'Sukses Memperbarui Data');
	        	redirect(base_url().'administrator/budaya');
	        }

		} else {
			$this->template->load('administrator/Template', 'administrator/mod_budaya/Edit', $data);
		}
	}

	public function hapus_budaya($id)
	{
		$unlink = $this->Admin_model->ambil_data_by_id('tb_budaya','id_budaya',$id);
	    $path = 'assets/foto/budaya/';
    	@unlink($path.$unlink['foto_budaya']); 

    	$query = $this->Admin_model->hapus_data('tb_budaya','id_budaya',$id);
    	if ($query) {
    		$this->session->set_flashdata('hapusDataSukses', 'Sukses Menghapus Data');
    		redirect(base_url().'administrator/budaya');
    	}
	}

	public function galery_budaya($id)
	{
		$data['id'] = $id;
		$data['budaya'] = $this->Admin_model->ambil_data_by_id('tb_budaya','id_budaya',$id);
		$data['title'] = $data['budaya']['nama_budaya']." - Galery Budaya ";
		$data['gal_bud'] = $this->Admin_model->ambil_data_by_id_result('tb_galery_budaya','id_budaya',$id);
		$this->template->load('administrator/Template','administrator/mod_budaya/Galery_budaya', $data);
	}

	public function simpan_galery_budaya($id)
	{
		$segment = $id;

		$config['upload_path'] = 'assets/foto/galery/budaya';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        // $data = $this->upload->data();

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	//compress images
        	$config['image_library'] = 'gd2';
        	$config['source_image'] = 'assets/foto/galery/budaya/'.$nama;
        	$config['create_thumb'] = FALSE;
        	$config['maintain_ratio'] = FALSE;
        	$config['quality'] = '50%';
        	$config['width'] = 700;
        	$config['height'] = 393;
        	$config['new_image'] = 'assets/foto/galery/budaya/'.$nama;
        	$this->load->library('image_lib', $config);
        	$this->image_lib->resize();
        	
        	return $this->db->insert('tb_galery_budaya', array('filename'=>$nama, 'id_budaya' => $segment, 'token' => $token));
        }
	}

	public function hapus_galery_budaya()
	{
		$token = $this->input->post('token');
		$unlink = $this->Admin_model->ambil_data_by_id('tb_galery_budaya','token',$token);
	    $path = 'assets/foto/galery/budaya/';
    	@unlink($path.$unlink['filename']); 

    	$query = $this->Admin_model->hapus_data('tb_galery_budaya','token',$token);
    	if ($query) {
    		echo "{}";
    	}
	}

	public function blog()
	{
		$data['title'] = "Artikel / News";
		$data['artikel'] = $this->Admin_model->join_dua_table('tb_blog','tb_auth','tb_blog.user = tb_auth.id','tb_blog.id_blog');
		$this->template->load('administrator/Template', 'administrator/mod_blog/Blog', $data);
	}



	public function tambah_artikel()
	{
		$data['title'] = "Tambah Data Artikel"; 

		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/foto/artikel';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;
        	$this->load->library('upload', $config);

        	if ($this->upload->do_upload('thumbnail')) {
        		$foto = $this->upload->data();

        		//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/wisata/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 700;
	        	$config['height'] = 393;
	        	$config['new_image'] = 'assets/foto/wisata/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_artikel = array(
	        		'judul' => $this->input->post('judul'),
	        		'slug_blog' => url_title($this->input->post('judul'), 'dash', TRUE),
	        		'isi' => $this->input->post('isi'),
	        		'user' => $this->session->userdata('id'),
	        		'thumbnail' => $foto['file_name'],
	        		'tgl_post' => date('Y-m-d')
	        	);

	        	$query = $this->Admin_model->tambah_data('tb_blog', $data_artikel);

	        	if ($query) {
	        		$this->session->set_flashdata('tambahDataSukses', 'Sukses Menambahkan Data');
	        		redirect(base_url().'administrator/blog');
	        	}
        	}
			
		} else {
			$this->template->load('administrator/Template', 'administrator/mod_blog/Tambah', $data);
		}
	}

	public function edit_artikel($id)
	{
		$data['artikel'] = $this->Admin_model->ambil_data_by_id('tb_blog','id_blog',$id);
		$data['title'] = $data['artikel']['judul']. " - Edit Data";

		if (isset($_POST['update'])) {
			$config['upload_path'] = 'assets/foto/artikel';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;
        	$this->load->library('upload', $config);
        	$this->upload->do_upload('thumbnail');
        	$foto = $this->upload->data();

        	if (empty($foto['file_name'])) {
        		$data_artikel = array(
	        		'judul' => $this->input->post('judul'),
	        		'slug_blog' => url_title($this->input->post('judul'), 'dash', TRUE),
	        		'isi' => $this->input->post('isi'),
	        		'tgl_post' => date('Y-m-d')
	        	);
        	} else {
        		//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/artikel/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 700;
	        	$config['height'] = 393;
	        	$config['new_image'] = 'assets/foto/artikel/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

        		$data_artikel = array(
	        		'judul' => $this->input->post('judul'),
	        		'slug_blog' => url_title($this->input->post('judul'), 'dash', TRUE),
	        		'isi' => $this->input->post('isi'),
	        		'user' => '1',
	        		'thumbnail' => $foto['file_name'],
	        		'tgl_post' => date('Y-m-d')
	        	);

	        	$unlink = $this->Admin_model->ambil_data_by_id('tb_blog','id_blog',$id);
	    		$path = 'assets/foto/artikel/';
    			@unlink($path.$unlink['thumbnail']); 
        	}

        	$query = $this->Admin_model->update_data('tb_blog','id_blog',$id,$data_artikel);

        	if ($query) {
        		$this->session->set_flashdata('updateDataSukses', 'Sukses Memperbarui Data');
        		redirect(base_url().'administrator/blog');
        	}

		} else {
			$this->template->load('administrator/Template', 'administrator/mod_blog/Edit', $data);
		}
	}

	public function hapus_artikel($id)
	{
		$unlink = $this->Admin_model->ambil_data_by_id('tb_blog','id_blog',$id);
	    $path = 'assets/foto/artikel/';
    	@unlink($path.$unlink['thumbnail']); 

    	$query = $this->Admin_model->hapus_data('tb_blog','id_blog',$id);
    	if ($query) {
    		$this->session->set_flashdata('hapusDataSukses', 'Sukses Menghapus Data');
    		redirect(base_url().'administrator/blog');
    	}
	}

	public function users()
	{
		if ($this->session->userdata('role') == 'user') {
			//$this->template->load('administrator/Template', 'errors/html/error_404');
			$this->load->view('errors/html/error_404');
		} else {
			$data['title'] = "User Managemen";
			$data['user'] = $this->Admin_model->ambil_data('tb_auth','id','DESC');
			$this->template->load('administrator/Template', 'administrator/mod_auth/Users', $data);
		}
	}

	public function tambah_users()
	{
		$data['title'] = "Tambah Users";

		if (isset($_POST['submit'])) {
			$data_users = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'role' => $this->input->post('role')
			);

			$query = $this->Admin_model->tambah_data('tb_auth',$data_users);

			if ($query) {
				$this->session->set_flashdata('tambahDataSukses', 'Sukses Menambahkan Data');
				redirect(base_url().'administrator/users');
			}
		} else {
			$this->template->load('administrator/Template', 'administrator/mod_auth/Tambah', $data);
		}
	}

	public function edit_users($id)
	{
		$data['user'] = $this->Admin_model->ambil_data_by_id('tb_auth','id',$id);
		$data['title'] = "Edit Data Users";

		if (isset($_POST['update'])) {
			$password = $this->input->post('password');

			if ($password == '') {
				$data_users = array(
					'username' => $this->input->post('username'),
					'role' => $this->input->post('role')
				);
			} else {
				$data_users = array(
					'username' => $this->input->post('username'),
					'password' => md5($password),
					'role' => $this->input->post('role')
				);
			}

			$query = $this->Admin_model->update_data('tb_auth','id',$id,$data_users);

			if ($query) {
				$this->session->set_flashdata('updateDataSukses', 'Sukses Memperbarui Data');
				redirect(base_url().'administrator/users');
			}
		} else {
			$this->template->load('administrator/Template', 'administrator/mod_auth/Edit', $data);
		}
	}

	public function hapus_users($id)
	{
		$query = $this->Admin_model->hapus_data('tb_auth','id',$id);
    	if ($query) {
    		$this->session->set_flashdata('hapusDataSukses', 'Sukses Menghapus Data');
    		redirect(base_url().'administrator/users');
    	}
	}

	public function user_area($id)
	{
		$data['user'] = $this->Admin_model->ambil_data_by_id('tb_auth','id',$id);
		$data['title'] = "User Area";

		$this->template->load('administrator/Template', 'administrator/mod_auth/User_area', $data);
	}

	public function edit_users_area($id)
	{
		$password = $this->input->post('password');

		if ($password == '') {
			$data_users = array(
				'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama')
			);
		} else {
			$data_users = array(
				'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama'),
				'password' => md5($password)
			);
		}

		$query = $this->Admin_model->update_data('tb_auth','id',$id,$data_users);

		if ($query) {			
			if ($password != '') {
				// $this->session->sess_destroy();
				$this->session->set_flashdata('resetPassword', 'Anda Baru Saja Mereset Password. Silahkan Login Kembali Menggunakan Password Baru Anda');
				redirect(base_url().'auth/keluar');
			} else {
				if ($this->session->userdata('role') == 'admin') {
					$this->session->set_flashdata('updateDataUser', 'Sukses Memperbarui Data');
					redirect(base_url().'administrator/admin_area/'.$this->session->userdata('id'));
				} else {
					$this->session->set_flashdata('updateDataUser', 'Sukses Memperbarui Data');
					redirect(base_url().'administrator/user_area/'.$this->session->userdata('id'));
				}
				
			}
		}
	}

	public function ambil_peta($id)
	{
		$n = $this->db->query("SELECT peta_wisata FROM tb_wisata WHERE id_wisata = $id ")->row_array();
		echo $n['peta_wisata'];
	}

	public function ambil_budaya($id)
	{
		$n = $this->db->query("SELECT peta_budaya FROM tb_budaya WHERE id_budaya = $id ")->row_array();
		echo $n['peta_budaya'];
	}

	public function ambil_peta_hotel($id)
	{
		$n = $this->db->query("SELECT peta_hotel FROM tb_hotel WHERE id_hotel = $id ")->row_array();
		echo $n['peta_hotel'];
	}

	public function update_foto_profil_user()
	{
		$id = $this->uri->segment(3);

		$cek_foto_profil = $this->db->query("SELECT foto FROM tb_auth WHERE id = $id")->row_array();

		$config['upload_path'] = 'assets/foto/user';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto_user')) {
			$foto = $this->upload->data();
			$file_name = $foto['file_name'];

			//compress images
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'assets/foto/user/'.$foto['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['quality'] = '50%';
			$config['width'] = 300;
			$config['height'] = 400;
			$config['new_image'] = 'assets/foto/user/'.$foto['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($cek_foto_profil['foto'] != '') {
				$path = 'assets/foto/user/';
    			@unlink($path.$cek_foto_profil['foto']); 
			}

			$query = $this->db->query("UPDATE tb_auth SET foto = '$file_name' WHERE id = $id ");

			if ($query) {
				if ($this->session->userdata('role') == 'admin') {
					$this->session->set_flashdata('updateDataUser', 'Sukses Memperbarui Foto Profil');
					redirect(base_url().'administrator/admin_area/'.$this->session->userdata('id'));
				} else {
					$this->session->set_flashdata('updateDataUser', 'Sukses Memperbarui Foto Profil');
					redirect(base_url().'administrator/user_area/'.$this->session->userdata('id'));
				}
			}
		}
									
	}

	public function admin_area($id)
	{
		$data['user'] = $this->Admin_model->ambil_data_by_id('tb_auth','id',$id);
		$data['title'] = "Admin Area";

		$this->template->load('administrator/Template', 'administrator/mod_auth/User_area', $data);
	}
}
?>