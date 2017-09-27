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
                    <label>Book's name:</label>
                    <input class="form-control" name="book_name" placeholder="Enter Book's Name"/><br>

                    <label>Author's name:</label>
                    <input class="form-control" name="author_name" placeholder="Enter Author's Name" /><br>

                    <label>ISBN:</label>
                    <input class="form-control" name="isbn" placeholder="Enter Book's ISBN" /><br>

                    <label>Publisher:</label>
                    <input class="form-control" name="publisher" placeholder="Enter Publisher" /><br>

                    <label>Price:</label>
                    <input class="form-control" name="book_price" placeholder="Enter Book's Price" /><br>

                    <label>Number Of Copies:</label>
                    <input class="form-control" name="total_num" placeholder="Enter Number Of Copies" /><br>

                    <input type="hidden" name="_token" value="{{\Session::token()}}" />
                    <button type="submit" class="form-control btn btn-success"><span class="fa fa-plus"></span> Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


