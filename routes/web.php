<?php

use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryControler;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ChartController;
use App\Http\Controllers\admin\HeaderController;
use App\Http\Controllers\admin\InfoController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\PostCategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\PromotionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductClientController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromotionProductClientController;
use App\Http\Controllers\SearchProductController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
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

/////admin

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



////admin

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, "login"])->name('login');

    Route::post('/check', [AuthController::class, "check"])->name('check');



    Route::middleware((["auth:admin"]))->group(function () {

        Route::get('/home', [AuthController::class, "index"])->name('home');


        Route::get('/logout', [AuthController::class, "logout"])->name('logout');

        ////admin-info
        Route::prefix('info')->name("info.")->group(function () {

            Route::get('/show', [InfoController::class, "index"])->name('show');
            Route::post('/update/{id}', [InfoController::class, "update"])->name('update');
            Route::get('/show_password', [InfoController::class, "show_password"])->name('show_password');
            Route::post('/update_password/{id}', [InfoController::class, "update_password"])->name('update_password');
        });


        ////admin-user
        Route::prefix('user')->name("user.")->group(function () {

            Route::get('/list', [UserController::class, "index"])->name('list')->middleware("can:admin-list");
            Route::get('/add', [UserController::class, "create"])->name('create')->middleware("can:admin-add");

            Route::post('/store', [UserController::class, "store"])->name('store');
            Route::get('/edit/{id}', [UserController::class, "show"])->middleware("can:admin-edit");
            Route::post('/update/{id}', [UserController::class, "update"]);

            Route::DELETE('/delete', [UserController::class, "delete"])->middleware("can:admin-delete");
        });



        ////admin-order
        Route::prefix('order')->name("order.")->group(function () {

            Route::get('/list', [AdminOrderController::class, "index"])->name('list')->middleware("can:order-list");;
            // Route::get('/add', [UserController::class, "create"])->name('create');

            // Route::post('/store', [UserController::class, "store"])->name('store');
            Route::get('/edit/{id}', [AdminOrderController::class, "show"])->name("edit")->middleware("can:order-edit");
            Route::post('/update/{id}', [AdminOrderController::class, "update"])->name("update");

            Route::DELETE('/delete', [AdminOrderController::class, "delete"])->middleware("can:order-delete");;
        });




        ////admin-category
        Route::prefix('category')->name("category.")->group(function () {

            Route::get('/list', [CategoryController::class, "index"])->name('list')->middleware("can:category-list");
            Route::get('/add', [CategoryController::class, "create"])->name('create')->middleware("can:category-addt");

            Route::post('/store', [CategoryController::class, "store"])->name('store');
            Route::get('/edit/{id}', [CategoryController::class, "show"])->middleware("can:category-edit");
            Route::post('/update/{id}', [CategoryController::class, "update"]);

            Route::DELETE('/delete', [CategoryController::class, "delete"])->middleware("can:category-delete");;
        });



        ////admin-product
        Route::prefix('product')->name("product.")->group(function () {


            Route::get('/add', [ProductController::class, "create"])->name('create')->middleware("can:product-add");

            Route::post('/store', [ProductController::class, "store"])->name('store');
            Route::get('/list', [ProductController::class, "index"])->name('list')->middleware("can:product-list");


            Route::get('/edit/{id}', [ProductController::class, "show"])->middleware("can:product-edit");
            Route::post('/update/{id}', [ProductController::class, "update"]);

            Route::DELETE('/delete', [ProductController::class, "delete"])->middleware("can:product-delete");
        });
        //promotion
        Route::prefix('promotion')->name("promotion.")->middleware("can:other")->group(function () {


            Route::get('/add', [PromotionController::class, "create"])->name('create');

            Route::post('/store', [PromotionController::class, "store"])->name('store');
            Route::get('/list', [PromotionController::class, "index"])->name('list');
            Route::DELETE('/delete', [PromotionController::class, "delete"]);


            Route::get('/edit/{id}', [PromotionController::class, "show"]);
            Route::post('/update/{id}', [PromotionController::class, "update"]);

            Route::get('sync', [PromotionController::class, "sync"])->name('sync');
        });

        ////admin-tag
        Route::prefix('tag')->name("tag.")->group(function () {


            Route::get('/add', [TagController::class, "create"])->name('create')->middleware("can:tag-add");;

            Route::post('/store', [TagController::class, "store"])->name('store');
            Route::get('/list', [TagController::class, "index"])->name('list')->middleware("can:tag-list");
            Route::DELETE('/delete', [TagController::class, "delete"])->middleware("can:tag-delete");;


            Route::get('/edit/{id}', [TagController::class, "show"])->middleware("can:tag-edit");
            Route::post('/update/{id}', [TagController::class, "update"]);
        });




        ////admin-post_category
        Route::prefix('post_category')->name("post_category.")->group(function () {


            Route::get('/add', [PostCategoryController::class, "create"])->name('create');

            Route::post('/store', [PostCategoryController::class, "store"])->name('store');
            Route::get('/list', [PostCategoryController::class, "index"])->name('list');
            Route::DELETE('/delete', [PostCategoryController::class, "delete"]);


            Route::get('/edit/{id}', [PostCategoryController::class, "show"]);

            Route::post('/update/{id}', [PostCategoryController::class, "update"]);
        });





        //admin-post
        Route::prefix('post')->name("post.")->group(function () {


            Route::get('/add', [PostController::class, "create"])->name('create');

            Route::post('/store', [PostController::class, "store"])->name('store');
            Route::get('/list', [PostController::class, "index"])->name('list');


            Route::get('/edit/{id}', [PostController::class, "show"]);

            Route::post('/update/{id}', [PostController::class, "update"]);

            Route::DELETE('/delete', [PostController::class, "delete"]);
        });



        //admin-chart
        Route::prefix('chart')->name("chart.")->group(function () {


            // Route::get('/add', [PostController::class, "create"])->name('create');

            // Route::post('/store', [PostController::class, "store"])->name('store');
            Route::get('/list', [ChartController::class, "index"])->name('list')->middleware("can:other");


            // Route::get('/edit/{id}', [PostController::class, "show"]);

            // Route::post('/update/{id}', [PostController::class, "update"]);

            // Route::DELETE('/delete', [PostController::class, "delete"]);
        });











        //////custom

        Route::prefix('header')->name("header.")->middleware("can:other")->group(function () {

            ////banner-head
            Route::get('/edit_banner', [HeaderController::class, "show_edit_banner"])->name('edit_banner');

            Route::get('/add_banner', [HeaderController::class, "create_banner"])->name('create_banner');

            Route::post('/store_banner', [HeaderController::class, "store_banner"])->name('store_banner');
            Route::post('/update_banner', [HeaderController::class, "update_banner"])->name("update_banner");

            Route::DELETE('/delete_banner', [HeaderController::class, "delete_banner"]);

            ////slider-head
            Route::get('/edit_slider', [HeaderController::class, "show_edit_slider"])->name('edit_slider');

            Route::get('/add_slider', [HeaderController::class, "create_slider"])->name('create_slider');

            Route::post('/store_slider', [HeaderController::class, "store_slider"])->name('store_slider');
            Route::post('/update_slider', [HeaderController::class, "update_slider"])->name("update_slider");

            Route::DELETE('/delete_slider', [HeaderController::class, "delete_slider"]);
        });





        //////phan quyen

        ////permission
        Route::prefix('permission')->name("permission.")->middleware("can:permission")->group(function () {

            Route::get('/add', [PermissionController::class, "create"])->name('create');
            Route::post('/store', [PermissionController::class, "store"])->name('store');
        });
        ///role

        Route::prefix('role')->name("role.")->group(function () {

            Route::get('/add', [RoleController::class, "create"])->name('create')->middleware("can:role-add");
            Route::post('/store', [RoleController::class, "store"])->name('store');
            Route::get('/list', [RoleController::class, "index"])->name('list')->middleware("can:role-list");
            // Route::get('/list', [RoleController::class, "index"])->name('list');
            Route::DELETE('/delete', [RoleController::class, "delete"])->middleware("can:role-delete");;
            // Route::get('/edit/{id}', [RoleController::class, "show"]);
            Route::get('/edit/{id}', [RoleController::class, "show"])->middleware("can:role-edit");

            Route::post('/update/{id}', [RoleController::class, "update"])->name("update");
        });











        Route::prefix('upload')->name("upload.")->group(function () {

            Route::post('/uploadthumb', [UploadController::class, "uploadthumb"])->name('uploadthumb');
            Route::post('/multiupload_thumb', [UploadController::class, "multiupload_thumb"])->name('multiupload_thumb');
        });
    });
});




