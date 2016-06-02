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
 * @abstract models for footnote paragraaf
 *
 * @package Model
 *
 */
class numberingInformationNumTypes {

	/**
	 * Start
	 * 
	 * this is the start value for the numbering.xml
	 * 
	 * @var int
	 */	
	private $start;
	/**
	 * Name
	 * 
	 * this is the Name value for the numbering.xml
	 * 
	 * @var String
	 */	
	private $name;
	/**
	 * Symbol
	 * 
	 * this is the symbol value for the numbering.xml
	 * 
	 * @var char
	 */	
	private $symbol;
	/**
	 * indent
	 * 
	 * this is the indent value for the numbering.xml
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
	 * @since 3.5
	 *
	 * @param $start (int) - start value
	 * @param $name (Sting) - name value
	 * @param $symbol (Char) - Symbol value
	 * @param $indent (Int) - indent value
	 */	
	public function __construct($start, $name, $symbol, $indent) {
		$this->start = $start;
		$this->name = $name;
		$this->symbol = $symbol;
		$this->indent = $indent;

	}
	/**
	 * getStart - getter for  value
	 *
	 * Getter to get the start varriable which contains the start value
	 *
	 * @return start(int):
	 */

	public function getStart() {
		return $this->start;
	}
	/**
	 * setStart - setter for start value
	 *
	 * sette to set the start varriable which contains the start
	 *
	 * @param start (int)
	 */
	public function setStart($start) {
		$this->start = $start;
	}
	/**
	 * getName - getter for name value
	 *
	 * Getter to get the name varriable which contains the name value
	 *
	 * @return  name(string)
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 * setName - setter for name value
	 *
	 * sette to set the  varriable which contains the name value
	 *
	 * @param name(string)
	 */
	public function setName($name) {
		$this->name = $name;
	}
	/**
	 * getSymbol - getter for symbol value
	 *
	 * Getter to get the symbol varriable which contains the symbol value
	 *
	 * @return symbol (char):
	 */
	public function getSymbol() {
		return $this->symbol;
	}
	/**
	 * setSymbol - setter for symbol value
	 *
	 * sette to set the symbol varriable which contains the symbol value
	 *
	 * @param symbol (char)
	 */
	public function setSymbol($symbol) {
		$this->symbol = $symbol;
	}
	/**
	 * getIndent - getter for indent value
	 *
	 * Getter to get the indent varriable which contains the indent value
	 *
	 * @return  (int):
	 */
	public function getIndent() {
		return $this->indent;
	}
	/**
	 * setIndent - setter for indent value
	 *
	 * sette to set the  varriable which contains theindent value
	 *
	 * @param indent (int)
	 */
	public function setIndent($indent) {
		$this->indent = $indent;
	}
	
}
?>