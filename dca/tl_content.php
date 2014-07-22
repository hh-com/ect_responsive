<?php

/**
 * 
 * @package ect_responsive
 * Copyright (C) 2014 Harald Huber
 * http://www.harald-huber.com
 *
*/

/* Add Responsive Features */
if (Input::get('do') == 'article')
foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key=>$value)
{
	// don't add {contentWidth_legend},selectContentWidth,addBorder,addBottonLine,forceNewRow; to the __selector__, sliderStop, html...
	if ($key != '__selector__' && $key != 'sliderStop' && $key != 'html' && $key != 'ECTStripline')
	{
		$GLOBALS['TL_DCA']['tl_content']['palettes'][$key] = str_replace(',type', ',type;{contentWidth_legend},selectContentWidth,addBorder,addBottonLine,forceNewRow;', $GLOBALS['TL_DCA']['tl_content']['palettes'][$key]);
	}
}
			
$GLOBALS['TL_DCA']['tl_content']['fields']['selectContentWidth'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['selectContentWidth'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array(100,80,70,50,33,30,25,20), 
	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['selectContentWidthOption'],
	'eval'                    => array('mandatory' => true),
	'sql'                     => "smallint(5) unsigned NOT NULL default '100'"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['addBorder'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addBorder'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['addBottonLine'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addBottonLine'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['forceNewRow'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['forceNewRow'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

?>