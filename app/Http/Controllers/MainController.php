<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\TravelMail;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Order;
use App\Models\Page;
use App\Models\Rent;
use App\Models\Room;
use App\Models\Slider;
use App\Models\Travel;
use App\Models\Vantage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $home = Page::query()->where('id', 6)->first();
        $vantages = Vantage::get();
        $rooms = Room::get();
        return view('index', compact('sliders', 'vantages', 'home', 'rooms'));
    }


//    public function category($code)
//    {
//        $category = Category::where('code', $code)->first();
//
//        return view('category', compact('category'));
//    }

    public function travel($travelCode)
    {
        $travel = Travel::query()->byCode($travelCode)->firstOrFail();
        //$images = Image::where('product_id', $travel->id)->get();
        $related = Travel::where('id','!=', $travel->id)->paginate(8);
        $rents = Rent::get();
        $contacts = Contact::get();
        return view('pages.travel', compact('travel', 'related', 'rents', 'contacts'));
    }

    public function room($roomCode)
    {
        $room = Room::query()->byCode($roomCode)->firstOrFail();
        $images = Image::where('room_id', $room->id)->get();
        $related = Room::where('id','!=', $room->id)->get();
        $contacts = Contact::get();
        return view('pages.room', compact('room', 'related', 'images', 'contacts'));
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
        Mail::to('info@olimphoteltravel.com')->send(new ContactMail($request));
        return redirect()->route('contactspage');
    }

    public function travel_mail(Request $request)
    {
        $params = $request->all();
        Order::create($params);
        Mail::to('info@olimphoteltravel.com')->send(new TravelMail($request));
        return redirect()->route('categorytravel');
    }


//    public function search()
//    {
//        $title = $_GET['search'];
//        $search = Product::query()
//            ->where('title', 'like', '%'.$title.'%')
//            ->orWhere('title_en', 'like', '%'.$title.'%')
//            ->get();
//        return view('search', compact('search'));
//    }


}
