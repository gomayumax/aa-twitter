<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Follow;
use Auth;

class FollowController extends Controller
{
  public function index() {
  }

  public function checkFollow($id) {
    if (Auth::user()->id != $id) {
      $follow = Follow::all();
      if ($follow->where('user_id', Auth::user()->id)->where('follow_id', (int) $id)->isEmpty()){
        $this->_follow($id);
      } else {
        $this->_unfollow($id);
      }
    }
    return redirect('tweet');
  }

  public function followList() {
    \View::Share('title', 'Follow List');

    $follow_list = [];
    $data = [];

    $follow_list = Follow::where('user_id', Auth::user()->id)->where('deleted_at', null)->get();

    if(!$follow_list->isEmpty()){
      $data['list'] = $follow_list;
    }

    return view('tweet.list', $data);
  }

  public function followerList() {
    \View::Share('title', 'Follow List');

    $follower_list = [];
    $data = [];

    $follower_list = Follow::where('follow_id', Auth::user()->id)->where('deleted_at', null)->get();

    if(!$follower_list->isEmpty()){
      $data['list'] = $follower_list;
    }

    return view('tweet.followerlist', $data);

  }

  private function _follow($id) {
    //$hoge = Follow::add(Auth::user()->id, $id);
    $follow = new Follow;
    $follow->user_id = Auth::user()->id;
    $follow->follow_id = $id;

    $follow->save();
  }

  private function _unfollow($id) {
    $follow = Follow::where('user_id', Auth::user()->id)->where('follow_id', (int) $id);
    $follow->delete();
  }
}
