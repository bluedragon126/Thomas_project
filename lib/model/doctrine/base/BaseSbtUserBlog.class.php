<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SbtUserBlog', 'doctrine');

/**
 * BaseSbtUserBlog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $author_id
 * @property integer $ublog_category_id
 * @property integer $ublog_type_id
 * @property integer $ublog_object_id
 * @property integer $ublog_market_id
 * @property integer $ublog_stocklist_id
 * @property integer $ublog_sector_id
 * @property string $ublog_title
 * @property string $ublog_description
 * @property integer $ublog_views
 * @property integer $ublog_votes
 * @property timestamp $updated_at
 * @property timestamp $created_at
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $SbtBlogComment
 * @property SbtObject $SbtObject
 * @property SbtArticleCategory $SbtArticleCategory
 * @property SbtArticleType $SbtArticleType
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method integer             getAuthorId()           Returns the current record's "author_id" value
 * @method integer             getUblogCategoryId()    Returns the current record's "ublog_category_id" value
 * @method integer             getUblogTypeId()        Returns the current record's "ublog_type_id" value
 * @method integer             getUblogObjectId()      Returns the current record's "ublog_object_id" value
 * @method integer             getUblogMarketId()      Returns the current record's "ublog_market_id" value
 * @method integer             getUblogStocklistId()   Returns the current record's "ublog_stocklist_id" value
 * @method integer             getUblogSectorId()      Returns the current record's "ublog_sector_id" value
 * @method string              getUblogTitle()         Returns the current record's "ublog_title" value
 * @method string              getUblogDescription()   Returns the current record's "ublog_description" value
 * @method integer             getUblogViews()         Returns the current record's "ublog_views" value
 * @method integer             getUblogVotes()         Returns the current record's "ublog_votes" value
 * @method timestamp           getUpdatedAt()          Returns the current record's "updated_at" value
 * @method timestamp           getCreatedAt()          Returns the current record's "created_at" value
 * @method sfGuardUser         getSfGuardUser()        Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getSbtBlogComment()     Returns the current record's "SbtBlogComment" collection
 * @method SbtObject           getSbtObject()          Returns the current record's "SbtObject" value
 * @method SbtArticleCategory  getSbtArticleCategory() Returns the current record's "SbtArticleCategory" value
 * @method SbtArticleType      getSbtArticleType()     Returns the current record's "SbtArticleType" value
 * @method SbtUserBlog         setId()                 Sets the current record's "id" value
 * @method SbtUserBlog         setAuthorId()           Sets the current record's "author_id" value
 * @method SbtUserBlog         setUblogCategoryId()    Sets the current record's "ublog_category_id" value
 * @method SbtUserBlog         setUblogTypeId()        Sets the current record's "ublog_type_id" value
 * @method SbtUserBlog         setUblogObjectId()      Sets the current record's "ublog_object_id" value
 * @method SbtUserBlog         setUblogMarketId()      Sets the current record's "ublog_market_id" value
 * @method SbtUserBlog         setUblogStocklistId()   Sets the current record's "ublog_stocklist_id" value
 * @method SbtUserBlog         setUblogSectorId()      Sets the current record's "ublog_sector_id" value
 * @method SbtUserBlog         setUblogTitle()         Sets the current record's "ublog_title" value
 * @method SbtUserBlog         setUblogDescription()   Sets the current record's "ublog_description" value
 * @method SbtUserBlog         setUblogViews()         Sets the current record's "ublog_views" value
 * @method SbtUserBlog         setUblogVotes()         Sets the current record's "ublog_votes" value
 * @method SbtUserBlog         setUpdatedAt()          Sets the current record's "updated_at" value
 * @method SbtUserBlog         setCreatedAt()          Sets the current record's "created_at" value
 * @method SbtUserBlog         setSfGuardUser()        Sets the current record's "sfGuardUser" value
 * @method SbtUserBlog         setSbtBlogComment()     Sets the current record's "SbtBlogComment" collection
 * @method SbtUserBlog         setSbtObject()          Sets the current record's "SbtObject" value
 * @method SbtUserBlog         setSbtArticleCategory() Sets the current record's "SbtArticleCategory" value
 * @method SbtUserBlog         setSbtArticleType()     Sets the current record's "SbtArticleType" value
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSbtUserBlog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sbt_user_blog');
        $this->hasColumn('id', 'integer', 4, array(
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
        $this->hasColumn('ublog_category_id', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('ublog_type_id', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('ublog_object_id', 'integer', 3, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 3,
             ));
        $this->hasColumn('ublog_market_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('ublog_stocklist_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('ublog_sector_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('ublog_title', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('ublog_description', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('ublog_views', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('ublog_votes', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'author_id',
             'foreign' => 'id'));

        $this->hasMany('SbtBlogComment', array(
             'local' => 'id',
             'foreign' => 'blog_id'));

        $this->hasOne('SbtObject', array(
             'local' => 'ublog_object_id',
             'foreign' => 'id'));

        $this->hasOne('SbtArticleCategory', array(
             'local' => 'ublog_category_id',
             'foreign' => 'id'));

        $this->hasOne('SbtArticleType', array(
             'local' => 'ublog_type_id',
             'foreign' => 'id'));
    }
}