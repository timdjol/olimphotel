<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Room;
use Illuminate\Http\Request;

class ListbookController extends Controller
{
    public function index(Request $request)
    {
        $hotel = $request->session()->get('hotel_id');
        $bookings = Book::where('hotel_id', $hotel)->paginate(10);
        return view('auth.listbooks.index', compact('bookings'));
    }

    public function fetchRoom(Request $request)
    {
        $data['rooms'] = Room::where("hotel_id", $request->hotel_id)->get();
        return response()->json($data);
    }

}
