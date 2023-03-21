<?php

class Tevas {

    public static $name = 'Jonas'; 

    public static function sayName()
    {
        echo '<h3>'.self::$name.'</h3>';
        echo '<h3>'.static::$name.'</h3>';
    }

}