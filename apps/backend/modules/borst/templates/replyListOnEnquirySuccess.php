<table border="0" width="600" cellspacing="0" cellpadding="2">
<?php foreach($pager->getResults() as $reply): ?>
  <tr>
    <td width="570" align="left" class="name_date_row_td">
		<span class="name_span"><?php echo $reply->author_name; ?></span> 
		<span class="date_span">&nbsp;<?php echo $reply->reply_date; ?></span> 
	</td>
    <td width="180" align="right">
      <a class="noclass_edit" id="editpost<?php echo $reply->id; ?>" style="cursor:pointer;">redigera</a>
	  <?php echo ' | '; ?>
      <a class="noclass_delete" id="deletepost<?php echo $reply->id; ?>" href="javascript:open_confirmation('Vill du verkligen ta bort inlägget','<?php echo $reply->id; ?>','delete_enquirypost_confirm_box','delete_enquirypost_msg')">tabort</a>
      </td>
  </tr>
  <tr>
    <td align="left" class="brod" colspan="2" style="border-bottom:1px #ffaf4d dotted;">
	<?php 
	$textarea = $reply->reply_text;
	echo str_replace('</p>','</span><br /><br />',str_replace('<p>','<span>',html_entity_decode($textarea)));
	?></td>
  </tr>
<?php endforeach; ?>
<tr>
  	<td colspan="2">
	<div class="paginationwrapper">
		<div class="pagination" id="enquiry_post_list_listing">
		<?php if ($pager->haveToPaginate()): ?>
		<a id="<?php echo $pager->getFirstPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" style="cursor:pointer;"> < </a>
		<?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
		<?php if($page == $pager->getPage()): ?>
		<?php echo '<span class="selected">'.$page.'</span>' ?>
		<?php else: ?>
		<a id="<?php echo $page; ?>" style="cursor:pointer;"><?php echo $page; ?> </a>
		<?php endif; ?>
		<?php if ($page != $pager->getCurrentMaxLink()): ?>
		-
		<?php endif ?>
		<?php endforeach ?>
		<a id="<?php echo $pager->getNextPage(); ?>" style="cursor:pointer;"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
		<?php endif ?>
		</div>
	</div></td>
  </tr>
</table>