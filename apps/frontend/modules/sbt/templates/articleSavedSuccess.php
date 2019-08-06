<?php if($sf_user->getAttribute('published_analysis', '' , 'userProperty')==1):?>
<div class="shoph3 widthall margin_top_30"><?php echo __('Your Article has been published...!'); ?></div>
<?php else:?>
<div class="shoph3 widthall margin_top_30"><?php echo __('Your Article is sent to admin for approval...!'); ?></div>
<div class="shopinfo">
<span class="main_link_color"><?php echo __('To View the Article List, click')?><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/articleList"><?php echo __(' here') ?></a></span>
</div>
<?php endif;?>

