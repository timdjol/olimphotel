<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        //$room_id = Room::where('id', $id)->get();

        $events = array();
        $bookings = Book::all();

        $removed = Book::onlyTrashed()->get();

        foreach ($bookings as $booking){
            $color = null;
            if($booking->room_id == 1){
                $color = 'red';
            }
            if($booking->room_id == 2){
                $color = 'orange';
            }
            if($booking->room_id == 3){
                $color = 'green';
            }
            if($booking->room_id == 4){
                $color = 'purple';
            }

            $events[] = [
                'id' => $booking->id,
                'room_id' => $booking->room_id,
                'title' => $booking->title,
                'phone' => $booking->phone,
                'email' => $booking->email,
                'comment' => $booking->comment,
                'count' => $booking->count,
                'start' => $booking->start_d,
                'end' => $booking->end_d,
                'color' => $color
            ];
        }
        return view('auth.bookings.index', compact('events', 'bookings', 'removed'));
    }



    public function store(Request $request)
    {
//        $request->validate([
//           'title' => 'required|string'
//        ]);
        $params = $request->all();
        $booking = Book::create($params);
        return response()->json($booking);
    }

    public function edit(Book $book)
    {
        return view('auth.bookings.form', compact('book'));
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

    public function delete(Request $request, $id)
    {
        $booking = Book::find($id);
        if(!$booking){
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        return $id;
    }
}
