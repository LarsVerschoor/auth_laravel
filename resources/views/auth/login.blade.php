<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/auth.css">
    <title>Log in</title>
</head>
<body>

<main>

@if(session()->has('success'))
    <div class="notification success">{{ session()->get('success') }}</div>
@endif
@if(session()->has('error'))
    <div class="notification fail">{{ session()->get('error') }}</div>
@endif

    <div class="auth-container">
        <h2>Log in</h2>
        <form action="{{ route('login.post') }}" method="post">
            @csrf
            <div class="form-row">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}">
                @if ($errors->has('username'))
                    <span class="error">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-row">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-row">
                <input type="submit" name="submit" value="Log in">
            </div>
        </form>
        <div>Or <a href="{{ route('register.post') }}">register</a> to create an account.</div>
    </div>
</main>

</body>
</html>
