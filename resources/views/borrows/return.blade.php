<div class="modal-header">
  <span class="close" data-dismiss="modal">&times;</span>
  <h3>Return a Book</h3>
</div>
<form class="form" action="{{url('/')}}/return" method="POST" onkeydown=" if (event.keyCode == 13) {
     return false;}">

<div class="modal-body">
  <label>Book's Barcode:</label>
  <input class='form-control' name='barcode'>

</div>
<div class="modal-footer">
<input type="hidden" name="_token" value="{{\Session::token()}}" />
<button class="btn btn-danger form-control">Return</button>
</div>
</form>
