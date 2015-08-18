<?php
		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."config.php");
		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR."en.php");

		if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php")) {
			include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php");
		}

		foreach ($screenshare_language as $i => $l) {
			$screenshare_language[$i] = str_replace("'", "\'", $l);
		}
?>

/*
 * CometChat
 * Copyright (c) 2014 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
	$.ccscreenshare = (function () {

		var title = '<?php echo $screenshare_language[0];?>';
		var lastcall = 0;
		var height = <?php echo $scrHeight;?>;
		var width = <?php echo $scrWidth;?>;
		var type = '<?php echo $screensharePluginType;?>';

        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {
				var currenttime = new Date();
				currenttime = parseInt(currenttime.getTime()/1000);
				if (currenttime-lastcall > 10) {
					var random = currenttime;
					<?php if($type=='module'&&$name=='chatrooms'): ?>
						baseUrl = $.cometchat.getBaseUrl();
						baseData = $.cometchat.getBaseData();
						if (type == '2') {
							$.ajax({
								url : baseUrl+'plugins/screenshare/index.php?chatroommode=1&action=request&callback=?',
								type : 'GET',
								data : {to: id, id: random, basedata: baseData},
								dataType : 'text',
								success : function(data) {
									var flag = data.split('^');
									if (flag[0] == '1'){
										alert('<?php echo $screenshare_language[12];?> '+flag[1]);
									}
								},
								error : function(data) {
								}
							});
						} else {
							$.getJSON(baseUrl+'plugins/screenshare/index.php?chatroommode=1&action=request&callback=?', {to: id, id: random, basedata: baseData});
						}
					<?php else: ?>
						baseUrl = $.cometchat.getBaseUrl();
						baseData = $.cometchat.getBaseData();
						$.getJSON(baseUrl+'plugins/screenshare/index.php?action=request&callback=?', {to: id, id: random, basedata: baseData});
						if (jqcc.cometchat.getThemeArray('buddylistIsDevice',id) == 1) { 
							jqcc.ccmobilenativeapp.sendnotification('<?php echo $screenshare_language[2];?>', id, jqcc.cometchat.getName(jqcc.cometchat.getThemeVariable('userid')));	
						}
					<?php endif; ?>
					lastcall = currenttime;
					if(type=='1') {
						var w = window.open (baseUrl+'plugins/screenshare/index.php?action=screenshare&type=1&id='+random+'&basedata='+baseData, 'screenshare',"status=0,toolbar=0,menubar=0,directories=0,resizable=0,location=0,status=0,scrollbars=0, width=825,height=350");
						w.focus();
					} else if(type =='0') {
						<?php if($type=='module'&&$name=='chatrooms'): ?>
							jqcc[jqcc.cometchat.getChatroomVars('calleeAPI')].loadCCPopup(baseUrl+'plugins/screenshare/index.php?action=screenshare&type=1&id='+random+'&basedata='+baseData, 'screenshare',"status=0,toolbar=0,menubar=0,directories=0,resizable=0,location=0,status=0,scrollbars=0, width=430,height=100",430,100,'<?php echo $screenshare_language[7];?>',0,1,1,1);
						<?php else: ?>
							loadCCPopup(baseUrl+'plugins/screenshare/index.php?action=screenshare&type=1&id='+random+'&basedata='+baseData, 'screenshare',"status=0,toolbar=0,menubar=0,directories=0,resizable=0,location=0,status=0,scrollbars=0, width=430,height=100",430,100,'<?php echo $screenshare_language[7];?>',0,1,1,1);
						<?php endif; ?> 
					}
					

				} else {
					alert('<?php echo $screenshare_language[1];?>');
				}
			},

			accept: function (id,random,join_url,start_url,mode) {
				baseUrl = $.cometchat.getBaseUrl();
				baseData = $.cometchat.getBaseData();
				
				<?php if($type=='module'&&$name=='chatrooms'): ?>
					if (type == '2') {
						$.ajax({
							url : baseUrl+'plugins/screenshare/index.php?chatroommode=1&action=accept&callback=?',
							type : 'GET',
							data : {to: id, start_url:start_url, grp: random, basedata: baseData},
							dataType : 'text',
							success : function(data) {
								var flag = data.split('^');
								if (flag[0] == '1'){
									alert('<?php echo $screenshare_language[12];?> '+flag[1]);
								}
							},
							error : function(data) {
							}
						});
					} else {
						$.getJSON(baseUrl+'plugins/screenshare/index.php?chatroommode=1&action=accept&callback=?', {to: id, start_url:start_url, grp: random, basedata: baseData});
					}
				<?php else: ?>
					$.getJSON(baseUrl+'plugins/screenshare/index.php?action=accept&callback=?', {to: id, start_url:start_url, grp: random, basedata: baseData});
				<?php endif; ?>
				if(type == '2') {
					window.open(join_url, 'screenshare','width=<?php echo $scrWidth;?>,height=<?php echo $scrHeight;?>,scrollbars=yes, resizable=yes'); 
				} else{
					<?php if($type=='module'&&$name=='chatrooms'): ?>
                        jqcc[jqcc.cometchat.getChatroomVars('calleeAPI')].loadCCPopup(baseUrl+'plugins/screenshare/index.php?action=screenshare&type=0&id='+random+'&basedata='+baseData, 'screenshare',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width="+width+",height="+height,width,height,'<?php echo $screenshare_language[7];?>',0,1,1,1);
					<?php else: ?>
						loadCCPopup(baseUrl+'plugins/screenshare/index.php?action=screenshare&type=0&id='+random+'&basedata='+baseData, 'screenshare',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width="+width+",height="+height,width,height,'<?php echo $screenshare_language[7];?>',0,1,1,1);
					<?php endif; ?>
				}
			},
		
			accept_fid: function (id,start_url) {
				if (type == '2') {
					window.open(start_url, 'screenshare','width=<?php echo $scrWidth;?>,height=<?php echo $scrHeight;?>,scrollbars=yes, resizable=yes'); 
				} else {
					<?php if($type=='module'&&$name=='chatrooms'): ?>
                        jqcc[jqcc.cometchat.getChatroomVars('calleeAPI')].loadCCPopup(start_url,'screenshare',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $scrWidth;?>,height=<?php echo $scrHeight;?>",width,height,'<?php echo $screenshare_language[7];?>',0,1,1,1); 
					<?php else: ?>
						loadCCPopup(start_url,'screenshare',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $scrWidth;?>,height=<?php echo $scrHeight;?>",width,height,'<?php echo $screenshare_language[7];?>',0,1,1,1); 
					<?php endif; ?>
				}
			}
        };
    })();
 
})(jqcc);