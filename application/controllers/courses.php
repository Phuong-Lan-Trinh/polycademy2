<?php

class Courses extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Courses_model');
	}
	
	public function index(){
		
		//get all courses
		$data = array(
			'name' => '',
			'starting_date' => date('Y-m-d', now()),
			'days_duration'	=> 10,
			'times'	=> 'Blahghj blah blah',
			'number_of_applications'	=> 50,
			'number_of_students'	=> 40
		);
		
		var_dump(str_replace(' ', '', $data['times']));
		
		var_dump(ctype_alnum(str_replace(' ', '', $data['times'])));
		
		$this->Courses_model->create($data);
		
		var_dump($this->Courses_model->get_errors());
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