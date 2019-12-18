<?php

class SbtAdsTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('SbtAds');
    }

    /*
     *
     * This function returns all ads in a specified order query.
     *
     */

    public function getAllAdsOrderByQuery($column_id, $order, $ad_position=NULL, $ad_type=NULL, $ad_enable=NULL, $ad_name=NULL) {
        $query = Doctrine_Query::create()->from('SbtAds ads');

        $query->where('ads.is_archive = 0');
        
        $wherecond = '';
        $wherecond = $ad_position ? 'ads.ad_position = "' . $ad_position . '"' : '';
        $wherecond = $wherecond . ($ad_type ? (($ad_position ? ' AND ' : '') . 'ads.ad_type = "' . $ad_type . '"') : '');
        $wherecond = $wherecond . ($ad_enable ? (((($ad_position || $ad_type) && $ad_enable) ? ' AND ' : '' ) . 'ads.is_enabled  = "' . $ad_enable . '"') : '');
        $wherecond = $wherecond . ($ad_name ? (((($ad_position || $ad_type || $ad_enable) && $ad_name) ? ' AND ' : '' ) . 'ads.ad_title LIKE "%' . $ad_name . '%"') : '');

        if ($ad_position || $ad_type || $ad_enable || $ad_name)
            $query->addWhere($wherecond);


        if ($column_id) {
            switch ($column_id) {
                case 'ad_position': $query = $query->orderBy('ads.ad_position ' . $order);
                    break;
                case 'ad_name': $query = $query->orderBy('ads.ad_title ' . $order);
                    break;
                case 'ad_path': $query = $query->orderBy('ads.ad_name ' . $order);
                    break;
                case 'ad_type': $query = $query->orderBy('ads.ad_type ' . $order);
                    break;
                case 'ad_enable': $query = $query->orderBy('ads.is_enabled ' . $order);
                    break;
                case 'adccounter': $query = $query->orderBy('ads.ccounter_id ' . $order);
                    break;
                /* case 'sortby_ad_click': $query = $query->orderBy('ads.object_id '.$order); break; */
                case 'ad_displayed': $query = $query->orderBy('ads.display_count ' . $order);
                    break;
                case 'ad_priority': $query = $query->orderBy('ads.priority ' . $order);
                    break;
                case 'default': $query = $query->orderBy('ads.ad_position DESC');
                    break;
            }
        }
        

        if (!$column_id)
            $query = $query->orderBy('ads.ad_position DESC');


        return $query;
    }

    /*
     *
     * This function returns array which contains ads id at a specific postion.
     *
     */

    public function getAllAdsAtPosition($type) {
        $query = Doctrine_Query::create()
                        ->select('ads.id')
                        ->from('SbtAds ads')
                        ->where('ads.is_enabled = ? AND ads.ad_position = ?', array('Y', $type));

        $data = $query->fetchArray();

        $arr = array();
        for ($i = 0; $i < count($data); $i++) {
            $arr[$i] = $data[$i]['id'];
        }
        return $arr;
    }

    /*
     *
     * This function returns array which contains ads id and priority.
     *
     */

    public function getAllAdsWithPriority($type) {
        $query = Doctrine_Query::create()
                        ->select('ads.id,ads.priority')
                        ->from('SbtAds ads')
                        ->where('ads.is_enabled = ? AND ads.ad_position = ?', array('Y', $type));

        $data = $query->fetchArray();

        $arr = array();
        for ($i = 0; $i < count($data); $i++) {
            $arr[$data[$i]['id']] = $data[$i]['priority'];
        }
        return $arr;
    }

    /*
     *
     * This function returns the ad as a string.
     *
     */

    public function getAdString($id) {



        $sbt_ad = new SbtAds();
        $data = $sbt_ad->getPerticularSbtAd($id);
        $return_str = '';

        $other = 'alt="BT-annons" longdesc="https://' . sfConfig::get('app_host_name') . '" border="0"';

        if ($data) {
            $conn = sfContext::getInstance()->getDatabaseManager()->getDatabase('doctrine')->getDoctrineConnection();
            $g_ads = sfContext::getInstance()->getRequest()->getCookie("google_ads");
            if($g_ads!="true"){
                try {
                    $conn->beginTransaction();
                    $conn->execute('update sbt_ads set display_count = display_count+1, total_display_count = total_display_count+1 where id ='.$id);
                    $conn->commit();
                } catch (Doctrine_Exception $e) {
                    error_log($e->getMessage());
                    $conn->rollback();
                }
            }

            // Increment Display Count
            //$data->setDisplayCount($data->display_count + 1);
            //$data->save();

            switch ($data->ad_type) {
                case 'swf':
                    /* Added on 27-04-2011 */
                    if ($data->ad_position == 'top_mid') {
                        $width = 728;/*970;*/
                        $height = 90;
                    } else if ($data->ad_position == 'Header_top1' || $data->ad_position == 'Header_top2') {
                        $width = 148;
                        $height = 101;
                    } else {
                        $width = 238;
                        $height = 360;
                    }
                    /* ---------------- */

                    //$width = 238; $height = 360;
                    $return_str = '<div style="float:left;position:relative;" id="imgprev' . $data->ccounter_id . '"><a ' . ($data->ad_target == 'B' ? ' target=_blank ' : '') . ' href="https://' . $_SERVER['HTTP_HOST'] . '/ccount/click.php?id=' . $data->ccounter_id . '" style="z-index: 1000; float:left; position:absolute; border:0px solid blue; width:' . $width . 'px; height:' . $height . 'px;"><img src="https://' . $_SERVER['HTTP_HOST'] . '/uploads/sbtAds/transp.gif" width="' . $width . '" height="' . $height . '" border="0" style="cursor:pointer" /></a><embed src="' . str_replace('$gmt$',time(),$data->ad_name) . '" quality="high" wmode="transparent"  type="application/x-shockwave-flash" ' . ($width != NULL ? 'width="' . $width . '"' : '') . ' ' . ($height != NULL ? 'height="' . $height . '"' : '') . '></embed></div>';
                    break;
                case 'img':
                    if ($data->ad_position == 'Header_top1' || $data->ad_position == 'Header_top2') {
                        $width = 148;
                        $height = 101;
                    }
                    if ($data->ad_position == 'top_mid') {
                        $width = 728;/*970;*/
                        $height = 90;
                    }
                    $return_str = '<a href="https://' . sfConfig::get('app_host_name') . '/ccount/click.php?id=' . $data->ccounter_id . '"' . ($data->ad_target == 'B' ? ' target=_blank ' : '') . '><img src="' . $data->ad_name . '" ' . ($width != NULL ? 'width="' . $width . '"' : '') . ' ' . ($height != NULL ? 'height="' . $height . '"' : '') . ' ' . $other . '/></a>';
                    break;
                case 'iframe':
                    if ($data->ad_position == 'top_mid') {
                        $width = 728;/*970;*/
                        $height = 90;
                    }else if ($data->ad_position == 'Header_top1' || $data->ad_position == 'Header_top2') {
                        $width = 148;
                        $height = 101;
                    }
                    else
                        $width_height_str = '';

                    $return_str = '<a href="https://' . sfConfig::get('app_host_name') . '/ccount/click.php?id=' . $data->ccounter_id . '"' . ($data->ad_target == 'B' ? ' target=_blank ' : '') . '><iframe frameborder="0" scrolling="no" bordercolor="#000000" vspace="0" hspace="0" marginheight="0" marginwidth="0" id="aa_if_19144" src="' . str_replace('$gmt$',time(),$data->ad_name) . '" ' . ($width != NULL ? 'width="' . $width . '"' : '') . ' ' . ($height != NULL ? 'height="' . $height . '"' : '') . ' ' . $other . '></iframe></a>';

                    break;

                    case 'script':
                        $return_str = '<div><a href="https://' . sfConfig::get('app_host_name') . '/ccount/click.php?id=' . $data->ccounter_id . '"' . ($data->ad_target == 'B' ? ' target=_blank ' : '') . '>' .str_replace('$gmt$',time(),$data->ad_name).'</a></div>';
                        break;
                default:
                    $return_str = '';
            }
        }

        return $return_str;
    }

    /*
     *
     * This function returns the ad id to be displayed.
     *
     */

    public function getRandomAdId($adpos_session_name, $adpos_arr, $pos, $priority_session_name, $record_with_priority) {
        $rand_keys = array_rand($adpos_arr);
        $num = $adpos_arr[$rand_keys];

        $priority_cnt = $record_with_priority[$num];
        $priority_cnt = $priority_cnt - 1;

        if ($priority_cnt == 0) {
            $arr = array_keys($adpos_arr, $num);
            unset($adpos_arr[$arr[0]]);
            sfContext::getInstance()->getUser()->setAttribute($adpos_session_name, $adpos_arr);
        }

        $record_with_priority[$num] = $priority_cnt;
        sfContext::getInstance()->getUser()->setAttribute($priority_session_name, $record_with_priority);

        return $num;
    }

    /*
     *
     * This function returns the ad id to be displayed.
     *
     */

    public function getCurrentAdId($adpos_session_name, $adpos_arr, $pos, $priority_session_name, $record_with_priority) {
        if ($pos == 'top_mid') {
            return $this->getAdWithPriority($pos);
        }


        if (count($adpos_arr) <= 0) {
            unset($adpos_arr);
            unset($record_with_priority);
            $adpos_arr = $this->getAllAdsAtPosition($pos);
            $record_with_priority = $this->getAllAdsWithPriority($pos);

            if (count($adpos_arr) > 0) {
                sfContext::getInstance()->getUser()->setAttribute($adpos_session_name, $adpos_arr);
                sfContext::getInstance()->getUser()->setAttribute($priority_session_name, $record_with_priority);

                $num = $this->getRandomAdId($adpos_session_name, $adpos_arr, $pos, $priority_session_name, $record_with_priority);
            }
        } else {
            $num = $this->getRandomAdId($adpos_session_name, $adpos_arr, $pos, $priority_session_name, $record_with_priority);
        }
        return $num;
    }

    /*
     *
     * This function returns the ad id to be displayed in group.
     *
     */

    public function getBulkAdId($record_id_arr, $session_name, $pos) {
        $ad_string = '';
        if (count($record_id_arr) <= 0) {
            unset($record_id_arr);
            $record_id_arr = $this->getAllAdsAtPosition($pos);

            if (count($record_id_arr) > 0) {
                sfContext::getInstance()->getUser()->setAttribute($session_name, $record_id_arr);
                $bulk_ad_arr = $this->getRandomAdString($record_id_arr);
            }
        } else {
            $bulk_ad_arr = $this->getRandomAdString($record_id_arr);
        }

        return $bulk_ad_arr;
    }

    /*
     *
     * This function returns the ad id to be displayed in group.
     *
     */

    public function getRandomAdString($record_id_arr) {
        $rand_keys = array_rand($record_id_arr, count($record_id_arr));
        $shuffled_keys = array_rand($record_id_arr, count($record_id_arr));

        $ad_string = '';
        $bulk_ad_arr = array();
        for ($i = 0; $i < count($shuffled_keys); $i++) {
            $bulk_ad_arr[$i] = $this->getAdString($record_id_arr[$shuffled_keys[$i]]);
        }
        return $bulk_ad_arr;
    }

    public function getAdWithPriority($adPosition) {
        //$sql = "SELECT id, priority, (priority*".SbtVisitsTable::getLastVisitCount().")/100 - display_count  as diff_count  FROM `sbt_ads` WHERE `ad_position` = '$adPosition' and `is_enabled` = 'Y' order by diff_count desc, priority desc";
        $sql = "SELECT sbt_ads.id as id, priority, (priority*sbt_visits.visit_count)/100 - display_count  as diff_count  FROM sbt_ads,sbt_visits WHERE ad_position = '$adPosition' and is_enabled = 'Y' order by diff_count desc, priority desc";
        $obj = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchOne($sql);
        error_log($obj);

        return $obj;
    }

