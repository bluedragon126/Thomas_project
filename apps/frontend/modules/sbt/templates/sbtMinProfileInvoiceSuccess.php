<style>.paginationwrapper .pagination, .paginationwrapper .pagination .selected{font-weight: bold;}
    .paginationwrapper .pagination a:hover{color:#00a5dc;}

    #my_order_list ul{
        display: inline;
        float: left;
        list-style: outside none none;
        margin: 0;
        padding: 0;
        position: relative;
    }
    #my_order_list ul li {
        display: inline;
        float: left;
        font-size: 12px;
        margin: 0;
        padding: 7px 0 4px 5px;
        position: relative;
    }
    .blog_drop-down-menus ul{
        padding: 0 22px !important;
    }
    .blog_drop-down-menus{
        height: 90px;
    }
    .all_my_order_pagination{text-align: left;}
</style>
<script type="text/javascript" language="javascript">    
    function paginationPopupGo(obj){
        var curUser_id = $("#current_user").val();
        var column_id = $('#column_id').val();	
        var page = $(obj).prev().val();
        var current_column_order = $('#bloglist_current_column_order').val();	
        var pagination_numbers = $('.all_my_order_pagination').html();
        //$('.all_my_order_pagination').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $('.all_my_order_pagination').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.ajax({                             
            url:'/sbt/sbtMinProfileInvoicePartial?id='+curUser_id+'&column_id='+column_id+'&page='+page+'&bloglist_current_column_order='+current_column_order,//?page='+page,
            success:function(data)
            {
                $('#my_order_list').html(data);
            }
        });
    }

    function paginationUlGo(obj){
        var curUser_id = $("#current_user").val();
        var column_id = $('#column_id').val();	
        var page = $(obj).html();
        var current_column_order = $('#bloglist_current_column_order').val();	
        var pagination_numbers = $('.all_my_order_pagination').html();
        //$('.all_my_order_pagination').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $('.all_my_order_pagination').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');

        $.ajax({                             
            url:'/sbt/sbtMinProfileInvoicePartial?id='+curUser_id+'&column_id='+column_id+'&page='+page+'&bloglist_current_column_order='+current_column_order,//?page='+page,
            success:function(data)
            {
                $('#my_order_list').html(data);
            }
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
<div class="blog_user_profile_deshboard padding_top_4"><?php echo __('Mina Order'); ?></div>
<div class="my_subscription_list_outer width_610" id="my_subscription_container">

    <div class="float_left widthall" id="my_order_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr id="analysis_fav_list_column_row" class="blog_table_head">
                <th id="sortby_srno"  class="cursor " scope="col" width="20" align="right" style=" padding-right: 20px;text-align: right">Nr</th>
                <th id="sortby_subscription"  class="cursor" scope="col" width="264" align="left" style="padding-right: 11px;">Abonnemang</th>
                <th id="sortby_start_date"  class="cursor" scope="col" width="82" align="left" style="padding-right: 11px;">Datum</th>
                <th scope="col" width="52" align="left">Faktura</th>
            </tr>
            <?php
            $i = 1;
            if ($pageractive) {
                foreach ($pageractive->getResults() as $data):
                    ?>	
                    <tr class="classnot">
                    <tr>
                        <td align="right" class="prof_table_no" style=" padding-right: 20px;"><?php echo $i; ?></td>
                        <td align="left" class="prof_table_sub"><?php echo ($data->BtShopArticle) ? $data->BtShopArticle->getBtshopArticleTitle() : ''; ?></td>
                        <td align="left" class="blog_prof_table_date"><?php echo date("Y-m-d", strtotime($data->Purchase->getCreatedAt())) ?></td>
                        <td class="prof_table_download"><a  class="cursor" onclick ="window.location = 'https://'+window.location.hostname+'/borst_shop/saveAsPdf?purchase_id='+<?php echo $data->Purchase->getId() ?>+'&receipt=0' ">Ladda ned</a></td>
                    </tr>
                    </tr>
        <?php $i++;
    endforeach;
}else{?>
                    <tr class="classnot"><td colspan="4"><?php echo $errMsg;?></td></tr>
<?php }
?>	
        </table>
        <div class="paginationwrapperNew widthall">
                        <div class="forum_pag all_my_order_pagination" id="">
                            <?php if ($pageractive){ ?>
                            <?php if ($pageractive->haveToPaginate()): ?>
                                <?php if ($pageractive->getFirstPage() != $pageractive->getPage()) { ?>
                                              <a id="<?php echo $pageractive->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pageractive->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                                    <?php } ?>
                                    <?php $links = $pageractive->getLinks(11);
                                    foreach ($links as $page): ?>
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
                                    <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>

                                    <div class="forum_popup_pagination_wrapper" noclick="1" >
                                        <ul class="pagination_ul">
                                        <?php for ($pg = 1; $pg <= $pageractive->getLastPage(); $pg++) { ?>
                                            <li onclick="javascript:paginationUlGo(this);"><?php echo $pg; ?></li>
                                        <?php } ?>
                                        </ul>            
                                    </div>
                                    <span class="forum_sorting_wrapper">
                                        <div noclick="1" class="floatRight blog_drop-down-menus blog_topic_listing_column_row_all_subscription">
                                            <ul noclick="1">
                                                <li noclick="1"><span noclick="1" id="sortby_subscription" class="cursor">Abonnemang</span></li>
                                                <li noclick="1"><span noclick="1" id="sortby_start_date" class="cursor">Datum</span></li>
                                            </ul>
                                        </div>
                                        <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                                        <span class="floatRight">Sortera efter</span>
                                    </span>    
<?php endif ?>
                            <?php } ?>
                        </div>
        </div>
    </div>	
</div>