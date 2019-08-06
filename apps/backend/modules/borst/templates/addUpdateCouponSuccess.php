<style>
    .error_list{float: right;}
</style>
<script>
    $(document).ready(function(){
        $('#coupon_status').attr('size','0');
    });
    
</script>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
    <div class="forumlistingleftdivinner">
      <?php if($isSaved):?>
        <div class="float_left" style="width:800px"><span class="float_left " style="border:1px solid rgb(0, 204, 51);width:100%"><font color="#00CC33">Artikeln är sparad!</font></span></div>
        <?php endif;?>
        <div class="spacer"></div>
        <div class="shoph3 widthall"><span class="font-bold font-size-13"><a class="blackcolor" href="/backend.php/borst/addUpdateCoupon">&nbsp;+&nbsp;Create Coupon </a></span>&nbsp;&nbsp;|| &nbsp;&nbsp;<a class="blackcolor" href="/backend.php/borst/couponList">Coupon List</a>&nbsp;&nbsp;|| &nbsp;&nbsp; <a class="blackcolor" href="/backend.php/borst/sendCouponCode">Match Coupon Code</a>&nbsp;&nbsp;|| &nbsp;&nbsp;<a class="blackcolor" href="/backend.php/borst/sendCouponList">Matched Coupons</a>&nbsp;&nbsp;|| &nbsp;&nbsp;<a class="blackcolor" href="/backend.php/borst/usedCouponList">Used Coupons</a></div>
        <div class="spacer"></div>
      <div class="float_left listing">
        <div class="float_left widthall">
          <form name="create_shop_article_form" id="create_shop_article_form" action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="saveOnly" id="saveOnly">
            <?php echo $form->renderHiddenFields()?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" id="create_article_form">
              <tr>
                  <td>&nbsp;&nbsp;Coupon %:</td>
                  <td><?php echo $form['code']->render(array('size' => 30)); ?> <?php echo $form['code']->renderError(); ?>
                      <span id="btshop_article_title_error" class="redcolor pleft_2"></span></td>
              </tr>
              <tr>
                  <td>&nbsp;&nbsp;Coupon Text:</td>
                  <td><?php echo $form['code_desc']->render(array('size' => 30)); ?> <?php echo $form['code_desc']->renderError(); ?>
                      <span id="btshop_article_title_error" class="redcolor pleft_2"></span></td>
              </tr>
              <tr>
                  <td>&nbsp;&nbsp;Status:</td>
                  <td><?php echo $form['status']->render(array('size' => 30)); ?> <?php echo $form['status']->renderError(); ?>
                      <span id="btshop_article_title_error" class="redcolor pleft_2"></span></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
                  <td><input id="submit_create_shop_article_form" type="submit" value="Spara" name="submit_create_shop_article_form" class="registerbuttontext submit" />&nbsp;&nbsp;</td>
                                    
              </tr>
         </table>         
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="float_left listing">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
                      <td colspan="10"><div class="paginationwrapper"><a href="/backend.php/borst/couponList">Coupon List</a></div>
                      </td>
                  </tr>
          </table>
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