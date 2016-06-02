<?php
class referenceXmlParser extends XmlParser {
	public function __construct($zip, $file) {
		//Puts the data through the Docx parse function to get a neat array of data
		$this->xmlData = $this->getXmlData($zip, "word/_rels/document.xml.rels");
		$this->parsArray = $this->parserXml($this->xmlData);

	}

	protected function parserXml($xmlData) {
		//create a new array for the data
		$dataArray = array();
		
		for ($xmlData->rewind(); $xmlData->valid(); $xmlData->next()) {
			
			$referenceList[] = new referenceInformation($this->xml_attribute($xmlData->current(), "Id"), 
													 $this->xml_attribute($xmlData->current(), "Type"), 
													 $this->xml_attribute($xmlData->current(), "Target"));
					


		}
		return $referenceList;
	}

}
?>