<?php

/**
 * sfGuardUser form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
	 $this->validatorSchema['username']->setOption('required', true);
         $this->validatorSchema['username']->setMessage('required', 'Nödvändig');
	 $this->validatorSchema['username']->setOption('min_length', 2);
	 $this->validatorSchema['username']->setMessage('min_length', 'Minst 2 tecken krävs');
	 $this->validatorSchema['username']->setOption('max_length', 28);
	 $this->validatorSchema['username']->setMessage('max_length', 'Maximum 28 characters only');
	 
	 $this->validatorSchema['password']->setOption('required', true);
         $this->validatorSchema['password']->setMessage('required', 'Nödvändig');
	 $this->validatorSchema['password']->setOption('min_length', 6);
	 $this->validatorSchema['password']->setMessage('min_length', 'Minst 6 tecken krävs');
	 $this->validatorSchema['password']->setOption('max_length', 15);
	 $this->validatorSchema['password']->setMessage('max_length', 'Maximum 15 characters only');
	 $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
	 
	 
	
  }
}
