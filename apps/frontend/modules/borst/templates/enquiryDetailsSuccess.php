<script type="text/javascript" language="javascript">
    $(window).load(function(){
        var leftDiv = $('.btshopleftdiv').height();
        var rightDiv = $('.rightbanner').height();
        var menuArea = $('.askBT-menu-wrapper').height();

        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
            $('.enquiry_listing_data_div').height(rightDiv-menuArea-16);
        }else{
            $('.btshopleftdiv').css('border-right','1px solid #d3d3d3');
            $('.enquiry_listing_data_div').height(leftDiv-menuArea-16);
        }
        
        
    });
    tinyMCE.init({
        selector: 'textarea',  // change this value according to your HTML
        resize: 'both',
        height: 350,
        width: 545,
        plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
    ],
    toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | link unlink image | emoticons", 
    browser_spellcheck: true,        
    });
    
    function paginationPopupGoEnq(obj){
        var page = $(obj).prev().val();
        var enq_id = $('#enq_id').val();
		
        $('#update_article_list_table').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });
		
        var pagination_numbers = $('#enquiry_post_list_listing').html();
        $('#enquiry_post_list_listing').html('<span class="float_left">'+pagination_numbers+'</span>  <span class="float_left" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
		
        $.ajax({
            url:'/borst/postReplyByUser?page='+page+'&enq_id='+enq_id,
            success:function(data)
            {
                $(".enquiry_partial_replace").html(data);
            }
        });
    }

    function paginationPopupEnq(obj){
        var offset = $(obj).position();
        $(obj).next().css("left",offset.left-68);
        var obj1 = $(".forum_drop-down-menu_page");
        if($(obj1).val()==0){
            $(obj1).removeClass("color3c3a3a");
            $(obj1).addClass("colorb9c2cf");
        }else{
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color3c3a3a");
        }
        $(obj).next().toggle();
    }

    function sortingPopUp(obj){
        $(obj).prev().toggle();
    }

    function paginationPopupSelectEnq(obj){
        if($(obj).val()==0){
            $(obj).removeClass("color3c3a3a");
            $(obj).addClass("colorb9c2cf");
        }else{
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color3c3a3a");
        }
    }
    
    function paginationPopupGo(obj){
        var column_id = $('#column_id').val();	
        var current_column_order = $('#sbt_forum_column_order').val();	
        var cat_id = $('#forum_parent_tab').val();
        var sub_cat_id = $('#forum_sub_cat_id').val();
        $(".forum_popup_pagination_wrapper").hide();
        var page = $(obj).prev().val();
	
        $('#enquiry_topic_list').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });
	
        var pagination_numbers = $('#enquiry_listing , .enquiry_listing').html();
        $('#enquiry_listing,.enquiry_listing').html('<span class="">'+pagination_numbers+'</span>');
        $('#pop-box-over').show();
        $('.indicator').css('display','block');
        $.post("/borst/getEnquiryContentByOrder?column_id="+column_id+"&page="+page+"&sbt_forum_column_order="+current_column_order+"&forum_parent_tab="+cat_id+'&forum_sub_cat_id='+sub_cat_id, function(data){
            $('#enquiry_content').html(data);
            //setHeightOnForum();
            $('.indicator').hide();
            $('#pop-box-over').hide();
            var order = $('#sbt_forum_column_order').val();
            setForumTopicListOrderImage('sortby_'+column_id,order);
        });
    }

    function paginationPopup(obj){
        var offset = $(obj).position();
        $(obj).next().css("left",offset.left-68);
        var obj1 = $(".forum_drop-down-menu_page");
        if($(obj1).val()==0){
            $(obj1).removeClass("color3c3a3a");
            $(obj1).addClass("colorb9c2cf");
        }else{
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color3c3a3a");
        }
        $(obj).next().toggle();
    }

    function sortingPopUp(obj){
        $(obj).prev().toggle();
    }

    function paginationPopupSelect(obj){
        if($(obj).val()==0){
            $(obj).removeClass("color3c3a3a");
            $(obj).addClass("colorb9c2cf");
        }else{
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color3c3a3a");
        }
    }

