<style>.forum_drop-down-menus ul{padding:0 31px;}.forum_drop-down-menus{top:40px;}</style>
<script type="text/javascript" language="javascript">
    $(window).load(function(){

        //Amit changes 31-1-2011
        var hArray = new Array();
        hArray[0] = $(".forumlistingleftdiv").height();
        hArray[1] = $(".rightbanner").height(); 
 
        if(hArray[0] > hArray[1])
            var maxHeight = hArray[0];
        else
            var maxHeight = hArray[1];
        
        var leftDiv = $('#article_lista').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('#article_lista').css('border-right','1px solid #d3d3d3');
        }
    });
        function paginationUlGo(obj){
            var column_id = $('#column_id').val();	
            var parent_menu = $('#parent_menu').val();
            var submenu_menu = $('#submenu_menu').val();
            var parent_sort_by = $('#parent_sort_by').val();
            var variable_str = '';
            var page = $(obj).html();
            
            var current_column_order = $('#articlelist_current_column_order').val();	
            var show_thumb = $('#show_thumb').val();

            var kat_id = $('#kat_id').val();
            var type_id = $('#type_id').val();
            var obj_id = $('#obj_id').val();
            var sbt_kat_id = $('#sbt_kat_id').val();
            var sbt_type_id = $('#sbt_type_id').val();
            var sbt_obj_id = $('#sbt_obj_id').val();

            if(column_id) variable_str = variable_str+'&column_id='+column_id;
            if(current_column_order) variable_str = variable_str+'&articlelist_current_column_order='+current_column_order;
            if(kat_id) variable_str = variable_str+'&kat_id='+kat_id;
            if(type_id) variable_str = variable_str+'&type_id='+type_id;
            if(obj_id) variable_str = variable_str+'&obj_id='+obj_id;
            if(sbt_kat_id) variable_str = variable_str+'&sbt_kat_id='+sbt_kat_id;
            if(sbt_type_id) variable_str = variable_str+'&sbt_type_id='+sbt_type_id;
            if(sbt_obj_id) variable_str = variable_str+'&sbt_obj_id='+sbt_obj_id;

            $('#article_list_table').find("tr.classnot").each(function(index){
                $(this).addClass('withOpacity');
            });
            $('.indicator').css('display', 'block');
            var pagination_numbers = $('#article_list_listing_new').html();
            $('#article_list_listing_new').html('<span class="">'+pagination_numbers+'</span>');
            $('.dummy2').html('<span class="">'+pagination_numbers+'</span>');
            $.post("/borst/getNewArticleListData?page="+page+"&parent_menu="+parent_menu+"&submenu_menu="+submenu_menu+'&show_thumb='+show_thumb+variable_str, function(data){
                $('.forumlistingleftdivinner').html(data);
                $('.indicator').hide();
                setSearchOrderImage('sortby_'+column_id,current_column_order);
            });
        }
        function paginationPopupGo(obj) {
            
            var column_id = $('#column_id').val();	
            var parent_menu = $('#parent_menu').val();
            var submenu_menu = $('#submenu_menu').val();
            var parent_sort_by = $('#parent_sort_by').val();
            var variable_str = '';
            var page = $(obj).prev().val();
            
            var current_column_order = $('#articlelist_current_column_order').val();	
            var show_thumb = $('#show_thumb').val();

            var kat_id = $('#kat_id').val();
            var type_id = $('#type_id').val();
            var obj_id = $('#obj_id').val();
            var sbt_kat_id = $('#sbt_kat_id').val();
            var sbt_type_id = $('#sbt_type_id').val();
            var sbt_obj_id = $('#sbt_obj_id').val();

            if(column_id) variable_str = variable_str+'&column_id='+column_id;
            if(current_column_order) variable_str = variable_str+'&articlelist_current_column_order='+current_column_order;
            if(kat_id) variable_str = variable_str+'&kat_id='+kat_id;
            if(type_id) variable_str = variable_str+'&type_id='+type_id;
            if(obj_id) variable_str = variable_str+'&obj_id='+obj_id;
            if(sbt_kat_id) variable_str = variable_str+'&sbt_kat_id='+sbt_kat_id;
            if(sbt_type_id) variable_str = variable_str+'&sbt_type_id='+sbt_type_id;
            if(sbt_obj_id) variable_str = variable_str+'&sbt_obj_id='+sbt_obj_id;

            $('#article_list_table').find("tr.classnot").each(function(index){
                $(this).addClass('withOpacity');
            });
            $('.indicator').css('display', 'block');
            var pagination_numbers = $('#article_list_listing_new').html();
            $('#article_list_listing_new').html('<span class="">'+pagination_numbers+'</span>');
            $('.dummy2').html('<span class="">'+pagination_numbers+'</span>');
            $.post("/borst/getNewArticleListData?page="+page+"&parent_menu="+parent_menu+"&submenu_menu="+submenu_menu+'&show_thumb='+show_thumb+variable_str, function(data){
                $('.forumlistingleftdivinner').html(data);
                $('.indicator').hide();
                setSearchOrderImage('sortby_'+column_id,current_column_order);
            });
        }

        function paginationPopup(obj) {
            var offset = $(obj).position();
            $(obj).next().css("left", offset.left - 63);
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

        function sortingPopUp(obj) {
            $(obj).prev().toggle();
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
        
    
</script>
<span class="float_left indicator loader loader_posiotion"><img src="/images/ajax-loader.gif" /></span>
<div class="inner-page-contetn-left" id="article_lista" >
    <div class="height_auto">
        <div class="breadcrumb lista_mrg_top_7">
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
        <div class="forumlistingleftdivinner">

            <div class="lista1 widthall list_lista"><?php echo __('Lista') ?></div>
            <div class="shop4">
                <input type="hidden" name="art_id" id="art_id" value="<?php echo $art_id ?>" />
                <!--<div class="paginationwrapper dummy1">
                    <div class="pagination" id="article_list_listing_new">
                        <?php if ($pager->haveToPaginate()): ?>
                            <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><img src="/images//new_home/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
                            <?php $links = $pager->getLinks(11);
                            foreach ($links as $page):
                                ?>
                                <?php if ($page == $pager->getPage()): ?>
                                    <?php echo '<span class="selected">' . $page . '</span>' ?>
                                <?php else: ?>
                                    <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                <?php endif; ?>
                                <?php if ($page != $pager->getCurrentMaxLink()): ?>
                                    -
                                <?php endif ?>
                            <?php endforeach ?>
                            <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"> <img src="/images//new_home/right_arrow_trans.png" alt="arrow" /> </a>
                        <?php endif ?>
                    </div>
                </div>-->
                
                
                <div class="paginationwrapper dummy1">
                    <div class="forum_pag" id="article_list_listing_new">
                        <?php if ($pager->haveToPaginate()): ?>
                            <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                    <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                                <?php } ?>
                                <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                                <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                                <div class="forum_popup_pagination_wrapper" noclick="1" >
                                    <ul class="pagination_ul">
                                    <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                        <li onclick="javascript:paginationUlGo(this);"><?php echo $pg; ?></li>
                                    <?php } ?>
                                    </ul>
                                    <!-- <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                        <option noclick="1" value="0" >Gå till sida...</option>
                                        <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                            <option noclick="1" class="color232222" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                        <?php } ?>
                                    </select>
                                    <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div> -->
                                </div>

                                <span class="forum_sorting_wrapper">
                                    <div noclick="1" class="floatRight forum_drop-down-menus article_listing_column_row">
                                        <ul noclick="1">
                                            <li noclick="1"><span noclick="1" id="sortby_date" class="cursor test">Publ.</span></li>
                                            <li noclick="1"><span noclick="1" id="sortby_title" class="cursor test">Rubrik</span></li>
                                            <li noclick="1"><span noclick="1" id="sortby_category" class="cursor test">Kategori</span></li>
                                            <li noclick="1"><span noclick="1" id="sortby_type" class="cursor test">Typ</span></li>
                                            <li noclick="1"><span noclick="1" id="sortby_object" class="cursor test">Objekt</span></li>
                                        </ul>
                                    </div>
                                    <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                                    <span class="floatRight">Sortera efter</span>
                                </span>
                            <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="float_left widthall" id="article_list_page">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="article_list_table">
                    <input type="hidden" id="parent_menu" name="parent_menu" value="<?php echo $sf_user->getAttribute('parent_menu'); ?>"/>
                    <input type="hidden" id="submenu_menu" name="submenu_menu" value="<?php echo $sf_user->getAttribute('submenu_menu'); ?>"/>
                    <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
                    <input type="hidden" id="parent_sort_by" name="parent_sort_by" value="<?php echo $parent_sort_by; ?>"/>


                    <input type="hidden" id="kat_id" name="kat_id" value="<?php echo $param['kat_id']; ?>"/>
                    <input type="hidden" id="type_id" name="type_id" value="<?php echo $param['type_id']; ?>"/>
                    <input type="hidden" id="obj_id" name="obj_id" value="<?php echo $param['obj_id']; ?>"/>
                    <input type="hidden" id="sbt_kat_id" name="sbt_kat_id" value="<?php echo $param['sbt_kat_id']; ?>"/>
                    <input type="hidden" id="sbt_type_id" name="sbt_type_id" value="<?php echo $param['sbt_type_id']; ?>"/>
                    <input type="hidden" id="sbt_obj_id" name="sbt_obj_id" value="<?php echo $param['sbt_obj_id']; ?>"/>
                    <tr id="article_list_column_row_new" valign="top" height="35" class="blackcolor">
                        <th align="left" width="71"><a id="sortby_date" class="float_left cursor "><span class="float_left list_heading">Publ.<img src="/images/bg.gif" alt="down" width="20"/></span></a></th>
                        <th width="16">&nbsp;</th>
                        <th align="left" width="253"><a id="sortby_title" class="float_left cursor "><span class="float_left list_heading">Rubrik<img src="/images/bg.gif" alt="down" width="20"/></span></a>

                    <?php if ($show_thumb == 1): ?>
                        <div class="preamble" name="0"><span class="float_left">
                        <!-- visa utan ingress -->
                        </span></div>
                    <?php else: ?>
                        <div class="preamble" name="1"><span class="float_left">
                        <!-- visa med ingress -->
                        </span></div>
                    <?php endif; ?>

                    </th>
                    <th width="23">&nbsp;</th>
                    <th align="left" width="66"><a id="sortby_category" class="float_left cursor "><span class="float_left list_heading_kategori">Kategori<img src="/images/bg.gif" alt="down" width="20"/></span></a></th>
                    <th width="11">&nbsp;</th>
                    <th align="left" width="80"><a id="sortby_type" class="float_left cursor "><span class="float_left list_heading_typ">Typ<img src="/images/bg.gif" alt="down" width="20"/></span></a></th>
                    <th width="11">&nbsp;</th>
                    <th align="left" width="60"><a id="sortby_object" class="float_left cursor "><span class="float_left list_heading_objekt">Objekt<img src="/images/bg.gif" alt="down" width="20"/></span></a></th>
                    </tr>
                    <?php if ($type == 'sbt'): ?>
                        <?php foreach ($pager->getResults() as $article): ?>
                        <?php $flagga = "usa.gif"; ?>
                            <tr id="borst_rec_row" class="classnot">
                                <td width="73" class="noclass"><?php echo substr($article->created_at, 0, 10); ?></td>
                                <td width="16">&nbsp;</td>
                                <td width="253"><a id="sbt_article_title_<?php echo $article->id; ?>" class="list_topic" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtArticleDetails/article_id/<?php echo $article->id; ?>"><span class="article_list_text"><?php echo $article->analysis_title; ?></span></a></td>
                                <td width="23">&nbsp;</td>

                                <td width="66" class="noclass"><a class="cursor list_heading_kategori" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList/sbt_kat_id/' . $article->analysis_category_id ?>" id="sbt_kat_id_<?php echo $article->analysis_category_id ?>"><span class="article_list_kategori"><?php echo $cat_arr[$article->analysis_category_id] ? $cat_arr[$article->analysis_category_id] : '&nbsp;'; ?></span></a></td>
                                <td width="11">&nbsp;</td>
                                <td width="80" class="noclass"><a class="cursor list_heading_typ" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList/sbt_type_id/' . $article->analysis_type_id ?>" id="sbt_type_id_<?php echo $article->analysis_type_id ?>"><span class="article_list_typ"><?php echo $type_arr[$article->analysis_type_id] ? $type_arr[$article->analysis_type_id] : '&nbsp;'; ?></span></a></td>
                                <td width="11">&nbsp;</td>
                                <td width="60" class="noclass"><a class="cursor list_heading_objekt" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList/sbt_obj_id/' . $article->analysis_object_id ?>" id="sbt_obj_id_<?php echo $article->analysis_object_id ?>"><span class="article_list_objekt"><?php echo $object_arr[$article->analysis_object_id] ? $object_arr[$article->analysis_object_id] : '&nbsp;'; ?></span></a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php foreach ($pager->getResults() as $article): ?>
                            <?php
                            // if ($object_country_arr[$article->object_id] != "")
                            //     $flagga = $object_country_arr[$article->object_id] . ".gif";
                            // else
                            //     $flagga = "no_flag.gif";
                            ?>
                            <tr id="borst_rec_row" class="classnot">                                
                                <td width="71" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>"><span class="list_date"><?php echo substr($article->article_date, 0, 10); ?></span></td>
                                <td width="16">&nbsp;</td>
                                <td width="253" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>"><a class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'list_topic' ?>" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $article->article_id; ?>"><span class="article_list_text"><?php echo $article->title ? $article->title : '&nbsp;'; ?></span></a></td>
                                <td width="23">&nbsp;</td>
                                <td width="66" class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'noclass' ?>"><a class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'cursor list_heading_kategori' ?>" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList/kat_id/' . $article->category_id ?>"><span class="article_list_kategori"><?php echo $cat_arr[$article->category_id] ? $cat_arr[$article->category_id] : '&nbsp;'; ?></span></a></td>
                                <td width="11">&nbsp;</td>
                                <td width="80" class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'noclass' ?>"><a class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'cursor list_heading_typ' ?>" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList/type_id/' . $article->type_id ?>"><span class="article_list_typ"><?php echo $type_arr[$article->type_id] ? $type_arr[$article->type_id] : '&nbsp;'; ?></span></a></td>
                                <td width="11">&nbsp;</td>
                                <td width="60" class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'noclass' ?>"><a class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'cursor list_heading_objekt' ?>" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList/obj_id/' . $article->object_id ?>"><span class="article_list_objekt"><?php echo $object_arr[$article->object_id] ? $object_arr[$article->object_id] : '&nbsp;'; ?></span></a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
                <div class="paginationwrapper">
                    <!--<div class="pagination dummy2" id="article_list_listing_new">
                        <?php if ($pager->haveToPaginate()): ?>
                            <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><img src="/images/new_home/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
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
                                    -
                                <?php endif ?>
                            <?php endforeach ?>
                            <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"> <img src="/images/new_home/right_arrow_trans.png" alt="arrow" /> </a>
                        <?php endif ?>
                    </div>-->
                    
                    
                    <div class="paginationwrapper dummy1">
                        <div class="forum_pag" id="article_list_listing_new">
                            <?php if ($pager->haveToPaginate()): ?>
                                <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                    <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                        <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                                    <?php } ?>
                                    <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                                    <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                                    <div class="forum_popup_pagination_wrapper" noclick="1" >
                                        <ul class="pagination_ul">
                                        <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                            <li onclick="javascript:paginationUlGo(this);"><?php echo $pg; ?></li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                    <span class="forum_sorting_wrapper">
                                        <div noclick="1" class="floatRight forum_drop-down-menus article_listing_column_row"  style="top:40px;">
                                            <ul noclick="1">
                                                <li noclick="1"><span noclick="1" id="sortby_date" class="cursor test">Publ</span></li>
                                                <li noclick="1"><span noclick="1" id="sortby_title" class="cursor test">Rubrik</span></li>
                                                <li noclick="1"><span noclick="1" id="sortby_category" class="cursor test">Kategori</span></li>
                                                <li noclick="1"><span noclick="1" id="sortby_type" class="cursor test">Typ</span></li>
                                                <li noclick="1"><span noclick="1" id="sortby_object" class="cursor test">Objekt</span></li>
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

            <!-- ContactUs, Dela and Testimonial START -->  


        </div>
        
<?php echo include_partial('global/bottom_footer_whitepage', array('page_url'=>$page_url)); ?>
    </div>
     <div class="inner_page_divider_3">&nbsp;</div>
    <div class="float_left margin_testimonial">
        <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
    </div>
</div>
<div class="rightbanner padding_0 font_0 margin_top_ann">
<div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php //include_partial('global/ad_message') ?>
            <?php include_partial('global/right_top_ads', array('ad' => $ad_1)) ?>

        
        <?php include_partial('global/sponsorer_ad') ?>
         

        <!--<div class="blank_10h">&nbsp;</div>---->

        <?php if(count($twentyeight_2_thirtyfive)>0) {?><div class="home_adline_r_div">&nbsp;</div><?php }?>
                                            </div>
<!--<div class="inner_page_divider_3">&nbsp;</div>-->

