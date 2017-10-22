@extends('layouts.app')

@section('title','user')

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
<div id="books_container">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4><span class="fa fa-users"></span> Delete Users</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id='user'>
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $item)
                      <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                           <button onclick='DeleteUserModal({{$item->id}})' type='button' class='btn btn-danger'>Delete</button>
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
 $('#user').dataTable();

 function DeleteUserModal(id){
  $.get('{{url("/")}}/super/deleteuser/'+id,function(dataHTML){
    $('#modalTitle').html("<h4>Delete the User</h4>");
    $('#modalBody').html(dataHTML);
    $('#modalFooter').html("<button type='button' data-dismiss='modal' class='btn btn-danger pull-left'>Cancel</button>\
            <button onclick=\"deleteUser()\" class='btn btn-primary pull-right'>Delete</button></form>")
  });

  $('#def-modal').modal('show');
}

function deleteUser(){
    document.getElementById('deleteUserButton').click();
}

</script>
@endsection