<?php
		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."config.php");
		include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR."en.php");

		if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php")) {
			include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$lang.".php");
		}

		foreach ($avchat_language as $i => $l) {
			$avchat_language[$i] = str_replace("'", "\'", $l);
		}

		if ($videoPluginType == 3) {
			$width = 330; 
			$height = 330;
		} else {
			$width = 434;
			$height = 356;
		}
?>

/*
 * CometChat
 * Copyright (c) 2014 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/
String.prototype.replaceAll=function(s1, s2) {return this.split(s1).join(s2)};
(function($){   
  
		$.ccavchat = (function () {
		var title = '<?php echo $avchat_language[0];?>';
		var type = '<?php echo $videoPluginType;?>';
		var supported = true;
		<?php 
			if($videoPluginType == 6) :
		?>
		var Browser = (function(){
		    var ua= navigator.userAgent, tem, 
		    M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
		    if(/trident/i.test(M[1])){
		        tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
		        return 'IE '+(tem[1] || '');
		    }
		    if(M[1]=== 'Chrome'){
		        tem= ua.match(/\bOPR\/(\d+)/)
		        if(tem!= null) return 'Opera '+tem[1];
		    }
		    M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
		    if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
		    return M;
		})();
		if(Browser[0].search(/(msie|safari)/i) > -1){
			supported = false;
		}
		<?php
			endif;
		?>
		var lastcall = 0;
                if(type == 3) {allowresize = 0} else {allowresize = 1}

        return {

			getTitle: function() {
				return title;	
			},
			init: function (id) {
				if(supported) {
					var currenttime = new Date();
					currenttime = parseInt(currenttime.getTime()/1000);
					if (currenttime-lastcall > 10) {
						<?php if($type=='module'&&$name=='chatrooms'): ?>
							baseUrl = $.cometchat.getBaseUrl();
							baseData = $.cometchat.getBaseData();
							if (type == '5') {
								$.ajax({
									url : baseUrl+'plugins/avchat/index.php?chatroommode=1&action=request&callback=?',
									type : 'GET',
									data : {to: id, basedata: baseData},
									dataType : 'text',
									success : function(data) {
										var flag = data.split('^');
										if (flag[0] == '1'){
											alert('<?php echo $avchat_language[27];?> '+flag[1]);
										}
									},
									error : function(data) {
									}
								});
							} else {

								$.getJSON(baseUrl+'plugins/avchat/index.php?chatroommode=1&action=request&callback=?', {to: id, basedata: baseData});
								$[$.cometchat.getChatroomVars('calleeAPI')].loadCCPopup(baseUrl+'plugins/avchat/index.php?action=call&chatroommode=1&grp='+id+'&basedata='+baseData, 'audiovideochat',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $width;?>,height=<?php echo $height;?>",<?php echo $width;?>,<?php echo $height;?>,'<?php echo $avchat_language[8];?>',1,1,allowresize,1); 
								
							}
						<?php else: ?>
							baseUrl = $.cometchat.getBaseUrl();
							baseData = $.cometchat.getBaseData();
							$.getJSON(baseUrl+'plugins/avchat/index.php?action=request&callback=?', {to: id, basedata: baseData});
							if (jqcc.cometchat.getThemeArray('buddylistIsDevice',id) == 1) { 
								jqcc.ccmobilenativeapp.sendnotification('<?php echo $avchat_language[5];?>', id, jqcc.cometchat.getName(jqcc.cometchat.getThemeVariable('userid')));	
							}
						<?php endif; ?>
						lastcall = currenttime;
					} else {
						alert('<?php echo $avchat_language[1];?>');
					}
				} else {
					alert('<?php echo $avchat_language[48];?>');
				}
			},

			accept: function (id,grp,join_url,start_url) {
				if(supported){
					baseUrl = $.cometchat.getBaseUrl();
					baseData = $.cometchat.getBaseData();
					<?php 
					if($videoPluginType == 6) :
					?>
					jqcc.ccavchat.delinkAvchat(grp);
					<?php
						endif;
					?>
					<?php if($type=='module'&&$name=='chatrooms'): ?>
						if (type == '5') {
							$.ajax({
								url : baseUrl+'plugins/avchat/index.php?chatroommode=1&action=accept&callback=?',
								type : 'GET',
								data : {to: id, basedata: baseData},
								dataType : 'text',
								success : function(data) {
									var flag = data.split('^');
									if (flag[0] == '1'){
										alert('<?php echo $avchat_language[27];?> '+flag[1]);
									}
								},
								error : function(data) {
								}
							});
						} else {
							$.getJSON(baseUrl+'plugins/avchat/index.php?chatroommode=1&action=accept&callback=?', {to: id, start_url:start_url, grp: grp, basedata: baseData});
						}
					<?php else: ?>
						$.getJSON(baseUrl+'plugins/avchat/index.php?action=accept&callback=?', {to: id, start_url:start_url, grp: grp, basedata: baseData});
					<?php endif; ?>
					if(type == "5") { 
						window.open(join_url, 'audiovideochat','width=<?php echo $camWidth;?>,height=<?php echo $camHeight;?>, scrollbars=yes, resizable=yes');
					} else {
						loadCCPopup(baseUrl+'plugins/avchat/index.php?action=call&grp='+grp+'&basedata='+baseData+'&to='+id, 'audiovideochat',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $camWidth;?>,height=<?php echo $camHeight;?>",<?php echo $camWidth;?>,<?php echo $camHeight;?>,'<?php echo $avchat_language[8];?>',0,1,allowresize,1);
					}
				} else {
					alert('<?php echo $avchat_language[48];?>');
				}
			},

			accept_fid: function (id,grp,start_url) {
				<?php 
					if($videoPluginType == 6) :
				?>
				jqcc.ccavchat.delinkAvchat(grp);
				<?php
					endif;
				?>
				baseUrl = $.cometchat.getBaseUrl();
				baseData = $.cometchat.getBaseData();
				if(type == "5") {
					window.open(start_url, 'audiovideochat','width=<?php echo $camWidth;?>,height=<?php echo $camHeight;?>,scrollbars=yes, resizable=yes');
				} else {
					loadCCPopup(baseUrl+'plugins/avchat/index.php?action=call&grp='+grp+'&basedata='+baseData+'&to='+id, 'audiovideochat',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $camWidth;?>,height=<?php echo $camHeight;?>",<?php echo $camWidth;?>,<?php echo $camHeight;?>,'<?php echo $avchat_language[8];?>',0,1,allowresize,1);
				}
			},
           	ignore_call : function(id,grp){
           		
           		baseUrl = $.cometchat.getBaseUrl();
            	$.ajax({
					url : baseUrl+'plugins/avchat/index.php?action=noanswer',
					type : 'GET',
					data : {to: id,grp: grp},
					dataType : 'text',
					success : function(data) {
						
					},
					error : function(data) {
						console.log('Something went wrong');
					}
				});            	
			},
           	cancel_call : function(id,grp){
           		baseUrl = $.cometchat.getBaseUrl();
           		
            	$.ajax({
					url : baseUrl+'plugins/avchat/index.php?action=canceloutgoingcall',
					type : 'GET',
					data : {to: id,grp: grp},
					dataType : 'text',
					success : function(data) {
						
					},
					error : function(data) {
						console.log('Something went wrong');
					}
				});            	
			},
			reject_call : function(id,grp){
				baseUrl = $.cometchat.getBaseUrl();
				jqcc.ccavchat.delinkAvchat(grp);
				
            	$.ajax({
					url : baseUrl+'plugins/avchat/index.php?action=rejectcall',
					type : 'GET',
					data : {to: id,grp: grp},
					dataType : 'text',
					success : function(data) {
						
					},
					error : function(data) {
						console.log('Something went wrong');
					}
				});            	
			},			
            end_call : function(id,grp){
            	baseUrl = $.cometchat.getBaseUrl();
            	baseData = $.cometchat.getBaseData();
            	var popoutopencalled = jqcc.cometchat.getInternalVariable('avchatpopoutcalled');
            	var endcallrecieved = jqcc.cometchat.getInternalVariable('endcallrecievedfrom_'+grp);
            	
            	if(popoutopencalled !== '1'){
	            	if(endcallrecieved !== '1') {
	            		$.ajax({
							url : baseUrl+'plugins/avchat/index.php?action=endcall',
							type : 'GET',
							data : {to: id, basedata: baseData , grp: grp},
							dataType : 'text',
							success : function(data) {
								
							},
							error : function(data) {
								console.log('Something went wrong');
							}
						});
	            	}
	            }
            	jqcc.cometchat.setInternalVariable('endcallrecievedfrom_'+grp,'0');
            	jqcc.cometchat.setInternalVariable('avchatpopoutcalled','0');
			},

		   	join: function (id) {
				baseUrl = $.cometchat.getBaseUrl();
				basedata = $.cometchat.getBaseData();
				$[$.cometchat.getChatroomVars('calleeAPI')].loadCCPopup(baseUrl+'plugins/avchat/index.php?action=call&chatroommode=1&type=0&join=1&grp='+id+'&basedata='+basedata, 'broadcast',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=<?php echo $camWidth;?>,height=<?php echo $camHeight;?>",<?php echo $camWidth;?>,<?php echo $camHeight;?>,'<?php echo $avchat_language[8];?>',1,1,allowresize,1); 
			},

			getLangVariables: function() {
				return <?php echo json_encode($avchat_language); ?>;
			},

			delinkAvchat: function(grp){
				$('a.avchat_link_'+grp).each(function(){
					$(this).attr('onclick','').unbind('click');
					this.style.setProperty( 'color', '#95a5a6', 'important' );
					$(this).css('text-decoration','none');
					$(this).css('cursor','text');
				});
			},

			processControlMessage : function(message_array) {
				var avchat_language = jqcc.ccavchat.getLangVariables();
				var processedmessage = null;
				<?php 
					if($videoPluginType == 6) :
				?>
				jqcc.ccavchat.delinkAvchat(message_array[4]);	           	
	           	switch(message_array[3]){
					case 'ENDCALL':
	                    jqcc.cometchat.setInternalVariable('endcallrecievedfrom_'+message_array[4],'1');
	                    processedmessage = avchat_language[38];
	                    break;
	                case 'REJECTCALL':
	                    processedmessage = avchat_language[39];
	                    break;
	                case 'NOANSWER':
	                    processedmessage = avchat_language[40];
	                    break;
	                case 'BUSYCALL':
	                    processedmessage = avchat_language[39];
	                    break;
	                case 'CANCELCALL':
	                    processedmessage = avchat_language[37];
	                    break;

	                default :
                    	processedmessage = null;
                    break;
	            }
	            <?php
					endif;
				?>
				return processedmessage;
			}


        };
    })();
 
})(jqcc);