</script>
<style>.btshopleftdiv{margin-bottom: -10px;}</style>
<div class="maincontentpage" id="enquiry_detail_main_div">
    <div class="btshopleftdiv min_height_626" style="border:none;">
        <div class="btshopleftdivinner">
            <div class="askBT-menu-wrapper">                
                <div class="askBTNew width181">
                    <a href="/borst/enquiry"><div class="askBT-menu-logo"></div></a>
                </div>
                <div class="askBT_title_div">
                    <div class="askBT_title askBTNew">Tidigare frågor och svar:</div>
                    <div class="askBT-active-logo-div"><a class="cursor" href="/borst/contactUs"><div class="askBT-menu-active-logo"></div></a></div>
                </div>                               
                <div class="askBTNew askBTNew_tabs border_left_askBT">
                    <?php include_partial('global/enquiry_tab', array("designPattern" => "2")); ?>
                </div>
            </div>
            <div id="enquiry_content" class="float_left widthall"></div>
            <div class='enquiry_listing_data_div askBT_background_img'>
                <div class="enquiry_partial_replace width_651">
                    <?php if ($pager): ?> 
                        <div class="paginationwrapperNew">
                            <div class="forum_pag" id="enquiry_post_list_listing">
                                <?php if ($pager->haveToPaginate()): ?>
                                    <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                                                          <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><!--<img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>--><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                                        <?php } ?>
                                        <?php
                                        $links = $pager->getLinks(9);
                                        foreach ($links as $page):
                                            ?>
                                            <?php if ($page == $pager->getPage()): ?>
                                                <?php echo '<span class="selected">' . $page . '</span>' ?>
                                            <?php else: ?>
                                                <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                            <?php endif; ?>
                                            <?php if ($page != $pager->getCurrentMaxLink()): ?>

                                            <?php endif ?>
                                        <?php endforeach ?>
                                        <?php if ($pager->getLastPage() != $pager->getPage()) { ?>
                                            <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
        <?php } ?>
                                        <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                                        <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupEnq(this);"></span>
                                        <div class="forum_popup_pagination_wrapper" noclick="1" >
                                            <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectEnq(this);" >
                                                <option noclick="1" value="0" class="forum_select_option_color" >Gå till sida...</option>
                                                <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                    <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {
                                                        echo "selected='selected'";
                                                    } ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                        <?php } ?>
                                            </select>
                                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoEnq(this);">GA</div>
                                        </div>
                        <?php endif ?>
                            </div>
                        </div>
                                <?php endif; ?>
                    <div class="breadcrumb">
                        <ul>
                            <li><?php
                                include_component('isicsBreadcrumbs', 'show', array(
                                    'root' => array('text' => 'Börstjänaren', 'uri' => 'borst/borstHome')
                                ))
                                ?> </li>
                        </ul>
                        <div class="askBT_user askBT_post_start">Fråga ställd av <span class="askBT_post_start_name"><?php if ($enquiry_details_data->faster_ans_flag == 2) {
                                    echo $enquiry_details_data->firstname;
                                } else if ($enquiry_details_data->faster_ans_flag == 3) {
                                    echo $enquiry_details_data->user_signature;
                                } else {
                                    echo $enquiry_details_data->firstname . ' ' . $enquiry_details_data->lastname;
                                } ?></span></div>
                    </div>
