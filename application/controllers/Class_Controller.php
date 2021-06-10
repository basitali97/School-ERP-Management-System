<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	public function index()
	{
		# code...
		if($this->session->userdata('loggedin')){
			$data['title'] = 'Class';
			$this->load->view('header',$data);
			$this->load->view('class',array('error' => ' ' ));
		}
		else{
			$this->load->view('login');
		}
	}
}
