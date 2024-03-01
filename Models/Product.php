<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','product_price','dep_id','dep_name','image'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function department(){
        return $this->belongsTo(Department::class,'dep_id','id');
    }
    public function baskets(){
        return $this->belongsToMany(Basket::class,'products__baskets','product_number','basket_number')
        ->withPivot('basket_name','product_name');
    }

}
