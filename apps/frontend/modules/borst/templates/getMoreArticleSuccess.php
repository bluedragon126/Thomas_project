<div class="bt-shop_border_home2"><img src="/images/new_home/bt-shop_border_home.png" width="970" /></div>
<hr class = "red_line_margin">

<div class="content_main_div_left">
    <?php $limit = 1; ?>
    <?php $obj_count = 1; ?>
    <?php $count = 1; ?>
    <?php $cnt = 0; ?>
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
                                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor float_left">
                                            <?php 
                                            if($arr[$i]['category_id'] == 6){
                                                $desc = $arr[$i]['text'];                                                                               
                                                $abc = explode("em&gt;",strip_tags($desc));
                                                echo "<span class='wizdom-two'><img src='/images/wizdom-quote.png'/>".implode(' ', array_slice(str_word_count($abc[1], 2), 0, 4)).'...</span>';
                                            }else {?>
                                            <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_semimid.', $arr[$i]['image']); ?>" width="223" />
                                            <?php } ?>
                                            <!--<img src="/images/new_home/home_heading_l_2_img.png" />-->
                                        </a>
                                    </div>
                                </div>

                    <?php $date = explode('-', substr($arr[$i]['article_date'], 0, 10)); ?>
                                <div class="home_heading_l_3_txt_div mrg_top_6 <?php
                    if ($i == 1) {
                        echo "margin_rgt_0";
                    }
                    ?>">

                                    <div class="home_heading_l_c_txt_main">                                
                                        <div><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor"><span class="<?php echo $fcol_hor_title[$i]; ?>"><?php echo $arr[$i]['title'] ?></span></a></div>
                                        <div class="margin_top_11">
                                            <span>
                                                <img src="/images/new_home/red_square.png" class="home_square"/>
                                            </span>
                                            
                                            <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor">
                                                <span class="<?php echo $fcol_body_text_6_7[$i]; ?>"><?php 
                                                $dot_status = 0;
                                                for ($x = 122; $x > 0; $x--) {
                                                    if(substr($arr[$i]['image_text'], $x, 1) == " " || substr($arr[$i]['image_text'], $x, 1) == "."){
                                                        if(substr($arr[$i]['image_text'], $x, 1) == "."){
                                                            $dot_status = 1;
                                                        }
                                                        echo substr($arr[$i]['image_text'], 0, $x+1);
                                                        break;
                                                    }
                                                    // echo "The number is: $x <br>";
                                                }
                                                // echo substr($arr[$i]['image_text'], 0, 122); 
                                                ?></span>
                                            </a>
                                            <?php if($dot_status == 0){?>
                                                <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="article_dots_l cursor">...</a>
                                            <?php }?>
                                            <span class="home_body_l_1_red">
                                                <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="bluelink cursor"> <!--Läs mer...--></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="home_heading_l_txt dattimeinfo col-first-date">
                                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor">
                                         <!--<span class="colorband" style="margin: 4px 0px 0px; padding-top: 2px;"><img src="/images/new_home/arrow_bt.png" class="margin_rgt_4"/></span>-->
                                        
                                        
                                        
                                            <span class="home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                                            <span class="home_type"><?php echo $arr[$i]->getArticleCategory()->getCategoryName() ? $arr[$i]->getArticleCategory()->getCategoryName() : '' ?></span>
                                            <span class="home_cat"><?php echo $arr[$i]->getArticleType()->getTypeName() ? $arr[$i]->getArticleType()->getTypeName() : '' ?></span>
                                            
                                        </a>
                                        <?php if($obj['art_statid'] == 5):?>
                                            <a><span><img src="/images/new_home/BT-lock_30x30.png" width="17"/></span></a>
                                        <?php endif; ?>
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
                <!-- if normal column exist-->
                <?php if ($obj_count == 3): ?>
                <?php $arr[] = $obj; ?>
                <?php //$cnt = 0;  ?>
                <?php //$obj_count = 0;   ?>
                <?php $limit+=2; ?>

                <?php for ($i = 0; $i < 2; $i++): ?>
                        <div class="home_heading_l_2_main_div">
                            <div class="home_heading_l_2_img_div">
                                <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor float_left">
                            <?php 
                            if($arr[$i]['category_id'] == 6){                                
                                $desc = $arr[$i]['text'];      
                                $abc = explode("em&gt;",strip_tags($desc));
                                //var_dump($desc);
                                echo "<div class='wizdom-two'><img src='/images/wizdom-quote.png'/>".implode(' ', array_slice(str_word_count($abc[1], 2), 0, 4)).'...</div>';
                            }else {?>
                                    <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_semimid.', $arr[$i]['image']); ?>"  width="200" />
                                    <?php }
                            ?>
                                    <!--<img src="/images/new_home/home_heading_l_2_img.png" />-->
                                </a>
                            </div>
                            <div class="home_heading_l_2_txt_div">

                                
                                <div class="home_heading_l_c_txt_main">                                
                                    <div><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor"><span class="<?php echo $fcol_ver_title[$i] ?>"><?php echo $arr[$i]['title'] ?></span></a></div>
                                    <div class="margin_top_11">
                                        <span>
                                            <img src="/images/new_home/red_square.png" class="home_square"/>
                                        </span>
                                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="blackcolor cursor">
                                            <span class="<?php echo $fcol_body_text_2_3[$i]; ?>"><?php 
                                            $dot_status = 0;
                                            for ($x = 122; $x > 0; $x--) {
                                                if(substr($arr[$i]['image_text'], $x, 1) == " " || substr($arr[$i]['image_text'], $x, 1) == "."){
                                                    if(substr($arr[$i]['image_text'], $x, 1) == "."){
                                                        $dot_status = 1;
                                                    }
                                                    echo substr($arr[$i]['image_text'], 0, $x+1);
                                                    break;
                                                }
                                                // echo "The number is: $x <br>";
                                            }
                                            // echo substr($arr[$i]['image_text'], 0, 122); 
                                            ?></span>
                                        </a>
                                            <?php if($dot_status == 0){?>
                                            <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="article_dots_l cursor">...</a>
                                            <?php }?>
                                        <span class="home_body_l_1_red">
                                            <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="bluelink cursor"> <!--Läs mer...--></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="home_heading_l_txt dattimeinfo col-first-date">
                                    <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $arr[$i]['article_id']; ?>" class="cursor">
                                    
                                    
                                     <!--<span class="colorband" style="margin: 4px 0px 0px; padding-top: 2px;"><img src="/images/new_home/arrow_bt.png" class="margin_rgt_4"/></span>-->
                                    
                                    
                                    
                                    
                                        <span class="home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                                        <span class="home_type"><?php echo $arr[$i]->getArticleCategory()->getCategoryName() ? $arr[$i]->getArticleCategory()->getCategoryName() : '' ?></span>
                                        <span class="home_cat"><?php echo $arr[$i]->getArticleType()->getTypeName() ? $arr[$i]->getArticleType()->getTypeName() : '' ?></span>
                                        
                                    </a>
                                    <?php if($arr[$i]['art_statid'] == 5):?>
                                        <a><span><img src="/images/new_home/BT-lock_30x30.png" width="17"/></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="home_artline_leftdiv">&nbsp;</div>
                        </div>
                    <?php endfor; ?>
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
                            <?php 
                            if($obj['category_id'] == 6){
                                $desc = $obj['text'];                                                                               
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
            <?php //echo html_entity_decode($col1_13_heading_style_start[$i])   ?>
            <?php //print html_entity_decode($col1_13_heading_style_start[$cnt])      ?><?php //echo $obj['title']      ?><?php //print html_entity_decode($col1_13_heading_style_end[$cnt])      ?><?php //echo html_entity_decode($col1_13_heading_style_end[$i])         ?>
                                <span class="<?php echo $fcol_big_title[$cnt] ?>"><?php echo $obj['title'] ?></span>
                            </a>
                        </span>
                    </div>
                    <div class="home_heading_l_small_txt articleinfo">
                    <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="blackcolor cursor">                                                                                   
                                <img src="/images/new_home/home_square_2.png" alt="arrow" class="home_square" />                            
                            <span class="<?php echo $fcol_body_text_1_4_5[$cnt]; ?>"><?php 
                            $dot_status = 0;
                            for ($x = 122; $x > 0; $x--) {
                                if(substr($obj['image_text'], $x, 1) == " " || substr($obj['image_text'], $x, 1) == "."){
                                    if(substr($obj['image_text'], $x, 1) == "."){
                                        $dot_status = 1;
                                    }
                                    echo substr($obj['image_text'], 0, $x+1);
                                    break;
                                }
                                // echo "The number is: $x <br>";
                            }
                            
                            ?></span>
                        </a>
                            <?php if($dot_status == 0){?>
                            <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="article_dots_l cursor">...</a>
                            <?php }?>
                        <span class="home_body_l_1_red">
                            <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="bluelink cursor"> <!--Läs mer...--></a>
                        </span>
                    </div>
                    <div class="home_heading_l_txt dattimeinfo col-first-date">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="cursor">
                        
                         <!--<span class="colorband" style="margin: 4px 0px 0px; padding-top: 2px;"><img src="/images/new_home/arrow_bt.png" class="margin_rgt_4"/></span>-->
                        
                        
                        
                            <span class="date home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                            <span class="update home_type"><?php echo $obj->getArticleCategory()->getCategoryName() ? $obj->getArticleCategory()->getCategoryName() : '' ?></span>
                            <span class="home_cat"><?php echo $obj->getArticleType()->getTypeName() ? $obj->getArticleType()->getTypeName() : '' ?></span>
                        </a>
                        <a href="<?php echo 'https://' . $host_str . '/borst/commentOnBorstArticle/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="chaticon"><?php //echo $comment_cnt->getTotalCommentCount($obj['article_id']) ?></span>
                        </a>
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="colorbandWrapper cursor">
                         
                                
                                
                                
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
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="bluelink1 cursor">
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
                            <img class="home_square" src="/images/new_home/home_square_2.png" alt="arrow" class="home_square" />                            
                            <span class="<?php echo $mcol_body_text[$cnt]; ?>"><?php 
                            $dot_status = 0;
                            for ($x = 122; $x > 0; $x--) {
                                if(substr($obj['image_text'], $x, 1) == " " || substr($obj['image_text'], $x, 1) == "."){
                                    if(substr($obj['image_text'], $x, 1) == "."){
                                        $dot_status = 1;
                                    }
                                    echo substr($obj['image_text'], 0, $x+1);
                                    break;
                                }
                                // echo "The number is: $x <br>";
                            } ?></span>
                        </a>
                            <?php if($dot_status == 0) {?>
                            <a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $obj['article_id']; ?>" class="article_dots_m cursor">...</a>
                            <?php }?>
                        <span class="home_body_l_1_blue">
                            <a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $obj['article_id']; ?>" class="bluelink"> <!--Läs mer...--></a>
                        </span>
                    </div>
                    <div class="home_heading_l_btmtxtmain dattimeinfo col-middle-date">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="date home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                            <span class="update home_type"><?php echo $cat_arr[$obj['category_id']] ? $cat_arr[$obj['category_id']] : '' ?></span>
                            <span class="home_cat"><?php echo $type_arr[$obj['type_id']] ? $type_arr[$obj['type_id']] : '' ?></span>
                        </a>
                        <a href="<?php echo 'https://' . $host_str . '/borst/commentOnBorstArticle/article_id/' . $obj['article_id']; ?>" class="cursor">
                            <span class="chaticon"><?php //echo $comment_cnt->getTotalCommentCount($obj['article_id']) ?></span>
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

        <?php $mCount++; ?>
    <?php endif; ?>
    <?php $count++; ?>


        <?php endforeach; ?>
</div>

<div class="rightbanner autoheight padding_0">

        <!-- 28 to 35 start -->
            <?php
            $m = 0;
            for ($l = 0; $l < count($last_column_articles); $l++):
                ?>
    <?php $date = explode('-', substr($last_column_articles[$l]['article_date'], 0, 10)); ?>
            <div class="advertdiv2 home_right_column">
    <?php if ($m == 0): ?>		
        <?php //include_partial('global/bulk_ads',array('bulk_ads'=>$ad_3))            ?>
    <?php endif; ?>
                <div class="home_heading_l_txt dattimeinfo"> 
                    <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $last_column_articles[$l]['article_id']; ?>" class="cursor">
                        <span class="date home_date"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span> 
                        <span class="update home_type"><?php echo $cat_arr[$last_column_articles[$l]['category_id']] ? $cat_arr[$last_column_articles[$l]['category_id']] : '' ?></span> 
                        <span class="home_cat"><?php echo $type_arr[$last_column_articles[$l]['type_id']] ? $type_arr[$last_column_articles[$l]['type_id']] : '' ?></span> 
                    </a>
                    <a href="<?php //echo 'https://' . $host_str . '/borst/commentOnBorstArticle/article_id/' . $last_column_articles[$l]['article_id']; ?>" class="cursor">
                        <span class="chaticon"><?php //echo $comment_cnt->getTotalCommentCount($last_column_articles[$l]['article_id']) ?></span>
                    </a>
                    <!--<span class="colorband" style="margin:4.5px 0 0 0;">-->
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $last_column_articles[$l]['article_id']; ?>"><!--<img src="/images/new_home/arrow_bt.png"  class="margin_rgt_4"/>--></a>
                    </span> 
                    <?php if($last_column_articles[$l]['art_statid'] == 5):?>
                        <a><span><img src="/images/new_home/BT-lock_30x30.png" width="17"/></span></a>
                    <?php endif; ?>
                </div>
                <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $last_column_articles[$l]['article_id']; ?>" class="blackcolor cursor">
                    <span class="<?php echo $last_column_style[$l % 4] ?> float_left"><?php echo $last_column_articles[$l]['title'] ?></span>
                </a>
                <div class="advertinfo">
                    <div class="home_heading_l_small_txt">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $last_column_articles[$l]['article_id']; ?>" class="blackcolor cursor">
                            <img src="/images/new_home/red_square.png" alt="arrow" class="home_square" />
                            <span class="<?php echo $rcol_body_text[$l % 4]; ?>"><?php echo substr($last_column_articles[$l]['image_text'], 0, 122); ?></span>
                        </a>
                        <span class="home_body_l_1_red"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $last_column_articles[$l]['article_id']; ?>" class="bluelink"> <!--Läs mer...--></a></span>
                    </div>
                </div>
                <div class="advertdiv photo">
                        
                    <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $last_column_articles[$l]['article_id']; ?>" class="bluelink1 cursor">
                        <?php 
                            if($last_column_articles[$l]['category_id'] == 6){
                                $desc = $last_column_articles[$l]['text'];                                                                               
                                $abc = explode("em&gt;",strip_tags($desc));
                                echo "<div class='wizdom-one'><img src='/images/wizdom-quote.png'/>".implode(' ', array_slice(str_word_count($abc[1], 2), 0, 4)).'...></div>';
                            }else {?>
                                <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_mid.', $last_column_articles[$l]['image']); ?>"  width="300"  />
                            <?php }
                        ?>
                    </a>
                </div>

            </div>
    <?php
    $m++;
endfor;
?>
        <!-- 28 to 35 start -->

    </div>
<div class="load_article cursor" id="load_article_<?php echo $pageno; ?>" pageno="<?php echo $nextpageno; ?>"><img src="/images/new_home/load_articles.png" title="Load more article" width="978" /></div>
<div class="bottom_shop_border">&nbsp;</div>
<div class="loading" style="display: none;">&nbsp;</div>
<div class="bt-shop_border_home2"><img src="/images/new_home/bt-shop_border_home.png" width="970" /></div>
    <div class="footer_inner_div">
        <div class="float_left">
            <div class="color_plate_first">
                <div class="color_plate_img_first"><img src="/images/new_home/bottom_bt-shop_logo.png" width="92" /></div>
                <div class="bottom_shop_txt_main">
                    <div class="bottom_shop_cart">Välkommen till BT-shop <br />
– affären för bättre affärer!</div>
                </div>
            </div>
            <?php $adCount = 1; ?>
            <?php foreach ($metastock_data as $article): ?>
                <?php $modAdCount = $adCount % 2; ?>
                <a class="blackcolor cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
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
                                <!--<span class="bottom_shop_readmore">Läs mer...</span>-->
    <?php endif ?>
                        </div>
                    </div>
                </a>
    <?php
    $adCount++;
endforeach;
?>
        </div>
    </div>