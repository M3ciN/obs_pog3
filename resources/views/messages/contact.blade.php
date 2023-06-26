<!doctype html>
<html lang="en">
@include('shared.header')
<body background="/img/tlo.jpg" style="background-attachment: fixed">
    @include('shared.nav')
    <div class="container mt-5 text-white">
        <h1>Kontakt</h1>

        @if(session('message'))
            <p>{{ session('message') }}</p>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}">
            @csrf

            <label for="name">Imię:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>

            <label for="message">Wiadomość:</label>
            <textarea name="message" id="message" required></textarea>

            <button type="submit">Wyślij</button>
        </form>
    </div>
    @include('shared.footer')
</body>

</html>
