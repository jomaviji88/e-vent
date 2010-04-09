<?php

class SchedulesController extends AppController
{
	var $name = 'Schedules';
	var $helpers = array('form');
/* 	var $uses = array('User','Activity'); */
	
	function beforeFilter()
	{

	}
    
	function add()
	{
        $this->flash("Esta pagina no esta disponible para este contenido", "/");
	}
	
    /**
     * There is no index for users
     *
     */
	function index()
	{         
		$activities = $this->Activity->find('list',array('Activity.short_name'));
		$this->pageTitle = 'Actividades';
		$this->set(compact('user','activities'));
	}


    /**
     * There is no delete action for users, this is reserved for the usersmanager controller
     *
     */
	function delete( $id = null)
	{
        $this->flash("This page is not available for this content.", "/");
	}	

    /**
     * allows editing of a user record
     *
     * the Users controller only lets people edit their own records.  The usersmanager
     * controller is used for more detailed user record editing.
     *
     */
	function edit($id = null)
	{ 
        if( !$this->__checkUsersOwnRecord( $id ) ){
			// redirect to referring page
		} 

		if (empty($this->data)) {
	        $this->User->id = $id;
	        $this->data = $this->User->read();
			$this->pageTitle = 'Editing '.$this->data['User']['name'];
			$this->data['User']['old_group_id'] = $this->data['User']['group_id'];
	    } else {
			$this->__convertPasswords();

	        if ($this->User->save($this->data)) {
	            $this->flash('Your changes have been saved.','/users/view/'.$this->data['User']['id'] );
	        }
	    }

	}

    /**
     * Allows user to view own record.
	 *
	 * @access public
     */
	function view($id = null)
	{
        if( !$this->__checkUsersOwnRecord( $id ) ){
           $this->flash("You don't have permission to view this record.", "/");
        }
         
		$this->User->id = $id;
		$article = $this->User->read();
		$this->pageTitle = 'User Record: '.$article['User']['name'];
		$this->set( 'article', $article );
	}

    /**
     * Checks if logged in user has same id as one being edited
     *
     * @params string $recordId the id of the record being accessed
     * @returns boolean True if logged in User id is same as id being edited
     */
	function __checkUsersOwnRecord($recordId = null)
	{
		if( $this->Auth->user('id') == $recordId ){
			return TRUE;
		} else {
			return FALSE;
		}
	}
		
    /**
     * Hash submitted passwords according to the scheme used by the Auth component
	 *
	 * We need to keep a copy of the string submitted by the user, so we can
	 * use built-in validation rules on it.  However, we also need to convert this value
	 * to the hashed string that will be stored in the database.
	 *
	 * @access private
	 * @return null
     *
     */
}
?>
