<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function copies_available()
    {
        $total = $this->total_num;
        $current_borrows = \App\BookItem::where(['book_id'=>$this->id, 'state'=>0])->count();
        $available_copies = $total - $current_borrows;

        return $available_copies;
    }

    /**
    *获取该种书的所有copies
    */
    public function copies()
    {
      return $this->hasMany('App\BookItem');
    }
}
