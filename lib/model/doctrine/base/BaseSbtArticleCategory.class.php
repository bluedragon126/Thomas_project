<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SbtArticleCategory', 'doctrine');

/**
 * BaseSbtArticleCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $sbt_category_name
 * @property Doctrine_Collection $SbtAnalysis
 * @property Doctrine_Collection $SbtUserBlog
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method string              getSbtCategoryName()   Returns the current record's "sbt_category_name" value
 * @method Doctrine_Collection getSbtAnalysis()       Returns the current record's "SbtAnalysis" collection
 * @method Doctrine_Collection getSbtUserBlog()       Returns the current record's "SbtUserBlog" collection
 * @method SbtArticleCategory  setId()                Sets the current record's "id" value
 * @method SbtArticleCategory  setSbtCategoryName()   Sets the current record's "sbt_category_name" value
 * @method SbtArticleCategory  setSbtAnalysis()       Sets the current record's "SbtAnalysis" collection
 * @method SbtArticleCategory  setSbtUserBlog()       Sets the current record's "SbtUserBlog" collection
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSbtArticleCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sbt_article_category');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('sbt_category_name', 'string', 100, array(
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
             'foreign' => 'analysis_category_id'));

        $this->hasMany('SbtUserBlog', array(
             'local' => 'id',
             'foreign' => 'ublog_category_id'));
    }
}