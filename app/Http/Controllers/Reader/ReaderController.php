<?php

namespace App\Http\Controllers\Reader;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReaderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //获取当前登录用户的id
      $uid = auth()->guard('reader')->user()->id;
      $prf = \App\Profile::where('reader_id', $uid)->first();

      return \View::make('reader.dash')->with('scode', $prf);

    }
}
