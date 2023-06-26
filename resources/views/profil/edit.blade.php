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
          <h1>Edytuj swoje dane</h1>
          <form action="{{ route('profil.update') }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                <label for="name">Imię:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
              </div>
              <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
              </div>
              <!-- Pozostałe pola formularza -->
              <div class="form-outline form-white mb-4 col-md-8 mx-auto">
                <label for="password">Hasło:</label>
                <input type="password" id="password" name="password" value="{{ $user->password }}" class="form-control">
            </div>

              <button class="btn btn-outline-success btn-lg px-5" type="submit">Zapisz zmiany</button><br><br>
              <a href="javascript:history.go(-1)" class="btn btn-outline-danger btn-lg px-5">Anuluj</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@include('shared.footer')
</body>

</html>
