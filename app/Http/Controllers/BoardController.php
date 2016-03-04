<?php

namespace App\Http\Controllers;

use Auth;
use App\Board;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    public function postBoard(Request $request)
    {
        $this->validate($request, [
            'boardTitle'        => 'required|unique:board,boardTitle',
            'boardPrivacyType'  => 'required',   
        ]);
        
        $boardPrivacyType = $request->get('boardPrivacyType');  
        $boardTitle = $request->get('boardTitle');  
        $userId = Auth::id();
        
        Board::create([
            'user_id' => $userId,
            'boardTitle' => $boardTitle,
            'boardPrivacyType' => $boardPrivacyType,  
        ]);

        return Board::all();
    }   
}
