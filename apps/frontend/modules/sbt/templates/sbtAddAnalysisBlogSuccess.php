<?php use_stylesheet('custom-theme/jquery-ui-1.8.2.custom_sbt.css'); ?>
<style type="text/css">
    .maincontentpage { overflow:hidden }
    /*.maincontentpage .btshopleftdiv {padding-bottom:2000px; margin-bottom:-2000px}
    .maincontentpage .rightbanner {padding-bottom:2000px; margin-bottom:-2000px}*/
    .advertdiv, .advertdiv2{
        margin-left: 0px;
    }
    .mleft_16{
        margin-left: 0px;
    }
    .sponseror{
        margin-left: 0px;
    }
    .home_adline_r_div{
        margin-left: 0px;
    }
    .jqTransformSelectWrapper{
        width: 283px !important;
        background: none !important;
        background-color: #dddcdb !important;
        border: 1px solid #dddcdb !important;
        border-radius: 5px !important;
        color: #232222 !important;
        font-size: 1em !important;
        height: 29px;
    }
    .jqTransformSelectWrapper div span{
        width: 284px !important;
        height: 24px !important;
        color: #232222 !important;
        font-size: 1em !important;
        padding: 8px 0 0 6px;
    }
    .jqTransformSelectWrapper ul {
        width: 282px !important;
    }
    .jqSelectBox a{
        position: absolute !important;
    }
    .jqTransformSelectWrapper ul a{
        width: 100% !important;
        text-align: left !important;
    }
    .jqTransformSelectWrapper ul li{
        width: 95% !important;
    }

    /*.jqTransformSelectWrapper a.jqTransformSelectOpen {
        background: rgba(0, 0, 0, 0) url("/images/jqtransformplugin/img/select_right.png") no-repeat scroll center center;
        display: block;
        height: 31px;
        position: absolute;
        right: 0;
        width: 31px;
    }*/
    .btshopleftdiv {
        background-color: #ffffff;
        padding-left: 48px;
    }
    .btshopleftdivinner,.article_wrapper,.addArticle,#create_blog{
        width: 610px !important;
    }
</style>
<input type="hidden" id="addBloArticle" />
<div class="maincontentpage">
    <div class="innerleftdiv_blog padding_0">
        <?php //include_partial('global/ad_message') ?>
        <div style="margin-bottom: 20px;"><img src="/images/new_home/blog_logo.png" width="190"></div>
        <div class="blog_mrg_welc"><span class="blog_welc_welc">Välkommen att skapa!</span></div>
        <div class="blog_mrg_20"><span class="blog_initial_span"><img src="/images/new_home/initial.png" width="64"/></span><span class="blog_welc_body">är kan du välja att skriva ett blogginlägg, som publiceras direkt i din egen blogg, eller en artikel som kan publiceras på <a href="<?php echo "http://" . $host_str . '/sbt/sbtHome' ?>"> BT Insider</a> – vår experimentsida med användargenererat material.</span></div>
        <div class="blog_mrg_20"><span class="blog_welc_body">Du arbetar med din artikel internt och väljer själv när du vill publicera den på din profilsida. Du kan sedan välja att skicka in din artikel och ansöka om publicering på BT Insider-sidan.</span></div>
        <div class="blog_mrg_20"><span class="blog_welc_body">Efter ett antal godkända artiklar kan du ansöka om att bli publicist på Börstjänaren, sk "murvel", med rätt att själv fatta beslut om publicering av dina artiklar. </span></div> 
        <div class="home_artline_blog">&nbsp;</div>
        <div class="home_ad_r float_left" style="margin-left: 0px;">Annons</div>
        <div id="profile_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>

    <div class="btshopleftdiv" style="min-height:627px;"> 
        <div class="btshopleftdivinner">


            <div class="article_wrapper">
                <div class="breadcrumb">
                    <ul>
                        <li><?php
            include_component('isicsBreadcrumbs', 'show', array(
                'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome')
            ))
            ?> </li>
                    </ul>
                </div>
                <?php if (($rec[0]['from_sbt'] == 1 && $rec[0]['sbt_active'] == 1) || ($isSuperAdmin == 1)): ?>
                    <div class="blog_user_profile_deshboard" style="width: 100%;"><?php echo __('Skapa artikel / blogg') ?></div>
                    <div class="addArticle">
                        <div class="article_top blog_table_head"><span class="add_blog_head"> Val av publiceringsform</span></div>
                        <div class="article_top_right"></div>
                        <div class="article_content mrg_top_2">
                            <ul class="select_option">
                                <li><a id="blog_selected" name="blog"><img src="/images/blog_link.png" alt="Add Blog" /><span>Blogg</span></a></li>
                                <li><a id="analysis_selected" name="analysis"><img src="/images/article_link.png" alt="Add Article" height="29"/><span>Artikel</span></a></li>
                                <li><input type="hidden" name="blog_article" id="blog_article" /></li>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="shopinfo" style="width:100%; margin-top:30px;"><span class="main_link_color"><?php echo __('Du behöver komplettera ditt användarkonto för att blogga eller skriva artiklar.') ?></span></div>
                    <div><a href="<?php echo "http://" . $host_str . "/sbt/editProfile/edit_user_id/" . $userId; ?>">Komplettera ditt BT-konto nu?</a></div>
                <?php endif; ?>
                <div id="create_blog" class="form_out"></div>
            </div>


        </div>
    </div>
</div>
<div class="inner_page_divider_3">&nbsp;</div>
    <div class="float_right margin_right_testimonial margin_testimonial">
        <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
    </div>
