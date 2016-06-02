<?php
/**
 * footnoteInformation.php
 *
 * The file contains the numberingInformation class
 *
 * @package Model
 *
 */

/**
 * numberingInformation - Model which defines the numbering Information
 *
 * This model defines the numbering Information. It contains all the information need
 * gatherd form numbering.xml.
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.0
 * @since 3.5
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 *
 * @abstract models for footnote paragraaf
 *
 * @package Model
 *
 */
class numberingInformation {
	/**
	 * $id
	 * 
	 * this is the numbering id or level defined in the xml sheet
	 * 
	 * @var int
	 */
	private $id;
	/**
	 * numtypes
	 * 
	 * this is a object in which all the information is stored
	 * 
	 * @var int
	 */	
	private $numTypes;
	/**
	 * __construct - function to construct the class
	 *
	 * Constructor function for this class. it is use to create a model object
	 * and fill it immediately
	 *
	 * @name __construct
	 * @access public
	 * @since 3.0
	 *
	 * @param $id (int) - numbering id
	 * @param $numTypes (object) - modul whith numbering information
	 */
	public function __construct($id, $numTypes) {
		$this->id = $id;
		$this->numTypes = $numTypes;
	}
	/**
	 * getId - getter for id
	 *
	 * Getter to get the numbering id varriable
	 *
	 * @return footnoteId (int):
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * setId - setter for id
	 *
	 * sette to set the  numbering id  varriable
	 *
	 * @param $id (int)
	 */

	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * getnumTypes - getter for numTypes
	 * 
	 * Getter to get the numTypes varriable
	 * 
	 * @return numTypes (object):
	 */
	public function getnumTypes() {
		return $this->numTypes;
	}
	
	/**
	 * setnumTypes - setter for numtypes object
	 * 
	 * setter to set the numtypes  object
	 * 
	 * @param $numTypes (object)
	 */
	public function setnumTypes($numTypes) {
		$this->numTypes = $numTypes;
	}

}
?>