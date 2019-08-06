<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ContactUs', 'doctrine');

/**
 * BaseContactUs
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $code
 * @property string $subject
 * @property string $content
 * @property string $type
 * 
 * @method integer   getId()      Returns the current record's "id" value
 * @method string    getCode()    Returns the current record's "code" value
 * @method string    getSubject() Returns the current record's "subject" value
 * @method string    getContent() Returns the current record's "content" value
 * @method string    getType()    Returns the current record's "type" value
 * @method ContactUs setId()      Sets the current record's "id" value
 * @method ContactUs setCode()    Sets the current record's "code" value
 * @method ContactUs setSubject() Sets the current record's "subject" value
 * @method ContactUs setContent() Sets the current record's "content" value
 * @method ContactUs setType()    Sets the current record's "type" value
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseContactUs extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('contact_us');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('code', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('subject', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('type', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}