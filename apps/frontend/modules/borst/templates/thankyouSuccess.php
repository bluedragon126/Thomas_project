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
        <div class="btshopleftdiv"> 
            <div class="btshopleftdivinner">
                <div class="breadcrumb">
                    <ul>
                        <li><?php
    include_component('isicsBreadcrumbs', 'show', array(
        'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/contactUs')
    ))
    ?> </li>
                    </ul>
                </div>

                    <?php if ($sent): ?>
                    <div class="orangetext">
                    <?php echo "Tack för din kursanmälan! Ett bekräftelsemejl har skickat till: " . $email; ?>
                    </div>
<?php endif; ?>


                <div class="heading_red">Kostnadsfri börsutbildning!</div>
                <div class="blank_10h widthall">&nbsp;</div>
                <div class="float_left widthall">
                        <!--<p class="font14" id="contact_form_error" style="color:#FF0000; border:1px solid red;"></p>-->
                    <div><a class="cursor main_link_color" href="https://www.avafx.com/lp/lp-sv/?tag=25581&target=_blank"><img src="/images/avafx_1.png" alt="img" border="0" /></a></div>
                    <br />
                    <br />
                    <div class="float_left widthall ingress2">
                        Delta kostnadsfritt i Börstjänarens populära, lärarledda  onlineutbildning i börshandel!</div>
                    <div class="blank_20h widthall">&nbsp;</div>
                    <div class="float_left widthall ingress"><img src="/images/marion_2.png" alt="img" style="margin: 0px 0px 0px 0xp" />Delta helt gratis!<br />
                        <img src="/images/marion_2.png" alt="img" style="margin: 0px 0px 0px 0xp" />Anmäl  dig nedan!</div>
                    <div class="blank_10h widthall">&nbsp;</div>
                    <div class="float_left widthall borst_subtitle_4">
                        Gör så här:</div>
                    <br />
                    1.   Fyll i  namn,  epost samt telefon i anmälan nedan och  SKICKA. <br />
                    <div class="blank_20h widthall">&nbsp;</div>
                    <div class="float_left widthall borst_subtitle_4">
                        Anmälan:</div><br />
                    <label>
                        <input type="checkbox" name="friday_checkbox" id="friday" style="margin:5px 0px 0px -3px" />
                        Ja tack, jag vill delta i Börstjänarens introduktionskurs <em>Nybörjarkväll</em> helt utan kostnad eller förpliktelse!</label>
                </div>
                <div class="blank_10h widthall">&nbsp;</div>
                <div class="float_left widthall" style="width:590px; border:0px solid red;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <div class="blank_5h widthall">&nbsp;</div>
                                <div class="inputBox"><?php echo $contactEnqForm['firstname']->render(array('id' => 'firstname', 'class' => 'input174', 'size' => '25')) ?></div>	
                                <div class="labelName"><?php echo __('* Förnamn') ?></div>
                                <div class="float_left redcolor" style="padding-left:2px;font-size: 12px"><div class="for_labels" id="contact_firstname_error"><?php echo $contactEnqForm['firstname']->renderError(); ?></div></div></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="inputBox"><?php echo $contactEnqForm['lastname']->render(array('id' => 'lastname', 'class' => 'input174', 'size' => '25')) ?></div>
                                <div class="labelName"><?php echo __('* Efternamn') ?></div>
                                <div class="float_left redcolor" style="padding-left:2px;font-size: 12px"><div class="for_labels" id="contact_lastname_error"><?php echo $contactEnqForm['lastname']->renderError(); ?></div></div></td>
                        </tr>
                        <tr>
                            <td><div class="inputBox"><?php echo $contactEnqForm['email']->render(array('id' => 'email', 'class' => 'input174', 'size' => '25')) ?></div>
                                <div class="labelName"><?php echo __('* E-post') ?></div>
                                <div class="float_left redcolor" style="padding-left:10px;font-size: 12px"><div class="for_labels" id="contact_email_error"><?php echo $contactEnqForm['email']->renderError(); ?></div></div></td>
                        </tr>
                        <tr>
                            <td><div class="inputBox"><?php echo $contactEnqForm['mobile']->render(array('id' => 'mobile', 'class' => 'input174', 'size' => '25')) ?></div>
                                <div class="labelName"><?php echo __('* Telefon') ?></div>
                                <div class="float_left redcolor" style="padding-left:10px;font-size: 12px"><div class="for_labels" id="contact_email_error"><?php echo $contactEnqForm['mobile']->renderError(); ?></div></div></td>
                        </tr>
                        <tr>
                            <td class="blank_10h"><b>&nbsp;</b></td>
                        </tr>
                        <!--<tr>
                          <td colspan="6" class=""><input name="" type="text"  class="input174"/></td>
                        </tr>-->
                    </table>
                    <div >
                        <img src="https://www.borstjanaren.se/images/skicka_11.png" alt="Skicka" name="skicka" onclick="validateGoogleAdForm()" class="cursor" />

                    </div>
                </div>
                <div class="blank_15h widthall">&nbsp;</div>
                <div class="blank_15h widthall">&nbsp;</div>
                <div class="float_left widthall ingress" style="width:590px">Börstjänarens kostnadsfria introduktionskurs sponsras av AvaTrade och är helt utan förpliktelser.</div>  


                <div class="blank_10h widthall">&nbsp;</div>
                <div class="float_left widthall borst_subtitle_4">Vinnande börststrategier för alla</div><br /><br />
                Börstjänarens kostnadsfria kurs <em>Vinnande börststrategier för alla</em> ger dig tillfälle att lära dig av en professionell kapitalförvaltare hur börsen fungerar och hur man skall tänka och agera för att bli en vinnande aktör på börsen. Du får lära dig vad som krävs för att ge sig själv de bästa chanserna i världens mest konkurrensutsatta verksamhet: ONLINE TRADING! <br />
                <br />
                Kursen inleds med en kostnadsfri introduktion,  som förklarar börsen från grunden: Hur fungerar börsen, vilka är aktörerna, vad är risk, vem kan man lita på, vad är hävstångshandel? Introduktionen är öppen för alla och kräver inga förkunskaper.<br />
                <br />
                Efter denna första lektion – Nybörjarkväll – följer tre strategikvällar där vi går igenom ett stort antal enkla börststrategier för handel med- och mot den allmänna börstrenden. Strategikvällarna är kostnadsfria för dig som blir kund hos AvaTrade genom denna kampanj.</p>

                <div class="blank_10h widthall">&nbsp;</div>

                <div class="float_left widthall borst_subtitle_4">Lär dig handla som proffsen av proffsen!</div><br />
                Kursen är sammanställd av Henrik Hallenborg,  professionell trader som varje vecka omsätter miljontals dollar på Chicagobörsen. Henrik leder kursen tillsammans med Thomas Sandström, erfaren pedagog och VD för Hallenborg &amp; Sandström Fund Management AB. Utbildningen sker online och du tar del av den i hemmets lugna vrå via din egen dator med Internetuppkoppling. <div class="blank_10h widthall">&nbsp;</div><br />
                Introduktionskursen Nybörjarkväll är helt gratis och kräver inga förkunskaper. Denna underhållande och ögonöppnande kväll är en förberedelse för deltagande i de tre strategikvällarna. Syftet här är att få dig som deltagare i rätt mind-set för fortsättningen: dels förstås att informera men också att få dig att tänka och se på börsen som en trejdare. <div class="blank_10h widthall">&nbsp;</div>
                <br />
                Välkommen att investera i dig själv! Att lära dig att ta dig an börsen på ett  professionellt sätt – utan rädsla men med stor respekt. <br />

                <div class="blank_10h widthall">&nbsp;</div>

                <div class="float_left widthall borst_subtitle_4">Tid och plats </div>
                <strong>Plats:</strong> kursen äger rum online hemma vid din egen dator.<br />
                <strong>Tid</strong>:
                Nybörjarkväll: Torsdag 11 juni 2015 kl 19.00. <br />
                Strategikväll 1: Måndag 15 juni kl 19.00 <br />
                Strategikväll 2: Tisdag 16 juni kl 19.00 <br />
                Strategikväll 3: Onsdag 17 juni kl 19.00<br />



                <div class="blank_10h widthall">&nbsp;</div>

                <div class="blank_10h widthall">&nbsp;</div>
                <div class="float_left widthall borst_subtitle_4">Så här går det till</div>
                Efter inskickad anmälan erhåller du  ett mejl med inbjudan till den första lektionen: Nybörjarkväll (torsdag 11 juni kl 19). Därefter avgör du själv om du vill gå vidare med de tre strategikvällarna (må-on 15-17 juni), kostnadsfria med sponsring för dig som  bli kund hos AvaTrade. <br />
                <br />
                Har du frågor är du välkommen att kontakta oss via <a href="https://www.borstjanaren.se/borst/contactUs">kontaktformuläret</a> på vår webbplats. 
                <div class="blank_10h widthall">&nbsp;</div>
                <div class="blank_15h widthall">&nbsp;</div>
                <div class="blank_20h widthall">AvaTrade sponsrar även andra kostnadsfria utbildningar på Börstjänaren. <br />
                    Mer info om dessa ges på introduktionskursen.&nbsp;</div>
                <div class="blank_15h widthall">&nbsp;</div>
                <div class="float_left widthall borst_subtitle_4"></div>
                <div class="blank_10h widthall">&nbsp;</div>
                <div class="blank_10h widthall">&nbsp;</div>
                <div class="blank_10h widthall"><a href="https://www.avafx.com/lp/lp-sv/?tag=25581&target=_blank"><img src="/FX-update/ava/newLogoBlue.ashx.png" width="264" height="42" alt="img" style="margin: 10px 0px 0px 0xp" /></a></div>


                <div class="contactdellus">

         <!--<div class="float_left widthall"><a href="<?php echo 'https://' . $host_str . '/borst/contactUs' ?>"><font color="#547184"><?php echo __('Kontakta oss') ?> </font></a><a href="<?php echo 'https://' . $host_str . '/borst/contactUs' ?>"><img src="/images/contact.jpg" width="28" border="0" height="13" alt="circle" class="icontop3" /></a> </div><!-->
                    <div class="float_left widthall">
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_default_style ">
                            <a href="https://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button"  style="text-decoration:none;">
                                <font color="#547184"><?php echo __('Dela') ?> </font>&nbsp;<img alt="strip" src="/images/smallcolorstrip.jpg" />
                            </a>
                        </div>
<?php include_partial('global/share_link_bottom') ?></div>
                    <!-- AddThis Button END -->
                </div>

                <div class="blank_30h widthall">&nbsp;</div>
                <div class="blank_30h widthall">&nbsp;</div>
                <div class="testimonial"><img src="/images/testimonial.png" alt="img" /></div>
            </div>
        </div>
        <div class="rightbanner padding_0 font_0">
                <?php include_partial('global/ad_message') ?>
            <div id="whitepage_ads">
<?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1')) ?>
            </div>
        </div>
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