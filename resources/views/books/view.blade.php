@extends('layouts.app')

@section('title',$book->name)

@section('content')
<br>
<div class="col-sm-6">
<div class="panel">
    <div class="panel-heading">
        <h4><span class="fa fa-info-circle"></span> Book's Information</h4>
    </div>
    <div class="panel-body">
        <label>Book Title: </label> {{$book->name}}<br>
        <label>Author Name: </label> {{$book->author}}<br>
        <label>Price: </label> ￥：{{$book->price}}<br>
        <label>Number Of Copies: </label> {{$book->number_of_copies}}<br>
        <label>Available Copies: </label> {{$book->copies_available()}}<br />
        <label>Total Number Of Borrows: </label> 0<br>
        <br>
        <div class="row">
            <div class='col-md-3' pull-left>
            <a href='#' onclick ="showBookInfo({{$book->id}})" class=" form-control btn btn-primary"><span class="fa fa-edit"></span> Edit</a>
            </div>
            <div class='col-md-3 pull-right'>
            <a href='#' onclick ="deleteModal({{$book->id}},'books')" class=" form-control btn btn-danger"><span class="fa fa-trash"></span> Delete</a>
            </div>
        </div>
    </div>

</div>
</div>

<div class="col-sm-6">
<div class="panel">
    <div class="panel-heading">
        <h4><span class="fa fa-check-circle"></span> Recent Borrows</h4>
    </div>
    <div class="panel-body">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>Borrower Name</th>
            <th>Issued Date</th>
            <th>Status</th>
          </tr>
        <!--@foreach($borrows as $borrow_event)
          <tr>
            <td>{{$borrow_event->borrowers['name']}}</td>
            <td>{{substr($borrow_event->created_at,0,10)}}</td>
            <td><div class="label label-danger">{{$borrow_event->status()}}</div></td>
          </tr>
        @endforeach -->

      </tbody>
      </table>
    </div>
</div>
</div>
<script>
function showBookInfo(id){
    $.get("{{url('/')}}/book/edit/"+id,function(dataHTML){
        $('#modalTitle').html("<h4>Book's Information</h4>");
        $('#modalBody').html(dataHTML);
        $('#modalFooter').html("<button type='button' data-dismiss='modal' class='btn btn-danger pull-left'>Cancel</button>\
            <button onclick=\"editBookInfo()\" class='btn btn-primary pull-right'>Save</button></form>")
    });
    $('#def-modal').modal("show");
}

function editBookInfo(){
    document.getElementById('editButton').click();
}

function deleteModal(id,item){
  $.get('{{url("/")}}/book/delete/'+id,function(dataHTML){
    $('#modalTitle').html("<h4>Delete the Book</h4>");
    $('#modalBody').html(dataHTML);
    $('#modalFooter').html("<button type='button' data-dismiss='modal' class='btn btn-danger pull-left'>Cancel</button>\
            <button onclick=\"deleteBookInfo()\" class='btn btn-primary pull-right'>Delete</button></form>")
  });

  $('#def-modal').modal('show');
}

function deleteBookInfo(){
    document.getElementById('deleteButton').click();
}
</script>
@endsection
