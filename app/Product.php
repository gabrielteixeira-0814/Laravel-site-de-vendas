<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];

    public function sale() {

        // O produto pertence a uma venda 
        return $this->belongsTo(Sale::class, 'id', 'idProduct');
    }
}
