<?php
namespace Photodatabase\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Photodatabase".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Photo
 *
 * @FLOW3\Entity
 */
class Photo {

	/**
 	 * Image
	 *
	 * @var \TYPO3\Media\Domain\Model\Image
	 * @ORM\OneToOne(cascade={"all"})
	 */
	protected $image;

	/**
	 * Photograph
	 *
	 * @var \Photodatabase\Domain\Model\Photograph
	 * @ORM\OneToOne
	 */
	protected $photograph;


	/**
	 * @param \TYPO3\Media\Domain\Model\Image $image
	 */
	public function setImage(\TYPO3\Media\Domain\Model\Image $image) {
		$this->image = $image;
	}

	/**
	 * @return \TYPO3\Media\Domain\Model\Image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param \Photodatabase\Domain\Model\Photograph $photograph
	 */
	public function setPhotograph(\Photodatabase\Domain\Model\Photograph $photograph) {
		$this->photograph = $photograph;
	}

	/**
	 * @return \Photodatabase\Domain\Model\Photograph
	 */
	public function getPhotograph() {
		return $this->photograph;
	}
}
?>