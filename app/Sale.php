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


    // whats

    public function product() {
        
        // A Venda tem um produtos
        return $this->hasOne(Product::class, 'id', 'idProduct');
    }

    public function saleUser() {

        // O a venda pertence a um usuario 
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
