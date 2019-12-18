<script type="text/javascript" language="javascript">
    $(window).load(function () {

        $(window).click(function (e) {
            if ($(e.target).attr("noclick") == "1") {
            } else {
                $(".blog_popup_pagination_wrapper").hide();
                $(".blog_drop-down-menus").hide();
            }
        });

        //Amit changes 31-1-2011
        var hArray = new Array();
        hArray[0] = $(".pinkbg").height();
        hArray[1] = $(".rightbanner").height();

        if (hArray[0] > hArray[1])
            var maxHeight = hArray[0];
        else
            var maxHeight = hArray[1];

        $(".rightbanner").css({"height": maxHeight + "px"});
        var leftDiv = $('#sbtBlog_div').height();
        var rightDiv = $('.rightbanner_blog').height();
        if(rightDiv > leftDiv){
            $('.rightbanner_blog').css('border-left','1px solid #d3d3d3');
        }else{
            $('#sbtBlog_div').css('border-right','1px solid #d3d3d3');
        }
    });


    function paginationPopupGo(obj) {
        var page = $(obj).prev().val();
        var column_id = $("#column_id").val();
        var column_name = $('.pagination_blog').html();
        var userlist_current_column_order = $("#userlist_current_column_order").val();

        $('.pagination_blog').html(column_name + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/sbt/getProfilerListData?page=" + page + "&column_id=" + column_id + "&userlist_current_column_order=" + userlist_current_column_order, function (data) {
            $('#blog_list_profiler_page').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
        });
    }

    function paginationPopup(obj) {
        var offset = $(obj).position();
        $(obj).next().css("left", offset.left - 68);
        var obj1 = $(".forum_drop-down-menu_page");
        if ($(obj1).val() == 0) {
            $(obj1).removeClass("color3c3a3a");
            $(obj1).addClass("colorb9c2cf");
        } else {
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color3c3a3a");
        }
        $(obj).next().toggle();
    }

    function paginationPopupSelect(obj) {
        if ($(obj).val() == 0) {
            $(obj).removeClass("color3c3a3a");
            $(obj).addClass("colorb9c2cf");
        } else {
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color3c3a3a");
        }
    }

    function sortingPopUp(obj) {
        $(obj).prev().toggle();
    }

</script>
<style>.rightbanner_blog{padding-left: 9px; margin-left: 0;margin-bottom: -10px;}</style>
<span class="float_left indicator loader loader_posiotion pos_left_14per"><img src="/images/ajax-loader_blog.gif" /></span>
<div class="innerleftdiv_blog padding_0" id="sbtBlog_div" style="border:none;">
    <div>
        <div class="blog_logo"><img src="/images/new_home/blog_logo_profile.png" width="190"/></div>
        <div class="blog_mrg_welc"><span class="blog_welc_welc">Välkommen!</span></div>
        <div class="blog_mrg_20"><span class="blog_initial_span"><img src="/images/new_home/initial.png" width="64"/></span><span class="blog_welc_body">är på Börstjänarens medlemssidor kan du blogga och skriva egna artiklar, fördjupa dig i frågor tillsammans med andra användare och ta del av deras profiler. Varför inte göra en stördykning själv i en alldeles egen blogg?</span></div>
        <div class="blog_mrg_20"><span class="blog_welc_body">Vill du blogga, skriva artiklar eller kommentarer och ta del av andra användares profiler på Börstjänaren? Börstjänarens medlemsnätverk är kostnadsfritt och öppet för alla. Det enda du behöver göra är gå till "Mitt konto” och komplettera din användarprofil, genom att klicka plustecknet och fylla i de extra uppgifterna.</span></div> 
        <div class="blog_mrg_20"><span class="blog_welc_body">Därefter får du ett mejl med en aktiveringslänk, som du använder för att starta upp ditt fulla medlemskap på Börstjänaren. Hela processen tar bara någon minut.</span></div>
    </div>
    <div class="home_artline_blog">&nbsp;</div>
    <div class="home_ad_r float_left margin_left_0">Annons</div>
    <div id="profile_ads">
        <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
    </div>
