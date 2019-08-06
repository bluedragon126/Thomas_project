<?php

/**
 * borst_markets actions.
 *
 * @package    sisterbt
 * @subpackage borst_markets
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class borst_marketsActions extends sfActions
{
    public function preExecute(){
        
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
  * Executes BorstMarketsHome action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstMarketsHome(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_markets');
	$this->getUser()->setAttribute('submenu_menu', 'bt_markets_home');
	$this->getUser()->setAttribute('third_menu', '');
  }
  
  /**
  * Executes BorstMarketsForum action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstMarketsForum(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_markets');
	$this->getUser()->setAttribute('submenu_menu', 'bt_markets_forum');
  } 
  
  /**
  * Executes BorstMarketsLaddaned action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstMarketsLaddaned(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_markets');
	$this->getUser()->setAttribute('submenu_menu', 'bt_markets_laddaned');
  } 
  
  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstMarketsVarforBt(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_markets');
	$this->getUser()->setAttribute('submenu_menu', 'bt_markets_varforbt');
  } 
  
  /**
  * Executes BorstMarketsLarDig action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstMarketsLarDig(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_markets');
	$this->getUser()->setAttribute('submenu_menu', 'bt_markets_lardig');
  } 
  
  /**
  * Executes BorstMarketsHanDia action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstMarketsHanDia(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_markets');
	$this->getUser()->setAttribute('submenu_menu', 'bt_markets_handia');
  } 
  
  /**
  * Executes BorstMarketsCfder action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstMarketsCfder(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_markets');
	$this->getUser()->setAttribute('submenu_menu', 'bt_markets_cfder');
  } 
  
  /**
  * Executes BorstMarketsOmOss action
  *
  * @param sfRequest $request A request object
  */
  public function executeBorstMarketsOmOss(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('parent_menu', 'top_bt_markets');
	$this->getUser()->setAttribute('submenu_menu', 'bt_markets_omoss');
  }
}
