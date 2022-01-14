<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'idUser',
        'idProduct',
        'quantity',
        'dateSale',
        'discount',
        'valueSale',
        'status_sales',
        'status',
    ];


    public function users() {

        // O venda perdense a um usuário
        return $this->belongsTo(User::class, 'id', 'idUser');
    }
}
