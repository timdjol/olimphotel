<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rents = Rent::paginate(10);
        return view('auth.rent.index', compact('rents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.rent.form');
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
            $path = $request->file('image')->store('rent');
            $params['image'] = $path;
        }
        Rent::create($params);

        session()->flash('success', 'Вид тура ' . $request->title . ' добавлен');
        return redirect()->route('rents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        return view('auth.rent.show', compact('rent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        return view('auth.rent.form', compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($rent->image);
            $params['image'] = $request->file('image')->store('rent');
        }

        $rent->update($params);

        session()->flash('success', 'Вид тура ' . $request->title . ' обновлен');
        return redirect()->route('rents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        $rent->delete();
        session()->flash('success', 'Вид тура ' . $rent->title . ' удален');
        return redirect()->route('rents.index');
    }
}
