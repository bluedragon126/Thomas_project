<div class="maincontentpage">
  <div class="forumlistingleftdiv">
  <div class="float_left widthall"><b>Sök förfrågan</b></div>
  <div class="forumlistingleftdivinner" style="width:915px;">
  <form id="search_borst_enquiry_form" name="search_borst_enquiry_form" class="backend_search_section" method="POST" action="">
  <table width="70%" border="0" cellspacing="0" cellpadding="0" id="search_borst_enquiry_form_table">
	<tr>
		<td>
			<input name="search_enquiry" type="hidden" value="1">
			<input name="ans_type" id="ans_type" type="hidden" value="<?php echo $ans_type; ?>">
		</td>
		<td><b>Username:</b>&nbsp;<input id="enq_subject" name="enq_subject" type="text" size="20" value="<?php echo $sf_params->get('enq_subject') ? $sf_params->get('enq_subject') : $enq_subject; ?>"></td>
		<td>
        <select id="enq_type" name="enq_type" style="width:145px;">
         <option value="" selected="selected">Typ av förfrågan</option>
		 <option value="Portfölj" <?php if(strcmp($sf_params->get('enq_type'), "Portfölj") == 0) echo "selected"; ?>>Portfölj</option>
		 <option value="Henry Boy" <?php if(strcmp($sf_params->get('enq_type'), "henry_boy") == 0) echo "selected"; ?>>Henry Boy</option>
		 <option value="Utbildningar" <?php if(strcmp($sf_params->get('enq_type'), "utbildningar") == 0) echo "selected"; ?>>Utbildningar</option>
                 <option value="Webinarium" <?php if(strcmp($sf_params->get('enq_type'), "webinarium") == 0) echo "selected"; ?>>Webinarium</option>
		 <option value="VIP-klubben" <?php if(strcmp($sf_params->get('enq_type'), "vipklubben") == 0) echo "selected"; ?>>VIP-klubben</option>
		 <option value="Metastock" <?php if(strcmp($sf_params->get('enq_type'), "metastock") == 0) echo "selected"; ?>>Metastock</option>
		 <option value="Nybörjare" <?php if(strcmp($sf_params->get('enq_type'), "nyborjare") == 0) echo "selected"; ?>>Nybörjare</option>
		 <option value="Förslagslåda" <?php if(strcmp($sf_params->get('enq_type'), "forslagslada") == 0) echo "selected"; ?>>Förslagslåda</option>
		 <option value="Kundtjänst" <?php if(strcmp($sf_params->get('enq_type'), "kundtjanst") == 0) echo "selected"; ?>>Kundtjänst</option>
		 <option value="Henrik Hallenborg" <?php if(strcmp($sf_params->get('enq_type'), "Henrik Hallenborg") == 0) echo "selected"; ?>>Henrik Hallenborg</option>
		 <option value="Thomas Sandström" <?php if(strcmp($sf_params->get('enq_type'), "Thomas Sandström") == 0) echo "selected"; ?>>Thomas Sandström</option>
		 <option value="Göran Högberg" <?php if(strcmp($sf_params->get('enq_type'), "Göran Högberg") == 0) echo "selected"; ?>>Göran Högberg</option>
                 <option value="Övrigt" <?php if(strcmp($sf_params->get('enq_type'), "ovrigt") == 0) echo "selected"; ?>>Övrigt</option>
        </select></td>
		<td class="float_left"><input id="search_for_enquiry_btn" type="button" name="submit" value="Search"></td>	
		<td class="float_left"><div id="search_error" class="float_left" style="width:180px; margin:5px; color:#FFFFFF; font-weight:bold;"></div></td>	
	</tr>
  </table>
  </form>
	<div id="borst_enquirylist_outer" class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
      <div class="shoph3 widthall">Förfrågan lista</div>
	  <div id="enq_sort_by" class="float_right widthall" style="width:915px; text-align:right; border:0px solid red;">
	  	<div class="float_right cursor" style="text-align:right;padding-right:10px; font-weight:bold; color:<?php echo $ans_type == 'ans_1' ? '#E67F01;':'#000000;'  ?>"><a id="ans_1" name="ans_1">Answered</a></div>
	<div class="float_right cursor" style="text-align:right;padding-right:10px; font-weight:bold; color:<?php echo $ans_type == 'ans_0' ? '#E67F01;':'#000000;'  ?>"><a id="ans_0" name="ans_0">UnAnswered</a></div>
	<div class="float_right cursor" style="text-align:right;padding-right:10px; font-weight:bold; color:<?php echo $ans_type == 'ans_2' ? '#E67F01;':'#000000;'  ?>"><a id="ans_2" name="ans_2">Disabled</a></div>
	  </div>
	  <div class="listing">
	  	<input type="hidden" id="borst_enquiry_form_column_order" name="borst_enquiry_form_column_order" value="<?php echo $current_column_order; ?>"/>
		<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		<input type="hidden" id="borst_enquiry_form_column" name="borst_enquiry_form_column" value="<?php echo $cur_column; ?>"/>
		<!--<input type="hidden" id="ans_type" name="ans_type" value="<?php //echo $ans_type; ?>"/>-->
	  </div>
      <div class="float_left listing">
        <div id="update_msg" class="float_left widthall" style="width:913px; color:#00FF33;"></div>
		<!--<div class="float_left widthall" style="width:913px; overflow:hidden; overflow-x:scroll;">-->
		<div class="float_left widthall" style="width:913px;">
        <?php include_partial('borst/enquiry_list_partial', array('pager'=>$pager,'host_str'=>$host_str)) ?>
        </div>
      </div>
	  <div class="float_left listing">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td><div class="paginationwrapper">
			  <div class="pagination" id="borst_enquiry_list_listing">
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
    </div>
	<div class="float_left listing">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td><input type="button" name="update_enquiry_button" id="update_enquiry_button" class="registerbuttontext submit" value="Uppdatera lista"/></td>
		  </tr>
	  </table>
	</div>
	
	
  </div>
</div>
</div>
<!-- ui-dialog-update-article -->
<div id="updateEnquiryList_confirm_box" title="Update Enquiry List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="update_enquiry_msg">Message:</td>
	</tr>
 </table>
</div>

<!-- ui-dialog-delete-article -->
<div id="delete_article_confirm_box" title="Delete Article Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_article_msg">Message:</td>
	</tr>
 </table>
</div>