<?php

class Courses extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Courses_model');
	}
	
	public function index(){
		//get all courses

	}
	
	public function show($id){
		//get one course
	}
	
	public function create(){
		//post a new course
		
		$data = $this->input->json(false, true);
		
		$data = array(
			'name'						=> $data['courseName'],
			'starting_date'				=> $data['courseStartingDate'],
			'days_duration'				=> $data['courseDaysDuration'],
			'times'						=> $data['courseTimes'],
			'number_of_applications'	=> $data['courseNumberOfApplications'],
			'number_of_students'		=> $data['courseNumberOfStudents'],
		);
		
		$query = $this->Courses_model->create($data);
		
		if($query){
			$output = array(
				'status'		=> 'Done',
				'resourceId'	=> $query,
			);
		}else{
			$this->output->set_status_header('400');
			$errors = validation_error_message_mapper($this->Courses_model->get_errors(), 'course'); 
			$output = array(
				'error'			=> $errors,
			);
		}
		
		Template::compose(false, $output, 'json');
		
	}
	
	public function update($id){
		//update a course
	}
	
	public function delete($id){
		//delete a course
	}

}