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
use App\Http\Controllers\DataInputOutputController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AdminChatController;
use App\Http\Controllers\SettingController;
use Illuminate\Routing\Router;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\ShipOrderController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/lang/{locale}', function ($locale, Request $request) {

    // if(!in_array($locale,['en','vi'])){
    //     abort(404);
    // }
    // session()->put('locale',$locale);
    $request->session()->put('locale', $locale);
    return redirect()->back();
})->name('change.languge');




//Admin - login
Route::get('/admin-get-login', [AdminLoginController::class, 'showLoginForm'])->name('admin.get_login');
Route::post('/admin-login', [AdminLoginController::class, 'postLogin'])->name('admin.login');
Route::get('/admin-logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// route::prefix('/admin')->middleware('auth_admin')->group(function(){
//     route::get('/', [AdminController::class,'index'])->name('admin.index');
// });


// CHAT BETWEEN CLIENT AND ADMIN
Route::get('/admin-chat',[ChatController::class,'adminIndex'])->name('adminChat.index');
Route::post('/admin-chat',[ChatController::class,'adminSubmit'])->name('adminChat.submit');


Route::get('/client-chat',[ChatController::class,'clientIndex'])->name('clientChat.index');
Route::post('/client-chat',[ChatController::class,'clientSubmit'])->name('clientChat.submit');


// Route::get('/client-chat-send',[ChatController::class,'clientSubmitDemo'])->name('clientChat.submitdemo');

//Admin
Route::prefix('admin')->middleware('auth_admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');

    //message
    Route::get('/message', [AdminChatController::class,'index'])->name('admin.chat.index');
    Route::get('/message/{id}', [AdminChatController::class,'detail'])->name('admin.chat.detail');
    Route::post('/message-admin', [AdminChatController::class,'post_message'])->name('admin.chat.post');

   
    //thong-ke

    Route::get('/thongke_start_end', [AdminController::class, 'thongke_start_end'])->name('admin.thongke_start_end');
    Route::get('/thongke_7_date', [AdminController::class, 'thongke_7_date'])->name('admin.thongke_7_date');
    Route::get('/thongke_30_date', [AdminController::class, 'thongke_30_date'])->name('admin.thongke_30_date');
    Route::get('/thongke_90_date', [AdminController::class, 'thongke_90_date'])->name('admin.thongke_90_date');
    Route::get('/user', [AdminController::class, 'list_user'])->name('user.index');

    Route::get('/profit_start_end',[AdminController::class, 'profit_start_end'])->name('admin.profit_start_end');
    Route::get('/profit_7_date_ago',[AdminController::class, 'profit_7_date_ago'])->name('admin.profit_7_date_ago');
    Route::get('/profit_30_date_ago',[AdminController::class, 'profit_30_date_ago'])->name('admin.profit_30_date_ago');
    Route::get('/profit_90_date_ago',[AdminController::class, 'profit_90_date_ago'])->name('admin.profit_90_date_ago');

    Route::get('/top-4-product-sale-7-ago', [AdminController::class, 'top_4_product_sale_7_date_ago'])->name('admin.top_4_product_sale_7_date_ago');
    Route::get('/top-4-product-sale-30-ago', [AdminController::class, 'top_4_product_sale_30_date_ago'])->name('admin.top_4_product_sale_30_date_ago');
    Route::get('/top-4-product-sale-90-ago', [AdminController::class, 'top_4_product_sale_90_date_ago'])->name('admin.top_4_product_sale_90_date_ago');
    Route::get('/top-4-product-sale-start-end', [AdminController::class, 'top_4_product_sale_start_end'])->name('admin.top_4_product_sale_start_end');

    Route::prefix('/giao-hang')->group(function () {
        Route::get('/', [ShipController::class, 'index'])->name('ship.order.index');
        Route::get('/profile', [ShipController::class, 'profile'])->name('ship.order.index');

        Route::prefix('/don-hang')->group(function(){
            Route::get('/',[ShipOrderController::class,'index'])->name('ship.order.index');
            Route::get('/list/{status}',[ShipOrderController::class,'index_status'])->name('ship.order.list');
            Route::get('/{id}',[ShipOrderController::class,'detail'])->name('ship.order_detail');
            Route::post('/change-status/{status}', [ShipOrderController::class,"change_status"])->name('ship.change_status_order');
            Route::post('/change-shipper', [ShipOrderController::class,"change_shipper"])->name('ship.change_shipper');
        });

        Route::prefix('/shipper')->group(function(){
            Route::get('/',[ShipperController::class,'index'])->name('ship.shiper.index');
            Route::get('/them-shipper',[ShipperController::class,'add'])->name('ship.shiper.add');
            Route::post('/store-shipper',[ShipperController::class,'store'])->name('ship.shiper.store');
            Route::get('/edit-shipper/{id}',[ShipperController::class,'edit'])->name('ship.shiper.edit');
            Route::post('/update-shipper/{id}',[ShipperController::class,'update'])->name('ship.shiper.update');
        });

    });

    // Danh-muc
    Route::prefix('/danh-muc')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');

        Route::get('/change_status', [CategoryController::class, 'change_status'])->name('category.change_status');
    });


    // San-pham
    Route::prefix('/san-pham')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/change_status', [ProductController::class, 'change_status'])->name('product.change_status');
        Route::post('/search-san-pham', [ProductController::class, 'search_product'])->name('product.search_product');
        Route::post('/filter-by-category', [ProductController::class, 'filter_by_category'])->name('product.filter_by_category');

        
    });

    // Tags
    Route::prefix('/the')->group(function () {
        Route::get('/', [TagsController::class, 'index'])->name('tags.index');
        Route::get('/create', [TagsController::class, 'create'])->name('tags.create');
        Route::post('/store', [TagsController::class, 'store'])->name('tags.store');
        Route::get('/delete/{id}', [TagsController::class, 'delete'])->name('tags.delete');
        Route::get('/edit/{id}', [Tagscontroller::class, 'edit'])->name('tags.edit');
        Route::post('/update/{id}', [TagsController::class, 'update'])->name('tags.update');
        Route::get('/change_status', [TagsController::class, 'change_status'])->name('tags.change_status');
    });

    //Blog
    Route::prefix('/bai-viet')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/create', [Blogcontroller::class, 'create'])->name('blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    });

    // Danh-muc-Blog
    Route::prefix('/danh-muc-blog')->group(function () {
        Route::get('/', [CategoryOfBlogController::class, 'index'])->name('category_of_blog.index');
        Route::get('/create', [CategoryOfBlogController::class, 'create'])->name('category_of_blog.create');
        Route::post('/store', [CategoryOfBlogController::class, 'store'])->name('category_of_blog.store');
        Route::get('/delete/{id}', [CategoryOfBlogController::class, 'delete'])->name('category_of_blog.delete');
        Route::get('/edit/{id}', [CategoryOfBlogController::class, 'edit'])->name('category_of_blog.edit');
        Route::post('/update/{id}', [CategoryOfBlogController::class, 'update'])->name('category_of_blog.update');

        Route::get('/change_status', [CategoryOfBlogController::class, 'change_status'])->name('category_of_blog.change_status');
    });

    //Order
    Route::prefix('/order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('/change-status', [OrderController::class, 'change_status'])->name('order.change_status');
        Route::get('/print-pdf/{order_id}', [OrderController::class, 'print_pdf'])->name('order.print_pdf');
        Route::get('/filter/{status}', [OrderController::class, 'filter_by_status'])->name('order.filter_status');
    });

    //Data input output
    Route::prefix('/data-input-output')->group(function () {
        Route::get('/input-index', [DataInputOutputController::class, 'input_index'])->name('datainputoutput.input_index'); //cac don da nhap
        Route::get('/input-create', [DataInputOutputController::class, 'input_create'])->name('datainputoutput.input_create'); //tao moi san pham va so luong
        Route::post('/input-store', [DataInputOutputController::class, 'input_store'])->name('datainputoutput.input_store'); //tao moi san pham va so luong

        Route::get('/output-index', [DataInputOutputController::class, 'output_index'])->name('datainputoutput.output_index'); //cac don xuat hang
        Route::get('/output-create', [DataInputOutputController::class, 'output_create'])->name('datainputoutput.output_create'); //cac don xuat hang


        Route::get('/print-pdf/{order_id}', [DataInputOutputController::class, 'print_pdf'])->name('order.print_pdf');
    });

    //Statistical
    Route::prefix('/statistical')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('/change-status', [OrderController::class, 'change_status'])->name('order.change_status');
        Route::get('/print-pdf/{order_id}', [OrderController::class, 'print_pdf'])->name('order.print_pdf');
    });

    //Warehouse
    Route::prefix('/kho-hang')->group(function () {
        Route::get('/', [WarehouseController::class, 'index'])->name('warehouse.index');
        Route::post('/import-quantity/{product_id}', [WarehouseController::class, 'import_quantity'])->name('warehouse.import_quantity');
        Route::post('/search-kho-hang', [WarehouseController::class, 'search_product'])->name('warehouse.search_product');
        Route::get('/filter-sold-out', [WarehouseController::class, 'filter_sold_out'])->name('warehouse.filter_sold_out');
    });

    //Manager Comment
    Route::prefix('/binh-luan')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('comment.index');
        Route::get('/change-status', [CommentController::class, 'change_status'])->name('comment.change_status');
        Route::get('/reply-comment', [CommentController::class, 'reply_comment'])->name('comment.reply_comment');
        Route::get('/delete-comment', [CommentController::class, 'delete_comment'])->name('comment.delete_comment');
    });

    //Manager human
    Route::prefix('/nhan-su')->middleware('check_role_admin')->group(function () {
        Route::get('/', [AdminController::class, 'manager_human_index'])->name('manager_human.index');
        Route::get('/delete-role/{id}', [AdminController::class, 'manager_human_delete_role'])->name('manager_human.delete_role');
        Route::get('/change-role', [AdminController::class, 'manager_human_change_role'])->name('manager_human.change_role');
        Route::get('/change-user-current/{id}', [AdminController::class, 'manager_human_change_user_current'])->name('manager_human.change_user_current');
        Route::get('/change-role-user', [AdminController::class, 'change_role_user'])->name('manager_human.change_role_user');

        Route::get('/create', [AdminController::class, 'manager_human_create'])->name('manager_human.create');
        Route::post('/store', [AdminController::class, 'manager_human_store'])->name('manager_human.store');
        
    });

    //News
    Route::prefix('/thong-bao')->group(function () {
        Route::get('/change-status', [AdminController::class, 'news_change_status'])->name('news.change_status');
    });

    // Setting
    Route::prefix('/cai-dat')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/update-color-patern/{color}', [SettingController::class, 'update_background_main'])->name('setting.update_background_main');
        Route::get('/get-all-setting', [SettingController::class, 'get_all_setting'])->name('setting.get_all_setting');
        Route::post('/update-percent-setting', [SettingController::class, 'update_percent_setting'])->name('setting.update_percent_setting');
        Route::post('/update-name-site-setting', [SettingController::class, 'update_name_site_setting'])->name('setting.update_name_site_setting');
    });

    route::get('/search-san-pham-ajax-admin', [AdminController::class, 'search_ajax_admin'])->name('admin.search_ajax_admin');


    //event 
    Route::prefix('/su-kien')->group(function(){
        Route::get('/', [EventController::class, 'index'])->name('event.index');
        Route::get('/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/store', [EventController::class, 'store'])->name('event.store');
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
        Route::post('/update/{id}', [EventController::class, 'update'])->name('event.update');
        Route::get('/delete/{id}', [EventController::class, 'delete'])->name('event.delete');
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
Route::get('/', [HomeController::class, 'index'])->name('home.index');



//Contact
Route::prefix('/contact')->group(function () {
    Route::get('/', [HomeController::class, 'contact'])->name('home.contact');
});

// danh-muc-shop
Route::prefix('/danh-muc')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'category'])->name('home.category');
});

