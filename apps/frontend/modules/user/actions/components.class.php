<?php

class userComponents extends sfComponents {

    public function executeUserlogin() {
        $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');
        $this->form = new $class();
    }

    public function executeAfterlogin() {

    }

    public function executeTopAd() {
        // For Ads
        $adpos_top_arr = $this->getUser()->getAttribute('adpos_top_arr');
        $priority_top_arr = $this->getUser()->getAttribute('priority_top_arr');
        $num_1 = SbtAdsTable::getInstance()->getCurrentAdId('adpos_top_arr', $adpos_top_arr, 'top_mid', 'priority_top_arr', $priority_top_arr);
        $g_add = sfContext::getInstance()->getRequest()->getCookie("google_ads");
        
        if($g_add=="true")
            $num_1 = sfConfig::get('app_google_top_ads');
        else
             SbtVisitsTable::incrementVisit();
       
        $this->top_ad = SbtAdsTable::getInstance()->getAdString($num_1);
       
       
    }

}

?>