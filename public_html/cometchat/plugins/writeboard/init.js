<?php
		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."config.php");
		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR."en.php");

		if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php")) {
			include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php");
		}

		foreach ($writeboard_language as $i => $l) {
			$writeboard_language[$i] = str_replace("'", "\'", $l);
		}
?>

/*
 * CometChat
 * Copyright (c) 2014 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
	$.ccwriteboard = (function () {

		var title = '<?php echo $writeboard_language[0];?>';
		var lastcall = 0;
		var height = <?php echo $writebHeight;?>;
		var width = <?php echo $writebWidth;?>;
		
        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {
				<?php if($type=='module'&&$name=='chatrooms'): ?>
					var currenttime = new Date();
					currenttime = parseInt(currenttime.getTime()/1000);
					if (currenttime-lastcall > 10) {
						baseUrl = $.cometchat.getBaseUrl();
						basedata = $.cometchat.getBaseData();
						var random = currenttime;
						lastcall = currenttime;
						$[$.cometchat.getChatroomVars('calleeAPI')].loadCCPopup(baseUrl+'plugins/writeboard/index.php?action=writeboard&type=1&chatroommode=1&roomid='+id+'&id='+random+'&basedata='+basedata, 'writeboard',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $writebWidth;?>,height=<?php echo $writebHeight;?>",width,height-50,'<?php echo $writeboard_language[7];?>',1,1,1,1);
					} else {
						alert('<?php echo $writeboard_language[1];?>');
					}
				<?php else: ?>
					var currenttime = new Date();
					currenttime = parseInt(currenttime.getTime()/1000);
					if (currenttime-lastcall > 10) {
						baseUrl = $.cometchat.getBaseUrl();
						baseData = $.cometchat.getBaseData();

						var random = currenttime;
						$.getJSON(baseUrl+'plugins/writeboard/index.php?action=request&callback=?', {to: id, id: random, basedata: baseData});
						lastcall = currenttime;

						loadCCPopup(baseUrl+'plugins/writeboard/index.php?action=writeboard&type=1&id='+random+'&basedata='+baseData, 'writeboard',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width="+width+",height="+height,width,height-50,'<?php echo $writeboard_language[7];?>',0,1,1,1);
						if (jqcc.cometchat.getThemeArray('buddylistIsDevice',id) == 1) { 
							jqcc.ccmobilenativeapp.sendnotification('<?php echo $writeboard_language[2];?>', id, jqcc.cometchat.getName(jqcc.cometchat.getThemeVariable('userid')));	
						}

					} else {
						alert('<?php echo $writeboard_language[1];?>');
					}
				<?php endif; ?>
			},

			accept: function (id,random) {
				<?php if($type=='module'&&$name=='chatrooms'): ?>
				   baseUrl =$.cometchat.getBaseUrl();
				   basedata = $.cometchat.getBaseData();
				   $[$.cometchat.getChatroomVars('calleeAPI')].loadCCPopup(baseUrl+'plugins/writeboard/index.php?action=writeboard&type=0&id='+random+'&basedata='+basedata, 'writeboard',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $writebWidth;?>,height=<?php echo $writebHeight;?>",width,height-50,'<?php echo $writeboard_language[7];?>',1,1,1,1); 
				
				<?php else: ?>

					baseUrl = $.cometchat.getBaseUrl();
					baseData = $.cometchat.getBaseData();
					$.getJSON(baseUrl+'plugins/writeboard/index.php?action=accept&callback=?', {to: id, basedata: baseData});
					loadCCPopup(baseUrl+'plugins/writeboard/index.php?action=writeboard&type=0&id='+random+'&basedata='+baseData, 'writeboard',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width="+width+",height="+height,width,height-50,'<?php echo $writeboard_language[7];?>',0,1,1,1);
				<?php endif; ?>
			}
        };
    })();
 
})(jqcc);