// San-pham
Route::prefix('/san-pham')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'product'])->name('home.product');
});

// All-san-pham
Route::prefix('/all-san-pham')->group(function () {
    Route::get('/', [HomeController::class, 'all_product'])->name('home.all_product');
});

// Gio-hang
Route::prefix('/gio-hang')->group(function () {
    Route::get('/add_one_cart', [CartController::class, 'add_one_cart'])->name('cart.add_one_cart');
    Route::get('/add-cart', [CartController::class, 'add_cart'])->name('cart.add_cart');
    Route::get('/show-cart', [CartController::class, 'show_cart'])->name('cart.show_cart');
    Route::get('/delete_one_cart/{rowId}', [CartController::class, 'delete_one_cart'])->name('cart.delete_one_cart');
    // ajax
    Route::get('/update_cart', [CartController::class, 'update_cart'])->name('cart.update_cart'); //cap nhat input trang gio hang
    Route::get('/check-quantity', [CartController::class, 'check_quantity'])->name('cart.check_quantity'); //cap nhat input trang gio hang

});

// Checkout
Route::prefix('/checkout')->middleware('verified')->group(function () {
    Route::get('/', [CheckoutController::class, 'checkout_show'])->name('checkout.show');
    Route::post('/add-order', [CheckoutController::class, 'add_order'])->name('check.add_order');
    Route::get('/lich-su-mua-hang', [CheckoutController::class, 'lich_su_mua_hang'])->name('checkout.lich_su_mua_hang');
    Route::get('/lich-su-mua-hang-filter/{status}', [CheckoutController::class, 'lich_su_mua_hang_filter'])->name('checkout.lich_su_mua_hang_filter');
    Route::get('/receive-order', [CheckoutController::class, 'receive_order'])->name('checkout.receive_order');
    Route::post('/detroy-order/{id}', [CheckoutController::class, 'detroy_order'])->name('checkout.detroy_order');
    Route::post('/thanh-toan-vnpay', [CheckoutController::class, 'payment_momo'])->name('checkout.payment_momo');

    //comment
    Route::post('/post-comment', [ProductController::class, 'post_comment'])->name('product.post_comment');
    Route::get('/delete-comment/{id}', [ProductController::class, 'delete_comment'])->name('delete.comment');
    Route::get('/edit-comment/{id}', [ProductController::class, 'edit_comment'])->name('edit.comment');
    Route::post('update-comment/{id}', [ProductController::class, 'update_comment'])->name('update.comment');

    //wish List 
    Route::post('/wish-list', [HomeController::class, 'wish_list'])->name('home.wish_list');
    Route::get('/get-wish-list', [HomeController::class, 'get_wish_list'])->name('home.get_wish_list');
    Route::get('/delete-wish-list', [HomeController::class, 'delete_wish_list'])->name('home.delete_wish_list');
});


