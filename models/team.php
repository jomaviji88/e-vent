<?php
class Team extends AppModel {

	public $name = 'Team';    
	
	var $belongsTo = array('User');             

	var $hasMany = array('User');
}
?>
