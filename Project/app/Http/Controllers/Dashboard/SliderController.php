<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;

class SliderController extends Controller
{
    public function index()
    {
        $slider= Slider::orderBy("id","DESC")->get();
        return view('dashboard.slider.home' , [
            'slider' => $slider
        ]);
    }
   public function store(Request $request)
    {
        $request->validate([
            'file' => ["required","mimes:jpg,jpeg,png","max:7024"]
        ]);
        $random = rand(1000000000, 9999999999);
        $file = $request->file('file');
        $file->move(public_path('/uploads/slider/'), $random .'_' . $file->getClientOriginalName());
        $request->file = '/uploads/slider/'.$random .'_' . $file->getClientOriginalName();
        $v = verta();
        Slider::create([
            'src' => $request->file , 
            'link' => $request->link , 
            'date'=> $v->format('d %B Y'),
        ]);
        

        return redirect()->back()->with('success','اسلاید جدید اضافه شد');
    }

    public function delete($id)
    {
        $slider = Slider::where("id",$id)->first();
        unlink(public_path($slider->src));
        $slider->delete();
        return redirect()->back()->with('success','اسلاید حذف شد ');
    }

}
