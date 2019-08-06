<?php

/**
 * user actions.
 *
 * @package    sisterbt
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
	/**
	* 
	* Executes Before Every Action
	*/
	public function preExecute() 
	{
		$user = $this->getUser();
		$host_str = $this->getRequest()->getHost();
		//$stdlib = new stdlib();
		//$wantsurl = $stdlib->accessed_url();
		//$this->getUser()->setAttribute('wantsurl',$wantsurl);
		
		$this->getUser()->setAttribute('third_menu', '');
 
		$actionName  = $this->getActionName();
		$showdata = 0;
		
		if($actionName=='changePasswordForm')
		{
			$stdlib = new stdlib();
			$wantsurl = $stdlib->accessed_url();
			$this->getUser()->setAttribute('wantsurl',$wantsurl);
			
			if ($user->isAuthenticated())
			{
			}
			else
			{
				$this->redirect('user/loginWindow');		
			}
		}
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
  * Executes Signin action
  *
  * @param sfRequest $request A request object
  */ 
 // public function executeSignin(sfWebRequest $request)
 // {
    /*if ($request->isMethod('post'))
	{
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$user = new SfGuardUserProfile();
		$check_flag = $user->login_check($arr['username'],$arr['password']);

		if($check_flag==1)
		{
			//$this->getUser()->setAttribute('loginerror', 0 , 'userProperty');
			$this->getUser()->setAttribute('username', $arr['username'], 'userProperty');
			$this->getUser()->setAuthenticated(true);
			$userData = $user->fetch_user($this->getUser()->getAttribute('username', '', 'userProperty'));
			$this->getUser()->setAttribute('userData', $userData, 'userProperty');
			
			$user_profile = $user->fetch_user_profile($this->getUser()->getAttribute('username', '', 'userProperty'));
			$this->getUser()->setAttribute('firstname', $user_profile->firstname, 'userProperty');
            $this->getUser()->setAttribute('lastname', $user_profile->lastname, 'userProperty');
            			
			$userPermissions = $userData->getPermissionNames();

			$this->redirect('@homepage');
		}
		else
		{
			//$this->getUser()->setAttribute('loginerror', 1 , 'userProperty');
			$this->redirect('user/loginWindow');
		}
	}
	else
	{
		$this->redirect('@homepage');
	}*/
 // }
  
 /**
  * Executes Signout action
  *
  * @param sfRequest $request A request object
  */
  public function executeSignout(sfWebRequest $request)
  {
	$this->getUser()->getAttributeHolder()->removeNamespace('userProperty');
	$this->getUser()->getAttributeHolder()->remove('product_arr');
	$this->getUser()->getAttributeHolder()->remove('price_arr');
	$this->getUser()->getAttributeHolder()->remove('product_qty_arr');
	$this->getUser()->getAttributeHolder()->remove('price_detail_id_arr');
	$this->getUser()->getAttributeHolder()->remove('payment_user_info');
        
        //code by sandeep
        $this->getUser()->getAttributeHolder()->remove('final_vat');
        $this->getUser()->getAttributeHolder()->remove('final_total');
        $this->getUser()->getAttributeHolder()->remove('final_dicount');
        //code by sandeep end
	
    $this->getUser()->setAuthenticated(false);
	$this->redirect('@homepage');
  }
 
 /**
  * Executes LoginWindow action
  *
  * @param sfRequest $request A request object
  */
  public function executeLoginWindow(sfWebRequest $request)
  {
  	isicsBreadcrumbs::getInstance()->addItem('LOGGA IN', 'user/loginWindow'); 
	
	$class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
    $this->form = new $class();
	$this->login_error = $this->getUser()->getAttribute('loginerror');
	/*if ($request->isMethod('post'))
	{
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$user = new SfGuardUserProfile();
		$check_flag = $user->login_check($arr['username'],$arr['password']);

		if($arr['username']!='' && $arr['password']!='')
		{
			if($check_flag==1)
			{
				$this->getUser()->setAttribute('username', $arr['username'], 'userProperty');
				$this->getUser()->setAuthenticated(true);
				$userData = $user->fetch_user($this->getUser()->getAttribute('username', '', 'userProperty'));
				$this->getUser()->setAttribute('userData', $userData, 'userProperty');
				
				$user_profile = $user->fetch_user_profile($this->getUser()->getAttribute('username', '', 'userProperty'));
				$this->getUser()->setAttribute('firstname', $user_profile->firstname, 'userProperty');
				$this->getUser()->setAttribute('lastname', $user_profile->lastname, 'userProperty');
							
				$userPermissions = $userData->getPermissionNames();
	
				$this->redirect('@homepage');
			}
			else
			{
				$this->login_error = '* Ange giltiga användarnamn och lösenord';
			}
		}
		else
		{
			$this->login_error = '* Vänligen håll inte någon tomt';
		}
	}*/
  }
  
 /**
  * Executes Signin action
  *
  * @param sfRequest $request A request object
  */
  public function executeSignin($request)
  { 
    $user = $this->getUser();
    if ($user->isAuthenticated())
    {
      return $this->redirect('@homepage');
    }

    $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
    $this->form = new $class();
        
        $last_url = $_SERVER['HTTP_REFERER'];
        $self_wind = 0;
        if (preg_match('/loginWindow/',$last_url)){
            $self_wind = 1;
        }

    if ($request->isMethod('post'))
    {
	  $this->form->bind($request->getParameter('signin'));
	  if ($this->form->isValid())
      {	  
        $values = $this->form->getValues(); 
        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

		$user_profile = new SfGuardUserProfile();
		$this->getUser()->setAttribute('username', $values['user'], 'userProperty');
		
		$userData = $user_profile->fetch_user($this->getUser()->getAttribute('username', '', 'userProperty'));
		$this->getUser()->setAttribute('userData', $userData, 'userProperty');
		
		$user_profile_data = $user_profile->fetch_user_profile($this->getUser()->getAttribute('username', '', 'userProperty'));
		$this->getUser()->setAttribute('firstname', $user_profile_data->firstname, 'userProperty');
        $this->getUser()->setAttribute('lastname', $user_profile_data->lastname, 'userProperty');
		$this->getUser()->setAttribute('email', $user_profile_data->email, 'userProperty');
        $this->getUser()->setAttribute('user_id', $user_profile_data->user_id, 'userProperty');
		$this->getUser()->setAttribute('from_sbt', $user_profile_data->from_sbt, 'userProperty');
		$this->getUser()->setAttribute('userstatID', $user_profile_data->userstatid, 'userProperty');
		
		$user_profile->update_user_profile($user_profile_data->user_id);
		
		$isSuperAdmin = $this->getUser()->isSuperAdmin();
		if($isSuperAdmin==1) $this->getUser()->setAttribute('isSuperAdmin', 1 , 'userProperty');
		else $this->getUser()->setAttribute('isSuperAdmin', 0 , 'userProperty');

        $this->getUser()->setAttribute('loginerror','');
		// always redirect to a URL set in app.yml
        // or to the referer
        // or to the homepage
        //$signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));
		$signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer('@homepage'));
		if ($this->getUser()->getAttribute('wantsurl')){
                    if($self_wind){
                        $this->redirect($this->getUser()->getAttribute('wantsurl'));
                    }else{
                        $this->redirect($_SERVER['HTTP_REFERER']);
                    }
                }
		else
                    return $this->redirect($signinUrl);

       // return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
      }
	  else
	  { //echo $_SERVER['HTTP_REFERER'];die();
	  	$this->getUser()->setAttribute('loginerror','* Ange giltiga användarnamn och lösenord');
	  	$this->redirect('user/loginWindow');
                //$this->redirect($_SERVER['HTTP_REFERER']);
	  }
    }
    else
    {
      if ($request->isXmlHttpRequest())
      {
        $this->getResponse()->setHeaderOnly(true);
        $this->getResponse()->setStatusCode(401);

        return sfView::NONE;
      }

      // if we have been forwarded, then the referer is the current URL
      // if not, this is the referer of the current request
      $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module)
      {
        return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
      }

      $this->getResponse()->setStatusCode(401);
	  
    }
  }
  
 /**
  * Executes Forget Password action
  *
  * @param sfRequest $request A request object
  */
  public function executeForgetPassword($request)
  {
  	//isicsBreadcrumbs::getInstance()->addItem('Forget Password', 'user/forgetPassword');
	$this->host_str = $this->getRequest()->getHost();
	
	if ($request->isMethod('post'))
	{
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		$error_flag = 0;
		$msg = "";
		$mymarket = new mymarket();
		
		if(empty($arr["email"])) 
		{
			$msg .= "OBS! Du angav inte mail-adress";
			$error_flag = 1;
		} 
		elseif (!$mymarket->email_exists($arr["email"])) 
		{
			$msg .= "OBS! Detta är inte någon e-postadress som finns registrerad hos Börstjänaren.";
			$error_flag = 1;
		}
		
		$this->msg = $msg;
		
		// If form is error free
		if($error_flag == 0) 
		{ 
			/* reset the password */
			$newpassword = $mymarket->generate_password();
			$this->getUser()->setAttribute('changed_password', $newpassword);
			$this->getUser()->setAttribute('email_for_changed_password', $arr["email"]);

			$profile = new SfGuardUserProfile(); 
			$data = $profile->fetch_user_from_email($arr["email"]);
			$one_user = $profile->fetchOneUser($data->user_id);
			$guard_data = $profile->fetch_user($one_user->username);
			
			if($data)
			{
				$guard_data->setPassword($newpassword);
				$guard_data->save();
				/*$user_data = $profile->fetch_user($one_user->username);
				if($user_data)
				{
					if($user_data->salt=='NULL' && $user_data->algorithm=='NULL')
					{
						$profile->reset_password_for_borst($user_data->id, $newpassword);
					}
					
					if($user_data->salt!='NULL' && $user_data->algorithm=='md5')
					{
						$guard_data->password = $newpassword;
						$guard_data->save();
					}
				}*/
				
			}
			
			$this->forward('email', 'resetPasswordMail');
			//$this->redirect('email/resetPasswordMail');
		}
	}
  }
  
   /**
	*
	* The function is used when user request for forgot password and a new passowrd is sent to him.
	*
	*/
	public function executeForgetPasswordDone(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Reset Password Done', 'user/forgetPasswordDone');
	}
	
   /**
	*
	* The function is used when user wants to change his password.
	*
	*/
	public function executeChangePasswordForm(sfWebRequest $request)
	{
		isicsBreadcrumbs::getInstance()->addItem('Change Password', 'user/changePasswordForm');
		
		$this->host_str = $this->getRequest()->getHost();
        $error_free = '';  

		if ($request->isMethod('post'))
		{
			$arr = $this->getRequest()->getParameterHolder()->getAll();
		    
			$username = $this->getUser()->getAttribute('username','', 'userProperty');			
			
			$profile = new SfGuardUserProfile();
			$user_data = $profile->fetch_user($username);
			
			
			$this->is_error = $profile->changePassFormCheck($arr,$user_data);
			
			if(strlen($this->is_error)==0)
			{
				$this->error_free = 1;
				if($this->getUser())
				{
					$user = $this->getUser()->getGuardUser();
					$user->setPassword($arr["new_pass"]);
					$user->save();
				}
				//$profile->reset_password_for_borst($user_data->id, $arr["new_pass"]);
			}	
			else
			{
				$this->error_free = 0;  				
			}	
		}
	}
  
}
