<div class="float_left widthall">
    <!-- AddThis Button BEGIN -->
    <div class="addthis_default_style ">
    <a href="https://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button"  style="text-decoration:none;">
        <font color="#547184"><?php echo __('Dela') ?> </font>&nbsp;<img alt="strip" src="/images/smallcolorstrip.jpg" />
    </a>
    </div>
</div>
<?php /*?><div class="float_left width_270">
	<font color="#547184">Kommentera </font> 
	<a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/commentOnArticle/article_id/<?php echo $article_id; ?>"><img src="/images/chaticon_violet.jpg" alt="chaticon" /> <font color="#c50063"><?php echo $comment_cnt; ?></font></a>
	&nbsp;&nbsp;
	<?php for($i=1;$i<=$no_of_stars;$i++):?>
		<img alt="star" src="/images/ratingstar_org.png" />
	<?php endfor; ?>&nbsp;&nbsp;
	<font color="#547184">&nbsp;&nbsp;<?php echo __('Röster:')?>&nbsp;</font><font color="#c50063"><?php echo $total_vote_cnt; ?></font>
</div>
<?php */?>
<div class="float_left width_270">
    <span class="float_left sbt_vote_text"><?php echo __('Kommentera')?></span>
    <a class="float_left" href="<?php echo 'https://'.$host_str.'/sbt/commentOnArticle/article_id/'.$article_id ?>">
    <span class="float_left sbt_comment_bubble_icon">
    <img class="float_left" src="/images/chaticon_violet.jpg" alt="chaticon" />
    </span>
    </a>
    <a class="float_left" href="<?php echo 'https://'.$host_str.'/sbt/commentOnArticle/article_id/'.$article_id ?>">
    <span class="float_left mleft_3 sbt_violet_font"><?php echo $comment_cnt ? $comment_cnt : 0; ?></span>
    </a>

    <span class="float_left sbt_rating_star">
    <?php for($i=1;$i<=$no_of_stars;$i++):?>
        <img class="float_left" alt="star" src="/images/ratingstar_org.png" />
    <?php endfor; ?>
    </span>

    <span class="float_left sbt_vote_text mleft_3 ptop_3"><?php echo __('Röster')?> : <font color="#c50063"><?php echo $total_vote_cnt;?></font></span>
</div>