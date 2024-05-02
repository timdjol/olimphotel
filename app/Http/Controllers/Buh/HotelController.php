<?php

namespace App\Http\Controllers\Buh;

use App\Http\Controllers\Controller;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::paginate(10);

        return view('auth.buh.hotels.index', compact('hotels'));
    }
}
