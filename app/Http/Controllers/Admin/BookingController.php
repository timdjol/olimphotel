<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $hotel = $request->session()->get('hotel_id');
        $bookings = Book::where('hotel_id', $hotel)->get();
        $rooms = Room::where('hotel_id', $hotel)->get();
        $events = array();


        $removed = Book::onlyTrashed()->get();

        foreach ($bookings as $booking){
//            $color = null;
//            if($booking->room_id == 1){
//                $color = 'red';
//            }
//            if($booking->room_id == 2){
//                $color = 'orange';
//            }
//            if($booking->room_id == 3){
//                $color = 'green';
//            }
//            if($booking->room_id == 4){
//                $color = 'purple';
//            }

            $events[] = [
                'id' => $booking->id,
                'hotel_id' => $booking->hotel_id,
                'room_id' => $booking->room_id,
                'title' => $booking->title,
                'phone' => $booking->phone,
                'email' => $booking->email,
                'comment' => $booking->comment,
                'count' => $booking->count,
                'countc' => $booking->countc,
                'sum' => $booking->sum,
                'status' => $booking->status,
                'start' => $booking->start_d,
                'end' => $booking->end_d,
                //'color' => $color
            ];
        }
        return view('auth.books.index', compact('events', 'bookings', 'removed', 'rooms'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        $rooms = Room::all();
        return view('auth.books.form', compact('hotels', 'rooms'));
    }

    public function store(Request $request)
    {
//        $request->validate([
//           'title' => 'required|string'
//        ]);
        $params = $request->all();
        //dd($params);
        $booking = Book::create($params);
        return response()->json($booking);
    }


    public function edit(Book $booking)
    {
        return view('auth.books.form', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Book::find($id);
        if(!$booking){
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update([
            'start_d' => $request->start_d,
            'end_d' => $request->end_d
        ]);
        return response()->json('Event updated');
    }

    public function destroy(Request $request, $id)
    {
        $booking = Book::find($id);
        if(!$booking){
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        $room = Room::where('id', $request->room_id)->firstOrFail();
        $room->increment('count', $request->count);
        return $id;
    }

}
