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


    public function search(Request $request)
    {
        //$title = $_GET['search'];
//        $start_d = $_GET['start_d'];
//        $end_d = $_GET['end_d'];
        $query = Hotel::query();
        if ($request->filled('title')) {
            $query->where('title', 'like', '%'.$request->title.'%');
            $query->orWhere('title_en', 'like', '%'.$request->title.'%');
            $query->orWhere('address', 'like', '%'.$request->title.'%');
            $query->orWhere('address_en', 'like', '%'.$request->title.'%');
        }
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);

        }
        if ($request->filled('include')) {
            $query->where('include', $request->include);
        }
        if ($request->filled('early_in')) {
            $query->where('early_in', '!=', '');
        }

        if ($request->filled('cancelled')) {
            $query->where('cancelled', '==', 0);
            $query->orWhere('cancelled', '==', '');
            $query->orWhere('cancelled', '==', null);
        }

        if ($request->filled('extra_place')) {
            $query->where('extra_place', '!=', '');
            $query->orWhere('extra_place', '!=', null);
            $query->orWhere('extra_place', '!=', 0);
        }
        $hotels = $query->get();

//        if ($request->filled('daterange')) {
//            $query->whereBetween('price',[$request->left_value, $request->right_value]);
//        }


        return view('search', compact('hotels'));
    }

}
