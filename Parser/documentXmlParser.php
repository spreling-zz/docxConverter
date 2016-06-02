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
 * This class is used to exstrac and parser data from the document.xml sheet
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
 * @abstract This class is dedicated to parser document.xml
 * @package Parser
 *
 * @see Parser
 */
class documentXmlParser extends XmlParser {
	/**
	 * __construct - constructor function of the documentXmlParser class
	 *
	 * this methode is the constructor of the documentXmlParser class. In the
	 * function
	 * it opens the docx in a zip object and retrievs the document.xml which is put
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
		$this->xmlData['document'] = $this->getXmlData($zip, "word/document.xml");
		$this->parsArray = $this->parserXml($this->xmlData['document']);

	}

	/**
	 * parserDocumentXml - the function which parser the simplexmlObject into
	 * somthing useable
	 *
	 * methode to parse a SimpleXml Object gatherd from the docx file. It wil pars it
	 * into
	 * a neat array with you can get with the function @see getDocxArray() or it is
	 * use to create other
	 * standard output form it
	 *
	 * @name parserDocumentXml
	 * @access private
	 * @since 1.5
	 * @version 2.0
	 *
	 * @param $xmlData (SimpleXMLElement) - Object which is parsed into a array
	 * @return $dataArray (array) - array with a the usefull data from the
	 * SimpleXMLElement
	 *
	 * @todo at the moment it only gathers headings en text off course this needs to
	 * be much more
	 *
	 */
	protected function parserXml($xmlData) {
		$documentObjectArray = array();
		$previousTextPiece = new textpieces("", array("None"));
		$previousParagraaf = null;
		$iterator = $xmlData->body->p;
		//new SimpleXMLIterator($xmlData);
		for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
			switch ($iterator->current()->getName()) {
				case "p":
					foreach ($iterator->getChildren() as $Child) {
						$match = $Child->getName();
						switch ($match) {
							case "pPr":
								if (!empty($documentObjectArray)) {
									$object = end($documentObjectArray);
									$object->addTextPiece($previousTextPiece);
								}
								$tempobject = $this->createParagraaf($Child, $previousParagraaf);

								if (!is_null($tempobject)) {
									$documentObjectArray[] = $tempobject;
								}
								$previousParagraaf = end($documentObjectArray);
								$previousTextPiece = new textpieces("", array("None"));
								break;
							case "r":
								$temp = $this->createTextpieces($Child);
								if ($temp->equals($previousTextPiece)) {

									$previousTextPiece->addtext($temp->getText());
								} else {
									$object = end($documentObjectArray);

									$object->addTextPiece($previousTextPiece);
									$previousTextPiece = $temp;
								}
								break;
							case "hyperlink":
								$namespaces = $Child->getNamespaces(true);
								$id = $this->xml_attribute($Child->attributes($namespaces['r']), "id");

								foreach ($Child->r as $hyperChild) {
									$temp = $this->createTextpieces($hyperChild);

									if ($temp->equals($previousTextPiece)) {
										$previousTextPiece->addtext($temp->getText());
									} else {
										$object = end($documentObjectArray);
										$object->addTextPiece($previousTextPiece);
										$previousTextPiece = $temp;
										$previousTextPiece->setid($id);
									}
								}
								break;
						}
					}
					break;
					case "tbl":
						//TODO: create support for tables 
					break;
			}

		}
		//this is a hack to make sure everything is iterated
		$documentObjectArray[] = new paragraaf();
		return $documentObjectArray;
	}

	protected function createParagraaf($itObject, $previousParagraaf) {
		$match = preg_replace('/[^a-zA-Z]/i', "", $this->xml_attribute($itObject->pStyle, "val"));

		switch ($match) {
			//check if it is a heading and make een nieuwe heading object
			case "Heading":
				return new headingParagraaf( array(), preg_replace('/([A-Za-z])/', "", $this->xml_attribute($itObject->pStyle, "val")));

				break;
			//check if it is a list and make een nieuwe list object
			case "ListParagraph":
				if (isset($previousParagraaf) && $previousParagraaf->getClassName() == "listParagraaf") {
					$previousParagraaf->addNodes(new listNodes( array(), $this->xml_attribute($itObject->numPr->ilvl, "val"), $this->xml_attribute($itObject->numPr->numId, "val")));
					return null;
				} else {
					return new listParagraaf(new listNodes( array(), $this->xml_attribute($itObject->numPr->ilvl, "val"), $this->xml_attribute($itObject->numPr->numId, "val")));
				}
				break;
			//make a normale object if we don't know what it is
			default:
				return new normaalParagraaf( array());

				break;
		}
	}

	protected function createTextpieces($Child) {
		$textPieceArray = array();
		$textpieces = "";
		for ($Child->rewind(); $Child->valid(); $Child->next()) {
			$match = $Child->current()->getName();
			switch ($match) {
				case "rPr":
					foreach ($Child->getChildren() as $fontPart) {
						switch ($fontPart->getName()) {
							case "b":
								$textPieceArray["textFont"][] = "Bold";
								break;
							case "i":
								$textPieceArray["textFont"][] = "Italic";
								break;
							case "u":
								$textPieceArray["textFont"][] = "Underlined";
								break;
							case "rStyle":
								$textPieceArray["textType"] = $this->xml_attribute($fontPart, "val");
								
								// dit is een hack om te zorgen dat hij nederlandse footnotes meepakt TODO: dit werk alleen voor nederlands dus geen goede oplossing
								if ($textPieceArray["textType"] == "Voetnootmarkering")
									  $textPieceArray["textType"]= "FootnoteReference"; 
								break;
						}
					}
				case "t":
					$textPieceArray["text"] = strval($Child->current());
					break;
			}
		}
		if (!isset($textPieceArray['text'])) {
			$textPieceArray['text'] = "";
		}
		if (!isset($textPieceArray['textFont'])) {
			$textPieceArray['textFont'][] = "None";
		}
		if (!isset($textPieceArray['textType'])) {
			$textPieceArray['textType'] = "Normal";
		}

		switch($textPieceArray['textType']) {
			case "FootnoteReference":
				$textpieces = new footnoteTextpieces($this->xml_attribute($Child->footnoteReference, "id"));
				break;
			case "Hyperlink":
				$textpieces = new hyperlinkTextpieces($textPieceArray["text"], $textPieceArray["textFont"], "");
				break;
			default:
				$textpieces = new textpieces($textPieceArray["text"], $textPieceArray["textFont"]);
				break;
		}

		return $textpieces;
	}

}
