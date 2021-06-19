<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CVS</title>
</head>
<body>
  @include('layouts.nav')
    
    <div class="container">
      <h1>Login</h1>
      <form method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User name</label>
            <input placeholder="JaldinTheKiller" value="{{old('user')}}" class="form-control" type="text" name="user" id="user">
            @error('user')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input placeholder="password" class="form-control" type="password" name="password" id="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
              <label class="form-check-label" for="exampleCheck1">Recuerda mi sesion</label>
          </div>
          <button type="submit" class="btn btn-primary">send</button>
      </form>
    </div>

</body>
</html>