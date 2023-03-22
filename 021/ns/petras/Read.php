<?php
namespace Petro;

use Bebro\Go;

class Read extends Go {

    public function getData()
    {
        echo '<h2>'. $this->goStars() .' Mars orbit: -4545356.654695489749874</h2>';
    }

}