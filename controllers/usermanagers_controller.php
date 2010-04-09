<?php
/**
 * Controller for full administration of users 
 *
 * This file will render views from views/usermanager/
 *
 * PHP versions 4 and 5
 *
 * Copyright 2008, Aran Johnson http://www.aranworld.com
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2008, Aran Johnson http://www.aranworld.com
 * @version			1.0
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class UsermanagersController extends AppController
{
	var $name = 'Usermanagers';
	var $uses = array('User','State');
	var $paginate = array('limit' => 50, 'page' => 1);
	
	function index() {
		$users = $this->paginate('User');
	  	$this->set(compact('users'));
	}

	function view($id = null) {
        $this->User->id = $id;
        $user = $this->User->read();
        $this->pageTitle = 'Informaci—n de '.$user['User']['username'];
        $this->set(compact('user'));	
	}

	function add() {
	    $this->set('userGroups', $this->User->Group->find("list"));
        if (!empty($this->data)) {   
		    $this->__convertPasswords();

            if ($this->User->save($this->data)) {
            	$lastId = $this->User->getLastInsertId();
            	$this->redirect(array('controller' => 'usermanagers','action' => 'view',$lastID));
            } else {
				$this->data['User']['new_passwd'] = null;
				$this->data['User']['confirm_passwd'] = null;
			}
        }
	}
	
	function edit($id = null) { 
		$this->loadModel('State');
		$this->loadModel('Team');
		$teamList = $this->Team->find('list',array('fields' => array('Team.name')));
		$this->set(compact('teamList'));
        $this->set('userGroups', $this->User->Group->find("list"));
        $this->set('listStates', $this->State->find("list"));
        
		if (empty($this->data)) {
	        $this->User->id = $id;
	        $this->data = $this->User->read();
			$this->data['User']['old_group_id'] = $this->data['User']['group_id'];
	    } else {
			$this->__convertPasswords();

	        if ($this->User->save($this->data)) {
	            $id = $this->data['User']['id'];
            	$this->Session->setFlash(__('Tus cambios han sido guardados.', true), 'default', array(), 'flash');
           		$this->redirect(array('controller' => 'usermanagers','action' => 'view', $id));
	        }
	    }
	}

	function delete( $id = null) {
	    $this->User->id = $id;
		$this->data = $this->User->read();
	    if( !( isset($this->params['url']['confirm']) ) ){
        	$this->flash( 'Click below to confirm deletion of '.$this->data['User']['name'].'.', '/usermanager/delete/'.$id.'/?confirm=1', 120 );		
    	} else {
    		if( $this->User->del($id) ){
				$this->flash( $this->data['User']['name'].' has been deleted.', '/usermanager/index' );
			} 
    	}
	}
	
    /**
     * Get a hashed value of submitted password which we will enter into database.
     * This value will use the same hash technique used by the AuthComponent during a
     * user login submission. 
     *
     */
	function __convertPasswords()
	{
	    if(!empty( $this->data['User']['new_passwd'] ) ){
		    $this->data['User']['new_passwd_hash'] = $this->Auth->password( $this->data['User']['new_passwd'] );
		}
	}
	    
}
?>
