<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'client_id'];
    public $timestamps = false;

    public function orderClient() 
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
