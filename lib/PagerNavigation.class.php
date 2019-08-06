<?php

Class PagerNavigation {

    public static function pager_navigation($pager, $uri,$container) {
        $navigation = '';

        if ($pager->haveToPaginate()) {
            $uri .= ( preg_match('/\?/', $uri) ? '&' : '?') . 'page=';

            // First and previous page
            if ($pager->getPage() != 1) {
                $navigation .= '<a onclick="jQuery.ajax({type:\'POST\',dataType:\'html\',success:function(data, textStatus){jQuery(\'#'.$container.'\').html(data);},url:\''.$uri.''.$pager->getFirstpage().'\'}); return false;" href="#"><img src=\'/images/back.gif\'/></a>';
            }
           
            // Pages one by one
            $links = array();
            foreach ($pager->getLinks() as $page) {
                $class = $pager->getPage()==$page?'selected':'';
                $links[] = '<a onclick="jQuery.ajax({type:\'POST\',dataType:\'html\',success:function(data, textStatus){jQuery(\'#'.$container.'\').html(data);},url:\''.$uri.''.$page.'\'}); return false;" href="#" ><span class="'.$class.'">'.$page.'</span></a>';
            }
            $navigation .= join('  ', $links);
            // Next and last page
            if ($pager->getPage() != $pager->getLastPage()) {
                $navigation .= '<a onclick="jQuery.ajax({type:\'POST\',dataType:\'html\',success:function(data, textStatus){jQuery(\'#'.$container.'\').html(data);},url:\''.$uri.''.$pager->getLastPage().'\'}); return false;" href="#"><img src=\'/images/next.gif\'/></a>';
            }
        }

        return $navigation;
    }

    public function setPage($page){
        $this->page = $page;
    }

    public function getPage(){
        return $this->page;
    }

    public function setRecord($record){
        $this->record = $record;
    }
    
    public function getRecord(){
    return $this->record;

        
    }
   public function getResultSet(){
       
       return array_slice($this->record ,($this->getPage()-1)*$this->getPageCount(),$this->getPageCount());
   }
    public function setPageCount($count){
        $this->pageCount = $count;
    }
    public function getPageCount(){
        return $this->pageCount?$this->pageCount:1 ;
    }
    public function getPageNumber(){
        return ceil(count($this->getRecord())/$this->getPageCount());
    }
    public function getLastPage(){
        return $this->getPageNumber();
    }
    public function getFirstPage(){
        return 1;
    }
    public function haveToPaginate(){
        if($this->getPageNumber()>1)
                return 1;
        else
            return 0;
    }
    public function getLinks(){
        $pages = array();
        for($i=1;$i<=$this->getPageNumber();$i++){
            $pages[] = $i;
        }
        return $pages;
    }
    public function getNextPage(){
        return min($this->getPage() + 1, $this->getLastPage());//$this->getPageNumber() + 1;
    }
    public function getPreviousPage(){
        return max($this->getPage() - 1, $this->getFirstPage());//$this->getPageNumber() - 1;
    }
    public static function getPagerLinks($pager, $uri,$container) {
        $navigation = '';

        if ($pager->haveToPaginate()) {
            $uri .= ( preg_match('/\?/', $uri) ? '&' : '?') . 'page=';

            // First and previous page
            if ($pager->getPage() != 1) {
                $navigation .= '<a onclick="jQuery.ajax({type:\'POST\',dataType:\'html\',success:function(data, textStatus){jQuery(\'#'.$container.'\').html(data);},url:\''.$uri.''.$pager->getFirstpage().'\'}); return false;" href="#"><img src=\'/images/pag_arrow_left.jpg\'/>First</a>';                
            }
            $navigation .= '<a onclick="jQuery.ajax({type:\'POST\',dataType:\'html\',success:function(data, textStatus){jQuery(\'#'.$container.'\').html(data);},url:\''.$uri.''.$pager->getPreviousPage().'\'}); return false;" href="#"><img src=\'/images/pag_arrow_left.jpg\'/>Prev</a>';
            // Pages one by one getPreviousPage
            $links = array();
            foreach ($pager->getLinks() as $page) {
                $class = $pager->getPage()==$page?'selected':'';
                $links[] = '<a onclick="jQuery.ajax({type:\'POST\',dataType:\'html\',success:function(data, textStatus){jQuery(\'#'.$container.'\').html(data);},url:\''.$uri.''.$page.'\'}); return false;" href="#" ><span class="'.$class.'">'.$page.'</span></a>';
            }
           if(count(array_slice($links, $pager->getPage()-1,5))>5)
                $links =array_slice($links, $pager->getPage()-1,5);
           
            $navigation .= join('  ', $links);
            // Next and last page
           $navigation .= '<a onclick="jQuery.ajax({type:\'POST\',dataType:\'html\',success:function(data, textStatus){jQuery(\'#'.$container.'\').html(data);},url:\''.$uri.''.$pager->getNextPage().'\'}); return false;" href="#"><img src=\'/images/pag_arrow_right.jpg\'/>Next</a>';
            if ($pager->getPage() != $pager->getLastPage()) {                
                $navigation .= '<a onclick="jQuery.ajax({type:\'POST\',dataType:\'html\',success:function(data, textStatus){jQuery(\'#'.$container.'\').html(data);},url:\''.$uri.''.$pager->getLastPage().'\'}); return false;" href="#"><img src=\'/images/pag_arrow_right.jpg\'/>Last</a>';
            }
        }

        return $navigation;
    }
}
