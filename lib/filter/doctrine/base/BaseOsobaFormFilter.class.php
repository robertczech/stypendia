<?php

/**
 * Osoba filter form base class.
 *
 * @package    ug
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOsobaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rodzinay_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rodzina'), 'add_empty' => true)),
      'typ'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'dorosly' => 'dorosly', 'uczen' => 'uczen'))),
      'immie'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nazwisko'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'szkala'      => new sfWidgetFormFilterInput(),
      'klasa'       => new sfWidgetFormFilterInput(),
      'ziemia'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'rodzinay_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Rodzina'), 'column' => 'id')),
      'typ'         => new sfValidatorChoice(array('required' => false, 'choices' => array('dorosly' => 'dorosly', 'uczen' => 'uczen'))),
      'immie'       => new sfValidatorPass(array('required' => false)),
      'nazwisko'    => new sfValidatorPass(array('required' => false)),
      'szkala'      => new sfValidatorPass(array('required' => false)),
      'klasa'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ziemia'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('osoba_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Osoba';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'rodzinay_id' => 'ForeignKey',
      'typ'         => 'Enum',
      'immie'       => 'Text',
      'nazwisko'    => 'Text',
      'szkala'      => 'Text',
      'klasa'       => 'Number',
      'ziemia'      => 'Number',
    );
  }
}
