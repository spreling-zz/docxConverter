<?php
/**
 * normaalParagraaf.php
 *
 * The file contains the normaalParagraaf class
 *
 * @package Model
 *
 */

/**
 * normaalParagraaf - Model which defines a normal paragraaf
 *
 * This model defines the normal paragraaf. It contains all the information neede
 * to create a normal paragraaf. This is a child class of paragraaf
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 3.0
 * @since 3.0
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 *
 * @abstract models for normal paragraaf
 *
 * @package Model
 *
 * @see Paragraaf
 */
class normaalParagraaf extends paragraaf
{
	/**
	 * __construct - function to construct the class
	 *
	 * Constructor function for this class. it is use to create a model object
	 * and fill it immediately
	 *
	 * @param $textPieces (Array) - The array of text pieces
	 */
	public function __construct($textPieces) {
		if (is_array($textPieces)){
			$this->textPieces = $textPieces;
		}
		else {
			$this->textPieces[] = $textPieces;
		}
	}
}
