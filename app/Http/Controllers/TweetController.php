<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'tweet_text' => 'required|max:169'
        ]);

        $tweet = new Tweet();
        $tweet->user_id = Auth::id();
        $tweet->tweet_text = $request->get('tweet_text');
        $tweet->save();

        return redirect()->back()->with('success', 'Tweet added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        return view('tweets.edit', [
            'tweet' => $tweet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tweet $tweet)
    {
        $this->validate($request, [
            'tweet_text' => 'required|max:169'
        ]);

        $tweet->tweet_text = $request->get('tweet_text');
        $tweet->save();

        return redirect()->back()->with('success', 'Tweet updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        return redirect()->back()->with('success', 'Tweet deleted successfully!');
    }
}
