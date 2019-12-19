<style>
    .error_list{float: right;}
    .forumlistingleftdivinner{width:750px;}
</style>
<script src="http://demo.visiblecampus.com/homepage/js/jquery.validate.js" type="text/javascript"></script>
<script>
/*$(document).ready(function()
    {        

	   $('#coupon_send_btn').click(function() {

	        var sEmail = $('#email_list').val();

	        if ($.trim(sEmail).length == 0) {

	            alert('Please enter valid email address');

	            //e.preventDefault();

	        }

	        if (validateEmail(sEmail)) {

	            alert('Email is valid');

	        }
	        else {

	            alert('Invalid Email Address');

	            //e.preventDefault();

	        }

	    });

});

        
    function validateEmail(sEmail) {

	    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

	    if (filter.test(sEmail)) {

	        return true;

	    }

	    else {

	        return false;

	    }
    }*/
</script>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
    <div class="forumlistingleftdivinner">
      <?php /*if($isSaved):?>
        <div class="float_left" style="width:800px"><span class="float_left " style="border:1px solid rgb(0, 204, 51);width:100%"><font color="#00CC33">Artikeln är sparad!</font></span></div>
        <?php endif;*/?>
        <div class="spacer"></div>
        <div class="shoph3 widthall"><a class="blackcolor" href="/backend.php/borst/addUpdateCoupon">&nbsp;+&nbsp;Create Coupon </a>&nbsp;&nbsp;|| &nbsp;&nbsp;<a class="blackcolor" href="/backend.php/borst/couponList">Coupon List</a>&nbsp;&nbsp;|| &nbsp;&nbsp;<span class="font-bold font-size-13"><a class="blackcolor" href="/backend.php/borst/sendCouponCode">Match Coupon Code</a></span>&nbsp;&nbsp;|| &nbsp;&nbsp;<a class="blackcolor" href="/backend.php/borst/sendCouponList">Matched Coupons</a>&nbsp;&nbsp;|| &nbsp;&nbsp;<a class="blackcolor" href="/backend.php/borst/usedCouponList">Used Coupons</a></div>
        <div class="spacer"></div>
      <div class="float_left listing">
        <div class="float_left widthall">
          <form name="create_shop_article_form" id="create_shop_article_form" action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="saveOnly" id="saveOnly">
            <?php 
            /*if($coupondetails_data!=''){
                $couponcode_id = $coupondetails_data->getCouponcodeId();
                $product_id = $coupondetails_data->getProductId();
                $email = $coupondetails_data->getEmail();
                $is_inactive = $coupondetails_data->getIsInactive();
            }else{
               $couponcode_id = '';
                $product_id = '';
                $email = '';
                $is_inactive = '';
            }*/ //var_dump($coupondetails_data);
            if($coupondetails_data!=''){
                $is_inactive = $coupondetails_data[0]['cd_IS_INACTIVE'];
                $status = $coupondetails_data[0]['cd_status'];
            }
            ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" id="create_article_form">
                  <tr>
                        <td width="20%">Coupon %:</td>
                        <td width="40%">
                            <?php if($coupondetails_data!=''){ echo $coupondetails_data[0]['c_coupon_code']?>
                            <?php }else{?>
                        <select id="coupon_code" name="coupon_code"  >
                            <?php foreach($couponCode as $key1=>$value1): ?> 
                                    <option value="<?php echo $key1; ?>"><?php echo $value1; ?></option>          
                            <?php endforeach; ?>    
                        </select>
                            <?php }?>
                        </td>
                        <td width="30%"><span id="btshop_article_title_error" class="redcolor pleft_2"><?php echo $msg_code;?></span></td>
                  </tr>
                  <tr>
                      <td width="20%">Product:</td>
                      <td width="40%"> 
                          <?php if($coupondetails_data!=''){ echo $coupondetails_data[0]['bt_btshop_article_title']?>
                            <?php }else{?>
                          <select id="subscription_types" name="subscription_types"  >
                              <!--<option value="All">All</option>-->
                              <?php foreach ($subscription_types as $key => $values): ?> 
                                  <option value="<?php echo $key; ?>" <?php /*if ($product_id == $key) echo "selected=selected"; */?>><?php echo $values; ?></option>          
                              <?php endforeach; ?>    
                          </select>
                          <?php }?>
                      </td>
                      <td width="30%"><span id="btshop_article_title_error" class="redcolor pleft_2"></span></td>
                  </tr>  
                  <tr>
                      <td width="20%">Email Id's:</td>
                      <td width="40%">
                          <?php if($coupondetails_data!=''){?>
                          <textarea name="email_list" id="email_list" cols="30" rows="5" readonly="true"><?php echo $coupondetails_data[0]['cd_email']?></textarea>
                              <?php }else{?>
                          <textarea name="email_list" id="email_list" cols="30" rows="5"><?php if($email){ echo $email;} else if($value) { echo $value; }  else{ echo "";}?></textarea>
                            <?php }?>
                      </td>
                      <td width="30%"><span id="btshop_article_title_error" class="redcolor pleft_2"><?php echo $msg;?></span></td>
                  </tr>
                  <tr>
                      <td width="20%">Active/InActive:</td>
                      <td width="40%"> 
                         <select id="is_inactive" size="0" name="is_inactive">
                            <option value="0" <?php if($is_inactive == 0) { echo "selected=selected";}?>>Active</option>
                            <option value="1" <?php if($is_inactive == 1) { echo "selected=selected";}?>>Inactive</option>
                        </select>
                      </td>
                      <td width="30%"><span id="btshop_article_title_error" class="redcolor pleft_2"></span></td>
                  </tr>
                  <?php if($coupondetails_data!=''){?>
                  <tr>
                      <td width="20%">Status:</td>
                      <td width="40%"> 
                         <select id="status" size="0" name="status">
                            <option value="Pending" <?php if($status == "Pending") { echo "selected=selected";}?>>Pending</option>
                            <option value="Completed" <?php if($status == "Completed") { echo "selected=selected";}?>>Completed</option>
                            <option value="Inprocess" <?php if($status == "Inprocess") { echo "selected=selected";}?>>Inprocess</option>
                        </select>
                      </td>
                      <td width="30%"><span id="btshop_article_title_error" class="redcolor pleft_2"></span></td>
                  </tr>
                  <?php }?>
              <tr>
                  <td>&nbsp;</td>
                  <td><input id="coupon_send_btn" type="submit" value="Spara" name="coupon_send_btn" class="registerbuttontext" />&nbsp;&nbsp;</td>
                                    
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
                      <td colspan="10"><div class="paginationwrapper"><a href="/backend.php/borst/sendCouponList">Send Coupon List</a></div>
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