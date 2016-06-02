<?php
/**
 * referenceInformation.php
 *
 * The file contains the referenceInformation class
 *
 * @package Model
 *
 */

/**
 * referenceInformation - Model which defines the referenceInformation
 *
 * This model defines the referenceInformation. It contains all the information need
 * gatherd form refesence.xml.
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.0
 * @since 3.5
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 *
 * @abstract models for reference Information
 * @package Model
 *
 */
class referenceInformation {
	/**
	 * Id
	 * 
	 * this is the Id value for the document.xml.rels
	 * 
	 * @var int
	 */		
	private $id;
	/**
	 * relType
	 * 
	 * this is the relType value for the document.xml.rels
	 * 
	 * @var int
	 */	
	private $relType;
	/**
	 * target
	 * 
	 * this is the target value for the document.xml.rels
	 * 
	 * @var int
	 */	
	private $target;
	
	/**
	 * __construct - function to construct the class
	 *
	 * Constructor function for this class. it is use to create a model object
	 * and fill it immediately
	 *
	 * @name __construct
	 * @access public
	 * @since 3.5
	 *
	 * @param id (int) - start value
	 * @param relType (Sting) - name value
	 * @param target (String) - Symbol value
	 */	
	public function __construct($id, $relType, $target) {
		$this->id = $id;
		$this->relType = $relType;
		$this->target = $target;
	}
	

	 
	/**
	 * getId - getter for id value
	 *
	 * Getter to get the id varriable which contains the id value
	 *
	 * @return id (int):
	 */
	public function getId() {
		return $this->id;
	}
	/**
	 * setId - setter for id value
	 *
	 * sette to set the id varriable which contains the id
	 *
	 * @param id (int)
	 */
	public function setId($id) {
		$this->id = $id;
	}
	/**
	 * getRelType - getter for relType value
	 *
	 * Getter to get the relType varriable which contains the relType value
	 *
	 * @return relType (string):
	 */
	public function getRelType() {
		return $this->relType;
	}
	/**
	 * setRelType - setter for relType value
	 *
	 * sette to set the relType varriable which contains the relType
	 *
	 * @param relType (string)
	 */
	public function setRelType($relType) {
		$this->relType = $relType;
	}
	/**
	 * getTarget - getter for target value
	 *
	 * Getter to get the target varriable which contains the target value
	 *
	 * @return target (string):
	 */
	public function getTarget() {
		return $this->target;
	}
	/**
	 * setTarget - setter for target value
	 *
	 * sette to set the target varriable which contains the target
	 *
	 * @param target (string)
	 */
	public function setTarget($target) {
		$this->target = $target;
	}

}
?>