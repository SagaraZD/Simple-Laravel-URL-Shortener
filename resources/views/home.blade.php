
@include('header')

    <body>
        <div class="container">
            <div class="content">
                <h1> Please Enter Your URL</h1>

                <!-- Errors -->
                @if(count($errors) > 0)
                <div class="col-md-12 alert alert-danger fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $error)
                   <p> {{$error}} </p>
                    @endforeach
                </div>
                @endif


           <!--  Other Messages -->
            @if(Session::has('message'))
            <div class="col-md-12 alert alert-info fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{Session::get('message') }}
            </div>
            @endif
            
            


            <!-- Main Form -->
            <form action="{{route('make')}}" method="POST">
                    <input type="url" name="url" class="form-control main-inputs" placeholder="Enter a URL" autocomplete="off" value="{{ old('url') }}" required>
                    <button type="submit" class="btn btn-primary main-button">Shorten</button>
                    <div class="clearfix"></div>
                     {{ csrf_field() }}
            </form>


            <!-- Short link notification -->
            @if(Session::has('code'))
            <div class="code">
            <div class="alert alert-info">
             <h3> All done. Here is your Short URL </h3>
             <a href="{{route('get', ['code'=>Session::get('code') ]) }}" target="_blank"> {{ url('/') }}/{{Session::get('code') }} </a>
             </div>
             </div>
              @if (Auth::check())
              <br/>
              <br/>
              <div class="detials">

                <a href="{{route('details', ['code'=>Session::get('code') ]) }}"> Click Here to View Short link Details </a>
              </div>
              @else
               Please <a href="{{route('register')}}">Register</a> Or <a href="{{route('register')}}"> Sign  in </a> For more details
              @endif
      
            @endif


            </div>
        </div>
    </body>
</html>
