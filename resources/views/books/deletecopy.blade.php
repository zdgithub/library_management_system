<form action="{{route('copy.delete')}}" method="POST">
  <label>Are you Sure you want to delete this copy? </label>

  <input type="hidden" name="id" value="{{$id}}">
  <input type='hidden' name='_token' value="{{\Session::token()}}">
  <input type='submit' id='deleteCopyButton' style="display:none" >
