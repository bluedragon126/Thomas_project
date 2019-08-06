<style type="text/css">
body{ font-family: Verdana,Arial,Helvetica,sans-serif; color: #000000; font-size:13px; background: #fff; margin: 0px; padding: 20px; }
h1{ margin: 0px 0px 20px 0px; font-size:18px; font-weight:bold; }
.caution{ color: #FF9966; font-weight: bold; }
#img_upload_error{ color:#FF0000;}
</style>
<div id="img_upload">
	<h1><?php echo 'Upload image'; ?></h1>
	<p class="caution"><strong><?php echo 'Note:' ?></strong><?php echo 'Endast JPG-, GIF- och PNG-bilder kan laddas upp. Maximal storlek för en bild är 495 x 1000 px och 150 KB. Större bilder kommer, om möjligt, att skalas ned.' ?></p>

	<p id="img_upload_error"><?php echo $errors ? $errors : '&nbsp;'; ?></p>

<!-- The data encoding type, enctype, MUST be specified as below -->
<form action="" method="post" enctype="multipart/form-data">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <!--<input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
    <!-- Name of input element determines name in $_FILES array -->
    <input name="upload_detail_image" type="file" />
	<br /><br />
    <input type="submit" value="Upload Image" />
</form>

</div>

<script language="javascript">
if(document.getElementById('img_upload_error').innerHTML == 'File Uploaded Successfully')
{
	opener.uploadMessage('forum_detail_img_upload_msg','<?php echo $errors; ?>','<?php echo $filename; ?>','forum_topic');
	setTimeout("window.close()",1500);
}
</script>