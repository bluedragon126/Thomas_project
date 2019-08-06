<script type="text/javascript" language="javascript">
$(document).ready(function(){
 $('#sbt_analysis_comment_subject').css('margin-bottom',10);
 $('#sbt_analysis_comment_subject').css('width',494);
 $('.error_list').css('float','none');
 $('.error_list').css('margin','0px');
 
 });
 </script>
<?php if($sf_user->hasFlash('notice')):?>
	<div class="greenmsg_article" id="greenmsg_article">
     <?php 
        echo $sf_user->getFlash('notice'); 
        $sf_user->setFlash('notice','');
     ?>
     </div>
     <?php endif; ?>
<div id="bt_article_comment_list_div" class="float_left width_100_per margin_top_25">
		<?php if($pager->getNbResults() > 0): ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="borst_comment_table">
		<?php foreach ($pager->getResults() as $data): ?>
			  <tr>
				<td>
                   <span class="comment_post_by">
                            <?php echo trim($data->getCommentedUsername($data->comment_by)); ?>
                    </span>
                    <span class="comment_created_at">
                            <?php echo $data->created_at;?>
                    </span>
    				<?php if($sf_user->isAuthenticated() && $sf_user->isSuperAdmin()==1): ?>
                    
                    <span class="deletelink_float_right">
                        <a  id="delete_link<?php echo $data->id; ?>"  onclick="javascript:open_confirmation_delete_article_comment('Vill du verkligen ta bort denna kommentar',this.id,'delete_article_comment_confirm_box','delete_article_comment_msg')">Ta bort</a>
                    </span>
                    <span class="editlink_float_right">
        				    <a  id="edit_link<?php echo $data->id; ?>"   href="#comments">redigera</a>
                    </span>
    				<?php endif;
                    if($data->subject!='') : 
                    ?>
                    
                    <span class="analysis_comment_list_sbt1"><?php echo html_entity_decode($data->subject); ?></span>
                    <?php endif;?>
                    <span class="analysis_comment_list dotted_line">
                       <?php echo html_entity_decode($data->article_comment);?>
                    </span>
				</td>
			  </tr>
		<?php endforeach;?>
			  <tr>
				<td>&nbsp;</td>
			  </tr>
		</table>
		<?php endif; ?>
	<!--</div>-->
     <input type="hidden" value="" id="delete_comment_by_id" />
     <a name="comments">&nbsp;</a>
		<div class="paginationwrapper">
		  <div class="pagination" id="bt_article_comment_list_listing">
			<?php if ($pager->haveToPaginate()): ?>
			<a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><img src="/images/left_arrow_trans.png" alt="arrow" />  </a> <a id="<?php echo $pager->getPreviousPage(); ?>"  class="cursor"> < </a>
			<?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
			<?php if($page == $pager->getPage()): ?>
			<?php echo '<span class="selected">'.$page.'</span>' ?>
			<?php else: ?>
			<a id="<?php echo $page; ?>"  class="cursor"><?php echo $page; ?> </a>
			<?php endif; ?>
			<?php if ($page != $pager->getCurrentMaxLink()): ?>
			-
			<?php endif ?>
			<?php endforeach ?>
			<a id="<?php echo $pager->getNextPage(); ?>"  class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>"  class="cursor"> <img src="/images/right_arrow_trans.png" alt="arrow" /> </a>
			<?php endif ?>
		  </div>
		</div>
	
	</div>
     <!-- <script>edit_comment_article();</script>-->