<?php 
class Adstest{
	private $adsData;
	private $adsPriority;
	private $currentAd;
	
	public function Adstest(){
		$this->adsData=array();
		$this->adsPriority=array();
	}
	
	public function checkNewAds(){
		//$published_ads_cri = new Criteria();
		//$published_ads_cri->add(AdsPeer::IS_ENABLED,'Y',Criteria::EQUAL);
		//$published_ads_data = AdsPeer::doSelect($published_ads_cri);
		
		$published_ads_cri = Doctrine_Query::create()
	   					      ->select('ads.id')
							  ->from('SbtAds ads')
							  ->where('ads.is_enabled = ?', array('Y'));

		$published_ads_data = $published_ads_cri->execute();

		//$result = db_query("SELECT * FROM ads where is_enabled='Y'");
		if($published_ads_data)
		{
			foreach($published_ads_data as $data)
			{
				if(isset($this->adsData[$data->getAdPosition()]))
				{
					if(!in_array($data,$this->adsData[$data->getAdPosition()]))
					{
						$this->adsData[$data->getAdPosition()][]=$data;
						$this->adsPriority[$data->getAdPosition()][]=0;
					}
				}
				else
				{
					$this->adsData[$data->getAdPosition()][]=$data;
					$this->adsPriority[$data->getAdPosition()][]=0;
				}
			}
		}	
		/*while($row = mysql_fetch_array($result)){
			if(isset($this->adsData[$row['ad_position']])){
				if(!in_array($row,$this->adsData[$row['ad_position']])){
					$this->adsData[$row['ad_position']][]=$row;
					$this->adsPriority[$row['ad_position']][]=0;
				}
			}
			else{
				$this->adsData[$row['ad_position']][]=$row;
				$this->adsPriority[$row['ad_position']][]=0;
			}
		}	*/		
	}
	
	
	public function getDisplayCount($id){
		
		/*$display_cnt_cri = new Criteria();
		$display_cnt_cri->add(AdsPeer::ID,$id);
		$display_cnt_data = AdsPeer::doSelectOne($display_cnt_cri);*/
		
		$sbtAds = new SbtAds();
		$display_cnt_data = $sbtAds->getPerticularSbtAd($id);
		
		if($display_cnt_data)
		{
			return $display_cnt_data->getDisplayCount();
		}
		/*$result = db_query("SELECT display_count FROM ads where id=".$id);
		while($row = mysql_fetch_array($result)){
			$count=$row['display_count'];	
		}
		return $count;*/
	}
	
	
	public function showAds($img_position, $width=NULL, $height=NULL, $other=''){
		$current_user = sfContext::getInstance()->getUser();
		//echo $current_user->getAttribute(); 
		
		if($current_user->getAttribute('ADPTABLE')){
			$temp=$current_user->getAttribute('ADPTABLE');
			$this->adsPriority=$temp[0];
			$this->adsData=$temp[1];
		}
			
			
		$this->checkNewAds();		
		$aAds=$this->adsData[$img_position];
		$this->currentAd=rand(0,count($aAds)-1);
		$this->checkPriority($img_position);
		$p=0; $arr=array();
		foreach($aAds as $darr)
		{
			$arr[$p]['id'] = $darr->getId();
			$arr[$p]['ad_type'] = $darr->getAdType();
			$arr[$p]['ad_name'] = $darr->getAdName();
			$arr[$p]['ad_target'] = $darr->getAdTarget();
			$arr[$p]['ccounter_id'] = $darr->getCcounterId();
			$arr[$p]['ad_target'] = $darr->getAdTarget();
			$p++;
		}
		
		$adIndex=$this->currentAd;
		if($aAds[$adIndex]){
			//$str_addCount=$this->getDisplayCount($aAds[$adIndex]['id'])+1;
			$str_addCount=$this->getDisplayCount($arr[$adIndex]['id'])+1;
			//db_query("update ads set display_count=".($str_addCount)." where id=".$aAds[$adIndex]['id']);
			if($arr[$adIndex]['id'])
			{
				//$select_displaycnt_cri = new Criteria();
				//$select_displaycnt_cri->add(AdsPeer::ID,$arr[$adIndex]['id']);
				//$select_displaycnt_data = AdsPeer::doSelectOne($select_displaycnt_cri);
				
				$sbtAds = new SbtAds();
				$select_displaycnt_data = $sbtAds->getPerticularSbtAd($arr[$adIndex]['id']);
				
				if($select_displaycnt_data)
				{
					$select_displaycnt_data->setDisplayCount($str_addCount);
					$select_displaycnt_data->save();
				}
			}
		}

		if(strstr($arr[$adIndex]['ad_name'],'images/reklam'))
			$path = $arr[$adIndex]['ad_name'];
		else
			$path = str_replace('reklam','images/reklam',$arr[$adIndex]['ad_name']);
		
		//switch($aAds[$adIndex]['ad_type']){
		switch($arr[$adIndex]['ad_type']){
			case 'swf':	
						$return_str='<div style="float:left;position:relative;" id="imgprev'.$arr[$adIndex]['id'].'"><a '.($arr[$adIndex]['ad_target']=='B'?' target=_blank ':'').' href="http://'.$_SERVER['HTTP_HOST'].'/ccount/click.php?id='.$arr[$adIndex]['ccounter_id'].'" style="z-index: 1000; float:left; position:absolute; border:0px solid blue; width:'.$width.'px; height:'.$height.'px;"><img src="http://'.$_SERVER['HTTP_HOST'].'/images/reklam/transp.gif" width="'.$width.'" height="'.$height.'" border="0" style="cursor:pointer" /></a><embed src="'.$path.'" quality="high" wmode="transparent"  type="application/x-shockwave-flash" '.($width!=NULL?'width="'.$width.'"':'').' '.($height!=NULL?'height="'.$height.'"':'').'></embed></div>';
						break;
			case 'img':
						$return_str= '<a href="http://'.$_SERVER['HTTP_HOST'].'/ccount/click.php?id='.$arr[$adIndex]['ccounter_id'].'"'.($arr[$adIndex]['ad_target']=='B'?' target=_blank ':'').'><img src="'.$path.'" '.($width!=NULL?'width="'.$width.'"':'').' '.($height!=NULL?'height="'.$height.'"':'').' '.$other.'/></a>';
						break;
			case 'iframe':
						$return_str= '<a href="http://'.$_SERVER['HTTP_HOST'].'/ccount/click.php?id='.$arr[$adIndex]['ccounter_id'].'"'.($arr[$adIndex]['ad_target']=='B'?' target=_blank ':'').'><iframe frameborder="0" scrolling="no" bordercolor="#000000" vspace="0" hspace="0" marginheight="0" marginwidth="0" id="aa_if_19144" src="'.$path.'" '.($width!=NULL?'width="'.$width.'"':'').' '.($height!=NULL?'height="'.$height.'"':'').' '.$other.'></iframe></a>';				
						break;
			default:
					$return_str='';
		}		
		
		//$_SESSION['ADPTABLE']=array($this->adsPriority,$this->adsData);
		$current_user->setAttribute('ADPTABLE',array($this->adsPriority,$this->adsData));
		$return_str = str_replace('sisterbt.com',$_SERVER['HTTP_HOST'],$return_str);
		//if(!strstr($return_str,'images/reklam'))
			//$return_str = str_replace('reklam','images/reklam',$return_str);
		return $return_str;			
	}
	
