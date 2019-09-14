<div class="lista1 widthall list_lista"><?php echo __('Lista') ?></div>
<div class="shop4">
    <input type="hidden" name="art_id" id="art_id" value="<?php echo $art_id ?>" />
    <div class="paginationwrapper dummy1">
       <!-- <div class="pagination" id="article_list_listing_new">
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
        </div>-->
        
        
        <div class="paginationwrapperNew">
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
                            <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                <option noclick="1" value="0" >Gå till sida...</option>
                                <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                    <option noclick="1" class="color232222" <?php
                                        if ($pager->getPage() == $pg) {
                                            echo "selected='selected'";
                                        }
                                        ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                        </div>
                        <span class="forum_sorting_wrapper">
                            <div noclick="1" class="floatRight forum_drop-down-menus article_listing_column_row" style="top:17px;">
                                <ul noclick="1">
                                    <li noclick="1"><span noclick="1" id="sortby_date" class="cursor date_active test">Publ.</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_title" class="cursor title_active test">Rubrik</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_category" class="cursor category_active test">Kategori</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_type" class="cursor type_active test">Typ</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_object" class="cursor object_active test">Objekt</span></li>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="article_list_table">
    <input type="hidden" id="parent_menu" name="parent_menu" value="<?php echo $sf_user->getAttribute('parent_menu'); ?>"/>
    <input type="hidden" id="submenu_menu" name="submenu_menu" value="<?php echo $sf_user->getAttribute('submenu_menu'); ?>"/>
    <input type="hidden" id="articlelist_current_column_order" name="articlelist_current_column_order" value="<?php echo $current_column_order; ?>" />
    <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
    <input type="hidden" id="parent_sort_by" name="parent_sort_by" value="<?php echo $parent_sort_by; ?>"/>
    <input type="hidden" id="show_thumb" name="show_thumb" value="<?php echo $show_thumb; ?>"/>
    <input type="hidden" id="kat_id" name="kat_id" value="<?php echo $param['kat_id']; ?>"/>
    <input type="hidden" id="type_id" name="type_id" value="<?php echo $param['type_id']; ?>"/>
    <input type="hidden" id="obj_id" name="obj_id" value="<?php echo $param['obj_id']; ?>"/>
    <input type="hidden" id="sbt_kat_id" name="sbt_kat_id" value="<?php echo $param['sbt_kat_id']; ?>"/>
    <input type="hidden" id="sbt_type_id" name="sbt_type_id" value="<?php echo $param['sbt_type_id']; ?>"/>
    <input type="hidden" id="sbt_obj_id" name="sbt_obj_id" value="<?php echo $param['sbt_obj_id']; ?>"/>
    <tr id="article_list_column_row_new" valign="top" height="35" class="blackcolor">
        <!-- <th align="left" width="43" class="list_heading">Art</th> -->
        <th align="left" width="71"><a id="sortby_date" class="float_left cursor "><span class="float_left list_heading">Publ.<img src="/images/bg.gif" alt="down" width = "20"/></span></a></th>
        <th width="16">&nbsp;</th>
        <th align="left" width="253"><a id="sortby_title" class="float_left cursor "><span class="float_left list_heading">Rubrik<img src="/images/bg.gif" alt="down" width = '20' /></span></a>

            <?php if ($show_thumb == 1): ?>
        <div class="preamble" name="0"><span class="float_left">visa utan ingress</span></div>
        <?php else: ?>
            <div class="preamble" name="1"><span class="float_left">visa med ingress</span></div>
        <?php endif; ?>

        </th>
        <th width="23">&nbsp;</th>
        <th align="left" width="66"><a id="sortby_category" class="float_left cursor "><span class="float_left list_heading_kategori">Kategori<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th width="11">&nbsp;</th>
        <th align="left" width="80"><a id="sortby_type" class="float_left cursor "><span class="float_left list_heading_typ">Typ<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th width="11">&nbsp;</th>
        <th align="left" width="60"><a id="sortby_object" class="float_left cursor "><span class="float_left list_heading_objekt">Objekt<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
    </tr>
