<?php

class ActivitymanagersController extends AppController
{
	var $name = 'Activitymanagers';
	var $uses = array('Activity');
	var $paginate = array('limit' => 50, 'page' => 1);
	

	function index() {	
		$activities = $this->paginate('Activity');
		for($i = 0;$i < count($activities); $i++) {
			for($j = 0; $j < count($activities[$i]['Schedule']); $j++) {
				if(isset($activities[$i]['Schedule'][$j])){
					$date = $this->Activity->date_day_month($activities[$i]['Schedule'][$j]['start_date']);
					$slots = $activities[$i]['Schedule'][$j]['slots'];
					$date != "/" ? $dates[$date] = $date : $date = "";
					$current = 0;
					$activities[$i]['Schedule']['slots'][$date] = $slots;
				}
				
				 
			}
		}	
		$this->set(compact('activities','dates'));
	}
	
	function view($id = null) {
        $this->Activity->id = $id;
        $activity = $this->Activity->read();
        $this->pageTitle = 'Actividades';
        $this->set(compact('activity'));
	}	
	
	function add() {
		$this->loadModel('User');
		$this->loadModel('Contenttypes');
		$optionsType = $this->Contenttypes->find('list',array('fields' => 'name'));
		$optionsStatus = array('open'=> 'Abierto', 'closed' => "Cerrado");
		$optionsUsers = $this->User->find('list',array('fields' => 'email'));
        $this->set(compact('optionsType', 'optionsStatus', 'optionsSites', 'optionsUsers'));
        if (!empty($this->data)) {   
            if ($this->Activity->save($this->data)) {
            	$lastId = $this->Activity->getLastInsertId();
            	$this->redirect(array('controller' => 'activitymanagers','action' => 'view',$lastID));
            } else {
				
			}
        }  
	}

	function edit($id = null)
	{ 
		$this->loadModel('User');
		$this->loadModel('Contenttypes');
		$optionsType = $this->Contenttypes->find('list',array('fields' => 'name'));
		$optionsStatus = array('open'=> 'Abierto', 'closed' => "Cerrado");
		$optionsUsers = $this->User->find('list',array('fields' => 'email'));
        $this->set(compact('optionsType', 'optionsStatus', 'optionsSites', 'optionsUsers'));
		if (empty($this->data)) {
	        $this->Activity->id = $id;
	        $this->data = $this->Activity->read();
	    } else if ($this->Activity->save($this->data)) {
	    	$id = $this->data['Activity']['id'];
            $this->Session->setFlash(__('Tus cambios han sido guardados.', true), 'default', array(), 'flash');
            $this->redirect(array('controller' => 'activitymanagers','action' => 'view', $id));
	    }
	}
	
	function delete($id = null)	{
		if (!$id) {
			$this->Session->setFlash(__('ID de Actividad no v‡lida', true), 'default', array(), 'error');
		} else {
			$this->Activity->del($id);
			$this->Session->setFlash(__('Actividad Borrada', true), 'default', array(), 'flash');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}   
}
?>
