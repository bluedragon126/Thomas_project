<table width="50%" border="0" cellspacing="0" cellpadding="0" id="back_newsletter_list">
 <?php $i=1; foreach ($all_type as $data): ?>
<tr>
  <?php /*?><td> [ <a title="Ta bort <?php echo $value ?>" href="javascript:open_confirmation('Vill du verkligen ta bort objektet <?php echo $value ?>','<?php echo $key ?>','delete_category_box','delete_category_msg')">X</a> ] </td><?php */?>
  <td><a href="javascript:edit_newsletter_confirmation('Vill du verkligen uppdatera nyhetsbrev <?php echo $data->newsletter_name ?>. ','<?php echo $data->id ?>','edit_newsletter_box','edit_newsletter_msg','<?php echo $data->newsletter_name ?>')"><?php echo $data->newsletter_name ?></a></td>
</tr>
<?php endforeach; ?>
</table>

<form name="add_new_newsletter" id="add_new_newsletter" method="post" action="">
  <table width="50%" border="0" cellspacing="0" cellpadding="0" id="back_newsletter_list">
    <tr>
      <td id="add_newsletter_error" colspan="2" style="color:#FF0000;">&nbsp;</td>
    </tr>
	<tr>
      <td><input type="text" name="add_newsletter_text" id="add_newsletter_text"/></td>
	  <td><input type="button" name="add_newsletter" id="add_newsletter" onclick="check_newsletter_record()" value="Lägg Till"/></td>
    </tr>
  </table>
</form>

