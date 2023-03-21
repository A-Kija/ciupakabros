<?php

class Color extends Word implements FontSize {

    public function color()
    {
        $color = [
            'skyblue',
            'pink',
            'crimson',
            'gray'
        ];

        return $color[rand(0, 3)];
    }

    public function fontSize(int $bbbbbb = 0)
    {
        echo  '<style>h2{font-size:'.rand(20, 60).'px;}</style>';
    }


}