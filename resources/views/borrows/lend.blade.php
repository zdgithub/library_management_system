<div class="modal-header">
  <span class="close" data-dismiss="modal">&times;</span>
  <h3>Lend A Book</h3>
</div>
<form class="form" action="{{url('/')}}/lend" method="POST">

<div class="modal-body">
  <label>Book's Barcode:</label>
  <input class='form-control' name='barcode'>
  <br />
  <label>Student Number:</label>
  <input class='form-control' name='scode'>

</div>
<div class="modal-footer">
<input type="hidden" name="_token" value="{{\Session::token()}}" />
<button class="btn btn-success form-control">Lend</button>
</div>
</form>
