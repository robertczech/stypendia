<?php

/**
 * formulasz actions.
 *
 * @package    ug
 * @subpackage formulasz
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class formulaszActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new RodzinaForm();
    if ($request->isMethod('post'))    {
        $this->form->bind($request->getParameter('rodzina'));
        if ($this->form->isValid()) {
            $this->form->save();

            $tablica = $request->getParameter('rodzina');
            $q = Doctrine_Query::create()
                ->select('id')
                ->from('rodzina')
                ->where('stpel = ?', $tablica['stpel'])
                ->fetchArray();
            $osoba = new Osoba();
            $osoba->setTyp('dorosly');
            $osoba->setRodzinayId($q[0]['id']);
            $osoba->setNazwisko($tablica['nazwisko']);
            $osoba->setImmie($tablica['immie']);
            $osoba->save();
            $this->redirect('/ug/web/formulasz/osoba?id_r='.$q[0]['id']);
        }
    }
    
  }
  public function executeOsoba(sfWebRequest $request)
  {
    $this->rodzina = $request->getParameter('id_r');
    $this->id = $request->getParameter('id_r');
    $this->form = new OsobaForm();
    $this->form->setDefault("rodzinay_id", $this->rodzina );
    if ($request->isMethod('post'))    {
        $this->form->bind($request->getParameter('osoba'));
        if ($this->form->isValid()) {
            $this->form->save();
            $this->form = new OsobaForm();
            $this->form->setDefault("rodzinay_id", $this->rodzina );
        }
        $this->duchod = $request->getParameter('dochod');
    }
  }
  public function executeDochud(sfWebRequest $request)
  {
    $this->id =$request->getParameter('id');
  }
}