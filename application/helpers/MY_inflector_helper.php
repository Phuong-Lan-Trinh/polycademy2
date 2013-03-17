<?php

//takes an array of validation errors, and changes their key to represent {prefixFormInputName}
if(!function_exists('validation_error_message_mapper')){
	function validation_error_message_mapper($validation_errors, $prefix = ''){
	
		$array = array_flip($validation_errors);
		
		array_walk(
			$array,
			function(&$value, $key, $prefix){
				$value = (!empty($prefix)) ? camelize($prefix . '_' . $value) : camelize($value);
			},
			$prefix
		);
		
		$array = array_flip($array);

		return $array;
		
	}
}