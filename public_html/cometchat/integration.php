<?php
include_once("cometchat/model_soporte_chat.php");


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('SET_SESSION_NAME','');			// Session name
define('SWITCH_ENABLED','0');		
define('INCLUDE_JQUERY','1');	
define('FORCE_MAGIC_QUOTES','0');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

define('BASEPATH',true);
if(!file_exists(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'database.php')) {
	echo "Please check if cometchat is installed in the correct directory.<br /> The 'cometchat' folder should be placed at <CODEEGNITER_HOME_DIRECTORY>/cometchat";
	exit;
}
include_once(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'database.php');

// DO NOT EDIT DATABASE VALUES BELOW

define('DB_SERVER',			$db['default']['hostname']				 );
define('DB_PORT',			$db['port']								 );
define('DB_USERNAME',			$db['default']['username']				 );
define('DB_PASSWORD',			$db['default']['password']				 );
define('DB_NAME',			$db['default']['database'] 				 );
define('TABLE_PREFIX',			""										 );
define('DB_USERTABLE',			"users"								     );
define('DB_USERTABLE_USERID',		"id"								     );
define('DB_USERTABLE_NAME',		"username"								 );
define('DB_AVATARTABLE',		" "                                      );
define('DB_AVATARFIELD',		" ".TABLE_PREFIX.DB_USERTABLE.".id " );

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* FUNCTIONS */

function getUserID() {
	$userid = 0;
	if (!empty($_SESSION['basedata']) && $_SESSION['basedata'] != 'null') {
		$_REQUEST['basedata'] = $_SESSION['basedata'];
	}
	if (!empty($_REQUEST['basedata'])) {
	
		if (function_exists('mcrypt_encrypt') && defined('ENCRYPT_USERID') && ENCRYPT_USERID == '1') {
			$key = "";
			if( defined('KEY_A') && defined('KEY_B') && defined('KEY_C') ){
				$key = KEY_A.KEY_B.KEY_C;
			}
			$uid = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(rawurldecode($_REQUEST['basedata'])), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
			if (intval($uid) > 0) {
				$userid = $uid;
			}
		} else {
			$userid = $_REQUEST['basedata'];
		}
	}
	if (!empty($_COOKIE['ci_session'])) {
		$uid = unserialize($_COOKIE['ci_session']);
		if(!empty($uid['user_id'])) {
			$userid = $uid['user_id'];
		}
	}
//	echo "Userid = ".$userid;
	$userid = intval($userid);	
	return $userid;
}

function chatLogin($userName,$userPass) {
	$userid = 0;
	if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		$sql = ("SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE Email ='".$userName."'"); 
	} else {
		$sql = ("SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE username ='".$userName."'");
	}
	$result = mysqli_query($GLOBALS['dbh'],$sql);
	$row = mysqli_fetch_assoc($result);
	if($row['password'] == $userPass) {
		$userid = $row['id'];
                if (isset($_REQUEST['callbackfn']) && $_REQUEST['callbackfn'] == 'mobileapp') {
                    $sql = ("insert into cometchat_status (userid,isdevice) values ('".mysqli_real_escape_string($GLOBALS['dbh'],$userid)."','1') on duplicate key update isdevice = '1'");
                    mysqli_query($GLOBALS['dbh'], $sql);
                }
	}
	if($userid && function_exists('mcrypt_encrypt') && defined('ENCRYPT_USERID') && ENCRYPT_USERID == '1'){
		$key = "";
			if( defined('KEY_A') && defined('KEY_B') && defined('KEY_C') ){
				$key = KEY_A.KEY_B.KEY_C;
			}
		$userid = rawurlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $userid, MCRYPT_MODE_CBC, md5(md5($key)))));
	}
        
        return $userid;
}



