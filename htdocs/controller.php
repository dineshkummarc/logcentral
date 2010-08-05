<?php

define('BASEDIR',dirname(__FILE__).'/../');
require_once(BASEDIR.'config.php');

// basic autoloader
function __autoload($class)
{
	$classDir = BASEDIR.'classes/';
	require_once $classDir . str_replace('_','/',$class).'.php';
}

$messages = new LogCentral_MessageHeap();
$messages->loadDirectory(new LogCentral_Directory(ERROR_DIR));

foreach($messages as $message)
{
	var_dump($message);
}

