<?php
namespace App\Http\Controllers;

use Auth;
use \App\User;
use \App\BoardCard;
use \App\BoardList;
use \App\CardTag;
use \App\CardTask;
use \App\Comment;
use App\Board;
use DB;
use Illuminate\Http\Request;
use Response;

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
        
        return Board::create([
            'user_id' => $userId,
            'boardTitle' => $boardTitle,
            'boardPrivacyType' => $boardPrivacyType,  
        ]);
    }

    public function getBoardDetail(Request $request)
    {
       $boardId = $request->id;
       $boardDetail = Board::findOrFail(['id' => $boardId])->first();
       $lists = BoardList::where(["board_id" => $boardId,])->get();

        $cards =  DB::table('board_card')->select([
                'board_card.*',
                DB::raw("COUNT(comment.id) as totalComments"),
            ])
            ->leftJoin('comment', 'board_card.id', '=', 'comment.card_id')
            ->groupBy('board_card.id')
            ->get();
        $cards = json_decode(json_encode($cards), True);
        
        $cardTaskCount =  DB::table('board_card')->select([
            'board_card.*',
            DB::raw("COUNT(card_task.id) as totalTasks"),
        ])
        ->leftJoin('card_task', 'board_card.id', '=', 'card_task.card_id')
        ->groupBy('board_card.id')
        ->get();
        $cardTaskCount = json_decode(json_encode($cardTaskCount), True);

        $boards = Board::where(['user_id' => Auth::id(), ])->get();
        $recentBoards = Board::where(['user_id' => Auth::id(), ])->orderBy('created_at', 'desc')->take(3)->get();

        return view('user.board', compact('boardDetail', 'lists', 'cards', 'cardTaskCount', 'boards', 'recentBoards'));
    }

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
    
    public function deleteList(Request $request)
    {
        $listId = $request->get("listId");
        $list = BoardList::find($listId);
        $list->delete();
        return [
            'success' => 'success', 
        ];
    }

    public function deleteCard(Request $request)
    {
        $cardId = $request->get("cardId");
        $card = BoardCard::find($cardId);
        $card->delete();
        return [
            'success' => 'success', 
        ];   
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

    public function saveComment(Request $request)
    {
        $comment = $request->get("comment");
        $cardId = $request->get("cardId");
        $userId  = Auth::id();

        $commentDetail = Comment::create([
            'card_id' => $cardId,
            'user_id' => $userId,
            'comment_description' => $comment,  
        ]);

        return DB::table('comment')
          ->select('comment.*', 'users.name')
          ->join('users','users.id','=','comment.user_id')
          ->where('comment.id','=',$commentDetail["id"])
          ->get();
    }

    public function updateCardData(Request $request)
    {
        $cardId = $request->get("cardId");
        $cardTitle = $request->get("cardName");
        $cardDescription = $request->get("cardDescription");
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

    public function saveTask(Request $request)
    {
        $taskTitle = $request->get("taskTitle");
        $cardId = $request->get("cardId");
        

        $card = CardTask::create([
            "task_title" => $taskTitle,
            "card_id" => $cardId,
            "is_completed" => 0,
        ]);
        
        $totalTasksCompleted = CardTask::where(['card_id' => $cardId, "is_completed" => 1])->count();
        $totalTasks = CardTask::where(['card_id' => $cardId])->count();

        return [
            "totalTasksCompleted" => $totalTasksCompleted,
            "totalTasks" => $totalTasks,
            "card" => $card,
        ];
    }

    public function deleteTask(Request $request)
    {
        $taskId = $request->get("taskId");   
        $cardId = $request->get("cardId");
        
        CardTask::where("id", "=", $taskId)->delete();

        $totalTasksCompleted = CardTask::where(['card_id' => $cardId, "is_completed" => 1])->count();
        $totalTasks = CardTask::where(['card_id' => $cardId])->count();

        return [
            "totalTasksCompleted" => $totalTasksCompleted,
            "totalTasks" => $totalTasks,
        ];

    }

    public function updateTaskCompleted(Request $request)
    {
        $taskId = $request->get("taskId");
        $cardId = $request->get("cardId");
        $isCompleted = $request->get("isCompleted");

        CardTask::where("id", "=", $taskId)->update(["is_completed" => $isCompleted,]);

        $totalTasksCompleted = CardTask::where(['card_id' => $cardId, "is_completed" => 1])->count();
        $totalTasks = CardTask::where(['card_id' => $cardId])->count();

        return [
            "totalTasksCompleted" => $totalTasksCompleted,
            "totalTasks" => $totalTasks,
        ];

    }

}