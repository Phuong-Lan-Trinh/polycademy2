<?php

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

class Courses_model extends CI_Model{

	protected $validator;
	protected $errors;

	public function __construct(){
	
		parent::__construct();
		$this->validator = new Validator;
		
	}
	
	public function create($data){
	
		//Labels
		$this->validator
			->set_label('name', 'Course Name')
			->set_label('starting_date', 'Starting Date')
			->set_label('days_duration', 'Course Duration')
			->set_label('times', 'Course Times')
			->set_label('number_of_applications', 'Number of Applicants')
			->set_label('number_of_students', 'Number of Students');
		
		//name rules
		$this->validator
			->add_rule('name', new Rule\NotEmpty())
			->add_rule('name', new Rule\MinLength(5))
			->add_rule('name', new Rule\MaxLength(50));
		
		//starting date rules
		$this->validator
			->add_rule('starting_date', new Rule\NotEmpty())			
			->add_rule('starting_date', new Rule\Regex('/^(19|20)\d\d\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/'));
			
		//days duration rules
		$this->validator
			->add_rule('days_duration', new Rule\NotEmpty())
			->add_rule('days_duration', new Rule\Number())
			->add_rule('days_duration', new Rule\NumRange(1, 200));
			
		//times rules
		$this->validator
			->add_rule('times', new Rule\NotEmpty())
			->add_rule('times', new Rule\MinLength(1))
			->add_rule('times', new Rule\MaxLength(100));
			
		//application rules
		$this->validator
			->add_rule('number_of_applications', new Rule\Number())
			->add_rule('number_of_applications', new Rule\NumRange(0, 100));
			
		//students rules
		$this->validator
			->add_rule('number_of_students', new Rule\Number())
			->add_rule('number_of_students', new Rule\NumRange(0, 100));
		
		
		if(!$this->validator->is_valid($data)){
		
			//returns array of key for data and value
			$this->errors = $this->validator->get_errors();
			return false;
			
		}
		
		$query = $this->db->insert('courses', $data); 
 
        if(!$query){
 
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
            $last_query = $this->db->last_query();
			
            log_message('error', 'Problem Inserting to courses table: ' . $msg . ' (' . $num . '), using this query: "' . $last_query . '"');
			
			$this->errors = array(
				'database'	=> 'Problem inserting data to courses table.',
			);
 
            return false;
			
        }
		
        return $this->db->insert_id();
		
	}
	
	public function read(){
	
	}
	
	public function read_all(){
	
	}
	
	public function update(){
	
	}
	
	public function delete(){
	
	}
	
	public function get_errors(){
		return $this->errors;
	}

}