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
        
        // A Venda tem muitos produtos
        return $this->belongsTo(Product::class, 'idProduct', 'id');
    }
}
