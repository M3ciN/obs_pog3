<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg">
    @include('shared.nav')
    <div class="container mt-5 text-white">
        <h1>Użytkownicy:</h1>

        <table class="table bg-black text-white table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imię</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                    <!-- Dodaj inne pola, które chcesz wyświetlić -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info px-3">Edytuj</a></td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger px-3" onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">Usuń</button>
                            </form>
                        </td>
                        <!-- Dodaj inne pola, które chcesz wyświetlić -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('users.create') }}" class="btn btn-outline-success btn-lg px-3">Dodaj użytkownika</a>
    </div>
    @include('shared.footer')
</body>

</html>
