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

});
</script>
<div class="maincontentpage">
	<div class="btshopleftdiv">
  <div class="btshopleftdivinner">
	<div class="breadcrumb">
	  <ul>
		<li><?php include_component('isicsBreadcrumbs', 'show', array(
	'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstAboutUs')
	)) ?> </li>
	  </ul>
	</div>
	<div class="heading_red">Välkommen till Börstjänaren!</div>
	<!-- <div class="shoph3 widthall">Rubrik här då</div>-->
	<div class="blank_10h widthall">&nbsp;</div>
	<div class="float_left widthall ingress">Börstjänaren är en kostnadsfri sajt för personer med intresse för aktie-, råvaru-
	  och valutamarknaden. Här finner du dagliga tips och analyser av de
	  olika marknaderna, samt aktuella grafer över det mesta av intresse.</div>
     <div class="blank_30h widthall">&nbsp;</div>
     
     
	  <div class="float_left widthall">
    <b  class="borst_subtitle_4">Utbildningar och kurser</b>
      <br />
	  Vi erbjuder även utbildningar i aktiehandel och kapitalförvaltning, både
	  nybörjarkurser och mer avancerade program.<br />
	  <br />
	  <b  class="borst_subtitle_4">Kostnadsfria webinarier</b>
      <br />
	  På onsdagkvällar kl 20.00 håller vi kostnadsfria webinarier on line, där vi
	  går igenom marknaden och svara på frågor.<br />
	  <br />
      
      <b  class="borst_subtitle_4">Vi har tre nivåer på användare:</b>
		<br /><b>Som besökare </b>har du kostnadsfri tillgång till det mesta.
   <br />
		  <br /><b>Som registrerad användare</b> kan du också skriva i vårt forum och ta del av speciella artiklar och mejlutskick.<br />
	  <br />
      
          <b>Som betalande portföljabonnent</b> kan du ta del av vår kapitalförvaltning viadagliga uppdateringar med affärsförslag, kommentarer och grafer.<br />
			<br />
            
  
		<b  class="borst_subtitle_4">Om oss</b><br />
		Börstjänaren drivs av entusiaster med intresse för utbildning, en fri marknad, teknisk trading
		och investeringar. Företaget Morningbriefing startades 2001 och sajten Börstjänaren
		har funnits sedan 2006. 	<br />
	  <br />
      </div>
	</div>
	<div class="contactdell">
	  <div class="float_left widthall"><a href="<?php echo 'https://'.$host_str.'/borst/contactUs'?>"><font color="#547184"><?php echo __('Kontakta oss') ?> </font></a> <a href="<?php echo 'https://'.$host_str.'/borst/contactUs'?>"><img src="/images/contact.jpg" alt="circle" class="icontop3" width="26" border="0" /></a></div>
	  <div class="float_left widthall">
      <!-- AddThis Button BEGIN -->
	  <div class="addthis_default_style ">
		<a href="https://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button text_decoration_none">
    		<font color="#547184"><?php echo __('Dela') ?> </font>&nbsp;<img alt="strip" src="/images/smallcolorstrip.jpg" />
		</a>
	  </div>
	  <?php include_partial('global/share_link_bottom') ?></div>
      <!-- AddThis Button END -->
      </div>
          
	</div>
      <div class="rightbanner padding_0 font_0 margin_top_ann">
	  <?php include_partial('global/ad_message') ?>
      <?php include_partial('global/right_ads_column',array('ad_1'=>$ad_1,'ad_2'=>$ad_2,'set_margin'=>'1')) ?>
    </div>
	<div class="blank_30h widthall">&nbsp;</div>
	<div class="blank_30h widthall">&nbsp;</div>
	<div class="testimonial"><img src="/images/testimonial.png" alt="img" /></div>
  </div>
    
</div>