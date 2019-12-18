<script language="JavaScript" type="text/JavaScript">
function submitForm(the_form) {
//document.search_email.value = ""; // Clear the form
the_form.search_email.value = "";
}
</script>

<style type="text/css">
.listing table td{ border:0px;}
.listing table td{ font-weight:normal;}
#newsletter_other_links a {color:#114993;}
#add_remove_table td {font-size:11px;}
table.classic td {border-bottom:1px solid #DCDCDC;padding:3px 5px;}
</style>
<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
  <div id="newsletter_other_links" class="float_left widthall" style="width:950px;">
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/newsletterForm' ?>">Skicka newsletter</a>&nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/sentMailList' ?>">Skickade newsletter</a> &nbsp;&nbsp;
  <a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/addRemoveEmail' ?>">L&auml;gg till/ta bort Mejl</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/newsletterUser' ?>">Lista komma-separerad</a> &nbsp;&nbsp;
  <a  href="<?php echo 'https://'.$host_str.'/backend.php/borst/semicolonSeperater'?>">Lista semicolon-separerad</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/createNewsletter' ?>">Add Newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/searchNewsletterSubscriber' ?>">Search Newsletter Subscriber</a>
  </div>
   <div class="shoph3 widthall"><!--Newsletter Form--></div>
	<div class="float_left listing">
	  <div class="float_left widthall">
		<div class="backend_search_section">
		  <form name="search_users" method="post" action="<?php //echo url_for('newsletter/addRemoveEmail') ?>">
			<input type="hidden" name="mode" value="add_remove_email">
			<input type="text" name="search_email" value="<?php echo $sf_params->get('search_email') ? $sf_params->get('search_email') : '' ?>" >
			&nbsp;
			<input type="submit" name="Submit2" value="Sök">
			<input type="reset" class="submit" name="reset" value="rensa" onClick="submitForm(this.form)">
			antal rader:
			<?php //pv($numResults) ?>
		  </form>
		</div>
		<table id="add_remove_table">
		  <tr>
			<td> lägg till mejl i konto-tabellen:
			  <form name="add_konto" method="post" action="<?php //echo url_for('newsletter/addRemoveEmail') ?>">
				<input type="hidden" name="mode" value="add_email">
				<input type="hidden" name="tbl" value="newsletter_account">
				<input name="email" type="text" size="30">
				<input type="submit" name="Submit" value="Skicka">
			  </form></td>
			<td> lägg till mejl i publika tabellen:
			  <form name="add_surf" method="post" action="<?php //echo url_for('newsletter/addRemoveEmail') ?>">
				<input type="hidden" name="mode" value="add_email">
				<input type="hidden" name="tbl" value="newsletter_public">
				<input name="email" type="text" size="30">
				<input type="submit" name="Submit" value="Skicka">
			  </form></td>
		  </tr>
		  <tr>
			<td valign="top"><input type="hidden" id="delete_acc_email_id" name="delete_acc_email_id" /></td>
			<td valign="top"><input type="hidden" id="delete_pub_email_id" name="delete_pub_email_id" /></td>
		  </tr>
		  <tr>
			<td valign="top">
				<table class="classic" cellpadding="0" cellspacing="0">
					<tr><th valign="top" colspan="2"><span class="shoph3">Konto tabell <?php echo $emaillist_account_pager->getNbResults() ?> st</span></th></tr>
					<tr>
					  <th valign="top" style="text-align:center; background-color:#99CCFF;">X</th>
					  <th valign="top" style="width:290px; background-color:#99CCFF; padding-left:5px;">E-post</th>
					</tr>
					<?php $i = 1; foreach($emaillist_account_pager->getResults() as $account):?>
					<tr>
					  <td><a title="Ta bort <?php echo $account->email ?>" href="javascript:open_confirmation('Vill du verkligen ta bort <?php echo $account->email ?>','<?php echo $account->id; ?>','delete_acc_email_confirm_box','delete_acc_email_msg')"><img src="/images/cross.png" alt="arrow" /></a></td>
					  
					  <td><?php echo $i . ". " . $account->email; ?></td>
					</tr>
					<?php $i++; endforeach; ?>
					<?php if ($emaillist_account_pager->haveToPaginate()): ?>
					<tr>
						<td <?php echo($style) ?> colspan="9" align="right">
						<div class="paginationwrapper">
			  				<div class="pagination">
							<?php if ($emaillist_account_pager->haveToPaginate()): ?>
							<a id="<?php echo $emaillist_account_pager->getFirstPage(); ?>" href="/backend.php/borst/addRemoveEmail/acc_page/<?php echo $emaillist_account_pager->getFirstPage().$acc_ext; ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> 
							
							<a id="<?php echo $emaillist_account_pager->getPreviousPage(); ?>" style="cursor:pointer;" href="/backend.php/borst/addRemoveEmail/acc_page/<?php echo $emaillist_account_pager->getPreviousPage().$acc_ext; ?>"> < </a>
							
							<?php $links = $emaillist_account_pager->getLinks(11); foreach ($links as $page): ?>
							<?php if($page == $emaillist_account_pager->getPage()): ?>
							<?php echo '<span class="selected">'.$page.'</span>' ?>
							<?php else: ?>
							<a id="<?php echo $page; ?>" style="cursor:pointer;" href="/backend.php/borst/addRemoveEmail/acc_page/<?php echo $page.$acc_ext; ?>"><?php echo $page; ?> </a>
							<?php endif; ?>
							
							<?php if ($page != $emaillist_account_pager->getCurrentMaxLink()): ?>
							-
							<?php endif ?>
							<?php endforeach ?>
							<a id="<?php echo $emaillist_account_pager->getNextPage(); ?>" style="cursor:pointer;" href="/backend.php/borst/addRemoveEmail/acc_page/<?php echo $emaillist_account_pager->getNextPage().$acc_ext; ?>"> > </a> 
							<a id="<?php echo $emaillist_account_pager->getLastPage(); ?>" style="cursor:pointer;" href="/backend.php/borst/addRemoveEmail/acc_page/<?php echo $emaillist_account_pager->getLastPage().$acc_ext; ?>"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
							<?php endif ?>
							</div>
						</div>
						</td>
					 </tr>
					<?php endif; ?>
     			</table>
			</td>
    		<td valign="top">
				<table class="classic" cellpadding="0" cellspacing="0">
					<tr><th valign="top" colspan="2"><span class="shoph3">Publik tabell <?php echo $emaillist_public_pager->getNbResults() ?> st</span></th></tr>
					<tr>
					  <th valign="top" style=" text-align:center; background-color:#99CCFF;">X</th>
					  <th valign="top" style="width:290px; background-color:#99CCFF; padding-left:5px;">E-post</th>
					</tr>
					<?php $i = 1; foreach($emaillist_public_pager->getResults() as $public) :?>
					<tr>
						<td><a title="Ta bort <?php echo $public->email ?>" href="javascript:open_confirmation('Vill du verkligen ta bort <?php echo $public->email ?>','<?php echo $public->id; ?>','delete_pub_email_confirm_box','delete_pub_email_msg')"><img src="/images/cross.png" alt="arrow" /></a></td>
						<td><?php echo $i . ". " . $public->email; ?></td>
					</tr>
					<?php $i++; endforeach; ?>
					<?php if ($emaillist_public_pager->haveToPaginate()): ?>
					<tr>
						<td <?php echo($style) ?> colspan="9" align="right">
						<div class="paginationwrapper">
			  				<div class="pagination">
							<?php if ($emaillist_public_pager->haveToPaginate()): ?>
							<a id="<?php echo $emaillist_public_pager->getFirstPage(); ?>" href="/backend.php/borst/addRemoveEmail/pub_page/<?php echo $emaillist_public_pager->getFirstPage().$pub_ext; ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> 
						<a id="<?php echo $emaillist_public_pager->getPreviousPage(); ?>" style="cursor:pointer;" href="/backend.php/borst/addRemoveEmail/pub_page/<?php echo $emaillist_public_pager->getPreviousPage().$pub_ext; ?>"> < </a>
						
						<?php $links = $emaillist_public_pager->getLinks(11); foreach ($links as $page): ?>
						<?php if($page == $emaillist_public_pager->getPage()): ?>
						<?php echo '<span class="selected">'.$page.'</span>' ?>
						<?php else: ?>
						<a id="<?php echo $page; ?>" style="cursor:pointer;" href="/backend.php/borst/addRemoveEmail/pub_page/<?php echo $page.$pub_ext; ?>"><?php echo $page; ?> </a>
						<?php endif; ?>
						
						<?php if ($page != $emaillist_public_pager->getCurrentMaxLink()): ?>
						-
						<?php endif ?>
						<?php endforeach ?>
						<a id="<?php echo $emaillist_public_pager->getNextPage(); ?>" style="cursor:pointer;" href="/backend.php/borst/addRemoveEmail/pub_page/<?php echo $emaillist_public_pager->getNextPage().$pub_ext; ?>"> > </a> 
						<a id="<?php echo $emaillist_public_pager->getLastPage(); ?>" style="cursor:pointer;" href="/backend.php/borst/addRemoveEmail/pub_page/<?php echo $emaillist_public_pager->getLastPage().$pub_ext; ?>"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
							<?php endif ?>
							</div>
						</div>
						</td>
					 </tr>
					<?php endif; ?>
      			</table>
			</td>
  		  </tr>
		</table>
	  </div>
	</div>
	</div>
</div>
</div>
<!-- ui-dialog-delete-article -->
<div id="delete_acc_email_confirm_box" title="Delete Account Email Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_acc_email_msg">Message:</td>
	</tr>
 </table>
</div>
<!-- ui-dialog-delete-article -->
<div id="delete_pub_email_confirm_box" title="Delete Public Email Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_pub_email_msg">Message:</td>
	</tr>
 </table>
</div>