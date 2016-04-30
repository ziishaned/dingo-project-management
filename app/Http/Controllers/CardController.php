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

    public function changeCardList(Request $request)
    {
        $listId = $request->get('listId');
        $cardId = $request->get('cardId');
        return BoardCard::where('id', $cardId)
          ->update(['list_id' => $listId]);
    }

    public function deleteCard(Request $request)
    {
        $cardId = $request->get("cardId");
        $card = BoardCard::find($cardId);
        $card->delete();
        return $card;   
    }

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
