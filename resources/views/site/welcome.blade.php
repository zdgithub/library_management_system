<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/jquery/jquery-ui.min.css')}}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #20B2AA;
            }

            .links > a {
                padding: 0 25px;
                font-size: 12px;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            ::-webkit-input-placeholder {
              color: black;
              font-size: 20px;
            }

            th { text-align: center; }

        </style>

        <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/jquery/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                     Welcome to our library!
                </div>
                <div class='row'>
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading" style="height:50px;">
                            <input class="col-sm-7 form-control" type="textbox" placeholder="Search book's name.." style='border:2px    #778899 solid' id="search"/>
                        </div>
                    </div>
                </div>
                <div class="search_table">
                    <table class="table table-bordered table-hover" id='searchTable'>
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Available Copies</th>
                            <th>Total Copies</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class='notfd'></div>
              </div>
            </div>
        </div>
      <!--载入打包后的js
      <script src="js/app.js"></script>-->
      <script>
        $('.search_table').hide();
        $('#search').on('keyup',function(event){
            $value = $(this).val();
            if($value == ''){
                $('.search_table').hide();
            }
            if(event.keyCode == 13){
              $.ajax({
                type:'get',
                url : '{{url("/")}}/search/books/byName',
                data: {'name':$value},
                success: function(data){
                  if(data == ''){
                    $('.search_table').hide();
                    $('.notfd').show();
                    $('.notfd').html('<p style="font-size: 25px">Nothing Found</p>');
                  }else{
                    $('.search_table').show();
                    $('#searchTable tbody').html(data);
                  }
                }
              });
            }else{
              $('.notfd').hide();
            }
        });
      </script>
    </body>
</html>
