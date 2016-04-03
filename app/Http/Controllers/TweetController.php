<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tweet;

class TweetController extends Controller
{
  public function __construct() {
    parent::__construct();
  }
  
  public function index() {
    $tweet_all = Tweet::all();

    $data['tweets'] = $tweet_all;
    return view('tweet/home',$data);
  } 

  public function store(Request $request) {
    $input_tweet = $request->input('tweet');

    $tweet = new Tweet;
    $tweet->tweet = $input_tweet;
    $tweet->user_id = '123';

    $tweet->save();
    
    return redirect('tweet');
  }

  public function destroy(Request $request) {
    $tweet_id = $request->input('tweet_id');
    $tweet = Tweet::find($tweet_id);
    $tweet->delete();
    
    return redirect('tweet');
  }
}
