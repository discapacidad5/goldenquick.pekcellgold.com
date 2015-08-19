<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* SETTINGS START */

$videoPluginType = '3';
$vidWidth = '640';
$vidHeight = '480';
$videoPluginType = '3';
$vidWidth = '220';
$vidHeight = '165';
$videoPluginType = '0';
$vidWidth = '640';
$vidHeight = '480';

$applicationid = '';
$appAuthSecret = '';
$maxP = '10';
$quality = '90';
$winWidth = '650';
$winHeight = '365';
$connectUrl = '';
$camWidth = '440';
$camHeight = '330';
$fps = '30';
$soundQuality = '7';
$zoomapplicationid = '';
$zoomappAuthSecret = '';
$email = 'email';


/* SETTINGS END */

/* videoPluginType Codes
0. Stratus
1. RED5/FMS (RTMP)
2. FMS (RTMFP)
3. CometChat Servers
4. AddLive
5. Zoom
6. WebRTC
*/
$webRTCServer = 'r.chatforyoursite.com';
if ($videoPluginType == '0') {
	$camWidth = '435';
	$camHeight = '327';
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////