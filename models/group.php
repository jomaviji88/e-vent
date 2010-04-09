<?php 
/**
 * Model for user groups 
 *
 * This file represents data stored in the groups db table.
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
class Group extends AppModel
{
	var $name = 'Group';
    /**
     * Provides automated functioning from Acl Behavior, which
     * in turn provides functionality from TreeBehavior
     * @access public
     * @var array
     */
	var $actsAs = array('Acl'=>'requester');

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

		if (!$data['Group']['parent_id']){
		  return null;
		} else {
		  return array('model' => 'Group', 'foreign_key' => $data['Group']['parent_id']);
		}
    }

    /**
     * processes completed after saving record
     *
     */
	function afterSave($created = null){
	    if( $created ){
		    $this->id = $this->getLastInsertId();
		    // first create alias for the newly created Aro
		    $this->__createAroAlias();
		} else {
		    $this->__updateAclGroup();
		}
		
	
	}

    /**
     * Gets Aro node location for this model
     *
     */
    function getNodePath()
	{
        return $this->Aro->node( $this );
	}

    /**
     * Creates an alias for the newly created Aro record -- AclBehavior
     * does not create an alias automatically.
     *
     * @access private
     * @returns boolean TRUE if alias is successfully added to the recently
     *     created Aro node
     */
	function __createAroAlias()
	{
	    $aroId = $this->Aro->getLastInsertId();
		$this->Aro->create();
		$this->Aro->id = $aroId;
		if( $this->Aro->saveField('alias', $this->data['Group']['name'] ) ){
		    return TRUE;
		} else {
		    return FALSE;
		}
	}


    /**
     * If parent has changed, need to make sure new parent is set in Aro record
     *
     * @access private
     * @returns NULL
     */
    function __updateAclGroup()
	{
	    if( $this->data['Group']['parent_id'] !== $this->data['Group']['old_parent_id'] ){
			// what is the id of the aro row that has $this->data['Group']['parent_id'] as it's foreign_key?
			$parentInfo = $this->Aro->find(array('foreign_key'=>$this->data['Group']['parent_id'], 'model'=>'Group') );
			$groupAro = $this->Aro->find(array('foreign_key'=>$this->data['Group']['id'], 'model'=>'Group') );
			$updatedAro = array(
			    'Aro' => array(
				    'id' => $groupAro['Aro']['id'],
					'parent_id' => $parentInfo['Aro']['id']
					)
				);
			$this->Aro->save( $updatedAro );
		}
	}
}
?>