	public function checkPriority($pos){
		$adIndex=$this->currentAd;
		$tempArr=$this->adsPriority[$pos];
		$adVal=0;		
		$dArr=$this->adsData[$pos];
        $p=0; $arr=array();
		foreach($dArr as $darr)
		{
			$arr[$p++]['priority'] = $darr->getPriority();
		}

		$countRec= count($dArr);
		if(!isset($tempArr[$adIndex]))
			$tempArr[$adIndex]=0;					
		if($tempArr[$adIndex]<10){
			//$tempArr[$adIndex]=$tempArr[$adIndex]+(($dArr[$adIndex]['priority']/$countRec) * 10);
			$tempArr[$adIndex]=$tempArr[$adIndex]+(($arr[$adIndex]['priority']/$countRec) * 10);
			$this->currentAd=$adIndex;
			$adVal=$adIndex+1;
		}
		else{
			
			for($i=0;$i<count($tempArr);$i++){
				if($tempArr[$i]<10){				
					//$tempArr[$i]=$tempArr[$i]+(($dArr[$i]['priority']/$countRec) * 10);
					$tempArr[$i]=$tempArr[$i]+(($arr[$i]['priority']/$countRec) * 10);
					$this->currentAd=$i;
					$adVal=$i+1;
					break;
				}
			}
		}	
		if(!$adVal){		
			$this->resetPriority($pos);						
			$this->checkPriority($pos);
		}
		else
			$this->adsPriority[$pos]=$tempArr;			
	}	
	
	public function resetPriority($pos){
		$current_user = sfContext::getInstance()->getUser();
		for($i=0;$i<count($this->adsPriority[$pos]);$i++){
			$this->adsPriority[$pos][$i]=0;
		}
		//$_SESSION['ADPTABLE']=array($this->adsPriority,$this->adsData);
		$current_user->setAttribute('ADPTABLE',array($this->adsPriority,$this->adsData));
	}
	
	public function displayData(){
		echo "---------------------------------Ads<br>";
		var_dump($this->adsData);
		echo "---------------------------------Priority<br>";
		var_dump($this->adsPriority);
	}
	
	
	
}
?>