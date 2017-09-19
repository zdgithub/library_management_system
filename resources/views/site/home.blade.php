@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
              <br/><br/>
              <div class="col-sm-12">

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

                <a href="{{url('/borrowers')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-users"></span> Borrowers</h3>

                    </div>

                  </div>
                </div>
                </a>

                <a href="{{url('/borrows')}}">
                <div class="col-sm-6">
                  <div class="panel link-panel">
                    <div class="panel-heading">
                      <h3><span class="fa fa-share"></span> Borrowed Books</h3>

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
