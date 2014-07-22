<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package ect_responsive
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Isotope',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'XtndCE'               => 'system/modules/ect_responsive/classes/XtndCE.php',
	'Isotope\Article_Grid' => 'system/modules/ect_responsive/classes/Article_Grid.php',
));
