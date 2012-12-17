<?php

/**
 * Osoba form base class.
 *
 * @method Osoba getObject() Returns the current form's model object
 *
 * @package    ug
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOsobaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'rodzinay_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rodzina'), 'add_empty' => false)),
      'typ'         => new sfWidgetFormChoice(array('choices' => array('dorosly' => 'dorosly', 'uczen' => 'uczen'))),
      'immie'       => new sfWidgetFormInputText(),
      'nazwisko'    => new sfWidgetFormInputText(),
      'szkala'      => new sfWidgetFormInputText(),
      'klasa'       => new sfWidgetFormInputText(),
      'ziemia'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'rodzinay_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Rodzina'))),
      'typ'         => new sfValidatorChoice(array('choices' => array(0 => 'dorosly', 1 => 'uczen'), 'required' => false)),
      'immie'       => new sfValidatorString(array('max_length' => 255)),
      'nazwisko'    => new sfValidatorString(array('max_length' => 255)),
      'szkala'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'klasa'       => new sfValidatorInteger(array('required' => false)),
      'ziemia'      => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('osoba[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Osoba';
  }

}
