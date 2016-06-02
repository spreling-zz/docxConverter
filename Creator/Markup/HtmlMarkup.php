<?php
/**
 * Markup
 * 
 * de is een markup bestand. Deze word gebruikt om de juiste opmaak mee te geven aan
 * de creator zodat die daar mee overweg kan
 */
 
$markup = array(
	//heading styling
    'HeadingBegin' => "<h%headinglvl%>", 
    'HeadingEnd' => "</h%headinglvl%>", 
    'HeadingLvl' => "False",
    'HeadingNoFont' => False,

	//paragraaf styling  
    'ParagraafBegin' => "<p>" , 
    'ParagraafEnd' => "</p>", 
    'ParagraafNoFont' => False,

    //Footnote Styling   
    'footnoteBegin' => "<sup>",
    'footnoteEnd' => "</sup>",
    'footnoteNoFont' => False,

	//hyperlink Styling    
    'HyperlinkBegin' => "<a href=\"%hyperlinkTarget%\">",  
    'HyperlinkEnd' => "</a>", 
    'HyperlinkNoFont' => False,   

	//List Styling    
    'OrderdListBegin' => "<ol>", 
    'OrderdListEnd' => "</ol>", 
    'OrderdNodeBegin' => "<li>",
    'OrderdNodeEnd' => "</li>",      
    'OrderdListIndentChar' => "",

    'UnorderdListBegin' => "<ul>", 
    'UnorderdListEnd' => "</ul>",  
    'UnorderdNodeBegin' => "<li>",
    'UnorderdNodeEnd' => "</li>",
    'UnorderdListIndentChar' => "",

    'ListNoFont' => False,
    
	//whitespace Styling    
    'whitespace' => "<br />", 
 
 	//Font styling     
    'UnderlinedBegin' => "<u>", 
    'UnderlinedEnd' => "</u>", 
    'BoldBegin' => "<b>", 
    'BoldEnd' => "</b>", 
    'ItalicBegin' => "<i>", 
    'ItalicEnd' => "</i>" 

    );
?>