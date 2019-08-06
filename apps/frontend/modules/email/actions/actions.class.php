<?php

/**
 * email actions.
 *
 * @package    sisterbt
 * @subpackage email
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class emailActions extends sfActions
{

 /**
  * 
  * Executes Before Every Action
  */
  public function preExecute() 
  {
	$this->host_str = $this->getRequest()->getHost();
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
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeSendWelcomeMail(sfWebRequest $request)
  {
    $this->host_str = $this->getRequest()->getHost();
	$user_profile = new SfGuardUserProfile();
        if($this->getUser()->getAttribute('send_activation_mail_with_user_pass') == 1){
                $newuser_password = $this->getUser()->getAttribute('newuser_password');
		$user_profile_data = $user_profile->getUserDataForWelcomeMail($this->getUser()->getAttribute('newuser_email'));
                $send_activation_mail_newsletter_flag = $this->getUser()->getAttribute('send_activation_mail_newsletter_flag');
		$mailBody = $this->getPartial('activation_mail_user_pass',array('user'=>$user_profile_data,'url'=>$this->host_str,'password'=>$newuser_password, 'send_activation_mail_newsletter_flag' => $send_activation_mail_newsletter_flag));
		$to = $this->getUser()->getAttribute('newuser_email');
                
        }else if($this->getUser()->getAttribute('send_activation_mail','','userProperty') == 1)
	{
		$userdata = $user_profile->getUserData($this->getUser()->getAttribute('user_id','','userProperty'));
		$user_profile_data = $user_profile->getUserDataForWelcomeMail($userdata->email);
		$mailBody = $this->getPartial('activation_mail',array('user'=>$user_profile_data,'url'=>$this->host_str));
		$to = $userdata->email;
	}
	else
	{ 
		$user_profile_data = $user_profile->getUserDataForWelcomeMail($this->getUser()->getAttribute('newuser_email'));
		$newuser_password = $this->getUser()->getAttribute('newuser_password');
		$to = $this->getUser()->getAttribute('newuser_email');
		
		if($user_profile_data)
		{
			switch($user_profile_data->abonID)
			{
				case 1: //prov i.e Test User
						$mailBody = $this->getPartial('valkomstbrev_pr',array('user'=>$user_profile_data,'password'=>$newuser_password,'url'=>$this->host_str)); break; 	
				
				case 2: //faktura i.e Invoice user
						$mailBody = $this->getPartial('valkomstbrev_fa',array('user'=>$user_profile_data,'password'=>$newuser_password,'url'=>$this->host_str)); break; 	
							
				case 3: //autogiro i.e Direct Debit user
						$mailBody = $this->getPartial('valkomstbrev_ag',array('user'=>$user_profile_data,'password'=>$newuser_password,'url'=>$this->host_str)); break; 	
				
				/*case 4: //BT-wiz
						$mailBody = $this->getPartial('welcome_BT-wiz',array('user'=>$user_profile_data,'password'=>$newuser_password,'url'=>$this->host_str)); break; 	
						
				case 5: //BT-guru
						$mailBody = $this->getPartial('welcome_BT-guru',array('user'=>$user_profile_data,'password'=>$newuser_password,'url'=>$this->host_str)); break; 	*/
			}
		}
	}

	$from = sfConfig::get('app_mail_sender_email'); 
	$notification = sfConfig::get('app_mail_sender_notification'); 
	
    $message = $this->getMailer()->compose();
    $message->setSubject('Välkommen till Börstjänaren!');
    $message->setTo($to);
	$message->addCc($notification);    
    $message->setFrom($from);
    $message->setBody($mailBody, 'text/html');
	
	$this->getMailer()->send($message);
	
	if($this->getUser()->getAttribute('send_activation_mail','','userProperty') == 1)
	{
		$id = $this->getUser()->getAttribute('user_id','', 'userProperty');
		$url = 'http://'.$this->host_str.'/sbt/sbtMinProfile/id/'.$id;
		$this->redirect($url);
	}
	else
	{
		$this->redirect('sbt_user/newRegistrationDone');	
	}
  }
  
	/*
	*
	* This function sends a mail to the user, who is requested for forgot password.
	*
	*/
	public function executeResetPasswordMail()
	{
		$host_str = $this->getRequest()->getHost();
		$user_profile = new SfGuardUserProfile();
		$user_profile_data = $user_profile->fetch_user_from_email($this->getUser()->getAttribute('email_for_changed_password'));
		$one_user = $user_profile->fetchOneUser($user_profile_data->user_id);
		
		$lank = "http://".$host_str."/user/changePasswordForm";
		$support = "info@borstjanaren.se";
		
		$mailBody = $this->getPartial('reset_password',array('user'=>$user_profile_data,'host_str'=>$host_str,'username'=>$one_user->username,'lank'=>$lank,'support'=>$support,'changed_password'=>$this->getUser()->getAttribute('changed_password')));
		
		$to = $this->getUser()->getAttribute('email_for_changed_password');
		$from = $support;
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Börstjänaren Kontoinformation');
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->send($message);
				
		$this->redirect('user/forgetPasswordDone');
	}
	
	
   /*
	*
	* This function sends a mail to the admin after article creation on sisterbt.
	*
	*/
	public function executeAnalysisCreationMail()
	{
		$host_str = $this->getRequest()->getHost();
		$profile = new SfGuardUserProfile();
		$analysis = new SbtAnalysis();
		
		$return_path = 0;
		
		$user_data = $profile->getUserData($this->getUser()->getAttribute('user_id', '', 'userProperty'));
		$username = $this->getUser()->getAttribute('firstname', '', 'userProperty').' '.$this->getUser()->getAttribute('lastname', '', 'userProperty');
		if($this->getUser()->getAttribute('is_updated_analysis')==1)
			$new_analysis_data = $analysis->getSelectedArticle($this->getUser()->getAttribute('updated_analysis_id'));
		else
			$new_analysis_data = $analysis->getSelectedArticle($this->getUser()->getAttribute('new_analysis_id'));
		
		$new_analysis_name = $new_analysis_data->analysis_title;
		$analysis_id = $new_analysis_data->id;
		 
		$to = sfConfig::get('app_mail_sender_email'); 
		$from = $user_data->email;
		
		$isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
		
		if($this->getUser()->getAttribute('is_updated_analysis')==1)
		{
			$mailBody = $this->getPartial('analysis_correction_mail',array('host_str'=>$host_str,'to'=>$to,'new_analysis_name'=>$new_analysis_name,'username'=>$username,'analysis_id'=>$analysis_id));
			$sub = 'Article Corrected by '.$username;
			$this->getUser()->setAttribute('is_updated_analysis',0);
			//$return_path = 1;
		}
		else if( ($isSuperAdmin == 1) || ($this->getUser()->hasGroup('SbtArticlePublisher')) )
		{
			$mailBody = $this->getPartial('analysis_publishing_mail',array('host_str'=>$host_str,'to'=>$to,'new_analysis_name'=>$new_analysis_name,'username'=>$username,'analysis_id'=>$analysis_id));
			$sub = 'Article created and Published by '.$username;
		}
		else
		{
			$mailBody = $this->getPartial('analysis_creation_mail',array('host_str'=>$host_str,'to'=>$to,'new_analysis_name'=>$new_analysis_name,'username'=>$username,'analysis_id'=>$analysis_id));
			$sub = 'Article created by '.$username;
		}
		
		$message = $this->getMailer()->compose();
		$message->setSubject($sub);
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->send($message);
		
		if($return_path == 1) return $this->redirect('sbt/sbtUserProfile');		
		else return sfView::NONE;
	}

   /*
	*
	* This function sends a mail to the admin after article creation on sisterbt.
	*
	*/
	public function executeSendPublisherRequest(sfWebRequest $request)
	{
	  	$profile = new SfGuardUserProfile();
		
		$author_id = trim(str_replace('authorid_','',$request->getParameter('author_id')));
		$user_data = $profile->getUserData($author_id); 
		
		$to = sfConfig::get('app_mail_sender_email');
		$from = $user_data->email;
		
		$mailBody = $this->getPartial('send_publisher_request_mail',array('user'=>$user_data));
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Request By '.$user_data->firstname.' '.$user_data->lastname.' to become a publisher.');
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		
		$this->getMailer()->send($message);
		
		$publisher_request = new SbtPublisherRequest();
		$publisher_request->author_id = $user_data->user_id;
		$publisher_request->created_at = date('Y-m-d H:i:s');
		$publisher_request->save();
  }
  
   /*
	*
	* This function sends mail to those user who have requested for a mail on update there favorite article,blog,forumpost.
	*
	*/
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
	
   /*
	*
	* This function sends a mail with attached invoice pdf.
	*
	*/
	public function executeSendInvoiceToUser(sfWebRequest $request)
	{
	  	$folder_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/invoice_pdf/'; 
		
		$profile = new SfGuardUserProfile();
		
		$purchase = new Purchase();
		$purchasedItem = new PurchasedItem();
		$this->product_article = new BtShopArticle();
		$subscription = new Subscription();
		
		$purchase_id = $request->getParameter('purchase_id');
		$this->item_list = $purchasedItem->fecthPurchasedItemList($purchase_id);
		$this->purchase_rec = $purchase->getPurchaseOrder($purchase_id);
		$is_receipt = $request->getParameter('receipt');
	
		if($is_receipt == 1)
		{
			$html = $this->getPartial('global/receipt',array('item_list'=>$this->item_list,'product_article'=>$this->product_article,'purchase_rec'=>$this->purchase_rec,'profile'=>$profile,'subscription'=>$subscription));
		}
		else
		{
			$html = $this->getPartial('global/invoice',array('item_list'=>$this->item_list,'product_article'=>$this->product_article,'purchase_rec'=>$this->purchase_rec,'profile'=>$profile,'subscription'=>$subscription));	
		}
		
		require(sfConfig::get('sf_root_dir').'/plugins/mpdfPlugin/mpdf.php' );
		$mpdf=new mPDF('utf-8','A4','','',7,7,6,0,0,0);
			
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($html);
		
		$file_nm = $folder_path.'Invoice.pdf';
		if(file_exists($file_nm)) 
		{
    		unlink($file_nm);
		}
		
		$mpdf->Output($folder_path.'Invoice.pdf','F');
		
		$to = $this->purchase_rec->email;
		$from = sfConfig::get('app_mail_sender_email');
		
		$mailBody = $this->getPartial('invoice_mail');
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Invoice');
		$message->setTo($to);
		$message->setFrom($from);
		$message->attach(Swift_Attachment::fromPath($folder_path.'Invoice.pdf',"application/pdf"));
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->send($message);
		
		$file_nm = $folder_path.'Invoice.pdf';
		if(file_exists($file_nm)) 
		{
    		unlink($file_nm);
		}
		
		
		
		return sfView::NONE;
  }
     
  /*public function executeTestMail(sfWebRequest $request)
  { 
	  	$to = 'ajayb@siddhatech.com';
		$from = 'andshi1@gmail.com';
		
		$mailBody = $this->getPartial('valkomstbrev_pr');
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Välkomna till Börstjänaren!');
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		
		$this->getMailer()->send($message);
		
  }*/
  
    public function executeEmailCollection(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $newsletterPublic = new NewsletterPublic();        
        $btNewsletterSubscriber = new BtNewsletterSubscriber();
        $userEmail = $request->getParameter('email_id');

        $mymarket = new mymarket();
        if (isset($userEmail))
        {
            if($mymarket->is_valid_email($userEmail))
            {
                    $public_data = $btNewsletterSubscriber->isNewsLetterSubscriberEmailPresent($userEmail);

                    if(!$public_data)
                    {
                            $activation_code = substr(number_format(time() * rand(),0,'',''),0,8);
                            $user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty') ? $this->getUser()->getAttribute('user_id', '', 'userProperty') : '';
                            $btNewsletterSubscriber->addNonRegUserToSubscriptions($user_id, $userEmail, $activation_code);                                                        
                           
                            $mailBody = $this->getPartial('activation_mail_newsletter',array('user'=>$userEmail,'url'=>$this->host_str, 'activation_code' => $activation_code));
                            $to = $userEmail;
                            $from = sfConfig::get('app_mail_sender_email'); 
                            $message = $this->getMailer()->compose();
                            $message->setSubject('Registrarse en el boletín con la activación del correo electrónico');
                            $message->setTo($to); 
                            $message->setFrom($from);
                            $message->setBody($mailBody, 'text/html');
                            $this->getMailer()->send($message);                            
                            return $this->renderText("success");
                    }
                    else {
                            return $this->renderText("email exist");
                    }
            }
            else {
                return $this->renderText("email exist");
            }                   
        }
    }
}
