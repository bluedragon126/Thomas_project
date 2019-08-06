<?php

/**
 * forum actions.
 *
 * @package    sisterbt
 * @subpackage forum
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class forumActions extends sfActions
{
  /**
  *
  * Executes Before Every Action
  *
  */
  public function preExecute() 
  {  
	$user = $this->getUser();
	$host_str = $this->getRequest()->getHost();
	//set selected for list menu
	if($this->getUser()->getAttribute('third_menu') != 'list')
	{
		$this->getUser()->setAttribute('third_menu', '');
	}
	$actionName  = $this->getActionName();
	$ajax_called_action_names_arr = array('createForumTopic','getForumContentByOrder','getSbtSubCategory','getForumSubCategoryMenu','saveCommentOnForum');
		
	if(!in_array($actionName, $ajax_called_action_names_arr))
	{
		$stdlib = new stdlib();
		$wantsurl = $stdlib->accessed_url();
		$this->getUser()->setAttribute('wantsurl',$wantsurl);
	}
	if(!$this->getRequest()->isXmlHttpRequest())
	{
		// Bottom Cube Links
		$this->bottom_commodities_links = ArticleTable::getInstance()->getHomeCommodities(0,10,$isSuperAdmin);
		$this->bottom_currencies_links = ArticleTable::getInstance()->getHomeCurrencies(0,10);
		$this->bottom_buysell_links = ArticleTable::getInstance()->getHomeBuySell(0,10,$isSuperAdmin);
		$this->bottom_statistics_links = ArticleTable::getInstance()->getHomeStatisticsArticle(0,10,$isSuperAdmin);
		$this->bottom_aktier_links = ArticleTable::getInstance()->getHomeAktier(0,10,$isSuperAdmin);
		$this->bottom_kronika_links = ArticleTable::getInstance()->getHomeKronikaArticle(0,10,$isSuperAdmin);
	
		$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
		$id = $this->getRequestParameter('id');
		$this->show_top_links = $id == $this->logged_user ? 1 : ($actionName=='sbtUserProfile' ? 1 : 0);
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
  * Executes ForumHome action
  *
  * @param sfRequest $request A request object
  */
  public function executeForumHome(sfWebRequest $request)
  {
	 isicsBreadcrumbs::getInstance()->addItem('Sister BT Forum', 'forum/forumHome');
	 
	 $mymarket = new mymarket(); 
	 $this->profile = new SfGuardUserProfile();
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_forum_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'forum_menu_home');
         $this->getUser()->setAttribute('parent_menu_common', '4');
	 $forum_tab = $this->getRequestParameter('cat_id') ? $this->getRequestParameter('cat_id') : 9;
	 
	  $this->methodName = 'getSubCategoryName'; 
	 if(!$forum_tab || $forum_tab == 9)
	 {
	 	 $this->methodName = 'getCategoryName';
	 }
	 
	 switch($forum_tab)
	 {
	 	case 1: $query = BtforumTable::getInstance()->getSelctedForumTopics(1); break;
		case 2: $query = BtforumTable::getInstance()->getSelctedForumTopics(2); break;
		case 3: $query = BtforumTable::getInstance()->getSelctedForumTopics(3); break;
		case 4: $query = BtforumTable::getInstance()->getSelctedForumTopics(4); break;
		case 5: $query = BtforumTable::getInstance()->getSelctedForumTopics(5); break;
		case 6: $query = BtforumTable::getInstance()->getSelctedForumTopics(6); break;
		case 7: $query = BtforumTable::getInstance()->getSelctedForumTopics(7); break;
		case 8: $query = BtforumTable::getInstance()->getSelctedForumTopics(8); break;
		default: $query = BtforumTable::getInstance()->getAllNewForumPostQuery(); break;
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
  * Executes GetForumContentByOrder action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetForumContentByOrder(sfWebRequest $request)
  {
	 $param = array();
	 $mymarket = new mymarket();
	 $profile = new SfGuardUserProfile();
	 $this->new_profile = new SfGuardUserProfile();
	 $this->host_str = $this->getRequest()->getHost();
	 
	 $column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
	 $current_column = $this->getUser()->getAttribute('sbt_forum_column','','userProperty');
	 $page = $request->getParameter('page');
	 $sbt_forum_column_order = $request->getParameter('sbt_forum_column_order');
	 $set_column = 'sbt_forum_column';
	 $set_column_order = 'sbt_forum_column_order';
	 $cat_id = trim(str_replace('cat_','',$request->getParameter('forum_parent_tab')));
	 $sub_cat_id = trim(str_replace('subcat_','',$request->getParameter('forum_sub_cat_id')));
	 $param['column_id'] = $column_id;
	 $forum_parent_tab = $request->getParameter('forum_parent_tab');
	 
	 if($request->getParameter('delete_forum_topic_id'))
	 {
	 	 $btforum = new Btforum();
		 $btforum->fetchAllRecordWithId($request->getParameter('delete_forum_topic_id'));
	 }
	 
	 $order = $profile->setSortingParameters($page,$sbt_forum_column_order,$column_id,$current_column,$set_column,$set_column_order);

	 $forum_tab = $cat_id ? $cat_id : $this->getUser()->getAttribute('forum_tab','','userProperty');
	
	 $this->methodName = 'getSubCategoryName';
	 if(!$forum_tab || $forum_tab == 9)
	 {
	 	 $this->methodName = 'getCategoryName';
	 }

	 switch($forum_tab)
	 {
	 	case 1: $query = BtforumTable::getInstance()->getOrderedSelctedForumTopics(1,$sub_cat_id,$column_id,$order); break;
		case 2: $query = BtforumTable::getInstance()->getOrderedSelctedForumTopics(2,$sub_cat_id,$column_id,$order); break;
		case 3: $query = BtforumTable::getInstance()->getOrderedSelctedForumTopics(3,$sub_cat_id,$column_id,$order); break;
		case 4: $query = BtforumTable::getInstance()->getOrderedSelctedForumTopics(4,$sub_cat_id,$column_id,$order); break;
		case 5: $query = BtforumTable::getInstance()->getOrderedSelctedForumTopics(5,$sub_cat_id,$column_id,$order); break;
		case 6: $query = BtforumTable::getInstance()->getOrderedSelctedForumTopics(6,$sub_cat_id,$column_id,$order); break;
		case 7: $query = BtforumTable::getInstance()->getOrderedSelctedForumTopics(7,$sub_cat_id,$column_id,$order); break;
		case 8: $query = BtforumTable::getInstance()->getOrderedSelctedForumTopics(8,$sub_cat_id,$column_id,$order); break;
		default: $query = BtforumTable::getInstance()->getOrderedSelctedForumTopics(9,$sub_cat_id,$column_id,$order); break;
	 }
	 //echo $query->getSqlQuery();
	 $this->forum_tab = $forum_tab;
	 $this->column_id = $column_id;
	 $this->current_column_order = $order;
	 $this->cur_column = $current_column;
	 $this->forum_parent_tab = $forum_parent_tab;
	 $this->forum_sub_cat_id = $request->getParameter('forum_sub_cat_id');
	 
	 $this->pager = $mymarket->getPagerForAll('Btforum',50,$query,$request->getParameter('page', 1));
	 $this->ext = $mymarket->getExtension($param);
  }
  
  /**
  * Executes GetSbtSubCategory action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetSbtSubCategory(sfWebRequest $request)
  {
  	$cat_id = $request->getParameter('cat_id');
	$sub = new BtforumCategory();
	$subCategory = $sub->getSubCategories($cat_id);
	
	$this->forumForm = new BtforumForm();
	$this->wSchema = $this->forumForm->getWidgetSchema();
	$this->wSchema['btforum_subcategory_id'] = new sfWidgetFormSelect(array('choices' => $subCategory));
  }
  
  /**
  * Executes GetForumSubCategoryMenu action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetForumSubCategoryMenu(sfWebRequest $request)
  {
  	$cat_id = trim(str_replace('cat_','',$request->getParameter('cat_id')));
	$this->subcat_id = trim(str_replace('subcat_','',$request->getParameter('forum_sub_cat_id')));
	$sub = new BtforumCategory();
	$this->subCategory = $sub->getSubCategories($cat_id);
  }
  
  /**
  * Executes CreateForumTopic action
  *
  * @param sfRequest $request A request object
  */
  public function executeCreateForumTopic(sfWebRequest $request)
  { 
	if(!$this->checkAccess()) { return  $this->renderText('0'); }
	
	 isicsBreadcrumbs::getInstance()->addItem('Sister BT Forum', 'forum/forumHome');
	 $this->getUser()->setAttribute('parent_menu', 'top_forum_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'forum_menu_home');
	 $this->host_str = $this->getRequest()->getHost();
	 
	 $profile = new SfGuardUserProfile();
	 $userProfileImage = new SbtUserprofilePhoto(); 
	 $fm = new Btforum();
	 
	 $arrCategory = $this->preview_information = array();
	 
	 $arrCategory = BtforumCategoryTable::getAllForumCategories();
	 $firstname = $this->getUser()->getAttribute('firstname', '' , 'userProperty');
	 $lastname = $this->getUser()->getAttribute('lastname', '' , 'userProperty');
	 $user_id = $this->getUser()->getAttribute('user_id','', 'userProperty');
	 
	 $forum = $fm->fetchTopic($request->getParameter('id'));
	 
	 $this->forumForm = new BtforumForm($forum);
	 $this->wSchema = $this->forumForm->getWidgetSchema();
	 $this->wSchema['btforum_category_id']->setOption('choices',$arrCategory);
	
	 if($request->getParameter('id'))
		 $this->forumForm->setDefault('id',$request->getParameter('id'));
 	 if(!$request->getParameter('id')) 	 
	 {
		 $this->forumForm->setDefault('author_id',$user_id);	
		 $this->forumForm->setDefault('datum',date('Y-m-d H:i:s'));
		 $this->forumForm->setDefault('andratdatum',date('Y-m-d H:i:s'));
		 $this->forumForm->setDefault('skapare',$firstname.' '.$lastname);
		 $this->forumForm->setDefault('ant_inlagg',0);
		 $this->forumForm->setDefault('amne','ja');
		 $this->forumForm->setDefault('koppling','whea');
		 $this->forumForm->setDefault('visningar',0);
	 }	 
	 
	 // Data for Preview
	 /*$this->user_id = $this->getUser()->getAttribute('user_id','', 'userProperty');
	 $photo_data = $userProfileImage->searchForRecord($this->user_id);
	 $data_arr = $profile->fetchRegdateAndTotalLogin($firstname.' '.$lastname); 

	 $this->preview_information['user_id'] = $this->user_id;
	 $this->preview_information['today_data'] = date('Y-m-d H:i:s');	
	 $this->preview_information['name'] = $firstname.' '.$lastname;
	 $this->preview_information['user_photo'] = $photo_data->profile_photo_name ? $photo_data->profile_photo_name : ''; 
	 $this->preview_information['user_active'] = $data_arr ? date("M Y", strtotime($data_arr[0]['regdate'])): '';
	 $this->preview_information['user_login'] = $data_arr ? $data_arr[0]['inlog'] : '';*/
	 
	 if ($request->isMethod('post'))	 
	 {
	 	$forumForm_arr = $request->getParameter($this->forumForm->getName());
		
		$this->forumForm->bind($forumForm_arr);
		
		if($this->forumForm->isValid())
		{
			$id = $this->forumForm->save();			
			 if($request->getParameter('id'))
			 {
			 	$this->getUser()->setFlash('SuccessMsg', "Denna tråd har flyttats till nuvarande kategori av forumets moderator.");
			 }
			
			$forum = new Btforum();
			$forum->setKoppling($id);
			
			$profile->updateActivityCount($user_id);
			
			$url = 'http://'.$this->host_str .'/forum/commentOnForumTopic/forumid/'.$id;
			//$this->redirect('forum/forumHome');		
			$this->redirect($url);		
		}
		else
		{
			//echo $this->forumForm->getErrorSchema();
		}
	 }
  }
  /**
	* 
	* This function deletes the posted comment of a perticular article for forum.
	* 
	*/
	public function executeDelForumArticleCommentData(sfWebRequest $request)
	{
		$profile = new SfGuardUserProfile();
		$deletepost_id = $this->getRequestParameter('delete_forum_post_id');
		//$deletepost_id = trim(str_replace('delete_link','',$deletepost_id));     
		//$comment = new BorstArticleComment();
         $parentid = $this->getRequestParameter('forumid');
         if($this->getRequestParameter('forumid')!='')
         $this->$parentid = $parentid;
         else
         $this->$parentid = $this->getUser()->setAttribute('koppling_id');
         
         
         
         //$koppling_id = $this->getRequestParameter('koppling_id');
        //$parentid = $request->getParameter('parentid');
        //print $parentid;exit;
		//$post_data = $comment->delArticleCommentData($deletepost_id);
        $btforum = new Btforum();
        $this->new_profile = new SfGuardUserProfile();
        $post_data = $btforum->delArticleCommentData($deletepost_id);
        
        if(isset($post_data))
        {
            $this->getUser()->setFlash('notice','Forum Post Deleted Successfully');
        } 
        $mymarket = new mymarket();
        $page = $request->getParameter('page', 1);
	    $reply_data_query = $btforum->fetchForumTopicReplyQuery($parentid);
        $this->rec_per_page = 10 ;
	    $this->pager = $mymarket->getPagerForAll('Btforum','10',$reply_data_query,$page);
        $lastPage = $this->pager->getLastPage();
        if($lastPage < $page){
            $this->pager->setPage($lastPage);
            $this->pager->init();
        }
        else
        {
            $this->pager->setPage($page);
        }
        $this->topic_data = $btforum->fetchTopic($parentid);
        $this->update_only_forum_topic = 0 ;
		$btforum->increaseViewCount($parentid);
		
		$this->user_arr = array();
		$userProfileImage = new SbtUserprofilePhoto(); 
		$photo_data = $userProfileImage->fetchAllPhotoRecord();
		
		for($i=0; $i<count($photo_data); $i++) 
		{	
			$name_arr = $profile->fetchFirstnameLastname($photo_data[$i]['user_id']);
			$name = $name_arr[0]['firstname'].' '.$name_arr[0]['lastname'];
			$this->user_arr[$name] = $photo_data[$i]['profile_photo_name']; 
		}
		
        return $this->renderPartial('forum/deleted_article_comment_html',
        array('user_arr' => $this->user_arr, 'rec_per_page' => $this->rec_per_page ,'parentid'=>$this->$parentid,'pager'=> $this->pager,'new_profile'=>$this->new_profile,'update_only_forum_topic'=>$this->update_only_forum_topic,'topic_data'=>$this->topic_data));
	}
  
  /**
  * Executes CommentOnForumTopic action
  *
  * @param sfRequest $request A request object
  */
  public function executeCommentOnForumTopic(sfWebRequest $request)
  {
	 isicsBreadcrumbs::getInstance()->addItem('Sister BT Forum', 'forum/forumHome');
	 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_forum_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'forum_menu_home');
	 //$this->from_sbt = $this->getUser()->getAttribute('from_sbt', '' , 'userProperty');
	 $this->isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
	 $mymarket = new mymarket();
	 $this->user_arr = array();
	 $profile = new SfGuardUserProfile();
	 $this->new_profile = new SfGuardUserProfile();
	 $this->rec_per_page = 10;
	 
	 $user_id = $this->getUser()->getAttribute('user_id','', 'userProperty');
	 $this->rec = $profile->getActiveStatus($user_id);
	 
	 $parentid = $this->getRequestParameter('forumid');
      
	 //$parentid = $this->getRequestParameter('parentid');
	 //$koppling_id = $this->getRequestParameter('koppling_id');
	 
	 $btforum = new Btforum();
	$this->reply_count = $btforum->getReplyCount($parentid);
	 //if($koppling_id)
	 if($parentid)
	 {
	 	//$reply_data_query = $btforum->fetchForumTopicReplyQuery($koppling_id);
		$reply_data_query = $btforum->fetchForumTopicReplyQuery($parentid);
        //print $reply_data_query->getSqlQuery();die;
		$this->pager = $mymarket->getPagerForAll('Btforum',$this->rec_per_page,$reply_data_query,$request->getParameter('page', 1));
		
		$this->topic_data = $btforum->fetchTopic($parentid);
		$btforum->increaseViewCount($parentid);
	 }
	 else
	 {
	 	$this->topic_data = $btforum->fetchTopic($parentid);
	 }
	 
	 $firstname = $this->getUser()->getAttribute('firstname', '' , 'userProperty');
	 $lastname = $this->getUser()->getAttribute('lastname', '' , 'userProperty');
	 $this->from_sbt = $this->getUser()->getAttribute('from_sbt', '' , 'userProperty');
	 $this->isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
	 
	 $this->forumForm = new BtforumForm();
	 $this->wSchema = $this->forumForm->getWidgetSchema();
	 $storeFormSchema = $this->forumForm->getValidatorSchema(); 
	 
	 if($this->topic_data->btforum_category_id > 0)	$this->wSchema['btforum_category_id'] = new sfWidgetFormInputHidden();
	 else $storeFormSchema['btforum_category_id']->setOption('required',false);
	 
	 if($this->topic_data->btforum_subcategory_id > 0) 	$this->wSchema['btforum_subcategory_id'] = new sfWidgetFormInputHidden();
	 else $storeFormSchema['btforum_subcategory_id']->setOption('required',false);
	 
  	 $storeFormSchema['rubrik']->setOption('required',false);
	 
	 $this->forumForm->setDefault('skapare',$firstname.' '.$lastname);
	 $this->forumForm->setDefault('author_id',$user_id);
	 $this->forumForm->setDefault('rubrik','');
	 $this->forumForm->setDefault('datum',date('Y-m-d H:i:s'));
	 $this->forumForm->setDefault('andratdatum',date('Y-m-d H:i:s'));
	 $this->forumForm->setDefault('visningar',0);
	 $this->forumForm->setDefault('ant_inlagg',0);
	 $this->forumForm->setDefault('amne',$parentid);
	 
	 if($this->topic_data->btforum_category_id > 0)	$this->forumForm->setDefault('btforum_category_id',$this->topic_data->btforum_category_id);
	 if($this->topic_data->btforum_subcategory_id > 0) $this->forumForm->setDefault('btforum_subcategory_id',$this->topic_data->btforum_subcategory_id);
	 
     //echo $this->getUser()->setAttribute('koppling_id');//die;
	 //$this->forumForm->setDefault('koppling',$parentid);
	 if($this->getRequestParameter('forumid')!='')
	 $this->parentid = $parentid;
     else
     $this->parentid = $this->getUser()->setAttribute('koppling_id');
	 //$this->koppling_id = $koppling_id;
	 
	 $userProfileImage = new SbtUserprofilePhoto(); 
	 $data = $userProfileImage->fetchAllPhotoRecord();
	
	 for($i=0; $i<count($data); $i++) 
	 {	
	 	$name_arr = $profile->fetchFirstnameLastname($data[$i]['user_id']);
		$name = $name_arr[0]['firstname'].' '.$name_arr[0]['lastname'];
		$this->user_arr[$name] = $data[$i]['profile_photo_name']; 
	 }
	 
	 $user = $this->getUser();
	 if($user->isAuthenticated()) $this->valid_user = 1;
	 else $this->valid_user = 0;
	 
	 $this->user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	 $favorite = new SbtFavorite();
	 $fav_data = $favorite->isAddedInFavoriteList('forum',$this->topic_data->id,$this->user_id);
	 if($fav_data)
	 {
	 	if($fav_data->id!='')  $this->add_in_fav_list = 1;
		else  $this->add_in_fav_list = 0;  
	 }
	 else $this->add_in_fav_list = 0; 
	 
	 // Data for Preview
	 $this->preview_information = array();
	 
	 $firstname = $this->getUser()->getAttribute('firstname', '' , 'userProperty');
	 $lastname = $this->getUser()->getAttribute('lastname', '' , 'userProperty');
	 $this->user_id = $this->getUser()->getAttribute('user_id','', 'userProperty');
	 $photo_data = $userProfileImage->searchForRecord($this->user_id);
	 $data_arr = $profile->fetchRegdateAndTotalLogin($firstname.' '.$lastname);
         $this->categoryName = $btforum->getCategoryName($this->topic_data->btforum_category_id);
         $this->subCategoryName = $btforum->getSubCategoryName($this->topic_data->btforum_subcategory_id);
         
	 $this->preview_information['user_id'] = $this->user_id;
	 $this->preview_information['today_data'] = date('Y-m-d H:i:s');	
	 $this->preview_information['name'] = $firstname.' '.$lastname;
	 $this->preview_information['user_photo'] = $photo_data->profile_photo_name ? $photo_data->profile_photo_name : ''; 
	 $this->preview_information['user_active'] = $data_arr ? date("M Y", strtotime($data_arr[0]['regdate'])): '';
	 $this->preview_information['user_login'] = $data_arr ? $data_arr[0]['inlog'] : ''; 
  } 
  
  /**
  * Executes SaveCommentOnForum post action
  *
  * @param sfRequest $request A request object
  */
  public function executeSaveCommentOnForum(sfWebRequest $request)
  {
  	 $btforum = new Btforum();
 	 $this->host_str = $this->getRequest()->getHost();
	 $firstname = $this->getUser()->getAttribute('firstname', '' , 'userProperty');
	 $lastname = $this->getUser()->getAttribute('lastname', '' , 'userProperty');
	 $this->from_sbt = $this->getUser()->getAttribute('from_sbt', '' , 'userProperty');
	 $this->isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
	 $mymarket = new mymarket();
	 $profile = new SfGuardUserProfile();
	 $this->new_profile = new SfGuardUserProfile();
	 $this->user_arr = array();
	 $this->forumForm = new BtforumForm();
	 $this->wSchema = $this->forumForm->getWidgetSchema();
	 $storeFormSchema = $this->forumForm->getValidatorSchema(); 
	 $storeFormSchema['rubrik']->setOption('required',false);
	 $this->rec_per_page = 10;
	 	 
	 if ($request->isMethod('post'))	 
	 {
	 	$arr = $this->getRequest()->getParameterHolder()->getAll();
		
		$topic_data = $btforum->fetchTopic($arr['parentid']);
		
		if($topic_data->btforum_category_id == 0) $storeFormSchema['btforum_category_id']->setOption('required',false);
		if($topic_data->btforum_subcategory_id == 0) $storeFormSchema['btforum_subcategory_id']->setOption('required',false);
		
		$forumForm_arr = $request->getParameter($this->forumForm->getName());
                $forumForm_arr['datum']=date('Y-m-d H:i:s');

		$this->forumForm->bind($forumForm_arr);
		if($this->forumForm->isValid())
		{
			if($arr['postid']!='')
			{
				$editpost_id = trim(str_replace('editpost','',$arr['postid'])); 
				$btforum->setForumPost($editpost_id,$arr['btforum']['textarea']);
			}	
			else
			{
				$id = $this->forumForm->save();
				$forum = new Btforum();
				$forum->setReplyKoppling($id,$arr['parentid']);
				
				$cnt = $forum->getReplyCount($arr['parentid']);
				$forum->setReplyCount($arr['parentid'],$cnt);
			}
			
			$this->getUser()->setAttribute('fav_notification','forum_'.$arr['parentid'].'_'.$topic_data->rubrik);
			$this->forum_topic_data = $btforum->fetchTopic($arr['parentid']);
			$this->update_only_forum_topic = 0 ;//$arr['is_forum_topic'];
			// Update date on adding comment
			$topic_data->setAndratdatum(date('Y-m-d H:i:s'));
			$topic_data->save(); 
		}
		else
		{
			echo $this->forumForm->getErrorSchema();
		}
		
		$reply_data_query = $btforum->fetchForumTopicReplyQuery($arr['parentid']);
		$this->pager = $mymarket->getPagerForAll('Btforum',$this->rec_per_page,$reply_data_query,1);

                $lastPage = $this->pager->getLastPage();
                
                $this->pager = $mymarket->getPagerForAll('Btforum',$this->rec_per_page,$reply_data_query,$lastPage);
        if($arr['is_forum_topic'])
              return $this->renderText($arr['btforum']['textarea']); 
	}
	else
	{
	    if($this->getRequestParameter('forumid')!='')
    	 $this->parentid = $parentid;
         else
         $this->parentid = $this->getUser()->setAttribute('koppling_id');	   
         
		$koppling_id = $this->getRequestParameter('koppling_id');
        $this->getUser()->setAttribute('koppling_id',$koppling_id);
		$reply_data_query = $btforum->fetchForumTopicReplyQuery($koppling_id);
		$this->pager = $mymarket->getPagerForAll('Btforum',$this->rec_per_page,$reply_data_query,$request->getParameter('page', 1)); 
	}
	$userProfileImage = new SbtUserprofilePhoto(); 
	$photo_data = $userProfileImage->fetchAllPhotoRecord();
	
	for($i=0; $i<count($photo_data); $i++) 
	{	
		$name_arr = $profile->fetchFirstnameLastname($photo_data[$i]['user_id']);
		$name = $name_arr[0]['firstname'].' '.$name_arr[0]['lastname'];
		$this->user_arr[$name] = $photo_data[$i]['profile_photo_name']; 
	}  

  } 
  
  /**
  * Executes UploadImageInForumDetail action
  *
  * @param sfRequest $request A request object
  */
  public function executeUploadImageInForumDetail(sfWebRequest $request)
  {
	    $this->setLayout(false);
		$type = $request->getParameter('type');
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		
		$prefix = 'forum_img';
		$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/forumDetailImage/'; 
		$folder_path = '/uploads/forumDetailImage/'; 

		$upload_max_img_size = 150;
		$upload_max_img_width = 455;
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
						$thumbnail = new sfThumbnail(455, 1000);
					}
					
					$thumbnail->loadFile($_FILES['upload_detail_image']['tmp_name']);
					$thumbnail->save($uploaded_images_path.$filename, $extension_arr[$file_ext]);
					$this->getUser()->setAttribute('img_name_n_path', $folder_path.$filename);
					$errors = 'File Uploaded Successfully'; 
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
  * Executes UploadImageInForumComment action
  *
  * @param sfRequest $request A request object
  */
  public function executeUploadImageInForumComment(sfWebRequest $request)
  {
	    $this->setLayout(false);
		$type = $request->getParameter('type');
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		
		$prefix = 'forum_cmnt_img';
		$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/forumCommentImage/'; 
		$folder_path = '/uploads/forumCommentImage/'; 

		$upload_max_img_size = 150;
		$upload_max_img_width = 455;
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
						$thumbnail = new sfThumbnail(455, 1000);
					}
					
					$thumbnail->loadFile($_FILES['upload_detail_image']['tmp_name']);
					$thumbnail->save($uploaded_images_path.$filename, $extension_arr[$file_ext]);
					$this->getUser()->setAttribute('img_name_n_path_forum_comment', $folder_path.$filename);
					$errors = 'File Uploaded Successfully'; 
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
	
	/**
	* 
	* This function checks weither the user is logged-In or Not. 
	* 
	*/
	public function checkAccess()
	{
		$user = $this->getUser();
		if ($user->isAuthenticated())
		{
			$profile = new SfGuardUserProfile();
			$user_data = $profile->getUserData($this->getUser()->getAttribute('user_id', '', 'userProperty'));
			$isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
			/*if( ($user_data->from_sbt == 1 && $user_data->sbt_active == 1) || ($isSuperAdmin == 1) )
			{
				return 1;
			}
			else
			{
				return 0;
			}*/
			
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	/*public function executeTrimTitle(sfWebRequest $request)
	{
		$query = Doctrine_Query::create()->from('Btforum btf')->where('btf.amne = ?', 'ja')->orderBy('btf.andratdatum DESC');
		$data = $query->execute();
		
		foreach($data  as $dd)
		{
			$title = trim($dd->rubrik);
			$dd->rubrik = $title;
			$dd->save();
		}
		echo 'compleetd'; die;
		
	}*/
	
	public function executeSetReplyCount(sfWebRequest $request)
	{
		$query = Doctrine_Query::create()->select('btf.id')->from('Btforum btf')->where('btf.amne = ? AND btf.andratdatum > ?', array('ja','2010-07-01'))->orderBy('btf.andratdatum DESC');
		$data = $query->fetchArray();
		
		for($i=0;$i<count($data);$i++)
		{
			$forum = new Btforum();
			$cnt = $forum->getReplyCount($data[$i]['id']);
			$forum->setReplyCount($data[$i]['id'],$cnt);
		}
		echo 'Completed';
		die;
	}
	
	/*public function executeSetUserId(sfWebRequest $request)
	{
		$query = Doctrine_Query::create()->select('DISTINCT btf.skapare as uname')->from('Btforum btf');
		$data = $query->fetchArray();
		
		for($i=0;$i<count($data);$i++)
		{
			$profile = new SfGuardUserProfile();
			$author_id = $profile->getUserFromFullName($data[$i]['uname']);
			if($author_id)
			{
				$category_name_cri = Doctrine_Query::create()
		       						->update('Btforum b')
       								->set('b.author_id', '?', $author_id)
       								->where('b.skapare LIKE ? ', '%'.$data[$i]['uname'].'%');
				$category_name_cri->execute();
			}
			
		}
		echo 'Completed';
		die;
	}*/
	
	/*Get form for replay on comment*/
	public function executeGetForumPostDataForComment(sfWebRequest $request)
	{
		$editpost_id = $this->getRequestParameter('editpost_id');
		$postedBy = $this->getRequestParameter('userName');
		//$editpost_id = trim(str_replace('editpost','',$editpost_id));
		
		$btforum = new Btforum();
		$post_data = $btforum->fetchTopic($editpost_id);
		$reply = "[quote][quotename]".ucwords($postedBy).":[/quotename][quotedesc]".$post_data->textarea."[/quotedesc][/quote]";
		
		return  $this->renderText($reply);
	}
	
}
