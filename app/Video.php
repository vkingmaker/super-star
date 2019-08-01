<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];


    public function viewers_feedback()
    {
        return $this->hasMany('App\ViewersFeedback');
    }


    public function addComment($comment)
    {
        $this->viewers_feedback()->create([

            'video_id' => $this->id,

            'user_id' => auth()->id(),

            'comment' =>  $comment,
        ]);
    }

    public function path()
    {
        return "/starrecords/videos/{$this->id}";
    }
}
