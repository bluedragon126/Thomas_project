<?php use_stylesheet('custom-theme/jquery-ui-1.8.2.custom_sbt.css');?>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        var take_to_profile = $('#take_to_profile').val();
        if(take_to_profile == 1) $('#sbtMinProfileMyAccount').trigger('click');
    });
	
	function sortingPopUp(obj){
        $(obj).prev().toggle();
    }
    function paginationPopupForumGo(obj){  
        var column_id = $('#column_id').val();	
        var parent_id = $('#parent_id').val();	
        var user_id = $('#current_user').val();
        var page = $(obj).prev().val();
        var current_column_order = $('#useronlyforum_list_current_column_order').val();	
		
        $('#profile_useralldata_forum_list_table').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });
		
        var pagination_numbers = $('#useronlyforum_list_listing').html();
        $('#useronlyforum_list_listing').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
	
        $.post("/sbt/getSbtMinProfileOnlyForumPost?column_id="+column_id+'&id='+user_id+"&page="+page+'&parent_id='+parent_id+'&useronlyforum_list_current_column_order='+current_column_order, function(data){
            $('#profile_data_container').html(data);

            setSearchOrderImageForAll('sortby_'+column_id,current_column_order,parent_id);
        });
    }
    
     function paginationPopup(obj){
        var offset = $(obj).position();
        $(obj).next().css("left",offset.left-68);
        var obj1 = $(".forum_drop-down-menu_page");
        if($(obj1).val()==0){
            $(obj1).removeClass("color232222");
            $(obj1).addClass("colorb9c2cf");
        }else{
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color232222");
        }
        $(obj).next().toggle();
    }

    function paginationPopupSelect(obj){
        if($(obj).val()==0){
            $(obj).removeClass("color232222");
            $(obj).addClass("colorb9c2cf");
        }else{
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color232222");
        }
    }
