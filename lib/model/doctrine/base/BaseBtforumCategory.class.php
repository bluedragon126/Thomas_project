<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BtforumCategory', 'doctrine');

/**
 * BaseBtforumCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $btforum_category_name
 * @property string $btforum_subcategory_id_list
 * @property Doctrine_Collection $Btforum
 * 
 * @method integer             getId()                          Returns the current record's "id" value
 * @method string              getBtforumCategoryName()         Returns the current record's "btforum_category_name" value
 * @method string              getBtforumSubcategoryIdList()    Returns the current record's "btforum_subcategory_id_list" value
 * @method Doctrine_Collection getBtforum()                     Returns the current record's "Btforum" collection
 * @method BtforumCategory     setId()                          Sets the current record's "id" value
 * @method BtforumCategory     setBtforumCategoryName()         Sets the current record's "btforum_category_name" value
 * @method BtforumCategory     setBtforumSubcategoryIdList()    Sets the current record's "btforum_subcategory_id_list" value
 * @method BtforumCategory     setBtforum()                     Sets the current record's "Btforum" collection
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBtforumCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('btforum_category');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('btforum_category_name', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('btforum_subcategory_id_list', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Btforum', array(
             'local' => 'id',
             'foreign' => 'btforum_category_id'));
    }
}