<?php

use Polycademy\Validation\Validator;
use Polycademy\Validation\Rule;

class Courses_model extends CI_Model{

	protected $validator;
	protected $errors;

	public function __construct(){
	
		parent::__construct();
		$this->validator = new Validator;
		
	}
	
	public function create($data){
		
		$this->validator->setup_rules(array(
			'name' => array(
				'set_label:Course Name',
				'NotEmpty',
				'AlphaNumericSpace',
				'MinLength:5',
				'MaxLength:50',
			),
			'starting_date' => array(
				'set_label:Starting Date',
				'Regex:/^(19|20)\d\d\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/',
			),
			'days_duration' => array(
				'set_label:Course Duration',
				'NotEmpty',
				'Number',
				'NumRange:1,200',
			),
			'times' => array(
				'set_label:Course Times',
				'NotEmpty',
				'MinLength:1',
				'MaxLength:100',
				'AlphaNumericSpace',
			),
			'number_of_applications' => array(
				'set_label:Number of Applicants',
				'Number',
				'NumRange:0,100',
			),
			'number_of_students' => array(
				'set_label:Number of Students',
				'Number',
				'NumRange:0,100',
			),
		));
		
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
	
		$query = $this->db->
	
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