<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><strong>PAN</strong></h1>
    @foreach($activities as $activity)
    <p><strong> Tipo: </strong> {{$activity->type}} </p>
    <p><strong> Fecha: </strong> {{$activity->datetime}} </p>
    @endforeach
</body>
</html>