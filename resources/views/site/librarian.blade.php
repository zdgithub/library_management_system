@extends('layouts.app')

@section('title','lib')

@section('content')
<br>
<div id="books_container">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4><span class="fa fa-users"></span> Delete Librarians</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id='lib'>
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($librarians as $item)
                      <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                           <button onclick='DeleteLibModal({{$item->id}})' type='button' class='btn btn-danger'>Delete</button>
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
 $('#lib').dataTable();

function DeleteLibModal(id){
  $.get('{{url("/")}}/super/deletelib/'+id,function(dataHTML){
    $('#modalTitle').html("<h4>Delete the Librarian</h4>");
    $('#modalBody').html(dataHTML);
    $('#modalFooter').html("<button type='button' data-dismiss='modal' class='btn btn-danger pull-left'>Cancel</button>\
            <button onclick=\"deleteLib()\" class='btn btn-primary pull-right'>Delete</button></form>")
  });

  $('#def-modal').modal('show');
}

function deleteLib(){
    document.getElementById('deleteLibButton').click();
}

</script>
@endsection