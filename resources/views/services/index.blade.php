<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')
    <div class="container mt-5 text-white">
    <h1>LISTA USŁUG</h1>
    <table class="table bg-black text-white table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa usługi</th>
                <th>Opis</th>
                <th>Cena(zł)</th>
                <th>Kategoria</th>
                <th>Podkategoria</th>
                <th>Obraz</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->description }}</td>
                <td>{{ $service->price }}</td>
                <td>{{ $service->subcategory->category->id }}. {{ $service->subcategory->category->name }}</td>
                <td>{{ $service->subcategory->id }}. {{ $service->subcategory->name }}</td>
                <td>{{ $service->image }}</td>
                <td><a href="{{ route('services.edit', $service->id) }}" class="btn btn-outline-info px-3">Edytuj</a></td>
                <td>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger px-3" onclick="return confirm('Czy na pewno chcesz usunąć tą usługę?')">Usuń</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('services.create') }}" class="btn btn-outline-success btn-lg px-3">Dodaj usługę</a>
    </div><br><br><br><br>
    @include('shared.footer')
</body>

</html>
