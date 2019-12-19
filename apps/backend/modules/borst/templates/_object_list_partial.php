<form name="update_objekt_list" id="update_objekt_list" method="post" action="">
  <input type="hidden" name="action_mode" id="action_mode" value="update_objekt_list">
  <input type="hidden" name="obj_name_update" id="obj_name_update" value="<?php echo $obj_name; ?>"/>
  <input type="hidden" name="obj_land_update" id="obj_land_update" value="<?php echo $obj_land; ?>"/>
  <input type="hidden" name="delete_obj_id" id="delete_obj_id"/>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="back_object_list">
    <thead>
      <tr>
        <th scope="col">Nr</th>
        <th scope="col">Aktion</th>
        <th scope="col"><a href="<?php echo 'https://'.$host_str.'/backend.php/borst/listObject/sortby/object_name'?>">Objekt</a></th>
        <th scope="col"><a href="<?php echo 'https://'.$host_str.'/backend.php/borst/listObject/sortby/object_country'?>">Land</a></th>
      </tr>
    </thead>
	<?php
	$page_num = $pager->getPage() - 1;
	$page_num = $page_num * $rec_per_page;
	$page_num = $page_num + 1;
	?>
	<?php $i = $pager->getPage() == 1 ? 1 : $page_num;  ?>
    <?php foreach ($pager->getResults() as $obj): ?>
    <tr>
      <td><input name="objektID[]" type="hidden" value="<?php echo $obj->object_id; ?>">
        <?php echo $i++; ?></td>
      <td> [ <a title="Uppdatera detta objekt" href="<?php echo 'https://'.$host_str.'/backend.php/borst/editObject/mode/edit_object/object_id/'.$obj->object_id ?>">E</a> | <a title="Ta bort <?php echo $obj->object_name ?>" href="javascript:open_confirmation('Vill du verkligen ta bort objektet <?php echo $obj->object_name ?>','<?php echo $obj->object_id ?>','delete_confirm_box','delete_object_msg')">X</a> ] </td>
      <td><input name="objekt[]" type="text" size="16" value="<?php echo $obj->object_name ?>"></td>
      <td><input name="land[]" type="text" size="3" maxlength="3" value="<?php echo $obj->object_country ?>"></td>
    </tr>
    <?php endforeach; ?>
  </table>
</form>
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4"><div class="paginationwrapper">
        <div class="pagination">
          <?php //echo ajax_pager_navigation($pager, '/festivals/listfestivalAjax'.$querystr,'primary_content') ?>
		  <?php if ($pager->haveToPaginate()): ?>
          <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/listObject/page/'.$pager->getFirstPage().'/'.$ext ?>"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/listObject/page/'.$pager->getPreviousPage().'/'.$ext ?>"> < </a>
          <?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
          <?php if($page == $pager->getPage()): ?>
          <?php echo '<span class="selected">'.$page.'</span>' ?>
          <?php else: ?>
          <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/listObject/page/'.$page.'/'.$ext ?>"><?php echo $page; ?> </a>
          <?php endif; ?>
          <?php if ($page != $pager->getCurrentMaxLink()): ?>
          -
          <?php endif ?>
          <?php endforeach ?>
          <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/listObject/page/'.$pager->getNextPage().'/'.$ext ?>"> > </a> <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/listObject/page/'.$pager->getLastPage().'/'.$ext ?>"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
          <?php endif ?>
        </div>
      </div></td>
  </tr>
  <tr>
    <td colspan="4"><input type="button" name="update_object_button" id="update_object_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med objekt uppdateras?', '', 'updateObjectList_confirm_box', 'update_object_msg')" value="Uppdatera lista"/></td>
  </tr>
</table>
