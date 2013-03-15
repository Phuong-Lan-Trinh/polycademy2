<?php

use Respect\Validation\Validator as v;

class Courses_model extends CI_Model{

	public function __construct($validation){
		parent::__construct();
	}
	
	public function create($data){
	
		//validate the data coming in
		
		try {
			$nameValid = v::alnum()->length(1, 50)->setName('Course Name');
			$startValid = v::date('Y-m-d')->between('2012-01-01', '3000-01-01')->setName('Starting Date');
			$daysValid = v::numeric();
			//$timesValid = 
			//$applicationsValid = 
			//$studentsValid = 
			
			
			$nameValid->assert($data['name']);
			$startValid->assert($data['starting_date']);
			$daysValid->assert($data['days_duration']);
			$timesValid->assert($data['times']);
			$applicationsValid->assert($data['number_of_applications']);
			$studentsValid->assert($data['number_of_students']);
			
		}catch(\InvalidArgumentException $e){
			var_dump($e->findMessages());
		}
		
		//name
		//starting_date
		//days_duration
		//times
		//number_of_applications
		//number_of_students
	
		$data = array(
			
		);
	
		$this->db->insert($data);
	
	}
	
	public function read(){
	
	}
	
	public function read_all(){
	
	}
	
	public function update(){
	
	}
	
	public function delete(){
	
	}

}