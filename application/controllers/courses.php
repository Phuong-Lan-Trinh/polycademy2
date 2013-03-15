<?php

class Courses extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Courses_model');
	}
	
	public function index(){
	
		//get all courses
		$data = array(
			'name' => '11 Weeks Weekly',
			'starting_date' => date('Y-m-d', now()),
			'days_duration'	=> 10,
			'times'	=> 'Blah blah blah',
			'number_of_applications'	=> 50,
			'number_of_students'	=> 40
		);
		
		$this->Courses_model->create($data);
	}
	
	public function show($id){
		//get one course
	}
	
	public function create(){
		//post a new course
	}
	
	public function update($id){
		//update a course
	}
	
	public function delete($id){
		//delete a course
	}

}