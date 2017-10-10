<div class="top-panel">
    <span class="top-elements">
        <a href="{{url('/reader/dash')}}"><span class="fa fa-home"></span> Dashboard</a>
        <a href="{{url('/reader/list')}}"><span class="fa fa-book"></span> Books List</a>
        <a href="{{url('/reader/borrowinfo')}}"><span class="fa fa-cog"></span> Borrow Information</a>
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
