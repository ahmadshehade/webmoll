<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BasketProduct;
use App\Models\Product;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\addproducttobasket;
use App\Http\Resources\product as productResource;

class ProductsBasketsController extends BaseController
{
    public function destroy($id){

        $pb = BasketProduct::findOrFail($id);
    $pb->delete();


    $user = Auth::user();
    $product=Product::where('id',$pb->product_number)->first();
    $user->basket->products_count = $user->basket->products_count - 1;
    $user->basket->mony=$user->basket->mony+$product->product_price;
    $user->basket->save();

        return $this->sendResponse( new productResource( $product),'successfully delete from Basket');
    }
}
