<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SbtAnalysisStatus', 'doctrine');

/**
 * BaseSbtAnalysisStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $status_name
 * @property Doctrine_Collection $SbtAnalysis
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getStatusName()  Returns the current record's "status_name" value
 * @method Doctrine_Collection getSbtAnalysis() Returns the current record's "SbtAnalysis" collection
 * @method SbtAnalysisStatus   setId()          Sets the current record's "id" value
 * @method SbtAnalysisStatus   setStatusName()  Sets the current record's "status_name" value
 * @method SbtAnalysisStatus   setSbtAnalysis() Sets the current record's "SbtAnalysis" collection
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSbtAnalysisStatus extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sbt_analysis_status');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('status_name', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('SbtAnalysis', array(
             'local' => 'id',
             'foreign' => 'published'));
    }
}