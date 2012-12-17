<?php

class stawkaComponents extends sfComponents
{

  public function executeLista(sfWebRequest $request)
  {
    $q = Doctrine_Query::create()
    ->select('*')
    ->from('stawqka');

    $this->stawki = $q->execute();
  }
}
