<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryOfBlogController;
use App\Models\CategoryOfBlog;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

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


//change languge
Route::get('/lang/{locale}',function($locale,Request $request){
    
    // if(!in_array($locale,['en','vi'])){
    //     abort(404);
    // }
    // session()->put('locale',$locale);
    $request->session()->put('locale',$locale);
    return redirect()->back();
})->name('change.languge');




//Admin - login
Route::get('/admin-get-login',[AdminLoginController::class,'showLoginForm'])->name('admin.get_login');
Route::post('/admin-login',[AdminLoginController::class,'postLogin'])->name('admin.login');
Route::get('/admin-logout',[AdminLoginController::class,'logout'])->name('admin.logout');

// route::prefix('/admin')->middleware('auth_admin')->group(function(){
//     route::get('/', [AdminController::class,'index'])->name('admin.index');
// });

//Admin
Route::prefix('admin')->middleware('auth_admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    //thong-ke
    
    Route::get('/thongke_start_end',[AdminController::class,'thongke_start_end'])->name('admin.thongke_start_end');
    Route::get('/thongke_7_date',[AdminController::class,'thongke_7_date'])->name('admin.thongke_7_date');
    Route::get('/thongke_30_date',[AdminController::class,'thongke_30_date'])->name('admin.thongke_30_date');
    Route::get('/thongke_90_date',[AdminController::class,'thongke_90_date'])->name('admin.thongke_90_date');
    Route::get('/user',[AdminController::class,'list_user'])->name('user.index');

    // Danh-muc
    Route::prefix('/danh-muc')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');

        Route::get('/change_status',[CategoryController::class,'change_status'])->name('category.change_status');
    });


    // San-pham
    Route::prefix('/san-pham')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('product.index');
        Route::get('/create',[ProductController::class,'create'])->name('product.create');
        Route::post('/store',[ProductController::class,'store'])->name('product.store');
        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');

        Route::get('/change_status',[ProductController::class,'change_status'])->name('product.change_status');

        Route::post('/search-san-pham',[ProductController::class,'search_product'])->name('product.search_product');
    });

    // Tags
    Route::prefix('/the')->group(function(){
        Route::get('/',[TagsController::class,'index'])->name('tags.index');
        Route::get('/create',[TagsController::class,'create'])->name('tags.create');
        Route::post('/store',[TagsController::class,'store'])->name('tags.store');
        Route::get('/delete/{id}',[TagsController::class,'delete'])->name('tags.delete');
        Route::get('/edit/{id}',[Tagscontroller::class,'edit'])->name('tags.edit');
        Route::post('/update/{id}',[TagsController::class,'update'])->name('tags.update');

        Route::get('/change_status',[TagsController::class,'change_status'])->name('tags.change_status');
    });

    //Blog
    Route::prefix('/bai-viet')->group(function(){
        Route::get('/',[BlogController::class,'index'])->name('blog.index');
        Route::get('/create',[Blogcontroller::class,'create'])->name('blog.create');
        Route::post('/store',[BlogController::class,'store'])->name('blog.store');
        Route::get('/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');
        Route::get('/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
        Route::post('/update/{id}',[BlogController::class,'update'])->name('blog.update');
    });

    // Danh-muc-Blog
    Route::prefix('/danh-muc-blog')->group(function(){
        Route::get('/',[CategoryOfBlogController::class,'index'])->name('category_of_blog.index');
        Route::get('/create',[CategoryOfBlogController::class,'create'])->name('category_of_blog.create');
        Route::post('/store',[CategoryOfBlogController::class,'store'])->name('category_of_blog.store');
        Route::get('/delete/{id}',[CategoryOfBlogController::class,'delete'])->name('category_of_blog.delete');
        Route::get('/edit/{id}',[CategoryOfBlogController::class,'edit'])->name('category_of_blog.edit');
        Route::post('/update/{id}',[CategoryOfBlogController::class,'update'])->name('category_of_blog.update');

        Route::get('/change_status',[CategoryOfBlogController::class,'change_status'])->name('category_of_blog.change_status');
    });

    //Order
    Route::prefix('/order')->group(function(){
        Route::get('/',[OrderController::class,'index'])->name('order.index');
        Route::get('/change-status',[OrderController::class,'change_status'])->name('order.change_status');
        Route::get('/print-pdf/{order_id}',[OrderController::class,'print_pdf'])->name('order.print_pdf');
    });

    
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Route::get('/logout_user',function(){
//     Auth::logout();
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


// FRONT_END
// Home-Page
Route::get('/',[HomeController::class,'index'])->name('home.index');



//Contact
Route::prefix('/contact')->group(function(){
    Route::get('/',[HomeController::class,'contact'])->name('home.contact');
});

// danh-muc-shop
Route::prefix('/danh-muc')->group(function(){
    Route::get('/{slug}',[HomeController::class,'category'])->name('home.category');
});

// San-pham
Route::prefix('/san-pham')->group(function(){
    Route::get('/{slug}',[HomeController::class,'product'])->name('home.product');
});

// All-san-pham
Route::prefix('/all-san-pham')->group(function(){
    Route::get('/',[HomeController::class,'all_product'])->name('home.all_product');
});

// Gio-hang
Route::prefix('/gio-hang')->group(function(){
    Route::get('/add_one_cart',[CartController::class,'add_one_cart'])->name('cart.add_one_cart');
    Route::get('/add-cart',[CartController::class,'add_cart'])->name('cart.add_cart');
    Route::get('/show-cart',[CartController::class,'show_cart'])->name('cart.show_cart');
    Route::get('/delete_one_cart/{rowId}',[CartController::class,'delete_one_cart'])->name('cart.delete_one_cart');
    // ajax
    Route::get('/update_cart',[CartController::class,'update_cart'])->name('cart.update_cart'); //cap nhat input trang gio hang

});

// Checkout
Route::prefix('/checkout')->middleware('verified')->group(function(){
    Route::get('/',[CheckoutController::class,'checkout_show'])->name('checkout.show');
    Route::post('/add-order',[CheckoutController::class,'add_order'])->name('check.add_order');
    Route::get('/lich-su-mua-hang',[CheckoutController::class,'lich_su_mua_hang'])->name('checkout.lich_su_mua_hang');
    Route::get('/receive-order',[CheckoutController::class,'receive_order'])->name('checkout.receive_order');
    Route::get('/detroy-order/{id}',[CheckoutController::class,'detroy_order'])->name('checkout.detroy_order');

    Route::post('/thanh-toan-vnpay',[CheckoutController::class,'payment_momo'])->name('checkout.payment_momo');

    //comment
    Route::post('/post-comment',[ProductController::class,'post_comment'])->name('product.post_comment');
    Route::get('/delete-comment/{id}',[ProductController::class,'delete_comment'])->name('delete.comment');
    Route::get('/edit-comment/{id}',[ProductController::class,'edit_comment'])->name('edit.comment');
    Route::post('update-comment/{id}',[ProductController::class,'update_comment'])->name('update.comment');

    //wish List 
    Route::post('/wish-list',[HomeController::class,'wish_list'])->name('home.wish_list');
    Route::get('/get-wish-list',[HomeController::class,'get_wish_list'])->name('home.get_wish_list');
});


// Bai-viet
Route::prefix('/bai-viet')->group(function(){
    Route::get('/',[HomeController::class,'blog'])->name('home.blog');
});

// Bai-viet-chi-tiet
Route::prefix('/bai-viet-detail')->group(function(){
    Route::get('/{slug}',[HomeController::class,'blog_detail'])->name('home.blog_detail');
});

// Bai-viet
Route::prefix('/bai-viet')->group(function(){
    Route::get('/',[HomeController::class,'blog'])->name('home.blog');
});

// Bai-viet-category(Blog)
Route::prefix('/bai-viet-danh-muc')->group(function(){
    Route::get('/{slug}',[HomeController::class,'category_of_blog'])->name('home.category_of_blog');
});

// Tags-bai-viet
Route::prefix('/bai-viet-tags')->group(function(){
    Route::get('/{slug}',[HomeController::class,'tags'])->name('home.tags');
});


// User-infomation
route::prefix('/user_info')->group(function(){
    route::get('/', [HomeController::class,'get_user_info'])->name('home.get_user_info');
    route::post('/edit-info-user', [HomeController::class,'edit_user_info'])->name('home.edit_user_info');
});



//Gui-Mail
route::post('/post-emails',[HomeController::class,'post_mail_conact'])->name('home.post_mail_contact');
Route::get('/test-emails',[HomeController::class,'test_mail']);
Route::get('/test-emails2',[HomeController::class,'test_mail2']);

//Search product
route::get('/search-san-pham-ajax',[HomeController::class,'search_ajax'])->name('home.search_ajax');
route::post('/search-san-pham',[HomeController::class,'search_product'])->name('home.search_product');

//Filter product
route::post('/filter-san-pham',[HomeController::class,'filter_product'])->name('home.filter_product');
route::post('/filter-san-pham-by-danh-muc',[HomeController::class,'filter_product_by_category'])->name('home.filter_product_by_category');

//Sort By
route::get('/low-to-high-all-product',[HomeController::class,'sort_low_to_high_all_product'])->name('sort_low_to_high_all_product');
route::get('/high-to-low-all-product',[HomeController::class,'sort_high_to_low_all_product'])->name('sort_high_to_low_all_product');

route::get('/low-to-high-category/{slug}',[HomeController::class,'sort_low_to_high_category'])->name('sort_low_to_high_category');
route::get('/high-to-low-category/{slug}',[HomeController::class,'sort_high_to_low_category'])->name('sort_high_to_low_category');


