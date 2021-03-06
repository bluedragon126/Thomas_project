<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Abon', 'doctrine');

/**
 * BaseAbon
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $abonid
 * @property string $abon_name
 * @property Doctrine_Collection $SfGuardUserProfile
 * 
 * @method integer             getAbonid()             Returns the current record's "abonid" value
 * @method string              getAbonName()           Returns the current record's "abon_name" value
 * @method Doctrine_Collection getSfGuardUserProfile() Returns the current record's "SfGuardUserProfile" collection
 * @method Abon                setAbonid()             Sets the current record's "abonid" value
 * @method Abon                setAbonName()           Sets the current record's "abon_name" value
 * @method Abon                setSfGuardUserProfile() Sets the current record's "SfGuardUserProfile" collection
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAbon extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('abon');
        $this->hasColumn('abonid', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 2,
             ));
        $this->hasColumn('abon_name', 'string', 10, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('SfGuardUserProfile', array(
             'local' => 'abonid',
             'foreign' => 'abonid'));
    }
}