<?php

namespace App\Http\Controllers;

use App\Mail\DiscountMail;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Product;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {
         $products = Product::take(7)->orderBy("id", "DESC")->get();
        return view('home', [
            'products' => $products
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function questions()
    {
        return view('questions');
    }

    public function contact()
    {
        return view('contact');
    }



    public function shop()
    {

        if (request()->query('category') != null) {
            $products = Product::where('category_id', request()->query('category'))->orderBy("id", "DESC")->get();
        } else if (request()->query('search') != null) {
            $search = request()->query('search');
            $products = Product::where("title", "like", "%$search%")->orWhere("code", "like", "%$search%")->orderBy("id", "DESC")->get();
        } else {
            $products = Product::orderBy("id", "DESC")->get();
        }
        return view('shop', [
            'products' => $products
        ]);
    }


    public function product_single($id)
    {
        $comments = Comment::where("product_id", $id)->where("active", "1")->get();
        $product = Product::where("id", $id)->first();
        return view('product', [
            'product' => $product,
            'comments' => $comments,
        ]);
    }

    public function product_comment(Request $request,  $id)
    {
        $request->validate([
            'name' => ["required", "string", "max:255"],
            'email' => ["required", "email"],
            'email' => ["required", "string"],
        ]);
        $v = verta();
        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'product_id' => $id,
            'active' => '0',
            'date' => $v->format('d %B Y'),
        ]);

        return redirect()->back()->with('success', "دیدگاه شما ثبت شد");
    }


    public function articles()
    {
        $articles = Article::orderBy("id", "DESC")->get();
        return view('articles', [
            'articles' => $articles
        ]);
    }

    public function article_single($id)
    {
        $article = Article::where("id", $id)->first();
        return view('single', [
            'article' => $article,
        ]);
    }
    public function contact_add(Request $request)
    {
        $v = verta();
        $request->validate([
            'title' => ["required", "string", "max:255"],
            'name' => ["required", "string", "max:255"],
            'mobile' => ["required", "string", "min:11", "max:11"],
            'text' => ["required", "string"],
        ]);
        Contact::create([
            'name' => $request->name,
            'title' => $request->title,
            'mobile' => $request->mobile,
            'seen' => 'new',
            'text' => $request->text,
            'date' => $v->format('d %B Y'),
        ]);

        return redirect()->back()->with('success', 'پیام شما ارسال شد');
    }
}
