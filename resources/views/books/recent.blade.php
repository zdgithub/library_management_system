<table class="table table-striped table-bordered" cellspacing="0" width="100%" id='booklist'>
    <thead>
        <tr>
            <th>ISBN</th>
            <th>Name</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Price</th>
            <th>Available/Total Number</th>
            <th>Copies Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $b)
        <tr>
            <td>{{$b->isbn}}</td>
            <td><a href="{{url('/')}}/book/{{$b->id}}">{{$b->name}}</a></td>
            <td>{{ $b->author }}</td>
            <td>{{ $b->publisher }}</td>
            <td>{{ $b->price }}</td>
            <td>{{ $b->copies_available()}}/{{ $b->total_num }}</td>
            <td>
              <a href="{{url('/')}}/book/{{$b->id}}"><i class='fa fa-angle-double-right'></i> All Copies</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

