<?php

namespace App\Http\Controllers;

use App\ViewersFeedback;
use Illuminate\Http\Request;
use App\Video;

class ViewersFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Video $video)
    {
        $video->addComment(request('comment'));

        return redirect($video->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ViewersFeedback  $viewersFeedback
     * @return \Illuminate\Http\Response
     */
    public function show(ViewersFeedback $viewersFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ViewersFeedback  $viewersFeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewersFeedback $viewersFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ViewersFeedback  $viewersFeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViewersFeedback $viewersFeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ViewersFeedback  $viewersFeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViewersFeedback $viewersFeedback)
    {
        //
    }
}
