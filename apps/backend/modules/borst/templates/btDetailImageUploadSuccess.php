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
	<p class="caution"><strong><?php echo 'Note:' ?></strong><?php echo 'Endast JPG-, GIF- och PNG-bilder kan laddas upp. Maximal storlek för en bild är 600 x 800 px och 200 KB. Större bilder kommer, om möjligt, att skalas ned.' ?></p>
	<div id="bt_art_detail_error_msg" class="float_left" style="color:#FF0000;"><?php echo $errors; ?></div>

	<form id="uploadFileNew" action="" method="post" enctype="multipart/form-data">
	  <input type="file" name="probe" />
	  <br>
	  <br>
	  <input type="button" onclick="setIndicators();" value="<?php echo 'OK - Upload'; ?>">
	</form>
	<p style="font-size:11px;">[ <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/btDetailImageUpload'; ?>/mode/show_uploaded_images"><?php echo 'Uploaded images'; ?></a> ]</p>
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
   		[ <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/btDetailImageUpload'; ?>/mode/show_uploaded_images/p/<?php echo $p-1; ?>">&laquo;</a> ] 			
	<?php endif; ?>
   	<?php if($p*$images_per_page < $images_count):?> 
		[ <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/btDetailImageUpload' ?>/mode/show_uploaded_images/p/<?php echo $p+1; ?>">&raquo;</a> ] 
	<?php endif; ?>
   [ <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/btDetailImageUpload'; ?>/mode/upload"><?php echo 'Uploaded images'; ?></a> ]
   </p>
   <hr />
   <p>
	<?php if($images_count > 0): ?>
		<?php for($i=$show_images_from;$i<$show_images_to;$i++)	{	?>
			<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/btDetailImageUpload'; ?>/uploaded_image_selected/<?php echo $images[$i]; ?>"><img style="margin: 0px 15px 15px 0px;" src="<?php echo "https://".$host_str."/uploads/articleDetailImages/".$images[$i]; ?>" alt="<?php echo $images[$i]; ?>" height="100" border="0"></a>
		<?php } ?>
    <?php else: ?>
     	<i><?php echo 'No images available.'; ?></i>
    <?php endif; ?>
   </p>
<?php endif; ?>


<?php if($action_mode == 'uploaded'):?>
   <script language="javascript" type="text/javascript">
       opener.insert('article_text','<img src=<?php echo 'https://'.$host_str.'/uploads/articleDetailImages/' .$filename; ?> ></img>','<img src=<?php echo 'https://'.$host_str.'/uploads/articleDetailImages/' .$filename; ?> ></img>');
        setTimeout("window.close()",100);
    </script>
	<?php /*if (isset($_FILES['probe'])):?>
   		<h1><?php echo 'Upload image'; ?></h1>
    	<?php if(isset($image_manipulated)):?>
      		<p><?php echo $image_manipulated; ?></p>
		<?php else:?>
			<p><?php echo 'Image successful uploaded.'; ?></p>
		<?php endif; ?>  
	<?php endif; ?>  
	<div><img src="<?php echo 'https://'.$host_str.'/uploads/articleDetailImages/'.$filename ?>" alt="" height="100" border="1"></div>
  	<p><?php echo $lang['paste_image']; ?></p>
   	
	<p>text<br><?php $imageCenter = "style=text-align: center; display: block; margin-left: auto; margin-right: auto"; ?>
   		<button style="width:25px; height:25px;" title="<?php echo 'Insert image normal'; ?>" onClick="opener.insert('article_text','<img src=<?php echo 'https://'.$host_str.'/uploads/articleDetailImages/' .$filename; ?> ></img>'); window.close()"><img src="/images/img_normal.gif" alt="<?php echo 'Insert image normal'; ?>" wifth="11" height="11" /></button>&nbsp;

  		<button style="width:25px; height:25px;" title="<?php echo 'Insert image floating left'; ?>" onClick="opener.insert('article_text','<img tabindex=0 align=left src=<?php echo 'https://'.$host_str.'/uploads/articleDetailImages/' .$filename; ?>></img>'); window.close()"><img src="/images/img_left.gif" alt="<?php echo 'Insert image floating left'; ?>" wifth="11" height="11" /></button>&nbsp;

  		<button style="width:25px; height:25px;" title="<?php echo 'Insert image floating right'; ?>" onClick="opener.insert('article_text','<img align=right src=<?php echo 'https://'.$host_str.'/uploads/articleDetailImages/' .$filename; ?>></img>'); window.close()"><img src="/images/img_right.gif" alt="<?php echo 'Insert image floating right'; ?>" wifth="11" height="11" /></button>
        </p>
<?php */ endif; ?>
</div>

 <script language="javascript" type="text/javascript">
     //setTimeout("window.close()",1500);
       function setIndicators(){
        document.forms["uploadFileNew"].submit(); 
       }
   
   </script>