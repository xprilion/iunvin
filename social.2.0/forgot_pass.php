<font size="6"><div class="iTop">Restore account access</font><font size="5"><div class="right doOk" id="iBut" onclick="resPass()">Restore</div></div></font>
<br>
<div class="iBox"><br><br>
<input class="textInput" type="text" id="pemail" placeholder="Email" />
<ul type="square"> 
<li>Your password will be mailed to this email.</li>
</ul>
</div>
<script>
function resPass(){
var email=$('#pemail').val();
 $.ajax({
 type: "POST",
 url: "pass_mail.php",
 data: {email: email}
 }).done(function( result ) {
var res=result;
war(res);
 });
}
</script>