<?php
/*
 * Share link partial for pages which not having contack link and bottom images.
 */
?>
<div class="floatLeft">                    
    <!--code by sandeep -->
    <div class='floatLeft custome_button_twitter cursor margin_rgt_share'><img src="/images/new_home/twittra.png" height="15"/></div>
    <?php $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>
    <div class='floatLeft margin_rgt_share' data-href="https://www.borstjanaren.se/" data-layout="button_count" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>&amp;src=sdkpreparse"><img src="/images/new_home/gilla.png" height="15"/></a></div>

    <!--<div class='floatLeft'><a class="addthis_button_google_plusone_share" href="https://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren"><img src="/images/new_home/gilla.png" /></a></div>-->
    <!--code by sandeep  End -->

    <!--<div class='floatLeft margin_rgt_7'><a href="https://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button"><img src="/images/new_home/dela.png" height="15"/></a></div>-->
    <script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
    <script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#username=borstjanaren"></script>
    <!-- AddThis Button END -->
    <div class='floatLeft margin_rgt_7'><a class="main_link_color" href="/borst/tipAFriendForm/article_id/<?php echo $article_data->article_id; ?>"><img src="/images/new_home/tipsa.png" height="15"/></a></div>
    <!--<div class='floatLeft margin_rgt_7'><a class="main_link_color" href="/borst/contactUs"><img src="/images/new_home/ask.png" height="15"/></a></div>-->
</div>