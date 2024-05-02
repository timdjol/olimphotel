<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\HotelMail;
use App\Models\Book;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function changeLocale($locale)
    {
        $availableLocales = ['ru', 'en'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function contact_mail(Request $request)
    {
        Mail::to('info@timmedia.store')->send(new ContactMail($request));
        session()->flash('success', 'Заявка ' . $request->name . ' отправлена');
        return redirect()->route('contactspage');
    }

    public function hotel_mail(Request $request)
    {
        $params = $request->all();
        Book::create($params);
        Mail::to('info@timmedia.store')->send(new HotelMail($request));
        session()->flash('success', 'Бронь ' . $request->name . ' оформлена');
        return redirect()->route('index');
    }


    public function search()
    {
        $title = $_GET['search'];
        $start_d = $_GET['start_d'];
        $end_d = $_GET['end_d'];
        $hotel = Hotel::query()
            ->where('title', 'like', '%'.$title.'%')
            ->orWhere('title_en', 'like', '%'.$title.'%')
            ->orWhere('address', 'like', '%'.$title.'%')
            ->orWhere('checkin', 'like', '%'.$title.'%')
            ->firstOrFail();
        $min = Room::whereNotNull('price')->min("price");
        $rooms = Room::where('hotel_id', $hotel->id)->paginate(10);
        return view('search', compact('hotel', 'rooms', 'start_d', 'end_d', 'min'));
    }

}
