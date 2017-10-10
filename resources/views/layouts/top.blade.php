<div class="top-panel">
    <span class="top-elements">
        <a href="{{url('/home')}}"><span class="fa fa-home"></span> Dashboard</a>
        <a href="{{url('addbook')}}"><span class='fa fa-plus'></span> Add Book</a>
        <a href="{{url('books')}}"><span class="fa fa-book"></span> Books List</a>
        <a href="{{url('borrows')}}"><span class="fa fa-share"></span> Borrow & Return</a>
        <!--<a href="{{url('settings')}}"><span class="fa fa-cog"></span> Settings</a> -->
        <!--<a href="{{url('borrowers')}}"><span class="fa fa-users"></span> Borrowers</a>-->
        <!--<a href="{{url('contact_us')}}"><span class="fa fa-phone"></span> Contact Us</a> -->
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