///cilent


Route::get("/", [HomeController::class, "index"])->name("client.home");


///login

Route::get("/client/login", [ClientAuthController::class, "show_login"])->name("client.login");
Route::get("/client/register", [ClientAuthController::class, "show_register"])->name("client.register");
Route::post("/client/register_store", [ClientAuthController::class, "register_store"])->name("client.register.store");
Route::get("/client/register_alert", [ClientAuthController::class, "register_alert"])->name("client.register.alert");
Route::get("/client/register_verified", [ClientAuthController::class, "register_verified"])->name("client.register.verified");
Route::post("/client/check", [ClientAuthController::class, "check"])->name("client.check");
Route::get("/client/logout", [ClientAuthController::class, "logout"])->name("client.logout");

Route::get("/client/forget_password", [ClientAuthController::class, "forget_password"])->name("client.forget_password");
Route::post("/client/take_password", [ClientAuthController::class, "take_password"])->name("client.take_password");
Route::get("/client/store_forget_password", [ClientAuthController::class, "store_forget_password"])->name("client.store.forget_password");
Route::post("/client/store_take_password/{id}", [ClientAuthController::class, "store_take_password"])->name("client.store.take_password");





///product
Route::get("/danh-muc/{id}-{slug}", [CategoryProductClientController::class, "index"]);
Route::get("/load_product", [CategoryProductClientController::class, "load_product"]);
Route::get("/chi-tiet-san-pham/{id}", [CategoryProductClientController::class, "load_detail_product"])->name("load_detail_product");


