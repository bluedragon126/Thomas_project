<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
  <tr><td><?php echo 'Tips från Börstjänaren!' ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Din vän '.$user['sender'].' ('.$user['sender_mail'].') vill tipsa dig om nedanstående artikel på Börstjänaren.' ?></td></tr>
  <tr><td><?php echo html_entity_decode($user['message']) ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo html_entity_decode($user['rub']) ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><a href="<?php echo 'http://'.$host_str.'/borst/borstArticleDetails/article_id/'.$user['article_id'] ?>"><?php echo 'Läs hela artikeln'?></a></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><a href="<?php echo 'http://'.$host_str ?>"><?php echo 'http://'.$host_str ?></a></td></tr>
  </tr>
</table>