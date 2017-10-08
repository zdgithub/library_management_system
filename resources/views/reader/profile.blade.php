@extends('layouts.reader')

@section('title','Information')

@section('content')
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-3 settings-left">
      <h5 class="settings-left-element"><a href="#Personal">Personal Settings</a></h5>
    </div>
    <div class="col-sm-8" >
      
      <div class="panel">
        <div class="panel-heading">
          <h3>Personal Settings</h3>
        </div>
        <form class="form" method="POST" action="{{route('profile.edit')}}">
          <div class="panel-body">
            <label>True Name:</label><br>
            @if ($user_info === null)
            <input class="form-control" name="truename" value="" ><br>
            <label>Sex:</label><br>
            <input class="form-control" name="sex" value=""><br>
            <label>University:</label><br>
            <input class="form-control" name="school" value=""><br>
            <label>Student Number:</label><br>
            <input class="form-control" name="scode" value=""><br>
            <label>Major:</label><br>
            <input class="form-control" name="major" value=""><br>
            <label>Phone:</label><br>
            <input class="form-control" name="phone" value=""><br>
            @else
            <input class="form-control" name="truename" value="{{ $user_info->truename }}" ><br>
            <label>Sex:</label><br>
            <input class="form-control" name="sex" value="{{$user_info->sex}}"><br>
            <label>University:</label><br>
            <input class="form-control" name="school" value="{{$user_info->school}}"><br>
            <label>Student Number:</label><br>
            <input class="form-control" name="scode" value="{{$user_info->scode}}"><br>
            <label>Major:</label><br>
            <input class="form-control" name="major" value="{{$user_info->major}}"><br>
            <label>Phone:</label><br>
            <input class="form-control" name="phone" value="{{$user_info->phone}}"><br>
            @endif
            <input type='hidden' name='id' value="{{$rid}}">
          </div>
          <div class="panel-footer">
            <input type="hidden" name="_token" value="{{\Session::token()}}">
            <button type="submit" class="form-control btn btn-primary">Save</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<style>
.settings-left{
  background-color: white;
}

.settings-left-element{
  padding:10px;
  cursor:pointer;
}

.settings-left-element:hover{
  background-color: #eee;
}
</style>

@endsection
