<?php
/**
 * listNodes.php
 *
 * The file contains the listNodes class
 *
 * @package Model
 *
 */

/**
 * listNodes - Model which defines the nodes for the list
 *
 * This model defines nodes. It contains all the information neede
 * to create a nodes. which binded to gether as groupnodes can be used
 * to created list's
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
class listNodes {
	/**
	 * textpieces
	 *
	 * this variable contains an array with textpieces which if you join them together
	 * the wil be the text of the paragraaf
	 *
	 * @var array
	 */
	private $textPieces;
	/**
	 * listType
	 *
	 * this is the id with which we can get information about the list type
	 * 
	 * @var int
	 */
	private $listType;
	
	/**
	 * indent
	 *
	 * this is the level on which the nodegroup exist
	 *
	 * @var int
	 */
	private $indent;


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
	 */
	public function __construct($textPieces, $indent, $listType) {
		if (is_array($textPieces)){
			$this->textPieces = $textPieces;
		}
		else {
			$this->textPieces[] = $textPieces;
		}
		$this->indent = $indent;
		$this->listType = $listType;
	}

	/**
	 * getTextpieces - getter for textpieces
	 * 
	 * Getter to get the textpieces varriable
	 * 
	 * @return $textpieces (array):
	 */
	public function getTextpieces() {
		return $this->textPieces;
	}
	
	/**
	 * setTextpieces - setter for textpieces
	 * 
	 * sette to set the textpieces varriable
	 * 
	 * @param $textpieces (array)
	 */
	public function setTextpieces($textpieces) {
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
	/**
	 * getListType - getter for listType
	 * 
	 * Getter to get the listType varriable
	 * 
	 * @return listType (int):
	 */
	public function getListType() {
		return $this->listType;
	}

	/**
	 * setListType - setter for listType
	 * 
	 * setter to set the listType varriable
	 * 
	 * @param listType (int)
	 */
	public function setListType($listType) {
		$this->listType = $listType;
	}

	/**
	 * getIndent - getter for indent
	 * 
	 * Getter to get the indent varriable
	 * 
	 * @return indent (int):
	 */
	public function getIndent() {
		return $this->indent;
	}

	/**
	 * setIndent - setter for indent
	 * 
	 * sette to set the indent varriable
	 * 
	 * @param indent (int)
	 */
	public function setIndent($indent) {
		$this->indent = $indent;
	}	

}
