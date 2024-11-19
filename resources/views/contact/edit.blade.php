<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
</head>
<body>
<h1><strong>Edit Contact</strong></h1>

<form method="POST" action="{{ route ('contact.update', ['contact' => $contact->id]) }}">
@csrf
@method('put')
    <input name="name" type="text" value="{{ old('name', $contact->name ?? '') }}" maxlength="100" required/>
    <br>
    <br>
    <input name="phone" type="text" inputmode="numeric" value="{{ old('phone', $contact->phone ?? '') }}" maxlength="15" required/>
    <br>
    <br>
    <input name="email" type="email" value="{{ old('email', $contact->email ?? '') }}" maxlength="100" required/>
    <br>
    <br>
    <input name="subject" type="text" value="{{ old('subject', $contact->subject ?? '') }}" maxlength="100" required/>
    <br>
    <br>
    <input name="text" type="text" value="{{ old('text', $contact->text ?? '') }}" maxlength="120" required/>
    <br>
    <br>
    <button type="submit">Editar</button>
</form>

<hr>
<a href="{{ route('contact.index') }}">Volver al Index</a>

</body>
</html>