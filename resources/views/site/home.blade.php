@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
              <br/><br/>
          @if(Auth::user()->role == 1)
              <div class="col-sm-12">
                <a href="{{url('/home')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-home"></span> Dashboard</h3>
                    </div>
                  </div>
                </div>
                </a>

                <a href="{{url('/addbook')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-plus"></span> Add Book</h3>
                    </div>
                  </div>
                </div>
                </a>

                <a href="{{url('/books')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel" >
                    <div class="panel-heading">
                      <h3><span class="fa fa-book"></span> Books List</h3>
                    </div>
                  </div>
                </div>
                </a>

                <a href="{{url('/borrows')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-share"></span> Borrow & Return</h3>

                    </div>

                  </div>
                </div>
                </a>
              </div>
          @elseif(Auth::user()->role == 2)
              <div class="col-sm-12">

                <a href="{{url('/home')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-home"></span> Dashboard</h3>
                    </div>
                  </div>
                </div>
                </a>

                <a href="{{url('/super/permission')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-cog"></span> Set Permission</h3>
                    </div>
                  </div>
                </div>
                </a>

                <a href="{{url('/super/lib')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-users"></span> Delete Librarians</h3>
                    </div>
                  </div>
                </div>
                </a>

                <a href="{{url('/super/user')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-users"></span> Delete Users</h3>
                    </div>
                  </div>
                </div>
                </a>
              </div>
          @else
          @endif
        </div>
    </div>
</div>

<style>
.link-panel{
  border:1px #ccc solid;
}

.link-panel:hover{
  padding-left:20px;
}
</style>
@endsection