</script>
<style>
    .blogleft_divpart{border-right: 1px solid #d3d6e1;
    float: left;
    height: auto;
    position: relative;
    width: 311px;
    }
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
</style>
<div class="maincontentpage" id="minsid">
	<?php if($user_id): ?>
        <div class="mainconetentinner">
          <?php /*?><div class="minsid_topwrapper">
          <div class="minprofile_heading">
            <h1 class="minsid_heading widthall"><font  color="#d9dadb"><?php echo $user_profile->getFullUserName($user_data->user_id) ?></font></h1>
          </div>
          <div class="editprofile_links">
            <?php if($show_top_links == 1):?>
				<div class="profilelink"> <!--<a href="#">Mina sidor | </a> -->
                <?php //if($user_data->from_sbt == 1 && $user_data->sbt_active == 1):?>
                	<?php /*?><a href="http://<?php echo $host_str?>/sbt/editBlogProfile/edit_user_id/<?php echo $user_id ?>">Editera Blog profil | </a><?php */?>
                <?php //endif; 
                /*?>
                <a href="http://<?php echo $host_str?>/sbt/editProfile/edit_user_id/<?php echo $user_id ?>">Editera profil</a> </div>
			<?php endif; ?>
          </div>
          </div><?php */?>
          <div class="blogleft_divpart">
			<?php include_partial('global/profile_left_top',array('user_data'=>$user_data,'data_arr'=>$data_arr,'host_str'=>$host_str,'user_id'=>$user_id,'friendRequestForm'=>$friendRequestForm,'is_friend_request'=>$is_friend_request,'friend_id'=>$friend_id,'friend_name'=>$friend_name,'show_top_links'=>$show_top_links,'visitor_name_id_arr'=>$visitor_name_id_arr,'gold_cnt'=>$gold_cnt,'silver_cnt'=>$silver_cnt,'bronze_cnt'=>$bronze_cnt,'user_guard_data'=>$user_guard_data,'user_profile'=>$user_profile,'own_profile'=>$own_profile,'edit_mode'=>$edit_mode,'user_photo_data'=>$user_photo_data,'user_photo_arr'=>$user_photo_arr,'isSuperAdmin'=>$isSuperAdmin,'user_details'=>$user_details)) ?>
            <div class="minsid_lefttopdiv_banner">&nbsp;</div>
            <?php include_partial('global/profile_left_bottom',array('ad_1'=>$ad_1,'ad_2'=>$ad_2,'set_margin'=>'1','ad_3'=>$ad_3,'ad_4'=>$ad_4)) ?>
          </div>
          <div class="minsid_rightdiv">
            <div class="curverect_topbg"></div>
            <div class="curverect_midbg">
              <div class="midsi_inner_tab">
                <?php include_partial('global/profile_menu',array('host_str'=>$host_str,'user_id'=>$user_id,'action'=>$action,'show_top_links'=>$show_top_links)) ?>
              </div>
            </div>
            <div class="curverect_bottombg"></div>
            <div class="curverect_topbg"></div>	
            <div class="curverect_midbg">
              <div class="midsi_inner">	
                <input type="hidden" name="current_user" id="current_user" value="<?php echo $user_id ?>"/>
				<input type="hidden" name="is_logged_in_user" id="is_logged_in_user" value="<?php echo $is_logged_in_user ?>"/>
				<div class="om_miginfo" id="profile_data_container">
                                    
				<?php if($update_msg):?>
                                        <div class="float_left widthall" style="border:1px solid #00CC33; margin-bottom:10px; padding:5px;"><font color="#00CC33"><?php echo $update_msg; ?></font></div>
				<?php endif; ?>
                                    <div id="friend_req_msg" class="float_left widthall" style="border:1px solid #00CC33; margin-bottom:10px; padding:5px; color:#00CC33; display:none; visibility:hidden;"></div>
                                
                                    <div class="blog_prof_detail">
                                        <div class="basfakta_detail widthall">
                                            <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Basfakta</div>
                                            <span class="prof_a">Ålder:</span>
                                            <span class="prof_q"><?php echo $data_arr['user_age'] ?></span><br/>

                                            <?php $my_occ = explode(':', $user_details->my_occupation); ?>
                                            <?php
                                            if ($my_occ[0] == 'other')
                                                $occ = $my_occ[1];
                                            else
                                                $occ = $occupation_arr[$my_occ[0]];
                                            ?>
                                            <span class="prof_a">Sysselsättning:</span>
                                            <span class="prof_q"><?php echo $occ ?></span><br/>
                                            <span class="prof_a">När jag inte är på börsen... </span>
                                            <span class="prof_q"><?php echo $user_details->not_on_stock ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="trejdingprofil_detail widthall">
                                        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Trejdingprofil</div>
                                        <span class="prof_a">Typ av spekulant:</span>
                                        <span class="prof_q"><?php echo ucfirst($type_investor_arr[$user_details->type_of_speculator]) ?></span><br/>

                                        <span class="prof_a">Vilken mäklare använder du?</span>
                                        <span class="prof_q"><?php echo ucfirst($user_details->broker_used) ?></span><br/>

                                        <span class="prof_a">Vad handlar du?</span>
                                        <span class="prof_q"><?php echo $my_trade; ?></span><br/>

                                        <span class="prof_a">Storlek på portfölj:</span>
                                        <span class="prof_q"><?php echo $is_millionaire[$user_details->is_millionaire] ?></span><br/>

                                        <span class="prof_a">Mina fem bästa rekar:</span>
                                        <span class="prof_q"><?php echo str_replace(',', ' , ', $user_details->my_five_best_recommendations) ?></span><br/>

                                        <span class="prof_a">Min blankningslista:</span>
                                        <span class="prof_q"><?php echo str_replace(',', ' , ', $user_details->my_shortlist) ?></span><br/>

                                        <span class="prof_a">Min bästa affär:</span>
                                        <span class="prof_q"><?php echo $user_details->my_best_trade ?></span><br/>

                                        <span class="prof_a">Min sämsta affär:</span>
                                        <span class="prof_q"><?php echo $user_details->my_worst_trade ?></span><br/>
                                    </div>
                                    
                                    <div class="med_egna_ord_detail widthall">
                                        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Med egna ord</div>
                                        <span class="prof_q"><?php echo html_entity_decode($user_details->my_own_writing) ?></span><br/>
                                    </div>
                                    
                                    <!--<div class="trejdingprofil_detail widthall">
                                        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Signature</div>
                                        <span class="prof_q"><?php  $signiture = $user_profile->getUserData($user_data->user_id)->signature; echo $signiture; ?></span><br/>
                                    </div>
                                    
                                    <div class="trejdingprofil_detail widthall">
                                        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Tipsa en vän</div>
                                        <span class="prof_q">
                                            <div class="addthis_default_style ">
                                                <a href="http://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button"  style="text-decoration:none;">
                                                    <font color="#547184"><?php echo __('Dela') ?> </font>&nbsp;<img alt="strip" src="/images/smallcolorstrip.jpg" />
                                                </a>
                                            </div>
                                        </span><br/>
                                    </div>-->
                                    
                                    <div class="denna_sida_detail widthall">
                                        <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Denna sida:</div>
                                        <span class="prof_q"><a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user_id ?>" class="viocolor"><?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $user_id ?></a></span><br/>
                                    </div>
                                    
                                    <div class="statistik_detail widthall">
                                            <div class="prof_subheader widthall mrg_btm_10 mrg_top_30">Statistik</div>
                                            <div class="blog_prof_stat widthall">Poster totalt:</div>
                                            <span class="prof_a">Antal poster:</span>
                                            <span class="prof_q">
                                                <?php
                                                $votes = $user_profile->getTotalActivitiesOfUser($user_data->user_id, $user_data->firstname . ' ' . $user_data->lastname);
                                                echo $votes;
                                                ?>
                                            </span><br/>
                                            <span class="prof_a">Antal poster per dag:</span>
                                            <span class="prof_q">                    <?php
                                            $days = (strtotime(date("Y-m-d")) - strtotime(substr($user_data->regdate))) / (60 * 60 * 24);
                                            $ratio = $votes / $days;
                                            echo number_format($ratio, 4);
                                                ?>
                                            </span><br/>
                                            <!--<div class="blog_prof_stat widthall mrg_top_30">Besöksmeddelanden</div>
                                                
                                            <span class="prof_a">Antal besöksmeddelanden:</span>
                                            <span class="prof_q"><?php echo $message_cnt ?></span><br/>
                                                
                                            <span class="prof_a">Senaste meddelande:</span>
                                            <span class="prof_q"><?php
                                            if ($last_message->created_at)
                                                echo date("D j M Y", strtotime($last_message->created_at));
                                            else
                                                echo '-';
                                                ?>
                                            </span><br/>-->
                                            <?php //if ($is_logged_in_user != 1): ?>
                                                
                                                <!--<span class="prof_a">Antal besöksmeddelanden:</span>
                                                <span class="prof_q"><a id="post_message" class="viocolor" href="#">Skicka meddelande till <?php echo $user_profile->getFullUserName($user_id); ?></a></span><br/>-->
                                            <?php //endif; ?>
                                    </div>
                                    
                                    <div class="statistik_detail widthall">
                                            <div class="blog_prof_stat widthall mrg_top_30">Blogg</div>
                                            <span class="prof_q"><a class="main_link_color cursor" href="<?php echo 'http://' . $host_str . '/sbt/showListOfUserBlog/uid/' . $user_data->user_id ?>"><?php echo 'Visa alla blogbesök till ' . $user_profile->getFullUserName($user_id); ?></a></span><br/>
                                    </div>
                                            
                                    <div class="blogg_detail widthall">
                                        <div class="blog_prof_stat widthall mrg_top_30">Generell information</div>
                                        <span class="prof_a">Senaste aktivitet:</span>
                                        <span class="prof_q">
                                            <?php if ($user_data->inlogdate == '0000-00-00 00:00:00'): ?>
                                                <?php echo '-' ?>
                                            <?php else: ?>
                                                <?php echo substr($user_data->inlogdate, 0, 10) ?>, <?php echo substr($user_data->inlogdate, 11, 5) ?>
                                            <?php endif; ?>
                                        </span><br/>
                                        <span class="prof_a">Medlem sedan:</span>
                                        <span class="prof_q"><?php echo substr($user_data->regdate, 0, 10) ?></span><br/>
                                    </div>
                                    
                            <?php /*?>    
                <table width="100%"  border="0" cellspacing="3" cellpadding="0" class="om_miginfotable">
				  <tr>
					<td class="heading" colspan="2" >Basfakta</td>
				  </tr>
				  <tr>
					<td class="padtop_5" width="30%">Ålder:</td>
					<td class="viocolor"><?php echo $data_arr['user_age'] ?></td>
				  </tr>
				  <?php $my_occ = explode(':',$user_details->my_occupation);?>
				  <?php 
				  if ($my_occ[0] == 'other') $occ = $my_occ[1];
				  else $occ = $occupation_arr[$my_occ[0]]; 
				  ?>
				  <tr>
					<td>Sysselsättning:</td>
					<td class="viocolor"><?php echo $occ ?></td>
				  </tr>
				  <tr>
					<td>När jag inte är på börsen... </td>
					<td  class="viocolor"><?php echo $user_details->not_on_stock ?></td>
				  </tr>
				  <!--<tr>
					<td>Hemort: </td>
					<td  class="viocolor"><?php //echo ucfirst($user_data->street) ?> , <?php //echo ucfirst($user_data->city) ?></td>
				  </tr>-->
				  <tr><td colspan="2">&nbsp;</td></tr>
				  <tr>
					<td  class="heading"  colspan="2">Trejdingprofil</td>
				  </tr>
				  <tr>
					<td class="padtop_5" width="30%">Typ av spekulant:</td>
					<td class="viocolor"><?php echo ucfirst($type_investor_arr[$user_details->type_of_speculator]) ?></td>
				  </tr>
				  <tr>
					<td>Vilken mäklare använder du? </td>
					<td  class="viocolor"><?php echo ucfirst($user_details->broker_used) ?></td>
				  </tr>
				   <tr>
					<td>Vad handlar du?</td>
					<td  class="viocolor"><?php echo $my_trade; ?></td>
				  </tr>
				   <tr>
					<td>Storlek på portfölj:</td>
					<td class="viocolor"><?php echo $is_millionaire[$user_details->is_millionaire] ?></td>
				  </tr>
				   <tr>
					<td>Mina fem bästa rekar:</td>
					<td  class="viocolor"><?php echo str_replace(',',' , ',$user_details->my_five_best_recommendations) ?></td>
				  </tr> <tr>
					<td>Min blankningslista:</td>
					<td  class="viocolor"><?php echo str_replace(',',' , ',$user_details->my_shortlist) ?></td>
				  </tr> 
				  <tr>
					<td>Min bästa affär:</td>
					<td  class="viocolor"><?php echo $user_details->my_best_trade ?></td>
				  </tr>
				  <tr>
					<td>Min sämsta affär:</td>
					<td  class="viocolor"><?php echo $user_details->my_worst_trade ?></td>
				  </tr>
				  <tr><td>&nbsp;</td></tr>
				  <tr>
					<td  class="heading"  colspan="2">Med egna ord</td>
				  </tr>
				  <tr>
				  <td colspan="2"  class="padtop_5"><?php echo html_entity_decode($user_details->my_own_writing) ?></td>
				  </tr>
				   <!--<tr><td>&nbsp;</td></tr>
				  <tr>
					<td  class="heading"  colspan="2">Röster och medaljer</td>
				  </tr>
				  <tr>
				  <td class="padtop_5" colspan="2">Röster: <span class="viocolor"><?php echo $data_arr['total_votes'] ? $data_arr['total_votes'] : 0; ?></span></td>
				  </tr>
				  <tr>
				  <td colspan="2">Medaljer:</td>
				  </tr>
				  <?php if($gold_cnt > 0):?>
				  <tr>
				  	<td colspan="2"><img src="/images/medal_gold.png" alt="gold_star" height="18" width="18" /> <?php echo __('Author of the year : ').$gold_cnt ?></td>
				  </tr>
                  <?php endif;?>
                  <?php if($silver_cnt > 0):?>
				  <tr>
				  	<td colspan="2"><img src="/images/medal_silver.png" alt="silver_star" height="18" width="18" /> <?php echo __('Author of the month : ').$silver_cnt; ?></td>
				  </tr>
                  <?php endif;?>
				  <?php if($bronze_cnt > 0):?>
                  <tr>
				  	<td colspan="2"><img src="/images/medal_bronze.png" alt="bronze_star" height="18" width="18" /> <?php echo __('Most Popular Author : ').$bronze_cnt ?></td>
				  </tr>
                  <?php endif;?>
				  <tr>
					<td colspan="2">&nbsp;</td>
				  </tr>-->
                                  <!-- added signature row by sandeep-->
                                  <tr><td>&nbsp;</td></tr>
				  <tr>
					<td  class="heading"  colspan="2">Signature</td>
				  </tr>
				  <tr>
				  <td class="padtop_5" colspan="2">
                                    <?php  $signiture = $user_profile->getUserData($user_data->user_id)->signature; echo $signiture; ?>
				  </td>
				  </tr>
                                  
                                  
                                  
				   <tr><td>&nbsp;</td></tr>
				  <tr>
					<td  class="heading"  colspan="2">Tipsa en vän</td>
				  </tr>
				  <tr>
				  <td class="padtop_5" colspan="2">
                  <!-- AddThis Button BEGIN -->
                  <div class="addthis_default_style ">
                    <a href="http://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button"  style="text-decoration:none;">
                        <font color="#547184"><?php echo __('Dela') ?> </font>&nbsp;<img alt="strip" src="/images/smallcolorstrip.jpg" />
                    </a>
                  </div>
                  <!-- AddThis Button END -->
				  </td>
				  </tr>
				  <tr>
    				<td class="padtop_5" colspan="2">Denna sida:<br />
    					<a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user_data->user_id ?>" class="viocolor"><?php echo 'http://'.$host_str.'/sbt/sbtMinProfile/id/'.$user_data->user_id ?></a> </td>
  				  </tr>
				  <tr><td colspan="2">&nbsp;</td></tr>
				  <tr>
					<td class="heading" colspan="2" >Statistik</td>
				  </tr>
				  <tr>
					<td class="padtop_5" width="30%"><b>Poster totalt:</b></td>
					<td class="viocolor">&nbsp;</td>
				  </tr>
				  <tr>
					<td>Antal poster: </td>
					<td class="viocolor">
						<?php 
						$votes = $user_profile->getTotalActivitiesOfUser($user_data->user_id,$user_data->firstname.' '.$user_data->lastname); 
						echo $votes; 
						?>
                    </td>
				  </tr>
				  <tr>
					<td>Antal poster per dag: </td>
					<td class="viocolor">
                    <?php 
					$days = (strtotime(date("Y-m-d")) - strtotime(substr($user_data->regdate))) / (60 * 60 * 24);
					$ratio = $votes / $days;
					echo number_format($ratio,4);
					?>
                    </td>
				  </tr>
				  <tr>
					<td class="heading" colspan="2" ></td>
				  </tr>
				<tr>
				  <td class="padtop_5" width="30%"><b>Besöksmeddelanden</b></td>
				  <td class="viocolor">&nbsp;</td>
				</tr>
				<tr>
				  <td>Antal besöksmeddelanden:</td>
				  <td  class="viocolor"><?php echo $message_cnt ?></td>
				</tr>
				<tr>
				  <td>Senaste meddelande:</td>
				  <td  class="viocolor">
				  <?php 
				  	if($last_message->created_at)  echo date("D j M Y", strtotime($last_message->created_at)); 
					else echo '-';
				  ?></td>
				</tr>
				<?php if($is_logged_in_user != 1):?>
				<tr>
				  <td class="padtop_5 viocolor" colspan="2" > <a id="post_message" class="viocolor" href="#">Skicka meddelande till <?php echo $user_profile->getFullUserName($user_data->user_id) ?></a> </td>
				</tr>
				<?php endif; ?>
				<tr>
				  <td class="heading" colspan="2" ></td>
				</tr>
				
				<tr>
				  <td class="padtop_5" width="30%"><b>Blogg</b></td>
				  <td class="viocolor">&nbsp;</td>
				</tr>
				<!--<tr>
				  <td>Totala antalet besök:</td>
				  <td  class="viocolor">193</td>
				</tr>
				<tr>
				  <td>Senaste blogbesök:</td>
				  <td><a href="# " class="viocolor">http://www.borstjanaren.se/forum/member.php?1235</a></td>
				</tr>-->
				<tr><td colspan="2" class="viocolor"><a class="main_link_color cursor" href="<?php echo 'http://'.$host_str.'/sbt/showListOfUserBlog/uid/'.$user_data->user_id?>"><?php echo 'Visa alla blogbesök till '.$user_profile->getFullUserName($user_data->user_id)  ?></a></td></tr>
				 <tr>
				  <td class="heading" colspan="2" ></td>
				</tr>
				
				<tr>
				  <td class="padtop_5" width="30%"><b>Generell information</b></td>
				  <td class="viocolor">&nbsp;</td>
				</tr>
				 <tr>
				  <td>Senaste aktivitet:</td>
				  <td  class="viocolor">
				  	<?php if($user_data->inlogdate == '0000-00-00 00:00:00'):?>
					<?php echo '-' ?>
					<?php else:?>
					<?php echo substr($user_data->inlogdate,0,10) ?>, <?php echo substr($user_data->inlogdate,11,5) ?>
					<?php endif;?></td>
				</tr>
				 <tr>
				  <td>Medlem sedan:</td>
				  <td  class="viocolor"><?php echo substr($user_data->regdate,0,10) ?></td>
				</tr>
				 <!--<tr>
				  <td>Referrals:</td>
				  <td  class="viocolor">1</td>
				</tr>-->
				</table><?php */?>
                </div>
              </div>
            </div>
            <div class="curverect_bottombg"></div>
            
            
            <div class="inner_page_divider_3" style="height:199px;">&nbsp;</div>
            <div class="float_right margin_right_testimonial_II margin_testimonial"><img src="/images/new_home/testimonial_L.png" width="500"/></div>
          </div>
        </div>
      </div>
	<?php else: ?>
	<div class="forumlistingleftdiv" style="width:964px;">
		<div class="shoph3 widthall">För att se profilen, vänligen välj användare först.</div>
		<div class="float_left widthall">För att se användarlistan, klicka <a href="<?php echo "http://".$host_str ?>/sbt/sbtUser">här</a></div>
		<div class="float_left widthall">&nbsp;</div>
	</div>
	<?php endif; ?>
