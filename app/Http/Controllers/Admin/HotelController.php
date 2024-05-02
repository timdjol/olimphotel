<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::paginate(10);

        return view('auth.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.hotels.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRequest $request)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
            $path = $request->file('image')->store('hotels');
            $params['image'] = $path;
        }
        Hotel::create($params);

        session()->flash('success', 'Отель ' . $request->title . ' добавлен');
        return redirect()->route('hotels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Hotel $hotel)
    {
        $users = Auth::user();
        $request->session()->put('hotel_id', $hotel->id);

        return view('auth.hotels.show', compact('hotel', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('auth.hotels.form', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelRequest $request, Hotel $hotel)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($hotel->image);
            $params['image'] = $request->file('image')->store('hotels');
        }

        $hotel->update($params);

        session()->flash('success', 'Отель ' . $request->title . ' обновлен');
        return redirect()->route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        session()->flash('success', 'Отель ' . $hotel->title . ' удален');
        return redirect()->route('hotels.index');
    }
}
