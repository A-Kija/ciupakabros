<?php

class Bebras {

    private $spalva;


    public function __construct()
    {
        $this->spalva = ['rudas', 'pilkas', 'geltonas', 'juodas'][rand(0, 3)];
        // echo '<h2>' . $this->kokiaTavoSpalva() . '</h2>';
    }

    // public function __destruct()
    // {
    //     echo '<h1>Bebras Dingo</h1>';
    // }


    public function __invoke()
    {
        echo '<h1>Alio</h1>';
    }

    public function kokiaTavoSpalva()
    {
        return $this->spalva;
    }

}