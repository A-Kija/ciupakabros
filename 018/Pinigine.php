<?php


class Pinigine {

    protected $popieriniaiPinigai = 0, $metaliniaiPinigai = 0;

    public function ideti(float $kiekis) :void
    {
        if ($kiekis <= 2) {
            $this->metaliniaiPinigai += $kiekis;
        } else {
            $this->popieriniaiPinigai += $kiekis;
        }
    }

    public function skaiciuoti() :void
    {
        echo '<h2>'. ($this->metaliniaiPinigai + $this->popieriniaiPinigai) .'</h2>'; 
        echo '<h2> metalo: '. $this->metaliniaiPinigai .'</h2>'; 
        echo '<h2> popieriaus: '. $this->popieriniaiPinigai .'</h2>'; 
    }

}