<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}" />

    <title>Crescent Sun</title>
</head>

<body>
    <div class="registration-form">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div >
                <img src="{{URL::asset('image/Logo.png')}}" alt="" class="logo">
            </div>
            @error('error')
                <spam class="text-danger">{{ $message }}</spam>
            @enderror

            <div>
                <h3 class="MainTitle">Login</h3>
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control item" id="username" placeholder="Username">
                @error('name')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" id="email" placeholder="Email">
                @error('email')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name='password' id="password" placeholder="Password">
                @error('password')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Login</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
    </script>
</body>


</html>
