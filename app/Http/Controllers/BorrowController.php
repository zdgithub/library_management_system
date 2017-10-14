<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Borrow;
use App\Book;
use App\BookItem;
use App\User;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::all();
        $btmp = array();
        foreach ($borrows as $item)
        {
            $bitem = BookItem::where('id', $item->book_item_id)->first();
            if ($bitem->state == 0 && $item->return_date == null)
            {
                array_push($btmp, $item);
            }
        }
        return \View::make('borrows.index')
        ->with('borrows', $btmp);
    }
//得到借书的弹框
    public function lendView()
    {
        return \View::make('borrows.lend');
    }
//借出post
    public function lend(Request $request)
    {
        $this->validate($request, array(
        'barcode' => 'required|exists:book_items,barcode',
        'scode' => 'required|exists:profiles,scode',
        ));

        $profile = \App\Profile::where('scode',$request->scode)
                                ->first();
        $bookItem = BookItem::where('barcode', $request->barcode)
                                ->first();
        if($bookItem->state == 0){
            return \Redirect::to(url('borrows'));
        }else if($bookItem->state == 1){
            $bookItem->state = 0; //被借出
            $bookItem->save();

            $borrow = new Borrow();
            $borrow->reader_id = $profile->reader_id;
            $borrow->book_item_id = $bookItem->id;
            $borrow->borrow_date = Carbon::today();
            $borrow->save();
            return \Redirect::to(url('borrows'));
        }

    }

    public function returnBook($id)
    {
        $borrow = Borrow::where('id', $id)->first();
        BookItem::where('id', $borrow->bookItem->id)->update(array('state' => 1));

        $borrow->return_date = Carbon::today();
        $borrow->save();
    }

    public function readerInfo()
    {
        //获得当前登录的用户id
        $uid = auth()->guard('reader')->user()->id;
        $borrows = Borrow::where('reader_id', $uid)->get();
        $current = array();
        $history = array();
        foreach ($borrows as $item) {
            $tmp = BookItem::where('id', $item->book_item_id)->first();
            //dd($item);
            if ($item->return_date == null)
            {
                array_push($current, $item);
            }else
            {
                array_push($history, $item);
            }
        }

       return \View::make('reader.info')->with('current', $current)
                                        ->with('history', $history);
    }


}
