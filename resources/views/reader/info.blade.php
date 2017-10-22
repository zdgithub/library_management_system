@extends('layouts.reader')

@section('title','Information')

@section('content')
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-3 settings-left">
      <h5 class="settings-left-element"><a href="#Borrow">Current Borrow</a></h5>
      <h5 class="settings-left-element"><a href="#history">Borrow History</a></h5>
    </div>
    <div class="col-sm-8" >
      <div class="panel" id="Borrow">
          <div class="panel-heading">
              <h3>Current Borrow</h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered" id='ptable'>
              <thead>
                <tr>
                  <th>Barcode</th>
                  <th>Book Name</th>
                  <th>Borrow Date</th>
                  <th>Receive Date</th>
                  <th>Status</th>
                  <th>Fine</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($current as $cur)
                <tr>
                  <td>{{ $cur->bookItem->barcode }}</td>
                  <td>{{ $cur->bookItem->book->name }}</td>
                  <td>{{ $cur->borrowDate() }}</td>
                  <td>{{ $cur->receiveDate() }}</td>
                  <td>{{ $cur->status() }}</td>
                  <td>{{ $cur->fine() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>

      <div class="panel" id="history">
          <div class="panel-heading">
              <h3>Borrow History</h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered" id='btable'>
              <thead>
                <tr>
                  <th>Barcode</th>
                  <th>Book Name</th>
                  <th>Borrow Date</th>
                  <th>Return Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($history as $his)
                <tr>
                  <td>{{ $his->bookItem->barcode }}</td>
                  <td>{{ $his->bookItem->book->name }}</td>
                  <td>{{ $his->borrowDate() }}</td>
                  <td>{{ $his->returnDate() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="panel-footer">
          </div>
      </div>
    </div>
  </div>
</div>

<style>
.settings-left{
  background-color: white;
}

.settings-left-element{
  padding:10px;
  cursor:pointer;
}

.settings-left-element:hover{
  background-color: #eee;
}
</style>

<script>
  //$('#ptable').dataTable();
</script>
@endsection
