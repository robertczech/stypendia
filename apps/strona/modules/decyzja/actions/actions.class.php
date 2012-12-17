<?php

/**
 * decyzja actions.
 *
 * @package    ug
 * @subpackage decyzja
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class decyzjaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
    {
      $q = Doctrine_Query::create()
        ->select('*')
        ->from('rodzina');
      $rodziny = $q->execute();
      
     $q = Doctrine_Query::create()
        ->select('*')
        ->from('stawqka');
     $stawki = $q->fetchArray();
      
      foreach ($rodziny as $rodzina){
//        $rodzina  = new Rodzina();
//        $rodzina->uczniowie()
        $this->html =" <p class=\"Standard\" align=\"right\"><strong>Rossosz 12.11.2012r</strong></p>
                      <p class=\"Standard\"><strong>SEG.4462.48.2012.AH</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>&nbsp;&nbsp;</strong></p>
                      <p class=\"Standard\" align=\"center\"><strong><span style=\"text-decoration: underline;\">&nbsp;</span></strong></p>
                      <p class=\"Standard\" align=\"center\"><strong><span style=\"text-decoration: underline;\">&nbsp;</span></strong></p>
                      <p class=\"Standard\" align=\"center\"><strong><span style=\"text-decoration: underline;\">DECYZJA</span></strong></p>
                      <p class=\"Standard\" align=\"center\"><strong><span style=\"text-decoration: underline;\">&nbsp;</span></strong></p>
                      <p class=\"Standard\" align=\"center\"><strong>W SPRAWIE POMOCY MATERIALNEJ O CHARAKTERZE SOCJALNYM</strong></p>
                      <p class=\"Standard\" align=\"center\"><strong>&nbsp;</strong></p>
                      <p class=\"Standard\"><strong>&nbsp; &nbsp;</strong><strong>&nbsp;</strong>&nbsp;Na podstawie art. 104 &sect; 1 ustawy z dnia 14 czerwca 1960 r. &ndash; Kodeks postępowania administracyjnego (Dz. U. z 2000 r. Nr 98, poz. 1071 z p&oacute;źn. zm.), &nbsp;art. 90m ust.1 i&nbsp; art. 90n ust.<br /> 1 ustawy z dnia 7 września 1991r. o systemie oświaty (Dz. U. z 2004r. Nr 256, poz. 2572 z p&oacute;źń. zm.) oraz Uchwały Nr XVIII/104/2005 Rady Gminy Rossosz z dnia 30 marca 2005r w sprawie uchwalenia Regulaminu udzielania pomocy materialnej o charakterze socjalnym dla uczni&oacute;w zamieszkałych na terenie Gminy Rossosz (Dz. Urz. Woj. Lubelskiego z 2005r Nr 131, poz. 2414 z p&oacute;źń. zm.), po rozpatrzeniu wniosku&nbsp; złożonego przez <strong>
                      Panią ".$rodzina->getImmie()." ".$rodzina->getNazwisko()." zam. ".$rodzina->getKod()." ".$rodzina->getMiescowosc().", ul. ".$rodzina->getUl()." ".$rodzina->getDom()." </strong>o ustalenie prawa do otrzymania pomocy materialnej o charakterze socjalnym dla uczni&oacute;w</p>
                      <p class=\"Standard\">&nbsp;</p>
                      <p class=\"Standard\" align=\"center\"><strong>P O S T A N A W I A M</strong></p>
                      <p class=\"Standard\" align=\"center\"><strong>&nbsp;</strong></p>
                      <p class=\"Standard\">przyznać pomoc materialną o charakterze socjalnym, miesięcznie na okres od 1 października 2012r. do 31grudnia 2012r.:</p>";
        foreach ($rodzina->uczniowie() as $uczen){
           $this->html .= "<p class=\"Standard\"><strong>".$uczen->getImmie()." ".$uczen->getNazwisko()."  </strong>uczniowi k".$uczen->getKlasa().". ".$uczen->getSzkala()." <strong>w&nbsp; wysokości ".$stawki[(3 - $rodzina->zakres())]['wartosc']."zł x 3 miesiące &ndash; ".($stawki[(3 - $rodzina->zakres())]['wartosc']*3)."zł (słownie: dwieście siedemdziesiąt złotych)</strong></p>";
        }
        $rodzina->setDecyzja( $this->html );
        $rodzina->save(); 
      }
  }
}
