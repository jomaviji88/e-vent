<?php
/**
 * Controller for User login and self management. 
 *
 * This file will render views from views/users/
 *
 * PHP versions 4 and 5
 *
 * Copyright 2008, Aran Johnson http://www.aranworld.com
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2008, Aran Johnson
 * @version			1.0
 * @lastmodified	$Date: 2008-05-26 11:48 -0700 (Wed, 14 May 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class UsersController extends AppController
{
	var $name = 'Users';
	var $helpers = array('form');
	var $uses = array('User');
	
	/**
	 * Determines if user will have option to set a cookie based login.
	 *
	 * @access public
	 * @var boolean
	 */
	var $allowCookie = TRUE;
	
	/**
	 * Determines length of cookie lifespan.
	 * Use string based date syntax, since strtotime will be applied to value.
	 *
	 * @access public
	 * @var string
	 */
	var $cookieTerm = '+4 weeks';

    var $allowedActions = array('logout');

	
	function beforeFilter()
	{
		$this->__configureAuthCookie();
		parent::beforeFilter();
	}

    /**
	 * Checks for allowCookie value and sets proper view value.
	 *
	 * @returns NULL
	 */
    function __configureAuthCookie(){
	    if( $this->allowCookie ){
			// this prevents the remember_me option from appearing in the user login form
			$this->set('remember_me', TRUE);
		} else {
		    $this->set('remember_me', FALSE);
		}
	}

    
	function add()
	{
        $this->flash("This page is not available for this content.", "/");
	}

    /**
	 * Custom login function to allow for cookies.
	 *
	 * @access public
	 * @return null will redirect upon success.
	 *
	 */
    function login() {
		if ($this->Auth->user()) {
			if (!empty($this->data)) {
				if (empty($this->data['User']['remember_me'])) {
					$this->Cookie->del('User');
				} elseif( $this->allowCookie ) {
					$cookie = array();
					$cookie['username'] = $this->data['User']['username'];
					$cookie['passwd'] = $this->data['User']['passwd'];
					$this->Cookie->write('User', $cookie, true, $this->cookieTerm );
				}
				unset($this->data['User']['remember_me']);
			}
			$this->redirect($this->Auth->redirect());
		}
	}


    /**
	 * Destroys both cookie and session login variables.
	 *
	 * @access public
	 * @return null will redirect.
	 */
	function logout()
	{
        $this->Auth->logout();
        $this->Cookie->del('User'); 
        $this->flash("You are now logged out of the site.", '/' );
	}
	
    /**
     * There is no index for users
     *
     */
	function index()
	{
        $this->flash("This page is not available for this content.", "/");
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
		debug($this->Auth->user());
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
	function __convertPasswords()
	{
	    if(!empty( $this->data['User']['new_passwd'] ) ){
            // we still want to validate the value entered in new_passwd
            // so we store the hashed value in a new data field which
            // we will later pass on to the passwd field in an 
            // afterSave() function 
		    $this->data['User']['new_passwd_hash'] = $this->Auth->password( $this->data['User']['new_passwd'] );
		}
	}

}
?>
