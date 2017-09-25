<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  //获取拥有该个人信息的用户
  public function user()
  {
    return $this->belongsTo('App\User');
  }

}