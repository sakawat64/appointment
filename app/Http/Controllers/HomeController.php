<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $divisions = Division::all();
        $categories = Category::all();
        return view('appointment.index')->with('divisions',$divisions)->with('categories',$categories);
    }
}
