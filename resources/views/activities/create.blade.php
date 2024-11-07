<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{route('activities.store')}}">
        @csrf
        @method("post")
        <select name="type">
            <option value="surf">Surf</option>
            <option value="windsurf">windsurf</option>
            <option value="kayak">kayak</option>
            <option value="atv">atv</option>
            <option value="hot air ballon">hot air ballon</option>
        </select>
        <input name="datetime" type="date" placeholder="fecha"/>
        <input name="notes" type="text" placeholder="Note"/>
        <button type="submit">AAAAAAAAAAAAAAA</button>
    </form>

</body>
</html>