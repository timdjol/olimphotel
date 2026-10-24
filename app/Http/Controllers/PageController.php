<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Rent;
use App\Models\Room;
use App\Models\Travel;
use App\Models\Vantage;

class PageController extends Controller
{
    public function rooms()
    {
        $rooms = Room::all()->sortBy('sort');
        return view('pages.rooms', compact('rooms'));
    }

    public function about()
    {
        $page = Page::query()->where('id', 4)->first();
        $vantages = Vantage::get();
        $faqs = Faq::paginate();
        return view('pages.about', compact('page', 'vantages', 'faqs'));
    }
    
    public function tour()
    {
        $vantages = Vantage::get();
        return view('pages.tour', compact('vantages'));
    }

    public function categorytravel()
    {
        $travel = Travel::get();
        $rents = Rent::get();
        return view('pages.category-travel', compact('travel', 'rents'));
    }

    public function contactspage()
    {
        $page = Page::query()->where('id', 5)->first();;
        $contacts = Contact::get();
        return view('pages.contacts', compact('page', 'contacts'));
    }

    public function booking()
    {
        $bookingData = [
            'title' => 'Бронирование',
            'titleEN' => 'Booking',
        ];
        return view('pages.booking', compact('bookingData'));
    }


}