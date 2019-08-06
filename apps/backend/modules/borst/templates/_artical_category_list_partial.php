<table width="50%" border="0" cellspacing="0" cellpadding="0" id="back_category_list">
 <?php $i=1; foreach ($cat_arr as $key=>$value): ?>
<tr>
  <td> [ <a title="Ta bort <?php echo $value ?>" href="javascript:open_confirmation('Vill du verkligen ta bort objektet <?php echo $value ?>','<?php echo $key ?>','delete_category_box','delete_category_msg')">X</a> ] </td>
  <td><a href="javascript:edit_category_confirmation('Vill du verkligen uppdatera kategorin <?php echo $value ?>. Analyser med denna kategori kommer ocks att uppdateras!','<?php echo $key ?>','edit_category_box','edit_category_msg','<?php echo $value ?>')"><?php echo $value ?></a></td>
</tr>
<?php endforeach; ?>
</table>

<form name="add_new_category" id="add_new_category" method="post" action="">
  <table width="50%" border="0" cellspacing="0" cellpadding="0" id="back_category_list">
    <tr>
      <td id="add_category_error" colspan="2" style="color:#FF0000;">&nbsp;</td>
    </tr>
	<tr>
      <td><input type="text" name="add_category_text" id="add_category_text"/></td>
	  <td><input type="button" name="add_category" id="add_category" onclick="check_category_record()" value="Lägg Till"/></td>
    </tr>
  </table>
</form>

