<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Article', 'doctrine');

/**
 * BaseArticle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $article_id
 * @property integer $author_id
 * @property timestamp $article_date
 * @property integer $category_id
 * @property integer $type_id
 * @property integer $object_id
 * @property integer $btshop_id
 * @property string $price
 * @property string $title
 * @property string $listheader
 * @property string $image
 * @property string $image_text
 * @property string $text
 * @property string $author
 * @property integer $art_statid
 * @property ArticleCategory $ArticleCategory
 * @property ArticleType $ArticleType
 * @property Objekt $Objekt
 * @property ArticleStatus $ArticleStatus
 * @property Doctrine_Collection $ArticleCount
 * @property Doctrine_Collection $BorstArticleComment
 * @property sfGuardUser $sfGuardUser
 * @property BtShopArticle $BtShopArticle
 * 
 * @method integer             getArticleId()           Returns the current record's "article_id" value
 * @method integer             getAuthorId()            Returns the current record's "author_id" value
 * @method timestamp           getArticleDate()         Returns the current record's "article_date" value
 * @method integer             getCategoryId()          Returns the current record's "category_id" value
 * @method integer             getTypeId()              Returns the current record's "type_id" value
 * @method integer             getObjectId()            Returns the current record's "object_id" value
 * @method integer             getBtshopId()            Returns the current record's "btshop_id" value
 * @method string              getPrice()               Returns the current record's "price" value
 * @method string              getTitle()               Returns the current record's "title" value
 * @method string              getListheader()          Returns the current record's "listheader" value
 * @method string              getImage()               Returns the current record's "image" value
 * @method string              getImageText()           Returns the current record's "image_text" value
 * @method string              getText()                Returns the current record's "text" value
 * @method string              getAuthor()              Returns the current record's "author" value
 * @method integer             getArtStatid()           Returns the current record's "art_statid" value
 * @method ArticleCategory     getArticleCategory()     Returns the current record's "ArticleCategory" value
 * @method ArticleType         getArticleType()         Returns the current record's "ArticleType" value
 * @method Objekt              getObjekt()              Returns the current record's "Objekt" value
 * @method ArticleStatus       getArticleStatus()       Returns the current record's "ArticleStatus" value
 * @method Doctrine_Collection getArticleCount()        Returns the current record's "ArticleCount" collection
 * @method Doctrine_Collection getBorstArticleComment() Returns the current record's "BorstArticleComment" collection
 * @method sfGuardUser         getSfGuardUser()         Returns the current record's "sfGuardUser" value
 * @method BtShopArticle       getBtShopArticle()       Returns the current record's "BtShopArticle" value
 * @method Article             setArticleId()           Sets the current record's "article_id" value
 * @method Article             setAuthorId()            Sets the current record's "author_id" value
 * @method Article             setArticleDate()         Sets the current record's "article_date" value
 * @method Article             setCategoryId()          Sets the current record's "category_id" value
 * @method Article             setTypeId()              Sets the current record's "type_id" value
 * @method Article             setObjectId()            Sets the current record's "object_id" value
 * @method Article             setBtshopId()            Sets the current record's "btshop_id" value
 * @method Article             setPrice()               Sets the current record's "price" value
 * @method Article             setTitle()               Sets the current record's "title" value
 * @method Article             setListheader()          Sets the current record's "listheader" value
 * @method Article             setImage()               Sets the current record's "image" value
 * @method Article             setImageText()           Sets the current record's "image_text" value
 * @method Article             setText()                Sets the current record's "text" value
 * @method Article             setAuthor()              Sets the current record's "author" value
 * @method Article             setArtStatid()           Sets the current record's "art_statid" value
 * @method Article             setArticleCategory()     Sets the current record's "ArticleCategory" value
 * @method Article             setArticleType()         Sets the current record's "ArticleType" value
 * @method Article             setObjekt()              Sets the current record's "Objekt" value
 * @method Article             setArticleStatus()       Sets the current record's "ArticleStatus" value
 * @method Article             setArticleCount()        Sets the current record's "ArticleCount" collection
 * @method Article             setBorstArticleComment() Sets the current record's "BorstArticleComment" collection
 * @method Article             setSfGuardUser()         Sets the current record's "sfGuardUser" value
 * @method Article             setBtShopArticle()       Sets the current record's "BtShopArticle" value
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArticle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('article');
        $this->hasColumn('article_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('author_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('article_date', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('category_id', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('type_id', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('object_id', 'integer', 3, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 3,
             ));
        $this->hasColumn('btshop_id', 'integer', 3, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 3,
             ));
        $this->hasColumn('price', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('title', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('listheader', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('image', 'string', 90, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 90,
             ));
        $this->hasColumn('image_text', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('text', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('author', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('art_statid', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ArticleCategory', array(
             'local' => 'category_id',
             'foreign' => 'category_id'));

        $this->hasOne('ArticleType', array(
             'local' => 'type_id',
             'foreign' => 'type_id'));

        $this->hasOne('Objekt', array(
             'local' => 'object_id',
             'foreign' => 'object_id'));

        $this->hasOne('ArticleStatus', array(
             'local' => 'art_statid',
             'foreign' => 'art_statid'));

        $this->hasMany('ArticleCount', array(
             'local' => 'article_id',
             'foreign' => 'art_id'));

        $this->hasMany('BorstArticleComment', array(
             'local' => 'article_id',
             'foreign' => 'article_id'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'author_id',
             'foreign' => 'id'));

        $this->hasOne('BtShopArticle', array(
             'local' => 'btshop_id',
             'foreign' => 'id'));
    }
}