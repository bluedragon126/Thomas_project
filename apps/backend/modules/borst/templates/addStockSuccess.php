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
   <div class="forumlistingleftdivinner">
   
	<div id="subscription_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/btchart?stock_type=all' ?>">Stock List</a>&nbsp;&nbsp;
		<a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/addStock' ?>">Add Stock</a>&nbsp;&nbsp;
        <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/addChartType' ?>">Add chart Type</a>&nbsp;&nbsp;
	</div>
    
    <div class="shoph3 widthall">Add Stock</div>
    <div class="widthall" style="color: green;"><?php if($addSuccess) echo "Stock details added successfully"; ?></div>
    <br />
    
    <div class="float_left widthall">
    	<div class="float_left widthall" style="margin-bottom:20px;">
        <form action="<?php echo 'https://'.$host_str.'/backend.php/borst/addStock/' ?>" method="post" onsubmit="return checkAddStockFormValidation()">
        <?php echo $form->renderHiddenFields()?>
    		<table>
                <tr>
                    <td>Stock Type</td>
                    <td><?php echo $form['company_type_id']->render() ?></td>
                </tr>
                <tr>
                    <td>Stock Name</td>
                    <td><?php echo $form['company_name']->render() ?><?php echo $form['company_name']->renderError() ?><span id="btchart_company_details_company_name_error"></span></td>
                </tr>
                <tr>    
                    <td>Stock Symbol</td>
                    <td><?php echo $form['company_symbol']->render() ?><?php echo $form['company_symbol']->renderError() ?><span id="btchart_company_details_company_symbol_error"></span></td>                    
                </tr>
                <tr>
                    <td>Country</td>
                    <td><?php echo $form['country']->render() ?><?php echo $form['country']->renderError() ?><span id="btchart_company_details_country_error"></span></td>
                </tr>
                <tr>
                    <td>List</td>
                    <td><?php echo $form['list']->render() ?><?php echo $form['list']->renderError() ?><span id="btchart_company_details_list_error"></span></td>
                </tr>
                <tr>
                    <td>Sector</td>
                    <td><?php echo $form['sector']->render() ?><?php echo $form['sector']->renderError() ?><span id="btchart_company_details_sector_error"></span></td>                                                                                                                        
                </tr>
                <tr>
                    <td>Objekt</td>
                    <td><?php
                            echo $form['object_id']->renderError();
                            echo $form['object_id']->render(array('class'=>'selectmenu'));
                        ?>
                    </td>
               </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit" value="Add Stock" /></td>                                                                                                                        
                </tr>                
            </table>
    	</form>	
    	</div>
                 
    </div>
    
  </div>
 </div>
</div>
<script type="text/javascript">
    function checkAddStockFormValidation()
    {
        var stock_name = $("#btchart_company_details_company_name").val();
        var stock_symbol = $("#btchart_company_details_company_symbol").val();
        var country = $("#btchart_company_details_country").val();
        var list = $("#btchart_company_details_list").val();
        var sector = $("#btchart_company_details_sector").val();
        var flag = false;
        if(stock_name ==''){
            $("#btchart_company_details_company_name_error").html('Required');
            flag = true;
        }else {$("#btchart_company_details_company_name_error").html('');}
            
            
        if(stock_symbol ==''){
            $("#btchart_company_details_company_symbol_error").html('Required');
            flag = true;
        }else{ $("#btchart_company_details_company_symbol_error").html(''); }
            
            
        if(country ==''){
            $("#btchart_company_details_country_error").html('Required');
            flag = true;
        }else {$("#btchart_company_details_country_error").html('');}
            
        if(list ==''){
            $("#btchart_company_details_list_error").html('Required');
            flag = true;
        }else {$("#btchart_company_details_list_error").html('');}            
            
        if(sector ==''){
            $("#btchart_company_details_sector_error").html('Required');
            flag = true;
        }else {$("#btchart_company_details_sector").html('');}

            
        if(flag)
            return false
        else 
            return true;                        
    }
</script>