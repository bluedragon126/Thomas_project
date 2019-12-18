<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * This bottom footer is only for those static pages which is having small content so that's why the button up icon shows very close to red line 
 */
?>
<?php if (isset($designPattern) && $designPattern == 2) { ?>
    <div class="<?php echo $topBlankClass; ?>" >&nbsp;</div>
    <div>
        <span><img src="/images/new_home/testimonial_L.png" class="margin_testimonial" width="500"/></span>
    </div>
<?php } else { ?>
    <div class="inner_page_divider_2">&nbsp;</div>

    <!--code by sandeep -->
    <div class="social_wrapper">
        <div class='floatLeft custome_button_twitter cursor margin_rgt_share'><img src="/images/new_home/twittra.png" height="15"/></div>
    </div>
    <?php $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>
    <div class='floatLeft margin_rgt_share' data-href="https://www.hallenborgsandstrom.se" data-layout="button_count" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>&amp;src=sdkpreparse"><img src="/images/new_home/gilla.png" height="15"/></a></div>
    <!--<div class='floatLeft'><a class="addthis_button_google_plusone_share" href="https://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren"><img src="/images/new_home/gilla.png" /></a></div>-->
    <!--code by sandeep  End -->

    <!--<div class='floatLeft margin_rgt_share'><a href="https://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button"><img src="/images/new_home/dela.png" height="15"/></a></div>-->
    <script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
    <script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#username=borstjanaren"></script>
    <!-- AddThis Button END -->
    <?php //echo 'page_url: '.$page_url;?>
    <div class='floatLeft margin_rgt_share'><a class="main_link_color" href="/borst/tipAFriendForm"><img src="/images/new_home/tipsa.png" height="15"/></a></div>
    <!--<div class='floatLeft margin_rgt_share'><a class="main_link_color" href="/borst/contactUs"><img src="/images/new_home/ask.png" height="15"/></a></div>-->

    <div class="bt_contact"><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst/contactUs'; ?>" <?php echo $third_menu == 'contact_us' ? 'class="select"' : ''; ?>>Kontakta oss</a></div>

<?php } ?>
    <script>
    $(document).ready(function() {
        $(".custome_button_twitter").live("click",function(){
            var twitimagetext = '<?php echo $article_image_text ? html_entity_decode($article_image_text) : "" ?>';
            var currentUrl = window.location.href;
            if((twitimagetext.length + currentUrl.length) > 140)
            {
                twitimagetext = twitimagetext.substring(0,139 - (currentUrl.length + 3));
                twitimagetext = twitimagetext + "...";
            }
            var url = "https://twitter.com/share?text="+twitimagetext+"&url="+currentUrl;
            window.open(url, "Share on twitter", "top=300,left=350,width=500,height=500");
        });
		
        /* code by sandeep */
        var twitimagetext = '<?php echo $article_image_text ? html_entity_decode($article_image_text) : "" ?>';        
        var titletext = $('title').text()+' | '+twitimagetext;
        $('title').text(titletext);
        /* code by sandeep end */
    });
    </script>