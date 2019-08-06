<script type="text/javascript" language="javascript">
    $(window).load(function(){

        //Amit changes 31-1-2011
        var hArray = new Array();
        hArray[0] = $(".pinkbg").height();
        hArray[1] = $(".rightbanner").height(); 
 
        if(hArray[0] > hArray[1])
            var maxHeight = hArray[0];
        else
            var maxHeight = hArray[1];

 
        $(".pinkbg").css({"height":maxHeight+"px"});
        $(".rightbanner").css({"height":maxHeight+"px"});

    });

</script>

<div class="maincontentpage no-padding">
    <div class="pinkbg">
        <div class="heading_violet_toplist">TOPPLISTOR <span class="font14"><strong><?php echo __('(Klicka på rubrik för att se hela listan)') ?></strong></span></div>
        <div class="float_left widthall">
            <div class="toplist_blue_block">
                <div class="small_bubble_toplist"></div>
                <span class="heading"><a class="toplister_blue_heading cursor" href="<?php echo 'http://' . $host_str . '/sbt/sbtTopListerBlogList/type/vote' ?>"><?php echo __('Bloggpost, flest röster') ?></a></span>
                <table width="100%" class="table_list" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th class="width_122" align="left"><?php echo __('Rubrik') ?></th>
                            <th class="width_240" align="left"><?php echo __('Författare') ?></th>
                            <th class="width_132" align="left"><?php echo __('Uppdat') ?></th>
                            <th class="pright_3" align="right"><?php echo __('Röster') ?></th>
                        </tr>
                        <?php $i = 0;
                        foreach ($top_five_voted_blog as $blog): ?>
                            <tr>
                                <td align="left" class="width_92 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtBlogDetails/blog_id/<?php echo $blog->id ?>"><span class="toplisthome_blogtitle"><?php echo $blog->ublog_title ?></span></a></td>
                                <td align="left" class="width_74 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $blog->author_id; ?>"><span class="toplisthome_blogauthor"><?php echo $profile->getFullUserName($blog->author_id) ?></span></a></td>
                                <td align="left" class="width_66 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $blog->updated_at != NULL ? $blog->updated_at : $blog->created_at; ?></td>
                                <td align="right" class="width_47 <?php echo $i == 4 ? 'last' : ''; ?> pright_3"><?php echo $blog->ublog_votes ?></td>
                            </tr>
    <?php $i++;
endforeach; ?>
                    </tbody>
                </table>
                <div class="bot_div"></div>
            </div>
            <div class="toplist_blue_block"> 
                <div class="small_bubble_toplist"></div>
                <span class="heading"><a class="toplister_blue_heading cursor" href="<?php echo 'http://' . $host_str . '/sbt/sbtTopListerBlogList/type/view' ?>"><?php echo __('Blogg, mest läst') ?></a></span>
                <table width="100%" class="table_list" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th class="width_122" align="left"><?php echo __('Rubrik') ?></th>
                            <th class="width_240" align="left"><?php echo __('Författare') ?></th>
                            <th class="width_132" align="left"><?php echo __('Uppdaterad') ?></th>
                            <th class="width_25" align="left"><?php echo __('Visad') ?></th>
                        </tr>
<?php $i = 0;
foreach ($top_five_viewed_blog as $blog): ?>
                            <tr>
                                <td align="left" class="width_92 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtBlogDetails/blog_id/<?php echo $blog->id ?>"><span class="toplisthome_blogtitle"><?php echo $blog->ublog_title ?></span></a></td>
                                <td align="left" class="width_74 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $blog->author_id; ?>"><span class="toplisthome_blogauthor"><?php echo $profile->getFullUserName($blog->author_id) ?></span></a></td>
                                <td align="left" class="width_66 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $blog->updated_at != NULL ? $blog->updated_at : $blog->created_at; ?></td>
                                <td align="left" class="width_47 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $blog->ublog_views ?></td>
                            </tr>
    <?php $i++;
endforeach; ?>
                    </tbody>
                </table>
                <div class="bot_div"></div>
            </div>
            <!-- PINK Block-->
            <div class="toplist_pink_block"> 
                <div class="small_bubble_toplist"></div>
                <span class="heading"><a class="toplister_pink_heading cursor" href="<?php echo 'http://' . $host_str . '/sbt/sbtTopListerAnalysisList/type/vote' ?>"><?php echo __('Artikel, flest röster') ?></a></span>
                <table width="100%" class="table_list" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th class="width_122" align="left"><?php echo __('Rubrik') ?></th>
                            <th class="width_122" align="left"><?php echo __('Författare') ?></th>
                            <th class="width_250" align="left"><?php echo __('Uppdaterad') ?></th>
                            <th class="width_25" align="left"><?php echo __('Röster') ?></th>
                        </tr>