////promotion product

Route::get("/khuyen-mai", [PromotionProductClientController::class, "index"])->name("promotion-client");
////search product

Route::get("/tim-kiem", [SearchProductController::class, "index"])->name("search-client");
Route::get("/load_search_product", [SearchProductController::class, "load_search_product"])->name("load_search_product");
Route::post("/auto_complete", [SearchProductController::class, "auto_complete"])->name("auto_complete");

////cart

Route::get("/cart/show", [CartController::class, "index"])->name("cart.show");
Route::post("/cart/load_select", [CartController::class, "load_select"])->name("cart.load_select");
Route::get("/cart/add/{id}", [CartController::class, "add"])->name("cart.add");
Route::get("/cart/remove/{rowId}", [CartController::class, "remove"])->name("cart.remove");
Route::get("/cart/destroy", [CartController::class, "destroy"])->name("cart.destroy");
Route::get("/cart/update", [CartController::class, "update"])->name("cart.update");
Route::get("/cart/update_ajax", [CartController::class, "update_ajax"])->name("cart.update_ajax");
Route::get("/cart/add_ajax", [CartController::class, "add_ajax"])->name("cart.add_ajax");

////order


Route::post("/order/store", [OrderController::class, "store"])->name("order.store");
Route::get("/order/success", [OrderController::class, "success"])->name("order.success");
Route::post("/order/momo_payment", [OrderController::class, "momo_payment"])->name("order.momo_payment");
Route::get("/order/momo_payment_handel", [OrderController::class, "momo_payment_handel"])->name("order.momo_paymen_handelt");


Route::get("/order/show_check", [OrderController::class, "show_check"])->name("order.show_check");
Route::post("/order/store_check", [OrderController::class, "store_check"])->name("order.store_check");






////info-info_order




















// Route::get("", [MainController::class, "index"]);

Route::middleware('auth')->group(function () {

    Route::get("/info/show", [ClientInfoController::class, "info_show"])->name("info.show");
    Route::post("/info/store", [ClientInfoController::class, "info_store"])->name("info.store");
    Route::get("/info/order_show", [ClientInfoController::class, "info_order_show"])->name("info.order_show");
});
