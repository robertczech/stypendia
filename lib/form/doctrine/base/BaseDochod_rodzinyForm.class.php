<?php

/**
 * Dochod_rodziny form base class.
 *
 * @method Dochod_rodziny getObject() Returns the current form's model object
 *
 * @package    ug
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDochod_rodzinyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'rodzinay_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rodzina'), 'add_empty' => false)),
      'typ'         => new sfWidgetFormInputText(),
      'wartosc'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'rodzinay_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Rodzina'))),
      'typ'         => new sfValidatorString(array('max_length' => 255)),
      'wartosc'     => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dochod_rodziny[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dochod_rodziny';
  }

}
