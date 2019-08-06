<script type="text/javascript" language="javascript">
$(window).load(function(){

//Amit changes 15-2-2011
var hArray = new Array();
 hArray[0] = $(".innerleftdiv").height();
 hArray[1] = $(".rightbanner").height(); 
 
 if(hArray[0] > hArray[1])
 var maxHeight = hArray[0];
 else
 var maxHeight = hArray[1];

 
$(".innerleftdiv").css({"height":maxHeight+"px"});
$(".rightbanner").css({"height":maxHeight+"px"});

});

</script>
<script language="javascript" type="text/javascript">
$(document).ready(function(){

	$(".rec").next().children().css({"border":"0px"});

});
</script>
<!--[if IE 7]>
<style type="text/css">
.ieadj{ margin-top:-17px;}
</style>
<![endif]-->
<div class="maincontentpage">
<div class="innerleftdiv">
  <div class="leftinnercolor padding_0 bor_bot_0 white_bg width_690">
	<div class="breadcrumb">
	  <ul>
		<li><?php include_component('isicsBreadcrumbs', 'show', array(
	'root' => array('text' => 'BT-CHARTS', 'uri' => 'borst_charts/borstChartsHome')
	)) ?> </li>
	  </ul>
	</div>
	<div class="shopinfo">
	  <div class="blank_30h widthall">&nbsp;</div>
	  <div class="float_left widthall">
	    <div id="dailyfx"> <img src="/images/img198.png" alt="" width="674" height="26" border="0" class="m_top2 mleft_m2" /></div>
	    <div class="heading_violet_chart_calnder">Veckans valutah&auml;ndelser</div>
		<div class="float_left width_500 font_11 p_5 chart_violet">OBS! Tiderna anges i GMT. F&ouml;r normal svensk tid, l&auml;gg p&aring; <strong>en timme</strong>.</div>
		
		<div class="float_left width_670" id="kalender_container">
		<table border="0" class="calendar" cellpadding="0" cellspacing="0">
		<?php $dt = "" ?>
		<?php foreach ($data as $rowID): ?>
		<?php if ($dt == "" || $dt != $rowID->ad_date) : ?>
		<tr class="rec">
			<td bgcolor="#e0e4ee"><img src="/images/kal_date.png" alt="" width="60" height="20" border="0" class="mright_9" /></td>
			<td bgcolor="#e0e4ee"><img src="/images/kal_time.png" alt="" width="45" height="20" border="0" class="mright_9" /></td>
			<td bgcolor="#e0e4ee"><img src="/images/kal_cur.png" alt="" width="35" height="20" border="0" class="mright_9" /></td>
			<td bgcolor="#e0e4ee"><img src="/images/kal_des.png" alt="" width="225" height="20" border="0" class="mright_9" /></td>
			<td bgcolor="#e0e4ee"><img src="/images/kal_pri.png" alt="" width="65" height="20" border="0" class="mright_9" /></td>
			<td bgcolor="#e0e4ee"><img src="/images/kal_fak.png" alt="" width="58" height="20" border="0" class="mright_9" /></td>
			<td bgcolor="#e0e4ee"><img src="/images/kal_prog.png" alt="" width="60" height="20" border="0" class="mright_9" /></td>
			<td bgcolor="#e0e4ee"><img src="/images/kal_pre.png" alt="" width="60" height="20" border="0" class="m_0" /></td>
		</tr>
		<?php $dt = $rowID->ad_date; $show_date = 1; ?>
		<?php else : ?>
		<?php $show_date = 0; ?>
		<?php endif; ?>
		<tr>
			<td class="date">&nbsp;<?php echo  $show_date == 1 ? $rowID->ad_date : '&nbsp;'; ?></td>
			<td class="time"><?php echo date("H:i",strtotime($rowID->ad_time)) ? date("H:i",strtotime($rowID->ad_time)) : '&nbsp;';  ?></td>
			<td class="currency"><?php echo $rowID->ad_currency ? $rowID->ad_currency : '&nbsp;'; ?></td>
			<td class="description"><?php echo $rowID->ad_description ? $rowID->ad_description : '&nbsp;'; ?></td>
			<td class="importance"><img width="40" height="16" src="/images/cal<?php echo strtolower($rowID->ad_importance)?>.png"></td>
			<td class="actual"><?php echo $rowID->ad_actual ? $rowID->ad_actual : '&nbsp;'; ?></td>
			<td class="forecast"><?php echo $rowID->ad_forecast ? $rowID->ad_forecast : '&nbsp;'; ?></td>
			<td class="previous"><?php echo $rowID->ad_previous ? $rowID->ad_previous : '&nbsp;'; ?></td>
		</tr>
		<?php endforeach?>
		<tr><td colspan="8"></td></tr>
		</table>
		</div>
		<div class="float_left"><img src="/images/img198.png" alt="" width="674" height="26" border="0" class="mtop_6 mbottom_20 mleft_1"/></div>
	  </div>
	</div>
  </div>
</div>
<?php echo include_partial('global/borst_right_banner_article',array('host_str'=>$host_str,'cat_arr'=>$cat_arr,'type_arr'=>$type_arr,'object_arr'=>$object_arr,'month'=>$month,'col1_1417_heading_style'=>$col1_1417_heading_style,'image_arr_1417'=>$image_arr_1417,'comm_fifteen_eighteen'=>$comm_fifteen_eighteen,'comment_cnt'=>$comment_cnt,'ad_1'=>$ad_1,'ad_2'=>$ad_2,'ad_3'=>$ad_3,'ad_4'=>$ad_4)); ?>
<div class="colorstrip">&nbsp;</div>
<?php include_partial('global/six_cube_footer',array('host_str'=>$host_str,'bottom_commodities_links'=>$bottom_commodities_links,'bottom_currencies_links'=>$bottom_currencies_links,'bottom_buysell_links'=>$bottom_buysell_links,'bottom_statistics_links'=>$bottom_statistics_links,'bottom_aktier_links'=>$bottom_aktier_links,'bottom_kronika_links'=>$bottom_kronika_links)) ?>
</div>