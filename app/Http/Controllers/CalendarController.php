<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Room;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index($id)
    {
        if (!Room::query()->whereKey($id)->exists()) {
            abort(404);
        }

        $events = Book::query()
            ->where('room_id', $id)
            ->get(['start_d', 'end_d'])
            ->map(function (Book $booking) {
                return [
                    'start' => $booking->start_d,
                    'end' => $booking->end_d,
                    'title' => '',
                ];
            })
            ->all();

        return view('pages.books', compact('id', 'events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_id' => ['required', 'integer', 'exists:rooms,id'],
            'title' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'comment' => ['nullable', 'string', 'max:1000'],
            'count' => ['required', 'integer', 'between:1,10'],
            'start_d' => ['required', 'date', 'after_or_equal:today'],
            'end_d' => ['required', 'date', 'after:start_d'],
        ]);

        Book::create($data);

        return response()->json(['ok' => true]);
    }

    public function update(Request $request, $id)
    {
        $booking = Book::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }

        $data = $request->validate([
            'start_d' => ['required', 'date'],
            'end_d' => ['required', 'date', 'after:start_d'],
        ]);

        $booking->update($data);

        return response()->json('Event updated');
    }

    public function delete($id)
    {
        $booking = Book::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        return $id;
    }
}
