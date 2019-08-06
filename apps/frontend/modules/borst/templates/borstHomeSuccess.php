<div class="content_main_div_left">
    <?php $limit = 1; ?>
    <?php $obj_count = 1; ?>
    <?php $count = 1; ?>
    <?php $cnt = 0; ?>
    <?php //echo count($left_records);?>
    <?php foreach ($left_records as $obj): ?>
        <?php if ($count == $limit && $count < $article_limit - $secondLimit): ?>
            <?php if ($obj_count == 6 || $obj_count == 7): ?>
                <?php $date = explode('-', substr($obj['article_date'], 0, 10)); ?>
                <?php if ($obj_count == 6): ?>
                    <?php
                    $arr = array();
                    $arr[] = $obj;
                    ?>
                    <?php $limit+=1; ?>
                <?php endif; ?>

                <?php if ($obj_count == 7): ?>
                    <?php $arr[] = $obj; ?>
                    <?php $cnt = 0; ?>
                    <?php $obj_count = 0; ?>
                    <?php $limit+=2; ?>
                    <div class="home_heading_l_3_head_div">

                        <?php for ($i = 0; $i < 2; $i++): ?>
                            <div class="width223 float_left <?php
                    if ($i == 0) {
                        echo "margin_rgt_19";
                    }
                    ?>" >
                                <div class="home_heading_l_3_main_div <?php
                    if ($i == 1) {
                        echo "margin_rgt_0";
                    }
                    ?>">

                                    <div class="home_heading_l_3_img_div">
                                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor float_left">                                           
                                            <?php 
                                            if($arr[$i]['category_id'] == 6){
                                                $desc = $arr[$i]['text'];                                                                               
                                                $abc = explode("em&gt;",strip_tags($desc));
                                                echo "<span class='wizdom-two'><img src='/images/wizdom-quote.png'/>".implode(' ', array_slice(str_word_count($abc[1], 2), 0, 4)).'...</span>';
                                            }else {?>
                                            <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_semimid.', $arr[$i]['image']); ?>" width="223" />
                                            <?php } ?>
                                        </a>
                                    </div>
                                </div>

                    <?php $date = explode('-', substr($arr[$i]['article_date'], 0, 10)); ?>
                                <div class="home_heading_l_3_txt_div mrg_top_1 <?php
                    if ($i == 1) {
                        echo "margin_rgt_0";
                    }
                    ?>">

                                    <div class="home_heading_l_c_txt_main">                                
                                        <div><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor"><span class="<?php echo $fcol_hor_title[$i]; ?>"><?php echo $arr[$i]['title'] ?></span></a></div>
                                        <div class="margin_top_11">
                                            <span>
                                                <img src="/images/new_home/home_square_2.png" class="home_square"/>
                                            </span>
                                            <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor">
                                                <span class="<?php echo $fcol_body_text_6_7[$i]; ?>"><?php echo substr($arr[$i]['image_text'], 0, 122); ?></span>
                                            </a>
                                            <span class="home_body_l_1_red">
                                                <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="bluelink cursor"><!--Läs mer--></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="home_heading_l_txt dattimeinfo col-first-date">
                                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor">
                                            <!--<span style="float: none; top: 0px;" class="colorband"><img src="/images/new_home/arrow_bt.png" class="margin_rgt_4"/></span>-->
                                            <span class="home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                                            <span class="home_type"><?php echo $arr[$i]->getArticleCategory()->getCategoryName() ? $arr[$i]->getArticleCategory()->getCategoryName() : '' ?></span>
                                            <span class="home_cat"><?php echo $arr[$i]->getArticleType()->getTypeName() ? $arr[$i]->getArticleType()->getTypeName() : '' ?></span>                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                        <?php /* for ($i = 0; $i < 2; $i++): ?>
                          <?php $date = explode('-', substr($arr[$i]['article_date'], 0, 10)); ?>
                          <div class="home_heading_l_3_txt_div mrg_top_3 <?php if ($i == 1) {
                          echo "margin_rgt_0";
                          } ?>">
                          <div>
                          <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor">
                          <span class="home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                          <span class="home_type"><?php echo $arr[$i]->getArticleCategory()->getCategoryName() ? $arr[$i]->getArticleCategory()->getCategoryName() : '' ?></span>
                          <span class="home_cat"><?php echo $arr[$i]->getArticleType()->getTypeName() ? $arr[$i]->getArticleType()->getTypeName() : '' ?></span>
                          <!--<span style="float: none; top: 0.5px;" class="colorband"><img src="/images/new_home/arrow_bt.png" class="margin_rgt_4"/></span>-->
                          </a>
                          </div>
                          <div class="home_heading_l_c_txt_main">
                          <div><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor"><span class="<?php echo $fcol_hor_title[$i]; ?>"><?php echo $arr[$i]['title'] ?></span></a></div>
                          <div class="margin_top_11">
                          <span>
                          <img src="/images/new_home/home_square_2.png" class="home_square"/>
                          </span>
                          <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor">
                          <span class="<?php echo $fcol_body_text_6_7[$i]; ?>"><?php echo substr($arr[$i]['image_text'], 0, 122); ?></span>
                          </a>
                          <span class="home_body_l_1_red">
                          <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="bluelink cursor">...</a>
                          </span>
                          </div>
                          </div>
                          </div>
                          <?php endfor; */ ?>
                    </div>
                    <div class="home_artline_leftdiv">&nbsp;</div>
                <?php endif; ?>
                <?php $obj_count++; ?>
                <!-- if normal column exist-->

            <?php elseif ($obj_count == 2 || $obj_count == 3): ?>
                <?php $date = explode('-', substr($obj['article_date'], 0, 10)); ?>
                <?php if ($obj_count == 2): ?>
                    <?php
                    $arr = array();
                    $arr[] = $obj;
                    ?>
                    <?php $limit+=2; ?>
                <?php endif; ?>
                <!-- if normal column exist-->
                <?php if ($obj_count == 3): ?>
                <?php $arr[] = $obj; ?>
                <?php //$cnt = 0;  ?>
                <?php //$obj_count = 0;   ?>
                <?php $limit+=2; ?>

                <?php for ($i = 0; $i < 2; $i++): ?>
                        <div class="home_heading_l_2_main_div">
                            <div class="home_heading_l_2_img_div">
                                <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor float_left">
                                    
                                    <!--<img src="/images/new_home/home_heading_l_2_img.png" />-->                                    
                                    <?php 
                                    if($arr[$i]['category_id'] == 6){
                                        $desc = $arr[$i]['text'];                                                                               
                                        $abc = explode("em&gt;",strip_tags($desc));
                                        echo "<span class='wizdom-two'><img src='/images/wizdom-quote.png'/>".implode(' ', array_slice(str_word_count($abc[1], 2), 0, 4)).'...</span>';
                                    }else {?>
                                        <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_semimid.', $arr[$i]['image']); ?>"  width="200" />
                                    <?php }
                                    ?>
                                </a>
                            </div>
                            <div class="home_heading_l_2_txt_div">
                                <div class="home_heading_l_c_txt_main">                                
                                    <div><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor"><span class="<?php echo $fcol_ver_title[$i] ?>"><?php echo $arr[$i]['title'] ?></span></a></div>
                                    <div class="margin_top_11">
                                        <span>
                                            <img src="/images/new_home/home_square_2.png" class="home_square"/>
                                        </span>
                                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor">
                                            <span class="<?php echo $fcol_body_text_2_3[$i]; ?>"><?php echo substr($arr[$i]['image_text'], 0, 122); ?></span>
                                        </a>
                                        <span class="home_body_l_1_red">
                                            <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="bluelink cursor"><!--Läs mer--></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="home_heading_l_txt dattimeinfo col-first-date">
                                    <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor">
                                        <!--<span class="colorband" style="float:none; top:0px;"><img src="/images/new_home/arrow_bt.png" class="margin_rgt_4"/></span>-->
                                        
                                        <span class="home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                                        <span class="home_type"><?php echo $arr[$i]->getArticleCategory()->getCategoryName() ? $arr[$i]->getArticleCategory()->getCategoryName() : '' ?></span>
                                        <span class="home_cat"><?php echo $arr[$i]->getArticleType()->getTypeName() ? $arr[$i]->getArticleType()->getTypeName() : '' ?></span>                                        
                                    </a>
                                </div>
                            </div>
                            <div class="home_artline_leftdiv">&nbsp;</div>
                        </div>
                    <?php endfor; ?>
                    <!--<div class="artlineleftdiv">&nbsp;</div>-->
                <?php endif; ?>
                <?php $obj_count++; ?>
                <!-- if normal column exist-->
        <?php elseif ($obj_count == 1 || $obj_count == 4 || $obj_count == 5): ?>
                            <?php $limit+=2; ?>
                            <?php $obj_count++; ?>

            <?php $date = explode('-', substr($obj['article_date'], 0, 10)); ?>
                <div class="home_heading_l articleftdiv autoheight">
                    <div class="">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="bluelink1 cursor">                                                    
            <?php /* ?><img src="/images/<?php echo $image_arr_13[$i] ?>" alt="photo" /><?php */ ?>
                            <?php 
                            if($obj['category_id'] == 6){
                                
                                $desc = $obj['text'];   
                                //var_dump($desc);
                                $abc = explode("em&gt;",strip_tags($desc));
                                echo "<div class='wizdom-one'><img src='/images/wizdom-quote.png'/>".implode(' ', array_slice(str_word_count($abc[1], 2), 0, 4)).'...</div>';
                            }else {?>
                                <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_large.', $obj['image']); ?>" width="465"/>
                            <?php }
                            ?>
                                <!--<img src="/images/new_home/sensex_img.png" />-->
                        </a>
                    </div>
                    <div class="home_heading_l_bigimg_main">
                        <span class="home_heading_l_bigimg_txt_big">
                            <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="blackcolor cursor">
            <?php //echo html_entity_decode($col1_13_heading_style_start[$i])   ?>
            <?php //print html_entity_decode($col1_13_heading_style_start[$cnt])      ?><?php //echo $obj['title']      ?><?php //print html_entity_decode($col1_13_heading_style_end[$cnt])      ?><?php //echo html_entity_decode($col1_13_heading_style_end[$i])         ?>
                                <span class="<?php echo $fcol_big_title[$cnt] ?>"><?php echo $obj['title'] ?></span>
                            </a>
                        </span>
                    </div>
                    <div class="home_heading_l_small_txt articleinfo">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="blackcolor cursor">                                                                                   
                                <img src="/images/new_home/home_square_2.png" alt="arrow" class="home_square" />                            
                            <span class="<?php echo $fcol_body_text_1_4_5[$cnt]; ?>"><?php echo substr($obj['image_text'], 0, 122); ?></span>
                        </a>
                        <span class="home_body_l_1_red">
                            <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="bluelink cursor"><!--Läs mer--></a>
                        </span>
                    </div>
                    <div class="home_heading_l_txt dattimeinfo col-first-date">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="colorbandWrapper cursor">
                                <!--<span class="colorband" style="margin:4px 0px 0 0;"><img src="/images/new_home/arrow_bt.png" class="margin_rgt_4"/><!--<img src="/images/smallcolorstrip.jpg" alt="strip" /></span>-->
                        </a>
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="date home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                            <span class="update home_type"><?php echo $obj->getArticleCategory()->getCategoryName() ? $obj->getArticleCategory()->getCategoryName() : '' ?></span>
                            <span class="home_cat"><?php echo $obj->getArticleType()->getTypeName() ? $obj->getArticleType()->getTypeName() : '' ?></span>
                        </a>
                        <a href="<?php echo 'http://' . $host_str . '/borst/commentOnBorstArticle/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($obj['article_id']) ?></span>
                        </a>
                        <?php if($obj['art_statid'] == 5):?>
                            <a><span><img src="/images/new_home/BT-lock_30x30.png" width="17"/></span></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="artlineleftdiv">&nbsp;</div>
            <?php $cnt++; ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php $count++; ?>
    <?php endforeach; ?>
