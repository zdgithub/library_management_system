<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Borrow extends Model
{
    protected $dates = ['created_at', 'updated_at', 'borrow_date', 'return_date'];
    public function user()
    {
        return $this->belongsTo('App\Models\Reader', 'reader_id');
    }

    public function bookItem()
    {
        return $this->belongsTo('App\BookItem', 'book_item_id');
    }
//应还日期,注意这个为函数
    public function receiveDate()
    {
        return $this->borrow_date->addDays(30)->toDateString();
    }

    public function status()
    {
        if ($this->bookItem->state == 0) {
            $today = Carbon::today();
            $receive = $this->borrow_date->addDays(30);
            $days_left = $today->diffInDays($receive, false);

            if ($days_left < 0) {
                return 'Charging Fine';
            }
            return $days_left.' Days Left';
        }

        return 'Returned';
    }

    public function fine()
    {
        if ($this->status() != 'Charging Fine') {
            return '0.0';
        }

        $today = Carbon::today();
        $receive_date = $this->borrow_date->addDays(30);
        $days_gone = $receive_date->diffInDays($today, false);

        $total_fine = 0.1 * $days_gone;

        return $total_fine;
    }
//格式化输出日期
    public function returnDate()
    {
        return $this->return_date->toDateString();
    }

    public function borrowDate()
    {
        return $this->borrow_date->toDateString();
    }


}
