<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Contact</title>
</head>
<body>
<h1><strong>Create Contact</strong></h1>

<form method="post" action="{{ route ('contact.store') }}">
@csrf
@method('post')
    <input name="name" type="text" placeholder="Escribe tu nombre" maxlength="100" required/>
    <br>
    <br>
    <input name="phone" type="text" inputmode="numeric" placeholder="Escribe su numero" maxlength="15" required/>
    <br>
    <br>
    <input name="email" type="email" placeholder="Introduce tu email" maxlength="100" required/>
    <br>
    <br>
    <input name="subject" type="text" placeholder="Escriba su asunto" maxlength="100" required/>
    <br>
    <br>
    <input name="text" type="text" placeholder="Texto explicativo....." maxlength="120" required/>
    <br>
    <br>
    <button type="submit">Crear</button>
</form>

<hr>
<a href="{{ route('contact.index') }}">Volver al Index</a>

</body>
</html>