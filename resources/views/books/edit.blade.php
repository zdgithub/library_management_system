<form method="POST" action="{{route('book.edit')}}" >
  <label> ISBN: </label>
  <input type="textbox"  class="form-control" name="isbn" value="{{$book_info->isbn}}">
  <br>
  <label> Book's Name: </label>
  <input type="textbox"  class="form-control" name="name" value="{{$book_info->name}}">
  <br>
  <label> Author's Name: </label>
  <input type="textbox"  class="form-control" name="author" value="{{$book_info->author}}">
  <br>
  <label> Publisher: </label>
  <input type="textbox"  class="form-control" name="publisher" value="{{$book_info->publisher}}">
  <br>
  <label> Price: </label>
  <input type="textbox"  class="form-control" name="price" value="{{$book_info->price}}">
  <label> Location: </label>
  <input type="textbox"  class="form-control" name="location" value="{{$book_info->location}}">
  <br>
  <label> Total Copies: </label>
  <input type="textbox"  class="form-control" readonly name="total_num" value="{{$book_info->total_num}}">
  <br><label> Available Copies: </label>
  <input type="textbox"  class="form-control" readonly value="{{$book_info->copies_available()}}">
  <input type='hidden' name='id' value="{{$book_info->id}}">
  <input type='hidden' name='_token' value="{{\Session::token()}}">
  <input type='submit' id='editButton' style="display:none" >

