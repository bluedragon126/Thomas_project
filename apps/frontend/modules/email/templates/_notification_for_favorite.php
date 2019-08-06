<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
  <tr><td><?php echo 'Bästa BT Insider,' ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <?php if($item_type_arr[0] == 'article'):?>
  <tr><td><?php echo 'En kommentar har lämnats i artikeln med namnet '.$item_type_arr[2] ?></td></tr>
  <tr><td><?php echo 'För att läsa kommentaren klicka på följande länk: ' ?><a href="<?php echo 'http://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$item_type_arr[1] ?>"><?php echo 'http://'.$host_str.'/borst/commentOnBorstArticle/article_id/'.$item_type_arr[1] ?></a></td></tr>
  <?php endif;?>
  
  <?php if($item_type_arr[0] == 'analysis'):?>
  <tr><td><?php echo 'En kommentar har lämnats i analysen med namnet '.$item_type_arr[2] ?></td></tr>
  <tr><td><?php echo 'För att ta del av kommentaren klicka på följande länk: ' ?><a href="<?php echo 'http://'.$host_str.'/sbt/commentOnArticle/article_id/'.$item_type_arr[1] ?>"><?php echo 'http://'.$host_str.'/sbt/commentOnArticle/article_id/'.$item_type_arr[1] ?></a></td></tr>
  <?php endif;?>
  
  <?php if($item_type_arr[0] == 'forum'):?>
  <tr><td><?php echo 'En kommentar har fällts i forumtråden med namnet '.$item_type_arr[2] ?></td></tr>
  <tr><td><?php echo 'För att ta del av kommentaren klicka på följande länk: ' ?><a href="<?php echo 'http://'.$host_str.'/forum/commentOnForumTopic/forumid/'.$item_type_arr[1] ?>"><?php echo 'http://'.$host_str.'/forum/commentOnForumTopic/forumid/'.$item_type_arr[1] ?></a></td></tr>
  <?php endif;?>
  
  <?php if($item_type_arr[0] == 'blog'):?>
  <tr><td><?php echo 'En kommentar har lämnats i bloggen med namnet '.$item_type_arr[2] ?></td></tr>
  <tr><td><?php echo 'För att ta del av kommentaren klicka på följande länk: ' ?><a href="<?php echo 'http://'.$host_str.'/sbt/sbtBlogDetails/blog_id/'.$item_type_arr[1] ?>"><?php echo 'http://'.$host_str.'/sbt/sbtBlogDetails/blog_id/'.$item_type_arr[1] ?></a></td></tr>
  <?php endif;?>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Med vänlig hälsning' ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Börstjänaren' ?></td></tr>
  </tr>
</table>
