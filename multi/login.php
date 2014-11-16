<?php
$defaultRedirectUrl = "http://www.google.de";

require_once("captiveportal-logging.php");

if (!$_REQUEST['log']) {
	logging("captive portal");
	include("captiveportal-nfc_login.html");
} else {
	require_once("auth.inc");
	require_once("functions.inc");
	require_once("captiveportal.inc");

	// portal login
	global $redirurl;
	$clientip = $_SERVER['REMOTE_ADDR'];
	$clientmac = arp_get_mac_by_ip($clientip);
	$tempurl = explode("redirurl=", $_GET['redirurl']);
	if ($tempurl[1] != "" && $tempurl[1] != "/index.php") {
		$redirurl = $tempurl[1];
	} else {
		$redirurl = $defaultRedirectUrl;
	}
	if (local_backed($_GET['usr'], $_GET['pwd'])) {
		logging("access granted");
		portal_allow($clientip, $clientmac, "nfc");
	} else {
		logging("access denied");
		include("captiveportal-login.html");
		echo("<center>Login rejected. access denied</center>");
	}
}
