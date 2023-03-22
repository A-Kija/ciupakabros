<?php

class MarsoPalydovas {

    private static $palydovai = [];
    private $vardas;

    public static function naujasPalydovas()
    {
        $kiek = count(self::$palydovai);

        if ($kiek === 0) {
            self::$palydovai[] = new self('Deimas');
            return self::$palydovai[0];
        }

        if ($kiek == 1) {
            self::$palydovai[] = new self('Fobas');
            return self::$palydovai[1];
        }
        
        return self::$palydovai[rand(0, 1)];
    }

    private function __construct($vardas)
    {
        $this->vardas = $vardas;
    }

}