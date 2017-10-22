@extends('layouts.app')

@section('title','permission')

@section('content')
<br>
<div id="books_container">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4><span class="fa fa-cog"></span> Set Permission on Librarians</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id='per'>
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($librarians as $item)
                      <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                        @if ($item->role === 0)
                        <div>unauthorized</div>
                        @else
                        <div>authorized</div>
                        @endif
                        </td>
                        <td>
                           <button onclick='Permission({{$item->id}})' type='button' class='btn btn-success'>Authorize</button>
                           <button onclick='Cancel({{$item->id}})' type='button' class='btn btn-warning'>Unauthorize</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
 $('#per').dataTable();

  function Permission(id){
    $.ajax({
            url: "{{url('/')}}/super/permission/" + id,
            method: "POST",
            data: {_token:"{{Session::token()}}"},
    }).fail((data) => {
        console.log(data);
    }).done((data) => {
        location.reload();
    });
  }

  function Cancel(id){
    $.ajax({
            url: "{{url('/')}}/super/cancel/" + id,
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