<SCRIPT LANGUAGE="javascript">



<!-- Script made by Omid Rouhani from http://www.JavaScript.nu/



function bort_mail()



{



if (document.prenumererah.email.value=="")



{



document.prenumererah.email.value="Fyll i din e-post h�r!";



}



}



function pa_mail()



{



if (document.prenumererah.email.value=="Fyll i din e-post h�r!")



{



document.prenumererah.email.value="";



}



}



// Begin ClearField



var cleared = 0;



function clearField(field){



if (cleared != 1) {



field.value = "";



cleared=1;}



else {cleared = 0;}



}



// End ClearField



//-->



</SCRIPT>



<SCRIPT language="JavaScript1.2">

function openwindow()

{

 window.open("https://www.borstjanaren.se/templates/epolicy.php","mywindow","menubar=1,resizable=1,width=500,height=525");

}



</SCRIPT>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>




<table class="header" width="" style="margin: 5px 0px 10px 0px;">

<tr>
      <td width="168" rowspan="4" align="left" valign="bottom"><a href="<?=$CFG->wwwroot?>">
	  <img src="<?=$CFG->imgdir?>/loggabt.png" width="137" height="85" style="margin: 0px 5px -5px 3px;" /></td>
  </tr>
  <tr>

    <td width="572" height="0" align="left" valign="middle">

<form action="<?=$CFG->wwwroot?>/?p=nyhetsbrev" method="post" name="prenumererah" id="prenumererah" width="60">

<input type="hidden" class="radiobtn" <? if (!isset($_REQUEST["pren"]) or (isset($_REQUEST["pren"]) &&  $_REQUEST["pren"] == 0)) echo "checked" ?> name="pren" value="0" style="margin-top: 23px;">



          <strong>Gratis veckobrev:</strong>
          <input name="email" value="Fyll i din e-post h&auml;r!"  onfocus="clearField(this)" onblur="bort_mail()" type="text" size="25" />          
        <a href="javascript:document.prenumererah.submit();">
	    <img style="margin: 5px 3px -6px 2px" src="<?=$CFG->imgdir?>/skicka2.png" width="83" height="20" border="0" /></a> 
		  <a href="javascript: openwindow()">E-policy?</a>
</form></td>
  </tr>

  <tr>
    <td height="7"></td>
  </tr>
  <tr> 



    <td align="left" valign="bottom"><table width="430" border="0" cellpadding="0" cellspacing="0">

      <tr>
        <td></td>
        </tr>
      <tr>

        <td>
		<a href="<?=$CFG->wwwroot?>">
<img src="<?=$CFG->imgdir?>/kstart.png" width="45" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a>
		
		<a href="<?=$CFG->wwwroot?>/artiklar/index.php?kat=1">
<img src="<?=$CFG->imgdir?>/kanalys.png" width="70" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a>
		
		<a href="<?=$CFG->wwwroot?>/ccount/click.php?id=23">
<img src="<?=$CFG->imgdir?>/klarge.png" width="74" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a>
		
		<a href="<?=$CFG->wwwroot?>/artiklar/index.php?land=swe">
<img src="<?=$CFG->imgdir?>/kstockholm.png" width="52" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a>
		
		<a href="<?=$CFG->wwwroot?>/ccount2/click.php?id=9">
<img src="<?=$CFG->imgdir?>/kbtkan.png" alt="" width="90" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a>
		
		<a href="<?=$CFG->wwwroot?>/?p=kronikor">
<img src="<?=$CFG->imgdir?>/kkronika.png" width="62" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a>		
		</td>
        </tr>

      <tr>

        <td>
		<a href="<?=$CFG->wwwroot?>/artiklar/">
<img src="<?=$CFG->imgdir?>/klista.png" width="45" height="20" border="0" style="margin: 0px -1px 0px 0px;"/></a>
		
		<a href="<?=$CFG->wwwroot?>/artiklar/index.php?kat=2">
<img src="<?=$CFG->imgdir?>/kkoposalj.png" width="70" height="20" border="0" style="margin: 0px -1px 0px 0px;"/></a>
		
		<a href="<?=$CFG->wwwroot?>/ccount/click.php?id=22">
<img src="<?=$CFG->imgdir?>/kmid.png" width="74" height="20" border="0" style="margin: 0px -1px 0px 0px;"/></a>
		
		<a href="<?=$CFG->wwwroot?>/artiklar/index.php?land=usa">
<img src="<?=$CFG->imgdir?>/kusa.png" width="52" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a>
		
		<a href="<?=$CFG->wwwroot?>/artiklar/index.php?id=2127">
<img src="<?=$CFG->imgdir?>/inarium.png" width="90" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a>
		
		<a href="<?=$CFG->wwwroot?>/?p=korg-o">
		<img src="<?=$CFG->imgdir?>/kppm.png" width="62" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a>		
		</td>
        </tr>
      <tr>
        <td>
		<a href="<?=$CFG->wwwroot?>/dailyfx/calendar.php">
		<img src="<?=$CFG->imgdir?>/kalender.png" width="74" height="20" border="0" style="margin: 0px -1px 0px 0px;"/></a>
		
		<a href="<?=$CFG->wwwroot?>/artiklar/forum.php"> 
		<img src="<?=$CFG->imgdir?>/kbtfor.png" width="70" height="20" border="0" style="margin: 0px -1px 0px 0px;"/></a>
		 
		<a href="<?=$CFG->wwwroot?>/ccount/click.php?id=24">
<img src="<?=$CFG->imgdir?>/small.png" width="74" height="20" border="0" style="margin: 0px -1px 0px 0px;"/></a>
		
	<a href="<?=$CFG->wwwroot?>/ccount/click.php?id=24">	
<img src="<?=$CFG->imgdir?>/kkurs.png" width="52" height="20" border="0" style="margin: 0px -1px 0px 0px;" />
		
		<a href="<?=$CFG->wwwroot?>/artiklar/index.php?id=3356"> 
		<img src="<?=$CFG->imgdir?>/kutbild.png" width="90" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a> 
        
		<a href="<?=$CFG->wwwroot?>/artiklar/index.php?id=3622"> 
		<img src="<?=$CFG->imgdir?>/world.png" width="62" height="20" border="0" style="margin: 0px -1px 0px 0px;" /></a> 
		</td>
      </tr>

    </table>    
	</td>
  </tr>
</table>


<div id="Layer1" style="position:absolute; width:200px; height:115px; z-index:1; left: 723px; top: 190px;"> 
<a href="http://www.borstjanaren.se/ccount2/click.php?id=18">
	    <img style="margin: 0px 0px 0px 0px" src="<?=$CFG->imgdir?>/bokhead.png" width="92" height="82" border="0" /></a></div>
