<div class="maincontentpage">
  <div class="innerleftdiv_kronikor">
    <div class="leftinner_kronikor">
      <div class="breadcrumb">
		  <ul>
			<li><?php include_component('isicsBreadcrumbs', 'show', array(
		'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstPpm')
		)) ?> </li>
	  </ul>
      </div>
      <!--<div class="in_date">10-04-05</div>-->
      <h1 class="heading_blue">PPM-portföljen</h1>
      <div class="blank_30h widthall">&nbsp;</div>
      <div class="kronikorinfo"> PPM-portföljen tar rygg på Börstjänarens fond-orakel Göran <br />
        Högberg, nationalekonom med 25 års marknadserfarenhet.<br /><br />
		
		<strong>Göran Högberg är väl inläst</strong> på världsmarknaderna och deras finansguruer <br />
		och publicerar, som vår egen guru, löpande sina kommentarer och prognoser på  <br />
		Börstjänaren. <br /> <br />
		
		PPM-portföljens innehav efter den senaste ändringen (2009-12-03):  <br />
		<strong>100 % Öhman Penningmarknadsfond nr. 294918</strong>
        <div class="whp-border">&nbsp;</div>
      </div>

	  
    </div>
  </div>

  <?php echo include_partial('global/borst_right_banner_article',array('host_str'=>$host_str,'cat_arr'=>$cat_arr,'type_arr'=>$type_arr,'object_arr'=>$object_arr,'month'=>$month,'col1_1417_heading_style'=>$col1_1417_heading_style,'image_arr_1417'=>$image_arr_1417,'comm_fifteen_eighteen'=>$comm_fifteen_eighteen,'comment_cnt'=>$comment_cnt,'ad_1'=>$ad_1,'ad_2'=>$ad_2,'ad_3'=>$ad_3,'ad_4'=>$ad_4,'month'=>$month)); ?>
  
  <?php include_partial('global/six_cube_footer',array('host_str'=>$host_str,'bottom_commodities_links'=>$bottom_commodities_links,'bottom_currencies_links'=>$bottom_currencies_links,'bottom_buysell_links'=>$bottom_buysell_links,'bottom_statistics_links'=>$bottom_statistics_links,'bottom_aktier_links'=>$bottom_aktier_links,'bottom_kronika_links'=>$bottom_kronika_links,'month'=>$month)) ?>
</div>
