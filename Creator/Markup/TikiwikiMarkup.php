<?php
/**
 * Markup
 * 
 * de is een markup bestand. Deze word gebruikt om de juiste opmaak mee te geven aan
 * de creator zodat die daar mee overweg kan
 */
 
$markup = array(
	//heading styling
    'HeadingBegin' => "!", 
    'HeadingEnd' => "",
    'HeadingLvl' => "+", 
    'HeadingNoFont' => False,
    
	//paragraaf styling
    'ParagraafBegin' => "" , 
    'ParagraafEnd' => "", 
    'ParagraafNoFont' => False, 

    //Footnote Styling
    'footnoteBegin' => "{footnote()}",
    'footnoteEnd' => "{footnote}",
    'footnoteNoFont' => False,
    
	//hyperlink Styling
    'HyperlinkBegin' => "((%hyperlinkTarget%|",  
    'HyperlinkEnd' => "))", 
    'HyperlinkNoFont' => False,   
	
	//List Styling
    'OrderdListBegin' => "", 
    'OrderdListEnd' => "", 
    'OrderdNodeBegin' => "#",
    'OrderdNodeEnd' => "\r",      
    'OrderdListIndentChar' => "#",
    
    'UnorderdListBegin' => "", 
    'UnorderdListEnd' => "" ,  
    'UnorderdNodeBegin' => "*",
    'UnorderdNodeEnd' => "\r",
    'UnorderdListIndentChar' => "*",

    'ListNoFont' => False,    
	   
	
	//whitespace Styling
    'whitespace' => "\r\n", 
      
	//Font styling  
    'UnderlinedBegin' => "===", 
    'UnderlinedEnd' => "===", 
    'BoldBegin' => "__", 
    'BoldEnd' => "__", 
    'ItalicBegin' => "''", 
    'ItalicEnd' => "''"
    );
?>