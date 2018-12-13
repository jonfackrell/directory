<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('products')->get();
        $ads = Ad::all();
        return view('home', compact('categories', 'ads'));
    }
}
