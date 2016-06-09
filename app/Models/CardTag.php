<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardTag extends Model
{
    protected $table = "card_tag";

    protected $fillable = [
        'card_id', 'tag_title',
    ];

    public function getCardTag($card_id)
    {
    	return CardTag::where('card_id', '=', $card_id)->get();
    }

    public function deleteCardTag($card_id)
    {
    	return CardTag::where("card_id", '=', $card_id)->delete();
    }

    public function createCardTag($input)
    {
    	$cardTagsList = explode(",", $input->get("cardTags"));

    	foreach ($cardTagsList as $value) {
            CardTag::create([
                "card_id" => $input->get("cardId"),
                "tag_title" => $value,
            ]);
        }

        return true;
    }
}
