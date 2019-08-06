<script language="javascript" type="text/javascript" src="/ccount/display.php"></script>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
  <div class="float_left widthall" style="padding:10px 0 10px 0;"><b><a class="blackcolor" href="<?php echo 'http://'.$host_str.'/backend.php/borst/createAd'?>">Create Advertisement</a>&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;<a class="blackcolor" href="<?php echo 'http://'.$host_str.'/backend.php/borst/archiveAdList'?>">Archive Ad List</a></b></div>
   <div class="forumlistingleftdivinner" style="width:915px;">

	<div class="float_left"> 
			<form id="search_adlist_form" class="backend_search_section" name="search_adlist_form" method="POST">
	  <table width="70%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><b>Order By:</b></td>
			<td>
			   <select name="ad_position" id="ad_position">
 			    <option selected="selected" value="">Ad Position</option>
				<option value="top_mid">Top Center</option>
				<option value="Right_top1">Right Top 1</option>
				<option value="Right_top2">Right Top 2</option>
				<option value="Right_top3">Right Top 3</option>
				<option value="Right_top4">Right Top 4</option>
                                <option value="Header_top1">Header Top 1</option>
				<option value="Header_top2">Header Top 2</option>
				</select>
			</td>
			<td>&nbsp;&nbsp;</td>
                        <td>
            <input type="text" name="ad_name" id="ad_name" placeholder="Ad Name"/>
            </td>
            <td>&nbsp;&nbsp;</td>
			<td>
			   <select id="ad_type" name="ad_type">
			    <option selected="selected" value="">Ad Type</option>
				<option value="img">Image File</option>
				<option value="swf">Flash file(swf)</option>
				<option value="iframe">Iframe</option>
                                <option value="script">Javascript</option>
				</select>
			</td>
			<td>&nbsp;&nbsp;</td>
			<td>
			<select name="ad_enable" id="ad_enable">
			 <option selected="selected" value="">Ad Enabled</option>
			 <option value="Y">Yes</option>
			 <option value="N">No</option>
			</select>
			</td>
			
			<td class="float_right"><input type="button" name="submit" id="searchAdList" value="Search"></td>		
		</tr>
	  </table>
	  </form>
	  </div>
  
       <input type="hidden" id="delete_ad_id" name="delete_ad_id"/>
	<div id="sbt_adslist_outer" class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
	  <div class="shoph3 widthall">Advertisement List</div>
	  <div class="listing">
	  	<input type="hidden" id="adlist_column_order" name="adlist_column_order" value="<?php echo $current_column_order; ?>"/>
		<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		<input type="hidden" id="adlist_column" name="adlist_column" value="<?php echo $cur_column; ?>"/>
	  </div>
      
	  <div class="float_left listing">
	    <div class="ad_list_container">
        <?php include_partial('borst/sbt_ads_list_partial', array('pager'=>$pager,'host_str'=>$host_str,'ccount_link'=>$ccount_link)) ?>
        </div>
      </div>
	  <div class="ad_list_pager listing">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td colspan="10">
			<div class="paginationwrapper">
			  <div class="pagination" id="sbt_ads_list_listing">
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
  </div>
	</div>
</div>

<!-- ui-dialog-delete-sbt ad -->
<div id="delete_sbt_ad_confirm_box" title="Delete Sbt Ad Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_sbt_ad_msg">Message:</td>
	</tr>
 </table>
</div>