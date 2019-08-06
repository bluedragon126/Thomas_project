<div class="maincontentpage">
    <div class="photoimg"><img src="/images/inphoto.jpg" alt="photo"></div>
    <div class="breadcrumb">
        <ul>
            <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'Borstjanaren', 'uri' => 'borst/borstHome')
))
?> 
            </li>
        </ul>
    </div>
    <div class="sitemap_wrap">
        <div class="sitemap_title"><?php echo __('Sajtkarta'); ?></div>
        <div class="sitemap_button_wrap">
            <ul class="sitemap_button_subwrap">
                <li class="sitemap_button_1st" id="sitemapbtnhome_1">
                    <span class="sitemap_1st"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstHome"><?php echo __('Börstjänaren'); ?></a></span>
                    <ul class="borstlink">
                        <div class="sitemap_nav_line sitemap_sublink">&nbsp;</div>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_1"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstHome"><?php echo __('Hem'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_2"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstShare"><?php echo __('Aktier'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_3"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstCommodities"><?php echo __('Råvaror'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_4"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstCurrencies"><?php echo __('Valutor'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_5"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstChronicles"><?php echo __('Krönikor'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_6"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstSubscriber"><?php echo __('Portfölj'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_7"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/articleList/obj_id/1795"><?php echo __('VM-Update'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_8"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/14277"><?php echo __('Veckans trejd'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_9"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/14276"><?php echo __('Utbildningar'); ?></a></span></li>
                    </ul>
                </li>
                <li class="sitemap_button_2nd" id="sitemapbtnhome_2">
                    <span class="sitemap_1st"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome"><?php echo __('BT-Shop'); ?></a></span>
                    <ul class="borstlink">
                        <div class="sitemap_nav_line_2nd sitemap_sublink">&nbsp;</div>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_10"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome"><?php echo __('Hem'); ?></a></span></li>
                        <li class="sitemap_sublink">
                            <span class="sitemap_2nd"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome"><?php echo __('Abonnemang'); ?></a></span>
                            <ul class="bt_shop_subcat">
                                <?php foreach ($abonnemang_data as $key=>$abonnemang): ?>
                                    <li>
                                        <span class="sitemap_2nd"><?php echo $abonnemang->btshop_article_title; ?></span>
                                        <ul class="borstlink">
                                            <li>
                                                <div id="<?php echo 'borstbtshop_'.$key; ?>">
                                                <span class="sitemap_shop_subtitle <?php echo 'borstbtshop_abonnemang_title_text_'.$key; ?>"><?php echo $abonnemang->btshop_article_subtitle; ?></span>
                                                <span class="sitemap_shop_detail <?php echo 'borstbtshop_abonnemang_detail_text_'.$key; ?>"><?php echo $abonnemang->btshop_product_intro_text; ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="sitemap_sublink">
                            <span class="sitemap_2nd"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome"><?php echo __('Utbildningar'); ?></a></span>
                            <ul class="bt_shop_subcat_third">
                                <?php foreach ($utbildningar_data as $key=>$utbildningar): ?>
                                    <li>
                                        <span class="sitemap_2nd"><?php echo substr($utbildningar->btshop_article_title,0,30); ?></span>
                                        <ul>
                                            <li>
                                                <div id="<?php echo 'borstbtshop_'.$key; ?>">
                                                <span class="sitemap_shop_subtitle <?php echo 'borstbtshop_utbildningar_title_text_'.$key; ?>"><?php echo $utbildningar->btshop_article_subtitle; ?></span>
                                                <span class="sitemap_shop_detail <?php echo 'borstbtshop_utbildningar_detail_text_'.$key; ?>"><?php echo $utbildningar->btshop_product_intro_text; ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="sitemap_sublink">
                            <span class="sitemap_2nd"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome"><?php echo __('Metastock'); ?></a></span>
                            <ul class="bt_shop_subcat_fourth">
                                <?php foreach ($metastock_data as $key=>$metastock): ?>
                                    <li>
                                        <span class="sitemap_2nd"><?php echo $metastock->btshop_article_title; ?></span>
                                        <ul>
                                            <li>
                                                <div id="<?php echo 'borstbtshop_'.$key; ?>">
                                                <span class="sitemap_shop_subtitle <?php echo 'borstbtshop_metastock_title_text_'.$key; ?>"><?php echo $metastock->btshop_article_subtitle; ?></span>
                                                <span class="sitemap_shop_detail <?php echo 'borstbtshop_metastock_detail_text_'.$key; ?>"><?php echo $metastock->btshop_product_intro_text; ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_11"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopConditions"><?php echo __('Villkor'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_12"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/shopCart"><?php echo __('Varukorg'); ?></a></span></li>
                    </ul>
                </li>
                <li class="sitemap_button_3rd" id="sitemapbtnhome_3">
                    <span class="sitemap_1st"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstShowChart/stock_name/OMXS30/stock_id/1491/chart_type/1"><?php echo __('BT-Charts'); ?></a></span>
                    <ul class="borstlink">
                        <div class="sitemap_nav_line_3rd sitemap_sublink">&nbsp;</div>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_13"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsHome"><?php echo __('Hem'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_14"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsVarlden"><?php echo __('Världen'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_15"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsLargeCap"><?php echo __('Large Cap'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_16"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsMidCap"><?php echo __('Mid Cap'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_17"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsSmallCap"><?php echo __('Small Cap'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_18"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsRavaror"><?php echo __('Råvaror'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_19"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsValutor"><?php echo __('Valutor'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_20"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsSP100"><?php echo __('S&P 100'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_21"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsNQ100"><?php echo __('Nasdaq 100'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_22"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsLasarnas"><?php echo __('Läsarnas val'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_23"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_charts/borstChartsETF"><?php echo __('ETF:er'); ?></a></span></li>
                    </ul>
                </li>
                <li class="sitemap_button_4th" id="sitemapbtnhome_4">
                    <span class="sitemap_1st"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome"><?php echo __('Forum'); ?></a></span>
                    <ul class="borstlink">
                        <div class="sitemap_nav_line_4th sitemap_sublink">&nbsp;</div>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_24"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome/cat_1"><?php echo __('Börstjänaren'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_25"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome/cat_2"><?php echo __('Marknader'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_26"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome/cat_3"><?php echo __('Plattformar'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_27"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome/cat_4"><?php echo __('Handelsinstrument'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_28"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome/cat_5"><?php echo __('Strategi'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_29"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome/cat_6"><?php echo __('Marknadsbrus'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_30"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome/cat_7"><?php echo __('Fria marknaden'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_31"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome/cat_8"><?php echo __('VIP Lounge'); ?></a></span></li>
                    </ul>
                </li>
                <li class="sitemap_button_5th" id="sitemapbtnhome_5">
                    <span class="sitemap_1st"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtBlog"><?php echo __('Blogg'); ?></a></span>
                    <ul class="borstlink">
                        <div class="sitemap_nav_line_5th sitemap_sublink">&nbsp;</div>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_32"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtBlog"><?php echo __('Blogg'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_33"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/profiler"><?php echo __('Profiler'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_34"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtAddAnalysisBlog"><?php echo __('Skapa Art/Blogg'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_35"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtUserProfile"><?php echo __('Min Profil'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_36"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/showListOfUserBlog"><?php echo __('Min Blogg'); ?></a></span></li>
                    </ul>
                </li>
                <li class="sitemap_button_6th" id="sitemapbtnhome_6">
                    <span class="sitemap_1st"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtBlog"><?php echo __('Profil'); ?></a></span>
                    <ul class="borstlink">
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_37"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtBlog"><?php echo __('Blogg'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_38"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/profiler"><?php echo __('Profiler'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_39"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtAddAnalysisBlog"><?php echo __('Skapa Art/Blogg'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_40"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtUserProfile"><?php echo __('Min Profil'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_41"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/showListOfUserBlog"><?php echo __('Min Blogg'); ?></a></span></li>
                        <div class="sitemap_nav_line_6th sitemap_sublink">&nbsp;</div>
                    </ul>
                </li>
                <li class="sitemap_button_7th" id="sitemapbtnhome_7">
                    <span class="sitemap_1st"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/14273"><?php echo __('BT-verkstan'); ?></a></span>
                    <ul class="borstlink">
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_42"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/14275"><?php echo __('Hem'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_43"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/14276"><?php echo __('Sponsrade utbildningar'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_44"><a><?php echo __('CMC'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_45"><a><?php echo __('Ava'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_46"><a><?php echo __('Global Futures'); ?></a></span></li>
                        <div class="sitemap_nav_line_7th sitemap_sublink">&nbsp;</div>
                    </ul>
                </li>
                <li class="sitemap_button_8th" id="sitemapbtnhome_8">
                    <span class="sitemap_1st"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtHome"><?php echo __('BT Insider'); ?></a></span>
                    <ul class="borstlink">
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_47"><a><?php echo __('Hem'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_48"><a><?php echo __('Analys'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_49"><a><?php echo __('Kommentar'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_50"><a><?php echo __('Rekommendationer'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_51"><a><?php echo __('Krönika'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_52"><a><?php echo __('Allehanda'); ?></a></span></li>
                        <div class="sitemap_nav_line_8th sitemap_sublink">&nbsp;</div>
                    </ul>
                </li>
                <li class="sitemap_button_9th" id="sitemapbtnhome_9">
                    <span class="sitemap_1st"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/14276"><?php echo __('Utbildningar'); ?></a></span>
                    <ul class="borstlink">
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_53"><a><?php echo __('Hem'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_54"><a><?php echo __('Trading Wizard'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_55"><a><?php echo __('Daytrading för Nybörjare'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_56"><a><?php echo __('Matiga minkurser'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_57"><a><?php echo __('Intensivkurs i Daytrading'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_58"><a><?php echo __('BT Börsguru'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_59"><a><?php echo __('Råvarukung'); ?></a></span></li>
                        <div class="sitemap_nav_line_9th sitemap_sublink">&nbsp;</div>
                    </ul>
                </li>
                <li class="sitemap_button_10th" id="sitemapbtnhome_10">
                    <span class="sitemap_1st"><?php echo __('Fråga BT'); ?></span>
                    <ul class="borstlink">
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_60"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstSubscriber"><?php echo __('Portfölj'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_61"><a><?php echo __('Henry Boy'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_62"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/14276"><?php echo __('Utbildningar'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_63"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/2127"><?php echo __('Webinarium'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_64"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/14273"><?php echo __('BT-verkstan'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_65"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#metastock_title"><?php echo __('Metastock'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_66"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome/cat_5"><?php echo __('Strategi'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_67"><a><?php echo __('Förslagslåda'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_68"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstBeginner"><?php echo __('Nybörjare'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_69"><a><?php echo __('Kundtjänst'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_70"><a><?php echo __('Övrigt'); ?></a></span></li>
                        <li class="sitemap_sublink"><span class="sitemap_2nd" id="borst_71"><a><?php echo __('Senaste'); ?></a></span></li>
                        <div class="sitemap_nav_line_10th sitemap_sublink">&nbsp;</div>
                    </ul>
                </li>
            </ul>
            <div class="sitemap_text_wrap_1st">
                <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_1"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstBeginner"><?php echo __('Nybörjare'); ?></a></span></div>
                <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_2"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstNewsletter/pos/1"><?php echo __('Dagsbrev'); ?></a></span></div>
                <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_3"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borstNewsletter/pos/1"><?php echo __('Veckobrev'); ?></a></span></div>
                <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_4"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbtUserProfile/take_to_profile/1"><?php echo __('Öppna konto'); ?></a></span></div>
                <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_5"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/faq"><?php echo __('Hjälp'); ?></a></span></div>
                <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_6"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/home/sponsorer"><?php echo __('Sponsorer'); ?></a></span></div>
            </div>
        </div>
        
        <div class="sitemap_btn_detail_wrap"><span class="sitemap_btn_detail" id="sitemapbtnhometext_1"><?php echo __('Välkommen till Sveriges vassaste sajt för teknisk trading och utbildning!'); ?></span></div>
        <div class="sitemap_btn_detail_wrap_btshop"><span class="sitemap_btn_detail" id="sitemapbtnhometext_2"><?php echo __('Välkommen till Börstjänarens webbshop – affären för bättre affärer!'); ?></span></div>
        <div class="sitemap_btn_detail_wrap_btcharts"><span class="sitemap_btn_detail" id="sitemapbtnhometext_3"><?php echo __('Kostnadsfria BT-charts ger dig grafer över de vanligaste marknaderna. BT-charts innehåller även olika betaltjänster med grafer förinställda på speciella handelsmodeller, som genererar signaler som du kan agera på.'); ?></span></div>
        <div class="sitemap_btn_detail_wrap_forum"><span class="sitemap_btn_detail" id="sitemapbtnhometext_4"><?php echo __('Välkommen till Börstjänarens Forum där vi diskuterar allt mellan himmel och trejd!'); ?></span></div>
        <div class="sitemap_btn_detail_wrap_blog"><span class="sitemap_btn_detail" id="sitemapbtnhometext_5"><?php echo __('Välkommen till Börstjänarens blogg och profilsidor! Här kan du blogga och skriva egna artiklar, fördjupa dig i frågor tillsammans med andra användare och ta del av deras profiler.'); ?></span></div>
        <div class="sitemap_btn_detail_wrap_profile_first"><span class="sitemap_btn_detail" id="sitemapbtnhometext_6"><?php echo __('Välkommen till Börstjänarens blogg och profilsidor! Här kan du blogga och skriva egna artiklar, fördjupa dig i frågor tillsammans med andra användare och ta del av deras profiler.'); ?></span></div>
        <div class="sitemap_btn_detail_wrap_klubben_first"><span class="sitemap_btn_detail" id="sitemapbtnhometext_7"><?php echo __('Livetradingverkstad för våra sponsrade medlemmar. Så gör du för att gå med!'); ?></span></div>
        <div class="sitemap_btn_detail_wrap_din_artikel_first"><span class="sitemap_btn_detail" id="sitemapbtnhometext_8"><?php echo __('Experimentell förstasida tänkt att bl a innehålla läsargenererat material.'); ?></span></div>
        <div class="sitemap_btn_detail_wrap_utbildningar_first"><span class="sitemap_btn_detail" id="sitemapbtnhometext_9"><?php echo __('Kalendarium över Börstjänarens utbildningar, se nästa tillfälle att delta live!'); ?></span></div>
        <div class="sitemap_btn_detail_wrap_fraga_first"><span class="sitemap_btn_detail" id="sitemapbtnhometext_10"><?php echo __('Här kan du ställa frågor till Börstjänaren och få snabbt svar. Och även läsa andras frågor och svar.'); ?></span></div>

        <div class="sitemap_detail_wrap"><span class="sitemap_detail" id="borstdetails_1"><?php echo __('Börstjänarens hemsida – förstasidan.'); ?></span></div>
        <div class="sitemap_detail_wrap"><span class="sitemap_detail" id="borstdetails_2"><?php echo __('En förstasida där alla redaktionella <br>artiklar handlar om aktier.'); ?></span></div>
        <div class="sitemap_detail_wrap"><span class="sitemap_detail" id="borstdetails_3"><?php echo __('En förstasida där alla redaktionella <br>artiklar behandlar råvaror.'); ?></span></div>
        <div class="sitemap_detail_wrap"><span class="sitemap_detail" id="borstdetails_4"><?php echo __('En förstasida där alla redaktionella <br>artiklar är Forex- och valutarelaterade.'); ?></span></div>
        <div class="sitemap_detail_wrap"><span class="sitemap_detail" id="borstdetails_5"><?php echo __('Under denna vinjett kan du bland annat finna texter med lite längre hållbarhet.'); ?></span></div>
        <div class="sitemap_detail_wrap"><span class="sitemap_detail" id="borstdetails_6"><?php echo __('En förstasida med portföljartiklar – <br>exklusivt för våra portföljabonnenter.'); ?></span></div>
        <div class="sitemap_detail_wrap"><span class="sitemap_detail" id="borstdetails_7"><?php echo __('Läs om vårt kostnadsfria veckobrev med marknadsanalyser.'); ?></span></div>
        <div class="sitemap_detail_wrap"><span class="sitemap_detail" id="borstdetails_8"><?php echo __('Läs om vårt kostnadsfria utskick med en utvald affär.'); ?></span></div>
        <div class="sitemap_detail_wrap"><span class="sitemap_detail" id="borstdetails_9"><?php echo __('Läs mer om Börstjänarens utbildningar som du kan gå live eller via nedladdning.'); ?></span></div>
                
        <div class="sitemap_detail_wrap_btshop"><span class="sitemap_detail" id="borstdetails_10"><?php echo __('Välkommen till Börstjänarens webbshop – affären för bättre affärer!'); ?></span></div>
        <div class="sitemap_detail_wrap_btshop"><span class="sitemap_detail" id="borstdetails_11"><?php echo __('Läs om våra handels- och leveransvillkor.'); ?></span></div>
        <div class="sitemap_detail_wrap_btshop"><span class="sitemap_detail" id="borstdetails_12"><?php echo __('Dina utvalda produkter stannar här i varukorgen tills du tömmer den. (Förhoppningsvis genom att  gå till kassan och köpa produkterna. ;-)'); ?></span></div>
        
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_13"><?php echo __('Kostnadsfria BT-charts ger dig grafer över de vanligaste marknaderna. BT-charts innehåller även olika betaltjänster med grafer förinställda på speciella handelsmodeller, som genererar signaler som du kan agera på.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_14"><?php echo __('Aktuella grafer över de viktigaste världsindexen.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_15"><?php echo __('Aktuella grafer över bolagen på Stockholm Large Cap.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_16"><?php echo __('Aktuella grafer över bolagen på Stockholm Mid Cap.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_17"><?php echo __('Aktuella grafer över bolagen på Stockholm Small Cap.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_18"><?php echo __('Aktuella grafer över de viktigaste <br>råvarorna.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_19"><?php echo __('Aktuella grafer över de viktigaste valutaparen.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_20"><?php echo __('Aktuella grafer över de 100 viktigaste USA-aktierna.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_21"><?php echo __('Aktuella grafer över de 100 viktigaste aktierna på NASDAQ-börsen.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_22"><?php echo __('Aktuella grafer över marknader utvalda av läsarna.'); ?></span></div>
        <div class="sitemap_detail_wrap_btcharts"><span class="sitemap_detail" id="borstdetails_23"><?php echo __('Aktuella grafer över ETF:er, börshandlade fonder.'); ?></span></div>
        
        <div class="sitemap_detail_wrap_forum"><span class="sitemap_detail" id="borstdetails_24"><?php echo __('Läs inlägg och delta i diskussioner <br>under vinjetten "Börstjänaren".'); ?></span></div>
        <div class="sitemap_detail_wrap_forum"><span class="sitemap_detail" id="borstdetails_25"><?php echo __('Läs inlägg och delta i diskussioner <br>under vinjetten "Marknader".'); ?></span></div>
        <div class="sitemap_detail_wrap_forum"><span class="sitemap_detail" id="borstdetails_26"><?php echo __('Läs inlägg och delta i diskussioner <br>under vinjetten "Plattformar".'); ?></span></div>
        <div class="sitemap_detail_wrap_forum"><span class="sitemap_detail" id="borstdetails_27"><?php echo __('Läs inlägg och delta i diskussioner <br>under vinjetten "Handelsinstrument".'); ?></span></div>
        <div class="sitemap_detail_wrap_forum"><span class="sitemap_detail" id="borstdetails_28"><?php echo __('Läs inlägg och delta i diskussioner <br>under vinjetten "Strategi".'); ?></span></div>
        <div class="sitemap_detail_wrap_forum"><span class="sitemap_detail" id="borstdetails_29"><?php echo __('Läs inlägg och delta i diskussioner <br>under vinjetten "Marknadsbrus".'); ?></span></div>
        <div class="sitemap_detail_wrap_forum"><span class="sitemap_detail" id="borstdetails_30"><?php echo __('Läs inlägg och delta i diskussioner <br>under vinjetten "Fria marknaden".'); ?></span></div>
        <div class="sitemap_detail_wrap_forum"><span class="sitemap_detail" id="borstdetails_31"><?php echo __('Forum för VIP-diskussioner.'); ?></span></div>
        
        <div class="sitemap_detail_wrap_blog"><span class="sitemap_detail" id="borstdetails_32"><?php echo __('Läs Börstjänarens bloggar.'); ?></span></div>
        <div class="sitemap_detail_wrap_blog"><span class="sitemap_detail" id="borstdetails_33"><?php echo __('Ta del av Börstjänarens användar-<br>profiler.'); ?></span></div>
        <div class="sitemap_detail_wrap_blog"><span class="sitemap_detail" id="borstdetails_34"><?php echo __('Skriv din egen blogg eller artikel!'); ?></span></div>
        <div class="sitemap_detail_wrap_blog"><span class="sitemap_detail" id="borstdetails_35"><?php echo __('Uppdatera din användarprofil och se över dina kontouppgifter, abonnemang, orderhistorik m.m.'); ?></span></div>
        <div class="sitemap_detail_wrap_blog"><span class="sitemap_detail" id="borstdetails_36"><?php echo __('Gå till Din blogg och dela med dig till världen på dina egna villkor!'); ?></span></div>
        
        <div class="sitemap_detail_wrap_profile_first"><span class="sitemap_detail" id="borstdetails_37"><?php echo __('Läs Börstjänarens bloggar.'); ?></span></div>
        <div class="sitemap_detail_wrap_profile_second"><span class="sitemap_detail" id="borstdetails_38"><?php echo __('Ta del av Börstjänarens användar-<br>profiler.'); ?></span></div>
        <div class="sitemap_detail_wrap_profile_third"><span class="sitemap_detail" id="borstdetails_39"><?php echo __('Skriv din egen blogg eller artikel!'); ?></span></div>
        <div class="sitemap_detail_wrap_profile_fourth"><span class="sitemap_detail" id="borstdetails_40"><?php echo __('Uppdatera din användarprofil och se över dina kontouppgifter, abonnemang, orderhistorik m.m.'); ?></span></div>
        <div class="sitemap_detail_wrap_profile_fifth"><span class="sitemap_detail" id="borstdetails_41"><?php echo __('Gå till Din blogg och dela med dig till världen på dina egna villkor!'); ?></span></div>
        
        <div class="sitemap_detail_wrap_klubben_first"><span class="sitemap_detail" id="borstdetails_42"><?php echo __('Livetradingverkstad för våra sponsrade medlemmar. Så gör du för att gå med!'); ?></span></div>
        <div class="sitemap_detail_wrap_klubben_second"><span class="sitemap_detail" id="borstdetails_43"><?php echo __('Delta i våra utbildningar till reducerat pris eller helt kostnadsfritt!'); ?></span></div>
        <div class="sitemap_detail_wrap_klubben_third"><span class="sitemap_detail" id="borstdetails_44"><?php echo __('Läs om vår favorit bland Sverige-<br>baserade CFD mäklare: pålitliga <br>CMC Markets.'); ?></span></div>
        <div class="sitemap_detail_wrap_klubben_fourth"><span class="sitemap_detail" id="borstdetails_45"><?php echo __('Läs om vår sponsor AvaTrade – den proffsiga CFD-mäklaren för dig som <br>sätter värde på integritet.'); ?></span></div>
        <div class="sitemap_detail_wrap_klubben_fifth"><span class="sitemap_detail" id="borstdetails_46"><?php echo __('Läs om vår kaliforniska sponsor Global Futures, det självklara alternativet för erfarna traders som handlar terminer.'); ?></span></div>
        
        <div class="sitemap_detail_wrap_din_artikel_first"><span class="sitemap_detail" id="borstdetails_47"><?php echo __('Experimentell förstasida tänkt att bl a <br>innehålla läsargenererat material.'); ?></span></div>
        <div class="sitemap_detail_wrap_din_artikel_second"><span class="sitemap_detail" id="borstdetails_48"><?php echo __('Alternativsida med artiklar sorterade under kategorin "Analyser".'); ?></span></div>
        <div class="sitemap_detail_wrap_din_artikel_third"><span class="sitemap_detail" id="borstdetails_49"><?php echo __('Alternativsida med artiklar sorterade under kategorin "Kommentarer".'); ?></span></div>
        <div class="sitemap_detail_wrap_din_artikel_fourth"><span class="sitemap_detail" id="borstdetails_50"><?php echo __('Alternativsida med artiklar sorterade under kategorin "Rekommendationer".'); ?></span></div>
        <div class="sitemap_detail_wrap_din_artikel_fifth"><span class="sitemap_detail" id="borstdetails_51"><?php echo __('Alternativsida med artiklar sorterade under kategorin "Krönikor".'); ?></span></div>
        <div class="sitemap_detail_wrap_din_artikel_sixth"><span class="sitemap_detail" id="borstdetails_52"><?php echo __('Alternativsida med blandat kompott.'); ?></span></div>
        
        <div class="sitemap_detail_wrap_utbildningar_first"><span class="sitemap_detail" id="borstdetails_53"><?php echo __('Kalendarium över Börstjänarens utbildningar, se nästa tillfälle att delta live!'); ?></span></div>
        <div class="sitemap_detail_wrap_utbildningar_second"><span class="sitemap_detail" id="borstdetails_54"><?php echo __('Kort presentaton av vår stora grundkurs Trading Wizard.'); ?></span></div>
        <div class="sitemap_detail_wrap_utbildningar_third"><span class="sitemap_detail" id="borstdetails_55"><?php echo __('Första steget för dig som är helt grön och intresserad av professionell daytrading. Missa inte detta!'); ?></span></div>
        <div class="sitemap_detail_wrap_utbildningar_fourth"><span class="sitemap_detail" id="borstdetails_56"><?php echo __('Köp billigt eller köp "dyrt" och sälj ännu dyrare!'); ?></span></div>
        <div class="sitemap_detail_wrap_utbildningar_fifth"><span class="sitemap_detail" id="borstdetails_57"><?php echo __('Professionell daytradingkurs laddad med strategier. För dig som menar allvar med din daytrading.'); ?></span></div>
        <div class="sitemap_detail_wrap_utbildningar_sixth"><span class="sitemap_detail" id="borstdetails_58"><?php echo __('Strategisk grundkurs i rekylhandel: <br>kurshäfte, fem lektioner + e-coachning.'); ?></span></div>
        <div class="sitemap_detail_wrap_utbildningar_seventh"><span class="sitemap_detail" id="borstdetails_59"><?php echo __('Lär dig allt du behöver veta för att handla i världens viktigaste marknader: råvaror, som guld, olja, vete, sojabönor, socker, kaffe, majs mm!'); ?></span></div>
        
        <div class="sitemap_detail_wrap_fraga_first"><span class="sitemap_detail" id="borstdetails_60"><?php echo __('Läs och ställ frågor om Börstjänarens modellportföljer.'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_second"><span class="sitemap_detail" id="borstdetails_61"><?php echo __('Läs och ställ frågor om Börstjänarens Trade Signals-tjänst med garanterad <br>action.'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_third"><span class="sitemap_detail" id="borstdetails_62"><?php echo __('Läs och ställ frågor om Börstjänarens digra utbildningsprogram.'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_fourth"><span class="sitemap_detail" id="borstdetails_63"><?php echo __('Läs och ställ frågor om Börstjänarens webinarium "Trejdingklubben Online".'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_fifth"><span class="sitemap_detail" id="borstdetails_64"><?php echo __('Läs och ställ frågor om Börstjänarens sponsrade tradingverkstad.'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_sixth"><span class="sitemap_detail" id="borstdetails_65"><?php echo __('Läs och ställ frågor om världens mest prisade aktieanalyprogram, som Börstjänaren är återförsäljare för.'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_seventh"><span class="sitemap_detail" id="borstdetails_66"><?php echo __('Läs och ställ frågor om börsstrategi.'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_eighth"><span class="sitemap_detail" id="borstdetails_67"><?php echo __('På Börstjänaren är vi alltid öppna för förslag.'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_nineth"><span class="sitemap_detail" id="borstdetails_68"><?php echo __('Nybörjare är hjärtligt välkomna att ställa frågor till oss och får alltid de bästa svaren!'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_tenth"><span class="sitemap_detail" id="borstdetails_69"><?php echo __('Läs och ställ frågor om sådant som rör våra tjänster och produkter.'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_eleventh"><span class="sitemap_detail" id="borstdetails_70"><?php echo __('Läs och ställ frågor om allehanda spörsmål.'); ?></span></div>
        <div class="sitemap_detail_wrap_fraga_twelveth"><span class="sitemap_detail" id="borstdetails_71"><?php echo __('Läs det sista skriket på Fråga BT!'); ?></span></div>
        
        <div class="sitemap_detail_text_bg">
            <div class="sitemap_detail_text" id="sitemap_detail_1">
                <div class="sitemap_3rd"><?php echo __('Nybörjare');?></div>
                <div class="sitemap_info"><?php echo __('Första stoppet för dig som aldrig tidigare varit på Börstjänaren.'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_2">
                <div class="sitemap_3rd"><?php echo __('Dagsbrev');?></div>
                <div class="sitemap_info"><?php echo __('Börstjänaren JUST NU – dagligt uppdateringsmejl för hardcore börstjänare.'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_3">
                <div class="sitemap_3rd"><?php echo __('Veckobrev');?></div>
                <div class="sitemap_info"><?php echo __('Ett måste ha-abonnemang med våra<br> fantastiska gratistjänster VM-update och Veckans trejd!'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_4">
                <div class="sitemap_3rd"><?php echo __('Öppna konto');?></div>
                <div class="sitemap_info"><?php echo __('Skapa ett konto och få tillgång till hela Börstjänaren: gratisabonnemang, användarprofiler, orderhistorik, låsta artiklar, skapa favoritsidor m.m.'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_5">
                <div class="sitemap_3rd"><?php echo __('Hjälp');?></div>
                <div class="sitemap_info"><?php echo __('Här får du t.ex. instruktioner om hur man registrerar sig, och svar på de vanligaste<br> frågorna folk brukar ställa om vår webbplats.'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_6">
                <div class="sitemap_3rd"><?php echo __('Sponsorer');?></div>
                <div class="sitemap_info"><?php echo __('Stötta gärna våra sponsorer som är med och möjliggör vår till stora delar kostnadsfria webbplats.'); ?></div>
            </div>
            
            <div class="sitemap_detail_text" id="sitemap_detail_7">
                <div class="sitemap_3rd"><?php echo __('Lista');?></div>
                <div class="sitemap_info"><?php echo __('Här kan du se alla Börstjänarens artiklar som en sorterbar lista.'); ?></div>
            </div>            
            <div class="sitemap_detail_text" id="sitemap_detail_8">
                <div class="sitemap_3rd"><?php echo __('Webinairum');?></div>
                <div class="sitemap_info"><?php echo __('Börstjänarens webinarium "Trejdingklubben Online" – varje onsdag kl 20 sedan 2008!'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_9">
                <div class="sitemap_3rd"><?php echo __('Om oss');?></div>
                <div class="sitemap_info"><?php echo __('Vilka vi är och vad vi gör.'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_10">
                <div class="sitemap_3rd"><?php echo __('Kontakta oss');?></div>
                <div class="sitemap_info"><?php echo __('Kontakta oss och få svar privat eller snabbt via Fråga BT!'); ?></div>
            </div>
            
            <div class="sitemap_detail_text" id="sitemap_detail_11">
                <div class="sitemap_3rd"><?php echo __('Twitter');?></div>
                <div class="sitemap_info"><?php echo __('Följ Börstjänarens twitter och få nyheterna först av alla!'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_12">
                <div class="sitemap_3rd"><?php echo __('You Tube');?></div>
                <div class="sitemap_info"><?php echo __('På Börstjänarens Youtubekanal kan du  bl a ta del av inspelningar av "Trejdingklubben Online".'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_13">
                <div class="sitemap_3rd"><?php echo __('Facebook');?></div>
                <div class="sitemap_info"><?php echo __('Gilla Börstjänaren på Facebook!'); ?></div>
            </div>
            
            <div class="sitemap_detail_text" id="sitemap_detail_14">
                <div class="sitemap_3rd"><?php echo __('Mitt konto');?></div>
                <div class="sitemap_info"><?php echo __('Uppdatera din användarprofil och se över ditt konto, abonnemang, orderhistorik m.m.'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_15">
                <div class="sitemap_3rd"><?php echo __('A-Ö');?></div>
                <div class="sitemap_info"><?php echo __('Lexikon över börsvärldens fackspråk och specialuttryck.'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_16">
                <div class="sitemap_3rd"><?php echo __('Riskvarning');?></div>
                <div class="sitemap_info"><?php echo __('Disclaimer-sida där vi påminner om att Börshandel är riskfyllt och att du själv är ytterst ansvarig för din affärer.'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_17">
                <div class="sitemap_3rd"><?php echo __('RSS');?></div>
                <div class="sitemap_info"><?php echo __('Börstjänarens webbinnehåll levereras även löpande i RSS-format (Rich Site Summary).'); ?></div>
            </div>
            <div class="sitemap_detail_text" id="sitemap_detail_18">
                <div class="sitemap_3rd"><?php echo __('Sök');?></div>
                <div class="sitemap_info"><?php echo __('Sök och finn med Börstjänarens avancerade sökfunktion.'); ?></div>
            </div>
            
        </div>
        

        <div class="sitemap_img_wrap">
            <div class="sitemap_img">

            </div>
        </div>
        <div class="sitemap_text_wrap_2nd">
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_7"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/articleList"><?php echo __('Lista'); ?></a></span></div>
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_8"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/2127"><?php echo __('Webinairum'); ?></a></span></div>
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_9"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstAboutUs"><?php echo __('Om oss'); ?></a></span></div>
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_10"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/contactUs"><?php echo __('Kontakta oss'); ?></a></span></div>
        </div>
        <div class="sitemap_text_wrap_3rd">
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_11"><a href="https://twitter.com/borstjanaren" target="_blank"><?php echo __('Twitter'); ?></a></span></div>
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_12"><a href="https://www.youtube.com/channel/UCfSGLtCAxSHqGhMZsQumqaQ?nohtml5=False" target="_blank"><?php echo __('You Tube'); ?></a></span></div>
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_13"><a href="https://www.facebook.com/pages/B%C3%B6rstj%C3%A4naren/193838224060099" target="_blank"><?php echo __('Facebook'); ?></a></span></div>
        </div>
        <div class="sitemap_text_wrap_4th">
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_14"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtUserProfile/take_to_profile/1"><?php echo __('Mitt konto'); ?></a></span></div>
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_15"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/342"><?php echo __('A-Ö'); ?></a></span></div>
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_16"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstRisk"><?php echo __('Riskvarning'); ?></a></span></div>
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_17"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/rss/rss.php"><?php echo __('RSS'); ?></a></span></div>
            <div class="sitemap_col_text"><span class="sitemap_3rd" id="sitemaplink_18"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstAdvanceSearch"><?php echo __('Sök'); ?></a></span></div>
        </div>
        
        <div class="sitemap_plus_detail">
            <div class="sitemap_detail_text">
                <div class="sitemap_3rd"><?php echo __('Börstjänarens sajtkarta');?></div>
                <div class="sitemap_info"><?php echo __('Börstjänaren vid dina fingertoppar! Härifrån sajtkartan kan du komma åt hela Börstjänaren utan att egentligen anstränga dig. Hovra över länkarna och läs korta beskrivningar av respektive sida – klicka och du är där!'); ?></div>
            </div>
        </div>
        <div class="sitemap_plus" id="sitemaplink_19"><img src="/images/new_home/sitemap_plus.png" width="50" class="cursor"/></div>

    </div>
</div>    