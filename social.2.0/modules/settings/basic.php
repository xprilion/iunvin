<div id="dPreview" align="center" onclick="bgPreview()"></div>
<div class="whiteDiv"><div class="right uMenO uMenOut" onclick="$('#photoSelect').toggle();">Upload</div>Background:<br>
<br><div id="photoSelect">
		<form id="upload" method="post" action="bg_upload.php" enctype="multipart/form-data">
			<div id="drop">
				Drop Here
				<a>Browse</a>
				<input type="file" name="upl" />
			</div>
<div id="photos"></div>
		</form>

</div>
</div>
<div class="whiteDiv">
Theme: 
<div class="whiteDiv">
	<li class="themes blueT" onclick="thm('iunv')"></li>
	<li class="themes redT" onclick="thm('red')"></li>
	<li class="themes blackT" onclick="thm('black')"></li>
	<li class="themes greenT" onclick="thm('green')"></li>
</div>
</div>

<div class="okSubmit defSubmit" onclick="saveSettings()" id="stSave">Save</div><div class="defSubmit skipSubmit">Cancel</div><div class="defSubmit skipSubmit">Defaults</div>
<br>
<hr>
<br>