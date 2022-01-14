<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'cpf',
        'password',
    ];

     public function sales() {
        
        // O usuario tem muitas vendas
        return $this->hasMany(Sale::class, 'idUser', 'id');
    }
}
