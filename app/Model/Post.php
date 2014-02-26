<?php
/*
 * Created on Feb 25, 2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 class Post extends AppModel {
 	public $validate = array (
 		'title' => array(
 			'rule' => 'notEmpty'
 		),
 		'body' => array (
 			'rule' => 'notEmpty'
 		)
 	);
 }

?>
