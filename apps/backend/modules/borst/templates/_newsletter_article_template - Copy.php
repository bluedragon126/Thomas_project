
<?php $month = array('01' => 'JAN', '02' => 'FEB', '03' => 'MAR', '04' => 'APR', '05' => 'MAJ', '06' => 'JUN', '07' => 'JUL', '08' => 'AUG', '09' => 'SEP', '10' => 'OKT', '11' => 'NOV', '12' => 'DEC'); ?>
<?php
$upload_path = $host . "/uploads/";
$upload_path .= ( $article['name'] == $article_name ? "articleIngressImages/" : "thumbnail/");
?>
<?php $comment_url = $article['name'] == $article_name ? '/borst/commentOnBorstArticle/article_id/' : '/sbt/commentOnArticle/article_id/' ?>
<?php $link_type = $article['name'] == $article_name ? '/borst/borstArticleDetails/article_id/' : '/sbt/sbtArticleDetails/article_id/' ?>
<?php $imageType = $side == "left" ? "_large." : "_mid."; ?>
<tr id="<?php echo $article['name'] . "_" . $article['article_id'] . "_" . $side ?>">
    <td style="background: <?php echo $article['name'] == $article_name ? "#FFFFFF" : "#F8ECEE"; ?>;padding: <?php echo $side == 'right' ? '0px' : '0px' ?>" id="nobj_<?php echo $article['name'] . "_" . $article['no'] ?>">
        <span style="display: none;" class="n_article_top" >
            <span style="visibility:hidden" class="next_nobj" ></span>
            <input type="hidden" value="<?php echo "Click to edit " . $article['name'] . "-" . $article['no'] ?>" class="hidden_vals"/>
        </span>
        <table width="<?php echo $side == 'left' ? '465' : '300' ?>" cellpadding="0" cellspacing="0" style="padding: <?php echo $side == 'left' ? '0px' : '0px' ?>;">
            <tbody>

                <tr><td valign="top">
                        <a href="<?php echo $host . $link_type . $article['article_id']; ?>" style="width: <?php echo $side == 'left' ? '465px' : '300px' ?>;">
                            <img alt=""  src="<?php echo $upload_path . str_replace('.', $imageType, $article['image']); ?>"  style="width: <?php echo $side == 'left' ? '465px' : '300px' ?>;"/>
                        </a>
                        <table cellpadding="0" cellspacing="0" style=" width:100%; height: 14px; background-color: #e2e5e8;border-bottom-right-radius: 30px; margin: 0px 0px 14px 0px; padding: 6px 2px 5px 4px;">
                            <tr>
                                <td>
                                    <?php $date = explode('-', substr($article['date'], 0, 10)); ?>
                                    <a style="text-decoration:none;" href="<?php echo $host . $link_type . $article['article_id']; ?>">
                                        <span><img style="margin: 0px 3px 0px 1px;" src="<?php echo $host; ?>/images/new_home/arrow_bt_just_nu.png" alt="strip" width="50"/> </span></a>

                                    <a style="text-decoration:none;" href="<?php echo $host . $link_type . $article['article_id']; ?>" >
                                        <span style="font-family:Franklin Gothic Book Regular,Arial,Helvetica,sans-serif; color: #577383;font-size: 11px; font-weight: 300; float: none;padding: 0px; letter-spacing:0.2px;"><?php echo $date[2] . ' ' . $month[$date[1]] ?></span>

                                        <span style="font-family: Georgia, 'Times New Roman', Times, serif;color: #577383;font-size: 12px; font-weight: 700; float: none; margin-right: 2px;">
                                            <?php echo $article["category"] ? $article["category"] : '' ?></span>

                                        <span style="font-family:Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;color: #577383;font-size: 11px;text-transform: uppercase; font-weight: 300; float: none;letter-spacing:1px;"><?php echo $article["type"] ? $article["type"] : '' ?></span>
                                    </a>

                                    <a style="text-decoration:none;" href="<?php echo $host . $comment_url . $article['article_id']; ?>" >
                                        <span style='font-family: font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif; font-size: 11px;height:10px;width:14px;background-position: left center;background-repeat: no-repeat;color:<?php echo $article['name'] == $article_name ? "#21569B" : "#C50063"; ?>'></span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td> </tr>

                <tr><td style="font-weight: 700; letter-spacing:-0.7px; color: #232222;vertical-align: baseline; font-family: Georgia, 'Times New Roman', Times, serif; float: left;font-size: <?php echo $side == "left" ? "35px" : "22px" ?>;<?php echo $side == "left" ? "line-height: 42px;" : "line-height: 28px;" ?>margin: 0;padding-bottom: <?php echo $side == "left" ? "12px" : "2px" ?>;padding-top: 2px; position: relative;width: 100%;">

                        <a href="<?php echo $host . $link_type . $article['article_id']; ?>" style="border: 0 none;text-decoration: none;color: #232222;" >
                            <?php echo $article['title'] ?></a></td> </tr>

                <tr>
                    <td style="width:100%;float:left;font-family: Georgia, 'Times New Roman', Times, serif;color: #232222;font-size: <?php echo $side == "left" ? "17px" : "15px" ?>;font-weight:300; line-height:<?php echo $side == "left" ? "23px" : "22px" ?>;font-style:normal;font-size-adjust:none;">

                        <img style="margin: <?php echo $side == "left" ? "-12px 2px 0px 0px" : "-2px 1px 0px 0px" ?>; vertical-align:-2;" src="<?php echo $host; ?>/images/new_home/btjn_square.png" width="<?php echo $side == "left" ? "13" : "10" ?>" height="<?php echo $side == "left" ? "28" : "24" ?>"alt="fig">
                        <a href="<?php echo $host . $link_type . $article['article_id']; ?>" style="border: 0 none;color: #232222;text-decoration: none;" >
                            <?php echo html_entity_decode($article['description']) ?></a>

                        <a href="<?php echo $host . $link_type . $article['article_id']; ?>" style="border: 0 none;color: #f15a22;text-decoration: none;font-size: <?php echo $side == "left" ? "15px" : "13px" ?>; font-family: Georgia, 'Times New Roman', Times, serif; font-weight:700; letter-spacing:0.1px;" ><i>Läs mer</i></a>
                        <br/> <br/>
                      <div style="border-bottom: 4px solid #cad1d8;height: 8px; margin-bottom:6px;">&nbsp;</div>
                     
                    </td> </tr>
                <tr><td style="height: 3px;"></td></tr>     
                <tr><td>
                        
                    </td></tr>
                <tr><td style="height: 3px;"></td></tr>
            </tbody>
        </table>
    </td>
</tr>