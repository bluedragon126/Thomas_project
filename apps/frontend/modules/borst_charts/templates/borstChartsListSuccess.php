<div class="maincontentpage">
    <div class="forumlistingleftdiv" id="borstChartsList" style="border:none;">
        <div class="forumlistingleftdivinner">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <?php
                        include_component('isicsBreadcrumbs', 'show', array(
                            'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome')
                        ))
                        ?> 
                    </li>
                </ul>
            </div>

            <div id="btchart_list_outer"> 
                <input type="hidden" id="btchart_column_order" name="shop_article_column_order" value="<?php echo $current_column_order; ?>"/>
                <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
                <div class="shoph2">   <input type="hidden" id="btchart_column" name="shop_article_column" value="<?php echo $cur_column; ?>"/>
                    <?php if ($pager->getNbResults() > 0) : ?>
                        <div class="paginationwrapper float_left widthall ">
                            <div class="pagination" id="btchart_search_listing">
                                <?php if ($pager->haveToPaginate()): ?>
                                    <a id="1" href="#" class="cursor"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>
                                    <a id="<?php echo $pager->getPreviousPage(); ?>" href="#" class="cursor"> < </a>
                                    <?php $links = $pager->getLinks(11);
                                    foreach ($links as $page):
                                        ?>
                                        <?php if ($page == $pager->getPage()): ?>
                                            <?php echo '<span class="selected">' . $page . '</span>' ?>
                                            <input type="hidden" id="current_page" value="<?php echo $page; ?>" />
                                        <?php else: ?>
                                            <a id="<?php echo $page; ?>"  class="cursor" href="#" class="cursor"> <?php echo $page; ?> </a>
                                        <?php endif; ?>
                                        <?php if ($page != $pager->getCurrentMaxLink()): ?>
                                            -
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                    <a id="<?php echo $pager->getNextPage(); ?>" href="#"  class="cursor"> > </a> <a href="#" id="<?php echo $pager->getLastPage(); ?>"  class="cursor"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
    <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="shoph3 widthall"> <span class="float_left"> Marknadslista </span> </div>
                    <div class="stock_filter">
                        <form name="stock_list" action="" id="stock_list" method="get" >

                            Marknadstyp:
                            <select id="stock_type" name="stock_type">
                                <option value="all">All</option>
                                <?php foreach ($stock_types as $key => $value): ?>
                                    <option value="<?php echo $key; ?>" <?php echo $selected_stock_type == $key ? 'selected' : '' ?>><?php echo $value; ?></option>
    <?php endforeach; ?>
                            </select> 
                        </form>
                    </div>

                    <div id="success_msg"></div>
                    <div class="float_left widthall">
                        <div class="float_left listing">

<?php endif; ?>
                        <form name="stock_list_main" action="" id="stock_list_main" method="post" >
                            <table align="left"  cellpadding="0" cellspacing="0">
                                <tr id="btchart_stock_list">
                                    <td class="heading width_18_per"><strong><a id="sortby_stockname" class="float_left cursor"><span id="sortby_stockname2"> Namn<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>
                                    <td class="heading width_20_per"><strong><a id="sortby_stocksymbol" class="float_left cursor"><span id="sortby_stocksymbol2"> Symbol<img src="/images/bg.gif" alt="down" width = '20' /></span></a></td>
                                    <td class="heading width_12_per"><strong><a id="sortby_country" class="float_left cursor"><span id="sortby_country2">Land<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>
                                    <td class="heading width_20_per"><strong><a id="sortby_stocktype" class="float_left cursor"><span id="sortby_stocktype2">Marknadstyp<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>
                                    <td class="heading width_15_per"><strong><a id="sortby_list" class="float_left cursor"><span id="sortby_list2">Lista<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>
                                    <td class="heading width_15_per"><strong><a id="sortby_sector" class="float_left cursor"><span id="sortby_sector2">Sektor<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>               
                                </tr>
<?php foreach ($pager->getResults() as $data): ?>
                                    <tr class="classnot" id="row_<?php echo $data->id; ?>">
                                        <td> <a class="bluelink" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $data->company_name); ?>/stock_id/<?php echo $data->id ?>/chart_type/1"><?php echo $data->company_name; ?></a> </td>                    
                                        <td> <?php echo $data->company_symbol; ?> </td>                    
                                        <td> <?php echo $data->country; ?> </td> 
                                        <td> <?php echo $catgeory_arr[$data->company_type_id]; ?> </td>                                       
                                        <td> <?php echo $data->list; ?> </td>                    
                                        <td> <?php echo $data->sector; ?> </td>

                                        <td>  </td>                
                                    </tr>
<?php endforeach; ?>
                            </table>
                        </form>

