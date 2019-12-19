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
		$user = $this->getUser();
		$host_str = $this->getRequest()->getHost();
		
		$this->getUser()->setAttribute('third_menu', '');
	
		$actionName  = $this->getActionName();
		$showdata = 0;
		
		if($user->isAuthenticated())
		{
			$stdlib = new stdlib();
			$wantsurl = $stdlib->accessed_url();
			$this->getUser()->setAttribute('wantsurl',$wantsurl);

			if($actionName=='index')
			{
				if($this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty')==1)
				{
					$showdata = 1;
				}
				else
					$showdata = 0;	
			}
			
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
		//$this->forward('default', 'module');
	  }
          /**
  * Executes Signin action
  *
  * @param sfRequest $request A request object
  */
    public function executeSignin($request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            return $this->redirect('@homepage');
        }

       
    }
}
