<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('comentator');
		$this->load->library('pagination');
		$this->load->helper('url');
		 $this->load->library('form_validation');
	}

	public function index() {
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('text_comment', 'Text', 'required');

		$config = array(
			'base_url' => "/",
			'total_rows' => $this->comentator->get_total(),
			'per_page' => 3,
			'num_links' => 3,
			'uri_segment' => 1

		);
		$page = ($this->uri->segment(1)) ? ($this->uri->segment(1)/3) : 0;
		$this->pagination->initialize($config);
		$data["comment"] = $this->comentator->get_current_page_comments($config['per_page'], $page*$config['per_page']);
		$data['links'] = $this->pagination->create_links();
		$this->load->view('comments_form',$data);

		if ($this->form_validation->run() !== FALSE) {
			$email = explode('@', $_POST['email']);
			if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
				$data = array(
					'name' => empty($_POST['name']) ? $email[0] : $_POST['name'],
					'email' =>$_POST['email'],
					'text' =>$_POST['text_comment'],
					'date' => date("d.m.Y")
				);
				$this->comentator->putComment($data);
			}
		}
	}
}
