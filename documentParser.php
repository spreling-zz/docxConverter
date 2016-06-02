<?php
/**
 * documentParser.php
 *
 * The file contains the documentParser class
 *
 * @package Default
 *
 */

/**
 * documentParser - the main class which you need to use in youre code
 *
 * This is a class with which you can parser a docx file. The essention for
 * writing this class
 * is to use it for the conversion of docx to dokuwiki. But i made sure it is
 * easy to convert it into different
 * formate like HTML and mediawiki.
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 2.0
 * @since 1.0
 * @copyright Spreling inc. 2013
 * @license Yet to detriment in the mean time it is not for common use and in
 * development.
 * @abstract This is the main class with which you can parser a docx file.
 *
 */
class documentParser {
	/**
	 * $file
	 *
	 * path to the docx file
	 *
	 * @var String
	 */
	private $file;

	/**
	 * $xmlObjects
	 *
	 * array with xml objects
	 *
	 * @var String
	 */
	private $xmlObjects;

	/**
	 * $classBaseUrl
	 * 
	 * path to class folder
	 * 
	 * @var String
	 */
	private $classBaseUrl;
	/**
	 * __construct - Constructor function of the documentParser class
	 *
	 * Constructor function for this class. Accepts a filename to a docx file as an
	 * argument,
	 * locates the document data within this docx file (wich is actually a zip file)
	 * and loads it
	 * into an XML parser
	 *
	 * @name __construct
	 * @access public
	 * @since 1.0
	 *
	 * @param $file (string) - the location of the original docx file on the disk
	 */
	public function __construct($file, $classBaseUrl) {
		$this->classBaseUrl = $classBaseUrl;
		$this->file = $file;
		// adding default model classes
		class_exists('paragraaf') ||
		require ('Model/Paragraaf/Paragraaf.php');
		class_exists('normaalParagraaf') ||
		require ('Model/Paragraaf/normaalParagraaf.php');
		class_exists('headingParagraaf') ||
		require ('Model/Paragraaf/headingParagraaf.php');
		class_exists('textpieces') ||
		require ('Model/Textpieces/textpieces.php');
		class_exists('HyperlinkTextpieces') ||
		require ('Model/Textpieces/hyperlinkTextpieces.php');

		// adding default parser classes
		class_exists('XmlParser') ||
		require ('Parser/XmlParser.php');
		class_exists('documentXmlParser') ||
		require ('Parser/documentXmlParser.php');

		// adding default creator classes
		class_exists('Creator') ||
		require ('Creator/Creator.php');

		$zip = new ZipArchive;
		$zipHandle = $zip->open($file);

		//check if file opens properly
		if ($zipHandle) {

			if ($zip->locateName("word/numbering.xml")) {
				//add classes used for list paragraph's

				// model
				class_exists('listParagraaf') ||
				require ('Model/Paragraaf/listParagraaf.php');
				class_exists('listNodes') ||
				require ('Model/Paragraaf/listNodes.php');
				//information
				class_exists('numberingInformation') ||
				require ('Model/Information/numberingInformation.php');
				class_exists('numberingInformationNumTypes') ||
				require ('Model/Information/numberingInformationNumTypes.php');
				//parser
				class_exists('numberingXmlParser') ||
				require ('Parser/numberingXmlParser.php');

				//parsing number.xml
				$this->xmlObjects['numberingXML'] = new numberingXmlParser($zip, $file);

			}
			if ($zip->locateName("word/footnotes.xml")) {
				//add classes used for footnotes's
				// model
				class_exists('footnoteTextpieces') ||
				require ('Model/Textpieces/footnoteTextpieces.php');
				//information
				class_exists('footnoteInformation') ||
				require ('Model/Information/footnoteInformation.php');
				//parser
				class_exists('footnotesXmlParser') ||
				require ('Parser/footnotesXmlParser.php');

				//parsing footnotes.xml
				$this->xmlObjects['footnotesXML'] = new footnotesXmlParser($zip, $file);
			}
			if ($zip->locateName("word/_rels/document.xml.rels")) {
				//add classes used for Hyperlinks's
				//information
				class_exists('referenceInformation') ||
				require ('Model/Information/referenceInformation.php');
				//parser
				class_exists('referenceXmlParser') ||
				require ('Parser/referenceXmlParser.php');

				//parsing footnotes.xml
				$this->xmlObjects['referenceXML'] = new referenceXmlParser($zip, $file);
			}

			$this->xmlObjects['documentXML'] = new documentXmlParser($zip, $file);

			$zip->close();
		} else
			return 2;

	}

	/**
	 * getUnparssedXmlArray - function to get the unparsers xml
	 *
	 * this methode give the unparsed simplexml array. This is only used voor debug
	 * uses
	 *
	 * @name getUnparssedXmlArray
	 * @access public
	 * @since 1.5
	 * @uses Only for debug use
	 *
	 * @return $array (SimpleXMLElement) - Object which is parsed into a array
	 */
	public function getUnparsedXmlArray() {
		foreach ($this->xmlObjects as $key=>$Object) {
			if ($key == "documentXML") {
				$array[$key] = $Object->getFullXml();
			} else {
				$array['subdocument'][$key] = $Object->getFullXml();
			}
			return $array;
		}
	}

