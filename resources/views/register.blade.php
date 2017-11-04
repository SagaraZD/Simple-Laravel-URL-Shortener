@include('header')
  <div class="container">
            
    <div class="col-md-6 signupForm">
    <h2>Sign Up</h2>

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
            <div class="col-md-12 alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{Session::get('message') }}
            </div>
            @endif
    <form  role="form" action="{{route('signup')}}" method="post">

      <div class="form-group  {{$errors->has('FirstName') ? 'has-error' : '' }}">
        <label for="FirstName">First Name:</label>
        <input type="text" class="form-control" name="FirstName"  placeholder="" value="{{Request::old('FirstName')}}">
      </div>

      <div class="form-group  {{$errors->has('LastName') ? 'has-error' : '' }}">
        <label for="LastName">Last Name:</label>
        <input type="text" class="form-control" name="LastName"  placeholder=" " value="{{Request::old('FirstName')}}">
      </div>

      <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
        <label  for="email">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="" value="{{Request::old('email')}}">
      </div>

      <div class="form-group  {{$errors->has('password') ? 'has-error' : '' }}">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="" value="{{Request::old('password')}}">
      </div>

      <div class="form-group  {{$errors->has('password_confirmation') ? 'has-error' : '' }}">
        <label  for="password_confirmation">Repeat Password:</label>
        <input type="password" class="form-control" name="password_confirmation"placeholder="" value="{{Request::old('password_confirmation')}}">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </div>
      <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
  </div>
         

<div class="col-md-6 signIn">
    <h2>Sign In</h2>
    @if(Session::has('alert'))
    <div class="col-md-12 alert alert-danger fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{Session::get('alert') }}
    </div>
    @endif
    <form  role="form" action="{{route('signin')}}" method="post">
      <div class="form-group {{$errors->has('user_email') ? 'has-error' : '' }}">
        <label  for="email">Email:</label>
        <input type="email" class="form-control" name="user_email" id="email" placeholder="Enter email" value="{{Request::old('user_email')}}" required>
      </div>
      <div class="form-group {{$errors->has('user_password') ? 'has-error' : '' }}">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="user_password" id="password" placeholder="Enter password" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Sign In</button>
      </div>
      <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
  </div>

</div>
    </body>
</html>
