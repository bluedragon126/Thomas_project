<!--[if IE 7]>
<style>

#tableform tr{ float:left; position:relative;}
#tableform td.td_input{
float:left;
position:relative;
width:34%;
}
#tableform td.td_input_right {
    float: left;
    margin-left: 4px;
    padding-top: 4px;
    position: relative;
    width: auto;
}

.checkbox{ margin:0px; margin-left:-4px; margin-top:-4px;padding:0px;}
</style>
<![endif]-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('form.user_reg').jqTransform();
       
        $(".user_reg #username,.user_reg #email,.user_reg #firstname,.user_reg #lastname,.user_reg #street,.user_reg #phone").live("blur",function(){
            var _this = $(this);
            var str = $(_this).val();
            if(str == ""){
                $(_this).addClass("redBorder");
                $(_this).next().next().find("li").text("Nödvändig");
            }else{
                $(_this).removeClass("redBorder");
                $(_this).next().next().find("li").text("");
            }
        });
       
        $(".user_reg #username").live("blur",function(){
            var _this = $(this);
            $(_this).next().removeClass("registrationValidField");
            if($(_this).val() != ""){
                $.ajax({
                    url:'/sbt_user/getUserbyUsername?uname='+$(_this).val(),
                    success:function(data)
                    {
                        if(data != 0){
                            $(_this).addClass("redBorder");
                            $(_this).next().next().find("li").text(data);
                        }else{
                            $(_this).removeClass("redBorder");
                            $(_this).next().addClass("registrationValidField");
                            $(_this).next().next().find("li").text("");
                        }
                    }
                });
            }else{
                $(_this).addClass("redBorder");
                $(_this).next().next().find("li").text("Vänligen ange användarnamn.");
            }
        });
       
        $(".user_reg #email").live("blur",function(){
            var _this = $(this);
            $(_this).next().removeClass("registrationValidField");
            if($(_this).val() != ""){
                $.ajax({
                    url:'/sbt_user/getUserbyEmail?email='+$(_this).val(),
                    success:function(data)
                    {
                        if(data != 0){
                            $(_this).addClass("redBorder");
                            $(_this).next().next().find("li").text(data);
                        }else{
                            $(_this).removeClass("redBorder");
                            $(_this).next().addClass("registrationValidField");
                            $(_this).next().next().find("li").text("");
                        }
                    }
                });
            }else{
                $(_this).addClass("redBorder");
                $(_this).next().next().find("li").text("Vänligen ange en giltig e-postadress");
            }
        });
       
        $(".user_reg #password").live("blur",function(){
            var _this = $(this);
            $(_this).next().removeClass("registrationValidField");
            var str = $(_this).val();
            if(str != ""){
                if(str.length < 6){
                    $(_this).addClass("redBorder");
                    $(_this).next().next().find("li").text("Minst 6 tecken krävs");
                }else{
                    $(_this).removeClass("redBorder");
                    $(_this).next().addClass("registrationValidField");
                    $(_this).next().next().find("li").text("");
                }
            }else{
                $(_this).addClass("redBorder");
                $(_this).next().next().find("li").text("Vänligen ange ett lösenord");
            }
        });       
       
        $(".user_reg #password_again").live("blur",function(){
            var _this = $(this);
            $(_this).next().removeClass("registrationValidField");
            var str = $(_this).val();
            var str2 = $(".user_reg #password").val();
            if(str == "" ){
                $(".user_reg #password_again").addClass("redBorder");
                $(".user_reg #password_again").next().next().find("li").text("Vänligen upprepa ditt lösenord");
            }else if(str != str2){
                $(".user_reg #password_again").addClass("redBorder");
                $(".user_reg #password_again").next().next().find("li").text("De två lösenorden måste vara samma");
            }else{
                $(_this).removeClass("redBorder");
                $(_this).next().addClass("registrationValidField");
                $(_this).next().next().find("li").text("");
            }
        });
        
        $(".user_reg #firstname,.user_reg #lastname,.user_reg #street,.user_reg #phone").live("blur",function(){
            var _this = $(this);
            $(_this).next().removeClass("registrationValidField");
            var str = $(_this).val();
            if(str == "" ){
                $(_this).addClass("redBorder");
                $(_this).next().next().find("li").text("Nödvändig");
            }else{
                $(_this).removeClass("redBorder");
                $(_this).next().addClass("registrationValidField");
                $(_this).next().next().find("li").text("");
            }
        });
        
        $(".user_reg #firstname").live("focus",function(){
            if($("#year_of_birth").val() == 0){
                $(".user_reg #year_of_birth").parents("div").next().next().removeClass("registrationValidField");
                $(".user_reg #year_of_birth").parents("div").parents("div").next().find("li").text("Vänligen ange födelseår");
            }else{
                $(".user_reg #year_of_birth").parents("div").next().next("span").addClass("registrationValidField");
                $(".user_reg #year_of_birth").parents("div").parents("div").next().find("li").text("");
            }
            if($("[name=gender]").prev().hasClass("jqTransformChecked")){
                $("[name=gender]:first").parents("td").next().find("li").text("");
                $(this).parents("td").next().find("span").addClass("registrationValidField");
            }else{
                $("[name=gender]:first").parents("td").next().find("li").text("Vänligen ange kön");
                $("[name=gender]").parents("td").next().find("span:first").removeClass("registrationValidField");
            }
        });
        
        $(".user_reg #zipcode").live("blur",function(){
            var _this = $(this);
            $(_this).next().next().removeClass("registrationValidField");
            zipCityValidation(_this);
        });
       
        $(".user_reg #city").live("blur",function(){
            var _this = $(this).prev();
            $(_this).next().removeClass("registrationValidField");
            zipCityValidation(_this);
        });
       
        $(".user_reg #usernamealias").live("blur",function(){
            var _this = $(this);
            $(_this).next().removeClass("registrationValidField");
            if($(_this).val() != ""){
                $.ajax({
                    url:'/sbt_user/getUserbyUserAlias?uname='+$(_this).val(),
                    success:function(data)
                    {
                        if(data != 0){
                            $(_this).addClass("redBorder");
                            $(_this).next().next().find("li").text(data);
                        }else{
                            $(_this).removeClass("redBorder");
                            $(_this).next().addClass("registrationValidField");
                            $(_this).next().next().find("li").text("");
                        }
                    }
                });
            }else{
                //$(_this).addClass("redBorder");
                //$(_this).next().next().find("li").text("Nödvändig");
            }
        });
       
        $("[name=gender]").live("click",function(){
            $("[name=gender]").parents("td").next().find("span:first").removeClass("registrationValidField");
            $("[name=gender]:first").parents("td").next().find("li").text("");
            $(this).parents("td").next().find("span:first").addClass("registrationValidField");
        });
       
        function zipCityValidation(_this){
            var str = $(_this).val();
            var _this2 = $(".user_reg #city");
            var str2 = $(".user_reg #city").val();
           
            if(str2 == "" || str == ""){
                $(_this2).next().removeClass("registrationValidField");
                $(_this2).next().next().find("li").text("Vänligen ange postnr / ort");
            }else{
                $(_this2).next().addClass("registrationValidField");
                $(_this2).removeClass("redBorder");
                $(_this).removeClass("redBorder");
                $(_this2).next().next().find("li").text("");
            }
           
            if(str2 == ""){
                $(_this2).addClass("redBorder");
            }else{
                $(_this2).removeClass("redBorder");
            }
            if(str == ""){
                $(_this).addClass("redBorder");
            }else{
                $(_this).removeClass("redBorder");
            }
        }        
       
    });
