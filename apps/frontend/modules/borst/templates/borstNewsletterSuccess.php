<script language="javascript" type="text/javascript">
    $(document).ready(function(){
       $('#newsletter_form').jqTransform(); 
    });
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
</script>
<div class="maincontentpage">
    <div class="inner-page-contetn-left" style="border:none;">        
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
                <div class="whp_title">Veckobrev – anmäl dig här</div>
                <!-- <div class="shoph3 widthall">Rubrik här då</div>-->
                <?php include_partial('global/body_head', array('rub' => "")) ?>
                <?php //include_partial('global/front_form_header',array('greenmsg'=>$greenmsg,'errormsg'=>$errormsg,'host_str'=>$host_str))  ?>
                <div class="blank_10h widthall">&nbsp;</div>
                <div class="whp_preamble">Här kan du teckna dig för en prenumeration på Börstjänarens kostnadsfria veckobrev. På denna sida kan du även, om du så önskar, avsluta din prenumeration.</div>
                
                   <br>
                   
                  

                <a href="http://www.borstjanaren.se/borst/articleList/obj_id/1795"> <img src="/images/new_home/VM-Update.png" style="margin:8px 0 15px" width="300" border="0" alt="imag" /></a>
                
              <div class="float_left widthall">
                    
             <br>  
              <br> 
                
                   <strong>Veckobrevet</strong> utgörs huvudsakligen av det kostnadsfria marknadsbrevet <strong>VM-Update</strong> (utkommer måndagar). Veckobrevet kräver inget          
                        konto på Börstjänaren.     
                
             

                <!--<a href="BT-nytt.html"><font color="#c72127" line-height="35px">BT-NYTT</font></a> ger dig pedagogiska analyser, skarpa aktietips och underhållande krönikor.<br />
                <div class="blank_3h widthall">&nbsp;</div>
                
                          <a href="BT-At large.html"><font color="#c72127">BT AT LARGE</font></a> – kostnadsfri inblick i de intressantaste aktierna på Stockholm Large Cap.<br />
                      <div class="blank_3h widthall">&nbsp;</div>
                          <a href="FX-update.html"><font color="#c72127">FX-UPDATE</font></a> ger dig full koll på världens valutamarknader.
                      <br />!-->
                <div class="blank_22h widthall">&nbsp;</div>
                
        
                 <br>
                
            
                <b>Fyll i din e-postadress</b> i fältet nedan och klicka REGISTRERA, för att anmäla dig till vårt veckoutskicksregister! <a class="main_link_color" href="javascript: openwindow()">Vår epost-policy.
                    <br /></a>
                <div class="blank_8h widthall">&nbsp;</div>
                <div class="float_left widthall margin_bottom_2" id="newsletter_form_error"><?php
                echo
                html_entity_decode($msg);
                ?></div>

                <?php $pren = $sf_params->get('pren'); ?>
                <form name="newsletter_form" id="newsletter_form" method="post" action="">
                    <div class="blank_10h widthall">&nbsp;</div>
                    <span class="float_left widthall"><input type="radio" name="pren" id="radio1" value="0" <?php if ($pren == 0) echo("checked"); ?>  class="radio"/>Ja tack!</span>
                    <div class="blank_1h widthall">&nbsp;</div>
                    <span class="float_left widthall"><input type="radio" name="pren" id="radio1" value="1" <?php if ($pren == 1) echo("checked"); ?>  class="radio"/>
                        Avsluta</span>
                    <div class="blank_9h widthall">&nbsp;</div>
                    <input id="newsletter_email" name="newsletter_email" value="Fyll i din e-post här!"  onFocus="clearNewsletterEmailField(this)" onBlur="fillNewsletterEmailField()" type="text" class="form_input width_277 contactus-inputs" /><br />
                    <div class="blank_15h widthall">&nbsp;</div>
                    <div class="registerbtn" id="newsletter_form_button_div">
                        <div class="float_left">
                            <input type="button" class="newsletter_reg submit " value="" name="newsletter_form_button" id="newsletter_form_button" />
                        </div>
                    </div>
                </form>
                <div class="blank_9h widthall">
                 
                    
                </div><div class="float_left">
                
                <p><strong>OBS!</strong> 
                         <br>
                         Prenumerationen på <strong>Börstjänarens dagsbrev</strong> administreras (reg. resp. avreg.) på <a href="/borst/borstDayletter"> separat sida.</a> (Båda nyhetsbreven kan även administreras under fliken mina e-postutskick i <a href="/sbt/sbtUserProfile/take_to_profile">"Mitt konto".)</a>
                  </p>
                
                
                
                
                <div class="blank_29h widthall"></div>
                
                
               
                
                
                <div class="whp_heading">Dagsbrevet</div>                
                        <strong>Dagsbrevet</strong> BÖRSTJÄNAREN JUST NU! utkommer normalt varje vardag utom måndag till användare som registrerat ett (gratis) konto på Börstjänaren och valt att <a href="/borst/borstDayletter">teckna sig för detta. </a> 
                        
                     
                        
                         
                        
                        
                    
                    
                       
                    </div>
                    
                    
                    
               
                <!--<div class="subcribediv"><a class="main_link_color" href="BT-nytt.html"><img src="/images/Subscribeimg_1.jpg" border="0" alt="imag"/></a>
            
            <a class="main_link_color" href="BT-nytt.html">BT-nytt</a></div>
                            <div class="subcribediv"><a class="main_link_color" href="FX-update.html"><img src="/images/Subscribeimg_3.jpg" border="0" alt="imag" /></a><a class="main_link_color" href="FX-update.html">FX-update</a></div>
                             <div class="subcribediv"><a class="main_link_color" href="BT-At large.html"><img src="/images/Subscribeimg_4.jpg" border="0" alt="imag" /></a><a class="main_link_color" href="BT-At large.html">BT-At large</a></div>!-->
                </div>
            </div>

            <?php echo include_partial('global/inner_bottom_footer'); ?>
        </div>
    </div>
    
    <div class="rightbanner padding_0 font_0">
        <div class="home_ad_r float_left font_size_12">Annons</div>
        <?php include_partial('global/ad_message') ?>

            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>

