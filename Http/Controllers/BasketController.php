<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Basket;
use App\Models\Product;
use App\Models\BasketProduct;
use Illuminate\Support\Facades\Auth;
class BasketController extends Controller
{
    public function index(){
        $products=Product::all();

        if(Auth::user()){
        $pb=BasketProduct::get();
        $baskets = Basket::all();
        }
        $user=Auth::user();
        return view('baskets.index', compact("baskets","user","products","pb"));
    }
    public function allindex(){
        $products=Product::all();

        if(Auth::user()){
        $pb=BasketProduct::get();
        $baskets = Basket::all();
        }
        $user=Auth::user();
        return view('baskets.alindex', compact("baskets","user","products","pb"));
    }
    public function trash(){
        $baskets = Basket::onlyTrashed()->get();
        return view('baskets.trash',compact("baskets"));
    }

    public function create(){
        $products=Product::all();
    return view('baskets.create',compact('products'));
 }

 public function store(Request $request){
    $this->validate($request,[
        'name'=>['required','string'],
        'products_count'=> ['required','integer'],

        'mony'=>['required','integer'],
    ]);
    $user=Auth::user();
    $basket = new Basket();
    $basket->name = $request->name;
    $basket->mony=$request->mony;
    $basket->products_count= $request->products_count;
    $basket->product_name= $request->product_name;
    $basket->user_id =$user->id ;
    $basket->save();
    return redirect()->route('baskets.index')->with('success', 'Basket Create Successfully');
 }

 public function show($id){
    $basket = Basket::findOrFail($id);
    return view('baskets.show',compact('basket'));
 }

 public function edit($id){
    $basket = Basket::findOrFail($id);
    return view('baskets.edit',compact('basket'));
 }

 public function update(Request $request, $id){
    $this->validate($request,[

        'products_count'=> ['required','integer'],
        'product_name'=>['required','string'],
    ]);
    $user=Auth::user();
    $basket=Basket::findOrFail($id);
    $basket->name = $request->name;
    $basket->products_count= $request->products_count;
    $basket->product_name= $request->product_name;
    $basket->mony=$request->mony;
    $basket->user_id =$user->id ;
    $basket->save();
    return redirect()->route('baskets.index')->with('success', 'Basket Update Successfully');
 }

 public function destroy($id){
$basket = Basket::findOrFail($id);
$basket->delete();
return redirect()->route('baskets.index')->with('success', 'Basket Delete successfully');
 }
 public function hdelete($id)
 {
     $basket = Basket::onlyTrashed()->findOrFail($id);
     $basket->forceDelete();

     // ربما تحتاج إلى القيام بإجراءات إضافية بعد حذف السلة نهائيًا

     return redirect()->route('baskets.trash')->with('success', 'Basket deleted permanently.');
 }

 public function restore($id){
          $basket = Basket::onlyTrashed()->findOrFail($id);
          $basket->restore();
          return redirect()->route('baskets.index')->with('success', 'Basket Restore Successfully');
 }


}
