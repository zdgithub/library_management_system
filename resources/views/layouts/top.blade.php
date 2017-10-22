<div class="top-panel">
    <span class="top-elements">
    @if(Auth::user()->role == 1)
        <a href="{{url('/home')}}"><span class="fa fa-home"></span> Dashboard</a>
        <a href="{{url('addbook')}}"><span class='fa fa-plus'></span> Add Book</a>
        <a href="{{url('books')}}"><span class="fa fa-book"></span> Books List</a>
        <a href="{{url('borrows')}}"><span class="fa fa-share"></span> Borrow & Return</a>
    @elseif(Auth::user()->role == 2)
        <a href="{{url('/home')}}"><span class="fa fa-home"></span> Dashboard</a>
        <a href="{{url('/super/permission')}}"><span class="fa fa-cog"></span> Set Permission</a>
        <a href="{{url('/super/lib')}}"><span class="fa fa-users"></span> Delete Librarians</a>
        <a href="{{url('/super/user')}}"><span class="fa fa-users"></span> Delete Users</a>
    @else
        <p style='font-size:20px'>You have registered as a librarian , but the super administrator hasn't set access permission for you.</p>
        <p style='font-size:18px'>Please contact the super administrator!</p>
    @endif
    </span>
</div>


<style>
.top-panel{
    padding:0;
    margin: 0;
    background-color: #ffffff;
    padding:20px;
    border:1px solid #eee;
    border-bottom:1px solid #ddd;
}

.top-elements a{
    padding:20px;
    font-size:15px;
    color:#444;
}

.top-elements a:hover{
    background-color:#eee;
    text-decoration: none;
    padding-left:23px;
}
</style>
