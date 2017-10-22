@extends('layouts.app')

@section('title',$book->name)

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
<div class="col-sm-6">
<div class="panel">
    <div class="panel-heading">
        <h4><span class="fa fa-info-circle"></span> Book's Information</h4>
    </div>
    <div class="panel-body">
        <div class='row'>
          <div class='col-md-7'>
            <label>ISBN: </label> {{ $book->isbn }}<br>
            <label>Book Name: </label> {{$book->name}}<br>
            <label>Author Name: </label> {{$book->author}}<br>
            <label>Price: </label> ￥: {{$book->price}}<br>
            <label>Publisher: </label> {{$book->publisher}}<br>
            <label>Location: </label> {{$book->location}}<br>
            <label>Available Copies: </label> {{$book->copies_available()}}<br />
            <label>Total Copies: </label> {{$book->total_num}}<br>
            <br>
          </div>
          <div class='col-md-5'>
            <div>
              <img src="{{ url('/getImage/'.$book->id) }}" width="100%"/>
            </div>
            <br>
            <form method="post" enctype="multipart/form-data" action="{{ url('/upload') }}">
                  {{ csrf_field() }}
                <input type='hidden' name='book_id' value="{{$book->id}}">

                <input type="file" id='pic' name="picture" class='form-control' accept="image/gif, image/jpeg, image/png">
              <button type="submit" class='btn btn-success form-control' style='margin-top:5px'>Upload</button>
            </form>
          </div>
        </div>
        <br>
        <div class="row">
            <div class='col-md-3' pull-left>
            <a href='#' onclick ="showBookInfo({{$book->id}})" class=" form-control btn btn-primary"><span class="fa fa-edit"></span> Edit</a>
            </div>
            <div class='col-md-3 pull-right'>
            <a href='#' onclick ="deleteModal({{$book->id}})" class=" form-control btn btn-danger"><span class="fa fa-trash"></span> Delete</a>
            </div>
        </div>
    </div>

</div>
</div>

<div class="col-sm-6">
<div class="panel">
    <div class="panel-heading">
        <h4>
          <span class="fa fa-check-circle"></span> All Copies
          <button onclick="addCopy({{$book->id}})" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Add</button>
        </h4>
    </div>
    <div class="panel-body">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>Barcode</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        @foreach($bookItems as $item)
          <tr>
            <td>{{ $item->barcode }}</td>
            <td>
                @if ($item->state === 0)
                <div class="label label-default">{{$item->status()}}</div>
                @else
                <div class="label label-success">{{$item->status()}}</div>
                @endif
            </td>
            <td>
                @if ($item->state === 1)
                <button type='button' class="btn btn-danger" onclick ="deleteCopyModal({{$item->id}})"> Delete
                </button>
                @else
                <button type='button' class="btn btn-default" disabled="disabled" onclick ="deleteCopyModal({{$item->id}})"> Delete
                </button>
                @endif
            </td>
          </tr>
        @endforeach
      </tbody>
      </table>
    </div>
</div>
</div>

<script>
function addCopy(id){
    $.get("{{url('/')}}/addcopy/"+id,function(data){
        $('#def-modal-content').html(data);
    });
    $('#def-modal').modal('show');
}

// function deleteCopy(id){
//     $.ajax({
//             url: "{{url('/')}}/deletecopy/"+id,
//             method: "POST",
//             data: {_token:"{{Session::token()}}"},
//     }).fail((data) => {
//         console.log(data);
//     }).done((data) => {
//         $('#copymodal').hide();
//         location.reload();
//     });
// }

function deleteCopyModal(id){
    $.get('{{url("/")}}/deletecopy/'+id,function(dataHTML){
    $('#modalTitle').html("<h4>Delete the Book Copy</h4>");
    $('#modalBody').html(dataHTML);
    $('#modalFooter').html("<button type='button' data-dismiss='modal' class='btn btn-danger pull-left'>Cancel</button>\
            <button onclick=\"deleteCopyInfo()\" class='btn btn-primary pull-right'>Delete</button></form>")
    });

    $('#def-modal').modal('show');
}

function deleteCopyInfo(){
    document.getElementById('deleteCopyButton').click();
}

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

function deleteModal(id){
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

$(function(){
    $(".input-fileup").on("change","input[type='file']",function(){
        var filePath=$(this).val();
        if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1){
            $(".fileerrorTip1").html("").hide();
            var arr=filePath.split('\\');
            var fileName=arr[arr.length-1];
            $(".showFileName1").html(fileName);
        }else{
            $(".showFileName1").html("");
            $(".fileerrorTip1").html("You haven't uploaded the file or the file type you uploaded is wrong！").show();
            return false
        }
    })
})

</script>
@endsection
