<?php

class dochudComponents extends sfComponents
{

  public function executeLista(sfWebRequest $request)
  {
    $q = Doctrine_Query::create()
    ->select('*')
    ->from('dochod_osoby')
    ->where('osoba_id = ?', $request->getParameter('id'));
    $this->id =$request->getParameter('id');
    $this->dochody = $q->fetchArray();
  }
  public function executeListar(sfWebRequest $request)
  {
    $q = Doctrine_Query::create()
    ->select('*')
    ->from('dochod_rodziny')
    ->where('rodzinay_id = ?', $request->getParameter('id_r'));
    $this->dochody = $q->fetchArray();
  }
}
