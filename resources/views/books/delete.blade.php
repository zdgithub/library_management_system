<form action="{{route('book.delete')}}" method="POST">
  <label>Are you Sure you want to delete this book? </label>
  <label>You can't delete the book successfully if any copy of it is borrowed.</label>

  <input type="hidden" name="id" value="{{$id}}">
  <input type='hidden' name='_token' value="{{\Session::token()}}">
  <input type='submit' id='deleteButton' style="display:none" >