<?php $i = 0;
foreach ($top_five_voted_analysis as $analysis): ?>
    <?php $date = $analysis->updated_at != NULL ? ($analysis->updated_at == '0000-00-00 00:00:00' ? $analysis->created_at : $analysis->updated_at) : $analysis->created_at; ?>
                            <tr>
                                <td align="left" class="width_92 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtArticleDetails/article_id/<?php echo $analysis->id ?>"><span class="toplisthome_analysistitle"><?php echo $analysis->analysis_title ?></span></a></td>
                                <td align="left" class="width_74 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $analysis->author_id; ?>"><span class="toplisthome_analysisauthor"><?php echo $profile->getFullUserName($analysis->author_id) ?></span></a></td>
                                <td align="left" class="width_66 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $date ?></td>
                                <td align="left" class="width_47 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $analysis->analysis_votes ?></td>
                            </tr>
    <?php $i++;
endforeach; ?>
                    </tbody>
                </table>
                <div class="bot_div"></div>
            </div>
            <div class="toplist_pink_block"> 
                <div class="small_bubble_toplist"></div>
                <span class="heading"><a class="toplister_pink_heading cursor" href="<?php echo 'http://' . $host_str . '/sbt/sbtTopListerAnalysisList/type/view' ?>"><?php echo __('Artikel, mest läst') ?></a></span>
                <table width="100%" class="table_list" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th class="width_250" align="left"><?php echo __('Rubrik') ?></th>
                            <th class="width_250" align="left"><?php echo __('Författare') ?></th>
                            <th class="width_250" align="left"><?php echo __('Uppdaterad') ?></th>
                            <th class="width_47" align="left"><?php echo __('Läst') ?></th>
                        </tr>
<?php $i = 0;
foreach ($top_five_viewed_analysis as $analysis): ?>
                            <?php $date = $analysis->updated_at != NULL ? ($analysis->updated_at == '0000-00-00 00:00:00' ? $analysis->created_at : $analysis->updated_at) : $analysis->created_at; ?>
                            <tr>
                                <td align="left" class="width_92 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtArticleDetails/article_id/<?php echo $analysis->id ?>"><span class="toplisthome_analysistitle"><?php echo $analysis->analysis_title ?></span></a></td>
                                <td align="left" class="width_74 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $analysis->author_id; ?>"><span class="toplisthome_analysisauthor"><?php echo $profile->getFullUserName($analysis->author_id) ?></span></a></td>
                                <td align="left" class="width_66 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $date ?></td>
                                <td align="left" class="width_47 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $analysis->analysis_views ?></td>
                            </tr>
    <?php $i++;
endforeach; ?>
                    </tbody>
                </table>
                <div class="bot_div"></div>
            </div>
            <!--Dark Blue block starts-->
            <div class="toplist_darkblue_block"> 
                <div class="small_bubble_toplist"></div>
                <span class="heading"><a class="toplister_darkblue_heading cursor" href="<?php echo 'http://' . $host_str . '/sbt/sbtTopListerUserList/type/vote' ?>"><?php echo __('Användare, flest röster') ?></a></span>
                <table width="100%" class="table_list" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th align="left" class="width_90"><?php echo __('Ikon') ?></th>
                            <th align="left" class="width_270"><?php echo __('Användare') ?></th>
                            <th align="left" class="width_105"><?php echo __('Röster') ?></th>
                            <th align="left"><?php echo __('Aktiviteter') ?></th>
                        </tr>
<?php $i = 0;
foreach ($top_five_voted_user as $user): ?>
                            <tr>
                                <td align="left" class="<?php echo $i == 4 ? 'last' : ''; ?>">
    <?php if ($user_photo_arr[$user->user_id] != ''): ?>
                                        <a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user->user_id; ?>"><img src="/uploads/userThumbnail/<?php echo str_replace('.', '_small.', $user_photo_arr[$user->user_id]); ?>" alt="user_photo"/></a>
                            <?php else: ?>
                                        <a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user->user_id; ?>"><img src="/images/userphoto.jpg" alt="photo" width="26" height="26" /></a>
    <?php endif; ?> 

                                </td>
                                <td align="left" class="<?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user->user_id; ?>"><span class="toplisthome_username"><?php echo $profile->getFullUserName($user->user_id); ?></span></a></td>
                                <td align="left" class="<?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $user->cnt; ?></td>
                                <td align="left" class="<?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $user->getTotalActivitiesOfUser($user->user_id, $user->firstname . ' ' . $user->lastname); ?></td>
                            </tr>
    <?php $i++;
endforeach; ?>
                    </tbody>
                </table>
                <div class="bot_div"></div>
            </div>
            <div class="toplist_darkblue_block"> 
                <div class="small_bubble_toplist"></div>
                <span class="heading"><a class="toplister_darkblue_heading cursor" href="<?php echo 'http://' . $host_str . '/sbt/sbtTopListerUserList/type/alltime' ?>"><?php echo __('Användare, mest aktiv') ?></a></span>
                <table width="100%" class="table_list" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th align="left" class="width_90"><?php echo __('Ikon') ?></th>
                            <th align="left" class="width_270"><?php echo __('Användare') ?></th>
                            <th align="left" class="width_105"><?php echo __('Röster') ?></th>
                            <th align="left"><?php echo __('Aktiviteter') ?></th>
                        </tr>
