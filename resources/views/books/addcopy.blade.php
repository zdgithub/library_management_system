<div class="modal-header">
  <span class="close" data-dismiss="modal">&times;</span>
  <h3>Add Copies</h3>
</div>
<form class="form" action="{{url('/')}}/addcopy" method="POST">

<div class="modal-body">
  <label>Add Number of Copies:</label>
  <input class='form-control' name='num'>
</div>
<div class="modal-footer">
<input type='hidden' name='book_id' value="{{$book_id}}">
<input type="hidden" name="_token" value="{{\Session::token()}}" />
<button type='submit' class="btn btn-success form-control">Add</button>
</div>
</form>
