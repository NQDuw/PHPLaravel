<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Middleware\Ktdangnhap;
use Illuminate\Support\Facades\Auth;


route::get('/trangchu',[PagesController::class,'trangchu'])->name('view.trangchu');
route::get('/chitiet/{id}',[PagesController::class,'chitiet'])->name('view.tinchitiet')->middleware(Ktdangnhap::class);
route::get('/lienhe',[PagesController::class,'lienhe'])->name('view.lienhe');
route::get('/dangnhap',[PagesController::class,'dangnhap'])->name('view.dangnhap');
route::get('/dangky',[PagesController::class,'dangky'])->name('view.dangky');
route::get('/tintheoloai/{id}',[PagesController::class,'tintheoloai'])->name('view.tintheoloai');
Route::post('/postdangky', [PagesController::class, 'postDangKy'])->name('postdangky');
Route::post('/postdangnhap', [PagesController::class, 'postDangNhap'])->name('postdangnhap');
Route::get('/dangxuat', [PagesController::class, 'dangxuat'])->name('dangxuat');
Route::post('/postcomment', [PagesController::class, 'postComment'])->name('postcomment');
Route::get('/tintheoloai/{id}/search', [PagesController::class, 'search'])->name('tintheoloai.search');
Route::get('/thongtinuser/{id}', [PagesController::class,'getThongTin'])->name('getThongTin')->middleware(Ktdangnhap::class);
Route::post('/thongtinuser/{id}', [PagesController::class,'postUpdate'])->name('postupdate');






