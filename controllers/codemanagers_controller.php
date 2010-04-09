<?php
class CodemanagersController extends AppController
{
	var $name = 'Codemanagers';
	var $uses = array('Code');
	var $paginate = array('limit' => 50, 'page' => 1);
	
	function index() {
	
		$codes = $this->paginate('Code');
		$this->set(compact('codes'));
	}
	
	function add() {
		$this->loadModel('User');
		$this->loadModel('Coupon');
		$userList = $this->User->find('list',array('fields' => array('User.name')));
		$couponList = $this->Coupon->find('list',array('fields' => array('Coupon.name')));
		$this->set(compact('userList','couponList'));
        if (!empty($this->data)) {   
            if ($this->Code->save($this->data)) {
            	$lastId = $this->Code->getLastInsertId();
            	$this->redirect(array('action' => 'view', $lastId));
                
            } else {
				
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

	function edit($id = null) { 	
		$this->loadModel('User');
		$this->loadModel('Coupon');
		$userList = $this->User->find('list',array('fields' => array('User.name')));
		$couponList = $this->Coupon->find('list',array('fields' => array('Coupon.name')));
		$this->set(compact('userList','couponList'));
		
		if (empty($this->data)) {
	        $this->Code->id = $id;
	        $this->data = $this->Code->read();
	    } else if ($this->Code->save($this->data)) {
	        $id = $this->data['Code']['id'];
            $this->Session->setFlash(__('Tus cambios han sido guardados.', true), 'default', array(), 'flash');
            $this->redirect(array('controller' => 'codemanagers','action' => 'view', $id));
	    }
	}
	
	function view($id = null) {
        $this->Code->id = $id;
        $code = $this->Code->read();
        $this->pageTitle = 'Equipos | '.$this->pageTitle;
        $this->set(compact('code'));
		
	}	    
}
?>
