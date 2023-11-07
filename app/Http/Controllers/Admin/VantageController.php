<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Vantage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class VantageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.vantages.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param SliderRequest $request
     * @return RedirectResponse
     */
    public function store(SliderRequest $request)
    {
        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
            $path = $request->file('image')->store('vantages');
            $params['image'] = $path;
        }
        Vantage::create($params);

        session()->flash('success', 'Преимущество добавлено ' . $request->title);
        return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Vantage $vantage
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Vantage $vantage)
    {
        return view('auth.vantages.form', compact('vantage'));
    }

    /**
     * Update the specified resource in storage.
     * @param SliderRequest $request
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function update(SliderRequest $request, Vantage $vantage)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($vantage->image);
            $params['image'] = $request->file('image')->store('vantages');
        }

        $vantage->update($params);

        session()->flash('success', 'Преимущество ' . $request->title . ' обновлено');
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     * @param Vantage $vantage
     * @return RedirectResponse
     */
    public function destroy(Vantage $vantage)
    {
        $vantage->delete();
        session()->flash('success', 'Преимущество ' . $vantage->title . ' удалено');
        return redirect()->route('dashboard');
    }
}
