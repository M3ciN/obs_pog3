<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')

    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-black text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 ">Dodawanie</h2>
                <p class="text-white-50 mb-5">Dodajesz nową usługę</p>

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


          <form method="POST" action="{{ route('services.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
                  @csrf

                <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                    <label for="name">Nazwa:</label>
                    <input type="text" id="name" name="name" required class="form-control">
                </div>

                <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                    <label for="description">Opis:</label>
                    <textarea id="description" name="description" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                    <label for="email">Cena(zł):</label>
                    <input type="text" id="price" name="price" required class="form-control">
                </div>

                <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                    <label for="subcategory">Podkategoria:</label>
                    <select id="subcategory" name="subcategory_id" class="form-select">
                        <option value="">Wybierz podkategorię</option>
                        @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                    <label for="image">Zdjęcie:</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Dodaj usługę</button><br><br>

                <a href="javascript:history.go(-1)" class="btn btn-outline-danger btn-lg px-5">Anuluj</a>

            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    @include('shared.footer')
</body>

</html>
