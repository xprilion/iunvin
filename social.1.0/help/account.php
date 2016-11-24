<title> Account - iunv.Help </title>

<?php 

include('header.php'); ?>
<style>

#searchbar{position:fixed;top:25px;left:180px;color:#000;display:inline-block;z-index:99999999999;}
#se{height:15px;width:500px;padding:1em;border:1px solid #cdcdcd;}
#se:focus{border:1px solid #1288dd;outline:1px;}
</style>
<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
});
</script>


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
<h1>Problem with your account?</h1>

<div id="concern">

We want iunv to be free from fake accounts. So, please provide your registered email and we will contact you shortly to verify if you hold the account rightfully.
<form name="help" action="help-done" method="post">
			<input type="text" name="name" class="textii" placeholder="Fullname" /><br>
			<input type="email" name="email" class="textii" placeholder="Email" /><br>
			Something you feel will let us eshtablish your identity faster.<br><textarea id="problem" name="concern"> </textarea>
			<input type="submit" value="Submit issue" id="repl"> </input>
		</form>
</div>
</div>

