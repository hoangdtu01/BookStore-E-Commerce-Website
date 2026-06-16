<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\AddBookController;
use App\Http\Controllers\AdminController\BookController;
use App\Http\Controllers\AdminController\AddTheloaiController;
use App\Http\Controllers\AdminController\AddTacgiaController;
use App\Http\Controllers\AdminController\ViewBookController;
use App\Http\Controllers\AdminController\UpdateBookController;
use App\Http\Controllers\AdminController\OrderController;
use App\Http\Controllers\AdminController\UsersController;
use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\ShowBookUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\DetailBookController;
use App\Http\Controllers\GiohangController;
use App\Http\Controllers\DetailCartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\myAccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

//Routes của phần User
//Routes của phần User
//Routes của phần User

Route::get('/shop', [ShowBookUserController::class, 'index'])->name('shop.index');

Route::get('/shop/filter', [ShowBookUserController::class, 'filter'])->name('shop.filter');

Route::get('/shop/filterbyAuthor/{tacGiaID}', [ShowBookUserController::class, 'filterbyAuthor'])->name('filterbyAuthor');

Route::get('/shop/search', [ShowBookUserController::class, 'search'])->name('book.search');

Route::get('/shop/{id}', [DetailBookController::class, 'show'])->name('book.detail');





Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginHandler');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkout', [checkoutController::class, 'showDH'])->name('showDH');
    Route::post('/order/store', [checkoutController::class, 'store'])->name('order.store');

    

    Route::get('/cart', [DetailCartController::class, 'showCart'])->name('showCart');
    Route::post('/cart/update', [DetailCartController::class, 'updateCart'])->name('cart.update');

    Route::get('/my-account', [myAccountController::class, 'index'])->name('my-account');
    Route::post('/my-account/update', [myAccountController::class, 'updateUser'])->name('my-account.update');
    Route::get('/order/{id}', [myAccountController::class, 'orderDetails'])->name('order.details');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất thành công.');
    })->name('logout');

    Route::post('/password-reset/send-code', [AuthController::class, 'sendVerificationCode'])->name('password.reset.send-code');
    Route::post('/password-reset/verify-code', [AuthController::class, 'verifyCode'])->name('password.reset.verify-code');
    Route::post('/password-reset/update', [AuthController::class, 'updatePassword'])->name('password.reset.update');    
});
Route::group(['middleware' => 'web'], function () {
    Route::post('/giohang/add', [GiohangController::class, 'addToCart'])->name('giohang.add');
    Route::delete('/giohang/delete/{bookId}', [GiohangController::class, 'deleteFromCart'])->name('giohang.delete');  
    Route::delete('/giohang/remove/{bookId}', [DetailCartController::class, 'RemoveItem'])->name('cart.remove');
    
    Route::post('/comments', [DetailBookController::class, 'storeComment'])->name('comments.store');
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');



//Routes của phần Admin
//Routes của phần Admin
//Routes của phần Admin

Route::group(['middleware' => 'CheckAdmin'], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/admin/add_book', [AddBookController::class, 'create'])->name('sach.create');
    Route::post('/admin/add_book', [AddBookController::class, 'store'])->name('sach.store');

    Route::get('/admin/add_tacgia', [AddTacgiaController::class, 'index'])->name('tacgia.add');
    Route::post('/admin/add_tacgia', [AddTacgiaController::class, 'store'])->name('tacgia.store');
    Route::delete('/admin/tacgia/{id}', [AddTacgiaController::class, 'destroy'])->name('tacgia.destroy');

    Route::get('/admin/add_theLoai', [AddTheloaiController::class, 'index'])->name('theloai.add');
    Route::post('/admin/add_theLoai', [AddTheloaiController::class, 'store'])->name('theloai.store');
    Route::delete('/admin/theloai/{id}', [AddTheloaiController::class, 'destroy'])->name('theloai.destroy');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index'); 
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show'); 
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus'); 
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy'); 

    Route::get('/admin/users', [UsersController::class, 'index'])->name('users.index');
    Route::delete('/admin/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy'); 

    Route::get('admin/QL_book', [BookController::class, 'index'])->name('QL_book.index');

    Route::get('admin/QL_book/{id}', [ViewBookController::class, 'show'])->name('books.show');

    // Route hiển thị trang chỉnh sửa sách
    Route::get('/books/{id}/edit', [UpdateBookController::class, 'show'])->name('books.edit');

    // Route cập nhật thông tin sách
    Route::put('/books/{id}', [UpdateBookController::class, 'update'])->name('books.update');

    // Route xóa hình ảnh của sách
    Route::delete('/books/images/{id}', [UpdateBookController::class, 'destroyImage'])->name('books.images.destroy');

    // Route xóa sách
    Route::delete('/booksRemove/{id}', [UpdateBookController::class, 'destroy'])->name('books.destroy');
});

