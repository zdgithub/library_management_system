@extends('layouts.reader')

@section('title',$book->name)

@section('content')
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
            <label>Available Copies: </label> {{$book->copies_available()}}<br />
            <label>Total Copies: </label> {{$book->total_num}}<br>
            <br>
          </div>
          <div class='col-md-5'>
            <div>
              <img src="{{ url('/getImage/'.$book->id) }}" width="100%"/>
            </div>
          </div>
      </div>
      <br>
    </div>

</div>
</div>

<div class="col-sm-6">
<div class="panel">
    <div class="panel-heading">
        <h4>
          <span class="fa fa-check-circle"></span> All Copies
        </h4>
    </div>
    <div class="panel-body">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>Id</th>
            <th>Status</th>
          </tr>
        @foreach($bookItems as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>
            @if ($item->state === 0)
            <div class="label label-default">{{$item->status()}}</div>
            @else
            <div class="label label-success">{{$item->status()}}</div>
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

</script>
@endsection
