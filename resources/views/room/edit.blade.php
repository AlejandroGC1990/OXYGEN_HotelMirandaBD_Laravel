<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Create</title>
</head>
<body>
    <h1>Room Create</h1>

    <form method="POST" action="{{route('room.update', ['room' => $room->id]) }}">
    @csrf
    @method('put') 

    <select name="room_type">
            <option value="Normal" {{ old('room_type', $room->room_type ?? '') === 'Normal' ? 'selected' : '' }}>Normal</option>
            <option value="Deluxe A" {{ old('room_type', $room->room_type ?? '') === 'Deluxe A' ? 'selected' : '' }}>Deluxe A</option>
            <option value="Deluxe B" {{ old('room_type', $room->room_type ?? '') === 'Deluxe B' ? 'selected' : '' }}>Deluxe B</option>
            <option value="Deluxe C" {{ old('room_type', $room->room_type ?? '') === 'Deluxe C' ? 'selected' : '' }}>Deluxe C</option>
            <option value="Duplex" {{ old('room_type', $room->room_type ?? '') === 'Duplex' ? 'selected' : '' }}>Duplex</option>
            <option value="Suite" {{ old('room_type', $room->room_type ?? '') === 'Suite' ? 'selected' : '' }}>Suite</option>
        </select>
    <br/>
    <br/>
    <input name="number" type="number" placeholder="Introduce un numero" value="{{ old('number', $room->number ?? '') }}" requiered/>
    <br/>
    <br/>
    <select name="bed_type">
        <option value="Single Bed" {{ old('bed_type', $room->bed_type ?? '') === 'Single Bed' ? 'selected' : '' }}>Single Bed</option>
        <option value="Double Bed" {{ old('bed_type', $room->bed_type ?? '') === 'Double Bed' ? 'selected' : '' }}>Double Bed</option>
        <option value="Double Superior" {{ old('bed_type', $room->bed_type ?? '') === 'Double Superior' ? 'selected' : '' }}>Double Superior</option>
        <option value="Suite" {{ old('bed_type', $room->bed_type ?? '') === 'Suite' ? 'selected' : '' }}>Suite</option>
    </select>
    <br/>
    <br/>
    <select name="room_floor">
        <option value="A1" {{ old('room_floor', $room->room_floor ?? '') === 'A1' ? 'selected' : '' }}>A1</option>
        <option value="A2" {{ old('room_floor', $room->room_floor ?? '') === 'A2' ? 'selected' : '' }}>A2</option>
        <option value="A3" {{ old('room_floor', $room->room_floor ?? '') === 'A3' ? 'selected' : '' }}>A3</option>
        <option value="B1" {{ old('room_floor', $room->room_floor ?? '') === 'B1' ? 'selected' : '' }}>B1</option>
        <option value="B2" {{ old('room_floor', $room->room_floor ?? '') === 'B2' ? 'selected' : '' }}>B2</option>
        <option value="B3" {{ old('room_floor', $room->room_floor ?? '') === 'B3' ? 'selected' : '' }}>B3</option>
    </select>
    <br/>
    <br/>
    <select name="status">
        <option value="Available" {{ old('status', $room->status ?? '') === 'Available' ? 'selected' : '' }}>Available</option>
        <option value="Booked" {{ old('status', $room->status ?? '') === 'Booked' ? 'selected' : '' }}>Booked</option>
    </select>
    <br/>
    <br/>
    <input name="rate" type="number" placeholder="Introduce un numero" min=100 max=500 value="{{ old('rate', $room->rate ?? '') }}" requiered/>
    <br/>
    <br/>
    <input name="discount" type="number" placeholder="Introduce un numero" min=0 max=20 value="{{ old('discount', $room->discount ?? '') }}" requiered/>
    <br/>
    <br/>
    <button type="submit">AAAAAAAAAAAAAAA</button>
    </form>
    <hr>
    <a href="{{route('room.index')}}"><strong>Volver</strong></a>
</body>
</html>