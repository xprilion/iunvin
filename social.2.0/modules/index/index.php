<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title="Welcome to iunv!">
<style>
#jkl{
cursor: default;
position: fixed;
top: 0px;
left: 0px;
right: 0px;
bottom: 0px;
background: rgb(255,255,255); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(237,237,237,1) 45%, rgba(226,226,226,1) 68%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(45%,rgba(237,237,237,1)), color-stop(68%,rgba(226,226,226,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(237,237,237,1) 45%,rgba(226,226,226,1) 68%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(237,237,237,1) 45%,rgba(226,226,226,1) 68%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(237,237,237,1) 45%,rgba(226,226,226,1) 68%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(237,237,237,1) 45%,rgba(226,226,226,1) 68%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e2e2e2',GradientType=0 ); /* IE6-9 */
z-index:  9999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999;
display: block;
}

#jklo{
text-decoration: none;
font-size: 64px;
font-weight: bold;
cursor: pointer;
color: #1288ff;
font-family:Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
}

#jklo:hover{
color: #12ccff;
}

#jklm{
font-size: 40px;
background: rgb(237,237,237); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(237,237,237,1) 1%, rgba(239,239,239,1) 43%, rgba(255,255,255,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,rgba(237,237,237,1)), color-stop(43%,rgba(239,239,239,1)), color-stop(100%,rgba(255,255,255,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(237,237,237,1) 1%,rgba(239,239,239,1) 43%,rgba(255,255,255,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(237,237,237,1) 1%,rgba(239,239,239,1) 43%,rgba(255,255,255,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(237,237,237,1) 1%,rgba(239,239,239,1) 43%,rgba(255,255,255,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(237,237,237,1) 1%,rgba(239,239,239,1) 43%,rgba(255,255,255,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */
border: 7px solid #dbdbdb;
border-radius: 10px;
padding: 3%;
display: inline-block;
font-family: Papyrus, fantasy;
margin-top: 10%;
}
</style>
<link rel="icon" href="img/small.png" type="image/x-icon">
<link rel="shortcut icon" href="img/small.png" type="image/x-icon" />
<link rel="stylesheet" href="themes/iunv.css"charset="utf-8">
<style>
#wrapper{
background: url('img/bcubes.jpg');
}
</style>
<link rel="stylesheet" href="base.css"charset="utf-8">
<script src="js/jquery.min.js" charset="utf-8"></script>
<script src="js/scripts.js" charset="utf-8"></script>
<script>
$(document).keypress(function(event) {
    if(event.which == 13) {
        lsub();
    }
});
$(window).load(function(){$('#jkl').fadeOut(1000);});

function pass(){
$('#wrapper').append('<div id="viewer"><div id="vTitle" class="appTop inPage">Password assistance<div onclick="killphotoview()" title="close" class="right inPageClose">&#10006;</div></div><div id="vMain"></div></div>');
$('#vMain').load('forgot_pass.php');
$('#viewer').fadeIn();
}
</script>
<link rel="icon" href="../icon/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon" />
</head>
<body onload="totag()">
<div id="jkl">
	<center>
		<a id="jklo" href="http://iunv.in/new">iunv</a>
		<hr>
		<p id="jklm">Initialising the magic...<br><img src="index.gif" alt="Initialising the magic..." height="100px" width="100px"></p>
	</center>
</div>
<div id="wrapper">
	<div id="port1" class="viewport">
		<div id="v1">
			<div id="curtain1" class="curtain">
				<div id="member" class="inb">
					<form name="login" action="login" action="get" onsubmit="lsub">
						<input id="username" placeholder="username" type="username" class="inb noout login" name="username"><br>
						<input type="password" placeholder="password" id="password" class="inb noout login" type="password">
					</form>
				</div>
				<div id="home-sign-up" class="inb logb" onclick="lsub()" title="Sign in to iunv!"> Sign-In </div><br><br><a class="portsa right" onclick="pass();">&nbsp;&nbsp;Forgot Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<hr>
				<div id="home-sign-up" class="inb jonb" onclick="fadecon()" title="Sign up to iunv!"> Sign-Up </div>
			</div>
				<div id="content1" class="content">
				<div id="home-signup">
					<form name="signup" action="join" action="get">
						<input id="susername" placeholder="username" type="username" class="inb noout join" name="username" /><div class="tip">i<div class="tooltip">A username is what you will use to log into your account. <font color="red">Username cannot contain spaces and/or special characters.</font><br> Example: 'anubhav', 'singh123', etc.</div></div><br><br>
						<input id="spassword" placeholder="password" type="password" class="inb noout join" name="password" /><div class="tip">i<div class="tooltip">A secret phrase or combination you'll need to gain access to you account. It should be 6-32 characters long and should be easy to remember by you.</div></div><br><br>
						<input id="srepassword" placeholder="password again" type="password" class="inb noout join" name="repassword" /><div class="tip">i<div class="tooltip">Write down your password again here. Just so that you remember it better!</div></div><br>
<hr>
						<input id="semail" placeholder="email" type="email" class="inb noout join" name="email" /><div class="tip">i<div class="tooltip">Your e-mail on which your important notifications will be sent. In case you loose access to your account, this e-mail will be used to restore it.</div></div>
<hr>
						<input type="checkbox" name="terms" id="terms"> I have fully read, understood, and agree to abide by the 
<div class="portsa" onclick="port('tnc')">
Terms & Conditions
</div>
put on me while using the services offered by iunv.in		
<hr>
						<div id="home-sign-up-go" class="block home-sign-up-go" alt="Sign me up!" onclick="jsub()"> Sign Up </div>
					</form>
					<div id="home-know-more" class="inb home-sign-up-go" onclick="kmore()"> Know more </div><div id="home-know-more" class="inb home-sign-up-go" onclick="fadecon(); home('home');"> Cancel </div>
				</div>
			</div>
		</div>
		<div id="v2">
			<a href="#social"><div id="content2" class="curtainz" onclick="home('social')" alt="Click to know more about iunv.social"> </div></a>
			<div class="social">
				<div class="portcontent">
					<h1 class="nopi">
<a class="portsa" href="../">
iunv.social
</a>
					</h1>
<hr>
					<p>Our pride is our Social network, a family of over 25,000 people from all over the globe.</p>
				</div>
			</div>
			<div class="find"> find </div>
			<div class="play"> play </div>
			<div class="oth"> oth </div>
			<div class="more">
				<div class="portcontent">
					<h2> What is iunv? </h2><hr>
					iunv is an attepmt to bring back the Indian user to using native products rather than those of others.<br><br>
					</div>
			</div>
		</div>
		<div id="v3">
			<a href="#find"><div id="content3" class="curtainz" onclick="home('find')" alt="Click to know more about iunv.find"></div></a>
			<div class="find">
				<div class="portcontent">
					<h1 class="nopi">
<a class="portsa" href="../find">
iunv.find
</a>
			</h1>
<hr>
					<p>A little creation of ours, a simple search enigne for all your needs!</p>
				</div>
			</div>
			<div class="social"> Socialogoy </div>
			<div class="play"> play </div>
			<div class="oth"> oth </div>
			<div class="more">
				<div class="portcontent">
					<h2>The birth of iunv? </h2><hr>
						Well, this is where things get funny!
						<div class="portsa" onclick="secret()"> Click here! </div> if you want to know who created iunv, or when you're done doing it!
					</div>
			</div>
		</div>

		<div id="v4">
			<a href="#play"><div id="content4" class="curtainz" onclick="home('play')" alt="Click to know more about iunv.play"> </div></a>
			<div class="play">
				<div class="portcontent">
					<h1 class="nopi">
<a class="portsa" href="../play">
iunv.play
</a>
					</h1>
<hr>
					<p>All work and no play makes Jack a dull boy! A collection of delightful games to relax your busy mind!</p>
				</div>
			</div>
			<div class="find"> find </div>
			<div class="social"> social </div>
			<div class="oth"> oth </div>
			<div class="more">
				<div class="portcontent">
					<h2> Why iunv? </h2><hr>
					iunv, because we care for you, we grow with you and we shall be with you.
					</div>
			</div>
		</div>

		<div id="v5">
			<div id="slider-nav">
				<div class="prev navi" onclick="homePrev()"> < </div> <div class="next navi" onclick="homeNext()" style="margin-left: -6px;"> > </div>
			</div><br><center>
			<div id="log"><a href="../"><img src="img/log.png" alt="iunv.in" title="iunv.in"></a></div>
<hr>
&nbsp;
<div class="portsa" onclick="port('about')">
About Us
</div>
&middot;
<div class="portsa" onclick="port('contact')">
Contact Us
</div>
&middot;
<div class="portsa" onclick="port('tnc')">
Terms & Conditions
</div>
&middot;
<div class="portsa" onclick="port('privacy')">
Privacy Policy
</div>
&middot;
<div class="portsa" onclick="port('faq')">
FAQ
</div>
</center>
		</div>

		<div id="v7">
<img src='img/anubhav2.jpg' alt="Anubhav Singh" title="Anubhav Singh" class="right"/>
<div class="portsa" onclick="port('anubhav')" >Anubhav</div>
<br>
Age: 16 years
<br>Location: India
		</div>

		<div id="v6">
			<a href="#oth"><div id="content6" class="curtainz" onclick="home('oth')" alt="Click to know more about other iunv services"> </div></a>
			<div class="oth">
				<div class="portcontent">
					<h1 class="nopi">
<a class="portsa" href="../services">
iunv.services
</a>
					</h1>
<hr>
					<p>Our services, under construction for now!</p>
				</div>
			</div>
			<div class="social"> social </div>
			<div class="find"> find </div>
			<div class="play"> play </div>
			<div class="more">
				<div class="portcontent">
					<h2> Services we offer? </h2><hr>
					 	We provide almost all services you'll need in your 24 hours! <br>
							<li><div class="portsa" onclick="home('social')"> Social Network </div></li>
							<li><div class="portsa" onclick="home('find')"> Search Engine </div></li>
							<li><div class="portsa" onclick="home('play')"> Online Games </div></li>
				</div>
			</div>

		</div>

		<div id="home-nav">
			<div class="home-nav-button home-nav-active" onclick="home('home')" id="nhome"> Home </div>
			<div class="home-nav-button home-nav-inactive" onclick="home('social')" id="nsocial"> Social </div>
			<div class="home-nav-button home-nav-inactive" onclick="home('play')" id="nplay"> Play </div>
			<div class="home-nav-button home-nav-inactive" onclick="home('find')" id="nfind"> Find </div>
		</div>
             </div>
	     
	</div>

	<div id="about" class="app viewport">
		<div class="appTop">
			<div id="appClose" onclick="unport()"> Go Back </div>
			<div id="appTopText">About Us - A little bit of us.
			</div>
		</div>
		<div id="appWind">
			<div id="appContent">
				We love telling people about us! Thanks for your interest!
			</div>
		</div>
	</div>
	<div id="contact" class="app viewport">
		<div class="appTop">
			<div id="appClose" onclick="unport()"> Go Back </div>
			<div id="appTopText">Contact Us - For we love to hear from you.
			</div>
		</div>
		<div id="appWind">
			<div id="appContent">
				Want to contact us? Sure! We love catering your problems!
			</div>
		</div>
	</div>
	<div id="tnc" class="app viewport">
		<div class="appTop">
			<div id="appClose" onclick="unport()"> Go Back </div>
			<div id="appTopText">Terms and Conditions - A bit of laws.
			</div>
		</div>
		<div id="appWind">
			<div id="appContent">
				Considering the limitless opprtunities iunv provides, we shall adhere to these laws...
			</div>
		</div>
	</div>
	<div id="privacy" class="app viewport">
		<div class="appTop">
			<div id="appClose" onclick="unport()"> Go Back </div>
			<div id="appTopText">Privacy Policy - We keep secrets.
			</div>
		</div>
		<div id="appWind">
			<div id="appContent">
				You trust us, we keep your secret.
			</div>
		</div>
	</div>
	<div id="faq" class="app viewport">
		<div class="appTop">
			<div id="appClose" onclick="unport()"> Go Back </div>
			<div id="appTopText">Frequently Asked Questions - Solving your problems.
			</div>
		</div>
		<div id="appWind">
			<div id="appContent">
				You must be having some queries. We have answers.
			</div>
		</div>
	</div>
	<div id="profileMissing" class="app viewport">
		<div class="appTop">
			<div id="appClose" onclick="unport()"> Go Back </div>
			<div id="appTopText">iunv.labyrinth - Profile Missing
			</div>
		</div>
		<div id="appWind">
			<div id="appContent">
				Sorry the profile was not found.
			</div>
		</div>
	</div>
	<div id="storyMissing" class="app viewport">
		<div class="appTop">
			<div id="appClose" onclick="unport()"> Go Back </div>
			<div id="appTopText">iunv.labyrinth - Story Missing
			</div>
		</div>
		<div id="appWind">
			<div id="appContent">
				Sorry the requested story was not found.
			</div>
		</div>
	</div>       
</div>
<div style="display: none;">
<img src="loading.gif">
<img src="img/photo.jpg">
<img src="img/post2.png">
</div>
</body>
</html>