<?php //if($type_id==1): ?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
 
  <?php if(count($stocklist_name) > 0):?>
  <tr class="">
    <td width="10%">Lista:</td>
    <td><label>
      <select name="adv_search_stock_lista" id="adv_search_stock_lista">
        <?php foreach($stocklist_name as $key=>$value):?>
        <option value="<?php echo $key ?>" <?php if($stocklistid==$key) echo 'selected' ?>><?php echo $value ?></option>
        <?php endforeach;?>
      </select>
      </label></td>
  </tr>
  <?php endif; ?>
  
  <?php if(count($sector_name) > 0):?>
  <tr class="">
    <td width="10%">Sektor:</td>
    <td><label>
      <select name="adv_search_sector" id="adv_search_sector">
        <?php foreach($sector_name as $key=>$value):?>
        <option value="<?php echo $key ?>" <?php if($sectorid==$key) echo 'selected' ?>><?php echo $value ?></option>
        <?php endforeach;?>
      </select>
      </label></td>
  </tr>
  <?php endif; ?>
  
  <?php if($object_cnt):?>
  <tr class="">
    <td width="10%">Objekt:</td>
    <td><label>
      <select name="adv_search_object" id="adv_search_object">
        <?php foreach($object_name as $key=>$value):?>
        <option value="<?php echo $key ?>"><?php echo $value ?></option>
        <?php endforeach;?>
      </select>
      </label></td>
  </tr>
  <?php endif; ?>
</table>