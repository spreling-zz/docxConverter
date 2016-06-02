<?php
/**
 * textpieces.php
 *
 * The file contains the textpieces class
 *
 * @package Model
 *
 */

/**
 * textpieces - Model which defines the text pieces of a paragraaf
 *
 * This model defines the text pieces of a paragraaf. It contains all the information needed
 * to create a the text of a paragraaf. 
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 3.0
 * @since 3.0
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 *
 * @abstract models for text pieces
 *
 * @package Model
 *
 * @see Paragraaf
 */
class textpieces {
	
	/**
	 * text
	 *
	 * string with text
	 *
	 * @var text (string)
	 */
	protected $text;
	
	/**
	 * text
	 *
	 * string with the font of a text
	 *
	 * @var font (string)
	 */	
	protected $font;
	
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
	 * @param text (String) - string with text
	 * @param font (String) - string with the font of a text
	 */	
	public function __construct($text, $font) {
		$this->text = $text;
		$this->font = $font;
	}
	
	public function equals ($object){
		
		if (get_class($object) == get_called_class() &&
			$object->getFont() == $this->font){
				return true;
		}
		else {
			return false;
		}
	}

	/**
	 * getText - getter for text
	 * 
	 * Getter to get the text varriable
	 * 
	 * @return text (String):
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * setText - setter for text
	 * 
	 * setter to set the text varriable
	 * 
	 * @param text (String)
	 */
	public function setText($text) {
		$this->text = $text;
	}

	public function addText($textPiece) {
		$this->text = $this->text.$textPiece;
	}

	/**
	 * getFont - getter for font
	 * 
	 * Getter to get the font varriable
	 * 
	 * @return font (String):
	 */
	public function getFont() {
		return $this->font;
	}

	/**
	 * setFont - setter for font
	 * 
	 * setter to set the font varriable
	 * 
	 * @param font (String)
	 */
	public function setFont($font) {
		$this->font = $font;
	}
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

}
