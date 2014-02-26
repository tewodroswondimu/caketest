<?php
/*
 * Created on: Feb 25, 2014
 *  File Name: PostsController.php
 *  Developer: Tewodros Wondimu Robi
 *  Copyright: 2014
 */

 class PostsController extends AppController {
 	public $helpers = array('Html', 'Form');

 	public function index() {
 		$this->set('posts', $this->Post->find('all'));
 	}

 	public function view($id = null) {
 		if (!$id) {
 			throw new NotFoundException(_('Invalid post'));
 		}

 		$post = $this->Post->findById($id);
 		if (!$post) {
 			throw new NotFoundException(_('Invalid post'));
 		}
 		$this->set('post', $post);
 	}
 }
?>
