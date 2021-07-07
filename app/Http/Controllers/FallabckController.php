<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallabckController extends Controller
{
     public function index () 
     {
         return response()->json(['message' => "no route found"],404);
     }
}
