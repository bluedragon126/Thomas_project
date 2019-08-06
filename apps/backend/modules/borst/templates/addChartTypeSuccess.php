<?php  
    $catgeory_arr = BtchartCompanyCategory::getCompanyCategory();
   // var_dump($catgeory_arr);
?>
<style type="text/css">
#subscription_other_links a {color:#114993;}
.heading{
    font-weight: bold;
}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv" >
   <div class="forumlistingleftdivinner" >
   
	<div id="subscription_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
		<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/btchart?stock_type=all' ?>">Stock List</a>&nbsp;&nbsp;
		<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/addStock' ?>">Add Stock</a>&nbsp;&nbsp;
        <a style="font-weight:bold;" href="<?php echo 'http://'.$host_str.'/backend.php/borst/addChartType' ?>">Add chart Type</a>&nbsp;&nbsp;        
	</div>
    
    <div class="shoph3 widthall">Add New Chart type</div>
    <br />
    
    <div class="float_left widthall">
    <div class="widthall" style="color: green;"><?php if($addSuccess) echo "New chart type added successfully"; ?></div>
    	<div class="float_left widthall" style="margin-bottom:20px;">
        <form action="<?php echo 'http://'.$host_str.'/backend.php/borst/addChartType/' ?>" method="post" onsubmit="return checkFormValidation()">
        <?php echo $form->renderHiddenFields()?>
    		<table>
                <tr>
                    <td>Chart Name</td>
                    <td><?php echo $form['chart_type_name']->render() ?> <span id="btchart_type_chart_type_name_error" class="error_div"></span></td>
                </tr>
                <tr>
                    <td>Chart Text</td>
                    <td><?php echo $form['chart_type_text']->render() ?> <span id="btchart_type_chart_type_text_error" class="error_div"></span></td>
                </tr>
                <tr>    
                    <td>Short Name</td>
                    <td><?php echo $form['chart_type_short_name']->render() ?> <span id="btchart_type_chart_type_short_name_error" class="error_div"></span></td>                    
                </tr>
                <tr>
                    <td>Image Name</td>
                    <td><?php echo $form['chart_type_image']->render() ?> <span id="btchart_type_chart_type_image_error" class="error_div"></span></td>
                </tr>
                <tr>
                    <td>File Name</td>
                    <td><?php echo $form['chart_type_file']->render() ?> <span id="btchart_type_chart_type_file_error" class="error_div"></span></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit" value="Add Chart Type" /></td>                                                                                                                        
                </tr>                
            </table>
    	</form>	
    	</div>
                 
    </div>
    
  </div>
 </div>
</div>
<script type="text/javascript">
    function checkFormValidation(){
        chart_name = $("#btchart_type_chart_type_name").val().trim();
        chart_text = $("#btchart_type_chart_type_text").val().trim();
        short_name = $("#btchart_type_chart_type_short_name").val().trim();
        image_name = $("#btchart_type_chart_type_image").val().trim();
        file_name = $("#btchart_type_chart_type_file").val().trim();
        var flag = false;
        if(chart_name ==''){
            $("#btchart_type_chart_type_name_error").html('Required');
            flag = true;
        }else {$("#btchart_type_chart_type_name_error").html('');}
            
            
        if(chart_text ==''){
            $("#btchart_type_chart_type_text_error").html('Required');
            flag = true;
        }else{ $("#btchart_type_chart_type_text_error").html(''); }
            
            
        if(short_name ==''){
            $("#btchart_type_chart_type_short_name_error").html('Required');
            flag = true;
        }else {$("#btchart_type_chart_type_short_name_error").html('');}
            
        if(image_name ==''){
            $("#btchart_type_chart_type_image_error").html('Required');
            flag = true;
        }else {$("#btchart_type_chart_type_image_error").html('');}            
            
        if(file_name ==''){
            $("#btchart_type_chart_type_file_error").html('Required');
            flag = true;
        }else {$("#btchart_type_chart_type_file_error").html('');}

            
        if(flag)
            return false
        else 
            return true;                        
    }
</script>