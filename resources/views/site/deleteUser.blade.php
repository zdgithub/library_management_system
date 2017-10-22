<form action="{{url('super/deleteuser')}}" method="POST">
  <label>Are you Sure you want to delete the user? </label>

  <input type="hidden" name="id" value="{{$id}}">
  <input type='hidden' name='_token' value="{{\Session::token()}}">
  <input type='submit' id='deleteUserButton' style="display:none" >
