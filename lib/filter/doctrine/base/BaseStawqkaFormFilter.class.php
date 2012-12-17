<?php

/**
 * Stawqka filter form base class.
 *
 * @package    ug
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStawqkaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'typ'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'wartosc' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'typ'     => new sfValidatorPass(array('required' => false)),
      'wartosc' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('stawqka_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stawqka';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'typ'     => 'Text',
      'wartosc' => 'Number',
    );
  }
}