<?php $i = 0;
foreach ($top_five_active_user as $user): ?>
                            <tr>
                                <td align="left" class="<?php echo $i == 4 ? 'last' : ''; ?>">
                            <?php if ($user_photo_arr[$user->user_id] != ''): ?>
                                        <a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user->user_id; ?>"><img src="/uploads/userThumbnail/<?php echo str_replace('.', '_small.', $user_photo_arr[$user->user_id]); ?>" alt="user_photo"/></a>
    <?php else: ?>
                                        <a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user->user_id; ?>"><img src="/images/userphoto.jpg" alt="photo" width="26" height="26" /></a>
    <?php endif; ?> 

                                </td>
                                <td align="left" class="<?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user->user_id; ?>"><span class="toplisthome_username"><?php echo $profile->getFullUserName($user->user_id); ?></span></a></td>
                                <td align="left" class="<?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $user->cnt; ?></td>
                                <td align="left" class="<?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $user->activity_cnt; ?></td>
                            </tr>
    <?php $i++;
endforeach; ?>
                    </tbody>
                </table>
                <div class="bot_div"></div>
            </div>
            <!-- GREEN Block-->
            <div class="toplist_green_block"> 
                <div class="small_bubble_toplist"></div>
                <span class="heading"><a class="toplister_green_heading cursor" href="<?php echo 'http://' . $host_str . '/sbt/sbtTopListerArticleList/type/view' ?>"><?php echo __('BT, mest läst') ?></a></span>
                <table width="100%" class="table_list" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th class="width_250" align="left"><?php echo __('Rubrik') ?></th>
                            <th class="width_250" align="left"><?php echo __('Författare') ?></th>
                            <th class="width_250" align="left"><?php echo __('Datum') ?></th>
                            <th class="width_30" align="left"><?php echo __('Läst') ?></th>
                        </tr>
<?php $i = 0;
foreach ($top_five_viewed_articles as $article): ?>
                            <tr>
                                <td align="left" class="width_92 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/borst/borstArticleDetails/article_id/<?php echo $article->article_id ?>"><span class="toplisthome_articletitle"><?php echo $article->title ?></span></a></td>
                                <td align="left" class="width_74 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $profile->getUserFromFullName($article->author) ? $profile->getUserFromFullName($article->author) : ''; ?>"><span class="toplisthome_articleauthor"><?php echo $article->author ?></span></a></td>
                                <td align="left" class="width_58 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $article->article_date ?></td>
                                <td align="left" class="width_45 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $id_article_cnt_array[$article->article_id] ?></td>
                            </tr>
    <?php $i++;
endforeach; ?>
                    </tbody>
                </table>
                <div class="bot_div"></div>
            </div>
            <div class="toplist_green_block"> 
                <div class="small_bubble_toplist"></div>
                <span class="heading"><a class="toplister_green_heading cursor" href="<?php echo 'http://' . $host_str . '/sbt/sbtTopListerArticleList/type/comment' ?>"><?php echo __('BT, flest kommentarer') ?></a></span>
                <table width="100%" class="table_list" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th class="width_122" align="left"><?php echo __('Rubrik') ?></th>
                            <th class="width_122" align="left"><?php echo __('Författare') ?></th>
                            <th class="width_250" align="left"><?php echo __('Datum') ?></th>
                            <th class="width_30" align="left"><?php echo __('Komm') ?></th>
                        </tr>
        <?php $i = 0;
        foreach ($top_five_commented_analysis as $article): ?>
                            <tr>
                                <td align="left" class="width_92 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/borst/borstArticleDetails/article_id/<?php echo $article->article_id ?>"><span class="toplisthome_articletitle"><?php echo $article->title ?></span></a></td>
                                <td align="left" class="width_74 <?php echo $i == 4 ? 'last' : ''; ?>"><a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $profile->getUserFromFullName($article->author) ? $profile->getUserFromFullName($article->author) : ''; ?>"><span class="toplisthome_articleauthor"><?php echo $article->author ?></span></a></td>
                                <td align="left" class="width_58 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $article->article_date ?></td>
                                <td align="left" class="width_45 <?php echo $i == 4 ? 'last' : ''; ?>"><?php echo $id_article_comment_array[$article->article_id] ?></td>
                            </tr>
    <?php $i++;
endforeach; ?>
                    </tbody>
                </table>
                <div class="bot_div"></div>
            </div>
        </div>
    </div>
    <div class="rightbanner height_2840 padding_0 font_0">
<?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
<?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>