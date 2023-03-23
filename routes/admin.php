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
use App\Http\Controllers\Admin\AttributeController;

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


    //Attribute
    Route::controller(AttributeController::class)->group(function(){
        Route::match(['get','patch'],'attribute', 'index')->name('attribute.index')->middleware('can:browse_attribute');
        Route::get('attribute/create', 'create')->name('attribute.create')->middleware('can:add_attribute');
        Route::get('attribute/{attribute}', 'show')->name('attribute.show')->middleware('can:read_attribute');
        Route::get('attribute/{attribute}/edit', 'edit')->name('attribute.edit')->middleware('can:edit_attribute');
        Route::post('attribute', 'store')->name('attribute.store')->middleware('can:add_attribute');
        Route::put('attribute/{attribute}', 'update')->name('attribute.update')->middleware('can:edit_attribute');
        Route::delete('attribute/{attribute}/delete', 'destroy')->name('attribute.destroy')->middleware('can:delete_attribute');
    });

});