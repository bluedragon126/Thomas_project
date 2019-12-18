<?php

/**
 * Article form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleForm extends BaseArticleForm
{
  public function configure()
  {
	  $years = range(2000, 2030);
	  $years_list = array_combine($years, $years);
      $this->setWidgets(array(
      'article_id'   => new sfWidgetFormInputHidden(),
      'author'    => new sfWidgetFormInputHidden(),
      'article_date' => new sfWidgetFormDateTime(array("date" => array('years' => $years_list))),
      'category_id'  => new sfWidgetFormSelect(array('choices' => array())),
      'type_id'      => new sfWidgetFormSelect(array('choices' => array())),
      'object_id'    => new sfWidgetFormSelect(array('choices' => array())),
      'btshop_id'    => new sfWidgetFormSelect(array('choices' => array())),
      //'price'        => new sfWidgetFormInputText(),
      'price' => new sfWidgetFormInputText(array(), array('maxlength' => 6)), 
      'title'        => new sfWidgetFormInputText(),
      'image'        => new sfWidgetFormInputText(),
      'image_text'   => new sfWidgetFormTextarea(),
	  'text'         => new sfWidgetFormTextareaTinyMCE(array(
								  'width'  => 545,
								  'height' => 350,
								  'config' => 'theme : "modern",relative_urls : 0,document_base_url:"https://www.borstjanaren.se/",
								   plugins:"emoticons,preview,visualchars,table,image imagetools,code,link",
								   theme_advanced_disable: "anchor,visualaid",
								   theme_advanced_buttons1:"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect,fontsizeselect",
								   theme_advanced_buttons2 :"pastetext,pasteword,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image,code,|,preview,forecolor",
								   theme_advanced_buttons3:"emoticons"',
									)),
      'author_id'       => new sfWidgetFormSelect(array('choices' =>Doctrine::getTable('Authors')->getAuthorArray())),
      'art_statid'   => new sfWidgetFormSelect(array('choices' => array())),
    ));

    $this->setValidators(array(
      'article_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'article_id', 'required' => false)),
      'author_id'    => new sfValidatorInteger(array('required' => false)),
      'article_date' => new sfValidatorDateTime(array('required' => false)),
      'category_id'  => new sfValidatorInteger(array('required' => false)),
      'type_id'      => new sfValidatorInteger(array('required' => false)),
      'object_id'    => new sfValidatorInteger(array('required' => false)),
      'btshop_id'    => new sfValidatorInteger(array('required' => false)),
      //'price'        => new sfValidatorString(array('required' => false)),
      'price' => new sfValidatorRegex(array('required' => false, 'pattern' => '/^\d{1,20}$/'), array('invalid' => 'Please enter valid number')),    
      'title'        => new sfValidatorString(array('required' => false)),
      'image'        => new sfValidatorString(array('max_length' => 90,'required' => false)),
      'image_text'   => new sfValidatorString(array('required' => false)),
      'text'         => new sfValidatorString(array('required' => false)),
      'author'       => new sfValidatorString(array('max_length' => 30,'required' => false)),
      'art_statid'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
  
  
    public function bind(array $taintedValues = null, array $taintedFiles = null) {
        //echo "<pre>"; print_r($taintedValues); die;
        $vs = $this->validatorSchema;
        if ($taintedValues['art_statid'] != '') {
            if($taintedValues['art_statid'] == 5){
                $vs = $this->validatorSchema['price'];
                $vs->setOption('required', true);
            }                
        }
        parent::bind($taintedValues, $taintedFiles);
    }
}
