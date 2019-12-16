<?php

/**
 * borst actions.
 *
 * @package    sisterbt
 * @subpackage borst
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class borstActions extends sfActions
{
 /**
  * 
  * Executes Before Every Action
  */
  public function preExecute() 
  {
	$user = $this->getUser();
    
	$host_str = $this->getRequest()->getHost();

	/*$stdlib = new stdlib();
	$wantsurl = $stdlib->accessed_url();
	$this->getUser()->setAttribute('wantsurl',$wantsurl);*/
 
	$actionName  = $this->getActionName();
	$ajax_called_action_names_arr = array('fromAdvSearchMarket','getNewArticleListData','getSearchData','getTypeCategory','getParaFromYahoo','getTime');
		
	if(!in_array($actionName, $ajax_called_action_names_arr))
	{
		$stdlib = new stdlib();
		$wantsurl = $stdlib->accessed_url();
		$this->getUser()->setAttribute('wantsurl',$wantsurl);
	}
	if($actionName !='searchResult')
    {
        $this->getUser()->setAttribute('search_mode',null);
        $this->getUser()->setAttribute('search_parameter',null);        
    }
        
 
	$this->getUser()->setAttribute('third_menu', '');
	
	$showdata = 0;
	
	if($actionName!='searchResult' && $actionName!='getSearchData') $this->getUser()->setAttribute('search_parameter', '', 'userProperty');
	
	$action_names_arr = array('changeSetting');
	
	if(in_array($actionName, $action_names_arr))
	{
		if ($user->isAuthenticated())
		{
		}
		else
		{
			$this->redirect('user/loginWindow');		
		}
	}
	
	if(!$this->getRequest()->isXmlHttpRequest())
	{
		$article = new Article();
		$mymarket = new mymarket();
				$query1 = $article->getArticleOrderQuery('kat',12,$column_id,$order);
			
				$query2 = $article->getArticleOrderQuery('type',23,$column_id,$order);				

				$query3 = $article->getArticleOrderQuery('obj',1795 ,$column_id,$order);

			$this->bottom_buysell_links = $mymarket->getPagerForAll('Article','10',$query1,1);
			$this->bottom_statistics_links = $mymarket->getPagerForAll('Article','10',$query2,1);
			$this->bottom_kronika_links = $mymarket->getPagerForAll('Article','10',$query3,1);
		// Bottom Cube Links
		$this->bottom_commodities_links = ArticleTable::getInstance()->getHomeCommodities(0,10,$isSuperAdmin);
		$this->bottom_currencies_links = ArticleTable::getInstance()->getHomeCurrencies(0,10);
		// $this->bottom_buysell_links = ArticleTable::getInstance()->getArticleListMenu(0,10,'kat',true,$isSuperAdmin);

		// $this->bottom_statistics_links = ArticleTable::getInstance()->getArticleListMenu(0,10,'type',true,$isSuperAdmin);
		$this->bottom_aktier_links = ArticleTable::getInstance()->getHomeAktier(0,10,$isSuperAdmin);
		// $this->bottom_kronika_links = ArticleTable::getInstance()->getArticleListMenu(0,10,'obj',true,$isSuperAdmin);
		
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		$this->host_str = $this->getRequest()->getHost();
		
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
		
                $num_3 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_3_arr',$adpos_3_arr,'Right_top3','priority_3_arr',$priority_3_arr); 
		//$this->ad_3 = SbtAdsTable::getInstance()->getAdString($num_3);	
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
    $this->forward('default', 'module');
  }
  
  /**
  * Executes View BorstHome action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstHome(sfWebRequest $request)
  {
    $this->getUser()->setAttribute('parent_menu_common', '1');
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_home');
	$this->getUser()->setAttribute('third_menu', '');
	$this->host_str = $this->getRequest()->getHost();

	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');

	//$col1_13_heading_style_start = array('<h3 class="articleheading">','<h4 class="articleheading_varldens">','<h4 class="articleheading2"><b>');
        $col1_13_heading_style_start = array('home_heading_l_1','home_heading_l_2','home_heading_l_3');
	//$col1_13_heading_style_end = array('</h3>','</h4>','</b></h4>');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
	//$col1_814_heading_style = array('articleheading3_1st','redheaing2','articleheading3_2nd','articleheading_goda','articleheading3_1st','redheaing2','articleheading3_2nd');
        $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
	//$last_column_style = array('adheading','adheadinggreen','adheading_small','adheading_v','adheading','adheadinggreen','adheading_small','adheading_v');
        $last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        $fcol_body_text_6_7 = array('home_body_l_2x','home_body_l_2x');
        $fcol_body_text_2_3 = array('home_body_l_1x','home_body_l_1x');
        $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_1x','home_body_l_1x');
        $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
        $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');

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
	//$this->col1_13_heading_style_end = $col1_13_heading_style_end;
	$this->col1_45_div_style = $col1_45_div_style;
	$this->col1_67_heading_style = $col1_67_heading_style;
	$this->col1_814_heading_style = $col1_814_heading_style;
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	$this->last_column_style = $last_column_style;
        $this->fcol_hor_title = $fcol_hor_title;
        $this->fcol_ver_title = $fcol_ver_title;
        $this->fcol_big_title = $fcol_big_title;
        $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
        $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
        $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
        $this->mcol_body_text = $mcol_body_text;
        $this->rcol_body_text = $rcol_body_text;

	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;

	// Articles related to Commodities.
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	else $isSuperAdmin = 0;
	//$this->article_limit = 49;
        //$this->article_limit = 148;
        $this->article_limit = 23;
        $this->secondLimit = 0;
        
	$two_column_articles = ArticleTable::getInstance()->getHomeBorstHome(0,$this->article_limit+5,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,10,$isSuperAdmin,$two_column_articles);
        //var_dump($two_column_articles);
	$this->left_records = $two_column_articles;
        //echo 'Left Records :'.$this->left_records;
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
			//$one_2_three[$i]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_large.',$data->image)) ? $data->image : '';
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
			//$four_2_five[$j]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_semimid.',$data->image)) ? $data->image : '';
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
			//$six_2_eight[$k]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_large.',$data->image)) ? $data->image : '';
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
			//$nine_2_ten[$l]['image'] =  getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_semimid.',$data->image)) ? $data->image : '';
			$nine_2_ten[$l]['image'] =  $data->image;
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
			//$eleven_2_thirteen[$m]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_large.',$data->image)) ? $data->image : '';
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
			//$fourteen_2_fifteen[$n]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_semimid.',$data->image)) ? $data->image : '';
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
			//$sixteen_2_nineteen[$p]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_mid.',$data->image)) ? $data->image : '';
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
			//$twenty_2_twentythree[$q]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_mid.',$data->image)) ? $data->image : '';
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
			//$twentyfour_2_twentyseven[$r]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_mid.',$data->image)) ? $data->image : '';
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
                $twentyeight_2_thirtyfive[$s]['art_statid'] = $data->art_statid;
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
        
        /* For random 8 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
        
        $top_article_count = new ArticleCount();
        //$article = new Article();
        
        $this->top_nine_viewed_articles = $this->topNineArticle();
  } 


  //////////////////////////////////////////////////////////////

  public function executeArticleListMenu(sfWebRequest $request)
  {
    $this->getUser()->setAttribute('parent_menu_common', '1');
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_home');
	$this->getUser()->setAttribute('third_menu', '');
	$this->host_str = $this->getRequest()->getHost();

	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');

	//$col1_13_heading_style_start = array('<h3 class="articleheading">','<h4 class="articleheading_varldens">','<h4 class="articleheading2"><b>');
        $col1_13_heading_style_start = array('home_heading_l_1','home_heading_l_2','home_heading_l_3');
	//$col1_13_heading_style_end = array('</h3>','</h4>','</b></h4>');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
	//$col1_814_heading_style = array('articleheading3_1st','redheaing2','articleheading3_2nd','articleheading_goda','articleheading3_1st','redheaing2','articleheading3_2nd');
        $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
	//$last_column_style = array('adheading','adheadinggreen','adheading_small','adheading_v','adheading','adheadinggreen','adheading_small','adheading_v');
        $last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        $fcol_body_text_6_7 = array('home_body_l_2x','home_body_l_2x');
        $fcol_body_text_2_3 = array('home_body_l_2x','home_body_l_1x');
        $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
        $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');

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
	//$this->col1_13_heading_style_end = $col1_13_heading_style_end;
	$this->col1_45_div_style = $col1_45_div_style;
	$this->col1_67_heading_style = $col1_67_heading_style;
	$this->col1_814_heading_style = $col1_814_heading_style;
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	$this->last_column_style = $last_column_style;
        $this->fcol_hor_title = $fcol_hor_title;
        $this->fcol_ver_title = $fcol_ver_title;
        $this->fcol_big_title = $fcol_big_title;
        $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
        $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
        $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
        $this->mcol_body_text = $mcol_body_text;
        $this->rcol_body_text = $rcol_body_text;

	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;

	// Articles related to Commodities.
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	else $isSuperAdmin = 0;
	//$this->article_limit = 49;
        //$this->article_limit = 148;
        $this->article_limit = 23;
	$this->secondLimit = 0;
		// $request->getParameter('kat_id') || $request->getParameter('type_id') || $request->getParameter('obj_id')
	if($request->getParameter('kat_id')){
		$two_column_articles = ArticleTable::getInstance()->getArticleListMenu(0,$this->article_limit+5,'kat',$request->getParameter('kat_id'),$isSuperAdmin);
	}
	if($request->getParameter('type_id')){
		$two_column_articles = ArticleTable::getInstance()->getArticleListMenu(0,$this->article_limit+5,'type',$request->getParameter('type_id'),$isSuperAdmin);
	}
	if($request->getParameter('obj_id')){
		$two_column_articles = ArticleTable::getInstance()->getArticleListMenu(0,$this->article_limit+5,'obj',$request->getParameter('obj_id'),$isSuperAdmin);
	}
	// $two_column_articles = ArticleTable::getInstance()->getArticleListMenu(0,$this->article_limit,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,10,$isSuperAdmin,$two_column_articles);
        //var_dump($two_column_articles);
	$this->left_records = $two_column_articles;
        //echo 'Left Records :'.$this->left_records;
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
			//$one_2_three[$i]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_large.',$data->image)) ? $data->image : '';
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
			//$four_2_five[$j]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_semimid.',$data->image)) ? $data->image : '';
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
			//$six_2_eight[$k]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_large.',$data->image)) ? $data->image : '';
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
			//$nine_2_ten[$l]['image'] =  getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_semimid.',$data->image)) ? $data->image : '';
			$nine_2_ten[$l]['image'] =  $data->image;
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
			//$eleven_2_thirteen[$m]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_large.',$data->image)) ? $data->image : '';
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
			//$fourteen_2_fifteen[$n]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_semimid.',$data->image)) ? $data->image : '';
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
			//$sixteen_2_nineteen[$p]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_mid.',$data->image)) ? $data->image : '';
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
			//$twenty_2_twentythree[$q]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_mid.',$data->image)) ? $data->image : '';
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
			//$twentyfour_2_twentyseven[$r]['image'] = getimagesize('http://'.$this->host_str.'/uploads/articleIngressImages/'.str_replace('.','_mid.',$data->image)) ? $data->image : '';
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
                $twentyeight_2_thirtyfive[$s]['art_statid'] = $data->art_statid;
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
        
        /* For random 8 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
        
        $top_article_count = new ArticleCount();
        //$article = new Article();
        
        $this->top_nine_viewed_articles = $this->topNineArticle();
  } 
  
  /**
  * Executes BorstArticleDetails action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstArticleDetails(sfWebRequest $request)
  {
        $this->getUser()->getAttributeHolder()->remove('shopArticleId');
        $subMenuUTB = $request->getParameter('article_id');
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', '');
        if($subMenuUTB == '14276'){
            $this->getUser()->setAttribute('parent_menu_common', '8');
        }else if($subMenuUTB == '14275'){
            $this->getUser()->setAttribute('parent_menu_common', '6');
        }else{
            $this->getUser()->setAttribute('parent_menu_common', '1');
        }

	$parent_menu = $this->getUser()->getAttribute('parent_menu');        
	$submenu_menu = $this->getUser()->getAttribute('submenu_menu');
	$breadcrum_menu = new Article(); 
	$this->first_menu = $breadcrum_menu->getMenuItem($parent_menu);
	$this->first_url = $breadcrum_menu->getMenuUrl($parent_menu); 
    $this->profile = new SfGuardUserProfile();
	/*$second_menu = $breadcrum_menu->getMenuItem($submenu_menu);
	$second_url = $breadcrum_menu->getMenuUrl($submenu_menu);*/
	
	$artical_id_arr = array('342','343','344','345','346','347','353', '241');
	
	$this->mymarket = new mymarket();
	$this->stdlib = new stdlib();
	$article_html = new ArticleHtml();
	$article_cnt = new ArticleCount();

	$article_id = $request->getParameter('article_id');
	if($article_id == '2127') $this->setThirdMenuItem('webinarium');
	if (in_array($article_id, $artical_id_arr)) $this->setThirdMenuItem('a_o');
	
	$this->user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	
	$article = new Article();
	$this->article_data = $article->getSelectedArticle($article_id);
        
        $this->getUser()->setAttribute('meta_title_page', $this->article_data['title']);
        $this->getUser()->setAttribute('meta_desc_page', $this->article_data['image_text']);
        
        $this->author = Doctrine::getTable('Authors')->getAuthorByUserId($this->article_data->author_id);
	//$this->article_data->image_text = $this->decodeDescriptionText($this->article_data->image_text);
	//$this->article_data->text = $this->decodeDescriptionText($this->article_data->text);
	$this->article_image_text = $this->decodeDescriptionText($this->article_data->image_text,$this->user_id,$this->host_str);
	$this->article_description_text = $this->decodeDescriptionText($this->article_data->text,$this->user_id,$this->host_str);
	// echo ('<pre>');
	// print_r($article_id);
	// exit;

	$article_cnt->checkClickCnt($article_id);
	//$this->similar_article_list = $article->getListOfSimilarArticles($this->article_data->object_id,25);
	$query = $article->getListOfSimilarArticlesQuery($this->article_data->object_id);
	//echo $query->getSqlQuery(); die;
	$mymarket = new mymarket();
	$this->pagerForSimilarArticles = $mymarket->getPagerForAll('Article','20',$query,$request->getParameter('page', 1));
	
	
        //Code for bshop article & individual article permission sandeep            
                $this->article_access_id = $subMenuUTB;
                $btshoppermission_reply = $article->isSuscribUserForBtshopArticle();
                $purchedArticleId = $request->getParameter('article_id');
                if($purchedArticleId && $this->article_data->art_statid == 5){//if article status id is 5 (PLUS-articles)
                    $this->article_access = 1;
                    $this->flag = 1;
                    $purchase = $article->isSuscribUserForInvArticle($purchedArticleId);
                    if(count($btshoppermission_reply) && ($btshoppermission_reply[0]["checkout_status"] == 0 && $btshoppermission_reply[0]["order_processed"] == 0)){
                        $this->flag = 0;
                        $this->article_access = 1;
                        $this->message = "Du har inte slutfört köpet för denna produkt";
                    }
                    if(count($btshoppermission_reply) && ($btshoppermission_reply[0]["checkout_status"] == 1 && $btshoppermission_reply[0]["order_processed"] == 1)){
                        $this->flag = 0;
                        $this->article_access = 1;
                    }
                    if(count($purchase) && ($purchase[0]["checkout_status"] == 0 && $purchase[0]["order_processed"] == 0)){
                        $this->flag = 0;
                        $this->article_access = 1;
                        $this->message = "Du har inte slutfört köpet för denna produkt";
                    }
                    if(count($purchase) && ($purchase[0]["checkout_status"] == 1 && $purchase[0]["order_processed"] == 1)){
                        $this->flag = 0;
                        $this->article_access = 1;
                    }
                }else{//if article status id is 1,2,3,4 (Abonnent, Intern, Publik, Registrerad)
                    $this->article_access = 1;
                    $this->flag = 0;
                }
        //Code for bshop article & individual article permission sandeep end
            
        $permission_reply = $article->checkArticlePermission($this->article_data);         
	if($permission_reply == '2')
	{
		$url = 'http://'.$this->host_str.'/borst/borstArticleDetails/article_id/241';
		$this->redirect($url);
	}
	if($permission_reply == '3')
	{
		//$url = 'http://'.$this->host_str.'/borst/commentOnBorstArticle/article_id/'.$article_id;
		//$this->redirect($url);
		$this->redirect('user/loginWindow');
	}
	

	$user = $this->getUser();
	if($this->article_data->art_statid == 3)
	{
		$this->valid_user = 1;
	}
	else if(($user->isAuthenticated() && $this->article_data->art_statid != 2) || $this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1)
	{
	
	   $this->valid_user = 1;
	}   
	else if($user->isAuthenticated() && $this->article_data->art_statid == 2 && ($this->article_data->author_id == $this->getUser()->getAttribute('user_id', '', 'userProperty')) || $this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')== 1)
	{
		$this->valid_user = 1;
	}// code by sandeep
        else if ($user->isAuthenticated() && $this->getUser()->hasGroup('Publisher')) {
                $this->valid_user = 1;
        }// code by sandeep end
	else
	{
		$this->valid_user = 0;
	}	
	
	$favorite = new SbtFavorite();
	$fav_data = $favorite->isAddedInFavoriteList('article',$article_id,$this->user_id);
	if($fav_data)
	{
		if($fav_data->id!='')  $this->add_in_fav_list = 1;
		else  $this->add_in_fav_list = 0;  
	}
	else $this->add_in_fav_list = 0; 
		
		

	
	$html_rec = $article_html->getSelectedHtmlRecord($article_id);
	if($html_rec) $myFile = sfConfig::get('sf_root_dir').'/web/'.$html_rec->html_file_path;
	//if($html_rec) $myFile = 'http://www.borstjanaren.se/images/article_images/img10/qq.htm';
		
	// make sure the file is successfully opened before doing anything else
	//echo sfConfig::get('sf_root_dir').'/web/'; die;
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

	$article_comment = new BorstArticleComment();
	$this->cmt_cnt = $article_comment->getTotalCommentCount($article_id);
	
	//---------------------------------------------------------------------------------
	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
	
	//$col1_13_heading_style_start = array('<h3 class="articleheading">','<h4 class="articleheading_varldens">','<h4 class="articleheading2"><b>');
        $col1_13_heading_style_start = array('home_heading_l_1','home_heading_l_2','home_heading_l_3');
	$col1_13_heading_style_end = array('</h3>','</h4>','</b></h4>');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
	//$col1_814_heading_style = array('articleheading3_1st','redheaing2','articleheading3_2nd','articleheading_goda','articleheading3_1st','redheaing2','articleheading3_2nd');
        $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
		
		$last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        $fcol_body_text_6_7 = array('home_body_l_2x','home_body_l_2x');
        $fcol_body_text_2_3 = array('home_body_l_2x','home_body_l_1x');
        $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');

	
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
        $this->fcol_hor_title = $fcol_hor_title;
        $this->fcol_ver_title = $fcol_ver_title;
        $this->fcol_big_title = $fcol_big_title;
        $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
        $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
        $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
	
	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;
        
        $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');
        $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
        $this->mcol_body_text = $mcol_body_text;
        $this->rcol_body_text = $rcol_body_text;
	
	// Articles related to Commodities.
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	else $isSuperAdmin = 0;	
	
	//$two_column_articles = ArticleTable::getInstance()->getHomeBorstHome(0,27,$isSuperAdmin);
	//$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(5,8,$isSuperAdmin);        
        $this->article_limit = 25;
        $this->secondLimit = 4;
    if($request->getParameter('kat_id')){

	}
		$two_column_articles = ArticleTable::getInstance()->getHomeBorstHome(0,$this->article_limit,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,10,$isSuperAdmin,$two_column_articles);
        
        $this->left_records = $two_column_articles;
	
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
	$btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
	$this->metastock_data = $btshop_article->getPublishedShopArticle();
	
	$second_menu = $this->article_data ? ucfirst($this->article_data->title) : 'Article Detail';
	$second_url = $breadcrum_menu->getMenuUrl($submenu_menu);
	isicsBreadcrumbs::getInstance()->addItem($second_menu, $second_url);
        
        /* For random 5 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        $this->adData = $btshop_article->getPublishedShopArticleDetailPage();
  } 
  
  /**
  * Executes View decodeDescriptionText action
  *
  * @param $desc description for article detail
  */
  public function decodeDescriptionText($desc,$user_id,$host_str)
  {
  	$stdlib = new stdlib();
	$mymarket = new mymarket();
	$is_old = 0; 
	$main_text = '';

	$ftext = htmlspecialchars(stripslashes($desc));

	
	
	if(strstr($ftext, '[img')) $is_old = 1; 
	elseif(strstr($ftext, '[link=')) $is_old = 1;

	$ftext = nl2br($ftext);
	$ftext = $stdlib->zitat($ftext);
	$ftext = $stdlib->make_link($ftext); 
	$ftext = $stdlib->bbcode($ftext);

	
	
	$find = array("artiklar/index.php?kat=","artiklar/index.php?land=","artiklar/index.php?t_id=","artiklar/index.php?k_id=","artiklar/index.php?o_id=","artiklar/index.php?id=", "www.borstjanaren.se","/reklam","artiklar/img2","artiklar/img3","artiklar/img4","artiklar/img5","artiklar/img6","artiklar/img7","artiklar/img8","artiklar/img9","artiklar/img10","artiklar/img11","artiklar/img12","artiklar/img13","artiklar/img_ing","artiklar/img_mb","artiklar/img_portfoljer","artiklar/img","grafik/","userss/edu_signup.php","userss/change_settings.php","autogiro/fullmakt.pdf","artiklar/forum.php","images//images","images/images");
	
	//$replace = array("article/listArticle/kat/","article/listArticle/land/","article/listArticle/t_id/","article/listArticle/k_id/","article/listArticle/o_id/","article/index/id/", $host_str,"/images/reklam","images/article_images/img2","images/article_images/img3","images/article_images/img4","images/article_images/img5","images/article_images/img6","images/article_images/img7","images/article_images/img8","images/article_images/img9","images/article_images/img10","images/article_images/img11","images/article_images/img12","images/article_images/img13","images/article_images/img_ing","images/article_images/img_mb","images/article_images/img_portfoljer","images/article_images/img","images/grafik/","user/eduSignUpForm","user/changeSetting","fullmakt.pdf","forum/commentOnTopic","images","images"); 
	
	$replace = array("borst/articleList/","borst/articleList/","borst/articleList/","borst/articleList/","borst/articleList/","borst/borstArticleDetails/article_id/", $host_str,"/images/reklam","images/article_images/img2","images/article_images/img3","images/article_images/img4","images/article_images/img5","images/article_images/img6","images/article_images/img7","images/article_images/img8","images/article_images/img9","images/article_images/img10","images/article_images/img11","images/article_images/img12","images/article_images/img13","images/article_images/img_ing","images/article_images/img_mb","images/article_images/img_portfoljer","images/article_images/img","images/grafik/","user/eduSignUpForm","sbt/editProfile/edit_user_id/".$user_id,"fullmakt.pdf","forum/forumHome","images","images"); 
	
	if($is_old==1)  $main_text = $ftext;
	else $main_text = $desc;
	
	$main_text = $mymarket->modified_text($main_text);
	// echo ('<pre>');
	// print_r($replace);
	// die;
	return $main_text;
  }
  
   /**
  * Executes View setThirdMenuItem action
  *
  * @param $tab clicked tab
  */
  public function setThirdMenuItem($tab)
  { 
  	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', $tab);
  }
 
  /**
  * Executes View BorstShare action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstShare(sfWebRequest $request)
  {
  	$this->host_str = $this->getRequest()->getHost();
	
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_share');
	
	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
	
        $col1_13_heading_style_start = array('home_heading_l_1','home_heading_l_2','home_heading_l_3');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
        $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
		
		$last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        $fcol_body_text_6_7 = array('home_body_l_2x','home_body_l_2x');
        $fcol_body_text_2_3 = array('home_body_l_2x','home_body_l_1x');
        $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
        $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');

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
	$this->col1_45_div_style = $col1_45_div_style;
	$this->col1_67_heading_style = $col1_67_heading_style;
	$this->col1_814_heading_style = $col1_814_heading_style;
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	$this->last_column_style = $last_column_style;
        $this->fcol_hor_title = $fcol_hor_title;
        $this->fcol_ver_title = $fcol_ver_title;
        $this->fcol_big_title = $fcol_big_title;
        $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
        $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
        $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
        $this->mcol_body_text = $mcol_body_text;
        $this->rcol_body_text = $rcol_body_text;
	
	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;
	// Articles related to Commodities.
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	else $isSuperAdmin = 0;	
	
        
	$this->article_limit = 23;
	$this->secondLimit = 0;
	$two_column_articles = ArticleTable::getInstance()->getHomeAktier(0,$this->article_limit+5,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,8,$isSuperAdmin,$two_column_articles);
	$this->left_records = $two_column_articles;
        
        /* For random 8 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
        
	/* For Top 9 most viewed bt article */
        $this->top_nine_viewed_articles = $this->topNineArticle();
	
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
                $twentyeight_2_thirtyfive[$s]['art_statid'] = $data->art_statid;
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
  } 
  
  /**
  * Executes View BorstCommodities action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstCommodities(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_commodities');
	
	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
        
        $col1_13_heading_style_start = array('home_heading_l_1','home_heading_l_2','home_heading_l_3');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
        $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
		
		$last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        $fcol_body_text_6_7 = array('home_body_l_2x','home_body_l_2x');
        $fcol_body_text_2_3 = array('home_body_l_2x','home_body_l_1x');
        $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
        $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');

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
	$this->col1_45_div_style = $col1_45_div_style;
	$this->col1_67_heading_style = $col1_67_heading_style;
	$this->col1_814_heading_style = $col1_814_heading_style;
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	$this->last_column_style = $last_column_style;
        $this->fcol_hor_title = $fcol_hor_title;
        $this->fcol_ver_title = $fcol_ver_title;
        $this->fcol_big_title = $fcol_big_title;
        $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
        $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
        $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
        $this->mcol_body_text = $mcol_body_text;
        $this->rcol_body_text = $rcol_body_text;
	
	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;
	
	// Articles related to Commodities.
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	else $isSuperAdmin = 0;	
	
        
	$this->article_limit = 23;
	$this->secondLimit = 0;
	$two_column_articles = ArticleTable::getInstance()->getHomeCommodities(0,$this->article_limit+5,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,8,$isSuperAdmin,$two_column_articles);
	$this->left_records = $two_column_articles;
        
        /* For random 5 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
        
	/* For Top 9 most viewed bt article */
        $this->top_nine_viewed_articles = $this->topNineArticle();
        
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
                $twentyeight_2_thirtyfive[$s]['art_statid'] = $data->art_statid;
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
  }
  
  /**
  * Executes View BorstCurrencies action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstCurrencies(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_currencies');
	
	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
        
        $col1_13_heading_style_start = array('home_heading_l_1','home_heading_l_2','home_heading_l_3');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
        $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
        // $last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        // $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        // $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        // $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        // $fcol_body_text_6_7 = array('home_body_l_1x','home_body_l_2x');
        // $fcol_body_text_2_3 = array('home_body_m_4','home_body_m_3');
        // $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        // $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
		// $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');

		$last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        $fcol_body_text_6_7 = array('home_body_l_2x','home_body_l_2x');
        $fcol_body_text_2_3 = array('home_body_l_2x','home_body_l_1x');
        $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
        $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');

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
	$this->col1_45_div_style = $col1_45_div_style;
	$this->col1_67_heading_style = $col1_67_heading_style;
	$this->col1_814_heading_style = $col1_814_heading_style;
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	$this->last_column_style = $last_column_style;
        $this->fcol_hor_title = $fcol_hor_title;
        $this->fcol_ver_title = $fcol_ver_title;
        $this->fcol_big_title = $fcol_big_title;
        $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
        $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
        $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
        $this->mcol_body_text = $mcol_body_text;
        $this->rcol_body_text = $rcol_body_text;
	
	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;
	
	// Articles related to Commodities.
	/*$this->comm_one_three = ArticleTable::getInstance()->getHomeCurrencies(0,3);
	$this->comm_four_five = ArticleTable::getInstance()->getHomeCurrencies(3,2);
	$this->comm_six_seven = ArticleTable::getInstance()->getHomeCurrencies(5,2);
	$this->comm_eight_fourteen = ArticleTable::getInstance()->getHomeCurrencies(7,7);
	$this->comm_fifteen_eighteen = ArticleTable::getInstance()->getHomeCurrencies(14,4);*/
	
	//$two_column_articles = ArticleTable::getInstance()->getHomeCurrencies(0,27,$isSuperAdmin);
	//$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,8,$isSuperAdmin,$two_column_articles);
        
	$this->article_limit = 23;
	$this->secondLimit = 0;
	$two_column_articles = ArticleTable::getInstance()->getHomeCurrencies(0,$this->article_limit+5,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,8,$isSuperAdmin,$two_column_articles);
	$this->left_records = $two_column_articles;
        
        /* For random 5 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
        
	/* For Top 9 most viewed bt article */
        $this->top_nine_viewed_articles = $this->topNineArticle();
	
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
                $twentyeight_2_thirtyfive[$s]['art_statid'] = $data->art_statid;
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
  }  
  
  /**
  * Executes View BorstChronicles action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstChronicles(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_chronicles');
	isicsBreadcrumbs::getInstance()->addItem('KRÖNIKOR', 'borst/borstChronicles'); 
	$this->host_str = $this->getRequest()->getHost();
  }  
  
  /**
  * Executes View BorstStaristik action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstStaristik(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_staristik');
  }  
  
  /**
  * Executes View BorstBuySell action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstBuySell(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_buysell');
	
	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
	
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
	
	/*$this->comm_one_three = ArticleTable::getInstance()->getHomeBuySell(0,3,$isSuperAdmin);
	$this->comm_four_five = ArticleTable::getInstance()->getHomeBuySell(3,2,$isSuperAdmin);
	$this->comm_six_seven = ArticleTable::getInstance()->getHomeBuySell(5,2,$isSuperAdmin);
	$this->comm_eight_fourteen = ArticleTable::getInstance()->getHomeBuySell(7,7,$isSuperAdmin);
	$this->comm_fifteen_eighteen = ArticleTable::getInstance()->getHomeBuySell(14,4,$isSuperAdmin);*/
	
	$two_column_articles = ArticleTable::getInstance()->getHomeBorstBuySellLeft(0,27,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,8,$isSuperAdmin);
	
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
  }  
  
  /**
  * Executes View BorstSubscriber action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstSubscriber(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_subscriber');
	$this->host_str = $this->getRequest()->getHost();
	
	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
        
        $col1_13_heading_style_start = array('home_heading_l_1','home_heading_l_2','home_heading_l_3');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
        $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
        // $last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        // $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        // $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        // $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        // $fcol_body_text_6_7 = array('home_body_l_1x','home_body_l_2x');
        // $fcol_body_text_2_3 = array('home_body_m_4','home_body_m_3');
        // $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        // $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
		// $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');
		
		$last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        $fcol_body_text_6_7 = array('home_body_l_2x','home_body_l_2x');
        $fcol_body_text_2_3 = array('home_body_l_2x','home_body_l_1x');
        $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
        $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');

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
	$this->col1_45_div_style = $col1_45_div_style;
	$this->col1_67_heading_style = $col1_67_heading_style;
	$this->col1_814_heading_style = $col1_814_heading_style;
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	$this->last_column_style = $last_column_style;
        $this->fcol_hor_title = $fcol_hor_title;
        $this->fcol_ver_title = $fcol_ver_title;
        $this->fcol_big_title = $fcol_big_title;
        $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
        $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
        $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
        $this->mcol_body_text = $mcol_body_text;
        $this->rcol_body_text = $rcol_body_text;
	
	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;
	
	// Articles related to Commodities.
	/*$this->comm_one_three = ArticleTable::getInstance()->getHomeSubscriberArticle(0,3);
	$this->comm_four_five = ArticleTable::getInstance()->getHomeSubscriberArticle(3,2);
	$this->comm_six_seven = ArticleTable::getInstance()->getHomeSubscriberArticle(5,2);
	$this->comm_eight_fourteen = ArticleTable::getInstance()->getHomeSubscriberArticle(7,7);
	$this->comm_fifteen_eighteen = ArticleTable::getInstance()->getHomeSubscriberArticle(14,4);*/
	
	//$two_column_articles = ArticleTable::getInstance()->getHomeSubscriberArticle(0,27,$isSuperAdmin);
	//$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,8,$isSuperAdmin,$two_column_articles);
        
	$this->article_limit = 23;
	$this->secondLimit = 0;
	$two_column_articles = ArticleTable::getInstance()->getHomeSubscriberArticle(0,$this->article_limit+5,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell(0,8,$isSuperAdmin,$two_column_articles);
	$this->left_records = $two_column_articles;
        
        /* For random 5 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
        
	/* For Top 9 most viewed bt article */
        $this->top_nine_viewed_articles = $this->topNineArticle();
	
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
                $twentyeight_2_thirtyfive[$s]['art_statid'] = $data->art_statid;
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
  }
  
  /**
  * Executes View BorstPpm action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstPpm(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_ppm');
	
	//Right column articles
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
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
	isicsBreadcrumbs::getInstance()->addItem('PPM-Portföljen', 'borst/borstPpm'); 
  }
  /**
  * Executes View BorstNewsletter action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstNewsletter(sfWebRequest $request)
  {
    $this->getUser()->setAttribute('parent_menu_common', '7');
	isicsBreadcrumbs::getInstance()->addItem('NYHETSBREV', 'borst/borstNewsletter'); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$mymarket = new mymarket();
	$this->host_str = $this->getRequest()->getHost();
	$this->errormsg = $this->greenmsg = '';
	$newsletter = new NewsletterPublic(); 
	
	if($request->getParameter('pos')==1)
	{
		// $this->getUser()->setAttribute('parent_menu', 'top_newsletter_menu');
		$this->getUser()->setAttribute('submenu_menu', '');
		$this->getUser()->setAttribute('third_menu', 'newsletter');
	} 
	if($request->getParameter('pos')==3) 
	{	
		// $this->getUser()->setAttribute('parent_menu', ''); 
		$this->getUser()->setAttribute('submenu_menu', '');
		$this->getUser()->setAttribute('third_menu', 'newsletter');
	}
	$this->getUser()->setAttribute('third_menu', 'newsletter');
  }
  
  /**
  * Executes View CheckBorstNewsletterForm action
  *
  * @param sfRequest $request A request object
  */
  public function executeCheckBorstNewsletterForm(sfWebRequest $request)
  {
	$mymarket = new mymarket();
	$msg = '';
	$newsletter = new NewsletterPublic();
        $btNewsletterSubscriber = new BtNewsletterSubscriber();
	if ($request->isMethod('post'))
	{
		$arr = $this->getRequest()->getParameterHolder()->getAll();
                $this->host_str = $this->getRequest()->getHost();
                $userEmail = $arr['newsletter_email'];
		if($arr)
		{
			if (isset($arr['newsletter_email']))
			{
				if($arr["pren"] == 0) 
				{
					if($mymarket->is_valid_email($userEmail))
					{
						$public_data = $btNewsletterSubscriber->isNewsLetterSubscriberEmailPresent($userEmail);
					
						if(!$public_data)
						{
                                                        $activation_code = substr(number_format(time() * rand(),0,'',''),0,8);
                                                        
                                                        $user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty') ? $this->getUser()->getAttribute('user_id', '', 'userProperty') : '';
                                                        $btNewsletterSubscriber->addNonRegUserToSubscriptions($user_id,$userEmail, $activation_code);                                                        
                                                        
                                                        $msg  = "<p><font color='#00CC00'>aktiveringslänk har mejlats till: <b> $userEmail </b></font></p>";
                                                        $msg .= "<p><font color='#00CC00'>För att aktivera ditt konto, klicka på aktiveringslänken i mejlet.</font></p>";
                                                        $msg .= "<p><font color='#00CC00'>(Om du inte hittar mejlet kolla skräpkorg och ev. spamfilter.)</font></p>";                                     
                                                        
                                                        $mailBody = $this->getPartial('activation_mail_newsletter',array('user'=>$userEmail,'url'=>$this->host_str, 'activation_code' => $activation_code));
                                                        $to = $userEmail;
                                                        $from = sfConfig::get('app_mail_sender_email'); 
                                                        $message = $this->getMailer()->compose();
                                                        $message->setSubject('Slutför din registrering för Börstjänarens veckobrev.');
                                                        $message->setTo($to); 
                                                        $message->setFrom($from);
                                                        $message->setBody($mailBody, 'text/html');
                                                        $this->getMailer()->send($message);
						}
						else 
							$msg = "<font color='#f15822'><b>OBS!</b> E-post ".$userEmail." finns redan i Börstjänarens veckobrevslista!</font>";
					}
					else {
                                            $msg = "<font color='#f15822'><b>OBS!</b> Inmatad e-post har inte rätt syntax!</font>";
                                        }
				}
				elseif($arr["pren"] == 1) 
				{
					$public_data = $newsletter->IsNewsletterSubcriber($userEmail);
					$NewsletterSubscriber = $btNewsletterSubscriber->fetchUsersSubscriptions($userEmail);
                                        
					if($public_data)
					{
						$public_data->delete();                                                
                                                
						$msg = "<font color='#00CC00'>E-post ".$userEmail." är borttagen från Börstjänarens veckobrevslista</font>";
					}
                                        else 
					{
                                            $msg = "<font color='#f15822'>E-post ".$userEmail." finns inte registrerad i Börstjänarens veckobrevslista. </ br> Avregistrering av dagsbrev sker via ”Mitt konto”, se nedan.</font>";
                                        }
                                        
                                        if($NewsletterSubscriber){
                                            foreach($NewsletterSubscriber as $Ndata){
                                                $Ndata->delete();
                                            }                                                    
                                        }
					else{
                                            $msg = "<font color='#f15822'>E-post ".$userEmail." finns inte registrerad i Börstjänarens veckobrevslista. </ br> Avregistrering av dagsbrev sker via ”Mitt konto”, se nedan.</font>";
                                        }	
						
					//$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty') ? $this->getUser()->getAttribute('user_id', '', 'userProperty') : '';
					//$btNewsletterSubscriber = new BtNewsletterSubscriber();
					//$btNewsletterSubscriber->removeUserFromSubscriptions($user_id,$userEmail);
				}
			}
		}
	}
	return  $this->renderText($msg);
  }
  
  
  /**
  * 
  * The function is used when user clicks on the activation link in mail.
  * 
  */
  public function executeGetNewsletterActivated(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$chk_code = $request->getParameter('chk_code');
        $btNewsletterSubscriber = new BtNewsletterSubscriber();
        $newsletter = new NewsletterPublic();
        
        if($chk_code){
                $query = Doctrine_Query::create()->from('BtNewsletterSubscriber sup');
                $query = $query->where('sup.sbt_activation_code = ?', $chk_code);
                $data = $query->fetchOne();

                if($data)
                {
                    $qryNewsletterSubscriber = Doctrine_Query::create()
						   ->from('BtNewsletterSubscriber n')
						   ->where('n.id = ?', $data->id);
                    $newsletterSubscriberData = $qryNewsletterSubscriber->fetchOne();
                    if($newsletterSubscriberData){
                        $newsletterSubscriberData->is_subscribed = 1;
                        $newsletterSubscriberData->save();
                        
                        $public_data = $newsletter->IsNewsletterSubcriber($data->email);
                        if(!$public_data)
                        {
                            $newsletter->addNewsletterSubcriber($data->email);
                        }
                        $this->status = 1;
                    }                   
                }
                else{
                    $this->status = 2;
                }
        }else{
            $this->status = 2;
        }
  }
  
  /**
  * Executes View BorstAboutUs action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstAboutUs(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('OM OSS', 'borst/borstAboutUs'); 
	// $this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'om_oss');
  }
  /**
  * Executes View BorstWebinar action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstWebinar(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('OM OSS', 'borst/borstWebinar'); 
	$this->getUser()->setAttribute('third_menu', 'om_oss');
  }
      /**
  * Executes View BorstGoogLanding action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstGoogLanding(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('Sponsrad utbildning', 'borst/borstGoogLanding'); 
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'om_oss');
  }
       /**
  * Executes View BorstCrashCourse action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstCrashCourse(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('Gratis utbildning', 'borst/borstCrashCourse'); 
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'om_oss');
  }
       /**
  * Executes View BorstWizCourse action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstWizCourse(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('Sponsrad utbildning', 'borst/borstWizCourse'); 
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'om_oss');
  }
   /**
  * Executes View BorstConstruction action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstConstruction(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('Under konstruktion', 'borst/borstConstruction'); 
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'om_oss');
  }
  /**
  * Executes View BorstDayletter action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstDayletter(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('Dagsbrev', 'borst/borstDayletter'); 
	// $this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'dayletter');
        
        
        $arr = $this->getRequest()->getParameterHolder()->getAll();
        $this->user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
        $this->status_arr = $id_arr = array();
        $id_arr[0] = $this->user_id;
        
        $profile = new SfGuardUserProfile();
        $this->email_arr = $profile->getEmailOfSelectedUsers($id_arr);

        $btNewsletterType = new BtNewsletterType();
        $this->all_type = $btNewsletterType->getAllNewsletterType();

        $btNewsletterSubscriber = new BtNewsletterSubscriber();
        $user_rec = $btNewsletterSubscriber->fetchUsersSubscriptions($this->email_arr[0]); 
       
        foreach($user_rec as $data)
        {
                $this->status_arr[$data->newsletter_type_id] = $data->is_subscribed;
        }
  }
  /**
  * Executes View BorstCookie action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstCookie(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('Kakor (cookies) på Börstjänaren', 'borst/borstCookie'); 
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', '');
  }
   /**
  * Executes View Nybörjare action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstBeginner(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('Nybörjare', 'borst/borstBeginner'); 
	// $this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'borstbeginner');
  }
  
  /**
  * Executes View BorstEducation action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstEducation(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('UTBILDNING', 'borst/borstEducation'); 
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'utbildnings');
  }
  
  /**
  * Executes View BorstSkolan action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstSkolan(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('BT-SKOLAN', 'borst/borstSkolan'); 
	// $this->getUser()->setAttribute('parent_menu', 'top_borst_menu'); 
	// $this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'bt_skolan');
	$this->host_str = $this->getRequest()->getHost();

	// $this->getUser()->setAttribute('third_menu', 'list');
	// $this->host_str = $this->getRequest()->getHost();
	// $parent_menu = $this->getUser()->getAttribute('parent_menu');
	// $submenu_menu = $this->getUser()->getAttribute('submenu_menu');
	// $this->getUser()->setAttribute('submenu_menu', 'obj_id_1795');
	
	

	// if($parent_menu == 'top_sbt_menu' && $submenu_menu == 'sbt_menu_home'){
	// 	isicsBreadcrumbs::getInstance()->addItem('BT Insider', 'sbt/sbtHome'); 
	// 	isicsBreadcrumbs::getInstance()->addItem('Lista', 'borst/articleList'); 
	// }else {
	// // 	echo("<pre>");
	// // print_r($parent_menu .":". $submenu_menu);
	// // exit;
	// 	isicsBreadcrumbs::getInstance()->addItem('Hem', 'borst/borstHome'); 
	// 	isicsBreadcrumbs::getInstance()->addItem('Lista', 'borst/articleList'); 
	// }
	
	//Right column articles
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
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
  }
  
  /**
  * Executes View ArticleList action
  *
  * @param sfRequest $request A request object
  */
  public function executeArticleList(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('third_menu', 'list');
	$this->host_str = $this->getRequest()->getHost();
	$parent_menu = $this->getUser()->getAttribute('parent_menu');
	$submenu_menu = $this->getUser()->getAttribute('submenu_menu');
    // $this->getUser()->setAttribute('submenu_menu', 'obj_id_1795');
	
	// Variables
	$cat_arr = $type_arr = $object_arr = $object_country_arr = $param = array();
	$var_flag = $section_flag = 0;
	
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	else $isSuperAdmin = 0;	
	
	$article = new Article();
	$breadcrum_menu = new Article();
	$analysis = new SbtAnalysis();
	$mymarket = new mymarket();
	
	if( $request->getParameter('kat_id') || $request->getParameter('type_id') || $request->getParameter('obj_id') )
	{
		$var_flag = 1;
		$this->type = 'borst';
		
		if($request->getParameter('kat_id')){
			$query = $article->getArticleOrderQuery('kat',$request->getParameter('kat_id'),$column_id,$order);
			$param['kat_id'] = $request->getParameter('kat_id');
		}
		
		if($request->getParameter('type_id')){
			$query = $article->getArticleOrderQuery('type',$request->getParameter('type_id'),$column_id,$order);
			$param['type_id'] = $request->getParameter('type_id');
		}
			
		if($request->getParameter('obj_id')){
			$query = $article->getArticleOrderQuery('obj',$request->getParameter('obj_id'),$column_id,$order);
			$param['obj_id'] = $request->getParameter('obj_id');
                       
		}
		 if(!$this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty'))
                                         $query->andWhere('ba.art_statid != ?',2);
		//echo $query->getSqlQuery(); die;
		$this->pager = $mymarket->getPagerForAll('Article','20',$query,$request->getParameter('page', 1));
	}
	
	if( $request->getParameter('sbt_kat_id') || $request->getParameter('sbt_type_id') || $request->getParameter('sbt_obj_id') )
	{
		$var_flag = 2;
		$this->type = 'sbt';
		
		if($request->getParameter('sbt_kat_id')){
			$query = $analysis->getAnalysisOrderQuery('kat',$request->getParameter('sbt_kat_id'),$column_id,$order);
			$param['sbt_kat_id'] = $request->getParameter('sbt_kat_id');
		}
			
		if($request->getParameter('sbt_type_id')){
			$query = $analysis->getAnalysisOrderQuery('type',$request->getParameter('sbt_type_id'),$column_id,$order);
			$param['sbt_type_id'] = $request->getParameter('sbt_type_id');
		}
			
		if($request->getParameter('sbt_obj_id')){
			$query = $analysis->getAnalysisOrderQuery('obj',$request->getParameter('sbt_obj_id'),$column_id,$order);
			$param['sbt_obj_id'] = $request->getParameter('sbt_obj_id');
		}
		
		$this->pager = $mymarket->getPagerForAll('SbtAnalysis','20',$query,$request->getParameter('page', 1));
	}

	/* For borst */
	if($var_flag == 0)
	{
                if($parent_menu == 'top_sbt_menu'){
                    $this->type = 'sbt';
                    $section_flag = 2;

                    // Logged In users latest article.
                    $user_id = $this->getUser()->getAttribute('user_id', '' , 'userProperty');
                    if($user_id) $this->art_id = $analysis->getUserLatestArticleId($user_id);
                    else $this->art_id = '';

                    // All articles from analysis table
                    $query = $analysis->getPublishedAnalysisQuery($column_id,$order);
                    $this->pager = $mymarket->getPagerForAll('SbtAnalysis','20',$query,$request->getParameter('page', 1));
                }else{
                    $this->type = 'borst';
                    $section_flag = 1;

                    if($submenu_menu == 'borst_menu_commodities'){
                        $query = ArticleTable::getInstance()->getAllCommoditiesQuery(27,$column_id,$order);
                    }
                    else if($submenu_menu == 'borst_menu_currencies'){
                        $query = ArticleTable::getInstance()->getAllCommoditiesQuery(28,$column_id,$order);
                    }
                    else if($submenu_menu == 'borst_menu_share'){
                        $query = ArticleTable::getInstance()->getAllSharesQuery(1,$column_id,$order);
                    }
                    else if($submenu_menu == 'borst_menu_buysell'){
                        $query = ArticleTable::getInstance()->getAllBuySellArticleQuery($column_id,$order);
                    }
                    else if($submenu_menu == 'borst_menu_subscriber'){
                        $query = ArticleTable::getInstance()->getHomeSubscriberArticleQuery($column_id,$order);
                    }
                    else if($submenu_menu == 'borst_menu_home'){
                        $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                    }
                    else if($submenu_menu == 'borst_menu_forum'){
                        $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                    }
                    else if($submenu_menu == 'borst_menu_chronicles'){
                        $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                    }
                    else if($submenu_menu == 'borst_menu_ppm'){
                        $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                    }else{
                        $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                    }
                    if(!$this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty'))
                       $query->andWhere('ba.art_statid != ?',2);      
                   
					$this->pager = $mymarket->getPagerForAll('Article','20',$query,$request->getParameter('page', 1));
					// echo ($this->pager); exit;
                }
		/*if($parent_menu == 'top_borst_menu' || !$parent_menu || $parent_menu == 'top_newsletter_menu')
		{	 echo "44444===>";
			$this->type = 'borst';
			$section_flag = 1;
			switch($submenu_menu)
			{
				case 'borst_menu_commodities': $query = ArticleTable::getInstance()->getAllCommoditiesQuery(27,$column_id,$order); break;
				case 'borst_menu_currencies': $query = ArticleTable::getInstance()->getAllCommoditiesQuery(28,$column_id,$order); break;
				case 'borst_menu_share': $query = ArticleTable::getInstance()->getAllSharesQuery(1,$column_id,$order); break;
				case 'borst_menu_buysell': $query = ArticleTable::getInstance()->getAllBuySellArticleQuery($column_id,$order); break;
				case 'borst_menu_subscriber': $query = ArticleTable::getInstance()->getHomeSubscriberArticleQuery($column_id,$order); break;
				case 'borst_menu_home': $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order); break;
				case 'borst_menu_forum': $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order); break;
				case 'borst_menu_chronicles': $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order); break;
				case 'borst_menu_ppm': $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order); break;
			}
			
			if(!$submenu_menu) $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                        if(!$this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty'))
                            $query->andWhere('ba.art_statid != ?',2);
			$this->pager = $mymarket->getPagerForAll('Article','20',$query,$request->getParameter('page', 1));
		}
		else
		{echo "5555===>";
			$this->type = 'sbt';
			$section_flag = 2;
			
			// Logged In users latest article.
			$user_id = $this->getUser()->getAttribute('user_id', '' , 'userProperty');
			if($user_id) $this->art_id = $analysis->getUserLatestArticleId($user_id);
			else $this->art_id = '';
			
			// All articles from analysis table
			$query = $analysis->getPublishedAnalysisQuery($column_id,$order);
			$this->pager = $mymarket->getPagerForAll('SbtAnalysis','20',$query,$request->getParameter('page', 1));
		}*/
	}
        
        if($parent_menu == 'top_sbt_menu' && $submenu_menu == 'sbt_menu_home'){
            isicsBreadcrumbs::getInstance()->addItem('BT Insider', 'sbt/sbtHome'); 
            isicsBreadcrumbs::getInstance()->addItem('Lista', 'borst/articleList'); 
        }else {
            isicsBreadcrumbs::getInstance()->addItem('Hem', 'borst/borstHome'); 
            isicsBreadcrumbs::getInstance()->addItem('Lista', 'borst/articleList'); 
        }

	if($var_flag == 1 || $section_flag == 1)
	{
		$cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
		$type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
		$object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
			
		foreach($cat_data as $cat)		{	$cat_arr[$cat->category_id] = $cat->category_name;		}
		foreach($type_data as $type)	{	$type_arr[$type->type_id] = $type->type_name;			}
		foreach($object_data as $obj)	
		{	
			$object_arr[$obj->object_id] = $obj->object_name; 
			$object_country_arr[$obj->object_id] = $obj->object_country;		
		} 
	}
	
	if($var_flag == 2 || $section_flag == 2)
	{
		$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
		$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
	}

	$this->param = $param;
	$this->cat_arr = $cat_arr; 
	$this->type_arr = $type_arr;
	$this->object_arr = $object_arr;
	$this->object_country_arr = $object_country_arr;
	$this->ext = $mymarket->getExtension($param);
        
    $this->page_url = $_SERVER['REQUEST_URI']; 
  }
  
	/*
	*
	* This function gives sorted list for article list data.
	*
	*/
	public function executeGetNewArticleListData(sfWebRequest $request)
	{ 
		// echo "111"; exit;
		$this->host_str = $this->getRequest()->getHost();
		$submenu_menu_arr = array('borst_menu_home','borst_menu_forum','borst_menu_share','borst_menu_commodities','borst_menu_currencies','borst_menu_chronicles','borst_menu_buysell','borst_menu_subscriber','borst_menu_ppm');
		$article = new Article();
		$analysis = new SbtAnalysis();
		$mymarket = new mymarket();
		$profile = new SfGuardUserProfile();
        	$this->page = $request->getParameter('page');
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$parent_menu = $request->getParameter('parent_menu');
		$submenu_menu = $request->getParameter('submenu_menu');
		$this->show_thumb = $request->getParameter('show_thumb');
		
		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
		else $isSuperAdmin = 0;	
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('articlelist_current_column','','userProperty');
		$page = $request->getParameter('page');
		$articlelist_current_column_order = $request->getParameter('articlelist_current_column_order');
		$set_column = 'articlelist_current_column';
		$set_column_order = 'articlelist_current_column_order';
		
		$order = $profile->setSortingParameters($page,$articlelist_current_column_order,$column_id,$current_column,$set_column,$set_column_order);

		//---------------------------------------------------------------------------------------------------------
		if( $request->getParameter('kat_id') || $request->getParameter('type_id') || $request->getParameter('obj_id') )
		{
			$var_flag = 1;
			$this->type = 'borst';
			
			if($request->getParameter('kat_id')){
				$query = $article->getArticleOrderQuery('kat',$request->getParameter('kat_id'),$column_id,$order);
				$param['kat_id'] = $request->getParameter('kat_id');
			}
			
			if($request->getParameter('type_id')){
				$query = $article->getArticleOrderQuery('type',$request->getParameter('type_id'),$column_id,$order);
				$param['type_id'] = $request->getParameter('type_id');
			}
				
			if($request->getParameter('obj_id')){
				$query = $article->getArticleOrderQuery('obj',$request->getParameter('obj_id'),$column_id,$order);
				$param['obj_id'] = $request->getParameter('obj_id');
			}
		
			//echo $query->getSqlQuery(); die;
			$this->pager = $mymarket->getPagerForAll('Article','20',$query,$request->getParameter('page', 1));
		}
		
		if( $request->getParameter('sbt_kat_id') || $request->getParameter('sbt_type_id') || $request->getParameter('sbt_obj_id') )
		{
			$var_flag = 2;
			$this->type = 'sbt';
			
			if($request->getParameter('sbt_kat_id')){
				$query = $analysis->getAnalysisOrderQuery('kat',$request->getParameter('sbt_kat_id'),$column_id,$order);
				$param['sbt_kat_id'] = $request->getParameter('sbt_kat_id');
			}
				
			if($request->getParameter('sbt_type_id')){
				$query = $analysis->getAnalysisOrderQuery('type',$request->getParameter('sbt_type_id'),$column_id,$order);
				$param['sbt_type_id'] = $request->getParameter('sbt_type_id');
			}
				
			if($request->getParameter('sbt_obj_id')){
				$query = $analysis->getAnalysisOrderQuery('obj',$request->getParameter('sbt_obj_id'),$column_id,$order);
				$param['sbt_obj_id'] = $request->getParameter('sbt_obj_id');
			}
			
			$this->pager = $mymarket->getPagerForAll('SbtAnalysis','20',$query,$request->getParameter('page', 1));
		}

		
		if($var_flag == 0)
		{
                        if($parent_menu == 'top_sbt_menu'){
                            $this->type = 'sbt';
                            $section_flag = 2;

                            // Logged In users latest article.
                            $user_id = $this->getUser()->getAttribute('user_id', '' , 'userProperty');
                            if($user_id) $this->art_id = $analysis->getUserLatestArticleId($user_id);
                            else $this->art_id = '';

                            // All articles from analysis table
                            $query = $analysis->getPublishedAnalysisQuery($column_id,$order);
                            $this->pager = $mymarket->getPagerForAll('SbtAnalysis','20',$query,$request->getParameter('page', 1));
                        }else{
                            $this->type = 'borst';
                            $section_flag = 1;

                            if($submenu_menu == 'borst_menu_commodities'){
                                $query = ArticleTable::getInstance()->getAllCommoditiesQuery(27,$column_id,$order);
                            }
                            else if($submenu_menu == 'borst_menu_currencies'){
                                $query = ArticleTable::getInstance()->getAllCommoditiesQuery(28,$column_id,$order);
                            }
                            else if($submenu_menu == 'borst_menu_share'){
                                $query = ArticleTable::getInstance()->getAllSharesQuery(1,$column_id,$order);
                            }
                            else if($submenu_menu == 'borst_menu_buysell'){
                                $query = ArticleTable::getInstance()->getAllBuySellArticleQuery($column_id,$order);
                            }
                            else if($submenu_menu == 'borst_menu_subscriber'){
                                $query = ArticleTable::getInstance()->getHomeSubscriberArticleQuery($column_id,$order);
                            }
                            else if($submenu_menu == 'borst_menu_home'){
                                $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                            }
                            else if($submenu_menu == 'borst_menu_forum'){
                                $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                            }
                            else if($submenu_menu == 'borst_menu_chronicles'){
                                $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                            }
                            else if($submenu_menu == 'borst_menu_ppm'){
                                $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                            }else{
                                $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);
                            }
                            if(!$this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty'))
                               $query->andWhere('ba.art_statid != ?',2);      

                            $this->pager = $mymarket->getPagerForAll('Article','20',$query,$request->getParameter('page', 1));
                        }
			/*if($parent_menu == 'top_borst_menu')
			{
				$this->type = 'borst';
				$section_flag = 1;
				switch($submenu_menu)
				{
					case 'borst_menu_commodities': $query = ArticleTable::getInstance()->getAllCommoditiesQuery(27,$column_id,$order); break;
					case 'borst_menu_currencies': $query = ArticleTable::getInstance()->getAllCommoditiesQuery(28,$column_id,$order); break;
					case 'borst_menu_share': $query = ArticleTable::getInstance()->getAllSharesQuery(1,$column_id,$order); break;
					case 'borst_menu_buysell': $query = ArticleTable::getInstance()->getAllBuySellArticleQuery($column_id,$order); break;
					case 'borst_menu_subscriber': $query = ArticleTable::getInstance()->getHomeSubscriberArticleQuery($column_id,$order); break;
					case 'borst_menu_home': $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order); break;
					case 'borst_menu_forum': $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order); break;
					case 'borst_menu_chronicles': $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order); break;
					case 'borst_menu_ppm': $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order); break;
				}
				
				if(!$submenu_menu) $query = ArticleTable::getInstance()->getAllBorstArticleQuery($column_id,$order);

                                if(!$this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty'))
                                         $query->andWhere('ba.art_statid != ?',2);
				$this->pager = $mymarket->getPagerForAll('Article','20',$query,$request->getParameter('page', 1));
			}
			else
			{
				$this->type = 'sbt';
				$section_flag = 2;
				
				// Logged In users latest article.
				$user_id = $this->getUser()->getAttribute('user_id', '' , 'userProperty');
				if($user_id) $this->art_id = $analysis->getUserLatestArticleId($user_id);
				else $this->art_id = '';
				
				// All articles from analysis table
				$query = $analysis->getPublishedAnalysisQuery($column_id,$order);
				$this->pager = $mymarket->getPagerForAll('SbtAnalysis','20',$query,$request->getParameter('page', 1));
			}*/
		}
		
		if($var_flag == 1 || $section_flag == 1)
		{
			$cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
			$type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
			$object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
				
			foreach($cat_data as $cat)		{	$cat_arr[$cat->category_id] = $cat->category_name;		}
			foreach($type_data as $type)	{	$type_arr[$type->type_id] = $type->type_name;			}
			foreach($object_data as $obj)	
			{	
				$object_arr[$obj->object_id] = $obj->object_name; 
				$object_country_arr[$obj->object_id] = $obj->object_country;		
			} 
		}
		
		if($var_flag == 2 || $section_flag == 2)
		{
			$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
			$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
			$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		}
	
	   //----------------------------------------------------------------------------------------------------------
		$this->param = $param;
		$this->ext = $mymarket->getExtension($param);
		$this->current_column_order = $order;
		$this->column_id = $column_id;
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr;
		$this->object_country_arr = $object_country_arr;
	}
  
  /**
  * Executes View CommentOnBorstArticle action
  *
  * @param sfRequest $request A request object
  */
  public function executeCommentOnBorstArticle(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$mymarket = new mymarket();
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', '');

	$parent_menu = $this->getUser()->getAttribute('parent_menu');
	$submenu_menu = $this->getUser()->getAttribute('submenu_menu');

	$breadcrum_menu = new Article();
	$this->first_menu = $breadcrum_menu->getMenuItem($parent_menu);
	$this->first_url = $breadcrum_menu->getMenuUrl($parent_menu); 
	$this->profile = new SfGuardUserProfile();
	//$second_menu = $breadcrum_menu->getMenuItem($submenu_menu);
	//$second_url = $breadcrum_menu->getMenuUrl($submenu_menu);

	$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	$article_id = $request->getParameter('article_id');
	$article = new Article();
	$this->article_data = $article->getSelectedArticle($article_id);
    $this->author = Doctrine::getTable('Authors')->getAuthorByUserId($this->article_data->author_id);
	$this->article_image_text = $this->decodeDescriptionText($this->article_data->image_text,$user_id,$this->host_str);
	$this->article_description_text = $this->decodeDescriptionText($this->article_data->text,$user_id,$this->host_str);
	
	$this->similar_article_list = $article->getListOfSimilarArticles($this->article_data->object_id,25);
	
	$this->borstArticleCommentForm = new BorstArticleCommentForm();
	$this->borstArticleCommentForm->setDefault('article_id',$article_id);
	$this->borstArticleCommentForm->setDefault('comment_by',$user_id);
	$this->borstArticleCommentForm->setDefault('created_at',date('Y-m-d H:i'));
	
	$borstArticleCommentForm_data = $request->getParameter($this->borstArticleCommentForm->getName());
	
	if ($request->isMethod('post'))
	{ 
		$borstArticleCommentForm_data['created_at'] = date('Y-m-d H:i:s');
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$this->borstArticleCommentForm->bind($borstArticleCommentForm_data);
		if($this->borstArticleCommentForm->isValid())
		{
			
			if($arr['borst_postid']!='')
			{
				$editpost_id = trim(str_replace('edit_link','',$arr['borst_postid'])); 
				$rec = Doctrine_Core::getTable('BorstArticleComment')->find($editpost_id);
				$rec->getSaveComment($borstArticleCommentForm_data['article_comment']);
			}	
			else
				$this->borstArticleCommentForm->save();
				
			$url = 'http://'.$this->host_str.'/borst/commentOnBorstArticle/article_id/'.$article_id;
			$this->redirect($url);
		}
		else
		{
			//$this->sbtAnalysisCommentForm->getErrorSchema();
		}
	} 
	
	$all_comments_query = BorstArticleCommentTable::getInstance()->getCommentsOnArticleQuery($article_id);
	$this->pager = $mymarket->getPagerForAll('BorstArticleComment','25',$all_comments_query,$request->getParameter('page', 1));

	$second_menu = $this->article_data ? ucfirst($this->article_data->title) : 'Article Detail';
	$second_url = $breadcrum_menu->getMenuUrl($submenu_menu);
	isicsBreadcrumbs::getInstance()->addItem($second_menu, $second_url); 
	
	//---------------------------------------------------------------------------------
	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
	
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
	
	//---------------------------------------------------------------------------------
  } 
  
	/**
	* 
	* This function posts comment of a perticular BT article and get all previous comments.
	* 
	*/
	public function executePostCommentOnBtArticle(sfWebRequest $request)
	{
		$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		$article_id = $request->getParameter('article_id');
		$article = new Article();
		$article_data = $article->getSelectedArticle($article_id);
		$comment_subject =  '';//$request->getParameter('sbt_analysis_comment_subject');
        
		$mymarket = new mymarket();
		$this->borstArticleCommentForm = new BorstArticleCommentForm();
		$this->borstArticleCommentForm->setDefault('article_id',$article_id);
		$this->borstArticleCommentForm->setDefault('comment_by',$user_id);
        $this->borstArticleCommentForm->setDefault('subject',$comment_subject);
		$this->borstArticleCommentForm->setDefault('created_at',date('Y-m-d H:i'));
		
		$borstArticleCommentForm_data = $request->getParameter($this->borstArticleCommentForm->getName());
		
		if ($request->isMethod('post'))
		{ 
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$this->borstArticleCommentForm->bind($borstArticleCommentForm_data);
			if($this->borstArticleCommentForm->isValid())
			{
				
				if($arr['borst_postid']!='')
				{
					$editpost_id = trim(str_replace('edit_link','',$arr['borst_postid']));  
					$rec = Doctrine_Core::getTable('BorstArticleComment')->find($editpost_id);
					$rec->getSaveComment($borstArticleCommentForm_data['article_comment'],$borstArticleCommentForm_data['subject']);
                    $this->getUser()->setFlash('notice','Comment Updated Successfully');
				}	
				else
                {
					$this->borstArticleCommentForm->save();
                    $this->getUser()->setFlash('notice','Comment Added Successfully');
                }
					
				$this->getUser()->setAttribute('fav_notification','article_'.$article_id.'_'.$article_data->title);
			}
		
		} 
		
		$all_comments_query = BorstArticleCommentTable::getInstance()->getCommentsOnArticleQuery($article_id);
		$this->pager = $mymarket->getPagerForAll('BorstArticleComment','25',$all_comments_query,$request->getParameter('page', 1));
	}
  
  /**
	* 
	* This function fetches the posted comment of a perticular article.
	* 
	*/
	public function executeGetArticleCommentData(sfWebRequest $request)
	{
		$editpost_id = $this->getRequestParameter('editpost_id');
		$editpost_id = trim(str_replace('edit_link','',$editpost_id));     
		$comment = new BorstArticleComment();
		$post_data = $comment->getSelectedComment($editpost_id);
		return  $this->renderText($post_data);
	}
	 
   /**
    * 
    * This function shows all the search result.
    * 
    */
	public function executeSearchResult(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Forum', 'borst/searchResult');
	 
	 	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	 	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_home');
		
		$parent_menu = $this->getUser()->getAttribute('parent_menu');
		$submenu_menu = $this->getUser()->getAttribute('submenu_menu');
	 
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$this->data_arr = $cat_arr = $type_arr = $object_arr = $object_country_arr = $sort_arr = $forum_cat_arr = array();
		$ext = '';
        		
        $bt_cat_arr = $bt_type_arr = $bt_object_arr = array();
        
       	$bt_cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
	    $bt_type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
	    $bt_object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
     
        foreach($bt_cat_data as $cat)		{	$bt_cat_arr[$cat->category_id] = $cat->category_name;		}
    	foreach($bt_type_data as $type)	{	$bt_type_arr[$type->type_id] = $type->type_name;			}
    	foreach($bt_object_data as $obj)	{	$bt_object_arr[$obj->object_id] = $obj->object_name;		}
    	
    	$this->bt_cat_arr = $bt_cat_arr; 
    	$this->bt_type_arr = $bt_type_arr;
    	$this->bt_object_arr = $bt_object_arr;		
        
        
        $mymarket = new mymarket();
		$article = new Article();
		$profile = new SfGuardUserProfile();

		$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
		$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		$forum_cat_arr = BtforumCategoryTable::getInstance()->getAllForumCategories();
		
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$arr['user_id'] = $profile->getUserFromFullName($arr['author_name']) ? $profile->getUserFromFullName($arr['author_name']) : 11111111111;

        if($request->isMethod('post'))
		{
			$this->getUser()->setAttribute('search_parameter', $arr, 'userProperty');
			if($arr['from_adv_search']==1) $search_mode = 'adv_search';
			else $search_mode = 'sim_search';
            
            $this->getUser()->setAttribute('search_mode',$search_mode);
		}
        if($this->getUser()->getAttribute('search_mode'))
            $search_mode = $this->getUser()->getAttribute('search_mode');
        
		$arr = $this->getUser()->getAttribute('search_parameter', '', 'userProperty');
		$ext = trim($arr['normal_search']) ? trim($arr['normal_search']) : $this->getRequestParameter('normal_search');
        if($arr['from_adv_search']==1)
        $ext = trim($arr['phrase_in_page']);
        isicsBreadcrumbs::getInstance()->addItem('Sök', 'borst/borstAdvanceSearch');
        isicsBreadcrumbs::getInstance()->addItem($ext, 'borst/borstPpm');
        //code change by sandeep
        $normal_search_para = $request->getParameter('normal_search_para');//$this->getRequestParameter('normal_search');// change by sandeep
        //code change by sandeep end 
		$this->search_tab = $this->getRequestParameter('search_tab') ? $this->getRequestParameter('search_tab') : 'all';
                
        $column_id = 'date';
        $order = 'DESC';   
        
        $search_criteria = array();
        $search_criteria['borst'] = $arr['search_from_borst'];
        $search_criteria['sbt'] = $arr['search_from_sbt'];
        $search_criteria['blog'] = $arr['search_from_blog'];
        $search_criteria['forum'] = $arr['search_from_forum'];
        $search_criteria['btchart'] = $arr['search_from_btchart'];
        $search_criteria['btshop'] = $arr['search_from_btshop'];
		$search_criteria['userlist'] = $arr['search_from_userlist'];

		$additional_parameters = array();
        $category_id = $request->getParameter('category_id');        
        if($category_id){ $this->category_id = $category_id; $additional_parameters['category_id'] = $category_id; }
        $type_id = $request->getParameter('type_id');        
        if($type_id){ $this->type_id = $type_id; $additional_parameters['type_id'] = $type_id;  }        
        $object_id = $request->getParameter('object_id');        
        if($object_id){ $this->object_id = $object_id; $additional_parameters['object_id'] = $object_id; }        
        $shop_type = $request->getParameter('shop_type');
        if($shop_type){ $this->shop_type = $shop_type; $additional_parameters['shop_type'] = $shop_type; }
        $stock_type = $request->getParameter('stock_type');
		if($stock_type){ $this->stock_type = $stock_type; $additional_parameters['stock_type'] = $stock_type; }  
		
        $count = 0;
        foreach($search_criteria as $key=>$value)
        {
            if($value){
                $count++;
                $tab = $key;
            }                
        }
        if($count==1)
            $this->search_tab = $tab;
        if($count==1 && $tab=='userlist')
            $nocriteria = 1;    // will be used when only userlist is selected with no criteria
        else
            $nocriteria = 0;
        
        $this->getUser()->setAttribute('searchOnlyUserlist',$nocriteria);
            
        $rec_per_page = $this->search_tab == 'all' ? 5 : 25;
        
        if(($search_mode=='adv_search')&&(!$arr['search_from_borst'] && !$arr['search_from_sbt'] && !$arr['search_from_blog'] && !$arr['search_from_forum'] && !$arr['search_from_btchart'] && !$arr['search_from_btshop'] && !$arr['search_from_userlist'])){
            $arr['search_from_borst']=$arr['search_from_sbt']=$arr['search_from_blog']=$arr['search_from_forum']=$arr['search_from_btchart']=$arr['search_from_btshop']=$arr['search_from_userlist']=1;
        }
		if($arr['from_adv_search']==1 && $arr['search_from_borst']!=1 && !$search_tab_id)
			$searched_article_query =null;                 
		elseif($arr['from_adv_search']==1 || $arr['search_from_borst'])
			$searched_article_query = ArticleTable::getInstance()->getAdvancedSearchedArticleQuery($arr,$column_id,$order,$additional_parameters); 
        // if($arr['from_adv_search']==1 && $arr['search_from_borst']!=1)
		//   $searched_article_query = null;
		// elseif($arr['from_adv_search']==1 || $arr['search_from_borst'])
		// 	$searched_article_query = ArticleTable::getInstance()->getAdvancedSearchedArticleQuery($arr,$column_id,$order);
        else
			$searched_article_query = ArticleTable::getInstance()->getSearchedArticleQuery(trim($arr['normal_search']),$column_id,$order);

		if($searched_article_query)
		{
			$this->article_pager = $mymarket->getPagerForAll('Article',$rec_per_page,$searched_article_query,$request->getParameter('page', 1));
		}
		else {	$this->article_pager = NULL; $sort_arr[] = 0;}
		
        if($arr['from_adv_search']==1 && $arr['search_from_sbt']!=1)
            $searched_analysis_query = null; 
		elseif($arr['from_adv_search']==1 || $arr['search_from_sbt'])
			$searched_analysis_query = SbtAnalysisTable::getInstance()->getAdvancedSearchedAnalysisQuery($arr,$column_id,$order);
		else
			$searched_analysis_query = SbtAnalysisTable::getInstance()->getSearchedAnalysisQuery(trim($arr['normal_search']),$column_id,$order);

		if($searched_analysis_query)
		{
			$this->analysis_pager = $mymarket->getPagerForAll('SbtAnalysis',$rec_per_page,$searched_analysis_query,$request->getParameter('page', 1));
		}
		else { $this->analysis_pager = NULL; $sort_arr[] = 0;}
		
		
        if($arr['from_adv_search']==1 && $arr['search_from_blog']!=1)
            $searched_blog_query = null;		
		elseif($arr['from_adv_search']==1 || $arr['search_from_blog'])
			$searched_blog_query = SbtUserBlogTable::getInstance()->getAdvancedSearchedBlogQuery($arr,$column_id,$order);
		else
			$searched_blog_query = SbtUserBlogTable::getInstance()->getSearchedBlogQuery(trim($arr['normal_search']),$column_id,$order);
		
		if($searched_blog_query)
		{
			$this->blog_pager = $mymarket->getPagerForAll('SbtUserBlog',$rec_per_page,$searched_blog_query,$request->getParameter('page', 1));
		}
		else { $this->blog_pager = NULL; $sort_arr[] = 0;}

		if($arr['from_adv_search']==1 && $arr['search_from_forum']!=1)
			$searched_forum_query = null;
		elseif($arr['from_adv_search']==1 || $arr['search_from_forum'])
			$searched_forum_query = BtforumTable::getInstance()->getAdvancedSearchedForumQuery($arr,$column_id,$order);
		else
			$searched_forum_query = BtforumTable::getInstance()->getSearchedForumQuery(trim($arr['normal_search']),$column_id,$order);
		
		if($searched_forum_query)
		{
			$this->forum_pager = $mymarket->getPagerForAll('Btforum',$rec_per_page,$searched_forum_query,$request->getParameter('page', 1));
		}
		else { $this->forum_pager = NULL; $sort_arr[] = 0;}        
                
		/* -------- btchart start -----------*/
        if($arr['from_adv_search']==1 && $arr['search_from_btchart']!=1)
		  $searched_btchart_query = null;
		elseif($arr['from_adv_search']==1 || $arr['search_from_btchart'])
			$searched_btchart_query = BtchartCompanyDetailsTable::getInstance()->getAdvancedSearchedBtchartQuery($arr,$column_id,$order);
        else
			$searched_btchart_query = BtchartCompanyDetailsTable::getInstance()->getSearchedBtchartQuery(trim($arr['normal_search']),$column_id,$order);

		if($searched_btchart_query)
		{
			$this->btchart_pager = $mymarket->getPagerForAll('BtchartCompanyDetails',$rec_per_page,$searched_btchart_query,$request->getParameter('page', 1));
		}
		else {	$this->btchart_pager = NULL; $sort_arr[] = 0;}
		/* -------- btchart end -----------*/
		
		 
        
		/* -------- btshop start -----------*/
        if($arr['from_adv_search']==1 && $arr['search_from_btshop']!=1)
		  $searched_btshop_query = null;
		elseif($arr['from_adv_search']==1 || $arr['search_from_btshop']){
			// echo($arr['phrase_in_page']);
			// echo($column_id);
			// echo($order);
			// echo($additional_parameters);
			// exit;
			$searched_btshop_query = BtShopArticleTable::getInstance()->getSearchedBtshopQuery($arr['phrase_in_page'],$column_id,$order,$additional_parameters);
		}
			
			// $searched_btshop_query = BtShopArticleTable::getInstance()->getSearchedBtshopQuery(trim($normal_search_para),$column_id,$order,$additional_parameters); 
        else
			$searched_btshop_query = BtShopArticleTable::getInstance()->getSearchedBtshopQuery(trim($arr['normal_search']),$column_id,$order,$additional_parameters);

		if($searched_btshop_query)	
			$this->btshop_pager = $mymarket->getPagerForAll('BtShopArticle',$rec_per_page,$searched_btshop_query,$request->getParameter('page', 1));
		else
			$this->btshop_pager = null;
		// 	if($searched_btshop_query)
		// {
		// 	$this->btshop_pager = $mymarket->getPagerForAll('BtShopArticle',$rec_per_page,$searched_btshop_query,$request->getParameter('page', 1));
		// 	//$this->btshop_pager = $mymarket->getPagerForAll('BtShopArticle',$rec_per_page,$searched_btshop_query,$request->getParameter('page', 1));
		// }
		// else {	$this->btshop_pager = NULL; $sort_arr[] = 0;}
        /* -------- btshop end -----------*/        

		/* -------- userlist start -----------*/
        if($arr['from_adv_search']==1 && $arr['search_from_userlist']!=1)
		  $searched_btshop_query = null;
		elseif($arr['from_adv_search']==1 || $arr['search_from_userlist'])
			$searched_userlist_query = SfGuardUserProfileTable::getInstance()->getAdvancedSearchedUserlistQuery($arr['phrase_in_page'],$arr['author_name'],$column_id,$order,'',$nocriteria);
        else
			$searched_userlist_query = SfGuardUserProfileTable::getInstance()->getSearchedUserlistQuery(trim($arr['normal_search']),$column_id,$order);

		if($searched_userlist_query)
		{
			$this->userlist_pager = $mymarket->getPagerForAll('SfGuardUserProfile',$rec_per_page,$searched_userlist_query,$request->getParameter('page', 1));
		}
		else {	$this->userlist_pager = NULL; $sort_arr[] = 0;}

		
        /* -------- userlist end -----------*/        
        
        if($this->search_tab == 'all')
		{
			$this->pager = $mymarket->setPagerForAll($this->article_pager,$this->analysis_pager,$this->blog_pager,$this->forum_pager,$this->btchart_pager, $this->btshop_pager, $this->userlist_pager);
		}
		else
		{
			if($this->search_tab == 'borst') $this->pager = $this->article_pager;
			if($this->search_tab == 'sbt') $this->pager = $this->analysis_pager;
			if($this->search_tab == 'blog') $this->pager = $this->blog_pager;
			if($this->search_tab == 'forum') $this->pager = $this->forum_pager;
            if($this->search_tab == 'btchart') $this->pager = $this->btchart_pager;
            if($this->search_tab == 'btshop') $this->pager = $this->btshop_pager;
            if($this->search_tab == 'userlist') $this->pager = $this->userlist_pager;            	
		}
        
        $this->user_arr = array();
        $userProfileImage = new SbtUserprofilePhoto(); 
	    $data = $userProfileImage->fetchAllPhotoRecord();
        for($i=0; $i<count($data); $i++) {	$this->user_arr[$data[$i]['user_id']] = $data[$i]['profile_photo_name']; }
        
        $this->stock_type_arr = array(1 => "LargeCap", 2 => "MidCap", 3 => "SmallCap", 4 => "Varlden", 5 => "Ravoror", 6 => "Valutor", 7 => "Lasarnas");
		$this->profile = $profile;
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr;
		$this->forum_cat_arr = $forum_cat_arr;
		$this->ext = $ext;
		$this->selected_tab = $selected_tab;
		$this->normal_search_para = $normal_search_para;
                
            $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
            foreach($object_data as $obj)	
            {	
                    $object_arr[$obj->object_id] = $obj->object_name; 
                    $object_country_arr[$obj->object_id] = $obj->object_country;		
            } 
            $this->object_country_arr = $object_country_arr;
            $this->sbt_blog_comment = new SbtBlogComment();
			$this->methodName = 'getSubCategoryName'; 
			
			///////////////////////////
			
			///////////////////////////
	}
	/**
	 * Executes getTypeCategory action
  	 *
     * @param sfRequest $request A request object
     */    
	public function executeGetTypeCategory(sfWebRequest $request)
    {
        $this->arrCategory = $this->arrType = array();
        $sbtCategory = Doctrine_Core::getTable('SbtArticleCategory')->findAll();
        $sbtType = Doctrine_Core::getTable('SbtArticleType')->findAll();
        
        foreach($sbtCategory as $cat) 		{   $this->arrCategory[$cat->id] = $cat->sbt_category_name;	}
        foreach($sbtType as $type) 	  		{  	$this->arrType[$type->id] = $type->type_name;	        }

    }
	/**
	 * Executes SbtAdvanceSearch action
  	 *
     * @param sfRequest $request A request object
     */
	public function executeBorstAdvanceSearch(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('AVANCERAD SÖKNING', 'borst/borstAdvanceSearch');
		$arrMarket = $arrStockList = $arrSector = $arrObject = array();
		
		$this->getUser()->setAttribute('parent_menu', ''); 
		$this->getUser()->setAttribute('submenu_menu', '');
		$this->getUser()->setAttribute('third_menu', 'adv_search');
        
        $sbtMarket = Doctrine_Core::getTable('SbtMarket')->findAll();
		$sbtStockList = Doctrine_Core::getTable('SbtStockList')->findAll();
		$sbtSector = Doctrine_Core::getTable('SbtSector')->findAll();
		
		foreach($sbtMarket as $market)		{  	$arrMarket[$market->id] = $market->sbt_market_name;	            }
		foreach($sbtStockList as $stocklist){  	$arrStockList[$stocklist->id] = $stocklist->stock_name;	        }
		foreach($sbtSector as $sector)		{  	$arrSector[$sector->id] = $sector->sector_name;	        		}
		foreach($sbtObject as $obj)			{  	$arrObject[$obj->id] = str_replace('_',' / ',$obj->object_name);}
		
		$this->arrMarket = $arrMarket;
		$this->arrStockList = $arrStockList;
		$this->arrSector = $arrSector;
		$this->arrObject = $arrObject;		
	}	 

	/**
	 * Executes FromAdvSearchMarket action
  	 *
     * @param sfRequest $request A request object
     */
	public function executeFromAdvSearchMarket(sfWebRequest $request)
	{
		$typeid = $this->getRequestParameter('typeid');
		$stocklistid = $this->getRequestParameter('stocklistid');
		$sectorid = $this->getRequestParameter('sectorid');
		$blog_article = $this->getRequestParameter('blog_article');
		
		$sbt_sector = new SbtSector();
		$sbt_stocklist = new SbtStockList();
		$obj = new SbtObject();
		
		$arrStockList = $arrSector = $arrObject = $object_name = array();
		$temp_stocklist_list = $temp_sector_list = $stocklist_list = $sector_list = array();
		$test_stocklist_list = $test_sector_list = array();
		
		if($typeid > 0)
			$sbtObject = $obj->getDataFromObject($typeid);
		
		foreach($sbtObject as $data)
		{ 
			if($data->sector_id > 0 && !in_array($data->sector_id,$temp_sector_id_list)) $temp_sector_id_list[] = $data->sector_id;
			if($data->stocklist_id > 0 && !in_array($data->stocklist_id,$temp_stocklist_id_list)) $temp_stocklist_id_list[] = $data->stocklist_id;
		}
		
		if(($stocklistid <= 0 || $stocklistid == '') && ($sectorid <= 0 || $sectorid == ''))
		{
			// Sector and object
			if(count($temp_stocklist_id_list) > 0)
			{
				$result_1 = $obj->getObjectFromTypeStock($typeid,$temp_stocklist_id_list[0]);
				foreach($result_1 as $data_1)
				{
					if($data_1->sector_id > 0 && !in_array($data_1->sector_id,$sector_list)) $sector_list[] = $data_1->sector_id;
					$arrObject[$data_1->id] = $data_1->object_name;
				}
				$arrSector = $sbt_sector->getSelctedSector($sector_list);
				$arrStockList = $sbt_stocklist->getSelctedStockList($temp_stocklist_id_list);
			}
			
			if(count($temp_stocklist_id_list) == 0 && count($temp_sector_id_list) > 0)
			{
				$result_1 = $obj->getObjectFromTypeStockSector($typeid,$temp_sector_id_list[0]);
				foreach($result_1 as $data_1)
				{
					$arrObject[$data_1->id] = $data_1->object_name;
				}
				$arrSector = $sbt_sector->getSelctedSector($temp_sector_id_list);
			}
			
			if((count($temp_stocklist_id_list) == 0) && (count($temp_sector_id_list) == 0))
			{
				foreach($sbtObject as $data)
				{
					$arrObject[$data->id] = $data->object_name;
				}
			}
		}
		
		if(($stocklistid > 0) && ($sectorid <= 0 || $sectorid == ''))
		{
			$result_1 = $obj->getObjectFromTypeStock($typeid,$stocklistid);
			foreach($result_1 as $data_1)
			{
				if($data_1->sector_id > 0 && !in_array($data_1->sector_id,$test_sector_list)) $test_sector_list[] = $data_1->sector_id;
				$arrObject[$data_1->id] = $data_1->object_name;
			}
		
			if(count($test_sector_list) > 0)
			{ 
				$result_2 = $obj->getObjectFromTypeStockSector($typeid,$stocklistid,$temp_sector_id_list[0]);
				foreach($result_2 as $data_2)
				{
					$arrObject[$data_2->id] = $data_2->object_name;
				}
				$arrStockList = $sbt_stocklist->getSelctedStockList($temp_stocklist_id_list);
				$arrSector = $sbt_sector->getSelctedSector($test_sector_list);	
			}
			else
			{
				$arrStockList = $sbt_stocklist->getSelctedStockList($temp_stocklist_id_list);
			}
		}
		
		if(($stocklistid > 0) && ($sectorid > 0))
		{
			$result_1 = $obj->getObjectFromTypeStock($typeid,$stocklistid);
			foreach($result_1 as $data_1)
			{
				if($data_1->stocklist_id > 0 && !in_array($data_1->stocklist_id,$temp_stocklist_id_list)) $temp_stocklist_id_list[] = $data_1->stocklist_id;
				if($data_1->sector_id > 0 && !in_array($data_1->sector_id,$temp_sector_id_list)) $temp_sector_id_list[] = $data_1->sector_id;
			}
		
			if(!in_array($sectorid,$temp_sector_id_list))
			{
				if(count($temp_sector_id_list) > 0)
				{
					$result_2 = $obj->getObjectFromTypeStockSector($typeid,$stocklistid,$temp_sector_id_list[0]);
					foreach($result_2 as $data_2)
					{
						$arrObject[$data_2->id] = $data_2->object_name;
					}
					$arrStockList = $sbt_stocklist->getSelctedStockList($temp_stocklist_id_list);
					$arrSector = $sbt_sector->getSelctedSector($temp_sector_id_list);	
				}
				else
				{
					unset($arrSector);
				}
			}
			else
			{
				$result_2 = $obj->getObjectFromTypeStock($typeid,$stocklistid);
				foreach($result_2 as $data_2)
				{
					$arrObject[$data_2->id] = $data_2->object_name;
				}
				$arrStockList = $sbt_stocklist->getSelctedStockList($temp_stocklist_id_list);
			}
		}
		
		if(($stocklistid <= 0 || $stocklistid == '') && ($sectorid > 0))
		{
			$result_1 = $obj->getDataFromObject($typeid);
			foreach($result_1 as $data_1)
			{
				if($data_1->sector_id > 0 && !in_array($data_1->sector_id,$test_sector_list)) $test_sector_list[] = $data_1->sector_id;
			}
			
			$result_2  = $obj->getObjectFromTypeSector($typeid,$sectorid);
			foreach($result_2 as $data_2)
			{
				$arrObject[$data_2->id] = $data_2->object_name;
			}
			$arrSector = $sbt_sector->getSelctedSector($test_sector_list);	
		
		}
		
		
		
		$this->sector_cnt = count($arrSector);
		$this->object_cnt = count($arrObject);
		$this->stocklist_cnt = count($arrStockList);
		
		
		$this->stocklistid = $stocklistid;
		$this->sectorid = $sectorid;
		$this->stocklist_name = $arrStockList;
		$this->sector_name = $arrSector;
		$this->object_name = $arrObject;
    		
	}
        
        /**
        * Executes Enquiry action
        *
        * @param sfRequest $request A request object
        */
        public function executeEnquiry(sfWebRequest $request)
        {
            isicsBreadcrumbs::getInstance()->addItem('Fråga BT', 'borst/enquiry');
            //isicsBreadcrumbs::getInstance()->addItem('BT-Shop Home', 'borst/borstPpm');

            $mymarket = new mymarket(); 
            $this->profile = new SfGuardUserProfile();
            $this->host_str = $this->getRequest()->getHost();
            $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu_enquiry');
            $this->getUser()->setAttribute('parent_menu_common', '10');
            $this->getUser()->setAttribute('submenu_menu', '');
            $this->getUser()->setAttribute('third_menu', 'enquiry');
            $forum_tab = $this->getRequestParameter('cat_id') ? $this->getRequestParameter('cat_id') : 11;

            /*$this->methodName = 'getSubCategoryName'; 
            if(!$forum_tab || $forum_tab == 9)
            {
                    $this->methodName = 'getCategoryName';
            }*/
            $contactEnquiry = new ContactEnquiry();
            switch($forum_tab)
            {
                   case 1: $query = $contactEnquiry->getSelctedContactEnquiryTopics(1); break;
                   case 2: $query = $contactEnquiry->getSelctedContactEnquiryTopics(2); break;
                   case 3: $query = $contactEnquiry->getSelctedContactEnquiryTopics(3); break;
                   case 4: $query = $contactEnquiry->getSelctedContactEnquiryTopics(4); break;
                   case 5: $query = $contactEnquiry->getSelctedContactEnquiryTopics(5); break;
                   case 6: $query = $contactEnquiry->getSelctedContactEnquiryTopics(6); break;
                   case 7: $query = $contactEnquiry->getSelctedContactEnquiryTopics(7); break;
                   case 8: $query = $contactEnquiry->getSelctedContactEnquiryTopics(8); break;
                   case 9: $query = $contactEnquiry->getSelctedContactEnquiryTopics(9); break;
                   case 10: $query = $contactEnquiry->getSelctedContactEnquiryTopics(10); break;
                   default: $query = $contactEnquiry->getAllNewContactEnquiryPostQuery(); break;
            }

            $this->forum_tab = $forum_tab;
            $this->getUser()->setAttribute('forum_tab', $this->forum_tab, 'userProperty');
            $this->pager = $mymarket->getPagerForAll('Btforum','50',$query,$request->getParameter('page', 1));
            $this->ext = '';

            // Data for Preview
            $this->preview_information = array();
            $profile = new SfGuardUserProfile();
            $userProfileImage = new SbtUserprofilePhoto(); 

            $firstname = $this->getUser()->getAttribute('firstname', '' , 'userProperty');
            $lastname = $this->getUser()->getAttribute('lastname', '' , 'userProperty');
            $this->user_id = $this->getUser()->getAttribute('user_id','', 'userProperty');
            $photo_data = $userProfileImage->searchForRecord($this->user_id);
            $data_arr = $profile->fetchRegdateAndTotalLogin($firstname.' '.$lastname); 

            $this->preview_information['user_id'] = $this->user_id;
            $this->preview_information['today_data'] = date('Y-m-d H:i:s');	
            $this->preview_information['name'] = $firstname.' '.$lastname;
            $this->preview_information['user_photo'] = $photo_data->profile_photo_name ? $photo_data->profile_photo_name : ''; 
            $this->preview_information['user_active'] = $data_arr ? date("M Y", strtotime($data_arr[0]['regdate'])): '';
            $this->preview_information['user_login'] = $data_arr ? $data_arr[0]['inlog'] : '';
        }
        
        
        /**
         * Executes getEnquiryContentByOrder action
         *
         * @param sfRequest $request A request object
         */
        public function executeGetEnquiryContentByOrder(sfWebRequest $request) {
            $param = array();
            $mymarket = new mymarket();
            $profile = new SfGuardUserProfile();
            $this->new_profile = new SfGuardUserProfile();
            $this->host_str = $this->getRequest()->getHost();

            $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
            $current_column = $this->getUser()->getAttribute('sbt_forum_column', '', 'userProperty');
            $page = $request->getParameter('page');
            $sbt_forum_column_order = $request->getParameter('sbt_forum_column_order');
            $set_column = 'sbt_forum_column';
            $set_column_order = 'sbt_forum_column_order';
            $cat_id = trim(str_replace('cat_', '', $request->getParameter('forum_parent_tab')));
            //$sub_cat_id = trim(str_replace('subcat_', '', $request->getParameter('forum_sub_cat_id')));
            $param['column_id'] = $column_id;
            $forum_parent_tab = $request->getParameter('forum_parent_tab');

            /*if ($request->getParameter('delete_forum_topic_id')) {
                $btforum = new Btforum();
                $btforum->fetchAllRecordWithId($request->getParameter('delete_forum_topic_id'));
            }*/

            $order = $profile->setSortingParameters($page, $sbt_forum_column_order, $column_id, $current_column, $set_column, $set_column_order);

            $forum_tab = $cat_id ? $cat_id : $this->getUser()->getAttribute('forum_tab', '', 'userProperty');

            /*$this->methodName = 'getSubCategoryName';
            if (!$forum_tab || $forum_tab == 9) {
                $this->methodName = 'getCategoryName';
            }*/
            $contactEnquiry = new ContactEnquiry();
            switch ($forum_tab) {
                case 1: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(1,  $column_id, $order);
                    break;
                case 2: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(2,  $column_id, $order);
                    break;
                case 3: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(3,  $column_id, $order);
                    break;
                case 4: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(4,  $column_id, $order);
                    break;
                case 5: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(5,  $column_id, $order);
                    break;
                case 6: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(6,  $column_id, $order);
                    break;
                case 7: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(7,  $column_id, $order);
                    break;
                case 8: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(8,  $column_id, $order);
                    break;
                case 9: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(9,  $column_id, $order);
                    break;
                case 10: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(10,  $column_id, $order);
                    break;
                default: $query = $contactEnquiry->getOrderedSelctedEnquiryTopics(null, $column_id, $order);
                    break;
            }
            //echo $query->getSqlQuery();
            $this->forum_tab = $forum_tab;
            $this->column_id = $column_id;
            $this->current_column_order = $order;
            $this->cur_column = $current_column;
            $this->forum_parent_tab = $forum_parent_tab;
            //$this->forum_sub_cat_id = $request->getParameter('forum_sub_cat_id');

            $this->pager = $mymarket->getPagerForAll('Btforum', 50, $query, $request->getParameter('page', 1));
            $this->ext = $mymarket->getExtension($param);
        }

    /**
    * Executes GetEnquirySubCategoryMenu action
    *
    * @param sfRequest $request A request object
    */
    public function executeGetEnquirySubCategoryMenu(sfWebRequest $request)
    {
          $cat_id = trim(str_replace('cat_','',$request->getParameter('cat_id')));
          $this->subcat_id = trim(str_replace('subcat_','',$request->getParameter('forum_sub_cat_id')));
          //$sub = new BtforumCategory();
          $this->subCategory = '';//$sub->getSubCategories($cat_id);
    }
        /**
	* Executes ContactUs action
	*
	* @param sfRequest $request A request object
	*/
	public function executeContactUs(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('KONTAKTA OSS', 'borst/contactUs'); 
                $private_key = sfConfig::get('app_recaptcha_private_key');
                $this->public_key = sfConfig::get('app_recaptcha_public_key');
		$this->host_str = $this->getRequest()->getHost();
		// $this->getUser()->setAttribute('parent_menu', '1'); 
		// $this->getUser()->setAttribute('submenu_menu', '');
                $this->getUser()->setAttribute('parent_menu_common', '1');
		$this->getUser()->setAttribute('third_menu', 'contact_us');
		//$enq_type = array(''=>'Välj kategori','Abonnemang'=>'Abonnemang','Utbildningar'=>'Utbildningar','Fråga Bosse Börstjänare'=>'Fråga Bosse Börstjänare','Metastock'=>'Metastock','Webinarium'=>'Webinarium','Forum'=>'Forum','Henrik Hallenborg'=>'Henrik Hallenborg','Thomas Sandström'=>'Thomas Sandström','Göran Högberg'=>'Göran Högberg','Övrigt'=>'Övrigt');
                $enq_type = array(''=>'Välj kategori','Portfölj'=>'Portfölj','Henry Boy'=>'Henry Boy','Utbildningar'=>'Utbildningar','Webinarium'=>'Webinarium','VIP-klubben'=>'VIP-klubben','Metastock'=>'Metastock','Nybörjare'=>'Nybörjare','Förslagslåda'=>'Förslagslåda','Kundtjänst'=>'Kundtjänst','Henrik Hallenborg'=>'Henrik Hallenborg','Thomas Sandström'=>'Thomas Sandström','Göran Högberg'=>'Göran Högberg','Övrigt'=>'Övrigt');
		
		$firstname = $this->getUser()->getAttribute('firstname','', 'userProperty') ? $this->getUser()->getAttribute('firstname','', 'userProperty') : '';
        $lastname = $this->getUser()->getAttribute('lastname','', 'userProperty') ? $this->getUser()->getAttribute('lastname','', 'userProperty') : '';
		$email = $this->getUser()->getAttribute('email','', 'userProperty') ? $this->getUser()->getAttribute('email','', 'userProperty') : '' ;
		
		$postid = $this->getRequestParameter('postid');
                $code = $request->getParameter('code');
                $contact_us = Doctrine::getTable('ContactUs')->findByCode($code);
	    if($postid > 0)
		{
			$btforum = new Btforum();
			$post_data = $btforum->fetchTopic($postid);
			$rr = str_replace('/uploads','http://'.$this->host_str.'/uploads',$post_data->textarea);
		}
		
		$this->contactEnqForm = new ContactEnquiryForm();
		$this->wSchema = $this->contactEnqForm->getWidgetSchema();
	 	$this->wSchema['enq_type']->setOption('choices',$enq_type);
	 	$this->contactEnqForm->setDefault('enq_type','');	
		$this->contactEnqForm->setDefault('enq_date',date('Y-m-d H:i'));	
	 	$this->contactEnqForm->setDefault('is_answered',0);	
	 	$this->contactEnqForm->setDefault('comm_id',0);	
		$this->contactEnqForm->setDefault('firstname',$firstname);	
		$this->contactEnqForm->setDefault('lastname',$lastname);	
		$this->contactEnqForm->setDefault('email',$email);
                $this->contactEnqForm->setDefault('enq_type',$contact_us?$contact_us->getType():'');
                $this->contactEnqForm->setDefault('user_question',$contact_us?$contact_us->getContent():'');
                $this->contactEnqForm->setDefault('enq_subject',$contact_us?$contact_us->getSubject():'');
                $this->contactEnqForm->getValidator('user_signature')->setOption('required', false);
                $this->contactEnqForm->setDefault('replycount',0);	
		if($post_data)
		{
			$this->contactEnqForm->setDefault('user_question',$rr);	
			$this->contactEnqForm->setDefault('enq_type','Forum');	
		}
	
		if ($request->isMethod('post'))
		{
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$contactEnqForm_arr = $request->getParameter($this->contactEnqForm->getName());
			$this->getUser()->setAttribute('contactenquiry_person_email', $contactEnqForm_arr['email'], 'userProperty');

			$this->contactEnqForm->bind($contactEnqForm_arr);
                        $host_str = $this->getRequest()->getHost();
                        
                        //$captcha = $this->getRequestParameter('g-recaptcha-response');
                        
                        //$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$private_key."&response=".$captcha."&remoteip=".$host_str), true);
                        $flag=1;
                        if($arr['contact_chkbox'] == 'on'){
                            $this->check_box_check = 1;
                            if($arr['show_fullname'] == null && $arr['show_name'] == null && $arr['show_signature'] == null){
                                $this->errormsg = 'Please select one option';
                                $flag=0;
                            }
                            if($arr['show_signature'] && $arr['contact_enquiry']['user_signature']==''){
                                $this->errormsg_signature = 'Please enter signature';
                                $flag=0;
                            }
                            if($arr['show_fullname']){
                                $this->radio_fullname = 1;
                            }
                            if($arr['show_name']){
                                $this->radio_name = 1;
                            }
                            if($arr['show_signature']){
                                $this->radio_signature = 1;
                            }
                        }
			if($this->contactEnqForm->isValid() && $flag==1)
			{
				$id = $this->contactEnqForm->save();
				
				if($id)
				{
                                    if($arr['contact_chkbox'] == 'on'){
                                        if($arr['contact_chkbox']){
                                            if($arr['show_fullname']){
                                                $faster_ans_flag = 0;
                                            } else if($arr['show_name']){
                                                $faster_ans_flag = 2;
                                            }else if($arr['show_signature']){
                                                $faster_ans_flag = 3;
                                                $rows = Doctrine_Query::create()
                                                    ->update('ContactEnquiry')
                                                    ->set('user_signature', '?', $arr['contact_enquiry']['user_signature'])
                                                    ->where('id = ?', $id)
                                                    ->execute();
                                            }else{
                                                $faster_ans_flag = 3;
                                            }
                                        }
                                    }else{
                                        $faster_ans_flag = 1;
                                    }
                                    $rows = Doctrine_Query::create()
                                        ->update('ContactEnquiry')
                                        ->set('faster_ans_flag', '?', $faster_ans_flag)
                                        ->where('id = ?', $id)
                                        ->execute();
				}
                                $url = 'http://'. $host_str . '/backend.php/borst/enquiryDetails/enq_id/'.$id;
                                $mailBody = $this->getPartial('enquiry_mail', array('enquiry_no' => $id,'url'=>$url));
                                
                                if($contactEnqForm_arr['enq_type']== 'Thomas Sandström')
                                {
                                    $to = array(sfConfig::get('app_mail_to_1'),sfConfig::get('app_mail_to_3'));
                                }
                                else if($contactEnqForm_arr['enq_type']== 'Göran Högberg')
                                {
                                    $to = array(sfConfig::get('app_mail_to_1'),sfConfig::get('app_mail_to_2'));
                                }
                                else
                                {
                                    $to = array(sfConfig::get('app_mail_to_1'));
                                }
                                $from = sfConfig::get('app_mail_shop_email_1');
                                $message = $this->getMailer()->compose();
                                $message->setSubject('New Enquiry');
                                $message->setTo($to);
                                $message->setFrom($from);
                                $message->setBody($mailBody, 'text/html');
                                $this->getMailer()->send($message);


                                $this->redirect('borst/enquirySent');
			}
			else
			{
                                $this->errors = array(); 
                                foreach ($this->contactEnqForm->getErrorSchema() as $key => $err) {  
                                 if ($key) {  
                                    $this->errors[$key] = $err->getMessage();  
                                 }  
                               }
                               if($response["success"] == false){
                                   $this->errors["captachError"] = "OBS! Ange giltig captcha"; 
                               }
				//var_dump($this->contactEnqForm->getErrorSchema()->getErrors("firstname")); //die;
			}
		}
	}
	
	/**
	* Executes EnquirySent action
	*
	* @param sfRequest $request A request object
	*/
	public function executeEnquirySent(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Enquiry Sent', 'borst/enquirySent'); 
	
		$this->host_str = $this->getRequest()->getHost();
		$this->getUser()->setAttribute('third_menu', '');
		
		$this->contactenquiry_person_email = $this->getUser()->getAttribute('contactenquiry_person_email','', 'userProperty');
	}
	
	/**
	* Executes EnquiryDetails action
	*
	* @param sfRequest $request A request object
	*/
	public function executeEnquiryDetails(sfWebRequest $request)
	{
                $this->contactEnquiry = new ContactEnquiry();
		$contactEnquiry = new ContactEnquiry();
		$contactEnquiryPost = new ContactEnquiryPost();
		$mymarket = new mymarket(); 
		
                $this->enquiry_details_data = '';
                if($request->getParameter('enq_id')){
                    $comm_id = $request->getParameter('enq_id');
                    $this->enq_id = $request->getParameter('enq_id');
                    $this->enquiry_details_data = $contactEnquiry->fetchEnquiryRecViewArea($comm_id);
                }else{
                    $comm_id = $request->getParameter('comm_id');
                    if($comm_id){
                        $this->enquiry_details_data = $contactEnquiry->getLastEnquiryPost($comm_id);
                    }else {
                        $this->errormsg = 'Sorry! .. Felaktig kommunikation id'; 
                    }
                }           
                $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
                $this->user_photo_data = '';
                if($this->logged_user){
                    $userProfileImage = new SbtUserprofilePhoto();                
                    $this->user_photo_data = $userProfileImage->searchForRecord($this->logged_user);
                }

		if($comm_id)
		{
			if($this->enquiry_details_data){

                            $contactEnquiry->increaseViewCount($this->enquiry_details_data->id);
				$this->replypost_data = $contactEnquiryPost->fetchEnquiryReplyPost($this->enquiry_details_data->id);
                                $this->form = new ContactEnquiryPostForm();
                                $this->wSchema = $this->form->getWidgetSchema();
                                $this->wSchema['enq_id'] = new sfWidgetFormInputHidden();
                                $this->wSchema['title'] = new sfWidgetFormInputHidden();
                                $this->wSchema['author_name'] = new sfWidgetFormInputHidden();

                                $isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
                                $fasterAnsFlag = $this->enquiry_details_data->getFasterAnsFlag();
                                if($isSuperAdmin){
                                    $this->form->setDefault('author_name', $this->getUser()->getAttribute('firstname', '', 'userProperty').' '.$this->getUser()->getAttribute('lastname', '', 'userProperty') );
                                }else {
                                    if($fasterAnsFlag == 2){
                                        $this->form->setDefault('author_name', $this->enquiry_details_data->firstname );
                                    }else if($fasterAnsFlag == 3){
                                        $this->form->setDefault('author_name',  $this->enquiry_details_data->getUserSignature());
                                    }else {
                                        $this->form->setDefault('author_name', $this->enquiry_details_data->firstname." ".$this->enquiry_details_data->lastname );
                                    }        
                                }
                                $this->form->setDefault('reply_date',date("Y-m-d H:i:s"));	
                                $this->form->setDefault('enq_id',$this->enquiry_details_data->id);
                                $this->form->setDefault('title','');

                                $query = $contactEnquiryPost->fetchEnquiryReplyQuery($this->enquiry_details_data->id);
                                $this->pager = $mymarket->getPagerForAll('ContactEnquiryPost','10',$query,$request->getParameter('page', 1));
                        }
			else{
				$this->errormsg = 'Sorry! .. Felaktig kommunikation id';
                        }
		}else{
                        $this->errormsg = 'Sorry! .. Felaktig kommunikation id'; 
                }
                isicsBreadcrumbs::getInstance()->addItem('Fråga BT', 'borst/enquiry');
                isicsBreadcrumbs::getInstance()->addItem($this->enquiry_details_data->enq_subject, 'borst/borstPpm');
	}
	
	/**
	* Executes postReplyByUser action
	*
	* @param sfRequest $request A request object
	*/
	public function executePostReplyByUser(sfWebRequest $request)
	{
                isicsBreadcrumbs::getInstance()->addItem('Fråga BT', 'borst/enquiry');
                isicsBreadcrumbs::getInstance()->addItem($this->enquiry_details_data->enq_subject, 'borst/borstPpm');
		$this->host_str = $this->getRequest()->getHost();
		$enq_id = $request->getParameter('enq_id');
		$mymarket = new mymarket(); 
		$contactEnquiryPost = new ContactEnquiryPost();
		$contactEnquiry = new ContactEnquiry();
		$this->form = new ContactEnquiryPostForm();
                $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
                $this->user_photo_data = '';
                if($this->logged_user){
                    $userProfileImage = new SbtUserprofilePhoto();                
                    $this->user_photo_data = $userProfileImage->searchForRecord($this->logged_user);
                }
		if($enq_id){
                    $this->enquiry_details_data = $contactEnquiry->fetchEnquiryRec($enq_id);
                }
		if ($request->isMethod('post'))
		{ 
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$reply_data = $request->getParameter($this->form->getName());
			//$this->form->bind($reply_data);
			$contactEnquiryPost->saveReplyData($arr,$reply_data);

                        $replyCount = $contactEnquiry->getReplyCount($enq_id);
                        $total = 0;

                        if($replyCount)
                        {
                               
                                $total = $replyCount;
                                $contactEnquiry_update = Doctrine_Query::create()
                                                                        ->update('ContactEnquiry ce')
                                                                        ->set('ce.replycount', '?', $total)
                                                                        ->where('ce.id = ?', $enq_id);

                                $updated = $contactEnquiry_update->execute();
                        }
		}
		
		$query = $contactEnquiryPost->fetchEnquiryReplyQuery($enq_id);
		$this->pager = $mymarket->getPagerForAll('ContactEnquiryPost','10',$query,$request->getParameter('page', 1));
	}
	
	/**
	* Executes Faq action
	*
	* @param sfRequest $request A request object
	*/
	public function executeFaq(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('FAQ', 'borst/faq'); 
	
		$this->host_str = $this->getRequest()->getHost();
		$this->getUser()->setAttribute('third_menu', 'faq');
	}
	
	/**
	* 
	* This function fetches the forum post by a perticular user.
	* 
	*/
	public function executeGetForumPostData(sfWebRequest $request)
	{
		$editpost_id = $this->getRequestParameter('editpost_id');
		$editpost_id = trim(str_replace('editpost','',$editpost_id)); 

		$btforum = new Btforum();
		$post_data = $btforum->fetchTopic($editpost_id);
		return  $this->renderText($post_data->textarea);
	}
	
	/*
	*
	* This function validates the contact enquiry form and returns the errors if any.
	*
	*/
	public function executeValidateContactForm($arr) 
	{ 
		$str = '';
		$mymarket = new mymarket();
		
		$firstname = $this->getRequestParameter('firstname');
		$lastname = $this->getRequestParameter('lastname');
		$email = $this->getRequestParameter('email');
		$enq_type = $this->getRequestParameter('enq_type');
		$enq_subject = $this->getRequestParameter('enq_subject');
		
		if(!$firstname) 
		{
			$str .= "<strong>OBS!</strong> Förnamnsfältet är tomt.<br/>";
		}
		elseif(!$lastname) 
		{
			$str .= "<strong>OBS!</strong> Efternamnsfältet är tomt.<br/>";
		}
		elseif(!$email) 
		{
			$str .= "<strong>OBS!</strong> Du har inte fyllt i någon e-postadress.<br>";
		} 
		elseif(!$mymarket->is_valid_email($email))
		{
			$str .= "<b>OBS!</b> Inmatad e-post har inte rätt syntax!<br/>";
		}
		elseif(!$enq_type) 
		{
			$str .= "<strong>OBS!</strong> Välj typ av förfrågan.<br/>";
		}
		elseif(!$enq_subject) 
		{
			$str .= "<strong>OBS!</strong> Du har inte fyllt i någon rubrik.<br/>";
		}
		return  $this->renderText($str);
	}

	/*
	*
	* This function takes sorted borstjanaren search results.
	*
	*/
	public function executeGetSearchData(sfWebRequest $request)
	{ 
		$param = array();
		
		$this->host_str = $this->getRequest()->getHost();
		$search_tab = trim(str_replace('search_in_','',$request->getParameter('search_tab_id')));
		$normal_search_para = $request->getParameter('normal_search_para');
        $this->searchText = $normal_search_para;
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
        $this->parent_id = $request->getParameter('parent_id');
		$current_column = $this->getUser()->getAttribute('search_current_column','','userProperty');
		$param['column_id'] = $column_id;
		$rec_per_page = $request->getParameter('result_per_page');
        $nocriteria = $this->getUser()->getAttribute('searchOnlyUserlist');
        
        $additional_parameters = array();
        $category_id = $request->getParameter('category_id');        
        if($category_id){ $this->category_id = $category_id; $additional_parameters['category_id'] = $category_id; }
        $type_id = $request->getParameter('type_id');        
        if($type_id){ $this->type_id = $type_id; $additional_parameters['type_id'] = $type_id;  }        
        $object_id = $request->getParameter('object_id');        
        if($object_id){ $this->object_id = $object_id; $additional_parameters['object_id'] = $object_id; }        
        $shop_type = $request->getParameter('shop_type');
        if($shop_type){ $this->shop_type = $shop_type; $additional_parameters['shop_type'] = $shop_type; }
        $stock_type = $request->getParameter('stock_type');
        if($stock_type){ $this->stock_type = $stock_type; $additional_parameters['stock_type'] = $stock_type; }        
        
        //$this->getUser()->setAttribute('add_param', $additional_parameters);
		
		$mymarket = new mymarket();
		$article = new Article();
		$profile = new SfGuardUserProfile(); 
		
		
        
        $bt_cat_arr = $bt_type_arr = $bt_object_arr = $cat_arr = $type_arr = $object_arr = $forum_cat_arr = array();
        
       	$bt_cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
	    $bt_type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
	    $bt_object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
     
        foreach($bt_cat_data as $cat)		{	$bt_cat_arr[$cat->category_id] = $cat->category_name;		}
    	foreach($bt_type_data as $type)	{	$bt_type_arr[$type->type_id] = $type->type_name;			}
    	foreach($bt_object_data as $obj)	{	$bt_object_arr[$obj->object_id] = $obj->object_name;		}
    	
    	$this->bt_cat_arr = $bt_cat_arr; 
    	$this->bt_type_arr = $bt_type_arr;
    	$this->bt_object_arr = $bt_object_arr;
        
		$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
		$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		$forum_cat_arr = BtforumCategoryTable::getInstance()->getAllForumCategories();
		
		//$rec_per_page = $search_tab == 'all' ? 5 : ($rec_per_page > 0 ? $rec_per_page : 25);
		
		if($search_tab == 'all') {
			$temp_rec_per_page = $rec_per_page;
			$rec_per_page = 5;
		}
		else
		{
			$rec_per_page = $rec_per_page > 0 ? $rec_per_page : 25;
		}
		$column_id= 'date';
		if($request->getParameter('page'))
		{
			$order = $request->getParameter('search_current_column_order');
            if(!$order || $order=='undefined')
                $order = 'DESC';
            if(!$column_id || $column_id=='undefined')
                $column_id= 'date';

		}
		else
		{
			if($current_column == $column_id)
			{ 
				$order = $this->getUser()->getAttribute('search_current_column_order','','userProperty');
		
				if($order == 'ASC') $order = 'DESC';
				else $order = 'ASC';
                
                $this->order = $order;
		
				$this->getUser()->setAttribute('search_current_column_order',$order,'userProperty');
			}
			else
			{
				$this->getUser()->setAttribute('search_current_column',$column_id,'userProperty');
				$this->getUser()->setAttribute('search_current_column_order','DESC','userProperty');
				$order = 'DESC';
			}
		}
		
		if($normal_search_para)	
		{
			
			$searched_article_query = ArticleTable::getInstance()->getSearchedArticleQuery(trim($normal_search_para),$column_id,$order,$additional_parameters);
			$searched_analysis_query = SbtAnalysisTable::getInstance()->getSearchedAnalysisQuery(trim($normal_search_para),$column_id,$order,$additional_parameters);
			$searched_blog_query = SbtUserBlogTable::getInstance()->getSearchedBlogQuery(trim($normal_search_para),$column_id,$order,$additional_parameters);
			$searched_forum_query = BtforumTable::getInstance()->getSearchedForumQuery(trim($normal_search_para),$column_id,$order,$additional_parameters);
            $searched_btchart_query = BtchartCompanyDetailsTable::getInstance()->getSearchedBtchartQuery(trim($normal_search_para),$column_id,$order,$additional_parameters);  // for Btchart Normal Serach
            $searched_btshop_query = BtShopArticleTable::getInstance()->getSearchedBtshopQuery(trim($normal_search_para),$column_id,$order,$additional_parameters);  // for Btshop Normal Serach
            $searched_userlist_query = SfGuardUserProfileTable::getInstance()->getSearchedUserlistQuery(trim($normal_search_para),$column_id,$order,$additional_parameters);  // for Btshop Normal Serach
			
			$this->article_pager = $mymarket->getPagerForAll('Article',$rec_per_page,$searched_article_query,$request->getParameter('page', 1));
			$this->analysis_pager = $mymarket->getPagerForAll('SbtAnalysis',$rec_per_page,$searched_analysis_query,$request->getParameter('page',1));
			$this->blog_pager = $mymarket->getPagerForAll('SbtUserBlog',$rec_per_page,$searched_blog_query,$request->getParameter('page', 1));
			$this->forum_pager = $mymarket->getPagerForAll('Btforum',$rec_per_page,$searched_forum_query,$request->getParameter('page', 1));
            $this->btchart_pager = $mymarket->getPagerForAll('BtchartCompanyDetails',$rec_per_page,$searched_btchart_query,$request->getParameter('page', 1));
			$this->btshop_pager = $mymarket->getPagerForAll('BtShopArticle',$rec_per_page,$searched_btshop_query,$request->getParameter('page', 1));
            $this->userlist_pager = $mymarket->getPagerForAll('SfGuardUserProfile',$rec_per_page,$searched_userlist_query,$request->getParameter('page', 1));            
			
			$this->pager = $mymarket->setPagerForAll($this->article_pager,$this->analysis_pager,$this->blog_pager,$this->forum_pager,$this->btchart_pager, $this->btshop_pager,$this->userlist_pager);            
		}
		else
		{
			$arr = $this->getUser()->getAttribute('search_parameter', '', 'userProperty');
            if(!$arr['search_from_borst'] && !$arr['search_from_sbt'] && !$arr['search_from_blog'] && !$arr['search_from_forum'] && !$arr['search_from_btchart'] && !$arr['search_from_btshop'] && !$arr['search_from_userlist']){
                $arr['search_from_borst']=$arr['search_from_sbt']=$arr['search_from_blog']=$arr['search_from_forum']=$arr['search_from_btchart']=$arr['search_from_btshop']=$arr['search_from_userlist']=1;
            }
            $this->searchText = $arr['phrase_in_page'];

            $search_tab_id = $this->request->getParameter('search_tab_id');
            if($search_tab_id=='search_in_all' || $search_tab_id=='all')
                $search_tab_id=0;

            if($arr['from_adv_search']==1 && $arr['search_from_borst']!=1 && !$search_tab_id)
                $searched_article_query =null;                 
			elseif($arr['from_adv_search']==1 || $arr['search_from_borst'])
                $searched_article_query = ArticleTable::getInstance()->getAdvancedSearchedArticleQuery($arr,$column_id,$order,$additional_parameters);                

			if($arr['from_adv_search']==1 && $arr['search_from_sbt']!=1 && !$search_tab_id)
                $searched_analysis_query = null;				
			elseif($arr['from_adv_search']==1 || $arr['search_from_sbt'])
                $searched_analysis_query = SbtAnalysisTable::getInstance()->getAdvancedSearchedAnalysisQuery($arr,$column_id,$order,$additional_parameters);

			if($arr['from_adv_search']==1 && $arr['search_from_blog']!=1 && !$search_tab_id)
                $searched_blog_query = null;			
			elseif($arr['from_adv_search']==1 || $arr['search_from_blog'])
                $searched_blog_query = SbtUserBlogTable::getInstance()->getAdvancedSearchedBlogQuery($arr,$column_id,$order,$additional_parameters);
			
			if($arr['from_adv_search']==1 && $arr['search_from_forum']!=1 && !$search_tab_id)
                $searched_forum_query = null;		
			elseif($arr['from_adv_search']==1 || $arr['search_from_forum'])
                $searched_forum_query = BtforumTable::getInstance()->getAdvancedSearchedForumQuery($arr,$column_id,$order,$additional_parameters);			 

			if($arr['from_adv_search']==1 && $arr['search_from_btchart']!=1 && !$search_tab_id)
                $searched_btchart_query = null;		
			elseif($arr['from_adv_search']==1 || $arr['search_from_btchart'])
                $searched_btchart_query = BtchartCompanyDetailsTable::getInstance()->getAdvancedSearchedBtchartQuery($arr,$column_id,$order,$additional_parameters);			                 
				
				// echo($arr['phrase_in_page']);
				// echo($column_id);
				// echo($order);
				// echo($additional_parameters);
				// exit;

			if($arr['from_adv_search']==1 && $arr['search_from_btshop']!=1 && !$search_tab_id)
                $searched_btshop_query = null;		
			elseif($arr['from_adv_search']==1 || $arr['search_from_btshop'])
                $searched_btshop_query = BtShopArticleTable::getInstance()->getSearchedBtshopQuery($arr['phrase_in_page'],$column_id,$order,$additional_parameters);  // for Btshop Advance Serach			                                 

			if($arr['from_adv_search']==1 && $arr['search_from_userlist']!=1 && !$search_tab_id)
                $searched_userlist_query = null;		
			elseif($arr['from_adv_search']==1 || $arr['search_from_userlist'])
                $searched_userlist_query = SfGuardUserProfileTable::getInstance()->getAdvancedSearchedUserlistQuery($arr['phrase_in_page'],$arr['author_name'],$column_id,$order,$additional_parameters,$nocriteria);			                                                 

			if($searched_article_query)
                $this->article_pager = $mymarket->getPagerForAll('Article',$rec_per_page,$searched_article_query,$request->getParameter('page', 1));
            else
                $this->article_pager =null;
            
            if($searched_analysis_query)
    			$this->analysis_pager = $mymarket->getPagerForAll('SbtAnalysis',$rec_per_page,$searched_analysis_query,$request->getParameter('page', 1));
			else
                $this->analysis_pager = null; 
            
            if($searched_blog_query)
                $this->blog_pager = $mymarket->getPagerForAll('SbtUserBlog',$rec_per_page,$searched_blog_query,$request->getParameter('page', 1));
            else
                $this->blog_pager = null;                

            if($searched_forum_query)	
                $this->forum_pager = $mymarket->getPagerForAll('Btforum',$rec_per_page,$searched_forum_query,$request->getParameter('page', 1));
            else
                $this->forum_pager = null;                
            
            if($searched_btchart_query)	
                $this->btchart_pager = $mymarket->getPagerForAll('BtchartCompanyDetails',$rec_per_page,$searched_btchart_query,$request->getParameter('page', 1));
            else
                $this->btchart_pager = null;
                
            if($searched_btshop_query)	
                $this->btshop_pager = $mymarket->getPagerForAll('BtShopArticle',$rec_per_page,$searched_btshop_query,$request->getParameter('page', 1));
            else
                $this->btshop_pager = null;                                                                      

            if($searched_userlist_query)	
                $this->userlist_pager = $mymarket->getPagerForAll('SfGuardUserProfile',$rec_per_page,$searched_userlist_query,$request->getParameter('page', 1));
            else
                $this->userlist_pager = null;                                                                                      
            
			$this->pager = $mymarket->setPagerForAll($this->article_pager,$this->analysis_pager,$this->blog_pager,$this->forum_pager,$this->btchart_pager,$this->btshop_pager,$this->userlist_pager);
        }
		
		if($search_tab == 'all')
		{ 
			$this->pager = $mymarket->setPagerForAll($this->article_pager,$this->analysis_pager,$this->blog_pager,$this->forum_pager,$this->btchart_pager,$this->btshop_pager,$this->userlist_pager);
		}
		else
		{
			if($search_tab == 'borst') $this->pager = $this->article_pager;
			if($search_tab == 'sbt') $this->pager = $this->analysis_pager;
			if($search_tab == 'blog') $this->pager = $this->blog_pager;
			if($search_tab == 'forum') $this->pager = $this->forum_pager;
            if($search_tab == 'btchart') $this->pager = $this->btchart_pager;
            if($search_tab == 'btshop') $this->pager = $this->btshop_pager;
            if($search_tab == 'userlist') $this->pager = $this->userlist_pager;            	
		}
		
        
        $this->user_arr = array();
        $userProfileImage = new SbtUserprofilePhoto(); 
	    $data = $userProfileImage->fetchAllPhotoRecord();
        for($i=0; $i<count($data); $i++) {	$this->user_arr[$data[$i]['user_id']] = $data[$i]['profile_photo_name']; }
        
		$this->stock_type_arr = array(1 => "LargeCap", 2 => "MidCap", 3 => "SmallCap", 4 => "Varlden", 5 => "Ravoror", 6 => "Valutor", 7 => "Lasarnas");        
        $this->profile = $profile;	
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr;
		$this->forum_cat_arr = $forum_cat_arr;
		$this->normal_search_para = $normal_search_para;
		$this->search_tab = $search_tab;
		$this->column_id = $column_id;
		$this->current_column_order = $order;
		$this->ext = $this->searchText;//$mymarket->getExtension($param);
		if($search_tab != 'all') $this->rec_per_page = $rec_per_page;
		else $this->rec_per_page = $temp_rec_per_page;
                
            $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
            foreach($object_data as $obj)	
            {	
                    $object_arr[$obj->object_id] = $obj->object_name; 
                    $object_country_arr[$obj->object_id] = $obj->object_country;		
            } 
            $this->object_country_arr = $object_country_arr;
            $this->sbt_blog_comment = new SbtBlogComment();
            $this->methodName = 'getSubCategoryName'; 
	}
	
	/*
	*
	* This function gives sorted list for article list data.
	*
	*/
	public function executeGetArticleListData(sfWebRequest $request)
	{ 
		$this->host_str = $this->getRequest()->getHost();
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$parent_menu = $request->getParameter('parent_menu');
		$submenu_menu = $request->getParameter('submenu_menu');
		
		$article = new Article();
		$analysis = new SbtAnalysis();
		$mymarket = new mymarket();
		$profile = new SfGuardUserProfile();
		
		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
		else $isSuperAdmin = 0;	
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('articlelist_current_column','','userProperty');
		$page = $request->getParameter('page');
		$articlelist_current_column_order = $request->getParameter('articlelist_current_column_order');
		$set_column = 'articlelist_current_column';
		$set_column_order = 'articlelist_current_column_order';
		
		$order = $profile->setSortingParameters($page,$articlelist_current_column_order,$column_id,$current_column,$set_column,$set_column_order);
		
		/* For borst */
		if($parent_menu == 'top_borst_menu')
		{ 
			$this->type = 'borst';
			$query = ArticleTable::getInstance()->getQueryForSubMenu($submenu_menu,$isSuperAdmin,$column_id,$order);

			$this->pager = new sfDoctrinePager('Article', '10');
			$this->pager->setQuery($query);	
			
			$cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
			$type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
			$object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
			
			foreach($cat_data as $cat)		{	$cat_arr[$cat->category_id] = $cat->category_name;		}
			foreach($type_data as $type)	{	$type_arr[$type->type_id] = $type->type_name;			}
			foreach($object_data as $obj)	
			{	
				$object_arr[$obj->object_id] = $obj->object_name; 
				$object_country_arr[$obj->object_id] = $obj->object_country;		
			} 
		}
		else
		{
			$this->type = 'sbt';
			
			// Logged In users latest article.
			$user_id = $this->getUser()->getAttribute('user_id', '' , 'userProperty');
			if($user_id) $this->art_id = $analysis->getUserLatestArticleId($user_id);
			else $this->art_id = '';
			
			// All articles from analysis table
			if(!$column_id)
				$query = $analysis->getPublishedAnalysisByOrderQuery('date','DESC');
			else
				$query = $analysis->getPublishedAnalysisByOrderQuery($column_id,$order);
						
			$this->pager = new sfDoctrinePager('SbtAnalysis', '10');
			$this->pager->setQuery($query);
			
			$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
			$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
			$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		}
		
		$this->pager->setPage($request->getParameter('page', 1));
	 	$this->pager->init();
	 
		$this->current_column_order = $order;
		$this->column_id = $column_id;
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr;
		$this->object_country_arr = $object_country_arr;
	}
	
  /**
  * Executes View BorstJobba action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstJobba(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('JOBBA PÅ BT', 'borst/borstJobba'); 
	
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'bt_jobba');
  }
  
  /**
  * Executes View BorstRisk action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstRisk(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('RISKVARNING', 'borst/borstRisk'); 
	
	$this->host_str = $this->getRequest()->getHost();
	// $this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'riskvarning');
  }
    
  
   /**
  * Executes View BorstHelp action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstHjalp(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('HJÄLP - FAQ', 'borst/borstHjalp'); 
	
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	
  }  
  
  /**
  * Executes View BorstPortfolio action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstPortfolio(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('PORTFOLIO', 'borst/borstPortfolio'); 
	
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', '');
  }
  
  /**
  * Executes View BorstPortfolioInfo action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstPortfolioInfo(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('PORTFOLIO INFO', 'borst/borstPortfolioInfo'); 
	
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', '');
  }
  
  /**
  * Executes View ChangeSetting action
  *
  * @param sfRequest $request A request object
  */
  public function executeChangeSetting(sfWebRequest $request)
  {
	$host_str = $this->getRequest()->getHost();
	$userId = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	
	if($userId)
	{
		$url = 'http://'.$host_str.'/sbt/editProfile/edit_user_id/'.$userId;
		$this->redirect($url);		
	}
	else
	{
		$this->redirect('@homepage');	
	}
	
  }
  
  /**
  * Executes TipAFriendForm action
  *
  * @param sfRequest $request A request object
  */
  public function executeTipAFriendForm(sfWebRequest $request)
  { 
	$this->host_str = $this->getRequest()->getHost();
	$article_info_arr = array();
	$mymarket = $this->market = new mymarket();
        $host_str = $this->getRequest()->getHost();
	$private_key = sfConfig::get('app_recaptcha_private_key');
        $this->public_key = sfConfig::get('app_recaptcha_public_key');
        $captcha = $this->getRequestParameter('g-recaptcha-response');        
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$private_key."&response=".$captcha."&remoteip=".$host_str), true);
        
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', '');
	
	$parent_menu = $this->getUser()->getAttribute('parent_menu');
	$submenu_menu = $this->getUser()->getAttribute('submenu_menu');
	
	$breadcrum_menu = new Article();
	$this->first_menu = $breadcrum_menu->getMenuItem($parent_menu);
	$this->first_url = $breadcrum_menu->getMenuUrl($parent_menu); 
	
	$second_menu = 'Tipsa en vän';
	$second_url = $breadcrum_menu->getMenuUrl($submenu_menu);
	isicsBreadcrumbs::getInstance()->addItem($second_menu, $second_url); 
		
	if($request->getParameter('article_id'))
	{
		$article = new Article();
		$article_data = $article->getSelectedArticle($request->getParameter('article_id'));
		$article_id = $request->getParameter('article_id');
		
		if($article_data)
		{
			if ($article_data->image != "")
				$this->image_details = $mymarket->align_position($this->host_str,$article_data->image);
			
			$this->rub = $article_data->title;
			$ingress = $article_data->image_text;
			
			$path_to_image = '';
		
			$start = strpos($ingress , "http://".$this->host_str);
			$stop = strpos($ingress , "[/img]");
			$length = $stop - $start;
			$path_to_image = substr($ingress, $start, $length);
			if(strpos($ingress , "[/img]")===false)
			$path_to_image='http://'.$this->host_str.'/'.str_replace('artiklar','images/article_images',$article_data->image);
			
			
			$ingress = preg_replace("#\[img\](.+?)\[/img\]#is", "<img src=\"\\1\" alt=\"[image]\" style=\"margin: 0px 0px 25px\" /><br>", $ingress);
			$ingress = preg_replace("#\[img\|left\](.+?)\[/img\]#is", "<img src=\"\\1\" alt=\"[image]\" style=\"float: left; margin: 3px 10px 8px 0px\" /><br>", $ingress);
			$ingress = preg_replace("#\[img\|right\](.+?)\[/img\]#is", "<img src=\"\\1\" alt=\"[image]\" style=\"float: right; margin: 6px 0px 4px 8px\" /><br>", $ingress);
		}
	}
		
	if($request->isMethod('post'))
	{
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$error_flag = 0;
		$errormsg = "";
	
                $this->errors = array();                 

                if($response["success"] == false){
                   $this->errors["captachError"] = "OBS! Ange giltig captcha"; 
                   $error_flag = 1;
                }

		if ($arr['sender_mail'] == "" )
			$sender_mail = "info@borstjanaren.se";
		else
		{
			if(ereg("([[:alnum:]\.\-]+)(\@[[:alnum:]\.\-]+\.+)", $arr['sender_mail'])) $sender_mail = $arr['sender_mail'];
			else 
			{
				$this->sender_mail_errors = true;
				$error_flag = 1;
			}
		}	
		
		if ($arr['send_subject'] == "")
			$send_subject = "Artikeltips p Brstjnaren.se";
			
		if ($arr['friend_mail'] == "")
		{
			$this->friend_mail_errors = true;
			$this->errormsg  .= "<strong>OBS!</strong> Fyll i din vns e-post<br>";
			$error_flag = 1;
		}
		else
		{
			if(ereg("([[:alnum:]\.\-]+)(\@[[:alnum:]\.\-]+\.+)", $arr['friend_mail'])) 
				$article_info_arr['friend_mail'] = $arr['friend_mail'];
			else 
			{
				$this->friend_mail_errors = true;
				$this->errormsg  .= "<strong>OBS!</strong> Inmatad e-post har inte rtt syntax!<br>";
				$error_flag = 1;
			}
		}	
			
		// If form is error free
		if($error_flag == 0) 
		{
			$article_info_arr['image'] = $path_to_image ? $path_to_image : '';
			$article_info_arr['rub'] = $this->rub;
			$article_info_arr['sender'] = $arr['sender_name'];
			$article_info_arr['send_subject'] = $arr['send_subject'];
			$article_info_arr['friend_mail'] = $arr['friend_mail'];
			$article_info_arr['article_id'] = $article_id;
			$article_info_arr['ingress'] = $ingress ? $ingress : '';
			$article_info_arr['sender_mail'] = $sender_mail;
			$article_info_arr['thumb_image'] = $article_data->image;
			$article_info_arr['image_text'] = $article_data->image_text;
			
			
			if ($article_data->image != "") 
			{
				$image_details1 = $mymarket->align_position($this->host_str,$article_data->image);
				$article_info_arr['ingress_bild'] = '<p><img width="'.$image_details1['width'].'" height="'.$image_details1['height'].'"  src="'.$image_details1['img'].'" style="padding-right:10px;"></p>';
			}
			else 
				$article_info_arr['ingress_bild'] ="";
	
			
			if ($sender_mail != "" && $arr['optional_message'] != "") {
				$article_info_arr['message'] = "<b>".$article_info_arr['sender']."</b> skriver: ".$arr['optional_message']."<br><br>";
			}
			elseif ($optional_message != "") {
				$article_info_arr['message'] = "Meddelande frn avsndaren (som frmodligen glmt skriva sitt namn!): ".$arr['optional_message']."<br><br>";
			}
			elseif ($arr['sender_name'] != "") 
			{
				$article_info_arr['message'] = "Tips skickat av <b>".$arr['sender_name']."</b>!<br><br>";
			}
			else $article_info_arr['message'] = "";
			
			$mailBody = $this->getPartial('tip_a_friend_html',array('user'=>$article_info_arr,'host_str'=>$this->host_str));

			$to = $article_info_arr['friend_mail'];
			//$from = $article_info_arr['sender_mail'] ? $article_info_arr['sender_mail'] : sfConfig::get('app_mail_sender_email');
                        $from = sfConfig::get('app_mail_sender_email');
			
			$message = $this->getMailer()->compose();
			$message->setSubject($article_info_arr['send_subject']);
			$message->setTo($to);
			$message->setFrom($from);
			$message->setBody($mailBody, 'text/html');
			$this->getMailer()->send($message);
			
			$this->greenmsg =  "Ditt tips är skickat till ".$article_info_arr['friend_mail'];
		}
	}
  } 
  
  public function executeTipAFriendNewBt(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$article_info_arr = array();
	$mymarket = $this->market = new mymarket();
	
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', '');
	
	$parent_menu = $this->getUser()->getAttribute('parent_menu');
	$submenu_menu = $this->getUser()->getAttribute('submenu_menu');
	
	$breadcrum_menu = new Article();
	$this->first_menu = $breadcrum_menu->getMenuItem($parent_menu);
	$this->first_url = $breadcrum_menu->getMenuUrl($parent_menu); 
	
	$second_menu = 'Tipsa en vän';
	$second_url = $breadcrum_menu->getMenuUrl($submenu_menu);
	isicsBreadcrumbs::getInstance()->addItem($second_menu, $second_url); 
		
	if($request->isMethod('post'))
	{
	 	$arr = $this->getRequest()->getParameterHolder()->getAll();
		$error_flag = 0;
		$errormsg = "";
		
        if($arr['sender_name']=="" || $arr['friend_mail']=="")
        {
			$this->friend_mail_errors = true;
			$this->errormsg  .= "<p><strong>OBS!</strong> Ditt namn och din vns e-post mste fyllas i.</p>";
			$error_flag = 1;            
        }		
		else
		{
			if($arr['sender_mail']!="") 
			{
				if(!eregi("^[a-z0-9]+([-_\.]?[a-z0-9])+@[a-z0-9]+([-_\.]?[a-z0-9])+\.[a-z]{2,4}", $arr['sender_mail'])) 
				{
					$this->email_error = true;
					$this->errormsg .= "<p><strong>OBS!</strong> Din e-post har inte rtt syntax.</p>";
					$error_flag = 1;
				}	
			}
			
			if (!eregi("^[a-z0-9]+([-_\.]?[a-z0-9])+@[a-z0-9]+([-_\.]?[a-z0-9])+\.[a-z]{2,4}", $arr['friend_mail'])) 
			{
				$this->email_error = true;
				$this->errormsg .= "<p><strong>OBS!</strong> Din vns e-post har inte rtt syntax.</p>";
				$error_flag = 1;
			}
		}
			
		// If form is error free
		if($error_flag == 0) 
		{
			$article_info_arr['sender'] = $arr['sender_name'];
			$article_info_arr['send_subject'] = $arr['send_subject'];
			$article_info_arr['friend_mail'] = $arr['friend_mail'];
            $article_info_arr['friends_name'] = $arr['friends_name'];
			$article_info_arr['message'] = $arr['optional_message'];
			$article_info_arr['sender_mail'] = $arr['sender_mail'];	
					
			$mailBody = $this->getPartial('tip_a_friend_new_bt',array('user'=>$article_info_arr,'host_str'=>$this->host_str));

			$to = $article_info_arr['friend_mail'];
			$from = sfConfig::get('app_mail_sender_email');
			
			$message = $this->getMailer()->compose();
			$message->setSubject('Din vän rekommenderar dig Börstjänaren JUST NU!');
			$message->setTo($to);
			$message->setFrom($from);
			$message->setBody($mailBody, 'text/html');
			$this->getMailer()->send($message);
			
			$this->greenmsg =  "Ditt tips till ".$article_info_arr['friend_mail']." har skickats!";
		}
	}    
  }

      /**
  * Returns value for IE
  *
  * @param sfRequest $request A request object
  */
  public function executeGetParaFromYahoo(sfWebRequest $request)
  {
      $field = $request->getParameter('field');
      $url = '';
	  $yahoo_host = 'query.yahooapis.com';
	  //$yahoo_host = '98.137.129.181';

      switch($field)
      {
          case 'omx':
              $url="http://$yahoo_host/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22^OMXS30%22%29&env=store://datatables.org/alltableswithkeys";
			  $file = 'c:\\systerbt\\yahoo_data\omx.xml';
			  
              break;
          case 'sp':
              $url="http://$yahoo_host/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22^GSPC%22%29&env=store://datatables.org/alltableswithkeys";
			  $file = 'c:\\systerbt\\yahoo_data\sp.xml';
              break;
         /* case 'gold':
              $url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22^OMXS30%22%29&env=store://datatables.org/alltableswithkeys";
              break;
          case 'oil':
              $url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22^OMXS30%22%29&env=store://datatables.org/alltableswithkeys";
              break;*/
      }
	  

	  $xml = simplexml_load_file($file);
	  
      //$data = file_get_contents($url);
      //$xml = simplexml_load_string($data);

      $val = $xml->results->quote->Change_PercentChange;
	  $indexval = $xml->results->quote->LastTradePriceOnly;
      $myArray = explode(' ',$val);     

      return $this->renderText((string)$myArray[count($myArray)-1] . '@#@' . (string)$indexval);
      
  }
       /**
  * Returns value for IE
  *
  * @param sfRequest $request A request object
  */
  public function executeGetTime(sfWebRequest $request)
  {
  	 $time = date("H:i",time());
     if($request->getParameter('id') == 'omxtime')
	 {
	 	$this->getUser()->setAttribute('omxVal',$request->getParameter('val'));	
		$this->getUser()->setAttribute('omxIndexVal',$request->getParameter('indexval'));	
		$this->getUser()->setAttribute('omxArrow',$request->getParameter('arrow'));
		
		if($this->isbetween('9:00','17:30', $time,'omxtime'))			
		{
			$this->getUser()->setAttribute('omxtime',date("H:i",time()));
		}
		else 
			$time = $this->getUser()->getAttribute('omxtime');
	 }
	 else
	 {
	 	$this->getUser()->setAttribute('spVal',$request->getParameter('val'));	
		$this->getUser()->setAttribute('spIndexVal',$request->getParameter('indexval'));	
		$this->getUser()->setAttribute('spArrow',$request->getParameter('arrow'));	
		if($this->isbetween('15:30','22:00', $time,'sptime'))			
		{
			$this->getUser()->setAttribute('sptime',date("H:i",time()));
		}	
		else 
			$time = $this->getUser()->getAttribute('sptime');
	 }	 

	 return $this->renderText($time);
  }  
  
  protected function isbetween($s, $e,$time,$ty) 
  {
		$ret = False; //Defaults to false
	
		$n = explode(':',$time); //Separate hours and minutes
		$s = explode(':',$s);
		$e = explode(':',$e);
	
		$nt = $n[0] * 60 + $n[1];  //Convert time to total minutes
		$st = $s[0] * 60 + $s[1];
		$et = $e[0] * 60 + $e[1];
		
		
		if($nt > $st && $nt < $et) //Check time
			$ret = true;
		else 
			$ret = false;
		
		if(($nt < $st || $nt > $et) && $ty == 'omxtime')	
		{
			$this->getUser()->setAttribute('omxtime','17:30');
		}
		elseif(($nt < $st || $nt > $et) && $ty == 'sptime')
		{
			$this->getUser()->setAttribute('sptime','22.00');
		}
		return $ret;
		
  }
  
    public function executeGoogleadThankyou(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('THANKS','borst/googleadThankyou'); 
	
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', '');
  }
  
  public function executeGooglead (sfWebRequest $request) {
  
      if(sfContext::getInstance()->getRequest()->getCookie("google_ads")!="true"){
                    sfContext::getInstance()->getResponse()->setCookie("google_ads","true",time()+60*60*24*39*12);
                    return $this->redirect("borst/googlead");
      }


                
      isicsBreadcrumbs::getInstance()->addItem('KONTAKTA OSS', 'borst/contactUs');
	
		$this->host_str = $this->getRequest()->getHost();
		$this->getUser()->setAttribute('parent_menu', ''); 
		$this->getUser()->setAttribute('submenu_menu', '');
	
		$this->getUser()->setAttribute('third_menu', 'contact_us');
		$enq_type = array('0'=>'','Abonnemang'=>'Abonnemang','Utbildningar'=>'Utbildningar','Metastock'=>'Metastock','Webinarium'=>'Webinarium','Forum'=>'Forum','Henrik Hallenborg'=>'Henrik Hallenborg','Thomas Sandström'=>'Thomas Sandström','Göran Högberg'=>'Göran Högberg','Övrigt'=>'Övrigt');
                $uid = $this->getUser()->getGuardUser()?$this->getUser()->getGuardUser()->getId():'';
		$userProfile =  Doctrine::getTable('SfGuardUserProfile')->getProfileuserFromSfGaurdUser(uid);

                
		$firstname = $this->getUser()->getAttribute('firstname','', 'userProperty') ? $this->getUser()->getAttribute('firstname','', 'userProperty') : '';
                $lastname = $this->getUser()->getAttribute('lastname','', 'userProperty') ? $this->getUser()->getAttribute('lastname','', 'userProperty') : '';
		$email = $this->getUser()->getAttribute('email','', 'userProperty') ? $this->getUser()->getAttribute('email','', 'userProperty') : '' ;
		
		$postid = $this->getRequestParameter('postid');
                $code = $request->getParameter('code');
                $contact_us = Doctrine::getTable('ContactUs')->findByCode($code);
	    if($postid > 0)
		{
			$btforum = new Btforum();
			$post_data = $btforum->fetchTopic($postid);
			$rr = str_replace('/uploads','http://'.$this->host_str.'/uploads',$post_data->textarea);
		}
		
		$this->contactEnqForm = new ContactEnquiryForm();
		$this->wSchema = $this->contactEnqForm->getWidgetSchema();
	 	$this->wSchema['enq_type']->setOption('choices',$enq_type);
	 	$this->contactEnqForm->setDefault('enq_type',0);	
		$this->contactEnqForm->setDefault('enq_date',date('Y-m-d H:i'));	
	 	$this->contactEnqForm->setDefault('is_answered',0);	
	 	$this->contactEnqForm->setDefault('comm_id',0);	
		$this->contactEnqForm->setDefault('firstname',$firstname);	
		$this->contactEnqForm->setDefault('lastname',$lastname);	
		$this->contactEnqForm->setDefault('email',$email);
                $this->contactEnqForm->setDefault('enq_type',$contact_us?$contact_us->getType():'');
                $this->contactEnqForm->setDefault('user_question',$contact_us?$contact_us->getContent():'');
                $this->contactEnqForm->setDefault('enq_subject',$contact_us?$contact_us->getSubject():'');
                $this->contactEnqForm->setDefault('mobile',$userProfile?$userProfile->getPhone():'');
                $this->contactEnqForm->setValidator('mobile',new sfValidatorString(array('required' => true)));
                $this->wSchema = $this->contactEnqForm->getValidatorSchema();
	 	
                $this->wSchema['firstname']->setMessage('required',"OBS! Efternamnsfältet är tomt.");
                $this->wSchema['lastname']->setMessage('required',"OBS! OBS! Du har inte fyllt i någon e-postadress.");
                $this->wSchema['email']->setMessage('required',"OBS! OBS! Inmatad e-post har inte rätt syntax!");
                $this->wSchema['mobile']->setMessage('required',"OBS! telefon fältet är tomt.");
    
                $this->sent=0;
		if($post_data)
		{
			$this->contactEnqForm->setDefault('user_question',$rr);	
			$this->contactEnqForm->setDefault('enq_type','Forum');	
		}
	
		if ($request->isMethod('post'))
		{
                        $param = $request->getParameter($this->contactEnqForm->getName());
                        $this->contactEnqForm->bind($param);
                        if($this->contactEnqForm->isValid()){
                            
                            $mail_boday_de = $this->getPartial('google_ad_mail_de',array('firstname'=>$param['firstname'],'lastname'=>$param['lastname'],"friday_check"=>$request->getParameter("friday_checkbox"),"trend_check"=>$request->getParameter("trend_checkbox")));
                            $mail_boday_en = $this->getPartial('google_ad_mail_en',array('firstname'=>$param['firstname'],'lastname'=>$param['lastname'],"friday_check"=>$request->getParameter("friday_checkbox"),"trend_check"=>$request->getParameter("trend_checkbox"),"email"=>$param['email'],"mobile"=>$param['mobile']));

                            $from =  sfConfig::get('app_mail_sender_notification');
                            $message = $this->getMailer()->compose();
                            $message->setSubject("Kursanmälan på Börstjänaren");
                            $message->setTo($param['email']);
                            $message->setFrom($from);
                            $message->setBody($mail_boday_de, 'text/html');
                            $this->getMailer()->send($message);
                            $message->setSubject("Börstjänaren/Ava registration");
                            $message->setBody($mail_boday_en, 'text/html');
                            $message->setTo(array(sfConfig::get('app_mail_sender_notification'),sfConfig::get('app_mail_avafx_email')));
                            //$message->setTo(array("zainula@siddhatech.com","zainabed@gmail.com"));
                            $this->getMailer()->send($message);
                            $this->email = $param['email'];
                           $this->sent=1;
                           
                        }
		}
                
  }
  
 /**
	* 
	* This function deletes the posted comment of a perticular article.
	* 
	*/
	public function executeDelArticleCommentData(sfWebRequest $request)
	{
		$deletepost_id = $this->getRequestParameter('deletepost_id');
		$deletepost_id = trim(str_replace('delete_link','',$deletepost_id));     
		$comment = new BorstArticleComment();
        $article_id = $request->getParameter('artical_id');
		$post_data = $comment->delArticleCommentData($deletepost_id);
        if(isset($post_data))
        {
            $this->getUser()->setFlash('notice','Comment Deleted Successfully');
        } 
        $mymarket = new mymarket();
	    $all_comments_query = BorstArticleCommentTable::getInstance()->getCommentsOnArticleQuery($article_id);
        
	    $this->pager = $mymarket->getPagerForAll('BorstArticleComment','25',$all_comments_query,$request->getParameter('page', 1));
        return $this->renderPartial('borst/deleted_article_comment_html', array('pager'=> $this->pager));
	}
    public function executeSendFavoriteUpdateNotification(sfWebRequest $request)
	{
		$host_str = $this->getRequest()->getHost();
		$profile = new SfGuardUserProfile();
		$favorite = new SbtFavorite();
		
		$id_arr = array();
		
		$item_type_arr = explode('_',$this->getUser()->getAttribute('fav_notification'));
		$user_id_arr = $favorite->getFavNotificationUserList($item_type_arr[0],$item_type_arr[1]);
		
		$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		for($i=0;$i<count($user_id_arr);$i++)
		{
			if($user_id != $user_id_arr[$i]['user_id'])
				$id_arr[$i] = $user_id_arr[$i]['user_id'];
		}
		
		$email_arr = $profile->getEmailOfSelectedUsers($id_arr);
		try
		{
			$mailBody = $this->getPartial('notification_for_favorite',array('item_type_arr'=>$item_type_arr,'host_str'=>$host_str));
			$to = $email_arr;
			$from = sfConfig::get('app_mail_sender_email'); 
			
			$message = $this->getMailer()->compose();
			$message->setSubject('Update Notification');
			$message->setTo($to);
			$message->setFrom($from);
			$message->setBody($mailBody, 'text/html');
			$this->getMailer()->batchSend($message);
			
			$this->getUser()->getAttributeHolder()->remove('fav_notification');
		}
		catch(Exception $e)
		{
			return sfView::NONE;
		}			

		return sfView::NONE;
	}
	
	public function executeYahooFinance(sfWebRequest $request){
		$Url = 'http://finance.yahoo.com/webservice/v1/symbols/^OMX,^gspc/quote?format=json&view=detail';
		//$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
                $agent= "'User-Agent':'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13E230 Safari/601.1";
                
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$Url);
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		$result=curl_exec($ch);
		curl_close($ch);
		$this->getUser()->setAttribute('wantsurl',$_SERVER['HTTP_REFERER']);
		//var_dump(json_decode($result,true));
		//$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_REFERER'];
		//echo $_SERVER['REQUEST_URI'];
		return $this->renderText(json_encode($result));
	}
	
	public function executeGetSimilarArticles(sfWebRequest $request){
		
		$mymarket = new mymarket();
		$article = new Article();
		$page = $request->getParameter('page', 1);
		$object_id = $request->getParameter('object_id');
		$query = $article->getListOfSimilarArticlesQuery($object_id);
		$this->pagerForSimilarArticles = $mymarket->getPagerForAll('Article','20',$query,$page);
	}
        
        /* For Top 9 most viewed bt article */
        public function topNineArticle(){
            /* For Top 9 most viewed bt article */
            $top_article_count = new ArticleCount();
            $currentDate = date('Y-m-d');	
            $thirty_days_before_date = date('Y-m-d', strtotime('-30 days', strtotime($currentDate)));				
            $from = $thirty_days_before_date;
            $to   = $currentDate;
            $result = Doctrine_Query::create()
                                ->from('Article a')
                                ->leftJoin('a.ArticleCount ac')	
                                ->where('a.article_date >= ?', $from)
                                ->addwhere('a.art_statID = ?', 3)
                                ->addwhere('a.article_date <= ?', $to)
                                ->whereNotIn('ac.art_id', array(241))
                                ->orderBy('ac.click_cnt DESC')
                                ->offset(0)
                                ->limit(9)                            
                                ->execute();
            $article_id_array = $top_article_count->getTopViewedArticle(10);
            $comma_separated_article_id = implode(",", $article_id_array);
            return $result;//$article->getSelectedBtArticles($comma_separated_article_id);
            
        }
        
    /**
     * Executes SiteMap action
     *
     * @param sfRequest $request A request object
     */
    public function executeSiteMap(sfWebRequest $request) 
    {
        $this->getUser()->setAttribute('parent_menu_common', '1');
        $this->getUser()->setAttribute('third_menu', 'sitemap');

        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        $this->metastock_data = $btshop_article->getPublishedShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getPublishedShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getPublishedShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getPublishedShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getPublishedShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getPublishedShopArticleOfType(6);
        $this->btchart_data = $btshop_article->getPublishedShopArticleOfType(7);
        // xmas offer
        $this->xmas_offer_data = $btshop_article->getPublishedShopArticleOfType(8);
        
        isicsBreadcrumbs::getInstance()->addItem('Sitemap', '');
    }
    
    public function executeGetMoreArticle(sfWebRequest $request){
        
    $this->getUser()->setAttribute('parent_menu_common', '1');
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_home');
	$this->getUser()->setAttribute('third_menu', '');
	$this->host_str = $this->getRequest()->getHost();

	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
        
        $col1_13_heading_style_start = array('home_heading_l_1','home_heading_l_2','home_heading_l_3');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
        $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
        // $last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        // $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        // $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        // $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        // $fcol_body_text_6_7 = array('home_body_l_1x','home_body_l_2x');
        // $fcol_body_text_2_3 = array('home_body_m_4','home_body_m_3');
        // $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        // $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
		// $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');
		
		$last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        $fcol_body_text_6_7 = array('home_body_l_2x','home_body_l_2x');
        $fcol_body_text_2_3 = array('home_body_l_2x','home_body_l_1x');
        $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
        $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');

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
	$this->col1_45_div_style = $col1_45_div_style;
	$this->col1_67_heading_style = $col1_67_heading_style;
	$this->col1_814_heading_style = $col1_814_heading_style;
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	$this->last_column_style = $last_column_style;
        $this->fcol_hor_title = $fcol_hor_title;
        $this->fcol_ver_title = $fcol_ver_title;
        $this->fcol_big_title = $fcol_big_title;
        $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
        $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
        $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
        $this->mcol_body_text = $mcol_body_text;
        $this->rcol_body_text = $rcol_body_text;

	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;

	// Articles related to Commodities.
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	else $isSuperAdmin = 0;
        
        $this->article_limit = 25;
        $this->article_limit_right = 10;
        $this->secondLimit = 4;
        
        $pageno = $request->getParameter('pageno', 1);
        $offset = ($pageno-1)*$this->article_limit;
        $offsetright = ($pageno-1)*$this->article_limit_right;
        $this->pageno = $pageno;
        $this->nextpageno = $pageno+1;
        
	$two_column_articles = ArticleTable::getInstance()->getHomeBorstHome($offset,$this->article_limit,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell($offsetright,$this->article_limit_right,$isSuperAdmin,$two_column_articles);
        //echo count($two_column_articles);

	$this->left_records = $two_column_articles;
        $this->last_column_articles = $last_column_articles;
        
        /* For random 8 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
        
    }
    
    public function executeGetMoreArticleDetails(sfWebRequest $request){
        
        $this->getUser()->setAttribute('parent_menu_common', '1');
	$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
	$this->getUser()->setAttribute('submenu_menu', 'borst_menu_home');
	$this->getUser()->setAttribute('third_menu', '');
	$this->host_str = $this->getRequest()->getHost();

	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = array();
	$this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
        
        $col1_13_heading_style_start = array('home_heading_l_1','home_heading_l_2','home_heading_l_3');
	$col1_45_div_style = array('redheaing','blackheaing');
	$col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
        $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	$col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');

		
		$last_column_style = array('home_heading_r_1','home_heading_r_2','home_heading_r_3','home_heading_r_4');
        $fcol_hor_title = array('home_heading_l_3b','home_heading_l_2b');
        $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
        $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
        $fcol_body_text_6_7 = array('home_body_l_2x','home_body_l_2x');
        $fcol_body_text_2_3 = array('home_body_l_2x','home_body_l_1x');
        $fcol_body_text_1_4_5 = array('home_body_l_1x','home_body_l_2x','home_body_l_1x');
        $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
        $rcol_body_text = array('home_body_r_1','home_body_r_2','home_body_r_3','home_body_r_4');

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
	$this->col1_45_div_style = $col1_45_div_style;
	$this->col1_67_heading_style = $col1_67_heading_style;
	$this->col1_814_heading_style = $col1_814_heading_style;
	$this->col1_1417_heading_style = $col1_1417_heading_style;
	$this->last_column_style = $last_column_style;
        $this->fcol_hor_title = $fcol_hor_title;
        $this->fcol_ver_title = $fcol_ver_title;
        $this->fcol_big_title = $fcol_big_title;
        $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
        $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
        $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
        $this->mcol_body_text = $mcol_body_text;
        $this->rcol_body_text = $rcol_body_text;

	$this->image_arr_13  = $image_arr_13;
	$this->image_arr_67 = $image_arr_67;
	$this->image_arr_814 = $image_arr_814;
	$this->image_arr_1417 = $image_arr_1417;
	$this->last_column_img = $last_column_img;

	// Articles related to Commodities.
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	else $isSuperAdmin = 0;
        
        $this->article_limit = 25;
        $this->article_limit_right = 10;
        $this->secondLimit = 4;
        
        $pageno = $request->getParameter('pageno', 1);
        $offset = ($pageno-1)*$this->article_limit;
        $offsetright = ($pageno-1)*$this->article_limit_right;
        $this->pageno = $pageno;
        $this->nextpageno = $pageno+1;
        
	$two_column_articles = ArticleTable::getInstance()->getHomeBorstHome($offset,$this->article_limit,$isSuperAdmin);
	$last_column_articles = ArticleTable::getInstance()->getHomeBuySell($offsetright,$this->article_limit_right,$isSuperAdmin,$two_column_articles);
        //echo count($two_column_articles);

	$this->left_records = $two_column_articles;
        $this->last_column_articles = $last_column_articles;
        
        /* For random 8 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
        
    }
    
  /**
  * Executes View Services action
  *
  * @param sfRequest $request A request object
  */
  public function executeServices(sfWebRequest $request)
  {
      //echo 'Service page';
      $this->getUser()->setAttribute('parent_menu', 'services');
  }
  
  /**
  * Executes View Henry Boy action
  *
  * @param sfRequest $request A request object
  */
  public function executeHenryBoy(sfWebRequest $request)
  {
      //echo 'Henry Boy page';
  }
  
  /**
  * Executes View BT portfolio action
  *
  * @param sfRequest $request A request object
  */
  public function executePortfolio(sfWebRequest $request)
  {
      //echo 'Portfolio page';
  }
  
  /**
  * Executes View Automatic action
  *
  * @param sfRequest $request A request object
  */
  public function executeAutomatic(sfWebRequest $request)
  {
      //echo 'Automatic page';
  }
  
  /**
  * Executes View Trading account action
  *
  * @param sfRequest $request A request object
  */
  public function executeTradingAccount(sfWebRequest $request)
  {
      $this->getUser()->setAttribute('parent_menu', 'tradingaccount');
      //echo 'TradingAccount page';
  }
  
  /**
  * Executes View GFF Brokers action
  *
  * @param sfRequest $request A request object
  */
  public function executeGffBrokers(sfWebRequest $request)
  {
      //echo 'GFF Brokers page';
  }
  
  /**
  * Executes View Ava Trade action
  *
  * @param sfRequest $request A request object
  */
  public function executeAvaTrade(sfWebRequest $request)
  {
      //echo 'Ava Trade page';
  }
        
}

    
