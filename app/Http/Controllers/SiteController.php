<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class SiteController extends Controller
{

    public function index()
    {
        return \View::make('site.home');
    }

    public function profileView($id)
    {
        $user_info = \App\Profile::where('reader_id', $id)->first();

        return \View::make('reader.profile')
                    ->with('rid', $id)
                    ->with('user_info', $user_info);
    }

    public function profile(Request $request)
    {
        $this->validate($request, array(
            'scode' => 'required',
        ));

        $profile = Profile::where('reader_id',$request->id)->first();
        if($profile == null){
            $profile = new Profile();
            $profile->reader_id = $request->id;
            $profile->truename = $request->truename;
            $profile->sex = $request->sex;
            $profile->school = $request->school;
            $profile->scode = $request->scode;
            $profile->major = $request->major;
            $profile->phone = $request->phone;
            $profile->save();
        }else {
            Profile::where('reader_id',$request->id)->update(array(
            'truename' => $request->truename,
            'sex' => $request->sex,
            'school' => $request->school,
            'scode' => $request->scode,
            'major' => $request->major,
            'phone' => $request->phone,
            ));
        }


        return \Redirect::to(url('reader/profile/'.$request->id));
    }

    //设置和管理员相关的方法
    public function permissionView()
    {
        $librarians = \App\User::where('role', '!=', 2)->get();
        return view('site.permission')
               ->with('librarians', $librarians);
    }

    public function permission($id)
    {
        $lib = \App\User::where('id', $id)->first();
        $lib->role = 1;
        $lib->save();
    }
    public function cancelPermit($id)
    {
        $lib = \App\User::where('id', $id)->first();
        $lib->role = 0;
        $lib->save();
    }

    public function libView()
    {
        $librarians = \App\User::where('role', '!=', 2)->get();
        return \View::make('site.librarian')->with('librarians', $librarians);
    }

    public function deleteLibView($id)
    {
        return \View::make('site.deleteLib')->with('id', $id);
    }

    public function deleteLib(Request $request)
    {
        \App\User::where('id', $request->id)->delete();
        return \Redirect::to(url('/super/lib'));
    }

    public function userView()
    {
        $users = \App\Models\Reader::all();
        return \View::make('site.user')->with('users', $users);
    }

    public function deleteUserView($id)
    {
        return \View::make('site.deleteUser')->with('id', $id);
    }

    public function deleteUser(Request $request)
    {
        //先将该用户绑定的记录全部删除

        $can = true;
        $borrows = \App\Borrow::where('reader_id', $request->id)->get();
        foreach ($borrows as $bor) {
            if($bor->return_date == null){
                $can = false;
                break;
            }
        }

        if(!$can){
            return \Redirect::to(url('super/user'))
            ->with('msg', "The user has some book that aren't returned. So you can't delete her or him now. Please inform her or him of returning the book timely.");
        }else{
            \App\Borrow::where('reader_id', $request->id)->delete();
            \App\Profile::where('reader_id', $request->id)->delete();
            \App\Models\Reader::where('id', $request->id)->delete();
            return \Redirect::to(url('/super/user'));
        }

    }

}
