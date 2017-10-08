<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reader extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // 获取用户关联的个人信息
    //Eloquent会自动假设profile模型拥有user_id外键
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    //该用户借阅的书籍
    public function borrows()
    {
        return $this->hasMany('App\Borrow');
    }
}