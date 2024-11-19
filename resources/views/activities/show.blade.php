<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><strong>PAN PERO EN SHOW</strong></h1>
    <p><strong> Tipo: </strong> {{$activity->type}} </p>
    <p><strong> Fecha: </strong> {{$activity->datetime}} </p>
    <form action="{{ route('activities.destroy', $activity->id)}}" method="POST">
        @csrf   
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Esta seguro de eliminar')">Borrar</button>
        <a href="{{route('activities.edit', $activity->id)}}">Edit Activity</a>
    </form>
</body>
</html>