</div>

<!-- Used on message tab for user posting a message. -->
<div id="profile_msg_postmessage_dialog" title="Post a Message" class="hide_div">
<form name="profile_msg_postmessage_form" id="profile_msg_postmessage_form" method="post" action="<?php //echo url_for('sbt/sbtMinProfileMessage') ?>" >
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
 	<tr><td><?php echo $messageForm->renderHiddenFields()?>	</td></tr>
	<tr>
		<td>Meddelande: <span id="message_error" style="color:#FF0000; display:none;"><?php echo __('Meddelanderutan är tom!')?></span></td>
	</tr>
	<tr>
		<td><?php echo $messageForm['message_detail']->render(array('cols'=>70, 'rows'=>5))?></td>
	</tr>
 </table>
</form>
</div>

<!-- Used on MinProfile page left side section, for sending a friend request. -->
<div id="friend_request_box" title="Add <?php echo $user_profile->getFullUserName($user_data->user_id) ?> as a friend?" class="hide_div">
<form name="friend_request_form" id="friend_request_form" method="post" action="<?php //echo url_for('sbt/sbtMinProfile') ?>" >
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
 	<tr><td><?php echo $friendRequestForm->renderHiddenFields()?></td></tr>	
	<tr>
		<td>
		<?php if($user_photo_data): ?>
		<div class="float_left widthall" style="margin-bottom:10px;">
			<img src="/uploads/userThumbnail/<?php echo str_replace('.','_large.',$user_photo_data->profile_photo_name); ?>" alt="user_photo" />
		</div>
		<?php else: ?>
		<div class="minleft_userphoto" style="border:0px solid red;">
			<img src="/images/new_home/blog_user_img.png" width="107" class="border_radius_7" alt="default_user" />
		</div>
		<?php endif; ?>
		</td>
		<td>
			<table width="100%"  border="0" cellspacing="3" cellpadding="0">
				<tr>&nbsp;<?php echo $user_profile->getFullUserName($user_data->user_id) ?></tr>
				<tr>
					<td>Meddelande: <span id="friend_message_error" style="color:#FF0000; display:none;"><?php echo __('Meddelanderutan är tom!')?></span></td>
				</tr>
				<tr><td><?php echo $friendRequestForm['message']->render(array('cols'=>60, 'rows'=>4))?></td></tr>
			</table>
		</td>
	</tr>
 </table>
</form>
</div>
<!-- Used when logged In user wants to send message to his own friends. -->
<!--<div id="send_msg_dialog1" title="Post a Message" class="hide_div">
<form name="post_message_to_user" id="post_message_to_user" method="post" action="" >
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
 	<tr><td><?php echo $messageForm->renderHiddenFields()?>	</td></tr>
	<input type="hidden" value="<?php echo $user_id; ?>" id="uid" name="uid"/>

	<tr>
		<td>Meddelande: <span id="message_error1" style="color:#FF0000; display:none;"><?php echo __('Meddelanderutan är tom!')?></span></td>
	</tr>
	<tr>
		<td><?php //echo $messageForm['message_detail']->render(array('cols'=>70, 'rows'=>5))?></td>
            <td><textarea cols="70" rows="5" id="sbt_messages_message_detail1" name="sbt_messages[message_detail]"></textarea></td>
	</tr>
 </table>
</form>
</div>-->
