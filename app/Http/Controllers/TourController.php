<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::orderBy('id', 'desc')->get();

        return view('superstar.tour', compact('tours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(! request('venue')) return redirect('starrecords');

       request()->validate(['venue' => 'required']);

        Tour::create(request(['venue', 'date']));

        return redirect('starrecords');
    }
}
