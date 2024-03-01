<?php

namespace App\Http\Controllers\API;

use App\Models\BasketProduct;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use App\Http\Resources\product as ProductResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\addproducttobasket;
use App\Http\Resources\basket as basketresource;
use Dotenv\Validator;

class ProductController extends BaseController
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $basket = $user->basket;
            if ($basket) {
                $cont = $basket->products_count;
            } else {
                // إنشاء سلة جديدة للمستخدم إذا لم يكن لديه سلة
                $basket = new Basket;
                $basket->name = 'Basket for ' . $user->name;
                $basket->products_count = 0;
                $basket->user_id = $user->id; // تعيين قيمة user_id
                $basket->save();
                $cont = 0;
            }
        }


        $products = Product::all();
        return $this->sendResponse( ProductResource::collection($products) , 'Products retrieved successfully.');
    }

    public function trash()
    {
        // if (Auth::user()->role == "1 "|| Auth::user()->role == "2") {
            $productss = Product::onlyTrashed()->get();
            return $this->sendResponse(ProductResource::collection($productss), 'Trashed products retrieved successfully.');
        // } else {
        //     return $this->sendError('Not Authorized', ['error'=>'error']);
        // }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required',
            'dep_name' => 'required',
            "image"=>'required|image'

        ]);

        $photo = $request->file('image');
        $newphoto = time() . '_' . $photo->getClientOriginalName();
        $photo->move(public_path('/upload/productsimage/'), $newphoto);

        $product = new Product;
        $dep = Department::where('department_name', $request->dep_name)->first();

        $product->image = 'upload/productsimage/' . $newphoto;
        $product->product_name = $request->product_name;
        $product->dep_name = $request->dep_name;
        $product->product_price = $request->product_price;
        if ($dep) {
            $product->dep_id = $dep->id;
        } else {
            return $this->sendError('No Department');
        }
        $product->save();
        return $this->sendResponse( new  ProductResource($product), 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $this->sendResponse(new  ProductResource($product), 'Product retrieved successfully.');
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'product_name' => 'required|string',
            'dep_name'=>'required'

        ]);
         if( auth()->check() && auth()->user()->role=="3") {
            return $this->sendError('Not Authorized', ['error'=>'error']);
        }


        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;

        $department = Department::where('department_name', $request->dep_name)->first();

        $product->dep_id = $department->id;

        $product->save();
        return $this->sendResponse(new  ProductResource($product), 'Product updated successfully.');
    }

    public function destroy($id)
    {



        if(auth()->check() && auth()->user()->role=="3") {
            return $this->sendError('Not Authorized', ['error'=>'error']);

        }
        $product = Product::findOrFail($id);
        $product->delete();
        return $this->sendResponse(new  ProductResource($product), 'Product deleted successfully.');
    }

    public function hdelete($id)
    {

            $product = Product::onlyTrashed()->findOrFail($id);
            $product->forceDelete();
            return $this->sendResponse(new ProductResource($product), 'Product permanently deleted successfully.');
        if(auth()->check() && (auth()->user()->role=="3" || auth()->user()->role=="2")) {
            return $this->sendError('Not Authorized', ['error' => 'error']);
        }
    }

    public function restore($id)
    {

        if( auth()->check() &&auth()->user()->role=="3"){
        return $this->sendError('Not Authorized', ['error'=>'error']);
        }

           $product = Product::onlyTrashed()->findOrFail($id);
            $product->restore();
            return $this->sendResponse(new ProductResource($product), 'Product restored successfully.');

    }

    public function addToBasket($id)
    {
        $product = Product::find($id);
        $user = auth()->user();

        // التحقق مما إذا كان لدى المستخدم سلة
        $basket = $user->basket;

        if (!$basket) {
            // إنشاء سلة جديدة للمستخدم إذا لم يكن لديه سلة
            $basket = new Basket;
            $basket->name = 'Basket for ' . $user->name;
            $basket->products_count = 0;
            $basket->user_id = $user->id; // تعيين قيمة user_id
            $basket->save();
        }

        // إضافة المنتج إلى سلة المستخدم باستخدام العلاقة بين السلة والمنتجات
        $basket->products()->attach($product->id, [
            'product_name' => $product->product_name,
            'basket_name' => $basket->name,
        ]);

        // تحديث عدد المنتجات في سلة المستخدم
        $basket->products_count += 1;
        $basket->save();

        return $this->sendResponse(new basketresource($basket), 'Product added to basket successfully.');
    }


}
// public function addToBasket($id)
// {
// $product = Product::find($id);
// $user = auth()->user();

// php
// Copy
//     $basket = $user->basket;
//     $basketProduct = $basket->products()->where('product_id', $product->id)->first();

//     if ($basketProduct) {
//         $basketProduct->quantity += 1;
//         $basketProduct->save();
//     } else {
//         $basketProduct = new BasketProduct();
//         $basketProduct->basket_id = $basket->id;
//         $basketProduct->product_id = $product->id;
//         $basketProduct->quantity = 1;
//         $basketProduct->save();
//     }

//     $basket->products_count += 1;
//     $basket->total_price += $product->product_price;
//     $basket->save();

//     return $this->sendResponce($basketProduct, 'Product added to basket successfully.');
// }
