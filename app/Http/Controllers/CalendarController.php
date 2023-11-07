<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index($id)
    {
        //$room_id = Room::where('id', $id)->get();

        $events = array();
        $bookings = Book::where('room_id', $id)->get();

        foreach ($bookings as $booking){
            $color = null;
            if($booking->title == 'ariet'){
                $color = 'red';
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
        return view('pages.books', compact('id', 'events'));
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
