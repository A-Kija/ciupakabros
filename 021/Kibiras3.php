<?php

class Kibiras3 {

    protected $akmenuKiekis, $numeris;


    public function __construct(int $jauYra = 0, int $numeris = 0)
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