<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    public function postBoard(Request $request)
    {
        return $request->all();  
    }   
}
