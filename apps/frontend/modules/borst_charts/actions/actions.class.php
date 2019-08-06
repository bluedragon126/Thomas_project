<?php

/**
 * borst_charts actions.
 *
 * @package    sisterbt
 * @subpackage borst_charts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class borst_chartsActions extends sfActions
{

 /**
  * 
  * Executes Before Every Action
  */
  public function preExecute() 
  {
	$user = $this->getUser();
	$host_str = $this->getRequest()->getHost();
	//$wantsurl = stdlib::accessed_url();
	//$this->getUser()->setAttribute('wantsurl',$wantsurl);
		
	$this->getUser()->setAttribute('third_menu', '');
 
	$actionName  = $this->getActionName();
	$showdata = 0;

    $this->list_length =1;     // for showing list of stock in 4 columns
	
    $ajax_called_action_names_arr = array('chartImage','getBtChartListData');
		
	if(!in_array($actionName, $ajax_called_action_names_arr))
	{
		$stdlib = new stdlib();
		$wantsurl = $stdlib->accessed_url();
		$this->getUser()->setAttribute('wantsurl',$wantsurl);
	}
    	
	$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
    $this->admin = $this->getUser()->isSuperAdmin();
    $this->host_str = $this->getRequest()->getHost();
	
	//Right column articles
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAY','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OCT','11'=>'NOV','12'=>'DEC');
	$col1_814_heading_style = array('articleheading3_1st','redheaing2','articleheading3_2nd','articleheading_goda','articleheading3_1st','redheaing2','articleheading3_2nd');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
	
	$image_arr_814 = array('midadd.jpg','photo9.jpg','photo10.jpg','photo11.jpg','midadd.jpg','photo9.jpg','photo11.jpg');
	$image_arr_1417 = array('photo1.jpg','photo2.jpg','photo3.jpg','photo4.jpg');
	
	$cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
	$type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
	$object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
	
	foreach($cat_data as $cat)		{	$cat_arr[$cat->category_id] = $cat->category_name;		}
	foreach($type_data as $type)	{	$type_arr[$type->type_id] = $type->type_name;			}
	foreach($object_data as $obj)	{	$object_arr[$obj->object_id] = $obj->object_name;		}
	
	$this->cat_arr = $cat_arr; 
	$this->type_arr = $type_arr;
	$this->object_arr = $object_arr;
	
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	
	$this->image_arr_1417 = $image_arr_1417;

	$this->comm_fifteen_eighteen = ArticleTable::getInstance()->getHomeBorstHome(14,4,$isSuperAdmin);
	$this->comment_cnt = new BorstArticleComment();
	
	if(!$this->getRequest()->isXmlHttpRequest())
	{
		// Bottom Cube Links
		$this->bottom_commodities_links = ArticleTable::getInstance()->getHomeCommodities(0,10,$isSuperAdmin);
		$this->bottom_currencies_links = ArticleTable::getInstance()->getHomeCurrencies(0,10);
		$this->bottom_buysell_links = ArticleTable::getInstance()->getHomeBuySell(0,10,$isSuperAdmin);
		$this->bottom_statistics_links = ArticleTable::getInstance()->getHomeStatisticsArticle(0,10,$isSuperAdmin);
		$this->bottom_aktier_links = ArticleTable::getInstance()->getHomeAktier(0,10,$isSuperAdmin);
		$this->bottom_kronika_links = ArticleTable::getInstance()->getHomeKronikaArticle(0,10,$isSuperAdmin);
		
		// For Ads
		$adpos_1_arr = $this->getUser()->getAttribute('adpos_1_arr');
		$adpos_2_arr = $this->getUser()->getAttribute('adpos_2_arr');
		$adpos_3_arr = $this->getUser()->getAttribute('adpos_3_arr');
		$adpos_4_arr = $this->getUser()->getAttribute('adpos_4_arr');
		$adpos_5_arr = $this->getUser()->getAttribute('adpos_5_arr');
		
		$priority_1_arr = $this->getUser()->getAttribute('priority_1_arr');
		$priority_2_arr = $this->getUser()->getAttribute('priority_2_arr');
		$priority_3_arr = $this->getUser()->getAttribute('priority_3_arr');
		$priority_4_arr = $this->getUser()->getAttribute('priority_4_arr');
		$priority_5_arr = $this->getUser()->getAttribute('priority_5_arr');
		
		$num_1 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_1_arr',$adpos_1_arr,'Right_top1','priority_1_arr',$priority_1_arr); 
		$this->ad_1 = SbtAdsTable::getInstance()->getAdString($num_1);	
		
		$num_2 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_2_arr',$adpos_2_arr,'Right_top2','priority_2_arr',$priority_2_arr); 
		$this->ad_2 = SbtAdsTable::getInstance()->getAdString($num_2);	
		
		$this->ad_3 = SbtAdsTable::getInstance()->getBulkAdId($adpos_3_arr,'adpos_3_arr','Right_top3'); 
		
		$num_4 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_4_arr',$adpos_4_arr,'Right_top4','priority_4_arr',$priority_4_arr); 
		$this->ad_4 = SbtAdsTable::getInstance()->getAdString($num_4);	
                
                $adpos_6_arr = $this->getUser()->getAttribute('adpos_6_arr');
                $priority_6_arr = $this->getUser()->getAttribute('priority_6_arr');
                $adpos_7_arr = $this->getUser()->getAttribute('adpos_7_arr');
                $priority_7_arr = $this->getUser()->getAttribute('priority_7_arr');
                
                $num_6 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_6_arr',$adpos_6_arr,'Header_top1','priority_6_arr',$priority_6_arr); 
		$this->ad_6 = SbtAdsTable::getInstance()->getAdString($num_6);	
                $this->getUser()->setAttribute('ad_6', $this->ad_6);
                
                $num_7 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_7_arr',$adpos_7_arr,'Header_top2','priority_7_arr',$priority_7_arr); 
		$this->ad_7 = SbtAdsTable::getInstance()->getAdString($num_7);	
                $this->getUser()->setAttribute('ad_7', $this->ad_7);
                
                
                $adpos_8_arr = $this->getUser()->getAttribute('adpos_8_arr');
                $priority_8_arr = $this->getUser()->getAttribute('priority_8_arr');
                $num_8 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_8_arr',$adpos_8_arr,'top_mid','priority_8_arr',$priority_8_arr); 
		$this->ad_8 = SbtAdsTable::getInstance()->getAdString($num_8);	
                $this->getUser()->setAttribute('ad_8', $this->ad_8);
	
	}
        //Code for clear session facebook meta title and description
        if($this->getActionName()!="borstArticleDetails") {        
            $this->getUser()->setAttribute('meta_title_page', '');
            $this->getUser()->setAttribute('meta_desc_page', '');
        }
  }

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('borst_charts', 'borstChartsHome');
  }
 
 /**
  * Executes BorstChartsHome action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsHome(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_home');
	$this->getUser()->setAttribute('third_menu', '');
    $this->getUser()->setAttribute('chart_type',null);
    
    $obj = new BtchartCompanyDetails();
    //$this->uploaded_images_path = '/uploads/btcharts_dummy/';
	$this->uploaded_images_path = '/images/article_images/bt_charts/bt_d_w/';
    
    $obj = new BtchartCompanyDetails();
    
    $this->stock_list_lasarnas = $obj->getStockListForCategory('Läsarnas val');
    $this->stockTypeId_lasarnas = $obj->getStockTypeId('Läsarnas val');
    $this->total_count_lasarnas = count($this->stock_list_lasarnas); 
    $count = ceil(count($this->stock_list_lasarnas)/4);
    if($count>$this->list_length) 
        $this->item_per_col_lasarnas = $count;
    else
        $this->item_per_col_lasarnas = $this->list_length;    
    
    
    $this->stock_list_varlden = $obj->getStockListForCategory('Världen');
    $this->stockTypeId_varlden = $obj->getStockTypeId('Världen');
    $this->total_count_varlden = count($this->stock_list_varlden); 
    $count = ceil(count($this->stock_list_varlden)/4);
    if($count>$this->list_length) 
        $this->item_per_col_varlden = $count;
    else
        $this->item_per_col_varlden = $this->list_length;
    
    $this->stock_list_LargeCap = $obj->getStockListForCategory('Large Cap - Sverige');
    $this->stockTypeId_LargeCap = $obj->getStockTypeId('Large Cap - Sverige');  
    $this->total_count_LargeCap = count($this->stock_list_LargeCap); 
    $count = ceil(count($this->stock_list_LargeCap)/4);
    if($count>$this->list_length) 
        $this->item_per_col_LargeCap = $count;
    else
        $this->item_per_col_LargeCap = $this->list_length;    

    $this->stock_list_MidCap = $obj->getStockListForCategory('Mid Cap - Sverige');
    $this->stockTypeId_MidCap = $obj->getStockTypeId('Mid Cap - Sverige');
    $this->total_count_MidCap = count($this->stock_list_MidCap); 
    $count = ceil(count($this->stock_list_MidCap)/4);
    if($count>$this->list_length) 
        $this->item_per_col_MidCap = $count;
    else
        $this->item_per_col_MidCap = $this->list_length;    
    
    $this->stock_list_SmallCap = $obj->getStockListForCategory('Small Cap - Sverige');
    $this->stockTypeId_SmallCap = $obj->getStockTypeId('Small Cap - Sverige');
    $this->total_count_SmallCap = count($this->stock_list_SmallCap); 
    $count = ceil(count($this->stock_list_SmallCap)/4);
    if($count>$this->list_length) 
        $this->item_per_col_SmallCap = $count;
    else
        $this->item_per_col_SmallCap = $this->list_length;        

    $this->stock_list_Ravaror = $obj->getStockListForCategory('Råvaror');
    $this->stockTypeId_Ravaror = $obj->getStockTypeId('Råvaror');
    $this->total_count_Ravaror = count($this->stock_list_Ravaror); 
    $count = ceil(count($this->stock_list_Ravaror)/4);
    if($count>$this->list_length) 
        $this->item_per_col_Ravaror = $count;
    else
        $this->item_per_col_Ravaror = $this->list_length;        

    $this->stock_list_Valutor = $obj->getStockListForCategory('Valutor');
    $this->stockTypeId_Valutor = $obj->getStockTypeId('Valutor');
    $this->total_count_Valutor = count($this->stock_list_Valutor); 
    $count = ceil(count($this->stock_list_Valutor)/4);
    if($count>$this->list_length) 
        $this->item_per_col_Valutor = $count;
    else
        $this->item_per_col_Valutor = $this->list_length; 
		
	$this->stock_list_SP100 = $obj->getStockListForCategory('S&P 100');
    $this->stockTypeId_SP100 = $obj->getStockTypeId('S&P 100');
    $this->total_count_SP100 = count($this->stock_list_SP100); 
    $count = ceil(count($this->stock_list_SP100)/4);
    if($count>$this->list_length) 
        $this->item_per_col_SP100 = $count;
    else
        $this->item_per_col_SP100 = $this->list_length;
		
		$this->stock_list_NQ100 = $obj->getStockListForCategory('NASDAQ 100');
    $this->stockTypeId_NQ100 = $obj->getStockTypeId('NASDAQ 100');
    $this->total_count_NQ100 = count($this->stock_list_NQ100); 
    $count = ceil(count($this->stock_list_NQ100)/4);
    if($count>$this->list_length) 
        $this->item_per_col_NQ100 = $count;
    else
        $this->item_per_col_NQ100 = $this->list_length;
		
			$this->stock_list_ETF = $obj->getStockListForCategory('ETF');
    $this->stockTypeId_ETF = $obj->getStockTypeId('ETF');
    $this->total_count_ETF = count($this->stock_list_ETF); 
    $count = ceil(count($this->stock_list_ETF)/4);
    if($count>$this->list_length) 
        $this->item_per_col_ETF = $count;
    else
        $this->item_per_col_ETF = $this->list_length;
    
    isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('HEM', 'borst_charts/borstChartsHome');           

	$article_comment = new BorstArticleComment();
	$this->comment_cnt = $article_comment->getTotalCommentCount($article_id);
	
	//---------------------------------------------------------------------------------
	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAY','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OCT','11'=>'NOV','12'=>'DEC');
	
	$col1_13_heading_style_start = array('<h3 class="articleheading">','<h4 class="articleheading_varldens">','<h4 class="articleheading2"><b>');
	$col1_13_heading_style_end = array('</h3>','</h4>','</b></h4>');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
	$col1_814_heading_style = array('articleheading3_1st','redheaing2','articleheading3_2nd','articleheading_goda','articleheading3_1st','redheaing2','articleheading3_2nd');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
	$last_column_style = array('adheading','adheadinggreen','adheading_small','adheading_v','adheading','adheadinggreen','adheading_small','adheading_v');
	
	$image_arr_13 = array('articleleft_photo1.jpg','photo6.jpg','photo8.jpg');
	$image_arr_67 = array('photo7.jpg','photo6.jpg');
	$image_arr_814 = array('midadd.jpg','photo9.jpg','photo10.jpg','photo11.jpg','midadd.jpg','photo9.jpg','photo11.jpg');
	$image_arr_1417 = array('photo1.jpg','photo2.jpg','photo3.jpg','photo4.jpg');
	$last_column_img = array('photo1.jpg','photo2.jpg','photo3.jpg','photo4.jpg','photo1.jpg','photo2.jpg','photo3.jpg','photo4.jpg');

	$cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
	$type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
	$object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
	
	foreach($cat_data as $cat)		{	$cat_arr[$cat->category_id] = $cat->category_name;		}
	foreach($type_data as $type)	{	$type_arr[$type->type_id] = $type->type_name;			}
	foreach($object_data as $obj)	{	$object_arr[$obj->object_id] = $obj->object_name;		}
	
	$this->cat_arr = $cat_arr; 
	$this->type_arr = $type_arr;
	$this->object_arr = $object_arr;
	
	$this->col1_13_heading_style_start = $col1_13_heading_style_start;
	$this->col1_13_heading_style_end = $col1_13_heading_style_end;
	$this->col1_45_div_style = $col1_45_div_style;
	$this->col1_67_heading_style = $col1_67_heading_style;
	$this->col1_814_heading_style = $col1_814_heading_style;
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	$this->last_column_style = $last_column_style;
	
	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;
	
	// Articles related to Commodities.
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	else $isSuperAdmin = 0;	
	
	$two_column_articles = ArticleTable::getInstance()->getHomeBorstHome(0,27,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(5,8,$isSuperAdmin);
	
	$index = 1;
	$one_2_three = $four_2_five = $six_2_eight = $nine_2_ten = $eleven_2_thirteen = $fourteen_2_fifteen = array();
	$sixteen_2_nineteen = $twenty_2_twentythree = $twentyfour_2_twentyseven = array();
	$twentyeight_2_thirtyfive = array();
	
	$arr_1 = array(1,3,5);
	$arr_2 = array(7,8);
	$arr_3 = array(10,12,14);
	$arr_4 = array(16,17);
	$arr_5 = array(19,21,23);
	$arr_6 = array(25,26);
	$arr_7 = array(2,4,6,9);
	$arr_8 = array(11,13,15,18);
	$arr_9 = array(20,22,24,27);

	
	$i = $j = $k = $l = $m = $n = $p = $q = $r = $s = 0;
	
	foreach($two_column_articles as $data)
	{
		if(in_array($index, $arr_1)) 
		{ 
			$one_2_three[$i]['article_date'] = $data->article_date;
			$one_2_three[$i]['article_id'] = $data->article_id;
			$one_2_three[$i]['category_id'] = $data->category_id;
			$one_2_three[$i]['type_id'] = $data->type_id;
			$one_2_three[$i]['image_text'] = $data->image_text;
			$one_2_three[$i]['image'] = $data->image;
			$one_2_three[$i]['title'] = $data->title;
			$i++;
		}
		if(in_array($index, $arr_2)) 
		{
			$four_2_five[$j]['article_date'] = $data->article_date;
			$four_2_five[$j]['article_id'] = $data->article_id;
			$four_2_five[$j]['category_id'] = $data->category_id;
			$four_2_five[$j]['type_id'] = $data->type_id;
			$four_2_five[$j]['image_text'] = $data->image_text;
			$four_2_five[$j]['image'] = $data->image;
			$four_2_five[$j]['title'] = $data->title;
			$j++;		
		}
		if(in_array($index, $arr_3)) 
		{
			$six_2_eight[$k]['article_date'] = $data->article_date;
			$six_2_eight[$k]['article_id'] = $data->article_id;
			$six_2_eight[$k]['category_id'] = $data->category_id;
			$six_2_eight[$k]['type_id'] = $data->type_id;
			$six_2_eight[$k]['image_text'] = $data->image_text;
			$six_2_eight[$k]['image'] = $data->image;
			$six_2_eight[$k]['title'] = $data->title;
			$k++;				
		}
		if(in_array($index, $arr_4)) 
		{
			$nine_2_ten[$l]['article_date'] = $data->article_date;
			$nine_2_ten[$l]['article_id'] = $data->article_id;
			$nine_2_ten[$l]['category_id'] = $data->category_id;
			$nine_2_ten[$l]['type_id'] = $data->type_id;
			$nine_2_ten[$l]['image_text'] = $data->image_text;
			$nine_2_ten[$l]['image'] = $data->image;
			$nine_2_ten[$l]['title'] = $data->title;
			$l++;				
		}
		if(in_array($index, $arr_5)) 
		{
			$eleven_2_thirteen[$m]['article_date'] = $data->article_date;
			$eleven_2_thirteen[$m]['article_id'] = $data->article_id;
			$eleven_2_thirteen[$m]['category_id'] = $data->category_id;
			$eleven_2_thirteen[$m]['type_id'] = $data->type_id;
			$eleven_2_thirteen[$m]['image_text'] = $data->image_text;
			$eleven_2_thirteen[$m]['image'] = $data->image;
			$eleven_2_thirteen[$m]['title'] = $data->title;
			$m++;				
		}
		if(in_array($index, $arr_6)) 
		{
			$fourteen_2_fifteen[$n]['article_date'] = $data->article_date;
			$fourteen_2_fifteen[$n]['article_id'] = $data->article_id;
			$fourteen_2_fifteen[$n]['category_id'] = $data->category_id;
			$fourteen_2_fifteen[$n]['type_id'] = $data->type_id;
			$fourteen_2_fifteen[$n]['image_text'] = $data->image_text;
			$fourteen_2_fifteen[$n]['image'] = $data->image;
			$fourteen_2_fifteen[$n]['title'] = $data->title;
			$n++;				
		}
		if(in_array($index, $arr_7)) 
		{
			$sixteen_2_nineteen[$p]['article_date'] = $data->article_date;
			$sixteen_2_nineteen[$p]['article_id'] = $data->article_id;
			$sixteen_2_nineteen[$p]['category_id'] = $data->category_id;
			$sixteen_2_nineteen[$p]['type_id'] = $data->type_id;
			$sixteen_2_nineteen[$p]['image_text'] = $data->image_text;
			$sixteen_2_nineteen[$p]['image'] = $data->image;
			$sixteen_2_nineteen[$p]['title'] = $data->title;
			$p++;						
		}
		if(in_array($index, $arr_8)) 
		{
			$twenty_2_twentythree[$q]['article_date'] = $data->article_date;
			$twenty_2_twentythree[$q]['article_id'] = $data->article_id;
			$twenty_2_twentythree[$q]['category_id'] = $data->category_id;
			$twenty_2_twentythree[$q]['type_id'] = $data->type_id;
			$twenty_2_twentythree[$q]['image_text'] = $data->image_text;
			$twenty_2_twentythree[$q]['image'] = $data->image;
			$twenty_2_twentythree[$q]['title'] = $data->title;
			$q++;						
		}
		if(in_array($index, $arr_9)) 
		{
			$twentyfour_2_twentyseven[$r]['article_date'] = $data->article_date;
			$twentyfour_2_twentyseven[$r]['article_id'] = $data->article_id;
			$twentyfour_2_twentyseven[$r]['category_id'] = $data->category_id;
			$twentyfour_2_twentyseven[$r]['type_id'] = $data->type_id;
			$twentyfour_2_twentyseven[$r]['image_text'] = $data->image_text;
			$twentyfour_2_twentyseven[$r]['image'] = $data->image;
			$twentyfour_2_twentyseven[$r]['title'] = $data->title;
			$r++;						
		}
		
		$index++;
	}
	
	foreach($last_column_articles as $data)
	{
		$twentyeight_2_thirtyfive[$s]['article_date'] = $data->article_date;
		$twentyeight_2_thirtyfive[$s]['article_id'] = $data->article_id;
		$twentyeight_2_thirtyfive[$s]['category_id'] = $data->category_id;
		$twentyeight_2_thirtyfive[$s]['type_id'] = $data->type_id;
		$twentyeight_2_thirtyfive[$s]['image_text'] = $data->image_text;
		$twentyeight_2_thirtyfive[$s]['image'] = $data->image;
		$twentyeight_2_thirtyfive[$s]['title'] = $data->title;
		$s++;		
	}
	
	$this->comment_cnt = new BorstArticleComment();
	
	$this->one_2_three = $one_2_three;
	$this->four_2_five = $four_2_five;
	$this->six_2_eight = $six_2_eight;
	$this->nine_2_ten = $nine_2_ten;
	$this->eleven_2_thirteen = $eleven_2_thirteen;
	$this->fourteen_2_fifteen = $fourteen_2_fifteen;
	$this->sixteen_2_nineteen = $sixteen_2_nineteen;
	$this->twenty_2_twentythree = $twenty_2_twentythree;
	$this->twentyfour_2_twentyseven = $twentyfour_2_twentyseven;
	$this->twentyeight_2_thirtyfive = $twentyeight_2_thirtyfive;
	
	$this->comment_cnt = new BorstArticleComment();
	//---------------------------------------------------------------------------------
        
        // Code for 6 footer product
        $btshop_article = new BtShopArticle();
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
  } 
  
  /**
  * Executes BorstChartsVarlden action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsVarlden(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_varlden');
    isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
	isicsBreadcrumbs::getInstance()->addItem('VÄRLDEN', 'borst_charts/borstChartsVarlden');
    
    $obj = new BtchartCompanyDetails();
    $this->stock_list = $obj->getStockListForCategory('Världen');
    $this->stockTypeId = $obj->getStockTypeId('Världen');
    $this->getUser()->setAttribute('chart_type',null);
    
    $this->total_count = count($this->stock_list); 
    $count = ceil(count($this->stock_list)/4);
    if($count>$this->list_length) 
        $this->item_per_col = $count;
    else
        $this->item_per_col = $this->list_length;        
  } 
  
  /**
  * Executes BorstChartsLargeCap action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsLargeCap(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_largeCap');
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('LARGE CAP', 'borst_charts/borstChartsLargeCap');
    
    $obj = new BtchartCompanyDetails();
    $this->stock_list = $obj->getStockListForCategory('Large Cap - Sverige');
    $this->stockTypeId = $obj->getStockTypeId('Large Cap - Sverige');
    $this->getUser()->setAttribute('chart_type',null);  

    $this->total_count = count($this->stock_list); 
    $count = ceil(count($this->stock_list)/4);
    if($count>$this->list_length) 
        $this->item_per_col = $count;
    else
        $this->item_per_col = $this->list_length;    
  } 
  
  /**
  * Executes BorstChartsMidCap action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsMidCap(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_midCap');
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('MID CAP', 'borst_charts/borstChartsMidCap');
     
    $obj = new BtchartCompanyDetails();
    $this->stock_list = $obj->getStockListForCategory('Mid Cap - Sverige');
    $this->stockTypeId = $obj->getStockTypeId('Mid Cap - Sverige');
    $this->getUser()->setAttribute('chart_type',null);    

    $this->total_count = count($this->stock_list); 
    $count = ceil(count($this->stock_list)/4);
    if($count>$this->list_length) 
        $this->item_per_col = $count;
    else
        $this->item_per_col = $this->list_length;      
  } 
  
  /**
  * Executes BorstChartsSmallCap action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsSmallCap(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_smallCap');
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('SMALL CAP', 'borst_charts/borstChartsSmallCap');
    
    $obj = new BtchartCompanyDetails();
    $this->stock_list = $obj->getStockListForCategory('Small Cap - Sverige');
    $this->stockTypeId = $obj->getStockTypeId('Small Cap - Sverige');
    $this->getUser()->setAttribute('chart_type',null);    

    $this->total_count = count($this->stock_list); 
    $count = ceil(count($this->stock_list)/4);
    if($count>$this->list_length) 
        $this->item_per_col = $count;
    else
        $this->item_per_col = $this->list_length;           
  } 
  
  /**
  * Executes BorstChartsRavaror action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsRavaror(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('RÅVAROR', 'borst_charts/borstChartsRavaror'); 
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_ravaror');

    $obj = new BtchartCompanyDetails();
    $this->stock_list = $obj->getStockListForCategory('Råvaror');
    $this->stockTypeId = $obj->getStockTypeId('Råvaror');
    $this->getUser()->setAttribute('chart_type',null);  

    $this->total_count = count($this->stock_list); 
    $count = ceil(count($this->stock_list)/4);
    if($count>$this->list_length) 
        $this->item_per_col = $count;
    else
        $this->item_per_col = $this->list_length;             
  } 
  
  /**
  * Executes BorstChartsValutor action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsValutor(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_valutor');
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('VALUTOR', 'borst_charts/borstChartsValutor');     
    
    $obj = new BtchartCompanyDetails();
    $this->stock_list = $obj->getStockListForCategory('Valutor');
    $this->stockTypeId = $obj->getStockTypeId('Valutor');
    $this->getUser()->setAttribute('chart_type',null);  

    $this->total_count = count($this->stock_list); 
    $count = ceil(count($this->stock_list)/4);
    if($count>$this->list_length) 
        $this->item_per_col = $count;
    else
        $this->item_per_col = $this->list_length;                 
  }

  /**
  * Executes BorstChartsLasarnas action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsLasarnas(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_lasarnas');
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('LÄSARNAS VAL', 'borst_charts/borstChartsLasarnas');
    
    $obj = new BtchartCompanyDetails();
    
    $this->stock_list_lasarnas = $obj->getStockListForCategory('Läsarnas val');
    $this->stockTypeId_lasarnas = $obj->getStockTypeId('Läsarnas val');
    $this->total_count_lasarnas = count($this->stock_list_lasarnas); 
    $count = ceil(count($this->stock_list_lasarnas)/4);
    if($count>$this->list_length) 
        $this->item_per_col_lasarnas = $count;
    else
        $this->item_per_col_lasarnas = $this->list_length;                          
  }    
  /**
  * Executes BorstChartsSP100 action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsSP100(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_SP100');
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('S&P 100', 'borst_charts/borstChartsSP100');
    
    $obj = new BtchartCompanyDetails();
    $this->stock_list = $obj->getStockListForCategory('S&P 100');
    $this->stockTypeId = $obj->getStockTypeId('S&P 100');
    $this->getUser()->setAttribute('chart_type',null);  

    $this->total_count = count($this->stock_list); 
    $count = ceil(count($this->stock_list)/4);
    if($count>$this->list_length) 
        $this->item_per_col = $count;
    else
        $this->item_per_col = $this->list_length;                          
  }    
  
  /**
  * Executes BorstChartsNQ100 action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsNQ100(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_NQ100');
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('NASDAQ 100', 'borst_charts/borstChartsNQ100');
    
        $obj = new BtchartCompanyDetails();
    $this->stock_list = $obj->getStockListForCategory('NASDAQ 100');
    $this->stockTypeId = $obj->getStockTypeId('NASDAQ 100');
    $this->getUser()->setAttribute('chart_type',null);  

    $this->total_count = count($this->stock_list); 
    $count = ceil(count($this->stock_list)/4);
    if($count>$this->list_length) 
        $this->item_per_col = $count;
    else
        $this->item_per_col = $this->list_length;                          
  }
      
  /**
  * Executes BorstChartsETF action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsETF(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_ETF');
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('ETF', 'borst_charts/borstChartsETF');
    
        $obj = new BtchartCompanyDetails();
    $this->stock_list = $obj->getStockListForCategory('ETF');
    $this->stockTypeId = $obj->getStockTypeId('ETF');
    $this->getUser()->setAttribute('chart_type',null);  

    $this->total_count = count($this->stock_list); 
    $count = ceil(count($this->stock_list)/4);
    if($count>$this->list_length) 
        $this->item_per_col = $count;
    else
        $this->item_per_col = $this->list_length;                          
  }    
  
  /**
  * Executes BorstChartsKalender action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsKalender(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('submenu_menu', 'bt_charts_kalender');
	$dailyFx = new Dailyfx();
	
	$timestamp = $dailyFx->getDistinctRecordTime();
	//Convert to seconds
	$now =  strtotime("now") . "<br>";
	$timestamp = strtotime($timestamp[0][0]);

	
	$tableAge = $now - $timestamp;
	$weekInSec = 3600;

	if($tableAge > $weekInSec) 
	{ 
		$dailyFx->updateTable();
	}
	$this->data = $dailyFx->getAllRecordFromDailyfx();
	isicsBreadcrumbs::getInstance()->addItem('KALENDER', 'borst_charts/borstChartsKalender'); 
  }
  
  public function executeBorstShowChart(sfWebRequest $request)
  {
    $this->getUser()->setAttribute('parent_menu_common', '3');
    $this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
    if($request->hasParameter('stock_id')){
        sfContext::getInstance()->getUser()->setAttribute('stock_id',$request->getParameter('stock_id'));
    }
    if($request->hasParameter('stock_type')){
        sfContext::getInstance()->getUser()->setAttribute('stock_type',$request->getParameter('stock_type'));
    }
    if($request->hasParameter('chart_type')){
        sfContext::getInstance()->getUser()->setAttribute('chart_type',$request->getParameter('chart_type'));
    }    
    $stock_id = sfContext::getInstance()->getUser()->getAttribute('stock_id',$stock_id);
    $stock_type = sfContext::getInstance()->getUser()->getAttribute('stock_type',$stock_type);
    $chart_type = sfContext::getInstance()->getUser()->getAttribute('chart_type',$chart_type);
    if(!$chart_type)
        $chart_type=1;    
    
    $this->stock_id = $stock_id;
    $this->stock_type = $stock_type;
    $this->chart_type = $chart_type;

    $stock_name = $request->getParameter('stock_name'); 

    //$purchase = new Purchase();
    //$purchase_order = $purchase->getSuccessFullPurchaseOrderOfUser($this->logged_user);

    //$this->chart_product_arr = array("BT Trend" => "12","BT Utbrott" => "13","BT Kanalen" => "14","Henry Boy" => "15","Kandelaber" => "16");
     $btShopArticle = new BtShopArticle();
     $btChartObj = new BtChartType();
     $chart_type_list = $btChartObj->getChartTypes();
    
     $chart_products_arr = $btShopArticle->getShopArticleOfType(7);
     $chart_products = array();
     foreach($chart_products_arr as $product){
        $chart_products[$chart_type_list[$product->btchart_type_id]] = $product->id;     // product ID which belongs to BT-Chart
     }
     $this->chart_product_arr = $chart_products;

    /*
    $subscription = new Subscription();
    $buttons = array();
    foreach($purchase_order as $obj){
        $result_data = $subscription->getProductListAndDateForPurchaseId($obj);
        foreach($result_data as $data){
            if(in_array($data->product_id,$this->chart_product_arr))
            {
                $start_date = strtotime($data->start_date);
                $end_date = strtotime($data->end_date);
                $cur_date = strtotime(date("Y-m-d"));
                if($cur_date<=$end_date && $cur_date>=$start_date)
                 $buttons[]=$data->product_id;  
            }
        }
    }
    $buttons_arr =array();     
    foreach($this->chart_product_arr as $key => $value){
        if(in_array($value,$buttons))
            $buttons_arr[]=$key;
    }
     *
     */

    //$this->show_button = $buttons_arr;
    
    $this->show_button = SubscriptionTable::getValidChartSubscriptionsByUser($this->logged_user && $this->logged_user!=''? $this->logged_user : 0);
    

    if($this->getUser()->isAuthenticated()){
        $this->validUser = true;
        $this->isValidUser = 'logUser';
    }else{
        $this->validUser = false;
        $this->isValidUser = 'NotlogUser';
    }
    // check for wether the user has subscription for current chart
    if($chart_type>3)
    {
        $chartTypeText = $btChartObj->getChartTypeTextFromId($chart_type);
     
        if(in_array($chartTypeText,$this->show_button))
            $this->show_chart = 1;
        else
            $this->show_chart = 0;
        $this->uploaded_images_path = '/images/article_images/bt_charts/bt_1_charts/';       // for paid charts
        $this->uploaded_images_path_2 = 'images/article_images/bt_charts/bt_1_charts/';      // used when showing image through header
    }
    else
    {
        $this->show_chart = 1;
        $this->uploaded_images_path = '/images/article_images/bt_charts/bt_d_w/';      // for free charts
        $this->uploaded_images_path_2 = 'images/article_images/bt_charts/bt_d_w/';
    }
    if($this->admin)
        $this->show_chart = 1;
    if($chart_type==3)
    {
        $this->uploaded_images_path = '/images/article_images/bt_charts/bt_1_charts/';
        $this->uploaded_images_path_2 = 'images/article_images/bt_charts/bt_1_charts/';
        if($this->logged_user)
           $this->show_chart = 1;
        else
           $this->show_chart = 0;  
        
    }
    if($this->show_chart)
        $this->getUser()->setAttribute('show_chart',1);
    else
        $this->getUser()->setAttribute('show_chart',0);
    
    $this->getUser()->setAttribute('chart_type',$chart_type);        
    
    $this->uploaded_path_for_htm_files =  '/images/article_images/bt_charts/bt_2_texts/';       
    
    $obj = new BtchartCompanyDetails();
    $stock_data = $obj->getSelectedStockRecord($stock_id);
    
    $favorite = new BtchartFavorite();
    $add_to_fav = $favorite->getFavoriteStatus($stock_id,$stock_data->company_type_id,$chart_type,$this->logged_user);
    $this->add_to_fav = $add_to_fav;    

    $borst_obj_id = $obj->getBorstObjectIdFromStockSymbol($stock_data->company_symbol);
    $sbt_obj_id = $obj->getSbtObjectIdFromStockSymbol($stock_data->company_symbol);
    
    $stock_list = $obj->getStockListFromCategory($stock_data->company_type_id);  // active stocks only

    $list = array();
    foreach($stock_list as $stock){
        $list[]=$stock->id;     // get id list for active stocks
    }
    foreach($list as $key=>$value){
        if($value==$stock_id){
            if($list[$key+1])
                $next = $list[$key+1];
            if($list[$key-1])
                $prev = $list[$key-1];    
        }        
    }
    if(!$next)
        $next = $list[0];
    if(!$prev)
        $prev = end($list);

    $this->stock = $stock_data;
	$this->stock_2 = $stock_data;
    $this->next_stock = $obj->getSelectedStockRecord($next);
    $this->prev_stock = $obj->getSelectedStockRecord($prev);
    
    $btChartObj = new BtChartType();
    $this->chart_type_details = $btChartObj->getChartTypeDetails($chart_type);
    
    $image_name = strtolower($this->stock->company_symbol)."_".$this->chart_type_details->chart_type_image;
    $this->getUser()->setAttribute('chart_image_path',$this->uploaded_images_path_2);
    $this->getUser()->setAttribute('chart_image',$image_name);
    
    $myFile = $_SERVER['DOCUMENT_ROOT']."/".$this->uploaded_path_for_htm_files.strtolower($this->stock->company_symbol)."-".$this->chart_type_details->chart_type_file;
	// make sure the file is successfully opened before doing anything else
	if (!$fp = fopen($myFile, 'r')){
        $myFile = $_SERVER['DOCUMENT_ROOT']."/".$this->uploaded_path_for_htm_files.strtolower($this->stock->company_symbol)."_".$this->chart_type_details->chart_type_short_name.".html";
    }
    
	if ($fp = fopen($myFile, 'r')) 
	{
		$content = '';
		// keep reading until there's nothing left
		while ($line = fread($fp, 1024)) 
		{
			$content .= $line;
		}
	} 
	else 
	{
		// an error occured when trying to open the specified file
		//echo 'Anable to open file.';
		$this->file_content = '';
	}
	$this->file_content = $content;
    
    // similiar articles, blogs
    $article = new Article();
    $sbtarticle = new SbtAnalysis();
    $sbtBlog = new SbtUserBlog();
    //code change by sandeep
    $stock_obj_id = Doctrine_Core::getTable('BtchartCompanyDetails')->findOneById($stock_id);
    $stock_object_id = $stock_obj_id->getObjectId();
    $this->stock_object_id = $stock_object_id;
    //$this->similar_article_list = $article->getListOfSimilarArticles($stock_object_id,5);
    $query = $article->getListOfSimilarArticlesQuery($stock_object_id);
	$mymarket = new mymarket();
	$this->pagerForSimilarArticles = $mymarket->getPagerForAll('Article','20',$query,$request->getParameter('page', 1));
    //code change by sandeep end
    //$this->similar_article_list = $article->getListOfSimilarArticlesBorst($stock_name,5);
    $this->similar_sbtarticle_list = $sbtarticle->getListOfSimilarSbtArticlesForChart($stock_name,5);
    //$this->similar_blog_list = $sbtBlog->getListOfSimilarBlogsForChart($stock_name,5);
    
	$breadcrum_menu = new Article();
	$this->first_menu = $breadcrum_menu->getMenuItem($parent_menu);
	$this->first_url = $breadcrum_menu->getMenuUrl($parent_menu);     
    
    $sub_menu_arr = array("bt_charts_varlden" => "VÄRLDEN", "bt_charts_largeCap" => "LARGE CAP", "bt_charts_midCap" => "MID CAP",
                            "bt_charts_smallCap" => "SMALL CAP", "bt_charts_ravaror" => "RÅVAROR", "bt_charts_valutor" => "VALUTOR", "bt_charts_SP100" => "S&P 100", "bt_charts_NQ100" => "NASDAQ 100", "bt_charts_ETF" => "ETF") ;
    
	$parent_menu = $this->getUser()->getAttribute('parent_menu');
	$submenu_menu = $this->getUser()->getAttribute('submenu_menu'); 
    $second_url = $breadcrum_menu->getMenuUrl($submenu_menu);   
    
	//isicsBreadcrumbs::getInstance()->addItem($sub_menu_arr[$submenu_menu], $second_url);
    isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');                    
    isicsBreadcrumbs::getInstance()->addItem($stock_data->company_name, '');
    
	$article_comment = new BorstArticleComment();
	$this->comment_cnt = $article_comment->getTotalCommentCount($article_id);
	 
    $obj = new BtchartCompanyDetails();
    
    $this->stock_list_lasarnas = $obj->getStockListForCategory('Läsarnas val');
    $this->stockTypeId_lasarnas = $obj->getStockTypeId('Läsarnas val');
    $this->total_count_lasarnas = count($this->stock_list_lasarnas); 
    $count = ceil(count($this->stock_list_lasarnas)/4);
    if($count>$this->list_length) 
        $this->item_per_col_lasarnas = $count;
    else
        $this->item_per_col_lasarnas = $this->list_length;    
    
    
    $this->stock_list_varlden = $obj->getStockListForCategory('Världen');
    $this->stockTypeId_varlden = $obj->getStockTypeId('Världen');
    $this->total_count_varlden = count($this->stock_list_varlden); 
    $count = ceil(count($this->stock_list_varlden)/4);
    if($count>$this->list_length) 
        $this->item_per_col_varlden = $count;
    else
        $this->item_per_col_varlden = $this->list_length;
    
    $this->stock_list_LargeCap = $obj->getStockListForCategory('Large Cap - Sverige');
    $this->stockTypeId_LargeCap = $obj->getStockTypeId('Large Cap - Sverige');  
    $this->total_count_LargeCap = count($this->stock_list_LargeCap); 
    $count = ceil(count($this->stock_list_LargeCap)/4);
    if($count>$this->list_length) 
        $this->item_per_col_LargeCap = $count;
    else
        $this->item_per_col_LargeCap = $this->list_length;    

    $this->stock_list_MidCap = $obj->getStockListForCategory('Mid Cap - Sverige');
    $this->stockTypeId_MidCap = $obj->getStockTypeId('Mid Cap - Sverige');
    $this->total_count_MidCap = count($this->stock_list_MidCap); 
    $count = ceil(count($this->stock_list_MidCap)/4);
    if($count>$this->list_length) 
        $this->item_per_col_MidCap = $count;
    else
        $this->item_per_col_MidCap = $this->list_length;    
    
    $this->stock_list_SmallCap = $obj->getStockListForCategory('Small Cap - Sverige');
    $this->stockTypeId_SmallCap = $obj->getStockTypeId('Small Cap - Sverige');
    $this->total_count_SmallCap = count($this->stock_list_SmallCap); 
    $count = ceil(count($this->stock_list_SmallCap)/4);
    if($count>$this->list_length) 
        $this->item_per_col_SmallCap = $count;
    else
        $this->item_per_col_SmallCap = $this->list_length;        

    $this->stock_list_Ravaror = $obj->getStockListForCategory('Råvaror');
    $this->stockTypeId_Ravaror = $obj->getStockTypeId('Råvaror');
    $this->total_count_Ravaror = count($this->stock_list_Ravaror); 
    $count = ceil(count($this->stock_list_Ravaror)/4);
    if($count>$this->list_length) 
        $this->item_per_col_Ravaror = $count;
    else
        $this->item_per_col_Ravaror = $this->list_length;        

    $this->stock_list_Valutor = $obj->getStockListForCategory('Valutor');
    $this->stockTypeId_Valutor = $obj->getStockTypeId('Valutor');
    $this->total_count_Valutor = count($this->stock_list_Valutor); 
    $count = ceil(count($this->stock_list_Valutor)/4);
    if($count>$this->list_length) 
        $this->item_per_col_Valutor = $count;
    else
        $this->item_per_col_Valutor = $this->list_length; 
		
	$this->stock_list_SP100 = $obj->getStockListForCategory('S&P 100');
    $this->stockTypeId_SP100 = $obj->getStockTypeId('S&P 100');
    $this->total_count_SP100 = count($this->stock_list_SP100); 
    $count = ceil(count($this->stock_list_SP100)/4);
    if($count>$this->list_length) 
        $this->item_per_col_SP100 = $count;
    else
        $this->item_per_col_SP100 = $this->list_length;
		
	$this->stock_list_NQ100 = $obj->getStockListForCategory('NASDAQ 100');
    $this->stockTypeId_NQ100 = $obj->getStockTypeId('NASDAQ 100');
    $this->total_count_NQ100 = count($this->stock_list_NQ100); 
    $count = ceil(count($this->stock_list_NQ100)/4);
    if($count>$this->list_length) 
        $this->item_per_col_NQ100 = $count;
    else
        $this->item_per_col_NQ100 = $this->list_length;
		
	$this->stock_list_ETF = $obj->getStockListForCategory('ETF');
    $this->stockTypeId_ETF = $obj->getStockTypeId('ETF');
    $this->total_count_ETF = count($this->stock_list_ETF); 
    $count = ceil(count($this->stock_list_ETF)/4);
    if($count>$this->list_length) 
        $this->item_per_col_ETF = $count;
    else
        $this->item_per_col_ETF = $this->list_length;	        

		
	
	$this->freeChartsPeriod = false;
	// Check 7 days
	$date = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
	$systemdate = explode('.',sfConfig::get('app_launch_date'));
	
	$setdate = mktime(0, 0, 0, intval($systemdate[1]), intval($systemdate[2]), (int)($systemdate[0]));
	
	$epoch_1 = $setdate;
	
	$epoch_2 = mktime(0,0,0,date('m'), date('d'), date('Y'));
	
	$diff_seconds  = $epoch_2 - $epoch_1;
	
	$fullDays = floor($diff_seconds/(60*60*24));
	if($fullDays >= 0 && $fullDays <= 7)
	{
		$this->freeChartsPeriod = true;
	
	}		
	//$this->freeChartsPeriod = true;
	$this->c_type = $chart_type;
        
        // Code for 6 footer product
        $btshop_article = new BtShopArticle();
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
  }
  
  public function executeGetShowChartData(sfWebRequest $request)
  {
    if($request->hasParameter('stock_id')){
        sfContext::getInstance()->getUser()->setAttribute('stock_id',$request->getParameter('stock_id'));
    }
    if($request->hasParameter('stock_type')){
        sfContext::getInstance()->getUser()->setAttribute('stock_type',$request->getParameter('stock_type'));
    }
    if($request->hasParameter('chart_type')){
        sfContext::getInstance()->getUser()->setAttribute('chart_type',$request->getParameter('chart_type'));
    }    
    $stock_id = sfContext::getInstance()->getUser()->getAttribute('stock_id',$stock_id);
    $stock_type = sfContext::getInstance()->getUser()->getAttribute('stock_type',$stock_type);
    $chart_type = sfContext::getInstance()->getUser()->getAttribute('chart_type',$chart_type);
    
    $purchase = new Purchase();
    $purchase_order = $purchase->getPurchaseOrderOfUser($this->logged_user);

    //$this->chart_product_arr = array("BT Trend" => "12","BT Utbrott" => "13","BT Kanalen" => "14","Henry Boy" => "15","Kandelaber" => "16");

    $subscription = new Subscription();
    $buttons = array();
    foreach($purchase_order as $obj){
        $result_data = $subscription->getProductListAndDateForPurchaseId($obj);
        foreach($result_data as $data){
            if(in_array($data->product_id,$this->chart_product_arr))
            {
                $start_date = strtotime($data->start_date);
                $end_date = strtotime($data->end_date);
                $cur_date = strtotime(date("Y-m-d"));
                if($cur_date<=$end_date && $cur_date>=$start_date)
                 $buttons[]=$data->product_id;  
            }
        }
    }   
    $buttons_arr =array();     
    foreach($this->chart_product_arr as $key => $value){
        if(in_array($value,$buttons))
            $buttons_arr[]=$key;
    }
    $this->show_button = $buttons_arr;
    if(sfContext::getInstance()->getUser()->isAuthenticated())
        $this->validUser = true;
    else
        $this->validUser = false;

    $favorite = new BtchartFavorite();
    $add_to_fav = $favorite->getFavoriteStatus($stock_id,$stock_type,$chart_type,$this->logged_user);
    $this->add_to_fav = $add_to_fav;

    $this->stock_id = $stock_id;
    $this->stock_type = $stock_type;
    
    $obj = new BtchartCompanyDetails();
    $stock_data = $obj->getSelectedStockRecord($stock_id);

    $borst_obj_id = $obj->getBorstObjectIdFromStockSymbol($stock_data->company_symbol);
    $sbt_obj_id = $obj->getSbtObjectIdFromStockSymbol($stock_data->company_symbol);
        
    $stock_list = $obj->getStockListFromCategory($stock_type);
    $stock_list_arr = array();
    $stock_id_arr = array();
    $next = $stock_id + 1;
    $prev = $stock_id - 1;
    foreach($stock_list as $stock)
    {
        if($stock->id==$prev)
            $stock_list_arr['previous'] = $prev;
        if($stock->id==$next)
            $stock_list_arr['next'] = $next;
        $stock_id_arr[] = $stock->id;     
    }
    if(!$stock_list_arr['previous'])
        $stock_list_arr['previous'] = end($stock_id_arr);
    if(!$stock_list_arr['next'])
        $stock_list_arr['next'] = $stock_id_arr[0];
    
    $this->stock = $stock_data;
    $this->next_stock = $obj->getSelectedStockRecord($stock_list_arr['next']);
    $this->prev_stock = $obj->getSelectedStockRecord($stock_list_arr['previous']);
    
    $btChartObj = new BtChartType();
    $this->chart_type_details = $btChartObj->getChartTypeDetails($chart_type);
    $this->uploaded_images_path = '/uploads/btcharts/';

    $myFile = $_SERVER['DOCUMENT_ROOT']."/".$this->uploaded_images_path.strtolower($this->stock->company_symbol)."_".$this->chart_type_details->chart_type_file;
	if (!$fp = fopen($myFile, 'r')){
        $myFile = $_SERVER['DOCUMENT_ROOT']."/".$this->uploaded_images_path.strtolower($this->stock->company_symbol)."_".$this->chart_type_details->chart_type_short_name.".html";
    }
    // make sure the file is successfully opened before doing anything else
	if ($fp = fopen($myFile, 'r')) 
	{
		$content = '';
		// keep reading until there's nothing left
		while ($line = fread($fp, 1024)) 
		{
			$content .= $line;
		}
	} 
	else 
	{
		// an error occured when trying to open the specified file
		//echo 'Anable to open file.';
		$this->file_content = '';
	}
	$this->file_content = $content;
    
    // similiar articles, blogs
    $article = new Article();
    $sbtarticle = new SbtAnalysis();
    $sbtBlog = new SbtUserBlog();
    $this->similar_article_list = $article->getListOfSimilarArticles($borst_obj_id,5);
    $this->similar_sbtarticle_list = $sbtarticle->getListOfSimilarSbtArticlesForChart($sbt_obj_id,5);
    $this->similar_blog_list = $sbtBlog->getListOfSimilarBlogsForChart($sbt_obj_id,5);        
    
	$breadcrum_menu = new Article();
	$this->first_menu = $breadcrum_menu->getMenuItem($parent_menu);
	$this->first_url = $breadcrum_menu->getMenuUrl($parent_menu);     
    $sub_menu_arr = array("bt_charts_varlden" => "VÄRLDEN", "bt_charts_largeCap" => "LARGE CAP", "bt_charts_midCap" => "MID CAP",
                            "bt_charts_smallCap" => "SMALL CAP", "bt_charts_ravaror" => "RÅVAROR", "bt_charts_valutor" => "VALUTOR");
    
	$parent_menu = $this->getUser()->getAttribute('parent_menu');
	$submenu_menu = $this->getUser()->getAttribute('submenu_menu'); 
    $second_url = $breadcrum_menu->getMenuUrl($submenu_menu);   
    
	isicsBreadcrumbs::getInstance()->addItem($sub_menu_arr[$submenu_menu], $second_url);         
    isicsBreadcrumbs::getInstance()->addItem(strtoupper($stock_data->company_name), '');
  }
  
  public function executeAddToMyFavorite(sfWebRequest $request)
  {
    	$id = $request->getParameter('id');
    	$arr = explode('_',$request->getParameter('id'));
    	
        $stock_id = $arr[0];
        $stock_type = $arr[1];
        $chart_type = $arr[2];
        $chartObj = new BtchartType();
        $stockObj = new BtchartCompanyDetails();
        $chart_details = $chartObj->getChartTypeDetails($chart_type);
        $stock_name = $stockObj->getStockName($stock_id);
        $desc = $stock_name." (".$chart_details->chart_type_text.") ";
        $user_id = $this->logged_user;
    	
        $add_favorite = new BtchartFavorite();
    	$add_favorite->addToFavorite($user_id,$stock_id, $stock_type, $chart_type, $desc);
   }
   
  /**
  * Executes Btchart listing
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChartsList(sfWebRequest $request)
  {
  	$this->getUser()->setAttribute('parent_menu', 'top_bt_charts');
	$this->getUser()->setAttribute('third_menu', 'list');
	$this->getUser()->setAttribute('submenu_menu', '');
	
	isicsBreadcrumbs::getInstance()->addItem('BT-CHARTS', 'borst_charts/borstChartsHome');
    isicsBreadcrumbs::getInstance()->addItem('Lista', 'borst_charts/borstChartsList');
	
    $companyList = new BtchartCompanyDetails();
   
    $companyList = new BtchartCompanyDetails();    
    if($request->isMethod('get'))
    {
        if($request->hasParameter('stock_type'))
        {
            $stock_type = ($request->getParameter('stock_type') == 'all') ? null : $request->getParameter('stock_type');
            $this->getUser()->setAttribute('stock_type', $stock_type);
        }   
		else
		{
			 $this->getUser()->setAttribute('stock_type', '');
		}        
    }
    if($this->getUser()->hasAttribute('stock_type'))
    {
        $stock_type = sfContext::getInstance()->getUser()->getAttribute('stock_type');
        $query = $companyList->getStockList2($stock_type);
        $this->selected_stock_type = $stock_type;       
    }
    else
        $query = $companyList->getStockList2();
    
    $stock_types = BtchartCompanyCategory::getCompanyCategory();
    $this->stock_types = $stock_types;   

    $this->catgeory_arr = BtchartCompanyCategory::getCompanyCategory();
    
    $this->pager = new sfDoctrinePager('BtchartCompanyDetails', 20);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
	
	$num_1 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_1_arr',$adpos_1_arr,'Right_top1','priority_1_arr',$priority_1_arr); 
	$this->ad_1 = SbtAdsTable::getInstance()->getAdString($num_1);	
	
	$num_2 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_2_arr',$adpos_2_arr,'Right_top2','priority_2_arr',$priority_2_arr); 
	$this->ad_2 = SbtAdsTable::getInstance()->getAdString($num_2);	
	
	$this->ad_3 = SbtAdsTable::getInstance()->getBulkAdId($adpos_3_arr,'adpos_3_arr','Right_top3'); 
	
	$num_4 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_4_arr',$adpos_4_arr,'Right_top4','priority_4_arr',$priority_4_arr); 
	$this->ad_4 = SbtAdsTable::getInstance()->getAdString($num_4);	
  }
  
  /**
  * Executes Btchart action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetBtChartListData(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();	
	$profile = new SfGuardUserProfile();
    	
    $column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
	$current_column = $this->getUser()->getAttribute('btchart_column','','userProperty');
	$page = $request->getParameter('page');
	$btchart_column_order = $request->getParameter('btchart_column_order');
	$set_column = 'btchart_column';
	$set_column_order = 'btchart_column_order';
     	
    $order = $profile->setSortingParameters($page,$btchart_column_order,$column_id,$current_column,$set_column,$set_column_order);

	$this->column_id = 'sortby_'.$column_id;
	$this->current_column_order = $order;
	$this->cur_column = $current_column;
            
    $companyList = new BtchartCompanyDetails();
   
    $companyList = new BtchartCompanyDetails();    
    if($request->isMethod('get'))
    {
        if($request->hasParameter('stock_type'))
        {
            $stock_type = ($request->getParameter('stock_type') == 'all') ? null : $request->getParameter('stock_type');
            $this->getUser()->setAttribute('stock_type', $stock_type);
        }           
    }
    if($this->getUser()->hasAttribute('stock_type') || $order)
    {
        $stock_type = sfContext::getInstance()->getUser()->getAttribute('stock_type');
        $query = $companyList->getStockListQuery($column_id,$order,$stock_type);
        $this->selected_stock_type = $stock_type;       
    }
    else
        $query = $companyList->getStockList2();
    
    $stock_types = BtchartCompanyCategory::getCompanyCategory();
    $this->stock_types = $stock_types;   

    $this->catgeory_arr = BtchartCompanyCategory::getCompanyCategory();
    
    $this->pager = new sfDoctrinePager('BtchartCompanyDetails', 20);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }  
  
   public function executeChartImage(sfWebRequest $request)
   {
     $this->setLayout(false);
     $show_chart = $this->getUser()->getAttribute('show_chart');
     $chart_type = $this->getUser()->getAttribute('chart_type');
     $valid_user = $this->getUser()->isAuthenticated();

		
	$this->freeChartsPeriod = false;
	// Check 7 days
	$date = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
	$systemdate = explode('.',sfConfig::get('app_launch_date'));
	
	$setdate = mktime(0, 0, 0, intval($systemdate[1]), intval($systemdate[2]), (int)($systemdate[0]));
	
	$epoch_1 = $setdate;
	
	$epoch_2 = mktime(0,0,0,date('m'), date('d'), date('Y'));
	
	$diff_seconds  = $epoch_2 - $epoch_1;
	
	$fullDays = floor($diff_seconds/(60*60*24));
	if($fullDays >= 0 && $fullDays <= 7)
	{
		$this->freeChartsPeriod = true;
	
	}		
	//$this->freeChartsPeriod = true;

     if((($this->logged_user || $chart_type<3) && $show_chart) || $this->freeChartsPeriod)
     {
	     $path = $this->getUser()->getAttribute('chart_image_path');
         $image = $this->getUser()->getAttribute('chart_image');
         $chart_filename = $path.$image;
         $file_size = filesize($chart_filename);
       
         header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
         header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past         
         header('Content-type: image/png');         
         readfile($chart_filename);
         die;                   
     }
     else
        die;
   }

}