<style type="text/css">#newsletter_other_links a { color: #114993;} </style>
<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
  <div id="newsletter_other_links" class="float_left widthall" style="width:950px; margin-bottom:20px;">
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/newsletterForm' ?>">Skicka newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/sentMailList' ?>">Skickade newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/addRemoveEmail' ?>">L&auml;gg till/ta bort Mejl</a> &nbsp;&nbsp;
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/newsletterUser' ?>">Lista komma-separerad</a> &nbsp;&nbsp;
  <a  href="<?php echo 'http://'.$host_str.'/backend.php/borst/semicolonSeperater'?>">Lista semicolon-separerad</a> &nbsp;&nbsp;
  <a style="font-weight:bold;" href="<?php echo 'http://'.$host_str.'/backend.php/borst/createNewsletter' ?>">Add Newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/searchNewsletterSubscriber' ?>">Search Newsletter Subscriber</a>
  </div>
   <div class="shoph3 widthall">Newsletter</div>
	<div class="float_left listing" style="width:60%;">
	  <div class="float_left widthall" style="border:1px solid #666666; width:60%; padding:5px 0 5px 5px;">
		<?php include_partial('borst/newsletter_list_partial', array('all_type'=>$all_type,'host_str'=>$host_str)) ?>
	  </div>
	</div>
	</div>
</div>

</div>
<!-- ui-dialog-edit-category -->
<div id="edit_newsletter_box" title="Edit Newsletter Confirmation">
<form name="update_newsletter_name" id="update_newsletter_name" method="post" action="">
  <input type="hidden" name="edit_newsletter_id" id="edit_newsletter_id"/>
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="edit_newsletter_msg">Message:</td>
	</tr>
	<tr>
		<td><input type="text" name="newsletter_name" id="newsletter_name" value=""/></td>
	</tr>
 </table>
</form>
</div>

<!-- ui-dialog-delete-newsletter -->
<?php /*?><div id="delete_category_box" title="Delete Category Confirmation">
<form name="delete_article_category" id="delete_article_category" method="post" action="">
 <input type="hidden" name="delete_cat_id" id="delete_cat_id"/>
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_category_msg">Message:</td>
	</tr>
 </table>
 </form>
</div><?php */?>