</div>
<?php if (empty($logged_user)) { ?>
    <div class="maincontentpage">
        <div class="breadcrumb margin_lft_10">
            <ul>
                <li>
                    <a href="/">Börstjänaren</a> &gt;
                    <a href="/sbt/profiler">profil</a> &gt; Logga in  </li>
            </ul>
        </div>
        <div class="btshopleftdiv">
            <div class="btshopleftdivinner">

                <div class="heading_red">Logga in</div>
                <div class="blank_10h widthall">&nbsp;</div>
                <form name="loginform" id="loginform" method="post" action="<?php echo url_for('user/signin') ?>">
                    <?php echo $form['_csrf_token']->render() ?>
                    <div class="float_left widthall">
                        <table width="100%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                                <td colspan="6" class=""><span class="color_FF0000"><?php
                                        if ($login_error) {
                                            ?>
                                            <span class="widthall float_left"><img src="/images/utrop.png" width="25" height="25" alt="Question mark" /></span><br />
                                            <div class="blank_8h widthall">&nbsp;</div>

                                            <?php
                                            echo str_replace("*", "", $login_error);
                                        }
                                        ?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="blank_5h widthall">&nbsp;</div>
                                    <div class="form_labels width_115 float_left">Användarnamn</div>
                                    <div class="width_70per float_left margin_bottom_2"><?php echo $form['username']->render(array('id' => 'username', 'class' => 'form_input width_277 contactus-inputs', 'size' => '25')) ?></div>	
                                    <div class="float_left redcolor pad_lft_2"><div class="for_labels mrg_left_89" id="contact_firstname_error"><?php //echo $errors["username"]; ?></div></div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form_labels width_115 float_left">Lösenord</div>
                                    <div class="width_70per float_left margin_bottom_2"><?php echo $form['password']->render(array('id' => 'password', 'class' => 'form_input width_277 contactus-inputs', 'size' => '25')) ?></div>
                                    <div class="float_left redcolor pad_lft_2"><div class="for_labels mrg_left_89" id="contact_lastname_error"><?php //echo $errors["password"]; ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="main_link_color padding_top_10" height="35 px" vertical-align="bottom"><a class="main_link_color" href="<?php echo 'https://' . $host_str . '/user/forgetPassword' ?>"><?php echo __('Glömt lösenord?') ?></a></td>
                            </tr>
                        </table>
                        <div class="blank_2h widthall">&nbsp;</div>
                        <div class="registerbtn">
                            <input type="submit" class="loginBtn submit cursor" value="" name="submit" />
                        </div>
                    </div>
                </form>
                <?php echo include_partial('global/inner_bottom_footer'); ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="rightbanner_blog width_658 height_1639">

        <div class="blog_pro_header">Användare</div>

        <div class="float_left listing" id="blog_list_profiler_page" style="width:100%;">        
            <div class="paginationwrapperNew">
                <div class="forum_pag forum_listing1" id="blog_list_listing_profiler">
                    <?php if ($pager->haveToPaginate()): ?>
                        <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                            <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                            <?php } ?>
                            <?php
                            $links = $pager->getLinks(11);
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
                                <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                            <?php } ?>
                            <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                            <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                            <div class="forum_popup_pagination_wrapper" noclick="1" >
                                <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                    <option noclick="1" value="0" >Gå till sida...</option>
                                    <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                        <option noclick="1" class="color3c3a3a" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                    <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                            </div>
                            <span class="forum_sorting_wrapper">
                                <div noclick="1" class="floatRight blog_drop-down-menus blog_profiler_listing_column_row height_260px">
                                    <ul noclick="1">
                                        <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Användare</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_title" class="cursor">Titel</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_regdate" class="cursor">Reg datum</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_message" class="cursor">Inlägg</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_vote" class="cursor">Röster</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_totallogin" class="cursor">Inlogg</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_lastlogin" class="cursor">Senaste</span></li>
                                    </ul>
                                </div>
                                <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                                <span class="floatRight">Sortera efter</span>
                            </span>
                        <?php endif ?>
                </div>
            </div>


            <input type="hidden" id="bloglist_current_column_order" name="bloglist_current_column_order" value="<?php echo $current_column_order; ?>" />
            <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
            <input type="hidden" id="blog_cat_id" name="blog_cat_id"/>
            <div id="blog_topic_list">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
                    <tr id="forum_topic_listing_column_row1" class="headerList blog_table_head">
                        <th class="blog_p_table_ava_w pad_lft_5"><span class="float_left">Avatar</span></th>
                        <th class="blog_p_table_user_w"><span class="float_left">Användare</span></th>
                        <th class="blog_p_table_title_w"><span class="float_left">Titel</span></th>
                        <th class="blog_p_table_regdate_w"><span class="float_left">Reg datum</span></th>                    
                        <th class="blog_p_table_post_w"><span class="float_left">Inlägg</span></th>
                        <th class="blog_p_table_vote_w"><span class="float_left">Röster</span></th>
                        <th class="blog_p_table_inlog_w"><span class="float_left">Inlogg</span></th>
                        <th class="blog_table_date_w"><span class="float_left">Senaste</span></th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($pager->getResults() as $user):
                        ?>
                        <tr <?php
                        if ($i == 1) {
                            echo "class='padding_top_table'";
                        }
                        ?> >                    
                            <td class="orgfont blog_p_table_ava_w pad_lft_5">
                                <a href="<?php echo 'https://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>">
                                    <?php if ($user_arr[$user->user_id] != ''): ?>
                                        <img width="36" height = "36" src="/uploads/userThumbnail/<?php echo str_replace('.', '_mid.', $user_arr[$user->user_id]); ?>" alt="user_photo"/>
                                    <?php else: ?>
                                        <?php if ($user->gender == 1): ?>
                                            <img src="/images/user_photo.jpg" alt="adv"/>
                                        <?php else: ?>
                                            <img src="/images/avatar_photo.jpg" alt="adv"/>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </a>
                            </td>
                            <td class="blog_p_table_user_w ">
                                <a class="bolg_table_name" href="<?php echo 'https://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>">
                                    <?php
                                    echo $user->firstname;
                                    if (trim($user->lastname) != '') {
                                        echo ' </br> ';
                                    }
                                    echo $user->lastname;
                                    ?>
                                </a>
                            </td>
                            <td class="blog_p_table_title_w blog_table_topic"><span class=""><?php echo $user->how_is_user($user->user_id) ?></span></td>
                            <td class="forum_table_date_w"><span class="blog_prof_table_date"><?php echo substr($user->regdate, 0, 10); ?></span></td>
                            <td class="blog_p_table_post_w talign_right"><span class="blog_table_post_r padding_right_23"><?php echo $user->getTotalMessagesReceived($user->user_id) ?></span></td>
                            <td class="blog_p_table_vote_w talign_right"><span class="blog_table_votes padding_right_23"><?php echo $user->getTotalVotesReceived($user->user_id) ? $user->getTotalVotesReceived($user->user_id) : 0; ?></span></td>
                            <td class="blog_p_table_inlog_w talign_right"><span class="blog_table_inlog padding_right_23"><?php echo $user->inlog ?></span></td>
                            <td class="blog_table_date_detail"><span class="blog_prof_table_date"><?php echo substr($user->inlogdate, 0, 10) ?></span>
                                <span class="blog_table_time"><?php echo substr($user->inlogdate, 10, 6) ?></span>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                </table>
            </div>
            <div class="blank_14h widthall">&nbsp;</div>
            <div class="clearAll"></div>
            <div class="paginationwrapperNew">
                <div class="forum_pag forum_listing1" id="blog_list_listing_profiler">
                    <?php if ($pager->haveToPaginate()): ?>
                        <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                            <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                            <?php } ?>
                            <?php
                            $links = $pager->getLinks(11);
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
                                <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                            <?php } ?>
                            <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                            <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                            <div class="forum_popup_pagination_wrapper" noclick="1" >
                                <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                    <option noclick="1" value="0" >Gå till sida...</option>
                                    <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                        <option noclick="1" class="color3c3a3a" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                    <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                            </div>
                            <span class="forum_sorting_wrapper">
                                <div noclick="1" class="floatRight blog_drop-down-menus blog_profiler_listing_column_row height_260px">
                                    <ul noclick="1">
                                        <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Användare</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_title" class="cursor">Titel</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_regdate" class="cursor">Reg datum</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_message" class="cursor">Inlägg</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_vote" class="cursor">Röster</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_totallogin" class="cursor">Inlogg</span></li>
                                        <li noclick="1"><span noclick="1" id="sortby_lastlogin" class="cursor">Senaste</span></li>
                                    </ul>
                                </div>
                                <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                                <span class="floatRight">Sortera efter</span>
                            </span>
                        <?php endif ?>
                </div>
            </div>


        </div>
        <?php if (!empty($logged_user)) { ?>
        <div class="inner_page_divider_3">&nbsp;</div>
            <div class="float_right margin_right_testimonial_II margin_testimonial">
                <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
            </div>
            <div id="pop-box-over" class="display-none"></div>
        <?php } ?>
    </div>
<?php } ?>

