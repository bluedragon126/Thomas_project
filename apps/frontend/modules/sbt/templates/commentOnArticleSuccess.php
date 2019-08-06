<script language="javascript" type="text/javascript">
    $(window).load(function(){


        var checkRight = $(".rightbanner").height();
        var checkLeft = $(".innerleftdiv").height(); 
        //alert(checkRight);
        if(checkLeft > checkRight)
        {
            //$(".rightbanner").css({"height":checkLeft+"px"});
        }	
        else
        {
            $(".innerleftdiv").css({"height":checkRight+"px"});
        }

    });
</script>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $('#sbt_analysis_comment_subject').css('margin-bottom',10);
        $('#sbt_analysis_comment_subject').css('width',490);
 
        $('#sbt_comment_desc_div p').find("img").each(function(index){
            var width = $(this).width();
            if(width > 630)		
                $(this).css({"width":630+"px"});	
        
        
        });


        $('html, body').scrollTo( $('#analysis_comment_text_error'));
	
    });
</script>

<div class="maincontentpage">
    <div class="innerleftdiv">
        <div class="leftinnercolor sbt_article_background">
            <?php if ($analysis_data->id != ''): ?>
                <div class="breadcrumb width_90p">
                    <ul>
                        <li><?php
            include_component('isicsBreadcrumbs', 'show', array(
                'root' => array('text' => $first_menu, 'uri' => $first_url)
            ))
                ?> </li>
                    </ul>
                </div>

                <div class="in_date width_10p"><?php echo substr($analysis_data->created_at, 0, 10); ?></div>
                <div class="float_left widthall">
                    <input type="hidden" name="analysis_id" id="analysis_id" value="<?php echo $analysis_id; ?>" />
                    <input type="hidden" name="comment_by" id="comment_by" value="<?php echo $comment_by; ?>" />
                    <input type="hidden" name="comment_subject" id="comment_subject" value="<?php echo $comment_subject; ?>" />

                </div>
                <h1 class="inheading widthall sbt_violet_font"><?php echo $analysis_data->analysis_title; ?></h1>
                <div class="float_left widthall mbottom_10">
                    <?php if ($analysis_data->image_text): ?>
                        <div class="ingress bt_art_ingress_text"><?php echo $analysis_data->image_text; ?></div>
                    <?php endif; ?>
                </div>
                <div id="sbt_comment_desc_div" class="float_left width_520"><?php echo html_entity_decode($analysis_data->analysis_description); ?></div>

                <div class="float_left widthall mbottom_10">
                    <span class="float_left sbt_violet_font"><b><?php echo __('Författare') ?>:</b></span>
                    <span class="float_left mleft_5"><a class="cursor main_link_color" href="<?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $analysis_data->author_id ?>"><?php echo $profile->getFullUserName($analysis_data->author_id); ?></a></span><br />
                    <?php if ($combine_data_str): ?>
                        <span class="float_left sbt_violet_font"><b><?php echo __('Combined Authors') ?>:</b></span>
                        <span class="float_left mleft_5"><?php echo html_entity_decode($combine_data_str); ?></span>
                    <?php endif; ?>
                </div>
                <?php if ($sf_user->hasFlash('notice')): ?>
                    <div class="greenmsg_article_sbt" id="greenmsg_article_sbt">
                        <?php
                        echo $sf_user->getFlash('notice');
                        $sf_user->setFlash('notice', '');
                        ?>
                    </div>
                <?php endif; ?>

                <div id="post_list_comment_div" class="float_left widthall mtop_25">
                    <?php if ($pager->getNbResults() > 0): ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="comment_table">
                            <?php foreach ($pager->getResults() as $data): ?>
                                <tr>
                                    <td>
                                        <span class="comment_post_by_sbt">
                                            <?php echo $data->getCommentedUsername($data->comment_by); ?>
                                        </span>
                                        <span class="comment_created_at_sbt">
                                            <?php echo $data->created_at; ?>
                                        </span>

                                        <?php if ($sf_user->isAuthenticated() && $sf_user->isSuperAdmin() == 1): ?>

                                            <span class="deletelink_float_right_sbt">
                                                <a id="delete_link<?php echo $data->id; ?>"  onclick="javascript:open_confirmation_delete_article_comment_sbt('Vill du verkligen ta bort denna kommentar',this.id,'delete_article_comment_confirm_box_sbt','delete_article_comment_msg_sbt')">Ta bort</a>
                                            </span>
                                            <span class="editlink_float_right_sbt">
                                                <a id="edit_link<?php echo $data->id; ?>"   href="#sbt_comments">redigera</a>
                                            </span>
                                            <?php
                                        endif;
                                        if ($data->subject != '') :
                                            ?>

                                            <span class="analysis_comment_list_sbt1"><?php echo html_entity_decode($data->subject); ?></span>
                                        <?php endif; ?>
                                        <span class="analysis_comment_list_sbt dotted_line_sbt"><?php echo html_entity_decode($data->analysis_comment); ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    <?php endif; ?>
                    <!--</div>-->
                    <input type="hidden" value="" id="delete_comment_by_id_sbt"/>
                    <a name="sbt_comments">&nbsp;</a>
                    <div class="paginationwrapper">
                        <div class="pagination" id="comment_list_listing">
                            <?php include_partial('pager_partial', array('pager' => $pager)) ?>
                        </div>
                    </div>
                </div>

                <div id="analysis_comment_text_error" class="float_left widthall redcolor"></div>

                <div class="float_left widthall">
                    <?php if ($sf_user->isAuthenticated()): ?>
                        <form name="comment_on_analysis_form" id="comment_on_analysis_form" method="post" action="" class="dummy1">
                            <input id="borst_postid_sbt" type="hidden" name="borst_postid_sbt" value=""/>
                            <?php echo $sbtAnalysisCommentForm->renderHiddenFields(); ?>
                            <div class="main">

                                <div> <?php echo $sbtAnalysisCommentForm['subject']->renderError(); ?> <?php echo $sbtAnalysisCommentForm['subject']->renderLabel(); ?></div>
                                <div><?php echo $sbtAnalysisCommentForm['subject']->render(); ?></div>
                                <div><?php //echo $sbtAnalysisCommentForm['comment']->renderError();   ?> <?php echo $sbtAnalysisCommentForm['analysis_comment']->renderLabel(); ?></div>
                                <div><?php echo $sbtAnalysisCommentForm['analysis_comment']->render(); ?></div>
                            </div>
                            <div id="post_analysis_comment_div" class="float_left mtop_10">
                                <input type="button" name="post_analysis_comment" id="post_analysis_comment" class="registerbuttontext submit" value="Post"/>
                            </div>
                        </form>
                    <?php else: ?>
                        <img height="25" width="19" class="mright_5" src="/images/articleobs.png"/>
                        <b><?php echo __('Du måste vara inloggad för att kommentera artikeln!') ?></b>
                    <?php endif ?>
                </div>

                <div class="float_left widthall mtop_10"><b><?php echo 'Tidigare artiklar på SisterBT:'; ?></b></div>
                <div class="float_left widthall"><?php echo html_entity_decode($similar_article_list); ?></div>
            <?php else: ?>
                <div class="in_date">&nbsp;</div>
                <div class="photoimg">&nbsp;</div>
                <br />
                <br />
                <div class="shoph3 widthall mtop_30"><?php echo __('Article does not exist..') ?></div>
                <div class="float_left widthall mbottom_10">
                    <div class="float_left widthall mtop_25 mbottom_12">&nbsp;</div>
                </div>
                <div class="float_left widthall"><span class="main_link_color"><?php echo __('To View the Article List, click') ?><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/articleList"><?php echo __(' here') ?></a></span></div>	
            <?php endif; ?>
        </div>



        <?php echo include_partial('global/bottom_three_article', array('host_str' => $host_str, 'cat_arr' => $cat_arr, 'type_arr' => $type_arr, 'object_arr' => $object_arr, 'col1_13_heading_style_start' => $col1_13_heading_style_start, 'col1_13_heading_style_end' => $col1_13_heading_style_end, 'col1_45_div_style' => $col1_45_div_style, 'col1_67_heading_style' => $col1_67_heading_style, 'col1_814_heading_style' => $col1_814_heading_style, 'col1_1417_heading_style' => $col1_1417_heading_style, 'image_arr_13' => $image_arr_13, 'image_arr_67' => $image_arr_67, 'image_arr_814' => $image_arr_814, 'image_arr_1417' => $image_arr_1417, 'one_2_three' => $one_2_three, 'four_2_five' => $four_2_five, 'six_2_eight' => $six_2_eight, 'nine_2_ten' => $nine_2_ten, 'eleven_2_thirteen' => $eleven_2_thirteen, 'fourteen_2_fifteen' => $fourteen_2_fifteen, 'sixteen_2_nineteen' => $sixteen_2_nineteen, 'twenty_2_twentythree' => $twenty_2_twentythree, 'twentyfour_2_twentyseven' => $twentyfour_2_twentyseven, 'comment_cnt' => $comment_cnt, 'mymarket' => $mymarket, 'hide_right_border' => '1', 'month' => $month)); ?>
    </div>

    <div class="rightbanner padding_0 font_0">
        <div class="home_ad_r float_left font_size_12">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
    <div class="colorstrip">&nbsp;</div>
    <?php include_partial('global/six_cube_footer', array('host_str' => $host_str, 'bottom_commodities_links' => $bottom_commodities_links, 'bottom_currencies_links' => $bottom_currencies_links, 'bottom_buysell_links' => $bottom_buysell_links, 'bottom_statistics_links' => $bottom_statistics_links, 'bottom_aktier_links' => $bottom_aktier_links, 'bottom_kronika_links' => $bottom_kronika_links)) ?>
</div>
<div id="delete_article_comment_confirm_box_sbt" title="Delete Article Comment Confirmation">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td id="delete_article_comment_msg_sbt">Message:</td>
        </tr>
    </table>
</div>

