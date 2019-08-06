<div class="blog_user_profile_deshboard widthall">Profilsynlighet</div>
<div class="blog_line_nav"><img src="/images/new_home/blog_line_nav.png"/>
<form name="my_visibility_form" id="my_visibility_form" method="post" action="">
<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
<div class="my_e_newsletter">

	<div class="float_left widthall">
	    <div class="float_left widthall">
                <div class="float_left width_23"><input type="radio" name="to_show_profile[]" class="float_left" value="1" <?php if ($user_data->hide_profile == 1) echo "checked"; ?> /></div>
            	<span class="float_left ptop_1 height_19 radio_button_text lineheight_16 mrg_lft_5"><?php echo __('Dölj min profil'); ?></span>
            </div>

            <div class="float_right widthall">
                <div class="float_left width_23"><input type="radio" name="to_show_profile[]" value="2" <?php if ($user_data->hide_profile == 2) echo "checked"; ?> /></div>
	        <span class="float_left ptop_1 height_19 radio_button_text lineheight_16 mrg_lft_5"><?php echo __('Visa för mina vänner'); ?></span>
            </div>
            
       	     <div class="float_left widthall">
                <div class="float_left width_23"><input type="radio" name="to_show_profile[]" value="0" <?php if ($user_data->hide_profile == 0) echo "checked"; ?> /></div>
	        <span class="float_left ptop_1 height_19 radio_button_text lineheight_16 mrg_lft_5"><?php echo __('Visa för alla'); ?></span>
            </div>
	</div>

	<div class="float_left ptop_20">
		<div class="float_left">
        	<input type="button" value="" id="my_visibility_form_btn" name="assign_to_publisher_button" class="my_visibility_save submit" onclick="saveProfileVisibilityChanges()" />
        </div>
		<div class="float_left  width_300 height_19">
        	<span class="float_left profile_visibility_reply_msg" id="my_visibility_form_reply"></span>
        </div>
	</div>
</div>
</form>
