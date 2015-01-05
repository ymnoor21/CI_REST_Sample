<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function dumpvar($var) {
	if(defined('ENVIRONMENT') && ENVIRONMENT == 'development') {
		$debug = debug_backtrace();
		echo "<pre>";
		echo "<div style='background-color: #4A0000; color: white; padding: 10px; font-size: 14px;'>";
		echo "Debugger enabled in File: " . $debug[0]['file'] . " and Line: " . $debug[0]['line'] . "<br/>";
		echo "</div>";
		echo "<div style='background-color: #800000; color: white; padding: 10px; font-size: 14px;'>";
		print_r ($var);
		echo "<div>";
		echo "</pre>";
	}
}
