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
<!--[if IE 7]>
<style type="text/css">
.ieadj{ margin-top:-17px;}
</style>
<![endif]-->

<div class="maincontentpage" id="user_borstChartsHome">
<div class="innerleftdiv">
  <div class="leftinnercolor">
  
	<div class="breadcrumb btchart_breadcrumb">
	  <ul>
		<li><?php include_component('isicsBreadcrumbs', 'show', array(
	'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome')
	)) ?> </li>
	  </ul>
	</div>
    <br />
   
  <div class="two_charts_in_row"> 
    <?php $random = time()*rand(11111,9999999);?>
    <div class="one_chart">
        <?php if(file_exists($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_1.png")):?>    
        <div> <a href="/borst_charts/borstShowChart/stock_name/OMXS30/stock_id/257/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path."btcharts_1.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
        <div class="stock"> <span class="stock_name">• OMXS30 (Index) 60-min. graf&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_1.png")) ?></span> </div>
        <?php endif; ?>
    </div>
    
     
    <div class="one_chart">
        <?php if(file_exists($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_2.png")):?>
        <div> <a href="/borst_charts/borstShowChart/stock_name/S&P 500/stock_id/250/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path."btcharts_2.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
        <div class="stock"> <span class="stock_name">• <?php echo "S&P 500 (US Termin) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_2.png")) ?></span></div>
        <?php endif; ?>
    </div>    
   
  </div>
  
  <div class="two_charts_in_row">
    
    <div class="one_chart">
        <?php if(file_exists($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_3.png")):?>
        <div> <a href="/borst_charts/borstShowChart/stock_name/Guld/stock_id/289/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path."btcharts_3.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
        <div class="stock"> <span class="stock_name">• <?php echo "Guld (US Termin) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_3.png")) ?></span></div>
        <?php endif; ?>            
    </div>
    
     
    <div class="one_chart">
        <?php if(file_exists($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_4.png")):?>
        <div> <a href="/borst_charts/borstShowChart/stock_name/Råolja_Brent/chart_type/1/stock_id/341"><img class="chart_image" src="<?php echo $uploaded_images_path."btcharts_4.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
        <div class="stock"> <span class="stock_name">• <?php echo "Brentolja (US Termin) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_4.png")) ?></span></div>
        <?php endif; ?>            
    </div>    
   
  </div>  

  <div class="two_charts_in_row">
   
    <div class="one_chart">
    <?php if(file_exists($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_5.png")):?>
        <div> <a href="/borst_charts/borstShowChart/stock_name/USD_SEK/stock_id/317/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path."btcharts_5.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
        <div class="stock"> <span class="stock_name">• <?php echo "USD/SEK (FOREX) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_5.png")) ?></span></div>
        <?php endif; ?>
    </div>
    
     
    <div class="one_chart">
        <?php if(file_exists($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_6.png")):?>
        <div> <a href="/borst_charts/borstShowChart/stock_name/EUR_SEK/stock_id/319/chart_type/1"><img class="chart_image" src="<?php echo $uploaded_images_path."btcharts_6.png"; ?>?t=<?php echo $random; ?>" alt="Bilden inte tillgänglig" /></a></div>
        <div class="stock"> <span class="stock_name">• <?php echo "EUR/SEK (FOREX) 60-min. graf"; ?>&nbsp;&nbsp; <?php echo date("Y-m-d H:i", filemtime($_SERVER['DOCUMENT_ROOT']."/".$uploaded_images_path."btcharts_6.png")) ?></span></div>
        <?php endif; ?>            
    </div>    
   
  </div>    
  
  
  <div id="stock_lists">
     <div class="blank_20h widthall">&nbsp;</div>
     
      <span class="heading_violet_chart">Läsarnas val</span>
	  <div class="float_left widthall">
		<table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_varlden">
		  <tr>
			<td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
			<?php if($item_per_col_lasarnas+1 <= $total_count_lasarnas): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_lasarnas*2+1 <= $total_count_lasarnas): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_lasarnas*3+1 <= $total_count_lasarnas): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
		  </tr>
		  <tr>
			<td valign="top"><ul>
                <?php $i=0; foreach($stock_list_lasarnas as $stock): if($i<$item_per_col_lasarnas): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            
            <?php if($item_per_col_lasarnas+1 <= $total_count_lasarnas): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_lasarnas as $stock): if($i<$item_per_col_lasarnas*2 && $i>=$item_per_col_lasarnas): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>
            
            <?php if($item_per_col_lasarnas*2+1 <= $total_count_lasarnas): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_lasarnas as $stock): if($i<$item_per_col_lasarnas*3 && $i>=$item_per_col_lasarnas*2): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>            
            
            <?php if(($item_per_col_lasarnas*3+1) <= $total_count_lasarnas): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_lasarnas as $stock): if($i<=$item_per_col_lasarnas*4 && $i>=$item_per_col_lasarnas*3): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>                        
                        
		  </tr>
		 <tr>
			<td colspan="4"><div class="chartborder"></div></td>
		  </tr>
		</table>
	  </div>
      
              
      <span class="heading_violet_chart">Världsindex m.m.</span>
	  <div class="float_left widthall">
		<table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_varlden">
		  <tr>
			<td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
			<?php if($item_per_col_varlden+1 <= $total_count_varlden): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_varlden*2+1 <= $total_count_varlden): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_varlden*3+1 <= $total_count_varlden): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
		  </tr>
		  <tr>
			<td valign="top"><ul>
             <li><span class="heading_violet_sector">Sektorer</span></li>    
                <?php $i=0; foreach($stock_list_varlden as $stock): if($i<$item_per_col_varlden): ?>
                 <?php if($stock->sector == 'Sektor'): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                 <?php endif; ?>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            
            <?php if($item_per_col_varlden+1 <= $total_count_varlden): ?>
            <td valign="top"><ul>
             <li><span class="heading_violet_sector">Sektorer</span></li>
                <?php $i=0; foreach($stock_list_varlden as $stock): if($i<$item_per_col_varlden*2 && $i>=$item_per_col_varlden): ?>
                 <?php if($stock->sector == 'Sektor'): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                 <?php endif; ?>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>
            
            <?php if($item_per_col_varlden*2+1 <= $total_count_varlden): ?>
            <td valign="top"><ul>
             <li><span class="heading_violet_sector">Sektorer</span></li>
                <?php $i=0; foreach($stock_list_varlden as $stock): if($i<$item_per_col_varlden*3 && $i>=$item_per_col_varlden*2): ?>
                 <?php if($stock->sector == 'Sektor'): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                 <?php endif; ?>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>            
            
            <?php if(($item_per_col_varlden*3+1) <= $total_count_varlden): ?>
            <td valign="top"><ul>
             <li><span class="heading_violet_sector">Sektorer</span></li>
                <?php $i=0; foreach($stock_list_varlden as $stock): if($i<=$item_per_col_varlden*4 && $i>=$item_per_col_varlden*3): ?>
                 <?php if($stock->sector == 'Sektor'): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                 <?php endif; ?>
                <?php endif; $i++; endforeach; ?>
             <li>&nbsp;</li>   
             <li><img src="/images/img34graf.png" alt="photo" width="138" /> </li>
             <li class="margin_top_5"><span class="heading_violet_sector">Finans</span></li>
                <?php $i=0; foreach($stock_list_varlden as $stock): if($i<=$item_per_col_varlden*4 && $i>=$item_per_col_varlden*3): ?>
                 <?php if($stock->sector == 'Finans'): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                 <?php endif; ?>
                <?php endif; $i++; endforeach; ?>           
                
			  </ul>
              
            </td>
            <?php endif; ?>                        
                        
		  </tr>
		 <tr>
			<td colspan="4"><div class="chartborder"></div></td>
		  </tr>
		</table>
	  </div>
  

      <span class="heading_violet_chart">Råvaror</span>
	  <div class="float_left widthall">
		<table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap">
		  <tr>
			<td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
			<?php if($item_per_col_Ravaror+1 <= $total_count_Ravaror): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_Ravaror*2+1 <= $total_count_Ravaror): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_Ravaror*3+1 <= $total_count_Ravaror): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
		  </tr>
		  <tr>
			<td valign="top"><ul>
              <li><span class="heading_violet_sector">Metaller</span></li>
                <?php foreach($stock_list_Ravaror as $stock): ?>
                    <?php if($stock->sector == 'Metaller'): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                 <li>&nbsp;</li>
                 <li><img src="/images/img34graf.png" alt="photo" width="138"  /></li>                 
                    <li class="margin_top_5"> <span class="heading_violet_sector">Energi</span> </li>
                    <?php foreach($stock_list_Ravaror as $stock): ?>
                        <?php if($stock->sector == 'Energi'): ?>
                        <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>                
                </ul>
            </td>
            
            <?php if($item_per_col_Ravaror+1 <= $total_count_Ravaror): ?>
            <td valign="top"><ul>
             <li><span class="heading_violet_sector">Spannmål</span></li>                
                <?php foreach($stock_list_Ravaror as $stock):  ?>
                  <?php if($stock->sector == 'Spannmål'): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                  <?php endif; ?>
                <?php endforeach; ?>
                
			  </ul>
            </td>
            <?php endif; ?>
            
            <?php if($item_per_col_Ravaror*2+1 <= $total_count_Ravaror): ?>
            <td valign="top"><ul>
             <li><span class="heading_violet_sector">Mat/Fiber/Mjuka</span></li>
                <?php foreach($stock_list_Ravaror as $stock): ?>
                  <?php if($stock->sector == 'Mat/Fiber/Mjuka'): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                  <?php endif; ?>
                <?php endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>            
            
            <?php if(($item_per_col_Ravaror*3+1) <= $total_count_Ravaror): ?>
            <td valign="top"><ul>
            <li><span class="heading_violet_sector">Kött</span></li>
                <?php foreach($stock_list_Ravaror as $stock): ?>
                  <?php if($stock->sector == 'Kött'): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                  <?php endif; ?>
                <?php endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>                        
                        
		  </tr>
		 <tr>
			<td colspan="4"><div class="chartborder"></div></td>
		  </tr>
		</table>
	  </div>  
  

      <span class="heading_violet_chart">Valutor</span>
	  <div class="float_left widthall">
		<table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap">
		  <tr>
			<td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
			<?php if($item_per_col_Valutor+1 <= $total_count_Valutor): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_Valutor*2+1 <= $total_count_Valutor): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_Valutor*3+1 <= $total_count_Valutor): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
		  </tr>
		  <tr>
			<td valign="top"><ul>
                <?php $i=0; foreach($stock_list_Valutor as $stock): if($i<$item_per_col_Valutor): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            
            <?php if($item_per_col_Valutor+1 <= $total_count_Valutor): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_Valutor as $stock): if($i<$item_per_col_Valutor*2 && $i>=$item_per_col_Valutor): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>
            
            <?php if($item_per_col_Valutor*2+1 <= $total_count_Valutor): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_Valutor as $stock): if($i<$item_per_col_Valutor*3 && $i>=$item_per_col_Valutor*2): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>            
            
            <?php if(($item_per_col_Valutor*3+1) <= $total_count_Valutor): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_Valutor as $stock): if($i<=$item_per_col_Valutor*4 && $i>=$item_per_col_Valutor*3): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>                        
                        
		  </tr>
		 <tr>
			<td colspan="4"><div class="chartborder"></div></td>
		  </tr>
		</table>
	  </div>  


      <span class="heading_violet_chart">Stockholm Large Cap</span>
	  <div class="float_left widthall">
		<table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap">
		  <tr>
			<td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
			<?php if($item_per_col_LargeCap+1 <= $total_count_LargeCap): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_LargeCap*2+1 <= $total_count_LargeCap): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_LargeCap*3+1 <= $total_count_LargeCap): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
		  </tr>
		  <tr>
			<td valign="top"><ul>
                <?php $i=0; foreach($stock_list_LargeCap as $stock): if($i<$item_per_col_LargeCap): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            
            <?php if($item_per_col_LargeCap+1 <= $total_count_LargeCap): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_LargeCap as $stock): if($i<$item_per_col_LargeCap*2 && $i>=$item_per_col_LargeCap): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>
            
            <?php if($item_per_col_LargeCap*2+1 <= $total_count_LargeCap): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_LargeCap as $stock): if($i<$item_per_col_LargeCap*3 && $i>=$item_per_col_LargeCap*2): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>            
            
            <?php if(($item_per_col_LargeCap*3+1) <= $total_count_LargeCap): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_LargeCap as $stock): if($i<=$item_per_col_LargeCap*4 && $i>=$item_per_col_LargeCap*3): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>                        
                        
		  </tr>
		 <tr>
			<td colspan="4"><div class="chartborder"></div></td>
		  </tr>
		</table>
	  </div>  

      <span class="heading_violet_chart">Stockholm Mid Cap</span>
	  <div class="float_left widthall">
		<table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap">
		  <tr>
			<td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
			<?php if($item_per_col_MidCap+1 <= $total_count_MidCap): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_MidCap*2+1 <= $total_count_MidCap): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_MidCap*3+1 <= $total_count_MidCap): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
		  </tr>
		  <tr>
			<td valign="top"><ul>
                <?php $i=0; foreach($stock_list_MidCap as $stock): if($i<$item_per_col_MidCap): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            
            <?php if($item_per_col_MidCap+1 <= $total_count_MidCap): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_MidCap as $stock): if($i<$item_per_col_MidCap*2 && $i>=$item_per_col_MidCap): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>
            
            <?php if($item_per_col_MidCap*2+1 <= $total_count_MidCap): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_MidCap as $stock): if($i<$item_per_col_MidCap*3 && $i>=$item_per_col_MidCap*2): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>            
            
            <?php if(($item_per_col_MidCap*3+1) <= $total_count_MidCap): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_MidCap as $stock): if($i<=$item_per_col_MidCap*4 && $i>=$item_per_col_MidCap*3): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>                        
                        
		  </tr>
		 <tr>
			<td colspan="4"><div class="chartborder"></div></td>
			</tr>
		</table>
	  </div>  
  
      <span class="heading_violet_chart">Stockholm Small Cap</span>
	  <div class="float_left widthall">
		<table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap">
		  <tr>
			<td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
			<?php if($item_per_col_SmallCap+1 <= $total_count_SmallCap): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_SmallCap*2+1 <= $total_count_SmallCap): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
			<?php if($item_per_col_SmallCap*3+1 <= $total_count_SmallCap): ?>
            <td><img src="/images/img34graf.png" alt="photo" width="138"  /></td>
            <?php endif; ?>
		  </tr>
		  <tr>
			<td valign="top"><ul>
                <?php $i=0; foreach($stock_list_SmallCap as $stock): if($i<$item_per_col_SmallCap): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            
            <?php if($item_per_col_SmallCap+1 <= $total_count_SmallCap): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_SmallCap as $stock): if($i<$item_per_col_SmallCap*2 && $i>=$item_per_col_SmallCap): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>
            
            <?php if($item_per_col_SmallCap*2+1 <= $total_count_SmallCap): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_SmallCap as $stock): if($i<$item_per_col_SmallCap*3 && $i>=$item_per_col_SmallCap*2): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>            
            
            <?php if(($item_per_col_SmallCap*3+1) <= $total_count_SmallCap): ?>
            <td valign="top"><ul>
                <?php $i=0; foreach($stock_list_SmallCap as $stock): if($i<=$item_per_col_SmallCap*4 && $i>=$item_per_col_SmallCap*3): ?>
                    <li class='width_138'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/1"><?php echo $stock->company_name ?></a></li>
                <?php endif; $i++; endforeach; ?>
			  </ul>
            </td>
            <?php endif; ?>                        
                        
		  </tr>
		
		 </table>
	  </div>    
  
  
  </div>  
  	<div class="contactdell widthall">
    <div class="blank_5h widthall">&nbsp;</div>
        <!-- AddThis Button BEGIN -->
          <div class="addthis_default_style ">
            <a href="https://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button text_decoration_none">
                <font color="#547184">&nbsp;<?php echo __('Dela') ?> </font>&nbsp;<img alt="strip" src="/images/smallcolorstrip.jpg" />
            </a>
          </div><div>
          <?php include_partial('global/share_link_bottom') ?></div>
          <!-- AddThis Button END -->
	<div class="blank_30h widthall">&nbsp;</div>
    </div>  
</div>

</div>

<?php echo include_partial('global/borst_right_banner_article',array('host_str'=>$host_str,'ad_1'=>$ad_1,'ad_2'=>$ad_2,'ad_3'=>$ad_3,'ad_4'=>$ad_4)); ?>
<div class="colorstrip">&nbsp;</div>
<?php include_partial('global/six_cube_footer',array('host_str'=>$host_str,'bottom_commodities_links'=>$bottom_commodities_links,'bottom_currencies_links'=>$bottom_currencies_links,'bottom_buysell_links'=>$bottom_buysell_links,'bottom_statistics_links'=>$bottom_statistics_links,'bottom_aktier_links'=>$bottom_aktier_links,'bottom_kronika_links'=>$bottom_kronika_links)) ?>
</div>