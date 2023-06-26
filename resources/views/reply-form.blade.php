<form method="POST" action="{{ route('send.reply.email') }}">
    @csrf

    <!-- Ukryte pole z ID wiadomości -->
    <input type="hidden" name="message_id" value="{{ $message->id }}">

    <!-- Pozostałe pola formularza -->
    <div class="form-group">
        <label for="reply_message">Twoja odpowiedź</label>
        <textarea name="reply_message" id="reply_message" class="form-control" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Wyślij odpowiedź</button>
</form>
