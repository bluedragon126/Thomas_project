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

    });


    function paginationPopupGo(obj) {

        var column_id = $('#column_id').val();
        var page = $(obj).prev().val();
        var current_column_order = $('#bloglist_current_column_order').val();
        var blog_cat_id = $('#blog_cat_id').val();

        var pagination_numbers = $('.blog_list_listing, #blog_list_listing').html();
        $('.blog_list_listing, #blog_list_listing').html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');

        $.post("/sbt/getBlogListData?column_id=" + column_id + "&page=" + page + "&bloglist_current_column_order=" + current_column_order + '&blog_cat_id=' + blog_cat_id, function (data) {
            $('.pinkbg small_pinkbg width_658').css('height', 'auto');
            $('#blog_list_page').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
            setBlogListOrderImage('sortby_' + column_id, current_column_order);
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
<span class="float_left indicator loader loader_posiotion pos_left_14per"><img src="/images/ajax-loader_blog.gif" /></span>
<div class="innerleftdiv_blog padding_0" id="sbtBlog_div">
    <div>
        <div class="blog_logo"><img src="/images/new_home/blog_logo.png" width="190"/></div>
        <div class="blog_mrg_welc"><span class="blog_welc_welc">Välkommen!</span></div>
        <div class="blog_mrg_20"><span class="blog_initial_span"><img src="/images/new_home/initial.png" width="64"/></span><span class="blog_welc_body">är på Börstjänarens medlemssidor kan du blogga och skriva egna artiklar, fördjupa dig i frågor tillsammans med andra användare och ta del av deras profiler. Varför inte göra en stördykning själv i en alldeles egen blogg?</span></div>
        <div class="blog_mrg_20"><span class="blog_welc_body">Vill du blogga, skriva artiklar eller kommentarer och ta del av andra användares profiler på Börstjänaren? Börstjänarens medlemsnätverk är kostnadsfritt och öppet för alla. Det enda du behöver göra är gå till "Mitt konto” och komplettera din användarprofil, genom att klicka plustecknet och fylla i de extra uppgifterna.</span></div> 
        <div class="blog_mrg_20"><span class="blog_welc_body">Därefter får du ett mejl med en aktiveringslänk, som du använder för att starta upp ditt fulla medlemskap på Börstjänaren. Hela processen tar bara någon minut.</span></div>
    </div>

    <div class="home_artline_blog">&nbsp;</div>
    <div class="home_ad_r float_left">Annons</div>
    <div id="profile_ads">
        <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3 , 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
    </div>
</div>

<div class="rightbanner_blog width_658 height_1639">
    <div class="blog_pro_header">Senaste blogginlägg</div>
    <div class="float_left listing" id="blog_list_page">

        <div class="paginationwrapperNew">
            <div class="forum_pag forum_listing1 blog_list_listing" id="">
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
                            <div noclick="1" class="floatRight blog_drop-down-menus blog_topic_listing_column_row">
                                <ul noclick="1">
                                    <li noclick="1"><span noclick="1" id="sortby_title" class="cursor">Rubrik</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Namn</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_category" class="cursor">Kategori</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_reply" class="cursor">Inlägg</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_view" class="cursor">Visningar</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_date" class="cursor">Senaste</span></li>
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
                    <th class="blog_table_title_w pad_lft_5"><span class="float_left">Rubrik/Namn</span></th>
                    <th class="blog_table_cat_w"><span class="float_left">Kategori</span></th>
                    <th class="blog_table_post_w"><span class="float_left">Inlägg/visad</span></th>
                    <th class="forum_table_date_w"><span class="float_left">Senaste</span></th>
                </tr>
                <?php
                $i = 1;
                foreach ($pager->getResults() as $blog):
                    ?>
                    <tr <?php
                    if ($i == 1) {
                        echo "class='padding_top_table'";
                    }
                    ?> >                    
                        <td class="orgfont blog_table_title_w pad_lft_5">
                            <a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtBlogDetails/blog_id/<?php echo $blog->id ?>"><span class="forum_table_title_w bloglist_blogtitle blog_table_title"><?php echo html_entity_decode($blog->ublog_title) ?></span></a>
                            </br>
                            <a class="bloglist_blogauthor blog_table_user blog_table_title_w" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $blog->author_id; ?>"><?php echo $profile->getFullUserName($blog->author_id) ?></a>
                        </td>
                        <td class="blog_cat blog_table_topic blog_table_cat_w"><a class="blog_cat" name="<?php echo $blog->ublog_category_id ?>"><?php echo $cat_arr[$blog->ublog_category_id]; ?></a></br><span class="forum_table_views">&nbsp;</span></td>
                        <td class="blog_table_post_w" ><span class="blog_table_post"><?php echo $sbt_blog_comment->getBlogCommentsCount($blog->id); ?> inlägg</span></br><span class="forum_table_views"><?php echo $blog->ublog_views ?> visningar</span> </td>
                        <td class="forum_table_date_w"><span class="blog_prof_table_date"><?php echo substr($blog->created_at, 0, 10) ?></span></br><span class="blog_table_time"><?php echo substr($blog->created_at, 11, -3) ?></span></td>
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
            <div class="forum_pag forum_listing1 blog_list_listing" id="">
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
                            <div noclick="1" class="floatRight blog_drop-down-menus blog_topic_listing_column_row">
                                <ul noclick="1">
                                    <li noclick="1"><span noclick="1" id="sortby_title" class="cursor">Rubrik</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Namn</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_category" class="cursor">Kategori</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_reply" class="cursor">Inlägg</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_view" class="cursor">Visningar</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_date" class="cursor">Senaste</span></li>
                                </ul>
                            </div>
                            <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                            <span class="floatRight">Sortera efter</span>
                        </span>
                    <?php endif ?>
            </div>
        </div>

    </div>

</div>
<div class="inner_page_divider_3">&nbsp;</div>
<div class="float_right margin_right_testimonial_II margin_testimonial">
    <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
</div>
<div id="pop-box-over" class="display-none" style=""></div>