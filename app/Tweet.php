<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
  use SoftDeletes;

  protected $table = 'tweets';
  protected $dates = ['delete_at'];
//  protected $softDelete = true; 
}
