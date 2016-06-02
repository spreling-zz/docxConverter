<?php
/**
 * numberingXmlParser.php
 *
 * The file contains the numberingXmlParser class
 *
 * @package Parser
 *
 */

/**
 * numberingXmlParser - Child class form xmlParser class
 *
 * This class is used to exstrac and parser data from the numberings xml sheet
 * whithin a docx zip file
 * this class is a child class of the xlmparser. The end result is useable code
 * which go into the
 * BuildingMatrials variable of the creator classes
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 2.0
 * @since 1.5
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in
 * development.
 * @abstract This class is dedicated to parser numbering.xml
 * @package Parser
 *
 * @see Parser
 */
class numberingXmlParser extends XmlParser {
	/**
	 * __construct - constructor function of the numberingXmlParser class
	 *
	 * this methode is the constructor of the numberingXmlParser class. In the
	 * function
	 * it opens the docx in a zip object and retrievs the numbering.xml which is put
	 * in
	 * a simplexmlobject
	 *
	 * @name __construct
	 * @access public
	 * @since 2.0
	 *
	 * @param $file (String) - a string with the path to the docx file
	 */
	public function __construct($zip, $file) {
		//Puts the data through the Docx parse function to get a neat array of data
		$this->xmlData = $this->getXmlData($zip, "word/numbering.xml");
		$this->parsArray = $this->parserXml($this->xmlData);

	}

	/**
	 * parserNumberingXml - the function which parser the simplexmlObject into
	 * somthing useable
	 *
	 * methode to parse a SimpleXml Object gatherd from the docx numbering.xml file.
	 * It wil pars
	 * it into a neat array with you can get with the function @see getDocxArray()
	 * or it is use to create other standard output form it
	 *
	 * @name parserNumberingXml
	 * @access private
	 * @since 1.5
	 * @version 2.0
	 *
	 * @param $xmlData (SimpleXMLElement) - Object which is parsed into a array
	 * @return $dataArray (array) - array with a the usefull data from the
	 * SimpleXMLElement
	 *
	 */
	protected function parserXml($xmlData) {
		//create a new array for the data
		$dataArray = array();

		//loops through the link lit
		$numberList = $xmlData->abstractNum;
		for ($numberList->rewind(); $numberList->valid(); $numberList->next()) {
			//check on the keys of the array what needs to be done

			foreach ($numberList->getChildren() as $lvls) {
				if ($lvls->getName() == "lvl") {

					$numtype = new numberingInformationNumTypes("", "", "", "");
					foreach ($lvls as $lvl) {

						switch ($lvl->getName()) {
							case "start":
								$numtype->setStart($this->xml_attribute($lvl, "val"));
								break;
							case "numFmt":
								$numtype->setName($this->xml_attribute($lvl, "val"));
								break;
							case "lvlText":
								$numtype->setSymbol($this->xml_attribute($lvl, "val"));
								break;
							case "pPr":
								$numtype->setIndent($this->xml_attribute($lvl->ind, "left"));
								break;
						}
					}

					$numtypes[] = $numtype;
				}
			}

			$numberInformation[] = new numberingInformation($this->xml_attribute($numberList->current(), "abstractNumId"), $numtypes);

		}

		$num = $xmlData->num;
		for ($num->rewind(); $num->valid(); $num->next()) {
			foreach ($numberInformation as $key=>$numberTypeList) {

				if ($numberTypeList->getId() == $this->xml_attribute($num->current()->abstractNumId, "val")) {
					$numberTypeList->setId($this->xml_attribute($num->current(), "numId"));
					$numberInformationArray[] = $numberTypeList;
					unset($numberInformation[$key]);
				}

			}

		}
		return $numberInformationArray;
	}

}
