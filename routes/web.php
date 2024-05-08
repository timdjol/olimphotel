<?php


use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PDFController;
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


Route::middleware('set_locale')->group(function ()
{
    Route::middleware('auth')->group(function ()
    {
        Route::group([
            "prefix" => "admin",
        ], function ()
        {
            Route::group(["middleware" => "is_admin"], function ()
            {
                Route::get('/dashboard',
                    [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
                Route::get('/homepage', [PageController::class, 'homepage'])->name('homepage');
                Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');
                Route::resource("hotels", "App\Http\Controllers\Admin\HotelController");
                Route::resource("services", "App\Http\Controllers\Admin\ServiceController");
                Route::resource("payments", "App\Http\Controllers\Admin\PaymentController");
                Route::resource("policies", "App\Http\Controllers\Admin\PolicyController");
                Route::resource("bookings", "App\Http\Controllers\Admin\BookingController");
                Route::resource("listbooks", "App\Http\Controllers\Admin\ListbookController");
                Route::resource("rooms", "App\Http\Controllers\Admin\RoomController");
                Route::resource("bills", "App\Http\Controllers\Admin\BillController");
                Route::resource("users", "App\Http\Controllers\Admin\UserController");
                Route::resource("contacts", "App\Http\Controllers\Admin\ContactController");

                Route::get('/hotels/{status?}/{show_result?}/{s_query?}', [HotelController::class, 'index'])->name
                ('hotels.index');
                Route::get('/rooms/{status?}/{show_result?}/{s_query?}', [RoomController::class, 'index'])->name
                ('rooms.index');

                Route::get('/books/index', [BookingController::class, 'index'])->name('books.index');
                Route::get('/books/create', [BookingController::class, 'create'])->name('listbooks.create');
                Route::post('books/store', [BookingController::class, 'store'])->name('listbooks.store');
                Route::put('/books/edit/{id}', [BookingController::class, 'edit'])->name('listbooks.edit');
                Route::patch('/books/update/{id}', [BookingController::class, 'update'])->name('listbooks.update');
                Route::delete('/books/destroy/{id}', [BookingController::class, 'destroy'])->name('listbooks.destroy');

            });

        });


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';


    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/homepage', [PageController::class, 'homepage'])->name('homepage');
    Route::get('/books/index/{id}', [CalendarController::class, 'index'])->name('books.index');
    Route::post('/books', [CalendarController::class, 'store'])->name('books.store');
    Route::patch('/books/update/{id}', [CalendarController::class, 'update'])->name('books.update');
    Route::delete('/books/delete/{id}', [CalendarController::class, 'delete'])->name('books.delete');

    Route::post('/api/fetch-rooms', [BookingController::class, 'fetchRoom']);

    Route::get('/allhotels', [PageController::class, 'hotels'])->name('hotels');
    //Route::get('/rooms', [PageController::class, 'allrooms'])->name('allrooms');
    Route::get('/allrooms/{hotel?}/{price_from?}/{price_to?}/{count?}/{date_from?}/{date_to?}', [
        PageController::class,
        'allrooms'
    ])->name
    ('allrooms');


    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contactspage', [PageController::class, 'contactspage'])->name('contactspage');

    //email
    Route::post('contact_mail', [MainController::class, 'contact_mail'])->name('contact_mail');
    Route::post('hotel_mail', [MainController::class, 'hotel_mail'])->name('hotel_mail');
    Route::get('/search', [MainController::class, 'search'])->name('search');

    Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('pdf');

    Route::get('/{hotel}', [PageController::class, 'hotel'])->name('hotel');
    Route::get('/{hotel}/{rooms}', [PageController::class, 'room'])->name('room');


});

