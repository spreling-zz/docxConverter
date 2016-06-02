<?php
/**
 * Markup
 * 
 * de is een markup bestand. Deze word gebruikt om de juiste opmaak mee te geven aan
 * de creator zodat die daar mee overweg kan
 */

$markup = array(
	//heading styling
    'HeadingBegin' => "=", 
    'HeadingEnd' => "=",
    'HeadingLvl' => "-", 
    'HeadingNoFont' => True,
    
	//paragraaf styling
    'ParagraafBegin' => "" , 
    'ParagraafEnd' => "", 
    'ParagraafNoFont' => False, 

    //Footnote Styling
    'footnoteBegin' => "((",
    'footnoteEnd' => "))",
    'footnoteNoFont' => False,
    
	//hyperlink Styling
    'HyperlinkBegin' => "[[%hyperlinkTarget%|",  
    'HyperlinkEnd' => "]]", 
    'HyperlinkNoFont' => True,   
	
	//List Styling
    'OrderdListBegin' => "", 
    'OrderdListEnd' => "", 
    'OrderdNodeBegin' => "  -",
    'OrderdNodeEnd' => "\r",      
    'OrderdListIndentChar' => "  ",

    'UnorderdListBegin' => "", 
    'UnorderdListEnd' => "" ,
    'UnorderdNodeBegin' => "  *",
    'UnorderdNodeEnd' => "\r",
    'UnorderdListIndentChar' => "  ",

    'ListNoFont' => False,    
	
	//whitespace Styling
    'whitespace' => "\r", 
      
	//Font styling  
    'UnderlinedBegin' => "__", 
    'UnderlinedEnd' => "__", 
    'BoldBegin' => "**", 
    'BoldEnd' => "**", 
    'ItalicBegin' => "//", 
    'ItalicEnd' => "//"

    );
?>