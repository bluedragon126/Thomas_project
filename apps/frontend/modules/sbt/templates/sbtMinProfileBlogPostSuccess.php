<style>
#myblog_list_listing{
    text-align: left;
}
</style>
<script type="text/javascript" language="javascript">
    function paginationPopupGoActive(obj){
        var column_id = $('#column_id').val();
        var page = $(obj).prev().val();
        var current_column_order = $('#mybloglist_current_column_order').val();	
        var pagination_numbers = $('#myblog_list_listing').html();
        //$('#myblog_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $('#myblog_list_listing').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $.ajax({
            url:'/sbt/getMyBlogListData?column_id='+column_id+'&page='+page+'&mybloglist_current_column_order='+current_column_order,//?page='+page,
            success:function(data)
            {
                $('#myblog_list_page').html(data);
            }
        });
    }
    
    function paginationPopupActive(obj){
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
    
    function paginationPopupSelectActive(obj){
        if($(obj).val()==0){
            $(obj).removeClass("color3c3a3a");
            $(obj).addClass("colorb9c2cf");
        }else{
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color3c3a3a");
        }
    }    
    function sortingPopUp(obj){
        $(obj).prev().toggle();
    }
</script>
<?php if($pager->getNbResults() > 0): ?>
<div class="listing">
  <div class="float_left widthall" id="myblog_list_page">
    <div  class="blog_pro_header_all mrg_top_30">Blog</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
      <input type="hidden" id="mybloglist_current_column_order" name="mybloglist_current_column_order" value="<?php echo $current_column_order; ?>" />
      <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
      <tr id="myblog_list_column_row" class="blog_table_head">
        <!--<th class="width_30">Art</th>-->
        <th class="width_82 pad_lft_5"><a id="sortby_date" class="float_left width_80 cursor"><span class="float_left">Publ.<!--<img src="/images/bg.gif" alt="down" width = '20' />--></span></a></th>
        <th class="width_9">&nbsp;</th>
        <th class="width_388"><a id="sortby_title" class="float_left width_80 cursor"><span class="float_left">Rubrik<!--<img src="/images/bg.gif" alt="down" width = '20' />--></span></a></th>
        <th class="width_9"></th>
        <th class="width_66"><a id="sortby_category" class="float_left width_90 cursor"><span class="float_left">Kategori<!--<img src="/images/bg.gif" alt="down" width = '20' />--></span></a></th>
        <?php if($logged_user==$data->author_id || $isSuperAdmin): ?><th class="width_55">&nbsp;</th><?php endif; ?>
        <th class="width51">&nbsp;</th>
      </tr>
      <?php foreach($pager->getResults() as $data): ?>
      <tr id="<?php echo 'row_'.$data->id; ?>" class="classnot blog_td_border">
        <!--<td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>-->
        <td class="width_82 blog_prof_table_date pad_lft_5"><?php echo substr($data->created_at,0,10) ?></td>
        <td class="width_9">&nbsp;</td>
        <td class="width_388"><a class="blog_table_title" href="<?php echo 'http://'.$host_str.'/sbt/sbtBlogDetails/blog_id/'.$data->id;?>"><span class="profile_blogpostlist_title"><?php echo $data->ublog_title ?></span></a></td>
        <td class="width_9">&nbsp;</td>
        <td class="blog_table_topic width_66"><?php echo $cat_arr[$data->ublog_category_id] ? $cat_arr[$data->ublog_category_id] : '&nbsp;'; ?></td>
        <?php if($logged_user==$data->author_id || $isSuperAdmin): ?>
        	<td class="width51">
            	<span class="floatRight width_38">
                	<span class="float_left width_18">
            			<a href="<?php echo 'http://'.$host_str.'/sbt/sbtEditBlog/blog_id/'.$data->id;?>"><img src="/images/edit_blog.png" alt="down" width="15" /></a>
                	</span>
                	<span class="float_left width_14 ptop_4">
               			<a class="profile_bloglist_row" name="<?php echo 'row_'.$data->id; ?>"><img src="/images/cross.png" alt="cross" width="14" height="14" /></a>
                	</span>
                </span>
            </td>
        <?php endif; ?>
      </tr>
      <?php endforeach; ?>
      <!--<tr>
        <td colspan="6">&nbsp;</td>
      </tr>-->
    </table>
    <div class="paginationwrapper">
      <div class="pagination" id="myblog_list_listing">
        <?php /*if ($pager->haveToPaginate()): ?>
        <a id="<?php echo $pager->getFirstPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" style="cursor:pointer;"> < </a>
        <?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
        <?php if($page == $pager->getPage()): ?>
        <?php echo '<span class="selected">'.$page.'</span>' ?>
        <?php else: ?>
        <a id="<?php echo $page; ?>" style="cursor:pointer;"><?php echo $page; ?> </a>
        <?php endif; ?>
        <?php if ($page != $pager->getCurrentMaxLink()): ?>
        -
        <?php endif ?>
        <?php endforeach ?>
        <a id="<?php echo $pager->getNextPage(); ?>" style="cursor:pointer;"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
        <?php endif */?>
            <?php if ($pager->haveToPaginate()): ?>
                          <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="blog_pagination_first_img"></span><span class="blog_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="blog_pagination_prev_img"></span><span class="blog_pagination_prev margin_rgt_7">Föreg</span></a>
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
                              <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 blog_pagination_next">Nästa</span><span class="blog_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="blog_pagination_next" >Sista</span><span class="blog_pagination_last_img"></span></a>
                          
                          <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                          <span noclick="1" class="blog_pagination_down_img cursor" onclick="javascript:paginationPopupActive(this);"></span>
                          <div class="blog_popup_pagination_wrapper" noclick="1" >
                              <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectActive(this);" >
                                  <option noclick="1" value="0" style="color:#b9c2cf" >Gå till sida...</option>
                                  <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                      <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {  echo "selected='selected'"; }?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                  <?php } ?>
                              </select>
                              <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoActive(this);">GA</div>
                          </div>
                          <div style="float: right;">
                                  <div noclick="1" class="floatRight blog_drop-down-menus blog_topic_listing_column_row_all">
                                      <ul noclick="1">
                                          <li noclick="1"><span noclick="1" id="sortby_date" class="cursor">Publ.</span></li>
                                          <li noclick="1"><span noclick="1" id="sortby_title" class="cursor">Rubrik</span></li>
                                          <li noclick="1"><span noclick="1" id="sortby_category" class="cursor">Kategori</span></li>
                                          <li noclick="1"><span noclick="1" id="sortby_type" class="cursor">Typ</span></li>
                                          <li noclick="1"><span noclick="1" id="sortby_object" class="cursor">Objekt</span></li>
                                      </ul>
                                  </div>
                                  <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                                  <span class="floatRight">Sortera efter</span>
                        </div>    
                          <?php endif ?>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
    <!--<span class="no_result"><?php //echo $profile->getFullUserName($user_data->user_id).' '.utf8_encode(' har inte skapat ngon blogg!') ?></span>-->
    <span class="no_result"><?php echo $userName.' '.__('Du har inte skapat någon blogg!') ?></span>
<?php endif; ?>
