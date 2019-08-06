<script type="text/javascript" language="javascript">
    $(window).load(function(){

        //Amit changes 15-2-2011
        var hArray = new Array();
        hArray[0] = $(".innerleftdiv").height();
        hArray[1] = $(".rightbanner").height(); 
 
        if(hArray[0] > hArray[1])
            var maxHeight = hArray[0];
        else
            var maxHeight = hArray[1];

 
        $(".innerleftdiv").css({"height":maxHeight+"px"});
        $(".rightbanner").css({"height":maxHeight+"px"});

    });
</script>
<!--[if IE 7]>
<style type="text/css">
.ieadj{ margin-top:-17px;}
</style>
<![endif]-->

<div class="innerleftdiv">
    <div class="leftinnercolor"  id="leftinnercolor-chart">
        <div class="photoimg"><img src="/images/inphoto.jpg" alt="photo" /></div>
        <div class="breadcrumb btchart_breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome')
))
?> </li>
            </ul>
        </div>

        <div class="update_status art_detail_date"> <?php echo date("Y-m-d", filemtime($chart_filename)) ?></div>
        <div class="add_to_favorite_chart"><a class="add_to_favorite_borst_chart cursor" id="<?php echo $stock_id . "_" . $stock->company_type_id . "_" . $chart_type_details->id; ?>" name="<?php echo $stock_id; ?>"><img src="/images/new_home/fav.png" alt="photo" width="85"/></a></div>
        <div class=" float_left print_ancr">
            <a class="main_link_color float_left" href="#" onclick="setPrintCss()">
                <img alt="Print" title="Print" src="/images/printer.png" width="22"/>
            </a>
            <a class="main_link_color float_left padding_top_5 lineht_13" href="#" onclick="setPrintCss()">Print</a>
        </div>

        <div class="two_charts_in_row"> 
            <?php $random = time() * rand(11111, 9999999); ?>
            <div class="one_chart">
                <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_1.png")): ?>    
                    <div> <a href="/borst_charts/borstShowChart/stock_name/OMXS30/stock_id/257/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path . "btcharts_1.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
                    <div class="stock"> <span class="stock_name">• OMXS30 (Index) 60-min. graf&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_1.png")) ?></span> </div>
                <?php endif; ?>
            </div>


            <div class="one_chart">
                <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_2.png")): ?>
                    <div> <a href="/borst_charts/borstShowChart/stock_name/S&P 500/stock_id/250/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path . "btcharts_2.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
                    <div class="stock"> <span class="stock_name">• <?php echo "S&P 500 (US Termin) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_2.png")) ?></span></div>
                <?php endif; ?>
            </div>    

        </div>

        <div class="two_charts_in_row">

            <div class="one_chart">
                <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_3.png")): ?>
                    <div> <a href="/borst_charts/borstShowChart/stock_name/Guld/stock_id/289/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path . "btcharts_3.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
                    <div class="stock"> <span class="stock_name">• <?php echo "Guld (US Termin) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_3.png")) ?></span></div>
                <?php endif; ?>            
            </div>


            <div class="one_chart">
                <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_4.png")): ?>
                    <div> <a href="/borst_charts/borstShowChart/stock_name/Råolja_Brent/chart_type/1/stock_id/341"><img class="chart_image" src="<?php echo $uploaded_images_path . "btcharts_4.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
                    <div class="stock"> <span class="stock_name">• <?php echo "Brentolja (US Termin) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_4.png")) ?></span></div>
                <?php endif; ?>            
            </div>    

        </div>  

        <div class="two_charts_in_row">

            <div class="one_chart">
                <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_5.png")): ?>
                    <div> <a href="/borst_charts/borstShowChart/stock_name/USD_SEK/stock_id/317/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path . "btcharts_5.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
                    <div class="stock"> <span class="stock_name">• <?php echo "USD/SEK (FOREX) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_5.png")) ?></span></div>
                <?php endif; ?>
            </div>


            <div class="one_chart">
                <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_6.png")): ?>
                    <div> <a href="/borst_charts/borstShowChart/stock_name/EUR_SEK/stock_id/319/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path . "btcharts_6.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
                    <div class="stock"> <span class="stock_name">• <?php echo "EUR/SEK (FOREX) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . "btcharts_6.png")) ?></span></div>
                <?php endif; ?>            
            </div>    

        </div>    


        <div id="stock_lists">
            <span class="heading_violet_chart charts_market_heading">Läsarnas val</span>
            <div class="float_left widthall">
                <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_varlden" class="charts_market_link">
                    <tr>
                        <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php if ($item_per_col_lasarnas + 1 <= $total_count_lasarnas): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_lasarnas * 2 + 1 <= $total_count_lasarnas): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_lasarnas * 3 + 1 <= $total_count_lasarnas): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td valign="top"><ul>
                                <?php
                                $i = 0;
                                foreach ($stock_list_lasarnas as $stock): if ($i < $item_per_col_lasarnas):
                                        ?>
                                        <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                        <?php
                                    endif;
                                    $i++;
                                endforeach;
                                ?>
                            </ul>
                        </td>

                        <?php if ($item_per_col_lasarnas + 1 <= $total_count_lasarnas): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_lasarnas as $stock): if ($i < $item_per_col_lasarnas * 2 && $i >= $item_per_col_lasarnas):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>

                        <?php if ($item_per_col_lasarnas * 2 + 1 <= $total_count_lasarnas): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_lasarnas as $stock): if ($i < $item_per_col_lasarnas * 3 && $i >= $item_per_col_lasarnas * 2):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>            

                        <?php if (($item_per_col_lasarnas * 3 + 1) <= $total_count_lasarnas): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_lasarnas as $stock): if ($i <= $item_per_col_lasarnas * 4 && $i >= $item_per_col_lasarnas * 3):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>                        

                    </tr>
                </table>
            </div>


            <span class="heading_violet_chart charts_market_heading">Världsindex m.m.</span>
            <div class="float_left widthall">
                <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_varlden" class="charts_market_link">
                    <tr>
                        <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php if ($item_per_col_varlden + 1 <= $total_count_varlden): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_varlden * 2 + 1 <= $total_count_varlden): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_varlden * 3 + 1 <= $total_count_varlden): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td valign="top"><ul>
                                <li><span class="heading_violet_sector">Sektorer</span></li>    
                                <?php
                                $i = 0;
                                foreach ($stock_list_varlden as $stock): if ($i < $item_per_col_varlden):
                                        ?>
                                        <?php if ($stock->sector == 'Sektor'): ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                        <?php endif; ?>
                                        <?php
                                    endif;
                                    $i++;
                                endforeach;
                                ?>
                            </ul>
                        </td>

                        <?php if ($item_per_col_varlden + 1 <= $total_count_varlden): ?>
                            <td valign="top"><ul>
                                    <li><span class="heading_violet_sector">Sektorer</span></li>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_varlden as $stock): if ($i < $item_per_col_varlden * 2 && $i >= $item_per_col_varlden):
                                            ?>
                                            <?php if ($stock->sector == 'Sektor'): ?>
                                                <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php endif; ?>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>

                        <?php if ($item_per_col_varlden * 2 + 1 <= $total_count_varlden): ?>
                            <td valign="top"><ul>
                                    <li><span class="heading_violet_sector">Sektorer</span></li>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_varlden as $stock): if ($i < $item_per_col_varlden * 3 && $i >= $item_per_col_varlden * 2):
                                            ?>
                                            <?php if ($stock->sector == 'Sektor'): ?>
                                                <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php endif; ?>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>            

                        <?php if (($item_per_col_varlden * 3 + 1) <= $total_count_varlden): ?>
                            <td valign="top"><ul>
                                    <li><span class="heading_violet_sector">Sektorer</span></li>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_varlden as $stock): if ($i <= $item_per_col_varlden * 4 && $i >= $item_per_col_varlden * 3):
                                            ?>
                                            <?php if ($stock->sector == 'Sektor'): ?>
                                                <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php endif; ?>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                    <li>&nbsp;</li>   
                                    <li><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /> </li>
                                    <li id="last-li-chart"><span class="heading_violet_sector">Finans</span></li>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_varlden as $stock): if ($i <= $item_per_col_varlden * 4 && $i >= $item_per_col_varlden * 3):
                                            ?>
                                            <?php if ($stock->sector == 'Finans'): ?>
                                                <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php endif; ?>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>           

                                </ul>

                            </td>
                        <?php endif; ?>                        

                    </tr>
                </table>
            </div>


            <span class="heading_violet_chart charts_market_heading">Råvaror</span>
            <div class="float_left widthall">
                <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                    <tr>
                        <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php if ($item_per_col_Ravaror + 1 <= $total_count_Ravaror): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_Ravaror * 2 + 1 <= $total_count_Ravaror): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_Ravaror * 3 + 1 <= $total_count_Ravaror): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td valign="top"><ul>
                                <li><span class="heading_violet_sector">Metaller</span></li>
                                <?php foreach ($stock_list_Ravaror as $stock): ?>
                                    <?php if ($stock->sector == 'Metaller'): ?>
                                        <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <li>&nbsp;</li>
                                <li><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></li>                 
                                <li id="last-li-chart"> <span class="heading_violet_sector">Energi</span> </li>
                                <?php foreach ($stock_list_Ravaror as $stock): ?>
                                    <?php if ($stock->sector == 'Energi'): ?>
                                        <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>                
                            </ul>
                        </td>

                        <?php if ($item_per_col_Ravaror + 1 <= $total_count_Ravaror): ?>
                            <td valign="top"><ul>
                                    <li><span class="heading_violet_sector">Spannmål</span></li>                
                                    <?php foreach ($stock_list_Ravaror as $stock): ?>
                                        <?php if ($stock->sector == 'Spannmål'): ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </ul>
                            </td>
                        <?php endif; ?>

                        <?php if ($item_per_col_Ravaror * 2 + 1 <= $total_count_Ravaror): ?>
                            <td valign="top"><ul>
                                    <li><span class="heading_violet_sector">Mat/Fiber/Mjuka</span></li>
                                    <?php foreach ($stock_list_Ravaror as $stock): ?>
                                        <?php if ($stock->sector == 'Mat/Fiber/Mjuka'): ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        <?php endif; ?>            

                        <?php if (($item_per_col_Ravaror * 3 + 1) <= $total_count_Ravaror): ?>
                            <td valign="top"><ul>
                                    <li><span class="heading_violet_sector">Kött</span></li>
                                    <?php foreach ($stock_list_Ravaror as $stock): ?>
                                        <?php if ($stock->sector == 'Kött'): ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        <?php endif; ?>                        

                    </tr>
                </table>
            </div>  


            <span class="heading_violet_chart charts_market_heading">Valutor</span>
            <div class="float_left widthall">
                <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                    <tr>
                        <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php if ($item_per_col_Valutor + 1 <= $total_count_Valutor): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_Valutor * 2 + 1 <= $total_count_Valutor): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_Valutor * 3 + 1 <= $total_count_Valutor): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td valign="top"><ul>
                                <?php
                                $i = 0;
                                foreach ($stock_list_Valutor as $stock): if ($i < $item_per_col_Valutor):
                                        ?>
                                        <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                        <?php
                                    endif;
                                    $i++;
                                endforeach;
                                ?>
                            </ul>
                        </td>

                        <?php if ($item_per_col_Valutor + 1 <= $total_count_Valutor): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_Valutor as $stock): if ($i < $item_per_col_Valutor * 2 && $i >= $item_per_col_Valutor):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>

                        <?php if ($item_per_col_Valutor * 2 + 1 <= $total_count_Valutor): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_Valutor as $stock): if ($i < $item_per_col_Valutor * 3 && $i >= $item_per_col_Valutor * 2):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>            

                        <?php if (($item_per_col_Valutor * 3 + 1) <= $total_count_Valutor): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_Valutor as $stock): if ($i <= $item_per_col_Valutor * 4 && $i >= $item_per_col_Valutor * 3):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>                        

                    </tr>
                </table>
            </div>  


            <span class="heading_violet_chart charts_market_heading">Stockholm Large Cap</span>
            <div class="float_left widthall">
                <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                    <tr>
                        <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php if ($item_per_col_LargeCap + 1 <= $total_count_LargeCap): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_LargeCap * 2 + 1 <= $total_count_LargeCap): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_LargeCap * 3 + 1 <= $total_count_LargeCap): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td valign="top"><ul>
                                <?php
                                $i = 0;
                                foreach ($stock_list_LargeCap as $stock): if ($i < $item_per_col_LargeCap):
                                        ?>
                                        <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                        <?php
                                    endif;
                                    $i++;
                                endforeach;
                                ?>
                            </ul>
                        </td>

                        <?php if ($item_per_col_LargeCap + 1 <= $total_count_LargeCap): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_LargeCap as $stock): if ($i < $item_per_col_LargeCap * 2 && $i >= $item_per_col_LargeCap):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>

                        <?php if ($item_per_col_LargeCap * 2 + 1 <= $total_count_LargeCap): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_LargeCap as $stock): if ($i < $item_per_col_LargeCap * 3 && $i >= $item_per_col_LargeCap * 2):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>            

                        <?php if (($item_per_col_LargeCap * 3 + 1) <= $total_count_LargeCap): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_LargeCap as $stock): if ($i <= $item_per_col_LargeCap * 4 && $i >= $item_per_col_LargeCap * 3):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>                        

                    </tr>
                </table>
            </div>  

            <span class="heading_violet_chart charts_market_heading">Stockholm Mid Cap</span>
            <div class="float_left widthall">
                <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                    <tr>
                        <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php if ($item_per_col_MidCap + 1 <= $total_count_MidCap): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_MidCap * 2 + 1 <= $total_count_MidCap): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_MidCap * 3 + 1 <= $total_count_MidCap): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td valign="top"><ul>
                                <?php
                                $i = 0;
                                foreach ($stock_list_MidCap as $stock): if ($i < $item_per_col_MidCap):
                                        ?>
                                        <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                        <?php
                                    endif;
                                    $i++;
                                endforeach;
                                ?>
                            </ul>
                        </td>

                        <?php if ($item_per_col_MidCap + 1 <= $total_count_MidCap): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_MidCap as $stock): if ($i < $item_per_col_MidCap * 2 && $i >= $item_per_col_MidCap):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>

                        <?php if ($item_per_col_MidCap * 2 + 1 <= $total_count_MidCap): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_MidCap as $stock): if ($i < $item_per_col_MidCap * 3 && $i >= $item_per_col_MidCap * 2):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>            

                        <?php if (($item_per_col_MidCap * 3 + 1) <= $total_count_MidCap): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_MidCap as $stock): if ($i <= $item_per_col_MidCap * 4 && $i >= $item_per_col_MidCap * 3):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>                        

                    </tr>
                </table>
            </div>  

            <span class="heading_violet_chart charts_market_heading">Stockholm Small Cap</span>
            <div class="float_left widthall">
                <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                    <tr>
                        <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php if ($item_per_col_SmallCap + 1 <= $total_count_SmallCap): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_SmallCap * 2 + 1 <= $total_count_SmallCap): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                        <?php if ($item_per_col_SmallCap * 3 + 1 <= $total_count_SmallCap): ?>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="50" height="20"  /></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td valign="top"><ul>
                                <?php
                                $i = 0;
                                foreach ($stock_list_SmallCap as $stock): if ($i < $item_per_col_SmallCap):
                                        ?>
                                        <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                        <?php
                                    endif;
                                    $i++;
                                endforeach;
                                ?>
                            </ul>
                        </td>

                        <?php if ($item_per_col_SmallCap + 1 <= $total_count_SmallCap): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_SmallCap as $stock): if ($i < $item_per_col_SmallCap * 2 && $i >= $item_per_col_SmallCap):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>

                        <?php if ($item_per_col_SmallCap * 2 + 1 <= $total_count_SmallCap): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_SmallCap as $stock): if ($i < $item_per_col_SmallCap * 3 && $i >= $item_per_col_SmallCap * 2):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>            

                        <?php if (($item_per_col_SmallCap * 3 + 1) <= $total_count_SmallCap): ?>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_SmallCap as $stock): if ($i <= $item_per_col_SmallCap * 4 && $i >= $item_per_col_SmallCap * 3):
                                            ?>
                                            <li class='width_138'><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        <?php endif; ?>                        

                    </tr>

                </table>
            </div>    
        </div>  
    </div>
