<?php

		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR."en.php");
		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."config.php");
		if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php")) {
			include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php");
		}

		foreach ($broadcast_language as $i => $l) {
			$broadcast_language[$i] = str_replace("'", "\'", $l);
		}
                
                $width = $camWidth;
		$height = $camHeight;
                
                if($videoPluginType == 2) {
                    $width = $vidWidth;
                    $height = $vidHeight;
                }
?>

/*
 * CometChat
 * Copyright (c) 2014 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
		$.ccbroadcast = (function () {
		var title = '<?php echo $broadcast_language[0];?>';
		var type = <?php echo $videoPluginType;?>;
		if(type == 2) {allowresize = 0} else {allowresize = 1}
		
		var lastcall = 0;

		   return {
				getTitle: function() {
					return title;	
				},

				init: function (id) {
					<?php if($type=='module'&&$name=='chatrooms'): ?>
						baseUrl = $.cometchat.getBaseUrl();
						basedata = $.cometchat.getBaseData();
						$[$.cometchat.getChatroomVars('calleeAPI')].loadCCPopup(baseUrl+'plugins/broadcast/index.php?action=call&chatroommode=1&type=1&grp='+id+'&basedata='+basedata, 'broadcast',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $width;?>,height=<?php echo $height;?>",<?php echo $width;?>,<?php echo $height;?>,'<?php echo $broadcast_language[8];?>',1,1,allowresize,1); 
					<?php else: ?>
						var random = '';
						var currenttime = new Date();
						currenttime = parseInt(currenttime.getTime()/1000);
						if (currenttime-lastcall > 10) {
							baseUrl = $.cometchat.getBaseUrl();
							baseData = $.cometchat.getBaseData();
							if (jqcc.cometchat.getThemeArray('buddylistIsDevice',id) == 1) { 
								jqcc.ccmobilenativeapp.sendnotification('<?php echo $broadcast_language[5];?>', id, jqcc.cometchat.getName(jqcc.cometchat.getThemeVariable('userid')));	
							}
					  		loadCCPopup(baseUrl+'plugins/broadcast/index.php?action=request&type=1&to='+id+'&basedata='+baseData, 'broadcast',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $width;?>,height=<?php echo $height;?>",<?php echo $width;?>,<?php echo $height;?>,'<?php echo $broadcast_language[8];?>',1,1,allowresize,1);
							
							lastcall = currenttime;
						} else {
							alert('<?php echo $broadcast_language[1];?>');
						}
					<?php endif; ?>
				},

				accept: function (id,grp) {
					baseUrl = $.cometchat.getBaseUrl();
					baseData = $.cometchat.getBaseData();
					loadCCPopup(baseUrl+'plugins/broadcast/index.php?action=call&type=0&grp='+grp+'&basedata='+baseData, 'broadcast',"status=0,toolbar=0,menubar=0,directories=0,type=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $width;?>,height=<?php echo $height;?>",<?php echo $width;?>,<?php echo $height;?>,'<?php echo $broadcast_language[8];?>',1,1,allowresize,1);
				},

				join: function (id) {
					baseUrl = $.cometchat.getBaseUrl();
					basedata = $.cometchat.getBaseData();
					$[$.cometchat.getChatroomVars('calleeAPI')].loadCCPopup(baseUrl+'plugins/broadcast/index.php?action=call&chatroommode=1&type=0&join=1&grp='+id+'&basedata='+basedata, 'broadcast',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $width;?>,height=<?php echo $height;?>",<?php echo $width;?>,<?php echo $height;?>,'<?php echo $broadcast_language[8];?>',1,1,allowresize,1); 
				}

			};
		})();
 
})(jqcc);