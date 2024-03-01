<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','products_count','user_id','product_name','mony'
    ];
    use SoftDeletes;
    Protected $table="basket";
    protected $dates = ['deleted_at'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function products(){
        return $this->belongsToMany(Product::class,'products__baskets','basket_number','product_number')->
        withPivot('basket_name','product_name');;
    }

}
