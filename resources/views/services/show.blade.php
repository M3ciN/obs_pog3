<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')

    <div class="container py-5 h-100">
        @if (session('error'))
        <div class="row d-flex justify-content-center">
            <div class="alert alert-danger">{{ session('error') }}</div>
        </div>
        @endif

        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-black text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Szczegóły usługi</h2>
                  <p class="text-white-50 mb-5">Są to szczegóły usługi {{$service->name}}</p>

                @if ($errors->any())
                  <div class="row d-flex justify-content-center">
                      <div class="col-12">
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                  </div>
                @endif



                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text">{{ $service->description }}</p>
                            <p class="card-text">Cena: {{ $service->price }} zł</p>
                            <p class="card-text">Kategoria: {{ $service->subcategory->category->name }}</p>
                            <p class="card-text">Podkategoria: {{ $service->subcategory->name }}</p>
                            <img src="{{ asset('storage/img/' . $service->image) }}" class="card-img-top" alt="Service Image">
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('shared.footer')
</body>

</html>