</div>

<div class="content_main_div_center">
    <?php $limit = 2; ?>
    <?php $obj_count = 2; ?>
<?php $count = 1; ?>
    <?php $cnt = 0; ?>
    <?php $mCount = 1 ?>
        <?php //echo count($left_records);  ?>
        <?php foreach ($left_records as $obj): ?>
            <?php if ($count == $limit || $count > $article_limit - $secondLimit): ?>


        <?php $date = explode('-', substr($obj['article_date'], 0, 10)); ?>
            <div class="content_sub_div_center autoheight">
                            <?php if ($count == 4) { ?>
                    <div class="home_artline1_m_div" style="margin-top:0px;">&nbsp;</div>
        <?php } ?>
                <div>
                    <div class="home_heading_c">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="bluelink1 cursor">
        <?php /* ?><img src="/images/<?php echo $image_arr_814[$l] ?>" alt="photo" /><?php */ ?>                            
                            
                            <?php 
                            if($obj['category_id'] == 6){
                                $desc = $obj['text'];                                                                               
                                $abc = explode("em&gt;",strip_tags($desc));
                                echo "<div class='wizdom-three'><img src='/images/wizdom-quote.png'/>".implode(' ', array_slice(str_word_count($abc[1], 2), 0, 4)).'...</div>';
                            }else {?>
                            <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_small.', $obj['image']); ?>" width="165"  />    
                            <?php }
                            ?>
                        </a>
                    </div>

                    <div class="">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="blackcolor cursor">
                            <span class="<?php echo $col1_814_heading_style[$cnt]; ?>"><?php echo $obj['title'] ?></span>
                        </a>
                    </div>
                    <div class="articleinfo home_body_l_1">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="blackcolor cursor">                                                        
                            <img class="home_square" src="/images/new_home/home_square_2.png" alt="arrow" class="home_square" />                            
                            <span class="<?php echo $mcol_body_text[$cnt]; ?>"><?php echo substr($obj['image_text'], 0, 122); ?></span>
                        </a>
                        <span class="home_body_l_1_blue">
                            <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $obj['article_id']; ?>" class="bluelink"><!--Läs mer--></a>
                        </span>
                    </div>
                    <div class="home_heading_l_btmtxtmain dattimeinfo col-middle-date">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="date home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                            <span class="update home_type"><?php echo $cat_arr[$obj['category_id']] ? $cat_arr[$obj['category_id']] : '' ?></span>
                            <span class="home_cat"><?php echo $type_arr[$obj['type_id']] ? $type_arr[$obj['type_id']] : '' ?></span>
                        </a>
                        <a href="<?php echo 'http://' . $host_str . '/borst/commentOnBorstArticle/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($obj['article_id']) ?></span>
                        </a>
                        <?php if($obj['art_statid'] == 5):?>
                            <a><span><img src="/images/new_home/BT-lock_30x30.png" width="17"/></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php if ($count > 2) { ?>
                    <div class="home_artline1_m_div">&nbsp;</div>
            <?php } ?>
            </div>
            <?php $limit+=2; ?>
            <?php if ($obj_count == 6): ?>
                <?php
                $obj_count = 0;
                $limit += 1;
                ?>
            <?php endif; ?>
            <?php $obj_count++; ?>
        <?php if ($cnt == 3): ?>
            <?php $cnt = 0; ?>
        <?php else: ?>
            <?php $cnt++; ?>
        <?php endif; ?>
                                <?php if ($mCount == 1): ?>
                <div class="content_sub_div_center autoheight">
                    <div>
                        <div class="home_head9_m">9 mest lästa artiklar:</div>
                        <div class="like_bar_div">
                            <div class="top_nine_article">
                                <ul>
            <?php
            $countSeq = 1;
            foreach ($top_nine_viewed_articles as $topViewed):
                ?>
                                        <li>
                                            <div class="home_topart"><a class="cursor" href="<?php echo "http://" . $host_str ?>/borst/borstArticleDetails/article_id/<?php echo $topViewed->article_id ?>"><span class="toplisthome_articletitle home_9read_m"><span class="home_9read_m_count"><?php echo $countSeq++ . '   '; ?></span><span class="home_9read_m_details"><?php echo $topViewed->title ?></span></span></a></div>
                                            <div class="home_artline_centerdiv">&nbsp;</div>
                                        </li>
            <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="home_heading_r_img" style="margin-top: -9px;">
                                <div class="blue_border_img">&nbsp;</div>
                                <div class="home_ad_m float_left">Annons</div>
                            </div>
                        </div>
                    </div>
            <?php include_partial('global/center_mid_ads', array('ad' => $ad_1, 'column_position' => "center")) ?>
                 <div class="home_headtwtr_m twtr_wid">Följ oss på Twitter! <img class="twtr_wid_img" src="/images/new_home/twtr_white.png" /></div>
					</div>
                <div class="twt_bar_details">
                    <!--<a class="twitter-timeline"  href="https://twitter.com/hashtag/corgi" data-widget-id="700280847123873792">#corgi Tweets</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>-->

                    <a class="twitter-timeline"  href="https://twitter.com/Borstjanaren" data-widget-id="700569445123493888">Tweets by @Borstjanaren</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            <?php endif; ?>
        <?php $mCount++; ?>
    <?php endif; ?>
    <?php $count++; ?>


        <?php endforeach; ?>
