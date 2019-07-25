<?php

namespace App\Http\Controllers;

use App\Video;

use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::all();

        return view('superstar.videos', compact('videos'));
    }

    public function store()
    {
        $this->validateUrl();

        request()->validate([

            'title' => 'required',

            'url' => 'required',

            ]);

        Video::create(request(['title', 'url', 'thumb_nail']));

        return redirect('/starrecords');
    }


    public function update(Video $video)
    {
        if(! request()->all()['title']) abort(403);

        $video->update(request(['title']));

        return redirect('/starrecords');
    }


    public function destroy(Video $video)
    {
        $video->delete();

        return redirect('/starrecords');
    }


    protected function validateUrl()
    {
        if(! filter_var(request('url'), FILTER_VALIDATE_URL)) abort(403);
    }
}
