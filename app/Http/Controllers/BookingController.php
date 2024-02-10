<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CreditCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function createAnonymous(Request $request)
    {
        $data = json_decode($request->getContent());

        $creditCard = CreditCard::create([
            'number' => $data->card->number,
            'cvc' => $data->card->cvc,
            'expires' => $data->card->expireDate,
        ]);

        Booking::create([
            'name' => $data->name,
            'surname' => $data->surname,
            'email' => $data->email,
            'day' => $data->date,
            'hour' => $data->hour,
            'allergies' => $data->allergies,
            'phone' => $data->phone,
            'credit_card_id' => $creditCard->id,
            'commensals' => $data->commensals
        ]);


        return response()->json(['response' => 'Booking created successfully'], 200);
    }

    public function createAuthenticated(Request $request)
    {
        $user = Auth::user();
        $data = json_decode($request->getContent());

        $creditCard = CreditCard::where('number', $data->card->number)->first();

        if (!$creditCard) {
            $creditCard = CreditCard::create([
                'number' => $data->card->number,
                'cvc' => $data->card->cvc,
                'expires' => $data->card->expireDate,
                'user_id' => $data->keepCard ? $user->id : null
            ]);
        }

        Booking::create([
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'day' => $data->date,
            'hour' => $data->hour,
            'allergies' => $data->allergies,
            'phone' => $user->phone,
            'user_id' => $user->id,
            'credit_card_id' => $creditCard->id,
            'commensals' => $data->commensals
        ]);

        return response()->json(['response' => 'Booking created successfully'], 200);
    }

    public function deleteAuthenticated(Request $request)
    {
        $booking_id = $request->input('id');
        $booking = Booking::where('id', $booking_id)->first();

        $booking->delete();
        return response()->json(['response' => 'Booking deleted successfully'], 200);
    }

    public function getUnavailableDates()
    {
        $unavailableDates = Booking::select('day')
            ->groupBy('day')
            ->havingRaw('COUNT(*) >= 8')
            ->get()
            ->pluck('day');

        return response()->json($unavailableDates, 200);
    }
    public function getUnavailableHoursOnDate(Request $request)
    {
        $unavailableHours = Booking::select('hour')->where('day', $request->date)->get()->pluck('hour');

        return response()->json($unavailableHours, 200);
    }
}
