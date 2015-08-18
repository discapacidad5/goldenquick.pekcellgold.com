<?php

/*

CometChat
Copyright (c) 2014 Inscripts

CometChat ('the Software') is a copyrighted work of authorship. Inscripts 
retains ownership of the Software and any copies of it, regardless of the 
form in which the copies may exist. This license is not a sale of the 
original Software or any copies.

By installing and using CometChat on your server, you agree to the following
terms and conditions. Such agreement is either on your own behalf or on behalf
of any corporate entity which employs you or which you represent
('Corporate Licensee'). In this Agreement, 'you' includes both the reader
and any Corporate Licensee and 'Inscripts' means Inscripts (I) Private Limited:

CometChat license grants you the right to run one instance (a single installation)
of the Software on one web server and one web site for each license purchased.
Each license may power one instance of the Software on one domain. For each 
installed instance of the Software, a separate license is required. 
The Software is licensed only to you. You may not rent, lease, sublicense, sell,
assign, pledge, transfer or otherwise dispose of the Software in any form, on
a temporary or permanent basis, without the prior written consent of Inscripts. 

The license is effective until terminated. You may terminate it
at any time by uninstalling the Software and destroying any copies in any form. 

The Software source code may be altered (at your risk) 

All Software copyright notices within the scripts must remain unchanged (and visible). 

The Software may not be used for anything that would represent or is associated
with an Intellectual Property violation, including, but not limited to, 
engaging in any activity that infringes or misappropriates the intellectual property
rights of others, including copyrights, trademarks, service marks, trade secrets, 
software piracy, and patents held by individuals, corporations, or other entities. 

If any of the terms of this Agreement are violated, Inscripts reserves the right 
to revoke the Software license at any time. 

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

include_once(dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."plugins.php");
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."config.php");

include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR."en.php");
if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php")) {
	include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php");
}
$webrtcTheme = $theme;
if (!file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."themes".DIRECTORY_SEPARATOR.$theme.DIRECTORY_SEPARATOR."avchat".$rtl.".css")) {
	$theme = "standard";
}

if ($p_<4) exit;

$basedata = $to = $grp  = $action = $chatroommode = $embed = null;

if(!empty($_REQUEST['basedata'])) {
    $basedata = $_REQUEST['basedata'];
}
if(!empty($_REQUEST['to'])){
	$to = $_REQUEST['to'];
}

if(!empty($_REQUEST['grp'])){
	$grp = $_REQUEST['grp'];
}
if(!empty($_REQUEST['action'])){
	$action = $_REQUEST['action'];
}
if(!empty($_REQUEST['chatroommode'])){
	$chatroommode = $_REQUEST['chatroommode'];
}
if(!empty($_REQUEST['embed'])){
	$embed = $_REQUEST['embed'];
}

configCheck();

if($action == 'endcall') {
	if (!empty($chatroommode)) {
		sendChatroomMessage($to, 'CC^CONTROL_AVCHAT_END_CHATROOM_CALL',0); 
	} else {
		sendMessage($to,'CC^CONTROL_PLUGIN_AVCHAT_ENDCALL_'.$grp,2);
		incrementCallback();
		sendMessage($to, 'CC^CONTROL_PLUGIN_AVCHAT_ENDCALL_'.$grp,1);
	}
}
if($action == 'rejectcall') {
	if (!empty($chatroommode)) {
		sendChatroomMessage($to, 'CC^CONTROL_AVCHAT_REJECT_CHATROOM_CALL',0); 
	} else {
		sendMessage($to, 'CC^CONTROL_PLUGIN_AVCHAT_REJECTCALL_'.$grp,1);
	}
}

if($action == 'noanswer') {
	if (!empty($chatroommode)) {
		sendChatroomMessage($to, 'CC^CONTROL_AVCHAT_NO_ANSWER_CHATROOM',0);
	} else {
		sendMessage($to, 'CC^CONTROL_PLUGIN_AVCHAT_NOANSWER_'.$grp,1);
	}
}

if($action == 'canceloutgoingcall') {
	if (!empty($chatroommode)) {
		sendChatroomMessage($to, 'CC^CONTROL_AVCHAT_CANCEL_CALL',0);
	} else {
		sendMessage($to, 'CC^CONTROL_PLUGIN_AVCHAT_CANCELCALL_'.$grp,2);
		incrementCallback();
		sendMessage($to, 'CC^CONTROL_PLUGIN_AVCHAT_CANCELCALL_'.$grp,1);
	}
}

if($action == 'busycall') {
	if (!empty($chatroommode)) {
		sendChatroomMessage($to, 'CC^CONTROL_AVCHAT_BUSY_CALL',0);
	} else {
		sendMessage($to, 'CC^CONTROL_PLUGIN_AVCHAT_BUSYCALL_'.$grp,1);
	}
}

if($videoPluginType <> '5'){
	if($videoPluginType == '3') {
		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'sdk'.DIRECTORY_SEPARATOR.'API_Config.php');
		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'sdk'.DIRECTORY_SEPARATOR.'OpenTokSDK.php');		
		$apiKey = '348501';
		$apiSecret = '1022308838584cb6eba1fd9548a64dc1f8439774';
		$apiServer = 'https://api.opentok.com';
		$apiObj = new OpenTokSDK($apiKey, $apiSecret);
	}
	if ($action == 'request') {
		
		$avchat_token = '';
		if(empty($grp)){
			$grp = $userid<$to? md5($userid).md5($to) : md5($to).md5($userid);
			$grp = md5($_SERVER['HTTP_HOST'].$grp);
			if($videoPluginType == '3' ){
				$location = time();
				if(!empty($_SERVER['REMOTE_ADDR'])){
					$location = $_SERVER['REMOTE_ADDR'];
				}
				$session = $apiObj->create_session($location);
				$grp = $session->getSessionId();
				$avchat_token = $apiObj->generate_token($grp);
			}
		}
		if(isset($chatroommode)){
			sendChatroomMessage($to, $avchat_language[19]." <a token ='".$avchat_token."' href='javascript:void(0);' onclick=\"javascript:jqcc.ccavchat.join('".$to."');\">".$avchat_language[20]."</a> ",0);
		}else{
			if($videoPluginType == '6'){
				sendMessage($to,$avchat_language[2]." <a class='avchat_link_".$grp."' token ='".$avchat_token."' href='javascript:void(0);' class='avchat_link_".$grp."' onclick=\"javascript:jqcc.ccavchat.accept('".$userid."','".$grp."');\">".$avchat_language[3]."</a> ".$avchat_language[45]."<a href='javascript:void(0);' class='avchat_link_".$grp."' onclick=\"javascript:jqcc.ccavchat.reject_call('".$userid."','".$grp."');\">".$avchat_language[43].".</a>".$avchat_language[46],1);
			} else {
				sendMessage($to,$avchat_language[2]." <a class='avchat_link_".$grp."' token ='".$avchat_token."' href='javascript:void(0);' class='avchat_link_".$grp."' onclick=\"javascript:jqcc.ccavchat.accept('".$userid."','".$grp."');\">".$avchat_language[3]."</a> ".$avchat_language[46],1);
			}
			incrementCallback();
			$_REQUEST['callback'];
			if($videoPluginType == '6') {
				sendMessage($to,$avchat_language[5].$avchat_language[44]."<a href='javascript:void(0);' class='avchat_link_".$grp."' onclick=\"javascript:jqcc.ccavchat.cancel_call('".$to."','".$grp."');\">".$avchat_language[43].".</a>",2);
			} else {
				sendMessage($to,$avchat_language[5],2);
			}
		}
		if (!empty($_REQUEST['callback'])) {
			header('content-type: application/json; charset=utf-8');
			echo $_REQUEST['callback'].'('.$grp.')';
		}
		exit;
	}
	if ($action == 'accept') {
		$avchat_token = '';
		if ($videoPluginType == '3') {
			$avchat_token = $apiObj->generate_token($grp);	
		}
		sendMessage($to,$avchat_language[6]." <a token ='".$avchat_token."' href='javascript:void(0);' class='avchat_link_".$grp."' onclick=\"javascript:jqcc.ccavchat.accept_fid('".$userid."','".$grp."');\">".$avchat_language[7]."</a>",1);
		if (!empty($_REQUEST['callback'])) {
			header('content-type: application/json; charset=utf-8');
			echo $_REQUEST['callback'].'()';
		}
		exit;
	}
	if ($action == 'call') {
		$baseUrl = BASE_URL;
		$embed = '';
		$embedcss = '';
		$resize = 'window.resizeTo(';
		$invitefunction = 'window.open';
		if (!empty($embed) && $embed == 'web') {
			$embed = 'web';
			$resize = "parent.resizeCCPopup('audiovideochat',";
			$embedcss = 'embed';
			$invitefunction = 'parent.loadCCPopup';
		}
		if (!empty($embed) && $embed == 'desktop') {
			$embed = 'desktop';
			$resize = "parentSandboxBridge.resizeCCPopupWindow('audiovideochat',";
			$embedcss = 'embed';
			$invitefunction = 'parentSandboxBridge.loadCCPopupWindow';
		}
		if($videoPluginType < '3') {
			if($videoPluginType=='0') {
				$connectUrl = 'rtmfp://stratus.rtmfp.net';
				$developerKey = 'b72b713a18065673cdc1064e-0a89db06e6f8';
				$flashvariables = '{grp:"'.$grp.'",quality:"'.$quality.'",bandwidth:"0",connectUrl:"'.$connectUrl.'",DeveloperKey:"'.$developerKey.'",maxP:'.$maxP.'}';
				$file = '';
			} elseif ($videoPluginType=='1' || $videoPluginType=='2') {
				ini_set('display_errors', 0);
				$mode = 3;
				$flashvariables = '{grp:"'.$grp.'",connectUrl: "'.$connectUrl.'",name:"",quality: "'. $quality. '",bandwidth: "'.$bandwidth.'",fps:"'.$fps.'",mode: "'.$mode.'",maxP: "'.$maxP.'",camWidth: "'.$camWidth.'",camHeight: "'.$camHeight.'",soundQuality: "'.$soundQuality.'"}';
				$file = '_fms';
			}
			echo <<<EOD
			<!DOCTYPE html>
			<html>
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
				<title>{$avchat_language[8]}</title>
				<link href="../../css.php?type=plugin&name=avchat&subtype=fmsred5" type="text/css" rel="stylesheet" >
					<script type="text/javascript" src="../../js.php?type=plugin&name=avchat&subtype=fmsred5"></script>
					<script type="text/javascript">
						var swfVersionStr = "10.1.0";
						var xiSwfUrlStr = "playerProductInstall.swf";
						var flashvars = {$flashvariables};
						var params = {};
						params.quality = "high";
						params.bgcolor = "#000000";
						params.allowscriptaccess = "sameDomain";
						params.allowfullscreen = "true";
						var attributes = {};
						attributes.id = "audiovideochat";
						attributes.name = "audiovideochat";
						attributes.align = "middle";
						swfobject.embedSWF(
							"audiovideochat{$file}.swf?v2.2", "flashContent", 
							"100%", "100%", 
							swfVersionStr, xiSwfUrlStr, 
							flashvars, params, attributes);
						swfobject.createCSS("#flashContent", "display:block;text-align:left;");
						function getFocus() {
							setTimeout('self.focus();',10000);
						}					
						window.onbeforeunload = function() {
							var AddCallbackExample = document.getElementById("audiovideochat_fms");
							AddCallbackExample.getUnsavedDataWarning();
						}
					</script>
				</head>
				<body onblur="getFocus()">  
					<div id="flashContent">
						<p>
							To view this page ensure that Adobe Flash Player version 
							10.1.0 or greater is installed. 
						</p>
						<script type="text/javascript"> 
							var pageHost = ((document.location.protocol == "https:") ? "https://" :	"http://"); 
							document.write("<a href='http://www.adobe.com/go/getflashplayer'><img src='" + pageHost + "www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' /></a>" ); 
						</script> 
					</div>	
				</body>
			</html>
EOD;
		}elseif($videoPluginType == '3'){
			if (!empty($chatroommode)) {
				$sql = ("select vidsession from cometchat_chatrooms where id = '".mysqli_real_escape_string($GLOBALS['dbh'],$grp)."'");
				$query = mysqli_query($GLOBALS['dbh'],$sql);
				$chatroom = mysqli_fetch_assoc($query);
				if (empty($chatroom['vidsession'])) {
					$session = $apiObj->create_session(time());
					$newsessionid = $session->getSessionId();
					$sql = ("update cometchat_chatrooms set  vidsession = '".mysqli_real_escape_string($GLOBALS['dbh'],$newsessionid)."' where id = '".mysqli_real_escape_string($GLOBALS['dbh'],$grp)."'");
					$query = mysqli_query($GLOBALS['dbh'],$sql);
					$grp = $newsessionid;
				} else {
					$grp = $chatroom['vidsession'];
				}
			}
			$avchat_token = $apiObj->generate_token($grp);	
			$name = "";
			$sql = getUserDetails($userid);
			if ($guestsMode && $userid >= 10000000) {
				$sql = getGuestDetails($userid);
			}
			$result = mysqli_query($GLOBALS['dbh'],$sql);
			if($row = mysqli_fetch_assoc($result)){
				if (function_exists('processName')){
					$row['username'] = processName($row['username']);
				}
				$name = $row['username'];
			}
			$name = urlencode($name);
			echo <<<EOD
			<!DOCTYPE html>
			<html>
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
				<title>{$avchat_language[8]}</title> 
				<link href="../../css.php?type=plugin&name=avchat&subtype=opentok" type="text/css" rel="stylesheet" >
				<script src="//static.opentok.com/v0.91/js/TB.min.js" type="text/javascript" charset="utf-8"></script>
				<script src="../../js.php?type=plugin&name=avchat&subtype=opentok" type="text/javascript"></script>
				<script type="text/javascript" charset="utf-8">
                    var basedata = '{$basedata}';
					var apiKey = {$apiKey};
					var sessionId = '{$grp}';
					var token = '{$avchat_token}';
					var resize = "{$resize}";
					var invitefunction = "{$invitefunction}";
					var name = "{$name}";
					if (TB.checkSystemRequirements() != TB.HAS_REQUIREMENTS) {
						alert('Sorry, but your computer configuration does not meet minimum requirements for video chat.');
					} else {
						session = TB.initSession(sessionId);
						session.addEventListener('sessionConnected', sessionConnectedHandler);
						session.addEventListener('sessionDisconnected', sessionDisconnectedHandler);
						session.addEventListener('connectionCreated', connectionCreatedHandler);
						session.addEventListener('connectionDestroyed', connectionDestroyedHandler);
						session.addEventListener('streamCreated', streamCreatedHandler);
						session.addEventListener('streamDestroyed', streamDestroyedHandler);
					}
				</script>
				</head>
				<body>
					<div id="loading"><img src="res/init.png"></div>
					<div id="endcall"><img src="res/ended.png"></div>
					<div id="canvas"></div>
					<div id="navigation">
						<div id="navigation_elements">
							<a href="#" onclick="javascript:disconnect();" id="disconnectLink"><img src="res/hangup.png"></a>
							<a href="#" onclick="javascript:inviteUser()" id="inviteLink"><img src="res/invite.png"></a>
							<a href="#" onclick="javascript:publish()" id="publishLink"><img src="res/turnonvideo.png"></a>
							<a href="#" onclick="javascript:unpublish()" id="unpublishLink"><img src="res/turnoffvideo.png"></a>
							<div style="clear:both"></div>
						</div>
						<div style="clear:both"></div>
					</div>
				</body>
				<script>
					eval(resize +'300,330);');
					connect();
					window.onload = function() { resizeWindow(); }
					window.onresize = function() { resizeWindow(); }
				</script>
			</html>
EOD;
		}elseif($videoPluginType == '4'){
		echo <<<EOD
		<!DOCTYPE HTML>
		<html>
			<head>
			<title>{$avchat_language[8]}</title>
			<link media="all" rel="stylesheet" type="text/css" href="../../css.php?type=plugin&name=avchat&subtype=addlive"/>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
			<script type="text/javascript" src="http://api.addlive.com/stable/addlive-sdk.min.js"></script>
			<script src="../../js.php?type=plugin&name=avchat&subtype=addlive" type="text/javascript"></script>
			<script type="text/javascript">
				var basedata = '{$basedata}';
				var resize = "{$resize}";
				var grp = "{$grp}";
				var invitefunction = "{$invitefunction}";
				var avchat_language_16 = "{$avchat_language[16]}";
				var user = $('#VDlist li').length;
				var newUser = 0;
				var heightFinal = 0;
				$(document).ready(function(){
					eval(resize + '327,' + vidHeight+');');
				});
				</script>
				</head>
				<body>
					<div id="pluginContainer"></div>
					<div class="content-wrapper">
						<ul id="VDlist" class="feeds-wrapper"></ul>
						<div class="clearer"></div>
						<div id="settingbar">
							<a id="installBtn" class="btn btn-primary" href="#">Install plug-in</a>
							<a href="#" style="float:right" onclick="javascript:inviteUser()" id="inviteLink"><img src="res/invite.png"></a>		
							<a id="settingBtn" style="float:right" onclick="javascript:settings()" href="#"><img src="res/settings.png"></a>
							<input id="roomId" type="text" style="visibility:hidden;width:50%" value="{$grp}"/>
							<a id="connectBtn" style="visibility:hidden">Connect</a>
							<a id="disconnectBtn"><img src="res/hangup.png"></a>
						</div>
						<div id="settings" style="display:none">
							<div id="settingtitle" class = "container_title" style="height:13px">
								<span style="float:left; height:13px;">{$avchat_language[21]}</span>
								<div class="cometchat_closebox" onclick="javascript:closeSetting()"></div>
							</div>
							<div id="settingbody" class = "container_body" style="height:50%;overflow: hidden;">
								<div class="clearer"></div>
								<!--Webcam select -->
								<div>
									<span style="float: left; width: 28%; padding-top: 5px;" >Webcam:</span>
									<select id="camSelect"></select>
								</div>

								<!--Microphone select -->
								<div>
									<span style="float: left; width: 28%; padding-top: 5px;" >Microphone:</span>
									<select id="micSelect"></select>
								</div>
								
								<!--Speakers select -->
								<div>
									<span style="float: left; width: 28%; padding-top: 5px;" >Speakers:</span>
									<select id="spkSelect"></select>
								</div>

								<!--Video publish -->
								<div class="checkbox">
									<input id="publishVideoChckbx" type="checkbox" checked/> Publish video stream
								</div>
								
								<!--Audio publish -->
								<div class="checkbox">
									<input id="publishAudioChckbx" type="checkbox" checked/> Publish audio stream
								</div>

								<!--Volume  configuration -->
								<div class="ctrl-wrapper">
								  <div for="volumeCtrlSlider">Volume Control:</div>
								  <div class="ctrl" id="volumeCtrlSlider"></div>
								  <div class="clearer"></div>
								</div>

								<!-- Playing of the test sound -->
								<div class="ctrl-wrapper">
								  <a id="playTestSoundBtn" href="javascript://nop" class="btn invitebutton disabled" style="padding: 3px 10px;">{$avchat_language[23]}</a>
								</div>

								<!-- Microphone gain configuration -->
								<div class="ctrl-wrapper">
								  <div for="micGainCtrlSlider">Microphone gain:</div>
								  <div class="ctrl" id="micGainCtrlSlider"></div>
								  <div class="clearer"></div>
								</div>

								<a id="okBtn" class="btn invitebutton" onclick="javascript:closeSetting()" style="padding: 3px 10px;">{$avchat_language[22]}</a>
							</div>
						</div>
					</div>
				</body>
				<script>
					eval(resize + vidWidth+ ',365);');
					window.onload = function() { resizeWindow(); }
					window.onresize = function() { resizeWindow(); }
				</script>
		</html>
EOD;
		}elseif($videoPluginType==6){
			$cssurl='//'.$_SERVER['SERVER_NAME'].BASE_URL.'css.php';
			$endcall = '<a href="#" onclick="endCall(1)" id="endcall" class="cometchat_statusbutton" style="display: block;text-decoration: none;">endcall</a>';
			if(isset($chatroommode)){
				$endcall = '<a href="#" onclick="closeWin()" id="endcall" class="cometchat_statusbutton" style="display: block;text-decoration: none;">endcall</a>';
			}
			echo <<<EOD
					<!DOCTYPE html>
					<html>
					<head>
						<title>{$avchat_language[8]}</title>
						<link href="../../css.php?type=plugin&name=avchat&subtype=webrtc" type="text/css" rel="stylesheet" >
						<link href="../../css.php" type="text/css" rel="stylesheet" >
						<script>
							parent.jqcc.cometchat.setInternalVariable('endcallOnce_'+'{$grp}','0');
							parent.jqcc.cometchat.setInternalVariable('endcallOnceWindow_'+'{$grp}','0');
							function endCall(caller){
								if(typeof parent.jqcc === 'undefined'){
									if(window.opener.jqcc.cometchat.getInternalVariable('endcallOnceWindow_'+'{$grp}') !== '1'){
										window.opener.jqcc.ccavchat.end_call('{$to}','{$grp}');
										window.opener.jqcc.cometchat.setInternalVariable('endcallOnceWindow_'+'{$grp}','1');
									}
									window.close();
								} else {
									if(parent.jqcc.cometchat.getInternalVariable('endcallOnce_'+'{$grp}') !== '1') {
										parent.jqcc.ccavchat.end_call('{$to}','{$grp}');
									}
									parent.jqcc.cometchat.setInternalVariable('endcallOnce_'+'{$grp}','1');
									if(caller)
									parent.closeCCPopup('audiovideochat');
								}	
							}
							function closeWin(){
								if(typeof parent.jqcc === 'undefined'){									
									window.close();
								} else {									
									parent.closeCCPopup('audiovideochat');
								}
							}
						</script>
					</head>
					<body onunload="endCall(0)">
						<iframe id ="webrtc" src="//{$webRTCServer}/?room={$grp}&cssurl={$cssurl}" width=100% height=100% seamless allowfullscreen></iframe>
						{$endcall}
					</div>
					</body>
					</html>
EOD;

		}
	}
}else{
	$alertmessage = 0;
	$useremailid = '';
	
	if ($action == 'request') {
		$sql = "SELECT ".$email." FROM `".TABLE_PREFIX.DB_USERTABLE."` WHERE `".DB_USERTABLE_USERID."` ='".$userid."'";
		$query = mysqli_query($GLOBALS['dbh'],$sql);
		$result = mysqli_fetch_assoc($query);
		$url= "https://api.zoom.us/v1/user/list";
		$params = "api_key=".$zoomapplicationid."&api_secret=".$zoomappAuthSecret."&data_type=JSON&page_size=30&page_number=1";
		$response  = json_decode(checkcURL(0,$url,$params,1), true);
		$flag = 0;
		foreach ($response['users'] as $user) {
			if ($user['email'] == $result['email']) {
				$url = "https://api.zoom.us/v1/meeting/create";
				$params = "api_key=".$zoomapplicationid."&api_secret=".$zoomappAuthSecret."&data_type=JSON&host_id=".$user['id']."&topic=audiovideo&type=3& option_jbh=true&option_start_type=video";
				$response = json_decode(checkcURL(0,$url,$params,1), true);
				$grp = $to;
				if (!empty($response['start_url']) && !isset($chatroommode)) {
					sendMessage($to,$avchat_language[5]." <a class='avchat_link_".$grp."' href='javascript:void(0);' onclick=\"javascript:jqcc.ccavchat.accept_fid('".$userid."','','".$response['start_url']."');\">".$avchat_language[26]."</a>",2);					
					incrementCallback();					
					sendMessage($to,$avchat_language[2]." <a class='avchat_link_".$grp."' href='javascript:void(0);' onclick=\"javascript:jqcc.ccavchat.accept('".$userid."','".$grp."','".$response['join_url']."','".$response['start_url']."');\">".$avchat_language[3]."</a> ".$avchat_language[4],1);
				} elseif (!empty($response['start_url'])) {
					sendChatroomMessage($grp,$avchat_language[19]." <a href='javascript:void(0);' onclick=\"javascript:parent.jqcc.ccavchat.accept('".$userid."','".$grp."','".$response['join_url']."','".$response['start_url']."','chatroommode');\">".$avchat_language[20]."</a>",0);
				}
				$flag = 0;
				incrementCallback();
				break;
			}
			$flag++;
		}

		if ($flag != 0 && !isset($chatroommode)) {
			$url = "https://api.zoom.us/v1/user/create";
			$params = "api_key=".$zoomapplicationid."&api_secret=".$zoomappAuthSecret."&data_type=JSON&email=".$result['email']."&type=1";
			json_decode(checkcURL(0,$url,$params,1), true);
			sendMessage($to,$avchat_language[27]." ".$result['email'],2);
		} else if($flag != 0 && isset($chatroommode)) {
			$url = "https://api.zoom.us/v1/user/create";
			$params = "api_key=".$zoomapplicationid."&api_secret=".$zoomappAuthSecret."&data_type=JSON&email=".$result['email']."&type=1";
			json_decode(checkcURL(0,$url,$params,1), true);
			$alertmessage = 1;
			$useremailid = $result['email'];
		}

	}
	if ($action == 'accept') {

		$sql = "SELECT ".$email." FROM `".TABLE_PREFIX.DB_USERTABLE."` WHERE `".DB_USERTABLE_USERID."` = '".$userid."'";
		$query = mysqli_query($GLOBALS['dbh'],$sql);
		$result = mysqli_fetch_assoc($query);
		
		$url = "https://api.zoom.us/v1/user/list";
		$params = "api_key=".$zoomapplicationid."&api_secret=".$zoomappAuthSecret."&data_type=JSON&page_size=30&page_number=1";
		$response = json_decode(checkcURL(0,$url,$params,1), true);	
		$flag = 0;
		foreach ($response['users'] as $user) {
			if ($user['email'] == $result['email']) {
				$flag = 0;
				break;
			}
			$flag++;
		}
		if ($flag != 0 && !isset($chatroommode)) {
			$url = "https://api.zoom.us/v1/user/create";
			$params = "api_key=".$zoomapplicationid."&api_secret=".$zoomappAuthSecret."&data_type=JSON&email=".$result['email']."&type=1";
			json_decode(checkcURL(0,$url,$params,1), true);
			sendMessage($to,$avchat_language[27]." ".$result['email'],2);
		} else if ($flag != 0 && isset($chatroommode)) {
			$url = "//api.zoom.us/v1/user/create";
			$params = "api_key=".$zoomapplicationid."&api_secret=".$zoomappAuthSecret."&data_type=JSON&email=".$result['email']."&type=1";
			json_decode(checkcURL(0,$url,$params,1), true);
			$alertmessage = 1;
			$useremailid = $result['email'];
		}
	}
	if (isset($chatroommode)) {
		echo $alertmessage.'^'.$useremailid;
	}
}

function configCheck(){
	$errorFlag = 0;
	if(!empty($to)){
		global $connectUrl,$applicationid,$appAuthSecret,$zoomapplicationid,$zoomappAuthSecret,$videoPluginType;
		$error = $avchat_language[47];
		switch($videoPluginType){
			case '1':
			case '2':	if($connectUrl === ''){
							$errorFlag = 1;
						}
						break;
			case '3':	if(!checkcURL()){
							$errorFlag = 1;
						}
			case '4':	if($applicationid === '' || $appAuthSecret === ''){
							$errorFlag = 1;
						}
						break;
			case '5':	if($zoomapplicationid === '' || $zoomappAuthSecret === ''){
							$errorFlag = 1;
						}
						break;
			
		}
		if($errorFlag){
			sendMessage($to,$error,2);
			exit;
		}
	}
}