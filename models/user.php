<?php 
/**
 * Model for Public Articles 
 *
 * This file represents data stored in the articles db table.
 *
 * PHP versions 4 and 5
 *
 * Copyright 2008, Aran Johnson http://www.aranworld.com
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author			Aran Johnson arancarlisle@yahoo.com
 * @filesource
 * @copyright		Copyright 2008, Aran Johnson http://www.aranworld.com
 * @version			1.0
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class User extends AppModel
{
	var $name = 'User';
	var $belongsTo = array('Group');
	var $hasAndBelongsToMany = array('Activity');
	
    /**
     * Provides automated functioning from Acl Behavior, which
     * in turn provides functionality from TreeBehavior
     * @access public
     * @var array
     */
	var $actsAs = array('Acl'=>'requester');
	
	var $validate = array(
	       'name' => array(
		       'rule' => array('minlength', 3),
			   'message' => "You must enter the users real name"
			   ),
	       'username' => array(
		       'rule' => array('alphanumeric'),
			   'message' => 'Please make sure you use only letters and numbers'
			   ),
	       'email' => array(
		           'rule' => array('email', 'email' ),
				   'message' => 'Please make sure you have entered a valid email address'
				),
           'new_passwd' => array(
		       'equalTo' => array(
			       'rule' => array('equalTo', 'confirm_passwd' ),
				   'message' => 'Please re-enter your password twice so that the values match'
				   ),
				'between' => array(
					'rule' => array('between', 7, 20),
					'allowEmpty' => true,
					'message' => 'You password must be between 7 and 20 characters long'
					)
				)
        );
        
	var $bannedPasswords = array('password', 'admin', 'pass', 'login');

    /**
     * Allows the AclBehavior to determine parental ownership of
     * currently active record.
     *
     * @access public
     * @returns array data array to be used by AclBehavior for node lookup
     */
	function parentNode(){
	    if (!$this->id) {
		    return null;
		}

		$data = $this->read();

		if (!$data['User']['group_id']){
		    return null;
		} else {
		    return array('model' => 'Group', 'foreign_key' => $data['User']['group_id']);
		}
    }

    function beforeSave(){
	    $this->setNewPassword();
		return true;
	}

	function afterSave($created = null){
	    if( $created ){
		    $this->id = $this->getLastInsertId();
		    // first create alias for the newly created Aro
		    // ACL Behavior does NOT manage alias values
		    $this->__createAroAlias();
		} else {
            if( isset($this->data['User']['group_id']) && isset( $this->data['User']['old_group_id'] ) ){
				$this->__updateAclGroup();
			}
		}
	}

    /**
     * When the group_id has changed, then need to also change the parent_id field in the
	 * matching Aro row.
	 *
	 * @access private
     */
    function __updateAclGroup(){
	    if( $this->data['User']['group_id'] !== $this->data['User']['old_group_id'] ){
			// what is the id of the aro row that has $this->data['User']['group_id'] as it's foreign_key?
			$groupInfo = $this->Aro->find(array('foreign_key'=>$this->data['User']['group_id'], 'model'=>'Group') );
			$userAro = $this->Aro->find(array('foreign_key'=>$this->data['User']['id'], 'model'=>'User') );
			$updatedAro = array(
			    'Aro' => array(
				    'id' => $userAro['Aro']['id'],
					'parent_id' => $groupInfo['Aro']['id']
					)
				);
			$this->Aro->save( $updatedAro );
		}
	}


    /**
     * Creates an alias value for a newly created user.
     * 
	 * @returns boolean TRUE if alias value successfully changed.
     */
	function __createAroAlias()
	{
	    $aroId = $this->Aro->getLastInsertId();
		$this->Aro->create();
		$this->Aro->id = $aroId;
		if( $this->Aro->saveField('alias', $this->data['User']['username'] ) ){
		    return TRUE;
		} else {
		    return FALSE;
		}
	}

       


    /**
	 * sets the password to be equal to the verified value from the temporary password field
	 *
	 * Under AuthComponent, any time a form is submitted with a field name that matches the 
	 * expected password field, it is hashed before any other operation can be done.  This 
	 * prevents the equalTo() rule check from working, so we take the password in a form input
	 * named something else.  Then after verification, but before saving the record, we pass
	 * the hashed value to the correct password field.
	 *
	 * @return boolean TRUE
	 */
	function setNewPassword()
	{
	    if( !empty( $this->data['User']['new_passwd_hash'] ) ){
		    $this->data['User']['passwd'] = $this->data['User']['new_passwd_hash'];
		}
		return TRUE;
	}

    /**
	 * Overrides core equalTo() to verify that two form fields are equal
	 *
	 * @param array $field contains the name of the primary field and the value of that field
	 * @param string $compare_field contains the name of the field to compare the primary field to
	 * @access public
	 * @return boolean FALSE if the fields do not match TRUE if they do
	 */
	function equalTo( $field=array(), $compare_field=null ) 
	{
		foreach( $field as $key => $value ){
			$v1 = $value;
			$v2 = $this->data[$this->name][ $compare_field ];
            if($v1 !== $v2) {
			    return FALSE;
		    } else {
		       continue;
		    }
		}
		return TRUE;

    }

}
?>
