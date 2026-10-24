<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Room;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create(Image $image)
    {
        return view('auth.room.form', compact('image'));
    }

    public function store(Request $request, Image $image, Room $room){
        $params = $request->all();
        $params['room_id'] = $request->room->id;
        $image = Image::create($params);
        session()->flash('success', $request->room->title . ' добавлен' );
        return redirect()->route('room.index', $room);
    }
}
