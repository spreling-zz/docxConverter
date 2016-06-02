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
class hyperlinkTextpieces extends textpieces {
	
	/**
	 * text
	 *
	 * string with the id of a footnote
	 *
	 * @var font (string)
	 */	
	private $id;
	
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
	public function __construct($text, $font, $id) {
		$this->text = $text;
		$this->font = $font;
		$this->id = $id;
	}

	/**
	 * getid - getter for id
	 * 
	 * Getter to get the id varriable
	 * 
	 * @return id (String):
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * setid - setter for id
	 * 
	 * setter to set the id varriable
	 * 
	 * @param id (String)
	 */
	public function setId($id) {
		$this->id = $id;
	}

}
