<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Category;

class ReservationController extends Controller
{
    public function create()
    {
        $services = Service::all();
        $categories = Category::all();
        return view('reservation.create', compact('services', 'categories'));
    }

    public function store(Request $request)
    {
        // Walidacja danych
        $validatedData = $request->validate([
            'phone_number' => 'required',
            'address' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);



        // Pobierz zalogowanego użytkownika
        $userId = Auth::id();

        // Zapisz rezerwację w bazie danych
        // Przykładowy kod zapisu:
        $reservation = new Reservation();
        $reservation->user_id = $userId;
        $reservation->phone_number = $validatedData['phone_number'];
        $reservation->address = $validatedData['address'];
        $reservation->date = $validatedData['date'];
        $reservation->time = $validatedData['time'];
        $reservation->total_price = $request->input('total_price');
        $reservation->pay_form = $request->input('pay_form');
        $reservation->save();



        // Przypisanie usług do rezerwacji
        $reservation->services()->attach($validatedData['services']);

        // Przekierowanie po zapisaniu rezerwacji
        return redirect()->route('obs_pog.index')->with('success', 'Rezerwacja została zapisana. Dziękujemy!');
    }

    public function index()
    {
        $user = Auth::user();
        $reservations = $user->reservations()->with('services')->get();

        return view('reservation.index', compact('reservations'));
    }

    public function indexa()
    {
        $reservations = Reservation::with('user')->get();

        return view('reservation.indexa', compact('reservations'));
    }

    public function preview(Request $request)
    {
        // Pobierz wszystkie dane z żądania
        $data = $request->all();

        $validatedData = $request->validate([
            'phone_number' => 'required',
            'address' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);

        $date = $request->input('date');
        $time = $request->input('time');

            // Sprawdź, czy istnieje już rezerwacja o danej dacie i godzinie
    $existingReservation = Reservation::where('date', $date)
    ->where('time', $time)
    ->first();

    if ($existingReservation) {
        return redirect()->back()->with('error', 'Ta data i godzina są już zajęte. Wybierz inną.');
    }

        return redirect()->route('reservation.summary')->withInput($data);
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation.show', compact('reservation'));
    }

    public function destroy($id)
    {
        // Kod do usuwania rezerwacji o podanym $id


        // Przykład:
        $reservation = Reservation::findOrFail($id);
        $reservation->services()->detach();
        $reservation->delete();

        // Możesz dodać dodatkową logikę lub przekierowanie po usunięciu rezerwacji

        return redirect()->back()->with('success', 'Rezerwacja została usunięta.');
    }
}
