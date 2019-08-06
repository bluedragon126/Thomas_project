<?php


class BtchartCompanyDetailsTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BtchartCompanyDetails');
    }
    
    public function getSearchedBtchartQuery($word,$column_id=NULL,$order=NULL,$add_param)
    {
        if($word)
        {
            $query = Doctrine_Query::create()->from('BtchartCompanyDetails bcd')
                ->where("bcd.company_name LIKE '%".$word."%'")
                ->orWhere("bcd.company_symbol LIKE '%".$word."%'")
                ->innerJoin("bcd.BtchartCompanyCategory bcc")
                ->andWhere("bcd.active = 1");
            if($add_param['stock_type'])
                $query = $query->andWhere("bcd.company_type_id = ?",$add_param['stock_type']);
			
            switch($column_id)
			{
				case 'company_name': $query = $query->orderBy('bcd.company_name '.$order); break;
				case 'company_symbol': $query = $query->orderBy('bcd.company_symbol '.$order); break;
				case 'company_type': $query = $query->orderBy('bcc.company_type '.$order); break;
			}                         
        }
        else
            $query = NULL;
        return $query;
    }
    public function getAdvancedSearchedBtchartQuery($arr,$column_id,$order)
    {
        
        if(!$arr['phrase_in_page'] && !$arr['adv_search_object'] && !$arr['adv_search_sector'] && !$arr['adv_search_market'] && !$arr['adv_search_stock_lista'])
        $arr['phrase_in_page']='no_result_found_condtion_no_match';  // it will not match any record with btf.textarea column            

        if($arr['adv_search_stock_lista'])
            $arr['adv_search_stock_lista'] = $this->getLista($arr['adv_search_stock_lista']);
        if($arr['adv_search_market'])
            $arr['adv_search_market'] = $this->getMarket($arr['adv_search_market']);
        if($arr['adv_search_sector'])
            $arr['adv_search_sector'] = $this->getSector($arr['adv_search_sector']);
        if($arr['adv_search_object'])
            $arr['adv_search_object'] = $this->getObject($arr['adv_search_object']);
   
		$query = Doctrine_Query::create()->from('BtchartCompanyDetails bcd');
                
        if($arr['phrase_in_page']) { $query = $query->andWhere("bcd.company_name LIKE '%".$arr['phrase_in_page']."%'"); $param_present = 1; }
        if($arr['phrase_in_page']) { $query = $query->orWhere("bcd.company_symbol LIKE '%".$arr['phrase_in_page']."%'"); $param_present = 1; }
		if($arr['adv_search_stock_lista']) { $query = $query->orWhere('bcd.list =?', $arr['adv_search_stock_lista']); $param_present = 1; }
        if($arr['adv_search_market']) { $query = $query->orWhere('bcd.country =?', $arr['adv_search_market']); $param_present = 1; }
        if($arr['adv_search_sector']) { $query = $query->orWhere('bcd.sector =?', $arr['adv_search_sector']); $param_present = 1; }
        if($arr['adv_search_object']) { $query = $query->orWhere('bcd.company_symbol =?', $arr['adv_search_object']); $param_present = 1; }
        
        $query = $query->innerJoin("bcd.BtchartCompanyCategory bcc");
        $query = $query->andWhere("bcd.active = 1");
        
        if($param_present == 1)
		{
			switch($column_id)
			{
				case 'company_name': $query = $query->orderBy('bcd.company_name '.$order); break;
				case 'company_symbol': $query = $query->orderBy('bcd.company_symbol '.$order); break;
				case 'company_type': $query = $query->orderBy('bcc.company_type '.$order); break;
			}
		}
		else $query = '';
        
        return $query;       
    }
    public function getLista($lista_id)
    {
        $q =Doctrine_Query:: create()
            ->select("sbl.stock_name")
            ->from("SbtStockList sbl")
            ->where("sbl.id = ?",$lista_id)
            ->fetchOne();    
        return $q->stock_name;   
    }            
    public function getMarket($market_id)
    {
        $q =Doctrine_Query:: create()
            ->select("sbm.sbt_market_name")
            ->from("SbtMarket sbm")
            ->where("sbm.id = ?",$market_id)
            ->fetchOne();    
        return $q->sbt_market_name;   
    }                
    public function getSector($sector_id)
    {
        $q =Doctrine_Query:: create()
            ->select("sbs.sector_name")
            ->from("SbtSector sbs")
            ->where("sbs.id = ?",$sector_id)
            ->fetchOne();    
        return $q->sector_name;   
    }                    
    public function getObject($object_id)
    {
        $q =Doctrine_Query:: create()
            ->select("obj.object_short_name")
            ->from("SbtObject obj")
            ->where("obj.id = ?",$object_id)
            ->fetchOne();    
        return str_replace("/","",$q->object_short_name);   
    }                        
 }