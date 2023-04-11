<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BreadController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ProductInventoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TrustedSectionController;

Route::middleware('admin.guest')->name('admin.')->group(function() {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
 

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request');

    Route::get('new-password/{id}', 'Auth\ResetPasswordController@newPasswordForm')->name('password.newPassword');

    Route::post('password/set-password/{id}', 'Auth\ResetPasswordController@sepPassword')->name('password.setPassword');

   
});

Route::middleware('admin')->name('admin.')->group(function() {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('can:browse_dashboard');

    Route::controller(BreadController::class)->group(function(){
        Route::get('bread', 'index')->name('bread.index')->middleware('can:browse_bread');
        Route::get('bread/create', 'create')->name('bread.create')->middleware('can:add_bread');
        Route::get('bread/{slug}/edit', 'edit')->name('bread.edit')->middleware('can:edit_bread');
        Route::put('bread/{bread}/update', 'update')->name('bread.update')->middleware('can:edit_bread');
        Route::delete('bread/{slug}/delete', 'destroy')->name('bread.destroy')->middleware('can:delete_bread');
        Route::post('bread', 'store')->name('bread.store')->middleware('can:add_bread');
    });


    Route::controller(RoleController::class)->group(function(){
        Route::get('role', 'index')->name('role.index')->middleware('can:browse_role');
        Route::get('role/create', 'create')->name('role.create')->middleware('can:add_role');
        Route::get('role/{role}/edit', 'edit')->name('role.edit')->middleware('can:edit_role');
        Route::post('role', 'store')->name('role.store')->middleware('can:add_role');
        Route::put('role/{role}', 'update')->name('role.update')->middleware('can:edit_role');
        Route::delete('role/{slug}/delete', 'destroy')->name('role.destroy')->middleware('can:delete_role');
    });


    Route::controller(MenuController::class)->group(function(){
        Route::get('menu', 'index')->name('menu.index')->middleware('can:browse_menu');
        Route::get('menu/create', 'create')->name('menu.create')->middleware('can:add_menu');
        Route::get('menu/{menu}/edit', 'edit')->name('menu.edit')->middleware('can:edit_menu');
        Route::post('menu', 'store')->name('menu.store')->middleware('can:add_menu');
        Route::put('menu/{menu}', 'update')->name('menu.update')->middleware('can:edit_menu');
        Route::delete('menu/{menu}', 'destroy')->name('menu.destroy')->middleware('can:delete_menu');
    });


     //Admin
    Route::controller(AdminController::class)->group(function(){
        Route::match(['get','patch'],'admin', 'index')->name('admin.index')->middleware('can:browse_admin');
        Route::get('admin/create', 'create')->name('admin.create')->middleware('can:add_admin');
        Route::get('admin/{admin}', 'show')->name('admin.show')->middleware('can:read_admin');
        Route::get('admin/{admin}/edit', 'edit')->name('admin.edit')->middleware('can:edit_admin');
        Route::post('admin', 'store')->name('admin.store')->middleware('can:add_admin');
        Route::put('admin/{admin}', 'update')->name('admin.update')->middleware('can:edit_admin');
        Route::delete('admin/{admin}/delete', 'destroy')->name('admin.destroy')->middleware('can:delete_admin');

        Route::get('profile', 'profile')->name('profile');
        Route::put('profile/update', 'profileUpdate')->name('profile.update');
        Route::put('profile/photo/update/{admin}', 'profilePhotoUpdate')->name('profile.photo.update');
        Route::put('profile/cover/photo/update/{admin}', 'profileCoverPhotoUpdate')->name('profile.cover.photo.update');

        Route::get('change-password/{admin}', 'changePassword')->name('change-password');
        Route::put('update-password/{admin}', 'updatePassword')->name('update-password');

    });

     //Site Setting
    Route::controller(SiteSettingController::class)->group(function(){
        Route::get('site-setting', 'index')->name('site-setting.index')->middleware('can:browse_site_setting');
        Route::post('logo', 'logo')->name('site-setting.logo')->middleware('can:logo_site_setting');
    });

     //Product
    Route::controller(ProductController::class)->group(function(){
        Route::match(['get','patch'],'product', 'index')->name('product.index')->middleware('can:browse_product');
        Route::get('product/create', 'create')->name('product.create')->middleware('can:add_product');
        Route::get('product/{product}', 'show')->name('product.show')->middleware('can:read_product');
        Route::get('product/{product}/edit', 'edit')->name('product.edit')->middleware('can:edit_product');
        Route::post('product', 'store')->name('product.store')->middleware('can:add_product');
        Route::put('product/{product}', 'update')->name('product.update')->middleware('can:edit_product');
        Route::delete('product/{product}/delete', 'destroy')->name('product.destroy')->middleware('can:delete_product');


        Route::match(['post','put'],'product/generate/variants', 'generateVariant')->name('generate.variant');

    });


     //ProductInventory
    Route::controller(ProductInventoryController::class)->group(function(){
        Route::match(['get','patch'],'product/{product}/inventory', 'index')->name('product.inventory.index')->middleware('can:browse_product');
        Route::get('product/{product}/inventory/create', 'create')->name('product.inventory.create')->middleware('can:add_product');
        Route::get('product-inventory/{product_inventory}', 'show')->name('product.inventory.show')->middleware('can:read_product');
        Route::get('product-inventory/{product_inventory}/edit', 'edit')->name('product.inventory.edit')->middleware('can:edit_product');
        Route::post('product-inventory', 'store')->name('product.inventory.store')->middleware('can:add_product');
        Route::put('product-inventory/{product_inventory}', 'update')->name('product.inventory.update')->middleware('can:edit_product');
        Route::delete('product-inventory/{product_inventory}/delete', 'destroy')->name('product.inventory.destroy')->middleware('can:delete_product');
    });


    //Collection
    Route::controller(CollectionController::class)->group(function(){
        Route::match(['get','patch'],'collection', 'index')->name('collection.index')->middleware('can:browse_collection');
        Route::get('collection/create', 'create')->name('collection.create')->middleware('can:add_collection');
        Route::get('collection/{collection}', 'show')->name('collection.show')->middleware('can:read_collection');
        Route::get('collection/{collection}/edit', 'edit')->name('collection.edit')->middleware('can:edit_collection');
        Route::post('collection', 'store')->name('collection.store')->middleware('can:add_collection');
        Route::put('collection/{collection}', 'update')->name('collection.update')->middleware('can:edit_collection');
        Route::delete('collection/{collection}/delete', 'destroy')->name('collection.destroy')->middleware('can:delete_collection');
    });

    //Tag
    Route::controller(TagController::class)->group(function(){
        Route::match(['get','patch'],'tag', 'index')->name('tag.index')->middleware('can:browse_tag');
        Route::get('tag/create', 'create')->name('tag.create')->middleware('can:add_tag');
        Route::get('tag/{tag}', 'show')->name('tag.show')->middleware('can:read_tag');
        Route::get('tag/{tag}/edit', 'edit')->name('tag.edit')->middleware('can:edit_tag');
        Route::post('tag', 'store')->name('tag.store')->middleware('can:add_tag');
        Route::put('tag/{tag}', 'update')->name('tag.update')->middleware('can:edit_tag');
        Route::delete('tag/{tag}/delete', 'destroy')->name('tag.destroy')->middleware('can:delete_tag');
    });


    //Brand
    Route::controller(BrandController::class)->group(function(){
        Route::match(['get','patch'],'brand', 'index')->name('brand.index')->middleware('can:browse_brand');
        Route::get('brand/create', 'create')->name('brand.create')->middleware('can:add_brand');
        Route::get('brand/{brand}', 'show')->name('brand.show')->middleware('can:read_brand');
        Route::get('brand/{brand}/edit', 'edit')->name('brand.edit')->middleware('can:edit_brand');
        Route::post('brand', 'store')->name('brand.store')->middleware('can:add_brand');
        Route::put('brand/{brand}', 'update')->name('brand.update')->middleware('can:edit_brand');
        Route::delete('brand/{brand}/delete', 'destroy')->name('brand.destroy')->middleware('can:delete_brand');
    });


    //Product Type
    Route::controller(ProductTypeController::class)->group(function(){
        Route::match(['get','patch'],'product-type', 'index')->name('product-type.index')->middleware('can:browse_product_type');
        Route::get('product-type/create', 'create')->name('product-type.create')->middleware('can:add_product_type');
        Route::get('product-type/{product_type}', 'show')->name('product-type.show')->middleware('can:read_product_type');
        Route::get('product-type/{product_type}/edit', 'edit')->name('product-type.edit')->middleware('can:edit_product_type');
        Route::post('product-type', 'store')->name('product-type.store')->middleware('can:add_product_type');
        Route::put('product-type/{product_type}', 'update')->name('product-type.update')->middleware('can:edit_product_type');
        Route::delete('product-type/{product_type}/delete', 'destroy')->name('product-type.destroy')->middleware('can:delete_product_type');
    });


    //vendor
    Route::controller(VendorController::class)->group(function(){
        Route::match(['get','patch'],'vendor', 'index')->name('vendor.index')->middleware('can:browse_vendor');
        Route::get('vendor/create', 'create')->name('vendor.create')->middleware('can:add_vendor');
        Route::get('vendor/{vendor}', 'show')->name('vendor.show')->middleware('can:read_vendor');
        Route::get('vendor/{vendor}/edit', 'edit')->name('vendor.edit')->middleware('can:edit_vendor');
        Route::post('vendor', 'store')->name('vendor.store')->middleware('can:add_vendor');
        Route::put('vendor/{vendor}', 'update')->name('vendor.update')->middleware('can:edit_vendor');
        Route::delete('vendor/{vendor}/delete', 'destroy')->name('vendor.destroy')->middleware('can:delete_vendor');
    });


    //Slider
    Route::controller(SliderController::class)->group(function(){
        Route::match(['get','patch'],'slider', 'index')->name('slider.index')->middleware('can:browse_slider');
        Route::get('slider/create', 'create')->name('slider.create')->middleware('can:add_slider');
        Route::get('slider/{slider}', 'show')->name('slider.show')->middleware('can:read_slider');
        Route::get('slider/{slider}/edit', 'edit')->name('slider.edit')->middleware('can:edit_slider');
        Route::post('slider', 'store')->name('slider.store')->middleware('can:add_slider');
        Route::put('slider/{slider}', 'update')->name('slider.update')->middleware('can:edit_slider');
        Route::delete('slider/{slider}/delete', 'destroy')->name('slider.destroy')->middleware('can:delete_slider');
    });


    //media
    Route::controller(MediaController::class)->group(function(){
        Route::match(['get','patch'],'media', 'index')->name('media.index')->middleware('can:browse_media');
        Route::get('media/create', 'create')->name('media.create')->middleware('can:add_media');
        Route::get('media/{media}', 'show')->name('media.show')->middleware('can:read_media');
        Route::get('media/{media}/edit', 'edit')->name('media.edit')->middleware('can:edit_media');
        Route::post('media', 'store')->name('media.store')->middleware('can:add_media');
        Route::put('media/{media}', 'update')->name('media.update')->middleware('can:edit_media');
        Route::delete('media/{media}/delete', 'destroy')->name('media.destroy')->middleware('can:delete_media');
        Route::get('media/get/multiple', 'getAllMediaMultiple')->name('media.get.multiple');
        Route::get('media/get/single', 'getAllMediaSingle')->name('media.get.single');
    });


     //Home Page
    Route::controller(HomePageController::class)->group(function(){
        Route::match(['get','patch'],'home-page', 'index')->name('home-page.index')->middleware('can:browse_home_page');
        Route::get('home-page/create', 'create')->name('home-page.create')->middleware('can:add_home_page');
        Route::get('home-page/{home-page}', 'show')->name('home-page.show')->middleware('can:read_home_page');
        Route::get('home-page/{home-page}/edit', 'edit')->name('home-page.edit')->middleware('can:edit_home_page');
        Route::post('home-page', 'store')->name('home-page.store')->middleware('can:add_home_page');
        Route::put('home-page/{home-page}', 'update')->name('home-page.update')->middleware('can:edit_home_page');
        Route::delete('home-page/{home-page}/delete', 'destroy')->name('home-page.destroy')->middleware('can:delete_home_page');
    });

    //Trusted Sections
    Route::controller(TrustedSectionController::class)->group(function(){
        Route::match(['get','patch'],'trusted-section', 'index')->name('trusted-section.index')->middleware('can:browse_trusted_section');
        Route::get('trusted-section/create', 'create')->name('trusted-section.create')->middleware('can:add_trusted_section');
        Route::get('trusted-section/{trusted-section}', 'show')->name('trusted-section.show')->middleware('can:read_trusted_section');
        Route::get('trusted-section/{trusted-section}/edit', 'edit')->name('trusted-section.edit')->middleware('can:edit_trusted_section');
        Route::post('trusted-section', 'store')->name('trusted-section.store')->middleware('can:add_trusted_section');
        Route::put('trusted-section/{trusted-section}', 'update')->name('trusted-section.update')->middleware('can:edit_trusted_section');
        Route::delete('trusted-section/{trusted-section}/delete', 'destroy')->name('trusted-section.destroy')->middleware('can:delete_trusted_section');
    });

});