<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index(Request $request)
    {
        $hotel = $request->session()->get('hotel_id');
        $policies = Policy::where('hotel_id', $hotel)->get();
        return view('auth.policies.index', compact('policies', 'hotel'));
    }

    public function create(Request $request)
    {
        $hotel = $request->session()->get('hotel_id');
        return view('auth.policies.form', compact('hotel'));
    }
    public function store(Request $request)
    {
        $params = $request->all();
        Policy::create($params);

        session()->flash('success', 'Политика добавленa');
        return redirect()->route('policies.index');
    }

    public function edit(Request $request, Policy $policy)
    {
        $hotel = $request->session()->get('hotel_id');
        return view('auth.policies.form', compact('policy', 'hotel'));
    }

    public function update(Request $request, Policy $policy)
    {
        $params = $request->all();
        $policy->update($params);
        session()->flash('success', 'Политика обновлена');

        return redirect()->route('policies.index');
    }

}
