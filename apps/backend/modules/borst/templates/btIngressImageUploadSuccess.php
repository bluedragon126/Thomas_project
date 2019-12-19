<style type="text/css">
body{ font-family: Verdana,Arial,Helvetica,sans-serif; color: #000000; font-size:13px; background: #fff; margin: 0px; padding: 20px; }
h1{ margin: 0px 0px 20px 0px; font-size:18px; font-weight:bold; }
.caution{ color: red; font-weight: bold; }
a:link{ color: #0000cc; text-decoration: none; }
a:visited{ color: #0000cc; text-decoration: none; }
a:hover{ color: #0000ff; text-decoration: underline; }
a:active{ color: #ff0000; text-decoration: none; }
</style>
<div id="img_upload">
<?php if($action_mode == 'upload'): ?>
	<h1><?php echo 'Upload image'; ?></h1>
	<p class="caution"><strong><?php echo 'Note:' ?></strong><?php echo 'Endast JPG-, GIF- och PNG-bilder kan laddas upp. Maximal storlek för en bild är 465 x 465 px. Större bilder kommer, om möjligt, att skalas ned.' ?></p>
	<div id="bt_art_ingress_error_msg" class="float_left" style="color:#FF0000;"><?php echo $errors; ?></div>
	<p><?php //echo $upload_exp; ?></p>
	<form action="" method="post" enctype="multipart/form-data">
	  <input type="file" name="probe" />
	  <br>
	  <br>
	  <input type="submit" value="<?php echo 'OK - Upload'; ?>">
	</form>
	<p style="font-size:11px;">[ <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/btIngressImageUpload'; ?>/mode/show_uploaded_images"><?php echo 'Uploaded images'; ?></a> ]</p>
<?php endif; ?>


<?php if($action_mode == 'show_uploaded_images'): ?>
   <?php
	if (isset($p))  $p = intval($p); else $p = 1;
	$c=0;
	$handle=opendir($uploaded_images_path);
	while ($file = readdir($handle))
	{
		if(preg_match('/\.jpg$/i', $file) || preg_match('/\.png$/i', $file) || preg_match('/\.gif$/i', $file))
		{ 
			if(strstr($file, 'large'))
				$images[] = $file;
		}
	}
	closedir($handle);
	if(isset($images))
	{
		$images_count = count($images);
		$show_images_from = $p * $images_per_page - $images_per_page;
		$show_images_to =   $p * $images_per_page;
		if($show_images_to > $images_count) $show_images_to = $images_count;
	}
	else $images_count = 0;
   ?>
   <p>
   	<?php if($p>1):?> 
   		[ <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/btIngressImageUpload'; ?>/mode/show_uploaded_images/p/<?php echo $p-1; ?>">&laquo;</a> ] 			
	<?php endif; ?>
   	<?php if($p*$images_per_page < $images_count):?> 
		[ <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/btIngressImageUpload' ?>/mode/show_uploaded_images/p/<?php echo $p+1; ?>">&raquo;</a> ] 
	<?php endif; ?>
   [ <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/btIngressImageUpload'; ?>/mode/upload"><?php echo 'Uploaded images'; ?></a> ]
   </p>
   <hr />
   <p>
	<?php if($images_count > 0): ?>
		<?php for($i=$show_images_from;$i<$show_images_to;$i++)	{	?>
			<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/btIngressImageUpload'; ?>/uploaded_image_selected/<?php echo $images[$i]; ?>"><img style="margin: 0px 15px 15px 0px;" src="<?php echo "http://".$host_str."/uploads/articleIngressImages/".$images[$i]; ?>" alt="<?php echo $images[$i]; ?>" height="100" border="0"></a>
		<?php } ?>
    <?php else: ?>
     	<i><?php echo 'No images available.'; ?></i>
    <?php endif; ?>
   </p>
<?php endif; ?>


<?php if($action_mode == 'uploaded'): ?>
	<?php if (isset($_FILES['probe'])):?>
   		<h1><?php echo 'Upload image'; ?></h1>
    	<?php if(isset($image_manipulated)):?>
      		<p><?php echo $image_manipulated; ?></p>
		<?php else:?>
			<p><?php echo 'Image successful uploaded.'; ?></p>
		<?php endif; ?>  
	<?php endif; ?>  
	<div><img src="<?php echo 'http://'.$host_str.'/uploads/articleIngressImages/'.$filename ?>" alt="" height="100" border="1"></div>
  	<p><?php echo $lang['paste_image']; ?></p>
  	<p><button title="<?php echo 'Insert image normal'; ?>" onClick="opener.insert('ingress_bild','<?php echo str_replace('_large.','.',$filename); ?>'); window.close()">Done</button>
  	</p>
<?php endif; ?>
</div>
<script language="javascript">
if(document.getElementById('bt_art_ingress_error_msg').innerHTML == 'File Uploaded Successfully')
{
	opener.showUploadMessage('bt_art_ingress_upload_msg','<?php echo $errors; ?>','ingress_bild','<?php echo $filename; ?>');
	setTimeout("window.close()",1500);
}
</script>