<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Teacher_model');
		$this->load->model('Login_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		# code...
		if($this->session->userdata('loggedin')){
			$data['title'] = 'Teacher';
			$this->load->view('header',$data);
			$this->load->view('teacher',array('error' => ' ' ));
		}
		else{
			$this->load->view('login');
		}
	}
	public function create()
	{
		# code...
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('teacher_image'))
		{
				$error = array('error' => $this->upload->display_errors());
				$data['title'] = 'Teacher';
				$this->load->view('header',$data);
				$this->load->view('teacher', $error);
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$teacherimg_name = $data["upload_data"]["file_name"];
				$validator = array('success' => false, 'message' => array());
				$validate_data = array(
					array(
						'field' => 'teacher_name',
						'label' => 'Name',
						'rules' => 'required'
					),
					array(
						'field' => 'teacher_age',
						'label' => 'Age',
						'rules' => 'required'
					),
					array(
						'field' => 'teacher_email',
						'label' => 'Email',
						'rules' => 'required'
					),
					array(
						'field' => 'teacher_contact',
						'label' => 'Contact',
						'rules' => 'required'
					),
				);
				$this->form_validation->set_rules($validate_data);
				$this->form_validation->set_error_delimiters('<p>','</p>');
				if($this->form_validation->run()){
					$insert_teacher_data = $this->Teacher_model->insert_teacher_data($teacherimg_name);
					if($insert_teacher_data){
						$validator['success'] = true;
						$validator['message'] = 'Successfully Added';
						$data['title'] = 'Teacher';
						$this->load->view('header',$data);
						$this->load->view('teacher',array('error' => ' ' ));
					}
					else{
						$validator['success'] = false;
						$validator['message'] = 'Something went wrong while inserting data';
					}
				}
				else{
					$validator['success'] = false;
					foreach($_POST as $key => $value){
						$validator['message'][$key] = form_error($key);
					}
				}
		}
	}

	public function fetchTeacherData($teacherId = null){
		if($teacherId){
			$result = $this->Teacher_model->fetchTeacherData($teacherId);
		}
		else{
			$teacherData = $this->Teacher_model->fetchTeacherData();
			$result = array("data" => array());

			foreach($teacherData as $key => $value){
				$button = "<button>Button</button>";
				$photo = '<img style="height:50px;width:50px;border-radius:50%" src = "'.base_url().'uploads/'.$value['teacher_image'].'" alt = "Photo">';

				$result['data'][$key] = array(
					$photo,
					$value['teacher_name'],
					$value['teacher_age'],
					$value['teacher_email'],
					$value['teacher_contact'],
					$button
				);
			}//foreach
		}
		echo json_encode($result);
	}
}
