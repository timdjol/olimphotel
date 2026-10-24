<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travel = Travel::paginate(10);
        return view('auth.travel.index', compact('travel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.travel.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
            $path = $request->file('image')->store('travel');
            $params['image'] = $path;
        }
        Travel::create($params);

        session()->flash('success', 'Экскурсия ' . $request->title . ' добавлена');
        return redirect()->route('travel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        return view('auth.travel.show', compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        return view('auth.travel.form', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($travel->image);
            $params['image'] = $request->file('image')->store('travel');
        }

        $travel->update($params);

        session()->flash('success', 'Экскурсия ' . $request->title . ' обновлена');
        return redirect()->route('travel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        $travel->delete();
        session()->flash('success', 'Экскурсия ' . $travel->title . ' удалена');
        return redirect()->route('travel.index');
    }
}
