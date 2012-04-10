<?php
namespace Photodatabase\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "Photodatabase".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Photo controller for the Photodatabase package 
 *
 * @FLOW3\Scope("singleton")
 */
class PhotoController extends \TYPO3\FLOW3\MVC\Controller\ActionController {

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('foos', array(
			'bar', 'baz'
		));
	}

	/**
	 * Show action
	 *
	 * @param \Photodatabase\Domain\Model\Photo $photo
	 * @return void
	 */
	public function showAction(\Photodatabase\Domain\Model\Photo $photo) {
		$this->view->assign('photo', $photo);
	}

}

?>