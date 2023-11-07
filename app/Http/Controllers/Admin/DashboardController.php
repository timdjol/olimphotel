<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Page;
use App\Models\Room;
use App\Models\Travel;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $rooms = Room::get();
        $page = Page::get();
        $travel = Travel::get();
        $books = Book::get();
        $orders = Order::get();
        return view('auth.dashboard',
            compact('user', 'rooms', 'page', 'travel', 'books', 'orders'));
    }

}

