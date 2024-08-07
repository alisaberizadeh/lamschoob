<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Hekmatinasser\Verta\Verta;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->query('search') != null) {
            $search = request()->query('search');
            $products = Product::where("title", "like", "%$search%")->orWhere("code", "like", "%$search%")->orderBy("id", "DESC")->get();
        }
        else {
            $products = Product::orderBy("id", "DESC")->get();
        }
        return view('dashboard.product.home', [
            'products' => $products
        ]);
    }
    public function create()
    {
        return view('dashboard.product.new');
    }
    public function store(Request $request)
    {
        $v = verta();
        $files = $request->file('file');
        $request->validate([
             'title' => ["required", "string", "max:255"],
            'price' => ["required" ,"max:10"],
            'code' => ["required", "string" , "unique:products,code"],
         ]);
         $final_price =$request->price - ($request->price * ($request->discount/100)) ;
         $product = Product::create([
            'title' => $request->title , 
            'price' => $request->price , 
            'discount' => $request->discount , 
            'final_price' => $final_price , 
            'category_id' => $request->category , 
            'short_description' => $request->short_description , 
            'description' => $request->description , 
            'code' => $request->code , 
            'date'=> $v->format('d %B Y'),
         ]);
        foreach ($files as $file) {
            $random = rand(1000000000, 9999999999);
            $file->move(public_path('/uploads/products/'), $random . '_' . $file->getClientOriginalName());
            $src = '/uploads/products/' . $random . '_' . $file->getClientOriginalName();
            Gallery::create([
                "src" => $src , 
                "product_id" => $product->id , 
            ]);
        }

        return redirect()->back()->with("success","محصول جدید ایجاد شد");
    }

    public function edit($id)
    {
        $product = Product::where("id", $id)->first();
        return view('dashboard.product.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request , $id)
    {
        $request->validate([
             'title' => ["required", "string", "max:255"],
            'price' => ["required" ,"max:10"],
            'short_description' => ["required", "string"],
            'description' => ["required", "string"],
            'code' => ["required", "string" , "unique:products,code,$id"],
         ]);
         $final_price = $request->price - ($request->price * ($request->discount/100)) ;
         $product = Product::find($id);
         $product->update([
            'title' => $request->title , 
            'price' => $request->price , 
            'discount' => $request->discount , 
            'final_price' => $final_price , 
            'category_id' => $request->category , 
            'short_description' => $request->short_description , 
            'description' => $request->description , 
            'code' => $request->code , 
         ]);

         if ($request->file != null) {
            $files = $request->file('file');
            $product_gallery = Gallery::where("product_id",$id)->get();
            foreach ($product_gallery as $value) {
                $value->delete();
            }
            foreach ($files as $file) {
                $random = rand(1000000000, 9999999999);
                $file->move(public_path('/uploads/products/'), $random . '_' . $file->getClientOriginalName());
                $src = '/uploads/products/' . $random . '_' . $file->getClientOriginalName();
                Gallery::create([
                    "src" => $src , 
                    "product_id" => $id , 
                ]);
            }
         }
        

        return redirect(route('products'))->with("success","محصول  بروزرسانی شد");
    }



    public function delete($id)
    {
        $product_gallery = Gallery::where("product_id",$id)->get();
        $product = Product::where("id",$id)->first();
        foreach ($product_gallery as $value) {
            unlink(public_path($value->src));
            $value->delete();
        }
        $product->delete();

        return redirect()->back()->with("success","محصول حذف شد");


    }


}
