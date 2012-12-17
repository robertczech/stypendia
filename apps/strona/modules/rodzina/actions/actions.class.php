<?php

/**
 * rodzina actions.
 *
 * @package    ug
 * @subpackage rodzina
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class rodzinaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executeUsun(sfWebRequest $request)
  {
    $deleted = Doctrine_Query::create()
        ->delete()
        ->from('rodzina')
        ->andWhere('id = ?', $request->getParameter('id'))
        ->execute();
  }
}
