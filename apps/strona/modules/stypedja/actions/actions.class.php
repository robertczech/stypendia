<?php

/**
 * stypedja actions.
 *
 * @package    ug
 * @subpackage stypedja
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class stypedjaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

    $r = Doctrine_Query::create()
        ->select('*')
        ->from('rodzina')
        ->execute();
    
    $suma = array(0,0,0,0);
    foreach ($r as $r_v) {
        for ($i = 0; $i < 3; $i++) {
            if($r_v->zakres() == ($i+1)){
                $suma[$i] += $r_v->liczba_uczniow();
            }
        }
    }
    
    for ($i = 0; $i < 3; $i++) {
    $zmiana = Doctrine_Query::create()
         ->update('stypedja s')
         ->set('s.osoby', $suma[$i])
         ->where('s.typ=?','zakres'.($i+1) )
         ->execute();
    }
    
    $q = Doctrine_Query::create()
        ->select('*')
        ->from('stypedja');
    $this->stypedja = $q->execute();
  }
}
