<table width="50%" border="0" cellspacing="0" cellpadding="0" id="back_category_list">
<?php $i=1; foreach ($type_arr as $key=>$value): ?>
<tr>
  <td> [ <a title="Ta bort <?php echo $value ?>" href="javascript:open_confirmation('Vill du verkligen ta bort typen <?php echo $value ?>. Analyser med denna typ kommer inte att kunna lsas!','<?php echo $key ?>','delete_type_box','delete_type_msg')">X</a> ] </td>
  <td><a href="javascript:edit_category_confirmation('Vill du verkligen uppdatera typen <?php echo $value ?>. Analyser med denna typ kommer ocks att uppdateras!','<?php echo $key ?>','edit_type_box','edit_type_msg','<?php echo $value ?>')"><?php echo $value ?></a></td>
</tr>
<?php endforeach; ?>
</table>

<form name="add_new_type" id="add_new_type" method="post" action="">
  <table width="50%" border="0" cellspacing="0" cellpadding="0" id="back_category_list">
    <tr>
      <td id="add_type_error" colspan="2" style="color:#FF0000;">&nbsp;</td>
    </tr>
	<tr>
      <td><input type="text" name="add_type_text" id="add_type_text"/></td>
	  <td><input type="button" name="add_type" id="add_type" onclick="check_type_record()" value="Lägg Till"/></td>
    </tr>
  </table>
</form>

