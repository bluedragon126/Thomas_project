<div class="blog_user_profile_deshboard padding_top_4 widthall">E-postutskick</div>
<div class="blog_line_nav"><img src="/images/new_home/blog_line_nav.png"/></div>
<form name="my_e_newsletter_form" id="my_e_newsletter_form" method="post" action="">
<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
<input type="hidden" id="email" name="email" value="<?php echo $email_arr[0]; ?>" />
<div class="my_e_newsletter" id="my_e_newsletter_container">
	<?php foreach($all_type as $data):?>
	<div class="float_left">
		<!-- <div class="float_left email_checkbox_1"><input type="checkbox" name="news[]" value="<?php echo $data->id; ?>" <?php if ($status_arr[$data->id] == 1) echo "checked"; ?> /></div> -->
		<div class="float_left lineht_25 email_checkbox_2"><span class="float_left radio_button_text pad_top_1"><?php echo $data->newsletter_name; ?></span></div>
	</div>
        <?php endforeach; ?>

	<div class="float_left mrg_top_20">
		<div class="float_left"><input type="button" value="" id="my_e_newsletter_form_btn" name="assign_to_publisher_button" class="my_e_newsletter_save submit" onclick="saveMyENewsletterChangesDaily()" /></div>
		<div class="float_left email_success_text"><span class="float_left email_success_text_color" id="my_e_newsletter_reply"></span></div>
	</div>
</div>
</form>