
<script type="text/javascript">
    $(document).ready(function () {
        $("#article_ids").html('');
<?php foreach ($articleRecord as $key => $value): ?>
            $("#article_ids").append('<?php print '<input type="hidden" name="article[]" value="' . $value . '">' ?>');
<?php endforeach; ?>
    });

</script>
<?php $month = array('01' => 'JAN', '02' => 'FEB', '03' => 'MAR', '04' => 'APR', '05' => 'MAJ', '06' => 'JUN', '07' => 'JUL', '08' => 'AUG', '09' => 'SEP', '10' => 'OKT', '11' => 'NOV', '12' => 'DEC'); ?>
<?php $article_name = "article"; ?>
<?php $host = 'http://' . sfConfig::get('app_host_name'); ?>
<table width="826"  style="border-left: 1px solid #d3d3d3; border-right: 1px solid #d3d3d3; margin-bottom:5px;" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
    <tbody>
        <tr style="width:786px;float:left">
            <td>
                <table width="786"  style="padding-left:20px;" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr style="width:786px;float:left">
                            <!-- header -->
                            <td colspan="3" style="float: left; overflow: hidden;">
                                <table width="789" border="0">
                                    <tr>
                                        <td width="180"><img src="<?php echo $host; ?>/images/new_home/BT_just_nu_head.png" width="160" style="margin: 2px 0px 6px 0px;"/></td>
                                        
                                        
                                        
                                        
                                        <td width="226"><span style="float: left; margin-top: 4px; margin-left: 2px;color: #232222;  font-family: Georgia, 'Times New Roman', Times, serif; font-size: 23px; line-height:30px; font-weight:100; letter-spacing: -0.1px;">Aktuell <br>
                                                information 
                                                <br> 
                                                från Börstjänaren</span></td>
                                                
                                              
                                      <td width="82">
                                      <table width="64" style="margin-top:0px">
                                                
                                                <tr>
                                                     <td style="margin-left:auto; margin-right:auto; background-color: #ffffff; border-top-left-radius: 6px;border-bottom-right-radius: 6px;"><div style="font-size: 44px; line-height:44px; font-family: FranklinGothicCondensed,Arial,Helvetica,sans-serif; color: #232222; font-weight:700; letter-spacing: 1px; text-align:center;"><?php echo date("d") . ' ' ?> </td>
                                                </tr>
                                                <tr>
                                                   <td height="10" style="font-size: 18px; font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif;  color: #232222;line-height: 2px; letter-spacing:1px; text-align:center; padding-top: 6px;"><?php echo date("M") == 'May' ? 'MAJ' : (date("M") == 'Oct' ? 'OKT' : strtoupper(date("M"))); ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 20px; font-family: Georgia, 'Times New Roman', Times, serif; color: #232222; font-weight:800; line-height: 18px; text-align:center; padding-top: 8px;"><?php echo ' ' . date("Y"); ?></td>
                                                </tr>
                                               
                                            </table></td>
                                        <td style="border-left: 1px solid #D3D6E1;padding: 3px 0 3px 10px;" width="148">
                                         <a href="https://https://www.thetradingaspirants.com/borst_shopshopProductDetail/product_id/20"> <img src="https://www.borstjanaren.se/uploads_ad_bt/BT_ad_HenryBoy_148x100.gif" alt="" name="Ad" width="148" height="101" id="Ad" /></a></td>
                                        <td width="148">
                                                
                                               
                                            <a href="https://https://www.thetradingaspirants.com/borst_shopshopProductDetail/product_id/20"><img src="https://www.borstjanaren.se/uploads_ad_bt/BT_ad_HenryBoy_148x100.gif" style="float:right;" alt="" name="Ad2" width="148" height="101" id="Ad2" /></a></td>
                                    </tr>
                                </table>
                          </td>
                        </tr>
                        <tr style="width:786px;float:left; ">
                            <td style="width:786px;float:left; " colspan="3">
                                <table cellpadding="0" cellspacing="0" border="0"  style="width:786px;float:left; ">
                                    <tbody>
                                    
                                        <tr style="background: #ffffff;width:786px;float:left; height: 4px; vertical-align: middle; margin-top:2px;"  >
                                            <td colspan="5" style="vertical-align: middle;">&nbsp;</td>
                                        </tr>
                                        <tr style="background: #f15822;width:786px;float:left; height:28px;  vertical-align: middle; margin-top:2px; margin-bottom:4px;"  >
                                        
                                            <td align="left" valign="middle" style="height:26px"><a href="http://www.borstjanaren.se/" style="padding-top: 3px; float:left;font-family: Arial,Helvetica,sans-serif; text-transform: uppercase; position: relative;font-size: 12px; color: #FFFFFF; font-weight: 100; letter-spacing: 0.8px; text-decoration: none; width: 156px;">&nbsp;&nbsp;Läs på webben</a></td>
                                            
                                            <td align="left" valign="middle" style="height:26px"><a href="http://www.borstjanaren.se/sbt_user/sbtNewRegistration" style="padding-top: 3px;float:left;font-family: Arial,Helvetica,sans-serif;text-transform: uppercase;position: relative;font-size: 12px; color: #FFFFFF;font-weight:normal; letter-spacing: 0.8px;  text-decoration: none; width: 133px;">Gratis konto&nbsp;&nbsp;</a></td>
                                            
                                            <td align="left" valign="middle" style="height:26px"><a href="http://www.borstjanaren.se/borst/borstSubscriber" style="padding-top: 3px;float:left;font-family: Arial,Helvetica,sans-serif;text-transform: uppercase;position: relative;font-size: 12px; color: #FFFFFF;font-weight:normal; letter-spacing: 0.8px;  text-decoration: none; width: 106px;">Portfölj&nbsp;&nbsp;</a></td>
                                            
                                            <td align="left" valign="middle" style="height:26px"><a href="http://www.borstjanaren.se/borst/borstNewsletter" style="padding-top: 3px;float:left;font-family: Arial,Helvetica,sans-serif;text-transform: uppercase;position: relative;font-size: 12px; color: #FFFFFF;font-weight:normal; letter-spacing: 0.8px;  text-decoration: none; width: 145px;">Avregistrera&nbsp;&nbsp;</a></td>
                                            
                                            <td align="left" valign="middle" style="height:26px"><a href="http://www.borstjanaren.se/borst/tipAFriendNewBt" style="padding-top: 3px;float:left;font-family: Arial,Helvetica,sans-serif;text-transform: uppercase;position: relative;font-size: 12px; color: #FFFFFF;font-weight:normal; letter-spacing: 0.8px;  text-decoration: none; width: 137px;">Tipsa en vän</a></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr><td style="height: 10px;"></td></tr>
                        <?php $img_height = 407 * count($articleRecords); ?>
                        <tr style="width:786px;float:left; overflow: hidden;">

                            <td width="350" valign="top" style="padding-right: 10px;">
                                <table width="100%" cellpadding="0" cellspacing="0" class="common_css">
                                    <tbody id="left_side" >
                                        <tr id="top_left_side" style="height: 0px;float: left;width: 465px;"><td>&nbsp;</td></tr>
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
                            <td width="576" style="border-left: 1px solid #D3D6E1;padding-left: 10px;" valign="top" bgcolor="#ffffff">
                                <table width="300px" cellpadding="0" cellspacing="0" id="right_side_div">
                                    <tr id="ads_1" style="width: 300px;float: left;">
                                        <!-- first ad-->
                                        <td id="nobj_ads_1">
                                            <span style="display: none;" class="n_article_top" >
                                                <span class="next_nobj"></span>
                                                <input type="hidden" value="<?php echo "Click to edit Ad -1" ?>" class="hidden_vals"/>
                                            </span>
                                            <span style="color: #232222; font-size: 10px; font-family: Franklin Gothic Book Regular,Arial,Helvetica,sans-serif; font-weight: normal; letter-spacing:0.8px;float: left;width: 100%; margin: -2px 0px 4px 0px;">ANNONS</span>
                                            <span><a href="http://dagensindustri.se/kampanj/borstjan/" class="simplelink" style="text-align: center;">
                                                    <span class="float_left pbottom_5 ieadj" style="  width: 100%;">
                                                        <?php echo html_entity_decode($ads[0]); ?></span></a></span>
                                                        <div style="border-bottom: 2px solid #d4dae4;height: 10px; margin: 4px 0px 5px;">&nbsp;</div>
                                        </td>
                                    </tr>

                                    <tr id="right_side_tr_bottom" style="width: 300px;float: left;padding-top: 8px;">
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
                                                            <?php include_partial("newsletter_article_template", array("article" => $left_article, "host" => $host, "side" => "right", "article_name" => $article_name, $this->article_limit => 50, $this->secondLimit => 4)); ?>
                                                        <?php endif; ?>
                                                        <?php $cnt++; ?>
                                                    <?php endforeach; ?>
                                                    <?php if (!$right_flag): ?>
                                                        <tr id="temp_right_tr" valign="top"  ><td style="width: 300px; ">&nbsp;

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
        <tr style="width:100%;">
            <td style="width:100%;">
                <br/><br/>
               <a href="<?php echo $host ?>" ><img src="<?php echo $host; ?>/images/new_home/logo_bt.png" alt="logo" width="98" style="margin: 20px 0px 5px 20px;"/></a> <br/><br/>
            
            </td>
             
        </tr>
      
    </tbody>
</table>
<table width="826" cellpadding="0" cellspacing="0">
                    <tr>
                    
                    
                    
                   
      <td colspan="3" style="float: left; color: #fff; font-size: 12px; font-family: Georgia, 'Times New Roman', Times, serif; letter-spacing: 0.5px; padding-left: 2px; width: 100%; background-color: #3d567c; padding: 7px 0px;">
                            <span style="padding-left: 7px;">© Copyright Morningbriefing Börstjänaren AB <?php echo date('Y'); ?>
</span>
</tr>
                       
</table>
<br /><br/><br /><br/><br /><br/> 

