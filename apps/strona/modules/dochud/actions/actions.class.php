<?php

/**
 * dochud actions.
 *
 * @package    ug
 * @subpackage dochud
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dochudActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executeDodaj(sfWebRequest $request)
  {
    $dochod = new Dochod_osoby();
    $dochod->setOsobaId($request->getParameter('id'));
    $dochod->setTyp($request->getParameter('typ'));
    $dochod->setWartosc($request->getParameter('dochod'));
    $dochod->save();
  }
  
  public function executeUsun(sfWebRequest $request)
  {
    $deleted = Doctrine_Query::create()
        ->delete()
        ->from('dochod_osoby')
        ->andWhere('id = ?', $request->getParameter('id'))
        ->execute();
  }
  
  public function executeEdytuj(sfWebRequest $request)
  {
    Doctrine_Query::create()
      ->update('dochod_osoby d')
      ->set('d.wartosc','?', $request->getParameter('dochod') )
      ->where('d.id = ?', $request->getParameter('id') )
      ->execute();
  }

  public function executeDodajr(sfWebRequest $request)
  {
    $dochod = new dochod_rodziny();
    $dochod->setRodzinayId($request->getParameter('id'));
    $dochod->setTyp($request->getParameter('typ'));
    $dochod->setWartosc($request->getParameter('wartosc'));
    $dochod->save();
  }
  
  public function executeUsunr(sfWebRequest $request)
  {
    $deleted = Doctrine_Query::create()
        ->delete()
        ->from('dohud_rodziny')
        ->andWhere('id = ?', $request->getParameter('id'))
        ->execute();
  }  
}
