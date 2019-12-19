<script type="text/javascript">
/**
 *
 *  AJAX IFRAME METHOD (AIM)
 *  http://www.webtoolkit.info/
 *
 **/
 
AIM = {
 
 frame : function(c) {
 
  var n = 'f' + Math.floor(Math.random() * 99999);
  var d = document.createElement('DIV');
  d.innerHTML = '<iframe style="display:none" src="about:blank" id="'+n+'" name="'+n+'" onload="AIM.loaded(\''+n+'\')"></iframe>';
  document.body.appendChild(d);
 
  var i = document.getElementById(n);
  if (c && typeof(c.onComplete) == 'function') {
   i.onComplete = c.onComplete;
  }
 
  return n;
 },
 
 form : function(f, name) {
  f.setAttribute('target', name);
 },
 
 submit : function(f, c) {
  AIM.form(f, AIM.frame(c));
  if (c && typeof(c.onStart) == 'function') {
   return c.onStart();
  } else {
   return true;
  }
 },
 
 loaded : function(id) {
  var i = document.getElementById(id);
  if (i.contentDocument) {
   var d = i.contentDocument;
  } else if (i.contentWindow) {
   var d = i.contentWindow.document;
  } else {
   var d = window.frames[id].document;
  }
  if (d.location.href == "about:blank") {
   return;
  }
 
  if (typeof(i.onComplete) == 'function') {
   i.onComplete(d.body.innerHTML);
  }
 }
 
}
 </script>
 <script type="text/javascript">
  function startCallback() {
   return true;
  }
 
  function completeCallback(response) {
  var arr = response.split(',');
  var len = arr.length;
  
   //document.getElementById('product_image_upload_error').innerHTML = response;
   document.getElementById('product_image_upload_error').innerHTML = arr[0];
   if(len > 1) 
   {
   		document.getElementById('product_image').value = arr[1];
		
		var str = '<img id="product_short_img" class="float_right" src="http://'+window.location.hostname+'/uploads/btshopThumbnail/'+arr[1]+'"/>';
	    document.getElementById('preview_product_img').innerHTML = str;
   }
   //window.location.reload();
  }
  $(document).ready(function(){

 var selectble = $('#bt_shop_article_is_sellable').val($('#is_sellable_hidden').val());
  if(selectble.val()==1)
      {
        $('#bt_shop_article_is_sellable').val(1);
        $('#bt_shop_article_is_sellable').attr('checked',true);
        $('#product_weight').show();
        $('#prod_price').show();
      }
      else
      {
          $('#bt_shop_article_is_sellable').val(0);
          $('#bt_shop_article_is_sellable').attr('checked',false);
          $('#product_weight').hide();
          $('#prod_price').hide();
      }

  $('#bt_shop_article_is_sellable').unbind('click');
  $('#bt_shop_article_is_sellable').live('click',function(){
      if($(this).attr('checked') == false)
      {
            $(this).val(0);
            $(this).attr('checked','');
            $('#product_weight').hide();
            $('#prod_price').hide();  
      }
      else
      {
          $(this).val(1);
          $('#product_weight').show();
          $('#prod_price').show();
      }
  });
  });
 </script>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
    <div class="forumlistingleftdivinner">
      <?php if($isSaved):?>
        <div class="float_left" style="width:800px"><span class="float_left " style="border:1px solid rgb(0, 204, 51);width:100%"><font color="#00CC33">Artikeln är sparad!</font></span></div>
        <?php endif;?>
      <div class="shoph3 widthall"><?php echo __('Lägg till artikel')?></div>
      <div class="float_left listing">
        <div class="float_left widthall">
          <form name="create_shop_article_form" id="create_shop_article_form" action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="saveOnly" id="saveOnly">
			<?php echo $form->renderHiddenFields()?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="create_article_form">
			  <tr>
                <td><span class="float_left width_110 pleft_5">Type of Article</span></td>
                <td><?php echo $form['btshop_type_id']->render(array('class'=>'selectmenu','style'=>'width:100px'));?>
                    <span id="chart_types">
                        <?php if($setCombos): ?>
                                &nbsp; Chart Type : 
                                <select id="chart_type_id" name="chart_type_id">
                                <?php foreach($chart_types as $key=>$value): ?>
                                <option value="<?php echo $key ?>" <?php echo $selected_chart == $key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                                </select>                            
                        <?php endif; ?>
                    </span>
                </td> 
              </tr>
              <tr>
                <td><span class="float_left width_110 pleft_5">Artikel Status</span></td>
                <td><select class="float_left" name="shop_art_status" id="shop_art_status">
						<option value="0" <?php echo $shop_article_pub_status == 0 ? 'selected' : ''; ?>><?php echo __('Intern') ?></option>
                        <option value="1" <?php echo $shop_article_pub_status == 1 ? 'selected' : ''; ?>><?php echo __('Publik') ?></option>
					</select></td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;Article Title</td>
                <td><?php echo $form['btshop_article_title']->render(array('size' => 60)); ?> 
				<span id="btshop_article_title_error" class="redcolor pleft_2"></span></td>
              </tr>
			  <tr>
                <td>&nbsp;&nbsp;Article Sub Title</td>
                <td><?php echo $form['btshop_article_subtitle']->render(array('size' => 60));?>
				<span id="btshop_article_subtitle_error" class="redcolor pleft_2"></span></td>
              </tr>

			  <tr>
                <td>&nbsp;&nbsp;Product Image</td>
                <td><?php echo $form['btshop_product_image']->render(array('id'=>'product_image','class'=>'float_left width_165'));	?><span id="upload_link"><a id="productImage" name="productImage" class="font_family_arial font_11 cursor mleft_10">Upload Image</a></span>
				<span id="upload_msg redcolor"></span>
				<span class="float_right" id="preview_product_img">
				<?php if($form['btshop_product_image']->getValue()): ?><img id="product_short_img" class="float_right" src="<?php echo 'http://'.$host_str.'/uploads/btshopThumbnail/'.$form['btshop_product_image']->getValue(); ?>"/><?php endif; ?>
				</span></td>
              </tr>
			  <tr>
                <td valign="top">&nbsp;&nbsp;Product Short Info</td>
                <td><?php echo $form['btshop_product_intro_text']->render(array('cols'=>'75'));	?></td>
              </tr>
			  <tr>
                <td valign="top">&nbsp;&nbsp;Product Description</td>
                <td><?php echo $form['btshop_product_description']->render();?>
				<span id="btshop_product_description_error" class="redcolor pleft_2"></span></td>
              </tr>
              <tr>
                  <td>&nbsp;&nbsp;Is Sellable</td>
                  <td><?php echo $form['is_sellable']->render();?></td>
              </tr>
	      <tr id="prod_price">
                <td valign="top"><span class="float_left" style="width:145px; padding-left:5px;">Product Price Description</span></td>
                <td id="product_price_range">
				<div id="price_parent" class="float_left" style="border:0px solid red; width:530px;">
					<div class="float_left" style="border:0px solid green;">
						<span class="float_left" style="margin:0 5px 0 5px;">Qty:</span>
						<input type="text" name="shop_qty[]" class="float_left" style="width:30px;" />
						
						<span class="float_left" style="margin:0 5px 0 5px;">Unit:</span>
						<select class="float_left" name="quantity_unit[]" id="quantity_unit">
							<?php foreach($qty_list as $data):?>
							<option value="<?php echo $data->id; ?>"><?php echo $data->btshop_price_unit; ?></option>
							<?php endforeach; ?>
						</select>
						
						<span class="float_left" style="margin:0 5px 0 5px;">Price:</span>
						<input type="text" name="shop_product_price[]" class="float_left" style="width:50px;" />
						
						<span class="float_left" style="margin:0 5px 0 5px;">Price Text:</span>
						<input type="text" name="shop_product_text[]" class="float_left" size="25" />

						<span class="float_left tem">&nbsp;<img src="/images/minusicon.jpg" alt="arrow" /></span>
					</div>
				</div>
				<img src="/images/addplusicon.jpg" class="temp_class" alt="arrow" style="float:left; position:relative;" />
				<div id="price_detail_error" class="float_left redcolor pleft_2"></div>
				</td>
              </tr>
              <tr id="product_weight">
                <td>&nbsp;&nbsp;Product Weight</td>
                <td><?php echo $form['product_weight']->render(array('style' => 'width:50px;'));?> i gram
				<span id="product_weight_error" style="color:#FF0000;"></span></td>
              </tr>
              <tr>
                  <td>&nbsp;&nbsp;Is Downloadable</td>
                 <td> <?php echo $form['is_downloadable']->render();?>
                     <span>&nbsp;&nbsp;&nbsp;Download Url&nbsp;&nbsp;&nbsp;</span><?php echo $form['download_url']->render();?>
                    </td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td><input id="submit_create_shop_article_form" type="button" value="Spara" name="submit_create_shop_article_form" class="registerbuttontext submit" />&nbsp;&nbsp;
                <?php if($article_id): ?>
				<input type="submit" value="Verkstall" id="submit_create_shop_article_form" name="save_form" class="registerbuttontext1 submit" onclick="setSaveFlag()"/>
			 	<?php endif; ?>
				</td>

              </tr>
              <?php if($shopId):?>
              <tr>
                  <td>&nbsp;</td>
                <td>

                    <b><a  href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/borst_shop/shopProductDetail/product_id/'.$shopId?>">GÅ TILL ARTIKEL (spara först!)</a></b>
                </td>
              </tr>
              <?php endif;?>
            </table>
          <input type="hidden" value="<?php echo $is_sellable;?>" id="is_sellable_hidden"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Used on product image upload. -->
