<script type="text/javascript" language="javascript">

    function paginationPopupGo(obj) {
        var column_id = $('#column_id').val();
        var page = $(obj).prev().val();
        var current_column_order = $('#bloglist_current_column_order').val();
        var pagination_numbers = $('.all_my_subscription_pagination').html();
        $('.all_my_subscription_pagination').html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.ajax({
            url: '/sbt/fetchMoreMySubscription?column_id=' + column_id + '&page=' + page + '&bloglist_current_column_order=' + current_column_order, //?page='+page,
            success: function (data)
            {
                $('#my_subscription_list').html(data);
                $('.indicator').hide();
                $('#pop-box-over').hide();
            }
        });
    }

    function paginationPopup(obj) {
        var offset = $(obj).position();
        $(obj).next().css("left", offset.left - 68);
        var obj1 = $(".forum_drop-down-menu_page");
        if ($(obj1).val() == 0) {
            $(obj1).removeClass("color232222");
            $(obj1).addClass("colorb9c2cf");
        } else {
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color232222");
        }
        $(obj).next().toggle();
    }

    function paginationPopupSelect(obj) {
        if ($(obj).val() == 0) {
            $(obj).removeClass("color232222");
            $(obj).addClass("colorb9c2cf");
        } else {
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color232222");
        }
    }
    function paginationPopupGoActive(obj) {
        var column_id = $('#column_id').val();
        var page = $(obj).prev().val();
        var current_column_order = $('#bloglist_current_column_order').val();
        var pagination_numbers = $('.all_my_subscription_pagination').html();
        $('.all_my_active_subscription_pagination').html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.ajax({
            url: '/sbt/fetchMoreMyActiveSubscription?column_id=' + column_id + '&page=' + page + '&bloglist_current_column_order=' + current_column_order, //?page='+page,
            success: function (data)
            {
                $('#my_active_subscription_list').html(data);
                $('.indicator').hide();
                $('#pop-box-over').hide();
            }
        });
    }

    function paginationPopupActive(obj) {
        var offset = $(obj).position();
        $(obj).next().css("left", offset.left - 68);
        var obj1 = $(".forum_drop-down-menu_page");
        if ($(obj1).val() == 0) {
            $(obj1).removeClass("color232222");
            $(obj1).addClass("colorb9c2cf");
        } else {
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color232222");
        }
        $(obj).next().toggle();
    }

    function paginationPopupSelectActive(obj) {
        if ($(obj).val() == 0) {
            $(obj).removeClass("color232222");
            $(obj).addClass("colorb9c2cf");
        } else {
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color232222");
        }
    }

    function sortingPopUp(obj) {
        $(obj).prev().toggle();
    }
