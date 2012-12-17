<?php

/**
 * Dochod_osoby filter form base class.
 *
 * @package    ug
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDochod_osobyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'osoba_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Osoba'), 'add_empty' => true)),
      'typ'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'wartosc'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'osoba_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Osoba'), 'column' => 'id')),
      'typ'      => new sfValidatorPass(array('required' => false)),
      'wartosc'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('dochod_osoby_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dochod_osoby';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'osoba_id' => 'ForeignKey',
      'typ'      => 'Text',
      'wartosc'  => 'Number',
    );
  }
}
