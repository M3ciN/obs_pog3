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

            <h2 class="fw-bold mb-2 ">Rezerwacja usług</h2>
            <p class="text-white-50 mb-5">Rezerwujesz usługi pogrzebowe</p>

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


      <form method="POST" action="{{ route('reservation.preview') }}" class="needs-validation" novalidate>
              @csrf

              <div class="form-outline form-white mb-4">
                <label for="phone_number">Numer telefonu:</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>

            <div class="form-outline form-white mb-4">
                <label for="address">Adres:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="row">
                <div class="form-outline form-white mb-4 col-md-6">
                    <label for="date">Data:</label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="form-outline form-white mb-4 col-md-6">
                    <label for="time">Godzina:</label>
                    <input type="time" name="time" class="form-control" required step="3600">
                </div>
            </div>
            @if ($errors->has('error'))
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
@endif

            <label for="services">Usługi:</label><br><br>
            <div class="form-outline form-white mb-4 catContainer">

                @foreach ($categories as $category)
        <h4>-{{ $category->name }}</h4>
        @foreach ($category->subcategories as $subcategory)
            <h5>{{ $subcategory->name }}</h5>
                @foreach ($subcategory->services as $service)
                    <div>
                        <label>
                            <input type="checkbox" name="services[]" value="{{ $service->id }}" data-price="{{ $service->price }}">
                            {{ $service->name }} | (Cena: {{ $service->price }})
                        </label>
                    </div>
                    <script>
                        console.log("Cena usługi: {{ $service->price }}");
                    </script>
                @endforeach
                        @endforeach
    @endforeach
            </div><br>
                <!-- Wyświetlanie sumy cen -->
            <div class="form-outline form-white mb-4">
                <label for="total_price">Suma ceny:</label>
                <input type="text" id="total_price" name="total_price" readonly >
            </div>

    <!-- Wybór formy płatności -->
            <div class="mb-3">
                <label for="pay_form" class="form-label">Forma płatności:</label>
                <select name="pay_form" id="pay_form">
                    <option value="gotówka">Gotówka</option>
                    {{-- <option value="online">Online</option> --}}
                </select>
            </div>

            <button class="btn btn-outline-light btn-lg px-5" type="submit">Podsumowanie</button>


        </div>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    function calculateTotalPrice() {
      let totalPrice = 0;
      const checkboxes = document.querySelectorAll('input[name="services[]"]:checked');

      checkboxes.forEach((checkbox) => {
        const price = parseFloat(checkbox.getAttribute('data-price'));
        if (!isNaN(price)) {
          totalPrice += price;
        }
      });

      // Ustawienie wartości sumy ceny usług w polu input
      document.getElementById('total_price').value = totalPrice.toFixed(2);
    }

    // Nasłuchiwanie zmian w checkboxach
    const checkboxes = document.querySelectorAll('input[name="services[]"]');
    checkboxes.forEach((checkbox) => {
      checkbox.addEventListener('change', calculateTotalPrice);
    });
    </script>



@include('shared.footer')
</body>

</html>
