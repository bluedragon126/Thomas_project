<script type="text/javascript" language="javascript">
$(document).ready(function(){


	var leftHeight = $(".btshopleftdiv").height();
	var rightHeight = $(".rightbanner").height();	
	var maxHeight = 0;
	
	if(rightHeight > leftHeight)
	{
		maxHeight = rightHeight;
	}
	else
	{
		maxHeight = leftHeight;
	}
	
	$(".rightbanner").css({"height":maxHeight+"px"});
	$(".btshopleftdiv").css({"min-height":maxHeight+"px"});	
	});
</script>
<div class="maincontentpage maincontentpageshop">
<div class="btshopleftdiv">
  <div class="btshopleftdivinner">
	<div class="breadcrumb">
	  <ul>
		<li><?php include_component('isicsBreadcrumbs', 'show', array(
	'root' => array('text' => 'BT-SHOP', 'uri' => 'borst_shop/borstShopBocker')
	)) ?> </li>
	  </ul>
	</div>
	<div class="shoph2">Metastock</div>
		
        	<div class="shopinfo">Börstjänaren är auktoriserad återförsäljare och utbildare av det världsledande
aktieanalysprogrammet Metastock. Köp Metastock här!</div>
<span class="main_link_color"> <b>Läs mer.</b> <img id="reg_help_plus" class="icontop3" alt="addplus" src="/images/addplusicon.jpg"></span>
            <div class="spacer"></div>
<div id="registration_help_section display-none">

<div class="shop_detail_subtitle2">Premiärgnägg på Börstjänaren!</div>
<p>Börstjänaren introducerar en ny, vass tjänst för aktiv handel!<br />
<br />

Vi är stolta att presentera vår nya tjänst Henry Boy, som ger dig aktiva affärsförslag med goda
odds på världens fi nansmarknader.<br />
<br />

Henry Boy utkommer 1-2 ggr per vecka med affärsförslag enligt vår utbrottsstrategi. Du lägger
dina order och väntar på veckans action!<br />
<br />

Se ett exempel på Henry Boy här!<br />
<br />

Som abonnent på Henry Boy får du delta i speciella webinarier, där vi bl. a. förklarar hur och
varför Henry Boy-strategin fungerar.
?
</p>

<div class="spacer"></div>
<div class="shop_detail_subtitle2">Beställning</div>
<div class="blue_title">Välj abonnemangsperiod</div>
 <ul class="rows">
            <li><input type="radio" class="radio" checked="" value="0" id="radio1" name="">Lösnummer 50:-</li>
            <li><input type="radio" class="radio" checked="" value="0" id="radio1" name="">Månad (8 nr) 295:-</li>
            <li><input type="radio" class="radio" checked="" value="0" id="radio1" name="">Kvartal (24 nr) 790:-</li>
            <li><input type="radio" class="radio" checked="" value="0" id="radio1" name="">Halvår (48 nr) 1 390:-</li>
            <li><input type="radio" class="radio" checked="" value="0" id="radio1" name="">Helår (96 nr) 2 390:-</li>
            </ul>
            
            <div class="spacer"></div>
            
            
        <div class="blue_title">Leverans e-postadress</div>
Jag vill ha mina Henry Boy ski
<ul class="rows">
                    <li><input type="text" size="25" class="input174" id="" name=""></li>
                    </ul>
                    
                    <a href="#" class="main_link_color float_left">Ändra e-postadress / Bekräfta e-postadress</a>
</div>

            <div class="spacer"></div>
			<div class="blue_title">Välj programversion</div>
            <ul class="rows">
            <li><input type="radio" class="radio" checked="" value="0" id="radio1" name="">Metastock 11, End of Day 4 600:- <a href="#">Mer info</a></li>
            <li><input type="radio" class="radio" checked="" value="0" id="radio2" name="">Metastock Pro 11 (Realtid) 11 900:- <a href="#">Mer info</a></li>
            </ul>
            
            <div class="spacer"></div>
            
            			<div class="blue_title">E-postadress</div>
                        <ul class="rows">
                        <li><input type="text" size="25" class="input174" id="" name=""></li>
                        </ul>
                        <a href="#" class="main_link_color">Ändra e-postadress / Bekräfta e-postadress</a>

                          <div class="spacer"></div>
                          <div class="blue_title">Leveransadress</div>
                            <ul class="rows">
                    <li><input type="text" size="25" class="input174" id="" name=""><span class="label">Förnamn</span></li>
                    <li><input type="text" size="25" class="input174" id="" name=""><span class="label">Efternamn</span></li>
                    <li><input type="text" size="25" class="input174" id="" name=""><span class="label">Gatuadress</span></li>
                    <li><input type="text" size="25" class="input174 small" id="" name=""><input type="text" size="25" class="input174 small" id="" name=""><span class="label_last">Postnr/postort</span></li>    
                     <li><input type="text" size="25" class="input174" id="" name=""><span class="label">Telefon</span></li>               
					<li><select class="input174 width_175" id="" name=""></select><span class="label">Postnr/postort</span></li>
                            </ul>
                             <a href="#" class="main_link_color">Ändra leveransadress / Bekräfta leveransadress</a>
                             
                            <ul class="rows">
                    <li> <a class="red_button" href="#"><span>KÖP</span></a>
                    </li>
                    </ul>
	
	
	
	
  </div>
</div>
<div class="rightbanner">

<!--CART starts -->
    <div class="cart">
    	<div class="title">VARUKORG</div>
        <hr  class="yellow_line" />

		<div class="info">
            <span class="left"><strong>Artikel:</strong> Metastock 11,<br />
            End of Day
            </span>
            <span class="right">&nbsp;</span>
        </div>
        
        <div class="info">
            <span class="left"><strong>Antal:</strong> <input type="text"  value="1" /> st á 4 600</span> <span class="right">4 600.00</span>
           
        </div>
        
        <div class="info">
        	<a href="#" class="red_button"><span>ta bort</span></a>
        </div>
        <hr  class="yellow_line" />
        <div class="info">
            <span class="left"><strong>Frakt:</strong></span>
            <span class="right">85.00</span>
            
             <hr  class="yellow_line" />            
            
             <span class="left"><strong>Total:</strong></span>
            <span class="right">4 685.00</span>
            
        	 <span class="left">Varav moms:</span>
            <span class="right">937:00</span>
            
          	 <span class="left red_text">Att betala SEK:</span>
            <span class="right  red_text">4 685.00</span>           
        </div>
        
        <div class="info">
        	<a href="#" class="red_button"><span>betala</span></a>
        </div>
        
        <div class="info">
        	<a href="#" class="red_button"><span>uppdatera varukorg</span></a>
        </div>
        
        <div class="info">
        	<a href="#" class="red_button"><span>TÖM VARUKORG</span></a>
        </div>
        
    </div>
<!--CART ends -->    
</div>
</div>