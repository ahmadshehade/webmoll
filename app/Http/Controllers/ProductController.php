<?php

namespace App\Http\Controllers;
use App\Models\BasketProduct;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
          $user=Auth::user();
          $cont=$user->basket->products_count;
        $products = Product::all();
        return view('products.index', compact("products",'cont'));
    }
    public function trash(){
        if(Auth::user()->role==1 || Auth::user()->role== 2){
        $products = Product::onlyTrashed()->get();
        return view('products.trash', compact("products"));}else{
            return redirect()->back()->with('success',' No Authorized');
        }
    }



    public function create()

    {
        if(Auth::user()->role==1){
        $departments=Department::all();
      return view("products.create" ,compact('departments'));
    }else{
        return redirect()->back()->with('success',' No Authorized');
    }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required',
            'dep_name' => 'required',
            'image'=> 'required|image',
        ]);
        $photo = $request->file('image');
          $newphoto = time().'_'. $photo->getClientOriginalName();
          $photo->move(public_path('/upload/productsimage/'), $newphoto);

        $product=new Product;
        $dep = Department::where('department_name', $request->dep_name)->first();

           $product->image = 'upload/productsimage/'. $newphoto;
        $product->product_name=$request->product_name;
        $product->dep_name=$request->dep_name;
        $product->product_price=$request->product_price;
        if($dep){
        $product->dep_id=$dep->id;
        }else{
            return redirect()->back()->withErrors(['No Dep']);
        }
        $product->save();
        return redirect()->route('product.index')->with('success','successfully');


    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }


          public function edit($id)
          {   if( Auth::check() & (Auth::user()->role ==1 || Auth::user()->role == 2))
            {
                 $departments=Department::all();
              $product = Product::find($id);
              return view('products.edit', compact('product','departments'));
            }else{
                return redirect()->back()->with('success',' No Authorized');
              }
          }


    public function update(Request $request, $id)
    {
         if(Auth::user()->role==1 || Auth::user()->role== 2){

        $this->validate($request, [
            'product_name' => 'required',


        ]);

        $product = Product::find($id);
        $product->product_name = $request->product_name;

        $product->product_price = $request->product_price;

        $department = Department::where('department_name', $request->dep_name)->first();

        $product->dep_id=$department->id;

        $product->save();
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }
        else{
            return redirect()->back()->with('success',' No Authorized');
        }
    }


    public function destroy($id)
    {       if(Auth::user()->role==1 || Auth::user()->role== 2)
        {
       $product = Product::findorFail($id);
       $product->delete();
       return redirect()->route('product.index')->with('success', 'Product Deleted successfully');
    }
       else
       {
        return redirect()->back()->with('success',' No Authorized');
    }

    }
    public function hdelete($id){
        if(Auth::user()->role==1 ){
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        return redirect()->route('products.trash')->with('success', 'Product Deleted successfully');}
        else{
            return redirect()->back()->with('success','No Authorized');
        }


    }
    public function restore($id)
    {

        if(Auth::user()->role==1 || Auth::user()->role==2 ){
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.trash')->with('success', 'Product Restore successfully');
    }
    else{
        return redirect()->back()->with('success','No Authorized');
    }
    }
    public function addToBasket($id)
    {
        $product = Product::find($id);
        $user = auth()->user();

        // Check if the user has a basket
        $basket = $user->basket;

        // إضافة المنتج إلى سلة المستخدم باستخدام العلاقة بين السلة والمنتجات


        // تحديث عدد المنتجات في سلة المستخدم
        $basket->products_count = $basket->products_count+1;
        $basket->mony=$basket->mony - $product->product_price;
        if ($basket->mony <= 0) {
            return redirect()->back()->with('success', 'You Not Have Enought Mony ! ');
        }
        $basket->products()->attach($product->id, [
            'product_name' => $product->product_name,
            'basket_name'=>$basket->name,
        ]);
        $basket->save();

        return redirect()->back()->with('success', 'تمت إضافة المنتج إلى سلة المستخدم بنجاح.');
    }

}
