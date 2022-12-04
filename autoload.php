<?php

/**
 * ESYE-PPM.
 * Alexander S. Lysyakov.
 */

require_once 'classes/config_parser.php';
require_once 'classes/autoload_real.php';
require_once 'classes/file_loader.php';

Autoloader::getLoader();

$fileLoader = new FileLoader();
$fileLoader->loadFiles();
