<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function offers()
    {
        $products_offers = Offer::orderBy("id", "DESC")->get();
        
          return view('dashboard.setting.offers', [
             'products_offers' => $products_offers , 
        ]);
    }
    public function offers_add(Request $request)
    {
       foreach ($request->products as $item) {
          Offer::create([
            'product_id' => $item
          ]);
       }
       return redirect()->back()->with('success','اضافه شد');
    }
    public function offers_delete($id)
    {
       $product = Offer::find($id);
       $product->delete();
       return redirect()->back()->with('success','حذف شد');
    }






    public function favorites()
    {
        $products_offers = Favorite::orderBy("id", "DESC")->get();
        
          return view('dashboard.setting.favorites', [
             'products_offers' => $products_offers , 
        ]);
    }
    public function favorites_add(Request $request)
    {
       foreach ($request->products as $item) {
        Favorite::create([
            'product_id' => $item
          ]);
       }
       return redirect()->back()->with('success','اضافه شد');
    }
    public function favorites_delete($id)
    {
       $product = Favorite::find($id);
       $product->delete();
       return redirect()->back()->with('success','حذف شد');
    }
}
