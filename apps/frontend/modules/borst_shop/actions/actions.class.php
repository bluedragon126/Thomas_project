<?php

/**
 * borst_shop actions.
 *
 * @package    sisterbt
 * @subpackage borst_shop
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class borst_shopActions extends sfActions {

    /**
     *
     * Executes Before Every Action
     */
    public function preExecute() {
        $user = $this->getUser();
        $host_str = $this->getRequest()->getHost();

        $this->cart_product_arr = array("BT Trend" => "30", "BT Utbrott" => "29", "BT Kanalen" => "28", "Henry Boy" => "31", "Kandelaber" => "23");

        $this->getUser()->setAttribute('third_menu', '');

        $actionName = $this->getActionName();
        $ajax_called_action_names_arr = array('getCartData', 'isEmptyCartForPayment', 'saveAsPdf', 'itemPricing');

        if (!in_array($actionName, $ajax_called_action_names_arr)) {
            $stdlib = new stdlib();
            $wantsurl = $stdlib->accessed_url();
            $this->getUser()->setAttribute('wantsurl', $wantsurl);
        }


        $showdata = 0;

        $this->logged_user = $this->getUser()->getAttribute('user_id', '', 'userProperty');
        $this->logged_user_email = $this->getUser()->getAttribute('email', '', 'userProperty');
        $this->host_str = $this->getRequest()->getHost();

        // For Region Code
        $countries = new Countries();
        if ($this->logged_user) {
            $contry_arr = array('1' => 'SE', '2' => 'NO', '3' => 'FI', '4' => 'DK', '5' => 'OTHER');
            $profile = new SfGuardUserProfile();
            $user_data = $profile->getUserData($this->logged_user);
            if ($user_data) {
                // Added condition for country code for new users as it is changed from from region
                if ($user_data->land != 5)
                    $this->region_code = $countries->getOneRegionCode(is_numeric($user_data->land) ? $contry_arr[$user_data->land] : $user_data->land);
                else
                    $this->region_code = $countries->getOneRegionCode('SE');
            }
        }
        else {
            $this->region_code = $countries->getOneRegionCode('SE');
        }

        //if (!$this->getRequest()->isXmlHttpRequest()) {
            // For Ads
            $adpos_1_arr = $this->getUser()->getAttribute('adpos_1_arr');
            $adpos_2_arr = $this->getUser()->getAttribute('adpos_2_arr');
            $adpos_3_arr = $this->getUser()->getAttribute('adpos_3_arr');
            $adpos_4_arr = $this->getUser()->getAttribute('adpos_4_arr');
            $adpos_5_arr = $this->getUser()->getAttribute('adpos_5_arr');

            $priority_1_arr = $this->getUser()->getAttribute('priority_1_arr');
            $priority_2_arr = $this->getUser()->getAttribute('priority_2_arr');
            $priority_3_arr = $this->getUser()->getAttribute('priority_3_arr');
            $priority_4_arr = $this->getUser()->getAttribute('priority_4_arr');
            $priority_5_arr = $this->getUser()->getAttribute('priority_5_arr');

            $num_1 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_1_arr', $adpos_1_arr, 'Right_top1', 'priority_1_arr', $priority_1_arr);
            $this->ad_1 = SbtAdsTable::getInstance()->getAdString($num_1);

            $num_2 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_2_arr', $adpos_2_arr, 'Right_top2', 'priority_2_arr', $priority_2_arr);
            $this->ad_2 = SbtAdsTable::getInstance()->getAdString($num_2);

            $this->ad_3 = SbtAdsTable::getInstance()->getBulkAdId($adpos_3_arr, 'adpos_3_arr', 'Right_top3');

            $num_4 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_4_arr', $adpos_4_arr, 'Right_top4', 'priority_4_arr', $priority_4_arr);
            $this->ad_4 = SbtAdsTable::getInstance()->getAdString($num_4);
            
            $adpos_6_arr = $this->getUser()->getAttribute('adpos_6_arr');
            $priority_6_arr = $this->getUser()->getAttribute('priority_6_arr');
            $adpos_7_arr = $this->getUser()->getAttribute('adpos_7_arr');
            $priority_7_arr = $this->getUser()->getAttribute('priority_7_arr');

            $num_6 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_6_arr',$adpos_6_arr,'Header_top1','priority_6_arr',$priority_6_arr); 
            $this->ad_6 = SbtAdsTable::getInstance()->getAdString($num_6);	
            $this->getUser()->setAttribute('ad_6', $this->ad_6);

            $num_7 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_7_arr',$adpos_7_arr,'Header_top2','priority_7_arr',$priority_7_arr); 
            $this->ad_7 = SbtAdsTable::getInstance()->getAdString($num_7);	
            $this->getUser()->setAttribute('ad_7', $this->ad_7);
            
            $adpos_8_arr = $this->getUser()->getAttribute('adpos_8_arr');
            $priority_8_arr = $this->getUser()->getAttribute('priority_8_arr');
            $num_8 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_8_arr',$adpos_8_arr,'top_mid','priority_8_arr',$priority_8_arr); 
            $this->ad_8 = SbtAdsTable::getInstance()->getAdString($num_8);	
            $this->getUser()->setAttribute('ad_8', $this->ad_8);
        //}
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
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    /**
     * Executes BorstShopHome action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstShopHome(sfWebRequest $request) 
    {
        $this->getUser()->setAttribute('parent_menu_common', '2');
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_home');
        $this->getUser()->setAttribute('third_menu', '');

        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        $this->metastock_data = $btshop_article->getPublishedShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getPublishedShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getPublishedShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getPublishedShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getPublishedShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getPublishedShopArticleOfType(6);
        $this->btcart_data = $btshop_article->getPublishedShopArticleOfType(7);
        // xmas offer
        $this->xmas_offer_data = $btshop_article->getPublishedShopArticleOfType(8);
		$this->liveutbildningar_data = $btshop_article->getPublishedShopArticleOfType(10);
        
        //$this->plusarticle_data = $btshop_article->getPublishedShopArticleOfType(9);//added sandeep btshop plusarticle        
        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem('BT-Shop Home', 'borst/borstPpm');
        
        // code for cart start
        $this->host_str = $this->getRequest()->getHost();
        //$btshop_article = new BtShopArticle();
        $this->product_article = new BtShopArticle();
        $btShopPriceQtyUnit = new BtShopPriceQtyUnit();
        $shop_art_type = new BtShopArticleType();
        $btShopArticle = new BtShopArticle();

        $type_id = array('1' => '#metastock_title', '3' => '#bocker_title', '4' => '#utbildningar_title', '6' => '#abonnemang_title', '7' => '#btcart_title', '10' => '#live-utbildningar_title');
        $this->trans_arr = array('pieces' => 'st', 'days' => 'dag', 'week' => 'vecka', 'month' => 'månad', 'year' => 'år');

        $type_arr = $shop_art_type->getAllShopArticleTypes();
        $btshop_article->checkAttribute();
        $this->unit_arr = $btShopPriceQtyUnit->getUnitNameArr();

        $product_id = $request->getParameter('product_id');
        $this->pid = $product_id;
        $this->product_detail = $btshop_article->getPerticularShopArticle($product_id);
        $this->price_data = $btshop_article->getProductPriceList($product_id);
        $cart_products_arr = $btShopArticle->getShopArticleOfType(7);
        $cart_products = array();
        foreach ($cart_products_arr as $product) {
            $cart_products[] = $product->id;
        }

        $this->cart_in_cart = 0;  // for unregistred user
        if (in_array($product_id, $cart_products))
            $this->cart_in_cart = 1;

        $product_arr = $this->getUser()->getAttribute('product_arr');
        $this->products_data = $btshop_article->getProductInOrder($product_arr);
        $this->price_arr = $this->getUser()->getAttribute('price_arr');
        $this->product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');
        $this->price_detail_id_arr = $this->getUser()->getAttribute('price_detail_id_arr');
        $this->add_shipping_flag = 0;

        //For Shipping
        $paymentInfo = $this->getUser()->getAttribute('payment_user_info');
        $countries = new Countries();
        $countryShipping = new CountryShipping();
        $total_weight = $btshop_article->getTotalProductWeight($product_arr, $this->product_qty_arr);
        $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, $this->region_code);

        $this->payment_user_info = $paymentInfo;
        $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, ($paymentInfo['user_country'] ? $countries->getOneRegionCode($paymentInfo['user_country']) : $this->region_code));

        $this->isAdmin = $this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty');

        if (!$this->product_detail->published && !($this->getUser()->isAuthenticated() && $this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty'))) {
            $this->valid_user = 0;
        } else {
            $this->valid_user = 1;
        }
        $this->productID = $request->getParameter('product_id');
        //code by sandeep
        $this->final_vat = $this->getUser()->getAttribute('final_vat');
        $this->final_totals = $this->getUser()->getAttribute('final_total');
        $this->final_dicount = $this->getUser()->getAttribute('final_dicount');
        $this->final_discount_percentage = $this->getUser()->getAttribute('final_discount_percentage');
        // code for cart start end
    }

    /**
     * Executes BorstShopMetastocks action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstShopMetastocks(sfWebRequest $request) {
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_metastock');
    }

    /**
     * Executes BorstShopFalconComputers action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstShopFalconComputers(sfWebRequest $request) {
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_falcon_computers');

        $btshop_article = new BtShopArticle();
        $this->metastock_data = $btshop_article->getShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getShopArticleOfType(6);
		$this->liveutbildningar_data = $btshop_article->getShopArticleOfType(10);
    }

    /**
     * Executes BorstShopBocker action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstShopBocker(sfWebRequest $request) {
        isicsBreadcrumbs::getInstance()->addItem('BÖCKER', 'borst_shop/borstShopBocker');

        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_bocker');

        $btshop_article = new BtShopArticle();
        $this->metastock_data = $btshop_article->getShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getShopArticleOfType(6);
		$this->liveutbildningar_data = $btshop_article->getShopArticleOfType(10);
    }

    /**
     * Executes BorstShopUtbildningar action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstShopUtbildningar(sfWebRequest $request) {
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_utbildningar');

        $btshop_article = new BtShopArticle();
        $this->metastock_data = $btshop_article->getShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getShopArticleOfType(6);
		$this->liveutbildningar_data = $btshop_article->getShopArticleOfType(10);
    }
/**
     * Executes BorstShopUtbildningar action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstShopLiveUtbildningar(sfWebRequest $request) {
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_liveutbildningar');

        $btshop_article = new BtShopArticle();
        $this->metastock_data = $btshop_article->getShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getShopArticleOfType(6);
		$this->liveutbildningar_data = $btshop_article->getShopArticleOfType(10);
    }

    /**
     * Executes BorstShopPpm action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstShopPpm(sfWebRequest $request) {
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_marknadsbrev');

        $btshop_article = new BtShopArticle();
        $this->metastock_data = $btshop_article->getShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getShopArticleOfType(6);
		$this->liveutbildningar_data = $btshop_article->getShopArticleOfType(10);
    }

    /**
     * Executes BorstShopAbonnemang action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstShopAbonnemang(sfWebRequest $request) {
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_abonnemang');

        $btshop_article = new BtShopArticle();
        $this->metastock_data = $btshop_article->getShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getShopArticleOfType(6);
		$this->liveutbildningar_data = $btshop_article->getShopArticleOfType(10);
    }

    /**
     * Executes ShopProductDetail action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopProductDetail(sfWebRequest $request) {
        $this->host_str = $this->getRequest()->getHost();
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', '');

        $btshop_article = new BtShopArticle();
        $this->product_article = new BtShopArticle();
        $btShopPriceQtyUnit = new BtShopPriceQtyUnit();
        $shop_art_type = new BtShopArticleType();
        $btShopArticle = new BtShopArticle();

        $type_id = array('1' => '#metastock_title', '3' => '#bocker_title', '4' => '#utbildningar_title', '6' => '#abonnemang_title', '7' => '#btcart_title', '10' => '#live-utbildningar_title');
        $this->trans_arr = array('pieces' => 'st', 'days' => 'dag', 'week' => 'vecka', 'month' => 'månad', 'year' => 'år');

        $type_arr = $shop_art_type->getAllShopArticleTypes();
        $btshop_article->checkAttribute();
        $this->unit_arr = $btShopPriceQtyUnit->getUnitNameArr();

        $product_id = $request->getParameter('product_id');
        $this->pid = $product_id;
        $this->product_detail = $btshop_article->getPerticularShopArticle($product_id);
        $this->price_data = $btshop_article->getProductPriceList($product_id);

        


        $cart_products_arr = $btShopArticle->getShopArticleOfType(7);
        $cart_products = array();
        foreach ($cart_products_arr as $product) {
            $cart_products[] = $product->id;
        }

        $this->cart_in_cart = 0;  // for unregistred user
        if (in_array($product_id, $cart_products))
            $this->cart_in_cart = 1;
            

        $product_arr = $this->getUser()->getAttribute('product_arr');
        $this->product_in_cart = 0;
        if(in_array($product_id, $product_arr)){
            $this->product_in_cart = 1;
        }
        // echo("<pre>");
        //     print_r($product_arr);
        //     die;
        $this->products_data = $btshop_article->getProductInOrder($product_arr);

        $this->price_arr = $this->getUser()->getAttribute('price_arr');
        $this->product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');
        $this->price_detail_id_arr = $this->getUser()->getAttribute('price_detail_id_arr');

        $this->add_shipping_flag = 0;

        //For Shipping
        $paymentInfo = $this->getUser()->getAttribute('payment_user_info');
        $countries = new Countries();
        $countryShipping = new CountryShipping();
        $total_weight = $btshop_article->getTotalProductWeight($product_arr, $this->product_qty_arr);
        $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, $this->region_code);
        /* //var_dump($product_arr);
          echo '<br/>';
          //var_dump($this->price_arr);
          echo '<br/>';
          var_du
         * mp($this->product_qty_arr); */

        //$this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, $this->region_code);
        $this->payment_user_info = $paymentInfo;
        $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, ($paymentInfo['user_country']? $countries->getOneRegionCode($paymentInfo['user_country']):$this->region_code));


        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem(strtoupper($type_arr[$this->product_detail->btshop_type_id]), 'borst_shop/borstShopHome' . $type_id[$this->product_detail->btshop_type_id]);
        isicsBreadcrumbs::getInstance()->addItem($this->product_detail->btshop_article_title, 'borst_shop/borstShopHome');
        $this->isAdmin  = $this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty');

        if(!$this->product_detail->published  && !($this->getUser()->isAuthenticated() && $this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')))
	{
		$this->valid_user = 0;
	}
	else
	{
		$this->valid_user = 1;
	}
        
        $this->metastock_data = $btshop_article->getPublishedShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getPublishedShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getPublishedShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getPublishedShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getPublishedShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getPublishedShopArticleOfType(6);
        $this->btcart_data = $btshop_article->getPublishedShopArticleOfType(7);
        // xmas offer
        $this->xmas_offer_data = $btshop_article->getPublishedShopArticleOfType(8);
		$this->liveutbildningar_data = $btshop_article->getPublishedShopArticleOfType(10);
        
        $this->productID = $request->getParameter('product_id');
        
        
        
        
        //code by sandeep
        $this->final_vat = $this->getUser()->getAttribute('final_vat');
        $this->final_totals = $this->getUser()->getAttribute('final_total');
        $this->final_dicount = $this->getUser()->getAttribute('final_dicount');
        $this->final_discount_percentage = $this->getUser()->getAttribute('final_discount_percentage');
        //var_dump($this->getUser()->getAttribute('final_vat').'=='.$this->final_vat);
        //var_dump($this->getUser()->getAttribute('final_total').'=='.$this->final_totals);
        //var_dump($this->getUser()->getAttribute('final_dicount').'=='.$this->final_dicount);
        //code by sandeep     
    }

    /**
     * Executes GetCartData action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetCartData(sfWebRequest $request) {
        $this->host_str = $this->getRequest()->getHost();
        $btshop_article = new BtShopArticle();
        $this->product_article = new BtShopArticle();

        $price_val = $request->getParameter('price');
        $product_id = $request->getParameter('product_id');
        $this->productID = $product_id;
        $this->product_id = $request->getParameter('product_id');
        $product_qty = $request->getParameter('product_qty');
        $price_detail_id = $request->getParameter('price_detail_id');
        $qty_index = $request->getParameter('qty_index');
        $qty = round($request->getParameter('qty'));
        $delete_index = $request->getParameter('delete_index');
        $empty_cart = $request->getParameter('empty_cart');
        $this->cartEmptyOrNt = $request->getParameter('cartEmptyOrNt');

        $product_arr = $this->getUser()->getAttribute('product_arr');
        $price_arr = $this->getUser()->getAttribute('price_arr');
        $product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');
        $price_detail_id_arr = $this->getUser()->getAttribute('price_detail_id_arr');
		
		$this->metastock_data = $btshop_article->getPublishedShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getPublishedShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getPublishedShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getPublishedShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getPublishedShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getPublishedShopArticleOfType(6);
        $this->btcart_data = $btshop_article->getPublishedShopArticleOfType(7);
		$this->liveutbildningar_data = $btshop_article->getPublishedShopArticleOfType(10);

		$this->product_detail = $btshop_article->getPerticularShopArticle($product_id);
		
        $this->add_shipping_flag = 0;

        if (count($product_arr) == 0) {
            unset($product_arr);
            unset($price_arr);
            unset($product_qty_arr);
            unset($price_detail_id_arr);

            //code by sandeep
            $this->getUser()->getAttributeHolder()->remove('final_vat');
            $this->getUser()->getAttributeHolder()->remove('final_total');
            $this->getUser()->getAttributeHolder()->remove('final_dicount');
            $this->getUser()->getAttributeHolder()->remove('final_discount_percentage');
            //code by sandeep end
            
            if ($product_id) {
                $product_arr[0] = $product_id;
                $price_arr[0] = $price_val;
                $product_qty_arr[0] = $product_qty ? $product_qty : 1;
                $price_detail_id_arr[0] = $price_detail_id;
            }
        } else {
            if ($product_id) {
                if (!in_array($product_id, $product_arr)) {
                    $product_arr[count($product_arr)] = $product_id;
                    $price_arr[count($price_arr)] = $price_val;
                    $product_qty_arr[count($product_qty_arr)] = $product_qty ? $product_qty : 1;
                    $price_detail_id_arr[count($price_detail_id_arr)] = $price_detail_id;
                }
            }
        }

        if ($qty_index) {
            $qty_index = str_replace('qty_', '', $qty_index);
            $product_qty_arr[$qty_index] = $qty;
        }

        if ($delete_index) {
            $delete_index = str_replace('delete_', '', $delete_index);
            unset($product_arr[$delete_index]);
            unset($price_arr[$delete_index]);
            unset($product_qty_arr[$delete_index]);
            unset($price_detail_id_arr[$delete_index]);

            $product_arr = array_values($product_arr);
            $price_arr = array_values($price_arr);
            $product_qty_arr = array_values($product_qty_arr);
            $price_detail_id_arr = array_values($price_detail_id_arr);
            
            
            //code by sandeep
            /*$this->getUser()->getAttributeHolder()->remove('final_vat');
            $this->getUser()->getAttributeHolder()->remove('final_total');
            $this->getUser()->getAttributeHolder()->remove('final_dicount');*/
            //code by sandeep end
        }

        if ($empty_cart) {
            unset($product_arr);
            unset($price_arr);
            unset($product_qty_arr);
            unset($price_detail_id_arr);
            $this->getUser()->setAttribute('loginRequired', false);
            $product_arr = array_values($product_arr);
            $price_arr = array_values($price_arr);
            $product_qty_arr = array_values($product_qty_arr);
            $price_detail_id_arr = array_values($price_detail_id_arr);
            $this->getUser()->getAttributeHolder()->remove('payment_user_info');
            
            //code by sandeep
            $this->getUser()->getAttributeHolder()->remove('final_vat');
            $this->getUser()->getAttributeHolder()->remove('final_total');
            $this->getUser()->getAttributeHolder()->remove('final_dicount');
            $this->getUser()->getAttributeHolder()->remove('final_discount_percentage');
            //code by sandeep end
        }

        $this->getUser()->setAttribute('product_arr', $product_arr);
        $this->getUser()->setAttribute('price_arr', $price_arr);
        $this->getUser()->setAttribute('product_qty_arr', $product_qty_arr);
        $this->getUser()->setAttribute('price_detail_id_arr', $price_detail_id_arr);

        $this->products_data = $btshop_article->getProductInOrder($product_arr);
        $this->price_arr = $price_arr;
        $this->product_qty_arr = $product_qty_arr;
        $this->price_detail_id_arr = $price_detail_id_arr;

        //For Shipping
        $paymentInfo = $this->getUser()->getAttribute('payment_user_info');
        $countries = new Countries();
        $total_weight = 0;
        $countryShipping = new CountryShipping();
        $total_weight = $btshop_article->getTotalProductWeight($product_arr, $product_qty_arr);
        //$this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, $this->region_code);
        $this->payment_user_info = $paymentInfo;
        $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, ($paymentInfo['user_country']? $countries->getOneRegionCode($paymentInfo['user_country']):$this->region_code));
        
        
        //code by sandeep
        $this->final_vat = $this->getUser()->getAttribute('final_vat');
        $this->final_totals = $this->getUser()->getAttribute('final_total');
        $this->final_dicount = $this->getUser()->getAttribute('final_dicount');
        $this->final_discount_percentage = $this->getUser()->getAttribute('final_discount_percentage');
        //var_dump($this->getUser()->getAttribute('final_vat').'=='.$this->final_vat);
        //var_dump($this->getUser()->getAttribute('final_total').'=='.$this->final_totals);
        //var_dump($this->getUser()->getAttribute('final_dicount').'=='.$this->final_dicount);
        //code by sandeep
    }

    /**
     * Executes GetCartData action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetCartDataCount(sfWebRequest $request) {
        $this->host_str = $this->getRequest()->getHost();
        $btshop_article = new BtShopArticle();
        $this->product_article = new BtShopArticle();

        $price_val = $request->getParameter('price');
        $product_id = $request->getParameter('product_id');
        $product_qty = $request->getParameter('product_qty');
        $price_detail_id = $request->getParameter('price_detail_id');
        $qty_index = $request->getParameter('qty_index');
        $qty = round($request->getParameter('qty'));
        $delete_index = $request->getParameter('delete_index');
        $empty_cart = $request->getParameter('empty_cart');

        $product_arr = $this->getUser()->getAttribute('product_arr');
        $price_arr = $this->getUser()->getAttribute('price_arr');
        $product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');
        $price_detail_id_arr = $this->getUser()->getAttribute('price_detail_id_arr');
		
		$this->metastock_data = $btshop_article->getPublishedShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getPublishedShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getPublishedShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getPublishedShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getPublishedShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getPublishedShopArticleOfType(6);
        $this->btcart_data = $btshop_article->getPublishedShopArticleOfType(7);
		$this->liveutbildningar_data = $btshop_article->getPublishedShopArticleOfType(10);

		$this->product_detail = $btshop_article->getPerticularShopArticle($product_id);
		
        $this->add_shipping_flag = 0;

        if (count($product_arr) == 0) {
            unset($product_arr);
            unset($price_arr);
            unset($product_qty_arr);
            unset($price_detail_id_arr);

            //code by sandeep
            $this->getUser()->getAttributeHolder()->remove('final_vat');
            $this->getUser()->getAttributeHolder()->remove('final_total');
            $this->getUser()->getAttributeHolder()->remove('final_dicount');
            $this->getUser()->getAttributeHolder()->remove('final_discount_percentage');
            //code by sandeep end
            
            if ($product_id) {
                $product_arr[0] = $product_id;
                $price_arr[0] = $price_val;
                $product_qty_arr[0] = $product_qty ? $product_qty : 1;
                $price_detail_id_arr[0] = $price_detail_id;
            }
        } else {
            if ($product_id) {
                if (!in_array($product_id, $product_arr)) {
                    $product_arr[count($product_arr)] = $product_id;
                    $price_arr[count($price_arr)] = $price_val;
                    $product_qty_arr[count($product_qty_arr)] = $product_qty ? $product_qty : 1;
                    $price_detail_id_arr[count($price_detail_id_arr)] = $price_detail_id;
                }
            }
        }

        if ($qty_index) {
            $qty_index = str_replace('qty_', '', $qty_index);
            $product_qty_arr[$qty_index] = $qty;
        }

        if ($delete_index) {
            $delete_index = str_replace('delete_', '', $delete_index);
            unset($product_arr[$delete_index]);
            unset($price_arr[$delete_index]);
            unset($product_qty_arr[$delete_index]);
            unset($price_detail_id_arr[$delete_index]);

            $product_arr = array_values($product_arr);
            $price_arr = array_values($price_arr);
            $product_qty_arr = array_values($product_qty_arr);
            $price_detail_id_arr = array_values($price_detail_id_arr);
            
            
            //code by sandeep
            /*$this->getUser()->getAttributeHolder()->remove('final_vat');
            $this->getUser()->getAttributeHolder()->remove('final_total');
            $this->getUser()->getAttributeHolder()->remove('final_dicount');*/
            //code by sandeep end
        }

        if ($empty_cart) {
            unset($product_arr);
            unset($price_arr);
            unset($product_qty_arr);
            unset($price_detail_id_arr);
            $this->getUser()->setAttribute('loginRequired', false);
            $product_arr = array_values($product_arr);
            $price_arr = array_values($price_arr);
            $product_qty_arr = array_values($product_qty_arr);
            $price_detail_id_arr = array_values($price_detail_id_arr);
            $this->getUser()->getAttributeHolder()->remove('payment_user_info');
            
            //code by sandeep
            $this->getUser()->getAttributeHolder()->remove('final_vat');
            $this->getUser()->getAttributeHolder()->remove('final_total');
            $this->getUser()->getAttributeHolder()->remove('final_dicount');
            $this->getUser()->getAttributeHolder()->remove('final_discount_percentage');
            //code by sandeep end
        }

        $this->getUser()->setAttribute('product_arr', $product_arr);
        $this->getUser()->setAttribute('price_arr', $price_arr);
        $this->getUser()->setAttribute('product_qty_arr', $product_qty_arr);
        $this->getUser()->setAttribute('price_detail_id_arr', $price_detail_id_arr);

        $this->products_data = $btshop_article->getProductInOrder($product_arr);
        $this->price_arr = $price_arr;
        $this->product_qty_arr = $product_qty_arr;
        $this->price_detail_id_arr = $price_detail_id_arr;

        //For Shipping
        $paymentInfo = $this->getUser()->getAttribute('payment_user_info');
        $countries = new Countries();
        $total_weight = 0;
        $countryShipping = new CountryShipping();
        $total_weight = $btshop_article->getTotalProductWeight($product_arr, $product_qty_arr);
        //$this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, $this->region_code);
        $this->payment_user_info = $paymentInfo;
        $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, ($paymentInfo['user_country']? $countries->getOneRegionCode($paymentInfo['user_country']):$this->region_code));
        
        
        //code by sandeep
        $this->final_vat = $this->getUser()->getAttribute('final_vat');
        $this->final_totals = $this->getUser()->getAttribute('final_total');
        $this->final_dicount = $this->getUser()->getAttribute('final_dicount');
        $this->final_discount_percentage = $this->getUser()->getAttribute('final_discount_percentage');
        //var_dump($this->getUser()->getAttribute('final_vat').'=='.$this->final_vat);
        //var_dump($this->getUser()->getAttribute('final_total').'=='.$this->final_totals);
        //var_dump($this->getUser()->getAttribute('final_dicount').'=='.$this->final_dicount);
        //code by sandeep

        //$json_product_id = json_encode($product_arr, true);
        setcookie('cart_items_cookie_pid', implode(',',$product_arr), time() + (31556926), "/"); // 86400 = 1 day // 31556926 = 1 year/365 days
        //$_COOKIE['cart_items_cookie_pid']=$json_product_id;
        
        //$json_product_price = json_encode($price_arr, true);
        setcookie('cart_items_cookie_price', implode(',',$price_arr), time() + (31556926), "/"); // 86400 = 1 day // 31556926 = 1 year/365 days
        //$_COOKIE['cart_items_cookie_price']=$json_product_price;
        
        //$json_product_qty = json_encode($product_qty_arr, true);
        setcookie('cart_items_cookie_qty', implode(',',$product_qty_arr), time() + (31556926), "/"); // 86400 = 1 day // 31556926 = 1 year/365 days
        //$_COOKIE['cart_items_cookie_qty']=$json_product_qty;
    }
    /**
     * Executes isLoginRequriedForProduct action
     *
     * @param product array
     * @return boolean 
     */

    public function isLoginRequriedForProduct($product_arr){
        $loginRequired = false;
        $this->getUser()->setAttribute('loginRequired', false);
        foreach ($product_arr as $product) {
            if ($product) {
                //Check if login is required for purchasing type of item
                
                $result = Doctrine_Query::create()
                            ->from('BtshopArticle bsa')
                            ->leftJoin('bsa.BtShopArticleType bsat')
                            ->where('bsa.id =?', $product)
                            ->fetchArray();                
                
                // $loginRequiredForProduct = Doctrine::getTable('BtshopArticle')->find($product)->getBtShopArticleType()->login_required;              
                if((($result[0]['btshop_type_id'] == 7 || $result[0]['btshop_type_id'] == 8 || $result[0]['btshop_type_id'] == 9) && $result[0]['BtShopArticleType']['login_required'] == 1 && !$this->getUser()->isAuthenticated()) || (($result[0]['id'] == 132 || $result[0]['id'] == 21 || $result[0]['id'] == 92) && $result[0]['btshop_type_id'] == 6 && $result[0]['BtShopArticleType']['login_required'] == 1 && !$this->getUser()->isAuthenticated())){
                //if ($loginRequiredForProduct && !$this->getUser()->isAuthenticated()) {
                    $loginRequired = true;
                    $this->getUser()->setAttribute('loginRequired', true);
                }
            }
        }
        return $loginRequired;
    }
    /**
     * Executes ShopCart action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopCart(sfWebRequest $request) {
        $this->saved_cart_items_pid = '';
        $this->saved_cart_items_price = '';
        $this->saved_cart_items_qty = '';
        
        $cookie_pid = $_COOKIE['cart_items_cookie_pid'];       
        if(count($cookie_pid) > 0){
            $this->saved_cart_items_pid = explode(',',$cookie_pid);//$cookie_pid;
            
            $cookie_price = $_COOKIE['cart_items_cookie_price'];
            $this->saved_cart_items_price = explode(',',$cookie_price);//json_decode($cookie_price, true);

            $cookie_qty = $_COOKIE['cart_items_cookie_qty'];
            $this->saved_cart_items_qty = explode(',',$cookie_qty);//json_decode($cookie_qty, true);
            
            $this->host_str = $this->getRequest()->getHost();
        }
        
        $btshop_article = new BtShopArticle();
        $btshop_article->checkAttribute();
        $this->metastock_data = $btshop_article->getPublishedShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getPublishedShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getPublishedShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getPublishedShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getPublishedShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getPublishedShopArticleOfType(6);
        $this->btcart_data = $btshop_article->getPublishedShopArticleOfType(7);
        $this->xmas_offer_data = $btshop_article->getPublishedShopArticleOfType(8);
		$this->liveutbildningar_data = $btshop_article->getPublishedShopArticleOfType(10);
        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem('Varukorg', 'borst/shopCart');        
    }
    /**
     * Executes CartPricing action
     *
     * @param sfRequest $request A request object
     */
    public function executeCartPricing(sfWebRequest $request) {
        $this->saved_cart_items_pid = '';
        $this->saved_cart_items_price = '';
        $this->saved_cart_items_qty = '';
        
        $cookie_pid = $_COOKIE['cart_items_cookie_pid'];       
        if(count($cookie_pid) > 0){
            $this->saved_cart_items_pid = explode(',',$cookie_pid);//$cookie_pid;
            
            $cookie_price = $_COOKIE['cart_items_cookie_price'];
            $this->saved_cart_items_price = explode(',',$cookie_price);//json_decode($cookie_price, true);

            $cookie_qty = $_COOKIE['cart_items_cookie_qty'];
            $this->saved_cart_items_qty = explode(',',$cookie_qty);//json_decode($cookie_qty, true);
            
            $this->host_str = $this->getRequest()->getHost();
        }
    }
    /**
     * Executes ShopPayment action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopPayment(sfWebRequest $request) {
        // echo($_COOKIE['cart_items_cookie_qty']);
        // exit;
        if ($this->getUser()->isAuthenticated()) {
            $this->getUser()->setAttribute('loginRequired', false);
        }
        //var_dump($this->logged_user_email);
        $paymentInfo = $this->getUser()->getAttribute('payment_user_info');
        $this->loginRequiredForProduct = false;

        $btshop_article = new BtShopArticle();
        $this->product_article = new BtShopArticle();
        $countries = new Countries();
        $this->contry_arr = array('1' => 'SE', '2' => 'NO', '3' => 'FI', '4' => 'DK', '5' => 'OTHER');

        $cookie_pid = $_COOKIE['cart_items_cookie_pid'];       
        if(count($cookie_pid) > 0){
            $this->saved_cart_items_pid = explode(',',$cookie_pid);
            
            $cookie_price = $_COOKIE['cart_items_cookie_price'];
            $this->saved_cart_items_price = explode(',',$cookie_price);

            $cookie_qty = $_COOKIE['cart_items_cookie_qty'];
            $this->saved_cart_items_qty = explode(',',$cookie_qty);
            
            $product_arr = $this->saved_cart_items_pid;
            $price_arr = $this->saved_cart_items_price;
            $product_qty_arr = $this->saved_cart_items_qty;
        }else{
            $product_arr = $this->getUser()->getAttribute('product_arr');
            $price_arr = $this->getUser()->getAttribute('price_arr');
            $product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');   
        }
        
        $btShopArticle = new BtShopArticle();
        $cart_products_arr = $btShopArticle->getShopArticleOfType(7);
        $cart_products = array();
        foreach ($cart_products_arr as $product) {
            $cart_products[] = $product->id;
        }

        $this->cart_in_cart = 0;  // for unregistred user
        foreach ($product_arr as $product) {
            if (in_array($product, $cart_products))
                $this->cart_in_cart = 1;
        }

        $product_id = $request->getParameter('product_id');
        $this->add_shipping_flag = 0;

        $this->payment_user_info = $this->getUser()->getAttribute('payment_user_info');
        
        $this->loginRequiredForProduct = $this->isLoginRequriedForProduct($product_arr);
        if ($product_id > 0) {
            //Check if login is required for purchasing type of item
           // $loginRequiredForProduct = Doctrine::getTable('BtshopArticle')->find($product_id)->getBtShopArticleType()->login_required;
            $product_detail = Doctrine::getTable('BtshopArticle')->find($product_id);
            $this->product_detail = Doctrine::getTable('BtshopArticle')->find($product_id);
		   
            if( ($product_detail->published && $product_detail->is_sellable)  || ($this->getUser()->isAuthenticated() && $this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty'))){
            if (count($product_arr) == 0) {
                unset($product_arr);
                unset($price_arr);
                unset($product_qty_arr);
                unset($product_img_arr);
                // delete cookie value
                //setcookie("cart_items_cookie", "", time()-3600);
                
                $price_val = $btshop_article->getLeastPriceOfProduct($product_id);
                $product_arr[0] = $product_id;
                $price_arr[0] = $price_val;
                $product_qty_arr[0] = $product_qty ? $product_qty : 1;
            } else {
                if ($product_id > 0) {
                    if (!in_array($product_id, $product_arr)) {
                        $product_arr[count($product_arr)] = $product_id;
                        $price_val = $btshop_article->getLeastPriceOfProduct($product_id);
                        $price_arr[count($price_arr)] = $price_val;
                        $product_qty_arr[count($product_qty_arr)] = $product_qty ? $product_qty : 1;
                    }
                }
            }
            }
			
            $this->getUser()->setAttribute('product_arr', $product_arr);
            $this->getUser()->setAttribute('price_arr', $price_arr);
            $this->getUser()->setAttribute('product_qty_arr', $product_qty_arr);
			$this->getUser()->setAttribute('product_img_arr', $product_img_arr);
        }

        $this->products_data = $btshop_article->getProductInOrder($product_arr);
        $this->price_arr = $price_arr;
        $this->product_qty_arr = $product_qty_arr;

        $user_profile = new SfGuardUserProfile();
        $this->userData = $this->getUser()->getAttribute('username', '', 'userProperty') ? $user_profile->fetch_user_profile($this->getUser()->getAttribute('username', '', 'userProperty')) : '';

        $this->all_country_data = $countries->getAllCountries();

        // foreach($this->all_country_data as $data):
        // echo("<pre>");        	
        // print_r ($data->country_name );
        // endforeach;
        // die;

        //For Shipping

        $countryShipping = new CountryShipping();
        $total_weight = $btshop_article->getTotalProductWeight($product_arr, $product_qty_arr);

        $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, ($paymentInfo['user_country']? $countries->getOneRegionCode($paymentInfo['user_country']):$this->region_code));
        
        //code by sandeep
        $this->metastock_data = $btshop_article->getPublishedShopArticleOfType(1);
        $this->falcon_computer_data = $btshop_article->getPublishedShopArticleOfType(2);
        $this->bocker_data = $btshop_article->getPublishedShopArticleOfType(3);
        $this->utbildningar_data = $btshop_article->getPublishedShopArticleOfType(4);
        $this->marknadsbrev_data = $btshop_article->getPublishedShopArticleOfType(5);
        $this->abonnemang_data = $btshop_article->getPublishedShopArticleOfType(6);
        $this->btcart_data = $btshop_article->getPublishedShopArticleOfType(7);
        // xmas offer
        $this->xmas_offer_data = $btshop_article->getPublishedShopArticleOfType(8);
        $this->liveutbildningar_data = $btshop_article->getPublishedShopArticleOfType(10);
        
        $this->final_vat = $this->getUser()->getAttribute('final_vat');
        $this->final_totals = $this->getUser()->getAttribute('final_total');
        $this->final_dicount = $this->getUser()->getAttribute('final_dicount');
        $this->final_discount_percentage = $this->getUser()->getAttribute('final_discount_percentage');
        $this->getUser()->setAttribute('total_amount', '');
        //code by sandeep
        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem('Betalning', 'borst_shop/shopPayment');
        isicsBreadcrumbs::getInstance()->addItem('Granska och skicka', 'borst_shop/borstShopHome');
        
        $comma_separated_id = implode(",", $product_arr);
        $user_email = $this->logged_user_email;
        $this->coupon_code_count ='';
        if($comma_separated_id){
        $query_str = "SELECT cd.id as cd_id, cd.user_id as cd_user_id, cd.product_id as cd_product_id,
            cd.couponcode_id as cd_couponcode_id, cd.email as cd_email, cd.status as cd_status, 
            cd.IS_INACTIVE as cd_IS_INACTIVE, cd.CREATED_AT as cd_CREATED_AT, cd.UPDATED_AT as cd_UPDATED_AT, 
            c.id as c_id, c.code as c_code, c.code_desc as c_code_desc, c.coupon_code as c_coupon_code,
            c.status as c_status, c.CREATED_AT as c_CREATED_AT, c.UPDATED_AT as c_UPDATED_AT 
            FROM coupon_details cd 
            LEFT JOIN coupon c ON c.id=cd.couponcode_id 
            WHERE if( cd.email = '', '', cd.email ) = if( cd.email = '', '', '$user_email' ) AND cd.product_id IN ($comma_separated_id) AND cd.status = 'Pending' AND cd.IS_INACTIVE = 0 AND c.status = 0 ORDER BY cd.CREATED_AT DESC ";

            $q = Doctrine_Manager::getInstance()->getCurrentConnection();
            $stmt = $q->prepare($query_str);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->coupon_code_count = count($results);
        }
            
    }
    
    public function executeGetCouponData(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            $this->getUser()->setAttribute('loginRequired', false);
        }
        //var_dump($this->logged_user_email);
        $paymentInfo = $this->getUser()->getAttribute('payment_user_info');
        $this->loginRequiredForProduct = false;
        $btshop_article = new BtShopArticle();
        $countries = new Countries();
        
        $product_arr = $this->getUser()->getAttribute('product_arr');
        $price_arr = $this->getUser()->getAttribute('price_arr');
        $product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');
        $this->products_data = $btshop_article->getProductInOrder($product_arr);
        $comma_separated_id = implode(",", $product_arr);
        $this->price_arr = $price_arr;
        $this->product_qty_arr = $product_qty_arr;
        $user_email = $this->logged_user_email;
        
        $user_profile = new SfGuardUserProfile();
        $this->userData = $this->getUser()->getAttribute('username', '', 'userProperty') ? $user_profile->fetch_user_profile($this->getUser()->getAttribute('username', '', 'userProperty')) : '';
        $this->all_country_data = $countries->getAllCountries();
        //For Shipping
        $countryShipping = new CountryShipping();
        $total_weight = $btshop_article->getTotalProductWeight($product_arr, $product_qty_arr);
        $this->add_shipping_flag = 0;
        $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, ($paymentInfo['user_country']? $countries->getOneRegionCode($paymentInfo['user_country']):$this->region_code));
        
        
        $coupon_code = $request->getParameter('ccd');
        $total_amount = $request->getParameter('tamt');
        $query_str = "SELECT cd.id as cd_id, cd.user_id as cd_user_id, cd.product_id as cd_product_id,
            cd.couponcode_id as cd_couponcode_id, cd.email as cd_email, cd.status as cd_status, 
            cd.IS_INACTIVE as cd_IS_INACTIVE, cd.CREATED_AT as cd_CREATED_AT, cd.UPDATED_AT as cd_UPDATED_AT, 
            c.id as c_id, c.code as c_code, c.code_desc as c_code_desc, c.coupon_code as c_coupon_code,
            c.status as c_status, c.CREATED_AT as c_CREATED_AT, c.UPDATED_AT as c_UPDATED_AT 
            FROM coupon_details cd 
            LEFT JOIN coupon c ON c.id=cd.couponcode_id 
            WHERE if( cd.email = '', '', cd.email ) = if( cd.email = '', '', '$user_email' ) AND cd.product_id IN ($comma_separated_id) AND c.coupon_code = '$coupon_code' AND cd.status = 'Inprocess' AND cd.IS_INACTIVE = 0 AND c.status = 0 ORDER BY cd.CREATED_AT DESC ";

            $q = Doctrine_Manager::getInstance()->getCurrentConnection();
            $stmt = $q->prepare($query_str);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($results)>0){//if code is already used status is Inprocess          
                
                if($coupon_code!=''){
                    $this->errorMsg = "Coupon code you entered is expired";
                    $this->errorClass = "shop_error";
                }else{
                    $this->errorMsg = "Coupon code you entered is invalid";
                    $this->errorClass = "shop_error";
                }
                $this->final_vat = $this->getUser()->getAttribute('final_vat');
                $this->final_totals = $this->getUser()->getAttribute('final_total');
                $this->final_dicount = $this->getUser()->getAttribute('final_dicount');
                $this->final_discount_percentage = $this->getUser()->getAttribute('final_discount_percentage');
            }
            else {//if code is not yet used status is Pending
                $query_str = "SELECT cd.id as cd_id, cd.user_id as cd_user_id, cd.product_id as cd_product_id,
                cd.couponcode_id as cd_couponcode_id, cd.email as cd_email, cd.status as cd_status, 
                cd.IS_INACTIVE as cd_IS_INACTIVE, cd.CREATED_AT as cd_CREATED_AT, cd.UPDATED_AT as cd_UPDATED_AT, 
                c.id as c_id, c.code as c_code, c.code_desc as c_code_desc, c.coupon_code as c_coupon_code,
                c.status as c_status, c.CREATED_AT as c_CREATED_AT, c.UPDATED_AT as c_UPDATED_AT 
                FROM coupon_details cd 
                LEFT JOIN coupon c ON c.id=cd.couponcode_id 
                WHERE if( cd.email = '', '', cd.email ) = if( cd.email = '', '', '$user_email' ) AND cd.product_id IN ($comma_separated_id) AND c.coupon_code = '$coupon_code' AND cd.status = 'Pending' AND cd.IS_INACTIVE = 0 AND c.status = 0 ORDER BY cd.CREATED_AT DESC ";

                $q = Doctrine_Manager::getInstance()->getCurrentConnection();
                $stmt = $q->prepare($query_str);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($results)>0){
                    foreach($results as $coupon_data){
                        if(in_array($coupon_data['cd_product_id'], $product_arr)){
                            $key = array_search($coupon_data['cd_product_id'], $product_arr);
                                $prod_type = $this->products_data[$key]['p_type'];
                                if ($this->add_shipping_flag == 0 && $prod_type < 5) {
                                    $this->add_shipping_flag = 1;
                                }
                                $shipping = $this->add_shipping_flag == 1 ? $this->total_shipping_cost : 00.00;
                                $total_wth_shipping = $price_arr[$key] + $shipping;

                            $prod_price = (($price_arr[$key] * $coupon_data['c_code']) / 100);
                            $totoal_discount += $prod_price;
                            $discount_percentage += $coupon_data['c_code'];
                        }else{
                            echo "prod id not exist";
                        }
                        $this->errorMsg = "";//"Coupon code applied successfully";
                        $this->errorClass = "";//shop_success";
                        $purchase = new CouponDetails();
                        $purchase->user_id = 0;
                        $purchase->product_id = $coupon_data['cd_product_id'] ? $coupon_data['cd_product_id'] : 0;
                        $purchase->couponcode_id = $coupon_data['cd_couponcode_id'];
                        $purchase->email = $user_email;
                        $purchase->status = 'Inprocess';
                        $purchase->is_inactive = 0;
                        $purchase->created_at = date('Y-m-d H:i:s');
                        $purchase->updated_at = date('Y-m-d H:i:s');
                        $purchase->save();                 
                    }
                    if($this->getUser()->getAttribute('final_dicount')){
                        $final_discount = $totoal_discount + $this->getUser()->getAttribute('final_dicount');
                        $final_discount_percentage = $discount_percentage + $this->getUser()->getAttribute('final_discount_percentage');
                    }else{
                        $final_discount = $totoal_discount;
                        $final_discount_percentage = $discount_percentage;
                    }
                    $final_amount = $total_amount - $final_discount;
                    $final_vat = (($final_amount * 20) / 100 );
                    $this->getUser()->setAttribute('final_vat', $final_vat);
                    $this->getUser()->setAttribute('final_total', $final_amount);
                    $this->getUser()->setAttribute('final_dicount', $final_discount);
                    $this->getUser()->setAttribute('final_discount_percentage', $final_discount_percentage);
                    
                    $this->final_vat = $final_vat;
                    $this->final_totals = $final_amount;
                    $this->final_dicount = $final_discount;
                    $this->final_discount_percentage = $final_discount_percentage;
                }else{
                    $this->errorMsg = "Coupon code you entered is invalid";
                    $this->errorClass = "shop_error";
                    $this->final_vat = $this->getUser()->getAttribute('final_vat');
                    $this->final_totals = $this->getUser()->getAttribute('final_total');
                    $this->final_dicount = $this->getUser()->getAttribute('final_dicount');
                    $this->final_discount_percentage = $this->getUser()->getAttribute('final_discount_percentage');
                }
            }
    }
    /**
     * Executes ShopPaymentType action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopPaymentType(sfWebRequest $request) {
        if ($this->getUser()->getAttribute('loginRequired', false) && !$this->getUser()->isAuthenticated()) {

            $this->redirect('/borst_shop/shopPayment');
        }

        $this->host_str = $this->getRequest()->getHost();
        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $this->getUser()->setAttribute('payment_user_info', $arr);
        }

        // For Shopping Cart
        $btshop_article = new BtShopArticle();
        $this->product_article = new BtShopArticle();

        $product_arr = $this->getUser()->getAttribute('product_arr');
        
        $this->products_data = $btshop_article->getProductInOrder($product_arr);
        $this->price_arr = $this->getUser()->getAttribute('price_arr');
        $this->product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');
        $this->price_detail_id_arr = $this->getUser()->getAttribute('price_detail_id_arr');
        $this->add_shipping_flag = 0;
        $this->loginRequiredForProduct = $this->isLoginRequriedForProduct($product_arr);

        $purchase = new Purchase();
        $id = $purchase->addPaymentEntry($arr);
        $this->getUser()->setAttribute('purchase_id_temp', $id);
        $this->purchase_id = $id;
        

        
        //For Shipping
        $countries = new Countries();
        $total_weight = 0;
        // Added condition for country code for new users as it is changed from from region
        $region_code = $arr['user_country'] ? (!is_numeric($arr['user_country']) ? $countries->getOneRegionCode($arr['user_country']) : $arr['user_country']) : $this->region_code;
        $countryShipping = new CountryShipping();
        $total_weight = $btshop_article->getTotalProductWeight($product_arr, $this->product_qty_arr);
        if ($total_weight > 0)
            $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, $region_code);
        else
            $this->total_shipping_cost = 0;
            // echo ($this->product_qty_arr[0] * $this->price_arr[0]); exit;
        $i = 0;
        foreach ($this->products_data as $data) {
            $mul = $this->product_qty_arr[$i] * $this->price_arr[$i];
            $total = $total + ($this->product_qty_arr[$i] * $this->price_arr[$i]);
            $i++;
            
        }
        
        //$total_wth_shipping = $total + $this->total_shipping_cost;//original code

        //code by sandeep
        $this->final_vat = $this->getUser()->getAttribute('final_vat');
        $this->final_totals = $this->getUser()->getAttribute('final_total');
        $this->final_dicount = $this->getUser()->getAttribute('final_dicount');
        $this->final_discount_percentage = $this->getUser()->getAttribute('final_discount_percentage');
        //var_dump($this->getUser()->getAttribute('final_vat').'=='.$this->final_vat);
        //var_dump($this->getUser()->getAttribute('final_total').'=='.$this->final_totals);
        //var_dump($this->getUser()->getAttribute('final_dicount').'=='.$this->final_dicount);
        //$total_wth_shipping = floatval(str_replace(',','',$this->final_totals));//code change by sandeep
        //code by sandeep end
        
        if($this->final_totals!=''){
            $total_wth_shipping = $total + $this->total_shipping_cost;
            $total_wth_shipping = ($total_wth_shipping - $this->final_dicount);
        }else{
            $total_wth_shipping = $total + $this->total_shipping_cost;//original code
        }
        $this->total_wth_shipping = $total_wth_shipping * 100;//number_format($total_wth_shipping, 2, '.', '');
        // $Email = urlencode($arr['user_email']);
        // $FirstName = urlencode($arr['user_firstname']);
        //     $LastName = urlencode($arr['user_lastname']);
        //     $Address = urlencode($arr['user_street']);
        //     $ZipCode = urlencode($arr['user_zipcode']);
        //     $City = urlencode($arr['user_city']);
        //     $Country = urlencode($arr['user_country']);
        //$purchase = new Purchase();
        //$purchasedItem = new PurchasedItem();
        if (count($product_arr) > 0) {//echo "<pre>";  print_r($arr); die;
           // $id = $purchase->addPaymentEntry($arr);
            //$purchasedItem->savePurchasedItemList($id, $arr, $product_arr, $price_arr, $product_qty_arr, $price_detail_id_arr, 0);
            //$this->saveInvoicePdf($id,0,0);
            //$item_list = $purchasedItem->fecthPurchasedItemList($id);
            $result_data = "";
            $result_data = $this->getUser()->getAttribute('payment_user_info')['user_email'] . "<br>" . $this->getUser()->getAttribute('payment_user_info')['user_firstname'] . 
                    $this->getUser()->getAttribute('payment_user_info')['user_lastname'] . "<br>" . $this->getUser()->getAttribute('payment_user_info')['user_street'] . "<br>";
            $j = 0;
			//echo "<pre>";  print_r($btshop_article->getProductName(116)); die;
            foreach ($product_arr as $data) {
                $article_name = $btshop_article->getProductName($data);
                $result_data = $result_data . str_replace("+","",($article_name[0]['title'])) . ":" . $this->product_qty_arr[$j] . ":" . $this->price_arr[$j] . "<br>";
                // echo(urlencode($article_name[0]['title']));
                // echo($this->price_arr[$j]);
                // echo($this->product_qty_arr[$j]);
                // // echo($price_per_unit);
                // echo "<br>";
                $j++;
            }

        }
        //  echo($result_data);
        // echo ($this->getUser()->getAttribute('payment_user_info')['user_email']);
        // echo "<br>";
        // echo ($this->getUser()->getAttribute('payment_user_info')['user_firstname']);
        // echo ($this->getUser()->getAttribute('payment_user_info')['user_lastname']);
        // echo "<br>";
        // echo ($this->getUser()->getAttribute('payment_user_info')['user_street']);
        //  exit;
        $this->user_infomation = $result_data;
        if ($request->isMethod('post')) {
           $payment_user_info = $this->getUser()->getAttribute('payment_user_info');
           $payment_user_info['shipping'] = $this->total_shipping_cost;
           $payment_user_info['total_price'] = $total_wth_shipping ;
           $payment_user_info['vat'] = ($total_wth_shipping *.057);
           $this->getUser()->setAttribute('payment_user_info', $payment_user_info);
        }
        //var_dump($this->getUser()->getAttribute('payment_user_info'));
        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem('Betalning', 'borst_shop/shopPayment');
        isicsBreadcrumbs::getInstance()->addItem('Välj betalsätt', 'borst_shop/borstShopHome');
    }

    /**
     * Executes ShopPaymentType action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetShippingCostPerCounty(sfWebRequest $request) {
        $product_arr = $this->getUser()->getAttribute('product_arr');
        $this->product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');

        $btshop_article = new BtShopArticle();
        //For Shipping
        $countries = new Countries();
        $total_weight = 0;
        $region_code = $request->getParameter('county_code') ? $countries->getOneRegionCode($request->getParameter('county_code')) : 0;
        $countryShipping = new CountryShipping();
        $total_weight = $btshop_article->getTotalProductWeight($product_arr, $this->product_qty_arr);

        if ($total_weight > 0)
            $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, $region_code);
        else
            $this->total_shipping_cost = 0;


        $this->products_data = $this->getUser()->getAttribute('product_qty_arr');
        $this->price_arr = $this->getUser()->getAttribute('price_arr');

        $i = 0;
        $total = 0;
        foreach ($this->products_data as $data) {
            $mul = $this->product_qty_arr[$i] * $this->price_arr[$i];
            $total = $total + ($this->product_qty_arr[$i] * $this->price_arr[$i]);
            $i++;
        }


        $cart['total_price'] = number_format($total+$this->total_shipping_cost,2);
        $cart['shipping'] = number_format($this->total_shipping_cost,2);
        $cart['vat'] = number_format((($total+$this->total_shipping_cost)*.057),2);

        if ( ($paymentInfo = $this->getUser()->getAttribute('payment_user_info')))
        {
            $paymentInfo['user_country'] = $request->getParameter('county_code') ;
        }else
        {
            $paymentInfo['user_country'] = $request->getParameter('county_code') ;
        }
        
        $this->getUser()->setAttribute('payment_user_info', $paymentInfo);

        return $this->renderText(json_encode($cart));
        //return $this->renderText(number_format($this->total_shipping_cost, 2));
    }

    /**
     * Executes SwishApi action
     *
     * @param sfRequest $request A request object
     */
    public function executeSwishApi(sfWebRequest $request) {
        //echo "hello";
        //var_dump($this->getUser()->getAttribute('payment_user_info'));
        $config = array(
            "callbackUrl"     => "https://www.borstjanaren.se/borst_shop/shopPaymentDone",
            "payeeAlias"      => "1233144318", //Swish number of the merchant
            "currency"        => "SEK", //currency code	
            "CAINFO"          => '/etc/pki/ca-trust/extracted/openssl/ca-bundle.trust.crt', //Path to root CA
            "SSLCERT"         => '/var/www/vhosts/thetradingaspirants.com/httpdocs/swish/swish_cert.pem', //Path to client certificate
            "SSLKEY"          => '/var/www/vhosts/thetradingaspirants.com/httpdocs/swish/swish.key', //Path to private key*/
            "SSLCERTTYPE"     => 'PEM'
        );
        $userData = $this->getUser()->getAttribute('payment_user_info');
        //var_dump($userData['total_price']);
        $amount = $userData['total_price'];
        $paymentReference = substr(number_format(time() * rand(),0,'',''),0,8);
        $payerAlias = $request->getParameter('phone');
        $message = 'Tack för din betalning!';
        $paymentId = $request->getParameter('transactionId');
        if($payerAlias){//echo "3==>";
                //echo createPayment($_GET["orderId"], $_GET["phone"], $_GET["samt"], $_GET["msg"], $config);
                //createPayment($paymentReference, $payerAlias, $amount, $message, $config)
                try {
					if ($payerAlias != "") {//echo "1==>";
                        $data = array("payeePaymentReference" => $paymentReference, //'234567892'
                            "callbackUrl" => $config["callbackUrl"],
                            "payerAlias" => $payerAlias, //46739866319
                            "payeeAlias" => $config["payeeAlias"], //'1233144318'
                            "amount" => $amount, //'1'
                            "currency" => $config["currency"], //'SEK'
                            "message" => $message, //'Tack för din betalning!'
                            "sessiontest" => "session123");
                    } else {//echo "2==>";
                        $data = array("payeePaymentReference" => $paymentReference,
                            "callbackUrl" => $config["callbackUrl"],
                            "payeeAlias" => $config["payeeAlias"],
                            "amount" => $amount,
                            "currency" => $config["currency"],
                            "message" => $message);
                    }

                    $data_string = json_encode($data);

                    //$ch = curl_init('https://mss.swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests/'); 
                    //$ch = curl_init('https://swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests/');
                    $ch = curl_init('https://cpc.getswish.net/swish-cpcapi/api/v1/paymentrequests/');

                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                    ////curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Uncomment this if you didn't add the root CA, curl will then ignore the SSL verification error.
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));

                    curl_setopt($ch, CURLOPT_CAINFO, $config["CAINFO"]);
                    curl_setopt($ch, CURLOPT_SSLCERT, $config["SSLCERT"]);
                    curl_setopt($ch, CURLOPT_SSLKEY, $config["SSLKEY"]);
                    curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $config["SSLCERTPASSWD"]);
                    curl_setopt($ch, CURLOPT_SSLKEYPASSWD, $config["SSLKEYPASSWD"]);

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_VERBOSE, 1);
                    curl_setopt($ch, CURLOPT_HEADER, 1);
                    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//////
					curl_setopt($ch, CURLOPT_VERBOSE, 0);////
                                        curl_setopt($ch, CURLOPT_SSLVERSION, 4);////
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);////
					

                    $result = curl_exec($ch);

                    if (FALSE === $result)
                        throw new Exception(curl_error($ch), curl_errno($ch));

                    $headers = explode("\r\n", $result);
                    $headerArr = array();
                    foreach ($headers as $headerline) {
                        $lineArr = explode(": ", $headerline, 2);
                        $val = null;
                        if (sizeof($lineArr) > 1) {
                            $val = $lineArr[1];
                        }
                        $headerArr[$lineArr[0]] = $val;
                    }

                    if (array_key_exists("Location", $headerArr)) {
                        $locationURL = $headerArr["Location"];
                        $transactionId = explode("/", $locationURL)[sizeOf(explode("/", $locationURL)) - 1];
                    } else {
                        //Error: no location header present in response
                        header('Content-Type: application/json');
                        //return $headers[sizeof($headers) - 1];
                        //return $this->renderText('{"errorCode":"' . $headers[sizeof($headers) - 1] . '"}');
                        return $this->renderText($headers[sizeof($headers) - 1]);
                    }

                    // Store transactionId in the current order
                    header('Content-Type: application/json');
                    //return '{"transactionId":"' . $transactionId . '","transactionURL":"' . $locationURL . '"}';
                    return $this->renderText('{"transactionId":"' . $transactionId . '","transactionURL":"' . $locationURL . '"}');
                    
            } catch (Exception $e) {
                //$errVar = trigger_error(sprintf('Curl failed with error #%d: %s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
                //return '{"errorMessage":"' . $e->getMessage() . '"}';
                return $this->renderText('{"errorCode":"' . $e->getMessage() . '"}');
            }
            curl_close($ch);
        }else{
                if($paymentId){//echo "4==>";
                        //echo getPayment($_GET["transactionId"], $config);  
                    try {

                        if ($paymentId != "") {

                            //$ch = curl_init('https://mss.swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests/' . $paymentId); 
                            //$ch = curl_init('https://swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests/' . $paymentId);
                            $ch = curl_init('https://cpc.getswish.net/swish-cpcapi/api/v1/paymentrequests/'. $paymentId);

                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                            //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Uncomment this if you didn't add the root CA, curl will then ignore the SSL verification error.

                            curl_setopt($ch, CURLOPT_CAINFO, $config["CAINFO"]);
                            curl_setopt($ch, CURLOPT_SSLCERT, $config["SSLCERT"]);
                            curl_setopt($ch, CURLOPT_SSLKEY, $config["SSLKEY"]);
                            curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $config["SSLCERTPASSWD"]);
                            curl_setopt($ch, CURLOPT_SSLKEYPASSWD, $config["SSLKEYPASSWD"]);

                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_VERBOSE, 1);
                            curl_setopt($ch, CURLOPT_HEADER, 0);
							
							curl_setopt($ch, CURLOPT_VERBOSE, 0);////
							curl_setopt($ch, CURLOPT_SSLVERSION, 4);////
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);////

                            $result = curl_exec($ch);
                        } else {
                            //echo "No payment ID specified";
                            //return '{"errorMessage":"Api Error"}';
                            return $this->renderText('{"errorCode":"Api Error"}');
                        }

                        if (FALSE === $result)
                            throw new Exception(curl_error($ch), curl_errno($ch));

                        echo $result;
                    } catch (Exception $e) {

                        //trigger_error(sprintf('Curl failed with error #%d: %s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
                        //return '{"errorMessage":"' . $e->getMessage() . '"}';
                        return $this->renderText('{"errorCode":"' . $e->getMessage() . '"}');
                    }
                curl_close($ch);
            }else{//echo "9==>";
                    //echo '{"error":"Parameter missing"}';
                    return $this->renderText('{"errorCode":"Parameter missing"}');
            }
        }
        //return $this->renderText('');
    }
    /**
     * Executes ShopPaymentType action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopPaymentDone(sfWebRequest $request) {
		//echo "<pre>";  print_r($request); die;
        $past = time() - 3600;
        setcookie( 'cart_items_cookie_pid', '', $past, '/' );
        setcookie( 'cart_items_cookie_price', '', $past, '/' );
        setcookie( 'cart_items_cookie_qty', '', $past, '/' );
        $purchase = new Purchase();
        $purchasedItem = new PurchasedItem();
        $btshop_article = new BtShopArticle();
        $arr = $this->getUser()->getAttribute('payment_user_info');
        $this->product_article = new BtShopArticle();
        $product_arr = $this->getUser()->getAttribute('product_arr');
        //print_r($product_arr);die;
        $price_arr = $this->getUser()->getAttribute('price_arr');
        $product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');
        $price_detail_id_arr = $this->getUser()->getAttribute('price_detail_id_arr');
        //var_dump($price_detail_id_arr);die;
        $payment_mtd = array('1' =>'Prepayment (via the plus-or bank transfer)', '2' => 'Direct Payment (bank)', '3' =>  'Online Payment', '4' =>  'Online Payment','5'=>'Swish');
        $this->loginRequiredForProduct = $this->isLoginRequriedForProduct($product_arr);
		
        if(!$this->loginRequiredForProduct){


        if (count($product_arr) > 0) {//echo "<pre>";  print_r($arr); die;purchase_id_temp
            $id = $this->getUser()->getAttribute('purchase_id_temp');
            $this->getUser()->getAttributeHolder()->remove('purchase_id_temp');

            $purchasedItem->savePurchasedItemList($id, $arr, $product_arr, $price_arr, $product_qty_arr, $price_detail_id_arr, 0);
            $this->email = $arr['user_email'];
            $this->getUser()->setAttribute('payment_id', $id);
            //$this->saveInvoicePdf($id,0,0);
            $item_list = $purchasedItem->fecthPurchasedItemList($id);
            $for_price = $purchase->getPurchaseOrder($id);

            $i = 0;
            $item_detail_str = '';
            $find_arr = array(' ', '.');
            foreach ($item_list as $data) {
                $price_per_unit = number_format($data['price_per_unit'], 2, '.', '');//original code
                //$price_per_unit = number_format($data['total_price'], 2, '.', '');//code change by sandeep
                $article_name = $btshop_article->getProductName($data['product_id']);
                if ($i == 0)
                    $item_detail_str = $data['product_id'] . ':' . urlencode($article_name[0]['title']) . ':' . $data['quantity'] . ':' . $price_per_unit;
                else
                    $item_detail_str = $item_detail_str . ',' . $data['product_id'] . ':' . urlencode($article_name[0]['title']) . ':' . $data['quantity'] . ':' . $price_per_unit;

                $i++;
            }
			//echo "<pre>";  print_r($request->getParameter('paymenttype')); die;
            $transaction_type = $request->getParameter('paymenttype') ? $request->getParameter('paymenttype') : 1;
            if($request->getParameter('typ')){
                $transaction_type = 5;
            }
            $this->transaction_type = $transaction_type;
            $bank_id = $request->getParameter('bk');

            $purchase_record = $purchase->getPurchaseOrder($id);
           
            $order_no =$purchase_record->id;
            $purchase_record->payment_method = $payment_mtd[$transaction_type];
			$purchase_record->payment_date =  $request->getParameter('date');
			if($transaction_type == 3 || $transaction_type == 4){
                $purchase_record->checkout_status = 1;
				$purchase_record->order_processed = 1;
            }
            if($request->getParameter('typ') == 4){
                $purchase_record->checkout_status = 1;
                $purchase_record->order_processed = 1;
                $purchase_record->payment_date = date("Y-m-d");
            }
            $purchase_record->save();

            $host_str = $this->getRequest()->getHost();
            $url = 'https://'. $host_str.'/backend.php/borst/viewPurchaseDetail/id/'.$order_no;
          
            $mailBody = $this->getPartial('processed_order_mail1', array('order_no' => $order_no,'url'=>$url));
            $to = array(sfConfig::get('app_mail_to_1'));
            $from = sfConfig::get('app_mail_shop_email_1');
            $message = $this->getMailer()->compose();
            $message->setSubject('New Transaction');
            $message->setTo($to);
            $message->setFrom($from);
            $message->setBody($mailBody, 'text/html');
            $this->getMailer()->send($message);
        }


        //echo $item_detail_str; die;
        if (($transaction_type == 2) && (count($product_arr) > 0)) {
            $this->saveInvoicePdf($id,1,0);
            /* Payment process. */
            $TellusPayID = "58318125";
            $OrderNo = $id;
            $Data = $item_detail_str;
            $ExtraData = "#PHPSessionID=" . session_id() . ($arr['user_id'] != "" ? "#CustomerID=" . $arr['user_id'] : "");


            $ExtraData = base64_encode($ExtraData);


            if ($transaction_type == 1)
                $type = 1;
            else if ($transaction_type == 2)
                $type = '3,' . $bank_id;

            $TransactionType = $type;
            $ISOLanguage = "SE";
            $ISOCurrency = "752";
            $DirectCapture = "1";

            $Email = urlencode($arr['user_email']);
            $FirstName = urlencode($arr['user_firstname']);
            $LastName = urlencode($arr['user_lastname']);
            $Address = urlencode($arr['user_street']);
            $ZipCode = urlencode($arr['user_zipcode']);
            $City = urlencode($arr['user_city']);
            $Country = urlencode($arr['user_country']);
            // Buyers personalnumber / Customer number
            $ID = "5214124444";
            $IP = $_SERVER['REMOTE_ADDR'];
            $Shipping = urlencode(number_format($arr['shipping'], 2));

            /* $TellusPayID = "58318125";
              $OrderNo = "8888777";
              $Data = "1:Testorder:1:1000,1:Exampleorder:4:1300";
              $ExtraData = "#PHPSessionID=".session_id()."#CustomerID=12345";
              $TransactionType = "3,1";
              $ISOLanguage = "SE";
              $ISOCurrency = "752";
              $DirectCapture = "1";

              $Email = "kundtjanst@samport.se";
              $FirstName = "John";
              $LastName = "Doe";
              $Address = "Test%20Street%206";
              $ZipCode = "12345";
              $City = "Nowhere";
              $Country = "SE";
              $ID = "5214124444";
              $IP = "127.0.0.1"; */

            // Check the manual for additional data types / flags
            $URL = "https://unix.telluspay.com/Add/?TP01=$DirectCapture&TP700=$TellusPayID&TP701=$OrderNo&TP740=$Data&TP901=$TransactionType&TP491=$ISOLanguage&TP490=$ISOCurrency&TP801=$Email&TP8021=$FirstName&TP8022=$LastName&TP803=$Address&TP804=$ZipCode&TP805=$City&TP806=$Country&TP8071=$ID&TP5411=$Shipping&TP900=$IP&TP950=$ExtraData";


            $handle = fopen($URL, "r");
            $TellusPay_Key = str_replace(' ', '%20', fread($handle, 1000000));

            $url_str = 'https://secure.telluspay.com/WebOrder/?' . $TellusPay_Key;

            $this->redirect($url_str);
        }

        if ( $transaction_type != 2) {
            $this->product_article = new BtShopArticle();
            $this->purchase_rec = $purchase->getPurchaseOrder($this->getUser()->getAttribute('payment_id'));
            $profile = new SfGuardUserProfile();
            $this->subscription = new Subscription();
            $userName = $profile->getUserData($this->getUser()->getAttribute('user_id', '', 'userProperty'));
            $name = ($userName ? $userName->firstname . ' ' . $userName->lastname : urlencode($arr['user_firstname']) . ' ' . $LastName = urlencode($arr['user_lastname']));

            $this->item_list = $purchasedItem->fecthPurchasedItemList($this->getUser()->getAttribute('payment_id'));
            $this->purchase_id = $this->getUser()->getAttribute('payment_id');
            $profile = new SfGuardUserProfile();
            if ($this->purchase_id) {                        
                if($transaction_type == 5){//Code for swish payment
                    $this->saveInvoicePdf($id,1,0);
                    if($request->getParameter('swishRes')){
                        $result = json_decode ($request->getParameter('swishRes'));     
                        $paymentRequestID = $result->id;
                        $paymentReference = $result->paymentReference;
                        $creatdeDate = strtotime($result->dateCreated);
                        $creatdeDate = date("Y-m-d h:i:s", $creatdeDate);
                        $paymentDate = strtotime($result->datePaid);
                        $paymentDate = date("Y-m-d h:i:s", $paymentDate);
                    }
                    $arr = array();
                    $arr['id'] = $this->purchase_id;
                    $arr['transaction_id'] = $paymentRequestID;
                    $arr['response_code'] = $paymentReference;                    
                    $arr['created_at'] = $creatdeDate;
                    $arr['payment_date'] = $paymentDate;
                    $arr['checkout_status'] = 1;
                    $arr['order_processed'] = 1;

                    $purchase->updatePurchaseRecord($arr);
                    
                    $this->host_str = $this->getRequest()->getHost();
                    if($this->getUser()->getAttribute('shopArticleId')){
                        $this->product_article = new Article();
                        $this->is_Article = 1;
                    }else{
                        $btShopArticleType = new BtShopArticleType();
                        $this->product_article = new BtShopArticle();
                        $this->is_Article = 0;
                        $this->item_list = $purchasedItem->fecthPurchasedItemList($this->purchase_id);
                    }
                    $this->profile = new SfGuardUserProfile();
                    $this->subscription = new Subscription();
                    $this->purchase_rec = $purchase->getPurchaseOrder($this->purchase_id);
                }else{
                    $this->saveInvoicePdf($id,0,0);
                }
                $mailBody = $this->getPartial('user_order', array('is_Article' => 0,'item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'name' => $name));

                $to = $this->purchase_rec->email;
                $from = sfConfig::get('app_mail_shop_email');

                $message = $this->getMailer()->compose();
                if ($this->purchase_rec->checkout_status == 1)
                    $message->setSubject('Orderbekräftelse');
                if ($this->purchase_rec->checkout_status == 0)
                    $message->setSubject('Fakturabeställning');
                $message->attach(new Swift_Attachment(file_get_contents("Invoice.pdf"), "Invoice.pdf", "application/pdf"));
                $message->setTo($to);
                $message->setCc('info@borstjanaren.se');
                $message->setFrom($from);
                $message->setBody($mailBody, 'text/html');
                $this->getMailer()->send($message);
                //$this->transaction_type = $request->getParameter('typ');
            }

            
            $this->getUser()->getAttributeHolder()->remove('product_arr');
            $this->getUser()->getAttributeHolder()->remove('price_arr');
            $this->getUser()->getAttributeHolder()->remove('product_qty_arr');
            $this->getUser()->getAttributeHolder()->remove('payment_user_info');
            $this->getUser()->getAttributeHolder()->remove('price_detail_id_arr');
            $this->getUser()->getAttributeHolder()->remove('payment_id');
            $this->getUser()->getAttributeHolder()->remove('payment_user_info');
            
            //code by sandeep
            $this->getUser()->getAttributeHolder()->remove('final_vat');
            $this->getUser()->getAttributeHolder()->remove('final_total');
            $this->getUser()->getAttributeHolder()->remove('final_dicount');
            $this->getUser()->getAttributeHolder()->remove('final_discount_percentage');

            //code by sandeep end
        }
        // echo "<pre>";
        // print_r($this->purchase_id);

        // exit;
        }
        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem('Betalning', 'borst_shop/shopPayment');
        isicsBreadcrumbs::getInstance()->addItem('Bekräftelse av betalning', 'borst_shop/borstShopHome');
    }

    /**
     * Executes PaymentResponse action
     *
     * @param sfRequest $request A request object
     */
    public function executePaymentDone(sfWebRequest $request) {
        //var_dump(sfConfig::get('sf_web_dir').'/Invoice.pdf');
        $past = time() - 3600;
        setcookie( 'cart_items_cookie_pid', '', $past, '/' );
        setcookie( 'cart_items_cookie_price', '', $past, '/' );
        setcookie( 'cart_items_cookie_qty', '', $past, '/' );
        
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_home');
        $this->getUser()->setAttribute('third_menu', '');

        $purchase = new Purchase();
        $purchasedItem = new PurchasedItem();
        if($this->getUser()->getAttribute('shopArticleId')){
            $this->product_article = new Article();
            $this->is_Article = 1;
        }else{
            $btShopArticleType = new BtShopArticleType();
            $this->product_article = new BtShopArticle();
            $this->is_Article = 0;
        }
        $arr = array();
        $this->host_str = $this->getRequest()->getHost();
        // Payment process response.
        $response_code = $request->getParameter('R');
        $transaction_id = $request->getParameter('A');

        $id = $this->getUser()->getAttribute('payment_id');
        $this->item_list = $purchasedItem->fecthPurchasedItemList($id);

        $info_arr = $purchasedItem->getOnePurchasedItem($id);

        $arr['id'] = $id;
        $arr['transaction_id'] = $transaction_id;
        $arr['response_code'] = $response_code;
        $arr['checkout_status'] = $response_code === '00' ? '1' : '0';
        $arr['payment_date'] = $response_code === '00' ? date('Y-m-d H:i:s') : '0000-00-00 00:00:00';
        if ($response_code === '00' && $info_arr['shipping'] == 0)
            $arr['order_processed'] = 1;

        $purchase->updatePurchaseRecord($arr);

        $this->getUser()->getAttributeHolder()->remove('product_arr');
        $this->getUser()->getAttributeHolder()->remove('price_arr');
        $this->getUser()->getAttributeHolder()->remove('product_qty_arr');
        $this->getUser()->getAttributeHolder()->remove('payment_user_info');
        $this->getUser()->getAttributeHolder()->remove('price_detail_id_arr');
        $this->getUser()->getAttributeHolder()->remove('payment_id');
        $this->getUser()->getAttributeHolder()->remove('payment_user_info');
        
        // code by sandeep
        $this->getUser()->getAttributeHolder()->remove('final_vat');
        $this->getUser()->getAttributeHolder()->remove('final_total');
        $this->getUser()->getAttributeHolder()->remove('final_dicount');
        $this->getUser()->getAttributeHolder()->remove('final_discount_percentage');
        $this->getUser()->getAttributeHolder()->remove('shopArticleId');
        $this->getUser()->getAttributeHolder()->remove('article_product');
        $this->getUser()->getAttributeHolder()->remove('article_price');
        $this->getUser()->getAttributeHolder()->remove('article_product_qty');
        $this->getUser()->getAttributeHolder()->remove('article_product_img');
        // code by sandeep end

        isicsBreadcrumbs::getInstance()->addItem('Payment Done', 'borst_shop/paymentDone');
        $this->transaction_id = $transaction_id;
        $this->purchase_id = $id;

        $this->profile = new SfGuardUserProfile();
        $this->subscription = new Subscription();
        $this->purchase_rec = $purchase->getPurchaseOrder($id);

        if ($response_code === '00') {
            //$this->getUser()->setAttribute('after_payment_mail');

            if ($this->purchase_id) {
                $mailBody = $this->getPartial('user_order', array('is_Article' => $this->is_Article,'item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec));

                $to = $this->purchase_rec->email;
                $from = sfConfig::get('app_mail_sender_email');

                $message = $this->getMailer()->compose();
                if ($this->purchase_rec->checkout_status == 1)
                    $message->setSubject('Orderbekräftelse');
                if ($this->purchase_rec->checkout_status == 0)
                    $message->setSubject('Fakturabeställning');
                //$message->attach(new Swift_Message_Attachment(file_get_contents("Invoice.pdf"), "Invoice.pdf", "application/pdf"));
                $message->attach(Swift_Attachment::fromPath(sfConfig::get('sf_web_dir').'/Invoice.pdf'));
                $message->setTo($to);
                $message->setFrom($from);
                $message->setBody($mailBody, 'text/html');
                $this->getMailer()->send($message);
            }
        }
    }

    /**
     * Executes PaymentResponse action
     *
     * @param sfRequest $request A request object
     */
    public function executePaymentFail(sfWebRequest $request) {
        $past = time() - 3600;
        setcookie( 'cart_items_cookie_pid', '', $past, '/' );
        setcookie( 'cart_items_cookie_price', '', $past, '/' );
        setcookie( 'cart_items_cookie_qty', '', $past, '/' );
        
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_home');
        $this->getUser()->setAttribute('third_menu', '');

        // Payment process response.
        $response_code = $request->getParameter('R');
        $id = $this->getUser()->getAttribute('payment_id');
        $purchase = new Purchase();
        $purchase_record = $purchase->getPurchaseOrder($id);
        if ($purchase_record) {
            $purchase_record->response_code = $response_code;
            $purchase_record->checkout_status = $response_code === '00' ? '1' : '0';
            $purchase_record->save();
        }

        $this->getUser()->getAttributeHolder()->remove('product_arr');
        $this->getUser()->getAttributeHolder()->remove('price_arr');
        $this->getUser()->getAttributeHolder()->remove('product_qty_arr');
        $this->getUser()->getAttributeHolder()->remove('payment_user_info');
        $this->getUser()->getAttributeHolder()->remove('price_detail_id_arr');
        $this->getUser()->getAttributeHolder()->remove('payment_id');
        
        // code by sandeep
        $this->getUser()->getAttributeHolder()->remove('final_vat');
        $this->getUser()->getAttributeHolder()->remove('final_total');
        $this->getUser()->getAttributeHolder()->remove('final_dicount');
        $this->getUser()->getAttributeHolder()->remove('final_discount_percentage');
        $this->getUser()->getAttributeHolder()->remove('shopArticleId');
        $this->getUser()->getAttributeHolder()->remove('article_product');
        $this->getUser()->getAttributeHolder()->remove('article_price');
        $this->getUser()->getAttributeHolder()->remove('article_product_qty');
        $this->getUser()->getAttributeHolder()->remove('article_product_img');
        // code by sandeep end

        isicsBreadcrumbs::getInstance()->addItem('Payment Fail', 'borst_shop/paymentFail');
    }

    /**
     * Executes borstShopConditions action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstShopConditions(sfWebRequest $request) {
        $this->host_str = $this->getRequest()->getHost();
        $this->host_str = $this->getRequest()->getHost();
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', 'bt_shop_conditions');
        $this->getUser()->setAttribute('third_menu', '');
        isicsBreadcrumbs::getInstance()->addItem('VILLKOR', 'borst_shop/borstShopConditions');
    }

    /**
     * Executes isEmptyCartForPayment action
     *
     * @param sfRequest $request A request object
     */
    public function executeIsEmptyCartForPayment(sfWebRequest $request) {
        $product_arr = $this->getUser()->getAttribute('product_arr');

        if (count($product_arr) == 0)
            return $this->renderText(1);
        if (count($product_arr) > 0)
            return $this->renderText(2);

        $btShopArticle = new BtShopArticle();
        $cart_products_arr = $btShopArticle->getShopArticleOfType(7);
        $cart_products = array();
        foreach ($cart_products_arr as $product) {
            $cart_products[] = $product->id;
        }

        $cart_flag = 0;  // for unregistred user
        foreach ($product_arr as $product) {
            if (in_array($product, $cart_products))
                $cart_flag = 1;
        }

        if ($cart_flag) {
            if (!$this->getUser()->isAuthenticated()) {
                return $this->renderText(0);
            } else {
                if (count($product_arr) == 0)
                    return $this->renderText(1);
                if (count($product_arr) > 0)
                    return $this->renderText(2);
            }
        }
        else {
            if (count($product_arr) == 0)
                return $this->renderText(1);
            if (count($product_arr) > 0)
                return $this->renderText(2);
        }
    }

    /**
     * Executes SaveAsPdf action
     *
     * @param sfRequest $request A request object
     */
    public function executeSaveAsPdf(sfWebRequest $request) {
        $purchase = new Purchase();
        $purchasedItem = new PurchasedItem();
        $btShopArticleType = new BtShopArticleType();
        $is_individual_article = $request->getParameter('individual_article');
        if($is_individual_article == 1){
            $this->product_article = new Article();
        }else{
            $this->product_article = new BtShopArticle();
        }
        $profile = new SfGuardUserProfile();
        $subscription = new Subscription();

        $purchase_id = $request->getParameter('purchase_id');
        $this->item_list = $purchasedItem->fecthPurchasedItemList($purchase_id);
        $this->purchase_rec = $purchase->getPurchaseOrder($purchase_id);
        $is_receipt = $request->getParameter('receipt');
        $host_str = $this->getRequest()->getHost();
        
        if($is_individual_article == 1){
            if ($is_receipt == 1) {
                $html = $this->getPartial('global/receipt_article', array('host_str' => $host_str, 'item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            }else{
                $html = $this->getPartial('global/invoice_article', array('host_str' => $host_str, 'item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            }
        }else{
            if ($is_receipt == 1) {
                $html = $this->getPartial('global/receipt', array('item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            } else {
                $html = $this->getPartial('global/invoice', array('item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            }
        }

        //$html_header = $this->getPartial('global/pdf_header');
        //$html_footer = $this->getPartial('global/pdf_footer');

        require(sfConfig::get('sf_root_dir') . '/plugins/mpdfPlugin/mpdf.php' );
        $mpdf = new mPDF('utf-8', 'A4', '', '', 7, 7, 6, 0, 0, 0);

        $mpdf->SetDisplayMode('fullpage');

        //$mpdf->SetHTMLHeader('<div style="float:left; position:relative; border:0px solid green;  margin-top:10px; width:100%;"><table style="width:100%;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td colspan="2"><img src="images/bors.jpg" width="143" height="88"  alt="logo" border="0" /></td></tr><tr><td colspan="2"><img src="images/morning_briefing.jpg" width="148" height="60" border="0"  alt="morning_briefing" /></td></tr></table></div>');
        //$mpdf->setAutoTopMargin = 'pad';
        $mpdf->SetHTMLHeader('<div style="float:left; position:relative; border:0px solid blue;  margin-top:10px; width:100%;height:100px;"><table style="width:100%;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0" height:100%><tr><td colspan="2"><img src="images/bors.jpg" width="143" height="88"  alt="logo" border="0" /></td></tr><tr><td colspan="2"><img src="images/morning_briefing.jpg" width="148" height="60" border="0"  alt="morning_briefing" /></td></tr></table></div>');
        
        if ($is_receipt == 1) {
            $mpdf->SetHTMLFooter('<div style="float:left; position:relative; border:0px solid green; width:100%;">
<table style="font-family: Arial, Helvetica, sans-serif; font-size:10pt;float:left; position:relative;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0">
    <tr><td colspan="2" style="color:#999999; font-weight:bold; font-size:11px;"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Morningbriefing</span></td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Börstjänaren AB</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Odensgatan 11A, 5tr</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">753 14 Uppsala</td></tr>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Org.nr/VAT-nr: SE5567244735</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Bankgiro: 5670-5288</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Plusgiro: 104 66 96-9</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Kundtjänst e-post:</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">info@borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">www.borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Telefon:</span></td></tr>
    <tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">018 - 55 00 70</td><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" align="right">Vänligen ange både kundnummer och fakturanummer när du betalar.</td></tr>
    <tr><td colspan="2" style="padding-bottom:10px;">&nbsp;</td></tr>
</table>
</div>');
        } else {
            $mpdf->SetHTMLFooter('<div style="float:left; position:relative; border:0px solid green; width:100%;">
<table style="font-family: Arial, Helvetica, sans-serif; font-size:10pt;float:left; position:relative;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0">
    <tr><td colspan="2" style="color:#999999; font-weight:bold; font-size:12px;"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Morningbriefing</span></td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:12px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Börstjänaren AB</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">Odensgatan 11A, 5tr</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">753 14 Uppsala</td></tr>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">Org.nr/VAT-nr: SE5567244735</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">Bankgiro: 5670-5288</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">Plusgiro: 104 66 96-9</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:12px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Kundtjänst e-post:</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">info@borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">www.borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Telefon:</span></td><td colspan="2" class="font_arial" align="right">Leverans sker när betalningen inkommit till vårt konto.</td></tr>
     <tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">018 - 55 00 70</td><td colspan="3" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" align="right">Vänligen ange både kundnr och fakturanr när du betalar.</td></tr>
	<tr><td colspan="2" style="padding-bottom:10px;">&nbsp;</td></tr>
</table>
</div>');
        }


        $mpdf->WriteHTML($html);
        $mpdf->Output('Invoice.pdf', $request->getParameter('printType','D'));
        return sfView::NONE;
    }

    /**
     * Executes ajax request to update left panel
     *
     * @param sfRequest $request A request object
     */
    public function executeItemPricing(sfWebRequest $request) {
        $this->setLayout(false);
        $product_arr = $this->getUser()->getAttribute('product_arr');

        $this->product_article = new BtShopArticle();
        $btshop_article = new BtShopArticle();
        $this->products_data = $btshop_article->getProductInOrder($product_arr);
        $this->product_qty_arr = $this->getUser()->getAttribute('product_qty_arr');

        $price_arr = $this->getUser()->getAttribute('price_arr');
        $this->price_arr = $price_arr;
        $this->add_shipping_flag = 0;

        $paymentInfo = $this->getUser()->getAttribute('payment_user_info');
        $countries = new Countries();
        $total_weight = 0;


        $countryShipping = new CountryShipping();
        $total_weight = $btshop_article->getTotalProductWeight($product_arr, $this->product_qty_arr);
        $this->total_shipping_cost = $countryShipping->getShippingCostFromWeight($total_weight, ($paymentInfo['user_country']? $countries->getOneRegionCode($paymentInfo['user_country']):$this->region_code));

        $this->payment_user_info = $paymentInfo;
        $this->loginRequiredForProduct = $this->isLoginRequriedForProduct($product_arr);
        $this->final_vat = $this->getUser()->getAttribute('final_vat');
        $this->final_totals = $this->getUser()->getAttribute('final_total');
        $this->final_dicount = $this->getUser()->getAttribute('final_dicount');
        $this->final_discount_percentage = $this->getUser()->getAttribute('final_discount_percentage');
        
        $comma_separated_id = implode(",", $product_arr);
        $user_email = $this->logged_user_email;
        $this->coupon_code_count ='';
        if($comma_separated_id){
        $query_str = "SELECT cd.id as cd_id, cd.user_id as cd_user_id, cd.product_id as cd_product_id,
            cd.couponcode_id as cd_couponcode_id, cd.email as cd_email, cd.status as cd_status, 
            cd.IS_INACTIVE as cd_IS_INACTIVE, cd.CREATED_AT as cd_CREATED_AT, cd.UPDATED_AT as cd_UPDATED_AT, 
            c.id as c_id, c.code as c_code, c.code_desc as c_code_desc, c.coupon_code as c_coupon_code,
            c.status as c_status, c.CREATED_AT as c_CREATED_AT, c.UPDATED_AT as c_UPDATED_AT 
            FROM coupon_details cd 
            LEFT JOIN coupon c ON c.id=cd.couponcode_id 
            WHERE if( cd.email = '', '', cd.email ) = if( cd.email = '', '', '$user_email' ) AND cd.product_id IN ($comma_separated_id) AND cd.status = 'Pending' AND cd.IS_INACTIVE = 0 AND c.status = 0 ORDER BY cd.CREATED_AT DESC ";

            $q = Doctrine_Manager::getInstance()->getCurrentConnection();
            $stmt = $q->prepare($query_str);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->coupon_code_count = count($results);
        }
    }

     public function saveInvoicePdf($purchase_id,$is_receipt,$is_individual_article, $host_str) {
        $purchase = new Purchase();
        $purchasedItem = new PurchasedItem();
        $btShopArticleType = new BtShopArticleType();
        if($is_individual_article == 1){
            $this->product_article = new Article();
        }else{
            $this->product_article = new BtShopArticle();
        }
        $profile = new SfGuardUserProfile();
        $subscription = new Subscription();

        
        $this->item_list = $purchasedItem->fecthPurchasedItemList($purchase_id);
        $this->purchase_rec = $purchase->getPurchaseOrder($purchase_id);
        
        if($is_individual_article == 1){
            $html = $this->getPartial('global/invoice_article', array('host_str' => $host_str, 'item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
        }else{
            if ($is_receipt == 1) {
                $html = $this->getPartial('global/receipt', array('item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            } else {
                $html = $this->getPartial('global/invoice', array('item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            }
        }

        //$html_header = $this->getPartial('global/pdf_header');
        //$html_footer = $this->getPartial('global/pdf_footer');

        require(sfConfig::get('sf_root_dir') . '/plugins/mpdfPlugin/mpdf.php' );
        $mpdf = new mPDF('utf-8', 'A4', '', '', 7, 7, 6, 0, 0, 0);

        $mpdf->SetDisplayMode('fullpage');

        //$mpdf->SetHTMLHeader('<div style="float:left; position:relative; border:0px solid green;  margin-top:10px; width:100%;"><table style="width:100%;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td colspan="2"><img src="images/bors.jpg" width="143" height="88"  alt="logo" border="0" /></td></tr><tr><td colspan="2"><img src="images/morning_briefing.jpg" width="148" height="60" border="0"  alt="morning_briefing" /></td></tr></table></div>');
        //$mpdf->setAutoTopMargin = 'pad';
        $mpdf->SetHTMLHeader('<div style="float:left; position:relative; border:0px solid blue;  margin-top:10px; width:100%;height:100px;"><table style="width:100%;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0" height:100%><tr><td colspan="2"><img src="images/bors.jpg" width="143" height="88"  alt="logo" border="0" /></td></tr><tr><td colspan="2"><img src="images/morning_briefing.jpg" width="148" height="60" border="0"  alt="morning_briefing" /></td></tr></table></div>');

        if ($is_receipt == 1) {
            $mpdf->SetHTMLFooter('<div style="float:left; position:relative; border:0px solid green; width:100%;">
<table style="font-family: Arial, Helvetica, sans-serif; font-size:10pt;float:left; position:relative;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0">
    <tr><td colspan="2" style="color:#999999; font-weight:bold; font-size:11px;"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Morningbriefing</span></td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Börstjänaren AB</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Odensgatan 11A, 5tr</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">753 14 Uppsala</td></tr>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Org.nr/VAT-nr: SE5567244735</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Bankgiro: 5670-5288</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Plusgiro: 104 66 96-9</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Kundtjänst e-post:</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">info@borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">www.borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Telefon:</span></td></tr>
    <tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">018 - 55 00 70</td><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" align="right">Vänligen ange både kundnummer och fakturanummer när du betalar.</td></tr>
    <tr><td colspan="2" style="padding-bottom:10px;">&nbsp;</td></tr>
</table>
</div>');
        } else {
            $mpdf->SetHTMLFooter('<div style="float:left; position:relative; border:0px solid green; width:100%;">
<table style="font-family: Arial, Helvetica, sans-serif; font-size:10pt;float:left; position:relative;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0">
    <tr><td colspan="2" style="color:#999999; font-weight:bold; font-size:11px;"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Morningbriefing</span></td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Börstjänaren AB</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Odensgatan 11A, 5tr</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">753 14 Uppsala</td></tr>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Org.nr/VAT-nr: SE5567244735</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Bankgiro: 5670-5288</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">Plusgiro: 104 66 96-9</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Kundtjänst e-post:</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">info@borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">www.borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" class="font_arial" align="right">Varan skickas när betalningen inkommit till Börstjänarens konto.</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #275A9D; font-weight:bold; font-size:11px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Telefon:</span></td></tr>
    <tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">018 - 55 00 70</td><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" align="right">Vänligen ange både kundnr och fakturanr när du betalar.</td></tr>
	<tr><td colspan="2" style="padding-bottom:10px;">&nbsp;</td></tr>
</table>
</div>');
        }


        $mpdf->WriteHTML($html);
        $mpdf->Output('Invoice.pdf', 'F');

    }
    
    public function executeBtShopeProductUrl(sfWebRequest $request) {
        $arr = explode("_", $request->getParameter("link"));
        $arr_article = $request->getParameter("art");
        $error = 0;

        if (count($arr) >= 1) {
            $product_id = $arr[1];
            $purchase_id = $arr[0];

            $purchase = Doctrine::getTable("Purchase")->find($purchase_id);
            if ($arr_article == 1) {
                $product = Doctrine::getTable("Article")->find($product_id);
                $host_str = $this->getRequest()->getHost();
                $url = 'https://' . $host_str . '/borst/borstArticleDetails/article_id/' . $product_id
                ;
                $this->redirect($url);
            } else {
                $product = Doctrine::getTable("BtShopArticle")->find($product_id);
            }
            if (!$purchase) {
                $this->message = "Du har inte slutfört köpet för denna produkt.";
            } elseif (!$purchase["order_processed"]) {
                $this->message = "Du har inte slutfört köpet för denna produkt.";
            } elseif (!$product) {
                $this->message = "Produkten finns inte";
            } elseif (!$product['is_downloadable']) {
                $this->message = "Produkten finns inte";
            }
            if (!$this->message)
                $this->redirect($product[download_url]);
        }
    }
    
    /**
     * Executes ShopArticleDetail action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopArticleDetail(sfWebRequest $request) {
        $this->host_str = $this->getRequest()->getHost();
        $this->getUser()->setAttribute('parent_menu', 'top_bt_shop');
        $this->getUser()->setAttribute('submenu_menu', '');

        $btshop_article = new Article();
        $this->product_article = new Article();

        $product_id = $request->getParameter('product_id');
        $this->getUser()->setAttribute('shopArticleId', $product_id);
        $this->pid = $product_id;
        $this->product_detail = $btshop_article->getPerticularArticle($product_id);
        $this->isAdmin  = $this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty');
        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem($this->product_detail->title, 'borst_shop/borstShopHome');
        
        if (!$this->getUser()->isAuthenticated() && !$this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty')) {
            $this->valid_user = 0;
        } else {
            $this->valid_user = 1;
        }
        $product_id = $request->getParameter('product_id');        
        $this->products_data = $this->product_article->getPerticularArticle($product_id);        
        $this->plus_article_product_detail = $btshop_article->fetchPlusArticle();
        
    }
    
    /**
     * Executes ShopArticlePayment action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopArticlePayment(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            $this->getUser()->setAttribute('loginRequired', false);
        }
        $this->loginRequiredForProduct = false;
        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem('Granska och skicka', 'borst_shop/borstShopHome');
        
        $btshop_article = new Article();
        $this->product_article = new Article();
        $countries = new Countries();
        $user_profile = new SfGuardUserProfile();
        if ($request->getParameter('product_id')) {
            $product_id = $request->getParameter('product_id');
            $this->getUser()->setAttribute('shopArticleId', $product_id);
        } else {
            $product_id = $this->getUser()->getAttribute('shopArticleId');
        }
        $this->payment_user_info = $this->getUser()->getAttribute('payment_user_info');
        $this->products_data = $btshop_article->getPerticularArticle($product_id);
        $this->all_country_data = $countries->getAllCountries();

        if ($product_id > 0) {
            $this->getUser()->setAttribute('article_product', $this->products_data->article_id);
            $this->getUser()->setAttribute('article_price', $this->products_data->price);
            $this->getUser()->setAttribute('article_product_qty', 1);
            $this->getUser()->setAttribute('article_product_img', $this->products_data->image);
            $this->userData = $this->getUser()->getAttribute('username', '', 'userProperty') ? $user_profile->fetch_user_profile($this->getUser()->getAttribute('username', '', 'userProperty')) : '';
        }
    }
    
     /**
     * Executes ShopArticlePaymentType action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopArticlePaymentType(sfWebRequest $request) {
        $product_id = $this->getUser()->getAttribute('shopArticleId');
        $this->price_arr = $this->getUser()->getAttribute('article_price');
        $this->product_qty_arr = $this->getUser()->getAttribute('article_product_qty');
        $this->host_str = $this->getRequest()->getHost();
        $this->product_article = new Article();
        $this->add_shipping_flag = 0;
        $this->total_shipping_cost = 0;
        $this->products_data = $this->product_article->getPerticularArticle($product_id);

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $this->getUser()->setAttribute('payment_user_info', $arr);
        }
        
        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem('Betalning', 'borst_shop/shopArticlePayment');
        isicsBreadcrumbs::getInstance()->addItem('Välj betalsätt', 'borst_shop/borstShopHome');
    }
    
    /**
     * Executes ShopArticlePaymentType action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetCartDataArticle(sfWebRequest $request) {
        $empty_cart = $request->getParameter('empty_cart');
        if ($empty_cart) {
            $this->getUser()->setAttribute('article_product', 0);
            $this->getUser()->setAttribute('article_price', 0);
            $this->getUser()->setAttribute('article_product_qty', 1);
            $this->getUser()->setAttribute('article_product_img', '');
            $this->getUser()->setAttribute('loginRequired', false);
            $this->getUser()->getAttributeHolder()->remove('payment_user_info');
            $this->getUser()->setAttribute('shopArticleId', 0);
        }

        $product_id = $this->getUser()->getAttribute('shopArticleId');
        if ($product_id) {
            $btshop_article = new Article();
            $this->price_arr = $this->getUser()->getAttribute('article_price');
            $this->product_qty_arr = $this->getUser()->getAttribute('article_product_qty');
            $this->host_str = $this->getRequest()->getHost();
            $this->product_article = new Article();
            $this->add_shipping_flag = 0;
            $this->total_shipping_cost = 0;
            $this->products_data = $this->product_article->getPerticularArticle($product_id);
            
            $this->pid = $product_id;
            $this->plus_article_product_detail = $btshop_article->fetchPlusArticle();
        }
    }
    
    /**
     * Executes ShopArticlePaymentDone action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopArticlePaymentDone(sfWebRequest $request) {
        $past = time() - 3600;
        setcookie( 'cart_items_cookie_pid', '', $past, '/' );
        setcookie( 'cart_items_cookie_price', '', $past, '/' );
        setcookie( 'cart_items_cookie_qty', '', $past, '/' );
        isicsBreadcrumbs::getInstance()->addItem('BT-SHOP', 'borst_shop/borstShopHome');
        isicsBreadcrumbs::getInstance()->addItem('Betalning', 'borst_shop/shopArticlePayment');
        isicsBreadcrumbs::getInstance()->addItem('Bekräftelse av betalning', 'borst_shop/borstShopHome');
        $purchase = new Purchase();
        $purchasedItem = new PurchasedItem();
        $btshop_article = new Article();
        $arr = $this->getUser()->getAttribute('payment_user_info');
        $product_arr = $this->getUser()->getAttribute('article_product');
        $price_arr = $this->getUser()->getAttribute('article_price');
        $product_qty_arr = $this->getUser()->getAttribute('article_product_qty');

        $payment_mtd = array('1' => 'Online Payment', '2' => 'Direct Payment (bank)', '3' => 'Prepayment (via the plus-or bank transfer)', '4' => 'Swish');

        if (count($product_arr) > 0) {
            $id = $purchase->addPaymentEntry($arr, 1);
            $purchasedItem->savePurchasedItemListArticle($id, $arr, $product_arr, $price_arr, $product_qty_arr, 1);
            $this->email = $arr['user_email'];
            $this->getUser()->setAttribute('payment_id', $id);
            $host_str = $this->getRequest()->getHost();
            //$this->saveInvoicePdf($id, 0, 1, $host_str);
            $item_list = $purchasedItem->fecthPurchasedItemList($id);
            $for_price = $purchase->getPurchaseOrder($id);

            $i = 0;
            $item_detail_str = '';
            $find_arr = array(' ', '.');
            foreach ($item_list as $data) {
                $price_per_unit = number_format($data['total_price'], 2, '.', ''); //code change by sandeep
                $article_name = $btshop_article->getPerticularArticle($data->product_id);
                if ($i == 0)
                    $item_detail_str = $data['product_id'] . ':' . urlencode($article_name->title) . ':' . $data['quantity'] . ':' . $price_per_unit;
                else
                    $item_detail_str = $item_detail_str . ',' . $data['product_id'] . ':' . urlencode($article_name->title) . ':' . $data['quantity'] . ':' . $price_per_unit;

                $i++;
            }

            $transaction_type = $request->getParameter('typ') ? $request->getParameter('typ') : 3;

            $bank_id = $request->getParameter('bk');

            $purchase_record = $purchase->getPurchaseOrder($id);

            $order_no = $purchase_record->id;
            $purchase_record->payment_method = $payment_mtd[$transaction_type];
            $purchase_record->save();

            $url = 'https://' . $host_str . '/backend.php/borst/viewPurchaseDetail/id/' . $order_no;

            $mailBody = $this->getPartial('processed_order_mail1', array('order_no' => $order_no, 'url' => $url));
            $to = array(sfConfig::get('app_mail_to_1'));
            $from = sfConfig::get('app_mail_shop_email_1');
            $message = $this->getMailer()->compose();
            $message->setSubject('New Transaction');
            $message->setTo($to);
            $message->setFrom($from);
            $message->setBody($mailBody, 'text/html');
            $this->getMailer()->send($message);
        }

        if (($transaction_type == 1 || $transaction_type == 2) && (count($product_arr) > 0)) {
            $this->saveInvoicePdf($id, 1, 1, $host_str);
            /* Payment process. */
            $TellusPayID = "58318125";
            $OrderNo = $id;
            $Data = $item_detail_str;
            $ExtraData = "#PHPSessionID=" . session_id() . ($arr['user_id'] != "" ? "#CustomerID=" . $arr['user_id'] : "");


            $ExtraData = base64_encode($ExtraData);


            if ($transaction_type == 1)
                $type = 1;
            else if ($transaction_type == 2)
                $type = '3,' . $bank_id;

            $TransactionType = $type;
            $ISOLanguage = "SE";
            $ISOCurrency = "752";
            $DirectCapture = "1";

            $Email = urlencode($arr['user_email']);
            $FirstName = urlencode($arr['user_firstname']);
            $LastName = urlencode($arr['user_lastname']);
            $Address = urlencode($arr['user_street']);
            $ZipCode = urlencode($arr['user_zipcode']);
            $City = urlencode($arr['user_city']);
            $Country = urlencode($arr['user_country']);
            // Buyers personalnumber / Customer number
            $ID = "5214124444";
            $IP = $_SERVER['REMOTE_ADDR'];
            $Shipping = urlencode(number_format($arr['shipping'], 2));

            /* $TellusPayID = "58318125";
              $OrderNo = "8888777";
              $Data = "1:Testorder:1:1000,1:Exampleorder:4:1300";
              $ExtraData = "#PHPSessionID=".session_id()."#CustomerID=12345";
              $TransactionType = "3,1";
              $ISOLanguage = "SE";
              $ISOCurrency = "752";
              $DirectCapture = "1";

              $Email = "kundtjanst@samport.se";
              $FirstName = "John";
              $LastName = "Doe";
              $Address = "Test%20Street%206";
              $ZipCode = "12345";
              $City = "Nowhere";
              $Country = "SE";
              $ID = "5214124444";
              $IP = "127.0.0.1"; */

            // Check the manual for additional data types / flags
            $URL = "https://unix.telluspay.com/Add/?TP01=$DirectCapture&TP700=$TellusPayID&TP701=$OrderNo&TP740=$Data&TP901=$TransactionType&TP491=$ISOLanguage&TP490=$ISOCurrency&TP801=$Email&TP8021=$FirstName&TP8022=$LastName&TP803=$Address&TP804=$ZipCode&TP805=$City&TP806=$Country&TP8071=$ID&TP5411=$Shipping&TP900=$IP&TP950=$ExtraData";

            $handle = fopen($URL, "r");
            $TellusPay_Key = str_replace(' ', '%20', fread($handle, 1000000));
            $url_str = 'https://secure.telluspay.com/WebOrder/?' . $TellusPay_Key;

            $this->redirect($url_str);
        }

        if ($transaction_type != 1 && $transaction_type != 2) {
            $this->product_article = new Article();
            $this->purchase_rec = $purchase->getPurchaseOrder($this->getUser()->getAttribute('payment_id'));
            $profile = new SfGuardUserProfile();
            $this->subscription = new Subscription();
            $userName = $profile->getUserData($this->getUser()->getAttribute('user_id', '', 'userProperty'));
            $name = ($userName ? $userName->firstname . ' ' . $userName->lastname : urlencode($arr['user_firstname']) . ' ' . $LastName = urlencode($arr['user_lastname']));

            $this->item_list = $purchasedItem->fecthPurchasedItemList($this->getUser()->getAttribute('payment_id'));
            $this->purchase_id = $this->getUser()->getAttribute('payment_id');
            $profile = new SfGuardUserProfile();
            if ($this->purchase_id) {
                
                if($transaction_type == 4){//Code for swish payment
                    $this->saveInvoicePdf($id, 1, 1, $host_str);
                    if($request->getParameter('swishRes')){
                        $result = json_decode ($request->getParameter('swishRes'));     
                        $paymentRequestID = $result->id;
                        $paymentReference = $result->paymentReference;
                        $creatdeDate = strtotime($result->dateCreated);
                        $creatdeDate = date("Y-m-d h:i:s", $creatdeDate);
                        $paymentDate = strtotime($result->datePaid);
                        $paymentDate = date("Y-m-d h:i:s", $paymentDate);
                    }
                    $arr = array();
                    $arr['id'] = $this->purchase_id;
                    $arr['transaction_id'] = $paymentRequestID;
                    $arr['response_code'] = $paymentReference;                    
                    $arr['created_at'] = $creatdeDate;
                    $arr['payment_date'] = $paymentDate;
                    $arr['checkout_status'] = 1;
                    $arr['order_processed'] = 1;

                    $purchase->updatePurchaseRecord($arr);
                    
                    $this->host_str = $this->getRequest()->getHost();
                    if($this->getUser()->getAttribute('shopArticleId')){
                        $this->product_article = new Article();
                        $this->is_Article = 1;
                    }else{
                        $btShopArticleType = new BtShopArticleType();
                        $this->product_article = new BtShopArticle();
                        $this->is_Article = 0;
                        $this->item_list = $purchasedItem->fecthPurchasedItemList($this->purchase_id);
                    }
                    $this->purchase_id = $this->purchase_id;
                    $this->profile = new SfGuardUserProfile();
                    $this->subscription = new Subscription();
                    $this->purchase_rec = $purchase->getPurchaseOrder($this->purchase_id);
                }else{
                    $this->saveInvoicePdf($id, 0, 1, $host_str);
                }
                $mailBody = $this->getPartial('user_order', array('is_Article' => 1, 'item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'name' => $name));

                $to = $this->purchase_rec->email;
                $from = sfConfig::get('app_mail_shop_email');

                $message = $this->getMailer()->compose();
                if ($this->purchase_rec->checkout_status == 1)
                    $message->setSubject('Orderbekräftelse');
                if ($this->purchase_rec->checkout_status == 0)
                    $message->setSubject('Fakturabeställning');
                $message->attach(new Swift_Attachment(file_get_contents("Invoice.pdf"), "Invoice.pdf", "application/pdf"));
                $message->setTo($to);
                $message->setCc('info@borstjanaren.se');
                $message->setFrom($from);
                $message->setBody($mailBody, 'text/html');
                $this->getMailer()->send($message);
                
                $this->transaction_type = $request->getParameter('typ');
            }

            $this->getUser()->getAttributeHolder()->remove('product_arr');
            $this->getUser()->getAttributeHolder()->remove('price_arr');
            $this->getUser()->getAttributeHolder()->remove('product_qty_arr');
            $this->getUser()->getAttributeHolder()->remove('payment_user_info');
            $this->getUser()->getAttributeHolder()->remove('price_detail_id_arr');
            $this->getUser()->getAttributeHolder()->remove('payment_id');
            $this->getUser()->getAttributeHolder()->remove('payment_user_info');

            $this->getUser()->getAttributeHolder()->remove('article_product');
            $this->getUser()->getAttributeHolder()->remove('article_price');
            $this->getUser()->getAttributeHolder()->remove('article_product_qty');
            $this->getUser()->getAttributeHolder()->remove('article_product_img');
        }
    }
}
