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
	<p class="caution"><strong><?php echo 'Note:' ?></strong><?php echo 'Endast JPG-, GIF- och PNG-bilder kan laddas upp. Maximal storlek för en bild är 495 x 1000 px och 150 KB. Större bilder kommer, om möjligt, att skalas ned.' ?></p>
	<ul>
	  <?php foreach($errors as $f) { ?>
	  <li><?php echo $f; ?></li>
	  <?php } ?>
	</ul>
	<p><?php echo $upload_exp; ?></p>
	<form action="" method="post" enctype="multipart/form-data">
	  <input type="file" name="probe" />
	  <br>
	  <br>
	  <input type="submit" value="<?php echo 'OK - Upload'; ?>">
	</form>
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
	<div><img src="<?php echo 'http://'.$host_str.'/images/analysis_images/'.$filename ?>" alt="" height="100" border="1"></div>
  	<p><?php echo $lang['paste_image']; ?></p>
  	<p>ingress<br>
  		<button style="width:25px; height:25px;" title="<?php echo 'Insert image normal'; ?>" onClick="opener.insert('<?php echo $image_path; ?>','<?php echo '/images/analysis_images/' .$filename; ?>'); window.close()"><img src="/images/img_normal.gif" alt="<?php echo 'Insert image normal'; ?>" width="11" height="11" /></button>
  
 		<button style="width:25px; height:25px;" title="<?php echo 'Insert image floating left'; ?>" onClick="opener.insert('<?php echo $image_path; ?>','<?php echo '/images/analysis_images/' .$filename; ?>', 'left'); window.close()"><img src="/images/img_left.gif" alt="<?php echo 'Insert image floating left'; ?>" width="11" height="11" /></button>&nbsp;

  		<button style="width:25px; height:25px;" title="<?php echo 'Insert image floating right'; ?>" onClick="opener.insert('<?php echo $image_path; ?>','<?php echo '/images/analysis_images/' .$filename; ?>', 'right'); window.close()"><img src="/images/img_right.gif" alt="<?php echo 'Insert image floating right'; ?>" width="11" height="11" /></button>
  	</p>
 
<?php endif; ?>
</div>