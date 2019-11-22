<?php use_stylesheet('custom-theme/jquery-ui-1.8.2.custom_sbt.css'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#user_reg').jqTransform();
    });
    /**
     *
     *  AJAX IFRAME METHOD (AIM)
     *  http://www.webtoolkit.info/
     *
     **/

    AIM = {

        frame: function (c) {

            var n = 'f' + Math.floor(Math.random() * 99999);
            var d = document.createElement('DIV');
            d.innerHTML = '<iframe style="display:none" src="about:blank" id="' + n + '" name="' + n + '" onload="AIM.loaded(\'' + n + '\')"></iframe>';
            document.body.appendChild(d);

            var i = document.getElementById(n);
            if (c && typeof (c.onComplete) == 'function') {
                i.onComplete = c.onComplete;
            }

            return n;
        },

        form: function (f, name) {
            f.setAttribute('target', name);
        },

        submit: function (f, c) {
            AIM.form(f, AIM.frame(c));
            if (c && typeof (c.onStart) == 'function') {
                return c.onStart();
            } else {
                return true;
            }
        },

        loaded: function (id) {
            var i = document.getElementById(id);
            if (i.contentDocument) {
                var d = i.contentDocument;
            } else if (i.contentWindow) {
                var d = i.contentWindow.document;
            } else {
                var d = window.frames[id].document;
            }
            if (d.location.href == "about:blank") {
                return;
            }

            if (typeof (i.onComplete) == 'function') {
                i.onComplete(d.body.innerHTML);
            }
        }

    }
</script>
<script type="text/javascript">
    function startCallback() {
        return true;
    }

    function completeCallback(response) {
        var str_arr = response.split(',');
        document.getElementById('profile_image_upload_error').innerHTML = str_arr[0];
        if (str_arr.length == 2)
            document.getElementById('profile_img_new').value = str_arr[1];
        //window.location.reload();
        checkMessage();
    }


