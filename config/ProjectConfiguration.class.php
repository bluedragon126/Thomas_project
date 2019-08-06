<?php

//require_once 'C:\\wamp\\bin\\php\\php5.2.6\\PEAR\\symfony/autoload/sfCoreAutoload.class.php';
require_once dirname(__FILE__).'/../lib/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('isicsBreadcrumbsPlugin');
	  $this->enablePlugins('sfAnotherReCaptchaPlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
	  $this->enablePlugins('sfThumbnailPlugin');
  }
}
