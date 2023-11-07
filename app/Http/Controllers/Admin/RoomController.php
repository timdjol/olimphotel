<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::paginate(10);
        return view('auth.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.room.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Room $room)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
            $path = $request->file('image')->store('rooms');
            $params['image'] = $path;
        }
        Room::create($params);

        $images = $request->file('images');
        if ($request->hasFile('images')) :
            foreach ($images as $image):
                $image = $image->store('rooms');
                DB::table('images')->insert(
                    array(
                        'image'=>  $image,
                        'room_id' => $room->id,
                    )
                );
            endforeach;
        endif;

        session()->flash('success', 'Номер ' . $request->title . ' добавлен');
        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('auth.room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('auth.room.form', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($room->image);
            $params['image'] = $request->file('image')->store('rooms');
        }

        unset($params['images']);
        $images = $request->file('images');


        if ($request->hasFile('images')) :
            if($images != null) {
                Storage::delete($images);
                DB::table('images')->where('room_id', $room->id)->delete();
            }
            foreach ($images as $image):
                $image = $image->store('rooms');
                //$arr[] = $image;

                DB::table('images')
                    ->where('room_id', $room->id)
                    ->updateOrInsert(['room_id' => $room->id, 'image' => $image]);
            endforeach;
        endif;

        $room->update($params);

        session()->flash('success', 'Номер ' . $request->title . ' обновлен');
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        session()->flash('success', 'Номер ' . $room->title . ' удален');
        return redirect()->route('rooms.index');
    }

}
