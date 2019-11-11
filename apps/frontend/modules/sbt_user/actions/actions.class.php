<?php

/**
 * sbt_user actions.
 *
 * @package    sisterbt
 * @subpackage sbt_user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sbt_userActions extends sfActions
{
 /**
  * 
  * Executes Before Every Action
  */
  public function preExecute() 
  {
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
    $this->forward('default', 'module');
  }
  
  /**
  * Executes SbtNewRegistration action
  *
  * @param sfRequest $request A request object
  */
  public function executeSbtNewRegistration(sfWebRequest $request)
  {
        $private_key = sfConfig::get('app_recaptcha_private_key');
        $this->public_key = sfConfig::get('app_recaptcha_public_key');
        $host_str = $this->getRequest()->getHost();
  	$this->host_str = $this->getRequest()->getHost();
	isicsBreadcrumbs::getInstance()->addItem('GRATIS KONTO', 'sbt_user/sbtNewRegistration'); 
	$this->getUser()->setAttribute('third_menu', 'skapa_konto');
	
	//$arrLand = array('1'=>'Sverige','2'=>'Norge','3'=>'Finland','4'=>'Danmark','5'=>'Other');
	$countries = new Countries();
	$all_country_data = $countries->getAllCountries();
	
	$arrLand = array();
	foreach($all_country_data as $data){
		$arrLand[$data->iso_code] = $data->country_name;
	}	

	// echo("pre");
	// print_r($arrLand);
	// die;
	
	$arrBirthDate = array();
	$arrPass = array('','Required','Both password do not match.','Ange korrekt lösenord');
	$arrProfileCheck = array('','Required','Symboler eller specialtecken är inte tillåtna','Antalet är inte tillåtet');
	$arrNumberCheck = array('','Required','Bara siffror är tillåtna','ofullständig postnummer','Minst 5 tecken krävs','Maximalt 5 tecken endast','2-10 tecken är tillåtna','specialtecken är inte tillåtet');
	$error_flag = $info_exisist = $user_email_flag = $pass_1 = $pass_2 = 0;
	$my_trade_arr = array();
	
	$arrBirthDate[0] = 'Årtal';
	for($i=1910; $i <= 1999; $i++)
	{
		$arrBirthDate[$i] = $i;
	}
	
	$this->userForm = new sfGuardUserForm();
	
	$this->profileForm = new AddSfGuardUserProfileForm();
	$this->wSchema = $this->profileForm->getWidgetSchema();
        $this->vSchema = $this->profileForm->getValidatorSchema();
	$this->wSchema['land']->setOption('choices',$arrLand);
	$this->wSchema['year_of_birth']->setOption('choices',$arrBirthDate);
	$this->profileForm->setDefault('land','SE');
	$this->profileForm->setDefault('year_of_birth',0);
	$this->profileForm->setDefault('from_sbt',1); // 09-may--13 set from_sbt = 1 becoz user can create blog/Article with out fill info of blog.
        $this->profileForm->setDefault('sbt_active',0);// 09-may--13 set sbt_active = 1 becoz user can create blog/Article with out fill info of blog.
	$this->profileForm->setDefault('regdate',date("Y-m-d H:i:s"));
	$this->profileForm->setDefault('activity_cnt',0);
        $this->profileForm->setDefault('use_alias',0);
	$this->vSchema = $this->profileForm->getValidatorSchema();
	$this->vSchema['email'] = new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('email')));
	
	$this->sbtBlogProfile = new AddSbtBlogProfileForm();
	
	if ($request->isMethod('post'))
	{
                                        
                $captcha = $this->getRequestParameter('g-recaptcha-response');                        
                $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$private_key."&response=".$captcha."&remoteip=".$host_str), true);
                        
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$userForm_arr = $request->getParameter($this->userForm->getName());
		$profileForm_arr = $request->getParameter($this->profileForm->getName());
                $profileForm_arr['city'] = ltrim($profileForm_arr['city']);
                $profileForm_arr['zipcode'] = ltrim($profileForm_arr['zipcode']);
                $profileForm_arr['phone'] = ltrim($profileForm_arr['phone']);
		$sbtBlogProfile_arr = $request->getParameter($this->sbtBlogProfile->getName());
		$prof_user = new SfGuardUserProfile();
		
        if($profileForm_arr["usernamealias"]){
                $this->vSchema->setPostValidator(new sfValidatorAnd(array(new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('usernamealias')), array('invalid' => 'This alias already exists')))));
        }
        else{
            unset($profileForm_arr["usernamealias"]);
            $nullStringValidator = new sfNullStringValidator();
            $this->vSchema['usernamealias'] = $nullStringValidator->mergeWith($this->vSchema['usernamealias']);
        }
           
		// Checking if use email as username is checked.
		if (isset($arr["use_email_as_username"]))
		{ 
			$this->checked = "checked";
			$this->email_red = $prof_user->checkEmailUsername($profileForm_arr);
			if($this->email_red=='')
			{
				$userForm_arr["username"] = $profileForm_arr['email'];
				$uname = $profileForm_arr['email'];
				$user_email_flag = 1;
			}
			else
			{
				$this->hide_username_error = 'display:none';
			}
		}
		else 
		{
			$this->hide_username_error = 'display:block';
			
			$this->checked = "";
			$this->username_red = $prof_user->checkUsername($userForm_arr["username"]);
			$this->email_red = $prof_user->checkEmail($profileForm_arr);
			$this->usernamealias_red = $prof_user->checkUsernameAlias($profileForm_arr);
			/*if(($this->email_red != '' || $this->usernamealias_red != '') && $profileForm_arr["use_alias"])
			{
				$error_flag = 1;
                                $this->vSchema['usernamealias']->setOption('required', true);
                                $this->vSchema['usernamealias']->setMessages(array('required'=>'Required'));
			}*/
			$uname = $userForm_arr["username"];
		}
		
		$this->usernamealias_red = $prof_user->checkUsernameAlias($profileForm_arr);
                
                /*if($this->usernamealias_red != '' && $profileForm_arr["use_alias"])
		{
                    $error_flag = 1;
                    $this->vSchema['usernamealias']->setOption('required', true);
                    $this->vSchema['usernamealias']->setMessages(array('required'=>'Nödvändig'));                       
		}*/
		
		// Validation for username and password.
		if( strlen(trim($userForm_arr['password'])) == 0 ) { $pass_1 = 1;  $this->password_red = "Nödvändig"; }
		else { $this->password_red = ""; }
		
		if( strlen(trim($userForm_arr['password_again'])) == 0 ) { $pass_2 = 2;  $this->password_again_red = "Nödvändig"; }
		else { $this->password_again_red = ""; }
		
		if($pass_1 != 0 || $pass_2 != 0) $error_flag = 1;	
		
		$userForm_arr["is_active"] = 1;
		$this->getUser()->setAttribute('newuser_password', $userForm_arr['password']);		
		$this->userForm->bind($userForm_arr);
                
		
		$this->uservalidationschema = $this->userForm->getValidatorSchema();
  		$this->uservalidationschema['username']->setMessages(array('required'=>'Vänligen fyll i ett användarnamn'));
                
                if( strlen(trim($userForm_arr['username'])) == 0){
                    $this->uservalidationschema = $this->userForm->getValidatorSchema();
                    $this->uservalidationschema['username']->setMessages(array('required'=>'Nödvändig'));
                 }
		
		$this->pvalidator=$this->uservalidationschema->getPostValidator()->getValidators();
		$this->pvalidator[0]->setMessage('invalid','Användarnamnet finns redan');
		
		// Checking if newsletter is subscribed or not.
		if (isset($arr["nyhetsbrev"])) $this->checked_brev = "checked";
		else $this->checked_brev = "";
                
                if (isset($arr["nyhetsbrev_pub"])) $this->checked_brev_pub = "checked";
		else $this->checked_brev_pub = "";
		
		$profileForm_arr['gender'] = $arr['gender'];
		// Checking profile fields
		$this->birth_year_error = $arrProfileCheck[$prof_user->checkBithDate($profileForm_arr['year_of_birth'])]; 
                if( strlen(trim($userForm_arr['birth_year_error'])) == 0 ) { $pass_2 = 2;  $this->birth_year_error = "Nödvändig"; }
		else { $this->birth_year_error = ""; }
		$this->gender_error = $arrProfileCheck[$prof_user->checkGender($profileForm_arr['gender'])]; 
                if( strlen(trim($userForm_arr['gender_error'])) == 0 ) { $pass_2 = 2;  $this->gender_error = "Nödvändig"; }
		else { $this->gender_error = ""; }
		$this->firstname_error = $arrProfileCheck[$prof_user->checkScriptTags($profileForm_arr['firstname'])];
                if( strlen(trim($userForm_arr['firstname_error'])) == 0 ) { $pass_2 = 2;  $this->firstname_error = "Nödvändig"; }
		else { $this->firstname_error = ""; }
		$this->lastname_error = $arrProfileCheck[$prof_user->checkScriptTags($profileForm_arr['lastname'])];
                if( strlen(trim($userForm_arr['lastname_error'])) == 0 ) { $pass_2 = 2;  $this->lastname_error = "Nödvändig"; }
		else { $this->lastname_error = ""; }
		$this->street_error = $arrProfileCheck[$prof_user->checkScriptTags($profileForm_arr['street'])];
                if( strlen(trim($userForm_arr['street_error'])) == 0 ) { $pass_2 = 2;  $this->street_error = "Nödvändig"; }
		else { $this->street_error = ""; }
		$this->city_error = $arrProfileCheck[$prof_user->checkCity($profileForm_arr['city'])];
                if( strlen(trim($userForm_arr['city_error'])) == 0 ) { $pass_2 = 2;  $this->city_error = "Nödvändig"; }
		else { $this->city_error = ""; }
		$this->zipcode_error = $arrNumberCheck[$prof_user->checkZipcode($profileForm_arr['zipcode'],$profileForm_arr['land'])];
                if( strlen(trim($userForm_arr['zipcode_error'])) == 0 ) { $pass_2 = 2;  $this->zipcode_error = "Nödvändig"; }
		else { $this->zipcode_error = ""; }
		$this->phone_error = $arrNumberCheck[$prof_user->checkPhonenumber($profileForm_arr['phone'])];
                if( strlen(trim($userForm_arr['phone_error'])) == 0 ) { $pass_2 = 2;  $this->phone_error = "Nödvändig"; }
		else { $this->phone_error = ""; }
		
		$birth_year_val = $prof_user->checkBithDate($profileForm_arr['year_of_birth']);
                if( strlen(trim($birth_year_val)) == 0 ) { $pass_2 = 2;  $this->birth_year_error = "Nödvändig"; }
		else { $this->birth_year_error = ""; }
		$gender_error_val = $prof_user->checkGender($profileForm_arr['gender']);
                if( strlen(trim($gender_error_val)) == 0 ) { $pass_2 = 2;  $this->gender_error = "Nödvändig"; }
		else { $this->gender_error = ""; }
		$first_error_val = $prof_user->checkScriptTags($profileForm_arr['firstname']);
                if( strlen(trim($first_error_val)) == 0 ) { $pass_2 = 2;  $this->firstname_error = "Nödvändig"; }
		else { $this->firstname_error = ""; }
		$lastname_error_val = $prof_user->checkScriptTags($profileForm_arr['lastname']);
                if( strlen(trim($lastname_error_val)) == 0 ) { $pass_2 = 2;  $this->lastname_error = "Nödvändig"; }
		else { $this->lastname_error = ""; }
		$street_error_val = $prof_user->checkScriptTags($profileForm_arr['street']);
                if( strlen(trim($street_error_val)) == 0 ) { $pass_2 = 2;  $this->street_error = "Nödvändig"; }
		else { $this->street_error = ""; }
		$zipcode_error_val = $prof_user->checkZipcode($profileForm_arr['zipcode'],$profileForm_arr['land']);
                if( strlen(trim($zipcode_error_val)) == 0 ) { $pass_2 = 2;  $this->zipcode_error = "Nödvändig"; }
		else { $this->zipcode_error = ""; }
		$phone_error_val = $prof_user->checkPhonenumber($profileForm_arr['phone']);
                if( strlen(trim($phone_error_val)) == 0 ) { $pass_2 = 2;  $this->phone_error = "Nödvändig"; }
		else { $this->phone_error = ""; }
		$city_error_val = $prof_user->checkCity($profileForm_arr['city']);
                if( strlen(trim($city_error_val)) == 0 ) { $pass_2 = 2;  $this->city_error = "Nödvändig"; }
		else { $this->city_error = ""; }
		
		
		
		if($birth_year_val > 0 || $gender_error_val > 0 || $first_error_val > 0 || $lastname_error_val > 0 || $street_error_val > 0 || $zipcode_error_val > 0 || $phone_error_val > 0 || $city_error_val > 0)
		{
			$error_flag = 1;	
		}
		
		// Check Recapcha.
		/*$postData['challenge'] = $arr['recaptcha_challenge_field'];
        $postData['response'] = urlencode($arr['recaptcha_response_field']);
        $postData['remoteip'] = $_SERVER['REMOTE_ADDR'];
        $postData['privatekey'] = sfConfig::get('app_recaptcha_private_key');
        $ch = curl_init("http://api-verify.recaptcha.net/verify");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
		$response = explode(PHP_EOL, $data);
		$str = '' . $response[0];
		
		$re = strpos($str, 'true');*/
                
                if ($response["success"] == false)//$request->getParameter('captchaSelection') != $_SESSION['simpleCaptchaAnswer'])
		{
			//echo 'Error, please try again.';
			$this->capcha_error = 'OBS! Ange giltig captcha';
			$error_flag = 1;
		} 
		else
		{
			//echo 'Success, you may proceed!';
			$this->capcha_error = '';
		}
		
		$profileForm_arr['username'] = $userForm_arr["username"];
		$profileForm_arr['username'] = $uname;

		// Collecting SisterBT blog rights data.
		foreach($arr['my_trade'] as $key=>$val)
		{
			$my_trade_arr[$key] = $arr['my_trade'][$key];
		}
		$this->my_trade_str = implode(',',$my_trade_arr);
		
		$sbtBlogProfile_arr['type_of_speculator'] = $arr['type_of_speculator'];
		$sbtBlogProfile_arr['my_trade'] = $this->my_trade_str;
		$sbtBlogProfile_arr['my_occupation'] = $arr['my_occupation'];
		$sbtBlogProfile_arr['is_millionaire'] = $arr['is_millionaire'];

		$recomm_str = $shortlist_str = ''; $j = $k = 0;
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

		// Weither to show the blog info part or not.
		if($arr['type_of_speculator'] || $arr['my_trade'] || $arr['my_occupation'] || $arr['is_millionaire'] || /*$sbtBlogProfile_arr['my_own_writing']!='' || $sbtBlogProfile_arr['user_title']!='' || $sbtBlogProfile_arr['not_on_stock']!='' ||*/ $sbtBlogProfile_arr['broker_used']!='' || $sbtBlogProfile_arr['my_best_trade']!='' || $sbtBlogProfile_arr['my_worst_trade']!='' || $sbtBlogProfile_arr['my_five_best_recommendations']!='' || $sbtBlogProfile_arr['my_shortlist']!='')
		{
			$info_exisist = 1;
		}
		
		if($user_email_flag == 1 && $error_flag == 0) $userForm_arr["username"] = $profileForm_arr['email']; 
		
		/* Checking Blog rights information filled by user. */
                /* 09-may--13
                if($sbtBlogProfile_arr['my_own_writing']!='' || $sbtBlogProfile_arr['user_title']!='' || $sbtBlogProfile_arr['not_on_stock']!='' || $arr['type_of_speculator']!='' || $sbtBlogProfile_arr['broker_used']!='' || $arr['my_trade']!='' || $arr['my_occupation']!='' || $arr['is_millionaire']!='' || $sbtBlogProfile_arr['my_best_trade']!='' || $sbtBlogProfile_arr['my_worst_trade']!='')
		{
			//$this->my_own_writing_error = empty($sbtBlogProfile_arr['my_own_writing']) ? 'Required' : ''; 
			//$this->user_title_error = empty($sbtBlogProfile_arr['user_title']) ? 'Required' : ''; 
			//$this->not_on_stock_error = empty($sbtBlogProfile_arr['not_on_stock']) ? 'Required' : ''; 
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
			
			if($this->my_own_writing_error !='' || $this->user_title_error !='' || $this->not_on_stock_error !='' || $this->type_of_speculator_error !='' || $this->broker_used_error !='' || $this->my_trade_error !='' || $this->my_occupation_error !='' || $this->is_millionaire_error != '' || $this->my_best_trade_error != '' || $this->my_worst_trade_error !='' || $this->other_occ_error !='')
			{
				$error_flag = 1;
			}
			
			$profileForm_arr['from_sbt'] = 1;
		}
		else
		{
			$profileForm_arr['from_sbt'] = 0;
		}
                 * 09-may--13
                 */
		
		if($error_flag == 1)
		{
			$this->sbtBlogProfile->bind($sbtBlogProfile_arr);
			
		 	$this->profileForm->bind($profileForm_arr);                      
		}
		//echo $this->profileForm->getErrorSchema();
 	    $this->profileForm->bind($profileForm_arr);
				
		if ($this->userForm->isValid())
		{
			if($error_flag == 0)
			{
				$this->getUser()->setAttribute('newuser_username', $profileForm_arr['username']);
				$this->getUser()->setAttribute('newuser_email', $profileForm_arr['email']);		
				
				$kundnr = $prof_user->createKundnr($profileForm_arr['firstname'],$profileForm_arr['lastname'],$profileForm_arr['zipcode']);
				
				$record = $this->userForm->save();
				
				$profileForm_arr['user_id'] = $record['id'];
				$profileForm_arr['kundnr'] = $kundnr;
				$arr['abonID'] = $profileForm_arr['abonid'];
				//$profileForm_arr['abonid'] = $arr['abonID'];
				if ($arr['abonID'] == 1) 
				{ //Prov
					$plus_7_days = strtotime("+7 days");
					//$plus_14_days = strtotime("+14 days");
					$stopdate = date("Y-m-d", $plus_7_days);
				}
				else 
				{	
					$plus_30_days = strtotime("+30 days");
					$stopdate = date("Y-m-d", $plus_30_days);
				}
				$profileForm_arr['stopdate'] = $stopdate;
				
				if(!$arr['gender']) $profileForm_arr['gender'] = 0;
				else $profileForm_arr['gender'] = $arr['gender'];
				
				if($profileForm_arr['from_sbt'] == 1)
				{
					$activation_code = substr(number_format(time() * rand(),0,'',''),0,8);//mt_rand(11111111,99999999);
					$profileForm_arr['sbt_activation_code'] = $activation_code;
				}

				$this->profileForm->bind($profileForm_arr);
		
                if($this->profileForm->isValid())
                { 
                       $this->profileForm->save();
    				
    		
    				$sbtBlogProfile_arr['user_id'] = $record['id'];
    				$this->sbtBlogProfile->bind($sbtBlogProfile_arr);
    				
    				if($info_exisist == 1)
    					$this->sbtBlogProfile->save();
    					
    				
    				if (isset($arr["nyhetsbrev"]))
    				{
    					// Newsletter account
    					/*$newsletterAccount = new NewsletterAccount();
    					$account_data = $newsletterAccount->isNewsAccountEmailPresent($this->getUser()->getAttribute('newuser_email'));
    					if(!$account_data) $newsletterAccount->addEmail($this->getUser()->getAttribute('newuser_email'));
    					
    					$btNewsletterSubscriber = new BtNewsletterSubscriber();
    					$btNewsletterSubscriber->modifyNonRegToRegForSubscription($record['id'],$this->getUser()->getAttribute('newuser_email'));*/
                                        $this->getUser()->setAttribute("send_activation_mail_newsletter_flag",1); //1 For Daily Newsletter
                                        if (isset($arr["nyhetsbrev_pub"])){
                                            $this->getUser()->setAttribute("send_activation_mail_newsletter_flag",3); //3 For Daily + Weekly Newsletter
                                            // Newsletter public
                                            /*$newsletterPublic = new NewsletterPublic();
                                            $public_data = $newsletterPublic->IsNewsletterSubcriber($this->getUser()->getAttribute('newuser_email'));
                                            if(!$public_data) $newsletterPublic->addNewsletterSubcriber($this->getUser()->getAttribute('newuser_email'));*/
                                        }
    				}
                                else if (isset($arr["nyhetsbrev_pub"]))
    				{       $this->getUser()->setAttribute("send_activation_mail_newsletter_flag",2); //2 For Weekly Newsletter
    					// Newsletter public
    					/*$newsletterPublic = new NewsletterPublic();
    					$public_data = $newsletterPublic->IsNewsletterSubcriber($this->getUser()->getAttribute('newuser_email'));
    					if(!$public_data) $newsletterPublic->addNewsletterSubcriber($this->getUser()->getAttribute('newuser_email'));*/
    				}/*
    				else
    				{
    					// Newsletter public
    					$newsletterPublic = new NewsletterPublic();
    					$public_data = $newsletterPublic->IsNewsletterSubcriber($this->getUser()->getAttribute('newuser_email'));
    					if($public_data) $public_data->delete();
    					
    					// Newsletter account
    					$newsletterAccount = new NewsletterAccount();
    					$account_data = $newsletterAccount->isNewsAccountEmailPresent($this->getUser()->getAttribute('newuser_email'));
    					if($account_data) $account_data->delete();
    				} */

                                $this->getUser()->setAttribute("send_activation_mail_with_user_pass",1);
    				$this->redirect('/email/sendWelcomeMail');
                }
                else{
                    Doctrine::getTable('sfGuardUser')->deleteUser($record['id']);
                    
                }
			}
		}
	}
  }
  
  /**
  * 
  * The function is used when sign-up process is completed.
  * 
  */
  public function executeNewRegistrationDone(sfWebRequest $request)
  {
	$this->metatags_title = 'Börstjänaren - Konto skapat';
	$this->host_str = $this->getRequest()->getHost();
	$user_profile = new SfGuardUserProfile();
	
	$this->username = $this->getUser()->getAttribute('newuser_username');
	$this->email = $this->getUser()->getAttribute('newuser_email');		
	
	$this->user_profile_data = $user_profile->fetch_user_from_email($this->email);
  }
  
 /**
  * 
  * The function is used when user clicks on the activation link in mail.
  * 
  */
  public function executeGetActivated(sfWebRequest $request)
  {
	$this->host_str = $this->getRequest()->getHost();
	$user_profile = new SfGuardUserProfile();
	
	$chk_code = $request->getParameter('chk_code');
        $send_activation_mail_newsletter_flag = $request->getParameter('flag');        
	$this->flag_status = $user_profile->getActivationRecord($chk_code);
        
        if($chk_code){
                $query = Doctrine_Query::create()->from('SfGuardUserProfile sup');
                $query = $query->where('sup.sbt_activation_code = ?', $chk_code);
                $data = $query->fetchOne();

                if($data)
                {
                    $userEmail = $data->email;
                    $userId = $data->user_id;
                    if ($send_activation_mail_newsletter_flag == 1)//1 For Daily Newsletter
                    {
                            // Newsletter account
                            $newsletterAccount = new NewsletterAccount();
                            $account_data = $newsletterAccount->isNewsLetterAccountEmailPresent($userEmail);
                            if(!$account_data) $newsletterAccount->addEmail($userEmail);

                            //BtNewsletterSubscriber
                            $btNewsletterSubscriber = new BtNewsletterSubscriber();
                            $subscriber_data = $btNewsletterSubscriber->isNewsLetterSubscriberEmailPresent($userEmail);
                            if(!$subscriber_data) $btNewsletterSubscriber->addSubscriberEmail($userEmail, $userId, 4);// For Daily newsletter_type_id = 4
                            $this->status = 1;
                    }
                    else if ($send_activation_mail_newsletter_flag == 2)//2 For Weekly Newsletter
                    {
                            // Newsletter public
                            $newsletterPublic = new NewsletterPublic();
                            $public_data = $newsletterPublic->IsNewsletterSubcriber($userEmail);
                            if(!$public_data) $newsletterPublic->addNewsletterSubcriber($userEmail);
                        
                            //BtNewsletterSubscriber
                            $btNewsletterSubscriber = new BtNewsletterSubscriber();
                            $subscriber_data = $btNewsletterSubscriber->isNewsLetterSubscriberEmailPresent($userEmail);
                            if(!$subscriber_data) $btNewsletterSubscriber->addSubscriberEmail($userEmail, $userId, 2);// For Weekly newsletter_type_id = 2
                            $this->status = 1;
                    }
                    else if ($send_activation_mail_newsletter_flag == 3)//3 For Both Newsletter Daily + Weekly Newsletter
                    {
                            // Newsletter account
                            $newsletterAccount = new NewsletterAccount();
                            $account_data = $newsletterAccount->isNewsLetterAccountEmailPresent($userEmail);
                            if(!$account_data) $newsletterAccount->addEmail($userEmail);
                            
                            // Newsletter public
                            $newsletterPublic = new NewsletterPublic();
                            $public_data = $newsletterPublic->IsNewsletterSubcriber($userEmail);
                            if(!$public_data) $newsletterPublic->addNewsletterSubcriber($userEmail);
                            
                            //BtNewsletterSubscriber
                            $btNewsletterSubscriber = new BtNewsletterSubscriber();
                            $btNewsletterSubscriber->modifyNonRegToRegForSubscription($userId,$userEmail);
                            $this->status = 1;
                    }
                    else{
                        $this->status = 2;
                    }
                }
                else{
                    $this->status = 2;
                }
        }else{
            $this->status = 2;
        }
  }
  
  public function executeGetSimpleCaptch(sfWebRequest $request){
      session_start();

// -------------------- EDIT THESE ----------------- //
$images = array(
  'huset'=> '/images/captchaImages/01.png',
  'nyckeln'=> '/images/captchaImages/04.png',
  'flaggan'=> '/images/captchaImages/06.png',
  'klockan'=> '/images/captchaImages/15.png',
  'skalbaggen'=> '/images/captchaImages/16.png',
  'pennan'=> '/images/captchaImages/19.png',
  'lampan'=> '/images/captchaImages/21.png',
  'noten'=> '/images/captchaImages/40.png',
  'hjärtat'=> '/images/captchaImages/43.png',
  'jordgloben'=> '/images/captchaImages/99.png'
);
// ------------------- STOP EDITING ---------------- //

$_SESSION['simpleCaptchaAnswer'] = null;
$_SESSION['simpleCaptchaTimestamp'] = time();
$SALT = "o^Gj".$_SESSION['simpleCaptchaTimestamp']."7%8W";
$resp = array();

header("Content-Type: application/json");

if (!isset($images) || !is_array($images) || sizeof($images) < 3) {
  $resp['error'] = "There aren\'t enough images!";
  echo json_encode($resp);
  exit;
}

if (isset($_POST['numImages']) && strlen($_POST['numImages']) > 0) {
  $numImages = intval($_POST['numImages']);
} else if (isset($_GET['numImages']) && strlen($_GET['numImages']) > 0) {
  $numImages = intval($_GET['numImages']);
}
$numImages = ($numImages > 0)?$numImages:5;
$size = sizeof($images);
$num = min(array($size, $numImages));

$keys = array_keys($images);
$used = array();
mt_srand(((float) microtime() * 587) / 33);
for ($i=0; $i<$num; ++$i) {
  $r = rand(0, $size-1);
  while (array_search($keys[$r], $used) !== false) {
    $r = rand(0, $size-1);
  }
  array_push($used, $keys[$r]);
}
$selectText = $used[rand(0, $num-1)];
$_SESSION['simpleCaptchaAnswer'] = sha1($selectText . $SALT);

$resp['text'] = ''.$selectText;
$resp['images'] = array();

shuffle($used);
for ($i=0; $i<sizeof($used); ++$i) {
  array_push($resp['images'], array(
    'hash'=>sha1($used[$i] . $SALT),
    'file'=>$images[$used[$i]]
  ));
}
    echo json_encode($resp);
      return sfView::NONE;
  }
  
  
  public function executeGetUserbyUsername(sfWebRequest $request){
      $uname = $request->getParameter("uname");
      $error = "0";
      if(strlen($uname) >= 2){
        $profile = new SfGuardUserProfile();
        //$mymarket = new mymarket();
        //$sCount = $mymarket->specCharCheck($uname);
        $userData = $profile->fetch_user($uname);
        if(!empty($userData)){
            $error = "Användarnamnet finns redan";
        }
      }else{
            $error = "Minst 2 tecken krävs";
      }
      return $this->renderText($error);
  }
  
  public function executeGetUserbyUserAlias(sfWebRequest $request){
      $uname = $request->getParameter("uname");
      $error = "0";
      if(strlen($uname) >= 2){
        //$profile = new SfGuardUserProfile();
        $mymarket = new mymarket();
        //$sCount = $mymarket->specCharCheck($uname);
        $userData = $mymarket->usernamealias_exists($uname);
        if($userData == 1){
            $error = "Alias finns redan";
        }
      }else{
            $error = "Minst 2 tecken krävs";
      }
      return $this->renderText($error);
  }
  
  public function executeGetUserbyEmail(sfWebRequest $request){
      $email = $request->getParameter("email");
      $error = "0";
      $mymarket = new mymarket();
      $exist = $mymarket->email_exists($email);
      $okay = preg_match(
        '/^[A-z0-9._\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{1,4}$/', $email
        );
      if($okay){
        if($exist == 1){
            $error = "E-post finns redan";
        }
      }else{
            $error = "Ogiltig";
      }
      return $this->renderText($error);
  }

}
