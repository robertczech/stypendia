<?php

/**
 * BaseOsoba
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $rodzinay_id
 * @property enum $typ
 * @property string $immie
 * @property string $nazwisko
 * @property string $szkala
 * @property integer $klasa
 * @property float $ziemia
 * @property Rodzina $Rodzina
 * @property Doctrine_Collection $Dochud_osoby
 * 
 * @method integer             getRodzinayId()   Returns the current record's "rodzinay_id" value
 * @method enum                getTyp()          Returns the current record's "typ" value
 * @method string              getImmie()        Returns the current record's "immie" value
 * @method string              getNazwisko()     Returns the current record's "nazwisko" value
 * @method string              getSzkala()       Returns the current record's "szkala" value
 * @method integer             getKlasa()        Returns the current record's "klasa" value
 * @method float               getZiemia()       Returns the current record's "ziemia" value
 * @method Rodzina             getRodzina()      Returns the current record's "Rodzina" value
 * @method Doctrine_Collection getDochudOsoby()  Returns the current record's "Dochud_osoby" collection
 * @method Osoba               setRodzinayId()   Sets the current record's "rodzinay_id" value
 * @method Osoba               setTyp()          Sets the current record's "typ" value
 * @method Osoba               setImmie()        Sets the current record's "immie" value
 * @method Osoba               setNazwisko()     Sets the current record's "nazwisko" value
 * @method Osoba               setSzkala()       Sets the current record's "szkala" value
 * @method Osoba               setKlasa()        Sets the current record's "klasa" value
 * @method Osoba               setZiemia()       Sets the current record's "ziemia" value
 * @method Osoba               setRodzina()      Sets the current record's "Rodzina" value
 * @method Osoba               setDochudOsoby()  Sets the current record's "Dochud_osoby" collection
 * 
 * @package    ug
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOsoba extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('osoba');
        $this->hasColumn('rodzinay_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('typ', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'dorosly',
              1 => 'uczen',
             ),
             ));
        $this->hasColumn('immie', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('nazwisko', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('szkala', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('klasa', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('ziemia', 'float', 8, array(
             'type' => 'float',
             'scale' => 4,
             'default' => 0,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Rodzina', array(
             'local' => 'rodzinay_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Dochod_osoby as Dochud_osoby', array(
             'local' => 'id',
             'foreign' => 'osoba_id'));
    }
}