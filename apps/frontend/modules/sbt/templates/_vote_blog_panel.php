<form name="vote_blog_form" id="vote_blog_form" method="post" action="">
  <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blog_id; ?>"/>
  <div class="vote_panel">
    <div class="float_left vote_panel_outer">
      <div class="float_left vote_panel_header_row"><?php echo __('Rösta')?></div>
      <div class="float_left vote_panel_option_row">
        <div class="float_left img_div">
          <?php for($i=0;$i<=4;$i++):?>
          <img alt="star" src="/images/ratingstar_org.png" />
          <?php endfor; ?>
        </div>
        <div class="float_left vote_radio">
          <input type="radio" class="radio" name="vote_type<?php echo $blog_id; ?>" id="vote_type<?php echo $blog_id; ?>" value="2" />
        </div>
        <div class="float_left vote_title"> <?php echo __('Toppen')?> </div>
      </div>
      <div class="float_left vote_panel_option_row">
        <div class="float_left img_div">
          <?php for($i=0;$i<4;$i++):?>
          <img alt="star" src="/images/ratingstar_org.png" />
          <?php endfor; ?>
          <?php for($i=0;$i<1;$i++):?>
          <img alt="star" src="/images/ratingstar_gray.png" />
          <?php endfor; ?>
        </div>
        <div class="float_left vote_radio">
          <input type="radio" class="radio" name="vote_type<?php echo $blog_id; ?>" id="vote_type<?php echo $blog_id; ?>" value="2" />
        </div>
        <div class="float_left vote_title"> <?php echo __('Bra')?> </div>
      </div>
      <div class="float_left vote_panel_option_row">
        <div class="float_left img_div">
          <?php for($i=0;$i<3;$i++):?>
          <img alt="star" src="/images/ratingstar_org.png" />
          <?php endfor; ?>
          <?php for($i=0;$i<2;$i++):?>
          <img alt="star" src="/images/ratingstar_gray.png" />
          <?php endfor; ?>
        </div>
        <div class="float_left vote_radio">
          <input type="radio" class="radio" name="vote_type<?php echo $blog_id; ?>" id="vote_type<?php echo $blog_id; ?>" value="2" />
        </div>
        <div class="float_left vote_title"> <?php echo __('Okej')?> </div>
      </div>
      <div class="float_left vote_panel_option_row">
        <div class="float_left img_div">
          <?php for($i=0;$i<2;$i++):?>
          <img alt="star" src="/images/ratingstar_org.png" />
          <?php endfor; ?>
          <?php for($i=0;$i<3;$i++):?>
          <img alt="star" src="/images/ratingstar_gray.png" />
          <?php endfor; ?>
        </div>
        <div class="float_left vote_radio">
          <input type="radio" class="radio" name="vote_type<?php echo $blog_id; ?>" id="vote_type<?php echo $blog_id; ?>" value="2" />
        </div>
        <div class="float_left vote_title"> <?php echo __('Nja...')?> </div>
      </div>
      <div class="float_left vote_panel_option_row">
        <div class="float_left img_div">
          <?php for($i=0;$i<1;$i++):?>
          <img alt="star" src="/images/ratingstar_org.png" />
          <?php endfor; ?>
          <?php for($i=0;$i<4;$i++):?>
          <img alt="star" src="/images/ratingstar_gray.png" />
          <?php endfor; ?>
        </div>
        <div class="float_left vote_radio">
          <input type="radio" class="radio" name="vote_type<?php echo $blog_id; ?>" id="vote_type<?php echo $blog_id; ?>" value="2" />
        </div>
        <div class="float_left vote_title"> <?php echo __('Dålig')?> </div>
      </div>
      <div class="float_left vote_panel_option_row blog_td_border">
        <div class="float_left img_div">
          <?php for($i=0;$i<5;$i++):?>
          <img alt="star" src="/images/ratingstar_gray.png" />
          <?php endfor; ?>
        </div>
        <div class="float_left vote_radio">
          <input type="radio" class="radio" name="vote_type<?php echo $blog_id; ?>" id="vote_type<?php echo $blog_id; ?>" value="2" />
        </div>
        <div class="float_left vote_title"> <?php echo __('Urusel')?> </div>
      </div>
      <div class="float_left padding_top_5 padding_left_5px">
        <div class="submit_votebutton">
          <input type="button" name="post_data" id="post_data<?php echo $blog_id; ?>" class="submit_votebuttontext submit" value="<?php echo __('Rösta  nu') ?>" onClick="submit_vote_for_all_blog_page('<?php echo $blog_id; ?>')"/>
        </div>
      </div>
    </div>
  </div>
</form>
