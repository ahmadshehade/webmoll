<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    use HasFactory;
    protected $table = 'products__baskets';
    protected $fillable=[
        'product_number','product_name','basket_number','basket_name'
    ];
}
