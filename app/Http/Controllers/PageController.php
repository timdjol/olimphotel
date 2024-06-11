<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Image;
use App\Models\Page;
use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function homepage()
    {

//        $client = new \GuzzleHttp\Client();
//
//        $response = $client->request('GET', 'https://openapi.emergingtravel.com/');
//        dd($response->getBody());

        //Http::response('', '', 'Authorization: Basic bG9sOnNlY3VyZQ==');
        //$response = Http::get('https://openapi.emergingtravel.com/', 'Stay', 'stay123');
        $hotels = Hotel::all();
        $rooms = Room::orderBy('price', 'ASC')->paginate(20);
        return view('pages.home', compact('rooms', 'hotels'));
    }

    public function hotels()
    {
        $hotels = Hotel::orderBy('top', 'DESC')->get();
        return view('pages.hotels', compact('hotels'));
    }

    public function hotel($code)
    {
        $hotel = Hotel::where('code', $code)->first();
        $rooms = Room::where('hotel_id', $hotel->id)->orderBy('price', 'ASC')->paginate(10);
        return view('pages.hotel', compact('hotel', 'rooms'));
    }


    public function allrooms(
        $hotel = null,
        $price_from = null,
        $price_to = null,
        $count = null,
        $date_from = null,
        $date_to = null
    ) {
        $min = Room::whereNotNull('price')->min("price");
        $max = Room::whereNotNull('price')->max("price");
        $max_per = Room::whereNotNull('count')->max("count");

        $hotels = Hotel::all();

        if ($hotel == 0) {
            $hotel = null;
        } else {
            $hotel = $hotel;
        }

        if ($count == 0) {
            $count = null;
        } else {
            $count = $count;
        }

        $rooms = Room::query()->where('status', 1)->orderBy('price', 'asc');;

        if (isset($hotel) || $price_from !== null || $price_to !== null || isset($count) || $date_from !== null ||
            $date_to !== null) {
            $rooms = $rooms->where(function ($query) use ($hotel, $price_from, $price_to, $count, $date_from, $date_to)
            {
                if (isset($hotel)) {
                    $query->where('hotel_id', $hotel)->where('status', 1);
                } else {
                    $query->where('status', 1)->orderBy('price', 'asc');
                }
                if ($price_from !== null) {
                    $query->where(function ($query) use ($price_from, $price_to)
                    {
                        $query->whereBetween('price', [$price_from, $price_to]);
                    });
                }
                if (isset($count)) {
                    $query->where('count', '>=', $count)->where('status', 1);
                } else {
                    $query->where('status', 1)->orderBy('price', 'asc');
                }
//                if ($date_from !== null) {
//                    $query->where(function($query) use ($date_from, $date_to) {
//                        $query->whereBetween('price', [$price_from, $price_to]);
//                    });
//                }
            });
        }

        $rooms = $rooms->paginate(10);

        return view('pages.rooms', compact('rooms', 'hotels', 'min', 'max', 'max_per'));
    }


    public function room($hotel, $roomCode)
    {
        $room = Room::withTrashed()->byCode($roomCode)->firstOrFail();
        $images = Image::where('room_id', $room->id)->get();
        $related = Room::where('id', '!=', $room->id)->where('hotel_id', $room->hotel_id)->where('status', 1)->orderBy
        ('price', 'asc')
            ->get();
        return view('pages.room', compact('room', 'images', 'related'));
    }

    public function about()
    {
        $page = Page::query()->where('id', 4)->first();
        return view('pages.about', compact('page'));
    }

    public function contactspage()
    {
        $page = Page::query()->where('id', 5)->first();;
        $contacts = Contact::get();
        return view('pages.contacts', compact('page', 'contacts'));
    }

}