public function getSbtAdsQuery(){
        $query = Doctrine_Query::create()
                                ->from('SbtAds sa')
                                ->where('sa.is_enabled=?','Y')
                                ->andWhere('sa.ad_position like "%Right%"')
                                ->orderBy('sa.id DESC');
        return $query ;
    }
    
    
        public function getAllArchiveAdsOrderByQuery($column_id, $order, $ad_position=NULL, $ad_type=NULL, $ad_enable=NULL, $ad_name=NULL) {
        $query = Doctrine_Query::create()->from('SbtAds ads');

        $wherecond = '';
        $wherecond = $ad_position ? 'ads.ad_position = "' . $ad_position . '"' : '';
        $wherecond = $wherecond . ($ad_type ? (($ad_position ? ' AND ' : '') . 'ads.ad_type = "' . $ad_type . '"') : '');
        $wherecond = $wherecond . ($ad_enable ? (((($ad_position || $ad_type) && $ad_enable) ? ' AND ' : '' ) . 'ads.is_enabled  = "' . $ad_enable . '"') : '');
        $wherecond = $wherecond . ($ad_name ? (((($ad_position || $ad_type || $ad_enable) && $ad_name) ? ' AND ' : '' ) . 'ads.ad_title LIKE "%' . $ad_name . '%"') : '');

        if ($ad_position || $ad_type || $ad_enable || $ad_name)
            $query->where($wherecond);


        if ($column_id) {
            switch ($column_id) {
                case 'ad_position': $query = $query->orderBy('ads.ad_position ' . $order);
                    break;
                case 'ad_name': $query = $query->orderBy('ads.ad_title ' . $order);
                    break;
                case 'ad_path': $query = $query->orderBy('ads.ad_name ' . $order);
                    break;
                case 'ad_type': $query = $query->orderBy('ads.ad_type ' . $order);
                    break;
                case 'ad_enable': $query = $query->orderBy('ads.is_enabled ' . $order);
                    break;
                case 'adccounter': $query = $query->orderBy('ads.ccounter_id ' . $order);
                    break;
                /* case 'sortby_ad_click': $query = $query->orderBy('ads.object_id '.$order); break; */
                case 'ad_displayed': $query = $query->orderBy('ads.display_count ' . $order);
                    break;
                case 'ad_priority': $query = $query->orderBy('ads.priority ' . $order);
                    break;
                case 'default': $query = $query->orderBy('ads.ad_position DESC');
                    break;
            }
        }
        
        $query->where('ads.is_archive = 1');

        if (!$column_id)
            $query = $query->orderBy('ads.ad_position DESC');


        return $query;
    }

    public function setArchiveAdByQuery($adId){
        $archive = 1;
        $updateQuery = Doctrine_Query::create()
       						->update('SbtAds sa')
       						->set('sa.is_archive', '?', $archive)
       						->where('sa.id = ?', $adId);
        $updateQuery->execute();
        
    }
    
    public function setOriginalAdByQuery($adId){
        $archive = 0;
        $updateQuery = Doctrine_Query::create()
       						->update('SbtAds sa')
       						->set('sa.is_archive', '?', $archive)
       						->where('sa.id = ?', $adId);
        $updateQuery->execute();
        
    } 
    
}