<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')

    <div class="container mt-5 text-white">
    <h1>Wszystkie rezerwacje</h1>
    <table class="table bg-black text-white table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Użytkownik</th>
                <th>Data</th>
                <th>Godzina</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->time }}</td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-outline-info btn-lg ">Szczegóły</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @include('shared.footer')
</body>
</html>

