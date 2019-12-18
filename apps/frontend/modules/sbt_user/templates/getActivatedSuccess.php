<div class="maincontentpage" id="getActivated">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
   <div class="shoph3 widthall">Kontot aktiverat!</div>
	<div class="float_left listing">
	  <div class="float_left widthall">
		
		<?php if($flag_status == 1): ?>
			<div class="float_left widthall"><img alt="correct" src="/images/success.png" class="float_left" /></div>
			<div class="float_left widthall flag_status_div_2"><?php echo __('Ditt konto är redan aktiverat.') ?></div>
			<div class="float_left widthall flag_status_div_3"><a href="<?php echo 'https://'.$host_str.'/user/loginWindow';?>">Välkommen att logga in!</a></div>
		<?php endif; ?>
		
		<?php if($flag_status == 2): ?>
			<div class="float_left widthall"><img alt="correct" src="/images/success.png" class="float_left" /></div>
			<div class="float_left widthall flag_status_div_2"><?php echo __('Ditt konto är nu aktiverat.') ?></div>
			<div class="float_left widthall flag_status_div_3"><a href="<?php echo 'https://'.$host_str.'/user/loginWindow';?>">Välkommen att logga in!</a></div>
		<?php endif; ?>
		
		<?php if($flag_status == 3): ?>
			<div class="float_left widthall"><img alt="correct" src="/images/fail.png" class="float_left" /></div>
			<div class="float_left widthall flag_status_div_1"><?php echo __('Ogiltig aktiveringskod, vänligen bekräfta din aktiveringskod.') ?></div>
		<?php endif; ?>
		
	  </div>
	</div>
	</div>
</div>
</div>