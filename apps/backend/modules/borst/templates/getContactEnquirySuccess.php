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
	<input type="hidden" id="ans_type" name="ans_type" value="<?php echo $ans_type; ?>"/>
  </div>
  <div class="float_left listing">
    <div id="update_msg" class="float_left widthall" style="width:913px; color:#00FF33;"></div>
	<div class="float_left widthall" style="width:913px;">
      <?php include_partial('borst/enquiry_list_partial', array('pager'=>$pager,'host_str'=>$host_str)) ?>
    </div>
  </div>
  <div class="float_left listing">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="10"><div class="paginationwrapper">
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
