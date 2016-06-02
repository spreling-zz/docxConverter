<?php
/**
 * Paragraaf.php
 *
 * The file contains the Paragraaf class
 *
 * @package Model
 *
 */

/**
 * Paragraaf - parent to alle the paragraaf models
 *
 * This claas is the parent model of all the paragraaf models. In this models the common 
 * data about paragraaf is saved. also there is a methode to get the model name
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 3.0
 * @since 3.0
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 *
 * @abstract parent to all the paragraaf models
 *
 * @package Model
 *
 * @see listParagraaft
 * @see headingParagraaf
 * @see normaalParagraaf
 * @see whitespaceParagraaf
 */
class paragraaf
{
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
	 * getClassName - to get the class name
	 *
	 * With this function you can get the class name of the class
	 * of child class
	 *
	 * @name getClassName
	 * @access public
	 * @since 3.0
	 *
	 * @return (String) - string with classname
	 */
	public function getClassName(){
		return get_class($this);
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