<?php $shop_type = array('1'=>'metastock','2'=>'falcon computer','3'=>'bocker','4'=>'utbildningar','5'=>'ppm','6'=>'abonnemang', '7'=>'BT-Charts'); ?>

<form name="update_shop_art_list" id="update_shop_art_list" method="post" action="">
<b>Article Type :</b>
<select id="btshop_article_type" name="btshop_article_type">
    <option value="All">All</option>
    <?php foreach($article_types as $key=>$value): ?> 
            <option value="<?php echo $key; ?>" <?php if($selected_article_type==$key) echo "selected=selected"; ?>><?php echo $value; ?></option>          
    <?php endforeach; ?>    
</select>
<div class="spacer"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="borst_shop_article_list_table">
    <thead>
      <tr id="borst_shop_article_list_column_row">
        <th scope="col" width="3%">Nr</th>
		<th scope="col" width="45%"><a id="sortby_subject" class="float_left cursor"><span class="bk_shoplist_col_name">Ämne<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="10%"><a id="sortby_status" class="float_left cursor"><span class="bk_shoplist_col_status">Status<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="15%"><a id="sortby_type" class="float_left cursor"><span class="bk_shoplist_col_type">Type of Article<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="17%"><a id="sortby_date" class="float_left cursor"><span class="bk_shoplist_col_delete">Date<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th scope="col" width="10%">Delete</th>
      </tr>
    </thead>
    <?php $i=($page=='')? 1:(($page*25+1)-25); foreach ($pager->getResults() as $enq): ?>
    <tr class="classnot">
      <td><input name="shop_art_ids[]" type="hidden" value="<?php echo $enq->id; ?>"><?php echo $i; ?></td>
	  <td><a class="blackcolor" href="<?php echo 'http://'.$host_str.'/backend.php/borst/createShopArticle/edit_shop_article_id/'.$enq->id ?>"><?php echo $enq->btshop_article_title; ?></a></td>
      <td><select class="float_left" name="shop_art_status[]">
			<option value="0" <?php if($enq->published == 0) echo 'selected="selected"' ?>><?php echo __('Intern') ?></option>
            <option value="1" <?php if($enq->published == 1) echo 'selected="selected"' ?>><?php echo __('Publik') ?></option>
	       </select></td>
      <td><?php echo $shop_type[$enq->btshop_type_id]; ?></td>
      <td><?php echo $enq->created_at; ?></td>
	  <td class="del_shop_art"><a class="cursor" id="<?php echo $enq->id ?>" name="<?php echo $enq->btshop_article_title ?>"><img src="/images/cross.png" alt="cross" /></a></td>
    </tr>
    <?php $i++; endforeach; ?>
</table>
</form>