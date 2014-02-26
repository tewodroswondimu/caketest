<?php
/*
 * Created on: Feb 25, 2014
 *  File Name: PostsController.php
 *  Developer: Tewodros Wondimu Robi
 *  Copyright: 2014
 */

 class PostsController extends AppController {
 	public $helpers = array('Html', 'Form', 'Session');

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

 	public function add() {
 		if ($this->request->is('post')) {
 			$this->Post->create();
 			if ($this->Post->save($this->request->data)) {
 				$this->Session->setFlash(_('Your post has been saved.'));
 				return $this->redirect(array('action' => 'index'));
 			}
 			$this->Session->setFlash(_('Unable to add your post.'));
 		}
 	}

 	public function edit($id = null) {
 		if (!$id) {
 			throw new NotFoundException(_('Invalid Post'));
 		}

 		$post = $this->Post->findById($id);
 		if (!$post) {
 			throw new NotFoundException(_('Invalid Post'));
 		}

 		if($this->request->is(array('post', 'put'))) {
 			$this->Post->id = $id;
 			if ($this->Post->save($this->request->data)) {
 				$this->Session->setFlash(_('Your post has been updated'));
 				return $this->redirect(array('action' => 'index'));
 			}
 			$this->Session->setFlash(_('Unable to update your post.'));
 		}

 		if (!$this->request->data) {
 			$this->request->data = $post;
 		}
 	}

 	public function delete($id) {
 		if ($this->request->is('get')) {
 			throw new MethodNotAllowedException();
 		}

 		if ($this->Post->delete($id)) {
 			$this->Session->setFlash(
            	_('The post has been deleted.')
        	);
 			return $this->redirect(array('action' => 'index'));
 		}
 		$this->Session->setFlash(_('Unable to delete post :('));
 	}
 }
?>
