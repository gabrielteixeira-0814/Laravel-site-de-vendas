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

    public function saleProduct() {
        
        // A Venda tem muitos produtos
        return $this->hasOne(Product::class, 'idProduct', 'id');
    }
}
