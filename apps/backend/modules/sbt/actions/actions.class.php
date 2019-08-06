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
  * Executes Before Every Action
  *
  * @param sfRequest $request A request object
  */
  public function preExecute()
  {
	$user = $this->getUser();
	$host_str = $this->getRequest()->getHost();
	
	$this->getUser()->setAttribute('third_menu', '');
	
	$actionName  = $this->getActionName();
	$showdata = 0;
	
	$stdlib = new stdlib();
	$wantsurl = $stdlib->accessed_url();
	$this->getUser()->setAttribute('wantsurl',$wantsurl);
	
	if($user->isAuthenticated())
	{
		/*$stdlib = new stdlib();
		$wantsurl = $stdlib->accessed_url();
		$this->getUser()->setAttribute('wantsurl',$wantsurl);*/
	
		if($this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty')==1)
			$showdata = 1;
		else
			$showdata = 0;	
		
		if($showdata == 1)
		{
			//$this->forward('home', 'adminHome');
		}
		else
		{
			$url = 'http://'.$host_str.'/';
			$this->redirect($url);		
		}
	}
	else
	{
		$url = 'http://'.$host_str.'/user/loginWindow';
		$this->redirect($url);
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
  * Executes SbtHome action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtHome(sfWebRequest $request)
  {
	 //isicsBreadcrumbs::getInstance()->addItem('Sister BT Forum', 'sbt/sbtForum');
	 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_home');
	 $this->getUser()->setAttribute('third_menu', ''); 
  }
  
  /**
  * Executes SbtArticleRequest action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtArticleRequest(sfWebRequest $request)
  {
	 //isicsBreadcrumbs::getInstance()->addItem('Sister BT Forum', 'sbt/sbtForum');
	 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_article_request_list');
	 $this->getUser()->setAttribute('third_menu', ''); 
	 
	 $analysis = new SbtAnalysis(); 
	 $this->profile = new SfGuardUserProfile();
	 $published_status = '';
	 $tab_id = 4;
	 
	 $query = $analysis->getCategoriedAnalysisQuery($tab_id,$column_id,$order);
	 
	 $this->pager = new sfDoctrinePager('SbtAnalysis', 25);
     $this->pager->setQuery($query);	
	 $this->pager->setPage($request->getParameter('page', 1));
	 $this->pager->init();
	 $this->tab_id = $tab_id;
  }
  
  /**
  * Executes SbtArticleRequest action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetSbtArticleRequest(sfWebRequest $request)
  {
	 $this->host_str = $this->getRequest()->getHost();
	 $analysis = new SbtAnalysis(); 
	 $profile = new SfGuardUserProfile();
	 
	 $tab_id = trim(str_replace('tab_','',$request->getParameter('tab_id'))); 
	 $tab_click = $request->getParameter('tab_click');
	 	 
	 $column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
	 $current_column = $this->getUser()->getAttribute('sbt_analysis_column','','userProperty');
	 $page = $request->getParameter('page');
	 $sbt_analysis_column_order = $request->getParameter('sbt_analysis_column_order');
	 $set_column = 'sbt_analysis_column';
	 $set_column_order = 'sbt_analysis_column_order';
	
	 if(!$tab_click)
	 	$order = $profile->setSortingParameters($page,$sbt_analysis_column_order,$column_id,$current_column,$set_column,$set_column_order);
	 else
	 	$order = 'DESC';
		
	 $query = $analysis->getCategoriedAnalysisQuery($tab_id,$column_id,$order);

	 $this->pager = new sfDoctrinePager('SbtAnalysis', 25);
     $this->pager->setQuery($query);	
	 $this->pager->setPage($request->getParameter('page', 1));
	 $this->pager->init();
	 $this->tab_id = $tab_id;
	 $this->column_id = $column_id;
	 $this->current_column_order = $order;
	 $this->cur_column = $current_column;
	 $this->profile = $profile;
  }
  
	/*
	* Executes SbtArticleDetails action
	*
	* This function is used While view in detail.
	*/	
	public function executeSbtArticleDetails(sfWebRequest $request)
	{
		$this->host_str = $this->getRequest()->getHost();
	 	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 	$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_article_request_list');
	 	$this->getUser()->setAttribute('third_menu', ''); 
		$article_id = $request->getParameter('article_id');
		
		$analysis = new SbtAnalysis();
		$this->analysis_data = $analysis->getSelectedArticle($article_id);
		$this->profile = new SfGuardUserProfile();
		
		$this->form = new SbtAnalysisSuggestionForm();
		$this->form->setDefault('analysis_id',$article_id);
		$this->form->setDefault('analysis_status',$this->analysis_data->published);
		$this->form->setDefault('suggestion_by',$this->getUser()->getAttribute('user_id', '', 'userProperty'));
		$this->form->setDefault('created_at',date("Y-m-d H:i:s"));	
		
		$this->getUser()->setAttribute('publ_rej_article_id',$article_id); 
		$this->getUser()->setAttribute('publ_rej_author',$this->analysis_data->author_id); 
		
		$cc = new SbtCombinedAnalysisData();
		$this->combine_data_str = $cc->searchRecordMakeLink($article_id);

		if($request->isMethod('post'))
		{
			$analysis_data = $request->getParameter($this->form->getName());
			$status = $analysis_data['analysis_status'];
			$publish_date = $request->getParameter('publish_date');
			
			$this->form->bind($analysis_data);
			if($this->form->isValid())
			{
				$record_data = $this->form->save();
				
				if($status == 1) // Publish Article
				{
					$this->analysis_data->published = $status;
					$this->analysis_data->created_at = $publish_date;
					$this->analysis_data->save();
					$this->getUser()->setAttribute('publ_rej_last_suggestion',$record_data->id); 
					
					$this->forward('email','sendApprovedAnalysisMail');
					
				}
				if($status == 2) // Rejected Article
				{
					$this->analysis_data->published = $status;
					$this->analysis_data->save();
					$this->getUser()->setAttribute('publ_rej_last_suggestion',$record_data->id); 
					
					$this->forward('email','sendRejectAnalysisMail');
				}
				
				//$url = 'http://'.$this->host_str.'/backend.php/sbt/SbtArticleRequest';
				//$this->redirect($url);
			}
			else
			{
				//echo $this->form->getErrorSchema();
			}
		}		
	}
  
  /**
  * Executes SbtAssignMedals action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtAssignMedals(sfWebRequest $request)
  {
	 //isicsBreadcrumbs::getInstance()->addItem('Sister BT Forum', 'sbt/sbtForum');
	 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_assign_medals');
	 $this->getUser()->setAttribute('third_menu', ''); 
	 
	 $query = SbtAnalysisTable::getInstance()->getAllAnalysisQuery('vote','DESC');  
	 
	 $mymarket = new mymarket();
	 $this->pager = $mymarket->getPagerForAll('SbtAnalysis',25,$query,$request->getParameter('page', 1));
  }
  
  /**
  * Executes AssignMedalToArticle action
  *
  * @param sfRequest $request A request object
  */
  public function executeAssignMedalToArticle(sfWebRequest $request)
  { 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_assign_medals');
	 $this->getUser()->setAttribute('third_menu', '');
  }

  /**
  * Executes GetMedalUser action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetMedalUser(sfWebRequest $request)
  { 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_assign_medals');
	 $this->getUser()->setAttribute('third_menu', ''); 
	 
	 $profile = new SfGuardUserProfile();
	 
	 $column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
	 $current_column = $this->getUser()->getAttribute('medal_user_column','','userProperty');
	 $page = $request->getParameter('page');
	 $medal_user_column_order = $request->getParameter('medal_user_column_order');
	 $set_column = 'medal_user_column';
	 $set_column_order = 'medal_user_column_order';
	
 	 $order = $profile->setSortingParameters($page,$medal_user_column_order,$column_id,$current_column,$set_column,$set_column_order);

	 if(!$column_id)
	 	$query = SfGuardUserProfileTable::getInstance()->getAllUserByOrderQuery('regdate','DESC');
	 else
	 	$query = SfGuardUserProfileTable::getInstance()->getAllUserByOrderQuery($column_id,$order);
	 
	 $mymarket = new mymarket();
	 $this->pager = $mymarket->getPagerForAll('SfGuardUserProfile',15,$query,$request->getParameter('page', 1));
	 
 	 $this->column_id = $column_id;
	 $this->current_column_order = $order;
	 $this->cur_column = $current_column;
  }

  /**
  * Executes GetMedalUser action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetMedalArticle(sfWebRequest $request)
  { 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_assign_medals');
	 $this->getUser()->setAttribute('third_menu', ''); 
	 $profile = new SfGuardUserProfile();
	 
	 $column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
	 $current_column = $this->getUser()->getAttribute('medal_analysis_column','','userProperty');
	 $page = $request->getParameter('page');
	 $medal_analysis_column_order = $request->getParameter('medal_analysis_column_order');
	 $set_column = 'medal_analysis_column';
	 $set_column_order = 'medal_analysis_column_order';
	
 	 $order = $profile->setSortingParameters($page,$medal_analysis_column_order,$column_id,$current_column,$set_column,$set_column_order);
		
	 $query = SbtAnalysisTable::getInstance()->getAllAnalysisQuery($column_id,$order);  
	 
	 $mymarket = new mymarket();
	 $this->pager = $mymarket->getPagerForAll('SbtAnalysis',25,$query,$request->getParameter('page', 1));
	 
	 $this->column_id = $column_id;
	 $this->current_column_order = $order;
	 $this->cur_column = $current_column;
  }
  
  /**
  * Executes AwardMedalToArticle action
  *
  * @param sfRequest $request A request object
  */
  public function executeAwardMedalToArticle(sfWebRequest $request)
  { 
	 $analysis_id = $request->getParameter('analysis_id');
	 $this->host_str = $this->getRequest()->getHost();
	 $medal_arr = array('1'=>'Analysis of the Year','2'=>'Analysis of the Month','3'=>'Most popular Analysis');

	 $this->award_message = $this->getUser()->getAttribute('award_to_analysis','','userProperty');
	 $this->getUser()->setAttribute('award_to_analysis','','userProperty');
	 
	 $analysis = new SbtAnalysis();
	 $profile = new SfGuardUserProfile();
	 $blog = new SbtUserBlog();
     $medal_details = new SbtAuthorMedalDetails();
	 
	 $this->one_analysis = $analysis->getSelectedArticle($analysis_id);
	 $this->analysis_data = $analysis->getAnalysisWrittenByUser($this->one_analysis->author_id,10);
	 $this->blog_data = $blog->getBlogWrittenByUser($this->one_analysis->author_id,10);
	 $this->username = $profile->getFullUserName($this->one_analysis->author_id);
	 $this->vote = $profile->getTotalVotesReceived($this->one_analysis->author_id);
	 $this->medal_cnt = $medal_details->getUserAwardCount($this->one_analysis->author_id);
	 $user_data = $profile->getUserData($this->one_analysis->author_id); 
	 
	 $this->form = new SbtAnalysisMedalDetailsForm();
	 $this->form->setDefault('analysis_id',$analysis_id);
	 $this->form->setDefault('analysis_medal_type_id','');
	 $this->form->setDefault('awarded_by',$this->getUser()->getAttribute('user_id','','userProperty'));
	 $this->form->setDefault('created_at',date("Y-m-d H:i:s"));
	 
	if($request->isMethod('post'))
	{
		$medal_data = $request->getParameter($this->form->getName());
		$this->form->bind($medal_data);
		if($this->form->isValid())
		{
			$record_data = $this->form->save();
			
			$this->getUser()->setAttribute('awarded_analysis_data',$this->one_analysis,'userProperty');
			$this->getUser()->setAttribute('awarded_analysis_author_data',$user_data,'userProperty');
			$this->getUser()->setAttribute('awarded_medal_name',$medal_arr[$record_data->analysis_medal_type_id],'userProperty');
			$this->getUser()->setAttribute('awarded_medal_data',$record_data,'userProperty');
			$this->forward('email', 'sendAnlysisAwardMail');
		}
	}

  }
  
  /**
  * Executes AwardMedalToUser action
  *
  * @param sfRequest $request A request object
  */
  public function executeAwardMedalToUser(sfWebRequest $request)
  { 
	 $author_id = $request->getParameter('author_id');
	 $this->host_str = $this->getRequest()->getHost();
	 $medal_arr = array('1'=>'Author of the Year','2'=>'Author of the Month','3'=>'Most popular Author');

	 $this->award_message = $this->getUser()->getAttribute('award_to_author','','userProperty');
	 $this->getUser()->setAttribute('award_to_author','','userProperty');
	 
	 $analysis = new SbtAnalysis();
	 $profile = new SfGuardUserProfile();
	 $blog = new SbtUserBlog();
	 $medal_details = new SbtAuthorMedalDetails();
	 
	 $this->analysis_data = $analysis->getAnalysisWrittenByUser($author_id,10);
	 $this->blog_data = $blog->getBlogWrittenByUser($author_id,10);
	 $this->username = $profile->getFullUserName($author_id);
	 $this->vote = $profile->getTotalVotesReceived($author_id);
	 $this->medal_cnt = $medal_details->getUserAwardCount($author_id);
	 $user_data = $profile->getUserData($author_id); 
	 
	 
	 $this->form = new SbtAuthorMedalDetailsForm();
	 $this->form->setDefault('author_id',$author_id);
	 $this->form->setDefault('author_medal_type_id','');
	 $this->form->setDefault('awarded_by',$this->getUser()->getAttribute('user_id','','userProperty'));
	 $this->form->setDefault('created_at',date("Y-m-d H:i:s"));
	 
	if($request->isMethod('post'))
	{
		$medal_data = $request->getParameter($this->form->getName());
		$this->form->bind($medal_data);
		if($this->form->isValid())
		{
			$record_data = $this->form->save();
			
			$this->getUser()->setAttribute('awarded_author_data',$user_data,'userProperty');
			$this->getUser()->setAttribute('awarded_medal_name',$medal_arr[$record_data->author_medal_type_id],'userProperty');
			$this->getUser()->setAttribute('awarded_medal_data',$record_data,'userProperty');
			$this->forward('email', 'sendUserAwardMail');
		}
	}

  }
  
  
  /**
  * Executes SbtPublisherRequest action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtPublisherRequest(sfWebRequest $request)
  { 
	
         $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_publisher_request');
	 $this->getUser()->setAttribute('third_menu', '');
 	 
	 $query = SfGuardUserProfileTable::getInstance()->getAllUserByOrderQuery('regdate','DESC');
         //$this->guard_user_arr = SfGuardUserProfileTable::getInstance()->isPublisher();
	 $profile = new SfGuardUserProfile();
	 
	 $mymarket = new mymarket();
	 $this->pager = $mymarket->getPagerForAll('SfGuardUserProfile',15,$query,$request->getParameter('page', 1));
         
	 
	if($request->isMethod('post'))
	{
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$user_id_arr = $profile->setGroupOfUser($arr);
		$this->getUser()->setAttribute('new_publisher',$user_id_arr,'userProperty');
	}
  }
  
  /**
  * Executes SbtPublisherRequestUserList action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtPublisherRequestUserList(sfWebRequest $request)
  { 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_publisher_request');
	 $this->getUser()->setAttribute('third_menu', '');
	 
	 //$this->guard_user_arr = SfGuardUserProfileTable::getInstance()->isPublisher();
	 $profile = new SfGuardUserProfile();
	 
	 if($request->isMethod('post'))
	 {
		/*$arr = $this->getRequest()->getParameterHolder()->getAll();
		$user_id_arr = $profile->setGroupOfUser($arr);
		$this->getUser()->setAttribute('new_publisher',$user_id_arr,'userProperty');*/
		
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		//$user_id_arr = $this->profile->setGroupOfUser($arr);
		$new_publisher_arr = $profile->setGroupOfUser($arr);
		//$this->getUser()->setAttribute('new_publisher',$user_id_arr,'userProperty');
		
		$publisher_arr = $regular_arr = array();
		$j=$k=0;
		
		for($i=0;$i<count($new_publisher_arr);$i++)
		{ 
			if(strstr($new_publisher_arr[$i], 'p_')) $publisher_arr[$j++] = trim(str_replace('p_','',$new_publisher_arr[$i]));
			if(strstr($new_publisher_arr[$i], 'r_')) $regular_arr[$k++] = trim(str_replace('r_','',$new_publisher_arr[$i]));
		}
		
		if(count($publisher_arr) > 0) $profile->resetRequestStatus($publisher_arr,'1');
		if(count($regular_arr) > 0)	$profile->resetRequestStatus($regular_arr,'2');
		
		$this->getUser()->setAttribute('new_publisher',$publisher_arr,'userProperty');
		$this->getUser()->setAttribute('new_regular',$regular_arr,'userProperty');
	 }
	 
	 $column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
	 $current_column = $this->getUser()->getAttribute('publisher_request_userlist_column','','userProperty');
	 $page = $request->getParameter('page');
	 $publisher_request_userlist_column_order = $request->getParameter('publisher_request_userlist_column_order');
	 $set_column = 'publisher_request_userlist_column';
	 $set_column_order = 'publisher_request_userlist_column_order';
	
 	 $order = $profile->setSortingParameters($page,$publisher_request_userlist_column_order,$column_id,$current_column,$set_column,$set_column_order);

	 if(!$column_id)
	 	$query = SfGuardUserProfileTable::getInstance()->getAllUserByOrderQuery('regdate','DESC');
	 else
	 	$query = SfGuardUserProfileTable::getInstance()->getAllUserByOrderQuery($column_id,$order);
	 
	 $mymarket = new mymarket();
	 $this->pager = $mymarket->getPagerForAll('SfGuardUserProfile',15,$query,$request->getParameter('page', 1));
	 
 	 $this->column_id = $column_id;
	 $this->current_column_order = $order;
	 $this->cur_column = $current_column;
  }
  
  /**
  * Executes SbtPublisherRequestList action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtPublisherRequestList(sfWebRequest $request)
  { 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_publisher_request_list');
	 $this->getUser()->setAttribute('third_menu', '');
 	 
	 $this->profile = new SfGuardUserProfile();
	 $query = SbtPublisherRequestTable::getInstance()->getAllPublisherRequestQuery('date','DESC');
	 //$this->guard_user_arr = SfGuardUserProfileTable::getInstance()->isPublisher();
	 
	 $mymarket = new mymarket();
	 $this->pager = $mymarket->getPagerForAll('SbtPublisherRequest',15,$query,$request->getParameter('page', 1));
  }
  
  /**
  * Executes GetSbtPublisherRequestList action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetSbtPublisherRequestList(sfWebRequest $request)
  { 
	 $this->host_str = $this->getRequest()->getHost();
	 $this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	 $this->getUser()->setAttribute('submenu_menu', 'sbt_menu_publisher_request_list');
	 $this->getUser()->setAttribute('third_menu', '');
 	 
	 $this->profile = new SfGuardUserProfile();
	 //$this->guard_user_arr = SfGuardUserProfileTable::getInstance()->isPublisher();
	 
	if($request->isMethod('post'))
	{
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		//$user_id_arr = $this->profile->setGroupOfUser($arr);
		$new_publisher_arr = $this->profile->setGroupOfUser($arr);
		//$this->getUser()->setAttribute('new_publisher',$user_id_arr,'userProperty');
		
		$publisher_arr = $regular_arr = array();
		$j=$k=0;
		
		for($i=0;$i<count($new_publisher_arr);$i++)
		{ 
			if(strstr($new_publisher_arr[$i], 'p_')) $publisher_arr[$j++] = trim(str_replace('p_','',$new_publisher_arr[$i]));
			if(strstr($new_publisher_arr[$i], 'r_')) $regular_arr[$k++] = trim(str_replace('r_','',$new_publisher_arr[$i]));
		}
		
		if(count($publisher_arr) > 0) $this->profile->resetRequestStatus($publisher_arr,'1');
		if(count($regular_arr) > 0)	$this->profile->resetRequestStatus($regular_arr,'2');
		
		$this->getUser()->setAttribute('new_publisher',$publisher_arr,'userProperty');
		$this->getUser()->setAttribute('new_regular',$regular_arr,'userProperty');
	}
	 
	 $column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
	 $current_column = $this->getUser()->getAttribute('publisher_pending_request_list_column','','userProperty');
	 $page = $request->getParameter('page');
	 $publisher_pending_request_list_column_order = $request->getParameter('publisher_pending_request_list_column_order');
	 $set_column = 'publisher_pending_request_list_column';
	 $set_column_order = 'publisher_pending_request_list_column_order';
	
 	 $order = $this->profile->setSortingParameters($page,$publisher_pending_request_list_column_order,$column_id,$current_column,$set_column,$set_column_order);

	 if(!$column_id)
	 	$query = SbtPublisherRequestTable::getInstance()->getAllPublisherRequestQuery('date','DESC');
	 else
	 	$query = SbtPublisherRequestTable::getInstance()->getAllPublisherRequestQuery($column_id,$order);
	 
	 $mymarket = new mymarket();
	 $this->pager = $mymarket->getPagerForAll('SbtPublisherRequest',15,$query,$request->getParameter('page', 1));
	 
  	 $this->column_id = $column_id;
	 $this->current_column_order = $order;
	 $this->cur_column = $current_column;
	 
  }
  
  /**
  * Executes ArticleList action
  *
  * @param sfRequest $request A request object
  */
  public function executeArticleList(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_article_list');
	$this->getUser()->setAttribute('third_menu', '');
	$this->host_str = $this->getRequest()->getHost();

	// Collecting Category, Type and Object.
	$cat_arr = $type_arr = $object_arr = $param_arr = $status_arr = $art_status = array();
	$ext = "";
	$mymarket = new mymarket();
	$this->profile = new SfGuardUserProfile();
	
	$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
    $type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
	$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
	$status_arr = SbtAnalysisStatusTable::getInstance()->getAllSbtArticleStatus();
	$art_status = SbtAnalysisStatusTable::getInstance()->getAllSbtArticleStatus();
	
	$cat_arr[0] = 'Kategory';
	$status_arr[0] = 'Status';
	// After Post Part
	//$article = new Article();
	$arr = $this->getRequest()->getParameterHolder()->getAll();
	if($arr['sbt_art_search']==1 || $this->getRequestParameter('sbt_art_search')==1) 
	{
		//	$query = ArticleTable::getInstance()->getFindArticleQuery($arr);
		//	$ext = $article->getSearchedParameterString($arr);
	}
	else{ 
		// Only for Column sorting.
		//if($this->getRequestParameter('sortby'))
		//$query = ArticleTable::getInstance()->getSortingArticleQuery($this->getRequestParameter('sortby'));
		//else
		$query = SbtAnalysisTable::getInstance()->getSortingSbtArticleQuery($param_arr,$column_id,$order);
	
		$this->ext = '&sortby='.$this->getRequestParameter('sortby');	
	}
	
	
	// For deleting a specific article
	if($arr['delete_article_id'])
	{
		$one_article = $article->getSelectedArticle($arr['delete_article_id']);
		if($one_article) $one_article->delete();
		
		$article_html = new ArticleHtml();
		$html_rec = $article_html->getSelectedHtmlRecord($arr['delete_article_id']);
		if($html_rec) $html_rec->delete();
	}
	
	// For updating article records 
	if($arr['action_mode'] == 'update_artiklar')
	{
		if($arr['artikelID'])
		{
			if(!$arr['delete_article_id'])
			{
				foreach ($arr['artikelID'] as $key => $value) 
				{
					$record = $article->getSelectedArticle($value);
					$record = $record->setSelectedArticle($arr["a_datum"][$key],$arr["rubrik"][$key],$arr["sel_art_statID"][$key]);
				}
			}	
		}
	}
	
	$this->pager = $mymarket->getPagerForAll('SbtAnalysis',20,$query,$request->getParameter('page', 1));
	
	$this->cat_arr = $cat_arr; 
	$this->type_arr = $type_arr;
	$this->object_arr = $object_arr;
	$this->status_arr = $status_arr;
	$this->art_status = $art_status;
	$this->ext = $ext;

	$this->art_id = $this->param_arr['art_id'];
	$this->search_katID = $this->param_arr['search_katID'];
	$this->search_art_statID = $this->param_arr['search_art_statID'];
	$this->art_title = $this->param_arr['art_title'];
	$this->sort_order = $this->param_arr['sort_order'];
	$this->no_of_pages = $this->param_arr['no_of_pages'];
  }
  
  /**
  * Executes GetSearchSbtArticleList action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetSearchSbtArticleList(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_sbt_menu');
	$this->getUser()->setAttribute('submenu_menu', 'sbt_menu_article_list');
	$this->getUser()->setAttribute('third_menu', '');
	$this->host_str = $this->getRequest()->getHost();
    $profile = new SfGuardUserProfile();

	$cat_arr = $type_arr = $object_arr = $object_country_arr = $count_arr = $param_arr = $status_arr = $art_status = array();
	$ext = "";
	
	$cat_arr = SbtArticleCategoryTable::getInstance()->getAllSbtArticleCategories();
    $type_arr = SbtArticleTypeTable::getInstance()->getAllSbtArticleTypes();
	$object_arr = SbtObjectTable::getInstance()->getAllSbtArticleObjects();
	$status_arr = SbtAnalysisStatusTable::getInstance()->getAllSbtArticleStatus();
	$art_status = SbtAnalysisStatusTable::getInstance()->getAllSbtArticleStatus();
	
	$cat_arr[0] = 'Kategory';
	$mymarket = new mymarket();
	$this->profile = new SfGuardUserProfile();
	
	$column_id = trim(str_replace('sortby_','',$request->getParameter('column_id')));
	$current_column = $this->getUser()->getAttribute('search_sbtarticle_column','','userProperty');
	$page = $request->getParameter('page');
	$search_sbtarticle_column_order = $request->getParameter('search_sbtarticle_column_order');
	$set_column = 'search_sbtarticle_column';
	$set_column_order = 'search_sbtarticle_column_order';
	
	$order = $profile->setSortingParameters($page,$search_sbtarticle_column_order,$column_id,$current_column,$set_column,$set_column_order);
	
	// After Post Part
	//$article = new Article();
	$arr = $this->getRequest()->getParameterHolder()->getAll();
	
	//$query = ArticleTable::getInstance()->getSortingArticleQuery($arr,$column_id,$order);
	
	//$no_of_pages = $arr['no_of_pages'] ? $arr['no_of_pages'] : 25;
	
	// For deleting a specific article
	if($arr['delete_article_id'])
	{
		$one_article = $article->getSelectedArticle($arr['delete_article_id']);
		if($one_article) $one_article->delete();
		
		$article_html = new ArticleHtml();
		$html_rec = $article_html->getSelectedHtmlRecord($arr['delete_article_id']);
		if($html_rec) $html_rec->delete();
	}
	
	// For updating article records 
	if($arr['action_mode'] == 'update_sbt_artiklar')
	{
		if($arr['artikelID'])
		{
			if(!$arr['delete_article_id'])
			{
				$analysis = new SbtAnalysis();
				
				foreach ($arr['artikelID'] as $key => $value) 
				{
					$record = $analysis->getSelectedArticle($value);
					$record = $record->setSelectedAnalysis($arr["a_datum"][$key],$arr["rubrik"][$key],$arr["sel_art_statID"][$key]);
				}
			}	
		}
	}

	if($arr['sbt_art_search']==1 || $this->getRequestParameter('sbt_art_search')==1) 
	{
		//	$query = ArticleTable::getInstance()->getFindArticleQuery($arr);
		//	$ext = $article->getSearchedParameterString($arr);
		
		$param_arr['art_id'] = $arr['art_id'] ? $arr['art_id'] : ($arr['art_id_update'] ? $arr['art_id_update'] : $this->getRequestParameter('art_id'));
		$param_arr['art_title'] = $arr['art_title'] ? $arr['art_title'] : ($arr['art_title_update'] ? $arr['art_title_update'] : $this->getRequestParameter('art_title'));
		$param_arr['search_katID'] = $arr['search_katID'] > 0 ? $arr['search_katID'] : ($arr['search_katID_update'] ? $arr['search_katID_update'] : $this->getRequestParameter('search_katID'));
		$param_arr['search_art_statID'] = $arr['search_art_statID'] > 0 ? $arr['search_art_statID'] : ($arr['search_art_statID_update'] ? $arr['search_art_statID_update'] : $this->getRequestParameter('search_art_statID'));
		$param_arr['sort_order'] = $arr['sort_order'] ? $arr['sort_order'] : ($arr['sort_order_update'] ? $arr['sort_order_update'] : $this->getRequestParameter('sort_order'));
		$param_arr['no_of_pages'] = $arr['no_of_pages'] ? $arr['no_of_pages'] : ($arr['no_of_pages_update'] ? $arr['no_of_pages_update'] : $this->getRequestParameter('no_of_pages'));
	
		$no_of_pages = $param_arr['no_of_pages'] ? $param_arr['no_of_pages'] : ($arr['no_of_pages_update'] ? $arr['no_of_pages_update'] : 25);
	}

	$query = SbtAnalysisTable::getInstance()->getSortingSbtArticleQuery($param_arr,$column_id,$order);
		
	
	$this->pager = $mymarket->getPagerForAll('SbtAnalysis',20,$query,$request->getParameter('page', 1));
	
	$this->cat_arr = $cat_arr; 
	$this->type_arr = $type_arr;
	$this->object_arr = $object_arr;
	$this->status_arr = $status_arr;
	$this->art_status = $art_status;
	$this->ext = $ext;

	$this->art_id = $this->param_arr['art_id'];
	$this->search_katID = $this->param_arr['search_katID'];
	$this->search_art_statID = $this->param_arr['search_art_statID'];
	$this->art_title = $this->param_arr['art_title'];
	$this->sort_order = $this->param_arr['sort_order'];
	$this->no_of_pages = $this->param_arr['no_of_pages'];
	$this->column_id = $column_id;
	$this->current_column_order = $order;
	$this->cur_column = $current_column;
	$this->page_number = $page;
  } 
  
   /**
	* 
	* This function deletes the selected sbt Article.
	* 
	*/
	public function executeDeleteSbtArticleAndRelatedData(sfWebRequest $request)
	{
		$analysis_id = $request->getParameter('analysis_id');
		
		$analysis = new SbtAnalysis();
		$sbt_vote_details = new SbtVoteDetails();
		$sbt_analysis_comment = new SbtAnalysisComment();
		
		$analysis->deleteSbtAnalysis($analysis_id);
		$sbt_vote_details->deleteAnalysisRelatedRecords($analysis_id);
		$sbt_analysis_comment->deleteAnalysisComments($analysis_id);
		
		return $this->renderText("Artikeln har tagits bort");
	}
  
}
