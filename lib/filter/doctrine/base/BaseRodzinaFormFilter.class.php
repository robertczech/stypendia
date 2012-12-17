<?php

/**
 * Rodzina filter form base class.
 *
 * @package    ug
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRodzinaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'stpel'      => new sfWidgetFormFilterInput(),
      'immie'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nazwisko'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'miescowosc' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'kod'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ul'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dom'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lokal'      => new sfWidgetFormFilterInput(),
      'telefon'    => new sfWidgetFormFilterInput(),
      'decyzja'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'stpel'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'immie'      => new sfValidatorPass(array('required' => false)),
      'nazwisko'   => new sfValidatorPass(array('required' => false)),
      'miescowosc' => new sfValidatorPass(array('required' => false)),
      'kod'        => new sfValidatorPass(array('required' => false)),
      'ul'         => new sfValidatorPass(array('required' => false)),
      'dom'        => new sfValidatorPass(array('required' => false)),
      'lokal'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'telefon'    => new sfValidatorPass(array('required' => false)),
      'decyzja'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rodzina_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rodzina';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'stpel'      => 'Number',
      'immie'      => 'Text',
      'nazwisko'   => 'Text',
      'miescowosc' => 'Text',
      'kod'        => 'Text',
      'ul'         => 'Text',
      'dom'        => 'Text',
      'lokal'      => 'Number',
      'telefon'    => 'Text',
      'decyzja'    => 'Text',
    );
  }
}
