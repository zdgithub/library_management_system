@extends('layouts.app')

@section('title','Borrow Books')

@section('content')
<br>
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <button onclick="lend()" class="btn btn-primary pull-right">lend a book</button>
            <h3>Current Borrows</h3>
        </div>
        <div class="panel-body">
            <table class="table responsive-table table-striped" id='borrowtable'>
                <thead>
                    <tr>
                        <th>
                            Borrower
                        </th>
                        <th>
                            Barcode
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
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrows as $borrow)
                    <tr>
                        <td>
                            {{$borrow->user->name}}
                        </td>
                        <td>{{$borrow->bookItem->barcode}}</td>
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
                        <td>
                         <button onclick="returnBook({{$borrow->id}})" class="btn btn-default">RETURN</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    $('#borrowtable').dataTable();

    function lend(){
        $.get("{{url('/')}}/lend",function(data){
            $('#def-modal-content').html(data);
        });
        $('#def-modal').modal('show');
    }

    function returnBook(id){
        $.ajax({
                url: "{{url('/')}}/return/"+id,
                method: "POST",
                data: {_token:"{{Session::token()}}"},
        }).fail((data) => {
            console.log(data);
        }).done((data) => {
            location.reload();
        });
    }


</script>
@endsection
