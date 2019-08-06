<?php
 
/**
 * SbtBlogProfile form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AddSbtBlogProfileForm extends BaseSbtBlogProfileForm
{
  public function configure()
  {
      $this->setWidgets(array(
    //'id'                           => new sfWidgetFormInputHidden(),
      'user_id'                      => new sfWidgetFormInputHidden(),
      'my_own_writing'               => new sfWidgetFormTextarea(),/*new sfWidgetFormTextareaTinyMCE(array(
								  'width'  => 500,
								  'height' => 350,
								  'config' => 'relative_urls : 0,
								   plugins:"emotions,preview,visualchars",
								   theme_advanced_disable: "anchor,visualaid,image",
								   theme_advanced_buttons1:"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect",
								   theme_advanced_buttons2 :"bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,code,|,forecolor",
								   theme_advanced_resizing : false,
								   theme_advanced_buttons3:"emotions"',
									)),*/
      'user_title'                   => new sfWidgetFormInputText(),
      'not_on_stock'                   => new sfWidgetFormInputText(),
      'type_of_speculator'           => new sfWidgetFormInputText(),
      'broker_used'                  => new sfWidgetFormInputText(),
      'my_trade'                     => new sfWidgetFormInputText(),
      'my_occupation'                => new sfWidgetFormInputText(),
      'is_millionaire'               => new sfWidgetFormInputText(),
      'my_best_trade'                => new sfWidgetFormTextarea(),
      'my_worst_trade'               => new sfWidgetFormTextarea(),
      'my_five_best_recommendations' => new sfWidgetFormInputHidden(),
      'my_shortlist'                 => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
    //'id'                           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'                      => new sfValidatorInteger(),
      'my_own_writing'               => new sfValidatorString(array('required' => false)),
      'user_title'                   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'not_on_stock'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'type_of_speculator'           => new sfValidatorString(array('required' => false)),
      'broker_used'                  => new sfValidatorString(array('required' => false)),
      'my_trade'                     => new sfValidatorString(array('required' => false)),
      'my_occupation'                => new sfValidatorString(array('required' => false)),
      'is_millionaire'               => new sfValidatorString(array('required' => false)),
      'my_best_trade'                => new sfValidatorString(array('required' => false)),
      'my_worst_trade'               => new sfValidatorString(array('required' => false)),
      'my_five_best_recommendations' => new sfValidatorString(array('required' => false)),
      'my_shortlist'                 => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_blog_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
