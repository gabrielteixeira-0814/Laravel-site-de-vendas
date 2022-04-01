<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    
    protected $fillable = [
        'name',
        'email',
        'cpf',
        'password',
    ];

     public function userSales() {
        
        // O usuario tem muitas vendas
        return $this->hasMany(Sale::class, 'idUser', 'id');
    }
}
