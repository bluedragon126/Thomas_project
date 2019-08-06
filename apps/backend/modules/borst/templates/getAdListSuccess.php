<div class="shoph3 widthall">Advertisement List</div>
<div id="add_delete_confirmation_msg" class="add_delete_confirmation_msg">Add has been removed successfully..!</div>
<div class="listing">
  <input type="hidden" id="adlist_column_order" name="adlist_column_order" value="<?php echo $current_column_order; ?>"/>
  <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
  <input type="hidden" id="adlist_column" name="adlist_column" value="<?php echo $cur_column; ?>"/>
</div>
<div class="float_left listing">
  <div class="ad_list_container">
    <?php include_partial('borst/sbt_ads_list_partial', array('pager'=>$pager,'host_str'=>$host_str)) ?>
  </div>
</div>
<div class="ad_list_pager listing">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="10"><div class="paginationwrapper">
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
