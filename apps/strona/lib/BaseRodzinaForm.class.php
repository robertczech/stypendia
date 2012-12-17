<?php

/**
 * Rodzina form base class.
 *
 * @method Rodzina getObject() Returns the current form's model object
 *
 * @package    ug
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRodzinaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'stpel'      => new sfWidgetFormInputHidden(array(), array(
        'value' => strtotime("now")
      )),
      'immie'      => new sfWidgetFormInputText(),
      'nazwisko'   => new sfWidgetFormInputText(),
      'miescowosc' => new sfWidgetFormInputText(),
      'kod'        => new sfWidgetFormInputText(),
      'ul'         => new sfWidgetFormInputText(),
      'dom'        => new sfWidgetFormInputText(),
      'lokal'      => new sfWidgetFormInputText(),
      'telefon'    => new sfWidgetFormInputText(),
      'decyzja'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'stpel'      => new sfValidatorInteger(array('required' => false)),
      'immie'      => new sfValidatorString(array('max_length' => 255)),
      'nazwisko'   => new sfValidatorString(array('max_length' => 255)),
      'miescowosc' => new sfValidatorString(array('max_length' => 255)),
      'kod'        => new sfValidatorString(array('max_length' => 6)),
      'ul'         => new sfValidatorString(array('max_length' => 255)),
      'dom'        => new sfValidatorString(array('max_length' => 255)),
      'lokal'      => new sfValidatorInteger(array('required' => false)),
      'telefon'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'decyzja'    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rodzina[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rodzina';
  }

}
