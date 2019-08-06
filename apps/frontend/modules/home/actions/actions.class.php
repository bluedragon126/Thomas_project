<?php

/**
 * home actions.
 *
 * @package    systerbt
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * 
  * Executes Before Every Action
  */
  public function preExecute() 
  {
	$stdlib = new stdlib();
	$wantsurl = $stdlib->accessed_url();
	$this->getUser()->setAttribute('wantsurl',$wantsurl);
 
	$this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
	$this->host_str = $this->getRequest()->getHost();
	
	if(!$this->getRequest()->isXmlHttpRequest())
	{
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
	  $this->metatags_title = 'Welcome to Syster Bt';
	  $this->metatags_desc = 'Welcome to Syster Bt Description';
	  $this->metatags_keywords = 'Welcome to Syster Bt Keywords';
  }
  
 /**
  * Executes sponsorer action
  *
  * @param sfRequest $request A request object
  */
  public function executeSponsorer(sfWebRequest $request)
  {
  	isicsBreadcrumbs::getInstance()->addItem('SPONSORER', 'home/sponsorer'); 
	$this->getUser()->setAttribute('parent_menu', ''); 
	$this->getUser()->setAttribute('submenu_menu', '');
	$this->getUser()->setAttribute('third_menu', 'sponsorer');
  }

 /**
  * Executes show ShowTenArticle action
  *
  * @param sfRequest $request A request object
  */
  public function executeShowTenArticle(sfWebRequest $request)
  {
  	/* Fetching all records from table. */
	$query = Doctrine_Query::create()
         ->select('a.title as title, a.image_text as image_text, a.author as author, a.article_date as article_date')
         ->from('Article a')
         ->limit(20);
	$this->article_data = $query->execute();
	
	 $q = Doctrine_Query::create()
    ->from('SbtAnalysis u')
    ->where('u.id = ?', 1);

	$this->analysis_data = $q->fetchOne();
  }
  
    /**
  * Executes SaveAsPdf action
  *
  * @param sfRequest $request A request object
  */
  public function executeSaveAsPdf(sfWebRequest $request)
  {
	$html = $this->getPartial('global/bill_detail');
	
	require(sfConfig::get('sf_root_dir').'/plugins/mpdfPlugin/mpdf.php' );
    $mpdf=new mPDF('utf-8','A4','','',7,7,6,0,0,0);
        
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);
    $mpdf->Output('Invoice.pdf','D');
    return sfView::NONE;
  }
 
 /**
  * Executes test action
  *
  * @param sfRequest $request A request object
  */
  public function executeTest(sfWebRequest $request)
  {
  	  	/* Inserting record in table. */
	/*$analysis = new Analysis();
	$analysis->analysis_title = 'First analysis';
	$analysis->analysis_tags = 'GEN';
	$analysis->analysis_description = 'Hello all..';
	$analysis->analysis_photo = 'image.jpg';
	$analysis->analysis_video = 'video.mpg';
	$analysis->analysis_votes = '2';
	$analysis->save();*/
	
	/*$analysis = new Analysis();
	$analysis['analysis_title'] = 'Secound analysis';
	$analysis['analysis_tags'] = 'SPEC';
	$analysis['analysis_description'] = 'Namaste all..';
	$analysis['analysis_photo'] = 'image1.jpg';
	$analysis['analysis_video'] = 'video1.mpg';
	$analysis['analysis_votes'] = '3';
	$analysis->save();*/
	
	
	
	/* Updating record in table. */
	/*$query = Doctrine_Query::create()
       ->update('Analysis a')
       ->set('a.analysis_description', '?', 'Namaste to all...')
       ->where('a.id = ?', 2);

    $updated = $query->execute();*/
	

	/* Fetching a single record from table. */
	/* $q = Doctrine_Query::create()
    ->from('Analysis u');
    ->where('u.id = ?', 1);

	$users = $q->fetchOne();
	echo $users['id'];*/
	

	/* Fetching all records from table. */
	/*$users = Doctrine_Core::getTable('Analysis')->findAll();
	foreach($users as $user) 
	{
    	echo $user->id;
		echo $user->analysis_title;
	}*/
	
	/* Printing the query.*/
	/*$q = Doctrine_Query::create()
    ->select('a.analysis_title')
    ->from('Analysis a');

    echo $q->getSqlQuery();*/

	/* Fetching records using IN cluase. */
	$q = Doctrine_Query::create()
    ->select('u.analysis_title')
    ->from('SbtAnalysis u')
    ->whereIn('u.id', array(1,2));

    //echo $q->getSqlQuery();
	 $this->users = $q->execute();
  }
  
  public function executeOnlyTitle(sfWebRequest $request)
  {
  	 $q = Doctrine_Query::create()
    ->from('TestAnalysis u')
    ->where('u.id = ?', 1);

	$this->analysis_data = $q->fetchOne();
  }
  
  public function executeForCheck(sfWebRequest $request)
  {
  	 $q = Doctrine_Query::create()
    ->from('TestAnalysis u')
    ->where('u.id = ?', 1);

	$this->analysis_data = $q->fetchOne();
  }
  
  /*public function executeImageThumbCheck(sfWebRequest $request)
  {
  	// Initialize the object for 150x150 thumbnails
	$thumbnail = new sfThumbnail(200, 200);

	// Load the image to reduce
	$fileName = 'Islands';
	$thumbnail->loadFile('images/Islands.jpg');
	
	// Save the thumbnail
	//$thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnail/'.$fileName, 'image/jpg');
	$thumbnail->save('c:\\'.$fileName.'.png', 'image/png');


    echo  'Success';
	return sfView::NONE;

  }*/
  
  /*public function executeMyThumbCheck(sfWebRequest $request)
  {
  	// Initialize the object for 150x150 thumbnails
	//$thumbnail = new sfThumbnail(200, 200);

	// Load the image to reduce
	//$fileName = 'Islands';
	//$thumbnail->loadFile('images/Islands.jpg');
	
	// Save the thumbnail
	//$thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnail/'.$fileName, 'image/jpg');
	//$thumbnail->save('c:\\'.$fileName.'.png', 'image/png');


    //echo  'Success';
	//return sfView::NONE;
	//$errors = array();
	$uploaded_images_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/thumbnail/'; 
	$arr = $this->getRequest()->getParameterHolder()->getAll();

	
	if ($request->isMethod('post'))
	{ var_dump($_FILES['probe']);
		if(isset($_FILES['probe']) && $_FILES['probe']['size'] != 0 && !$_FILES['probe']['error'])
		{
			$errors = '';

			$image_info = getimagesize($_FILES['probe']['tmp_name']);
			
			if(!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] != 3 && $image_info[2] != 6) 
				$errors[] = 'Invalid file format';
					
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
				$width_arr = array(407,198,239,238);
				$height_arr = array(238,148,187,143);
				$img_name_arr = array('_large','_semimid','_mid','_small');
				
				$file_ext = trim(substr($filename,strpos($filename, '.')+1,strlen($filename)));
				
				for($i=0;$i<4;$i++)
				{
					//echo str_replace('_large',$img_name_arr[$i],$filename).'<br>';
					// Create the thumbnail
  					$thumbnail = new sfThumbnail($width_arr[$i], $height_arr[$i]);
  					$thumbnail->loadFile($_FILES['probe']['tmp_name']);
  					$thumbnail->save($uploaded_images_path.str_replace('_large',$img_name_arr[$i],$filename), $extension_arr[$i]);
					echo $uploaded_images_path.str_replace('_large',$img_name_arr[$i],$filename).'<br>';
				}
				echo 'File Uploaded Successfully'; 
			}
		}
		else
		{
			$errors = 'No file provided';
		}
	}
	$this->errors = $errors;

  }*/
 
	/*public function executeGetAddedDate(sfWebRequest $request)
	{ 
  		$user_profile = new SfGuardUserProfile();
		$user_profile->getUserDataForWelcomeMail('andshi35@gmail.com');
	}*/

	/*public function executeSetForumReplyCount(sfWebRequest $request)
	{ 
  		$all_forum_post_cri = Doctrine_Query::create()
						  ->from('Btforum btf')
						  ->where('btf.amne = ?', 'ja')
						  ->orderBy('btf.andratdatum DESC');
		$data = $all_forum_post_cri->execute();
		
		foreach($data as $aa)
		{
			$forum = new Btforum();
				
			$cnt = $forum->getReplyCount($aa->id);
			$forum->setReplyCount($aa->id,$cnt);
		}
		echo 'Done';
		die;
	}*/
	
	/*public function executeNumberCheck(sfWebRequest $request)
	{
		//$number = '018-55 00 70';
		//$number = '018-88888-9999';
		//$number = '2834728764823';
		//$number = 'skdfjsjdf8i979879';
		//$number = '     jhkh';
		//$number = 'sdkfjsjdf'; 
		
		if (ereg("^[0-9 -]*[0-9][0-9 -]*$", $number)){
			echo "valid phonenumber";
		}
		else {
		echo "invalid phonenumber";
		}
		die;
	}*/
	
	/*public function executeSetActivityCnt(sfWebRequest $request)
	{
		$profile = new SfGuardUserProfile();
		$query = Doctrine_Query::create()->from('SfGuardUserProfile sup');
		$data = $query->execute();
		
		foreach($data as $d)
		{
			$cnt = $profile->getTotalActivitiesOfUser($d->user_id,$d->firstname.' '.$d->lastname);
			$d->activity_cnt = $cnt;
			$d->save();
		}
		echo 'Done'; die;
	}*/

}
