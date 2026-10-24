<?php

namespace App\Http\Controllers;

use App\Support\SiteCache;

class PageController extends Controller
{
    public function rooms()
    {
        $rooms = SiteCache::rooms();
        return view('pages.rooms', compact('rooms'));
    }

    public function about()
    {
        $page = SiteCache::page(4);
        $vantages = SiteCache::vantages();
        $faqs = SiteCache::faqs();
        return view('pages.about', compact('page', 'vantages', 'faqs'));
    }
    
    public function tour()
    {
        $vantages = SiteCache::vantages();
        return view('pages.tour', compact('vantages'));
    }

    public function categorytravel()
    {
        $travel = SiteCache::travels();
        $rents = SiteCache::rents();
        return view('pages.category-travel', compact('travel', 'rents'));
    }

    public function contactspage()
    {
        $page = SiteCache::page(5);
        $contacts = SiteCache::contacts();
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