<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <title>{{ env('APP_NAME') }}</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <div id="app">
        <app></app>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://js.stripe.com/v3"></script>
</body>

</html>
