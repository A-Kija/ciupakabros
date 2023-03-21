<?php

class TV {

    public static $kanalai = [
        5 => 'Discovery',
        7 => 'Animal Planet',
        55 => 'MTV'
    ];

    public $kanalas = 5;

    public function koksKanalasIjungtas()
    {
       echo '<h3>' . self::$kanalai[$this->kanalas] . '</h3>';
    }

}