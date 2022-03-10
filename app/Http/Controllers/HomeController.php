<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                return view('user.home');
            } else {
                $epsilon = Contact::all();
                return view('admin.home')->with('contacts', $epsilon);
            }
        } else {
            return redirect()->back();
        }
    }
}
