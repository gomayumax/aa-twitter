<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
  use SoftDeletes;

  protected $table = 'tweets';
  protected $dates = ['delete_at'];

  public function user() {
    return $this->belongsTo('App\User');
  }
}
