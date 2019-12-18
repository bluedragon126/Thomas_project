<script type="text/javascript" language="javascript">    
    
    function paginationPopupGo(obj){
        var blog_id = $('#blog_id').val();			
        var page = $(obj).prev().val();
        var user_id = $('#blog_user_id').val();
        var pagination_numbers = $('.user_all_blog_comment_pagination').html();
        $('.user_all_blog_comment_pagination').html('<span class="float_left">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        
        $.ajax({
            url:'/sbt/fetchAndPostCommentOnBlog?user_id='+user_id+'&page='+page+'&blog_id='+blog_id,
            success:function(data)
            {
                $("#blog_comment_div"+blog_id).html(data);
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
<div class="commentheading blog_comment_heading mrg_top_20"><font size="+2"><?php echo $pager->getNbResults(); ?></font> kommentarer, läs nedan eller <span class="main_link_color"><a id="comment_on" class="main_link_color cursor" rel="nofollow"  href="#comment_on_blog">lägg till en egen</a></span></div>

<?php foreach ($pager->getResults() as $data): ?>
    <div class="comment_messagewrapper">
        <div class="float_left comment_user_img"><a href="https://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>">
                <?php if ($user_photo_arr[$data->comment_by] != ''): ?>
                    <img src="/uploads/userThumbnail/<?php echo str_replace('.', '_small.', $user_photo_arr[$data->comment_by]); ?>" alt="user_photo" width="72" height="72"/>
                <?php else: ?>
                    <img alt="photo" src="/images/new_home/blog_user_img.png" width="72" height="72">
                <?php endif; ?>
            </a></div>
        <div class="info">
            <div class="float_left widthall"><b class="borst_subtitle_4 blog_username"><a class="borst_subtitle_4" href="https://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>"><?php echo $profile->getFullUserName($data->comment_by) ?></a></b> <span class="float_right blog_main_date"><?php echo substr($data->created_at, 0, 10); ?></span></div>
            <span class="blog_comments"><?php echo $data->blog_comment ?></span>
        </div>
    </div>
<?php endforeach; ?>

<div class="paginationwrapper">
    <div class="user_all_blog_comment_pagination padding_right_2px float_left text_align_left" id="blog_comment_list<?php echo $blog_id; ?>">
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
                <span noclick="1" class="blog_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                <div class="blog_popup_pagination_wrapper" noclick="1" >
                    <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                        <option noclick="1" value="0" class="forum_select_option_color" >Gå till sida...</option>
                        <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                            <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {
                        echo "selected='selected'";
                    } ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
    <?php } ?>
                    </select>
                    <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                </div>  
<?php endif ?>
    </div>
</div>