<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateController extends Controller
{
    public function date(){
        return view('pages.date');
    }
}
