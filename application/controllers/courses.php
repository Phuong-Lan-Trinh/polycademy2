<?php

class Courses extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Courses_model');
	}
	
	public function index(){
		//get all courses
		
		$limit = $this->input->get('limit', true);
		$offset = $this->input->get('offset', true);
		
		$query = $this->Courses_model->read_all($limit, $offset);
		
		if($query){
			foreach($query as &$course){
				$course = output_message_mapper($course, 'course');
			}
			$output = $query;
		}else{
			$this->output->set_status_header('404');
			$output = array(
				'error'			=> output_message_mapper($this->Courses_model->get_errors(), 'course'),
			);
		}
		
		Template::compose(false, $output, 'json');

	}
	
	public function show($id){
		//get one course
		
		$query = $this->Courses_model->read($id);
		
		if($query){
			$output = output_message_mapper($output, 'course');
		}else{
			$this->output->set_status_header('404');
			$output = array(
				'error'			=> output_message_mapper($this->Courses_model->get_errors(), 'course'),
			);
		}
		
		Template::compose(false, $output, 'json');
		
	}
	
	public function create(){
		//post a new course
		
		$this->authenticated();
		
		$data = $this->input->json(false, true);
		
		$data['courseNumberOfApplications'] = (!empty($data['courseNumberOfApplications']) ? $data['courseNumberOfApplications'] : 0);
		$data['courseNumberOfStudents'] = (!empty($data['courseNumberOfStudents']) ? $data['courseNumberOfStudents'] : 0);
		
		$data = input_message_mapper($data, 'course');
		
		$query = $this->Courses_model->create($data);
		
		if($query){
			$output = array(
				'status'		=> 'Created',
				'resourceId'	=> $query,
			);
		}else{
			$this->output->set_status_header('400');
			$output = array(
				'error'			=> output_message_mapper($this->Courses_model->get_errors(), 'course'),
			);
		}
		
		Template::compose(false, $output, 'json');
		
	}
	
	public function update($id){
		//update a course
		
		$this->authenticated();
		
		$data = $this->input->json(false, true);
		
		//change camelcase to snakecase and remove the model prefix
		$data = input_message_mapper($data, 'course');
		
		$query = $this->Courses_model->update($data, $id);
		
		if($query){
			$output = array(
				'status'		=> 'Updated',
				'resourceId'	=> $id,
			);
		}else{
			$this->output->set_status_header('204');
			$output = array(
				'error'			=> output_message_mapper($this->Courses_model->get_errors(), 'course'),
			);
		}
		
		Template::compose(false, $output, 'json');
		
	}
	
	public function delete($id){
		//delete a course
		
		$this->authenticated();
		
		$query = $this->Courses_model->delete($id);
		
		if($query){
			$output = array(
				'status'		=> 'Deleted',
				'resourceId'	=> $id,
			);
		}else{
			$this->output->set_status_header('204');
			$output = array(
				'error'			=> output_message_mapper($this->Courses_model->get_errors(), 'course'),
			);
		}
		
	}
	
	protected function authenticated(){
		//check if person was authenticated
	}

}