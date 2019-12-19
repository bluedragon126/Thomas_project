	<div id="subscription_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
		<a style="font-weight:bold;" href="<?php echo 'http://'.$host_str.'/backend.php/borst/btchart?stock_type=all' ?>">Stock List</a>&nbsp;&nbsp;
		<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/addStock' ?>">Add Stock</a>&nbsp;&nbsp;
        <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/addChartType' ?>">Add chart Type</a>&nbsp;&nbsp;        
	</div>
    
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

  	<input type="hidden" id="btchart_column_order" name="shop_article_column_order" value="<?php echo $current_column_order; ?>"/>
	<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
	<input type="hidden" id="btchart_column" name="shop_article_column" value="<?php echo $cur_column; ?>"/>
    
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
                    <td> <?php echo $object_arr[$data->object_id]; //added by sandeep?> </td>
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
    
