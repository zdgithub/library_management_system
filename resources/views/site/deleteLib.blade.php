<form action="{{url('super/deletelib')}}" method="POST">
  <label>Are you Sure you want to delete the librarian? </label>

  <input type="hidden" name="id" value="{{$id}}">
  <input type='hidden' name='_token' value="{{\Session::token()}}">
  <input type='submit' id='deleteLibButton' style="display:none" >
