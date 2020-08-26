<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="container" style="color:white;">
        <div class="fit-banner text-center">
            <img src="{{ $message->embed(public_path('storage/assets/images/spss-banner.png')) }}">
        </div>
        @yield('mail-content')
    </div>
</body>
</html>