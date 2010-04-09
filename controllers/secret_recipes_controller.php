<?php
/**
 * Controller for protected Secret Recipes 
 *
 * This file will render views from views/secret_recipes/
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
class SecretRecipesController extends AppController {
	var $name = 'SecretRecipes';
	var $uses = array('SecretRecipe');
    /**
     * Actions which will not be accessible without a valid login.
     * @access public
     * @var array
     */
	var $deniedActions = array('index', 'view');

    function index(){
        if( isset( $this->params['url']['page'] ) ){
            $page = $this->params['url']['page'];
        } else {
            $page = 1;
        }

		$order = 'SecretRecipe.date DESC';
		$fields = array('id','title', 'date');
		$story_count = $this->SecretRecipe->find('count');
        $articles = $this->SecretRecipe->find('all', 
		    array('fields' => $fields, 'limit' => 15, 'page' => $page, 'order' => $order ) );
		$this->set('current_page', $page);
		$this->set('page_size', 15);
		$this->set('story_count', $story_count);
        $this->set( 'articles', $articles );
    }

	function add(){
		if( !empty( $this->data ) ){
			if( $this->SecretRecipe->save( $this->data ) ){
			    $newId = $this->SecretRecipe->getLastInsertId();
				$this->flash('Your data has been saved.', '/secret_recipes/view/'.$newId );
			} 
		} else {
		    $this->data['SecretRecipe']['date'] = strtotime( date("Y-m-d H:i:s") );
			$this->set('dateString', $this->data['SecretRecipe']['date'] );
			$this->data['SecretRecipe']['user_id'] = $this->Auth->user('id');
		}

	}

	function delete( $id = null){
	    $this->SecretRecipe->id = $id;
		$this->data = $this->SecretRecipe->read();
	    if( !( isset($this->params['url']['confirm']) ) ){
        	$this->flash( 'Click below to confirm deletion of '.$this->data['SecretRecipe']['title'].'.', '/secret_recipes/delete/'.$id.'/?confirm=1', 120 );		
    	} else {
    		if( $this->SecretRecipe->del($id) ){
				$this->flash( $this->data['SecretRecipe']['name'].' has been deleted.', '/secret_recipes/index' );
			} 
    	}
	}

	function edit( $id = null ){
		if( empty( $this->data ) ){
			$this->SecretRecipe->id = $id;
			$this->data = $this->SecretRecipe->read();
			$this->set('dateString', $this->data['SecretRecipe']['date'] );
		} else {
			if( $this->SecretRecipe->save( $this->data ) ){
				$this->flash('You have successfully edited this record.', '/secret_recipes/view/'.$this->data['SecretRecipe']['id'] );
			}
		}

	}

	function view( $id = null){
	    if( !$id ){
		    $this->redirect('/secret_recipes/index', '',TRUE);
		}
		$this->SecretRecipe->id = $id;
		$article = $this->SecretRecipe->read();
		$this->pageTitle = $article['SecretRecipe']['title'];
		$this->set('article', $article );
	}


}

?>
