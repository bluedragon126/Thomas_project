<div class="footer_divider_links_main">
    <div class="bottom_link_heading_bg">
        <div class="akteirwrapper">
            <span class="bottom_link_heading">Aktier</span>
        </div>
        <div class="akteirwrapper">
            <span class="bottom_link_heading">Råvaror</span>
        </div>
        <div class="akteirwrapper">
            <span class="bottom_link_heading">Valutor</span>
        </div>
    </div>
    <div>
        <div class="akteirwrapper">
            <ul class="bottom_link">
                <?php foreach ($bottom_aktier_links as $data): ?>
                    <li><a href="<?php echo 'https://' . $host_str . '/borst/borstArticleDetails/article_id/' . $data->article_id ?>"><?php echo $data->title; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="akteirwrapper">
            <ul class="bottom_link">
                <?php foreach ($bottom_commodities_links as $data): ?>
                    <li><a href="<?php echo 'https://' . $host_str . '/borst/borstArticleDetails/article_id/' . $data->article_id ?>"><?php echo $data->title; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="akteirwrapper">
            <ul class="bottom_link">
                <?php foreach ($bottom_currencies_links as $data): ?>
                    <li><a href="<?php echo 'https://' . $host_str . '/borst/borstArticleDetails/article_id/' . $data->article_id ?>"><?php echo $data->title ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div style="height: 18px; float: left;width: 100%;">&nbsp;</div>
    
    <div class="bottom_link_heading_bg2">
        <div class="akteirwrapper">
            <span class="bottom_link_heading">Statistik</span>
        </div>
        <div class="akteirwrapper">
            <span class="bottom_link_heading">Köp &amp; Sälj</span>
        </div>
        <div class="akteirwrapper">
            <span class="bottom_link_heading">Krönika</span>
        </div>
    </div>
    <div>
        <div class="akteirwrapper">
            <ul class="bottom_link">
                <?php foreach ($bottom_statistics_links as $data): ?>
                    <li><a href="<?php echo 'https://' . $host_str . '/borst/borstArticleDetails/article_id/' . $data->article_id ?>"><?php echo $data->title ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="akteirwrapper">
            <ul class="bottom_link">
                <?php foreach ($bottom_buysell_links as $data): ?>
                    <li><a href="<?php echo 'https://' . $host_str . '/borst/borstArticleDetails/article_id/' . $data->article_id ?>"><?php echo $data->title ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="akteirwrapper">
            <ul class="bottom_link">
                <?php foreach ($bottom_kronika_links as $data): ?>
                    <li><a href="<?php echo 'https://' . $host_str . '/borst/borstArticleDetails/article_id/' . $data->article_id ?>"><?php echo $data->title ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

</div>