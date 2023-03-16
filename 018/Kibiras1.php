<?php

class Kibiras1 {

    protected $akmenuKiekis, $numeris;


    public function __construct(int $jauYra, int $numeris)
    {
        $this->akmenuKiekis = $jauYra;
        $this->numeris = $numeris;
    }

    public function __clone()
    {
        $this->numeris = 5;
    }

    public function prideti1Akmeni() :void
    {
        $this->akmenuKiekis++;
    }

    public function pridetiDaugAkmenu(int $kiekis) :void
    {
        $this->akmenuKiekis += $kiekis;
    }

    public function kiekPririnktaAkmenu() :void
    {
        echo '<h2>Nr.:'. $this->numeris .' pririnkta: ' .$this->akmenuKiekis .'</h2>'; 
    }

}