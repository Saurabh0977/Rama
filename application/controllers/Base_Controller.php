<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base_Controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("is_logged_in"))
		{
			redirect(site_url());
		}
		
	}
	
	private $users = array('1' => 'Admin', '2' => 'Operator' );	

	
	public function load_view($content, $content_data = NULL) {
		if($this->session->userdata('type') == 1) {
			$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);	
			$data['header'] = $this->load->view('admin/header', NULL, TRUE);
		} else {
			$data['sidebar'] = $this->load->view('operator/sidebar', NULL, TRUE);
			$data['header'] = $this->load->view('operator/header', NULL, TRUE);
		}
		
		$data['content'] = $this->load->view($content, $content_data, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$this->load->view('template', $data);
	}

	public function fetch_allusers()
	{
		return $this->users;
	}

	public function get_user_type_name_by_id($id)
	{
		return $this->users[$id];
	}


}


?>