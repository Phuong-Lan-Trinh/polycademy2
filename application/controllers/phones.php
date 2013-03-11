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
				'id'	=> 'motorola-xoom-with-wi-fi',
				'name'	=> 'Motorola XOOM\u2122 with Wi-Fi',
				'desc'	=> 'Blah blah blah',
			),
			array(
				'age'	=> 4,
				'id'	=> 'motorola-xoom-with-wi-fi',
				'name'	=> 'Motorola XOOM\u2122 with Wi-Fi',
				'desc'	=> 'Blah blah blah',
			),
		);
		
	}
	
	//get->phones
	public function index(){
		
		Template::compose(false, $this->phones, 'json');
	
	}

}