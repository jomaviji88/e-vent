<?php
class Schedule extends AppModel {

	public $name = 'Schedule';
 	
 	var $belongsTo = array('Activity');
 	var $hasAndBelongsToMany = array('User');
}
?>
