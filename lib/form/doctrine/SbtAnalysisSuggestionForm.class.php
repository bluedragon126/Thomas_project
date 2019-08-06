<?php

/**
 * SbtAnalysisSuggestion form.
 *
 * @package    sisterbt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SbtAnalysisSuggestionForm extends BaseSbtAnalysisSuggestionForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'analysis_id'         => new sfWidgetFormInputHidden(),
      'analysis_suggestion' => new sfWidgetFormTextareaTinyMCE(array(
								  'width'  => 545,
								  'height' => 350,
								  'config' => 'theme : "modern",relative_urls : 0,
								   plugins:"emoticons,preview,visualchars,table,image imagetools,code,link",
								   theme_advanced_disable: "anchor,visualaid,image",
								   theme_advanced_buttons1:"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect",
								   theme_advanced_buttons2 :"bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,code,|,preview,forecolor",
								   theme_advanced_buttons3:"emoticons"',
									)),
      'analysis_status'     => new sfWidgetFormInputHidden(),
      'suggestion_by'       => new sfWidgetFormInputHidden(),
      'created_at'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'analysis_id'         => new sfValidatorInteger(array('required' => false)),
      'analysis_suggestion' => new sfValidatorString(array('required' => false)),
      'analysis_status'     => new sfValidatorInteger(array('required' => false)),
      'suggestion_by'       => new sfValidatorInteger(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sbt_analysis_suggestion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
