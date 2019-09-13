<div class="article_left_list">
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
                    <div class="width223 float_left <?php if ($i == 0) {
                        echo "margin_rgt_19";
                    } ?>" >
                        <div class="home_heading_l_3_main_div <?php if($i==1){ echo "margin_rgt_0"; } ?>">
                            <div class="home_heading_l_3_img_div">
                                <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor float_left">
                                    <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_semimid.', $arr[$i]['image']); ?>" width="223"  />
                                    <!--<img src="/images/new_home/home_heading_l_2_img.png" />-->
                                </a>
                            </div>
                        </div>
                        <?php $date = explode('-', substr($arr[$i]['article_date'], 0, 10)); ?>
                            <div class="home_heading_l_3_txt_div mrg_top_4 <?php if($i==1){ echo "margin_rgt_0"; } ?>">
                                
                                <div class="home_heading_l_c_txt_main">                                
                                    <div><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor"><span class="<?php echo $fcol_hor_title[$i]; ?>"><?php echo $arr[$i]['title'] ?></span></a></div>
                                    <div class="margin_top_11">
                                        <span>
                                            <img class="home_square" src="/images/new_home/red_square.png" style="margin-right: 2px;"/>
                                        </span>
                                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor">
                                            <span class="<?php echo $fcol_body_text_6_7[$i]; ?>"><?php echo substr($arr[$i]['image_text'],0,122); ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class = "home_heading_l_txt dattimeinfo home_body_l_double">
                                    <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor">
                                        <span class="home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                                        <span class="home_type"><?php echo $arr[$i]->getArticleCategory()->getCategoryName() ? $arr[$i]->getArticleCategory()->getCategoryName() : '' ?></span>
                                        <span class="home_cat"><?php echo $arr[$i]->getArticleType()->getTypeName() ? $arr[$i]->getArticleType()->getTypeName() : '' ?></span>
                                        <!--<span><img src="/images/new_home/arrow_bt_art.png" class="margin_rgt_4"/></span>-->
                                    </a>
                                </div>
                            </div>
                        </div>
                            <?php endfor; ?>
                     
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
                <!-- if second column exist-->
                <?php if ($obj_count == 3): ?>
                    <?php $arr[] = $obj; ?>
                    <?php //$cnt = 0; ?>
                    <?php //$obj_count = 0; ?>
                    <?php $limit+=2; ?>

                <?php for ($i = 0; $i < 2; $i++): ?>
                        <div class="home_heading_l_2_main_div">
                            <div class="home_heading_l_2_img_div">
                                <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor float_left">
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
                                    <div><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor"><span class="<?php echo $fcol_ver_title[$i] ?>"><?php echo $arr[$i]['title'] ?></span></a></div>
                                    <div class="margin_top_11">
                                        <span>
                                            <img class="home_square" src="/images/new_home/red_square.png" style="margin-right: 2px;"/>
                                        </span>
                                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor">
                                            <span class="<?php echo $fcol_body_text_2_3[$i]; ?>"><?php echo substr($arr[$i]['image_text'],0,122); ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="line_height0 col-first-date">
                                    <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor">
                                        <span class="home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                                        <span class="home_type"><?php echo $arr[$i]->getArticleCategory()->getCategoryName() ? $arr[$i]->getArticleCategory()->getCategoryName() : '' ?></span>
                                        <span class="home_cat"><?php echo $arr[$i]->getArticleType()->getTypeName() ? $arr[$i]->getArticleType()->getTypeName() : '' ?></span>
                                        <!--<span><img src="/images/new_home/arrow_bt_art.png" class="margin_rgt_4"/></span>-->
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
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="bluelink1 cursor">
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
                        </a>
                    </div>
                    <div class="home_heading_l_bigimg_main">
                        <span class="home_heading_l_bigimg_txt_big">
                            <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="blackcolor cursor">
                                <?php //echo html_entity_decode($col1_13_heading_style_start[$i]) ?>
            <?php //print html_entity_decode($col1_13_heading_style_start[$cnt])    ?><?php //echo $obj['title']    ?><?php //print html_entity_decode($col1_13_heading_style_end[$cnt])    ?><?php //echo html_entity_decode($col1_13_heading_style_end[$i])       ?>
                                <span class="<?php echo $fcol_big_title[$cnt] ?>"><?php echo $obj['title'] ?></span>
                            </a>
                        </span>
                    </div>
                    <div class="home_heading_l_small_txt articleinfo">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="blackcolor cursor">
                            <img class="home_square" src="/images/new_home/red_square.png" alt="arrow" />
                            <span class="<?php echo $fcol_body_text_1_4_5[$cnt]; ?>"><?php echo substr($obj['image_text'],0,122); ?></span>
                        </a>
                    </div>
                    <div class="home_heading_l_txt dattimeinfo col-first-date">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="date home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                            <span class="update home_type"><?php echo $obj->getArticleCategory()->getCategoryName() ? $obj->getArticleCategory()->getCategoryName() : '' ?></span>
                            <span class="bluefont home_cat"><?php echo $obj->getArticleType()->getTypeName() ? $obj->getArticleType()->getTypeName() : '' ?></span>
                        </a>
                        <a href="<?php echo 'https://' . $host_str . '/borst/commentOnBorstArticle/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($obj['article_id']) ?></span>
                        </a>
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="colorbandWrapper cursor">
                                <!--<span class="colorband"><img src="/images/new_home/arrow_bt_art.png" class="margin_rgt_4"/><!--<img src="/images/smallcolorstrip.jpg" alt="strip" /> </span>-->
                        </a>
                    </div>
                </div>
                <div class="artlineleftdiv">&nbsp;</div>
                <?php $cnt++; ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php $count++; ?>
