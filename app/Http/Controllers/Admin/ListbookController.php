<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ListbookController extends Controller
{
    public function index(Request $request)
    {
        $hotel = $request->session()->get('hotel_id');
        $books = Book::where('hotel_id', $hotel)->paginate(10);
        return view('auth.listbooks.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::where('id', $id)->firstOrFail();
        return view('auth.listbooks.show', compact('book'));
    }

}
