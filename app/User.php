<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;

class User extends \Eloquent implements Authenticatable, CanResetPasswordContract
{
    use Notifiable;
    use AuthenticableTrait;
    use CanResetPassword;
    
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
