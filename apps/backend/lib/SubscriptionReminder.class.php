<?php
class SubscriptionReminder
{
	public function sendSubEmail($firstname, $lastname, $subName, $end_date, $email, $url){
            
            $to = $email;
            $from = sfConfig::get('app_mail_shop_email');
            $cc_emails	= array();	
            $cc_emails	= 'btshop@borstjanaren.se';
            $subject	= "Börstjänaren Kontoinformation";
            $body        = "<table><tr><td><img src='https://www.borstjanaren.se/images/subscription_remider_header.png'/></td></tr></table>";
            $body	.= "\n\n Hej $firstname $lastname,  \n\n";
            $body	.= "Ditt abonnemang $subName på Börstjänaren löper ut inom kort. \n\n";
            $body	.= "Om du vill fortsätta abonnera utan avbrott efter $end_date är du välkommen att förlänga abonnemanget via denna <a href='$url' target='_blank'>länk!</a> \n\n";
            $body	.= "Med vänlig hälsning \n";
            $body	.= "Börstjänaren \n\n";
            $body       .= "<table><tr><td><img src='https://www.borstjanaren.se/images/subscription_remider_footer.png'/></td></tr></table>";
            $body	.= "<a href='https://www.borstjanaren.se/' target='_blank'>Börstjänaren</a> \n";
            $body	.= "För snabbast och säkrast svar, använd gärna vårt kontaktfunktion <a href='https://www.borstjanaren.se/borst/enquiry' target='_blank'>Fråga BT!</a> \n";
            $body	.= "Vi svarar så snart vi kan! \n";
            if($to)
            {
                //$this->sendeMail($to, $from, $subject, $body, true);
                $this->sendMailcc($to, $from, $cc_emails, $subject, $body, true);
            }
        }
        
    public function sendeMail($to, $from, $subject, $body, $immediate=false)
    {
		### Mailer
		if($to!=''):
			try {
				$mailer		= sfContext::getInstance()->getMailer();
				$message 	= Swift_Message::newInstance()
							->setCharset('iso-8859-2')
							->setSubject($subject)
							->setFrom($from)
							->setTo($to)

                            ->attach(new Swift_MimePart(nl2br($body), 'text/html'));
                                if($immediate)
                                {
                                    $mailer->sendNextImmediately();
                                }
				$result		= $mailer->send($message);
                                
			}
			catch (Swift_RfcComplianceException $e)
			{
    			print('Email address not valid:' . $e->getMessage());
			}
		endif;
		return true;
    }
    
    public function sendMailcc($to, $from, $cc, $subject, $body, $immediate=false)
    {
        ### Mailer
        if($to!=''):
                try {
                        $mailer		= sfContext::getInstance()->getMailer();
                        $message 	= Swift_Message::newInstance()
                                                ->setCharset('iso-8859-2')
                                                ->setSubject($subject)
                                                ->setFrom($from)
                                                ->setTo($to)
                                                ->setCc($cc)
                                                    //->setBody($body)
                                                    //->attach(Swift_Attachment::fromPath(sfConfig::get('sf_upload_dir').'/custom_uploads/Daily Attendance Report 15 Jul.xlsx'));


                                                ->attach(new Swift_MimePart(nl2br($body), 'text/html'));
                        if($immediate)
                        {
                            $mailer->sendNextImmediately();
                        }
                        $result		= $mailer->send($message);
                }
                catch (Swift_RfcComplianceException $e)
                {
                print('Email address not valid:' . $e->getMessage());
                }
        endif;
        return true;
    }
}
?>