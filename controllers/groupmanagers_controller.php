<?php
class GroupmanagersController extends AppController
{
	var $name = 'Groupmanagers';
	var $uses = array('Group');
	var $paginate = array('limit' => 50, 'page' => 1);
	
	function index() {
		$groups = $this->paginate('Group');
		$this->set(compact('groups'));
	}
	
	function add() {
		$groupList = $this->Group->find('list',array('fields' => array('Group.name')));
		$this->set(compact('groupList'));
        if (!empty($this->data)) {   
            if ($this->Group->save($this->data)) {
            	$lastId = $this->Group->getLastInsertId();
            	$this->redirect(array('action' => 'view', $lastId));
                
            } else {
				
			}
        }
	}

	function delete( $id = null)
	{
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

	function edit($id = null) { 	
		$groupList = $this->Group->find('list',array('fields' => array('Group.name')));
		$this->set(compact('groupList'));
		
		if (empty($this->data)) {
	        $this->Group->id = $id;
	        $this->data = $this->Group->read();
	    } else if ($this->Group->save($this->data)) {
	        $id = $this->data['Group']['id'];
            $this->Session->setFlash(__('Tus cambios han sido guardados.', true), 'default', array(), 'flash');
            $this->redirect(array('controller' => 'groupmanagers','action' => 'view', $id));
	    }
	}
	
	function view($id = null) {
        $this->Group->id = $id;
        $group = $this->Group->read();
        $this->pageTitle = 'Equipos | '.$this->pageTitle;
        $this->set(compact('group'));
		
	}	    
}
?>
