<?php

/**
 * Dochod_rodziny filter form base class.
 *
 * @package    ug
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDochod_rodzinyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rodzinay_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rodzina'), 'add_empty' => true)),
      'typ'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'wartosc'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'rodzinay_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Rodzina'), 'column' => 'id')),
      'typ'         => new sfValidatorPass(array('required' => false)),
      'wartosc'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('dochod_rodziny_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dochod_rodziny';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'rodzinay_id' => 'ForeignKey',
      'typ'         => 'Text',
      'wartosc'     => 'Number',
    );
  }
}
