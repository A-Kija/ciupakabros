<?php

class Kibiras2 {

    private static $akmenuKiekisVisuoseKibiruose = 0;
    private $akmenuKiekis = 0;

    public static function bendrasAkmenuKiekisS() : int
    {
        return self::$akmenuKiekisVisuoseKibiruose;
    }

    public function bendrasAkmenuKiekisN() : int
    {
        return self::$akmenuKiekisVisuoseKibiruose;
    }

    public function prideti1Akmeni() : void
    {
        $this->akmenuKiekis++;
        self::$akmenuKiekisVisuoseKibiruose++;
    }

    public function pridetiDaugAkmenu(int $kiekis) : void
    {
        $this->akmenuKiekis += $kiekis;
        self::$akmenuKiekisVisuoseKibiruose += $kiekis;
    }
}