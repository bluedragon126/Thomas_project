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

 
        //$(".pinkbg").css({"height":maxHeight+"px"});
        $(".rightbanner").css({"height":maxHeight+"px"});

    });

</script>

<div class="maincontentpage no-padding">
    <div class="pinkbg small_pinkbg" style="height: 874px;">
        <div class="big_bubble"></div>
        <div class="heading_violet"><?php echo $type == 'vote' ? __('Artikel: flest röster') : __('Artikel: mest läst') ?></div>

        <div class="float_left listing" id="analysistoplist_list_page" style="width:97%;">

            <div class="paginationwrapper dummy1">
                <div class="pagination" id="analysistoplist_listing">
                    <?php if ($pager->haveToPaginate()): ?>
                        <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"> <img src="/images/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
                        <?php $links = $pager->getLinks(11);
                        foreach ($links as $page): ?>
                            <?php if ($page == $pager->getPage()): ?>
                                <?php echo '<span class="selected">' . $page . '</span>' ?>
                            <?php else: ?>
                                <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                            <?php endif; ?>
                            <?php if ($page != $pager->getCurrentMaxLink()): ?>
                                -
                            <?php endif ?>
                        <?php endforeach ?>
                        <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"> <img src="/images/right_arrow_trans.png" alt="arrow" /> </a>
<?php endif ?>
                </div>
            </div>

            <input type="hidden" id="analysistoplist_current_column_order" name="analysistoplist_current_column_order" value="<?php echo $current_column_order; ?>" />
            <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
            <input type="hidden" id="analysis_view_type" name="analysis_view_type" value="<?php echo $type ?>"/>

            <ul id="analysistoplist_column_row">
                <li class="first width_300"><a id="sortby_title" class="float_left cursor"><span class="float_left"><?php echo __('Rubrik') ?></span></a></li>
                <li class="bg width_125"><a id="sortby_author" class="float_left cursor"><span class="float_left"><?php echo __('Författare') ?></span></a></li>
                <li class="bg width_150"><a id="sortby_date" class="float_left cursor"><span class="float_left" ><?php echo __('Uppdaterad') ?></span></a></li>

                <?php if ($type == 'vote'): ?>
                    <li class="last width_44"><a id="sortby_vote" class="float_right cursor"><span class="float_right"><?php echo __('Röster') ?></span></a></li>
                <?php else: ?>
                    <li class="last width_44"><a id="sortby_view" class="float_right cursor"><span class="float_right"><?php echo __('Läst') ?></span></a></li>
<?php endif; ?>
            </ul>

            <div id="analysistoplist_topic_list">
                <?php $i = 0;
                foreach ($pager->getResults() as $analysis): ?>
    <?php $date = $analysis->updated_at != NULL ? ($analysis->updated_at == '0000-00-00 00:00:00' ? $analysis->created_at : $analysis->updated_at) : $analysis->created_at; ?>
                    <ul class="<?php echo $i % 2 == 0 ? 'classnot' : 'white'; ?>">
                        <li class="dark_blue"><a class="cursor" href="<?php echo "https://" . $host_str ?>/sbt/sbtArticleDetails/article_id/<?php echo $analysis->id ?>">
                                <span class="analysistoplist_analysistitle"><?php echo $analysis->analysis_title ?></span>
                            </a>
                        </li>
                        <li class="pink width_125"><a class="cursor" href="<?php echo "https://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $analysis->author_id; ?>"><span class="analysistoplist_analysisauthor"><?php echo $profile->getFullUserName($analysis->author_id) ?></span></a></li>
                        <li class="faint_blue width_145"><?php echo $date; ?></li>
                        <li class="light_blue float_right width_44" ><span class="float_right"><?php echo $type == 'vote' ? $analysis->analysis_votes : $analysis->analysis_views ?></span></li>
                    </ul>
    <?php $i++;
endforeach; ?>
            </div>
            <div class="paginationwrapper">
                <div class="pagination dummy2" id="analysistoplist_listing">
                    <?php if ($pager->haveToPaginate()): ?>
                        <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"> <img src="/images/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
                        <?php $links = $pager->getLinks(11);
                        foreach ($links as $page): ?>
                            <?php if ($page == $pager->getPage()): ?>
                                <?php echo '<span class="selected">' . $page . '</span>' ?>
                            <?php else: ?>
                                <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                            <?php endif; ?>
                            <?php if ($page != $pager->getCurrentMaxLink()): ?>
                                -
        <?php endif ?>
    <?php endforeach ?>
                        <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"> <img src="/images/right_arrow_trans.png" alt="arrow" /> </a>
<?php endif ?>
                </div>
            </div>
        </div>

    </div>
    <div class="rightbanner padding_0 font_0">
<?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
<?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>
