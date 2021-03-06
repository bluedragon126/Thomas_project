<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SbtUserBlogProfile', 'doctrine');

/**
 * BaseSbtUserBlogProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $blog_header_name
 * @property string $blog_header_name_color
 * @property string $blog_header_info
 * @property string $blog_header_info_color
 * @property string $blog_header_image
 * @property string $blog_page_background_color
 * @property string $blog_profile_img_text
 * @property string $blog_profile_comment
 * @property timestamp $created_at
 * 
 * @method integer            getId()                         Returns the current record's "id" value
 * @method integer            getUserId()                     Returns the current record's "user_id" value
 * @method string             getBlogHeaderName()             Returns the current record's "blog_header_name" value
 * @method string             getBlogHeaderNameColor()        Returns the current record's "blog_header_name_color" value
 * @method string             getBlogHeaderInfo()             Returns the current record's "blog_header_info" value
 * @method string             getBlogHeaderInfoColor()        Returns the current record's "blog_header_info_color" value
 * @method string             getBlogHeaderImage()            Returns the current record's "blog_header_image" value
 * @method string             getBlogPageBackgroundColor()    Returns the current record's "blog_page_background_color" value
 * @method string             getBlogProfileImgText()         Returns the current record's "blog_profile_img_text" value
 * @method string             getBlogProfileComment()         Returns the current record's "blog_profile_comment" value
 * @method timestamp          getCreatedAt()                  Returns the current record's "created_at" value
 * @method SbtUserBlogProfile setId()                         Sets the current record's "id" value
 * @method SbtUserBlogProfile setUserId()                     Sets the current record's "user_id" value
 * @method SbtUserBlogProfile setBlogHeaderName()             Sets the current record's "blog_header_name" value
 * @method SbtUserBlogProfile setBlogHeaderNameColor()        Sets the current record's "blog_header_name_color" value
 * @method SbtUserBlogProfile setBlogHeaderInfo()             Sets the current record's "blog_header_info" value
 * @method SbtUserBlogProfile setBlogHeaderInfoColor()        Sets the current record's "blog_header_info_color" value
 * @method SbtUserBlogProfile setBlogHeaderImage()            Sets the current record's "blog_header_image" value
 * @method SbtUserBlogProfile setBlogPageBackgroundColor()    Sets the current record's "blog_page_background_color" value
 * @method SbtUserBlogProfile setBlogProfileImgText()         Sets the current record's "blog_profile_img_text" value
 * @method SbtUserBlogProfile setBlogProfileComment()         Sets the current record's "blog_profile_comment" value
 * @method SbtUserBlogProfile setCreatedAt()                  Sets the current record's "created_at" value
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSbtUserBlogProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sbt_user_blog_profile');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('blog_header_name', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('blog_header_name_color', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('blog_header_info', 'string', 1000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1000,
             ));
        $this->hasColumn('blog_header_info_color', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('blog_header_image', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('blog_page_background_color', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('blog_profile_img_text', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('blog_profile_comment', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
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
        
    }
}