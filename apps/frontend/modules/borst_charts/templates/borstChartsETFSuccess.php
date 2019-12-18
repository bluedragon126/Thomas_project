<script type="text/javascript" language="javascript">
    $(window).load(function () {

        //Amit changes 15-2-2011
        var hArray = new Array();
        hArray[0] = $(".innerleftdiv").height();
        hArray[1] = $(".rightbanner").height();

        if (hArray[0] > hArray[1])
            var maxHeight = hArray[0];
        else
            var maxHeight = hArray[1];


        $(".innerleftdiv").css({"height": maxHeight + "px"});
        $(".rightbanner").css({"height": maxHeight + "px"});

    });
</script>
<!--[if IE 7]>
<style type="text/css">
.ieadj{ margin-top:-17px;}
</style>
<![endif]-->
<div class="maincontentpage">
    <div class="innerleftdiv padding_0">
        <div class="leftinnercolor">
            <div class="breadcrumb btchart_breadcrumb">
                <ul>
                    <li><?php
                        include_component('isicsBreadcrumbs', 'show', array(
                            'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome')
                        ))
                        ?> </li>
                </ul>
            </div>
            <span class="heading_violet_chart charts_market_heading">ETF</span>

            <div class="shopinfo width_100_per">
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                            <?php if ($item_per_col + 1 <= $total_count): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                            <?php endif; ?>
                            <?php if ($item_per_col * 2 + 1 <= $total_count): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                            <?php endif; ?>
                            <?php if ($item_per_col * 3 + 1 <= $total_count): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list as $stock): if ($i < $item_per_col):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

                                    <?php if ($item_per_col + 1 <= $total_count): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list as $stock): if ($i < $item_per_col * 2 && $i >= $item_per_col):
                                                ?>
                                                <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

                                    <?php if ($item_per_col * 2 + 1 <= $total_count): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list as $stock): if ($i < $item_per_col * 3 && $i >= $item_per_col * 2):
                                                ?>
                                                <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                                    <?php endif; ?>            

                                    <?php if (($item_per_col * 3 + 1) <= $total_count): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list as $stock): if ($i <= $item_per_col * 4 && $i >= $item_per_col * 3):
                                                ?>
                                                <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="contactdell widthall">
    <?php echo include_partial('global/inner_bottom_footer'); ?> 
            </div>
        </div>
    </div>

<?php echo include_partial('global/borst_right_banner_article', array('host_str' => $host_str, 'cat_arr' => $cat_arr, 'type_arr' => $type_arr, 'object_arr' => $object_arr, 'month' => $month, 'col1_1417_heading_style' => $col1_1417_heading_style, 'image_arr_1417' => $image_arr_1417, 'comm_fifteen_eighteen' => $comm_fifteen_eighteen, 'comment_cnt' => $comment_cnt, 'ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4)); ?>
<?php include_partial('global/six_cube_footer', array('host_str' => $host_str, 'bottom_commodities_links' => $bottom_commodities_links, 'bottom_currencies_links' => $bottom_currencies_links, 'bottom_buysell_links' => $bottom_buysell_links, 'bottom_statistics_links' => $bottom_statistics_links, 'bottom_aktier_links' => $bottom_aktier_links, 'bottom_kronika_links' => $bottom_kronika_links)) ?>
</div>