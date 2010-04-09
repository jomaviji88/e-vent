<?php
class SchedulemanagersController extends AppController
{
	var $name = 'Schedulemanagers';
	var $uses = array('Schedule','Activity');
	var $paginate = array('limit' => 50, 'page' => 1);
	
	function index() {
		$schedules = $this->paginate('Schedule');
		for($i = 0; $i < count($schedules); $i ++) {
			$registered = 0;
			foreach($schedules[$i]['User'] as $user) {
				$registered++;
			}
			$schedules[$i]['Schedule']['registered'] = $registered;
		}
		$this->set(compact('schedules'));
	}
	
	function add() {
		$this->loadModel('Activity');
		$optionsStatus = array('open'=> 'Abierto', 'closed' => "Cerrado");
		$optionsSites = array('0'=> 'Salon de Congresos', '1' => "Salon");
		$optionsActivities = $this->Activity->find('list',array('fields' => 'short_name'));
        $this->set(compact('optionsStatus', 'optionsSites', 'optionsActivities'));
        if (!empty($this->data)) {   
            if ($this->Schedule->save($this->data)) {
            	$lastId = $this->Schedule->getLastInsertId();
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

	function edit($id = null)
	{ 	
		$this->loadModel('User');
		$userList = $this->User->find('list',array('fields' => array('User.name')));
		$this->set(compact('userList'));
		if (empty($this->data)) {
	        $this->Schedule->id = $id;
	        $this->data = $this->Schedule->read();
	    } else if ($this->Schedule->save($this->data)) {
	        $id = $this->data['Schedule']['id'];
            $this->Session->setFlash(__('Tus cambios han sido guardados.', true), 'default', array(), 'flash');
            $this->redirect(array('controller' => 'schedulemanagers','action' => 'view', $id));
	        
	    }
	}
	
	function view($id = null) {
        $this->Schedule->id = $id;
        $schedule = $this->Schedule->read();
        $this->pageTitle = 'Agenda de Actividades';
      	foreach($schedule['User'] as $user) {
      		$registered++;
      	}
        $this->set(compact('schedule','registered'));
		
	}	    
}
?>
