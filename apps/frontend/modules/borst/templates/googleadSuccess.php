
<style type="text/css">
    #contactus .inputBox{ float:left; position:relative; width:184px;}
    #contactus .labelName{ float:left; position:relative;  height:19px; margin-top:7px;}
    #contactus .smallLabelName{ float:left; position:relative;  height:15px; margin-top:7px;}

    .colorstrip{margin:4px 0 0 4px;
                color: #66F; /* for IE7 */ width:auto;
    }
    .for_labels{ margin-top:7px;}
    .shankar{display:none; }
</style>

<form name="contactus" id="contactus" method="post" action="">
    <?php echo $contactEnqForm->renderHiddenFields() ?>
    <div class="maincontentpage">
        <div class="inner-page-contetn-left" style="border:none;">
            <div class="breadcrumb">
                <ul>
                    <li><?php
    include_component('isicsBreadcrumbs', 'show', array(
        'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/contactUs')
    ))
    ?> </li>
                </ul>
            </div>
            <div class="inner_page_divider">&nbsp;</div>
            <div class="mrg_left_70">
                <div class="inner_page_content_main">

                    <?php if ($sent): ?>
                        <script type="text/javascript">
                            window.location = 'http://www.borstjanaren.se/borst/googleadThankyou';
                        </script>
                        <div class="orangetext">
                            <?php echo "Tack för din kursanmälan! Ett bekräftelsemejl har skickat till: " . $email; ?>
                        </div>
                    <?php endif; ?>


                    <div class="whp_title">Kostnadsfri utbildning:<br />
                        <em>Lär dig börshandel av proffs!</em>&nbsp;</div>
                    <div class="blank_10h widthall"></div><div class="blank_10h widthall">&nbsp;</div>
                    <div class="float_left widthall">
                        <div><a class="cursor main_link_color" href="http://www.avafx.com/lp/lp-sv/?tag=25581&target=_blank"><img src="/images/avafx_1.png" alt="img" border="0" /></a></div>
                        <br />
                        <br />
                        <div class="whp_preamble">
                            Delta kostnadsfritt i Börstjänarens  lärarledda  intensivkurs för nybörjare online!</div>
                        <div class="blank_20h widthall">&nbsp;</div>
                        <div class="float_left widthall ingress"><img src="/images/marion_2.png" alt="img"  />Delta helt gratis!<br />
                            <img src="/images/marion_2.png" alt="img"  />Anmäl  dig nedan!</div>
                        <div class="blank_10h widthall">&nbsp;</div>
                        <div class="float_left widthall borst_subtitle_4">
                            Gör så här:</div>
                        <br />
                        1.   Fyll i  namn,  epost samt telefon i anmälan nedan och  SKICKA. <br />
                        <div class="blank_20h widthall">&nbsp;</div>
                        <div class="float_left widthall borst_subtitle_4">
                            Anmälan:</div><br />
                        <label>
                            <input type="checkbox" name="friday_checkbox" id="friday" />
                            Ja tack, jag vill delta i Börstjänarens introduktionskurs <em>Nybörjarkväll</em> helt utan kostnad eller förpliktelse!</label>
                    </div>
                    <div class="blank_10h widthall">&nbsp;</div>
                    <div class="float_left widthall google_form_div">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <div class="blank_5h widthall">&nbsp;</div>
                                    <div class="form_labels width_90 float_left mrg_top_6"><?php echo __('* Förnamn') ?></div>
                                    <div class="inputBox"><?php echo $contactEnqForm['firstname']->render(array('id' => 'firstname', 'class' => 'width_277 contactus-inputs form_input', 'size' => '25')) ?></div>	
                                    <div class="float_left redcolor" style="padding-left:2px;font-size: 12px"><div class="for_labels" id="contact_firstname_error"><?php echo $contactEnqForm['firstname']->renderError(); ?></div></div></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form_labels width_90 float_left mrg_top_6"><?php echo __('* Efternamn') ?></div>
                                    <div class="inputBox"><?php echo $contactEnqForm['lastname']->render(array('id' => 'lastname', 'class' => 'width_277 contactus-inputs form_input mrg_top_6', 'size' => '25')) ?></div>
                                    <div class="float_left redcolor" style="padding-left:2px;font-size: 12px"><div class="for_labels" id="contact_lastname_error"><?php echo $contactEnqForm['lastname']->renderError(); ?></div></div></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form_labels width_90 float_left mrg_top_6"><?php echo __('* E-post') ?></div>
                                    <div class="inputBox"><?php echo $contactEnqForm['email']->render(array('id' => 'email', 'class' => 'width_277 contactus-inputs form_input mrg_top_6', 'size' => '25')) ?></div>
                                    <div class="float_left redcolor" style="padding-left:10px;font-size: 12px"><div class="for_labels" id="contact_email_error"><?php echo $contactEnqForm['email']->renderError(); ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form_labels width_90 float_left mrg_top_6"><?php echo __('* Telefon') ?></div>
                                    <div class="inputBox"><?php echo $contactEnqForm['mobile']->render(array('id' => 'mobile', 'class' => 'width_277 contactus-inputs form_input mrg_top_6', 'size' => '25')) ?></div>
                                    <div class="float_left redcolor" style="padding-left:10px;font-size: 12px"><div class="for_labels" id="contact_email_error"><?php echo $contactEnqForm['mobile']->renderError(); ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="blank_10h"><b>&nbsp;</b></td>
                            </tr>
                            <!--<tr>
                              <td colspan="6" class=""><input name="" type="text"  class="input174"/></td>
                            </tr>-->
                        </table>
                        <div class="mrg_top_7">
                            <img src="/images/new_home/send.png" alt="Skicka" name="skicka" onclick="validateGoogleAdForm()" class="cursor" width="49" />

                        </div>
                    </div>
                    <div class="blank_15h widthall">&nbsp;</div>
                    <div class="blank_15h widthall">&nbsp;</div>
                    <div class="float_left widthall ingress" style="width:590px">Börstjänarens kostnadsfria introduktionskurs sponsras av AvaTrade och är helt utan förpliktelser.</div>  


                    <div class="blank_10h widthall">&nbsp;</div>
                    <div class="float_left widthall borst_subtitle_4">Lär dig börsthandel av proffs!</div><br />Börstjänarens kostnadsfria kurs <em>Lär dig börsthandel av proffs!</em> ger dig tillfälle att lära dig av en professionell kapitalförvaltare hur börsen fungerar och hur man skall tänka och agera för att bli en vinnande aktör på börsen. Du får lära dig vad som krävs för att ge sig själv de bästa chanserna i världens mest konkurrensutsatta verksamhet: ONLINE TRADING! <br />
                    <br />
                    Kursen inleds med den kostnadsfria introduktionen <em>Nybörjarkväll</em>, som förklarar börsen från grunden: Hur fungerar börsen, vilka är aktörerna, vad är risk, vem kan man lita på, vad är hävstångshandel? Introduktionen är öppen för alla och kräver inga förkunskaper.<br />
                    <br />
                    Efter denna introduktion  slutförs  i ett komprimerat schema runt midsommar den sammalagt åtta lektioner omfattande kursen, som tar dig från nybörjarstadiet till en durkdriven och välinformerad börsoperatör. Kursen är helt kostnadsfri för dig som blir kund hos AvaTrade genom denna kampanj.
                    </p>

                    <div class="blank_10h widthall">&nbsp;</div>

                    <div class="float_left widthall borst_subtitle_4">Lär dig handla som proffsen av proffsen!</div><br />
                    Kursen är sammanställd av Henrik Hallenborg,  professionell trader som varje vecka omsätter miljontals dollar på Chicagobörsen. Henrik leder kursen tillsammans med Thomas Sandström, erfaren pedagog och VD för Hallenborg &amp; Sandström Fund Management AB. Utbildningen sker online och du tar del av den i hemmets lugna vrå via din egen dator med Internetuppkoppling. <div class="blank_10h widthall">&nbsp;</div><br />
                    Introduktionen <em>Nybörjarkväll</em> är helt gratis och kräver inga förkunskaper. Denna underhållande och ögonöppnande kväll är en förberedelse för fortsättningen. Syftet här är att få dig som deltagare i rätt mind-set för resten av kursen: dels förstås att informera men också att få dig att tänka och se på börsen som en trejdare.
                    <div class="blank_10h widthall">&nbsp;</div>
                    <br />
                    Välkommen att investera i dig själv! Att lära dig att ta dig an börsen på ett  professionellt sätt – utan rädsla men med stor respekt. <br />

                    <div class="blank_10h widthall">&nbsp;</div>

                    <div class="float_left widthall borst_subtitle_4">Tid och plats </div>
                    <strong>Plats:</strong> kursen äger rum online hemma vid din egen dator.<br />
                    <strong>Tid</strong>:
                    Lektion 1-2 – Nybörjarkväll: Torsdag 11 juni 2015 kl 19.00. <br />
                    Lektion 3: Måndag 15 juni kl 19.00 <br />
                    Lektion 4: Tisdag 16 juni kl 19.00 <br />
                    Lektion 5: Onsdag 17 juni kl 19.00<br />
                    Lektion 6-7: Måndag 22 juni kl 19.00<br />
                    Lektion 8: Tisdag 23 juni kl 19.00<br />

                    <div class="blank_10h widthall">&nbsp;</div><strong><br />
                        Kursinnehåll:</strong><br />
                    1. Trejdningens grunder – Introduktion till börshandelns fascinerande värld.<br />
                    2. Att läsa kursgrafer – Grunderna i teknisk börsanalys.<br />
                    3. Trejdning med grafer– Vi går från teori till praktik. Ava Trader-plattformen.<br />
                    4. Pengar och risk – Konsten att överleva i marknaden. Att välja positionsstorlek &amp; nödutgång.<br />
                    5. Trejdingpsykologi och trejdingplan – Konsten att tänka som en trejder, övervinna sig själv och följa sin plan.<br />
                    6. Fundamental makrotrejdning – The Big Picture.<br />
                    7. Råvaru- och valutastrategier – Lär dig vad som styr marknaderna och hur man tjänar pengar på dem.<br />
                    8. Daytrading – Lär dig dagshandla och få trejdning som inkomstkälla.
                    <div class="blank_10h widthall">&nbsp;</div>
                    <div class="float_left widthall borst_subtitle_4">Så här går det till</div> <br />
                    Efter inskickad anmälan erhåller du  ett mejl med inbjudan till Nybörjarkvällen (Lektion 1-2, torsdag 11 juni kl 19). Därefter avgör du själv om du vill gå vidare med de sex kompletterande lektionerna (15-23 juni), kostnadsfria med sponsring för dig som  bli kund hos AvaTrade. <br />
                    <br />
                    Har du frågor är du välkommen att kontakta oss via <a href="http://www.borstjanaren.se/borst/contactUs">kontaktformuläret</a> på vår webbplats. 
                    <div class="blank_10h widthall">&nbsp;</div>
                    <div class="blank_15h widthall">&nbsp;</div>
                    <div class="blank_20h widthall">AvaTrade sponsrar även andra kostnadsfria utbildningar på Börstjänaren. <br />
                        Mer info om dessa ges på introduktionskursen.&nbsp;</div>
                    <div class="blank_15h widthall">&nbsp;</div>
                    <div class="float_left widthall borst_subtitle_4"></div>
                    <div class="blank_10h widthall">&nbsp;</div>
                    <div class="blank_10h widthall">&nbsp;</div>
                    <div><a href="http://www.avafx.com/lp/lp-sv/?tag=25581&target=_blank"><img src="/FX-update/ava/newLogoBlue.ashx.png" width="264" height="42" alt="img" style="margin: 10px 0px 0px 0xp" /></a></div>

                    <?php echo include_partial('global/inner_bottom_footer'); ?>
                </div>
            </div>
        </div>
        <div class="rightbanner padding_0 font_0 margin_top_ann">
            <div class="home_ad_r float_left font_size_12 ">Annons</div>
            <?php include_partial('global/ad_message') ?>
            <div id="whitepage_ads">
                <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        if(<?php echo $contactEnqForm->hasErrors() ? 1 : 0 ?>){
            $('#ad_scroll_page').focus();
            $('#ad_scroll_page').attr("style","display:none");
        }
        
    });
    
</script>