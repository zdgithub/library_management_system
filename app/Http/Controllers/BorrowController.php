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
        return \View::make('borrows.index')
        ->with('borrows', $borrows);
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

        $borrow = new Borrow();
        $borrow->user_id = $profile->user_id;
        $borrow->book_item_id = $bookItem->id;
        $borrow->borrow_date = Carbon::today();
        $borrow->save();

        return \Redirect::to('borrows');
    }

    public function clear($id)
    {
        Borrow::where('id',$id)->update(array('cleared' => 1));
    }
    

}
