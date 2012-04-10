<?php
namespace Photodatabase\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "Photodatabase".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Standard controller for the Photodatabase package 
 *
 * @FLOW3\Scope("singleton")
 */
class StandardController extends \TYPO3\FLOW3\MVC\Controller\ActionController {

	/**
	 * @FLOW3\Inject
	 * @var \Photodatabase\Domain\Repository\PhotoRepository
	 */
	protected $photoRepository;

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('photos', $this->photoRepository->findAll());
	}

}

?>