<?php
 include_once(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php');
 ?>

/*
 * CometChat
 * Copyright (c) 2014 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
 */

(function($){
    $.ccmobiletab = (function(){
        var title = "<?php echo $language[51]; ?>", 
        timestamp = 0, 
        amount = 0, 
        cookie_prefix = '<?php echo $cookiePrefix; ?>', 
        mobileDevice = navigator.userAgent.match(/ipad|ipod|iphone|android|windows ce|blackberry|palm|symbian/i);
        var setalert = parseInt('<?php echo $confirmOnAllMessages; ?>');
        return{
            initialize: function(){
                if(mobileDevice||location.href.match('extensions/mobiletab/')){
                    $('#cometchat').css('display', 'none');
                    if($('.cometchat_ccmobiletab_redirect').length<=0){
                        $('body').append('<div class="cometchat_ccmobiletab_redirect "> '+title+' (<span id="ccmobiletab_buddycount">0</span>) </div>');
                    }
                    jqcc.ccmobiletab.tabalertScale();
                    $(".cometchat_ccmobiletab_redirect ,.cometchat_ccmobiletab_tabalert").live('click', function(){
                        amount = 0;
                        $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").remove();
                        window.open(jqcc.cometchat.getBaseUrl()+'extensions/mobilewebapp/', 'mobiletab', '_blank');
                    });
                }
            },
            tabalertScale: function(){
                var winWidth = $(window).width();                
                if(winWidth<=200){                   
                    $('.cometchat_ccmobiletab_redirect,#ccmobiletab_buddycount').css('font-size','12px');
                    $('.cometchat_ccmobiletab_redirect').css({'width' : '60%', 'z-index' : '999'});
                    $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").css('right', '17%');
                }else if(winWidth>200&&winWidth<=300){
                    $('.cometchat_ccmobiletab_redirect,#ccmobiletab_buddycount').css('font-size','17px');
                    $('.cometchat_ccmobiletab_redirect').css({'width' : '60%', 'z-index' : '999'});
                    $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").css('right', '25%');
                }else if(winWidth>300&&winWidth<=400){
                    $('.cometchat_ccmobiletab_redirect,#ccmobiletab_buddycount').css('font-size','18px');
                    $('.cometchat_ccmobiletab_redirect').css({'width' : '55%', 'z-index' : '999'});
                    $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").css('right', '30%');
                }else if(winWidth>400&&winWidth<=600){
                    $('.cometchat_ccmobiletab_redirect,#ccmobiletab_buddycount').css('font-size','20px');
                    $('.cometchat_ccmobiletab_redirect').css({'width' : '50%', 'z-index' : '999'});
                    $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").css('right', '33%');
                }else if(winWidth>600&&winWidth<=1000){
                    $('.cometchat_ccmobiletab_redirect,#ccmobiletab_buddycount').css('font-size','24px');
                    $('.cometchat_ccmobiletab_redirect').css({'width' : '30%', 'z-index' : '999'});
                    $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").css('right', '24%');
                }else if(winWidth>1000){
                    $('.cometchat_ccmobiletab_redirect,#ccmobiletab_buddycount').css('font-size','30px');
                    $('.cometchat_ccmobiletab_redirect').css({'width': '25%', 'z-index' : '999'});
                    $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").css('right', '28%');
                }
            },
            notify: function(totmsg){
                if(typeof (totmsg)!="undefined"){
                    amount = totmsg;
                }
                if(amount===0){
                    $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").remove();
                }else{
                    if(setalert==1||setalert==2){
                        jqcc.cookie(cookie_prefix+"confirmOnMsg", null, {path: '/', expires: -1});
                    }
                    if(jqcc.cookie(cookie_prefix+"confirmOnMsg")!=1&&setalert!=2){
                        if(confirm("<?php echo $language[52]; ?>")){
                            amount = 0;
                            $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").remove();
                            window.open(jqcc.cometchat.getBaseUrl()+'extensions/mobilewebapp/', 'mobiletab', '_blank');
                        }else{
                            if($(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").length>0){
                                $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").html(amount);
                            }else{
                                $("<div/>").addClass("cometchat_ccmobiletab_tabalert").html(amount).appendTo($('.cometchat_ccmobiletab_redirect'));
                            }
                            jqcc.ccmobiletab.tabalertScale();
                        }
                        if(setalert==0){
                            jqcc.cookie(cookie_prefix+"confirmOnMsg", "1", {path: '/', expires: 365});
                        }
                    }else{
                        if($(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").length>0){
                            $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").html(amount);
                        }else{
                            $("<div/>").addClass("cometchat_ccmobiletab_tabalert").html(amount).appendTo($('.cometchat_ccmobiletab_redirect'));
                        }
                        jqcc.ccmobiletab.tabalertScale();
                    }
                }
            },
            buddyList: function(data){ 
                var buddyCount = 0;
                $.each(data, function(index, user){
                    if(user.s!='offline'){
                        buddyCount++;
                    }
                });
                $("#ccmobiletab_buddycount").html(buddyCount);
            },
            addMessages: function(data){
                $.each(data, function(i, incoming){
                    if(typeof (incoming.id)=='undefined'){
                        if(i=='self'){
                            var self = incoming;
                        }
                        if(i=='sent'&&incoming!='undefined'){
                            var sent = incoming;
                            if(self==0||typeof (self)=='undefined'){
                                if(sent>timestamp){
                                    amount++;
                                    jqcc.ccmobiletab.notify(amount);
                                    timestamp = sent;
                                }
                            }
                        }
                    }else{
                        if(incoming.self==0&&incoming.old!=1){
                            if(incoming.id>timestamp){
                                amount++;
                                jqcc.ccmobiletab.notify(amount);
                                timestamp = incoming.id;
                            }
                        }
                    }
                });
            },
            chatWith: function(id) {
                amount = 0;
                $(".cometchat_ccmobiletab_redirect .cometchat_ccmobiletab_tabalert").remove();
                window.open(jqcc.cometchat.getBaseUrl()+'extensions/mobilewebapp/#user-'+id, 'mobiletab', '_blank');
            },
            loggedOut: function(){
                $(".cometchat_ccmobiletab_redirect").hide(0);
                jqcc.cookie(cookie_prefix+"confirmOnMsg", null, {path: '/', expires: -1});
            }
        };
    })();
    window.onresize = function(){
        jqcc.ccmobiletab.tabalertScale();
    };
    window.onload = function(){
        jqcc.ccmobiletab.tabalertScale();
    };
})(jqcc);