//    tinyMCE.init({
//        selector: '#sbt_blog_profile_my_own_writing',
//        width : 425
//    });
</script>
<form class="user_reg" name="user_reg" action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="blog_info_div" id="blog_info_div" value="<?php echo $sf_params->get('blog_info_div') ?>" />
    <div class="innerleftdiv">
        <div class="breadcrumb">
            <ul>
                <li>
                    <?php
                    include_component('isicsBreadcrumbs', 'show', array(
                        'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'sbt_user/sbtNewRegistration')
                    ))
                    ?>
                </li>
            </ul>
        </div>
        <div class="btshopleftdiv">
            <div class="btshopleftdivinner">
                <div class="heading_red whp_title"><?php echo __('Registrera dig nedan') ?></div>
                <div class="whp_preamble">Att registrera sig på Börstjänaren är gratis och du förbinder dig inte till
                    någonting.<span class="main_link_color"> <a class="main_link_color cursor" id="reg_read_more">Läs mer</a>&nbsp;<img src="/images/addplusicon.png" alt="addplus"  class="icontop3" id="reg_help_plus" width="18"/></span></div>
                <div id="registration_help_section">
                <br>
                    <div>
                        <span class="whp_heading">Som registrerad användare kan du utan kostnad:</span>
                        <ul>
                            <li>Ta del av fler artiklar och analyser</li>
                            <li>Posta inlägg till medlemschatten BT-Forum</li>
                            <li>Söka bland Börstjänarens artiklar</li>
                            <li>Ta del av Börstjänarens nyhetsbrev och utskick</li>
                            <li>Ta del av Börstjänarens inspelade webinarier</li>
                        </ul>
                    </div>
                    <div class="blank_15h widthall">&nbsp;</div>
                </div>
                <div class="blank_5h widthall">&nbsp;</div>
                <div class="float_left widthall">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="tableform">
                        <tr>
                            <td  class="form_heading" colspan="2"><?php echo __('E-post &amp; login') ?></td>
                        </tr>
                        <tr>
                            <td class="reg_line">&nbsp;</td>
                        </tr>
                        <tr>
                            <td  class="td_input" ><div class="form_labels"><?php echo __('Användarnamn') ?></div>
                            </td>
                            <td  class="td_input_right margin_bottom_2m" align="left">
                                <?php echo $userForm->renderHiddenFields() ?> <?php echo $profileForm->renderHiddenFields() ?> <?php echo $sbtBlogProfile->renderHiddenFields() ?> <?php echo $userForm['username']->render(array('id' => 'username', 'class' => 'form_input width_277 contactus-inputs')) ?>
                                <span>&nbsp;</span>
                                <div class="error_list_outer">
                                    <ul class="error_list">
                                        <li><?php echo $userForm['username']->renderError(); ?></li>
                                    </ul>
                                </div>
                        </tr>
                        <tr>
                            <td  class="td_input" ><div class="form_labels"><?php echo __('E-post') ?></div></td>
                            <td  class="td_input_right margin_bottom_2m" align="left">
                                <?php echo $profileForm['email']->render(array('id' => 'email', 'class' => 'form_input width_277 contactus-inputs')); ?>
                                <span>&nbsp;</span>
                                <div class="error_list_outer">
                                    <ul class="error_list">
                                        <li><?php echo $email_red; ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr>
                            <td  class="td_input" ><div class="form_labels"><?php echo __('Lösenord (minst 6 tecken)') ?></div></td>
                            <td  class="td_input_right margin_bottom_2m" align="left"><?php echo $userForm['password']->render(array('id' => 'password', 'class' => 'form_input width_277 contactus-inputs')); ?>
                                <span>&nbsp;</span>
                                <div class="error_list_outer">
                                    <ul class="error_list">
                                        <li><?php echo $userForm['password']->renderError(); ?></li>
                                    </ul>
                                </div>
                        </tr>
                        <tr>
                            <td  class="td_input" ><div class="form_labels"><?php echo __('Upprepa lösenord') ?></div></td>
                            <td  class="td_input_right margin_bottom_2m" align="left"><?php echo $userForm['password_again']->render(array('id' => 'password_again', 'class' => 'form_input width_277 contactus-inputs')) ?>
                                <span>&nbsp;</span>
                                <div class="error_list_outer">
                                    <ul class="error_list">
                                        <li><?php echo $userForm['password_again']->renderError(); ?></li>
                                    </ul>
                                </div>
                        </tr>
                        <div class="blank_12h widthall"></div>
                        <tr class="">
                            <td class="td_input pad_rgt_5">&nbsp;</td>
                            <td  class="" colspan="2" >
                                <div class="float_left">
                                    <?php echo $profileForm['year_of_birth']->render(array('id' => 'year_of_birth', 'class' => 'form_labels padding_top_7_5px')) ?> &nbsp; <span class = "form_labels  float_left mrg_lft_5"><?php echo __('Födelseår') ?></span> <?php echo $profileForm['year_of_birth']->renderError() ?>
                                    <span>&nbsp;</span>
                                    <div class="blank_12h widthall">&nbsp;</div>
                                </div>
                                <div class="error_list_outer float_right">
                                    <ul class="error_list">
                                        <li><div class="blank_12h widthall">&nbsp;<?php echo $birth_year_error; ?></div></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr class="mrg_top_5">
                            <td class="td_input pad_rgt_5">&nbsp;</td>
                            <td>
                                <?php $gender = $sf_params->get('gender') ? $sf_params->get('gender') : 0; ?>
                                <label class="margin_top_none">
                                    <input type="radio" class="radio" name="gender" value="2" <?php if ($gender == 2) echo "checked"; ?> />
                                </label>
                                <span class="form_labels_reg_radio float_left" id="radio_1"><?php echo __('Kvinna') ?></span></td>
                            <td align="left">
                                <span class="margin_reg_ey">&nbsp;</span>
                                <div class="error_list_outer float_left">
                                    <ul class="error_list" style="margin-top: -5px;">
                                        <li><?php echo $gender_error; ?></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_input pad_rgt_5">&nbsp;</td>
                            <td>
                                <label class="mrg_top_2">
                                    <input type="radio" class="radio" name="gender" value="1" <?php if ($gender == 1) echo "checked"; ?> />
                                </label>
                                <span class = "form_labels float_left" id="radio_2"><?php echo __('Man') ?></span>
                            </td>
                            <td  align="left">
                                <span class="margin_reg_ei">&nbsp;</span>
                                &nbsp;</td>
                        </tr>
                        <tr>
                            <td  class="form_heading" colspan="2"><?php echo __('Adress') ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="reg_line">&nbsp;</td>
                        </tr>
                        <tr>
                            <td  class="td_input" ><div class="form_labels"><?php echo __('Förnamn') ?></div></td>
                            <td  class="td_input_right margin_bottom_2m" align="left">
                                <?php echo $profileForm['firstname']->render(array('id' => 'firstname', 'class' => 'form_input width_277 contactus-inputs')) ?>
                                <span>&nbsp;</span>
                                <div class="error_list_outer">
                                    <ul class="error_list">
                                        <li><?php echo $firstname_error; ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr>
                            <td  class="td_input" ><div class="form_labels"><?php echo __('Efternamn') ?></div></td>
                            <td  class="td_input_right margin_bottom_2m" align="left">
                                <?php echo $profileForm['lastname']->render(array('id' => 'lastname', 'class' => 'form_input width_277 contactus-inputs')) ?>
                                <span>&nbsp;</span>
                                <div class="error_list_outer">
                                    <ul class="error_list">
                                        <li><?php echo $lastname_error ?></li>
                                    </ul>
                                </div></td>
                        </tr>

                        <?php if ($profileForm->isNew()) {
                            ?>
                            <tr>
                                <td  class="td_input" ><div class="form_labels"><?php echo __('Forumsignatur') ?></div></td>
                                <td  class="td_input_right margin_bottom_2m" align="left">
                                    <?php echo $profileForm['usernamealias']->render(array('id' => 'usernamealias', 'class' => 'form_input width_277 contactus-inputs', 'placeholder' => 'Fyll i om du vill vara anonym på Börstjänaren')) ?>
                                    <span>&nbsp;</span>
                                    <div class="error_list_outer">
                                        <?php echo $profileForm['usernamealias']->renderError(); ?>
                                        <ul class="error_list">
                                            <li><?php echo $firstname_error; ?></li>
                                        </ul>
                                    </div></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td  class="td_input" ><div class="form_labels"><?php echo __('Gatuadress') ?></div></td>
                            <td  class="td_input_right margin_bottom_2m" align="left">
                                <?php echo $profileForm['street']->render(array('id' => 'street', 'class' => 'form_input width_277 contactus-inputs')) ?>
                                <span>&nbsp;</span>
                                <div class="error_list_outer">
                                    <ul class="error_list">
                                        <li><?php echo $street_error ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr>
                            <td  class="td_input" ><div class="form_labels"><?php echo __('Postnr') ?> / <?php echo __('Ort') ?></div></td>
                            <td  class="td_input_right margin_bottom_2m" align="left">
                                <?php echo $profileForm['zipcode']->render(array('id' => 'zipcode', 'class' => 'form_input width65 contactus-inputs float_left margin_rgt_4', 'size' => '10', 'maxlength' => '10')) ?> <?php echo $profileForm['city']->render(array('id' => 'city', 'class' => 'form_input width105 contactus-inputs float_left', 'size' => '20', 'maxlength' => '20')) ?>
                                <span class="float_left">&nbsp;</span>
                                <div class="error_list_outer clearAll">
                                    <ul class="error_list">
                                        <li><?php echo $zipcode_error ?><?php echo $city_error ? ' / ' . $city_error : '' ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr>
                            <td  class="td_input" ><div class="form_labels"><?php echo __('Telefon') ?></div></td>
                            <td  class="td_input_right margin_bottom_2m" align="left">
                                <?php echo $profileForm['phone']->render(array('id' => 'phone', 'class' => 'form_input width_277 contactus-inputs', 'size' => '32', 'maxlength' => '32')) ?>
                                <span>&nbsp;</span>
                                <div class="error_list_outer">
                                    <ul class="error_list">
                                        <li><?php echo $phone_error ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr>
                            <td class="td_input pad_rgt_5">&nbsp;</td>
                            <td  class="td_input"><?php echo $profileForm['land']->render(array('id' => 'phone', 'class' => 'inputcountry',)) ?></td>
                            <td  class="td_input_right margin_bottom_2m" align="left">&nbsp;<?php echo $profileForm['land']->renderError() ?></td>
                        </tr>
                        <tr>
                            <td  class="form_heading" colspan="2"><?php echo __('Nyhetsbrev') ?></td>
                        </tr>
                        <tr>
                            <td class="reg_line">&nbsp;</td>
                        </tr>
                        <tr>
                            <td  colspan="2"><div class="blank_5h widthall">&nbsp;</div>
                                <label>
                                    <input checked= "checked" class="checkbox" type="checkbox" id="nyhetsbrev" name="nyhetsbrev" value="ON" <?php echo $checked_brev; ?>>
                                </label>
                                <span class="float_left width_514"><?php echo __('Ja tack, jag vill ha Börstjänarens kostnadsfria dagsbrev <strong>"Börstjänaren JUST NU!"</strong>') ?> <?php echo __('<br/>(Rekommenderas för att få ut mesta möjliga av Börstjänaren!)') ?> &nbsp;<a class="main_link_color" href="javascript: openwindow()"><?php echo __('Vår epost-policy.') ?></a></span></td>
                        </tr>
                        <tr>
                            <td  colspan="2"><div class="blank_nhb widthall">&nbsp;</div>
                                <label>
                                    <input checked= "checked" class="checkbox" type="checkbox" id="nyhetsbrev" name="nyhetsbrev_pub" value="ON" <?php echo $checked_brev_pub; ?>>
                                </label>

                                <span class="float_left width_514"><?php echo __('Ja, tack jag vill ha Börstjänarens kostnadsfria veckobrev, <strong>"VM-update"</strong> samt <strong>"Veckans trejd!"</strong>') ?> <?php echo __('(Rekommenderas för att få ut det bästa av Börstjänaren!)') ?> &nbsp;<a class="main_link_color" href="javascript: openwindow()"><?php echo __('Vår epost-policy.') ?></a></span></td>
                        </tr>
                        <tr>
                            <td  colspan="2">&nbsp;</td>
                        </tr>

                        <tr>
                            <td  class="blank_10h" colspan="2">&nbsp;</td>

                        </tr>


                        <tr class="blog_rights">              
                            <td  class="blank_24h" colspan="2"></td>

                        </tr>
                        <tr class="blog_rights">

                            <td  class="" colspan="2">
                                <?php echo __('Vänligen besvara följande frågor:') ?></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_10h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('1. Med egna ord') ?></td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall"  colspan="2">
                                <span class="float_left"><?php //echo $sbtBlogProfile['my_own_writing']->render(array('id' => 'my_own_writting', 'class' => 'contactus-inputs width_425_height_80'))  ?>
                                    <div class="testimonial forum_btn_set padding_0">
                                        <div id="textarea_div">
                                            <?php echo $sbtBlogProfile['my_own_writing']->render(array('class' => 'form_input_textarea contactus-inputs my_own_writing')); ?>
                                        </div>
                                    </div>
                                </span>
                                <div class="error_list_outer">
                                    <ul class="blog_rights_error">
                                        <li><?php echo $my_own_writing_error ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('2. Titel (Ange vad som skall stå ovanför din profilbild)') ?></td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfile['user_title']->render(array('maxlength' => '50', 'id' => 'user_title', 'class' => 'form_select contactus-inputs width_425')) ?></div>
                                <div class="for_form_error mrg_lft_10"><?php echo $user_title_error ?></div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('3. När jag inte är på börsen') ?></td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfile['not_on_stock']->render(array('id' => 'not_on_stock', 'class' => 'form_input contactus-inputs width_425')) ?></div>
                                <div class="for_form_error mrg_lft_10"><?php echo $not_on_stock_error ?></div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('4. Typ av spekulant?') ?></td>
                        </tr>
                        <?php $type_of_speculator = $sf_params->get('type_of_speculator') ? $sf_params->get('type_of_speculator') : ''; ?>
                        <tr class="blog_rights">
                            <td class="padtdsmall"   colspan="2"><div class="radiodiv">
                                    <input type="radio" name="type_of_speculator" value="trader"  class="radio" <?php if ($type_of_speculator == 'trader') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"><?php echo __('Trejder') ?></span></div>
                                <div class="radiodiv">
                                    <input type="radio" name="type_of_speculator" value="investor"  class="radio" <?php if ($type_of_speculator == 'investor') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"> <?php echo __('Investerare') ?></span></div>
                                <div class="radiodiv">
                                    <input type="radio" name="type_of_speculator" value="gambler"  class="radio" <?php if ($type_of_speculator == 'gambler') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"> <?php echo __('Gambler') ?></span> </div>
                                <div class="error_list_outer">
                                    <ul class="blog_rights_error">
                                        <li><?php echo $type_of_speculator_error; ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('5. Vilken mäklare använder du?') ?></td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall"   colspan="2"><div class="float_left"><?php echo $sbtBlogProfile['broker_used']->render(array('id' => 'broker_used', 'class' => 'form_input contactus-inputs width_425')) ?></div>
                                <div class="for_form_error mrg_lft_10"><?php echo $broker_used_error ?></div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('6. Vad handlar du?') ?></td>
                        </tr>
                        <?php $trade_arr = explode(',', $my_trade_str); ?>
                        <tr class="blog_rights">
                            <td class="padtdsmall"  colspan="2" ><div class="radiodiv">
                                    <input type="checkbox" name="my_trade[]" value="stocks"  class="radio" <?php if (in_array('stocks', $trade_arr)) echo "checked"; ?> />
                                    <span class="float_left radio_button_text reg_type_chkbox"><?php echo __('Aktier') ?></span></div>
                                <div class="radiodiv">
                                    <input type="checkbox" name="my_trade[]" value="commodities"  class="radio" <?php if (in_array('commodities', $trade_arr)) echo "checked"; ?> />
                                    <span class="float_left radio_button_text reg_type_chkbox"><?php echo __('Råvaror') ?> </span></div>
                                <div class="radiodiv">
                                    <input type="checkbox" name="my_trade[]" value="currencies"  class="radio" <?php if (in_array('currencies', $trade_arr)) echo "checked"; ?> />
                                    <span class="float_left radio_button_text reg_type_chkbox"><?php echo __('Valutor') ?> </span> </div>
                                <div class="error_list_outer">
                                    <ul class="blog_rights_error">
                                        <li><?php echo $my_trade_error ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('7. Sysselsättning?') ?></td>
                        </tr>
                        <?php $my_occupation = $sf_params->get('my_occupation') ? $sf_params->get('my_occupation') : ''; ?>
                        <tr class="blog_rights">
                            <td class="padtdsmall" id="user_occ" colspan="2"><div class="radiodiv">
                                    <input type="radio" name="my_occupation" value="student"  class="radio" <?php if ($my_occupation == 'student') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"><?php echo __('Student') ?></span></div>
                                <div class="radiodiv">
                                    <input type="radio" name="my_occupation" value="employed"  class="radio" <?php if ($my_occupation == 'employed') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"> <?php echo __('Anställd') ?></span></div>
                                <div class="radiodiv">
                                    <input type="radio" name="my_occupation" value="self_employed"  class="radio" <?php if ($my_occupation == 'self_employed') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"> <?php echo __('Egen företagare') ?></span> </div>
                                <div class="radiodiv">
                                    <input type="radio" name="my_occupation" value="between_jobs"  class="radio" <?php if ($my_occupation == 'between_jobs') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"> <?php echo __('Mellan jobb') ?></span> </div>
                                <div class="radiodiv">
                                    <input type="radio" name="my_occupation" value="retired"  class="radio" <?php if ($my_occupation == 'retired') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"> <?php echo __('Pensionerad') ?></span> </div>
                                <div class="radiodiv">
                                    <input type="radio" name="my_occupation" value="other"  class="radio" <?php if ($my_occupation == 'other') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"><?php echo __('Annat') ?></span> </div>
                                <div class="error_list_outer">
                                    <ul class="blog_rights_error">
                                        <li><?php echo $my_occupation_error ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall" colspan="2"><div id="occ_container" class="<?php echo $my_occupation == 'other' ? 'show_div' : 'hide_div'; ?>"><input type="text" id="other_occ" name="other_occ" value="<?php echo $sf_params->get('other_occ') ? $sf_params->get('other_occ') : ''; ?>" class="form_input contactus-inputs width_120" />&nbsp;<span class="redcolor"><?php echo $other_occ_error ?></span></div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('8. Storlek på portfölj?') ?></td>
                        </tr>
                        <?php $is_millionaire = $sf_params->get('is_millionaire') ? $sf_params->get('is_millionaire') : ''; ?>
                        <tr class="blog_rights">
                            <td class="padtdsmall" colspan="2" ><div class="radiodiv">
                                    <input type="radio" name="is_millionaire" value="milli_yes"  class="radio" <?php if ($is_millionaire == 'milli_yes') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"><?php echo __('Stor') ?></span></div>
                                <div class="radiodiv">
                                    <input type="radio" name="is_millionaire" value="milli_not_yet"  class="radio" <?php if ($is_millionaire == 'milli_not_yet') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"> <?php echo __('Liten') ?></span></div>
                                <div class="radiodiv">
                                    <input type="radio" name="is_millionaire" value="milli_varies"  class="radio" <?php if ($is_millionaire == 'milli_varies') echo "checked"; ?>/>
                                    <span class="float_left radio_button_text"> <?php echo __('Lagom') ?></span> </div>
                                <div class="error_list_outer">
                                    <ul class="blog_rights_error">
                                        <li><?php echo $is_millionaire_error ?></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('9. Min bästa affär') ?></td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall"  colspan="2"><div class="float_left" id="texta1"><?php echo $sbtBlogProfile['my_best_trade']->render(array('id' => 'my_best_trade', 'class' => 'form_input_textarea contactus-inputs width_425')) ?></div>
                                <div class="for_form_error mrg_lft_10"><?php echo $my_best_trade_error ?></div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('10. Min sämsta affär') ?></td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall"  colspan="2"><div class="float_left"><?php echo $sbtBlogProfile['my_worst_trade']->render(array('id' => 'my_worst_trade', 'class' => 'form_input_textarea contactus-inputs width_425')) ?></div>
                                <div class="for_form_error mrg_lft_10"><?php echo $my_worst_trade_error ?></div></td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1" colspan="2"><?php echo __('11. Mina fem bästa rekar') ?></td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall"  colspan="2"><input type="text" id="recomm_1" name="recomm_1" value="<?php echo $sf_params->get('recomm_1'); ?>" class="form_input contactus-inputs width_150" />

                                <input type="text" id="recomm_2" name="recomm_2" value="<?php echo $sf_params->get('recomm_2'); ?>" class="form_input contactus-inputs width_150" />

                                <input type="text" id="recomm_3" name="recomm_3" value="<?php echo $sf_params->get('recomm_3'); ?>" class="form_input contactus-inputs width_150"  />              </td>
                        </tr>
                        <tr class="blog_rights ">
                            <td  class="blank_2h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall"  colspan="2"><input type="text" id="recomm_4" name="recomm_4" value="<?php echo $sf_params->get('recomm_4'); ?>" class="form_input contactus-inputs width_150" />

                                <input type="text" id="recomm_5" name="recomm_5" value="<?php echo $sf_params->get('recomm_5'); ?>" class="form_input contactus-inputs width_150" />              </td>
                        </tr>
                        <tr class="blog_rights" >
                            <td  class="blank_15h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td  class="form_labels_quest lineht_2em padding_top_10 padding_bottom_1"  colspan="2"><?php echo __('12. Min blankningslista') ?></td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall"  colspan="2"><input type="text" id="shortlist_1" name="shortlist_1" value="<?php echo $sf_params->get('shortlist_1'); ?>" class="form_input contactus-inputs width_150" />

                                <input type="text" id="shortlist_2" name="shortlist_2" value="<?php echo $sf_params->get('shortlist_2'); ?>" class="form_input contactus-inputs width_150" />

                                <input type="text" id="shortlist_3" name="shortlist_3" value="<?php echo $sf_params->get('shortlist_3'); ?>" class="form_input contactus-inputs width_150" />              </td>
                                 
                        </tr>
                        <tr class="blog_rights">
                            <td  class="blank_2h" colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="blog_rights">
                            <td class="padtdsmall" colspan="2"><input type="text" id="shortlist_4" name="shortlist_4" value="<?php echo $sf_params->get('shortlist_4'); ?>" class="form_input contactus-inputs width_150" />

                                <input type="text" id="shortlist_5" name="shortlist_5" value="<?php echo $sf_params->get('shortlist_5'); ?>" class="form_input contactus-inputs width_150" />                                </td>
                        </tr>
                        <tr>
                            <td  class="blank_nhb2" colspan="2"></td>
                        </tr>

                        </tbody>
                    </table>

                    <div class="registerbtn">
                        <div class="float_left reg_btn_mrg">
                            <input type="submit" class="reg submit" value="" name="submit" />
                        </div>
                    </div>
                </div>
                <?php echo include_partial('global/inner_bottom_footer') ?>
            </div>

        </div>
    </div>
</form>
<div class="rightbanner margin_top_none">
    <div class="home_ad_r float_left font_size_12">Annons</div>
    <div id="whitepage_ads">
        <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
    </div>
</div>