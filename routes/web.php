<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\RecycleController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Website\WebsiteController;

use App\Models\Admin;


// Website Routes Start
Route::get('/',[WebsiteController::class, 'index']);
Route::get('about',[WebsiteController::class, 'about']);

// Admin Panel Routes Start
Route::get('dashboard',[AdminController::class, 'index']);

Route::get('dashboard/user',[UserController::class, 'index'])->name('user.index');
Route::get('dashboard/user/add',[UserController::class, 'add'])->name('user.create');
Route::get('dashboard/user/edit/{id}',[UserController::class, 'edit']);
Route::get('dashboard/user/view/{id}',[UserController::class, 'view']);
Route::post('dashboard/user/submit', [UserController::class, 'insert']);
Route::post('dashboard/user/update',[UserController::class, 'update']);
Route::post('dashboard/user/softdelete',[UserController::class, 'softdelete']);
Route::post('dashboard/user/restore',[UserController::class, 'restore']);
Route::post('dashboard/user/delete',[UserController::class, 'delete']);


Route::get('dashboard/banner',[BannerController::class, 'index']);
Route::get('dashboard/banner/add',[BannerController::class, 'add']);
Route::get('dashboard/banner/edit/{ban_id}',[BannerController::class, 'edit']);
Route::get('dashboard/banner/view/{ban_id}',[BannerController::class, 'view']);
Route::post('dashboard/banner/submit',[BannerController::class, 'insert']);
Route::post('dashboard/banner/update',[BannerController::class, 'update']);
Route::post('dashboard/banner/softdelete',[BannerController::class, 'softdelete']);
Route::post('dashboard/banner/restore',[BannerController::class, 'restore']);
Route::post('dashboard/banner/delete',[BannerController::class, 'delete']);


Route::get('dashboard/role',[RoleController::class, 'index']);
Route::get('dashboard/role/add',[RoleController::class, 'add']);
Route::get('dashboard/role/edit/{role_id}',[RoleController::class, 'edit']);
Route::get('dashboard/role/view/{role_id}',[RoleController::class, 'view']);
Route::post('dashboard/role/submit',[RoleController::class, 'insert']);
Route::post('dashboard/role/update',[RoleController::class, 'update']);
Route::post('dashboard/role/softdelete',[RoleController::class, 'softdelete']);
Route::post('dashboard/role/restore',[RoleController::class, 'restore']);
Route::post('dashboard/role/delete',[RoleController::class, 'delete']);


Route::get('dashboard/partner',[PartnerController::class, 'index']);
Route::get('dashboard/partner/add',[PartnerController::class, 'add']);
Route::get('dashboard/partner/edit/{partner_id}',[PartnerController::class, 'edit']);
Route::get('dashboard/partner/view/{partner_id}',[PartnerController::class, 'view']);
Route::post('dashboard/partner/submit',[PartnerController::class, 'insert']);
Route::post('dashboard/partner/update',[PartnerController::class, 'update']);
Route::post('dashboard/partner/softdelete',[PartnerController::class, 'softdelete']);
Route::post('dashboard/partner/restore',[PartnerController::class, 'restore']);
Route::post('dashboard/partner/delete',[PartnerController::class, 'delete']);


Route::get('dashboard/testimonial',[TestimonialController::class, 'index']);
Route::get('dashboard/testimonial/add',[TestimonialController::class, 'add']);
Route::get('dashboard/testimonial/edit/{test_id}',[TestimonialController::class, 'edit']);
Route::get('dashboard/testimonial/view/{test_id}',[TestimonialController::class, 'view']);
Route::post('dashboard/testimonial/submit',[TestimonialController::class, 'insert']);
Route::post('dashboard/testimonial/update',[TestimonialController::class, 'update']);
Route::post('dashboard/testimonial/softdelete',[TestimonialController::class, 'softdelete']);
Route::post('dashboard/testimonial/restore',[TestimonialController::class, 'restore']);
Route::post('dashboard/testimonial/delete',[TestimonialController::class, 'delete']);


Route::get('dashboard/client',[ClientController::class, 'index']);
Route::get('dashboard/client/add',[ClientController::class, 'add']);
Route::get('dashboard/client/edit/{client_id}',[ClientController::class, 'edit']);
Route::get('dashboard/client/view/{client_id}',[ClientController::class, 'view']);
Route::post('dashboard/client/submit',[ClientController::class, 'insert']);
Route::post('dashboard/client/update',[ClientController::class, 'update']);
Route::post('dashboard/client/softdelete',[ClientController::class, 'softdelete']);
Route::post('dashboard/client/restore',[ClientController::class, 'restore']);
Route::post('dashboard/client/delete',[ClientController::class, 'delete']);


Route::get('dashboard/service',[ServiceController::class, 'index']);
Route::get('dashboard/service/add',[ServiceController::class, 'add']);
Route::get('dashboard/service/edit/{service_id}',[ServiceController::class, 'edit']);
Route::get('dashboard/service/view/{service_id}',[ServiceController::class, 'view']);
Route::post('dashboard/service/submit',[ServiceController::class, 'insert']);
Route::post('dashboard/service/update',[ServiceController::class, 'update']);
Route::post('dashboard/service/softdelete',[ServiceController::class, 'softdelete']);
Route::post('dashboard/service/restore',[ServiceController::class, 'restore']);
Route::post('dashboard/service/delete',[ServiceController::class, 'delete']);


Route::get('dashboard/teammember',[TeamMemberController::class, 'index']);
Route::get('dashboard/teammember/add',[TeamMemberController::class, 'add']);
Route::get('dashboard/teammember/edit',[TeamMemberController::class, 'edit']);
Route::get('dashboard/teammember/view',[TeamMemberController::class, 'view']);
Route::post('dashboard/teammember/submit',[TeamMemberController::class, 'insert']);
Route::post('dashboard/teammember/update',[TeamMemberController::class, 'update']);
Route::post('dashboard/teammember/softdelete',[TeamMemberController::class, 'softdelete']);
Route::post('dashboard/teammember/restore',[TeamMemberController::class, 'restore']);
Route::post('dashboard/teammember/delete',[TeamMemberController::class, 'delete']);


Route::get('dashboard/recycle',[RecycleController::class, 'index']);

require __DIR__.'/auth.php';
