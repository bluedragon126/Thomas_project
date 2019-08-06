
<style type="text/css">
body{ font-family: Verdana,Arial,Helvetica,sans-serif; color: #000000; font-size:13px; background: #fff; margin: 0px; padding: 20px; }
h1{ margin: 0px 0px 20px 0px; font-size:18px; font-weight:bold; }
.caution{ color: #FF9966; font-weight: bold; }
a:link{ color: #0000cc; text-decoration: none; }
a:visited{ color: #0000cc; text-decoration: none; }
a:hover{ color: #0000ff; text-decoration: underline; }
a:active{ color: #ff0000; text-decoration: none; }
#indicator{ padding:5px;padding-top:5px; display:none; float:left; position:relative; }
#submitFile { float:left; position:relative;}
</style>

<div id="img_upload">
	<h1><?php echo 'Upload image'; ?></h1>
	<p class="caution"><strong><?php echo 'Note:' ?></strong><?php echo 'Endast JPG-, GIF- och PNG-bilder kan laddas upp. Maximal storlek fr en bild r 407 x 238 px. Strre bilder kommer, om mjligt, att skalas ned.' ?></p>
	<div id="ingress_error_msg" class="float_left" style="color:#FF0000;"><?php echo ($filenameFull ? $filenameFull.' ' : ''). $errors; ?></div>
	<p><?php echo $upload_exp; ?></p>
	<form action="" method="post" enctype="multipart/form-data" id="uploadFile" >
	  <input type="file" name="probe" />
	  <br>
	  <br>
	  <input type="button"  onclick="setIndicators();" id="submitFile" value="<?php echo 'OK - Upload'; ?>">
	  <span id="indicator"><img align="absmiddle"  src="/images/indicator.gif"></span>
	</form>
</div>

<script language="javascript" type="text/javascript">
if(document.getElementById('ingress_error_msg').innerHTML == '<?php echo ($filenameFull ? $filenameFull.' ' : '') ?>Uppladdad framgångsrikt')
{
	opener.showUploadMessage('sbt_image','upload_msg','<?php echo $filename; ?>','<?php echo ($filenameFull ? $filenameFull.' ' : '').$errors; ?>');
	setTimeout("window.close()",1500);
}
function setIndicators()
{
	document.getElementById('ingress_error_msg').style.display = 'none';
	document.getElementById('indicator').style.display = 'block';
	document.getElementById("submitFile").disabled = true;	
	document.forms["uploadFile"].submit();
}
</script>