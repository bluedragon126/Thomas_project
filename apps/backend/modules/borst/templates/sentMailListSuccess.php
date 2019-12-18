<style type="text/css">
.listing table td{ font-weight:normal;}
#newsletter_other_links a {color:#114993;}
</style>
<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
  <div id="newsletter_other_links" class="float_left widthall" style="width:950px; margin-bottom:20px;">
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/newsletterForm' ?>">Skicka newsletter</a> &nbsp;&nbsp;
  <a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/sentMailList' ?>">Skickade newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/addRemoveEmail' ?>">L&auml;gg till/ta bort Mejl</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/newsletterUser' ?>">Lista komma-separerad</a> &nbsp;&nbsp;
  <a  href="<?php echo 'https://'.$host_str.'/backend.php/borst/semicolonSeperater'?>">Lista semicolon-separerad</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/createNewsletter' ?>">Add Newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/searchNewsletterSubscriber' ?>">Search Newsletter Subscriber</a>
  </div>
   <div class="shoph3 widthall">Skickade mejl</div>
	<div class="float_left listing">
	  <div class="float_left widthall">

		<div id="reply_msg" class="float_left widthall" style="color:#006600;"><?php echo $greenmsg; ?></div>
		<div class="float_left" style="border:1px solid #666666; padding:10px; width:500px;">
		  <table style="border-top: 0" class="classic" id="newsletter_form" cellpadding="0" cellspacing="0" width="100%" border="0">
			<tr align="left" bgcolor="#99CCFF">
			<th width="5%">Nr</th>
			<th width="15%">Datum</th>
			<th width="10%">Till</th>
			<th width="10%">Kundgrupp</th>
			<th width="10%">mne</th>
			<th width="50%">Meddelande</th>
		  </tr>
		  <?php $i=1; 
			foreach($pager->getResults() as $sentmail)
			{
				if ($sentmail->kundgrupp == 1) $kundgrupp = "Alla";
				elseif ($sentmail->kundgrupp == 2) $kundgrupp = "Account";
				elseif ($sentmail->kundgrupp == 3) $kundgrupp = "Public";
				elseif ($sentmail->kundgrupp == 4) $kundgrupp = "Manuell";
			?>
		  <tr id="rrow" valign="top" bgcolor="#FFFFFF" style="border-bottom:1px solid red;">
			<td><?php echo $i ?></td>
			<td><?php echo $sentmail->date  ?></td>
			<td><?php echo $sentmail->recipiants ?></td>
			<td><?php echo $kundgrupp ?></td>
			<td><?php echo utf8_decode($sentmail->subject) ?></td>
			<td><?php /*?><a href=""><?php echo $resultset->body ?></a> <?php */?></td>
		  </tr>
		  <?php $i++;} ?>
		   <tr>
			<td colspan="6" align="right">
			<div class="paginationwrapper">
				<div class="pagination">
				<?php if ($pager->haveToPaginate()): ?>
				<a id="<?php echo $pager->getFirstPage(); ?>" href="/backend.php/borst/sentMailList/page/<?php echo $pager->getFirstPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> 
				<a id="<?php echo $pager->getPreviousPage(); ?>" style="cursor:pointer;" href="/backend.php/borst/sentMailList/page/<?php echo $pager->getPreviousPage(); ?>"> < </a>
				<?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
				<?php if($page == $pager->getPage()): ?>
				<?php echo '<span class="selected">'.$page.'</span>' ?>
				<?php else: ?>
				<a id="<?php echo $page; ?>" style="cursor:pointer;" href="/backend.php/borst/sentMailList/page/<?php echo $page; ?>"><?php echo $page; ?> </a>
				<?php endif; ?>
				<?php if ($page != $pager->getCurrentMaxLink()): ?>
				-
				<?php endif ?>
				<?php endforeach ?>
				<a id="<?php echo $pager->getNextPage(); ?>" style="cursor:pointer;" href="/backend.php/borst/sentMailList/page/<?php echo $pager->getNextPage(); ?>"> > </a> 
				<a id="<?php echo $pager->getLastPage(); ?>" style="cursor:pointer;" href="/backend.php/borst/sentMailList/page/<?php echo $pager->getLastPage(); ?>"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
				<?php endif ?>
				</div>
			</div>
			</td>
		  </tr>
		  </table>
          </div>
	  </div>
	</div>
	</div>
</div>
</div>

