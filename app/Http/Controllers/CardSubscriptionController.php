<?php

namespace App\Http\Controllers;

use App\CardSubscription;
use Illuminate\Http\Request;
use App\Events\UserSubscribed;

class CardSubscriptionController extends Controller
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
        return view('superstar.subscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $subscriptionDetails = request()->all();

        $subscriptionDetails['UserId'] = auth()->user()->id;
        // dd($subscriptionDetails);
        CardSubscription::create($subscriptionDetails);

        event(new UserSubscribed(auth()->user()));

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CardSubscription  $cardSubscription
     * @return \Illuminate\Http\Response
     */
    public function show(CardSubscription $cardSubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CardSubscription  $cardSubscription
     * @return \Illuminate\Http\Response
     */
    public function edit(CardSubscription $cardSubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CardSubscription  $cardSubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardSubscription $cardSubscription)
    {
        //
    }
}
