<?php
namespace App;

use App\Controllers\HomeController;


class App {

    public static function process()
    {
        
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);

        return self::router($url);
    }


    private static function router(array $url) 
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'GET' && count($url) == 1 && $url[0] === '') {
            return (new HomeController)->home();
        }

        else {
            return  '<h1>404 PAGE NOT FOUND</h1>';
        }
    }

    public static function views($tmp, $data = [])
    {
        $path = __DIR__ . '/../views/';
        extract($data);

        ob_start();
        require $path . 'top.php';
        require $path . $tmp . '.php';
        require $path . 'bottom.php';
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }


}