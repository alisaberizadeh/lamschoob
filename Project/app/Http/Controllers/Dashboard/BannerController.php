<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banner1= Banner::where("position","top")->first();
        $banner2= Banner::where("position","bottom")->first();
        return view('dashboard.banner.home' , [
            'banner1' => $banner1 , 
            'banner2' => $banner2 , 
        ]);
    }
    public function banner1(Request $request)
    {
        $banner1= Banner::where("position","top")->first();
        $request->validate([
            'file' => ["required","mimes:jpg,jpeg,png","max:7024"]
        ]);
        if ($request->file != null) {
             $random = rand(1000000000, 9999999999);
            $file = $request->file('file');
            $file->move(public_path('/uploads/banner/'), $random .'_' . $file->getClientOriginalName());
            $request->file = '/uploads/banner/'.$random .'_' . $file->getClientOriginalName();
            unlink(public_path($request->nowFile));

        }
        else{
            $request->file = $request->nowFile;
        }
        $banner1->update([
            'src' => $request->file , 
            'link' => $request->link , 
        ]);
        return redirect()->back()->with('success','بنر با موفقیت تغییر کرد');
    }
    public function banner2(Request $request)
    {
        $banner2= Banner::where("position","bottom")->first();
        $request->validate([
            'file' => ["required","mimes:jpg,jpeg,png","max:7024"]
        ]);
        if ($request->file != null) {
            $random = rand(1000000000, 9999999999);
            $file = $request->file('file');
            $file->move(public_path('/uploads/banner/'), $random .'_' . $file->getClientOriginalName());
            $request->file = '/uploads/banner/'.$random .'_' . $file->getClientOriginalName();
            unlink(public_path($request->nowFile));
        }
        else{
            $request->file = $request->nowFile;
        }
        $banner2->update([
            'src' => $request->file , 
            'link' => $request->link , 
        ]);
        return redirect()->back()->with('success','بنر با موفقیت تغییر کرد');
    }
}
