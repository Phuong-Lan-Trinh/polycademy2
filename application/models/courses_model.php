<?php

use Polycademy\Validation\Validator;

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
			
            log_message('error', 'Problem inserting to courses table: ' . $msg . ' (' . $num . '), using this query: "' . $last_query . '"');
			
			$this->errors = array(
				'database'	=> 'Problem inserting data to courses table.',
			);
			
            return false;
			
        }
		
        return $this->db->insert_id();
		
	}
	
	public function read($id){
	
		$query = $this->db->get_where('courses', array('id' => $id));
		
		if($query->num_rows() > 0){
			$row = $query->row();
			$data = array(
				'id'						=> $id,
				'name'						=> $row->name,
				'starting_date'				=> $row->starting_date,
				'days_duration'				=> $row->days_duration,
				'times'						=> $row->times,
				'number_of_applications'	=> $row->number_of_applications,
				'number_of_students'		=> $row->number_of_students,
			);
			return $data;
		}else{
			$this->errors = array(
				'database'	=> 'Could not find specified course.',
			);
			return false;
		}
		
	}
	
	public function read_all($limit = false, $offset = false){
	
		//if limit is false, pass in a default 100
		$limit = ($limit) ? $limit : 100;
		
		$this->db->select('*');
		$this->db->limit($limit, $offset);
		$query = $this->db->get('courses');
		
		if($query->num_rows() > 0){
		
			foreach($query->result() as $row){
			
				//inside each row now!
				$data[] = array(
					'id'						=> $row->id,
					'name'						=> $row->name,
					'starting_date'				=> $row->starting_date,
					'days_duration'				=> $row->days_duration,
					'times'						=> $row->times,
					'number_of_applications'	=> $row->number_of_applications,
					'number_of_students'		=> $row->number_of_students,
				);
			
			}
			
			return $data;
		
		}else{
			$this->errors = array(
				'database'	=> 'No courses found at all!',
			);
			return false;
		}
	
	}
	
	public function update($id, $data){
	
		$this->validator->setup_rules(array(
			'name' => array(
				'set_label:Course Name',
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
				'Number',
				'NumRange:1,200',
			),
			'times' => array(
				'set_label:Course Times',
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
		
			$this->errors = $this->validator->get_errors();
			return false;
			
		}
		
		$this->db->where('id', $id);
		$this->db->update('courses', $data);
		
		//greated or equal to zero (means update worked)
		if($this->db->affected_rows() > 0){
		
			return true;
		
		}else{
			
			$this->errors = array(
				'database'	=> 'Nothing to update.',
			);
            return false;
		
		}
	
	}
	
	public function delete($id){
	
		$this->db->where('id', $id);
		$this->db->delete('courses'); 
		
		if($this->db->affected_rows() > 0){
		
			return true;
			
		}else{
		
			$this->errors = array(
				'database'	=> 'Nothing to delete.',
			);
			
            return false;
			
		}
	
	}
	
	public function get_errors(){
		return $this->errors;
	}

}