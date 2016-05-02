<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Response;

use Auth;
use \App\Models\BoardList;

class ListController extends Controller
{
    /**
     * Creates a new list in the database.
     * @param  Request $request has the input data for this function.
     * @return object created list
     */
	public function postListName(Request $request)
    {
        // Made this unique for his board not to other
        $this->validate($request, [
            'list_name' => 'required',
        ]);

        $listName = $request->get('list_name');
        $boardId = $request->get('board_id');
        $userId = Auth::id();
        
        return BoardList::create([
            'board_id' => $boardId,
            'list_name' => $listName,
            'user_id' => $userId,
        ]);
    }

    /**
     * Delete a list from the database.
     * @param  Request $request has the input of the database.
     * @return object wether a list is deleted or not
     */
    public function deleteList(Request $request)
    {
        $listId = $request->get("listId");
        $list = BoardList::find($listId);
        $list->delete();
        return [
            'success' => 'success', 
        ];
    }

    /**
     * Update a list name in database.
     * @param  Request $request has the input for this function
     * @return boolean wether the list name is updated or not
     */
    public function updateListName(Request $request)
    {
        $listName = $request->get('value');
        $listId = $request->get('pk');
        
        $updatedData =  BoardList::where('id', $listId)
          ->update(['list_name' => $listName]);        

        if($updatedData) {
            return Response::json(array('status'=>1));
        } else {
            return Response::json(array('status'=>0));
        }
    }
}
