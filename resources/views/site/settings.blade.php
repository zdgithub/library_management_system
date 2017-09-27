@extends('layouts.app')

@section('title','profile')

@section('content')
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-3 settings-left">
      <h5 class="settings-left-element"><a href="#Personal">Personal Settings</a></h5>
      <h5 class="settings-left-element"><a href="#Borrow">Borrow Information</a></h5>
      <h5 class="settings-left-element"><a href="#history">Borrow History</a></h5>
    </div>
    <div class="col-sm-8" id="Personal">
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

      <div class="panel" id="Borrow">
          <div class="panel-heading">
              <h3>Borrow Information</h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered" id='ptable'>
              <thead>
                <tr>
                  <th>Barcode</th>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Loan Date</th>
                  <th>Receive Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>

      <div class="panel" id="history">
          <div class="panel-heading">
              <h3>Borrow History</h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered" id='btable'>
              <thead>
                <tr>
                  <th>Barcode</th>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Loan Date</th>
                  <th>Return Date</th>
                  <th>Fine</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="panel-footer">
          </div>
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

<script>
  $('#ptable').dataTable();
</script>
@endsection
