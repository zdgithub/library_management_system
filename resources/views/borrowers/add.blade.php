<div>
    <form class="form" method="POST" action="{{route('borrowers.add')}}">

        <label>Borrower Name:</label>
        <input class="form-control" name="name" placeholder="Enter Borrower's Name"/><br>

        <label>Address:</label>
        <input class="form-control" name="address" placeholder="Borrowers's Address" /><br>

        <label>Contact Number:</label>
        <input class="form-control" name="contact_number" placeholder="Enter Contact Number" /><br>

        <label>Borrower's Name:</label>
        <select name="borrower_id" class="form-control">
          @foreach($borrowers as $borrower)
            <option value="{{$borrower->id}}">
              {{$borrower->name}}
            </option>
          @endforeach
        </select><br />

        <input type="hidden" name="_token" value="{{\Session::token()}}" />
        <button type="submit" class="form-control btn btn-primary"><span class="fa fa-plus"></span> Add</button>
    </form>
</div>
