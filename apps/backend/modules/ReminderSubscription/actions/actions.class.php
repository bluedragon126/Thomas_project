<?php

require_once dirname(__FILE__).'/../lib/ReminderSubscriptionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/ReminderSubscriptionGeneratorHelper.class.php';

/**
 * ReminderSubscription actions.
 *
 * @package    sisterbt
 * @subpackage ReminderSubscription
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReminderSubscriptionActions extends autoReminderSubscriptionActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
      // sorting
      if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
      {
        $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
      }

      // pager
      if ($request->getParameter('page'))
      {
        $this->setPage($request->getParameter('page'));
      }

      $this->pager = $this->getPager();
      $this->sort = $this->getSort();
    }
    
    public function executeNew(sfWebRequest $request)
    {
      $this->host_str = $this->getRequest()->getHost();
      $this->form = $this->configuration->getForm();
      $this->reminder_subscription = $this->form->getObject();
    }
    
    public function executeEdit(sfWebRequest $request)
    {
      $this->host_str = $this->getRequest()->getHost();
      $this->reminder_subscription = $this->getRoute()->getObject();
      $this->form = $this->configuration->getForm($this->reminder_subscription);
    }
    
}
