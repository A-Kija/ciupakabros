<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Cat;


class CatsService
{
    public function get()
    {
        return Cat::all();
    }
}