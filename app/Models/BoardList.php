<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardList extends Model
{
    protected $table = "board_list";

    protected $fillable = [
        'board_id', 'user_id', 'list_name',
    ];

    public function createList($input, $user_id)
    {
    	return $this->create([
            'board_id' => $input->get('board_id'),
            'list_name' => $input->get('list_name'),
            'user_id' => $user_id,
        ]);
    }

    public function deleteList($input)
    {
    	$this->find($input->get("listId"))->delete();
    	return true;
    }

    public function updateListName($input)
    {
    	$this->where('id', $input->get('pk'))->update(['list_name' => $input->get('value')]);
		return true;                
    }

    public function getBoardList($boardId)
    {
        return $this->where(["board_id" => $boardId,])->get();
    }
}
