<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BasketProduct;
use App\Models\Product;

class ProductsBasketsController extends Controller
{
    public function destroy($id){

        $pb = BasketProduct::findOrFail($id);
    $pb->delete();

    
    $user = Auth::user();
    $product=Product::where('id',$pb->product_number)->first();
    $user->basket->products_count = $user->basket->products_count - 1;
    $user->basket->mony=$user->basket->mony+$product->product_price;
    $user->basket->save();
        return redirect()->back()->with('success','successfully delete from Basket');
    }
}
