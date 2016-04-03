<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model
{
  use SoftDeletes;

  protected $table = 'follow';
  protected $dates = ['delete_at'];

  public function followUser() {
    return $this->belongsTo('App\User', 'follow_id');
  }
}
