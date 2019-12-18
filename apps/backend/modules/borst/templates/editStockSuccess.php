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
  <div class="forumlistingleftdiv" style="width:950px;">
   <div class="forumlistingleftdivinner" style="width:915px;">
   
	<div id="subscription_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
		<a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/btchart?stock_type=all' ?>">Stock List</a>&nbsp;&nbsp;
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/addStock' ?>">Add Stock</a>&nbsp;&nbsp;
        <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/addChartType' ?>">Add chart Type</a>&nbsp;&nbsp;        
	</div>
    
    <div class="shoph3 widthall">Edit Stock</div>
    <div class="widthall" style="color: green;"><?php if($updateSuccess) echo "Stock details updated successfully"; ?></div>
    <br />
    
    <div class="float_left widthall">
    	<div class="float_left widthall" style="margin-bottom:20px;">
        <form action="<?php echo 'https://'.$host_str.'/backend.php/borst/editStock/stock_id/'.$stock_id ?>" method="post">
        <?php echo $form->renderHiddenFields()?>
        <input type="hidden" name="created_at" value="<?php echo $form_data->created_at ?>" />
        <input type="hidden" name="updated_at" value="<?php echo $form_data->updated_at ?>" />
        <input type="hidden" name="active" value="<?php echo $form_data->active ?>" />
    		<table>
                <tr>
                    <td>Company Type</td>
                    <td><?php echo $form['company_type_id']->render() ?></td>
                </tr>
                <tr>
                    <td>Company Name</td>
                    <td><?php echo $form['company_name']->render() ?><?php echo $form['company_name']->renderError() ?></td>
                </tr>
                <tr>    
                    <td>Company Symbol</td>
                    <td><?php echo $form['company_symbol']->render() ?><?php echo $form['company_symbol']->renderError() ?></td>                    
                </tr>
                <tr>
                    <td>Country</td>
                    <td><?php echo $form['country']->render() ?><?php echo $form['country']->renderError() ?></td>
                </tr>
                <tr>
                    <td>List</td>
                    <td><?php echo $form['list']->render() ?><?php echo $form['list']->renderError() ?></td>
                </tr>
                <tr>
                    <td>Sector</td>
                    <td><?php echo $form['sector']->render() ?><?php echo $form['sector']->renderError() ?></td>                                                                                                                        
                </tr>
                <!--//code change by sandeep -->
                <tr>
                    <td>Objekt</td>
                    <td><?php
                            echo $form['object_id']->renderError();
                            echo $form['object_id']->render(array('class'=>'selectmenu'));
                        ?>
                    </td>
               </tr>
               <!--//code change by sandeep end -->
                <tr>
                    <td colspan="2" align="right"><input type="submit" value="Update Stock" /></td>                                                                                                                        
                </tr>                
            </table>
    	</form>	
    	</div>
                 
    </div>
    
  </div>
 </div>
</div>