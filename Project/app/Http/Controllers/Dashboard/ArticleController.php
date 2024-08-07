<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy("id", "DESC")->get();
        return view('dashboard.articles.home', [
            'articles' => $articles
        ]);
    }
    public function create()
    {
        return view('dashboard.articles.new');
    }

    public function store(Request $request)
    {
        $v = verta();

        $request->validate([
            'title' => ["required", "string", "max:255"],
            'text' => ["required", "string"],
            'file' => ["required", "mimes:jpg,jpeg,png"],
        ]);
        $random = rand(1000000000, 9999999999);
        $file = $request->file('file');
        $file->move(public_path('/uploads/article/'), $random . '_' . $file->getClientOriginalName());
        $request->file = '/uploads/article/' . $random . '_' . $file->getClientOriginalName();

        $article = Article::create([
            'title' => $request->title,
            'src' => $request->file,
            'text' => $request->text,
            'date' => $v->format('d %B Y'),
        ]);

        return redirect(route('articles'))->with("success", "مقاله جدید ایجاد شد");
    }


    public function edit($id)
    {
        $article = Article::where("id", $id)->first();
        return view('dashboard.articles.edit', [
            'article' => $article
        ]);
    }



    public function delete($id)
    {
        $article = Article::where("id", $id)->first();
        unlink(public_path($article->src));
        $article->delete();
        return redirect(route('articles'))->with("success", "مقاله حذف شد");
    }




    public function update(Request $request, $id)
    {
        $article = Article::where("id", $id)->first();

        $request->validate([
            'title' => ["required", "string", "max:255"],
            'text' => ["required", "string"],
            'file' => ["mimes:jpg,jpeg,png"],
        ]);
        if ($request->file != null) {
            $random = rand(1000000000, 9999999999);
            $file = $request->file('file');
            $file->move(public_path('/uploads/article/'), $random . '_' . $file->getClientOriginalName());
            $request->file = '/uploads/article/' . $random . '_' . $file->getClientOriginalName();
            unlink(public_path($article->src));
        } else {
            $request->file = $request->last_file;
        }

        $article->update([
            'title' => $request->title,
            'src' => $request->file,
            'text' => $request->text,
        ]);

        return redirect(route('articles'))->with("success", "مقاله   بروزرسانی شد");
    }
}