</div>

<?php echo include_partial('global/borst_right_banner_article', array('host_str' => $host_str, 'ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4)); ?>
<div class="bottom_shop_border">&nbsp;</div>
<div class="footer">
    <div class="footer_inner_div">
        <div class="float_left">
            <div class="color_plate_first">
                <div class="color_plate_img_first"><img src="/images/new_home/bottom_bt-shop_logo.png" width="102" height="94" /></div>
                <div class="bottom_shop_txt_main">
                    <div class="bottom_shop_cart">Välkommen till BT-shop <br />
– affären för bättre affärer!</div>
                </div>
            </div>
            <?php $adCount = 1; ?>
            <?php foreach ($metastock_data as $article): ?>
                <?php $modAdCount = $adCount % 2; ?>
                <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
                    <div class="color_plate">
                        <?php if ($article->btshop_product_image): ?>
                            <div class="color_plate_img"><img src="/uploads/btshopThumbnail/<?php echo $article->btshop_product_image; ?>" width="102" height="94" class="color_plate_img_radius"/></div>
                        <?php else: ?>
                            <div class="color_plate_img"><img src="/images/new_home/bottom_shop_img1.png" width="102" height="94" class="color_plate_img_radius"/></div>
                        <?php endif; ?>
                        <div class="bottom_shop_txt_main">
                            <div class="<?php
                    if ($modAdCount == 1) {
                        echo 'bottom_shop_rub2';
                    } else {
                        echo 'bottom_shop_rub1';
                    }
                        ?>"><?php echo $article->btshop_article_title; ?></div>
                                 <?php if ($article->btshop_article_subtitle): ?>
                                <span class="<?php
                             if ($modAdCount == 1) {
                                 echo 'bottom_shop_ingress2';
                             } else {
                                 echo 'bottom_shop_ingress1';
                             }
                                     ?>"><?php echo substr($article->btshop_article_subtitle, 0, 58); ?></span>
                                <span class="<?php
                              if ($modAdCount == 1) {
                                  echo 'bottom_shop_price2';
                              } else {
                                  echo 'bottom_shop_price1';
                              }
                                     ?>"><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?>&nbsp;KR</span>
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
        <div class="footer_divider_div">&nbsp;</div>
        <div class="footer_main">
            <?php include_partial('global/six_cube_footer', array('host_str' => $host_str, 'bottom_commodities_links' => $bottom_commodities_links, 'bottom_currencies_links' => $bottom_currencies_links, 'bottom_buysell_links' => $bottom_buysell_links, 'bottom_statistics_links' => $bottom_statistics_links, 'bottom_aktier_links' => $bottom_aktier_links, 'bottom_kronika_links' => $bottom_kronika_links)) ?>
        </div>
    </div>
</div>