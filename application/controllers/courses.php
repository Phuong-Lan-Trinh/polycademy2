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
	}
	
	public function update($id){
		//update a course
	}
	
	public function delete($id){
		//delete a course
	}

}