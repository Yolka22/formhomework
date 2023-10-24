<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        @isset($reviews)
            <li>Кількість відгуків: {{ $reviews->count() }}</li>
            <li>Середня оцінка: {{ $reviews->avg('rate') }}</li>
        @endisset
    </ul>
    
    
    <a href="/reviews">reviews</a>
    <a href="/zooform">zooform</a>
    <a href="/home/stat">stat</a>
    <a href="/">home</a>
</body>
</html>