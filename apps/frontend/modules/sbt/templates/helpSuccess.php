<script type="text/javascript" language="javascript">
    $(window).load(function(){

        //Amit changes 15-2-2011
        var hArray = new Array();
        hArray[0] = $(".forumlistingleftdiv").height();
        hArray[1] = $(".rightbanner").height(); 
 
        if(hArray[0] > hArray[1])
            var maxHeight = hArray[0];
        else
            var maxHeight = hArray[1];

 
        $(".forumlistingleftdiv").css({"height":maxHeight+"px"});
        $(".rightbanner").css({"height":maxHeight+"px"});
        var leftDiv = $('.forumlistingleftdiv').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.forumlistingleftdiv').css('border-right','1px solid #d3d3d3');
        }
    });

</script>
<div class="maincontentpage">
    <div class="forumlistingleftdiv" style="border:none;">
        <div class="forumlistingleftdivinner">

            <div class="breadcrumb">
                <ul>
                    <li><?php include_component('isicsBreadcrumbs', 'show', array('root' => array('text' => 'SisterBT', 'uri' => 'sbt/help'))) ?> </li>
                </ul>
            </div>

            <div class="shoph3 widthall margin_top_10">Hj&auml;lp</div>
            <div class="float_left listing">
                <div class="float_left widthall">

                    <div class="blank_20h widthall">&nbsp;</div>
                    <div class="kronikorinfo" id="reg_help">
                        <h2><span class="redfont"><?php echo __('Hj&auml;lp med Registrering') ?></span></h2>
                        <b>V&auml;lkommen att skapa ett konto p&aring; B&ouml;rstj&auml;naren. </b>Medlemskap p&aring; B&ouml;rstj&auml;naren &auml;r kostnadsfritt och ger &auml;ven ett gratisprov p&aring; v&aring;rt portf&ouml;ljabonnemang, som inte beh&ouml;ver s&auml;gas upp utan l&ouml;per ut av sig sj&auml;lv om du inte aktivt v&auml;ljer att f&ouml;rl&auml;nga det.<br />
                        <br/>
                        <strong>V&auml;lkommen ocks&aring; att registrera till  BT Insider, </strong>B&ouml;rstj&auml;narens n&auml;tverk f&ouml;r dig som vill blogga och skriva egna artiklar eller kommentarer. <br />
                        Medlemskap i BT Insider &auml;r kostnadsfritt men kr&auml;ver en n&aring;got utf&ouml;rligare registrering, d&auml;r du &auml;ven beh&ouml;ver aktivera ditt konto via epost. <br />
                        <br />
                        <strong>F&ouml;r att registrera dig p&aring; BT Insider</strong>, klicka p&aring; texten &quot;Vill du kunna blogga och publicera artiklar?&quot; i <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt_user/sbtNewRegistration">registeringsformul&auml;ret.</a><br />
                        <br />
                        <strong>Om du redan &auml;r registrerad B&ouml;rstj&auml;nare</strong> kan du  ut&ouml;ka ditt medlemskap till BT Insider genom att g&aring; till  &quot;Mitt konto&quot;och v&auml;lja <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtUserProfile"> Editera profil.</a>
                        <span class="whp-border">&nbsp;</span> <br />
                        <br />
                        <br/>
                    </div>

                    <div class="kronikorinfo" id="blog_help">
                        <h2><span class="redfont"><?php echo __('Blog Help ') ?></span></h2>
                        <b>Welcome to Blog help section</b>
                        this section will help you for creating new Blog post<br/>
                        on sisterBT site.<br/>
                        <div class="whp-border">&nbsp;</div>
                    </div>

                    <div class="kronikorinfo" id="forum_help">
                        <h2><span class="redfont"><?php echo __('Forum Help ') ?></span></h2>
                        <b>Welcome to Forum help section</b>
                        this section will help yopu in registering new forum topic <br/>
                        on	sisterBT site.<br/>
                        <div class="whp-border">&nbsp;</div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="rightbanner padding_0 font_0">
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>