</div>

<div class="rightbanner autoheight padding_0">
    <div class="home_heading_r">
        <div class="home_ad_r float_left font_size_12">Annons</div>
        <?php //include_partial('global/ad_message') ?>
        <?php include_partial('global/right_top_ads', array('ad' => $ad_1)) ?>
        <?php include_partial('global/right_top_ads', array('ad' => $ad_2)) ?>        
        <?php include_partial('global/sponsorer_ad') ?>
        
        <!--<div class="home_ad_r_spons float_left">Annons</div> -->
        <?php include_partial('global/bulk_ads', array('bulk_ads' => $ad_3)) ?>
        <!--<div class="blank_10h">&nbsp;</div>-->
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
        <?php //include_partial('global/bulk_ads',array('bulk_ads'=>$ad_3))            ?>
    <?php endif; ?>
                <div class="home_heading_l_txt dattimeinfo"> 
                    <!--<span class="colorband" style="margin:4px 0px 0 0;">-->
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>"><!--<img src="/images/new_home/arrow_bt.png"  class="margin_rgt_4"/>-->
                    </span>
                    <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="cursor">
                        <span class="date home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span> 
                        <span class="update home_type"><?php echo $cat_arr[$twentyeight_2_thirtyfive[$l]['category_id']] ? $cat_arr[$twentyeight_2_thirtyfive[$l]['category_id']] : '' ?></span> 
                        <span class="home_cat"><?php echo $type_arr[$twentyeight_2_thirtyfive[$l]['type_id']] ? $type_arr[$twentyeight_2_thirtyfive[$l]['type_id']] : '' ?></span> 
                    </a>
                    <a href="<?php echo 'http://' . $host_str . '/borst/commentOnBorstArticle/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="cursor">
                        <span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($twentyeight_2_thirtyfive[$l]['article_id']) ?></span>
                    </a>
                    <?php if($twentyeight_2_thirtyfive[$l]['art_statid'] == 5):?>
                        <a><span><img src="/images/new_home/BT-lock_30x30.png" width="17"/></span></a>
                    <?php endif; ?>                    
                </div>
                <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="blackcolor cursor">
                    <span class="<?php echo $last_column_style[$l % 4] ?> float_left"><?php echo $twentyeight_2_thirtyfive[$l]['title'] ?></span>
                </a>
                <div class="advertinfo">
                    <div class="home_heading_l_small_txt">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="blackcolor cursor">                                                                                    
                                <img src="/images/new_home/home_square_2.png" alt="arrow" class="home_square" />                            
                            <span class="<?php echo $rcol_body_text[$l % 4]; ?>"><?php echo substr($twentyeight_2_thirtyfive[$l]['image_text'], 0, 122); ?></span>
                        </a>
                        <span class="home_body_l_1_red"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="bluelink"><!--Läs mer--></a></span>
                    </div>
                </div>
                <div class="advertdiv photo">
                    <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $twentyeight_2_thirtyfive[$l]['article_id']; ?>" class="bluelink1 cursor">                        
            <?php /* ?><img src="/images/<?php echo $last_column_img[$m] ?>" alt="photo1" />><?php */ ?>
                        <!--<img src="/images/new_home/negativa.png" />-->                        
                        <?php 
                            if($twentyeight_2_thirtyfive[$l]['category_id'] == 6){
                                $desc = $twentyeight_2_thirtyfive[$l]['text'];                                                                               
                                $abc = explode("em&gt;",strip_tags($desc));
                                echo "<div class='wizdom-one'><img src='/images/wizdom-quote.png'/>".implode(' ', array_slice(str_word_count($abc[1], 2), 0, 4)).'...></div>';
                            }else {?>
                                <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_mid.', $twentyeight_2_thirtyfive[$l]['image']); ?>"  width="300"  />
                            <?php }
                        ?>
                    </a>
					<div class="artlinerightdiv width_300">&nbsp;</div>
                </div>
            </div>
    <?php
    $m++;
