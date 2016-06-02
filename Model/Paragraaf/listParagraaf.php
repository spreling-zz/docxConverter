<?php
/**
 * listParagraaft.php
 *
 * The file contains the listParagraaft class
 *
 * @package Model
 *
 */

/**
 * listParagraaft - Model which defines the list paragraaf
 *
 * This model defines the list paragraaf. It contains all the information neede
 * to create a list. This is a child class of paragraaf
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 3.0
 * @since 3.0
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 *
 * @abstract This model defines the list paragraaf
 *
 * @package Model
 *
 * @see Paragraaf
 */
class listParagraaf extends paragraaf 
{
	/**
	 * nodes
	 *
	 * this variable contains an array with nodes which if you join them together
	 * the wil be a list
	 * 
	 * @var array
	 */
	private $nodes = array();
	
	/**
	 * __construct - function to construct the class
	 *
	 * Constructor function for this class. it is use to create a model object
	 * and fill it immediately
	 *
	 * @name __construct
	 * @access public
	 * @since 3.
	 *
	 * @param $nodegroups (Array) - a array of nodegroups
	 */
	public function __construct($nodes) {
		if (is_array($nodes)){
			$this->nodes = $nodes;
		} else {
			$this->nodes[] = $nodes;
		}
	}
	/**
	 * getLastNodegroup - getter to get the last node group
	 * 
	 * getter to get the last entity vrom the node group array
	 * 
	 * @return $nodegroups (Object)
	 */
	public function getLastNode() {
		$LastNode = end($this->$nodes);
		
		return $LastNode;
	}
	/**
	 * addNodes - setter to set one node
	 * 
	 * setter to be able to add one node to the array
	 * 
	 * @param $node (Object)
	 */
	public function addNodes($node){
		$this->nodes[] = $node;
	}
	
	/**
	 * setnodes - getter for nodes
	 * 
	 * Getter to get the nodes varriable
	 * 
	 * @return nodes (array)
	 */
	public function getNodes() {
		return $this->nodes;
	}

	/**
	 * setnodes - setter for nodes of the last node
	 * 
	 * sette to set the nodes varriable of the last node
	 * 
	 * @param nodes (array)
	 */
	public function setNodes($nodes) {
		$this->nodes = $nodes;
	}
	/**
	 * getTextpieces - getter for textpieces of the last node
	 * 
	 * Getter to get the textpieces varriable of the last node
	 * 
	 * @return $textpieces (array):
	 */
	public function gettextPieces() {
		$node = end($this->nodes);
		return 	$node->getText();

	}

	/**
	 * setTextpieces - setter for textpieces
	 * 
	 * sette to set the textpieces varriable
	 * 
	 * @param $textPieces (array)
	 */
	public function settextPieces($textPieces) {
		$node = end($this->nodes);
		$node->setText($textPieces);

	}
	/**
	 * addTextPiece - add textpiece to array
	 * 
	 * adds a textpiece to the textpieces array
	 * 
	 * @param $textPiece (object)
	 */
	public function addTextPiece ($textPiece) {
		$node = end($this->nodes);
		$node->addTextPiece($textPiece);
	}
}
