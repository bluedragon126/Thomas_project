<div class="maincontentpage">
  <div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">

	<div id="sbtinactiveuserlist_outer" class="forumlistingleftdivinner font_11">
      <div class="shoph3 widthall">Sbt Inactive User List</div>
	  <div class="float_left listing">
        <div class="float_left width_520">
        <?php include_partial('borst/inactiveuser_list_partial', array('pager'=>$pager)) ?>
        </div>
      </div>
	  <div class="user_list_pager">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td colspan="10"><div class="paginationwrapper">
			  <div class="pagination" id="alluser_list_listing">
				<?php include_partial('global/backpager_for_all', array('pager'=>$pager)) ?>
			  </div>
			</div></td>
		</tr>
		<tr>
		  <td colspan="10"><input type="button" name="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med anvndare uppdateras?','','update_sbtinactiveuserlist_box','update_sbtinactiveuserlist_msg')" value="Uppdatera lista"/></td>
		</tr>
	  </table>
	  </div>
    </div>
  </div>
</div>
</div>

<!-- ui-dialog-update-user -->
<div id="update_sbtinactiveuserlist_box" title="Update SbtInactiveUser List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="update_sbtinactiveuserlist_msg">Message:</td>
	</tr>
 </table>
</div>
