<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tweet;
use App\User;
use App\Follow;
use Auth;

class TweetController extends Controller
{ 
  public function index() {
    $tweet_all = Tweet::all();
    $follow_all = Follow::all();
    $user_follow = $follow_all->filter(function ($item){
      return $item['user_id'] == Auth::user()->id;
    })->pluck('follow_id');

    $data['tweets'] = $tweet_all;
    $data['followed'] = $user_follow->toArray();
      
    return view('tweet/home',$data);
  } 

  public function store(Request $request) {
    $input_tweet = $request->input('tweet');

    $tweet = new Tweet;
    $tweet->tweet = $input_tweet;
    $tweet->user_id = Auth::user()->id;

    $tweet->save();
    
    return redirect('tweet');
  }

  public function destroy(Request $request) {
    $tweet_id = $request->input('tweet_id');
    $tweet = Tweet::find($tweet_id);
    $tweet->delete();
    
    return redirect('tweet');
  }

  public function show($id) {
    $data['id'] = $id;
    $data['tweet'] = Tweet::find($id);

    return view('tweet/edit', $data);
  }

  public function update(Request $request) {
    $tweet = Tweet::find($request->input('tweet_id'));
    $tweet->tweet = $request->input('tweet');
    $tweet->save();

    return redirect('tweet');
  }

}
