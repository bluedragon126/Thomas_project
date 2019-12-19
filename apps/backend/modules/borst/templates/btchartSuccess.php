<style type="text/css">
#subscription_other_links a {color:#114993;}
.heading{
    font-weight: bold;
}
.classnot{
   
}
.stock_filter{
    float: left; font-weight: bold; margin-bottom: 5px;
}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv" >
   <div class="forumlistingleftdivinner" style="width:95%;">
   <div id="btchart_list_outer"> 
	<div id="subscription_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
		<a style="font-weight:bold;" href="<?php echo 'http://'.$host_str.'/backend.php/borst/btchart?stock_type=all' ?>">Stock List</a>&nbsp;&nbsp;
		<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/addStock' ?>">Add Stock</a>&nbsp;&nbsp;
        <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/addChartType' ?>">Add chart Type</a>&nbsp;&nbsp;        
	</div>

  	<input type="hidden" id="btchart_column_order" name="shop_article_column_order" value="<?php echo $current_column_order; ?>"/>
	<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
	<input type="hidden" id="btchart_column" name="shop_article_column" value="<?php echo $cur_column; ?>"/>
            
    <div class="shoph3 widthall"> <span style="float: left;"> Stock List </span> </div>
    <div class="stock_filter">
    <form name="stock_list" action="" id="stock_list" method="get" >
            
            Stock type:
            <select id="stock_type" name="stock_type">
                <option value="all">All</option>
                <?php foreach($stock_types as $key=>$value): ?>
                    <option value="<?php echo $key; ?>" <?php echo $selected_stock_type == $key ? 'selected' : ''?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select> 
    </form>
    </div>
    
    <div style="float: right; color: #FF9900;" id="success_msg"></div>
    <div class="float_left widthall">
   	<div class="float_left listing">
    <form name="stock_list_main" action="" id="stock_list_main" method="post" >
        <table align="left" style="" cellpadding="0" cellspacing="0">
            <tr id="btchart_stock_list">
                <td class="heading" style="width: 15%;"><strong><a id="sortby_stockname" class="float_left cursor"><span id="sortby_stockname2">Stock Name<img src="/images/bg.gif" alt="down" /></span></a></strong></td>
                <td class="heading" style="width: 12%;"><strong><a id="sortby_stocksymbol" class="float_left cursor"><span id="sortby_stocksymbol2">Stock Symbol<img src="/images/bg.gif" alt="down" /></span></strong></a></td>
                <td class="heading" style="width: 8%;"><strong><a id="sortby_country" class="float_left cursor"><span id="sortby_country2">Country<img src="/images/bg.gif" alt="down" /></span></a></strong></td>
                <td class="heading" style="width: 12%;"><strong><a id="sortby_stocktype" class="float_left cursor"><span id="sortby_stocktype2">Stock Type<img src="/images/bg.gif" alt="down" /></span></a></strong></td>
                <td class="heading" style="width: 12%;"><strong><a id="sortby_list" class="float_left cursor"><span id="sortby_list2">List<img src="/images/bg.gif" alt="down" /></span></a></strong></td>
                <td class="heading" style="width: 12%;"><strong><a id="sortby_sector" class="float_left cursor"><span id="sortby_sector2">Sector<img src="/images/bg.gif" alt="down" /></span></a></strong></td>
                <!--//change by sandeep-->
                <td class="heading" style="width: 12%;"><strong><a id="sortby_object" class="float_left cursor"><span id="sortby_object2">Object<img src="/images/bg.gif" alt="down" /></span></a></strong></td>
                <!--//change by sandeep end-->
                <td class="heading" style="width: 12%;"><strong>Enable / Disable</strong></td>
                <td colspan="2"><input type="button" value="Save Changes" class="registerbuttontext submit" style="float:left;" id="btchart_list_button" /></td>
            </tr>
            <?php foreach($pager->getResults() as $data): ?>
                <tr class="classnot" id="row_<?php echo $data->id; ?>">
                    <td> <?php echo $data->company_name; ?> </td>                    
                    <td> <?php echo $data->company_symbol; ?> </td>                    
                    <td> <?php echo $data->country; ?> </td> 
                    <td> <?php echo $catgeory_arr[$data->company_type_id]; ?> </td>                                       
                    <td> <?php echo $data->list; ?> </td>                    
                    <td> <?php echo $data->sector; ?> </td>
                    <td> <?php echo $object_arr[$data->object_id]; // added by sandeep ?> </td>
                    <td>
                        <input type="radio" value="enable" name="stock[<?php echo $data->id; ?>]" id="<?php echo $data->id; ?>" <?php if($data->active)echo "checked='checked'"; ?> />Active
                        <input type="radio" value="disable" name="stock[<?php echo $data->id; ?>]" id="<?php echo $data->id; ?>" <?php if($data->active!=1)echo "checked='checked'"; ?> />InActive
                    </td>                    
                    <td> 
                        <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/editStock/stock_id/'.$data->id; ?>" id="<?php echo $data->id ?>" class="edit_stock"><img src="/images/edit.png" /> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" id="<?php echo $data->id ?>" class="delete_stock"><img src="/images/cross.png" /> </a>
                    </td>
                    <td>  </td>                
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
        
  <?php if($pager->getNbResults()>0) : ?>
  <div class="paginationwrapper float_left widthall">
	  <div class="pagination" id="btchart_search_listing">
		<?php if ($pager->haveToPaginate()): ?>
        <a id="1" href="#" class="cursor"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>
		<a id="<?php echo $pager->getPreviousPage(); ?>" href="#" style="cursor:pointer;"> < </a>
		<?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
		<?php if($page == $pager->getPage()): ?>
		<?php echo '<span class="selected">'.$page.'</span>' ?>
        <input type="hidden" id="current_page" value="<?php echo $page; ?>" />
		<?php else: ?>
		<a id="<?php echo $page; ?>" style="cursor:pointer;" href="#" class="cursor"> <?php echo $page; ?> </a>
		<?php endif; ?>
		<?php if ($page != $pager->getCurrentMaxLink()): ?>
		-
		<?php endif; ?>
		<?php endforeach ?>
		<a id="<?php echo $pager->getNextPage(); ?>" href="#" style="cursor:pointer;"> > </a> <a href="#" id="<?php echo $pager->getLastPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
		<?php endif; ?>
	 </div>
  </div>
  <?php endif; ?>
    </div>
    </div>
    
  </div>
  </div>
 </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $(".delete_stock").live('click','',function(){
        $flag = window.confirm('Do you want to delete this sotck');
        if($flag){
            var str = '<?php echo 'http://'.$host_str.'/backend.php/borst/deleteStock/stock_id/'?>';
            str = str+this.id;
            row_id = this.id;
            $.post(str, function(data){
               $("#row_"+row_id).remove();
            });
        }
    })
   $("#btchart_list_button").live('click','',function(){
		form_data = ($("#stock_list_main").serialize());
        url = '/backend.php/borst/enableOrDisableStocks';
        $.post(url,form_data,function(data){
            $("#success_msg").html(data);
        });
   })
   $("#stock_type").live('change','',function(){
        $("#stock_list").submit();
   });
   $('#btchart_stock_list a').live("click",function(){ 
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();
        var order = $('#btchart_column_order').val();
	    $('#btchart_stock_list #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
		$.ajax({
			  url:'/backend.php/borst/getBtChartListData/?column_id='+column_id+'&btchart_column_order='+order,
			  success:function(data)
			  { 
			  	$("#btchart_list_outer").html(data);
				var order = $('#btchart_column_order').val();
				setBtchartStockListOrderImage(column_id,order);                        	    
			  }
		});                
   });
   $("#btchart_search_listing a").live("click",function(){alert(2);
        var column_id = $("#column_id").val();
        var order = $('#btchart_column_order').val();
        url = '/backend.php/borst/getBtChartListData?page='+this.id+'&column_id='+column_id+'&btchart_column_order='+order;
        $.get(url,'',function(data){
            $("#btchart_list_outer").html(data);
            var order = $('#btchart_column_order').val();
            setBtchartStockListOrderImage(column_id,order);
        });
   }); 
   function setBtchartStockListOrderImage(column_id,order)
   {
    	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
    	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
    			
    	if(column_id == 'sortby_stockname') $('#sortby_stockname2').html('Stock Name'+image_txt+'');
    	if(column_id == 'sortby_stocksymbol') $('#sortby_stocksymbol2').html('Stock Symbol'+image_txt+'');
    	if(column_id == 'sortby_country') $('#sortby_country2').html('Country'+image_txt+'');
    	if(column_id == 'sortby_stocktype') $('#sortby_stocktype2').html('Stock Type'+image_txt+'');
        if(column_id == 'sortby_list') $('#sortby_list2').html('List'+image_txt+'</span>');
        if(column_id == 'sortby_sector') $('#sortby_sector2').html('Sector'+image_txt+'');
        if(column_id == 'sortby_object') $('#sortby_object2').html('Object'+image_txt+'');//change by sandeep
   }            
   });
</script>