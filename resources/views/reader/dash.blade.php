@extends('layouts.reader')

@section('title','Dashboard')

@section('content')
@if($scode == null)
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">
        &times;
    </a>
    You haven't bound your student number, please bind it in time so that you can borrow some books!
</div>
@endif
<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
              <br/><br/>
              <div class="col-sm-12">

                <a href="{{url('/reader/list')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-book"></span> Books List</h3>
                    </div>
                  </div>
                </div>
                </a>

                <a href="{{url('/reader/borrowinfo')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-cog"></span> Borrow Information</h3>

                    </div>

                  </div>
                </div>
                </a>

              </div>
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