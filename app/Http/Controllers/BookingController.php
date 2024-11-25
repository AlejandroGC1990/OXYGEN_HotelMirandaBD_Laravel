<?php

namespace App\Http\Controllers;


use App\Mail\BookingEmail;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Contracts\PaymentProvider;

class BookingController extends Controller
{

    private function handlePayment(Booking $booking): string{
        $paymentProvider = app(PaymentProvider::class);
        $amount = 100*100;
        $productName = 'Room Booking';
        
        $data = [
            'amount' => $amount,
            'product_name' => $productName,
        ];
        
        return $paymentProvider->processPayment($data);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('booking.index',['bookings' => Booking::all()]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('booking.create',["rooms" => Room::all()]);
        
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        /* $request->validate([
            "guest" => ['required','string'],
            "check_in" => ['required','date'],
            "check_out" => ['required','date'],
            "discount" => ['required','numeric'],
            "notes" => ['required','string'],
            "status" => ['required','string'],
            "room_id" => ['required','numeric']
            ]);*/
            
            $booking = Booking::create([
                'guest' => $request->input('guest'),
                'picture' => $request->input('picture'),
                'order_date' => now(),
                'check_in' => $request->input('check_in'),
                'check_out' => $request->input('check_out'),
                'discount' => $request->input('discount'),
                'notes' => json_encode($request->input('notes')), 
                'status' => $request->input('status'),
                'room_id' => $request->input('room_id')
            ]);
            
            try {
                $paymentUrl = $this->handlePayment($booking);
            } catch (\Exception $e) {
                dd($e);
                return redirect()->back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
            }
            
            
            Mail::to('hello@example.com')->send(new BookingEmail(
            $request->input('guest'), 
            $request->input('room_id'), 
            $request->input('check_in'),
            $request->input('check_out'), 
            $request->input('discount')
        ));

        return redirect()->away($paymentUrl);
        
    }
    

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("booking.show",['booking' => Booking::findOrFail($id)]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('booking.edit',["booking" => Booking::findOrFail($id)],["rooms" => Room::all()] );
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $booking = Booking::findOrFail($id);

        $request->validate([
            "guest" => ['required','string'],
            "check_in" => ['required','date'],
            "check_out" =>['required','date'],
            "discount" => ['required','numeric'],
            "notes" => ['required','string'],
            "status" => ['required','string'],
            "room_id" => ['required','numeric']
        ]); 
        
        $booking->update([
            'guest' => $request->input('guest'),
            'picture' => $request->input('picture'),
            'order_date' => now(),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'discount' => $request->input('discount'),
            'notes' => json_encode($request->input('notes')), 
            'status' => $request->input('status'),
            'room_id' => $request->input('room_id')
        ]);
        
        return redirect()->route('booking.show',$booking->id)->with('success','Boooking Actualizada Correctamente.');
        
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return redirect()->route('booking.index')->with('success', 'Booking Borrada Correctamente');
    }
}