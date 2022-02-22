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

    public function productSale() {

        // O produto pertence a uma venda 
        return $this->hasOne(Sale::class, 'id', 'idProduct');
    }
}
