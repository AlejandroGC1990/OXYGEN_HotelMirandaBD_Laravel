<form action="{{route ('booking.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')

    <label for="guest">Guest:</label>
    <input name="guest" type="text" placeholder="Guest Name" required />
    <br/><br/>

    <label for="picture">Picture</label>
    <input name="picture" type="file" placeholder="Upload Picture" />
    <br/><br/>

    <label for="check_in">Check-In Date:</label>
    <input name="check_in" type="date" required />
    <br/><br/>

    <label for="check_out">Check-Out Date:</label>
    <input name="check_out" type="date" required />
    <br/><br/>

    <label for="discount">Discount (%):</label>
    <input name="discount" type="number" step="0.01" min="0" max="100" placeholder="Discount" required />
    <br/><br/>

    <label for="notes">Notes:</label>
    <textarea name="notes" placeholder="Add notes" rows="4"></textarea>
    <br/><br/>

    <label for="room_id">Room:</label>
    <select name="room_id" required>
        <option value="">Select Room</option>
        @foreach($rooms as $room)
            <option value="{{ $room->id }}">
                {{ $room->type . $room->number }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <label for="status">Status:</label>
    <select name="status" required>
        @foreach(['Booked','Pending','Refund','Cancelled'] as $status)
            <option value="{{ $status }}">
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
    <br/><br/>

    <button type="submit">Enviar</button>
</form>