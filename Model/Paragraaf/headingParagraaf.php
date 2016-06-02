<?php
/**
 * headingParagraaf.php
 *
 * The file contains the headingParagraaf class
 *
 * @package Model
 *
 */

/**
 * headingParagraaf - Model which defines the heading paragraaf
 *
 * This model defines the heading paragraaf. It contains all the information neede
 * to create a heading. This is a child class of paragraaf
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 3.0
 * @since 3.0
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 *
 * @abstract models for heading paragraaf
 *
 * @package Model
 *
 * @see Paragraaf
 */
class headingParagraaf extends paragraaf
{
	/**
	 * headingLevel
	 * 
	 * this is the heading level defined in the xml sheet
	 * 
	 * @var int
	 */
	private $headingLevel;

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
	 * @param $textpieces (Array) - The array of building Materials
	 * @param $headingLevel (int) - level of the heading
	 */
	public function __construct($textPieces, $headingLevel) {
		if (is_array($textPieces)){
			$this->textPieces = $textPieces;
		}
		else {
			$this->textPieces[] = $textPieces;
		}
		$this->headingLevel = $headingLevel;
	}	
	/**
	 * getHeadingLevel - getter for headingLevel
	 *
	 * Getter to get the headingLevel varriable
	 *
	 * @return $headingLevel (int):
	 */
	public function getHeadingLevel() {
		return $this->headingLevel;
	}
	
	/**
	 * setHeadingLevel - setter for headingLevel
	 *
	 * sette to set the headingLevel varriable
	 *
	 * @param $headingLevel (int)
	 */
	public function setHeadingLevel($headingLevel) {
		$this->headingLevel = $headingLevel;
	}	
	
}