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
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	 public function executeIndex(sfWebRequest $request)
	 {
		$this->forward('default', 'module');
	 }
  
	/*
	*
	* This function sends newly generated password to user.
	*
	*/
	public function executeNewPassToUser(sfWebRequest $request)
	{
		$host_str = $this->getRequest()->getHost();
		$profile = new SfGuardUserProfile();
		
		if($request->getParameter('user_id'))
			$profile->resetUserPassword($request->getParameter('user_id'));
			
		$new_pass = $this->getUser()->getAttribute('reseted_pass','','userProperty');
		$id = $this->getUser()->getAttribute('reseted_pass_user_id','','userProperty');
		$user = $profile->getUserData($id);
		
		$mailBody = $this->getPartial('new_pass_to_user',array('user'=>$user,'host_str'=>$host_str,'new_pass'=>$new_pass,'reply_to'=>sfConfig::get('app_mail_sender_email')));
		$to = $user->email;
		$from = sfConfig::get('app_mail_sender_email'); 
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Börstjänaren Kontoinformation');
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->send($message);
				
		return sfView::NONE;
	}
	
	/*
	*
	* This function sends Reminder mail to selected users.
	*
	*/
	public function executeRemindUserMail()
	{
		$host_str = $this->getRequest()->getHost();
		$usernames = $this->getUser()->getAttribute('userlist_to_remind');
		$arr = $this->getUser()->getAttribute('remind_mail_data');
		
		$i = 0; $obetalda = 0; $mail_to = ""; $mail_to_obetalda = "";

		foreach($usernames as $oneuser_data)
		{
			if($oneuser_data)
			{
				if ($oneuser_data->abonid == 1) // Test Users
				{
					$file_name = $arr['txt_file_pr'];
					$subject = $arr['txt_subject_pr'];
				}
				if ($oneuser_data->abonid == 2) // Invoice Users
				{
					$file_name = $arr['txt_file_fa'];
					$subject = $arr['txt_subject_fa'];
				}
				if ($oneuser_data->abonid == 3) // Direct Debit Users
				{ 
					$file_name = $arr['txt_file_ag'];
					$subject = $arr['txt_subject_ag'];
				}
				
				$findme = '.';
				
				if(substr($file_name, 0,1)=='_')
				{
					$file_name = substr($file_name,1);
					$pos = strpos($file_name, $findme);
					$file_name = substr($file_name,0,$pos);
				}
				else
				{
					$pos = strpos($file_name, $findme);
					$file_name = substr($file_name,0,$pos);
				}
				
				//format the date using the timestamp generated
				$dates     = explode("-", $oneuser_data->stopdate);
				$year      = $dates['0'];
				$month      = $dates['1'];
				$day     = $dates['2'];
				$new_stopdate = date("Y-m-d",mktime(0,0,0,$month+1,$day,$year));
				
				$new_status = 2;
				
				$mailBody = $this->getPartial($file_name,array('user'=>$oneuser_data));
				$to = $oneuser_data->email;
				$from = sfConfig::get('app_mail_sender_email'); 
				
				$mailTo =  $oneuser_data->email;
				$mailFrom = sfConfig::get('app_mail_sender_email'); 
				try
				{
				  // Send
				  if($oneuser_data->abonid != 6)
				  {
				  	$message = $this->getMailer()->compose();
					$message->setSubject($subject);
					$message->setTo($to);
					$message->setFrom($from);
					$message->setBody($mailBody, 'text/html');
					$sent = $this->getMailer()->send($message);
				  }
				  //$message->disconnect();
				  
				   if($sent)
				   {
						if ($oneuser_data->abonid == 3) // OM AUTOGIRO 1) ndra j userstat ALLTID BETALD. 2) flytta fram stoppdatum 30dgr
							$oneuser_data->stopdate = $new_stopdate;
						elseif ($oneuser_data->abonid != 6) //PROBONO SKA EJ NDRAS
							$oneuser_data->userstatid = $new_status;
						$i++; 
						$mail_to .= $oneuser_data->email . "<br>";						
				   }
				   
				   // USER WAYS TO STOP DATE UNPAID WHICH HAVE PASSERATS (except for direct debit and Pro Bono)
				   if ($oneuser_data->stopdate < date("Y-m-d") && $oneuser_data->abonid != 3 && $oneuser_data->abonid != 6) 
				   {
						$oneuser_data->userstatid = 4;
						$mail_to_obetalda .= $oneuser_data->email . "<br>";
						$obetalda++;
				   }
				   
				   if ($oneuser_data->stopdate > date("Y-m-d") && $oneuser_data->abonid != 3 && $oneuser_data->abonid != 6) 
				   {
						$oneuser_data->userstatid = 2;
				   }
				}
				catch (Exception $e)
				{
					echo $e;
				}
				
				$oneuser_data->save();
			}
		}
		
		$reminduser_greenmsg = "<b>" . $i . " användare har påmints via mejl och uppdaterats till status påmind:</b><br>" . $mail_to;
		
		if ($obetalda > 0) 
			$reminduser_greenmsg .= "<b><br/>" . $obetalda . " användare har satts till obetald då stoppdatum passerats:</b><br>" . $mail_to_obetalda;
			
		$this->getUser()->setAttribute('reminduser_greenmsg',$reminduser_greenmsg);

		$url = 'https://'.$host_str.'/backend.php/borst/remindUser';
		$this->redirect($url);
		//return sfView::NONE;
	}
	
	
   /*
	*
	* This function sends mail to the user whos article is rejected by admin.
	*
	*/
	public function executeSendRejectAnalysisMail(sfWebRequest $request)
	{
		$host_str = $this->getRequest()->getHost();
		$profile = new SfGuardUserProfile();
		$analysis = new SbtAnalysis();
		$sbt_analysis_suggestion_data =  new SbtAnalysisSuggestion(); 

		$user = $profile->getUserData($this->getUser()->getAttribute('publ_rej_author'));
		$analysis_data = $analysis->getSelectedArticle($this->getUser()->getAttribute('publ_rej_article_id'));
		$last_suggestion = $sbt_analysis_suggestion_data->getSelectedSuggestion($this->getUser()->getAttribute('publ_rej_last_suggestion'));
		 
		$mailBody = $this->getPartial('article_suggestion_to_user',array('user'=>$user,'host_str'=>$host_str,'analysis_data'=>$analysis_data,'last_suggestion'=>$last_suggestion));
		
		$to = $user->email;
		$from = sfConfig::get('app_mail_sender_email'); 
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Suggestion on Article '.$analysis_data->analysis_title);
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->send($message);
		
		$url = 'https://'.$host_str.'/backend.php/sbt/sbtArticleRequest';
		$this->redirect($url);
	}
	
   /*
	*
	* This function sends mail to the user whos article is approved by admin.
	*
	*/
	public function executeSendApprovedAnalysisMail(sfWebRequest $request)
	{
		$host_str = $this->getRequest()->getHost();
		$profile = new SfGuardUserProfile();
		$analysis = new SbtAnalysis();
		$sbt_analysis_suggestion_data =  new SbtAnalysisSuggestion(); 

		$user = $profile->getUserData($this->getUser()->getAttribute('publ_rej_author'));
		$analysis_data = $analysis->getSelectedArticle($this->getUser()->getAttribute('publ_rej_article_id'));
		$last_suggestion = $sbt_analysis_suggestion_data->getSelectedSuggestion($this->getUser()->getAttribute('publ_rej_last_suggestion'));
		 
		$mailBody = $this->getPartial('approved_article_to_user',array('user'=>$user,'host_str'=>$host_str,'analysis_data'=>$analysis_data,'last_suggestion'=>$last_suggestion));
		
		$to = $user->email;
		$from = sfConfig::get('app_mail_sender_email'); 
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Your Article '.$analysis_data->analysis_title.' has been Approved');
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->send($message);
		
		$url = 'https://'.$host_str.'/backend.php/sbt/sbtArticleRequest';
		$this->redirect($url);
	}
	
   /*
	*
	* This function sends mail to the user who is awarded.
	*
	*/
	public function executeSendUserAwardMail(sfWebRequest $request)
	{
		$host_str = $this->getRequest()->getHost();

		$awarded_author_data = $this->getUser()->getAttribute('awarded_author_data','','userProperty');
		$awarded_medal_name = $this->getUser()->getAttribute('awarded_medal_name','','userProperty');
		$awarded_medal_data = $this->getUser()->getAttribute('awarded_medal_data','','userProperty');
		
		$mailBody = $this->getPartial('award_to_author',array('user'=>$awarded_author_data,'host_str'=>$host_str,'medal_name'=>$awarded_medal_name,'record_data'=>$awarded_medal_data));
			
		$to = $awarded_author_data->email;
		$from = sfConfig::get('app_mail_sender_email'); 
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Congratulations you are Awarded a medal');
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->send($message);
		
		$this->getUser()->setAttribute('award_to_author','Medal has been succesfully awarded to user','userProperty');
		$url = 'https://'.$host_str.'/backend.php/sbt/awardMedalToUser/author_id/'.$awarded_author_data->user_id;
		$this->redirect($url);
	}
	
   /*
	*
	* This function sends mail to the user whos article is awarded.
	*
	*/
	public function executeSendAnlysisAwardMail(sfWebRequest $request)
	{
		$host_str = $this->getRequest()->getHost();
		
		$awarded_analysis_data = $this->getUser()->getAttribute('awarded_analysis_data','','userProperty');
		$awarded_analysis_author_data = $this->getUser()->getAttribute('awarded_analysis_author_data','','userProperty');
		$awarded_medal_name = $this->getUser()->getAttribute('awarded_medal_name','','userProperty');
		$awarded_medal_data = $this->getUser()->getAttribute('awarded_medal_data',$record_data,'userProperty');
		
		$mailBody = $this->getPartial('award_to_analysis',array('user'=>$awarded_analysis_author_data,'host_str'=>$host_str,'analysis_data'=>$awarded_analysis_data,'medal_name'=>$awarded_medal_name,'record_data'=>$awarded_medal_data));
			
		$to = $awarded_analysis_author_data->email;
		$from = sfConfig::get('app_mail_sender_email'); 
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Congratulations your Analysis has been awarded');
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->send($message);
		
		$this->getUser()->setAttribute('award_to_analysis','Medal has been succesfully awarded to analysis '.$awarded_analysis_data->analysis_title,'userProperty');
	    $url = 'https://'.$host_str.'/backend.php/sbt/awardMedalToArticle/analysis_id/'.$awarded_analysis_data->id;
		$this->redirect($url);
	}
	
   /*
	*
	* This function sends mail to those users whos are now publisher.
	*
	*/
	public function executeSendApprovePublisherMail(sfWebRequest $request)
	{
		/*$new_publisher_arr = $this->getUser()->getAttribute('new_publisher','','userProperty');*/
		$publisher_arr = $regular_arr = array();
		$profile = new SfGuardUserProfile();
		/*$j=$k=0;
		
		
		for($i=0;$i<count($new_publisher_arr);$i++)
		{ 
			if(strstr($new_publisher_arr[$i], 'p_')) $publisher_arr[$j++] = trim(str_replace('p_','',$new_publisher_arr[$i]));
			if(strstr($new_publisher_arr[$i], 'r_')) $regular_arr[$k++] = trim(str_replace('r_','',$new_publisher_arr[$i]));
		}*/
		
		$publisher_arr = $this->getUser()->getAttribute('new_publisher','','userProperty');
		$regular_arr = $this->getUser()->getAttribute('new_regular','','userProperty');
		
		if(count($publisher_arr) > 0)
		{

                    for($i=0;$i<count($publisher_arr);$i++)
                    {
			$user = $profile->getUserData($publisher_arr[$i]);
                        
                        $mailBody = $this->getPartial('new_publisher',array('user' => $user));
                        $to = $user->email;
			$from = sfConfig::get('app_mail_sender_email');

			$message = $this->getMailer()->compose();
			$message->setSubject('Congratulations Publisher.');
			$message->setTo($to);
			$message->setFrom($from);
			$message->setBody($mailBody, 'text/html');
			$this->getMailer()->send($message);
                    }
			//$profile->resetRequestStatus($publisher_arr,'1');
			/*$email_arr = $profile->getEmailOfSelectedUsers($publisher_arr);
			
			$mailBody = $this->getPartial('new_publisher');
			
			$to = $email_arr;
			$from = sfConfig::get('app_mail_sender_email'); 
			
			$message = $this->getMailer()->compose();
			$message->setSubject('Congratulations Publisher.');
			$message->setTo($to);
			$message->setFrom($from);
			$message->setBody($mailBody, 'text/html');
			$this->getMailer()->batchSend($message);*/
		}
		
		if(count($regular_arr) > 0)
		{
			//$profile->resetRequestStatus($regular_arr,'2');
			$reg_email_arr = $profile->getEmailOfSelectedUsers($regular_arr);
			
			$mailBody = $this->getPartial('removed_publisher');
			
			$to = $reg_email_arr;
			$from = sfConfig::get('app_mail_sender_email'); 
			
			$message = $this->getMailer()->compose();
			$message->setSubject('Your Group has been changed.');
			$message->setTo($to);
			$message->setFrom($from);
			$message->setBody($mailBody, 'text/html');
			$this->getMailer()->batchSend($message);
		}
		return sfView::NONE;
	}
	
   /*
	*
	* This function sends mail to the a perticular user, when admin gives reply to his enquiry.
	*
	*/
	public function executeEnquiryReplyMail(sfWebRequest $request)
	{
		$host_str = $this->getRequest()->getHost();
		$user = $this->getUser()->getAttribute('udata','','userProperty');
        $comm_id = $this->getUser()->getAttribute('comm_id','','userProperty');
				
		$mailBody = $this->getPartial('enquiry_reply_mail',array('user'=>$user,'host_str'=>$host_str,'comm_id'=>$comm_id));
		//echo 'email:'.$user->email;	
		$to = $user->email;
		$from = sfConfig::get('app_mail_reply_email'); 
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Svar på förfrågan');
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->send($message);
		return sfView::NONE;
	}
	
   /*
	*
	* This function sends mail to the a perticular users, who have subscribe for perticular subscription.
	*
	*/
	public function executeSendSubscriptionMail(sfWebRequest $request)
	{
		$host_str = $this->getRequest()->getHost();
		$arr = $this->getRequest()->getParameterHolder()->getAll();
		
		$subscription = new Subscription();
		$purchase = new Purchase();
		
		if($arr['komma_seperated_users'])
		{
			$email_arr = explode(",",$arr['komma_seperated_users']);
		}
		else
		{
			$email_arr = $subscription->getEmailOfValidPurchaseIdOnDate($arr,'email');
		}
		
		$file_name = str_replace('_','',$arr['email_file_name']);
		$pos = strpos($file_name, '.');
		$file_name = substr($file_name,0,$pos);
					
		$mailBody = $this->getPartial($file_name);
		$to = $email_arr;
		$from = sfConfig::get('app_mail_sender_email'); 
		
		$message = $this->getMailer()->compose();
		$message->setSubject($arr['email_subject']);
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->batchSend($message);
		
		$msg = 'Subscription named:'.$arr['email_subject'].' is sent to:<br/>';
		
		$comma_separated_id = implode(",", $email_arr);
		
		if(strstr($comma_separated_id, ','))
			$comma_separated_id = str_replace(',','<br/>',$comma_separated_id);
		else
			$comma_separated_id = $comma_separated_id;
			
		$msg = $msg.$comma_separated_id;
		$this->msg = $msg;
	}
	
   /*
	*
	* This function sends mail to the a perticular user when his payment status is updated.
	*
	*/
	public function executePaymentStatusUpdateMail(sfWebRequest $request)
	{
		$host_str = $this->getRequest()->getHost();
				
		$pur_id = $request->getParameter('pur_id');
		
		$purchase = new Purchase();
		$purchase_data = $purchase->getPurchaseOrder($pur_id);
		
		if($purchase_data)
		{
			$mailBody = $this->getPartial('payment_status_update_mail',array('user'=>$user,'host_str'=>$host_str,'purchase_data'=>$purchase_data));
			//echo 'email:'.$user->email;	
			$to = $purchase_data->email;
			$from = sfConfig::get('app_mail_reply_email'); 
			
			$message = $this->getMailer()->compose();
			$message->setSubject('mottagen betalning');
			$message->setTo($to);
			$message->setFrom($from);
			$message->setBody($mailBody, 'text/html');
			$this->getMailer()->send($message);
		}
		return sfView::NONE;
	}
	
   /*
	*
	* This is test function.
	*
	*/
	/*public function executeBatchSendTest(sfWebRequest $request)
	{
		$mailBody = $this->getPartial('batchSendTest');
			
		$to = array('ajayb@siddhatech.com','andshi1@gmail.com','andshi2@gmail.com');
		$from = sfConfig::get('app_mail_sender_email'); 
		
		$message = $this->getMailer()->compose();
		$message->setSubject('Congratulations..Test');
		$message->setTo($to);
		$message->setFrom($from);
		$message->setBody($mailBody, 'text/html');
		$this->getMailer()->batchSend($message);
		
		//$to = array('ajayb@siddhatech.com','andshi1@gmail.com','andshi2@gmail.com');
		//$this->getMailer()->composeAndSend($from, $to, 'Congratulations..Test', $mailBody);
 		echo 'Done';
		return sfView::NONE;
	}*/
}
