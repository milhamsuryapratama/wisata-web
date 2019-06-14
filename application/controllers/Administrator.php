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
	        	$config['width'] = 225;
	        	$config['height'] = 225;
	        	$config['new_image'] = 'assets/foto/wisata/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_wisata = array(
					'nama_wisata' => $this->input->post('nama_wisata'),
					'alamat_wisata' => $this->input->post('alamat_wisata'),
					'slug_wisata' => url_title($this->input->post('nama_wisata'), 'dash', TRUE),
					'deskripsi' => $this->input->post('deskripsi'),
					'lang_wisata' => $this->input->post('long'),
					'lat_wisata' => $this->input->post('lat'),
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

	        if (empty($foto['file_name'])) {
	        	$data_wisata = array(
					'nama_wisata' => $this->input->post('nama_wisata'),
					'alamat_wisata' => $this->input->post('alamat_wisata'),
					'slug_wisata' => url_title($this->input->post('nama_wisata'), 'dash', TRUE),
					'deskripsi' => $this->input->post('deskripsi'),
					'lang_wisata' => $this->input->post('long'),
					'lat_wisata' => $this->input->post('lat')
				);
	        } else {
	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/wisata/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 225;
	        	$config['height'] = 225;
	        	$config['new_image'] = 'assets/foto/wisata/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_wisata = array(
					'nama_wisata' => $this->input->post('nama_wisata'),
					'alamat_wisata' => $this->input->post('alamat_wisata'),
					'slug_wisata' => url_title($this->input->post('nama_wisata'), 'dash', TRUE),
					'deskripsi' => $this->input->post('deskripsi'),
					'lang_wisata' => $this->input->post('long'),
					'lat_wisata' => $this->input->post('lat'),
					'foto_wisata' => $foto['file_name']

				);

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
        	$config['width'] = 225;
        	$config['height'] = 225;
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
	        	$config['width'] = 225;
	        	$config['height'] = 225;
	        	$config['new_image'] = 'assets/foto/hotel/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_hotel = array(
					'nama_hotel' => $this->input->post('nama_hotel'),
					'alamat_hotel' => $this->input->post('alamat_hotel'),
					'slug_hotel' => url_title($this->input->post('nama_hotel'), 'dash', TRUE),
					'deskripsi_hotel' => $this->input->post('deskripsi'),
					'long_hotel' => $this->input->post('long'),
					'lat_hotel' => $this->input->post('lat'),
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

	        if (empty($foto['file_name'])) {
	        	$data_hotel = array(
					'nama_hotel' => $this->input->post('nama_hotel'),
					'alamat_hotel' => $this->input->post('alamat_hotel'),
					'slug_hotel' => url_title($this->input->post('nama_hotel'), 'dash', TRUE),
					'deskripsi_hotel' => $this->input->post('deskripsi'),
					'long_hotel' => $this->input->post('long'),
					'lat_hotel' => $this->input->post('lat')

				);
	        } else {
	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/hotel/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 225;
	        	$config['height'] = 225;
	        	$config['new_image'] = 'assets/foto/hotel/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_hotel = array(
					'nama_hotel' => $this->input->post('nama_hotel'),
					'alamat_hotel' => $this->input->post('alamat_hotel'),
					'slug_hotel' => url_title($this->input->post('nama_hotel'), 'dash', TRUE),
					'deskripsi_hotel' => $this->input->post('deskripsi'),
					'long_hotel' => $this->input->post('long'),
					'lat_hotel' => $this->input->post('lat'),
					'foto_hotel' => $foto['file_name']

				);

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
        	$config['width'] = 225;
        	$config['height'] = 225;
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
	        	$config['width'] = 225;
	        	$config['height'] = 225;
	        	$config['new_image'] = 'assets/foto/kuliner/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_wisata = array(
					'nama_kuliner' => $this->input->post('nama_kuliner'),
					'alamat_kuliner' => $this->input->post('alamat_kuliner'),
					'slug_kuliner' => url_title($this->input->post('nama_kuliner'), 'dash', TRUE),
					'deskripsi_kuliner' => $this->input->post('deskripsi'),
					'long_kuliner' => $this->input->post('long'),
					'lat_kuliner' => $this->input->post('lat'),
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
					'alamat_kuliner' => $this->input->post('alamat_kuliner'),
					'slug_kuliner' => url_title($this->input->post('nama_kuliner'), 'dash', TRUE),
					'deskripsi_kuliner' => $this->input->post('deskripsi'),
					'long_kuliner' => $this->input->post('long'),
					'lat_kuliner' => $this->input->post('lat')

				);
	        } else {
	        	//compress images
	        	$config['image_library'] = 'gd2';
	        	$config['source_image'] = 'assets/foto/kuliner/'.$foto['file_name'];
	        	$config['create_thumb'] = FALSE;
	        	$config['maintain_ratio'] = FALSE;
	        	$config['quality'] = '50%';
	        	$config['width'] = 225;
	        	$config['height'] = 225;
	        	$config['new_image'] = 'assets/foto/kuliner/'.$foto['file_name'];
	        	$this->load->library('image_lib', $config);
	        	$this->image_lib->resize();

	        	$data_wisata = array(
					'nama_kuliner' => $this->input->post('nama_kuliner'),
					'alamat_kuliner' => $this->input->post('alamat_kuliner'),
					'slug_kuliner' => url_title($this->input->post('nama_kuliner'), 'dash', TRUE),
					'deskripsi_kuliner' => $this->input->post('deskripsi'),
					'long_kuliner' => $this->input->post('long'),
					'lat_kuliner' => $this->input->post('lat'),
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
        	$config['width'] = 225;
        	$config['height'] = 225;
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
	        	$config['width'] = 225;
	        	$config['height'] = 225;
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
	        	$config['width'] = 225;
	        	$config['height'] = 225;
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
			redirect(base_url().'administrator/user_area/'.$this->session->userdata('id'));
		}
	}
}
?>