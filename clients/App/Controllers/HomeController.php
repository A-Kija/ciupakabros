<?php
namespace App\Controllers;
use App\App;

class HomeController {

    public function home()
    {
        
        return App::views('home/index', [
            'title' => 'Home'
        ]);
    }

}