<?php endforeach; ?>
</div>
<div class="article_center_list">
        <?php $limit = 2; ?>
        <?php $obj_count = 2; ?>
        <?php $count = 1; ?>
        <?php $cnt = 0; ?>
        <?php $mCount = 1 ?>
        <?php //echo count($left_records);?>
        <?php foreach ($left_records as $obj): ?>
    <?php if ($count == $limit || $count > $article_limit - $secondLimit): ?>


        <?php $date = explode('-', substr($obj['article_date'], 0, 10)); ?>
    <div class="content_sub_div_center autoheight">
                <div>
                    <div class="home_heading_c">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="bluelink1 cursor">
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
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="blackcolor cursor">
                            <span class="<?php echo $col1_814_heading_style[$cnt]; ?>"><?php echo $obj['title'] ?></span>
                        </a>
                    </div>
                    <div class="articleinfo home_body_l_1">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="blackcolor cursor">
                            <img class="home_square" src="/images/new_home/home_square_2.png" alt="arrow" />
                            <span class="<?php echo $mcol_body_text[$cnt]; ?>"><?php echo substr($obj['image_text'],0,122); ?></span>
                        </a>

                    </div>
                    <div class="home_heading_l_btmtxtmain dattimeinfo col-middle-date">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="date home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                            <span class="update home_type"><?php echo $cat_arr[$obj['category_id']] ? $cat_arr[$obj['category_id']] : '' ?></span>
                            <span class="home_cat"><?php echo $type_arr[$obj['type_id']] ? $type_arr[$obj['type_id']] : '' ?></span>
                        </a>
                        <a href="<?php echo 'https://' . $host_str . '/borst/commentOnBorstArticle/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="chaticon"><?php echo $comment_cnt->getTotalCommentCount($obj['article_id']) ?></span>
                        </a>
                    </div>

                </div>
                <div class="home_artline1_m_div">&nbsp;</div>
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
    <?php endif; ?>
    <?php $count++; ?>

    
<?php endforeach; ?>
</div>