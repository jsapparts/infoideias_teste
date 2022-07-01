<?php
spl_autoload_register(function ($class_name) {
	$file_to_include = str_replace('\\', '/', strtolower($class_name)) . '.php';

	include $file_to_include;
});
