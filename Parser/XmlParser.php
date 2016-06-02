<?php
/**
 * XmlParser.php
 *
 * The file contains the DokuWikiCreator class
 *
 * @package Parser
 *
 */

/**
 * XmlParser - parent class of the xmlparsers
 *
 * This class the parrent class for all the xmlsheets parsers. And is contains some 
 * Informatie shared by all the parsers. The outcome of all the parser are Arrays with
 * parsed information
 * 
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 2.0
 * @since 2.0
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 * @abstract This class is dedicated to by the parrent of the xml parsers.
 * @package Parser
 *
 * @see documentXmlParser
 * @see numberingXmlParser
 */
abstract class XmlParser
{
	/**
	 * $xmlData
	 *
	 * This is a array with unparser SimpleXmlObject array
	 *
	 * @var String
	 */
	protected $xmlData;
	
	/**
	 * $xmlData
	 *
	 * This is a array with parser array which can be used for creating code
	 *
	 * @var String
	 */
	protected $parsArray;

	/**
	 * __construct - constructor function of the child class (abstract)
	 *
	 * this methode is the abstarct mehtode of the constructor for the child class. In the function
	 * it opens the docx in a zip object and retrievs the xml which is put in
	 * a simplexmlobject
	 *
	 * @name __construct
	 * @access public
	 * @since 2.0
	 *
	 * @param $file (String) - a string with the path to the docx file
	 */
	abstract public function __construct($zip, $file);
	
	/**
	 * parserXml - the abtract function which parser the simplexmlObject into somthing useable
	 *
	 * abtract methode to parse a SimpleXml Object gatherd from the docx xml file. It wil pars
	 * it into a neat array with you can get with the function @see getDocxArray()
	 * or it is use to create other standard output form it
	 *
	 * @name parserNumberingXml
	 * @access private
	 * @since 1.5
	 * @version 2.0
	 *
	 * @param $xmlNumberingData (SimpleXMLElement) - Object which is parsed into a array
	 * @return $dataArray (array) - array with a the usefull data from the SimpleXMLElement
	 *
	 */	
	abstract protected function parserXml($xmlData);
	
	/**
	 * getFullXml - function to get all xml data
	 * 
	 * the function is a getter to get alle the unparser xml data which 
	 * is avaible at the moment
	 * 
	 * @name getFullXml
	 * @access public
	 * @since 1.0
	 * 
	 * @return Array
	 */	
	public function getFullXml(){
		return $this->xmlData;
	}
	
	/**
	 * getFullArray - function to get all parsed arrays
	 *
	 * the function is a getter to get alle the parsed arrays which
	 * is avaible at the moment
	 *
	 * @name getFullArray
	 * @access public
	 * @since 1.0
	 *
	 * @return Array
	 */
	public function getObjectArray(){
		return $this->parsArray;
	}

	/**
	 * getXmlData - function to retriev the data form the docx
	 *
	 * this function opens that get the xml sheet's data form the docx zip
	 * given. Loads the data in a simpleXml object and creates the rights
	 * namespaces
	 *
	 * @name getXmlData
	 * @access protected
	 * @since 2.0
	 *
	 * @param $zip - the zip file containing the files
	 * @param $dataFile - the path of the xml file that needs to be retrieved
	 * @return Array - whith the fixt id's
	 */
	protected function getXmlData($zip, $dataFile) {
		
		$raw = $zip->getFromIndex($zip->locateName($dataFile));

		
		// load the raw text into a simpleXML parser
		$xml = simplexml_load_string($raw, 'SimpleXMLIterator', 1<<19);

		//register the "w" namespaces so it can be used
		$namespaces = $xml->getNamespaces(true);
		if (isset($namespaces['w'])){
		$xml = $xml->children($namespaces['w']);			
		}

		return $xml;
	}
	/**
	 * xml_attribute - function to retrieve the attribut of a xml node
	 *
	 * A little function not created by me but by Xeoncross and posted on php.net
	 * what the function does is giving a function with which it is possible get a specific
	 * attribute out a simpelxml Object
	 *
	 * @name xml_attribute
	 * @access private
	 * @since 1.0
	 * @link http://www.php.net/manual/en/simplexmlelement.attributes.php#97266
	 *
	 *
	 * @param $object (SimpleXMLElement) - this is the element's node from which you want to extract the attribute
	 * @param $attribute (String) - String with the name of the attribute you hope to get
	 * @return (String) - The value of the attribute you hoped to reciev
	 *
	 */
	protected function xml_attribute($object, $attribute){
		if(isset($object[$attribute])){
			return (string) $object[$attribute];
		}
	}
	

}