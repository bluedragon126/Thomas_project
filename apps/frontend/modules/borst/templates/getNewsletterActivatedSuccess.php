<div class="maincontentpage" id="getActivated">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
   <div class="shoph3 widthall">Kontot aktiverat!</div>
	<div class="float_left listing">
	  <div class="float_left widthall">		
		<?php if($status == 1): ?>			
			<div class="float_left widthall flag_status_div_2"><?php echo __('Ditt konto är redan aktiverat') ?></div>
		<?php endif; ?>
                <?php if($status == 2): ?>
			<div class="float_left widthall flag_status_div_1"><?php echo __('Nyhetsbrev aktiveringsadressen är ogiltig') ?></div>			
		<?php endif; ?>
	  </div>
	</div>
	</div>
</div>
</div>