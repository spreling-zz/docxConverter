<?php
/**
 * footnoteInformation.php
 *
 * The file contains the footnoteInformation class
 *
 * @package Model
 *
 */

/**
 * footnoteInformation - Model which defines the footnote footnoteInformation
 *
 * This model defines the footnote footnoteInformation. It contains all the information need
 * gatherd form footnote.xml.
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.0
 * @since 3.5
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 *
 * @abstract models for footnote Information
 *
 * @package Model
 *
 */
class footnoteInformation
{
	/**
	 * footnoteId
	 * 
	 * this is the footnote id or level defined in the xml sheet
	 * 
	 * @var int
	 */
	private $footnoteId;
	/**
	 * textpieces
	 *
	 * this variable contains an array with textpieces which if you join them together
	 * the wil be the text of the paragraaf
	 *
	 * @var $textpieces (array)
	 */
	protected $textPieces;

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
	public function __construct($textPieces, $footnoteId) {
		if (is_array($textPieces)){
			$this->textPieces = $textPieces;
		}
		else {
			$this->textPieces[] = $textPieces;
		}
		$this->footnoteId = $footnoteId;
	}
	/**
	 * getfootnoteId - getter for headingLevel
	 *
	 * Getter to get the footnoteId varriable
	 *
	 * @return footnoteId (int):
	 */
	public function getfootnoteId() {
		return $this->footnoteId;
	}
	
	/**
	 * setfootnoteId - setter for headingLevel
	 *
	 * sette to set the footnoteId varriable
	 *
	 * @param footnoteId (int)
	 */
	public function setfootnoteId($footnoteId) {
		$this->footnoteId = $footnoteId;
	}	
	/**
	 * getTextpieces - getter for textpieces
	 * 
	 * Getter to get the textpieces varriable
	 * 
	 * @return $textpieces (array):
	 */
	public function gettextPieces() {
		return $this->textPieces;
	}

	/**
	 * setTextpieces - setter for textpieces
	 * 
	 * sette to set the textpieces varriable
	 * 
	 * @param $textPieces (array)
	 */
	public function settextPieces($textPieces) {
		$this->textPieces = $textPieces;
	}
	/**
	 * addTextPiece - add textpiece to array
	 * 
	 * adds a textpiece to the textpieces array
	 * 
	 * @param $textPiece (object)
	 */
	public function addTextPiece ($textPiece) {
		$this->textPieces[] = $textPiece;
	}
	
}