function getFriendsList($userid,$time) {	
	global $hideOffline;
	$offlinecondition = '';	
	if ($hideOffline) {
		$offlinecondition = "where ((cometchat_status.lastactivity > (".mysqli_real_escape_string($GLOBALS['dbh'],$time)."-".((ONLINE_TIMEOUT)*2).")) OR cometchat_status.isdevice = 1) and (cometchat_status.status IS NULL OR cometchat_status.status <> 'invisible' OR cometchat_status.status <> 'offline')";
	}
	
	
	if($_COOKIE['red1']=="1"){
		//De usuario a usuario
		$sql = ("select DISTINCT users.id userid,
		users.username username,  users.username link,
		users.id  avatar, cometchat_status.lastactivity lastactivity,
		cometchat_status.status, cometchat_status.message,
		cometchat_status.isdevice
        from  users
        left join cometchat_status on users.id = cometchat_status.userid
        left join afiliar on afiliar.id=users.id
        left join user_profiles on user_profiles.user_id=users.id
        where afiliar.id_red=(select afiliar.id_red from afiliar where afiliar.id=".$userid.")
		and user_profiles.id_tipo_usuario=2");
			
		return $sql;
		
		
	}else if($_COOKIE['red1']=="2"){
		//De usuario a soporte
		$sql =("select DISTINCT users.id userid,users.username username,  
            users.username link, users.id  avatar, cometchat_status.lastactivity lastactivity,
			cometchat_status.status, cometchat_status.message,cometchat_status.isdevice 
			from (users
			left join cometchat_status on users.id = cometchat_status.userid)
			left join afiliar on afiliar.id=users.id
			left join user_profiles on user_profiles.user_id=users.id 
			left join user_soporte on user_soporte.id_user=users.id
			where  user_profiles.id_tipo_usuario='3' 
			and user_soporte.id_red_temporal=
			(SELECT id_red_temporal from user_red_temporal where id_user=".$userid.") 
			or users.id=".$userid."");
			return $sql;
			
	}else if($_COOKIE['red1']=="3"){
		//De soporte a usuario
		$sql =("select DISTINCT users.id userid,users.username username,
        users.username link, users.id  avatar, cometchat_status.lastactivity lastactivity,
        cometchat_status.status, cometchat_status.message,cometchat_status.isdevice
        from (users
		left join cometchat_status on users.id = cometchat_status.userid)
		left join afiliar on afiliar.id=users.id
		left join user_profiles on user_profiles.user_id=users.id
        left join user_red_temporal on user_red_temporal.id_user=users.id
		where user_red_temporal.id_red_temporal= (select id_red_temporal from user_soporte
		where id_user=".$userid." and user_profiles.id_tipo_usuario='2' )
		or users.id=".$userid."");
		return $sql;
		
	       }
   		}

function getFriendsIds($userid) {
	$sql = ("select ".TABLE_PREFIX."friends.friend_user_id friendid from ".TABLE_PREFIX."friends where ".TABLE_PREFIX."friends.initiator_user_id = '".mysqli_real_escape_string($GLOBALS['dbh'],$userid)."' and is_confirmed = 1 union select ".TABLE_PREFIX."friends.initiator_user_id friendid from ".TABLE_PREFIX."friends where ".TABLE_PREFIX."friends.friend_user_id = '".mysqli_real_escape_string($GLOBALS['dbh'],$userid)."' and is_confirmed = 1");
 
	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link, ".DB_AVATARFIELD." avatar, cometchat_status.lastactivity lastactivity, cometchat_status.status, cometchat_status.message, cometchat_status.isdevice from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysqli_real_escape_string($GLOBALS['dbh'],$userid)."'");

	return $sql;
}

function updateLastActivity($userid) {
	$sql = ("insert into cometchat_status (userid,lastactivity) values ('".mysqli_real_escape_string($GLOBALS['dbh'],$userid)."','".getTimeStamp()."') on duplicate key update lastactivity = '".getTimeStamp()."'");

	return $sql;
}

function getUserStatus($userid) {
	 $sql = ("select cometchat_status.message, cometchat_status.status from cometchat_status where userid = '".mysqli_real_escape_string($GLOBALS['dbh'],$userid)."'");

	 return $sql;
}

function fetchLink($link) {
        return '';
}

function getAvatar($image) {
	return BASE_URL.'images/noavatar.png';
}

function getTimeStamp() {
	return time();
}

function processTime($time) {
	return $time;
}

if (!function_exists('getLink')) {
  	function getLink($userid) { return fetchLink($userid); }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* HOOKS */

function hooks_updateLastActivity($userid) {

}

function hooks_statusupdate($userid,$statusmessage) {
	
}

function hooks_forcefriends() {

}

function hooks_activityupdate($userid,$status) {

}

function hooks_message($userid,$to,$unsanitizedmessage) {

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* LICENSE */

include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'license.php');
$x="\x62a\x73\x656\x34\x5fd\x65c\157\144\x65";
eval($x('JHI9ZXhwbG9kZSgnLScsJGxpY2Vuc2VrZXkpOyRwXz0wO2lmKCFlbXB0eSgkclsyXSkpJHBfPWludHZhbChwcmVnX3JlcGxhY2UoIi9bXjAtOV0vIiwnJywkclsyXSkpOw'));

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
