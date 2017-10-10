<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
//必须写orz
  protected $fillable = [
    'user_id','scode','truename','sex','major','phone','school'
  ];
  /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  protected $hidden = [];

  public $timestamps = false;


  //获取拥有该个人信息的用户
  public function user()
  {
    return $this->belongsTo('App\Models\Reader', 'reader_id');
  }

}