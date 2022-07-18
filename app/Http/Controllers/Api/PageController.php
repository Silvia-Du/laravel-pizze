<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Pizza;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $pizze = Pizza::with('ingredients')->get();
        return response()->json(compact('pizze'));
    }

    public function show($slug){
        $pizza = Pizza::where('slug', $slug)->first();
        return response()->json($pizza);
    }
}
