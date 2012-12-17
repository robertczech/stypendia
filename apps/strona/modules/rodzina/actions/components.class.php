<?php

class rodzinaComponents extends sfComponents
{

  public function executeLista_rodzin(sfWebRequest $request)
  {
    $q = Doctrine_Query::create()
    ->select('*')
    ->from('rodzina');

    $this->rodziny = $q->execute();

  }
}
