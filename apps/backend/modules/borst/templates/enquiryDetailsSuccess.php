<script language="javascript">
    tinyMCE.init({
        selector: 'textarea',  // change this value according to your HTML
        resize: 'both',
        height: 358,
        width: 500,
        plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
    ],
    toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | link unlink image | emoticons", 
    browser_spellcheck: true,        
    });
function validate_svarainlagg()
{
	var str = tinyMCE.activeEditor.getContent();
	var stringVar = str.trim();
	if(stringVar == " " || stringVar.length == 0)
	{
		alert("Du måste fylla i ett meddelande!");
		return false;
	} 
	else 
	{
		return true;
	}
}
</script>
<style type="text/css">
.name_date_row_td{padding:9px 0 7px; color:#e67f01; font-weight:bold;}
.name_span{padding:9px 0 7px; font-size: 12px; font-weight:bold;}
.date_span{padding:9px 0 7px; color:#999999; font-size: 10px; font-weight:bold;}
.user_question{border-bottom:1px #ffaf4d dotted; line-height:16px;}
#enquiry_post_list p{ float:left; position:relative; font-size:12px;}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv" style="width:950px;">
  <div class="forumlistingleftdivinner" style="width:915px;">
<table id="eqdetail" bgcolor="" width="600" border="0" cellspacing="0" cellpadding="2" class="tablebox" style="margin:-8px 0 0">
  <tr>
    <td height="35"; align="left" class="rubrik" style="border-bottom:1px #ffaf4d dotted;padding:28px 0 22px; color:#070606; font-weight:normal; font-size:24px;">
	<?php if($enquiry_details_data): ?>
      <?php echo $enquiry_details_data->enq_subject; ?>
    <?php endif;?>
    </td>
  </tr>
</table>
<div id="action_msg" class="float_left" style="width:600px; padding:5px; margin-top:10px; border:1px solid #339966; color:#339966; display:none;"></div>
<?php if($enquiry_details_data): ?>
<table id="eqdetail" bgcolor="" width="600" border="0" cellspacing="0" cellpadding="2" class="tablebox" style="margin:0px 0">
  <tr>
    <td width="570" align="left" class="name_date_row_td" colspan="2">
	    <span class="float_left">
			<input type="hidden" name="delete_post_id" id="delete_post_id" />
			<input type="hidden" name="enq_id" id="enq_id" value="<?php echo $enquiry_details_data->id; ?>" />
		</span>
		<span class="float_left name_span"><?php echo $enquiry_details_data->firstname.' '.$enquiry_details_data->lastname; ?></span> 
		<span class="float_left date_span">&nbsp;<?php echo $enquiry_details_data->enq_date; ?> </span> 
                <div class="float_right">
                <span class="ask_enquiry_main">
                    <span class="ask_enquiry">Asking As:</span> 
                    <span class="ask_enquiry_status">
                        <?php
                            if($enquiry_details_data->faster_ans_flag == 0){
                                echo $enquiry_details_data->firstname.' '.$enquiry_details_data->lastname; 
                            }elseif($enquiry_details_data->faster_ans_flag == 2){
                                echo $enquiry_details_data->firstname;
                            }elseif($enquiry_details_data->faster_ans_flag == 3){
                                echo $enquiry_details_data->user_signature;
                            }
                        ?>
                    </span>
                </span>
                <span>
                    <span class="ask_enquiry">Display:</span>
                    <span class="ask_enquiry_status">
                        <?php 
                        if($enquiry_details_data->faster_ans_flag == 1){
                            echo 'Private';
                        }else{
                            echo 'Public';
                        }
                        ?>
                    </span>
                </span>
                </div>
	</td>
  </tr>	
  <tr>
    <td align="left" class="user_question" colspan="2"><?php echo html_entity_decode($enquiry_details_data->user_question); ?></td>
  </tr>
</table>
<?php endif; ?>
<?php if($pager): ?> 
<div id="enquiry_post_list" class="float_left">
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
</div>
<?php endif; ?>
<table id="eqdetail" class="tablebox" cellspacing="0" cellpadding="2" border="0" bgcolor="" width="500">
  <tbody>
    <tr>
      <td align="left"><br/>
        <form action="" method="post" name="reply_on_enquiry" id="reply_on_enquiry">
		  <input type="hidden" value="1" name="reply_msg"/>
		  <input type="hidden" name="postid" id="postid"/>
		  <?php echo $form->renderHiddenFields()?>
          <div class="float_left" style="margin: 25px 0pt 3px; width:700px; border:0px solid green;">
		  	<div class="float_left"><b>Svara på detta inlägg:</b></div>
		  	<div class="float_left" id="post_enquiry_reply_error" style="border:0px solid red; padding-left:10px; color:red;"></div>
		  </div>
		  <div  class="float_left" style="width:700px; border:0px solid blue; margin-bottom:10px;">
          <?php echo $form['reply_text']->render() ?>
		  </div>
          <input class="registerbuttontext submit" id="post_enquiry_reply" type="button" value="Skicka" name="svar_pa_inlagg" />
          <br/>
          <br/>
          <br/>
        </form></td>
    </tr>
  </tbody>
</table>
</div></div></div>

<!-- ui-dialog-delete-enquiry-post -->
<div id="delete_enquirypost_confirm_box" title="Delete Enquiry Post Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_enquirypost_msg">Message:</td>
	</tr>
 </table>
</div>