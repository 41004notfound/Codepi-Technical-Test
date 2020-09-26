<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Render application home view
     * @return View app
     */
    public function index() {
        return view('app');
    }
}
