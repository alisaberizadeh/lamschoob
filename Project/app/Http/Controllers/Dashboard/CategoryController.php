<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy("id", "DESC")->get();
        return view('dashboard.category.home', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => ["required", "mimes:jpg,jpeg,png", "max:7024"],
            'title' => ["required", "string", "max:255"],
        ]);
        $category = Category::where("title", $request->title)->first();

        if ($category) {
            return redirect()->back()->with('error', 'دسته بندی از قبل وجود دارد !!!');
        } else {
            $random = rand(1000000000, 9999999999);
            $file = $request->file('file');
            $file->move(public_path('/uploads/category/'), $random . '_' . $file->getClientOriginalName());
            $request->file = '/uploads/category/' . $random . '_' . $file->getClientOriginalName();

            Category::create([
                'src' => $request->file,
                'title' => $request->title,
            ]);


            return redirect()->back()->with('success', 'دسته بندی ایجاد شد');
        }
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        unlink(public_path($category->src));
        $category->delete();
        return redirect()->back()->with('success', 'دسته بندی حذف شد ');
    }


    public function edit($id)
    {
        $category = Category::where("id", $id)->first();
        return view('dashboard.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::where("id", $id)->first();
        $request->validate([
            'title' => ["required", "string", "max:255"],
        ]);

        if ($request->file != null) {
            $random = rand(1000000000, 9999999999);
            $file = $request->file('file');
            $file->move(public_path('/uploads/category/'), $random . '_' . $file->getClientOriginalName());
            $request->file = '/uploads/category/' . $random . '_' . $file->getClientOriginalName();
            unlink(public_path($category->src));
        }
        else {
            $request->file = $request->last_file;
        }
        $category->update([
            'title' => $request->title , 
            'src' => $request->file
        ]);

        return redirect(route('categories'))->with('success', 'دسته بندی بروزرسانی شد');

    }
}
