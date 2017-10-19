@extends('layouts.app')

@section('title','addBook')

@section('content')
<br>
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <h4><span class="fa fa-plus"></span> Add Books</h4>
        </div>
        <div class="panel-body">
            <div>
                <form class="form" method="POST" action="{{route('book.add')}}">
                    @if(\Session::get('book_add_error'))
                        <div class="alert alert-danger">{{\Session::get('book_add_error')}} <span class="close" data-dismiss="alert">&times;</span></div>
                    @endif
                    <div class='row'>
                    <div class='col-md-2'><span style='color:red'>*</span><label>ISBN:</label></div>
                    <div class='col-md-7'><input class="form-control" name="isbn" placeholder="Enter Book's ISBN" /></div>
                    </div>
                    <br/>
                    <div class='row'>
                    <div class='col-md-2'><label>Book's name:</label></div>
                    <div class='col-md-7'><input class="form-control" name="book_name" placeholder="Enter Book's Name" /></div>
                    </div>
                    <br/>
                    <div class='row'>
                    <div class='col-md-2'><label>Author's name:</label></div>
                    <div class='col-md-7'><input class="form-control" name="author_name" placeholder="Enter Author's Name" /></div>
                    </div>
                    <br/>
                    <div class='row'>
                    <div class='col-md-2'><label>Publisher:</label></div>
                    <div class='col-md-7'><input class="form-control" name="publisher" placeholder="Enter Publisher" /></div>
                    </div>
                    <br/>
                    <div class='row'>
                    <div class='col-md-2'><span style='color:red'>*</span><label>Price:</label></div>
                    <div class='col-md-7'><input class="form-control" name="book_price" placeholder="Enter Book's Price" /></div>
                    </div>
                    <br/>
                    <div class='row'>
                    <div class='col-md-2'><label>Location:</label></div>
                    <div class='col-md-7'><input class="form-control" name="location" placeholder="Enter Book's Location" /></div>
                    </div>
                    <br/>
                    <div class='row'>
                    <div class='col-md-2'><span style='color:red'>*</span><label>Number Of Copies:</label></div>
                    <div class='col-md-7'><input class="form-control" name="total_num" placeholder="Enter Number Of Copies" /></div>
                    </div>
                    <br/>
                    <input type="hidden" name="_token" value="{{\Session::token()}}" />
                    <button type="submit" class="form-control btn btn-success"><span class="fa fa-plus"></span> Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


