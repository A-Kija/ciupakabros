<?php
// Petras

class Bebras {

    private $spalva;
    private $metai = 25;
    private $slaptas = 123;


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

    public function __get($what)
    {
        // if ($what == 'spalva') {
        //     return $this->spalva;
        // }
        // if ($what == 'metai') {
        //     return $this->metai;
        // }

        if ($what == 'kokiaNorsSpalva') {
            return $this->fancySpalva();
        }

        if (in_array($what, ['metai', 'spalva'])) {
            return $this->$what;
        }
        return null;
    }

    public function __set($where, $what) 
    {
        
        if ($where == 'spalva') {
            if (in_array($what, ['raudonas', 'rudas', 'pilkas', 'geltonas', 'juodas'])) {
                $this->$where = $what;
            }
        }
       
        
    }

    public function __call($name, $arg)
    {
        return $this->$name(...$arg);
    }



    private function derSumator(int $a, int $b, int $c)
    {
        return $a + $b + $c;
    }


    private function fancySpalva()
    {
        return ['raudona', 'rudas', 'pilka', 'geltona', 'juoda'][rand(0, 4)];
    }


    public function kokiaTavoSpalva()
    {
        return $this->spalva;
    }

    public function iMiska(Miskas $miskas)
    {
         echo "\n" . $miskas->dydis . "\n\n";
    }

}