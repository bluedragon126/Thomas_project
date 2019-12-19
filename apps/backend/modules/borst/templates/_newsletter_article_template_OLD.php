
<?php $month = array('01' => 'JAN', '02' => 'FEB', '03' => 'MAR', '04' => 'APR', '05' => 'MAJ', '06' => 'JUN', '07' => 'JUL', '08' => 'AUG', '09' => 'SEP', '10' => 'OKT', '11' => 'NOV', '12' => 'DEC'); ?>
<?php
$upload_path = $host . "/uploads/";
$upload_path .= ( $article['name'] == $article_name ? "articleIngressImages/" : "thumbnail/");
?>
<?php $comment_url = $article['name'] == $article_name ? '/borst/commentOnBorstArticle/article_id/' : '/sbt/commentOnArticle/article_id/' ?>
<?php $link_type = $article['name'] == $article_name ? '/borst/borstArticleDetails/article_id/' : '/sbt/sbtArticleDetails/article_id/' ?>
<?php $imageType = $side == "left" ? "_large." : "_mid."; ?>
<tr id="<?php echo $article['name'] . "_" . $article['article_id'] . "_" . $side ?>">
    <td style="background: <?php echo $article['name'] == $article_name ? "#FFFFFF" : "#F8ECEE"; ?>;padding: <?php echo $side == 'right' ? '0px 15px 0px 15px' : '0px' ?>" id="nobj_<?php echo $article['name'] . "_" . $article['no'] ?>">
        <span style="display: none;" class="n_article_top" >
            <span style="visibility:hidden" class="next_nobj" ></span>
            <input type="hidden" value="<?php echo "Click to edit " . $article['name'] . "-" . $article['no'] ?>" class="hidden_vals"/>
        </span>
        <table width="<?php echo $side == 'left' ? '403px' : '239px' ?>" cellpadding="0" cellspacing="0" style="padding: <?php echo $side == 'left' ? '0px 15px 0px 15px' : '0px' ?>;">
            <tbody>

                <tr><td>
                        <a href="<?php echo $host . $link_type . $article['article_id']; ?>" style="width: <?php echo $side == 'left' ? '406px' : '239px' ?>;float:left;position: relative;">
                            <img  alt=""  src="<?php echo $upload_path . str_replace('.', $imageType, $article['image']); ?>"  style="width: <?php echo $side == 'left' ? '406px' : '239px' ?>; margin: 10px 0px 0px 0px;"/>
                        </a>
                    </td> </tr>
                <tr><td>
                        <?php $date = explode('-', substr($article['date'], 0, 10)); ?>
                        <a style="text-decoration:none;" href="<?php echo $host . $link_type . $article['article_id']; ?>">
                            <span><img style="margin: 8px 0px 0px 0px;" src="<?php echo $host; ?>/images/new_home/arrow_bt.png" alt="strip" width="44" /> </span>
                        </a>
                        <a style="text-decoration:none;" href="<?php echo $host . $link_type . $article['article_id']; ?>" >
                            <span style="font-family:Arial,Helvetica,sans-serif; color: #aaa;font-size: 0.7em;float: none;padding: 0px;"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>
                            <span style="font-family: Arial,Helvetica,sans-serif;color: #aaa;font-size: 0.7em;float: none;padding: 0px;">
                                <?php echo $article["category"] ? $article["category"] : '' ?></span>
                            <span style="font-family: Arial,Helvetica,sans-serif;color: #aaa;font-size: 0.7em;text-transform: uppercase;float: none;letter-spacing:0.1em;"><?php echo $article["type"] ? $article["type"] : '' ?></span>
                        </a>
                        <a style="text-decoration:none;" href="<?php echo $host . $comment_url . $article['article_id']; ?>" >
                            <span style='font-family: Arial,Helvetica,sans-serif;font-size: 11px;height:10px;width:14px;background-position: left center;background-repeat: no-repeat;color:<?php echo $article['name'] == $article_name ? "#21569B" : "#C50063"; ?>'>
                                <img style="margin: 8px -1px 0px 0px;" src='<?php echo $host; ?>/images/<?php echo $article['name'] == $article_name ? "chaticon" : "chaticon_violet"; ?>.jpg'/>
                                <?php echo $article["commnet"] ?></span>
                        </a>
                    </td> </tr>

                <tr><td style=" font-weight: 700; color: #232222;vertical-align: baseline; font-family: Arial,Helvetica,sans-serif;float: left;font-size: <?php echo $side == "left" ? "40px" : "20px" ?>;<?php echo $side == "left" ? "line-height: 42px;" : "" ?>margin: 0;padding-bottom: <?php echo $side == "left" ? "12px" : "5px" ?>;padding-top: 5px; position: relative;width: 100%;">
                        <a href="<?php echo $host . $link_type . $article['article_id']; ?>" style="border: 0 none;text-decoration: none;color: #232222;" >
                            <?php echo $article['title'] ?></a></td> </tr>
                <tr><td style="width:100%;float:left;font-family:Arial,Helvetica,sans-serif;color: #232222;font-size:0.9em;font-weight:400;font-style:normal;font-size-adjust:none;">
                        <img src="<?php echo $host; ?>/images/new_home/red_square.png" alt="arrow" class="home_square">
                        <a href="<?php echo $host . $link_type . $article['article_id']; ?>" style="border: 0 none;color: #232222;text-decoration: none;" >
                            <?php echo html_entity_decode($article['description']) ?></a>
                        <a href="<?php echo $host . $link_type . $article['article_id']; ?>" style="border: 0 none;color: #f15a22;text-decoration: none;font-weight:bold" > Läs mer...</a>
                    </td> </tr>
                <tr><td style="width:100%;border-bottom: 1px solid #f15a22;padding-bottom: 12px;"></td></tr>

            </tbody>
        </table>


    </td>
</tr>