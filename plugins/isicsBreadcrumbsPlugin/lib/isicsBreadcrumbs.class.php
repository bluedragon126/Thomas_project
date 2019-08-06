<?php
/*
 * This file is part of the isicsBreadcrumbsPlugin package.
 * Copyright (c) 2008 ISICS.fr <contact@isics.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class isicsBreadcrumbsItem
{
  protected $text;
  protected $uri;
    
  /**
   * Constructor
   *
   */    
  public function __construct($text, $uri = null)
  {
    $this->text = $text;
    $this->uri  = $uri;
  }
  
  /**
   * Retrieve the uri of the item
   *
   */  
  public function getUri()
  {
    return $this->uri;
  }
  
  /**
   * Retrieve the text of the item
   *
   */  
  public function getText()
  {
        $getCurrent_url = $_SERVER['REQUEST_URI'];
        $getModule_Name = explode('/', $getCurrent_url);
        if($this->text == 'BT-CHARTS' || $this->text == 'BT-SHOP'){
            $strLowerCase = mb_strtolower($this->text,'UTF-8');
            $strFirstLet = mb_substr($strLowerCase, 0, 2);
            $firstLet = mb_strtoupper($strFirstLet,'UTF-8');
            $strRest = mb_substr($strLowerCase,2);
            $finalStr = $firstLet.''.$strRest;
        }else if($this->text == 'A B C' || $this->text == 'D E F' || $this->text == 'G H I J K' || $this->text == 'L M N' || $this->text == 'O P Q R S' || $this->text == 'T U V' || $this->text == 'X Y Z  Å Ä Ö'){
            $finalStr = mb_strtoupper($this->text,'UTF-8');
        }else{
            $strLowerCase = mb_strtolower($this->text,'UTF-8');
            $strFirstLet = mb_substr($strLowerCase, 0, 1);
            $firstLet = mb_strtoupper($strFirstLet,'UTF-8');
            $strRest = mb_substr($strLowerCase,1);
            if($this->text == 'Fråga BT'){
                $finalStr = $firstLet.''.$strRest;
                $str_askBT = explode(' ',$finalStr);
                $finalStr = $str_askBT[0].' '.mb_strtoupper($str_askBT[1]);
            }else{
                $finalStr = $firstLet.''.$strRest;
            }            
        }
        if($getModule_Name[1] == 'borst_shop'){
            if(strlen($finalStr) >= 60){
                $limited_text = mb_substr($finalStr,0,60);
                $limText = $limited_text.'...';
            }else{
                $limText = $finalStr;
            }
        }
        else if(strlen($finalStr) >= 47){
            $limited_text = mb_substr($finalStr,0,47);
            $limText = $limited_text.'...';
        }else{
            $limText = $finalStr;
        }
    return $limText;
    //return $this->text;
  }
}

class isicsBreadcrumbs
{
  static    $instance = null;
  protected $items    = array();
  
  /**
   * Constructor
   *
   */
  protected function __construct()
  {
    $this->setRoot('Home', '@homepage');
  }

  /**
   * Listens to the template.filter_parameters event.
   *
   * @param  sfEvent $event       An sfEvent instance
   * @param  array   $parameters  An array of template parameters to filter
   *
   * @return array   The filtered parameters array
   */
  public static function filterTemplateParameters(sfEvent $event, $parameters)
  {
  	$parameters['breadcrumbs'] = isicsBreadcrumbs::getInstance();
    
    return $parameters;
  }

  /**
   * Add an item
   *
   * @param string $text
   * @param string $uri
   */
  public function addItem($text, $uri = null)
  { 
    array_push($this->items, new isicsBreadcrumbsItem($text, $uri));
  }

  /**
   * Alias of addItem()
   *
   * @see addItem
   */
  public function add($text, $uri = null)
  {
    $this->addItem($text, $uri);
  }

  /**
   * Delete all existings items
   *
   */
  public function clearItems()
  {
    $this->items = array();
  }  
  
  /**
   * Get the unique isicsBreadcrumbs instance (singleton)
   *
   * @return isicsBreadcrumbs
   *
   */
  public static function getInstance()
  {
    if (is_null(self::$instance))
    {
      self::$instance = new isicsBreadcrumbs();
    }
    
    return self::$instance;
  }
  
  
  /**
   * Retrieve an array of isicsBreadcrumbsItem
   *
   * @param int $offset
   *
   * @return array
   */
  public function getItems($offset = 0)
  {
    return array_slice($this->items, $offset);
  }
    
  /**
   * Redefine the root item
   *
   */
  public function setRoot($text, $uri)
  {
    $this->items[0] = new isicsBreadcrumbsItem($text, $uri);
  }
}