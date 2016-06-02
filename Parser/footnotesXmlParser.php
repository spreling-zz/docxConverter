<?php
/**
 * footnotesXmlParser.php
 *
 * The file contains the footnotesXmlParser class
 *
 * @package Parser
 *
 */
 
 /**
 * footnotesXmlParser - Child class form xmlParser class
 *
 * This class is used to exstrat and parser data from the footnotes xml sheet whithin a docx zip file
 * this class is a child class of the xlmparser. The end result is useable code which go's into the 
 * BuildingMatrials variable of the creator classes
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.0
 * @since 3.5
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in development.
 * @abstract This class is dedicated to parser footnotes.xml
 * @package Parser
 *
 * @see Parser
 */
class footnotesXmlParser extends XmlParser
{
	/**
	 * __construct - constructor function of the footnotesXmlParser class
	 *
	 * this methode is the constructor of the footnotesXmlParser class. In the function
	 * it opens the docx in a zip object and retrievs the footnotes.xml which is put in
	 * a simplexmlobject
	 *
	 * @name __construct
	 * @access public
	 * @since 3.5
	 *
	 * @param $file (String) - a string with the path to the docx file
	 */
	public function __construct($zip, $file) 
	{
			//Puts the data through the Docx parse function to get a neat array of data
			$this->xmlData = $this->getXmlData($zip, "word/footnotes.xml");
			$this->parsArray = $this->parserXml($this->xmlData);

	}
	
	/**
	 * parserXml - the function which parser the simplexmlObject into somthing useable
	 *
	 * methode to parse a SimpleXml Object gatherd from the docx footnotes.xml file. It wil pars
	 * it into a neat array with you can get with the function @see getDocxArray()
	 * or it is use to create other standard output form it
	 *
	 * @name parserNumberingXml
	 * @access private
	 * @since 3.5
	 * @version 1.0
	 *
	 * @param $xmlData (SimpleXMLElement) - Object which is parsed into a array
	 * @return $dataArray (array) - array with a the usefull data from the SimpleXMLElement
	 *
	 */	
	protected function parserXml($xmlData) 
	{
		$dataArray="";
		$count2=0;
		foreach ($xmlData->footnote as $footnote) {
			$type = $this->xml_attribute($footnote, "type");
			
			if (!isset ($type)) {
				$previousText = null;
				$count=-1;
				foreach ($footnote->p->r as $textPiece)
				{
					$tempTextArray= "";
					if (strval($textPiece->t) != " " && strval($textPiece->t) != "") {
						$tempTextArray['textPiece'] = strval($textPiece->t);
						
						if (isset ($textPiece->rPr)){
							//add the right font
							foreach ($textPiece->rPr as $textFont){
								if (isset ($textFont->b))
									$tempTextArray['textFont'][] = "Bold";
								if (isset ($textFont->i))
									$tempTextArray['textFont'][] = "Italic";
								if (isset ($textFont->u))
									$tempTextArray['textFont'][] = "Underlined";
							}
							if (!isset ($tempTextArray['textFont'])){
								$tempTextArray['textFont'][] = "None";
							}
						}
						else {
							$tempTextArray['textFont'][] = "None";
						}
		
						if (isset ( $tempTextArray['textFont']) &&
								isset ($previousText['textFont']) &&
								count(array_diff(array_merge($previousText['textFont'], $tempTextArray['textFont']),
										array_intersect($previousText['textFont'], $tempTextArray['textFont']))) === 0) {
							//merges texts pieces
							if (isset ($textpiecesarray[$count])){
							$textpiecesarray[$count]->setText($textpiecesarray[$count]->getText().$tempTextArray['textPiece']);
							}
						}
						else {
							//add different textpieces to the new array
							$count++;
							$textpiecesarray[$count] = new textpieces($tempTextArray['textPiece'], $tempTextArray['textFont']);
		
						}
						
						$previousText = $tempTextArray;	

					}
				}
				$dataArray[$count2] = new footnoteInformation($textpiecesarray, $this->xml_attribute($footnote, "id"));
				$count2++;
			}

		}	
		return	$dataArray;
	}
}
