<!doctype html>
<html lang="en">
  @include('shared.header')
  <body background="img/tlo.jpg" style="background-attachment: fixed">
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-sm navbar-dark" id="neubar">
        <div class="container">
          <a class="navbar-brand" href="/"><img src="/img/mup_logo.png" height="60" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
                <a class="nav-link mx-2 active" aria-current="page" href="/">Główna</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#services">Usługi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#contact">Kontakt</a>
              </li>

              @can('is-admin')
              <li class="nav-item">

                <li class="nav-item dropdown">
                    <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Panel administratora
                    </a>
                    <ul class="dropdown-menu bg-black" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item text-white bg-black" href="{{ route('users.index') }}">Użytkownicy</a></li>
                        <li><a class="dropdown-item text-white bg-black" href="{{ route('services.index') }}">Usługi</a></li>
                        <li><a class="dropdown-item text-white bg-black" href="{{ route('messages.index') }}">Wiadomości</a></li>
                        <li><a class="dropdown-item text-white bg-black" href="{{ route('reservations.indexa') }}">Rezerwacje</a></li>
                    </ul>
                  </li>
                  @endcan

              <li class="nav-item">
                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Konto
                    </a>
                    <ul class="dropdown-menu bg-black" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item text-white bg-black" href="{{ route('reservation.create') }}">Utwórz rezerwacje</a></li>
                      <li><a class="dropdown-item text-white bg-black" href="{{ route('reservations.index') }}">Moje rezerwacje</a></li>
                      <li><a class="dropdown-item text-white bg-black" href="{{ route('profil.show') }}">Moje dane</a></li>
                      <li><a class="dropdown-item text-white bg-black" href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się...</a></li>
                    </ul>
                  </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
                    </li>
                @endif
            </li>
            </ul>
          </div>
        </div>
      </nav>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
      <!-- Carousel -->
      <div class="carusel">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/obsluga.jpg" class="d-block w-100" alt="obsluga">
            <div class="carousel-caption d-none d-md-block">
              <h5>Pełen profesjonalizm</h5>
              <p>Nasi wykwalifikowani pracownicy posiadają bogate doświadczenie w organizacji pogrzebów. Zapewnimy Ci kompleksową opiekę, dbając o każdy aspekt ceremonii.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/trumny.jpg" class="d-block w-100" alt="trumny">
            <div class="carousel-caption d-none d-md-block">
              <h5>Współczucie i wsparcie</h5>
              <p>Wiemy, jak trudny jest czas straty i żałoby. Nasz zespół jest tutaj, aby Ci pomóc i służyć wsparciem na każdym etapie organizacji pogrzebu.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/wiazanki.jpg" class="d-block w-100" alt="wiazanki">
            <div class="carousel-caption d-none d-md-block">
              <h5>Indywidualne podejście</h5>
              <p>Rozumiemy, że każda ceremonia pogrzebowa jest wyjątkowa. Dlatego nasza obsługa jest całkowicie spersonalizowana, dostosowana do Twoich potrzeb i życzeń.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div><br><br><br>

    {{-- Services --}}
    <div class="container mt-8 text-white col-md-8 justify-content-center" id="services">
        <div id="wycieczki" class="container mb-4">
            <div class="row">
                <h1>Usługi</h1>
            </div>
            <div class="form-group mb-3 d-flex">
                <a href="{{ route('services.indexa') }}" class="btn btn-outline-light btn-lg px-5" type="submit">Więcej usług...</a>
            </div>
            <br>
            <div class="row">
                @foreach ($services as $service)
                    <div class="services col-12 col-sm-6 col-lg-3">
                        <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                            <img src="{{asset('storage/img/' . $service->image) }}" class="card-img-top" alt="Service Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->name }}</h5>
                                {{-- <p class="card-text">{{ $service->description }}</p> --}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-bg-dark">{{ $service->subcategory->category->name }}</li>
                                <li class="list-group-item text-bg-dark">{{ $service->subcategory->name }}</li>
                                <li class="list-group-item text-bg-dark">Cena: {{ $service->price }} zł</li>
                            </ul>
                              <div class="card-body">
                                <a href="{{ route('services.show', $service->id) }}" class="btn btn-outline-light">szczegóły...</a>
                              </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><br><br><br>

  <!-- Contact -->

    <div class="container col-sm-12 col-md-6 text-white" id="contact">
        <h1>Kontakt</h1>
        <form method="POST" action="{{ route('contact.submit') }}">
            @csrf

            <div class="form-group mt-2 mb-3">
                <label for="name">Imię:</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group mt-2 mb-3">
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="form-control" id="eamil"
                    placeholder="name@example.com">
            </div>
            <div class="form-group mb-3">
                <label for="message">Wiadomość:</label>
                <textarea class="form-control" name="message" id="message" rows="5"></textarea>
            </div>
            <div class="form-group mb-3 d-flex justify-content-center">
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Wyślij</button>
            </div>
        </form>
        </div><br><br><br>
    </div>
  @include('shared.footer')
  </body>
</html>
