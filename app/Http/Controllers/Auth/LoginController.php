<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


class LoginController extends Controller {
    protected function redirectTo(){
        if(Auth::user()->isAdmin()){
            return route('hotels');
        }
        else {
            return route('manager.books');
        }
    }

}