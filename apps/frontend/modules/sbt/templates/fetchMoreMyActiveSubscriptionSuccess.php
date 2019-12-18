<script type="text/javascript" language="javascript">

    function paginationPopupGoActive(obj) {
        var column_id = $('#column_id').val();
        var page = $(obj).prev().val();
        var current_column_order = $('#bloglist_current_column_order').val();
        var pagination_numbers = $('.all_my_subscription_pagination').html();
        $('.all_my_active_subscription_pagination').html(pagination_numbers + '<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $.ajax({
            url: '/sbt/fetchMoreMyActiveSubscription?column_id=' + column_id + '&page=' + page + '&bloglist_current_column_order=' + current_column_order, //?page='+page,
            success: function (data)
            {
                $('#my_active_subscription_list').html(data);
            }
        });
    }

    function paginationPopupActive(obj) {
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

    function paginationPopupSelectActive(obj) {
        if ($(obj).val() == 0) {
            $(obj).removeClass("color3c3a3a");
            $(obj).addClass("colorb9c2cf");
        } else {
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color3c3a3a");
        }
    }
</script>
<input type="hidden" id="bloglist_current_column_order" name="bloglist_current_column_order" value="<?php echo $current_column_order; ?>" />
<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr id="analysis_fav_list_column_row" class="blog_table_head">
        <th id="sortby_srno"  class="cursor pad_lft_5  alien_center" scope="col" width="20" align="center">Nr</th>
        <th id="sortby_subscription"  class="cursor pad_lft_5" scope="col" width="264" align="left">Abonnemang</th>
        <th id="sortby_start_date"  class="cursor pad_lft_5" scope="col" width="82" align="left">Startdatum</th>
        <th id="sortby_end_date"  class="cursor pad_lft_5" scope="col" width="82" align="left">Stopdatum</th>
        <th id="sortby_status"  class="cursor pad_lft_5" scope="col" width="57" align="left">Status </th>                                
        <th scope="col" width="52" align="left">Åtgärd</th>
    </tr>
    <?php
    $i = 1;
    foreach ($pageractive->getResults() as $data):
        ?>	
        <?php $product_arr = $product->getProductName($data->product_id, $data->btchart_type_id); ?>
        <tr class="classnot">
            <td align="center" class="prof_table_no"><?php echo $i; ?></td>
            <td align="left"><a class="prof_table_sub cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $data->product_id; ?>"><?php echo $product_arr[0]['title']; ?></a></td>
            <td align="left" class="blog_prof_table_date"><?php echo $data->start_date; ?></td>	
            <td align="left" class="blog_prof_table_date"><?php echo $data->end_date; ?></td>	
            <td align="left" class="prof_table_stat"><?php echo $purchase->getPaymentStatus($data->purchase_id) == '0' ? 'Obetald' : ($purchase->getPaymentStatus($data->purchase_id) == '1' ? 'Betald' : ''); ?></td>
            <td align="left"><?php $days = (strtotime(date("Y-m-d")) - strtotime(substr($data->end_date, 0, 10))) / (60 * 60 * 24); ?>
                <?php if ($days < 0 && $days >= -5): ?>
                    <a href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $data->product_id; ?>" class="prof_table_act cursor">Förlänga?</a>
                <?php endif; ?>
                <?php if ($days > 0): ?>
                    <a href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $data->product_id; ?>" class="prof_table_act cursor">Förnya ></a>
                <?php endif; ?></td>	
        </tr>
        <?php
        $i++;
    endforeach;
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
                            <option noclick="1" class="color3c3a3a" <?php
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