<div class="rightbanner autoheight padding_0">
  
  <!-- 28 to 35 start -->
    <div class="home_heading_r">

        <div class="home_ad_r float_left font_size_12 top_space">Annons</div>
        <?php //include_partial('global/ad_message') ?>
            <?php include_partial('global/right_top_ads', array('ad' => $ad_1)) ?>
            <?php include_partial('global/right_top_ads', array('ad' => $ad_2)) ?>
        
        <?php include_partial('global/sponsorer_ad') ?>
         
        <?php include_partial('global/bulk_ads', array('bulk_ads' => $ad_3)) ?>
        <!--<div class="blank_10h">&nbsp;</div>---->
        <?php include_partial('global/right_top_ads', array('ad' => $ad_4)) ?>
        <?php if(count($twentyeight_2_thirtyfive)>0) {?><div class="home_adline_r_div">&nbsp;</div><?php }?>
        <!-- 28 to 35 start -->
        <?php 
        $m = 0;
        for ($l = 0; $l < count($twentyeight_2_thirtyfive); $l++):
            ?>
                <?php $date = explode('-', substr($twentyeight_2_thirtyfive[$l]['article_date'], 0, 10)); ?>
            <div class="home_right_column">
                <?php if ($m == 0): ?>		
        <?php //include_partial('global/bulk_ads',array('bulk_ads'=>$ad_3))          ?>
        <?php endif; ?>
                <div class="home_heading_l_txt dattimeinfo"> 
                    <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="cursor">
                    <!--<span class="colorband" style="margin: 4px 0px 0px; padding-top: 2px;">-->
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>"><!--<img src="/images/new_home/arrow_bt_art.png"  class="margin_rgt_4"/>-->
                    </span>
                        <span class="date home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span> 
                        <span class="update home_type"><?php echo $cat_arr[$twentyeight_2_thirtyfive[$l]['category_id']] ? $cat_arr[$twentyeight_2_thirtyfive[$l]['category_id']] : '' ?></span> 
                        <span class="home_cat"><?php echo $type_arr[$twentyeight_2_thirtyfive[$l]['type_id']] ? $type_arr[$twentyeight_2_thirtyfive[$l]['type_id']] : '' ?></span> 
                    </a>
                    <a href="<?php echo 'https://' . $host_str . '/borst/commentOnBorstArticle/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="cursor">
                        <span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($twentyeight_2_thirtyfive[$l]['article_id']) ?></span>
                    </a>
                     
                </div>
                <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="blackcolor cursor">
                    <span class="<?php echo $last_column_style[$l % 4] ?> mrg_top_5 float_left"><?php echo $twentyeight_2_thirtyfive[$l]['title'] ?></span>
                </a>
                <div class="advertinfo">
                    <div class="home_heading_l_small_txt">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="blackcolor cursor">
                            <img class="home_square" src="/images/new_home/red_square.png" alt="arrow" />
                            <span class="<?php echo $rcol_body_text[$l % 4]; ?>"><?php echo substr($twentyeight_2_thirtyfive[$l]['image_text'],0,122); ?></span>
                        </a>
                        <span class="home_body_l_1_red"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="bluelink"> Läs mer...</a></span>
                    </div>
                </div>
                <div class="advertdiv photo">
                    <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="bluelink1 cursor">
    <?php /* ?><img src="/images/<?php echo $last_column_img[$m] ?>" alt="photo1" />><?php */ ?>
                        <!--<img src="/images/new_home/negativa.png" />-->
                        <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_mid.', $twentyeight_2_thirtyfive[$l]['image']); ?>"  width="300" />
                    </a>
                </div>
            </div>
            <?php
            $m++;
        endfor;
        ?>
        <!-- 28 to 35 start -->

    </div>
  <!-- 28 to 35 start -->
  <?php if(count($twentyeight_2_thirtyfive)>0) {?>
  <?php include_partial('global/bulk_ads',array('bulk_ads'=>$ad_3)) ?>
  <div class="blank_10h">&nbsp;</div>
  <?php include_partial('global/right_top_ads',array('ad'=>$ad_4));} ?>
</div>