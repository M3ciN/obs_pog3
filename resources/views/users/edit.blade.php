<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg">
    @include('shared.nav')

    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-black text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 ">Edytowanie</h2>
                <p class="text-white-50 mb-5">Edytujesz użytkownika o id {{ $user->id }}</p>

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


          <form method="POST" action="{{ route('users.update', $user->id) }}" class="needs-validation" novalidate>
                  @csrf
                  @method('PUT')
                <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                    <label for="name">Imię:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }} " class="form-control">
                </div>

                <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control">
                </div>

                <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                    <label for="password">Nowe hasło:</label>
                    <input type="password" id="password" name="password" value="{{ $user->password }}" class="form-control">
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Zapisz zmiany</button><br><br>
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
