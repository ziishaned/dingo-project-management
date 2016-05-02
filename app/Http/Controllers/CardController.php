<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use Auth;
use \App\Models\BoardCard;
use \App\Models\CardTag;
use \App\Models\CardTask;

class CardController extends Controller
{
    /**
     * Creates a new card in database 
     * @param  Request $request have the input data
     * @return object created card
     */
    public function postCard(Request $request)
    {
        $this->validate($request, [
            'card-title' => 'required',
        ]);

        $cardTitle = $request->get('card-title');
        $listId = $request->get('list_id');
        $boardId = $request->get('board_id');
        $userId = Auth::id();

        return BoardCard::create([
            'board_id' => $boardId,
            'user_id' => $userId,
            'list_id' => $listId,
            'card_title' => $cardTitle,  
        ]);
    }

    /**
     * Change the card list. For example if the card is in list x then you drag it to the
     * other list named y. So, now using this function card list has been updaed to list_id 
     * of y in database.
     * @param  Request $request has input data for the function
     * @return object updated data
     */
    public function changeCardList(Request $request)
    {
        $listId = $request->get('listId');
        $cardId = $request->get('cardId');
        return BoardCard::where('id', $cardId)
          ->update(['list_id' => $listId]);
    }

    /**
     * Delete a card from a list.
     * @param  Request $request has the id of the card
     * @return boolean if the card is deleted or not
     */
    public function deleteCard(Request $request)
    {
        $cardId = $request->get("cardId");
        $card = BoardCard::find($cardId);
        $card->delete();
        return $card;   
    }

    /**
     * Get a card detail from database.
     * @param  Request $request has the data that is being used in this function
     * @return object card detail
     */
    public function getCardDetail(Request $request)
    {
        $cardId = $request->get("cardId");
        $userId = Auth::id();

        $card = BoardCard::find($cardId);
        $label = CardTag::where('card_id', '=', $cardId)->get();
        $task = CardTask::where('card_id', '=', $cardId)->latest()->get();
        $comment = DB::table('comment')
          ->select('comment.*', 'users.name')
          ->join('users','users.id','=','comment.user_id')
          ->where('card_id','=',$cardId)
          ->latest()
          ->get();

        return [
            "card" => $card,
            "label" => $label,
            "task" => $task,
            "comment" => $comment,
        ];     
    }

    /**
     * Update card date in database.
     * @param  Request $request has the input data for this function
     * @return object updated data
     */
    public function updateCardData(Request $request)
    {
        $cardId = $request->get("cardId");
        $cardTitle = $request->get("cardName");
        $cardDescription = ($request->get("cardDescription") != "Empty") ? $request->get("cardDescription") : '';
        $cardTags = $request->get("cardTags");
        $cardColor = $request->get("cardColor");
        $cardDueDate = date("Y-m-d H:i:s", strtotime($request->get("cardDueDate")));

        $cardTagsList = explode(",", $cardTags);
        CardTag::where("card_id", '=', $cardId)->delete();
        foreach ($cardTagsList as $value) {
            CardTag::create([
                "card_id" => $cardId,
                "tag_title" => $value,
            ]);
        }

        BoardCard::where('id', $cardId)->update([
            "card_title" => $cardTitle,
            "card_description" => $cardDescription,
            "card_color" => $cardColor,
            "due_date" => $cardDueDate,
        ]);

        return [
            "cardTitle" => $cardTitle,
            "cardId" => $cardId,
        ];
    }
}
