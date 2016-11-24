<?php include('header.php'); ?>
<title> Dashboard - iunv.Help </title>
<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
});
</script>
<style>


#navlist{position:relative;}
#navlist li{margin:0;padding:0;list-style:none;position:absolute;}
#navlist li, #navlist a{display:block;}

#xhome{left:0px;width:100px;height: 55px;}
#xhome{background:url('img/dashboard.jpg') 0 0;}
#xhome:hover #yhome{display: inline-block;}
#xhome:hover{border: 1px solid #f00;}

#xsearch{left:100px;width:270px;height: 55px;}
#xsearch{background:url('img/dashboard.jpg') -100 0;}
#xsearch:hover #ysearch{display: inline-block;}
#xsearch:hover{border: 1px solid #f00;}

#xblank{left:370px;width:50px;height: 55px;}
#xblank{background:url('img/dashboard.jpg') -370 0;}

#xmessage{left:420px;width:50px;height: 55px;}
#xmessage{background:url('img/dashboard.jpg') -420 0;}
#xmessage:hover #ymessage{display: inline-block;}
#xmessage:hover{border: 1px solid #f00;}

#xnotify{left:470px;width:50px;height: 55px;}
#xnotify{background:url('img/dashboard.jpg') -470 0;}
#xnotify: #ynotify{display: block;}
#xnotify:hover{border: 1px solid #f00;}

#xlogout{left:520px;width:200px;height: 55px;}
#xlogout{background:url('img/dashboard.jpg') -520 0;}
#xlogout:hover #ylogout{display: inline-block;}
#xlogout:hover{border: 1px solid #f00;}

#xfeed{left:0px; top: 55px;width:240px;height: 400px;}
#xfeed{background:url('img/dashboard.jpg') 0 -55;}
#xfeed: #yfeed{display: inline-block;}
#xfeed:hover{border: 1px solid #f00;}

#xpro{left:240px; top: 55px;width:400px;height: 130px;}
#xpro{background:url('img/dashboard.jpg') -240 -55;}
#xpro:hover #ypro{display: inline-block;}
#xpro:hover{border: 1px solid #f00;}

#xprob{left:240px; top: 185px;width:400px;height: 30px;}
#xprob{background:url('img/dashboard.jpg') -240 -185;}
#xprob:hover #yprob{display: inline-block;}
#xprob:hover{border: 1px solid #f00;}

#xmyopicto{left:240px; top: 215px;width:400px;height: 240px;}
#xmyopicto{background:url('img/dashboard.jpg') -240 -215;}
#xmyopicto:hover #ymyopicto{display: inline-block;}
#xmyopicto:hover{border: 1px solid #f00;}

#xmenu{left:640px; top: 55px;width:78px;height: 300px;}
#xmenu{background:url('img/dashboard.jpg') -640 -55;}
#xmenu:hover #ymenu{display: inline-block;}
#xmenu:hover{border: 1px solid #f00;}

#xblank2{left:640px; top: 355px;width:78px;height: 97px;}
#xblank2{background:url('img/dashboard.jpg') -640 -355;}

#xfeedback{left:588px; top: 446px;width:100px;height: 30px;}
#xfeedback{background:url('img/dashboard.jpg') 128 30;}
#xfeedback:hover #yfeedback{display: inline-block;}
#xfeedback:hover{border: 1px solid #f00;}

#xhelp{left:688px; top: 446px;width:28px;height: 30px;}
#xhelp{background:url('img/dashboard.jpg') 28 30;}
#xhelp:hover #yhelp{display: inline-block;}
#xhelp:hover{border: 1px solid #f00;}

.tipp{
display: none;
position: absolute;
background: #000;
color: #12ddff;
font-weight: bold;
cursor: default;
height: auto;
width: 240px;
top: 60px;
left: 0px;
z-index: 99999;
box-shadow: 0px 0px 20px 0px #000;
border: 5px solid #1288dd;
padding: 0.5em;
}


.tipp3{
display: none;
position: absolute;
background: #000;
color: #12ddff;
font-weight: bold;
cursor: default;
height: auto;
width: 240px;
bottom: 40px;
right: 0px;
z-index: 99999;
box-shadow: 0px 0px 20px 0px #000;
border: 5px solid #1288dd;
padding: 0.5em;
}
</style>
<div id="wall" onclick="document.getElementById('menu').style.display='none';">
<div id="helpbar">
<a href="./"><li> Help Central </li></a>
<a href="faq"><li> FAQ </li></a>
<a href="basics"><li> The Basics </li></a>
<a href="dashboard"><li> Dashing up </li></a>
<a href="friends"><li> Hunting friends </li></a>
<a href="messages"><li> Messaging </li></a>
<a href="photos"><li> Photo Sharing </li></a>
<a href="stories"><li> The Story Board </li></a>
<a href="myopicto"><li> Myopicto&reg; </li></a>
<a href="deleting"><li> Deleting stuff </li></a>
<a href="misc"><li> Misc </li></a>
</div>
<div id="helpcontent">
<h1> iunv Dashboard </h1>
<div id="concern">
This is what your dashboard looks like:
<ul id="navlist">
<li id="xhome"><div class="tipp" id="yhome"> This is the iunv logo. <br><br>You will find this on every page of this site. Clicking here will take you to the iunv.social dashboard from anywhere. </div></li>
<li id="xsearch"><div class="tipp" id="ysearch"> This is the searchbar. <br><br> As soon as you enter any thing here, you'll be shown results of people with refrence to your input. If you hit enter, you'll be shown extended search results.</div></li>
<li id="xblank"></li>
<li id="xmessage"><div class="tipp" id="ymessage"> This is the message notification.<br><br> Whenever you have unread messages, this icon will change to <img src="../icon/message.png" /></div></li>
<li id="xnotify" onmouseover="document.getElementById('ynotify').style.display='block';" onmouseout="document.getElementById('ynotify').style.display='none';"><div class="tipp" id="ynotify"> This is the notifications icon.<br><br> </div></li>
<li id="xlogout"><div class="tipp" id="ylogout"> This is the account menu.<br><br>Clicking on this will reveal the logout option.</div></li>
<li id="xfeed" onmouseover="document.getElementById('yfeed').style.display='block';" onmouseout="document.getElementById('yfeed').style.display='none';"><div class="tipp" id="yfeed"> This is the feed section.<br><br>All that you post or upload will appear here. Clicking on any feed carusel will take you to that respective post</div></li>
<li id="xpro"><div class="tipp" id="ypro"> This is your info section.<br><br> This is how you and your friends will see your info. </div></li>
<li id="xprob"><div class="tipp" id="yprob"> This is the profile navigation bar.<br><br> You can click on these buttons to explore your profile.</div></li>
<li id="xmyopicto"><div class="tipp" id="ymyopicto"> This is your Myopicto&reg;.<br><br> A Myopicto&reg; is a photo that tells people about your thoughts and ideas. This at many times is the first thing people notice in your profile.</div></li>
<li id="xmenu"><div class="tipp3" id="ymenu"> This is the site navigation menu.<br><br> Try clicking these buttons to explore the site to its best. </div></li>
<li id="xblank2"></li>
<li id="xfeedback"><div class="tipp3" id="yfeedback"> This is the feedback option.<br><br> Have any idea or suggestion for us? Tell us fast!</div></li>
<li id="xhelp"><div class="tipp3" id="yhelp"> This is the Help option.<br><br> This will take you to the Help Center.</div></li>
</ul>







</div>

</div>

</div>

