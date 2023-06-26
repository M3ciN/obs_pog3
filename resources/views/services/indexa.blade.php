<!doctype html>
<html lang="en">

@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')
    <div class="container mt-8 text-white col-md-8 justify-content-center" id="services">
    <h1>LISTA USŁUG</h1>
    @foreach ($categories as $category)
        <div class="category">
            <ol><h2>{{ $category->name }}</h2></ol>
            @foreach ($category->subcategories as $subcategory)
                <div class="subcategory">
                    <ol><ol><h4>{{ $subcategory->name }}</h4></ol></ol>
                    <div class="row">
                    @foreach ($subcategory->services as $service)
                    <div class="services col-12 col-sm-6 col-lg-3">
                        <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                            <img src="{{asset('storage/img/' . $service->image) }}" class="card-img-top" alt="Service Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->name }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-bg-dark">Cena: {{ $service->price }} zł</li>
                            </ul>
                              <div class="card-body">
                                <a href="{{ route('services.show', $service->id) }}" class="btn btn-outline-light">szczegóły...</a>
                              </div>
                        </div>
                    </div>
                @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    </div>
    @include('shared.footer')
</body>

</html>
