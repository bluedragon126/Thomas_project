<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SbtBlogVoteDetails', 'doctrine');

/**
 * BaseSbtBlogVoteDetails
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $blog_id
 * @property integer $user_id
 * @property integer $vote_type_id
 * @property timestamp $created_at
 * 
 * @method integer            getId()           Returns the current record's "id" value
 * @method integer            getBlogId()       Returns the current record's "blog_id" value
 * @method integer            getUserId()       Returns the current record's "user_id" value
 * @method integer            getVoteTypeId()   Returns the current record's "vote_type_id" value
 * @method timestamp          getCreatedAt()    Returns the current record's "created_at" value
 * @method SbtBlogVoteDetails setId()           Sets the current record's "id" value
 * @method SbtBlogVoteDetails setBlogId()       Sets the current record's "blog_id" value
 * @method SbtBlogVoteDetails setUserId()       Sets the current record's "user_id" value
 * @method SbtBlogVoteDetails setVoteTypeId()   Sets the current record's "vote_type_id" value
 * @method SbtBlogVoteDetails setCreatedAt()    Sets the current record's "created_at" value
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSbtBlogVoteDetails extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sbt_blog_vote_details');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('blog_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('vote_type_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}