<div class="forumlistingleftdivinner">
      	<div class="breadcrumb">
    	  <ul>
    		<li>
                <?php include_component('isicsBreadcrumbs', 'show', array(
    	           'root' => array('text' => 'B�RSTJ�NAREN', 'uri' => 'borst/borstHome')
    	       )) ?> 
           </li>
    	  </ul>
	   </div>
    
   <div id="btchart_list_outer"> 
	<input type="hidden" id="btchart_column_order" name="shop_article_column_order" value="<?php echo $current_column_order; ?>"/>
	<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
	<div class="shop_detail_title2">   <input type="hidden" id="btchart_column" name="shop_article_column" value="<?php echo $cur_column; ?>"/>
      <?php if($pager->getNbResults()>0) : ?>
      <div class="paginationwrapper float_left widthall ">
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
    </div>
         
    <div class="shoph3 widthall"> <span style="float: left;"> Marknadslista </span> </div>
    <div class="stock_filter">
    <form name="stock_list" action="" id="stock_list" method="get" >
            
            Marknadstyp:
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
   
  <?php endif; ?>
    <form name="stock_list_main" action="" id="stock_list_main" method="post" >
        <table align="left" style="" cellpadding="0" cellspacing="0">
            <tr id="btchart_stock_list">
                <td class="heading" style="width: 18%;"><strong><a id="sortby_stockname" class="float_left cursor"><span id="sortby_stockname2"> Namn<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>
                <td class="heading" style="width: 20%;"><strong><a id="sortby_stocksymbol" class="float_left cursor"><span id="sortby_stocksymbol2"> Symbol<img src="/images/bg.gif" alt="down" width = '20' /></span></a></td>
                <td class="heading" style="width: 12%;"><strong><a id="sortby_country" class="float_left cursor"><span id="sortby_country2">Land<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>
                <td class="heading" style="width: 20%;"><strong><a id="sortby_stocktype" class="float_left cursor"><span id="sortby_stocktype2">Marknadstyp<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>
                <td class="heading" style="width: 15%;"><strong><a id="sortby_list" class="float_left cursor"><span id="sortby_list2">Lista<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>
                <td class="heading" style="width: 15%;"><strong><a id="sortby_sector" class="float_left cursor"><span id="sortby_sector2">Sektor<img src="/images/bg.gif" alt="down" width = '20' /></span></a></strong></td>               
            </tr>
            <?php foreach($pager->getResults() as $data): ?>
                <tr class="classnot" id="row_<?php echo $data->id; ?>">
                    <td> <a class="bluelink" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/","_",$data->company_name); ?>/stock_id/<?php echo $data->id ?>/chart_type/1"><?php echo $data->company_name; ?></a> </td>                    
                    <td> <?php echo $data->company_symbol; ?> </td>                    
                    <td> <?php echo $data->country; ?> </td> 
                    <td> <?php echo $catgeory_arr[$data->company_type_id]; ?> </td>                                       
                    <td> <?php echo $data->list; ?> </td>                    
                    <td> <?php echo $data->sector; ?> </td>
                   
                    <td>  </td>                
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
        
  <?php if($pager->getNbResults()>0) : ?>
  <div class="paginationwrapper float_left widthall">
	  <div class="pagination dummy2" id="btchart_search_listing">
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