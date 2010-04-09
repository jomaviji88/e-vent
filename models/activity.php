<?php
class Activity extends AppModel {

	public $name = 'Activity';

	var $hasAndBelongsToMany = array(        
		'User',                  
	);  
	
	var $belongsTo = array(
		'Contenttype'
	);
	
	var $hasMany = array(
		'Schedule'
	);
	
	function cambiaf_a_normal($fecha) { 
	   	ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
	   	$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1]; 
	   	return $lafecha; 
	} 
	
	function date_day_month($date = null) {
		ereg("([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $date, $tmp); 
	   	$new_date = $tmp[3]."/".$tmp[2]; 
	   	return $new_date; 
	}


	function cambiaf_a_mysql($fecha){ 
	   	ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha); 
	   	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]; 
	   	return $lafecha; 
	} 
}
?>
