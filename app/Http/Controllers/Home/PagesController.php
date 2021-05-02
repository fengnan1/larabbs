<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        // dd(\Auth::user()->hasVerifiedEmail());
        return view('pages.root');
    }
}
