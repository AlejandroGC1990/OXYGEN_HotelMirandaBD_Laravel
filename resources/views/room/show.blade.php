<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Room</title>
</head>
<body>
<h1><strong>Show Room</strong></h1>

<hr></hr>
    <p><strong> Tipo: </strong> {{$room->room_type}} </p>
    <p><strong> Tipo: </strong> {{$room->number}} </p>
    <p><strong> Tipo: </strong> {{$room->bed_type}} </p>
    <p><strong> Tipo: </strong> {{$room->room_floor}} </p>
    <p><strong> Tipo: </strong> {{$room->status}} </p>
    <p><strong> Tipo: </strong> {{$room->rate}} </p>
    <p><strong> Tipo: </strong> {{$room->discount}} </p>
    <p><strong> Tipo: </strong> {{$room->facilities}} </p>

    <a href="{{route('room.index')}}">Volver al listado de Rooms</a>
    <br/>
    <br/>
    <a href="{{route('room.edit', $room->id)}}">Edit Room</a>
    <br/>
    <br/>
    <form action="{{ route('room.destroy', $room->id)}}" method="POST">
        @csrf   
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Esta seguro de eliminar')">Borrar</button>
    </form>
</body>
</html>