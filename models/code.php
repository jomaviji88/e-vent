<?php
class Code extends AppModel {

	public $name = 'Code';
	
	var $belongsTo = array('User','Coupon');
	
}
?>
