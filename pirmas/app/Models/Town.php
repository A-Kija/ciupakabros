<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
