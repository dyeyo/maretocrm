<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  @foreach ($templateEmails as $item)
    <h1> {{$item->title}} {{ $contract['name'] }} </h1>
    <p> {{$item->firstText}} </p>
  @endforeach
  <p>{{ $contract['contract'] }}</p>
</body>
</html>
