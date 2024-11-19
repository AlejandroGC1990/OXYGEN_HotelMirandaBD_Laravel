<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Show</title>
</head>
<body>
    <h1><strong>Contact Show</strong></h1>
    
   
    <p><strong>Nombre:</strong>{{$contact->name}}</p>
    <p><strong>Telefono:</strong>{{$contact->phone}}</p>
    <p><strong>Email:</strong>{{$contact->email}}</p>
    <p><strong>Asunto:</strong>{{$contact->subject}}</p>
    <p><strong>Mensaje:</strong>{{$contact->text}}</p>

    <hr>
<a href="{{route('contact.edit', $contact->id)}}">Editar Contact</a>
    <br>
    <br>
<form method="POST" action="{{route('contact.destroy', $contact->id)}}">
@csrf
@method('DELETE')
<button type="submit" onclick="return confirm('¿Esta seguro de eliminar')">Borrar</button>
</form>
    <br>
    <br>
<a href="{{ route('contact.index') }}">Volver al Index</a>
</body>
</html>