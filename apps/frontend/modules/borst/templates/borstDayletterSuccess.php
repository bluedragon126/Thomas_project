<script language="javascript" type="text/javascript">
    $(window).load(function(){


        var checkRight = $(".rightbanner").height();
        var checkLeft = $(".btshopleftdiv").height();
	
        if(checkLeft > checkRight)
        {
            $(".rightbanner").css({"height":checkLeft+"px"});
        }	
        else
        {
            $(".btshopleftdiv").css({"height":checkRight+"px"});
        }
        var leftDiv = $('.inner-page-contetn-left').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.inner-page-contetn-left').css('border-right','1px solid #d3d3d3');
        }
       
    });
    $(document).ready(function () {
        $('.email_checkbox_1').jqTransform(); 
    });
     
</script>
<div class="maincontentpage">
    <div class="inner-page-contetn-left">        
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstNewsletter')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title">Dagsbrevet: Börstjänaren Just Nu!</div>
                <!-- <div class="shoph3 widthall">Rubrik här då</div>-->
                <?php include_partial('global/body_head', array('rub' => "")) ?>
                <?php //include_partial('global/front_form_header',array('greenmsg'=>$greenmsg,'errormsg'=>$errormsg,'host_str'=>$host_str))  ?>
                <div class="blank_10h widthall">&nbsp;</div>
                <div class="whp_preamble">Här kan du som  registrerad användare teckna eller säga upp det kostnadsfria dagsbrevet &quot;Börstjänaren Just Nu!&quot; </div>
                
                
                <br />
                Klicka i, respektive klicka ur, rutan nedan och spara ditt val med Registrera-knappen, för att på- eller avanmäla dig till våra dagsutskicksregister! (<strong>OBS:</strong> Du behöver vara inloggad!) <a class="main_link_color" href="javascript: openwindow()">Vår epost-policy.
                    <br /></a>
                    
                <div class="blank_7h widthall">&nbsp;</div>
                
                <div class="float_left widthall margin_bottom_2" id="my_e_newsletter_reply">
				<?php echo html_entity_decode($msg); ?></div>

                <?php $pren = $sf_params->get('pren'); ?>
                <form name="my_e_newsletter_form" id="my_e_newsletter_form" method="post" action="">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
                    <input type="hidden" id="email" name="email" value="<?php echo $email_arr[0]; ?>" />
                    <div class="blank_7h widthall">&nbsp;</div>
                    <?php foreach ($all_type as $data): ?>
                        <?php if ($data->id == 4) { ?>
                            <div class="float_left">
                                <div class="float_left email_checkbox_1"><input type="checkbox" name="news[]" value="<?php echo $data->id; ?>" <?php if ($status_arr[$data->id] == 1) echo "checked"; ?> /></div>
                                <div class="float_left lineht_25 email_checkbox_2"><i><span class="float_left radio_button_text pad_top_3 " style = "color:#f15822"><?php echo $data->newsletter_name; ?></span></i></div>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
            <!--<span class="float_left widthall"><input type="radio" name="pren" id="radio1" value="0" <?php //if ($pren == 0) echo("checked");   ?>  class="radio"/>
            Påbörja</span>
            <div class="blank_3h widthall">&nbsp;</div>
            <span class="float_left widthall"><input type="radio" name="pren" id="radio1" value="1" <?php //if ($pren == 1) echo("checked");   ?>  class="radio"/>
                Avsluta</span>-->
                
                    <div class="blank_3h widthall">&nbsp;</div>
                    <!--<input id="newsletter_email" name="newsletter_email" value="Fyll i din e-post här!"  onFocus="clearNewsletterEmailField(this)" onBlur="fillNewsletterEmailField()" type="text" class="form_input width_277 contactus-inputs" /><br />-->
                    <div class="blank_7h widthall">&nbsp;</div>
                    <div class="registerbtn" id="newsletter_form_button_div">
                        <div class="float_left">
                            <input type="button" class="newsletter_reg submit " value="" name="newsletter_form_button" id="newsletter_form_button_1"  onclick="saveMyENewsletterChangesDaily()"/>
                        </div>
                    </div>
                </form>
                
                <div class="blank_1h widthall">
                    
                </div>
                


<!--<span class="main_link_color float_left widthall"><a class="main_link_color cursor" href="/FX-update/FX-update.pdf">Läs senaste numret av FX-update här!!</a><br /></span>
<span class="main_link_color float_left widthall"><a class="main_link_color cursor" href="/BT-ATLarge/BTAtLarge.pdf">Läs senaste numret av BT-At Large här!</a><br /></span>
<span class="main_link_color float_left widthall"><a class="main_link_color cursor" href="">Läs gamla nummer av våra magasin!</a><br /></span>!-->
                
                

              <div class="float_left widthall">                    
                  <!--<div class="subcribediv"><a class="main_link_color" href="BT-nytt.html"><img src="/images/Subscribeimg_1.jpg" border="0" alt="imag"/></a>
            
            <a class="main_link_color" href="BT-nytt.html">BT-nytt</a></div>
                            <div class="subcribediv"><a class="main_link_color" href="FX-update.html"><img src="/images/Subscribeimg_3.jpg" border="0" alt="imag" /></a><a class="main_link_color" href="FX-update.html">FX-update</a></div>
                             <div class="subcribediv"><a class="main_link_color" href="BT-At large.html"><img src="/images/Subscribeimg_4.jpg" border="0" alt="imag" /></a><a class="main_link_color" href="BT-At large.html">BT-At large</a></div>!-->
                </div>
                
 <div class="blank_25h widthall">

                <div class="float_left">
               
                
                                    
                        
                </div>

            </div>
<br />
<p><strong>OBS!</strong> 
<br />
Prenumerationen på <i>Börstjänarens veckobrev</i> administreras  på <a href="/borst/borstNewsletter"> separat sida.</a></p><br>
<i>Dagsbrevet</i> utkommer normalt varje vardag utom måndag till användare som <a href="/sbt_user/sbtNewRegistration">registrerat ett (gratis) konto</a> på Börstjänaren och valt att teckna sig för detta brev. 
                
                
                <br />
                        <br />
                
                
              <a href="https://www.borstjanaren.se/borst/articleList/obj_id/1795"> <img src="/images/new_home/BT_just_nu_head.png" border="0" alt="logo" width="180" style="margin-right:100%; margin-top:10px; margin-bottom:-6px" /></a>
               
                 
                <!--<a href="BT-nytt.html"><font color="#c72127" line-height="35px">BT-NYTT</font></a> ger dig pedagogiska analyser, skarpa aktietips och underhållande krönikor.<br />
                <div class="blank_3h widthall">&nbsp;</div>
                
                          <a href="BT-At large.html"><font color="#c72127">BT AT LARGE</font></a> – kostnadsfri inblick i de intressantaste aktierna på Stockholm Large Cap.<br />
                      <div class="blank_3h widthall">&nbsp;</div>
                          <a href="FX-update.html"><font color="#c72127">FX-UPDATE</font></a> ger dig full koll på världens valutamarknader.
                      <br />!-->
                    <br />  
             <em>Aktuell information från Börstjänaren!</em>
                <br />

            <?php echo include_partial('global/inner_bottom_footer'); ?>
        </div>
    </div>
    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
     
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4,'set_margin' => '1')) ?>
        </div>
    </div>
</div>

