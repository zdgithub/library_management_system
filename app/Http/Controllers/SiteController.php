<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class SiteController extends Controller
{
    public function contact_us()
    {
        return \View::make('site.contact_us');
    }

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

}
