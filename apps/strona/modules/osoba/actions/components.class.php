<?php

class osobaComponents extends sfComponents
{

  public function executeLista(sfWebRequest $request)
  {
    $q = Doctrine_Query::create()
    ->select('*')
    ->from('osoba')
    ->where('rodzinay_id = ?', $request->getParameter('id_r'));

    $this->osoby = $q->execute();
  }
}
