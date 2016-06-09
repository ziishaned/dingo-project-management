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
use \App\Models\Comment;

class CardController extends Controller
{
    protected $boardCard;
    protected $cardTag;
    protected $cardTask;
    protected $comment;

    public function __construct(BoardCard $boardCard, CardTag $cardTag, CardTask $cardTask, Comment $comment)
    {
        $this->boardCard = $boardCard;
        $this->cardTag = $cardTag;
        $this->cardTask = $cardTask;
        $this->comment = $comment;
    }

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
        return $this->boardCard->createCard($request, Auth::id());
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
        return $this->boardCard->updateCardListId($request);
    }

    /**
     * Delete a card from a list.
     * @param  Request $request has the id of the card
     * @return boolean if the card is deleted or not
     */
    public function deleteCard(Request $request)
    {
        return $this->boardCard->deleteCard($request);
    }

    /**
     * Get a card detail from database.
     * @param  Request $request has the data that is being used in this function
     * @return object card detail
     */
    public function getCardDetail(Request $request)
    {
        return [
            "card" => $this->boardCard->getCard($request->get("cardId")),
            "label" => $this->cardTag->getCardTag($request->get("cardId")),
            "task" => $this->cardTask->getCardTasks($request->get("cardId")),
            "comment" => $this->comment->getCardComment($request->get("cardId")),
        ];     
    }

    /**
     * Update card date in database.
     * @param  Request $request has the input data for this function
     * @return object updated data
     */
    public function updateCardData(Request $request)
    {
        $this->cardTag->deleteCardTag($request->get("cardId"));
        $this->cardTag->createCardTag($request);
        $this->boardCard->updateCard($request);

        return [
            "cardTitle" => $request->get("cardName"),
            "cardId" => $request->get("cardId"),
        ];
    }
}
