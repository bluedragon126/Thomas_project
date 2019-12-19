
<script type="text/javascript">
    $(document).ready(function(){
        $("#article_ids").html('');
<?php foreach ($articleRecord as $key => $value): ?>
            $("#article_ids").append('<?php print '<input type="hidden" name="article[]" value="' . $value . '">' ?>');
<?php endforeach; ?>
        });

    </script>
<?php $month = array('01' => 'JAN', '02' => 'FEB', '03' => 'MAR', '04' => 'APR', '05' => 'MAJ', '06' => 'JUN', '07' => 'JUL', '08' => 'AUG', '09' => 'SEP', '10' => 'OKT', '11' => 'NOV', '12' => 'DEC'); ?>
<?php $article_name = "article"; ?>
<?php $host = 'http://' . sfConfig::get('app_host_name'); ?>
    <table width="745"  style="float:left;" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
        <tbody>
            <tr style="width:745px;float:left">
                <td>
                    <table width="806"  style="float:left;" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr style="width:806px;float:left">
                                <!-- header -->
                                <td colspan="3" width="806px" style="float: left; overflow: hidden; background: #21409a;">
                                  <table cellpadding="0" cellspacing="0">
                                        <tr valign="top">
                                            <td width="320px">
                                            
                                            
<img src="<?php echo $host; ?>/newsletter/newsletter_BT_top.png" style="margin: 11px 0px 5px -1px; width: 400px;">
                                            </td>
                                            
                                            <td>
												<table  width="60px" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                        <td style="padding:31px 1px 0px 0px; color: #000000;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 29px; font-weight:bold; letter-spacing: -1px; text-align:center;"> 
														
														<?php echo date("d") . ' ' ?> 
                                                        
                                                        </td></tr>
                                                        
                                                        <tr>
                                                          <td style="padding:0px 2px 0px 0px; color: #000000;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 12px; line-height:4px; font-weight:bold; text-align:center;">
														  <?php echo date("M") == 'May' ? 'MAJ' : (date("M") == 'Oct' ? 'OKT' : strtoupper(date("M"))); ?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <td style="padding:3px 2px 0px 0px; color: #000000;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 12px; line-height:13px; font-weight:bold; text-align:center;">
														  <?php echo ' ' . date("Y"); ?></td>
                                                        </tr>
                                                    </tbody>


                                                </table>
                                  </td>
                                            <!--  OMX TD -->
                                            <td width="146px" style="padding:13px 5px 0px 0px;">
                                               <span style="padding: 0px 0px 0px 8px;font-size:12px;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif; font-weight: bold;"><?php echo $sf_user->getAttribute('omxtime') ? $sf_user->getAttribute('omxtime') : date("H:i", time()) ?></span>
                                               
                                               
                                                    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="border:2px solid; border-radius:10px; border-color:ffffff">
                                                    <tr>
                                                      <td colspan="2" height="5px"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="padding:6px 0px 0px 5px;">
                                                            <img src="<?php echo $host; ?>/images/<?php echo $sf_user->getAttribute('omxArrow') ? $sf_user->getAttribute('omxArrow') : 'greenarrow_horiz.png' ?>" alt="arrow"  style="margin: -5px 4px 0px 0px"/>
                                                        </td>

                                                        <td style="padding-left: 3px; ">
                                                            <table cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td width="110px" >
                                                                        <span style="font-weight:bold;color:#5a6d89;font-family: Arial,Helvetica,sans-serif;font-size: 12px;">OMX S30</span>
                                                                    </td>

                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>
                                                                        <span style="font-weight:900;font-size:15px;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif; margin-top: 0px;"><?php echo $sf_user->getAttribute('omxVal') ? $sf_user->getAttribute('omxVal') : '&nbsp;' ?></span>
                                                                    </td>
                                                                </tr>
                                                            </table>


                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>
                                                         
                                                        </td>
                                                        <td style="padding-left: 3px; ">
                                                            <span style="font-weight:bold;color:#5e99c3;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 13px;"><?php echo $sf_user->getAttribute('omxIndexVal') ? $sf_user->getAttribute('omxIndexVal') : '&nbsp;' ?></span>
                                                             
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2" height="3px"></td>
                                                    </tr>
                                             </table>
                                </td>
                                
                                            <!--  S&P TD -->
                                            <td width="146px" style="padding: 13px 0px 0px 1px;">
                                             <span style="padding: 0px 0px 0px 8px;font-size:12px;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif; font-weight: bold;"><?php echo $sf_user->getAttribute('sptime') ? $sf_user->getAttribute('sptime') : date("H:i", time()) ?></span>
                                                <table cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="border:2px solid; border-radius:10px; border-color:ffffff">
                                                    <tr>
                                                      <td colspan="2" height="5px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:6px 0px 0px 5px;">
                                                            <img src="<?php echo $host; ?>/images/<?php echo $sf_user->getAttribute('spArrow') ? $sf_user->getAttribute('spArrow') : 'greenarrow_horiz.png' ?>" alt="arrow" style="margin: -5px 0px 0px 0px"/>
                                                            </td>
                                                        
                                                        <td style="padding-left: 5px;">
                                                            <table cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td  width="110px" >
                                                                        <span style="font-weight:bold;color:#5a6d89;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 12px;"> S&P 500</span>
                                                                    </td>
																</tr>
                                                                
                                                                <tr>
                                                                    <td>
                                                                        <span style="font-weight:900;font-size:15px;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif; margin-top: 0px;"><?php echo $sf_user->getAttribute('spVal') ? $sf_user->getAttribute('spVal') : '&nbsp;' ?></span>
                                                                    </td>
                                                                </tr>
                                                            </table>


                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td>
                                                           
                                                        </td>
                                                        
                                                        <td style="padding-left: 5px;">
                                                            <span style="font-weight:bold;color:#5e99c3;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 13px;"><?php echo $sf_user->getAttribute('spIndexVal') ? $sf_user->getAttribute('spIndexVal') : '&nbsp;' ?></span>
                                                        </td>
                                                    </tr>
                                                    
                                                     <tr>
                                                       <td colspan="2" height="3px"></td>
                                                     </tr>
                                                </table>
                                      </td>

                                            <td width="93px" style="padding: 32px 0px 0px 0px;">
                                                <a href="<?php echo $host ?>" ><img style="width: 75px; height:44px;margin-left:12px;" src="<?php echo $host; ?>/newsletter/logo.png" alt="logo" /></a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            
                            <tr style="width:745px;float:left; ">
                                <td style="width:745px;float:left; " colspan="3">
                                    <table cellpadding="0" cellspacing="0" border="0"  style="width:745px;float:left; ">
                                        <tbody>
                                        
                                            <tr style="background: #ffffff;width:806px;float:left; height:  4px; vertical-align: middle; margin-top:2px;"  >
                                       
                                            </tr>
                                            
                                            <tr style="background: #ffffff;width:806px;float:left; height:  4px; vertical-align: middle; margin-top:2px;"  >
                                              
                                            </tr>
                                            
                                            <tr style="background: #f15a22;width:806px;float:left; height:21px;  vertical-align: middle; margin-top:2px;"  >
                                                <td style="vertical-align: middle;height: 32px;">
                                                
                                                <a href="http://www.borstjanaren.se/" style="letter-spacing: 0.6px;padding-left: 10px; float:left;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;position: relative;font-size: 11px; color: #FFFFFF;font-weight:normal; letter-spacing: 1px; text-decoration: none; width: 120px;">&nbsp;LÄS PÅ WEBBEN    </a>   
                                                
                                                <a href="http://www.borstjanaren.se/sbt_user/sbtNewRegistration" style="letter-spacing: 0.6px;float:left;font-family: Arial,Helvetica,sans-serif;position: relative;font-size: 11px; color: #FFFFFF;font-weight:normal; letter-spacing: 1px;  text-decoration: none; width: 112px;">&nbsp;GRATIS KONTO    </a> 
                                                
                                                <a href="http://www.borstjanaren.se/borst/borstSubscriber" style="letter-spacing: 0.6px;float:left;font-family: Arial,Helvetica,sans-serif;position: relative;font-size: 11px; color: #FFFFFF;font-weight:normal; letter-spacing: 1px;  text-decoration: none; width: 82px;">&nbsp;PORTFÖLJ    </a> 
                                                
                                                <a href="http://www.borstjanaren.se/borst/borstNewsletter" style="letter-spacing: 0.6px;float:left;font-family: Arial,Helvetica,sans-serif;position: relative;font-size: 11px; color: #FFFFFF;font-weight:normal; letter-spacing: 1px;  text-decoration: none; width: 112px;">&nbsp;AVREGISTRERA    </a> 
                                                
                                                <a href="http://www.borstjanaren.se/borst/tipAFriendNewBt" style="letter-spacing: 0.6px;float:left;font-family: Arial,Helvetica,sans-serif;position: relative;font-size: 11px; color: #FFFFFF;font-weight:normal; letter-spacing: 1px;  text-decoration: none; width: 112px;">&nbsp;TIPSA EN VÄN    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            
                        <?php $img_height = 407 * count($articleRecords); ?>
                        <tr style="width:745px;float:left; overflow: hidden;">
                            <td  valign="top" style="width: 7px;margin: 0px;padding: 0px;">
                                <table cellpadding="0" cellspacing="0" border="0" id="left_image_table">
                                    <tbody>
                                        <?php $left_col=$right_col=0;?>
                                        <?php foreach($articleRecord as $key =>$value):?>
                                            <?php $arr_val = explode("_",$value);?>
                                            <?php $arr_val[2]=="left"?$left_col++:$right_col++?>
                                        <?php endforeach;?>
                                      <?php   $cVal = $left_col>$right_col?$left_col:$right_col;?>
                                        <?php $ccount = 0; ?>
                                       <?php $img_count = floor($cVal);?>
                                        <?php //$img_count-=($img_count%2); ?>
                                     <?php $img_count = $img_count<4? 4:$img_count;?>
                                           <?php while($img_count--):?>
                                          <tr>
                                                    <td width="2px">
                                           
                                                        
                                                        
                                                    
                                                        
                                                        
                                                        
                                                    </td>
                                                    </tr>
                                                    <?php endwhile;?>
                                                
                                     

                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="436px" valign="top" >
                                        <table width="100%" cellpadding="0" cellspacing="0" class="common_css">
                                            <tbody id="left_side" >
                                                <tr id="top_left_side" style="height: 0px;float: left;width: 436px;"><td>&nbsp;</td></tr>
                                                <!-- article -->
                                        <?php $cnt = 0; ?>
                                        <?php foreach ($articleRecord as $key => $value): ?>
                                        <?php $arr = explode("_", $value); ?>
                                        <?php if ($arr[2] == "left"): ?>
                                        <?php $left_article = $articleRecords[$cnt]; ?>
                                        <?php include_partial("newsletter_article_template", array("article" => $left_article, "host" => $host, "side" => "left", "article_name" => $article_name)); ?>
                                        <?php endif; ?>
                                        <?php $cnt++; ?>
                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="300px" style="border-left: 1px solid #D3D6E1; border-right: 1px solid #D3D6E1;" valign="top" bgcolor="#ffffff">
                                                <table cellpadding="0" cellspacing="0" id="right_side_div">
                                                    <tr id="ads_1" style="width: 238px;padding: 0px 15px;float: left;">
                                                        <!-- first ad-->
                                                        <td id="nobj_ads_1">
                                                            <span style="display: none;" class="n_article_top" >
                                                                <span class="next_nobj"></span>
                                                                <input type="hidden" value="<?php echo "Click to edit Ad -1" ?>" class="hidden_vals"/>
                                                            </span>
                                                            <p style="color: #68778b; font-size: 13px;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-weight: 300;margin: 0px; letter-spacing: 0px; padding: 10px 0px 3px 0px; font-weight:bold; letter-spacing: 1px;">ANNONS</p>
                                                            <span><a href="http://dagensindustri.se/kampanj/borstjan/" class="simplelink" style="text-align: center;">
