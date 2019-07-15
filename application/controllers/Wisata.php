<?php  
/**
 * 
 */
class Wisata extends CI_Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function index()
	{
		$this->load->view('home/Header');
		//$this->load->view('home/Wisata');
		$this->load->view('home/Footer');
	}
}
?>