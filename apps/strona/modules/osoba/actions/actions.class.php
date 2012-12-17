<?php

/**
 * osoba actions.
 *
 * @package    ug
 * @subpackage osoba
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class osobaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  public function executeUsun(sfWebRequest $request)
  {
    $deleted = Doctrine_Query::create()
        ->delete()
        ->from('osoba')
        ->andWhere('id = ?', $request->getParameter('id'))
        ->execute();
  }
  public function executeZiemia(sfWebRequest $request)
  {
    Doctrine_Query::create()
      ->update('osoba')
      ->set('ziemia','?',$request->getParameter('ziemia') )
      ->where('id = ?', $request->getParameter('id') )
      ->execute();
  }
}
