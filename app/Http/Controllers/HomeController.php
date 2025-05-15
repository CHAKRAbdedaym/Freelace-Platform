<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gig;

class HomeController extends Controller
{
 
    public function index()
{
    $featuredGigs = Gig::where('featured', true)->take(4)->get();
    return view('home', compact('featuredGigs'));
}
    
}
