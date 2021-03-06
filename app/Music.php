<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $guarded = [];


    public function path()
    {
        return "/starrecords/musics/{$this->id}";
    }
}
