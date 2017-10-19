<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;

class FileController extends Controller
{
    // 文件上传方法
    public function uploadImage(Request $request) {

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $photo = $request->file('picture');
            $extension = $photo->extension();
            $name = $photo->getClientOriginalName();
            $store_result = $photo->store('uploads');

            $Image = new \App\Models\Image();
            $Image->book_id = $request->book_id;
            $Image->file_name = $name;
            $Image->file_path = $store_result;
            $Image->save();

        }
        return \Redirect::to(url('/book/'.$request->book_id));
    }

    public function getImage($id) {

        $Image = \App\Models\Image::where('book_id', $id)
                                ->first();
        $path = storage_path() . '/app/' . $Image->file_path;
        header('Content-type: image/jpg');
        return file_get_contents($path); //这样前端才能展示页面
    }
}