<?php
/**
 * Controller for Public Articles 
 *
 * This file will render views from views/articles/
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
class ArticlesController extends AppController {
	var $name = 'Articles';
	var $uses = array('Article');

    function index(){
        if( isset( $this->params['url']['page'] ) ){
            $page = $this->params['url']['page'];
        } else {
            $page = 1;
        }

		$order = 'Article.date DESC';
		$fields = array('id','title', 'date');
		$story_count = $this->Article->find('count');
        $articles = $this->Article->find('all', 
		    array('fields' => $fields, 'limit' => 15, 'page' => $page, 'order' => $order ) );
		$this->set('current_page', $page);
		$this->set('page_size', 15);
		$this->set('story_count', $story_count);
        $this->set( 'articles', $articles );
    }

	function add(){
		if( !empty( $this->data ) ){
			if( $this->Article->save( $this->data ) ){
			    $newId = $this->Article->getLastInsertId();
				$this->flash('Your data has been saved.', '/articles/view/'.$newId );
			} 
		} else {
		    $this->data['Article']['date'] = strtotime( date("Y-m-d H:i:s") );
			$this->set('dateString', $this->data['Article']['date'] );
		}

	}

	function delete( $id = null){
	    $this->Article->id = $id;
		$this->data = $this->Article->read();
	    if( !( isset($this->params['url']['confirm']) ) ){
        	$this->flash( 'Click below to confirm deletion of '.$this->data['Article']['title'].'.', '/articles/delete/'.$id.'/?confirm=1', 120 );		
    	} else {
    		if( $this->Article->del($id) ){
				$this->flash( $this->data['Article']['name'].' has been deleted.', '/articles/index' );
			} 
    	}
	}

	function edit( $id = null ){
		if( empty( $this->data ) ){
			$this->Article->id = $id;
			$this->data = $this->Article->read();
			$this->set('dateString', $this->data['Article']['date'] );
		} else {
			if( $this->Article->save( $this->data ) ){
				$this->flash('You have successfully edited this record.', '/articles/view/'.$this->data['Article']['id'] );
			}
		}

	}

	function view( $id = null){
		$this->Article->id = $id;
		$article = $this->Article->read();
		$this->pageTitle = $article['Article']['title'];
		$this->set('article', $article );
        $this->set('referer', $this->referer() );
	}


}

?>