</script>
<div class="blog_user_profile_deshboard"><?php echo __('Aktiva abonnemang'); ?></div>
<div class="my_subscription_list_outer width_100_per" id="my_subscription_container">

    <div class="float_left widthall" id="my_active_subscription_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr id="analysis_fav_list_column_row" class="blog_table_head">
                <th id="sortby_srno"  class="cursor padding_left_10 padding_right_11" scope="col" width="20" align="left">Nr</th>
                <th id="sortby_subscription"  class="cursor padding_right_11" scope="col" width="264" align="left">Abonnemang</th>
                <th id="sortby_start_date"  class="cursor padding_right_11" scope="col" width="82" align="left">Startdatum</th>
                <th id="sortby_end_date"  class="cursor padding_right_9" scope="col" width="82" align="left">Stopdatum</th>
                <th id="sortby_status"  class="cursor padding_right_9" scope="col" width="57" align="left">Status </th> 
                <th scope="col" width="52" align="left">Atgärd</th>
            </tr>
            <?php
            $i = 1;
            if ($pageractive) {
                foreach ($pageractive->getResults() as $data):
                    ?>	
                    <?php $product_arr = $product->getProductName($data->product_id, $data->btchart_type_id); ?>
                    <tr class="classnot">
                        <td align="center" class="prof_table_no"><?php echo $i; ?></td>
                        <td align="left"><a class="cursor prof_table_sub" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $data->product_id; ?>"><?php echo $product_arr[0]['title']; ?></a></td>
                        <td align="left" class="blog_prof_table_date"><?php echo $data->start_date; ?></td>	
                        <td align="left" class="blog_prof_table_date"><?php echo $data->end_date; ?></td>	
                        <td align="left" class="prof_table_stat"><?php echo $purchase->getPaymentStatus($data->purchase_id) == '0' ? 'Obetald' : ($purchase->getPaymentStatus($data->purchase_id) == '1' ? 'betald' : ''); ?>
                            <?php $days = (strtotime(date("Y-m-d")) - strtotime(substr($data->end_date, 0, 10))) / (60 * 60 * 24); ?></td>
                        <td align="left"><?php if ($days < 0 && $days >= -5): ?>
                                <a href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $data->product_id; ?>" class="prof_table_act cursor">Förlänga?</a>
                            <?php endif; ?>
                            <?php if ($days > 0): ?>
                                <a href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $data->product_id; ?>" class="prof_table_act cursor">Förnya ></a>
                            <?php endif; ?></td>	
                    </tr>
                    <?php
                    $i++;
                endforeach;
            }
            ?>	
        </table>

        <div class="paginationwrapperNew widthall">
            <div class="forum_pag all_my_active_subscription_pagination" id="">
                <?php if ($pageractive->haveToPaginate()): ?>
                    <?php if ($pageractive->getFirstPage() != $pageractive->getPage()) { ?>
                        <a id="<?php echo $pageractive->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pageractive->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                        <?php } ?>
                        <?php
                        $links = $pageractive->getLinks(11);
                        foreach ($links as $page):
                            ?>
                            <?php if ($page == $pageractive->getPage()): ?>
                                <?php echo '<span class="selected">' . $page . '</span>' ?>
                            <?php else: ?>
                                <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                            <?php endif; ?>
                            <?php if ($page != $pageractive->getCurrentMaxLink()): ?>

                            <?php endif ?>
                        <?php endforeach ?>
                        <?php if ($pageractive->getLastPage() != $pageractive->getPage()) { ?>
                            <a id="<?php echo $pageractive->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pageractive->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                        <?php } ?>
                        <span>Sid <?php echo $pageractive->getPage(); ?> av <?php echo $pageractive->getLastPage(); ?></span>
                        <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupActive(this);"></span>
                        <div class="forum_popup_pagination_wrapper" noclick="1" >
                            <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectActive(this);" >
                                <option noclick="1" value="0" class="colorb9c2cf" >Gå till sida...</option>
                                <?php for ($pg = 1; $pg <= $pageractive->getLastPage(); $pg++) { ?>
                                    <option noclick="1" class="color232222" <?php
                                    if ($pageractive->getPage() == $pg) {
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                        <?php } ?>
                            </select>
                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoActive(this);">GA</div>
                        </div>
                        <span class="forum_sorting_wrapper">
                            <div noclick="1" class="floatRight blog_drop-down-menus blog_topic_listing_column_row_all_active_subscription">
                                <ul noclick="1">
                                    <li noclick="1"><span noclick="1" id="sortby_subscription" class="cursor">Abonnemang</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_start_date" class="cursor">Startdatum</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_end_date" class="cursor">Stopdatum</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_status" class="cursor">Status</span></li>
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

<div class="blog_user_profile_deshboard"><?php echo __('Alla abonnemang'); ?></div>
<div class="my_subscription_list_outer width_100_per" id="my_subscription_container">

    <div class="float_left widthall" id="my_subscription_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr id="analysis_fav_list_column_row" class="blog_table_head">                
                <th id="sortby_srno"  class="cursor padding_left_10 padding_right_11" scope="col" width="20" align="left">Nr</th>
                <th id="sortby_subscription"  class="cursor padding_right_11" scope="col" width="264" align="left">Abonnemang</th>
                <th id="sortby_start_date"  class="cursor padding_right_11" scope="col" width="82" align="left">Startdatum</th>
                <th id="sortby_end_date"  class="cursor padding_right_9" scope="col" width="82" align="left">Stopdatum</th>
                <th id="sortby_status"  class="cursor padding_right_9" scope="col" width="57" align="left">Status </th>
                <th scope="col" width="52" align="left">Atgärd</th>
            </tr>
            <?php
            $i = 1;
            if ($pager) {
                foreach ($pager->getResults() as $data)://echo "<pre>";  print_r(count($data->toarray()));
                    ?>	
                    <?php $product_arr = $product->getProductName($data->product_id, $data->btchart_type_id); ?>
                    <tr class="classnot">
                        <td align="center" class="prof_table_no"><?php echo $i; ?></td>
                        <td align="left"><a class="cursor prof_table_sub" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $data->product_id; ?>"><?php echo $product_arr[0]['title']; ?></a></td>
                        <td align="left" class="blog_prof_table_date"><?php echo $data->start_date; ?></td>	
                        <td align="left" class="blog_prof_table_date"><?php echo $data->end_date; ?></td>	
                        <td align="left" class="prof_table_stat"><?php echo $purchase->getPaymentStatus($data->purchase_id) == '0' ? 'Obetald' : ($purchase->getPaymentStatus($data->purchase_id) == '1' ? 'betald' : ''); ?>
                            <?php $days = (strtotime(date("Y-m-d")) - strtotime(substr($data->end_date, 0, 10))) / (60 * 60 * 24); ?></td>
                        <td align="left"><?php if ($days < 0 && $days >= -5): ?>
                                <a href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $data->product_id; ?>" class="prof_table_act cursor">Förlänga?</a>
                            <?php endif; ?>
                            <?php if ($days > 0): ?>
                                <a href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $data->product_id; ?>" class="prof_table_act cursor">Förnya ></a>
                            <?php endif; ?></td>	
                    </tr>
                    <?php
                    $i++;
                endforeach;
            }
            ?>	
        </table>

        <div class="paginationwrapperNew widthall">
            <div class="forum_pag all_my_subscription_pagination" id="">
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
                                <option noclick="1" value="0" class="colorb9c2cf" >Gå till sida...</option>
                                <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                    <option noclick="1" class="color232222" <?php
                                    if ($pager->getPage() == $pg) {
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                        <?php } ?>
                            </select>
                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                        </div>
                        <span class="forum_sorting_wrapper">
                            <div noclick="1" class="floatRight blog_drop-down-menus blog_topic_listing_column_row_all_subscription">
                                <ul noclick="1">
                                    <li noclick="1"><span noclick="1" id="sortby_subscription" class="cursor">Abonnemang</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_start_date" class="cursor">Startdatum</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_end_date" class="cursor">Stopdatum</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_status" class="cursor">Status</span></li>
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