<?php if ($type == 'sbt'): ?>
    <?php foreach ($pager->getResults() as $article): ?>
        <?php $flagga = "usa.gif"; ?>
        <tr id="borst_rec_row" class="classnot">
            <td width="71" class="list_date"><?php echo substr($article->created_at, 0, 10); ?></td>
            <td width="16">&nbsp;</td>

        <?php if ($show_thumb == 1): ?>
                <td width="253" class="preamble_title_color">
                    <a id="sbt_article_title_<?php echo $article->id; ?>" class="topic_title" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtArticleDetails/article_id/<?php echo $article->id; ?>">
                        <b class="list_topic_2"><?php echo $article->analysis_title; ?></b>
                        <img class="preamble_img" src="/uploads/thumbnail/<?php echo str_replace('.', '_small.', $article->image); ?>">
                    </a><br/>

                    <a id="sbt_article_title_<?php echo $article->id; ?>" class="list_topic" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtArticleDetails/article_id/<?php echo $article->id; ?>"><?php echo $article->image_text; ?></a>
                </td>
            <?php else: ?>
                <td width="253"><a id="sbt_article_title_<?php echo $article->id; ?>" class="list_topic" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtArticleDetails/article_id/<?php echo $article->id; ?>"><span class="article_list_text"><?php echo $article->analysis_title; ?></span></a></td>
        <?php endif; ?>
                <td width="23">&nbsp;</td>
            <td width="66" class="noclass"><a class="cursor list_heading_kategori" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList/sbt_kat_id/' . $article->analysis_category_id ?>" id="sbt_kat_id_<?php echo $article->analysis_category_id ?>"><span class="article_list_text"><?php echo $cat_arr[$article->analysis_category_id] ? $cat_arr[$article->analysis_category_id] : '&nbsp;'; ?></span></a></td>
            <td width="11">&nbsp;</td>
            <td width="80" class="noclass"><a class="cursor list_heading_typ" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList/sbt_type_id/' . $article->analysis_type_id ?>" id="sbt_type_id_<?php echo $article->analysis_type_id ?>"><span class="article_list_text"><?php echo $type_arr[$article->analysis_type_id] ? $type_arr[$article->analysis_type_id] : '&nbsp;'; ?></span></a></td>
            <td width="11">&nbsp;</td>
            <td width="60" class="noclass"><a class="cursor list_heading_objekt" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList/sbt_obj_id/' . $article->analysis_object_id ?>" id="sbt_obj_id_<?php echo $article->analysis_object_id ?>"><span class="article_list_text"><?php echo $object_arr[$article->analysis_object_id] ? $object_arr[$article->analysis_object_id] : '&nbsp;'; ?></span></a></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <?php foreach ($pager->getResults() as $article): ?>
        <?php
        if ($object_country_arr[$article->object_id] != "")
            $flagga = $object_country_arr[$article->object_id] . ".gif";
        else
            $flagga = "no_flag.gif";
        ?>
        <tr id="borst_rec_row" class="classnot">
            <!-- <td width="43"><img src="/images/<?php echo $flagga ?>" width="30" height="17" class="article_list_img">&nbsp;</td> -->
            <td width="71" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>"><span class="article_list_text"><?php echo substr($article->article_date, 0, 10); ?></span></td>
            <td width="16">&nbsp;</td>

        <?php if ($show_thumb == 1): ?>
                <td width="253" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>">
                    <a class="topic_title <?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $article->article_id; ?>">
                        <b><?php echo $article->title ? $article->title : '&nbsp;'; ?></b>
                        <img class="preamble_img" src="/uploads/articleIngressImages/<?php echo str_replace('.', '_small.', $article->image); ?>">
                    </a><br/>

                    <a class="topic_title <?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $article->article_id; ?>"><?php echo $article->title ? $article->image_text : '&nbsp;'; ?></a>
                </td>
            <?php else: ?>
                <td width="253" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>"><a class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'topic_title' ?>" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $article->article_id; ?>"><span class="article_list_text"><?php echo $article->title ? $article->title : '&nbsp;'; ?></span></a></td>
        <?php endif; ?>
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
            
<?php endif ?>
    </div>-->
    
    <div class="paginationwrapperNew">
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
                        <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                            <option noclick="1" value="0" >Gå till sida...</option>
                            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                <option noclick="1" class="color232222" <?php
                                    if ($pager->getPage() == $pg) {
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                    </div>
                    <span class="forum_sorting_wrapper">
                        <div noclick="1" class="floatRight forum_drop-down-menus article_listing_column_row"  style="top:17px;">
                            <ul noclick="1">
                            <li noclick="1"><span noclick="1" id="sortby_date" class="cursor date_active test">Publ.</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_title" class="cursor title_active test">Rubrik</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_category" class="cursor category_active test">Kategori</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_type" class="cursor type_active test">Typ</span></li>
                                    <li noclick="1"><span noclick="1" id="sortby_object" class="cursor object_active test">Objekt</span></li>
                            </ul>
                        </div>
                        <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                        <span class="floatRight">Sortera efter</span>
                    </span>
                <?php endif ?>
        </div>
    </div>
    
</div>

<!-- <script>
$(document).ready(function(){
    console.log("test............");
    if($column_id == "date")
        $(".date_active").addClass("active_item");
    if($column_id == "title")
        $(".title_active").addClass("active_item");
    if($column_id == "category")
        $(".category_active").addClass("active_item");
    if($column_id == "type")
        $(".type_active").addClass("active_item");
    if($column_id == "typobjecte")
        $(".object_active").addClass("active_item");

});
</script> -->
<?php 
if($column_id == "date"){
    echo '<script type="text/javascript">',
     '$(".date_active").addClass("active_item");',
    //  '$("sortby_date").addClass("active_item");',
     '</script>'
;
}
elseif ($column_id == "title"){
    echo '<script type="text/javascript">',
     '$(".title_active").addClass("active_item ");',
    //  '$(".test1").addClass("active_item");',
     '</script>'
;
}
elseif ($column_id == "category"){
    echo '<script type="text/javascript">',
     '$(".category_active").addClass("active_item ");',
    //  '$(".test1").addClass("active_item");',
     '</script>'
;
}
elseif ($column_id == "type"){
    echo '<script type="text/javascript">',
     '$(".type_active").addClass("active_item ");',
    //  '$(".test1").addClass("active_item");',
     '</script>'
;
}
elseif ($column_id == "object"){
    echo '<script type="text/javascript">',
     '$(".object_active").addClass("active_item ");',
    //  '$(".test1").addClass("active_item");',
     '</script>'
;
}

?>