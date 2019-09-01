<?php

/**
 * sbt actions.
 *
 * @package    sisterbt
 * @subpackage sbt
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sbtActions extends sfActions
{
	/**
	* 
	* Executes Before Every Action
	*/
	public function preExecute() 
	{
	 	$user = $this->getUser();
		$host_str = $this->getRequest()->getHost();
		$actionName  = $this->getActionName();
		
		$ajax_called_action_names_arr = array('getBlogListData','getUserListData','sbtMinProfileMessage','getSbtMinProfile','sbtMinProfileFriends','sbtMinProfileBlogPost','sbtMinProfileAllArticle','sbtMinProfileMeddelanden','sbtMinProfileMyAccount','sbtMinProfileMySubscription','fetchRecentBlogComment','getBlogTopListData','getAnalysisTopListData','getUserTopListData','getArticleTopListData');
		
		if(!in_array($actionName, $ajax_called_action_names_arr))
		{
			$stdlib = new stdlib();
			$wantsurl = $stdlib->accessed_url();
			$this->getUser()->setAttribute('wantsurl',$wantsurl);
		}
		
		$this->getUser()->setAttribute('third_menu', '');
        $this->userId = $this->getUser()->getAttribute('user_id', '', 'userProperty');
 		$action_names_arr = array('sbtMinProfile','sbtAddAnalysisBlog','sbtUserProfile','sbtMinProfileMessage','sbtMinProfileFriends','sbtMinProfileBlogPost','sbtMinProfileAllArticle','sbtMinProfileMeddelanden','sbtMinProfileMyAccount','sbtMinProfileForumPost','sbtMinProfileAllPost','viewAllRequest','editAnalysis','commentOnArticle','uploadUserProfileImage');
		$actionName  = $this->getActionName();
		
		$showdata = 0;
		
		if(in_array($actionName, $action_names_arr))
		{
			if ($user->isAuthenticated())
			{
				$this->edit_mode = 0;
			}
			else
			{
				$this->redirect('user/loginWindow');		
			}
		}

		if($actionName=='editProfile')
		{
			if ($user->isAuthenticated())
			{
				$edit_user_id = $this->getRequestParameter('edit_user_id');
				$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
				$this->edit_mode = 1;
				if($edit_user_id != $user_id)
				{
					$this->redirect('@homepage');	
				}
			}
			else
			{
				$this->redirect('user/loginWindow');		
			}		
		}
		
		if($actionName=='showListOfUserBlog')
		{
			if((!$this->getRequestParameter('uid')) && (!$user->isAuthenticated()))
			{
				$this->redirect('user/loginWindow');		
			}
		}
		
		
		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	    else $isSuperAdmin = 0;	
		
		
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		$id = $this->getRequestParameter('id');
		$this->show_top_links = $id == $this->logged_user ? 1 : ($actionName=='sbtUserProfile' ? 1 : 0);
		$this->host_str = $this->getRequest()->getHost();
		
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
    //$this->forward('default', 'module');
  }
 
 /**
  * Executes SbtHome action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtHome(sfWebRequest $request)
  { 
      isicsBreadcrumbs::getInstance()->addItem('Add Analysis', 'sbt/sbtHome');

	  $this->metatags_title = 'Welcome to Syster Bt';
	  $this->metatags_desc = 'Welcome to Syster Bt Description';
	  $this->metatags_keywords = 'Welcome to Syster Bt Keywords';
	  
	  $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
          $this->getUser()->setAttribute('parent_menu_common', '7');
	  $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_home');
	  $this->getUser()->setAttribute('third_menu', '');
	  
	  $this->host_str = $this->getRequest()->getHost();
		 
	  // Collecting Category, Type and Object.
	  $cat_arr = $type_arr = $object_arr = array();
	  $this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
		
	  $col1_13_heading_style_start = array('<h3 class="articleheading">','<h4 class="articleheading_varldens">','<h4 class="articleheading2"><b>');
	  $col1_13_heading_style_end = array('</h3>','</h4>','</b></h4>');
	  $col1_45_div_style = array('redheaing_sbt','blackheaing');
	  $col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
	  //$col1_814_heading_style = array('articleheading3_1st','redheaing2sbt','articleheading3_2nd_sbt','articleheading_goda','articleheading3_1st','redheaing2sbt','articleheading3_2nd_sbt');
          $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	  $last_column_style = array('adheading','adheadinggreen','adheading_small','adheading_v','adheading','adheadinggreen','adheading_small','adheading_v');
	  
	  $col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
	  $image_arr_13 = array('articleleft_photo1.jpg','photo6.jpg','photo8.jpg');
	  $image_arr_67 = array('photo7.jpg','photo6.jpg');
	  $image_arr_814 = array('midadd.jpg','photo9.jpg','photo10.jpg','photo11.jpg','midadd.jpg','photo9.jpg','photo11.jpg');
	  $image_arr_1417 = array('photo1.jpg','photo2.jpg','photo3.jpg','photo4.jpg');
		
	  $cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
	  $type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
	  $object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
          
          $fcol_hor_title = array('home_heading_l_3','home_heading_l_2');
          $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
          $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
          $fcol_body_text_6_7 = array('home_body_l_1','home_body_l_2');
          $fcol_body_text_2_3 = array('home_body_l_2','home_body_l_1');
          $fcol_body_text_1_4_5 = array('home_body_l_1','home_body_l_2','home_body_l_1');
          $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
          $rcol_body_text = array('home_body_r_2','home_body_r_1');
          
            
          
          $this->fcol_hor_title = $fcol_hor_title;
          $this->fcol_ver_title = $fcol_ver_title;
          $this->fcol_big_title = $fcol_big_title;
          $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
          $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
          $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
          $this->mcol_body_text = $mcol_body_text;
          $this->rcol_body_text = $rcol_body_text;
		
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
		
	  // Articles related to Commodities.
	  if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	  else $isSuperAdmin = 0;	
		
	  /*$this->comm_one_three = SbtAnalysisTable::getInstance()->getHomeSbtHome(0,3);
	  $this->comm_four_five = SbtAnalysisTable::getInstance()->getHomeSbtHome(3,2);
	  $this->comm_six_seven = SbtAnalysisTable::getInstance()->getHomeSbtHome(5,2);
	  $this->comm_eight_fourteen = SbtAnalysisTable::getInstance()->getHomeSbtHome(7,7);
	  $this->comm_fifteen_eighteen = SbtAnalysisTable::getInstance()->getHomeSbtHome(14,4);*/
	  $this->article_limit = 148;
	  $two_column_articles = SbtAnalysisTable::getInstance()->getHomeSbtHome(0,$this->article_limit);
	$last_column_articles = SbtAnalysisTable::getInstance()->getHomeSbtHome(27,8);
        $this->left_records = $two_column_articles;
	//print_r($this->left_records); die;
        
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
			$one_2_three[$i]['created_at'] = $data->created_at;
			$one_2_three[$i]['id'] = $data->id;
			$one_2_three[$i]['analysis_category_id'] = $data->analysis_category_id;
			$one_2_three[$i]['analysis_type_id'] = $data->analysis_type_id;
			$one_2_three[$i]['image_text'] = $data->image_text;
			$one_2_three[$i]['image'] = $data->image;
			$one_2_three[$i]['analysis_title'] = $data->analysis_title;
			$i++;
		}
		if(in_array($index, $arr_2)) 
		{
			$four_2_five[$j]['created_at'] = $data->created_at;
			$four_2_five[$j]['id'] = $data->id;
			$four_2_five[$j]['analysis_category_id'] = $data->analysis_category_id;
			$four_2_five[$j]['analysis_type_id'] = $data->analysis_type_id;
			$four_2_five[$j]['image_text'] = $data->image_text;
			$four_2_five[$j]['image'] = $data->image;
			$four_2_five[$j]['analysis_title'] = $data->analysis_title;
			$j++;		
		}
		if(in_array($index, $arr_3)) 
		{
			$six_2_eight[$k]['created_at'] = $data->created_at;
			$six_2_eight[$k]['id'] = $data->id;
			$six_2_eight[$k]['analysis_category_id'] = $data->analysis_category_id;
			$six_2_eight[$k]['analysis_type_id'] = $data->analysis_type_id;
			$six_2_eight[$k]['image_text'] = $data->image_text;
			$six_2_eight[$k]['image'] = $data->image;
			$six_2_eight[$k]['analysis_title'] = $data->analysis_title;
			$k++;				
		}
		if(in_array($index, $arr_4)) 
		{
			$nine_2_ten[$l]['created_at'] = $data->created_at;
			$nine_2_ten[$l]['id'] = $data->id;
			$nine_2_ten[$l]['analysis_category_id'] = $data->analysis_category_id;
			$nine_2_ten[$l]['analysis_type_id'] = $data->analysis_type_id;
			$nine_2_ten[$l]['image_text'] = $data->image_text;
			$nine_2_ten[$l]['image'] = $data->image;
			$nine_2_ten[$l]['analysis_title'] = $data->analysis_title;
			$l++;				
		}
		if(in_array($index, $arr_5)) 
		{
			$eleven_2_thirteen[$m]['created_at'] = $data->created_at;
			$eleven_2_thirteen[$m]['id'] = $data->id;
			$eleven_2_thirteen[$m]['analysis_category_id'] = $data->analysis_category_id;
			$eleven_2_thirteen[$m]['analysis_type_id'] = $data->analysis_type_id;
			$eleven_2_thirteen[$m]['image_text'] = $data->image_text;
			$eleven_2_thirteen[$m]['image'] = $data->image;
			$eleven_2_thirteen[$m]['analysis_title'] = $data->analysis_title;
			$m++;				
		}
		if(in_array($index, $arr_6)) 
		{
			$fourteen_2_fifteen[$n]['created_at'] = $data->created_at;
			$fourteen_2_fifteen[$n]['id'] = $data->id;
			$fourteen_2_fifteen[$n]['analysis_category_id'] = $data->analysis_category_id;
			$fourteen_2_fifteen[$n]['analysis_type_id'] = $data->analysis_type_id;
			$fourteen_2_fifteen[$n]['image_text'] = $data->image_text;
			$fourteen_2_fifteen[$n]['image'] = $data->image;
			$fourteen_2_fifteen[$n]['analysis_title'] = $data->analysis_title;
			$n++;				
		}
		if(in_array($index, $arr_7)) 
		{
			$sixteen_2_nineteen[$p]['created_at'] = $data->created_at;
			$sixteen_2_nineteen[$p]['id'] = $data->id;
			$sixteen_2_nineteen[$p]['analysis_category_id'] = $data->analysis_category_id;
			$sixteen_2_nineteen[$p]['analysis_type_id'] = $data->analysis_type_id;
			$sixteen_2_nineteen[$p]['image_text'] = $data->image_text;
			$sixteen_2_nineteen[$p]['image'] = $data->image;
			$sixteen_2_nineteen[$p]['analysis_title'] = $data->analysis_title;
			$p++;						
		}
		if(in_array($index, $arr_8)) 
		{
			$twenty_2_twentythree[$q]['created_at'] = $data->created_at;
			$twenty_2_twentythree[$q]['id'] = $data->id;
			$twenty_2_twentythree[$q]['analysis_category_id'] = $data->analysis_category_id;
			$twenty_2_twentythree[$q]['analysis_type_id'] = $data->analysis_type_id;
			$twenty_2_twentythree[$q]['image_text'] = $data->image_text;
			$twenty_2_twentythree[$q]['image'] = $data->image;
			$twenty_2_twentythree[$q]['analysis_title'] = $data->analysis_title;
			$q++;						
		}
		if(in_array($index, $arr_9)) 
		{
			$twentyfour_2_twentyseven[$r]['created_at'] = $data->created_at;
			$twentyfour_2_twentyseven[$r]['id'] = $data->id;
			$twentyfour_2_twentyseven[$r]['analysis_category_id'] = $data->analysis_category_id;
			$twentyfour_2_twentyseven[$r]['analysis_type_id'] = $data->analysis_type_id;
			$twentyfour_2_twentyseven[$r]['image_text'] = $data->image_text;
			$twentyfour_2_twentyseven[$r]['image'] = $data->image;
			$twentyfour_2_twentyseven[$r]['analysis_title'] = $data->analysis_title;
			$r++;						
		}
		
		$index++;
	}
	
	foreach($last_column_articles as $data)
	{
		$twentyeight_2_thirtyfive[$s]['created_at'] = $data->created_at;
		$twentyeight_2_thirtyfive[$s]['id'] = $data->id;
		$twentyeight_2_thirtyfive[$s]['analysis_category_id'] = $data->analysis_category_id;
		$twentyeight_2_thirtyfive[$s]['analysis_type_id'] = $data->analysis_type_id;
		$twentyeight_2_thirtyfive[$s]['image_text'] = $data->image_text;
		$twentyeight_2_thirtyfive[$s]['image'] = $data->image;
		$twentyeight_2_thirtyfive[$s]['analysis_title'] = $data->analysis_title;
		$s++;		
	}
	
	//$this->comment_cnt = new BorstArticleComment();
	
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
		
	  $this->comment_cnt = new SbtAnalysisComment();
	  $this->mymarket = new mymarket(); 
          
        $btshop_article = new BtShopArticle();
        
        $this->metastock_data = $btshop_article->getPublishedShopArticle();
  } 
  
  
  /**
  * Executes SbtBlog action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtBlog(sfWebRequest $request)
  {
	 isicsBreadcrumbs::getInstance()->addItem('Sister BT Blog', 'sbt/sbtBlog');
	 
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_blog');
         $this->getUser()->setAttribute('parent_menu_common', '5');
	 $this->host_str = $this->getRequest()->getHost();
	 $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');

	 $this->sbt_user_blog = new SbtUserBlog();
	 $this->profile_photo = new SbtUserprofilePhoto();
	 $mymarket = $this->mymarket_title = new mymarket();
	 $sbt_vote_detail = new SbtVoteDetails();
	 
	 $user_id_arr = $sbt_vote_detail->getTopThreeMostVotedBlogger(3);
	 $blog_id_arr = $this->sbt_user_blog->getLatestBlogId($user_id_arr);

	 $query = SbtUserBlogTable::getInstance()->getAllSbtBlogPostQuery();
		//print $query->getSqlQuery();exit;	
	 $this->pager = $mymarket->getPagerForAll('SbtUserBlog',5,$query,$request->getParameter('page', 1));
	 
	 $this->profile = new SfGuardUserProfile();
	 
	 $cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
	 $type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
	 $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
		
	 foreach($type_data as $type)	{	$type_arr[$type->type_id] = $type->type_name;		}
	 foreach($object_data as $obj)	
	 {	
	 	$object_arr[$obj->object_id] = $obj->object_name; 
	 	$object_country_arr[$obj->object_id] = $obj->object_country;		
	 } 
	 
	 $this->ext = '';
	 $this->cat_arr = $cat_arr;
	 $this->sbt_blog_comment = new SbtBlogComment();
	 
	 //$this->top_three_blog = $this->sbt_user_blog->getTopVotedBlog(3);
	 $this->top_three_blog = $this->sbt_user_blog->getBlogInOrder($blog_id_arr);
  } 
  
  /**
  * Executes SbtBlogDetails action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtBlogDetails(sfWebRequest $request)
  {
         $private_key = sfConfig::get('app_recaptcha_private_key');
         $this->public_key = sfConfig::get('app_recaptcha_public_key');
	 isicsBreadcrumbs::getInstance()->addItem('Sister BT Blog', 'sbt/sbtBlog');
	 if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $this->isSuperAdmin = 1;
     else
     $this->isSuperAdmin=0;
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_blog');
	 $this->host_str = $this->getRequest()->getHost();
	 $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	 $mymarket = $this->mymarket_title = new mymarket();
	 $favorite = new SbtFavorite();
	 $blogCommentForm_arr = $this->data_arr = $this->visitor_name_id_arr = $param = $this->user_photo_arr = $fav_data = array();
	 $ext = '';
	 
	 $blog_id = $this->getRequestParameter('blog_id');
	 
	 $param['blog_id'] = $blog_id;
	 $ext = http_build_query($param);
	 $search_arr = array("&", "=");
	 $ext = str_replace($search_arr, "/", $ext);
	 
	 $blog = new SbtUserBlog();
	 $this->one_blog = $blog->getSelectedBlog($blog_id);
	 
	 if($this->one_blog->id=='') $this->redirect('sbt/sbtBlog');
	 
	 if($this->logged_user == $this->one_blog->author_id) $this->own_blog = 1;
	 else $this->own_blog = 0;
	 
	 $blog->IncrementBlogViewCount($blog_id);
	 $query = SbtBlogCommentTable::getInstance()->fetchBlogCommentsQuery($blog_id);
	 $this->pager = $mymarket->getPagerForAll('SbtBlogComment','25',$query,$request->getParameter('page', 1));
	 
	 $this->blogCommentForm = new SbtBlogCommentForm();
	 $this->blogCommentForm->setDefault('blog_id',$blog_id);
	 $this->blogCommentForm->setDefault('comment_by',$this->logged_user);
	 $this->blogCommentForm->setDefault('created_at',date('Y-m-d H:i:s'));
	 $this->blogCommentForm->setDefault('followup_by_mail',0);
	 
	 $userProfileImage = new SbtUserprofilePhoto(); 
	 $this->user_photo_data = $userProfileImage->searchForRecord($this->one_blog->author_id);
	 $photo_data = $userProfileImage->fetchAllPhotoRecord();
	 for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; }
	 
	 $sbtUserBlogProfile = new SbtUserBlogProfile();
	 $this->blog_profile_details = $sbtUserBlogProfile->searchForPreviousRecord($this->one_blog->author_id);
	 
	 if ($request->isMethod('post'))	 
	 {
	 	$blogCommentForm_arr = $request->getParameter($this->blogCommentForm->getName());
		$blogCommentForm_arr['created_at'] = date('Y-m-d H:i:s');
		$blog_id = $blogCommentForm_arr['blog_id'];
		$this->blogCommentForm->bind($blogCommentForm_arr);
                $captcha = $this->getRequestParameter('g-recaptcha-response');  
                $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$private_key."&response=".$captcha."&remoteip=".$host_str), true);
		if($this->blogCommentForm->isValid() && $response["success"] == true)
		{ 
			$id = $this->blogCommentForm->save();
			$url = 'http://'.$this->host_str.'/sbt/sbtBlogDetails/blog_id/'.$blog_id;
			$this->redirect($url);		
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
			//echo $this->blogCommentForm->getErrorSchema();
		}
	 }
	 
	 $this->profile = new SfGuardUserProfile();
	 if($this->one_blog)
	 {
	 	$this->user_details = $this->profile->getUserData($this->one_blog->author_id);
		$this->data_arr['user_blog_count'] = $this->profile->getUserBlogCount($this->user_details->user_id);
	    $this->data_arr['user_forum_count'] = $this->profile->getUserForumCount($this->user_details->firstname.' '.$this->user_details->lastname);
		
		$medal_detail = new SbtAuthorMedalDetails();
		$this->gold_cnt = $medal_detail->getUserAwardTypeCount($this->one_blog->author_id,'1');
		$this->silver_cnt = $medal_detail->getUserAwardTypeCount($this->one_blog->author_id,'2');
		$this->bronze_cnt = $medal_detail->getUserAwardTypeCount($this->one_blog->author_id,'3');
		
		$this->user_guard_data = $this->profile->fetchOneUser($this->one_blog->author_id);
		$this->own_profile = $this->user_details->user_id == $this->logged_user ? 1 : 0;
		
		$fav_data[0] = 'blog';
		$fav_data[1] = $blog_id;
		$fav_data[2] = $this->logged_user;
		$this->is_notified = $favorite->getFavNotificationStatus($fav_data);
	 }
	 
	 $sbtRecentVisitor = new SbtRecentVisitor();
	 $this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($this->user_details->user_id);
	 
	 $vote_details = new SbtBlogVoteDetails();
	 $this->rec_present = $vote_details->findVoteDetails(2,$this->one_blog->id,$this->logged_user);
	 $this->total_vote_cnt = $this->one_blog->ublog_votes;
	 $this->no_of_stars = $vote_details->getStarForBlog($this->one_blog->id);
	 
	 $user = $this->getUser();
	 if($user->isAuthenticated()) $this->valid_user = 1;
	 else $this->valid_user = 0;
	 
	 $this->user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	 $favorite = new SbtFavorite();
	 $fav_data = $favorite->isAddedInFavoriteList('blog',$this->one_blog->id,$this->user_id);
	 if($fav_data)
	 {
	 	if($fav_data->id!='')  $this->add_in_fav_list = 1;
		else  $this->add_in_fav_list = 0;  
	 }
	 else $this->add_in_fav_list = 0; 
	
	 $this->ext = $ext;
	 $this->blog_id = $blog_id;
	 $this->comment_by = $this->logged_user;
        
  } 
  
	/**
	* 
	* This function posts comment of a perticular article and get all previous comments.
	* 
	*/
	public function executeShowOneBlog(sfWebRequest $request)
	{
		$blog_id = $request->getParameter('blog_id');
		$this->user_photo_arr = array();
		$mymarket = $this->mymarket_title = new mymarket();
		$this->profile = new SfGuardUserProfile();
		$blog = new SbtUserBlog();
	 	$this->one_blog = $blog->getSelectedBlog($blog_id);
		
		$blog->IncrementBlogViewCount($blog_id);
		$query = SbtBlogCommentTable::getInstance()->fetchBlogCommentsQuery($blog_id);
		$this->pager = $mymarket->getPagerForAll('SbtBlogComment','25',$query,$request->getParameter('page', 1));
		 
		$this->blogCommentForm = new SbtBlogCommentForm();
		$this->blogCommentForm->setDefault('blog_id',$blog_id);
		$this->blogCommentForm->setDefault('comment_by',$this->logged_user);
		$this->blogCommentForm->setDefault('created_at',date('Y-m-d H:i:s'));
		$this->blogCommentForm->setDefault('followup_by_mail',0);
		 
		$userProfileImage = new SbtUserprofilePhoto(); 
		$this->user_photo_data = $userProfileImage->searchForRecord($this->one_blog->author_id);
		$photo_data = $userProfileImage->fetchAllPhotoRecord();
		for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; }
		
		$user = $this->getUser();
		if($user->isAuthenticated()) $this->valid_user = 1;
		else $this->valid_user = 0;
		
		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $this->isSuperAdmin = 1;
     	else  $this->isSuperAdmin=0;

		$this->user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	 	$favorite = new SbtFavorite();
	 	$fav_data = $favorite->isAddedInFavoriteList('blog',$this->one_blog->id,$this->user_id);
	 	if($fav_data)
	 	{
	 		if($fav_data->id!='')  $this->add_in_fav_list = 1;
			else  $this->add_in_fav_list = 0;  
	 	}
	 	else $this->add_in_fav_list = 0; 
	
	 	$this->blog_id = $blog_id;
	 	$this->comment_by = $this->logged_user;
	}  
  
	/**
	* 
	* This function posts comment of a perticular article and get all previous comments.
	* 
	*/
	public function executePostCommentOnBlog(sfWebRequest $request)
	{
		$blog_id = $request->getParameter('blog_id');
		$comment_by = $request->getParameter('comment_by');
		$to_save = $request->getParameter('to_save');
		$mymarket = new mymarket();
		$this->profile = new SfGuardUserProfile();
		$favorite = new SbtFavorite();
		$this->user_photo_arr = $fav_data = array();
		
		$blog = new SbtUserBlog();
	 	$one_blog = $blog->getSelectedBlog($blog_id);
		
		$this->blogCommentForm = new SbtBlogCommentForm();
	 	$this->blogCommentForm->setDefault('blog_id',$blog_id);
	 	$this->blogCommentForm->setDefault('comment_by',$comment_by);
	 	$this->blogCommentForm->setDefault('created_at',date('Y-m-d H:i:s'));
	 	$this->blogCommentForm->setDefault('followup_by_mail',0);
                $user = $this->getUser();
		if ($request->isMethod('post') && $user->isAuthenticated())
		{ 
			$blogCommentForm_arr = $request->getParameter($this->blogCommentForm->getName());
			$blog_id = $blogCommentForm_arr['blog_id'];
			$blogCommentForm_arr['created_at'] = date('Y-m-d H:i:s');
			
			$fav_data[0] = 'blog';
			$fav_data[1] = $blog_id;
			$fav_data[2] = $comment_by;
			$fav_data[3] = 1;
			$blog_name = $one_blog ? $one_blog->ublog_title : '';
			
			if($blogCommentForm_arr['followup_by_mail'] == 1)
			{
				$is_notified = $favorite->getFavNotificationStatus($fav_data);
				if($is_notified > 1) $favorite->addToFavorite($fav_data,$blog_name);
				if(!$is_notified || $is_notified == 0) $favorite->updateFavNotificationStatus($fav_data,1); 
			}
			else
			{
				$is_notified = $favorite->getFavNotificationStatus($fav_data);
				if($is_notified == 1) $favorite->updateFavNotificationStatus($fav_data,0); 
			}
			
			$this->blogCommentForm->bind($blogCommentForm_arr);
			if($this->blogCommentForm->isValid())
			{ 
				$id = $this->blogCommentForm->save();
				$this->getUser()->setAttribute('fav_notification','blog_'.$blog_id.'_'.$one_blog->ublog_title);
			}
			else
			{
				//echo $this->blogCommentForm->getErrorSchema();
			}
		} 
		
		$query = SbtBlogCommentTable::getInstance()->fetchBlogCommentsQuery($blog_id);
		$this->pager = $mymarket->getPagerForAll('SbtBlogComment','25',$query,$request->getParameter('page', 1));
		
		$userProfileImage = new SbtUserprofilePhoto(); 
	 	$photo_data = $userProfileImage->fetchAllPhotoRecord();
	 	for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; }
	}
	
  /**
  * Executes ShowAllBlogPostOfUser action
  *
  * @param sfRequest $request A request object
  */
  public function executeShowAllBlogPostOfUser(sfWebRequest $request)
  {
  	$mymarket = $this->mymarket_title = new mymarket();
	$blog = new SbtUserBlog();
	$this->sbtBlogComment = new SbtBlogComment();
	$this->vote_details = new SbtBlogVoteDetails();
	$this->profile = new SfGuardUserProfile();
	$this->host_str = $this->getRequest()->getHost();
	$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $this->isSuperAdmin = 1;
    else
        $this->isSuperAdmin=0;
	
    $this->user_photo_arr = array();
	 
	$user = $this->getUser();
	if($user->isAuthenticated()) $this->valid_user = 1;
	else $this->valid_user = 0; 
	
	$this->user_id = $request->getParameter('user_id');
	
	$userProfileImage = new SbtUserprofilePhoto(); 
	$this->user_photo_data = $userProfileImage->searchForRecord($this->user_id);
	$photo_data = $userProfileImage->fetchAllPhotoRecord();
	for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; }
	
	
	$all_post_query = $blog->getAllBlogPostOfUserQuery($this->user_id);
	$this->all_blog_post_pager = $mymarket->getPagerForAll('SbtUserBlog','10',$all_post_query,$request->getParameter('page', 1));
	
	$this->blogCommentForm = new SbtBlogCommentForm();
	$this->blogCommentForm->setDefault('comment_by',$this->logged_user);
	$this->blogCommentForm->setDefault('created_at',date('Y-m-d H:i:s'));
	$this->blogCommentForm->setDefault('followup_by_mail',0);
	
	//$query = SbtBlogCommentTable::getInstance()->fetchBlogCommentsQuery($blog_id);
	//$this->pager = $mymarket->getPagerForAll('SbtBlogComment','25',$query,$request->getParameter('page', 1));
  }

   /**
	* 
	* This function posts comment of a perticular blog and get all previous comments.
	* 
	*/
	public function executeFetchAndPostCommentOnBlog(sfWebRequest $request)
	{
		$blog_id = $request->getParameter('blog_id');
		$comment_by = $request->getParameter('user_id');
		$to_save = $request->getParameter('to_save');
		$page = $request->getParameter('page');
		$mymarket = new mymarket();
		$this->profile = new SfGuardUserProfile();
		$this->user_photo_arr = array();
		
		$this->blogCommentForm = new SbtBlogCommentForm();
	 	$this->blogCommentForm->setDefault('comment_by',$comment_by);
	 	$this->blogCommentForm->setDefault('created_at',date('Y-m-d H:i:s'));
	 	$this->blogCommentForm->setDefault('followup_by_mail',0);
                if ($request->isMethod('post') && $this->getUser()->isAuthenticated())
		{ 
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$blogCommentForm_arr = $request->getParameter($this->blogCommentForm->getName());
			$blogCommentForm_arr['blog_id'] = $arr['blog_id'];
			
			$blog_id = $arr['blog_id'];
			$this->blogCommentForm->bind($blogCommentForm_arr);
			if($this->blogCommentForm->isValid())
			{ 
				$id = $this->blogCommentForm->save();
			}
			else
			{
				//echo $this->blogCommentForm->getErrorSchema();
			}
		} 
		
		$query = SbtBlogCommentTable::getInstance()->fetchBlogCommentsQuery($blog_id);
		$this->pager = $mymarket->getPagerForAll('SbtBlogComment','10',$query,$request->getParameter('page', 1));
		
		$userProfileImage = new SbtUserprofilePhoto(); 
	 	$photo_data = $userProfileImage->fetchAllPhotoRecord();
	 	for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; }
		$this->blog_id = $blog_id;
	}
	
   /**
	* 
	* This function recent comments on a perticular blog.
	* 
	*/
	public function executeFetchRecentBlogComment(sfWebRequest $request)
	{
		$this->user_photo_arr = array();
		$mymarket = new mymarket();
		$this->profile = new SfGuardUserProfile();
		
		$blog_id = $request->getParameter('blog_id');
		$this->comment_list = SbtBlogCommentTable::getInstance()->fetchFiveRecentBlogComments($blog_id);
		
		$userProfileImage = new SbtUserprofilePhoto(); 
		$this->user_photo_data = $userProfileImage->searchForRecord($this->one_blog->author_id);
		$photo_data = $userProfileImage->fetchAllPhotoRecord();
		for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; }
	}
  
  /**
  * Executes SbtBlogsOfUser action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtBlogsOfUser(sfWebRequest $request)
  {
	 isicsBreadcrumbs::getInstance()->addItem('Sister BT Blog', 'sbt/sbtBlogsOfUser');
	 
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_blog');
	 $this->host_str = $this->getRequest()->getHost();
	 $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	 
	 $this->blog_one_five = SbtUserBlogTable::getInstance()->getSbtBlogPost(0,4);
  } 
  
 /**
  * Executes ShowListOfUserBlog action
  *
  * @param sfRequest $request A request object
  */
  public function executeShowListOfUserBlog(sfWebRequest $request)
  {
	 isicsBreadcrumbs::getInstance()->addItem('Sister BT Blog', 'sbt/sbtBlog');
	 
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 
	 if($request->getParameter('uid'))
	 {
	 	if($this->logged_user == $request->getParameter('uid')) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minblogg');	
		else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_blog');
	 }
	 else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minblogg');
	 
	 
	 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	 
	 $mymarket = new mymarket();
	 $blog = new SbtUserBlog();
	 $this->sbtBlogComment = new SbtBlogComment();
	 $this->vote_details = new SbtBlogVoteDetails();
	 $this->profile = new SfGuardUserProfile();
	 $this->host_str = $this->getRequest()->getHost();
	 $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	 
	 if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $this->isSuperAdmin = 1;
     else $this->isSuperAdmin=0;
	
     $this->user_photo_arr = array();
	 
	 $user = $this->getUser();
	 if($user->isAuthenticated()) $this->valid_user = 1;
	 else $this->valid_user = 0; 
	
	 $this->user_id = $request->getParameter('uid');
	 if(!$this->user_id) $this->user_id = $this->logged_user;
	 
	 if($this->logged_user == $this->user_id) $this->own_blog = 1;
	 else $this->own_blog = 0;
	
	 $all_post_query = $blog->getAllBlogPostOfUserQuery($this->user_id);
	 $this->all_blog_post_pager = $mymarket->getPagerForAll('SbtUserBlog','10',$all_post_query,$request->getParameter('page', 1));
	
	 $this->blogCommentForm = new SbtBlogCommentForm();
	 $this->blogCommentForm->setDefault('comment_by',$this->logged_user);
	 $this->blogCommentForm->setDefault('created_at',date('Y-m-d H:i:s'));
	 $this->blogCommentForm->setDefault('followup_by_mail',0);
	 
	 // For right panel
	 if($this->user_id)
	 {
		 $this->user_details = $this->profile->getUserData($this->user_id);
		 $this->data_arr['user_blog_count'] = $this->profile->getUserBlogCount($this->user_details->user_id);
		 $this->data_arr['user_forum_count'] = $this->profile->getUserForumCount($this->user_details->firstname.' '.$this->user_details->lastname);
		 
		 $sbtRecentVisitor = new SbtRecentVisitor();
		 $this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($this->user_details->user_id);
		 
		 $this->profile = new SfGuardUserProfile();
		 
		 $medal_detail = new SbtAuthorMedalDetails();
		 $this->gold_cnt = $medal_detail->getUserAwardTypeCount($this->user_id,'1');
		 $this->silver_cnt = $medal_detail->getUserAwardTypeCount($this->user_id,'2');
		 $this->bronze_cnt = $medal_detail->getUserAwardTypeCount($this->user_id,'3');
		 
		 $this->user_guard_data = $this->profile->fetchOneUser($this->user_id);
		 $this->own_profile = $this->user_details->user_id == $this->logged_user ? 1 : 0; 
		 
		 $userProfileImage = new SbtUserprofilePhoto(); 
		 $this->user_photo_data = $userProfileImage->searchForRecord($this->user_id);
		 $photo_data = $userProfileImage->fetchAllPhotoRecord();
		 for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; }
		 
		 $sbtUserBlogProfile = new SbtUserBlogProfile();
	 	 $this->blog_profile_details = $sbtUserBlogProfile->searchForPreviousRecord($this->user_id);
	 }	
	
  } 
  
  /**
  * Executes SbtTopLister action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtTopLister(sfWebRequest $request)
  {
 	isicsBreadcrumbs::getInstance()->addItem('Sister BT TopLister', 'sbt/sbtTopLister');
	
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_toplistor');
	
	$this->user_photo_arr = array();
	
	$this->profile = new SfGuardUserProfile();
//	$sbtAnalysisCount = new SbtAnalysisCount();
	$analysis = new SbtAnalysis();
	$analysisVote = new SbtVoteDetails();
	$articleCount = new ArticleCount();
	$article = new Article();
	$borstArticleComment = new BorstArticleComment();
	
	$sbt_user_blog = new SbtUserBlog();
 	
	/* For Top 5 most voted blog */
	$this->top_five_voted_blog = $sbt_user_blog->getTopVotedBlog(5);
	
	/* For Top 5 most viewed blog */
	$this->top_five_viewed_blog = $sbt_user_blog->getTopViewedBlog(5); 
	
	/* For Top 5 most viewed sbt article */
	$this->top_five_viewed_analysis = $analysis->getTopFiveMostViewedAnalysis();

	/* For Top 5 most voted sbt article */
	$this->top_five_voted_analysis = $analysis->getTopFiveMostVotedAnalysis();

	/* For Top 5 most viewed bt article */
	$this->id_article_cnt_array = $articleCount->getTopViewedArticleWithCnt(5);
	$article_id_array = $articleCount->getTopViewedArticle(5);
	$comma_separated_article_id = implode(",", $article_id_array);
	$this->top_five_viewed_articles = $article->getSelectedBtArticles($comma_separated_article_id);
	
	/* For Top 5 most commented bt article */
	$this->id_article_comment_array = $borstArticleComment->getTopCommentedArticleWithCnt(5);
	$btarticle_id_array = $borstArticleComment->getTopCommentedArticle(5);
	$comma_separated_bt_article_id = implode(",", $btarticle_id_array);
	$this->top_five_commented_analysis = $article->getSelectedBtArticles($comma_separated_bt_article_id);
	
	/* For Top 5 most voted users */
	$this->top_five_voted_user = $this->profile->getTopFiveMostVotedUser(5);
	
	//$this->top_five_voted_lastweek = $this->profile->getTopFiveMostVotedUserInLastWeek(5);
	$this->top_five_active_user = $this->profile->getTopFiveMostActiveUser(5);
	
	$userProfileImage = new SbtUserprofilePhoto(); 
	$photo_data = $userProfileImage->fetchAllPhotoRecord();
	for($i=0; $i<count($photo_data); $i++) { $this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; } 
	
	
  } 
  
   /**
   * Executes SbtTopListerBlogList action
   *
   * @param sfRequest $request A request object
   */
   public function executeSbtTopListerBlogList(sfWebRequest $request)
   {
 		isicsBreadcrumbs::getInstance()->addItem('Sister BT TopListerList', 'sbt/sbtTopListerBlogList');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_toplistor');
		
		$mymarket = new mymarket();
		$sbt_user_blog = new SbtUserBlog();
		$this->profile = new SfGuardUserProfile();
		
		$type = $request->getParameter('type');
		$query = SbtUserBlogTable::getInstance()->getAllTopBlogQuery($column_id,$order,$type);
	
		$this->type = $type;
		
		$this->pager = $mymarket->getPagerForAll('SbtUserBlog','20',$query,$request->getParameter('page', 1));	
   }
  
   /**
	* 
	* This function fetches the data for blog.
	* 
	*/
	public function executeGetBlogTopListData(sfWebRequest $request)
	{
		$this->host_str = $this->getRequest()->getHost();
		$mymarket = $this->mymarket_title = new mymarket();
		$this->profile = new SfGuardUserProfile();
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('blogtoplist_current_column','','userProperty');
		$page = $request->getParameter('page');
		$blogtoplist_current_column_order = $request->getParameter('blogtoplist_current_column_order');
		$set_column = 'blogtoplist_current_column';
		$set_column_order = 'blogtoplist_current_column_order';		
		
		$type = $request->getParameter('blog_view_type');
		$order = $this->profile->setSortingParameters($page,$blogtoplist_current_column_order,$column_id,$current_column,$set_column,$set_column_order);
		$query = SbtUserBlogTable::getInstance()->getAllTopBlogQuery($column_id,$order,$type);
		
	    $this->pager = $mymarket->getPagerForAll('SbtUserBlog',20,$query,$request->getParameter('page', 1));
		$this->type = $type;
		$this->current_column_order = $order;
		$this->column_id = $column_id;
	} 
	
    /**
    * Executes SbtTopListerAnalysisList action
    *
    * @param sfRequest $request A request object
    */
    public function executeSbtTopListerAnalysisList(sfWebRequest $request)
    {
 		isicsBreadcrumbs::getInstance()->addItem('Sister BT TopListerList', 'sbt/sbtTopListerAnalysisList');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_toplistor');
		
		$mymarket = new mymarket();
		$analysis = new SbtAnalysis();
		$this->profile = new SfGuardUserProfile();
		
		$type = $request->getParameter('type');
		$query = SbtAnalysisTable::getInstance()->getAllTopAnalysisQuery($column_id,$order,$type);
	
		$this->type = $type;
		
		$this->pager = $mymarket->getPagerForAll('SbtAnalysis','20',$query,$request->getParameter('page', 1));	
    }
  
    /**
	 * 
	 * This function fetches the data for analysis toplister page.
	 * 
	 */
	 public function executeGetAnalysisTopListData(sfWebRequest $request)
	 {
		$this->host_str = $this->getRequest()->getHost();
		$mymarket = $this->mymarket_title = new mymarket();
		$this->profile = new SfGuardUserProfile();
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('analysistoplist_current_column','','userProperty');
		$page = $request->getParameter('page');
		$analysistoplist_current_column_order = $request->getParameter('analysistoplist_current_column_order');
		$set_column = 'analysistoplist_current_column';
		$set_column_order = 'analysistoplist_current_column_order';		
		
		$type = $request->getParameter('analysis_view_type');
		$order = $this->profile->setSortingParameters($page,$analysistoplist_current_column_order,$column_id,$current_column,$set_column,$set_column_order);
		$query = SbtAnalysisTable::getInstance()->getAllTopAnalysisQuery($column_id,$order,$type);
		
	    $this->pager = $mymarket->getPagerForAll('SbtAnalysis',20,$query,$request->getParameter('page', 1));
		$this->type = $type;
		$this->current_column_order = $order;
		$this->column_id = $column_id;
	 } 
	
     /**
      * Executes SbtTopListerArticleList action
      *
      * @param sfRequest $request A request object
      */
  	  public function executeSbtTopListerArticleList(sfWebRequest $request)
  	  {
		isicsBreadcrumbs::getInstance()->addItem('Sister BT TopListerList', 'sbt/sbtTopListerBtArticleList');
		
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_toplistor');
		
		$mymarket = new mymarket();
		$analysis = new SbtAnalysis();
		$this->profile = new SfGuardUserProfile();
		$articleCount = new ArticleCount();
		$borstArticleComment = new BorstArticleComment();
		
		$type = $request->getParameter('type');
        
		$query = ArticleTable::getInstance()->getAllTopArticleQuery($column_id,$order,$type);
		$this->type = $type;
		$this->pager = $mymarket->getPagerForAll('Article','20',$query,$request->getParameter('page', 1));	
      }
	  
    /**
	 * 
	 * This function fetches the data for article toplister page.
	 * 
	 */
	 public function executeGetArticleTopListData(sfWebRequest $request)
	 {
		$this->host_str = $this->getRequest()->getHost();
		$mymarket = $this->mymarket_title = new mymarket();
		$this->profile = new SfGuardUserProfile();
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('articletoplist_current_column','','userProperty');
		$page = $request->getParameter('page');
		$articletoplist_current_column_order = $request->getParameter('articletoplist_current_column_order');
		$set_column = 'articletoplist_current_column';
		$set_column_order = 'articletoplist_current_column_order';		
		
		$type = $request->getParameter('article_view_type');
		$order = $this->profile->setSortingParameters($page,$articletoplist_current_column_order,$column_id,$current_column,$set_column,$set_column_order);
		$query = ArticleTable::getInstance()->getAllTopArticleQuery($column_id,$order,$type);
		
	    $this->pager = $mymarket->getPagerForAll('Article',20,$query,$request->getParameter('page', 1));
		$this->type = $type;
		$this->current_column_order = $order;
		$this->column_id = $column_id;
	 }
	 
     /**
      * Executes SbtTopListerUserList action
      *
      * @param sfRequest $request A request object
      */
  	  public function executeSbtTopListerUserList(sfWebRequest $request)
  	  {
		isicsBreadcrumbs::getInstance()->addItem('Sister BT TopListerList', 'sbt/sbtTopListerUserList');
		
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_toplistor');
		
		$mymarket = new mymarket();
		$this->profile = new SfGuardUserProfile();
		$this->user_photo_arr = array();
		
		$type = $request->getParameter('type');
        
		$query = $this->profile->getAllTopUserQuery($column_id,$order,$type);
		
		$this->top_five_voted_user = $this->profile->getTopFiveMostVotedUser(5);
	
		$this->top_five_voted_lastweek = $this->profile->getTopFiveMostVotedUserInLastWeek(5);
	
		$userProfileImage = new SbtUserprofilePhoto(); 
		$photo_data = $userProfileImage->fetchAllPhotoRecord();
		for($i=0; $i<count($photo_data); $i++) { $this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; } 
		
		$this->type = $type;
		$this->pager = $mymarket->getPagerForAll('SfGuardUserProfile','20',$query,$request->getParameter('page', 1));	
      } 
	  
    /**
	 * 
	 * This function fetches the data for user toplister page.
	 * 
	 */
	 public function executeGetUserTopListData(sfWebRequest $request)
	 {
		$this->host_str = $this->getRequest()->getHost();
		$mymarket = $this->mymarket_title = new mymarket();
		$this->profile = new SfGuardUserProfile();
		$this->user_photo_arr = array();
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('usertoplist_current_column','','userProperty');
		$page = $request->getParameter('page');
		$usertoplist_current_column_order = $request->getParameter('usertoplist_current_column_order');
		$set_column = 'usertoplist_current_column';
		$set_column_order = 'usertoplist_current_column_order';		
		
		$type = $request->getParameter('user_view_type');
		$order = $this->profile->setSortingParameters($page,$usertoplist_current_column_order,$column_id,$current_column,$set_column,$set_column_order);
		$query = $this->profile->getAllTopUserQuery($column_id,$order,$type);
		
	    $this->pager = $mymarket->getPagerForAll('SfGuardUserProfile',20,$query,$request->getParameter('page', 1));
		$this->type = $type;
		$this->current_column_order = $order;
		$this->column_id = $column_id;
		
		$userProfileImage = new SbtUserprofilePhoto(); 
		$photo_data = $userProfileImage->fetchAllPhotoRecord();
		for($i=0; $i<count($photo_data); $i++) { $this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; } 
	 }
  
  /**
  * Executes SbtUse action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtUser(sfWebRequest $request)
  {
 	isicsBreadcrumbs::getInstance()->addItem('Sister BT User', 'sbt/sbtUser');
	
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
	$this->host_str = $this->getRequest()->getHost();
	$this->user_arr = array();
	
	$query = SfGuardUserProfileTable::getInstance()->getAllUserQuery();
	
	 $this->pager = new sfDoctrinePager('SfGuardUserProfile', '25');
 	 $this->pager->setQuery($query);	
	 $this->pager->setPage($request->getParameter('page', 1));
	 $this->pager->init();
	 
	 $userProfileImage = new SbtUserprofilePhoto(); 
	 $data = $userProfileImage->fetchAllPhotoRecord();
	
	 for($i=0; $i<count($data); $i++) {	$this->user_arr[$data[$i]['user_id']] = $data[$i]['profile_photo_name']; } 
  }
  
  /**
  * Executes SbtMinProfile action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtMinProfile(sfWebRequest $request)
  {
 	isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfile');
	$profile = new SfGuardUserProfile();
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	
	if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
	else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
	
	$this->host_str = $this->getRequest()->getHost();
	$this->user_photo_arr = array();
	//$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	$this->type_investor_arr = array('trader'=>'Trejder','investor'=>'Investerare','gambler'=>'Gambler'); 
	$find_arr = array('stocks','commodities','currencies',',,');
	$replace_arr = array('Aktier,','Råvaror,','Valutor',',');
	$this->is_millionaire = array('milli_yes'=>'Stor','milli_not_yet'=>'Liten','milli_varies'=>'Lagom');
	$this->occupation_arr = array('student'=>'Student','employed'=>'Anställd','self_employed'=>'Egen företagare','between_jobs'=>'Mellan jobb','retired'=>'Pensionerad');


	$id = $this->getRequestParameter('id');
	$this->user_data = $profile->getUserData($id);
	
	if($this->getUser()->getAttribute('setUpdateMsg','','userProperty'))
	{
		$this->update_msg = 'Din profil har sparats framgångsrikt.';
		$this->getUser()->setAttribute('setUpdateMsg',0,'userProperty');
	}
	
	if($this->getUser()->getAttribute('send_activation_mail','','userProperty') == 1)
	{
		$this->update_msg = 'Din profil har uppdaterats och ett aktiveringsmejl har skickats till '.$this->user_data->email;
		$this->getUser()->setAttribute('send_activation_mail',0,'userProperty');
	}

	if($this->user_data->user_id==''){ $this->redirect('sbt/sbtUser'); }
	
	$medal_detail = new SbtAuthorMedalDetails();
	$this->gold_cnt = $medal_detail->getUserAwardTypeCount($id,'1');
	$this->silver_cnt = $medal_detail->getUserAwardTypeCount($id,'2');
	$this->bronze_cnt = $medal_detail->getUserAwardTypeCount($id,'3');
	
	$userProfileImage = new SbtUserprofilePhoto(); 
	$this->user_photo_data = $userProfileImage->searchForRecord($id);
	$photo_data = $userProfileImage->fetchAllPhotoRecord();
	for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; } 
	
	
	$messageForm_arr = $this->data_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
	$this->visitor_list = '';
	
	$this->messageForm = new SbtMessagesForm();
	$this->messageForm->setDefault('message_to',$id);
	$this->messageForm->setDefault('message_from',$this->logged_user);
	$this->messageForm->setDefault('created_at',date("Y-m-d H:i:s"));
	
	$this->friendRequestForm = new SbtFriendRequestForm();
	$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
	$this->friendRequestForm->setDefault('contactee_id',$id);
	$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
	$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
	
	 if ($request->isMethod('post'))	
	 { 
	 	$arr = $this->getRequest()->getParameterHolder()->getAll();

		if($arr['friend_request'])
		{
			$friendRequestForm_arr = $request->getParameter($this->friendRequestForm->getName());
			$id = $friendRequestForm_arr['contactee_id'];
	
			$this->friendRequestForm->bind($friendRequestForm_arr);
			if($this->friendRequestForm->isValid())
			{
				$response = $profile->updateFriendRequest($this->friendRequestForm);
				if(!$response)
				{
					$record = $this->friendRequestForm->save();
				}
			}
			else{ echo $this->friendRequestForm->getErrorSchema();}
		}
		
		if($arr['sbt_messages'])
		{
			$messageForm_arr = $request->getParameter($this->messageForm->getName());
			$id = $messageForm_arr['message_to'];
			
			$this->messageForm->bind($messageForm_arr);
			if($this->messageForm->isValid())
			{
				$record = $this->messageForm->save();
			}
			else{echo $this->messageForm->getErrorSchema();}
		}
	 }
	
	$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
	$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
	$this->last_message = SbtMessagesTable::getInstance()->getLastPostedMessage($id);
	
	if($this->user_details)
		$this->my_trade = str_replace($find_arr,$replace_arr,trim($this->user_details->my_trade));
	
	$this->user_profile = new SfGuardUserProfile();
	$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
	$this->data_arr['user_age'] = $profile->getUserAge($id);
	$this->user_guard_data = $profile->fetchOneUser($id);
	$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
	$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
	$this->own_profile = $id == $this->logged_user ? 1 : 0;

	//Check if clicked profile is one of friend's profile
	$this->isFriend = SfGuardUserProfile::chkForFriend($this->logged_user,$id);
        
	$showToFriend = 0;
	if(($this->isFriend == 'true' && $this->user_data->hide_profile == 2) || ($this->user_data->hide_profile == 0))
	{
		$showToFriend = 1;
	}
    
	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty') == 0 && (($this->user_data->hide_profile == 1 || $showToFriend == 0) && $this->own_profile == 0)){ $this->setTemplate('hiddenProfile'); }
	
	$sbtRecentVisitor = new SbtRecentVisitor();
	
	if($id!=$this->logged_user)
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
	
	$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);

	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $this->isSuperAdmin = 1;
	else $this->isSuperAdmin = 0;	
	
	$this->user_id = $id;
	$this->action = 'sbtMinProfile';
	$this->is_logged_in_user = $id == $this->logged_user ? 1 : 0;
	$all_friends = $profile->fetchAllFriend($id);

	foreach($all_friends as $friend)
	{ 
		if($friend->contactor_id == $id)
		{
			$this->friend_id[] = $friend->contactee_id;
			$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
		}
		if($friend->contactee_id == $id)
		{
			$this->friend_id[] = $friend->contactor_id;
			$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
		}
	}
  }
  
  /**
  * Executes SbtUserProfile action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtUserProfile(sfWebRequest $request)
  {
 	isicsBreadcrumbs::getInstance()->addItem('Sister BT User Profile', 'sbt/sbtUserProfile');
	
        $this->getUser()->setAttribute('parent_menu_common', '9');
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
        $this->getUser()->setAttribute('third_menu', 'sbtUserProfile');
	$this->host_str = $this->getRequest()->getHost();
	$this->user_photo_arr = array();
	$this->type_investor_arr = array('trader'=>'Trejder','investor'=>'Investerare','gambler'=>'Gambler'); 
	$find_arr = array('stocks','commodities','currencies',',,');
	$replace_arr = array('Aktier,','Råvaror,','Valutor',',');
	$this->is_millionaire = array('milli_yes'=>'Stor','milli_not_yet'=>'Liten','milli_varies'=>'Lagom');
	$this->occupation_arr = array('student'=>'Student','employed'=>'Anställd','self_employed'=>'Egen företagare','between_jobs'=>'Mellan jobb','retired'=>'Pensionerad');

	
	$medal_detail = new SbtAuthorMedalDetails();
	$this->gold_cnt = $medal_detail->getUserAwardTypeCount($this->logged_user,'1');
	$this->silver_cnt = $medal_detail->getUserAwardTypeCount($this->logged_user,'2');
	$this->bronze_cnt = $medal_detail->getUserAwardTypeCount($this->logged_user,'3');

        $this->articleCnt = SbtAnalysis::getCntPublishedArticles($this->getUser()->getGuardUser()->getId());
	
//	$id = $this->getRequestParameter('id');
        $this->take_to_profile = $this->getRequestParameter('take_to_profile') ? $this->getRequestParameter('take_to_profile') : 0;
	$id = $this->logged_user;
	
	$messageForm_arr = $this->data_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
	$this->visitor_list = '';
	
	$userProfileImage = new SbtUserprofilePhoto(); 
	$this->user_photo_data = $userProfileImage->searchForRecord($id);
	$photo_data = $userProfileImage->fetchAllPhotoRecord();
	for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; } 
	
	$this->messageForm = new SbtMessagesForm();
	$this->messageForm->setDefault('message_to',$id);
	$this->messageForm->setDefault('message_from',$this->logged_user);
	$this->messageForm->setDefault('created_at',date("Y-m-d H:i:s"));
	
	$this->friendRequestForm = new SbtFriendRequestForm();
	$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
	$this->friendRequestForm->setDefault('contactee_id',$id);
	$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
	$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
	
	 if ($request->isMethod('post'))	
	 { 
	 	$arr = $this->getRequest()->getParameterHolder()->getAll();

		if($arr['friend_request'])
		{
			$friendRequestForm_arr = $request->getParameter($this->friendRequestForm->getName());
			$id = $friendRequestForm_arr['contactee_id'];
	
			$this->friendRequestForm->bind($friendRequestForm_arr);
			if($this->friendRequestForm->isValid())
			{
				$record = $this->friendRequestForm->save();
			}
			else{echo $this->friendRequestForm->getErrorSchema();}
		}
		
		if($arr['sbt_messages'])
		{
			$messageForm_arr = $request->getParameter($this->messageForm->getName());
			$id = $messageForm_arr['message_to'];
			
			$this->messageForm->bind($messageForm_arr);
			if($this->messageForm->isValid())
			{
				$record = $this->messageForm->save();
			}
			else{echo $this->messageForm->getErrorSchema();}
		}
	 }
	
	$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
	$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
	$this->last_message = SbtMessagesTable::getInstance()->getLastPostedMessage($id);
	
	if($this->user_details)
		$this->my_trade = str_replace($find_arr,$replace_arr,trim($this->user_details->my_trade));
	
	$profile = new SfGuardUserProfile();
	$this->user_profile = new SfGuardUserProfile();
	$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
	$this->data_arr['user_age'] = $profile->getUserAge($id);
	$this->user_data = $profile->getUserData($id);
	$this->user_guard_data = $profile->fetchOneUser($id);
	$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
	$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
	$this->own_profile = 1;
	
	$sbtRecentVisitor = new SbtRecentVisitor();
	
	//if($id!=$this->logged_user)
		//$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
	
	$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);

	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $this->isSuperAdmin = 1;
	else $this->isSuperAdmin = 0;	
	
	$this->user_id = $id;
	$this->action = 'sbtMinProfile';
	$this->is_logged_in_user = $id == $this->logged_user ? 1 : 0;
	
	$all_friends = $profile->fetchAllFriend($id);

	foreach($all_friends as $friend)
	{ 
		if($friend->contactor_id == $id)
		{
			$this->friend_id[] = $friend->contactee_id;
			$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
		}
		if($friend->contactee_id == $id)
		{
			$this->friend_id[] = $friend->contactor_id;
			$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
		}
	}
  }  
  
  /**
  * Executes SbtAddAnalysis action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtAddAnalysis(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('Sister BT Add User Analysis / Blog', 'sbt/sbtAddAnalysisBlog');
	$this->host_str = $this->getRequest()->getHost();
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_addanalysis');
	$profile = new SfGuardUserProfile();
	$typeid = $this->getRequestParameter('typeid');
	
	$arrTag = array('1'=>'Tag1','2'=>'Tag2','3'=>'Tag3');
	$arrObject = array('1'=>'ob1','2'=>'ob2','3'=>'ob3','4'=>'ob4');
	
	$arrCategory = $arrType = $arrMarket = $arrStockList = $arrSector = $arrObject = array();
	
	$sbtCategory = Doctrine_Core::getTable('SbtArticleCategory')->findAll();
	$sbtType = Doctrine_Core::getTable('SbtArticleType')->findAll();
	$sbtMarket = Doctrine_Core::getTable('SbtMarket')->findAll();
	$sbtStockList = Doctrine_Core::getTable('SbtStockList')->findAll();
	$sbtSector = Doctrine_Core::getTable('SbtSector')->findAll();
	
	if($typeid)
	{
		$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.type_id = ?', $typeid);
		
		$sbtObject = $for_obj_cri->execute();
	}
	/*else
	{
		$sbtObject = Doctrine_Core::getTable('SbtObject')->findAll();
	}*/
	
	//$arrCategory[0] = '';
	$arrType[0] = '';
	
	foreach($sbtCategory as $cat) 		{   $arrCategory[$cat->id] = $cat->sbt_category_name;	}
	foreach($sbtType as $type) 	  		{  	$arrType[$type->id] = $type->type_name;	        }
	foreach($sbtMarket as $market)		{  	$arrMarket[$market->id] = $market->sbt_market_name;	            }
	foreach($sbtStockList as $stocklist){  	$arrStockList[$stocklist->id] = $stocklist->stock_name;	        }
	foreach($sbtSector as $sector)		{  	$arrSector[$sector->id] = $sector->sector_name;	        		}
	foreach($sbtObject as $obj)			{  	$arrObject[$obj->id] = str_replace('_',' / ',$obj->object_name);}

	$this->object_cnt = count($arrObject);

	$this->form = new AddSbtAnalysisForm();
	$this->wSchema = $this->form->getWidgetSchema();
	$this->wSchema['analysis_category_id']->setOption('choices',$arrCategory);
	$this->wSchema['analysis_type_id']->setOption('choices',$arrType);
	$this->wSchema['analysis_object_id']->setOption('choices',$arrObject);
	$this->wSchema['analysis_market_id']->setOption('choices',$arrMarket);
	$this->wSchema['analysis_stocklist_id']->setOption('choices',$arrStockList);
	$this->wSchema['analysis_sector_id']->setOption('choices',$arrSector);
	
	$this->form->setDefault('author_id',$this->getUser()->getAttribute('user_id', '', 'userProperty'));
	$this->form->setDefault('created_at',date("Y-m-d H:i:s"));	
	$this->form->setDefault('updated_at','');
	$this->form->setDefault('analysis_category_id',4);
	$this->form->setDefault('analysis_type_id',0);
	
	$isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
    
	if( ($isSuperAdmin == 1) || ($this->getUser()->hasGroup('SbtArticlePublisher'))) 
	{
		//$this->form->setDefault('published',1);
		//$this->getUser()->setAttribute('published_analysis', 1 , 'userProperty');
		$this->show_publish_button = 1;
	}
	else
	{ 
		//$this->form->setDefault('published',0);
		//$this->getUser()->setAttribute('published_analysis', 0 , 'userProperty');
		$this->show_publish_button = 0;
	}
	
	$this->form->setDefault('image','');
	
	if ($request->isMethod('post'))
	{ 
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		
		$analysis_data = $request->getParameter($this->form->getName());
		$analysis_data['analysis_description'] = $arr['analysis_desc_hid'];
		
		if($arr['form_type']=='analysis')
		{
			/*if($analysis_data['analysis_type_id'] > 1)
			{
				$analysis_data['analysis_market_id'] = '';
				$analysis_data['analysis_stocklist_id'] = '';
				$analysis_data['analysis_sector_id'] = '';
			}*/
			$this->form->bind($analysis_data);
			if($this->form->isValid())
			{
				$new_analysis_data = $this->form->save();
				$this->getUser()->setAttribute('new_analysis_id', $new_analysis_data->id);
				
				$profile->updateActivityCount($this->getUser()->getAttribute('user_id', '', 'userProperty'));
				
				//$url = 'http://'.$this->host_str.'/sbt/sbtArticleDetails/article_id/'.$new_analysis_data->id;
				//$this->redirect($url);
				//$this->setTemplate('articleSaved');
				$cc = new SbtCombinedAnalysisData();
				$cc->saveCombineUserData($arr,$new_analysis_data->id); 
				
				return  $this->renderText($new_analysis_data->id);
			}
			else
			{
				$this->form->getErrorSchema();
			}
		}
	}
  }
  
  /*
  * @param sfRequest $request A request object
  */
  public function executeSbtEditBlog(sfWebRequest $request)
  {
    
  	isicsBreadcrumbs::getInstance()->addItem('Sister BT Blog', 'sbt/sbtEditBlog');
	 
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_analysis_details');
	$this->host_str = $this->getRequest()->getHost();
	$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');

    $blog_id = $this->getRequest()->getParameter('blog_id');
    $blog = new SbtUserBlog();
    $blog_data = $blog->getSelectedBlog($blog_id);
    $this->blog_data = $blog_data;

    $isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
    if($isSuperAdmin == 1 || $blog_data->author_id==$this->logged_user)
        $this->allow_edit=1;
    else
        $this->allow_edit=0;    
    
    $arrTag = array('1'=>'Tag1','2'=>'Tag2','3'=>'Tag3');
	$arrObject = array('1'=>'ob1','2'=>'ob2','3'=>'ob3','4'=>'ob4');
	
	$arrCategory = $arrType = $arrMarket = $arrStockList = $arrSector = $arrObject = array();
	
	$sbtCategory = Doctrine_Core::getTable('SbtArticleCategory')->findAll();
	$sbtType = Doctrine_Core::getTable('SbtArticleType')->findAll();
	//$sbtMarket = Doctrine_Core::getTable('SbtMarket')->findAll();
	//$sbtStockList = Doctrine_Core::getTable('SbtStockList')->findAll();
	//$sbtSector = Doctrine_Core::getTable('SbtSector')->findAll();
	
	if($this->blog_data->ublog_type_id)
	{
		$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.type_id = ?', $this->blog_data->ublog_type_id);
		
		$sbtObject = $for_obj_cri->execute();
	}
	
	/* New start */
	foreach($sbtObject as $data)
	{ 
		if($data->market_id > 0 && !in_array($data->market_id,$market_list)) $market_list[] = $data->market_id;
		if($data->sector_id > 0 && !in_array($data->sector_id,$sector_list)) $sector_list[] = $data->sector_id;
		if($data->stocklist_id > 0 && !in_array($data->stocklist_id,$stocklist_list)) $stocklist_list[] = $data->stocklist_id;
	}

	$sbt_market = new SbtMarket();
	$sbt_sector = new SbtSector();
	$sbt_stocklist = new SbtStockList();

	$arrMarket = $sbt_market->getSelctedMarket($market_list);
	$arrSector = $sbt_sector->getSelctedSector($sector_list);
	$arrStockList = $sbt_stocklist->getSelctedStockList($stocklist_list);
	/* New end */
	
	$arrType[0] = '';
	
	foreach($sbtCategory as $cat) 		{   $arrCategory[$cat->id] = $cat->sbt_category_name;	}
	foreach($sbtType as $type) 	  		{  	$arrType[$type->id] = $type->type_name;	        }
	//foreach($sbtMarket as $market)		{  	$arrMarket[$market->id] = $market->sbt_market_name;	            }
	//foreach($sbtStockList as $stocklist){  	$arrStockList[$stocklist->id] = $stocklist->stock_name;	        }
	//foreach($sbtSector as $sector)		{  	$arrSector[$sector->id] = $sector->sector_name;	        		}
	foreach($sbtObject as $obj)			{  	$arrObject[$obj->id] = str_replace('_',' / ',$obj->object_name);}

	$this->object_cnt = count($arrObject);

    
    $this->form = new AddSbtUserBlogForm($blog_data);
    $this->form->setDefault('updated_at',date('Y-m-d H:i:s'));
    $this->wSchema = $this->form->getWidgetSchema();
    $this->wSchema['ublog_category_id']->setOption('choices',$arrCategory);
   	$this->wSchema['ublog_type_id']->setOption('choices',$arrType);
	$this->wSchema['ublog_object_id']->setOption('choices',$arrObject);
	$this->wSchema['ublog_market_id']->setOption('choices',$arrMarket);
	$this->wSchema['ublog_stocklist_id']->setOption('choices',$arrStockList);
	$this->wSchema['ublog_sector_id']->setOption('choices',$arrSector); 
    
	if ($request->isMethod('post'))
	{ 
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$blog_data = $request->getParameter($this->form->getName());
        $blog_data['updated_at'] = date('Y-m-d H:i:s');
        //var_dump($blog_data); die;
 
			/*if($blog_data['ublog_type_id'] > 1)
			{
				$blog_data['ublog_market_id'] = '';
				$blog_data['ublog_stocklist_id'] = '';
				$blog_data['ublog_sector_id'] = '';
			}*/
			
			$this->form->bind($blog_data);
			if($this->form->isValid())
			{
				$blogdata = $this->form->save();
				$url = 'http://'.$this->host_str.'/sbt/sbtBlogDetails/blog_id/'.$blogdata->id;
				$this->redirect($url);
				//$this->setTemplate('blogSaved');
			}
			else
			{
				$this->form->getErrorSchema();
			}
	}
  }
  /**
  * Executes EditAnalysis action
  *
  * @param sfRequest $request A request object
  */
  public function executeEditAnalysis(sfWebRequest $request)
  {
	 isicsBreadcrumbs::getInstance()->addItem('Sister BT Blog', 'sbt/editAnalysis');
	 
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_analysis_details');
	 $this->host_str = $this->getRequest()->getHost();
	 $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	 $article_id = $request->getParameter('article_id');
	 $this->combine_author_names = '';
	 
	 $analysis = new SbtAnalysis();
	 $analysis_data = $analysis->getSelectedArticle($article_id);
	 
	 $suggestion = new SbtAnalysisSuggestion();
	 $this->last_suggestion = $suggestion->getLastSuggestion($article_id);
	 
	 $combine_author = new SbtCombinedAnalysisData();
	 $combine_author_data = $combine_author->searchPreviousRecord($article_id);
	 
	 if($combine_author_data) $this->combine_author_names = $combine_author_data->combined_usernames;
	 
	 $isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');

	 if( (($analysis_data->author_id == $this->logged_user) || ($isSuperAdmin == 1)) && ( ($this->getUser()->hasGroup('SbtArticlePublisher')) ||($isSuperAdmin == 1))   )
	 {
	 	$this->allow_view = 1;
		$this->analysis_data = $analysis_data;
	 }
	 else
	 {
	 	if( ($analysis_data->published!=1) && ($analysis_data->author_id==$this->logged_user))
	 	{ 
	 		$this->allow_view = 1;
			$this->analysis_data = $analysis_data;
	 	}
	 	else $this->allow_view = 0;
	 }
	 
	 //$typeid = 1;
		
	$arrCategory = $arrType = $arrMarket = $arrStockList = $arrSector = $arrObject = array();
	
	$sbtCategory = Doctrine_Core::getTable('SbtArticleCategory')->findAll();
	$sbtType = Doctrine_Core::getTable('SbtArticleType')->findAll();
	//$sbtMarket = Doctrine_Core::getTable('SbtMarket')->findAll();
	//$sbtStockList = Doctrine_Core::getTable('SbtStockList')->findAll();
	//$sbtSector = Doctrine_Core::getTable('SbtSector')->findAll();
	
	if($analysis_data->analysis_type_id)
	{
		$for_obj_cri = Doctrine_Query::create()
				->from('SbtObject so')
				->where('so.type_id = ?', $analysis_data->analysis_type_id);
		
		$sbtObject = $for_obj_cri->execute();
	}

	$arrType[0] = '';
	
	/* New start */
	foreach($sbtObject as $data)
	{ 
		if($data->market_id > 0 && !in_array($data->market_id,$market_list)) $market_list[] = $data->market_id;
		if($data->sector_id > 0 && !in_array($data->sector_id,$sector_list)) $sector_list[] = $data->sector_id;
		if($data->stocklist_id > 0 && !in_array($data->stocklist_id,$stocklist_list)) $stocklist_list[] = $data->stocklist_id;
	}

	//$market_id_str = implode(',',$market_list);
	//$sector_id_str = implode(',',$sector_list);
	//$stocklist_id_str = implode(',',$stocklist_list);
	
	//echo 'm:'.$market_id_str.'</br>';
	//echo 's:'.$sector_id_str.'</br>';
	//echo 'st:'.$stocklist_id_str; 
	
	$sbt_market = new SbtMarket();
	$sbt_sector = new SbtSector();
	$sbt_stocklist = new SbtStockList();

	$arrMarket = $sbt_market->getSelctedMarket($market_list);
	$arrSector = $sbt_sector->getSelctedSector($sector_list);
	$arrStockList = $sbt_stocklist->getSelctedStockList($stocklist_list);
	
	/* New end */
	
	foreach($sbtCategory as $cat) 		{   $arrCategory[$cat->id] = $cat->sbt_category_name;	}
	foreach($sbtType as $type) 	  		{  	$arrType[$type->id] = $type->type_name;	        }
	//foreach($sbtMarket as $market)		{  	$arrMarket[$market->id] = $market->sbt_market_name;	            }
	//foreach($sbtStockList as $stocklist){  	$arrStockList[$stocklist->id] = $stocklist->stock_name;	        }
	//foreach($sbtSector as $sector)		{  	$arrSector[$sector->id] = $sector->sector_name;	        		}
	foreach($sbtObject as $obj)			{  	$arrObject[$obj->id] = str_replace('_',' / ',$obj->object_name);}

	$this->object_cnt = count($arrObject);

	$this->form = new AddSbtAnalysisForm($analysis_data);
	$this->wSchema = $this->form->getWidgetSchema();
	$this->wSchema['analysis_category_id']->setOption('choices',$arrCategory);
	$this->wSchema['analysis_type_id']->setOption('choices',$arrType);
	$this->wSchema['analysis_object_id']->setOption('choices',$arrObject);
	$this->wSchema['analysis_market_id']->setOption('choices',$arrMarket);
	$this->wSchema['analysis_stocklist_id']->setOption('choices',$arrStockList);
	$this->wSchema['analysis_sector_id']->setOption('choices',$arrSector);
	
	$this->form->setDefault('published',5);
	$isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
		
	if( ($isSuperAdmin == 1) || ($this->getUser()->hasGroup('SbtArticlePublisher'))) $this->show_publish_button = 1;
	else $this->show_publish_button = 0;
		
		if ($request->isMethod('post'))
		{ 
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$form_analysis_data = $request->getParameter($this->form->getName());
			$form_analysis_data['analysis_description'] = $arr['edit_analysis_desc_hid'];
			$form_analysis_data['updated_at'] = date("Y-m-d H:i:s");
			
			/*if($form_analysis_data['analysis_type_id'] > 1)
			{
				$form_analysis_data['analysis_market_id'] = '';
				$form_analysis_data['analysis_stocklist_id'] = '';
				$form_analysis_data['analysis_sector_id'] = '';
			}*/
		
			$this->form->bind($form_analysis_data);
			if($this->form->isValid())
			{
				$this->form->save();
				
				$combine_author->saveCombineUserData($arr,$article_id); 
				
				$this->getUser()->setAttribute('is_updated_analysis',1);
				$this->getUser()->setAttribute('updated_analysis_id',$article_id);
				
				return  $this->renderText($article_id);
				//$this->redirect('email/analysisCreationMail');
			}
			else
			{
				//$this->form->getErrorSchema();
			}
		}
	 
  }
  
  /**
  * Executes SbtAddUserBlog action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtAddUserBlog(sfWebRequest $request)
  {
	isicsBreadcrumbs::getInstance()->addItem('Sister BT Add User Analysis / Blog', 'sbt/sbtAddAnalysisBlog');
	
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_addanalysis');
	$this->host_str = $this->getRequest()->getHost();
	$profile = new SfGuardUserProfile();
	$arrTag = array('1'=>'Tag1','2'=>'Tag2','3'=>'Tag3');
	$arrObject = array('1'=>'ob1','2'=>'ob2','3'=>'ob3','4'=>'ob4');
	
	$arrCategory = $arrType = $arrMarket = $arrStockList = $arrSector = $arrObject = array();
	
	$sbtCategory = Doctrine_Core::getTable('SbtArticleCategory')->findAll();
	$sbtType = Doctrine_Core::getTable('SbtArticleType')->findAll();
	$sbtMarket = Doctrine_Core::getTable('SbtMarket')->findAll();
	$sbtStockList = Doctrine_Core::getTable('SbtStockList')->findAll();
	$sbtSector = Doctrine_Core::getTable('SbtSector')->findAll();
	
	if($typeid)
	{
		$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.type_id = ?', $typeid);
		
		$sbtObject = $for_obj_cri->execute();
	}
	/*else
	{
		$sbtObject = Doctrine_Core::getTable('SbtObject')->findAll();
	}*/
	
	//$arrCategory[0] = '';
	//$arrType[0] = '';
	
	foreach($sbtCategory as $cat) 		{   $arrCategory[$cat->id] = $cat->sbt_category_name;	}
	foreach($sbtType as $type) 	  		{  	$arrType[$type->id] = $type->type_name;	        }
	foreach($sbtMarket as $market)		{  	$arrMarket[$market->id] = $market->sbt_market_name;	            }
	foreach($sbtStockList as $stocklist){  	$arrStockList[$stocklist->id] = $stocklist->stock_name;	        }
	foreach($sbtSector as $sector)		{  	$arrSector[$sector->id] = $sector->sector_name;	        		}
	foreach($sbtObject as $obj)			{  	$arrObject[$obj->id] = str_replace('_',' / ',$obj->object_name);}

	$this->object_cnt = count($arrObject);
	
	$this->userBlogForm = new AddSbtUserBlogForm();
	$this->wSchema = $this->userBlogForm->getWidgetSchema();
	$this->wSchema['ublog_category_id']->setOption('choices',$arrCategory);
	$this->wSchema['ublog_type_id']->setOption('choices',$arrType);
	$this->wSchema['ublog_object_id']->setOption('choices',$arrObject);
	$this->wSchema['ublog_market_id']->setOption('choices',$arrMarket);
	$this->wSchema['ublog_stocklist_id']->setOption('choices',$arrStockList);
	$this->wSchema['ublog_sector_id']->setOption('choices',$arrSector);
	
	$this->userBlogForm->setDefault('author_id',$this->getUser()->getAttribute('user_id', '', 'userProperty'));
	$this->userBlogForm->setDefault('created_at',date("Y-m-d H:i:s"));	
	$this->userBlogForm->setDefault('ublog_category_id',4);
	$this->userBlogForm->setDefault('ublog_type_id',0);
	$this->userBlogForm->setDefault('ublog_views',0);
	$this->userBlogForm->setDefault('ublog_votes',0);
	
	if ($request->isMethod('post'))
	{ 
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$blog_data = $request->getParameter($this->userBlogForm->getName());
        $blog_data['ublog_description'] = $arr['blog_desc_hid'];
		
		if($arr['form_type']=='blog')
		{ 
			/*if($blog_data['ublog_type_id'] > 1)
			{
				$blog_data['ublog_market_id'] = '';
				$blog_data['ublog_stocklist_id'] = '';
				$blog_data['ublog_sector_id'] = '';
			}*/
			
			$this->userBlogForm->bind($blog_data);
			if($this->userBlogForm->isValid())
			{
				$blogdata = $this->userBlogForm->save();
				$profile->updateActivityCount($this->getUser()->getAttribute('user_id', '', 'userProperty'));
				
				$url = 'http://'.$this->host_str.'/sbt/sbtBlogDetails/blog_id/'.$blogdata->id;
				$this->redirect($url);
				//$this->setTemplate('blogSaved');
			}
			else
			{
				$this->userBlogForm->getErrorSchema();
			}
		}
	}

  }
  
  /**
  * Executes FromMarket action
  *
  * @param sfRequest $request A request object
  */
  public function executeFromMarket(sfWebRequest $request)
  {
  	$marketid = $this->getRequestParameter('marketid');
	$stocklistid = $this->getRequestParameter('stocklistid');
	$sectorid = $this->getRequestParameter('sectorid');
	
	$stocklist_name = $stocklist_id = $sector_name = $object_name = $arrMarket = array();
	//$marketid = 1;
			
	if($marketid)
	{
		// For stocklist name
		$stock_list_cri = Doctrine_Query::create()
					->from('SbtMarketStocklist sms')
					->innerJoin('sms.SbtMarket sm')
					->innerJoin('sms.SbtStockList sl')
					->andWhere('sm.id = ?',$marketid);
		
		//echo $stock_list_cri->getSqlQuery();
		$stocklist_data = $stock_list_cri->execute();

		foreach($stocklist_data as $dd)
		{
			$stocklist_name[$dd->SbtStockList->id] = $dd->SbtStockList->stock_name;
			$stocklist_id[] = $dd->SbtStockList->id;
		}
		
		// For sector name
		$sector_list_cri = Doctrine_Query::create()
					->select('DISTINCT ss.sector_name AS sector_name,ss.id AS sector_id')
					->from('SbtStocklistSector sss')
					->innerJoin('sss.SbtSector ss')
					->innerJoin('sss.SbtStockList sl')
					->whereIn('sl.id',$stocklist_id)
					->setHydrationMode(Doctrine::HYDRATE_NONE);
        $sector_data = $sector_list_cri->execute();
		for($i=0; $i<count($sector_data); $i++)
		{
			$sector_name[$sector_data[$i][1]] = $sector_data[$i][0]; 
		}
		
		//For object 
		/*if($marketid && !$stocklistid)
		{
			$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.sbt_market_id = ?', $marketid);
		}
		if($marketid && $stocklistid)
		{
			$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
				->andWhere('so.stocklist_id = ?', $stocklistid);
		}*/
		
		if($marketid || $stocklistid || $sectorid){
		$for_obj_cri = Doctrine_Query::create()->from('SbtObject so');
    	if($marketid) $for_obj_cri = $for_obj_cri->where('so.market_id = ?', $marketid);
		if($stocklistid) $for_obj_cri = $for_obj_cri->where('so.stocklist_id = ?',$stocklistid);
		if($sectorid) $for_obj_cri = $for_obj_cri->where('so.sector_id = ?',$sectorid);
		}
				//->andWhere('so.stocklist_id = ?', $stocklistid);
				
		
		
		$obj_data = $for_obj_cri->execute();
		
		foreach($obj_data as $obj)
		{
			$object_name[$obj->id] = $obj->object_name;
		}
		
		$sbtMarket = Doctrine_Core::getTable('SbtMarket')->findAll();
		foreach($sbtMarket as $market)	{	$arrMarket[$market->id] = $market->sbt_market_name;	}
		
		$this->sector_cnt = count($sector_name);
		$this->object_cnt = count($object_name);
		
		$this->form = new AddSbtAnalysisForm();
		$this->wSchema = $this->form->getWidgetSchema();
		$this->wSchema['analysis_object_id']->setOption('choices',$object_name);
		$this->wSchema['analysis_market_id']->setOption('choices',$arrMarket);
		$this->wSchema['analysis_stocklist_id']->setOption('choices',$stocklist_name);
		$this->wSchema['analysis_sector_id']->setOption('choices',$sector_name);
		
		if($marketid) $this->form->setDefault('analysis_market_id',$marketid);
		if($stocklistid) $this->form->setDefault('analysis_stocklist_id',$stocklistid);
	}	
  }
  
  /**
  * Executes ForBlogMarket action
  *
  * @param sfRequest $request A request object
  */
  public function executeForBlogMarket(sfWebRequest $request)
  {
  	$marketid = $this->getRequestParameter('marketid');
	$stocklistid = $this->getRequestParameter('stocklistid');
	
	$stocklist_name = $stocklist_id = $sector_name = $object_name = $arrMarket = array();
	//$marketid = 1;
			
	if($marketid)
	{
		// For stocklist name
		$stock_list_cri = Doctrine_Query::create()
					->from('SbtMarketStocklist sms')
					->innerJoin('sms.SbtMarket sm')
					->innerJoin('sms.SbtStockList sl')
					->andWhere('sm.id = ?',$marketid);
		
		//echo $stock_list_cri->getSqlQuery(); die;
		$stocklist_data = $stock_list_cri->execute();

		foreach($stocklist_data as $dd)
		{
			$stocklist_name[$dd->SbtStockList->id] = $dd->SbtStockList->stock_name;
			$stocklist_id[] = $dd->SbtStockList->id;
		}
		
		// For sector name
		$sector_list_cri = Doctrine_Query::create()
					->select('DISTINCT ss.sector_name AS sector_name,ss.id AS sector_id')
					->from('SbtStocklistSector sss')
					->innerJoin('sss.SbtSector ss')
					->innerJoin('sss.SbtStockList sl')
					->whereIn('sl.id',$stocklist_id)
					->setHydrationMode(Doctrine::HYDRATE_NONE);
        $sector_data = $sector_list_cri->execute();
		for($i=0; $i<count($sector_data); $i++)
		{
			$sector_name[$sector_data[$i][1]] = $sector_data[$i][0]; 
		}
		
		//For object
		if($marketid && !$stocklistid)
		{
			$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.sbt_market_id = ?', $marketid);
		}
		if($marketid && $stocklistid)
		{
			$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.market_id = ?', $marketid)
				->andWhere('so.stocklist_id = ?', $stocklistid);
		}
		
		$obj_data = $for_obj_cri->execute();
		
		foreach($obj_data as $obj)
		{
			$object_name[$obj->id] = $obj->object_name;
		}
		
		$sbtMarket = Doctrine_Core::getTable('SbtMarket')->findAll();
		foreach($sbtMarket as $market)	{	$arrMarket[$market->id] = $market->sbt_market_name;	}
		
		$this->sector_cnt = count($sector_name);
		$this->object_cnt = count($object_name);
		
		$this->form = new AddSbtUserBlogForm();
		$this->wSchema = $this->form->getWidgetSchema();
		$this->wSchema['ublog_object_id']->setOption('choices',$object_name);
		$this->wSchema['ublog_market_id']->setOption('choices',$arrMarket);
		$this->wSchema['ublog_stocklist_id']->setOption('choices',$stocklist_name);
		$this->wSchema['ublog_sector_id']->setOption('choices',$sector_name);
		
		if($marketid) $this->form->setDefault('ublog_market_id',$marketid);
		if($stocklistid) $this->form->setDefault('ublog_stocklist_id',$stocklistid);
	}	
  }
  
  /**
  * Executes ForAnalysisTypeShare action
  *
  * @param sfRequest $request A request object
  */
  public function executeForAnalysisTypeShare(sfWebRequest $request)
  {
  	$typeid = $this->getRequestParameter('typeid');
	$marketid = $this->getRequestParameter('marketid');
	$stocklistid = $this->getRequestParameter('stockid');
	$sectorid = $this->getRequestParameter('sectorid');
	
	$arrMarket = $arrStockList = $arrSector = $arrObject = array();
	
	//$sbtMarket = Doctrine_Core::getTable('SbtMarket')->findAll();
	//$sbtStockList = Doctrine_Core::getTable('SbtStockList')->findAll();
	//$sbtSector = Doctrine_Core::getTable('SbtSector')->findAll();
	
	if($typeid)
	{
		$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.type_id = ?', $typeid);
		
		$sbtObject = $for_obj_cri->execute();
	}

	//$arrCategory[0] = '';
	$arrType[0] = '';
	
	/* New start */
	foreach($sbtObject as $data)
	{ 
		if($data->market_id > 0 && !in_array($data->market_id,$market_list)) $market_list[] = $data->market_id;
		if($data->sector_id > 0 && !in_array($data->sector_id,$sector_list)) $sector_list[] = $data->sector_id;
		if($data->stocklist_id > 0 && !in_array($data->stocklist_id,$stocklist_list)) $stocklist_list[] = $data->stocklist_id;
	}

	$sbt_market = new SbtMarket();
	$sbt_sector = new SbtSector();
	$sbt_stocklist = new SbtStockList();

	$arrMarket = $sbt_market->getSelctedMarket($market_list);
	$arrSector = $sbt_sector->getSelctedSector($sector_list);
	$arrStockList = $sbt_stocklist->getSelctedStockList($stocklist_list);
	/* New end */
	
	//foreach($sbtMarket as $market)		{  	$arrMarket[$market->id] = $market->sbt_market_name;	            }
	//foreach($sbtStockList as $stocklist){  	$arrStockList[$stocklist->id] = $stocklist->stock_name;	        }
	//foreach($sbtSector as $sector)		{  	$arrSector[$sector->id] = $sector->sector_name;	        		}
	//foreach($sbtObject as $obj)			{  	$arrObject[$obj->id] = str_replace('_',' / ',$obj->object_name);}
	
	if($marketid || $stocklistid || $sectorid)
	{
		$for_obj_cri = Doctrine_Query::create()->from('SbtObject so');
    	if($marketid) $for_obj_cri = $for_obj_cri->where('so.market_id = ?', $marketid);
		if($stocklistid) $for_obj_cri = $for_obj_cri->where('so.stocklist_id = ?',$stocklistid);
		if($sectorid) $for_obj_cri = $for_obj_cri->where('so.sector_id = ?',$sectorid);
	}
	
	$obj_data = $for_obj_cri->execute();
		
	foreach($obj_data as $obj)
	{
		$arrObject[$obj->id] = $obj->object_name;
	}

	$this->object_cnt = count($arrObject);

	$this->form = new AddSbtAnalysisForm();
	$this->wSchema = $this->form->getWidgetSchema();
	$this->wSchema['analysis_object_id']->setOption('choices',$arrObject);
	$this->wSchema['analysis_market_id']->setOption('choices',$arrMarket);
	$this->wSchema['analysis_stocklist_id']->setOption('choices',$arrStockList);
	$this->wSchema['analysis_sector_id']->setOption('choices',$arrSector);
  }
  
  /**
  * Executes ForAnalysisTypeOther action
  *
  * @param sfRequest $request A request object
  */
  public function executeForAnalysisTypeOther(sfWebRequest $request)
  {
  	$typeid = $this->getRequestParameter('typeid');
	$object_name = array();
	
	if($typeid)
	{ 
		$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.type_id = ?', $typeid);
		
		
		$obj_data = $for_obj_cri->execute();
		
		foreach($obj_data as $obj)
		{
			$object_name[$obj->id] = str_replace('_',' / ',$obj->object_name);
		}

		$this->object_cnt = count($object_name);
		$this->form = new AddSbtAnalysisForm();
		$this->wSchema = $this->form->getWidgetSchema();
		$this->wSchema['analysis_object_id']->setOption('choices',$object_name);
		
		//$this->form->setDefault('analysis_category_id',4);
		$this->type_id = $typeid;
	}
  }
  
  /**
  * Executes ForBlogTypeShare action
  *
  * @param sfRequest $request A request object
  */
  public function executeForBlogTypeShare(sfWebRequest $request)
  {
  	$typeid = $this->getRequestParameter('typeid');
	
	$arrMarket = $arrStockList = $arrSector = $arrObject = array();
	
	$sbtMarket = Doctrine_Core::getTable('SbtMarket')->findAll();
	$sbtStockList = Doctrine_Core::getTable('SbtStockList')->findAll();
	$sbtSector = Doctrine_Core::getTable('SbtSector')->findAll();
	
	if($typeid)
	{
		$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.type_id = ?', $typeid);
		
		$sbtObject = $for_obj_cri->execute();
	}

	//$arrCategory[0] = '';
	$arrType[0] = '';
	
	foreach($sbtMarket as $market)		{  	$arrMarket[$market->id] = $market->sbt_market_name;	            }
	foreach($sbtStockList as $stocklist){  	$arrStockList[$stocklist->id] = $stocklist->stock_name;	        }
	foreach($sbtSector as $sector)		{  	$arrSector[$sector->id] = $sector->sector_name;	        		}
	foreach($sbtObject as $obj)			{  	$arrObject[$obj->id] = str_replace('_',' / ',$obj->object_name);}

	$this->object_cnt = count($arrObject);

	$this->form = new AddSbtUserBlogForm();
	$this->wSchema = $this->form->getWidgetSchema();
	$this->wSchema['ublog_object_id']->setOption('choices',$arrObject);
	$this->wSchema['ublog_market_id']->setOption('choices',$arrMarket);
	$this->wSchema['ublog_stocklist_id']->setOption('choices',$arrStockList);
	$this->wSchema['ublog_sector_id']->setOption('choices',$arrSector);
  }
  
  /**
  * Executes ForBlogTypeOther action
  *
  * @param sfRequest $request A request object
  */
  public function executeForBlogTypeOther(sfWebRequest $request)
  {
  	$typeid = $this->getRequestParameter('typeid');
	$object_name = array();
	
	if($typeid)
	{ 
		$for_obj_cri = Doctrine_Query::create()
    			->from('SbtObject so')
    			->where('so.type_id = ?', $typeid);
		
		
		$obj_data = $for_obj_cri->execute();
		
		foreach($obj_data as $obj)
		{
			$object_name[$obj->id] = str_replace('_',' / ',$obj->object_name);
		}

		$this->object_cnt = count($object_name);
		$this->form = new AddSbtUserBlogForm();
		$this->wSchema = $this->form->getWidgetSchema();
		$this->wSchema['ublog_object_id']->setOption('choices',$object_name);
		
		//$this->form->setDefault('analysis_category_id',4);
		$this->type_id = $typeid;
	}
  }

  /**
  * Executes ArticleSaved action
  *
  * @param sfRequest $request A request object
  */
  public function executeArticleSaved(sfWebRequest $request)
  {
  }  

  /**
  * Executes BlogSaved action
  *
  * @param sfRequest $request A request object
  */
  public function executeBlogSaved(sfWebRequest $request)
  {
  }  

	/*
	* Executes ImageUpload action
	*
	* This function is used while uploading the image file.
	*/
	public function executeImageUpload(sfWebRequest $request)
	{
		$this->setLayout(false);
		$this->host_str = $this->getRequest()->getHost();
		$action_mode = $this->getRequestParameter('mode') ? $this->getRequestParameter('mode') : 'upload';
		$this->p = $this->getRequestParameter('p');
		$upload_max_img_size = 150;
		$upload_max_img_width = 495;
		$upload_max_img_height = 1000;
		$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/images/analysis_images/'; 
		$images_per_page = 10;
		
		if ($request->isMethod('post'))
		{ 
			$upload_exp = '<b>Note:</b> Endast JPG-, GIF- och PNG-bilder kan laddas upp. Maximal storlek för en bild är [width] x [height] px and [size] KB. Större bilder kommer, om möjligt, att skalas ned.';
			$upload_exp = str_replace("[width]", $upload_max_img_width, $upload_exp);
			$upload_exp = str_replace("[height]", $upload_max_img_height, $upload_exp);
			$upload_exp = str_replace("[size]", $upload_max_img_size, $upload_exp);
			
			if (isset($_FILES['probe']) && $_FILES['probe']['size'] != 0 && !$_FILES['probe']['error'])
			{
				unset($errors);
				$image_info = getimagesize($_FILES['probe']['tmp_name']);
	
				if(!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] != 3 && $image_info[2] != 6) $errors[] = 'invalid file format';

				if (empty($errors))
				{
						if($_FILES['probe']['size'] > $upload_max_img_size *1000 || $image_info[0] > $upload_max_img_width || $image_info[1] > $upload_max_img_height)
						{
							$compression = 10;
							$width=$image_info[0];
							$height=$image_info[1];
		  
							if($width >= $height)
							{
								$new_width = $upload_max_img_width;
								$new_height = intval($height*$new_width/$width);
							}
							else
							{
								$new_height = $upload_max_img_height;
								$new_width = intval($width*$new_height/$height);
							}
						
							$img_tmp_name = uniqid(rand()).'.tmp';
							for($compression = 100; $compression>9; $compression=$compression-10)
							{
								if(!stdlib::resize($_FILES['probe']['tmp_name'], $uploaded_images_path.$img_tmp_name, $new_width, $new_height, $compression)) { 
								$file_size = @filesize($uploaded_images_path.$img_tmp_name); 
								break; 
								}
								$file_size = @filesize($uploaded_images_path.$img_tmp_name);
								
								if($image_info[2]!=2 && $file_size > $upload_max_img_size*1000) 
									break;
								if($file_size <= $upload_max_img_size*1000) 
									break;
							}
						
							if($file_size > $upload_max_img_size*1000) 
							{ 
								$file_too_large_dump = str_replace("[width]",$image_info[0],'file too large ([width]*[height], [size] KB)'); 		
								$file_too_large_dump = str_replace("[height]",$image_info[1],$file_too_large_dump); 
								$file_too_large_dump = str_replace("[size]",number_format($_FILES['probe']['size']/1000,0,",",""),$file_too_large_dump); $errors[] = $file_too_large_dump; 
							}
	
							if(isset($errors))
							{
								if(file_exists($uploaded_images_path.$img_tmp_name))
								{
									@chmod($uploaded_images_path.$img_tmp_name, 0777);
									@unlink($uploaded_images_path.$img_tmp_name);
								}
							}
						}
					}
					
				if (empty($errors))
				{
					$nr = 0;
					switch($image_info[2])
					{
						case 1:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path."image".$nr.".gif")) break; }
						$filename = "image".$nr.".gif";
						break;
	
						case 2:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path."image".$nr.".jpg")) break; }
						$filename = "image".$nr.".jpg";
						break;
						
						case 3:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path."image".$nr.".png")) break; }
						$filename = "image".$nr.".png";
						break;
	
						case 6:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path."image".$nr.".bmp")) break; }
						$filename = "image".$nr.".bmp";
						break;
					}
	
					if(isset($img_tmp_name))
					{
						@rename($uploaded_images_path.$img_tmp_name, $uploaded_images_path.$filename) or $errors[] = 'Error while uploading the image';
						$image_manipulated = str_replace('[width]',$new_width,'The upload was successful but the image had to be downsized. New size is [width] x [height] px, [size] KB.');
						$image_manipulated = str_replace('[height]',$new_height,$image_manipulated);
						$image_manipulated = str_replace("[size]",number_format($file_size/1000,0,",",""),$image_manipulated);
					}
					else
					{ 
						move_uploaded_file($_FILES['probe']['tmp_name'], $uploaded_images_path.$filename) or $errors[] = 'Error while uploading the image';
					}
				}
	
				if(empty($errors))
				{
					@chmod($uploaded_images_path.$filename, 0644);
					$action_mode = 'uploaded';
				}
				else $action_mode = 'upload';
			}
	
			if(empty($errors))
			{
				if(isset($_FILES['probe']['error'])) $errors[] = str_replace('[maximum_file_size]',ini_get('upload_max_filesize'),'Error while uploading the image. The image might be larger than the maximum accepted file size of the server ([maximum_file_size]).');
			}
		}
		
		if($this->getRequestParameter('uploaded_image_selected'))
		{
			$action_mode = 'uploaded';
			$this->filename = $this->getRequestParameter('uploaded_image_selected');
		}
		else $this->filename = $filename;
		
		$img_arr = getimagesize($uploaded_images_path.$this->filename);
		$this->img_width = $img_arr[0];
		$this->img_height = $img_arr[1];
		
		$this->action_mode = $action_mode;
		$this->uploaded_images_path = $uploaded_images_path;
		$this->images_per_page = $images_per_page;
		$this->image_manipulated = $image_manipulated;
		$this->errors = $errors;
		$this->upload_exp = $upload_exp;
		$this->image_path = $this->getRequestParameter('image_path');
	} 

	/*
	* Executes SbtAddAnalysisBlog action
	*
	* This function is used While selecting Analysis / Blog.
	*/
	public function executeSbtAddAnalysisBlog(sfWebRequest $request)
	{       isicsBreadcrumbs::getInstance()->addItem('BT Insider', 'sbt/sbtAddAnalysisBlog');
		isicsBreadcrumbs::getInstance()->addItem('Skapa artikel/blogg', 'sbt/sbtAddAnalysisBlog');
		
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_addanalysis');
		
		//$this->from_sbt = $this->getUser()->getAttribute('from_sbt', '' , 'userProperty');
		$this->isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
		$user_id = $this->getUser()->getAttribute('user_id','', 'userProperty');
		
		$profile = new SfGuardUserProfile();
		$this->rec = $profile->getActiveStatus($user_id);
	}
	
	/*
	* Executes SbtArticleDetails action
	*
	* This function is used While view in detail.
	*/	
	public function executeSbtArticleDetails(sfWebRequest $request)
	{
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		//$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_analysis_details');
		$this->getUser()->setAttribute('submenu_menu', '');
		$this->host_str = $this->getRequest()->getHost();

		$parent_menu = $this->getUser()->getAttribute('parent_menu');
		$submenu_menu = $this->getUser()->getAttribute('submenu_menu');
	
		$breadcrum_menu = new Article();
		$this->first_menu = $breadcrum_menu->getMenuItem($parent_menu);
		$this->first_url = $breadcrum_menu->getMenuUrl($parent_menu); 
			
		$this->profile = new SfGuardUserProfile();
	        $analysis = new SbtAnalysis();
		$analysis_comment = new SbtAnalysisComment();
		$vote_details = new SbtVoteDetails();
		
		$this->analysis_status_arr = array('0','2','5','6');
		$article_id = $request->getParameter('article_id');
		$this->analysis_data = $analysis->getSelectedArticle($article_id);
		$this->total_vote_cnt = $this->analysis_data->analysis_votes;
		$this->similar_article_list = $analysis->getListOfAnalysisWrittenByUser($this->analysis_data,25);
		$this->cmt_cnt = $analysis_comment->getTotalCommentCount($article_id); 
		$analysis->updateViewCount($article_id);
		
		$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$this->no_of_stars = $vote_details->getStarForArticle($article_id);
		$this->rec_present = $vote_details->findVoteDetails(1,$article_id,$user_id);
		$this->from_sbt = $this->getUser()->getAttribute('from_sbt', '' , 'userProperty');
		$this->isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');

		$user = $this->getUser();
		if($user->isAuthenticated()) $this->valid_user = 1;
		else $this->valid_user = 0;
		
		$favorite = new SbtFavorite();
		$fav_data = $favorite->isAddedInFavoriteList('analysis',$article_id,$user_id);
		if($fav_data)
		{
			if($fav_data->id!='')  $this->add_in_fav_list = 1;
			else  $this->add_in_fav_list = 0;  
		}
		else $this->add_in_fav_list = 0; 
		
		$medal_detail = new SbtAnalysisMedalDetails();
		$this->gold_cnt = $medal_detail->getAnalysisAwardTypeCount($article_id,'1');
		$this->silver_cnt = $medal_detail->getAnalysisAwardTypeCount($article_id,'2');
		$this->bronze_cnt = $medal_detail->getAnalysisAwardTypeCount($article_id,'3');
		
		$second_menu = $this->analysis_data ? ucfirst($this->analysis_data->analysis_title) : 'Article Detail';
		$second_url = $breadcrum_menu->getMenuUrl($submenu_menu);
                isicsBreadcrumbs::getInstance()->addItem($this->first_menu, $this->first_url); 
		isicsBreadcrumbs::getInstance()->addItem($second_menu, $second_url); 
		
		$cc = new SbtCombinedAnalysisData();
		//$this->combineData = $cc->searchPreviousRecord($article_id); 
		$this->combine_data_str = $cc->searchRecordMakeLink($article_id);
		
		//$sbtAnalysisCount = new SbtAnalysisCount();
		//$sbtAnalysisCount->checkClickCnt($article_id);
		
		//--------------------------------------------------------------------------------------
		// Collecting Category, Type and Object.
	  $cat_arr = $type_arr = $object_arr = array();
	  $this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
		
	  $col1_13_heading_style_start = array('<h3 class="articleheading">','<h4 class="articleheading_varldens">','<h4 class="articleheading2"><b>');
	  $col1_13_heading_style_end = array('</h3>','</h4>','</b></h4>');
	  $col1_45_div_style = array('redheaing_sbt','blackheaing');
	  $col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
	  //$col1_814_heading_style = array('articleheading3_1st','redheaing2sbt','articleheading3_2nd_sbt','articleheading_goda','articleheading3_1st','redheaing2sbt','articleheading3_2nd_sbt');
          $col1_814_heading_style = array('home_heading_m_1','home_heading_m_2','home_heading_m_3','home_heading_m_4');
	  $last_column_style = array('adheading','adheadinggreen','adheading_small','adheading_v','adheading','adheadinggreen','adheading_small','adheading_v');
	  
	  $col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
	  $image_arr_13 = array('articleleft_photo1.jpg','photo6.jpg','photo8.jpg');
	  $image_arr_67 = array('photo7.jpg','photo6.jpg');
	  $image_arr_814 = array('midadd.jpg','photo9.jpg','photo10.jpg','photo11.jpg','midadd.jpg','photo9.jpg','photo11.jpg');
	  $image_arr_1417 = array('photo1.jpg','photo2.jpg','photo3.jpg','photo4.jpg');
		
	  $cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
	  $type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
	  $object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
          
          $fcol_hor_title = array('home_heading_l_3','home_heading_l_2');
          $fcol_ver_title = array('home_heading_l_2','home_heading_l_3');
          $fcol_big_title = array('home_heading_l_1','home_heading_l_4','home_heading_l_1');
          $fcol_body_text_6_7 = array('home_body_l_1','home_body_l_2');
          $fcol_body_text_2_3 = array('home_body_l_2','home_body_l_1');
          $fcol_body_text_1_4_5 = array('home_body_l_1','home_body_l_2','home_body_l_1');
          $mcol_body_text = array('home_body_m_1','home_body_m_2','home_body_m_3','home_body_m_4');
          $rcol_body_text = array('home_body_r_2','home_body_r_1');
          
            
          
          $this->fcol_hor_title = $fcol_hor_title;
          $this->fcol_ver_title = $fcol_ver_title;
          $this->fcol_big_title = $fcol_big_title;
          $this->fcol_body_text_6_7 = $fcol_body_text_6_7;
          $this->fcol_body_text_2_3 = $fcol_body_text_2_3;
          $this->fcol_body_text_1_4_5 = $fcol_body_text_1_4_5;
          $this->mcol_body_text = $mcol_body_text;
          $this->rcol_body_text = $rcol_body_text;
		
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
		
	  // Articles related to Commodities.
	  if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	  else $isSuperAdmin = 0;	
		
	  /*$this->comm_one_three = SbtAnalysisTable::getInstance()->getHomeSbtHome(0,3);
	  $this->comm_four_five = SbtAnalysisTable::getInstance()->getHomeSbtHome(3,2);
	  $this->comm_six_seven = SbtAnalysisTable::getInstance()->getHomeSbtHome(5,2);
	  $this->comm_eight_fourteen = SbtAnalysisTable::getInstance()->getHomeSbtHome(7,7);
	  $this->comm_fifteen_eighteen = SbtAnalysisTable::getInstance()->getHomeSbtHome(14,4);*/
	  $this->article_limit = 27;
	  $two_column_articles = SbtAnalysisTable::getInstance()->getHomeSbtHome(0,$this->article_limit);
	$last_column_articles = SbtAnalysisTable::getInstance()->getHomeSbtHome(27,8);
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
			$one_2_three[$i]['created_at'] = $data->created_at;
			$one_2_three[$i]['id'] = $data->id;
			$one_2_three[$i]['analysis_category_id'] = $data->analysis_category_id;
			$one_2_three[$i]['analysis_type_id'] = $data->analysis_type_id;
			$one_2_three[$i]['image_text'] = $data->image_text;
			$one_2_three[$i]['image'] = $data->image;
			$one_2_three[$i]['analysis_title'] = $data->analysis_title;
			$i++;
		}
		if(in_array($index, $arr_2)) 
		{
			$four_2_five[$j]['created_at'] = $data->created_at;
			$four_2_five[$j]['id'] = $data->id;
			$four_2_five[$j]['analysis_category_id'] = $data->analysis_category_id;
			$four_2_five[$j]['analysis_type_id'] = $data->analysis_type_id;
			$four_2_five[$j]['image_text'] = $data->image_text;
			$four_2_five[$j]['image'] = $data->image;
			$four_2_five[$j]['analysis_title'] = $data->analysis_title;
			$j++;		
		}
		if(in_array($index, $arr_3)) 
		{
			$six_2_eight[$k]['created_at'] = $data->created_at;
			$six_2_eight[$k]['id'] = $data->id;
			$six_2_eight[$k]['analysis_category_id'] = $data->analysis_category_id;
			$six_2_eight[$k]['analysis_type_id'] = $data->analysis_type_id;
			$six_2_eight[$k]['image_text'] = $data->image_text;
			$six_2_eight[$k]['image'] = $data->image;
			$six_2_eight[$k]['analysis_title'] = $data->analysis_title;
			$k++;				
		}
		if(in_array($index, $arr_4)) 
		{
			$nine_2_ten[$l]['created_at'] = $data->created_at;
			$nine_2_ten[$l]['id'] = $data->id;
			$nine_2_ten[$l]['analysis_category_id'] = $data->analysis_category_id;
			$nine_2_ten[$l]['analysis_type_id'] = $data->analysis_type_id;
			$nine_2_ten[$l]['image_text'] = $data->image_text;
			$nine_2_ten[$l]['image'] = $data->image;
			$nine_2_ten[$l]['analysis_title'] = $data->analysis_title;
			$l++;				
		}
		if(in_array($index, $arr_5)) 
		{
			$eleven_2_thirteen[$m]['created_at'] = $data->created_at;
			$eleven_2_thirteen[$m]['id'] = $data->id;
			$eleven_2_thirteen[$m]['analysis_category_id'] = $data->analysis_category_id;
			$eleven_2_thirteen[$m]['analysis_type_id'] = $data->analysis_type_id;
			$eleven_2_thirteen[$m]['image_text'] = $data->image_text;
			$eleven_2_thirteen[$m]['image'] = $data->image;
			$eleven_2_thirteen[$m]['analysis_title'] = $data->analysis_title;
			$m++;				
		}
		if(in_array($index, $arr_6)) 
		{
			$fourteen_2_fifteen[$n]['created_at'] = $data->created_at;
			$fourteen_2_fifteen[$n]['id'] = $data->id;
			$fourteen_2_fifteen[$n]['analysis_category_id'] = $data->analysis_category_id;
			$fourteen_2_fifteen[$n]['analysis_type_id'] = $data->analysis_type_id;
			$fourteen_2_fifteen[$n]['image_text'] = $data->image_text;
			$fourteen_2_fifteen[$n]['image'] = $data->image;
			$fourteen_2_fifteen[$n]['analysis_title'] = $data->analysis_title;
			$n++;				
		}
		if(in_array($index, $arr_7)) 
		{
			$sixteen_2_nineteen[$p]['created_at'] = $data->created_at;
			$sixteen_2_nineteen[$p]['id'] = $data->id;
			$sixteen_2_nineteen[$p]['analysis_category_id'] = $data->analysis_category_id;
			$sixteen_2_nineteen[$p]['analysis_type_id'] = $data->analysis_type_id;
			$sixteen_2_nineteen[$p]['image_text'] = $data->image_text;
			$sixteen_2_nineteen[$p]['image'] = $data->image;
			$sixteen_2_nineteen[$p]['analysis_title'] = $data->analysis_title;
			$p++;						
		}
		if(in_array($index, $arr_8)) 
		{
			$twenty_2_twentythree[$q]['created_at'] = $data->created_at;
			$twenty_2_twentythree[$q]['id'] = $data->id;
			$twenty_2_twentythree[$q]['analysis_category_id'] = $data->analysis_category_id;
			$twenty_2_twentythree[$q]['analysis_type_id'] = $data->analysis_type_id;
			$twenty_2_twentythree[$q]['image_text'] = $data->image_text;
			$twenty_2_twentythree[$q]['image'] = $data->image;
			$twenty_2_twentythree[$q]['analysis_title'] = $data->analysis_title;
			$q++;						
		}
		if(in_array($index, $arr_9)) 
		{
			$twentyfour_2_twentyseven[$r]['created_at'] = $data->created_at;
			$twentyfour_2_twentyseven[$r]['id'] = $data->id;
			$twentyfour_2_twentyseven[$r]['analysis_category_id'] = $data->analysis_category_id;
			$twentyfour_2_twentyseven[$r]['analysis_type_id'] = $data->analysis_type_id;
			$twentyfour_2_twentyseven[$r]['image_text'] = $data->image_text;
			$twentyfour_2_twentyseven[$r]['image'] = $data->image;
			$twentyfour_2_twentyseven[$r]['analysis_title'] = $data->analysis_title;
			$r++;						
		}
		
		$index++;
	}
	
	foreach($last_column_articles as $data)
	{
		$twentyeight_2_thirtyfive[$s]['created_at'] = $data->created_at;
		$twentyeight_2_thirtyfive[$s]['id'] = $data->id;
		$twentyeight_2_thirtyfive[$s]['analysis_category_id'] = $data->analysis_category_id;
		$twentyeight_2_thirtyfive[$s]['analysis_type_id'] = $data->analysis_type_id;
		$twentyeight_2_thirtyfive[$s]['image_text'] = $data->image_text;
		$twentyeight_2_thirtyfive[$s]['image'] = $data->image;
		$twentyeight_2_thirtyfive[$s]['analysis_title'] = $data->analysis_title;
		$s++;		
	}
	

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
			
	$this->comment_cnt = new SbtAnalysisComment();
	$this->mymarket = new mymarket(); 
		//--------------------------------------------------------------------------------------
		
		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $this->isSuperAdmin = 1;
	  	else $this->isSuperAdmin = 0;
		
		$this->user_id = $user_id;
         
        /* For random 5 article from Btshop article */
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        $this->adData = $btshop_article->getPublishedShopArticleDetailPage();
	}
	
	/*
	* Executes SubmitVoteForArticle action
	*
	* This function is used While saving vote for Article.
	*/
	public function executeSubmitVoteForArticle(sfWebRequest $request)
	{
		if ($request->isMethod('post'))
		{
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
			$analysis = new SbtAnalysis();
			
			$vote_details = new SbtVoteDetails();
			$rec_present = $vote_details->findVoteDetails(1,$arr['article_id'],$user_id);

			if($rec_present==0)
			{
				$data = $analysis->getSelectedArticle($arr['article_id']);
				$vote_details->addVoteDetails(1,$arr['article_id'],$data->author_id,$user_id,$arr['vote_type']);
			}
			
			$this->total_vote_cnt = $analysis->updateVoteCount($arr['article_id']);
			
			$analysis_comment = new SbtAnalysisComment();
			$this->comment_cnt = $analysis_comment->getTotalCommentCount($arr['article_id']);
			$this->no_of_stars = $vote_details->getStarForArticle($arr['article_id']);
			$this->article_id = $arr['article_id'];
		} 
	}

	/*
	* Executes CommentOnArticle action
	*
	* This function is used While commenting on Article.
	*/
	public function executeCommentOnArticle(sfWebRequest $request)
	{
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_analysis_details');
		$this->host_str = $this->getRequest()->getHost();
		$mymarket = new mymarket();

		$parent_menu = $this->getUser()->getAttribute('parent_menu');
		$submenu_menu = $this->getUser()->getAttribute('submenu_menu');
	
		$breadcrum_menu = new Article();
		$this->first_menu = $breadcrum_menu->getMenuItem($parent_menu);
		$this->first_url = $breadcrum_menu->getMenuUrl($parent_menu); 
	
		$second_menu = $breadcrum_menu->getMenuItem($submenu_menu);
		$second_url = $breadcrum_menu->getMenuUrl($submenu_menu);
	
		$article_id = $request->getParameter('article_id');
        $comment_subject =  $request->getParameter('borst_post_subject_sbt');
        //echo 'comment_subject='.$comment_subject;
		$analysis = new SbtAnalysis();
		$this->analysis_data = $analysis->getSelectedArticle($article_id);
		$this->similar_article_list = $analysis->getListOfSimilarSbtArticles($this->analysis_data,25);
		
		$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');

		$this->sbtAnalysisCommentForm = new SbtAnalysisCommentForm();
        //print_r($this->sbtAnalysisCommentForm);
		$this->sbtAnalysisCommentForm->setDefault('analysis_id',$article_id);
		$this->sbtAnalysisCommentForm->setDefault('comment_by',$user_id);
        $this->sbtAnalysisCommentForm->setDefault('subject',$comment_subject);
		$this->sbtAnalysisCommentForm->setDefault('created_at',date('Y-m-d H:i:s'));
		
		$sbtAnalysisCommentForm_data = $request->getParameter($this->sbtAnalysisCommentForm->getName());
		//print_r($sbtAnalysisCommentForm_data);die;
		if ($request->isMethod('post'))
		{ 
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$this->sbtAnalysisCommentForm->bind($sbtAnalysisCommentForm_data);
			if($this->sbtAnalysisCommentForm->isValid())
			{
				if($arr['borst_postid_sbt']!='')
				{
					$editpost_id = trim(str_replace('edit_link','',$arr['borst_postid_sbt'])); 
					$rec = Doctrine_Core::getTable('SbtAnalysisComment')->find($editpost_id);
					$rec->getSaveComment($sbtAnalysisCommentForm_data['comment'],$sbtAnalysisCommentForm_data['subject']);
				}	
				else
                {
                    //die;
                    //exit;
					$this->sbtAnalysisCommentForm->save();
				}
				$url = 'http://'.$this->host_str.'/sbt/commentOnArticle/article_id/'.$article_id;
				$this->redirect($url);
			}
			else
			{
				//$this->sbtAnalysisCommentForm->getErrorSchema();
			}
		} 
		
		$all_comments_query = SbtAnalysisCommentTable::getInstance()->getCommentsOnArticleQuery($article_id);
		$this->pager = $mymarket->getPagerForAll('SbtAnalysisComment','25',$all_comments_query,$request->getParameter('page', 1));
	 
		$second_menu = $this->analysis_data ? ucfirst($this->analysis_data->analysis_title) : 'Article Detail';
		$second_url = $breadcrum_menu->getMenuUrl($submenu_menu);
		isicsBreadcrumbs::getInstance()->addItem($second_menu, $second_url); 
		//isicsBreadcrumbs::getInstance()->addItem('Comment On Article', $second_url); 
		
		$this->profile = new SfGuardUserProfile();
		$cc = new SbtCombinedAnalysisData();
		$this->combine_data_str = $cc->searchRecordMakeLink($article_id);
		
		$this->ext = 'article_id='.$article_id;
		$this->analysis_id = $article_id;
		$this->comment_by = $user_id;
        $this->comment_subject = $comment_subject;
		
		//--------------------------------------------------------------------------------------
		// Collecting Category, Type and Object.
	  $cat_arr = $type_arr = $object_arr = array();
	  $this->month = array('01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAJ','06'=>'JUN','07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OKT','11'=>'NOV','12'=>'DEC');
		
	  $col1_13_heading_style_start = array('<h3 class="articleheading">','<h4 class="articleheading_varldens">','<h4 class="articleheading2"><b>');
	  $col1_13_heading_style_end = array('</h3>','</h4>','</b></h4>');
	  $col1_45_div_style = array('redheaing_sbt','blackheaing');
	  $col1_67_heading_style = array('articleheading_Kina','articleheading_Varldens2');
	  $col1_814_heading_style = array('articleheading3_1st','redheaing2sbt','articleheading3_2nd_sbt','articleheading_goda','articleheading3_1st','redheaing2sbt','articleheading3_2nd_sbt');
	  $last_column_style = array('adheading','adheadinggreen','adheading_small','adheading_v','adheading','adheadinggreen','adheading_small','adheading_v');
	  
	  $col1_1417_heading_style = array('adheading','adheadinggreen','adheading','adheading_v');
	  $image_arr_13 = array('articleleft_photo1.jpg','photo6.jpg','photo8.jpg');
	  $image_arr_67 = array('photo7.jpg','photo6.jpg');
	  $image_arr_814 = array('midadd.jpg','photo9.jpg','photo10.jpg','photo11.jpg','midadd.jpg','photo9.jpg','photo11.jpg');
	  $image_arr_1417 = array('photo1.jpg','photo2.jpg','photo3.jpg','photo4.jpg');
		
	  $cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
	  $type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
	  $object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		
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
		
	  // Articles related to Commodities.
	  if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	  else $isSuperAdmin = 0;	
		
	  /*$this->comm_one_three = SbtAnalysisTable::getInstance()->getHomeSbtHome(0,3);
	  $this->comm_four_five = SbtAnalysisTable::getInstance()->getHomeSbtHome(3,2);
	  $this->comm_six_seven = SbtAnalysisTable::getInstance()->getHomeSbtHome(5,2);
	  $this->comm_eight_fourteen = SbtAnalysisTable::getInstance()->getHomeSbtHome(7,7);
	  $this->comm_fifteen_eighteen = SbtAnalysisTable::getInstance()->getHomeSbtHome(14,4);*/
	  
	  $two_column_articles = SbtAnalysisTable::getInstance()->getHomeSbtHome(0,27);
	$last_column_articles = SbtAnalysisTable::getInstance()->getHomeSbtHome(27,8);
	
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
			$one_2_three[$i]['created_at'] = $data->created_at;
			$one_2_three[$i]['id'] = $data->id;
			$one_2_three[$i]['analysis_category_id'] = $data->analysis_category_id;
			$one_2_three[$i]['analysis_type_id'] = $data->analysis_type_id;
			$one_2_three[$i]['image_text'] = $data->image_text;
			$one_2_three[$i]['image'] = $data->image;
			$one_2_three[$i]['analysis_title'] = $data->analysis_title;
			$i++;
		}
		if(in_array($index, $arr_2)) 
		{
			$four_2_five[$j]['created_at'] = $data->created_at;
			$four_2_five[$j]['id'] = $data->id;
			$four_2_five[$j]['analysis_category_id'] = $data->analysis_category_id;
			$four_2_five[$j]['analysis_type_id'] = $data->analysis_type_id;
			$four_2_five[$j]['image_text'] = $data->image_text;
			$four_2_five[$j]['image'] = $data->image;
			$four_2_five[$j]['analysis_title'] = $data->analysis_title;
			$j++;		
		}
		if(in_array($index, $arr_3)) 
		{
			$six_2_eight[$k]['created_at'] = $data->created_at;
			$six_2_eight[$k]['id'] = $data->id;
			$six_2_eight[$k]['analysis_category_id'] = $data->analysis_category_id;
			$six_2_eight[$k]['analysis_type_id'] = $data->analysis_type_id;
			$six_2_eight[$k]['image_text'] = $data->image_text;
			$six_2_eight[$k]['image'] = $data->image;
			$six_2_eight[$k]['analysis_title'] = $data->analysis_title;
			$k++;				
		}
		if(in_array($index, $arr_4)) 
		{
			$nine_2_ten[$l]['created_at'] = $data->created_at;
			$nine_2_ten[$l]['id'] = $data->id;
			$nine_2_ten[$l]['analysis_category_id'] = $data->analysis_category_id;
			$nine_2_ten[$l]['analysis_type_id'] = $data->analysis_type_id;
			$nine_2_ten[$l]['image_text'] = $data->image_text;
			$nine_2_ten[$l]['image'] = $data->image;
			$nine_2_ten[$l]['analysis_title'] = $data->analysis_title;
			$l++;				
		}
		if(in_array($index, $arr_5)) 
		{
			$eleven_2_thirteen[$m]['created_at'] = $data->created_at;
			$eleven_2_thirteen[$m]['id'] = $data->id;
			$eleven_2_thirteen[$m]['analysis_category_id'] = $data->analysis_category_id;
			$eleven_2_thirteen[$m]['analysis_type_id'] = $data->analysis_type_id;
			$eleven_2_thirteen[$m]['image_text'] = $data->image_text;
			$eleven_2_thirteen[$m]['image'] = $data->image;
			$eleven_2_thirteen[$m]['analysis_title'] = $data->analysis_title;
			$m++;				
		}
		if(in_array($index, $arr_6)) 
		{
			$fourteen_2_fifteen[$n]['created_at'] = $data->created_at;
			$fourteen_2_fifteen[$n]['id'] = $data->id;
			$fourteen_2_fifteen[$n]['analysis_category_id'] = $data->analysis_category_id;
			$fourteen_2_fifteen[$n]['analysis_type_id'] = $data->analysis_type_id;
			$fourteen_2_fifteen[$n]['image_text'] = $data->image_text;
			$fourteen_2_fifteen[$n]['image'] = $data->image;
			$fourteen_2_fifteen[$n]['analysis_title'] = $data->analysis_title;
			$n++;				
		}
		if(in_array($index, $arr_7)) 
		{
			$sixteen_2_nineteen[$p]['created_at'] = $data->created_at;
			$sixteen_2_nineteen[$p]['id'] = $data->id;
			$sixteen_2_nineteen[$p]['analysis_category_id'] = $data->analysis_category_id;
			$sixteen_2_nineteen[$p]['analysis_type_id'] = $data->analysis_type_id;
			$sixteen_2_nineteen[$p]['image_text'] = $data->image_text;
			$sixteen_2_nineteen[$p]['image'] = $data->image;
			$sixteen_2_nineteen[$p]['analysis_title'] = $data->analysis_title;
			$p++;						
		}
		if(in_array($index, $arr_8)) 
		{
			$twenty_2_twentythree[$q]['created_at'] = $data->created_at;
			$twenty_2_twentythree[$q]['id'] = $data->id;
			$twenty_2_twentythree[$q]['analysis_category_id'] = $data->analysis_category_id;
			$twenty_2_twentythree[$q]['analysis_type_id'] = $data->analysis_type_id;
			$twenty_2_twentythree[$q]['image_text'] = $data->image_text;
			$twenty_2_twentythree[$q]['image'] = $data->image;
			$twenty_2_twentythree[$q]['analysis_title'] = $data->analysis_title;
			$q++;						
		}
		if(in_array($index, $arr_9)) 
		{
			$twentyfour_2_twentyseven[$r]['created_at'] = $data->created_at;
			$twentyfour_2_twentyseven[$r]['id'] = $data->id;
			$twentyfour_2_twentyseven[$r]['analysis_category_id'] = $data->analysis_category_id;
			$twentyfour_2_twentyseven[$r]['analysis_type_id'] = $data->analysis_type_id;
			$twentyfour_2_twentyseven[$r]['image_text'] = $data->image_text;
			$twentyfour_2_twentyseven[$r]['image'] = $data->image;
			$twentyfour_2_twentyseven[$r]['analysis_title'] = $data->analysis_title;
			$r++;						
		}
		
		$index++;
	}
	
	foreach($last_column_articles as $data)
	{
		$twentyeight_2_thirtyfive[$s]['created_at'] = $data->created_at;
		$twentyeight_2_thirtyfive[$s]['id'] = $data->id;
		$twentyeight_2_thirtyfive[$s]['analysis_category_id'] = $data->analysis_category_id;
		$twentyeight_2_thirtyfive[$s]['analysis_type_id'] = $data->analysis_type_id;
		$twentyeight_2_thirtyfive[$s]['image_text'] = $data->image_text;
		$twentyeight_2_thirtyfive[$s]['image'] = $data->image;
		$twentyeight_2_thirtyfive[$s]['analysis_title'] = $data->analysis_title;
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
			
			$this->comment_cnt = new SbtAnalysisComment();
			$this->mymarket = new mymarket(); 
		//--------------------------------------------------------------------------------------
	}
	
	/**
	* 
	* This function posts comment of a perticular article and get all previous comments.
	* 
	*/
	public function executePostCommentOnArticle(sfWebRequest $request)
	{
		$analysis_id = $request->getParameter('analysis_id');
		$comment_by = $request->getParameter('comment_by');
        $comment_subject =  $request->getParameter('sbt_analysis_comment_subject');
        
		$to_save = $request->getParameter('to_save');
		$mymarket = new mymarket();
		$analysis = new SbtAnalysis();
		
		$analysis_data = $analysis->getSelectedArticle($analysis_id); 
		
		$this->sbtAnalysisCommentForm = new SbtAnalysisCommentForm();
		$this->sbtAnalysisCommentForm->setDefault('analysis_id',$analysis_id);
		$this->sbtAnalysisCommentForm->setDefault('comment_by',$comment_by);
        $this->sbtAnalysisCommentForm->setDefault('subject',$comment_subject);
		$this->sbtAnalysisCommentForm->setDefault('created_at',date('Y-m-d H:i:s'));

		if ($request->isMethod('post'))
		{ 
			if($to_save == 1)
			{
				$arr = $this->getRequest()->getParameterHolder()->getAll();
				$sbtAnalysisCommentForm_data = $request->getParameter($this->sbtAnalysisCommentForm->getName());
				$this->sbtAnalysisCommentForm->bind($sbtAnalysisCommentForm_data);
				
				if($this->sbtAnalysisCommentForm->isValid())
				{
					if($arr['borst_postid_sbt']!='')
					{
						$editpost_id = trim(str_replace('edit_link','',$arr['borst_postid_sbt'])); 
						$rec = Doctrine_Core::getTable('SbtAnalysisComment')->find($editpost_id);
						$rec->getSaveComment($sbtAnalysisCommentForm_data['analysis_comment'],$sbtAnalysisCommentForm_data['subject']);
                        $this->getUser()->setFlash('notice','Comment Updated Successfully'); 	
					}	
					else
                    {
						$this->sbtAnalysisCommentForm->save();
                        $this->getUser()->setFlash('notice','Comment Added Successfully');
					}	
                    
					$this->getUser()->setAttribute('fav_notification','analysis_'.$analysis_id.'_'.$analysis_data->analysis_title);
				}
               
				
			}
		} 
        
		$all_comments_query = SbtAnalysisCommentTable::getInstance()->getCommentsOnArticleQuery($analysis_id);
		$this->pager = $mymarket->getPagerForAll('SbtAnalysisComment','25',$all_comments_query,$request->getParameter('page', 1));
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

		$comment = new SbtAnalysisComment();
		$post_data = $comment->getSelectedComment($editpost_id);
		return  $this->renderText($post_data);
	}
	
	/**
	* 
	* This function shows the messages to a perticular user.
	* 
	*/
	public function executeSbtMinProfileMessage(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileMessage');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		
		if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		//$id = $this->getRequestParameter('id');
		$id = $request->getParameter('id');
		
		$messageForm_arr = $this->data_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = $this->user_photo_arr = array();
		$this->visitor_list = '';
		
		$query = SbtMessagesTable::getInstance()->all_messages_query($id);
		
		$this->pager = new sfDoctrinePager('SbtMessages', '10');
 	 	$this->pager->setQuery($query);	
	 	$this->pager->setPage($request->getParameter('page', 1));
	 	$this->pager->init();
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
		
		$this->messageForm = new SbtMessagesForm();
		$this->messageForm->setDefault('message_to',$id);
		$this->messageForm->setDefault('message_from',$this->logged_user);
		$this->messageForm->setDefault('created_at',date("Y-m-d H:i:s"));
		
		$profile = new SfGuardUserProfile();
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->user_data = $profile->getUserData($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileMessage';
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		//$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		
		$userProfileImage = new SbtUserprofilePhoto(); 
	    $photo_data = $userProfileImage->fetchAllPhotoRecord();
	    for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; } 
		
		if($request->isMethod('post'))	
		{ 
			$arr = $this->getRequest()->getParameterHolder()->getAll();
	
			if($arr['sbt_messages'])
			{
				$messageForm_arr = $request->getParameter($this->messageForm->getName());
				//$id = $messageForm_arr['message_to'];
				
				$this->messageForm->bind($messageForm_arr);
				if($this->messageForm->isValid())
				{
					$record = $this->messageForm->save();
					//$url = 'http://'.$this->host_str.'/sbt/sbtMinProfileMessage/id/'.$id;
					//$this->redirect($url);
				}
				else{echo $this->messageForm->getErrorSchema();}
			}
		 }
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $id)
			{
				$this->friend_id[] = $friend->contactee_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
			}
			if($friend->contactee_id == $id)
			{
				$this->friend_id[] = $friend->contactor_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
			}
		}
		
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		//$this->all_messages = SbtMessagesTable::getInstance()->all_messages($id);
		
	}

	/**
	* 
	* This function shows all the forum post by a perticular user.
	* 
	*/
	public function executeSbtMinProfileForumPost(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileForumPost');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		//if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		//else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$id = $this->getRequestParameter('id');
		
		$messageForm_arr = $this->data_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
		$this->visitor_list = '';
		
		$profile = new SfGuardUserProfile();
		$this->user_data = $profile->getUserData($id);
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		
		$query = BtforumTable::getInstance()->getAllUserForumPostQuery($id,$this->user_data->firstname.' '.$this->user_data->lastname);
		
		$this->pager = new sfDoctrinePager('Btforum', '10');
 	 	$this->pager->setQuery($query);	
	 	$this->pager->setPage($request->getParameter('page', 1));
	 	$this->pager->init();
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
	
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileForumPost';
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $id)
			{
				$this->friend_id[] = $friend->contactee_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
			}
			if($friend->contactee_id == $id)
			{
				$this->friend_id[] = $friend->contactor_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
			}
		}
	}

	/**
	* 
	* This function shows all the blog post by a perticular user.
	* 
	*/
	public function executeSbtMinProfileBlogPost(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileBlogPost');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
    	if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $this->isSuperAdmin = 1;
        else
            $this->isSuperAdmin=0;
        		
        $id = $this->getRequestParameter('id');
		
		$this->data_arr = $cat_arr = $type_arr = $object_arr = $object_country_arr = array();
		$messageForm_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
		$this->visitor_list = '';
		
		$profile = new SfGuardUserProfile();
                $this->userName = $profile->getFullUserName($id);
		$mymarket = new mymarket(); 
		$this->user_data = $profile->getUserData($id);
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		
		$query = SbtUserBlogTable::getInstance()->getAllUserBlogPostQuery($id);
		
		$this->pager = $mymarket->getPagerForAll('SbtUserBlog','25',$query,$request->getParameter('page', 1));
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
		
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
		$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileBlogPost';
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr;
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $id)
			{
				$this->friend_id[] = $friend->contactee_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
			}
			if($friend->contactee_id == $id)
			{
				$this->friend_id[] = $friend->contactor_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
			}
		}
	}
	
   /**
	* 
	* This function fetches the logged in user's blog list data.
	* 
	*/
	public function executeGetMyBlogListData(sfWebRequest $request)
	{
		$this->host_str = $this->getRequest()->getHost();

		$id = $this->getRequestParameter('id') ? $this->getRequestParameter('id') : $this->logged_user;
		
		$mymarket = new mymarket();
		
		$this->cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$this->type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
		$this->object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('mybloglist_current_column','','userProperty');
		if($request->getParameter('page'))
		{
			$order = $request->getParameter('mybloglist_current_column_order');
		}
		else
		{
			if($current_column == $column_id)
			{ 
				$order = $this->getUser()->getAttribute('mybloglist_current_column_order','','userProperty');
		
				if($order == 'ASC') $order = 'DESC';
				else $order = 'ASC';
		
				$this->getUser()->setAttribute('mybloglist_current_column_order',$order,'userProperty');
			}
			else
			{
				$this->getUser()->setAttribute('mybloglist_current_column',$column_id,'userProperty');
				$this->getUser()->setAttribute('mybloglist_current_column_order','ASC','userProperty');
				$order = 'ASC';
			}
		}
		
		$query = SbtUserBlogTable::getInstance()->getAllMyBlogPostByOrderQuery($id,$column_id,$order);
	
	 	$this->pager = $mymarket->getPagerForAll('SbtUserBlog',25,$query,$request->getParameter('page', 1));
		$this->current_column_order = $order;
		$this->column_id = $column_id;
	}
	
   /**
	* 
	* This function deletes the selected blog topic
	* 
	*/
	public function executeDeleteBlogAndRelatedData(sfWebRequest $request)
	{
		$blog_id = str_replace('row_','',$request->getParameter('blog_id'));
		
		$blog = new SbtUserBlog();
		$sbt_vote_details = new SbtVoteDetails();
		$sbt_blog_comment = new SbtBlogComment();
		
		$blog->deleteBlogTopic($blog_id);
		$sbt_vote_details->deleteBlogRelatedRecords($blog_id);
		$sbt_blog_comment->deleteBlogComments($blog_id);
		
		return sfView::NONE;
	}
	

	/**
	* 
	* This function shows all the articles from Borstjanaren and SisterBt post by a perticular user.
	* 
	*/
	public function executeSbtMinProfileAllArticle(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileAllArticle');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$id = $this->getRequestParameter('id');
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		$this->allow_edit = $this->show_top_links == 1 ? ($this->getUser()->hasGroup('SbtArticlePublisher') ? 1 : 0) : 0;
		
		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	    else $isSuperAdmin = 0;	
		
		if($isSuperAdmin == 1 || $this->show_top_links == 1)  $show_all_records = 1;
		else   $show_all_records = 0;
		
		$this->data_arr = $cat_arr = $type_arr = $object_arr = $object_country_arr = array();
		$messageForm_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
		$this->visitor_list = '';
		
		$profile = new SfGuardUserProfile();
		$this->user_data = $profile->getUserData($id);
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		
		$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
		$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		
		$analysis_query = SbtAnalysisTable::getInstance()->getArticleFromSisQuery($id,$show_all_records);
		$this->analysis_pager = new sfDoctrinePager('SbtAnalysis', '10');
 	 	$this->analysis_pager->setQuery($analysis_query);	
	 	$this->analysis_pager->setPage($request->getParameter('page', 1));
	 	$this->analysis_pager->init();
		
		$article_query = ArticleTable::getInstance()->getArticleFromBorstQuery($id,$this->user_data->firstname.' '.$this->user_data->lastname);
		$this->article_pager = new sfDoctrinePager('Article', '10');
 	 	$this->article_pager->setQuery($article_query);	
	 	$this->article_pager->setPage($request->getParameter('page', 1));
	 	$this->article_pager->init();
		
		if($this->analysis_pager->getNbResults() > $this->article_pager->getNbResults())  
			$this->pager = $this->analysis_pager;
		else  
			$this->pager = $this->article_pager;
		
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileAllArticle';
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr;
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $id)
			{
				$this->friend_id[] = $friend->contactee_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
			}
			if($friend->contactee_id == $id)
			{
				$this->friend_id[] = $friend->contactor_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
			}
		}
	}
	
  	/*
	*
	* This function gives sorted list for article list and analysis data.
	*
	*/
	public function executeGetArticleAnalysisListData(sfWebRequest $request)
	{ 
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileAllArticle');
		$this->host_str = $this->getRequest()->getHost();
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$profile = new SfGuardUserProfile();
		
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('article_analysis_list_current_column','','userProperty');
		$page = $request->getParameter('page');
		$article_analysis_list_current_column_order = $request->getParameter('article_analysis_list_current_column_order');
		$set_column = 'article_analysis_list_current_column';
		$set_column_order = 'article_analysis_list_current_column_order';		
		
		$order = $profile->setSortingParameters($page,$article_analysis_list_current_column_order,$column_id,$current_column,$set_column,$set_column_order);
		
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		//$id = $this->getRequestParameter('id');
		$id = $request->getParameter('id');
		
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		$this->allow_edit = $this->show_top_links == 1 ? ($this->getUser()->hasGroup('SbtArticlePublisher') ? 1 : 0) : 0;

		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	    else $isSuperAdmin = 0;	
		
		if($isSuperAdmin == 1 || $this->show_top_links == 1)  $show_all_records = 1;
		else   $show_all_records = 0;
		
		$this->data_arr = $cat_arr = $type_arr = $object_arr = $object_country_arr = array();
		$messageForm_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
		$this->visitor_list = '';
		
		$mymarket = new mymarket();
		$this->user_data = $profile->getUserData($id);
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		
		$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
		$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		
		$analysis_query = SbtAnalysisTable::getInstance()->getArticleFromSisByOrderQuery($id,$column_id,$order,$show_all_records);
		$this->analysis_pager = $mymarket->getPagerForAll('SbtAnalysis',10,$analysis_query,$request->getParameter('page', 1));
		
		$article_query = ArticleTable::getInstance()->getArticleFromBorstByOrderQuery($id,$this->user_data->firstname.' '.$this->user_data->lastname,$column_id,$order);
		$this->article_pager = $mymarket->getPagerForAll('Article',10,$article_query,$request->getParameter('page', 1));
		
		if($this->analysis_pager->getNbResults() > $this->article_pager->getNbResults())  
			$this->pager = $this->analysis_pager;
		else  
			$this->pager = $this->article_pager;
		
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->parent_id = $request->getParameter('parent_id');
		$this->action = 'sbtMinProfileAllArticle';
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr;
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		$this->column_id = $column_id;
		$this->current_column_order = $order;
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	    $this->friend_id = $profile->getFriendIds($id,$all_friends);
		$this->friend_name = $profile->getFriendNames($id,$all_friends);
	}

	/**
	* 
	* This function shows all the articles,forum,blog post from Borstjanaren and SisterBt post by a perticular user.
	* 
	*/
	public function executeSbtMinProfileAllPost(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileAllPost');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$id = $this->getRequestParameter('id');
		
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		
		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	    else $isSuperAdmin = 0;	
		
		if($isSuperAdmin == 1 || $this->show_top_links == 1)  $show_all_records = 1;
		else   $show_all_records = 0;
		
		$this->data_arr = $cat_arr = $type_arr = $object_arr = $object_country_arr = $sort_arr = array();
		$messageForm_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
		$this->visitor_list = '';
		
		$profile = new SfGuardUserProfile();
		$this->user_data = $profile->getUserData($id);
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		
		$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
		$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		
		$analysis_query = SbtAnalysisTable::getInstance()->getArticleFromSisQuery($id,$show_all_records);
		$this->analysis_pager = new sfDoctrinePager('SbtAnalysis', '5');
 	 	$this->analysis_pager->setQuery($analysis_query);	
	 	$this->analysis_pager->setPage($request->getParameter('page', 1));
	 	$this->analysis_pager->init();
		$sort_arr[] = $this->analysis_pager->getNbResults();
		
		$article_query = ArticleTable::getInstance()->getArticleFromBorstQuery($id,$this->user_data->firstname.' '.$this->user_data->lastname);
		$this->article_pager = new sfDoctrinePager('Article', '5');
 	 	$this->article_pager->setQuery($article_query);	
	 	$this->article_pager->setPage($request->getParameter('page', 1));
	 	$this->article_pager->init();
		$sort_arr[] = $this->article_pager->getNbResults();
		
		$blog_query = SbtUserBlogTable::getInstance()->getAllUserBlogPostQuery($id);
		$this->blog_pager = new sfDoctrinePager('SbtUserBlog', '5');
 	 	$this->blog_pager->setQuery($blog_query);	
	 	$this->blog_pager->setPage($request->getParameter('page', 1));
	 	$this->blog_pager->init();
		$sort_arr[] = $this->blog_pager->getNbResults();
		
		$forum_query = BtforumTable::getInstance()->getAllUserForumPostQuery($id,$this->user_data->firstname.' '.$this->user_data->lastname);
		$this->forum_pager = new sfDoctrinePager('Btforum', '5');
 	 	$this->forum_pager->setQuery($forum_query);	
	 	$this->forum_pager->setPage($request->getParameter('page', 1));
	 	$this->forum_pager->init();
		$sort_arr[] = $this->forum_pager->getNbResults();
		
		if($sort_arr[0] > $sort_arr[1] && $sort_arr[0] > $sort_arr[2] && $sort_arr[0] > $sort_arr[3]) $this->pager = $this->analysis_pager;
		if($sort_arr[1] > $sort_arr[0] && $sort_arr[1] > $sort_arr[2] && $sort_arr[1] > $sort_arr[3]) $this->pager = $this->article_pager;
		if($sort_arr[2] > $sort_arr[0] && $sort_arr[2] > $sort_arr[1] && $sort_arr[2] > $sort_arr[3]) $this->pager = $this->blog_pager;
		if($sort_arr[3] > $sort_arr[0] && $sort_arr[3] > $sort_arr[1] && $sort_arr[3] > $sort_arr[2]) $this->pager = $this->forum_pager;
		
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileAllPost';
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr;
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $id)
			{
				$this->friend_id[] = $friend->contactee_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
			}
			if($friend->contactee_id == $id)
			{
				$this->friend_id[] = $friend->contactor_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
			}
		}
	}
  
	/**
	* 
	* This function is used when any user makes a friend request.
	* 
	*/
	public function executeViewAllRequest(sfWebRequest $request)
	{
		$id = $this->getRequestParameter('id');
		
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/viewAllRequest');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$messageForm_arr = $this->friend_id = $this->friend_name = $this->user_photo_arr = array();
	
		$query = SbtFriendRequestTable::getInstance()->getAllRequest($id);
		
		$this->pager = new sfDoctrinePager('SbtFriendRequest', '10');
 	 	$this->pager->setQuery($query);	
	 	$this->pager->setPage($request->getParameter('page', 1));
	 	$this->pager->init();
		$this->request_cnt = $this->pager->getNbResults();
		
		$profile = new SfGuardUserProfile();
		$this->user_data = $profile->getUserData($id);
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		
		$all_friends = $profile->fetchAllFriend($id);
	
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $id)
			{
				$this->friend_id[] = $friend->contactee_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
			}
			if($friend->contactee_id == $id)
			{
				$this->friend_id[] = $friend->contactor_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
			}
		}
		$userProfileImage = new SbtUserprofilePhoto(); 
		$photo_data = $userProfileImage->fetchAllPhotoRecord();
		for($i=0; $i<count($photo_data); $i++) {$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; } 
	}
	
	/**
	* 
	* This function is used to unblock the blocked user.
	* 
	*/
	public function executeBlockedUser(sfWebRequest $request)
	{
		$id = $this->getRequestParameter('id');
		
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/blockedUser');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$messageForm_arr = $this->friend_id = $this->friend_name = $this->user_photo_arr = array();
		
		$query = SbtFriendRequestTable::getInstance()->getAllBlockedUser($id);
		
		$this->pager = new sfDoctrinePager('SbtFriendRequest', '10');
 	 	$this->pager->setQuery($query);	
	 	$this->pager->setPage($request->getParameter('page', 1));
	 	$this->pager->init();
		$this->request_cnt = $this->pager->getNbResults();
		
		$profile = new SfGuardUserProfile();
		$this->user_data = $profile->getUserData($id);
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
	
		$all_friends = $profile->fetchAllFriend($id);
	
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $id)
			{
				$this->friend_id[] = $friend->contactee_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
			}
			if($friend->contactee_id == $id)
			{
				$this->friend_id[] = $friend->contactor_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
			}
		}
		$userProfileImage = new SbtUserprofilePhoto(); 
		$photo_data = $userProfileImage->fetchAllPhotoRecord();
		for($i=0; $i<count($photo_data); $i++) {$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; } 
	}

   /**
	* 
	* This function is to set the profile visibility status.
	* 
	*/
	public function executeSbtMinProfileVisibility(sfWebRequest $request)
	{
		$id = $this->getRequestParameter('id');
		$profile = new SfGuardUserProfile();
		$this->user_data = $profile->getUserData($id);

		if($request->isMethod('post'))	
	 	{ 
	 		$arr = $this->getRequest()->getParameterHolder()->getAll();
			$data = $profile->getUserData($arr['user_id']);

            if($arr['to_show_profile'][0] == 0 ) $data->hide_profile = 0;
			if($arr['to_show_profile'][0] == 1 ) $data->hide_profile = 1;
            if($arr['to_show_profile'][0] == 2 ) $data->hide_profile = 2;
			
			$data->save();
		}
		
		$this->user_id = $id;
		//return  $this->renderText($msg);
	}
	
   /**
	* 
	* This function updates the friend request status.
	* 
	*/
	public function executeUpdateFriendRequest(sfWebRequest $request)
	{
		$statusid = $this->getRequestParameter('statusid');
		$rec_id = $this->getRequestParameter('rec_id');
		$friend_reply = new SbtFriendRequest();
		$msg = '';
		
		switch($statusid)
		{
			case 1: $friend_reply->update_reply_status($statusid,$rec_id); $msg = 'Friend Request Accepted'; break;
			case 2: $friend_reply->update_reply_status($statusid,$rec_id); $msg = 'Friend Request Denied'; break;
			case 3: $friend_reply->update_reply_status($statusid,$rec_id); $msg = 'Requestor Blocked'; break;
			case 4: $friend_reply->update_reply_status($statusid,$rec_id); $msg = 'User UnBlocked'; break;
		}

		return  $this->renderText($msg);
	}

   /**
	* 
	* This function shows list of friends of a perticular user.
	* 
	*/
	public function executeSbtMinProfileFriends(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileFriends');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		
		if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$id = $this->getRequestParameter('id');
                $sender = $this->getRequestParameter('sender');
                $receiver = $this->getRequestParameter('receiver');
		
		$messageForm_arr = $this->data_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = $this->user_photo_arr = array();
		$this->visitor_list = '';
		//print_r($messageForm_arr);die;
		$userProfileImage = new SbtUserprofilePhoto(); 
                $photo_data = $userProfileImage->fetchAllPhotoRecord();
                for($i=0; $i<count($photo_data); $i++) 
                {
                    $this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name'];
                }
		
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		$query = SbtFriendRequestTable::getInstance()->fetchAllFriendQuery($id);
		
		$this->pager = new sfDoctrinePager('SfGuardUserProfile', '10');
 	 	$this->pager->setQuery($query);	
	 	$this->pager->setPage($request->getParameter('page', 1));
	 	$this->pager->init();
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
		
		$this->messageForm = new SbtMessagesForm();
		$this->messageForm->setDefault('message_to',$receiver);
		$this->messageForm->setDefault('message_from',$sender);
		$this->messageForm->setDefault('created_at',date("Y-m-d H:i:s"));
		
		$profile = new SfGuardUserProfile();
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->user_data = $profile->getUserData($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileFriends';
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	        //print_r($all_friends);die;
		foreach($all_friends as $friend)
		{ 
                    if($friend->contactor_id == $id)
                    {
                        $this->friend_id[] = $friend->contactee_id;
                        $this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
                    }
                    if($friend->contactee_id == $id)
                    {
                            $this->friend_id[] = $friend->contactor_id;
                            $this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
                    }
		}
		
		if($request->isMethod('post'))	
	 	{ 
	 		$arr = $this->getRequest()->getParameterHolder()->getAll();

			if($arr['sbt_messages'])
			{
				$messageForm_arr = $request->getParameter($this->messageForm->getName());
                                $messageForm_arr['message_to'] = $receiver;

                                //print_r($messageForm_arr);die;
				//$id = $messageForm_arr['message_to'];
			
				$this->messageForm->bind($messageForm_arr);
				if($this->messageForm->isValid())
				{
					$record = $this->messageForm->save();
					//$url = 'http://'.$this->host_str.'/sbt/sbtMinProfileFriends/id/'.$arr['uid'];
					//$this->redirect($url);
				}
				else{
				//echo $this->messageForm->getErrorSchema();
				}
			}
	 	}
	}
	
	/*
	* Executes SbtMinProfileMyAccount action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeSbtMinProfileMyAccount(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileFriends');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$id = $this->getRequestParameter('id');
		
		$messageForm_arr = $this->data_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
		$this->visitor_list = '';
		
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		$query = SbtFriendRequestTable::getInstance()->fetchAllFriendQuery($id);
		
		$this->pager = new sfDoctrinePager('SfGuardUserProfile', '10');
 	 	$this->pager->setQuery($query);	
	 	$this->pager->setPage($request->getParameter('page', 1));
	 	$this->pager->init();
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
		
		$profile = new SfGuardUserProfile();
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->user_data = $profile->getUserData($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileMyAccount';
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $id)
			{
				$this->friend_id[] = $friend->contactee_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
			}
			if($friend->contactee_id == $id)
			{
				$this->friend_id[] = $friend->contactor_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
			}
		}		
	}
	
	/*
	* Executes SbtMinProfileMeddelanden action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeSbtMinProfileMeddelanden(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileFriends');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$id = $this->getRequestParameter('id');
		
		$messageForm_arr = $this->data_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
		$this->visitor_list = '';
		
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		$query = SbtFriendRequestTable::getInstance()->fetchAllFriendQuery($id);
		
		$this->pager = new sfDoctrinePager('SfGuardUserProfile', '10');
 	 	$this->pager->setQuery($query);	
	 	$this->pager->setPage($request->getParameter('page', 1));
	 	$this->pager->init();
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
		
		$profile = new SfGuardUserProfile();
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->user_data = $profile->getUserData($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileMeddelanden';
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $id)
			{
				$this->friend_id[] = $friend->contactee_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
			}
			if($friend->contactee_id == $id)
			{
				$this->friend_id[] = $friend->contactor_id;
				$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
			}
		}		
	}
	
	/*
	* Executes SbtMinProfileMyFavorite action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeSbtMinProfileMyFavorite(sfWebRequest $request)
	{
		$mymarket = new mymarket();
		$favorite = new SbtFavorite();
        $btchart_favorite = new BtchartFavorite();
		$this->host_str = $this->getRequest()->getHost();
		$logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$analysis_query = $favorite->getSpecifiedFavorite('analysis',$logged_user);
		$article_query = $favorite->getSpecifiedFavorite('article',$logged_user);
		$forum_query = $favorite->getSpecifiedFavorite('forum',$logged_user);
		$blog_query = $favorite->getSpecifiedFavorite('blog',$logged_user);
        $chart_query = $btchart_favorite->getSpecifiedFavorite($logged_user);
		
		$this->analysis_pager = $mymarket->getPagerForAll('SbtFavorite',2,$analysis_query,$request->getParameter('page', 1));
		$this->article_pager = $mymarket->getPagerForAll('SbtFavorite',2,$article_query,$request->getParameter('page', 1));
		$this->forum_pager = $mymarket->getPagerForAll('SbtFavorite',2,$forum_query,$request->getParameter('page', 1));
		$this->blog_pager = $mymarket->getPagerForAll('SbtFavorite',2,$blog_query,$request->getParameter('page', 1));
        $this->chart_pager = $mymarket->getPagerForAll('BtchartFavorite',2,$chart_query,$request->getParameter('page', 1));
	}
	
	/*
	* Executes AddToMyFavorite action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeAddToMyFavorite(sfWebRequest $request)
	{
		$id = $request->getParameter('id');
		$arr = explode('_',$request->getParameter('id'));
		$item_name = $request->getParameter('item_name');
		
		$add_favorite = new SbtFavorite();
		$add_favorite->addToFavorite($arr,$item_name);
	}
        /*
         * Executes AddToMyFavorite action
         *
         * This function is used to display users invoice records.
         */

        public function executeSbtMinProfileInvoice(sfWebRequest $request) {
            $id = $request->getParameter('id');
            /* $query = Doctrine::getTable('Purchase')->invoiceRecordsForUser($id);

              $this->pager = new PagerNavigation();
              $this->pager->setRecord($query);
              $this->pager->setPageCount(8);
              $this->pager->setPage($request->getParameter('page', 1)); */

            $this->purchase = new Purchase();
            $this->product = new BtShopArticle();
            $subscription = new Subscription();
            $profile = new SfGuardUserProfile();
            $mymarket = new mymarket();
            $user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');

            if($id == $user_id){
                $id = $id;
                $query = Doctrine::getTable('Subscription')->createQuery('s')
                        ->innerJoin('s.Purchase p on s.purchase_id = p.id')
                        ->leftJoin('s.BtShopArticle bsa on s.product_id = bsa.id')
                        ->where("p.user_id = $id")
                        ->andWhere('p.checkout_status = 1')
                        ->andWhere('p.order_processed = 1')
                        ->groupby('p.id')
                        ->orderby('p.id DESC');
                
                $queryCount = count($query);
                if ($queryCount) {
                    $this->pageractive = $mymarket->getPagerForAll('Subscription', 20, $query, $request->getParameter('page', 1));
                }else{
                    $this->pageractive = 0;
                    $this->errMsg = 'Du har ingen order';
                }
            }else{
               $this->pageractive = 0;
               $this->errMsg = 'Du har ingen åtkomst';
            }
        }

        /*
         * Executes sbtMinProfileInvoicePartial action
         *
         * This function is used While saving vote for Blog.
         */

        public function executeSbtMinProfileInvoicePartial(sfWebRequest $request) {
            $this->purchase = new Purchase();
            $this->product = new BtShopArticle();
            $subscription = new Subscription();
            $profile = new SfGuardUserProfile();
            $mymarket = new mymarket();
            $this->profile = new SfGuardUserProfile();

            $id = $request->getParameter('id');
            $user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
            $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
            $current_column = $this->getUser()->getAttribute('bloglist_current_column', '', 'userProperty');
            $page = $request->getParameter('page');
            $bloglist_current_column_order = $request->getParameter('bloglist_current_column_order');
            $set_column = 'bloglist_current_column';
            $set_column_order = 'bloglist_current_column_order';

            $order = $this->profile->setSortingParameters($page, $bloglist_current_column_order, $column_id, $current_column, $set_column, $set_column_order);

            if($id == $user_id){
                $query = Doctrine::getTable('Subscription')->createQuery('s')
                        ->innerJoin('s.Purchase p on s.purchase_id = p.id')
                        ->leftJoin('s.BtShopArticle bsa on s.product_id = bsa.id')
                        ->where("p.user_id = $id")
                        ->andWhere('p.checkout_status = 1')
                        ->andWhere('p.order_processed = 1')
                        ->groupby('p.id')
                        ->orderby('p.id DESC');

                switch ($column_id) {
                    case 'start_date': $query = $query->orderBy('p.created_at ' . $order);
                        break;
                    case 'subscription': $query = $query->orderBy('bsa.btshop_article_title ' . $order);
                        break;
                    case 'default': $query = $query->orderBy('p.id DESC');
                        break;
                }
                if (!$column_id)
                    $query = $query->orderBy('p.id DESC');

                $this->pageractive = $mymarket->getPagerForAll('Subscription', 20, $query, $request->getParameter('page', 1));
                $this->current_column_order = $order;
                $this->column_id = $column_id;
            }else{
               $this->pageractive = 0;
               $this->errMsg = 'Du har ingen åtkomst';
            }
        }
	
	/*
	* Executes fetchMoreFavoriteRecords action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeFetchMoreFavoriteRecords(sfWebRequest $request)
	{
		$this->id = $request->getParameter('id');
		$this->host_str = $this->getRequest()->getHost();
		$mymarket = new mymarket();
		$favorite = new SbtFavorite();
                $btchart_favorite = new BtchartFavorite();
		
		$logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		if($request->getParameter('delete_id'))
		{
			$rec = $favorite->getSingleFavoriteRecord($request->getParameter('delete_id'));
                        if($this->id == 'fav_chart_listing')
                            $rec = 	$btchart_favorite->getSingleFavoriteRecord($request->getParameter('delete_id'));
			if($rec) 
                            $rec->delete();
		}
                $this->profile = new SfGuardUserProfile();

                //$id = $request->getParameter('id');
                $user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
                $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
                $current_column = $this->getUser()->getAttribute('bloglist_current_column', '', 'userProperty');
                $page = $request->getParameter('page');
                $bloglist_current_column_order = $request->getParameter('bloglist_current_column_order');
                $set_column = 'bloglist_current_column';
                $set_column_order = 'bloglist_current_column_order';
                $order = $this->profile->setSortingParameters($page, $bloglist_current_column_order, $column_id, $current_column, $set_column, $set_column_order);

                $this->current_column_order = $order;
                $this->column_id = $column_id;
                
                $analysis_query = $favorite->getSpecifiedFavorite('analysis',$logged_user);
		$article_query = $favorite->getSpecifiedFavorite('article',$logged_user,$column_id,$order);
		$forum_query = $favorite->getSpecifiedFavorite('forum',$logged_user,$column_id,$order);
		$blog_query = $favorite->getSpecifiedFavorite('blog',$logged_user,$column_id,$order);
		$chart_query = $btchart_favorite->getSpecifiedFavorite($logged_user,$column_id,$order);
        
		$this->analysis_pager = $mymarket->getPagerForAll('SbtFavorite',10,$analysis_query,$request->getParameter('page', 1));
		$this->article_pager = $mymarket->getPagerForAll('SbtFavorite',10,$article_query,$request->getParameter('page', 1));
		$this->forum_pager = $mymarket->getPagerForAll('SbtFavorite',10,$forum_query,$request->getParameter('page', 1));
		$this->blog_pager = $mymarket->getPagerForAll('SbtFavorite',10,$blog_query,$request->getParameter('page', 1));
                $this->chart_pager = $mymarket->getPagerForAll('BtchartFavorite',10,$chart_query,$request->getParameter('page', 1));  
	}
	
	/*
	* Executes saveFavoriteNotificationChanges action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeSbtMinProfileSaveENewsLetter(sfWebRequest $request)
	{
                $favorite = new SbtFavorite();
                $id = $request->getParameter('id');
                $value = $request->getParameter('val');
                if($id){
                    $data = $favorite->getSingleFavoriteRecord($id);
                    if($data)
                    {
                        $data->f_notification = $value;
                        $data->save();
                    }                
                }
		return sfView::NONE;
	}
        
   /*
	* Executes saveFavoriteNotificationChanges action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeSaveFavoriteNotificationChanges(sfWebRequest $request)
	{
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$favorite = new SbtFavorite();

		foreach ($arr['fav_rec'] as $key => $value) 
		{
			$data = $favorite->getSingleFavoriteRecord($key);
			if($data)
			{
				$data->f_notification = $value;
				$data->save();
			}
		}
		return sfView::NONE;
	}
	
	
   /*
	* Executes sbtMinProfileMyENewsLetter action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeSbtMinProfileMyENewsLetter(sfWebRequest $request)
	{
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

		if($request->isMethod('post'))	
	 	{ 
	 		$arr = $this->getRequest()->getParameterHolder()->getAll();
			$btNewsletterSubscriber = new BtNewsletterSubscriber();
			$btNewsletterSubscriber->updateUserNewsletterSubscription($arr);
                        
                        /* Code for change,delete and update subscription from my profile e-mail page start here*/
                        $newsletterPublic = new NewsletterPublic();
                        $newsletterAccount = new NewsletterAccount();
                        
                        if(count($arr['news']) == 1){
                            if($arr['news'][0] == 2){
                                $account_data = $newsletterAccount->isNewsAccountEmailPresent($arr['email']);
                                if($account_data) $account_data->delete();

                                $public_data = $newsletterPublic->IsNewsletterPublic($arr['email']);
                                if(!$public_data) $newsletterPublic->addNewsletterPublic($arr['email']);
                            }else{
                                $public_data = $newsletterPublic->IsNewsletterPublic($arr['email']);
                                if($public_data) $public_data->delete();
                                
                                $account_data = $newsletterAccount->isNewsAccountEmailPresent($arr['email']);
                                if(!$account_data) $newsletterAccount->addEmail($arr['email']);
                            }
                        }
                        else if(count($arr['news']) > 1){
                            
                            $public_data = $newsletterPublic->IsNewsletterPublic($arr['email']);
                            if(!$public_data) $newsletterPublic->addNewsletterPublic($arr['email']);
                            
                            $account_data = $newsletterAccount->isNewsAccountEmailPresent($arr['email']);
                            if(!$account_data) $newsletterAccount->addEmail($arr['email']);
                        }
                        else{
                            $public_data = $newsletterPublic->IsNewsletterPublic($arr['email']);
                            if($public_data) $public_data->delete();
                            
                            $account_data = $newsletterAccount->isNewsAccountEmailPresent($arr['email']);
                            if($account_data) $account_data->delete();
                        }
                        /* Code for change,delete and update subscription from my profile e-mail page end here*/
		}
	}
	
        
        /*
	* Executes sbtMinProfileMyENewsLetter action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeSbtMinProfileMyENewsLetterDaily(sfWebRequest $request)
	{
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

		if($request->isMethod('post'))	
	 	{ 
	 		$arr = $this->getRequest()->getParameterHolder()->getAll();
			$btNewsletterSubscriber = new BtNewsletterSubscriber();
			$btNewsletterSubscriber->updateUserNewsletterSubscriptionDaily($arr);
                        
                        /* Code for change,delete and update subscription from my profile e-mail page start here*/
                        $newsletterPublic = new NewsletterPublic();
                        $newsletterAccount = new NewsletterAccount();
                        
                        if(count($arr['news']) == 1){
                            if($arr['news'][0] == 2){
                                $account_data = $newsletterAccount->isNewsAccountEmailPresent($arr['email']);
                                if($account_data) $account_data->delete();

                                $public_data = $newsletterPublic->IsNewsletterPublic($arr['email']);
                                if(!$public_data) $newsletterPublic->addNewsletterPublic($arr['email']);
                            }else{
                                $public_data = $newsletterPublic->IsNewsletterPublic($arr['email']);
                                //if($public_data) $public_data->delete();
                                
                                $account_data = $newsletterAccount->isNewsAccountEmailPresent($arr['email']);
                                if(!$account_data) $newsletterAccount->addEmail($arr['email']);
                            }
                        }
                        else if(count($arr['news']) > 1){
                            
                            $public_data = $newsletterPublic->IsNewsletterPublic($arr['email']);
                            if(!$public_data) $newsletterPublic->addNewsletterPublic($arr['email']);
                            
                            $account_data = $newsletterAccount->isNewsAccountEmailPresent($arr['email']);
                            if(!$account_data) $newsletterAccount->addEmail($arr['email']);
                        }
                        else{
                            $public_data = $newsletterPublic->IsNewsletterPublic($arr['email']);
                            //if($public_data) $public_data->delete();
                            
                            $account_data = $newsletterAccount->isNewsAccountEmailPresent($arr['email']);
                            if($account_data) $account_data->delete();
                        }
                        /* Code for change,delete and update subscription from my profile e-mail page end here*/
		}
	}
   /*
	* Executes sbtMinProfileMySubscription action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeSbtMinProfileMySubscription(sfWebRequest $request)
	{
                $this->purchase = new Purchase();
		$this->product = new BtShopArticle();
		$subscription = new Subscription();
		$profile = new SfGuardUserProfile();
		$mymarket = new mymarket();
		
		$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		//$pur_id_arr = $this->purchase->getPurchaseOrderOfUser($user_id);
		//$pur_id_str = implode(",", $pur_id_arr);

		//$query = $subscription->getAllUniqueSubscriptionOfUserQuery($pur_id_str);               
                //$query = Doctrine::getTable('Subscription')->createQuery('s')->innerJoin('s.Purchase p on s.purchase_id = p.id')->where("p.user_id = $user_id");
                //echo       $query->getSqlQuery();die; 
                $query = Doctrine::getTable('Subscription')->createQuery('s')
                        ->innerJoin('s.Purchase p on s.purchase_id = p.id')
                        ->leftJoin('s.BtShopArticle bsa on s.product_id = bsa.id')
                        ->where("p.user_id = $user_id")
                        ->orderby('s.end_date DESC');
                if($query)
		{
			$this->pager = $mymarket->getPagerForAll('Subscription',20,$query,$request->getParameter('page', 1));
		}
                
                $queryactive = Doctrine::getTable('Subscription')->createQuery('s')
                        ->innerJoin('s.Purchase p on s.purchase_id = p.id')
                        ->leftJoin('s.BtShopArticle bsa on s.product_id = bsa.id')
                        ->where("p.user_id = $user_id")
                        ->andWhere('s.start_date <= CURDATE()')
                        ->andWhere('s.end_date >= CURDATE()')
                        ->andWhere('p.checkout_status = 1')
                        ->orderby('s.end_date DESC');
                //echo       $query->getSqlQuery();die;  ->andWhere('p.checkout_status = 1')
                if($queryactive)
		{
			$this->pageractive = $mymarket->getPagerForAll('Subscription',20,$queryactive,$request->getParameter('page', 1));
		}
	}

	
   /*
	* Executes fetchMoreMySubscription action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeFetchMoreMySubscription(sfWebRequest $request)
	{
		$this->purchase = new Purchase();
		$this->product = new BtShopArticle();
		$subscription = new Subscription();
		$profile = new SfGuardUserProfile();
		$mymarket = new mymarket();
		$this->profile = new SfGuardUserProfile();
                
		$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');                
                $column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('bloglist_current_column','','userProperty');
		$page = $request->getParameter('page');
		$bloglist_current_column_order = $request->getParameter('bloglist_current_column_order');
		$set_column = 'bloglist_current_column';
		$set_column_order = 'bloglist_current_column_order';
		
		$order = $this->profile->setSortingParameters($page,$bloglist_current_column_order,$column_id,$current_column,$set_column,$set_column_order);		
		//$query = SbtUserBlogTable::getInstance()->getAllSbtBlogPostByOrderQuery($column_id,$order,$blog_cat_id);        
                
                $query = Doctrine::getTable('Subscription')->createQuery('s')
                        ->innerJoin('s.Purchase p on s.purchase_id = p.id')
                        ->leftJoin('s.BtShopArticle bsa on s.product_id = bsa.id')
                        ->where("p.user_id = $user_id")
                        ->orderby('s.end_date DESC');

		switch($column_id)
		{
			case 'start_date':  $query = $query->orderBy('s.start_date '.$order); break;
			case 'end_date':  $query = $query->orderBy('s.end_date '.$order); break;
                        case 'status':  $query = $query->orderBy('p.checkout_status '.$order); break;			
			case 'subscription':  $query = $query->orderBy('bsa.btshop_article_title '.$order); break;			
			case 'default':  $query = $query->orderBy('s.created_at DESC'); break;
		} 
		if(!$column_id) $query = $query->orderBy('s.created_at DESC');                
		
		$this->pager = $mymarket->getPagerForAll('Subscription',20,$query,$request->getParameter('page', 1));
                $this->current_column_order = $order;
		$this->column_id = $column_id;
	}
	
	
        /*
	* Executes fetchMoreMyActiveSubscription action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeFetchMoreMyActiveSubscription(sfWebRequest $request)
	{
		$this->purchase = new Purchase();
		$this->product = new BtShopArticle();
		$subscription = new Subscription();
		$profile = new SfGuardUserProfile();
		$mymarket = new mymarket();
		$this->profile = new SfGuardUserProfile();               
                
                $user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');                
                $column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('bloglist_current_column','','userProperty');
		$page = $request->getParameter('page');
		$bloglist_current_column_order = $request->getParameter('bloglist_current_column_order');
		$set_column = 'bloglist_current_column';
		$set_column_order = 'bloglist_current_column_order';
		
		$order = $this->profile->setSortingParameters($page,$bloglist_current_column_order,$column_id,$current_column,$set_column,$set_column_order);
                               
                $query = Doctrine::getTable('Subscription')->createQuery('s')
                        ->innerJoin('s.Purchase p on s.purchase_id = p.id')
                        ->leftJoin('s.BtShopArticle bsa on s.product_id = bsa.id')
                        ->where("p.user_id = $user_id")
                        ->andWhere('s.start_date <= CURDATE()')
                        ->andWhere('s.end_date >= CURDATE()')
                        ->andWhere('p.checkout_status = 1')
                        ->orderby('s.end_date DESC');

		switch($column_id)
		{
			case 'start_date':  $query = $query->orderBy('s.start_date '.$order); break;
			case 'end_date':  $query = $query->orderBy('s.end_date '.$order); break;
                        case 'status':  $query = $query->orderBy('p.checkout_status '.$order); break;			
			case 'subscription':  $query = $query->orderBy('bsa.btshop_article_title '.$order); break;			
			case 'default':  $query = $query->orderBy('s.created_at DESC'); break;
		}		 
		if(!$column_id) $query = $query->orderBy('s.created_at DESC');                
		
		$this->pageractive = $mymarket->getPagerForAll('Subscription',20,$query,$request->getParameter('page', 1));
                $this->current_column_order = $order;
		$this->column_id = $column_id;
	}
	/*
	* Executes SubmitVoteForBlog action
	*
	* This function is used While saving vote for Blog.
	*/
	public function executeSubmitVoteForBlog(sfWebRequest $request)
	{
		if ($request->isMethod('post'))
		{
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
			
			$blog = new SbtUserBlog();
			$this->total_vote_cnt = $blog->updateVoteCountForBlog($arr['blog_id']);
			
			$vote_details = new SbtBlogVoteDetails();
			$rec_present = $vote_details->findVoteDetails(2,$arr['blog_id'],$user_id);
			
			if($rec_present==0)
			{
				$data = $blog->getSelectedBlog($arr['blog_id']);
				$vote_details->addVoteDetails(2,$arr['blog_id'],$data->author_id,$user_id,$arr['vote_type']);
			}
			
			//$analysis_comment = new SbtAnalysisComment();
			//$this->comment_cnt = $analysis_comment->getTotalCommentCount($arr['article_id']);
			$this->no_of_stars = $vote_details->getStarForBlog($arr['blog_id']);
			$this->blog_id = $arr['blog_id'];
		} 
	}
	
   /**
	* 
	* This function fetches the date on which blogs where written.
	* 
	*/
	public function executeGetBlogCreationDates(sfWebRequest $request)
	{
		$month = $this->getRequestParameter('month');
		$year = $this->getRequestParameter('year');
		$last_date = $this->getRequestParameter('last_date');
		$user_id = $this->getRequestParameter('user_id');

		$blog_date = new SbtUserBlog();
		$post_data = $blog_date->fetchtBlogCreationDates($year,$month,$last_date,$user_id);
		
		return  $this->renderText($post_data);
	}
	
   /**
	* 
	* This function fetches the date on which blogs where written.
	* 
	*/
	public function executeGetBlogOfMonth(sfWebRequest $request)
	{
		$month = $this->getRequestParameter('month');
		$year = $this->getRequestParameter('year');
		$last_date = $this->getRequestParameter('last_date');
		$user_id = $this->getRequestParameter('user_id');
		$this->mymarket_title = new mymarket();

		$blog_date = new SbtUserBlog();
		$this->data = $blog_date->fetchtBlogOfMonth($year,$month,$last_date,$user_id);
	}
	
   /**
	* 
	* This function fetches the date of a perticular user for editing.
	* 
	*/
	public function executeEditProfile(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfile');

	        $this->msg = '' ;
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		//$arrLand = array('1'=>'Sverige','2'=>'Norge','3'=>'Finland','4'=>'Danmark','5'=>'Other');
		$countries = new Countries();
		$all_country_data = $countries->getAllCountries();
		$arrLand = array();
		foreach($all_country_data as $data):
			$arrLand[$data->iso_code] = $data->country_name;
		endforeach;

		$arrBirthDate = $my_five_best_recommendations = $my_shortlist = $profileForm_arr = $sbtBlogProfile_arr = $this->data_arr = array();
		$arrProfileCheck = array('','Required','Symboler eller specialtecken är inte tillåtna','Antalet är inte tillåtet');
		$arrNumberCheck = array('','Required','Bara siffror är tillåtna','ofullständig postnummer','Minst 5 tecken krävs','Maximalt 5 tecken endast','2-10 tecken är tillåtna','specialtecken är inte tillåtet');
                $error_flag = $j = $k = $user_email_flag = $send_activation_mail_flag = 0;
		$recomm_str = $shortlist_str = '';
		$my_trade_arr = array();

		$arrBirthDate[0] = 'Årtal';
		for($i=1910; $i <= 1999; $i++)
		{
			$arrBirthDate[$i] = $i;
		}

		$id = $this->getRequestParameter('edit_user_id');
		$profile = new SfGuardUserProfile();
		$sbt_blog_profile = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
                //print_r($sbt_blog_profile);die;
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);

		$userProfileImage = new SbtUserprofilePhoto();
		$this->user_photo_data = $userProfileImage->searchForRecord($id);
		$userPorfileModel = Doctrine::getTable('SfGuardUserProfile')->getProfileuserFromSfGaurdUser($id);
		$this->user_profile = new SfGuardUserProfile($userPorfileModel);

		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->user_data = $profile->getUserData($id);
		$this->user_guard_data = $profile->fetchOneUser($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->own_profile = $id == $this->logged_user ? 1 : 0;

		$this->blog_info_div = $sbt_blog_profile ? 'show' : 'hide';

		$medal_detail = new SbtAuthorMedalDetails();
		$this->gold_cnt = $medal_detail->getUserAwardTypeCount($id,'1');
		$this->silver_cnt = $medal_detail->getUserAwardTypeCount($id,'2');
		$this->bronze_cnt = $medal_detail->getUserAwardTypeCount($id,'3');

		$this->profileForm = new AddSfGuardUserProfileForm($userPorfileModel);

		$this->wSchema = $this->profileForm->getWidgetSchema();
		$this->wSchema['email'] = new sfWidgetFormInputText();
		//$this->wSchema['username'] = new sfWidgetFormInputText();
		$this->wSchema['year_of_birth']->setOption('choices',$arrBirthDate);
		$this->wSchema['land']->setOption('choices',$arrLand);
		$this->profileForm->setDefault('land',$this->user_data->land);
		$this->profileForm->setDefault('year_of_birth',$this->user_data->year_of_birth);
		$this->gender = $this->user_data->gender;

		$this->sbtBlogProfileForm = new AddSbtBlogProfileForm($sbt_blog_profile);
		$this->wSchema = $this->sbtBlogProfileForm->getWidgetSchema();
		$this->sbtBlogProfileForm->setDefault('user_id',$id);

		$this->type_of_speculator = $sbt_blog_profile->type_of_speculator;
		$this->my_trade_str = $sbt_blog_profile->my_trade;
		$this->my_occupation = $sbt_blog_profile->my_occupation;//die;
                //$this->my_occ = $sbt_blog_profile->my_occupation;
		$this->is_millionaire = $sbt_blog_profile->is_millionaire;
		$this->my_five_best_recommendations = explode(',',$sbt_blog_profile->my_five_best_recommendations);
		$this->my_shortlist = explode(',',$sbt_blog_profile->my_shortlist);

		$this->messageForm = new SbtMessagesForm();
		$this->messageForm->setDefault('message_to',$id);
		$this->messageForm->setDefault('message_from',$this->logged_user);
		$this->messageForm->setDefault('created_at',date("Y-m-d H:i:s"));

		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));

		if($this->user_data->email == $this->user_data->username) $this->checked = "checked";
		else $this->checked = "";

		if ($request->isMethod('post'))
		{
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$profileForm_arr = $request->getParameter($this->profileForm->getName());
			$sbtBlogProfile_arr = $request->getParameter($this->sbtBlogProfileForm->getName());
			$prof_user = new SfGuardUserProfile();

			// Checking if use email as username is checked.
			if (isset($arr["use_email_as_username"]))
			{
				$this->checked = "checked";
				$this->email_red = $prof_user->checkEmailAsUsernameOfUser($profileForm_arr);

				if($this->email_red=='')
				{
					$profileForm_arr["username"] = $profileForm_arr['email'];
					$uname = $profileForm_arr['email'];
				}
				else
				{
					$this->hide_username_error = 'display:none';
					$user_email_flag = 1;
				}
			}
			else
			{
				$this->hide_username_error = 'display:block';

				$this->checked = "";
				$this->username_red = $prof_user->checkUsernameForEditUser($profileForm_arr);
				$this->email_red = $prof_user->checkEmailForEditUser($profileForm_arr);

				if($this->username_red=='' && $this->email_red=='') $username_email_flag = 0;
				else $username_email_flag = 1;
				$uname = $profileForm_arr["username"];
			}

			$profileForm_arr['gender'] = $arr['gender'];

			// Checking profile fields
			$this->birth_year_error = $arrProfileCheck[$prof_user->checkBithDate($profileForm_arr['year_of_birth'])];
                        $this->gender_error = $arrProfileCheck[$prof_user->checkGender($profileForm_arr['gender'])];
			$this->firstname_error = $arrProfileCheck[$prof_user->checkScriptTags($profileForm_arr['firstname'])];
			$this->lastname_error = $arrProfileCheck[$prof_user->checkScriptTags($profileForm_arr['lastname'])];
			$this->street_error = $arrProfileCheck[$prof_user->checkScriptTags($profileForm_arr['street'])];
                        $this->city_error = $arrProfileCheck[$prof_user->checkCity($profileForm_arr['city'])];
			$this->zipcode_error = $arrNumberCheck[$prof_user->checkZipcode($profileForm_arr['zipcode'],$profileForm_arr['land'])];
			$this->phone_error = $arrNumberCheck[$prof_user->checkPhonenumber($profileForm_arr['phone'])];

			$birth_year_val = $prof_user->checkBithDate($profileForm_arr['year_of_birth']);
                        $gender_error_val = $prof_user->checkGender($profileForm_arr['gender']);
			$first_error_val = $prof_user->checkScriptTags($profileForm_arr['firstname']);
			$lastname_error_val = $prof_user->checkScriptTags($profileForm_arr['lastname']);
			$street_error_val = $prof_user->checkScriptTags($profileForm_arr['street']);
			$city_error_val = $prof_user->checkCity($profileForm_arr['city']);
			$zipcode_error_val = $prof_user->checkZipcode($profileForm_arr['zipcode'],$profileForm_arr['land']);
			$phone_error_val = $prof_user->checkPhonenumber($profileForm_arr['phone']);


			if($birth_year_val > 0 || $gender_error_val > 0 || $first_error_val > 0 || $lastname_error_val > 0 || $street_error_val > 0 || $city_error_val > 0 || $zipcode_error_val > 0 || $phone_error_val > 0 || $user_email_flag > 0 || $username_email_flag > 0)
			{
				$error_flag = 1;
			}

			// Weither to show the blog info part or not.
			if($arr['type_of_speculator'] || /*$arr['user_title'] || $arr['not_on_stock'] ||*/ $arr['my_trade'] || $arr['my_occupation'] || $arr['is_millionaire'] || /*$sbtBlogProfile_arr['my_own_writing']!='' ||*/ $sbtBlogProfile_arr['broker_used']!='' || $sbtBlogProfile_arr['my_best_trade']!='' || $sbtBlogProfile_arr['my_worst_trade']!='' || $sbtBlogProfile_arr['my_five_best_recommendations']!='' || $sbtBlogProfile_arr['my_shortlist']!='')
			{
				$this->blog_info_div = 'show';
			}

                        //print_r($arr);//die;
                      /* 09-may-13
                         if($arr['submit']=='SKICKA'  && ( $arr['type_of_speculator']!='' || $sbtBlogProfile_arr['broker_used']!='' || $arr['my_trade']!='' || $arr['my_occupation']!='' || $arr['is_millionaire']!='' || $sbtBlogProfile_arr['my_best_trade']!='' || $sbtBlogProfile_arr['my_worst_trade']!=''))
                            {
                                 $this->btn = 'skicka';
                                //$profileForm_arr['type_of_speculator'] = $arr['type_of_speculator'];
				$this->type_of_speculator_error = empty($arr['type_of_speculator']) ? 'Required' : '';
				$this->broker_used_error = empty($sbtBlogProfile_arr['broker_used']) ? 'Required' : '';
				$this->my_trade_error = empty($arr['my_trade']) ? 'Required' : '';
				$this->my_occupation_error = empty($arr['my_occupation']) ? 'Required' : '';
				$this->is_millionaire_error = empty($arr['is_millionaire']) ? 'Required' : '';
				$this->my_best_trade_error = empty($sbtBlogProfile_arr['my_best_trade']) ? 'Required' : '';
				$this->my_worst_trade_error = empty($sbtBlogProfile_arr['my_worst_trade']) ? 'Required' : '';
                                if($arr['my_occupation'] == 'other')
				{
					$this->other_occ_error = empty($arr['other_occ']) ? 'Required' : '';
				}
				else
					$this->other_occ_error = '';

                                if($this->type_of_speculator_error !='' || $this->broker_used_error !='' || $this->my_trade_error !='' || $this->my_occupation_error !='' || $this->is_millionaire_error != '' || $this->my_best_trade_error != '' || $this->my_worst_trade_error !='' || $this->other_occ_error !='')
				{
					$error_flag = 1;
				}
                                else
                                {
                                    $error_flag = 0;
                                }

				if($this->user_data->from_sbt == 0) $profileForm_arr['from_sbt'] = 1;
                        }
                        else
			{
				$profileForm_arr['from_sbt'] = 0;
			}
                       * 09-may-13
                       */

                        if($this->user_data->from_sbt == 0) $profileForm_arr['from_sbt'] = 1; // 09-may-13 set from_sbt to display create blog without fill blog profile info
                        
			/* Checking Blog rights information filled by user. */
			if( $arr['submit']=='SPARA'   )
			{
                          /* 
                           * 09-may-13

                           if($arr['type_of_speculator']!='' || $sbtBlogProfile_arr['broker_used']!='' || $arr['my_trade']!='' || $arr['my_occupation']!='' || $arr['is_millionaire']!='' || $sbtBlogProfile_arr['my_best_trade']!='' || $sbtBlogProfile_arr['my_worst_trade']!='')
                           {

                            if($userPorfileModel->sbt_active==0)
                                $msg = 'Dina ändringar har blivit sparade, men ytterligare fält behöver fyllas i för att fullfölja Syster BT-registreringen. Välkommen att komplettera din anmälan när helst du vill!';
                               // $profileForm_arr['type_of_speculator'] = $arr['type_of_speculator'];

				$this->type_of_speculator_error = empty($arr['type_of_speculator']) ? 'Required' : '';
				$this->broker_used_error = empty($sbtBlogProfile_arr['broker_used']) ? 'Required' : '';
				$this->my_trade_error = empty($arr['my_trade']) ? 'Required' : '';
				$this->my_occupation_error = empty($arr['my_occupation']) ? 'Required' : '';
				$this->is_millionaire_error = empty($arr['is_millionaire']) ? 'Required' : '';
				$this->my_best_trade_error = empty($sbtBlogProfile_arr['my_best_trade']) ? 'Required' : '';
				$this->my_worst_trade_error = empty($sbtBlogProfile_arr['my_worst_trade']) ? 'Required' : '';

				if($arr['my_occupation'] == 'other')
				{
					$this->other_occ_error = empty($arr['other_occ']) ? 'Required' : '';
				}
				else
					$this->other_occ_error = '';

                                /*$this->my_own_writing_error !='' || $this->user_title_error !='' || $this->not_on_stock_error !='' ||*/
				/*09-may-13
                                 if($this->type_of_speculator_error !='' || $this->broker_used_error !='' || $this->my_trade_error !='' || $this->my_occupation_error !='' || $this->is_millionaire_error != '' || $this->my_best_trade_error != '' || $this->my_worst_trade_error !='' || $this->other_occ_error !='')
				{
					$error_flag = 1;
				}
                                else
                                {
                                    $error_flag = 0;
                                }


				if($this->user_data->from_sbt == 0) $profileForm_arr['from_sbt'] = 1;
                                //echo 'hi';die;
                         }09-may-13
                         */
                            //09-may-13 added four line code to set variable value to display blog and article without fill info
                         if($userPorfileModel->sbt_active==0)
                                //$msg = 'Dina ändringar har blivit sparade, men ytterligare fält behöver fyllas i för att fullfölja BT Insider-registreringen. Välkommen att komplettera din anmälan när helst du vill!';
                                $msg = 'Dina ändringar har blivit sparade!';
                         
                         if($this->user_data->from_sbt == 0) $profileForm_arr['from_sbt'] = 1;
                         
                         if($this->user_data->sbt_active == 0) $profileForm_arr['sbt_active'] = 1;
			}
			else
			{
				//$profileForm_arr['from_sbt'] = 0;
                                $profileForm_arr['from_sbt'] = 1;
			}

			foreach($arr['my_trade'] as $key=>$val)
			{
				$my_trade_arr[$key] = $arr['my_trade'][$key];
			}
			$this->my_trade_str = implode(',',$my_trade_arr);

			$sbtBlogProfile_arr['type_of_speculator'] = $arr['type_of_speculator'];
			$sbtBlogProfile_arr['my_trade'] = $this->my_trade_str;
			$sbtBlogProfile_arr['my_occupation'] = $arr['my_occupation'] == 'other' ? 'other:'.$arr['other_occ'] : $arr['my_occupation'];
			$sbtBlogProfile_arr['is_millionaire'] = $arr['is_millionaire'];

			for($i=1;$i<=5;$i++)
			{
				$recomm = trim($arr['recomm_'.$i]);

				if($recomm != " " && strlen($recomm) > 0)
				{
					if($j!= 0)
						$recomm_str = $recomm_str.",".$recomm;
					else
						$recomm_str = $recomm;

					$j++;
				}

				$shortlist = trim($arr['shortlist_'.$i]);

				if($shortlist != " " && strlen($shortlist) > 0)
				{
					if($k!= 0)
						$shortlist_str = $shortlist_str.",".$shortlist;
					else
						$shortlist_str = $shortlist;

					$k++;
				}
			}

			$sbtBlogProfile_arr['my_five_best_recommendations'] = $recomm_str;
			$sbtBlogProfile_arr['my_shortlist'] = $shortlist_str;

			if($profileForm_arr['from_sbt'] == 1)
			{
				$activation_code = mt_rand(11111111,99999999);
				$profileForm_arr['sbt_activation_code'] = $activation_code;
			}
			if($this->user_data->from_sbt == 0 && $profileForm_arr['from_sbt'] == 1) $send_activation_mail_flag = 1;

                        $this->sbtBlogProfileForm->bind($sbtBlogProfile_arr);


                         //|| $this->type_of_speculator_error !='' || $this->broker_used_error !='' || $this->my_trade_error !='' || $this->my_occupation_error !='' || $this->is_millionaire_error != '' || $this->my_best_trade_error != '' || $this->my_worst_trade_error !='' || $this->other_occ_error !=''
				if($error_flag == 0)
				{
                                 
                                    if($profileForm_arr['stopdate']==='0000-00-00'){ unset($profileForm_arr['stopdate']);}
                                    if($profileForm_arr['regdate']==='0000-00-00 00:00:00'){ unset($profileForm_arr['regdate']);}
                                    if(!$profileForm_arr['sbt_activation_code']){$profileForm_arr['sbt_activation_code']=0;}
                                    $profileForm_arr['id'] = $userPorfileModel->getId();
                                    
                                    $this->profileForm->bind($profileForm_arr);
                                   if($this->profileForm->isValid() && $this->sbtBlogProfileForm->isValid()   )
                                   {
                                       //echo 'ttt';//die;
                                        $this->profileForm->save();
                                        $this->sbtBlogProfileForm->save();

                                        $profile->updateUsername($id,$uname);
                                        $this->getUser()->setAttribute('setUpdateMsg',1,'userProperty');
                                        // $userPorfileModel->sbt_active==0  for only new user else it is sbt user
                                        if($send_activation_mail_flag == 1 && $userPorfileModel->sbt_active==0)
                                        {

                                            $this->getUser()->setAttribute('send_activation_mail',1,'userProperty');
                                            //$this->redirect('email/sendWelcomeMail'); //09-may-13 no need to send emailfor activation.
                                        }
                                        else
                                        {

                                            $url = 'http://'.$this->host_str.'/sbt/sbtMinProfile/id/'.$id;
                                            $this->redirect($url);
                                        }
                                    }
                                    if($arr['submit']=='SKICKA' && $this->profileForm->isValid() )
                                    {

                                        $this->getUser()->setAttribute('setUpdateMsg',1,'userProperty');
                                        $this->sbtBlogProfileForm->save();
                                        $url = 'http://'.$this->host_str.'/sbt/sbtMinProfile/id/'.$id;
                                        $this->redirect($url);
                                    }//if(($arr['submit']=='SPARA' && $this->profileForm->isValid() && $userPorfileModel->getSbtActive()== 1 && $userPorfileModel->getSbtActive()==1)&& $arr['type_of_speculator']!='' && $sbtBlogProfile_arr['broker_used']!='' && $arr['my_trade']!='' && $arr['my_occupation']!='' && $arr['is_millionaire']!='' && $sbtBlogProfile_arr['my_best_trade']!='' && $sbtBlogProfile_arr['my_worst_trade']!='')
                                    if(($arr['submit']=='SPARA' && $this->profileForm->isValid() ) )
                                    {
                                        //echo 'hi2';die;
                                        $this->getUser()->setAttribute('setUpdateMsg',1,'userProperty');
                                        $this->sbtBlogProfileForm->save();
                                        $this->is_millionaire = $sbtBlogProfile_arr['is_millionaire'];
                                        $this->my_occupation = $sbtBlogProfile_arr['my_occupation'];
                                        $this->my_trade_str = $sbtBlogProfile_arr['my_trade'];
                                        $this->type_of_speculator = $sbtBlogProfile_arr['type_of_speculator'];
                                        $this->my_shortlist = explode(',',$sbtBlogProfile_arr['my_shortlist']);
                                        $this->my_five_best_recommendations = explode(',',$sbtBlogProfile_arr['my_five_best_recommendations']);
                                            if($send_activation_mail_flag == 1 && $userPorfileModel->sbt_active==0)
                                            {
                                                // echo 'hi12';die;
                                                $this->getUser()->setAttribute('send_activation_mail',1,'userProperty');
                                                //$this->redirect('email/sendWelcomeMail'); //09-may-13 no need to send emailfor activation.
                                            }
                                     }
				}
                                else
                                {
                                    //echo 'dddd';die;
                                    $this->profileForm->bind($profileForm_arr);
                                    if( $this->profileForm->isValid() &&  $this->sbtBlogProfileForm->isValid() )
                                    {
                                        $this->profileForm->save();
                                        $this->sbtBlogProfileForm->save();
                                    }
                                    if($msg !='')
                                    $this->msg =  $msg;

                                    $this->is_millionaire = $sbtBlogProfile_arr['is_millionaire'];
                                    $this->my_occupation = $sbtBlogProfile_arr['my_occupation'];
                                    $this->my_trade_str = $sbtBlogProfile_arr['my_trade'];
                                    $this->type_of_speculator = $sbtBlogProfile_arr['type_of_speculator'];
                                    $this->my_shortlist = explode(',',$sbtBlogProfile_arr['my_shortlist']);
                                    $this->my_five_best_recommendations = explode(',',$sbtBlogProfile_arr['my_five_best_recommendations']);

                                }
		}
                                   //  echo 'hi9';die;


                                    $this->user_id = $id;
                                    $this->action = 'sbtMinProfile';


	}
	

	
   /**
	* 
	* This function fetches the date of a perticular user for editing.
	* 
	*/
	public function executeEditBlogProfile(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfile');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		$arrLand = array('1'=>'Sverige','2'=>'Norge','3'=>'Finland','4'=>'Danmark','5'=>'Other');
		$arrBirthDate = $my_five_best_recommendations = $my_shortlist = $profileForm_arr = $sbtBlogProfile_arr = $this->data_arr = $this->color_arr = array();
		$arrProfileCheck = array('','Required','Symboler eller specialtecken är inte tillåtna');
		$arrNumberCheck = array('','Required','Bara siffror är tillåtna');
		$error_flag = $j = $k = $user_email_flag = $send_activation_mail_flag = 0;
		$recomm_str = $shortlist_str = ''; 
		
		$id = $this->getRequestParameter('edit_user_id');
		$profile = new SfGuardUserProfile();
		$sbt_blog_profile = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		
		$userProfileImage = new SbtUserprofilePhoto(); 
		$this->user_photo_data = $userProfileImage->searchForRecord($id);
		
		$this->user_profile = new SfGuardUserProfile();
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->user_data = $profile->getUserData($id);
		$this->user_guard_data = $profile->fetchOneUser($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		
		$isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
		$this->own_profile = $id == $this->logged_user ? 1 : ($isSuperAdmin == 1 ? 1: 0);
		$this->on_edit_blog = 1;
		
		$this->blog_info_div = $sbt_blog_profile ? 'show' : 'hide';
		
		
		$medal_detail = new SbtAuthorMedalDetails();
		$this->gold_cnt = $medal_detail->getUserAwardTypeCount($id,'1');
		$this->silver_cnt = $medal_detail->getUserAwardTypeCount($id,'2');
		$this->bronze_cnt = $medal_detail->getUserAwardTypeCount($id,'3');

		$sbtUserBlogProfile = new SbtUserBlogProfile();
		$blog_image_data = $sbtUserBlogProfile->searchForPreviousRecord($id);
		
		if($blog_image_data)
		{
			$this->color_arr['name'] = $blog_image_data->blog_header_name_color;
			$this->color_arr['info'] = $blog_image_data->blog_header_info_color;
			$this->color_arr['background'] = $blog_image_data->blog_page_background_color;
			$this->color_arr['image'] = $blog_image_data->blog_header_image;
			$this->blogProfileForm = new SbtUserBlogProfileForm($blog_image_data);
		}
		else
		{
			$this->color_arr['name'] = '#A7A8AA';
			$this->color_arr['info'] = '#A7A8AA';
			$this->color_arr['background'] = '#A7A8AA';
			$this->color_arr['image'] = '';
			$this->blogProfileForm = new SbtUserBlogProfileForm();
		}
		
		$this->blogProfileFormSchema = $this->blogProfileForm->getWidgetSchema();
		$this->blogProfileFormSchema['blog_header_name_color'] = new sfWidgetFormInputHidden();
		$this->blogProfileFormSchema['blog_header_info_color'] = new sfWidgetFormInputHidden();
		$this->blogProfileFormSchema['blog_page_background_color'] = new sfWidgetFormInputHidden();
		$this->blogProfileFormSchema['blog_header_image'] = new sfWidgetFormInputHidden();
		$this->blogProfileFormSchema['user_id'] = new sfWidgetFormInputHidden();
		$this->blogProfileForm->setDefault('user_id',$id);
		$this->blogProfileForm->setDefault('created_at',date('Y-m-d H:i:s')); 
		
		$this->sbtBlogProfileForm = new AddSbtBlogProfileForm($sbt_blog_profile);
		$this->wSchema = $this->sbtBlogProfileForm->getWidgetSchema();
		$this->sbtBlogProfileForm->setDefault('user_id',$id);
	
		if ($request->isMethod('post'))	
		{ 
			$arr = $this->getRequest()->getParameterHolder()->getAll();
			$image = $this->getUser()->getAttribute('blog_profile_image_name') ? $this->getUser()->getAttribute('blog_profile_image_name') : $arr['blog_header_image'];
			$blogProfileForm_arr = $request->getParameter($this->blogProfileForm->getName());
			$blogProfileForm_arr['blog_header_name_color'] = $arr['blog_headername_color'];
			$blogProfileForm_arr['blog_header_info_color'] = $arr['blog_headerinfo_color'];
			$blogProfileForm_arr['blog_page_background_color'] = $arr['blog_pagebackground_color'];
			$blogProfileForm_arr['blog_header_image'] = trim(str_replace('_large','',$image));
			
			$this->blogProfileForm->bind($blogProfileForm_arr);
			$this->blogProfileForm->save();
			$this->getUser()->getAttributeHolder()->remove('blog_profile_image_name');
			
			$url = 'http://'.$this->host_str.'/sbt/showListOfUserBlog/uid/'.$id;
			$this->redirect($url);
		}
		$this->user_id = $id;
	}

   /**
	* 
	* This function fetches the data for blog.
	* 
	*/
	public function executeGetBlogListData(sfWebRequest $request)
	{
		$this->host_str = $this->getRequest()->getHost();
		$mymarket = $this->mymarket_title = new mymarket();
		$this->profile = new SfGuardUserProfile();
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
	
		$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
		$object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
		
		foreach($type_data as $type)	{	$type_arr[$type->type_id] = $type->type_name;		}
		foreach($object_data as $obj)	
		{	
			$object_arr[$obj->object_id] = $obj->object_name; 
			$object_country_arr[$obj->object_id] = $obj->object_country;		
		}
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('bloglist_current_column','','userProperty');
		$page = $request->getParameter('page');
		$bloglist_current_column_order = $request->getParameter('bloglist_current_column_order');
		$set_column = 'bloglist_current_column';
		$set_column_order = 'bloglist_current_column_order';		
		
		$blog_cat_id = $request->getParameter('blog_cat_id');
		
		$order = $this->profile->setSortingParameters($page,$bloglist_current_column_order,$column_id,$current_column,$set_column,$set_column_order);
		
		$query = SbtUserBlogTable::getInstance()->getAllSbtBlogPostByOrderQuery($column_id,$order,$blog_cat_id);
		
	    $this->pager = $mymarket->getPagerForAll('SbtUserBlog',5,$query,$request->getParameter('page', 1));
		
		$this->current_column_order = $order;
		$this->column_id = $column_id;
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr; 
		$this->sbt_blog_comment = new SbtBlogComment();
		$this->blog_cat_id = $blog_cat_id;
	}
	
   /**
	* 
	* This function fetches the data for blog on specific date.
	* 
	*/
	public function executeGetBlogListOnDateData(sfWebRequest $request)
	{
		$month = $this->getRequestParameter('month');
		$year = $this->getRequestParameter('year');
		$last_date = $this->getRequestParameter('last_date');
		$user_id = $this->getRequestParameter('user_id');

		$blog_date = new SbtUserBlog();
		$mymarket = $this->mymarket_title = new mymarket();
		$blog = new SbtUserBlog();
		$this->sbtBlogComment = new SbtBlogComment();
		$this->vote_details = new SbtBlogVoteDetails();
		$this->profile = new SfGuardUserProfile();
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $this->isSuperAdmin = 1;
		else $this->isSuperAdmin=0;
		
		$this->user_photo_arr = array();
		 
		$user = $this->getUser();
		if($user->isAuthenticated()) $this->valid_user = 1;
		else $this->valid_user = 0; 
		
		$this->user_id = $request->getParameter('user_id');
		
		$userProfileImage = new SbtUserprofilePhoto(); 
		$this->user_photo_data = $userProfileImage->searchForRecord($this->user_id);
		$photo_data = $userProfileImage->fetchAllPhotoRecord();
		for($i=0; $i<count($photo_data); $i++) {	$this->user_photo_arr[$photo_data[$i]['user_id']] = $photo_data[$i]['profile_photo_name']; }
		
		
		$query = $blog_date->getBlogWrittenOnDate($year,$month,$last_date,$column_id,$order,$user_id);
		$this->all_blog_post_pager = $mymarket->getPagerForAll('SbtUserBlog',25,$query,$request->getParameter('page', 1));
		
		$this->blogCommentForm = new SbtBlogCommentForm();
		$this->blogCommentForm->setDefault('comment_by',$this->logged_user);
		$this->blogCommentForm->setDefault('created_at',date('Y-m-d H:i:s'));
		$this->blogCommentForm->setDefault('followup_by_mail',0);
		
		$this->search_month = $month;
		$this->search_year = $year;
		$this->search_last_date = $last_date;
	}
	
   /**
	* 
	* This function fetches the user list data.
	* 
	*/
	public function executeGetUserListData(sfWebRequest $request)
	{
		$this->host_str = $this->getRequest()->getHost();
		$mymarket = new mymarket();
		$this->user_arr = array();
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('userlist_current_column','','userProperty');
		if($request->getParameter('page'))
		{
			$order = $request->getParameter('userlist_current_column_order');
		}
		else
		{
			if($current_column == $column_id)
			{ 
				$order = $this->getUser()->getAttribute('userlist_current_column_order','','userProperty');
		
				if($order == 'ASC') $order = 'DESC';
				else $order = 'ASC';
		
				$this->getUser()->setAttribute('userlist_current_column_order',$order,'userProperty');
			}
			else
			{
				$this->getUser()->setAttribute('userlist_current_column',$column_id,'userProperty');
				$this->getUser()->setAttribute('userlist_current_column_order','ASC','userProperty');
				$order = 'ASC';
			}
		}
		
		$query = SfGuardUserProfileTable::getInstance()->getAllUserByOrderQuery($column_id,$order);
	
	 	$this->pager = $mymarket->getPagerForAll('SfGuardUserProfile',25,$query,$request->getParameter('page', 1));
		$this->current_column_order = $order;
		$this->column_id = $column_id;
		
		$userProfileImage = new SbtUserprofilePhoto(); 
	 	$data = $userProfileImage->fetchAllPhotoRecord();
	
	 	for($i=0; $i<count($data); $i++) {	$this->user_arr[$data[$i]['user_id']] = $data[$i]['profile_photo_name']; } 
	}
	
  /**
  * Executes SbtMinProfile action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetSbtMinProfile(sfWebRequest $request)
  {
 	isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfile');
	
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	
	if($this->show_top_links==1) $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_minprofile');
	else $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
	
	$this->host_str = $this->getRequest()->getHost();
	//$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	
	$id = $this->getRequestParameter('id');
	
	$messageForm_arr = $this->data_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
	$this->visitor_list = '';
	$this->type_investor_arr = array('trader'=>'Trejder','investor'=>'Investerare','gambler'=>'Gambler'); 
	$find_arr = array('stocks','commodities','currencies',',,');
	$replace_arr = array('Aktier,','Råvaror,','Valutor',',');
	$this->is_millionaire = array('milli_yes'=>'Stor','milli_not_yet'=>'Liten','milli_varies'=>'Lagom');
	$this->occupation_arr = array('student'=>'Student','employed'=>'Anställd','self_employed'=>'Egen företagare','between_jobs'=>'Mellan jobb','retired'=>'Pensionerad');
	
	$medal_detail = new SbtAuthorMedalDetails();
	$this->gold_cnt = $medal_detail->getUserAwardTypeCount($id,'1');
	$this->silver_cnt = $medal_detail->getUserAwardTypeCount($id,'2');
	$this->bronze_cnt = $medal_detail->getUserAwardTypeCount($id,'3');

	
	$this->messageForm = new SbtMessagesForm();
	$this->messageForm->setDefault('message_to',$id);
	$this->messageForm->setDefault('message_from',$this->logged_user);
	$this->messageForm->setDefault('created_at',date("Y-m-d H:i:s"));
	
	$this->friendRequestForm = new SbtFriendRequestForm();
	$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
	$this->friendRequestForm->setDefault('contactee_id',$id);
	$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
	$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
	
	 if ($request->isMethod('post'))	
	 { 
	 	$arr = $this->getRequest()->getParameterHolder()->getAll();

		if($arr['friend_request'])
		{
			$friendRequestForm_arr = $request->getParameter($this->friendRequestForm->getName());
			$id = $friendRequestForm_arr['contactee_id'];
	
			$this->friendRequestForm->bind($friendRequestForm_arr);
			if($this->friendRequestForm->isValid())
			{
				$record = $this->friendRequestForm->save();
			}
			else{echo $this->friendRequestForm->getErrorSchema();}
		}
		
		if($arr['sbt_messages'])
		{
			$messageForm_arr = $request->getParameter($this->messageForm->getName());
			$id = $messageForm_arr['message_to'];
			
			$this->messageForm->bind($messageForm_arr);
			if($this->messageForm->isValid())
			{
				$record = $this->messageForm->save();
			}
			else{echo $this->messageForm->getErrorSchema();}
		}
	 }
	
	$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
	$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
	$this->last_message = SbtMessagesTable::getInstance()->getLastPostedMessage($id);
	$this->is_logged_in_user = $id == $this->logged_user ? 1 : 0;
	
	if($this->user_details)
	$this->my_trade = str_replace($find_arr,$replace_arr,trim($this->user_details->my_trade));

	
	$profile = new SfGuardUserProfile();
	$this->user_profile = new SfGuardUserProfile();
	$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
	$this->data_arr['user_age'] = $profile->getUserAge($id);
	$this->user_data = $profile->getUserData($id);
	$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
	$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
	
	$sbtRecentVisitor = new SbtRecentVisitor();
	
	if($id!=$this->logged_user)
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
	
	$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);

	
	$this->user_id = $id;
	$this->action = 'sbtMinProfile';
	$this->is_logged_in_user = $id == $this->logged_user ? 1 : 0;
	$all_friends = $profile->fetchAllFriend($id);

	foreach($all_friends as $friend)
	{ 
		if($friend->contactor_id == $id)
		{
			$this->friend_id[] = $friend->contactee_id;
			$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
		}
		if($friend->contactee_id == $id)
		{
			$this->friend_id[] = $friend->contactor_id;
			$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
		}
	}
  }
	
	/**
	* 
	* This function shows all the articles,forum,blog post from Borstjanaren and SisterBt post by a perticular user in specified order.
	* 
	*/
	public function executeGetSbtMinProfileAllPost(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileAllPost');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$this->data_arr = $cat_arr = $type_arr = $object_arr = $object_country_arr = $sort_arr = $messageForm_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
		$this->visitor_list = '';
		
		$id = $this->getRequestParameter('id');
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;

		if($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')==1) $isSuperAdmin = 1;
	    else $isSuperAdmin = 0;	
		
		if($isSuperAdmin == 1 || $this->show_top_links == 1)  $show_all_records = 1;
		else   $show_all_records = 0;
		
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('useralldata_list_current_column','','userProperty');
		
		if($request->getParameter('page') || $request->getParameter('page-blog'))
		{
			$order = $request->getParameter('useralldata_list_current_column_order');
		}
		else
		{
			if($current_column == $column_id)
			{ 
				$order = $this->getUser()->getAttribute('useralldata_list_current_column_order','','userProperty');
		
				if($order == 'ASC') $order = 'DESC';
				else $order = 'ASC';
		
				$this->getUser()->setAttribute('useralldata_list_current_column_order',$order,'userProperty');
			}
			else
			{
				$this->getUser()->setAttribute('useralldata_list_current_column',$column_id,'userProperty');
				$this->getUser()->setAttribute('useralldata_list_current_column_order','ASC','userProperty');
				$order = 'ASC';
			}
		}
	
		$mymarket = new mymarket();
		$profile = new SfGuardUserProfile();
		$this->user_data = $profile->getUserData($id);
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		
		$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
		$type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
		$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
		
		$analysis_query = SbtAnalysisTable::getInstance()->getArticleFromSisByOrderQuery($id,$column_id,$order,$show_all_records);
		$article_query = ArticleTable::getInstance()->getArticleFromBorstByOrderQuery($id,$this->user_data->firstname.' '.$this->user_data->lastname,$column_id,$order);
		$blog_query = SbtUserBlogTable::getInstance()->getAllMyBlogPostByOrderQuery($id,$column_id,$order);
		$forum_query = BtforumTable::getInstance()->getAllUserForumPostByOrderQuery($id,$this->user_data->firstname.' '.$this->user_data->lastname,$column_id,$order);
			
		$this->analysis_pager = $mymarket->getPagerForAll('SbtAnalysis',10,$analysis_query,$request->getParameter('page', 1));
		$this->article_pager = $mymarket->getPagerForAll('Article',10,$article_query,$request->getParameter('page-article',1));
		$this->blog_pager = $mymarket->getPagerForAll('SbtUserBlog',10,$blog_query,$request->getParameter('page-blog', 1));
		$this->forum_pager = $mymarket->getPagerForAll('Btforum',10,$forum_query,$request->getParameter('page', 1));
			
		$this->pager = $mymarket->setPagerForAll($this->article_pager,$this->analysis_pager,$this->blog_pager,$this->forum_pager);
		
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));

		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileAllPost';
		$this->cat_arr = $cat_arr; 
		$this->type_arr = $type_arr;
		$this->object_arr = $object_arr;
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		$this->column_id = $column_id;
		$this->current_column_order = $order;
		$this->parent_id = $request->getParameter('parent_id');
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
	    $this->friend_id = $profile->getFriendIds($id,$all_friends);
		$this->friend_name = $profile->getFriendNames($id,$all_friends);
	}
	
	
	/**
	* 
	* This function shows only the forum post by a perticular user in specified order.
	* 
	*/
	public function executeGetSbtMinProfileOnlyForumPost(sfWebRequest $request)
	{
		$pageRecord = 20;
		$this->$newDesign = 0;
		
		if($this->getRequestParameter('newDesign') > 0){
			$pageRecord = 20;
			$this->$newDesign = $this->getRequestParameter('newDesign');
		}
		
		isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile', 'sbt/sbtMinProfileForumPost');
	
		$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
		$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_user');
		$this->host_str = $this->getRequest()->getHost();
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		
		$id = $this->getRequestParameter('id');
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('useronlyforum_list_current_column','','userProperty');
		
		if($request->getParameter('page'))
		{
			$order = $request->getParameter('useronlyforum_list_current_column_order');
		}
		else
		{
			if($current_column == $column_id)
			{ 
				$order = $this->getUser()->getAttribute('useronlyforum_list_current_column_order','','userProperty');
		
				if($order == 'ASC') $order = 'DESC';
				else $order = 'ASC';
		
				$this->getUser()->setAttribute('useronlyforum_list_current_column_order',$order,'userProperty');
			}
			else
			{
				$this->getUser()->setAttribute('useronlyforum_list_current_column',$column_id,'userProperty');
				$this->getUser()->setAttribute('useronlyforum_list_current_column_order','ASC','userProperty');
				$order = 'ASC';
			}
		}
		
		$messageForm_arr = $this->data_arr = $this->friend_id = $this->friend_name = $visitor_list_arr = array();
		$this->visitor_list = '';
		
		$mymarket = new mymarket();
		$profile = new SfGuardUserProfile();
		$this->user_data = $profile->getUserData($id);
		$this->user_details = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);
		$this->message_cnt = SbtMessagesTable::getInstance()->message_count($id);
		
		$query = BtforumTable::getInstance()->getAllUserForumPostByOrderQuery($id,$this->user_data->firstname.' '.$this->user_data->lastname,$column_id,$order);
	 	$this->pager = $mymarket->getPagerForAll('Btforum',$pageRecord,$query,$request->getParameter('page', 1));
		
		$this->friendRequestForm = new SbtFriendRequestForm();
		$this->friendRequestForm->setDefault('contactor_id',$this->logged_user);
		$this->friendRequestForm->setDefault('contactee_id',$id);
		$this->friendRequestForm->setDefault('created_at',date("Y-m-d H:i:s"));
		$this->friendRequestForm->setDefault('updated_at',date("Y-m-d H:i:s"));
	
		$this->data_arr['total_votes'] = $profile->getTotalVotesReceived($id);
		$this->data_arr['user_age'] = $profile->getUserAge($id);
		$this->data_arr['user_blog_count'] = $profile->getUserBlogCount($id);
		
		$this->profile = $profile;
		$this->user_id = $id;
		$this->action = 'sbtMinProfileForumPost';
		$this->is_friend_request = $profile->friendRequestCheck($id,$this->logged_user);
		$this->show_top_links = $id == $this->logged_user ? 1 : 0;
		$this->column_id = $column_id;
		$this->current_column_order = $order;
		$this->parent_id = $request->getParameter('parent_id');
		
		$sbtRecentVisitor = new SbtRecentVisitor();
		$sbtRecentVisitor->updateRecentVisited($id,$this->logged_user);
		$this->visitor_name_id_arr = $sbtRecentVisitor->findRecentVisitor($id);
		
		$all_friends = $profile->fetchAllFriend($id);
		$this->friend_id = $profile->getFriendIds($id,$all_friends);
		$this->friend_name = $profile->getFriendNames($id,$all_friends);
	}
	
	/*
	* Executes IngressImageUpload action
	*
	* This function is used while uploading the image file.
	*/
	public function executeUploadIngressImage(sfWebRequest $request)
	{
		$this->setLayout(false);
		$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/thumbnail/'; 
		$this->filenameFull ='';
	
		if ($request->isMethod('post'))
		{ 
			if(isset($_FILES['probe']) && $_FILES['probe']['size'] != 0 && !$_FILES['probe']['error'])
			{
				$errors = '';
	
				$image_info = getimagesize($_FILES['probe']['tmp_name']);
				
				if(!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] != 3 && $image_info[2] != 6) 
					$errors = 'Invalid file format';
						
				if(strlen($errors)==0)
				{
					$nr = 0;
					switch($image_info[2])
					{
						case 1:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path."image".$nr."_large.gif")) break; }
						$filename = "image".$nr."_large.gif";
						break;
	
						case 2:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path."image".$nr."_large.jpg")) break; }
						$filename = "image".$nr."_large.jpg";
						break;
						
						case 3:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path."image".$nr."_large.png")) break; }
						$filename = "image".$nr."_large.png";
						break;
	
						case 6:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path."image".$nr."_large.bmp")) break; }
						$filename = "image".$nr."_large.bmp";
						break;
					}
					$extension_arr = array('gif'=>'image/gif','jpg'=>'image/jpeg','png'=>'image/png');
					//$width_arr = array(407,198,239,238);
                                        $width_arr = array(465,223,300,165);
                                        $height_arr = array(465,223,300,165);
					//$height_arr = array(238,148,187,143);
					$img_name_arr = array('_large','_semimid','_mid','_small');
					
					$file_ext = trim(substr($filename,strpos($filename, '.')+1,strlen($filename)));
					
					for($i=0;$i<4;$i++)
					{
						//echo str_replace('_large',$img_name_arr[$i],$filename).'<br>';
						// Create the thumbnail
						$thumbnail = new sfThumbnail($width_arr[$i], $height_arr[$i]);
						$thumbnail->loadFile($_FILES['probe']['tmp_name']);
						$thumbnail->save($uploaded_images_path.str_replace('_large',$img_name_arr[$i],$filename), $extension_arr[$i]);
					}
					$errors = 'Uppladdad framgångsrikt'; 
					$this->filenameFull = $_FILES['probe']['name'];
				}
			}
			else
			{
				$errors = 'No file provided';
			}
		}
		$this->errors = $errors;
		$this->filename = str_replace('_large','',$filename);
	}
	 
  /**
  * Executes SetCombos action
  *
  * @param sfRequest $request A request object
  */
  public function executeSetCombos(sfWebRequest $request)
  {


  	$typeid = $this->getRequestParameter('typeid');
	$blog_article = $this->getRequestParameter('blog_article');
	
	$arrStockList = $arrSector = $arrObject = $object_name = array();
	$temp_stocklist_list = $temp_sector_list = $stocklist_list = $sector_list = array();
	
	$sbt_sector = new SbtSector();
	$sbt_stocklist = new SbtStockList();
	$obj = new SbtObject();
	
	if($typeid > 0)
	{
		$temp_stocklist_id_list = SbtObjectTable::getAllSbtStock($typeid);
		$temp_sector_id_list = SbtObjectTable::getAllSbtSector($typeid);
	}
	
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
		$result_1 = $obj->getObjectFromTypeSector($typeid,$temp_sector_id_list[0]);
		foreach($result_1 as $data_1)
		{
			$arrObject[$data_1->id] = $data_1->object_name;
		}
		$arrSector = $sbt_sector->getSelctedSector($temp_sector_id_list);
	}
	

	
	$this->sector_cnt = count($arrSector);
	$this->stocklist_cnt = count($arrStockList);
	$this->object_cnt = count($arrObject);

	if($blog_article=='analysis')
	{ 
		$this->form = new AddSbtAnalysisForm();
		$this->wSchema = $this->form->getWidgetSchema();
		$this->wSchema['analysis_object_id']->setOption('choices',$arrObject);
		//$this->wSchema['analysis_market_id']->setOption('choices',$arrMarket);
		$this->wSchema['analysis_stocklist_id']->setOption('choices',$arrStockList);
		$this->wSchema['analysis_sector_id']->setOption('choices',$arrSector);
	}
		
	if($blog_article=='blog')
	{ 
		$this->userBlogForm = new AddSbtUserBlogForm();
		$this->wSchema = $this->userBlogForm->getWidgetSchema();
		$this->wSchema['ublog_object_id']->setOption('choices',$arrObject);
		//$this->wSchema['ublog_market_id']->setOption('choices',$arrMarket);
		$this->wSchema['ublog_stocklist_id']->setOption('choices',$arrStockList);
		$this->wSchema['ublog_sector_id']->setOption('choices',$arrSector);
	}
	
	$this->type_id = $typeid;
	$this->blog_article = $blog_article;
  } 
  
  /**
  * Executes FromAnalysisMarket action
  *
  * @param sfRequest $request A request object
  */
  public function executeFromAnalysisMarket(sfWebRequest $request)
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
	{
		$temp_stocklist_id_list = SbtObjectTable::getAllSbtStock($typeid);
		$temp_sector_id_list = SbtObjectTable::getAllSbtSector($typeid);
		unset($temp_sector_list[0]);
	}

	/*	$sbtObject = $obj->getDataFromObject($typeid);
	
	foreach($sbtObject as $data)
	{ 
		if($data->sector_id > 0 && !in_array($data->sector_id,$temp_sector_id_list)) $temp_sector_id_list[] = $data->sector_id;
		if($data->stocklist_id > 0 && !in_array($data->stocklist_id,$temp_stocklist_id_list)) $temp_stocklist_id_list[] = $data->stocklist_id;
		//$arrObject[$data->id] = $data->object_name;
	}*/
	
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
			$result_2 = $obj->getObjectFromTypeStockSector($typeid,$stocklistid,$temp_sector_id_list[1]);
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
		$countOfSector = SbtObject::getCntSector($typeid,$stocklistid); 
		
		if(!in_array($sectorid,$temp_sector_id_list) || $countOfSector > 0) 
		{ 
			if(count($temp_sector_id_list) > 0)
			{
			
				$result_2 = $obj->getObjectFromTypeStockSector($typeid,$stocklistid,$sectorid >0 ? $sectorid : $temp_sector_id_list[1]);
			
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
		
		$result_2 = $obj->getObjectFromTypeSector($typeid,$sectorid);
		foreach($result_2 as $data_2)
		{
			$arrObject[$data_2->id] = $data_2->object_name;
		}
		$arrSector = $sbt_sector->getSelctedSector($test_sector_list);	
		
	}
	
	$this->sector_cnt = count($arrSector);
	$this->object_cnt = count($arrObject);
	$this->stocklist_cnt = count($arrStockList);

	
	if($blog_article=='analysis')
	{
		$this->form = new AddSbtAnalysisForm();
		$this->wSchema = $this->form->getWidgetSchema();
		$this->wSchema['analysis_object_id']->setOption('choices',$arrObject);
		//$this->wSchema['analysis_market_id']->setOption('choices',$arrMarket);
		$this->wSchema['analysis_stocklist_id']->setOption('choices',$arrStockList);
		$this->wSchema['analysis_sector_id']->setOption('choices',$arrSector);
		
		if($stocklistid) $this->form->setDefault('analysis_stocklist_id',$stocklistid);
		if($sectorid) $this->form->setDefault('analysis_sector_id',$sectorid);
	}
	
	if($blog_article=='blog')
	{
		$this->userBlogForm = new AddSbtUserBlogForm();
		$this->wSchema = $this->userBlogForm->getWidgetSchema();
		$this->wSchema['ublog_object_id']->setOption('choices',$arrObject);
		//$this->wSchema['ublog_market_id']->setOption('choices',$arrMarket);
		$this->wSchema['ublog_stocklist_id']->setOption('choices',$arrStockList);
		$this->wSchema['ublog_sector_id']->setOption('choices',$arrSector);
		
		//if($marketid) $this->userBlogForm->setDefault('ublog_market_id',$marketid);
		if($stocklistid) $this->userBlogForm->setDefault('ublog_stocklist_id',$stocklistid);
		if($sectorid) $this->userBlogForm->setDefault('ublog_sector_id',$sectorid);
	}
	
	$this->blog_article = $blog_article;
			
  }
  
  
  /**
  * Executes UploadProfilePhoto action
  *
  * @param sfRequest $request A request object
  */
  public function executeUploadUserProfileImage(sfWebRequest $request)
  {
      //echo 'hi';die;
		$this->setLayout(false);
		$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/userThumbnail/'; 
		
		if ($request->isMethod('post'))
		{ 
			if(isset($_FILES['upload_user_image']) && $_FILES['upload_user_image']['size'] != 0 && !$_FILES['upload_user_image']['error'])
			{
				$errors = '';
		        $user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
				$image_info = getimagesize($_FILES['upload_user_image']['tmp_name']);
				
				if(!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] != 3 && $image_info[2] != 6) 
					$errors = 'Invalid file format';
						
				if(strlen($errors)==0)
				{
					$nr = 0;
					
					switch($image_info[2])
					{ 
						case 1:
								if(file_exists($uploaded_images_path."profileimage".$user_id.".gif")) { $this->deleteUserProfileImage("profileimage".$user_id.".gif"); $filename = "profileimage".$user_id.".gif";}
								else{ $filename = "profileimage".$user_id.".gif";}
								break;
		
						case 2: 
								if(file_exists($uploaded_images_path."profileimage".$user_id.".jpg")) { $this->deleteUserProfileImage("profileimage".$user_id.".jpg"); $filename = "profileimage".$user_id.".jpg"; }
								else {	$filename = "profileimage".$user_id.".jpg";	}
								break;
						case 3:
								if(file_exists($uploaded_images_path."profileimage".$user_id.".png")) { $this->deleteUserProfileImage("profileimage".$user_id.".png"); $filename = "profileimage".$user_id.".png";}
								else{ $filename = "profileimage".$user_id.".png";}
								break;
		
						case 6:
								if(file_exists($uploaded_images_path."profileimage".$user_id.".bmp")) { $this->deleteUserProfileImage("profileimage".$user_id.".bmp"); $filename = "profileimage".$user_id.".bmp";}
								else{ $filename = "profileimage".$user_id.".bmp";}
								break;
					}
					
					$extension_arr = array('gif'=>'image/gif','jpg'=>'image/jpeg','png'=>'image/png');
					$file_ext = trim(substr($filename,strpos($filename, '.')+1,strlen($filename)));
					
					// Create the thumbnail
					$thumbnail = new sfThumbnail($image_info[0], $image_info[1]);
					$thumbnail->loadFile($_FILES['upload_user_image']['tmp_name']);
					$thumbnail->save($uploaded_images_path.$filename, $extension_arr[$file_ext]);
					
					/*$userProfileImage = new SbtUserprofilePhoto(); 
					$userProfileImage->saveUserProfileImage($user_id,str_replace('_large','',$filename));*/
					$this->getUser()->setAttribute('profile_image_name', $filename);
					
					$errors = 'File Uploaded Successfully,'.$filename; 
				}
			}
			else
			{
				$errors = 'No file provided';
			}
		}
		return  $this->renderText($errors);
  }
  
  
  
  /**
  * Executes ForSavingImage action
  *
  * @param sfRequest $request A request object
  */
  public function executeForSavingImage(sfWebRequest $request)
  {
	$x = $request->getParameter('x');
	$y = $request->getParameter('y');
	$w = $request->getParameter('w');
	$h = $request->getParameter('h');
	$filename = $request->getParameter('image_nm');
	$images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/userThumbnail/'; 
	$src = $images_path.$filename;
	
	$objImage = new ImageCropper($src);	
	if( $objImage->imageok ) 
	{
		$objImage->setCrop($x,$y,$w,$h);
		$dest = $images_path.str_replace('.','_large.',$filename);
		//$objImage->setImageHeight(121);
		//$objImage->setImageWidth(107);
		$objImage->myresize(107,107);
		$objImage->save($images_path.str_replace('.','_large.',$filename));
		
		$objImage->setCrop($x,$y,$w,$h);
		$dest = $images_path.str_replace('.','_semilarge.',$filename);
	    //$objImage->setImageHeight(54);
	    //$objImage->setImageWidth(52);
		$objImage->myresize(52,52);
		$objImage->save($images_path.str_replace('.','_semilarge.',$filename));
		
		$objImage->setCrop($x,$y,$w,$h);
		$dest = $images_path.str_replace('.','_mid.',$filename);
	    //$objImage->setImageHeight(54);
	    //$objImage->setImageWidth(52);
		$objImage->myresize(39,39);
		$objImage->save($images_path.str_replace('.','_mid.',$filename));
		
		$objImage->setCrop($x,$y,$w,$h);
		$dest = $images_path.str_replace('.','_small.',$filename);
	    //$objImage->setImageHeight(40);
	    //$objImage->setImageWidth(29);
		$objImage->myresize(26,26);
		$objImage->save($images_path.str_replace('.','_small.',$filename));
		
		$file_nm = $images_path.$filename;
		if (file_exists($file_nm)) 
		{
    		unlink($file_nm);
		}
		
		$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		$userProfileImage = new SbtUserprofilePhoto(); 
		$userProfileImage->saveUserProfileImage($user_id,$filename);
		$this->getUser()->getAttributeHolder()->remove('profile_image_name');
		
		return $this->renderText("File Saved successfully");
	} 
	else 
	{
		return $this->renderText("Error while file cropping.");
	}
	
  }
  
  /**
  * Executes ForSavingBlogProfileImage action
  *
  * @param sfRequest $request A request object
  */
  public function executeForSavingBlogProfileImage(sfWebRequest $request)
  {
	$x = $request->getParameter('x');
	$y = $request->getParameter('y');
	$w = $request->getParameter('w');
	$h = $request->getParameter('h');
	$filename = $request->getParameter('image_nm');
	$images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/userBlogProfileImage/'; 
	$src = $images_path.$filename;
	
	$objImage = new ImageCropper($src);	
	if( $objImage->imageok ) 
	{
		$objImage->setCrop($x,$y,$w,$h);
		$dest = $images_path.str_replace('_large','',$filename);
		//$objImage->setImageHeight(121);
		//$objImage->setImageWidth(107);
		//$objImage->myresize(150,326);
		$objImage->save($images_path.str_replace('_large','',$filename));
		
		$file_nm = $images_path.$filename;
		if (file_exists($file_nm)) 
		{
    		unlink($file_nm);
		}
		
		//$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		//$userBlogProfileImage = new SbtUserBlogProfile(); 
		//$userBlogProfileImage->saveUserBlogProfileImage($user_id,str_replace('_large','',$filename));
		//$this->getUser()->getAttributeHolder()->remove('blog_profile_image_name');
		
		return $this->renderText("File Saved successfully");
	} 
	else 
	{
		return $this->renderText("Error while file cropping.");
	}
	
  }
  
 /**
  * Executes RemoveUserProfileImage action
  *
  * @param $tab clicked tab
  */
  public function deleteUserProfileImage($filename)
  { 
	$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/userThumbnail/'; 
	$file_to_delete = $uploaded_images_path.$filename;
			
	if (file_exists($file_to_delete)) 
	{
            unlink($file_to_delete);
	}
  }
  
 /**
  * Executes RemoveUserBlogProfileImage action
  *
  * @param $tab clicked tab
  */
  public function deleteUserBlogProfileImage($filename)
  { 
	$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/userBlogProfileImage/'; 
	$file_to_delete = $uploaded_images_path.$filename;
			
	if (file_exists($file_to_delete)) 
	{
    	unlink($file_to_delete);
	}
  }
  
 /**
  * Executes RemoveUserProfileImage action
  *
  * @param $tab clicked tab
  */
  public function executeCancelCropImage(sfWebRequest $request)
  { 
	$filename = $request->getParameter('filename');
	$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/userThumbnail/'; 
	$file_to_delete = $uploaded_images_path.$filename;
			
	if (file_exists($file_to_delete)) 
	{
    	unlink($file_to_delete);
		return  $this->renderText('File Removed');
	}
	return  $this->renderText('File not Found');
  }
  
 /**
  * Executes CancelCropBlogProfileImage action
  *
  * @param $tab clicked tab
  */
  public function executeCancelCropBlogProfileImage(sfWebRequest $request)
  { 
	$filename = $request->getParameter('filename');
	$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/userBlogProfileImage/'; 
	$file_to_delete = $uploaded_images_path.$filename;
			
	if (file_exists($file_to_delete)) 
	{
    	unlink($file_to_delete);
		return  $this->renderText('File Removed');
	}
	return  $this->renderText('File not Found');
  }

 /**
  * Executes RemoveProfileImage action
  *
  * @param sfRequest $request A request object
  */
  public function executeRemoveProfileImage(sfWebRequest $request)
  {
	$user_id = $request->getParameter('user_id');
	$userProfileImage = new SbtUserprofilePhoto(); 
	$user_photo_data = $userProfileImage->searchForRecord($user_id);
	if($user_photo_data)
	{
		$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/userThumbnail/'; 
		$img_name_arr = array('_large.','_semilarge.','_mid.','_small.');
		for($i=0;$i<4;$i++)
		{
			$filename = str_replace('.',$img_name_arr[$i],$user_photo_data->profile_photo_name);
			$filename = $uploaded_images_path.$filename;
			
			if (file_exists($filename)) {
    			unlink($filename);
			}
		}
		
		$filename = $uploaded_images_path.$user_photo_data->profile_photo_name;
			
		if (file_exists($filename)) {
    		unlink($filename);
		}
		
		$user_photo_data->delete();
		
		$str = '<font color="#014c8f"><a class="main_link_color cursor" onclick="uploadUserProfilePhoto()">Change Photo</a></font>';
		return  $this->renderText($str);
	}
  }
  
  /**
  * Executes UploadBlogProfilePhoto action
  *
  * @param sfRequest $request A request object
  */
  public function executeUploadUserBlogProfileImage(sfWebRequest $request)
  {
	$this->setLayout(false);
	$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/userBlogProfileImage/'; 
	
	$upload_min_img_width = 80;
	$upload_min_img_height = 80;
	
	if ($request->isMethod('post'))
	{ 
		if(isset($_FILES['upload_user_blog_image']) && $_FILES['upload_user_blog_image']['size'] != 0 && !$_FILES['upload_user_blog_image']['error'])
		{
			$errors = '';
			$user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
			$image_info = getimagesize($_FILES['upload_user_blog_image']['tmp_name']);
			
			if(!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] != 3 && $image_info[2] != 6) 
				$errors = 'Invalid file format';
				
			if(strlen($errors)==0)
			{
				if($image_info[0] < $upload_min_img_width && $image_info[1] < $upload_min_img_height)
					$errors = 'Too small image.';
			}
					
			if(strlen($errors)==0)
			{
				$nr = 0;
				
				switch($image_info[2])
				{ 
					case 1:
							if(file_exists($uploaded_images_path."blogprofileimage".$user_id."_large.gif")) { $this->deleteUserBlogProfileImage("blogprofileimage".$user_id."_large.gif"); $filename = "blogprofileimage".$user_id."_large.gif";}
							else{ $filename = "blogprofileimage".$user_id."_large.gif";}
							break;
	
					case 2: 
							if(file_exists($uploaded_images_path."blogprofileimage".$user_id."_large.jpg")) { $this->deleteUserBlogProfileImage("blogprofileimage".$user_id."_large.jpg"); $filename = "blogprofileimage".$user_id."_large.jpg"; }
							else {	$filename = "blogprofileimage".$user_id."_large.jpg";	}
							break;
					case 3:
							if(file_exists($uploaded_images_path."blogprofileimage".$user_id."_large.png")) { $this->deleteUserBlogProfileImage("blogprofileimage".$user_id."_large.png"); $filename = "blogprofileimage".$user_id."_large.png";}
							else{ $filename = "blogprofileimage".$user_id."_large.png";}
							break;
	
					case 6:
							if(file_exists($uploaded_images_path."blogprofileimage".$user_id."_large.bmp")) { $this->deleteUserBlogProfileImage("blogprofileimage".$user_id."_large.bmp"); $filename = "blogprofileimage".$user_id."_large.bmp";}
							else{ $filename = "blogprofileimage".$user_id."_large.bmp";}
							break;
				}
				
				$extension_arr = array('gif'=>'image/gif','jpg'=>'image/jpeg','png'=>'image/png');
				$file_ext = trim(substr($filename,strpos($filename, '.')+1,strlen($filename)));
				
				// Create the thumbnail
				$thumbnail = new sfThumbnail($image_info[0], $image_info[1]);
				$thumbnail->loadFile($_FILES['upload_user_blog_image']['tmp_name']);
				$thumbnail->save($uploaded_images_path.$filename, $extension_arr[$file_ext]);
				
				/*$userProfileImage = new SbtUserprofilePhoto(); 
				$userProfileImage->saveUserProfileImage($user_id,str_replace('_large','',$filename));*/
				$this->getUser()->setAttribute('blog_profile_image_name', $filename);
				
				$errors = 'File Uploaded Successfully,'.$filename; 
			}
		}
		else
		{
			$errors = 'No file provided';
		}
	}
	return  $this->renderText($errors);
  }
  
  /**
  * Executes UploadImageInAnalysisAndBlog action
  *
  * @param sfRequest $request A request object
  */
  public function executeUploadImageInAnalysisAndBlog(sfWebRequest $request)
  {
		$this->setLayout(false);
		$type = $request->getParameter('type');
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$this->filenameFull = '';
		
		if($type == 'analysis')
		{	
			$prefix = 'analysis_img';
			$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/analysisDetailImage/'; 
			$folder_path = '/uploads/analysisDetailImage/'; 
		}
		if($type == 'blog')	
		{
			$prefix = 'blog_img';
			$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/blogDetailImage/'; 
			$folder_path = '/uploads/blogDetailImage/'; 
		}
			
		$upload_max_img_size = 150;
		$upload_max_img_width = 495;
		$upload_max_img_height = 1000;
		
		if ($request->isMethod('post'))
		{ 
			if(isset($_FILES['upload_detail_image']) && $_FILES['upload_detail_image']['size'] != 0 && !$_FILES['upload_detail_image']['error'])
			{ 
				$errors = '';
				$image_info = getimagesize($_FILES['upload_detail_image']['tmp_name']);
				
				if(!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] != 3 && $image_info[2] != 6) 
					$errors = 'Invalid file format';
				
				if(strlen($errors)==0)
				{ 
					$nr = 0;
					switch($image_info[2])
					{
						case 1:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path.$prefix.$nr.".gif")) break; }
						$filename = $prefix.$nr.".gif";
						break;
		
						case 2:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path.$prefix.$nr.".jpg")) break; }
						$filename = $prefix.$nr.".jpg";
						break;
						
						case 3:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path.$prefix.$nr.".png")) break; }
						$filename = $prefix.$nr.".png";
						break;
		
						case 6:
						for(;;) { $nr++; if (!file_exists($uploaded_images_path.$prefix.$nr.".bmp")) break; }
						$filename = $prefix.$nr.".bmp";
						break;
					}
					$extension_arr = array('gif'=>'image/gif','jpg'=>'image/jpeg','png'=>'image/png');
					$file_ext = trim(substr($filename,strpos($filename, '.')+1,strlen($filename)));
					
					// Create the thumbnail
					if($image_info[0] < $upload_max_img_width && $image_info[1] < $upload_max_img_height)
					{
						$thumbnail = new sfThumbnail($image_info[0],$image_info[1]);
					}
					elseif($image_info[0] < $upload_max_img_width && $image_info[1] > $upload_max_img_height)
					{
						$thumbnail = new sfThumbnail($image_info[0],$upload_max_img_height);
					}
					elseif($image_info[0] > $upload_max_img_width && $image_info[1] < $upload_max_img_height)
					{
						$thumbnail = new sfThumbnail($upload_max_img_width,$image_info[1]);
					}
					else
					{
						$thumbnail = new sfThumbnail(495, 1000);
					}

					$thumbnail->loadFile($_FILES['upload_detail_image']['tmp_name']);
					$thumbnail->save($uploaded_images_path.$filename, $extension_arr[$file_ext]);
					$this->getUser()->setAttribute('img_name_n_path', $folder_path.$filename);
					$errors = 'Uppladdad framgångsrikt';
					$this->filenameFull = $_FILES['upload_detail_image']['name']; 
			
				}
			}
			else
			{
				$errors = 'No file provided';
			}
		}
		$this->errors = $errors;
		$this->filename = $filename;
		$this->type = $type;
		//return  $this->renderText($errors);
  }
  
 /**
  * Executes GetAllUsernames action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetAllUsernames(sfWebRequest $request)
  {
	 $profile = new SfGuardUserProfile();
	 $data = $profile->getUserNameList();
	 //$data = 'ajay,amol,mangesh,swapnil';
	 return  $this->renderText($data);
  }
  
 /**
  * Executes FecthMyAllFriends action
  *
  * @param sfRequest $request A request object
  */
  public function executeFecthMyAllFriend(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$this->friend_id = $this->friend_name = $this->user_photo_arr = array();
	$profile = new SfGuardUserProfile();
	$userProfileImage = new SbtUserprofilePhoto(); 
		
	$user_id = $request->getParameter('user_id');
	$data = $userProfileImage->fetchAllPhotoRecord();
	
	for($i=0; $i < count($data); $i++) { $this->user_photo_arr[$data[$i]['user_id']] = $data[$i]['profile_photo_name']; } 
	 
	$all_friends = $profile->fetchAllFriend($user_id);
		
	foreach($all_friends as $friend)
	{ 
		if($friend->contactor_id == $user_id)
		{
			$this->friend_id[] = $friend->contactee_id;
			$this->friend_name[] = substr($profile->getFullUserName($friend->contactee_id),0,strpos($profile->getFullUserName($friend->contactee_id), ' '));
		}
		if($friend->contactee_id == $user_id)
		{
			$this->friend_id[] = $friend->contactor_id;
			$this->friend_name[] = substr($profile->getFullUserName($friend->contactor_id),0,strpos($profile->getFullUserName($friend->contactor_id), ' '));
		}
	}
  }
  
 /**
  * Executes Help action
  *
  * @param sfRequest $request A request object
  */
  public function executeHelp(sfWebRequest $request)
  {
	 $this->host_str = $this->getRequest()->getHost();
	 isicsBreadcrumbs::getInstance()->addItem('Help', 'sbt/help');
	 
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', '');
  }
  
   /*
	*
	* This function returns count of blog written by a perticular user.
	*
	*/
	public function executeGetBlogCntOfUser(sfWebRequest $request)
	{
		$user_id = $request->getParameter('user_id');
		$sbt_user_blog = new SbtUserBlog();
	    $blog_cnt = $sbt_user_blog->getBlogCnt($user_id);
		return  $this->renderText($blog_cnt);
	}
    public function executeDelAnalysisCommentData(sfWebRequest $request)
	{
		$deletepost_id = $this->getRequestParameter('deletepost_id');
		$deletepost_id = trim(str_replace('delete_link','',$deletepost_id)); 
        //echo $deletepost_id;die;     
		$comment = new SbtAnalysisComment();
        $analysis_id = $request->getParameter('analysis_id');

		$post_data = $comment->delAnalysisCommentData($deletepost_id);
        if(isset($post_data))
        {
            $this->getUser()->setFlash('notice','Comment Deleted Successfully');
        } 
        $mymarket = new mymarket();
        $this->sbtAnalysisCommentForm = new SbtAnalysisCommentForm();
	    //$all_comments_query = BorstArticleCommentTable::getInstance()->getCommentsOnArticleQuery($analysis_id);
        $all_comments_query = SbtAnalysisCommentTable::getInstance()->getCommentsOnArticleQuery($analysis_id);
	    $this->pager = $mymarket->getPagerForAll('SbtAnalysisComment','25',$all_comments_query,$request->getParameter('page', 1));
        return $this->renderPartial('sbt/deleted_article_comment_html', array('pager'=> $this->pager,'sbtAnalysisCommentForm'=>$this->sbtAnalysisCommentForm));
	}
	
	/**
  * Executes Profiler action
  *
  * @param sfRequest $request A request object
  */
  public function executeProfiler(sfWebRequest $request)
  {
	 isicsBreadcrumbs::getInstance()->addItem('Sister BT Blog', 'sbt/Profiler');
	 
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_profiler');
         $this->getUser()->setAttribute('parent_menu_common', '9');
	 $this->host_str = $this->getRequest()->getHost();
	 $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
         $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');
         $this->form = new $class();
         $this->login_error = $this->getUser()->getAttribute('loginerror');

		$mymarket = new mymarket();
		$this->user_arr = array();
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('userlist_current_column','','userProperty');
		if($request->getParameter('page'))
		{
			$order = $request->getParameter('userlist_current_column_order');
		}
		else
		{
			if($current_column == $column_id)
			{ 
				$order = $this->getUser()->getAttribute('userlist_current_column_order','','userProperty');
		
				if($order == 'ASC') $order = 'DESC';
				else $order = 'ASC';
		
				$this->getUser()->setAttribute('userlist_current_column_order',$order,'userProperty');
			}
			else
			{
				$this->getUser()->setAttribute('userlist_current_column',$column_id,'userProperty');
				$this->getUser()->setAttribute('userlist_current_column_order','ASC','userProperty');
				$order = 'ASC';
			}
		}
		
		$query = SfGuardUserProfileTable::getInstance()->getAllUserByOrderQuery($column_id,$order);
	
	 	$this->pager = $mymarket->getPagerForAll('SfGuardUserProfile',25,$query,$request->getParameter('page', 1));
		$this->current_column_order = $order;
		$this->column_id = $column_id;
		
		$userProfileImage = new SbtUserprofilePhoto(); 
	 	$data = $userProfileImage->fetchAllPhotoRecord();
	
	 	for($i=0; $i<count($data); $i++) {	$this->user_arr[$data[$i]['user_id']] = $data[$i]['profile_photo_name']; } 
  }
  
  /**
	* 
	* This function fetches the user list data.
	* 
	*/
	public function executeGetProfilerListData(sfWebRequest $request)
	{
		$this->host_str = $this->getRequest()->getHost();
		$mymarket = new mymarket();
		$this->user_arr = array();
		
		$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
		$current_column = $this->getUser()->getAttribute('userlist_current_column','','userProperty');
		if($request->getParameter('page'))
		{
			$order = $request->getParameter('userlist_current_column_order');
		}
		else
		{
			if($current_column == $column_id)
			{ 
				$order = $this->getUser()->getAttribute('userlist_current_column_order','','userProperty');
		
				if($order == 'ASC') $order = 'DESC';
				else $order = 'ASC';
		
				$this->getUser()->setAttribute('userlist_current_column_order',$order,'userProperty');
			}
			else
			{
				$this->getUser()->setAttribute('userlist_current_column',$column_id,'userProperty');
				$this->getUser()->setAttribute('userlist_current_column_order','ASC','userProperty');
				$order = 'ASC';
			}
		}
		
		$query = SfGuardUserProfileTable::getInstance()->getAllUserByOrderQuery($column_id,$order);
	
	 	$this->pager = $mymarket->getPagerForAll('SfGuardUserProfile',25,$query,$request->getParameter('page', 1));
		$this->current_column_order = $order;
		$this->column_id = $column_id;
		
		$userProfileImage = new SbtUserprofilePhoto(); 
	 	$data = $userProfileImage->fetchAllPhotoRecord();
	
	 	for($i=0; $i<count($data); $i++) {	$this->user_arr[$data[$i]['user_id']] = $data[$i]['profile_photo_name']; } 
	}
        
        public function executeAjaxCheckCaptcha(sfWebRequest $request){
            $private_key = sfConfig::get('app_recaptcha_private_key');
            $this->public_key = sfConfig::get('app_recaptcha_public_key');
            $captcha = $this->getRequestParameter('g-recaptcha-response');  
            $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$private_key."&response=".$captcha."&remoteip=".$host_str), true);
            $pass = 0;
            if($response["success"]==true){
                $pass = 1;
            }
            return $this->renderText($pass);
        }
}