<?php if ($enquiry_details_data) { ?>
                        <table id="eqdetail" bgcolor="" width="600" border="0" cellspacing="0" cellpadding="2" class="tablebox">
                            <tr><td height="35" align="left" class="rubrik" style="font-size: 1em; padding: -1px 0 0 0; font-style: italic;"><?php if($enquiry_details_data->faster_ans_flag == 1){?>Detta är en privat post som bara du kan läsa.</td></tr><?php }?>
                            <tr>
                                <td height="35" align="left" class="rubrik">
    <?php if ($enquiry_details_data): ?>
        <?php echo $enquiry_details_data->enq_subject; ?>
    <?php endif; ?>
                                </td>
                            </tr>                            
                        </table>
                        <div id="action_msg" class="float_left"></div>
    <?php if ($enquiry_details_data): ?>
                            <table id="eqdetail" bgcolor="" width="600" border="0" cellspacing="0" cellpadding="2" class="tablebox">
                                <tr class="askBT_user_question_row">
                                    <td width="150" class="name_date_row_td">
                                        <span class="float_left">
                                            <input type="hidden" name="delete_post_id" id="delete_post_id" />
                                            <input type="hidden" name="enq_id" id="enq_id" value="<?php echo $enquiry_details_data->id; ?>" />
                                        </span>
                                        <span class="float_left  askBT_user_left"><?php echo substr($enquiry_details_data->enq_date, 0, 10); ?></span>
                                    </td>
                                    <td><span class="float_left askBT_user_left"><?php $cmt_count = $enquiry_details_data->getReplyCount($enquiry_details_data->id);
        echo ($cmt_count > 1) ? $enquiry_details_data->getReplyCount($enquiry_details_data->id) . ' Inlägg' : ''; ?></span><span class="float_right  askBT_user_right">&nbsp;Fråga BT!<?php //echo html_entity_decode($enquiry_details_data->user_question); ?></span> </td>
                                </tr>
                            </table>
                            <table id="eqdetail" bgcolor="" width="600" border="0" cellspacing="0" cellpadding="2" class="tablebox">
                                <tr class="askBT_user_answer">
                                    <td align="left" width="150" class="askBT_user_question">
                                        <img src="/images/new_home/askBT_ava.png" alt="arrow" height="70" width="70"/>
                                        <span class="float_left askBT_comment_user_name"><?php if ($enquiry_details_data->faster_ans_flag == 2) {
                                    echo $enquiry_details_data->firstname;
                                } else if ($enquiry_details_data->faster_ans_flag == 3) {
                                    echo $enquiry_details_data->user_signature;
                                } else {
                                    echo $enquiry_details_data->firstname . ' ' . $enquiry_details_data->lastname;
                                } ?></span>
                                    </td>
                                    <td class="askBT_user_question_detail"><?php $user_question = $enquiry_details_data->user_question;
                            echo str_replace('</p>', '</span><br /><br />', str_replace('<p>', '<span>', html_entity_decode($user_question)));
                            ?></td>
                                </tr>
                            </table>
                        <div style="height:9px;">&nbsp;</div>
    <?php endif; ?>
    <?php if ($pager): ?>
                            <div class="enquiry_post_list_data">
                                <table id="enquiry_post_list" border="0" width="600" cellspacing="0" cellpadding="2">
                                                <?php
                                                foreach ($pager->getResults() as $reply):
                                                    if (!$reply->admin_or_user) {
                                                        $flag = 1;
                                                    } else {
                                                        $flag = 0;
                                                    }
                                                    ?>
                                        <tr class="<?php if ($flag) { ?>askBT_user_question_row<?php } else { ?>askBT_user_question_reply_row<?php } ?>">
                                            <td width="150" class="name_date_row_td">
                                                <span class="<?php if ($flag) { ?>askBT_user_left<?php } else { ?>askBT_admin_left<?php } ?>"><?php echo substr($reply->reply_date, 0, 10); ?></span> 
                                            </td>
                                            <td><span class="float_right  <?php if ($flag) { ?>askBT_user_right<?php } else { ?>askBT_admin_right<?php } ?>">&nbsp;<?php if ($flag) { ?>Fråga BT!<?php } else { ?>Börstjänaren svarar<?php } ?></span></td>
                                        </tr>
                                        <tr class="askBT_user_question_reply_row_image">
                                            <td width="150" align="left" class="askBT_user_question">
                                                <span>
            <?php
            /*if ($user_photo_data) {
                if ($reply->admin_or_user) {
                    $author_image = '/uploads/userThumbnail/' . str_replace('.', '_large.', $user_photo_data->profile_photo_name);
                } else {
                    if ($reply->author_name == 'Thomas Sandström') {
                        $author_image = '/images/new_home/askBT_TS.png';
                    } else if ($reply->author_name == 'Göran Högberg') {
                        $author_image = '/images/new_home/askBT_ava.png';
                    } else if ($reply->author_name == 'Henrik Hallenborg') {
                        $author_image = '/images/new_home/askBT_HH.png';
                    } else {
                        $author_image = '/images/new_home/askBT_ava.png';
                    }
                }
            } else {*/
                if ($reply->author_name == 'Thomas Sandström') {
                    $author_image = '/images/new_home/askBT_TS.png';
                } else if ($reply->author_name == 'Göran Högberg') {
                    $author_image = '/images/new_home/askBT_ava.png';
                } else if ($reply->author_name == 'Henrik Hallenborg') {
                    $author_image = '/images/new_home/askBT_HH.png';
                } else {
                    $author_image = '/images/new_home/askBT_ava.png';
                }
            //}
            ?>
                                                    <img src="<?php echo $author_image; ?>" alt="arrow" width="70"/>
                                                    <span class="float_left askBT_comment_user_name"><?php echo $reply->author_name; ?></span>
                                                </span> 

                                            </td>
                                            <td class="askBT_user_question_detail">
                                                <?php
                                                $textarea = $reply->reply_text;
                                                echo str_replace('</p>', '</span><br /><br />', str_replace('<p>', '<span>', html_entity_decode($textarea)));
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="askBT_blank_row">&nbsp;</td>
                                        </tr>
                                                    <?php endforeach; ?>
                                </table>
                                <div class="paginationwrapperNew">
                                    <div class="forum_pag" id="enquiry_post_list_listing">
        <?php if ($pager->haveToPaginate()): ?>
                                                <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                                                      <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><!--<img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>--><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
            <?php } ?>
            <?php
            $links = $pager->getLinks(9);
            foreach ($links as $page):
                ?>
                                                <?php if ($page == $pager->getPage()): ?>
                                                    <?php echo '<span class="selected">' . $page . '</span>' ?>
                                                <?php else: ?>
                                                        <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                                <?php endif; ?>
                <?php if ($page != $pager->getCurrentMaxLink()): ?>

                                    <?php endif ?>
                                <?php endforeach ?>
                                <?php if ($pager->getLastPage() != $pager->getPage()) { ?>
                                        <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
                            <?php } ?>
                                                <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                                                <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupEnq(this);"></span>
                                                <div class="forum_popup_pagination_wrapper" noclick="1" >
                                                    <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectEnq(this);" >
                                                        <option noclick="1" value="0" class="forum_select_option_color">Gå till sida...</option>
            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                            <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {
                    echo "selected='selected'";
                } ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
            <?php } ?>
                                                    </select>
                                                    <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoEnq(this);">GA</div>
                                                </div>
        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="breadcrumb">
                                <ul>
                                    <li><?php
        include_component('isicsBreadcrumbs', 'show', array(
            'root' => array('text' => 'Börstjänaren', 'uri' => 'borst/borstHome')
        ))
        ?>
                                    </li>
                                </ul>
                            </div>
                    <?php endif; ?>        
                <?php } ?> 
                </div>
