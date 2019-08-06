<?php

class SbtVisitsTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('SbtVisits');
    }

    public static function incrementVisit() {
        $query = 'update sbt_visits set visit_count = visit_count+1 where id = 1';
        Doctrine_Manager::getInstance()->getCurrentConnection()->execute($query);
    }

    public static function getLastVisitCount() {
        $sbtVisit = Doctrine::getTable('SbtVisits')->find(1);
        return $sbtVisit? $sbtVisit->visit_count : 0;
    }

}