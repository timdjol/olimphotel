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
use App\Support\SiteCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $sliders = SiteCache::sliders();
        $home = SiteCache::page(6);
        $vantages = SiteCache::vantages();
        $rooms = SiteCache::rooms();
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
        $related = SiteCache::travels()->where('id', '!=', $travel->id)->take(8)->values();
        $rents = SiteCache::rents();
        $contacts = SiteCache::contacts();
        return view('pages.travel', compact('travel', 'related', 'rents', 'contacts'));
    }

    public function room($roomCode)
    {
        $room = Room::query()->byCode($roomCode)->firstOrFail();
        $images = Image::where('room_id', $room->id)->get();
        $related = SiteCache::rooms()->where('id', '!=', $room->id)->values();
        $contacts = SiteCache::contacts();
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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        Mail::to('info@olimphoteltravel.com')->send(new ContactMail((object) $data));
        return redirect()->route('contactspage');
    }

    public function travel_mail(Request $request)
    {
        $data = $request->validate([
            'travel' => ['required', 'string', 'max:255'],
            'choose' => ['required', 'string', 'max:255'],
            'dates' => ['nullable', 'string', 'max:100'],
            'count' => ['required', 'string', 'max:20'],
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        Order::create($data);
        Mail::to('info@olimphoteltravel.com')->send(new TravelMail((object) $data));
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
