<style type="text/css">
.listing table td{ border:0px;}
.listing table td{ font-weight:normal;}
</style>
<div class="maincontentpage">
<div class="forumlistingleftdiv" style="width:950px;">
  <div class="forumlistingleftdivinner">
   <div class="shoph3 widthall"></div>
	<div class="float_left listing"><div class="float_left widthall"><a class="main_link_color cursor" href="<?php echo 'http://'.$host_str.'/backend.php/borst/viewAccount/id/'.$user_data->user_id ?>">View Account</a></div>
	  <div class="float_left widthall">
	  <form name="user_reg" action="" method="POST" enctype="multipart/form-data">
            <table width="100%"  border="0" cellspacing="3" cellpadding="0" class="om_miginfotable">
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>"/>
			  <input type="hidden" name="current_user" id="current_user" value="<?php echo $logged_user ?>"/>
			  <input type="hidden" name="blog_info_div" id="blog_info_div" value="<?php echo $blog_info_div ?>" />
		      <?php echo $profileForm->renderHiddenFields()?>
		      <?php echo $sbtBlogProfileForm->renderHiddenFields()?>
              <tr>
                <td class="heading" colspan="2" >Edit Profile</td>
              </tr>
			  <tr>
                <td colspan="2" class="padtop_5"><?php /*?><input class="checkbox" type="checkbox" name="use_email_as_username" id="use_email_as_username" <?php echo $checked ?> value="ON" />&nbsp;&nbsp;<?php echo __('Jag vill ha min e-postadress som användarnamn') ?><?php */?></td>
              </tr>
              <tr>
                <td class="padtop_5"><b><?php echo __('Användarnamn')?>:</b></td>
                <td class=""><?php //echo $user_data->username ?><?php echo $profileForm['username']->render(array('id'=>'username','class'=>'input174'))?>
				<font color="#FF0000" style="<?php echo $hide_username_error; ?>"><?php echo $username_red; ?></font></td>
              </tr>
              <tr>
                <td class="padtop_5"><b>E-post: </b></td>
                <td  class="viocolor">
                    <?php //echo $user_data->email ?>
                        <?php echo $profileForm['email']->render(array('id'=>'email','class'=>'input174'))?>
				<font color="#FF0000"><?php echo $email_red ?></font></td>
              </tr>
              <tr>
                <td class="padtop_5"><b><?php echo __('Födelseår') ?>:</b></td>
                <td class="viocolor"><?php echo $profileForm['year_of_birth']->render(array('id'=>'year_of_birth'))?></td>
              </tr>
              <tr>
                <td class="padtop_5">&nbsp;</td>
                <td class="viocolor"><input type="radio" class="radio" name="gender" value="2" <?php if ($gender == 2) echo "checked"; ?> />
                  &nbsp;<?php echo __('Kvinna') ?></td>
              </tr>
              <tr>
                <td class="padtop_5">&nbsp;</td>
                <td class="viocolor"><input type="radio" class="radio" name="gender" value="1" <?php if ($gender == 1) echo "checked"; ?> />
                  &nbsp;<?php echo __('Man') ?></td>
              </tr>
              <tr>
                <td class="padtop_5"><b><?php echo __('Förnamn')?>:</b></td>
                <td class="viocolor"><?php echo $profileForm['firstname']->render(array('id'=>'firstname','class'=>'input174'))?>
				<font color="#FF0000"><?php echo $firstname_error; ?></font></td>
              </tr>
              <tr>
                <td class="padtop_5"><b><?php echo __('Efternamn')?>:</b></td>
                <td class="viocolor"><?php echo $profileForm['lastname']->render(array('id'=>'lastname','class'=>'input174'))?>
				<font color="#FF0000"><?php echo $lastname_error; ?></font></td>
              </tr>
              <tr>
                <td class="padtop_5"><b><?php echo __('Gatuadress')?>:</b></td>
                <td class="viocolor"><?php echo $profileForm['street']->render(array('id'=>'street','class'=>'input174'))?>
				<font color="#FF0000"><?php echo $street_error; ?></font></td>
              </tr>
              <tr>
                <td class="padtop_5"><b><?php echo __('Postnr / Ort')?>:</b></td>
                <td class="viocolor"><?php echo $profileForm['zipcode']->render(array('id'=>'zipcode','class'=>'input65','size'=>'6','maxlength'=>'6'))?> <?php echo $profileForm['city']->render(array('id'=>'city','class'=>'input105 float_left','size'=>'14'))?>
				<font color="#FF0000" style="margin-left:10px;"><?php echo $zipcode_error; ?></font></td>
              </tr>
              <tr>
                <td class="padtop_5"><b><?php echo __('Telefon')?>:</b></td>
                <td class="viocolor"><?php echo $profileForm['phone']->render(array('id'=>'phone','class'=>'input174',))?>
				<font color="#FF0000"><?php echo $phone_error; ?></font></td>
              </tr>
              <tr>
                <td class="padtop_5">&nbsp;</td>
                <td class="viocolor"><?php echo $profileForm['land']->render(array('id'=>'phone','class'=>'input174',))?></td>
              </tr>
              <!-- added signature column by sandeep-->
              <tr>
                <td class="padtop_5"><b><?php echo __('Signature')?>:</b></td>
                <td class="viocolor"><?php echo $profileForm['signature']->render(array('id'=>'signature','class'=>'input174','size'=>'32','maxlength'=>'32'))?>
				</td>
              </tr>
              <tr>
                <td class="padtop_5">&nbsp;</td>
                <td class="viocolor">&nbsp;</td>
              </tr>
			  <tr>
                <td colspan="2" class="borst_subtitle_4"><b><img id="blog_rights_plus" src="/images/addplusicon.png"  alt="icon" /> <?php echo __('Vill du kunna blogga och publicera artiklar?') ?> </b></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="blank_10h"><b>&nbsp;</b></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class=""><?php echo __('Please answer the following questions:') ?></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="blank_10h"><b>&nbsp;</b></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('1. In my own writing') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd" colspan="2"><span class="float_left"><?php echo $sbtBlogProfileForm['my_own_writing']->render(array('id'=>'my_own_writting','class'=>'input174','style'=>'width:370px; height:60px;'))?></span>
                  <div class="error_list_outer">
                    <ul class="blog_rights_error">
                      <li><?php echo $my_own_writing_error ?></li>
                    </ul>
                  </div></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('2. Type of speculator?') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><div class="radiodiv">
                    <input type="radio" name="type_of_speculator" value="trader"  class="radio" <?php if ($type_of_speculator == 'trader') echo "checked"; ?>/>
                    <span class="float_left"><?php echo __('Trader') ?></span></div>
                  <div class="radiodiv">
                    <input type="radio" name="type_of_speculator" value="investor"  class="radio" <?php if ($type_of_speculator == 'investor') echo "checked"; ?>/>
                    <span class="float_left"> <?php echo __('Investor') ?></span></div>
                  <div class="radiodiv">
                    <input type="radio" name="type_of_speculator" value="gambler"  class="radio" <?php if ($type_of_speculator == 'gambler') echo "checked"; ?>/>
                    <span class="float_left"> <?php echo __('Gambler') ?></span> </div>
                  <div class="error_list_outer">
                    <ul class="blog_rights_error">
                      <li><?php echo $type_of_speculator_error; ?></li>
                    </ul>
                  </div></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('3. What broker do you use?') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfileForm['broker_used']->render(array('id'=>'broker_used','class'=>'input174','style'=>'width:370px;'))?></div>
                  <div class="for_form_error" style="margin-left:10px;"><?php echo $broker_used_error ?></div></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('4. What do you trade?') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><div class="radiodiv">
                    <input type="radio" name="my_trade" value="stocks"  class="radio" <?php if ($my_trade == 'stocks') echo "checked"; ?>/>
                    <span class="float_left"><?php echo __('Stocks') ?></span></div>
                  <div class="radiodiv">
                    <input type="radio" name="my_trade" value="commodities"  class="radio" <?php if ($my_trade == 'commodities') echo "checked"; ?>/>
                    <span class="float_left"><?php echo __('Commodities') ?> </span></div>
                  <div class="radiodiv">
                    <input type="radio" name="my_trade" value="currencies"  class="radio" <?php if ($my_trade == 'currencies') echo "checked"; ?>/>
                    <span class="float_left"><?php echo __('Currencies') ?> </span> </div>
                  <div class="error_list_outer">
                    <ul class="blog_rights_error">
                      <li><?php echo $my_trade_error ?></li>
                    </ul>
                  </div></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('5. Occupation?') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><div class="radiodiv">
                    <input type="radio" name="my_occupation" value="student"  class="radio" <?php if ($my_occupation == 'student') echo "checked"; ?>/>
                    <span class="float_left"><?php echo __('Student') ?></span></div>
                  <div class="radiodiv">
                    <input type="radio" name="my_occupation" value="employed"  class="radio" <?php if ($my_occupation == 'employed') echo "checked"; ?>/>
                    <span class="float_left"> <?php echo __('Employed') ?></span></div>
                  <div class="radiodiv">
                    <input type="radio" name="my_occupation" value="self_employed"  class="radio" <?php if ($my_occupation == 'self_employed') echo "checked"; ?>/>
                    <span class="float_left"> <?php echo __('Self-employed') ?></span> </div>
                  <div class="radiodiv">
                    <input type="radio" name="my_occupation" value="between_jobs"  class="radio" <?php if ($my_occupation == 'between_jobs') echo "checked"; ?>/>
                    <span class="float_left"> <?php echo __('Between jobs') ?></span> </div>
                  <div class="radiodiv">
                    <input type="radio" name="my_occupation" value="retired"  class="radio" <?php if ($my_occupation == 'retired') echo "checked"; ?>/>
                    <span class="float_left"> <?php echo __('Retired') ?></span> </div>
                  <div class="radiodiv">
                    <input type="radio" name="my_occupation" value="other"  class="radio" <?php if ($my_occupation == 'other') echo "checked"; ?>/>
                    <span class="float_left"><?php echo __('Other') ?></span> </div>
                  <div class="error_list_outer">
                    <ul class="blog_rights_error">
                      <li><?php echo $my_occupation_error ?></li>
                    </ul>
                  </div></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('6. Are you a millionaire?') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><div class="radiodiv">
                    <input type="radio" name="is_millionaire" value="milli_yes"  class="radio" <?php if ($is_millionaire == 'milli_yes') echo "checked"; ?>/>
                    <span class="float_left"><?php echo __('Yes') ?></span></div>
                  <div class="radiodiv">
                    <input type="radio" name="is_millionaire" value="milli_not_yet"  class="radio" <?php if ($is_millionaire == 'milli_not_yet') echo "checked"; ?>/>
                    <span class="float_left"> <?php echo __('Not yet') ?></span></div>
                  <div class="radiodiv">
                    <input type="radio" name="is_millionaire" value="milli_varies"  class="radio" <?php if ($is_millionaire == 'milli_varies') echo "checked"; ?>/>
                    <span class="float_left"> <?php echo __('Varies') ?></span> </div>
                  <div class="error_list_outer">
                    <ul class="blog_rights_error">
                      <li><?php echo $is_millionaire_error ?></li>
                    </ul>
                  </div></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('7. My best trade') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfileForm['my_best_trade']->render(array('id'=>'my_best_trade','class'=>'input174','style'=>'width:370px; height:60px;'))?></div>
                  <div class="for_form_error" style="margin-left:10px;"><?php echo $my_best_trade_error ?></div></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('8. My worst trade') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfileForm['my_worst_trade']->render(array('id'=>'my_worst_trade','class'=>'input174','style'=>'width:370px; height:60px;'))?></div>
                  <div class="for_form_error" style="margin-left:10px;"><?php echo $my_worst_trade_error ?></div></td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('9. My five best recommendations') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><input type="text" id="recomm_1" name="recomm_1" value="<?php echo $my_five_best_recommendations[0] ?>" class="input174" style="width:120px;" />
                  &nbsp;
                  <input type="text" id="recomm_2" name="recomm_2" value="<?php echo $my_five_best_recommendations[1] ?>" class="input174" style="width:120px;" />
                  &nbsp;
                  <input type="text" id="recomm_3" name="recomm_3" value="<?php echo $my_five_best_recommendations[2] ?>" class="input174" style="width:120px;" />
                </td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><input type="text" id="recomm_4" name="recomm_4" value="<?php echo $my_five_best_recommendations[3] ?>" class="input174" style="width:120px;" />
                  &nbsp;
                  <input type="text" id="recomm_5" name="recomm_5" value="<?php echo $my_five_best_recommendations[4] ?>" class="input174" style="width:120px;" />
                </td>
              </tr>
              <tr class="blog_rights">
                <td colspan="2" class="padtd"><b><?php echo __('10. My Short list') ?></b></td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd"  colspan="2"><input type="text" id="shortlist_1" name="shortlist_1" value="<?php echo $my_shortlist[0] ?>" class="input174" style="width:120px;" />
                  &nbsp;
                  <input type="text" id="shortlist_2" name="shortlist_2" value="<?php echo $my_shortlist[1] ?>" class="input174" style="width:120px;" />
                  &nbsp;
                  <input type="text" id="shortlist_3" name="shortlist_3" value="<?php echo $my_shortlist[2] ?>" class="input174" style="width:120px;" />
                </td>
              </tr>
              <tr class="blog_rights">
                <td class="padtd" colspan="2"><input type="text" id="shortlist_4" name="shortlist_4" value="<?php echo $my_shortlist[3] ?>" class="input174" style="width:120px;" />
                  &nbsp;
                  <input type="text" id="shortlist_5" name="shortlist_5" value="<?php echo $my_shortlist[4] ?>" class="input174" style="width:120px;" />
                </td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" class="registerbuttontext submit " value="<?php echo __('SPARA') ?>" name="submit" /></td>
              </tr>
			  <tr>
                <td class="heading" colspan="2" ></td>
              </tr>
            </table>
			</form>	
	  </div>
	</div>
	</div>
</div>

</div>