<?php if ($enquiry_details_data && !$enq_id) { ?>
                    <table id="eqdetail" class="tablebox" cellspacing="0" cellpadding="2" border="0" bgcolor="" width="500">
                        <tbody>
                            <tr>
                                <td align="left"><br/>
                                    <form action="" method="post" name="reply_on_enquiry" id="reply_on_enquiry">
                                        <input type="hidden" value="1" name="reply_msg"/>
                                        <input type="hidden" name="postid" id="postid"/>
                                        <input type="hidden" name="reply_from_user" id="reply_from_user" value="1"/>
                                        <input type="hidden" value="<?php if ($enquiry_details_data->faster_ans_flag == 2) {
        echo $enquiry_details_data->firstname;
    } else if ($enquiry_details_data->faster_ans_flag == 3) {
        echo $enquiry_details_data->user_signature;
    } else {
        echo $enquiry_details_data->firstname . ' ' . $enquiry_details_data->lastname;
    } ?>" size="30" name="author_name"/>
                                        <input type="hidden" value="<?php echo $enquiry_details_data->id ?>" size="30" name="enq_id"/>


                <?php echo $form->renderHiddenFields() ?>
                                        <div class="float_left enquiry_detail_title_div">
                                            <div class="float_left"><b>Svara på detta inlägg:</b></div>
                                            <div class="float_left" id="post_enquiry_reply_error"></div>
                                        </div>
                                        <div  class="float_left enquiry_detail_content_div">
    <?php echo $form['reply_text']->render() ?>
                                        </div>
                                        <input class="registerbuttontext submit" id="post_enquiry_reply" type="button" value="Skicka" name="svar_pa_inlagg" />
                                        <br/>
                                        <br/>
                                        <br/>
                                    </form></td>
                            </tr>
                        </tbody>
                    </table>
<?php } else { ?>
                    <table id="eqdetail" bgcolor="" width="600" border="0" cellspacing="0" cellpadding="2" class="tablebox">
                        <tr>
                            <td height="35" align="left" class="rubrik">
    <?php echo $errormsg; ?>
                            </td>
                        </tr>
                    </table>
<?php } ?>
                <?php echo include_partial('global/social_network_link', array('article_data' => $article_data)) ?>
                <div class="<?php if (count($products_data)) { ?>mrg_top_63<?php } else { ?>mrg_top_76<?php } ?> float_left mrg_left_testimonial margin_testimonial" title="<?php echo count($products_data); ?>">
                    <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
                </div>

            </div>
        </div>            
    </div>
    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <div id="whitepage_ads">
        <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>
</div>