</script>
<div class="maincontentpage" id="minsid">
    <?php if ($user_id): ?>
        <div class="mainconetentinner">
            <div class="blogleft_divpart innerleftdiv_blog">
                <?php include_partial('global/profile_left_top', array('user_data' => $user_data, 'data_arr' => $data_arr, 'host_str' => $host_str, 'user_id' => $user_id, 'friendRequestForm' => $friendRequestForm, 'is_friend_request' => $is_friend_request, 'friend_id' => $friend_id, 'friend_name' => $friend_name, 'show_top_links' => $show_top_links, 'visitor_name_id_arr' => $visitor_name_id_arr, 'gold_cnt' => $gold_cnt, 'silver_cnt' => $silver_cnt, 'bronze_cnt' => $bronze_cnt, 'user_guard_data' => $user_guard_data, 'user_profile' => $user_profile, 'own_profile' => $own_profile, 'edit_mode' => $edit_mode, 'user_photo_data' => $user_photo_data, 'user_details' => $user_details)) ?>
                <div class="minsid_lefttopdiv_banner">&nbsp;</div>
                <div id="profile_ads">
                <?php include_partial('global/profile_left_bottom', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
                </div>
            </div>
            <div class="minsid_rightdiv">                
                <div class="curverect_topbg"></div>
                <div class="curverect_midbg">
                    <div class="midsi_inner">                        
                        <?php include_partial('global/profile_menu', array('host_str' => $host_str, 'action' => $action)) ?>
                        <input type="hidden" name="current_user" id="current_user" value="<?php echo $logged_user ?>"/>
                        <?php if ($show_top_links == 1): ?>
                            <div class="linkwrapper"> <a href="http://<?php echo $host_str ?>/sbt/sbtAddAnalysisBlog" class="main_link_color float_left widthall">Skriv analys/blogginlägg/Skapa blogg?</a> <a href="#"  class="main_link_color float_left widthall">Publicera analys</a> <a href="http://<?php echo $host_str ?>/sbt/viewAllRequest/id/<?php echo $user_id ?>"  class="main_link_color float_left widthall">Skicka meddelande</a> </div>
                            <div class="linkwrapper"> <a href="#" class="main_link_color float_left widthall">Mina abonnemang</a> <a href="#"  class="main_link_color float_left widthall">Mina e-postutskick och E-magasin</a> <a href="#" class="main_link_color float_left widthall">Mina favoriter</a></div>
                        <?php endif; ?>                                        
                        <div id="profile_data_container">
                            <?php include_partial('blog_dashboard_menu', array('host_str' => $host_str, 'user_id' => $user_id, 'logged_user' => $logged_user)); ?>
                            <div class="om_miginfo">

                                <?php if ($btn != 'skicka'): ?>
                                    <?php if ($msg != ''): ?>
                                        <div class="float_left widthall" id="friend_req_msg">
                                            <?php echo $msg ?>

                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <form name="user_reg" id="user_reg" action="" method="POST" enctype="multipart/form-data">
                                    <table width="100%"  border="0" cellspacing="3" cellpadding="0" class="om_miginfotable" id="editpro">

                                        <input type="hidden" name="blog_info_div" id="blog_info_div" value="<?php echo $blog_info_div ?>" />

                                        <?php echo $profileForm->renderHiddenFields() ?>
                                        <?php echo $sbtBlogProfileForm->renderHiddenFields() ?>
                                        <tr>
                                            <td class="heading" colspan="2" >
                                                <div class="blog_user_profile_deshboard widthall">Editera profil</div>
                                                <div class="blog_line_nav"><img src="/images/new_home/blog_line_nav.png"/>
                                            </td>
                                        </tr>                                       

                                        <tr>
                                            <td class="width_145"><span class="form_labels"><?php echo __('Användarnamn') ?>:</span></td>
                                            <td class="viocolor"><?php
                                                echo $user_data->username;
                                                echo $profileForm['username']->render(array('id' => 'username', 'class' => 'form_input contactus-inputs display-none'));
                                                ?>
                                                <font color="#FF0000"><?php echo $username_red; ?></font></td>
                                        </tr>
                                        <tr>
                                            <td class="width_145"><span class="form_labels">E-post: </span></td>
                                            <td  class="viocolor"><?php echo $profileForm['email']->render(array('id' => 'email', 'class' => 'form_input contactus-inputs width_277')) ?>
                                                <font color="#FF0000"><?php echo $email_red ?></font></td>
                                        </tr>
                                        <tr>
                                            <td class="width_145"><span class="form_labels"><?php echo __('Födelseår') ?>:</span></td>
                                            <td class="viocolor"><?php echo $profileForm['year_of_birth']->render(array('id' => 'year_of_birth')) ?>&nbsp;<font color="#FF0000"><?php echo $birth_year_error ?></font></td>
                                        </tr>
                                        <tr>
                                            <td class="width_145">&nbsp;</td>
                                            <td class="viocolor pad_top_7"><input type="radio" class="radio" name="gender" value="2" <?php if ($gender == 2) echo "checked"; ?> />
                                                <span class="radio_button_text"><?php echo __('Kvinna') ?></span>&nbsp;<font color="#FF0000"><?php echo $gender_error ?></font></td>
                                        </tr>
                                        <tr>
                                            <td class="pad_top_1">&nbsp;</td>
                                            <td class="viocolor"><input type="radio" class="radio radio_button_text" name="gender" value="1" <?php if ($gender == 1) echo "checked"; ?> />
                                                <span class="radio_button_text"><?php echo __('Man') ?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="pad_top_8 width_145"><span class="form_labels"><?php echo __('Förnamn') ?>:</span></td>
                                            <td class="viocolor pad_top_5"><?php echo $profileForm['firstname']->render(array('id' => 'firstname', 'class' => 'form_input contactus-inputs width_277')) ?>
                                                <font color="#FF0000"><?php echo $firstname_error; ?></font></td>
                                        </tr>
                                        <tr>
                                            <td class="width_145"><span class="form_labels"><?php echo __('Efternamn') ?>:</span></td>
                                            <td class="viocolor "><?php echo $profileForm['lastname']->render(array('id' => 'lastname', 'class' => 'form_input contactus-inputs width_277')) ?>
                                                <font color="#FF0000"><?php echo $lastname_error; ?></font></td>
                                        </tr>
                                        <tr>
                                            <td class="width_145"><span class="form_labels"><?php echo __('Gatuadress') ?>:</span></td>
                                            <td class="viocolor "><?php echo $profileForm['street']->render(array('id' => 'street', 'class' => 'form_input contactus-inputs width_277')) ?>
                                                <font color="#FF0000"><?php echo $street_error; ?></font></td>
                                        </tr>
                                        <tr>
                                            <td class="width_145"><span class="form_labels"><?php echo __('Postnr / Ort') ?>:</span></td>
                                            <td class="viocolor "><?php echo $profileForm['zipcode']->render(array('id' => 'zipcode', 'class' => 'margin_left_5 form_input contactus-inputs_zip contactus-inputs', 'size' => '10', 'maxlength' => '10')) ?> <?php echo $profileForm['city']->render(array('id' => 'city', 'class' => 'form_input contactus-inputs_city float_left contactus-inputs', 'size' => '20', 'maxlength' => '20')) ?>
                                                <font color="#FF0000"><?php echo $zipcode_error ?><?php echo $city_error ? ' / ' . $city_error : '' ?></font></td>
                                        </tr>
                                        <tr>
                                            <td class="width_145"><span class="form_labels"><?php echo __('Telefon') ?>:</span></td>
                                            <td class="viocolor "><?php echo $profileForm['phone']->render(array('id' => 'phone', 'class' => 'form_input contactus-inputs width_277', 'size' => '32', 'maxlength' => '32')) ?>
                                                <font color="#FF0000"><?php echo $phone_error; ?></font></td>
                                        </tr>
                                        <tr>
                                            <td class="width_145">&nbsp;</td>
                                            <td class="viocolor "><?php echo $profileForm['land']->render(array('id' => 'phone', 'class' => 'form_input contactus-inputs')) ?></td>
                                        </tr>

                                        <tr>
                                            <td class="width_145"><span class="form_labels"><?php echo __('Signature') ?>:</span></td>
                                            <td class="viocolor"><?php echo $profileForm['signature']->render(array('id' => 'signature', 'class' => 'form_input contactus-inputs width_277', 'size' => '32', 'maxlength' => '32')) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="padtop_5 pad_btm_5">&nbsp;</td>
                                            <td class="viocolor pad_btm_14">&nbsp;</td>
                                        </tr>
                                        <tr>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_10h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_5h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="pad_lft_0" colspan="2"><?php echo __('Vänligen besvara följande frågor:') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_1h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_bottom_1" colspan="2"><?php echo __('1. Med egna ord') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"  colspan="2"><span class="float_left"><?php echo $sbtBlogProfileForm['my_own_writing']->render(array('id' => 'my_own_writting', 'class' => 'form_input_textarea contactus-inputs width_425 height_60')) ?></span>
                                                <div class="error_list_outer">
                                                    <ul class="blog_rights_error">
                                                        <li><?php echo $my_own_writing_error ?></li>
                                                    </ul>
                                                </div></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('2. Titel (ange vad som skall stå ovanför din profilbild)') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfileForm['user_title']->render(array('maxlength' => '50', 'id' => 'user_title', 'class' => 'form_input contactus-inputs width_425')) ?></div>
                                                <div class="for_form_error margin_left_5"><?php echo $user_title_error ?></div></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('3. När jag inte är på börsen') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfileForm['not_on_stock']->render(array('id' => 'not_on_stock', 'class' => 'form_input contactus-inputs width_425')) ?></div>
                                                <div class="for_form_error margin_left_5"><?php echo $not_on_stock_error ?></div></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('4. Typ av spekulant?') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"   colspan="2">
                                                <div class="radiodiv mrg_rgt_16">
                                                    <input type="radio" name="type_of_speculator" value="trader"  class="radio" <?php if ($type_of_speculator == 'trader'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"><?php echo __('Trejdare') ?></span></div>
                                                <div class="radiodiv mrg_rgt_16">
                                                    <input type="radio" name="type_of_speculator" value="investor"  class="radio" <?php if ($type_of_speculator == 'investor'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"> <?php echo __('Investerare') ?></span></div>
                                                <div class="radiodiv">
                                                    <input type="radio" name="type_of_speculator" value="gambler"  class="radio" <?php if ($type_of_speculator == 'gambler'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"> <?php echo __('Gambler') ?></span> </div>
                                                <div class="error_list_outer">
                                                    <ul class="blog_rights_error">
                                                        <li><?php echo $type_of_speculator_error; ?></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('5. Vilken mäklare använder du?') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"   colspan="2"><div class="float_left"><?php echo $sbtBlogProfileForm['broker_used']->render(array('id' => 'broker_used', 'class' => 'form_input contactus-inputs width_425')) ?></div>
                                                <div class="for_form_error margin_left_5"><?php echo $broker_used_error ?></div></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('6. Vad handlar du?') ?></td>
                                        </tr>
                                        <?php $trade_arr = explode(',', $my_trade_str); ?>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"  colspan="2" >
                                                <div class="radiodiv mrg_rgt_16">
                                                    <input type="checkbox" name="my_trade[]" value="stocks"  class="radio" <?php if (in_array('stocks', $trade_arr)): ?> checked="true" <?php endif; ?> />
                                                    <span class="float_left radio_button_text margin_left_5 margin_top_4"><?php echo __('Aktier') ?></span>
                                                </div>
                                                <div class="radiodiv mrg_rgt_16">
                                                    <input type="checkbox" name="my_trade[]" value="commodities"  class="radio" <?php if (in_array('commodities', $trade_arr)): ?> checked="true" <?php endif; ?> />
                                                    <span class="float_left radio_button_text  margin_left_5 margin_top_4"><?php echo __('Råvaror') ?> </span></div>
                                                <div class="radiodiv">
                                                    <input type="checkbox" name="my_trade[]" value="currencies"  class="radio" <?php if (in_array('currencies', $trade_arr)): ?> checked="true" <?php endif; ?> />
                                                    <span class="float_left radio_button_text  margin_left_5 margin_top_4"><?php echo __('Valutor') ?> </span> </div>
                                                <div class="error_list_outer">
                                                    <ul class="blog_rights_error">
                                                        <li><?php echo $my_trade_error ?></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('7. Sysselsättning?') ?></td>
                                        </tr>
                                        <?php $my_occ = explode(':', $my_occupation); ?>

                                        <tr class="blog_rights">
                                            <td class="padtdsmall" id="user_occ" colspan="2">
                                                <div class="radiodiv width_108">
                                                    <input type="radio" name="my_occupation" value="student"  class="radio" <?php if ($my_occ[0] == 'student'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"><?php echo __('Student') ?></span>
                                                </div>
                                                <div class="radiodiv width_108">
                                                    <input type="radio" name="my_occupation" value="employed"  class="radio" <?php if ($my_occ[0] == 'employed'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"> <?php echo __('Anställd') ?></span>
                                                </div>
                                                <div class="radiodiv">
                                                    <input type="radio" name="my_occupation" value="self_employed"  class="radio" <?php if ($my_occ[0] == 'self_employed'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"> <?php echo __('Egen företagare') ?></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td colspan="2">
                                                <div class="radiodiv width_108">
                                                    <input type="radio" name="my_occupation" value="between_jobs"  class="radio" <?php if ($my_occ[0] == 'between_jobs'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"> <?php echo __('Mellan jobb') ?></span>
                                                </div>
                                                <div class="radiodiv width_108">
                                                    <input type="radio" name="my_occupation" value="retired"  class="radio" <?php if ($my_occ[0] == 'retired'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"> <?php echo __('Pensionerad') ?></span>
                                                </div>
                                                <div class="radiodiv">
                                                    <input type="radio" name="my_occupation" value="other"  class="radio" <?php if ($my_occ[0] == 'other'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"><?php echo __('Annat') ?></span>
                                                </div>
                                                <div class="error_list_outer">
                                                    <ul class="blog_rights_error">
                                                        <li><?php echo $my_occupation_error ?></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall" colspan="2"><div id="occ_container" class="<?php echo $my_occ[0] == 'other' ? 'show_div' : 'hide_div' ?> mrg_top_7"><input type="text" id="other_occ" name="other_occ" value="<?php echo $my_occ[1] ? $my_occ[1] : ''; ?>" class="form_input contactus-inputs width_425" />&nbsp;<span class="redcolor"><?php echo $other_occ_error ?></span></div></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('8. Storlek på portfölj?') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall" colspan="2" >
                                                <div class="radiodiv mrg_rgt_16">
                                                    <input type="radio" name="is_millionaire" value="milli_yes"  class="radio" <?php if ($is_millionaire == 'milli_yes'): ?> checked="true" <?php endif; ?>/>
                                                    <span class="float_left radio_button_text"><?php echo __('Stor') ?></span></div>
                                                <div class="radiodiv mrg_rgt_16">
                                                    <input type="radio" name="is_millionaire" value="milli_not_yet"  class="radio" <?php if ($is_millionaire == 'milli_not_yet'): ?> checked="true" <?php endif; ?> />
                                                    <span class="float_left radio_button_text"> <?php echo __('Liten') ?></span></div>
                                                <div class="radiodiv">
                                                    <input type="radio" name="is_millionaire" value="milli_varies"  class="radio" <?php if ($is_millionaire == 'milli_varies'): ?> checked="true" <?php endif; ?> />
                                                    <span class="float_left radio_button_text"> <?php echo __('Lagom') ?></span> </div>
                                                <div class="error_list_outer">
                                                    <ul class="blog_rights_error">
                                                        <li><?php echo $is_millionaire_error ?></li>
                                                    </ul>
                                                </div></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('9. Min bästa affär') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfileForm['my_best_trade']->render(array('id' => 'my_best_trade', 'class' => 'form_input_textarea contactus-inputs width_425 height_60')) ?></div>
                                                <div class="for_form_error mleft_10"><?php echo $my_best_trade_error ?></div></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('10. Min sämsta affär') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfileForm['my_worst_trade']->render(array('id' => 'my_worst_trade', 'class' => 'form_input_textarea contactus-inputs width_425 height_60')) ?></div>
                                                <div class="for_form_error margin_left_5"><?php echo $my_worst_trade_error ?></div></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="blank_15h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('11. Mina fem bästa rekar') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"  colspan="2">
                                                <input type="text" id="recomm_1" name="recomm_1" value="<?php echo $my_five_best_recommendations[0] ? $my_five_best_recommendations[0] : $sf_params->get('recomm_1'); ?>" class="form_input contactus-inputs width_150"/>

                                                <input type="text" id="recomm_2" name="recomm_2" value="<?php echo $my_five_best_recommendations[1] ? $my_five_best_recommendations[1] : $sf_params->get('recomm_2'); ?>" class="form_input contactus-inputs width_150" />

                                                <input type="text" id="recomm_3" name="recomm_3" value="<?php echo $my_five_best_recommendations[2] ? $my_five_best_recommendations[2] : $sf_params->get('recomm_3'); ?>" class="form_input contactus-inputs width_150" />
                                            </td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"  colspan="2"><input type="text" id="recomm_4" name="recomm_4" value="<?php echo $my_five_best_recommendations[3] ? $my_five_best_recommendations[3] : $sf_params->get('recomm_4') ?>" class="form_input contactus-inputs width_150"/>

                                                <input type="text" id="recomm_5" name="recomm_5" value="<?php echo $my_five_best_recommendations[4] ? $my_five_best_recommendations[4] : $sf_params->get('recomm_5') ?>" class="form_input contactus-inputs width_150" />
                                            </td>
                                        </tr>
                                        <tr class="blog_rights" >
                                            <td  class="blank_15h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1"  colspan="2"><?php echo __('12. Min blankningslista') ?></td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall"  colspan="2"><input type="text" id="shortlist_1" name="shortlist_1" value="<?php echo $my_shortlist[0] ? $my_shortlist[0] : $sf_params->get('shortlist_1'); ?>" class="form_input contactus-inputs width_150" />

                                                <input type="text" id="shortlist_2" name="shortlist_2" value="<?php echo $my_shortlist[1] ? $my_shortlist[1] : $sf_params->get('shortlist_2'); ?>" class="form_input contactus-inputs width_150" />

                                                <input type="text" id="shortlist_3" name="shortlist_3" value="<?php echo $my_shortlist[2] ? $my_shortlist[2] : $sf_params->get('shortlist_3'); ?>" class="form_input contactus-inputs width_150" />
                                            </td>
                                        </tr>
                                        <tr class="blog_rights">
                                            <td class="padtdsmall" colspan="2"><input type="text" id="shortlist_4" name="shortlist_4" value="<?php echo $my_shortlist[3] ? $my_shortlist[3] : $sf_params->get('shortlist_4'); ?>" class="form_input contactus-inputs width_150" />

                                                <input type="text" id="shortlist_5" name="shortlist_5" value="<?php echo $my_shortlist[4] ? $my_shortlist[4] : $sf_params->get('shortlist_5'); ?>" class="form_input contactus-inputs width_150" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  class="blank_25h" colspan="2"><b>&nbsp;</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" id="spara" class="submit edit_profile_save" value="" name="submit" />
                                                <span class="float_left width_10">&nbsp;</span>                        
                                            
                                                <input type="button" onclick="cancelProfileChanges()" class="submit edit_profile_cancel" value="" name="cancel" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="heading" colspan="2" ></td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="curverect_bottombg"></div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="forumlistingleftdiv">
        <div class="shoph3 widthall">Please select the user first to view the Profile..</div>
        <div class="float_left widthall">To View the User List, click <a href="<?php echo "http://" . $host_str ?>/sbt/sbtUser">here</a></div>
        <div class="float_left widthall">&nbsp;</div>
    </div>
<?php endif; ?>

<div class="inner_page_divider_3">&nbsp;</div>
<div class="float_right margin_testimonial margin_right_testimonial">
    <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
</div>

<!-- Used on MinProfile page left side section, for sending a friend request. -->
<div id="change_userprofile_image_box"  title="Change profile image" class="hide_div">
    <form id="change_userprofile_image_form" name="change_userprofile_image_form" enctype="multipart/form-data" method="post" action="/sbt/uploadUserProfileImage/" onsubmit="return AIM.submit(this, {'onStart': startCallback, 'onComplete': completeCallback});">
        <table border="0" cellspacing="3" cellpadding="0">
            <tr>
                <td>
                    <table border="0" cellspacing="3" cellpadding="0">
                        <tr>
                            <td><div class="float_left width_20"></div></td>
                            <td id="profile_image_upload_error">&nbsp;</td>
                            <td><input type="hidden" id="profile_img_new" name="profile_img_new" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table border="0" cellspacing="3" cellpadding="0">
                        <tr>
                            <td id="browse_box_div"><div class="float_left width_20"></div></td>
                            <td align="right"><input type="file" name="upload_user_image" /></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="upload_userprofile_image_box"  title="Upload profile image" class="hide_div">

    <!-- This is the form that our event handler fills -->
    <form id="image_upload_form" action="" method="post" onSubmit="return checkCoords();">
        <input type="hidden" id="x" name="x" />
        <input type="hidden" id="y" name="y" />
        <input type="hidden" id="w" name="w" />
        <input type="hidden" id="h" name="h" />
    </form>

    <div id="image_container">
        <img src="" id="cropbox" />
    </div>

</div>

<div id="show_reply_box"  title="Upload profile image" class="hide_div">
    <div id="show_reply_message">&nbsp;</div>
</div>
