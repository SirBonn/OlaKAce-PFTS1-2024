<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class RolesController extends Controller
{
    public function index()
    {
        if (Auth::check() == false) {
            return redirect()->route('welcome');
        }

        if (Auth::user()->rol->name == 'admin') {
            return redirect()->route('admin');
        }

        if (Auth::user()->rol->name == 'poster') {
            return redirect()->route('publisher');
        } else if (Auth::user()->rol->name == 'guest') {
            return redirect()->route('guest');
        } else {
            return redirect('/');
        }
    }
}
