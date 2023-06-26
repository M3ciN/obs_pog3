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

            <h2 class="fw-bold mb-2 ">Podsumowanie rezerwacji</h2>
            <p class="text-white-50 mb-5">Podsumowane dane rezerwacji usług</p>

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

          <p>Numer telefonu: {{ old('phone_number') }}</p>
          <p>Adres: {{ old('address') }}</p>
          <p>Data: {{ old('date') }}</p>
          <p>Godzina: {{ old('time') }}</p>

          <h3>Wybrane usługi:</h3>
          <ul>
              @foreach(old('services', []) as $serviceId)
                  @php
                      $service = \App\Models\Service::find($serviceId);
                      $quantity = old('quantities.' . $serviceId, 1);
                  @endphp
                  <li>{{ $service->name }} | (cena: {{ $service->price }})</li>
              @endforeach
          </ul>

          <p>Suma ceny: {{ old('total_price') }}</p>
          <p>Forma płatności: {{ old('pay_form') }}</p>

          <!-- Wyświetlanie innych informacji -->

          <!-- Formularz potwierdzenia rezerwacji -->
          <form method="POST" action="{{ route('reservation.store') }}">
              @csrf
              <!-- Ukryte pola formularza -->
              <input type="hidden" name="phone_number" value="{{ old('phone_number') }}">
              <input type="hidden" name="address" value="{{ old('address') }}">
              <input type="hidden" name="date" value="{{ old('date') }}">
              <input type="hidden" name="time" value="{{ old('time') }}">
              @foreach(old('services', []) as $serviceId)
                  <input type="hidden" name="services[]" value="{{ $serviceId }}">
                  @php
                      $quantity = old('quantities.' . $serviceId, 1);
                  @endphp
                  <input type="hidden" name="quantities[{{ $serviceId }}]" value="{{ $quantity }}">
              @endforeach
              <input type="hidden" name="total_price" value="{{ old('total_price') }}">
              <input type="hidden" name="pay_form" value="{{ old('pay_form') }}">

              <!-- Przycisk potwierdzenia rezerwacji -->
              <br>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Potwierdź rezerwację</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@include('shared.footer')
</body>

</html>
