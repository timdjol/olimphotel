<?php


use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('locale/{locale}', 'App\Http\Controllers\MainController@changeLocale')->name('locale');
Route::get('/logout', 'App\Http\Controllers\ProfileController@logout')->name('get-logout');


Route::middleware('set_locale')->group(function(){
    Route::middleware('auth')->group(function()
    {
        Route::group([
            "prefix" => "admin"
        ], function ()
        {
            Route::group(["middleware" => "is_admin"], function ()
            {
                Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
                Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');
                Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
                Route::resource("contacts", "App\Http\Controllers\Admin\ContactController");
                Route::resource("pages", "App\Http\Controllers\Admin\PageController");
                Route::resource("coupons", "App\Http\Controllers\Admin\CouponController");
                Route::resource("sliders", "App\Http\Controllers\Admin\SliderController");
                Route::resource("vantages", "App\Http\Controllers\Admin\VantageController");
                Route::resource("faqs", "App\Http\Controllers\Admin\FaqController");
                Route::resource("travel", "App\Http\Controllers\Admin\TravelController");
                Route::resource("orders", "App\Http\Controllers\Admin\OrderController");
                Route::resource("rents", "App\Http\Controllers\Admin\RentController");
                Route::resource("rooms", "App\Http\Controllers\Admin\RoomController");

                Route::get('/bookings/index', [BookController::class, 'index'])->name('bookings.index');
                Route::post('/bookings', [BookController::class, 'store'])->name('bookings.store');
                //Route::put('/bookings/edit/{id}', [BookController::class, 'edit'])->name('bookings.edit');
                Route::patch('/bookings/update/{id}', [BookController::class, 'update'])->name('bookings.update');
                Route::delete('/bookings/delete/{id}', [BookController::class, 'delete'])->name('bookings.delete');

            });
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';



    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/books/index/{id}', [CalendarController::class, 'index'])->name('books.index');
    Route::post('/books', [CalendarController::class, 'store'])->name('books.store');
    Route::patch('/books/update/{id}', [CalendarController::class, 'update'])->name('books.update');
    Route::delete('/books/delete/{id}', [CalendarController::class, 'delete'])->name('books.delete');

    Route::get('/travel', [PageController::class, 'categorytravel'])->name('categorytravel');
    Route::get('/rooms', [PageController::class, 'rooms'])->name('rooms');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contactspage', [PageController::class, 'contactspage'])->name('contactspage');
    //email
    Route::post('contact_mail', [MainController::class, 'contact_mail'])->name('contact_mail');
    Route::post('travel_mail', [MainController::class, 'travel_mail'])->name('travel_mail');
    //Route::get('/search', [MainController::class, 'search'])->name('search');

    Route::get('/travel/{travel}', [MainController::class, 'travel'])->name('travel');
    Route::get('/room/{room}', [MainController::class, 'room'])->name('room');





});

