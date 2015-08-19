
if(!window.SI){var SI={};};SI.Files={htmlClass:'SI-FILES-STYLIZED',fileClass:'file',wrapClass:'cabinet',fini:false,able:false,init:function()
{this.fini=true;var ie=0
if(window.opera||(ie&&ie<5.5)||!document.getElementsByTagName){return;}
this.able=true;var html=document.getElementsByTagName('html')[0];html.className+=(html.className!=''?' ':'')+this.htmlClass;},stylize:function(elem)
{if(!this.fini){this.init();};if(!this.able){return;};elem.parentNode.file=elem;elem.parentNode.onmousemove=function(e)
{if(typeof e=='undefined')e=window.event;if(typeof e.pageY=='undefined'&&typeof e.clientX=='number'&&document.documentElement)
{e.pageX=e.clientX+document.documentElement.scrollLeft;e.pageY=e.clientY+document.documentElement.scrollTop;};var ox=oy=0;var elem=this;if(elem.offsetParent)
{ox=elem.offsetLeft;oy=elem.offsetTop;while(elem=elem.offsetParent)
{ox+=elem.offsetLeft;oy+=elem.offsetTop;};};var x=e.pageX-ox;var y=e.pageY-oy;var w=this.file.offsetWidth;var h=this.file.offsetHeight;if(x<0||y<0||x>this.offsetWidth||y>this.offsetHeight){x=0;y=0;h=0;w=30;}
this.file.style.top=y-(h/2)+'px';this.file.style.left=x-(w-30)+'px';};},stylizeById:function(id)
{this.stylize(document.getElementById(id));},stylizeAll:function()
{if(!this.fini){this.init();};if(!this.able){return;};var inputs=document.getElementsByTagName('input');for(var i=0;i<inputs.length;i++)
{var input=inputs[i];if(input.type=='file'&&input.className.indexOf(this.fileClass)!=-1&&input.parentNode.className.indexOf(this.wrapClass)!=-1)
{this.stylize(input);};};}};