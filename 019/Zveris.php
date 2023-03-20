<?php

class Zveris extends Miskas {

    public $rusis, $spalva;


    public function __construct(string $rusis, string $spalva, string $vardas)
    {
        parent::__construct($vardas);
        
        $this->rusis = $rusis;
        $this->spalva = $spalva;
    }

    public function bu()
    {
        echo '<h1>BEEEEEEEBRAS....</h1>';
    }

    public function sayTevoBu()
    {
        $this->bu();
        parent::bu();
       
    }


}