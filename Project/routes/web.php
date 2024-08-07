<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommentsController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\HomeController;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/questions', [HomeController::class, 'questions']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'contact_add']);


Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop/{id}', [HomeController::class, 'product_single'])->name('products.single');
Route::post('/shop/{id}/comment', [HomeController::class, 'product_comment'])->name('products.comment.add');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/{id}/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/{id}/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/discount', [CartController::class, 'discount'])->name('cart.discount');

Route::get('/articles', [HomeController::class, 'articles'])->name('home.articles');
Route::get('/articles/{id}', [HomeController::class, 'article_single'])->name('articles.single');
Auth::routes();



Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::get('/checkout/payment/callback', [CheckoutController::class, 'callback'])->name('checkout.callback');
Route::get('/checkout/{order}/complate', [CheckoutController::class, 'complate'])->name('checkout.complate');
Route::get('/checkout/{error}/no-complate', [CheckoutController::class, 'no_complate'])->name('checkout.noComplate');
















Route::prefix('/user')->middleware('auth')->group(function () {
  Route::get('/', [\App\Http\Controllers\User\HomeController::class, 'index'])->name('user.panel');
  Route::post('/profile', [\App\Http\Controllers\User\HomeController::class, 'profile'])->name('user.profile');
  Route::post('/password', [\App\Http\Controllers\User\HomeController::class, 'password'])->name('user.password');
  Route::get('/orders', [\App\Http\Controllers\User\HomeController::class, 'orders'])->name('user.orders');
  Route::get('/discounts', [\App\Http\Controllers\User\HomeController::class, 'discounts'])->name('user.discounts');
});





Route::prefix('/dashboard')->middleware('auth','isAdmin')->group(function () {
  Route::get('/', [\App\Http\Controllers\Dashboard\HomeController::class, 'home'])->name('dashboard.panel');

  //----------------- Sliders
  Route::get('/sliders', [SliderController::class, 'index'])->name('sliders');
  Route::post('/sliders/new', [SliderController::class, 'store'])->name('sliders.new');
  Route::delete('/sliders/{id}/delete', [SliderController::class, 'delete'])->name('sliders.delete');

  //----------------- Banner
  Route::get('/banner', [BannerController::class, 'index'])->name('banners');
  Route::post('/banner/top/update', [BannerController::class, 'banner1'])->name('banners.top');
  Route::post('/banner/bottom/update', [BannerController::class, 'banner2'])->name('banners.bottom');

  //----------------- Sliders
  Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
  Route::post('/categories/new', [CategoryController::class, 'store'])->name('categories.new');
  Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
  Route::post('/categories/{id}/edit', [CategoryController::class, 'update']);
  Route::delete('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');


  //----------------- Product
  Route::get('/products', [ProductController::class, 'index'])->name('products');
  Route::get('/products/new', [ProductController::class, 'create'])->name('products.new');
  Route::post('/products/new', [ProductController::class, 'store']);
  Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
  Route::post('/products/{id}/edit', [ProductController::class, 'update']);
  Route::get('/products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');

  //----------------- Comments
  Route::get('/comments', [CommentsController::class, 'index'])->name('comments');
  Route::get('/comments/{id}/active', [CommentsController::class, 'active'])->name('comments.active');
  Route::get('/comments/{id}/delete', [CommentsController::class, 'delete'])->name('comments.delete');

  //-----------------  Discount
  Route::get('/discounts', [DiscountController::class, 'index'])->name('discounts');
  Route::post('/discounts/new', [DiscountController::class, 'new'])->name('discounts.new');
  Route::post('/discounts/{id}/delete', [DiscountController::class, 'delete'])->name('discounts.delete');

  //-----------------  Articles
  Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
  Route::get('/articles/new', [ArticleController::class, 'create'])->name('articles.new');
  Route::post('/articles/new', [ArticleController::class, 'store']);
  Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
  Route::post('/articles/{id}/edit', [ArticleController::class, 'update']);
  Route::get('/articles/{id}/delete', [ArticleController::class, 'delete'])->name('articles.delete');



  //-----------------  Setting
  Route::get('/setting/offers', [SettingController::class, 'offers'])->name('setting.offers');
  Route::post('/setting/offers/add', [SettingController::class, 'offers_add'])->name('setting.offers.add');
  Route::get('/setting/offers/{id}/delete', [SettingController::class, 'offers_delete'])->name('setting.offers.delete');
  Route::get('/setting/favorites', [SettingController::class, 'favorites'])->name('setting.favorites');
  Route::post('/setting/favorites/add', [SettingController::class, 'favorites_add'])->name('setting.favorites.add');
  Route::get('/setting/favorites/{id}/delete', [SettingController::class, 'favorites_delete'])->name('setting.favorites.delete');


  //------------------ Users
  Route::get('/users', [UsersController::class, 'index'])->name('users');
  Route::get('/users/{id}/delete', [UsersController::class, 'delete'])->name('users.delete');
  Route::get('/users/{id}/discount', [UsersController::class, 'discount'])->name('users.discount');
  Route::post('/users/{id}/discount', [UsersController::class, 'new_discount']);


  //------------------ Contact
  Route::get('/contact', [ContactController::class, 'index'])->name('contact');
  Route::get('/contact/{id}/delete', [ContactController::class, 'delete'])->name('contact.delete');
  Route::get('/contact/{id}/seen', [ContactController::class, 'seen'])->name('contact.seen');


  //------------------ Contact
  Route::get('/questions', [QuestionController::class, 'index'])->name('questions');
  Route::post('/questions', [QuestionController::class, 'add']);
  Route::get('/questions/{id}/delete', [QuestionController::class, 'delete'])->name('questions.delete');


  //------------------ Orders
  Route::get('/orders/now', [OrdersController::class, 'pending_show'])->name('orders.pending');
  Route::get('/orders/completing', [OrdersController::class, 'completing_show'])->name('orders.completing');
  Route::get('/orders/delivered', [OrdersController::class, 'delivered_show'])->name('orders.delivered');

  Route::get('/orders/{id}/show', [OrdersController::class, 'single'])->name('orders.single');
  Route::get('/orders/{id}/delete', [OrdersController::class, 'delete'])->name('orders.delete');
  Route::get('/orders/{id}/completing', [OrdersController::class, 'completing_update'])->name('orders.completing.update');
  Route::get('/orders/{id}/delivered', [OrdersController::class, 'delivered_update'])->name('orders.delivered.update');
});
