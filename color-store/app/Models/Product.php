<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'cat_id', 'rate', 'rates'];
    public $timestamps = false;
    protected $casts = [
        'rates' => 'array',
    ];

    public function color()
    {
        return $this->hasMany(Color::class);
    }
}
