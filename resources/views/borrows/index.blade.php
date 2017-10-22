@extends('layouts.app')

@section('title','Borrow Books')

@section('content')
@if(Session::has('msg'))
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">
        &times;
    </a>
    {{ Session::get('msg') }}
</div>
@endif
<br>
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
          <button onclick="returnBook()" class="btn btn-danger pull-right">Return</button>
          <button onclick="lend()" class="btn btn-primary pull-right" style='margin-right:7px'> Lend </button>
          <h3>Current Borrows</h3>
        </div>
        <div class="panel-body">
            <table class="table responsive-table table-striped" id='borrowtable'>
                <thead>
                    <tr>
                        <th>
                            Barcode
                        </th>
                        <th>
                            User Name
                        </th>
                        <th>
                            Book Name
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Fine
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrows as $borrow)
                    <tr>
                        <td>{{$borrow->bookItem->barcode}}</td>
                        <td>
                            {{$borrow->user->name}}
                        </td>
                        <td>
                            {{$borrow->bookItem->book->name}}
                        </td>
                        <td>
                            @if($borrow->status() == 'Returned')

                            <span class="label label-success">{{$borrow->status()}}</span>

                            @elseif($borrow->status() == 'Charging Fine')

                            <span class="label label-danger">{{$borrow->status()}}</span>

                            @else
                            <span class="label label-warning">{{$borrow->status()}}</span>

                            @endif

                        </td>
                        <td>
                            {{$borrow->fine()}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
          <h3>History Borrows</h3>
        </div>
        <div class="panel-body">
          <table class="table responsive-table table-striped" id='historytable'>
            <thead>
              <tr>
                <th>Barcode</th>
                <th>User Name</th>
                <th>Book Name</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($history as $his)
              <tr>
                <td>{{$his->bookItem->barcode}}</td>
                <td>
                    {{$his->user->name}}
                </td>
                <td>
                    {{$his->bookItem->book->name}}
                </td>
                <td>{{ $his->borrowDate() }}</td>
                <td>{{ $his->returnDate() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

<script>
    $('#borrowtable').dataTable();
    $('#historytable').dataTable();

    function lend(){
        $('#def-modal').modal('hide');
        $.get("{{url('/')}}/lend",function(data){
            $('#def-modal-content').html(data);
        });
        $('#def-modal').modal('show');
    }

    function returnBook(){
        $('#def-modal').modal('hide');
        $.get("{{url('/')}}/return",function(data){
            $('#def-modal-content').html(data);
        });
        $('#def-modal').modal('show');
    }
</script>
@endsection