endfor;
?>
        <!-- 28 to 35 start -->

    </div>
</div>

<div class="load_article" id="load_article_1" pageno="2"><img src="/images/new_home/load_articles.png" title="Load more article" width="978" /></div>

<div class="bottom_shop_border">&nbsp;</div>
<div class="footer">
    <div class="footer_inner_div">
        <div class="float_left margin_bottom_home_shop">
        
                <div class="bt-shop_border_home"><img src="/images/new_home/bt-shop_border_home.png" width="970" /></div>
                
            <div class="color_plate_first">
                <div class="color_plate_img_first"><img src="/images/new_home/bt-shop_logo-home.png" width="92" /></div>
                <div class="bottom_shop_txt_main">
                    <div class="bottom_shop_cart">Välkommen till BT-shop <br />
– affären för bättre affärer!</div>
                </div>
            </div>
            <?php $adCount = 1; ?>
            <?php foreach ($metastock_data as $article): ?>
                <?php $modAdCount = $adCount % 2; ?>
                <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
                    <div class="color_plate">
                        <?php if ($article->btshop_product_image): ?>
                            <div class="color_plate_img"><img src="/uploads/btshopThumbnail/<?php echo $article->btshop_product_image; ?>" width="102" height="94" class="color_plate_img_radius"/></div>
                        <?php else: ?>
                            <div class="color_plate_img"><img src="/images/new_home/bottom_shop_img1.png" width="102" height="94" class="color_plate_img_radius"/></div>
                        <?php endif; ?>
                        <div class="bottom_shop_txt_main">
                            <div class="<?php if ($modAdCount == 1) {
                        echo 'bottom_shop_rub2';
                    } else {
                        echo 'bottom_shop_rub1';
                    } ?>"><?php echo $article->btshop_article_title; ?></div>
                            <?php if ($article->btshop_article_subtitle): ?>
                                <span class="<?php if ($modAdCount == 1) {
                            echo 'bottom_shop_ingress2';
                        } else {
                            echo 'bottom_shop_ingress1';
                        } ?>"><?php echo substr($article->btshop_article_subtitle, 0, 58); ?></span>
                                <span class="<?php if ($modAdCount == 1) {
                echo 'bottom_shop_price2';
            } else {
                echo 'bottom_shop_price1';
            } ?>"><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?>&nbsp;KR</span>
 
                                <!--<span class="bottom_shop_readmore">...</span>-->
    <?php endif ?>
                
                        </div>
                    </div>
                </a>
    <?php
    $adCount++;
endforeach;
?>
        </div>
        <div class="morearticle"></div>
        <div class="loading_home" style="display: none;">&nbsp;</div>
        <div class="bt-shop_border_home2"><img src="/images/new_home/bt-shop_border_home.png" width="970" /></div>
        <div class="home_footer_divider">&nbsp;</div>
        <div class="footer_main">
<?php include_partial('global/six_cube_footer', array('host_str' => $host_str, 'bottom_commodities_links' => $bottom_commodities_links, 'bottom_currencies_links' => $bottom_currencies_links, 'bottom_buysell_links' => $bottom_buysell_links, 'bottom_statistics_links' => $bottom_statistics_links, 'bottom_aktier_links' => $bottom_aktier_links, 'bottom_kronika_links' => $bottom_kronika_links)) ?>
        </div>
    </div>
</div>