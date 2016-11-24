<?php include('header.php'); ?>
<title> iunv.Help-Central </title>
<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
});
</script>

<style>

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
<h1> I You And We - are secure with us.</h1>
<div id="concern">
<table width="99%" height="99%">
<tr height="30px"><td width="50%">How may we help you?<hr></td>
<td width="50%"> Just can't figure out the problem? <hr></td></tr>
<tr>
	<td id="how" class="to">
		<ul id="bulle">
			<a href="account"><li> Forgot Password </li></a>
			<a href="account"><li> Account compromised </li></a>
			<a href="account"><li> Unable to access </li></a>
		</ul>
	</td>
	<td class="to">
		<form name="help" action="help-done" method="post">
			<input type="text" name="name" class="textii" placeholder="Fullname" />
			<input type="email" name="email" class="textii" placeholder="Email" />
			<textarea id="problem" name="concern"> </textarea>
			<input type="submit" value="Submit issue" id="repl"> </input>
		</form>
	</td>
</tr>
</table>

</div>








</div>

