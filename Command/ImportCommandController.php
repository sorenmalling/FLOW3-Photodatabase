<?php
namespace Photodatabase\Command;

/*                                                                        *
 * This script belongs to the FLOW3 package "Photodatabase".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Import command controller for the Photodatabase package
 *
 * @FLOW3\Scope("singleton")
 */
class ImportCommandController extends \TYPO3\FLOW3\MVC\Controller\CommandController {

	/**
	 * @FLOW3\Inject
	 * @var \Photodatabase\Domain\Repository\PhotoRepository
	 */
	protected $photoRepository;

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\FLOW3\Resource\ResourceManager
	 */
	protected $resourceManager;

	/**
	 * Import a whole folder with photos
	 *
	 * @param string $folder Folder to import medias from
	 * @param string $extension Extension of media to import. Only used with --folder. Default = jpg
	 * @param boolean $removeOriginal Remove the original file (useful if running a cronjob importing from a specific folder)
	 */
	public function folderCommand($folder, $extension = 'jpg', $removeOriginal = FALSE) {
		$this->outputLine('Reading through ' . $folder);
		$filesInFolder = \TYPO3\FLOW3\Utility\Files::readDirectoryRecursively($folder, $extension);
		$this->outputLine('Found a total of ' . count($filesInFolder) . ' medias');
		foreach($filesInFolder as $file) {
			$photo = new \Photodatabase\Domain\Model\Photo();
			$image = $this->resourceManager->importResource($file);
			$photo->setImage(new \TYPO3\Media\Domain\Model\Image($image));
			$this->photoRepository->add($photo);
			$this->outputLine('Import of %s is done', array($file));

			if($removeOriginal === TRUE) {
				$this->outputLine('Removing the original media file ' . $file);
				#$this->resourceManager->deleteResource($newResource);
			}

		}
		$this->outputLine();
	}
}

?>