<form action="{{route ('booking.update', ['booking' => $booking->id])}}" method="post" enctype="multipart/form-booking">
    @csrf
    @method('put')

    <label for="guest">Guest:</label>
    <input name="guest" type="text" placeholder="Guest Name" value="{{ old('guest', $booking->guest ?? '') }}" required />
    <br/><br/>

    <label for="picture">Picture</label>
    <input name="picture" type="file" placeholder="Upload Picture" value="{{ old('picture', $booking->picture ?? '') }}" />
    <br/><br/>

    <label for="check_in">Check-In Date:</label>
    <input name="check_in" type="date" value="{{ old('check_in', $booking->check_in ?? '') }}" required />
    <br/><br/>

    <label for="check_out">Check-Out Date:</label>
    <input name="check_out" type="date" value="{{ old('check_out', $booking->check_out ?? '') }}" required />
    <br/><br/>

    <label for="discount">Discount (%):</label>
    <input name="discount" type="number" step="0.01" min="0" max="100" placeholder="Discount" value="{{ old('discount', $booking->discount ?? '') }}" required />
    <br/><br/>

    <label for="notes">Notes:</label>
    <textarea name="notes" placeholder="Add notes" rows="4">{{ old('notes', $booking->notes ?? '') }}</textarea>
    <br/><br/>

    <label for="room_id">Room:</label>
    <select name="room_id" required>
        <option value="">Select Room</option>
        @foreach($rooms as $room)
            <option value="{{ $room->id }}" {{ (old('room_id', $booking->room_id ?? '') == $room->id) ? 'selected' : '' }}>
                {{ $room->type . $room->number }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <label for="status">Status:</label>
    <select name="status" required>
        @foreach(['Booked','Pending','Refund','Cancelled'] as $status)
            <option value="{{ $status }}" {{ (old('status', $booking->status ?? '') == $status) ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <button type="submit">Enviar</button>
</form>