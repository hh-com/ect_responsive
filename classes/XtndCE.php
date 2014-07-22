<?php

/**
 * 
 * @package ect_responsive
 * Copyright (C) 2014 Harald Huber
 * http://www.harald-huber.com
 *
*/

class XtndCE extends Frontend
{
    public function addClass2CE(ContentModel $objModel, $strBuffer, $objElement)
    {
        if (TL_MODE != 'BE')
        {
                if(strlen ($strBuffer) != 0) 
                {
                        $cElement = "";
                        $addClass = " ";
                        # Line at the Bottom
                        if ($objModel->addBottonLine == 1)
                        {
                                $addClass .= "btmLine ";
                        }
                        # Add a Border
                        if ($objModel->addBorder == 1)
                        {
                                $addClass .= "bb ";
                        }
                        # Force a new Row
                        if ($objModel->forceNewRow == 1)
                        {
                                $addClass .= "new_row ";
                        }
                        if($objModel->selectContentWidth != "100" )
                        {
                                $cElement = " w".$objModel->selectContentWidth.$addClass."";
                        }
                        else
                        {
                                $cElement = $addClass; # wMod - Class for no - DIV Elements... .mod_article > div, .mod_article > .wMod
                        }



                        # Insert Elements
                        if ( $objModel->type == NULL || # e.g. Insert Element Form
                                 $objModel->type == "module" || 
                                 $objModel->type == "article" || 
                                 $objModel->type == "form" || 
                                 $objModel->type == "alias" || 
                                 $objModel->type == "teaser" || 
                                 $objModel->type == "comments" ||
                                 $objModel->type == "code" 
                                )
                        {		
                                $strBuffer = substr_replace($strBuffer, " wMod ".$cElement, (strpos ($strBuffer, "class=")+7), 0 );	
                        } 
                        else
                        {
                                $objElement->Template->class = $objElement->Template->class.$cElement;
                                $strBuffer = $objElement->Template->parse();
                        }
                }
        }
        if (TL_MODE == 'BE')
        {
                $backendIcon = "";			
                # Line at the Bottom
                if ($objModel->addBottonLine == 1)
                {
                        $backendIcon .= " <span class='fa fa-underline' title='".$GLOBALS['TL_LANG']['tl_content']['addBottonLine'][1]."'></span>";
                }
                # Add a Border
                if ($objModel->addBorder == 1)
                {
                        $backendIcon .= " <span class='fa fa-square-o' title='".$GLOBALS['TL_LANG']['tl_content']['addBorder'][1]."'></span>";
                }
                # Force a new Row
                if ($objModel->forceNewRow == 1)
                {
                        $backendIcon .= " <span class='fa fa-paragraph' title='".$GLOBALS['TL_LANG']['tl_content']['forceNewRow'][1]."'></span>";
                }
                if ($objModel->selectContentWidth != 0 && \Input::get('do') == 'article')
                {		
                        $GLOBALS['TL_MOOTOOLS'][] = "<style>.tl_content.indent .selectContentWidth{display: none;}</style> ";
                        $strBuffer =  "<div class='selectContentWidth' style=' border: 1px solid #ddd; width: 99,6%; margin-bottom: 0px;'>
                        <div style='background-color: #f8f8f8; float: left; border-right: 1px solid #ddd; width: ".$objModel->selectContentWidth."%;'>Element-Breite: <b>".$objModel->selectContentWidth."%</b></div>
                        <div class='' style='float: right; font-size: 105%; cursor:help;'>
                                ".$backendIcon."
                        </div>
                        <div class='clear'></div>
                        </div>
                        ".$strBuffer;
                }
        }
        return $strBuffer;
    }
}
?>