<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SbtMessages', 'doctrine');

/**
 * BaseSbtMessages
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $message_to
 * @property integer $message_from
 * @property string $message_detail
 * @property timestamp $created_at
 * @property SfGuardUserProfile $SfGuardUserProfile
 * 
 * @method integer            getId()                 Returns the current record's "id" value
 * @method integer            getMessageTo()          Returns the current record's "message_to" value
 * @method integer            getMessageFrom()        Returns the current record's "message_from" value
 * @method string             getMessageDetail()      Returns the current record's "message_detail" value
 * @method timestamp          getCreatedAt()          Returns the current record's "created_at" value
 * @method SfGuardUserProfile getSfGuardUserProfile() Returns the current record's "SfGuardUserProfile" value
 * @method SbtMessages        setId()                 Sets the current record's "id" value
 * @method SbtMessages        setMessageTo()          Sets the current record's "message_to" value
 * @method SbtMessages        setMessageFrom()        Sets the current record's "message_from" value
 * @method SbtMessages        setMessageDetail()      Sets the current record's "message_detail" value
 * @method SbtMessages        setCreatedAt()          Sets the current record's "created_at" value
 * @method SbtMessages        setSfGuardUserProfile() Sets the current record's "SfGuardUserProfile" value
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSbtMessages extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sbt_messages');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('message_to', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('message_from', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('message_detail', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
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
        $this->hasOne('SfGuardUserProfile', array(
             'local' => 'message_to',
             'foreign' => 'user_id'));
    }
}