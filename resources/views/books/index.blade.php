@extends('layouts.app')

@section('title','Books')

@section('content')
<br>
<div id="books_container">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4><span class="fa fa-book"></span>Books List</h4>
            </div>
            <div class="panel-body">
                @include('books.recent')
            </div>
        </div>
    </div>
</div>

<script>
 $('#booklist').dataTable();
</script>
@endsection