<div id="upload_btshop_product_image_box" style="border:0px solid red;" title="Upload Product image" class="hide_div">
<form id="upload_btshop_product_image_form" name="upload_btshop_product_image_form" enctype="multipart/form-data" method="post" action="/backend.php/borst/uploadShopProductImage/" onsubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback});">
 <table border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td><div class="float_left width_20"></div></td><td id="product_image_upload_error">&nbsp;</td>
	</tr>
	<tr>
		<td id="browse_box_div"><div class="float_left width_20"></div></td><td align="right"><input type="file" name="upload_product_image" id="upload_product_image" /></td>
	</tr>
 </table>
</form>
</div>

<div id="price_distribution_last_row_box" title="Price Distribution Notification">
 <table border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="price_distribution_last_row_msg">&nbsp;</td>
	</tr>


 </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
       $("#bt_shop_article_btshop_type_id").change(function(){
            if(this.value==7){
                url = 'http://'+window.location.hostname+'/backend.php/borst/getChartTypes';
                $.post(url,'',function(data){
                  $("#chart_types").html(data);  
				  $('#chart_type_id option[value="1"]').remove();
				  $('#chart_type_id option[value="2"]').remove();
				  $('#chart_type_id option[value="3"]').remove();

                })
            }
            else
            {
                $("#chart_types").html('');
            }
                
       }) 
    });
</script>