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
    protected $boardList;

    public function __construct(BoardList $boardList)
    {
        $this->boardList = $boardList;
    }

    /**
     * Creates a new list in the database.
     * @param  Request $request has the input data for this function.
     * @return object created list
     */
	public function postListName(Request $request)
    {
        $this->validate($request, [
            'list_name' => 'required',
        ]);

        return $this->boardList->createList($request, Auth::id());
    }

    /**
     * Delete a list from the database.
     * @param  Request $request has the input of the database.
     * @return object wether a list is deleted or not
     */
    public function deleteList(Request $request)
    {
        $this->boardList->deleteList($request);   

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
        if($this->boardList->updateListName($request)) {
            return Response::json(array('status'=>1));
        } else {
            return Response::json(array('status'=>0));
        }
    }
}
