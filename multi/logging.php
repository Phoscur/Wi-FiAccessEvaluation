<?php
$logFile = "log.txt";
$logIndex = rand(0, 65535);
function logging($logString, $timestamp = NULL) {
	global $logIndex, $logFile;
	if (!$timestamp) {
		$timestamp = time();
	}
	$time = date("d.m.Y - H:i:s", $timestamp);
	$file = fopen($logFile, "a");
	fwrite($file, $time.": ".$logString."(".$logIndex.")\n");
	fclose($file);
}