// Bai-viet
Route::prefix('/bai-viet')->group(function () {
    Route::get('/', [HomeController::class, 'blog'])->name('home.blog');
});

// Bai-viet-chi-tiet
Route::prefix('/bai-viet-detail')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'blog_detail'])->name('home.blog_detail');
});

// Bai-viet
Route::prefix('/bai-viet')->group(function () {
    Route::get('/', [HomeController::class, 'blog'])->name('home.blog');
});

// Bai-viet-category(Blog)
Route::prefix('/bai-viet-danh-muc')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'category_of_blog'])->name('home.category_of_blog');
});

// Tags-bai-viet
Route::prefix('/bai-viet-tags')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'tags'])->name('home.tags');
});


// User-infomation
route::prefix('/user_info')->group(function () {
    route::get('/', [HomeController::class, 'get_user_info'])->name('home.get_user_info');
    route::post('/edit-info-user', [HomeController::class, 'edit_user_info'])->name('home.edit_user_info');
});



//Gui-Mail
route::post('/post-emails', [HomeController::class, 'post_mail_conact'])->name('home.post_mail_contact');
Route::get('/test-emails', [HomeController::class, 'test_mail']);
Route::get('/test-emails2', [HomeController::class, 'test_mail2']);

//Search product
route::get('/search-san-pham-ajax', [HomeController::class, 'search_ajax'])->name('home.search_ajax');
route::post('/search-san-pham', [HomeController::class, 'search_product'])->name('home.search_product');

//Filter product
route::post('/filter-san-pham', [HomeController::class, 'filter_product'])->name('home.filter_product');
route::post('/filter-san-pham-by-danh-muc', [HomeController::class, 'filter_product_by_category'])->name('home.filter_product_by_category');

//Sort By
route::get('/low-to-high-all-product', [HomeController::class, 'sort_low_to_high_all_product'])->name('sort_low_to_high_all_product');
route::get('/high-to-low-all-product', [HomeController::class, 'sort_high_to_low_all_product'])->name('sort_high_to_low_all_product');

route::get('/low-to-high-category/{slug}', [HomeController::class, 'sort_low_to_high_category'])->name('sort_low_to_high_category');
route::get('/high-to-low-category/{slug}', [HomeController::class, 'sort_high_to_low_category'])->name('sort_high_to_low_category');



route::post('/apply-discount', [HomeController::class, 'apply_discount'])->name('discout.apply_discount');
// Route::get('qr-code', function () {
//     return QrCode::size(500)->generate('Welcome to kerneldev.com!');
// });
