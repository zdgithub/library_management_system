<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookItem extends Model
{
    //获取所属的书籍
    public function book()
    {
      return $this->belongsTo('App\Book');
    }

    //获取该书被借阅的所有记录
    public function borrows()
    {
      return $this->hasMany('App\Borrow', 'book_item_id');
    }


}
