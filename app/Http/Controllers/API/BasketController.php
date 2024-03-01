<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\models\Basket;
use App\Models\Product;
use App\Models\BasketProduct;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\basket as basketresource;
class BasketController extends BaseController
{
    public function index()
    {
        $user =Auth::user();

        if ($user->role == "1" || $user->role ==" 2") {
            $baskets = Basket::all();
            return $this->sendResponse(basketresource::collection($baskets), 'Baskets retrieved successfully.');
        }
         if(Auth::check() && Auth::user()->role=="3") {
            $basket = $user->basket;

            if (!$basket) {
                return $this->sendError("No basket for user", null);
            }

            return $this->sendResponse(  new basketresource($basket), 'Basket retrieved successfully.');
        }
    }

    // public function allindex()
    // {
    //     $products = Product::all();

    //     if (Auth::user()) {
    //         $pb = BasketProduct::get();
    //         $baskets = Basket::all();
    //     }
    //     $user = Auth::user();
    //     return $this->sendResponse(compact("baskets", "user", "products", "pb"), 'Baskets retrieved successfully.');
    // }

    public function trash()
    {     $user=Auth::user();

        $baskets = Basket::onlyTrashed()->get();
        return $this->sendResponse(basketresource::collection($baskets), 'Trashed baskets retrieved successfully.');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'products_count' => ['required', 'integer'],
            'mony' => ['required', 'integer'],
        ]);
        

        $user = auth()->user();

        if (!$user) {
            return $this->sendError("User not authenticated.", null);
        }

        $basket = new Basket();
        $basket->name = $request->name;
        $basket->mony = $request->mony;
        $basket->products_count = $request->products_count;
        $basket->product_name = $request->product_name;
        $basket->user_id = $user->id;
        $basket->save();

        return $this->sendResponse(new basketresource($basket), 'Basket created successfully.');
    }

    public function show($id)
    {
        $basket = Basket::findOrFail($id);
        return $this->sendResponse( new basketresource($basket), 'Basket retrieved successfully.');
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'products_count' => ['required', 'integer'],
            'product_name' => ['required', 'string'],
        ]);

        $user = Auth::user();
        $basket = Basket::findOrFail($id);
        $basket->name = $request->name;
        $basket->products_count = $request->products_count;
        $basket->product_name = $request->product_name;
        $basket->mony = $request->mony;
        $basket->user_id = $user->id;
        $basket->save();
        $this->validate($request,[

            'products_count'=> ['required','integer'],
            'product_name'=>['required','string'],
        ]);

        return $this->sendResponse($basket, 'Basket updated successfully.');
    }

    public function destroy($id)
    {
        $basket = Basket::findOrFail($id);
        $basket->delete();

        return $this->sendResponse(null, 'Basket deleted successfully.');
    }

    public function hdelete($id)
    {
        $basket = Basket::onlyTrashed()->findOrFail($id);
        $basket->forceDelete();

        // ربما تحتاج إلى القيام بإجراءات إضافية بعد حذف السلة نهائيًا

        return $this->sendResponse( null, 'Basket deleted permanently.');
    }

    public function restore($id)
    {
        $basket = Basket::onlyTrashed()->findOrFail($id);
        $basket->restore();

        return $this->sendResponse( new basketresource($basket), 'Basket restored successfully.');
    }
}

