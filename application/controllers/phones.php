<?php

class Phones extends CI_Controller{

	public $phones;

	public function __construct(){
		parent::__construct();
		
		$this->phones = array(
			array(
				'age'	=> 0,
				'id'	=> 'motorola-xoom-with-wi-fi',
				'name'	=> 'Motorola XOOM\u2122 with Wi-Fi',
				'desc'	=> 'Blah blah blah',
			),
			array(
				'age'	=> 1,
				'id'	=> 'motorola-xoom-with-wi-fi',
				'name'	=> 'Motorola XOOM\u2122 with Wi-Fi',
				'desc'	=> 'Blah blah blah',
			),
			array(
				'age'	=> 2,
				'id'	=> 'motorola-xoom-with-wi-fi',
				'name'	=> 'Motorola XOOM\u2122 with Wi-Fi',
				'desc'	=> 'Blah blah blah',
			),
			array(
				'age'	=> 3,
				'id'	=> 'anotherone',
				'name'	=> 'Motorola XOOM\u2122 with Wi-Fi',
				'desc'	=> 'Blah blah blah',
			),
			array(
				'age'	=> 4,
				'id'	=> 'one-specific',
				'name'	=> 'Motorola XOOM\u2122 with Wi-Fi',
				'desc'	=> 'Blah blah blah',
			),
		);
		
	}
	
	//get->phones
	public function index(){
		
		Template::compose(false, $this->phones, 'json');
	
	}
	
	public function show($id){
	
		$output = '';
		
		foreach($this->phones as $item){
			if($id == $item['id']){
				$output = $item;
				break;
			}
		}
		
		if(!$output){
			$output = array('message' => 'No phone with that id');
		}
		
		Template::compose(false, $output, 'json');
	
	}
	
	public function create(){}
	
	public function update(){}
	
	public function delete(){}

}