	/**
	 * getObjectArray - function to get the parsed array of objects
	 *
	 * this methode gives a neat array of objects. This is only used voor debug
	 * uses
	 *
	 * @name getFullParsedArray
	 * @access public
	 * @uses Only for debug use
	 * @since 3.5
	 *
	 * @return $array (ArrayObject) - Parser array of the xml sheets
	 */
	public function getFullParsedArray() {

		foreach ($this->xmlObjects as $key=>$Object) {
			if ($key == "documentXML") {
				$array[$key] = $Object->getObjectArray();
			} else {
				$array['subdocument'][$key] = $Object->getObjectArray();
			}

		}
		return $array;
	}

	/**
	 * getDocxInCode - function to get docx in useable code
	 *
	 * this function creates code with the parsed data from the xml
	 * parsers and return it to you. You can specify which code
	 * with the $markup
	 *
	 * @name getDocxInHTML
	 * @access public
	 * @since 2.0
	 * @deprecated 3.5
	 *
	 * @param $markup (string) - specify which the markup code used
	 *
	 * @return $htmlCreator (string) - string the html code
	 */
	public function getDocxInCode($markupName) {
		$markupName = ucfirst(strtolower($markupName));
		try {
			if (!file_exists($this->classBaseUrl."/Creator/Markup/".$markupName."Markup.php"))
				throw new Exception($this->classBaseUrl."/Creator/Markup/".$markupName."Markup.php does not exist");
			else
				require_once ($this->classBaseUrl."/Creator/Markup/".$markupName."Markup.php");
				$Creator = new Creator($this->getFullParsedArray(), $markup);
				return $Creator->getCreation();
		} catch (exception $e) {
			echo "===== Error =====<br>";
			echo "Message : ".$e->getMessage()."</br>";
			echo "===============</br></br>";
			echo "Markup language probly doesn't exist make sure you have the right markup selected or else create it";
			die();
		}


	}

	/**
	 * getDocxInHTML - function to get html code
	 *
	 * this function creates html code with the parsed data from the xml
	 * parsers and return it to you
	 *
	 * @name getDocxInHTML
	 * @access public
	 * @since 2.0
	 * @deprecated 3.5
	 *
	 * @return $htmlCreator (string) - string the html code
	 */
	public function getDocxInHTML() {
		$htmlCreator = new HtmlCreator($this->xmlObjects);
		return $htmlCreator->getCreation();
	}

	/**
	 * getDocxInDokuWiki - function to get dokuwiki code
	 *
	 * this function creates dokuwiki code with the parsed data from the xml
	 * parsers and return it to you
	 *
	 * @name getDocxInDokuWiki
	 * @access public
	 * @since 2.0
	 * @deprecated 3.5
	 *
	 * @return $dokuWikiCreator (string) - string the dokuwiki code
	 */
	public function getDocxInDokuWiki() {
		$dokuWikiCreator = new DokuWikiCreator($this->xmlObjects);

		return $dokuWikiCreator->getCreation();
	}

	/**
	 * GetFileInfo - Function to get info about the docx file
	 *
	 * With the methode you can get a very detailt array with all the info a the
	 * file. which
	 * include the following
	 * - filename           - file type
	 * - dirname            - real path
	 * - extension          - last accessed
	 * - name               - last modified
	 * - file size          - file permission
	 *
	 * @name GetFileinfo
	 * @access public
	 * @since 2.0
	 *
	 * @return fileinfo (ArrayObject) - Array with the file info
	 */
	public function GetFileInfo() {

		$fileinfo = array();
		// get information from stat()
		$temp = stat($this->file);
		//create neat size
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
		$bytes = max($temp['size'], 0);
		$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
		$pow = min($pow, count($units) - 1);

		$fileinfo['filesize'] = round($bytes, 2)." ".$units[$pow];
		$fileinfo['lastAccessed'] = date("H:i:s - d-m-Y", $temp['atime']);
		$fileinfo['lastModified'] = date("H:i:s - d-m-Y", $temp['mtime']);
		//get function specific data and put it in array
		$fileinfo['filePerms'] = substr(decoct(fileperms($this->file)), 2);
		$fileinfo['filetype'] = filetype($this->file);
		$fileinfo['realpath'] = realpath($this->file);

		//get information form pathinfo
		$temp = pathinfo($this->file);
		// put information in array
		$fileinfo['dirname'] = $temp['dirname'];
		$fileinfo['filename'] = $temp['basename'];
		$fileinfo['extension'] = "*.".$temp['extension'];
		$fileinfo['name'] = $temp['filename'];

		return $fileinfo;
	}

}