<span class="float_left pbottom_5 ieadj" style="  width: 100%;">
<?php echo html_entity_decode($ads[0]); ?></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr style="width: 238px;padding: 0px 15px;float: left;">
                                                            <!-- forum post -->
                                                            <td>
                                                                <table cellpadding="0" cellspacing="0" width="240">
                                                                    <tr>
                                                                        <td>
                                                                        <a href="http://www.borstjanaren.se/forum/forumHome" title="BT-FORUM"><img style="margin: 11px 0px 0px 0px;" src="<?php echo $host; ?>/newsletter/forumlogo.png" alt="BT-FORUM"/></a>
<p style="padding: 3px 0px 6px 0px;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 17px; color: #232222;font-weight:normal; margin: 7px 0px -4px 0px;">Aktuella Forumtrådar</p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr><td><ul style="color: #5589ad;list-style-position: outside;margin: 0; padding-left: 15px;width: 225px;" >
                                                            <?php foreach ($forum_post as $post): ?>

                                                                                    <li style="color: #232222;width: 225px;line-height: 16px;">
                                                                                        <a style="word-wrap:break-word;width: 225px;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif; color: #232222; text-decoration: none; font-size: 13px;" href=<?php echo $host . '/forum/commentOnForumTopic/forumid/' . $post->id; ?>><?php echo $post->rubrik ?></a>
                                                                                    </li>

                                                            <?php endforeach; ?>
                                                                                </ul>
                                                                                 
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                    </tr>
                                                    
                                                    <tr style="width: 238px;padding: 0px 15px;float: left;">
                                                                <td style="width:100%;padding: 6px 0px 5px 0px;">

                                                                    <img width="300px" style="margin: 6px 0px 0px 0px;" src="<?php echo $host ?>/newsletter/senaste_artiklar.png" alt="" />

                                                                </td>
                                                     </tr>
                                                     
                                                     <tr style="width: 238px;padding: 0px 15px;float: left;">
                                                                <!-- latest BT article  -->
                                                                <td>
                                                                    <ul style="padding-left: 15px; width: 225px;padding-bottom: 2px;color: #232222; list-style-position: inside;margin: 0;  font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;">
                                                <?php $link_type = '/borst/borstArticleDetails/article_id/'; ?>
                                                <?php foreach ($btList as $data): ?>
                                                                                        <li style="color: #232222;list-style-position: outside;width: 225px; line-height: 14px;"><a style="word-wrap:break-word;width: 225px;color: #232222; text-decoration: none; font-size: 12px;" href="<?php echo $host . $link_type . $data->article_id ?>"><?php echo $data->title; ?></a></li>
                                                <?php endforeach; ?>
                                                                                   </ul>
                                                                                   
                                                                                </td>
                                                     </tr>
                                                    
                                                     
                                                     <tr id="blog_1" style="width: 238px;padding: 0px 15px;float: left;">
                                                        <!-- popular bloggar -->
                                                        <td id="nobj_blog_" >
                                                            <span style="display: none;" class="n_article_top" >
                                                                <span style="visibility:hidden" class="next_nobj" ></span>
                                                                <input type="hidden" value="<?php echo "Click to edit Blog" ?>" class="hidden_vals"/>
                                                            </span>
                                                            
                                                            
                                                            
                                                            <table style="width: 238px;height: 220px;" cellpadding="0" cellspacing="0" border="0" >

                                                                <!-- top bloggar view -->
                                                                <tr>
                                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                                    <td>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    <p>
                                                                    
                                                               
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    <p><img style="margin: 13px 0px 0px -12px;" src="<?php echo $host; ?>/newsletter/newsletter_streck1.png" alt="streck"/></p>
                                                                    
                                                                    
                                                                    <p><img style="margin: 0px 0px 12px -12px;" src="<?php echo $host; ?>/newsletter/nybloggat.png" alt="nybloggat"/></p></td>

                                                                </tr>
                                                                
                                                                
                                                                <tr style="background: #fadbd9;"><td style="width: 6px;">&nbsp;</td><td></td><td style="width: 10px;">&nbsp;</td></tr>

                                                                <tr style="background: #fadbd9;">
                                                                    <td style="width: 6px;">&nbsp;</td>
                                                                    <td valign="top" style='padding: 0 2px;width: 200px; float: left;' >
                                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                            <tr style="width: 200px;float:left;height: 52px;padding-bottom: 4px;">
                                                                                <td valign="top" style="float: left;width: 52px;height: 52px;">
                                                                    <?php if ($popular_blog->author_id != '' && $profile_photo->profile_photo_name != ''): ?>
                                                                        <a style="text-decoration: none;color: #272a31;" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/sbt/sbtMinProfile/id/' ?><?php echo $popular_blog->author_id; ?>"><img src="<?php echo $host; ?>/uploads/userThumbnail/<?php echo str_replace('.', '_semilarge.', $profile_photo->profile_photo_name); ?>" alt="Thumb Image" /></a>
                                                                    <?php else: ?>
                                                                            <a style="text-decoration: none;" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/sbt/sbtMinProfile/id/' ?><?php echo $popular_blog->author_id; ?>"><img src="<?php echo $host; ?>/images/small_userphoto.jpg" alt="photo"  /></a>
                                                                    <?php endif; ?>
                                                                        </td>
                                                                        
                                                                        <td valign="top" style="width: 80px; padding-left: 5px;"><?php $profile = new SfGuardUserProfile(); ?>
                                                                            <p style="margin: 0px">
                                                                                <a style="text-decoration: none;" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/sbt/sbtMinProfile/id/' . $popular_blog->author_id; ?>">
                                                                                    <span style="font-size: 11px; line-height: 11px; color: #5589ad;font-weight: bold;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;"><?php echo $profile->getFullUserName($popular_blog->author_id) ?></span>
                                                                                </a>
                                                                            </p>

                                                                            <span style="font-size: 11px; line-height: 13px;color: #7E99BC;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;"><?php echo substr($popular_blog->created_at, 0, 10); ?></span>

                                                                        </td>
                                                                        <td>
                                                                            <img style="margin: 0px 0px 0px 20px;" src="<?php echo $host; ?>/images/blog_bubble.png">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            
                                                            <td style="width: 10px;">&nbsp;</td>
                                                        </tr>
                                                        <!-- middle bloggar view -->
                                                        <tr style="background: #21409a;">
                                                            <td style="width: 6px;">&nbsp;</td>
                                                            <td style='padding: 0 2px;width: 186px; float: left;'>
                                                                <a style="text-decoration: none;" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/sbt/sbtBlogDetails/blog_id/' . $popular_blog->id; ?>">
                                                                    <span style="padding:5px 0px 5px 0px;color: #D04373;float: left;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 12px;font-weight: bold; height: 10px;overflow-y: hidden;position: relative;text-align: left;text-decoration: none;width: 170px;word-wrap: break-word;"><?php echo $popular_blog->ublog_title; ?></span>
                                                                </a>
                                                            </td>
                                                            
                                                            <td style="width: 10px;">&nbsp;</td>
                                                        </tr>
                                                        <!-- bottom bloggar view -->
                                                        <tr style="background: #fadbd9;">
                                                            <td style="width: 6px;">&nbsp;</td>
                                                            <td style='padding: 0 2px;width: 186px; float: left;">
                                                                <a style="max-height: 150px;overflow: hidden;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 11px; text-decoration: none;color: #272a31;" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/sbt/sbtBlogDetails/blog_id/' . $popular_blog->id; ?>">
                                                            <?php
                                                                            $search = array('<p', '</p>');
                                                                            $replace = array('<span', '</span>');
                                                                            $regex = "/<\/?\w+((\s+(\w|\w[\w-]*\w)(\s*=\s*(?:\".*?\"|'.*?'|[^'\">\s]+))?)+\s*|\s*)\/?>/i";
                                                                            $str_without_tags = trim(preg_replace($regex, "", html_entity_decode($popular_blog->ublog_description)));
                                                                            $blogdetails = SbtUserBlog::filterMyStringBlack(html_entity_decode($popular_blog->ublog_description));
                                                                            $word_arr = str_word_count($str_without_tags, 1); // all words from string with no tags
                                                                            if (count($word_arr) > 5) { // if words are more than 50, needs to cut the blog
                                                                                $strpos1 = strpos($blogdetails, $word_arr[19]);
                                                                                $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[19]));
                                                                                $str_no_tag = preg_replace($regex, "", $str); // matching string with no tags
                                                                                if (str_word_count($str_no_tag) < 12) {
                                                                                    $strpos1 = strpos($blogdetails, $word_arr[18]);
                                                                                    $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[18]));
                                                                                    $str_no_tag = preg_replace($regex, "", $str);
                                                                                }
                                                                                if (str_word_count($str_no_tag) < 12) {
                                                                                    $strpos1 = strpos($blogdetails, $word_arr[17]);
                                                                                    $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[17]));
                                                                                    $str_no_tag = preg_replace($regex, "", $str);
                                                                                }
                                                                                $shortDesc = substr($blogdetails, 0, $strpos1) . "</b>";
                                                                                $shortDesc = str_replace($search, $replace, $shortDesc);
                                                                            } else {
                                                                                $shortDesc = $blogdetails;
                                                                                $shortDesc = str_replace($search, $replace, $shortDesc);
                                                                            }
                                                                            $shortDesc = preg_replace("/<img[^>]+\>/i", "", $shortDesc);

                                                                            $shortDesc = sbtUserBlog::closeTags($shortDesc);
                                                                            $pos = 0;
                                                                            while ($pos < strlen($shortDesc)) {
                                                                                $firstString = substr($shortDesc, strpos($shortDesc, "object", $pos));
                                                                                $firstString = substr($shortDesc, strpos($shortDesc, "embed", $pos));
                                                                                $tempstr = $firstString;
                                                                                $newString = NewsLetterTable::getStringBetween($firstString, 'width="', '"');
                                                                                if ($newString) {
                                                                                    $tempstr = str_replace($newString, "200", $tempstr);
                                                                                    $shortDesc = str_replace($firstString, $tempstr, $shortDesc);
                                                                                }
                                                                                $newString = NewsLetterTable::getStringBetween($firstString, 'height="', '"');
                                                                                if ($newString) {
                                                                                    $tempstr = str_replace($newString, "150", $tempstr);
                                                                                    $shortDesc = str_replace($firstString, $tempstr, $shortDesc);
                                                                                }
                                                                                $pos++;
                                                                            }
                                                            ?>
                                                            <?php //$shortDesc = SbtUserBlogTable::shortBlogDescription($popular_blog->ublog_description); ?>

                                                            <?php echo $shortDesc; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td style="width: 10px;">&nbsp;</td>
                                                                </tr>
                                                                <tr style="background: #fadbd9;">
                                                                    <td style="width: 10px;">&nbsp;</td>
                                                                    <td style='padding: 0 2px;width: 186px; float: left;'>
                                                                        <a style="text-decoration: none;" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/sbt/sbtBlogDetails/blog_id/' . $popular_blog->id; ?>" >
                                                                            <span style="padding-top: 5px;color: #D04373;float: left;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-size: 12px;font-weight: bold;height: 29px;overflow-y: hidden;position: relative;text-align: left;text-decoration: none;width: 170px;word-wrap: break-word;"><?php echo 'Läs mer >'; ?></span>
                                                                        </a>
                                                                    </td>
                                                                    <td style="width: 10px;">&nbsp;</td>
                                                                </tr>

                                                                
                                                               

                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr style="width: 238px;padding: 0px 15px;float: left;">
                                                        <!-- blog post -->
                                                        <td>
                                                            <table cellpadding="0" cellspacing="0" width="240">
                                                                <tr>
                                                                    <td>
                                                                        <img style="margin: 13px 0px 8px 0px;" src="<?php echo $host; ?>/newsletter/bloggat2.png" alt="bloggat"/>
                                                                    </td>
                                                                </tr>
                                                                <tr><td><ul style="color: #5589ad; list-style-position: outside;margin: 0; padding-left: 15px; width: 225px;" >
                                                            <?php foreach ($blog_post as $post): ?>

                                                                                <li style="color: #5589ad; width:225px;line-height: 19px;">
                                                                                    <a style="word-wrap:break-word;width: 225px;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif; color: #5589ad ;text-decoration: none;" href="<?php echo $host . '/sbt/sbtBlogDetails/blog_id/' . $post->id; ?>"><?php echo $post->ublog_title ?></a>
                                                                                </li>
                                                            <?php endforeach; ?>
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    
                                                                                                        
                                                     <tr style="padding: 0px 15px;float: left;">
                                                       <td><img style="margin: 13px 0px 4px 0px;" src="<?php echo $host; ?>/newsletter/newsletter_streck1.png" alt="streck"/>
                                                     </tr>
                                                     <tr id="ads_2" style="width: 238px;padding: 0px 15px;float: left;">
                                                                <!-- second ad-->
                                                                <td id="nobj_ads_2">
                                                                    <span style="display: none;" class="n_article_top" >
                                                                        <span style="visibility:hidden" class="next_nobj" ></span>
                                                                        <input type="hidden" value="<?php echo "Click to edit Ad -2" ?>" class="hidden_vals"/>
                                                                    </span>
                                                                    <p style="color: #68778b; font-size: 13px;font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;font-weight: 300;margin: 0px; letter-spacing: 0px; padding: 5px 0px 3px 0px; font-weight:bold; letter-spacing: 1px;">ANNONS</p>
                                                                    <span><?php echo html_entity_decode($ads[1]); ?></span><br/>
                                                                    
                                                                    <img style="margin: 15px 0px 10px 0px;" src="<?php echo $host; ?>/newsletter/newsletter_streck1.png" alt="streck"/>
                                                                </td>
                                                     </tr>
                                                                                                         
                                                     <tr id="right_side_tr_bottom" style="width: 270px;">
                                                                                <td>
                                                                            <table cellpadding="0" cellspacing="0" border="0" style="min-height: 100px;float:left" width="240" class="common_css">
                                                                                <tbody id="right_side" style="float: left;height: 100%;position: relative;" >

                                            <?php $cnt = 0; ?>
                                            <?php $right_flag = false; ?>
                                            <?php foreach ($articleRecord as $key => $value): ?>
                                            <?php $arr = explode("_", $value); ?>
                                            <?php if ($arr[2] == "right"): ?>
                                            <?php $right_flag = true; ?>
                                            <?php $left_article = $articleRecords[$cnt]; ?>
                                            <?php include_partial("newsletter_article_template", array("article" => $left_article, "host" => $host, "side" => "right", "article_name" => $article_name)); ?>
                                            <?php endif; ?>
                                            <?php $cnt++; ?>
                                            <?php endforeach; ?>
                                            <?php if (!$right_flag): ?>
                                                                                                    <tr id="temp_right_tr" valign="top"  ><td style="width: 238px; ">&nbsp;
                                                                                                            
                                                                                                        </td></tr>
                                            <?php endif; ?>
                                                                                                </tbody>
                                                                                            </table>
                                                                                </td>
                                                     </tr>
                                                                        </table>
                              </td>



                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        </td>
                                                        </tr>
                                                        <tr style="width:745px;float:left">
                                                            <td style="width:745px;float:left">
                                                                <table width="745"  style="float:left;" cellpadding="0" cellspacing="0">
                                                                    <tr ><td colspan="3" style="width:'8065px';">
                                                                    
                                                                   
                                                                            <img width="806px" style="margin: 20px 0px 120px 0px;" src ="<?php echo $host ?>/newsletter/newsletter_footer.png"/>
             
                </td></tr>
        </table>
    </td>
</tr>
</tbody>
</table>