<?php if ($pager->getNbResults() > 0) : ?>
                            <div class="paginationwrapper float_left widthall">
                                <div class="pagination dummy2" id="btchart_search_listing">
    <?php if ($pager->haveToPaginate()): ?>
                                        <a id="1" href="#" class="cursor"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>
                                        <a id="<?php echo $pager->getPreviousPage(); ?>" href="#"  class="cursor"> < </a>
                                        <?php $links = $pager->getLinks(11);
                                        foreach ($links as $page):
                                            ?>
                                            <?php if ($page == $pager->getPage()): ?>
                                                <?php echo '<span class="selected">' . $page . '</span>' ?>
                                                <input type="hidden" id="current_page" value="<?php echo $page; ?>" />
                                            <?php else: ?>
                                                <a id="<?php echo $page; ?>"  class="cursor" href="#" class="cursor"> <?php echo $page; ?> </a>
                                            <?php endif; ?>
                                            <?php if ($page != $pager->getCurrentMaxLink()): ?>
                                                -
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                        <a id="<?php echo $pager->getNextPage(); ?>" href="#"  class="cursor"> > </a> <a href="#" id="<?php echo $pager->getLastPage(); ?>"  class="cursor"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
                            <?php endif; ?>
                                </div>
                            </div>
<?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="rightbanner padding_0 font_0">
        <div class="home_ad_r float_left font_size_12">Annons</div>
            <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">  
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var leftDiv = $('.forumlistingleftdiv').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.forumlistingleftdiv').css('border-right','1px solid #d3d3d3');
        }
        $(".delete_stock").live('click','',function(){
            $flag = window.confirm('Do you want to delete this sotck');
            if($flag){
                var str = '<?php echo 'http://' . $host_str . '/backend.php/borst/deleteStock/stock_id/' ?>';
                str = str+this.id;
                row_id = this.id;
                $.post(str, function(data){
                    $("#row_"+row_id).remove();
                });
            }
        })
        $("#btchart_list_button").live('click','',function(){
            form_data = ($("#stock_list_main").serialize());
            url = '/backend.php/borst/enableOrDisableStocks';
            $.post(url,form_data,function(data){
                $("#success_msg").html(data);
            });
        })
        $("#stock_type").live($.browser.msie ? 'click' : 'change','',function(){
            $("#stock_list").submit();
        });
        $('#btchart_stock_list a').live("click",function(){   
            var column_id = $(this).attr("id");
            var column_name  = $('#'+column_id).html();
            var order = $('#btchart_column_order').val();
            //$('#btchart_stock_list #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
            $.ajax({
                url:'/borst_charts/getBtChartListData/?column_id='+column_id+'&btchart_column_order='+order,
                success:function(data)
                { 
                    $("#btchart_list_outer").html(data);
                    var order = $('#btchart_column_order').val();
                    setBtchartStockListOrderImage(column_id,order);  				   
                }
            });                
        });
        $("#btchart_search_listing a").live("click",function(){
            var column_id = $("#column_id").val();
            var order = $('#btchart_column_order').val();
            var pagination_numbers = $('#btchart_search_listing').html();
            $('#btchart_search_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        
            $('.dummy2').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
            url = '/borst_charts/getBtChartListData?page='+this.id+'&column_id='+column_id+'&btchart_column_order='+order;
            $.get(url,'',function(data){
                //$('#btchart_search_listing').html('<span class="float_left" style="text-align:center; width:100%; height:20px;"><img src="/images/indicator.gif" /></span>');
                $("#btchart_list_outer").html(data);
                var order = $('#btchart_column_order').val();
                setBtchartStockListOrderImage(column_id,order);
            });
        }); 
        function setBtchartStockListOrderImage(column_id,order)
        {
   
            if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
            if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
    			
            if(column_id == 'sortby_stockname') { $('#sortby_stockname2').html('');$('#sortby_stockname2').html('Stock Name'+image_txt); }
            if(column_id == 'sortby_stocksymbol') { $('#sortby_stocksymbol2').html('');$('#sortby_stocksymbol2').html('Stock Symbol'+image_txt); }
            if(column_id == 'sortby_country') { $('#sortby_country2').html(''); $('#sortby_country2').html('Country'+image_txt); }
            if(column_id == 'sortby_stocktype') { $('#sortby_stocktype2').html(''); $('#sortby_stocktype2').html('Stock Type'+image_txt); }
            if(column_id == 'sortby_list') { $('#sortby_list2').html(''); $('#sortby_list2').html('List'+image_txt+'</span>'); }
            if(column_id == 'sortby_sector') { $('#sortby_sector2').html(''); $('#sortby_sector2').html('Sector'+image_txt); }
        }            
    });
</script>