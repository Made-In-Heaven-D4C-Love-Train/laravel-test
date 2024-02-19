<html>
    <body>
        <form action="{{ url('/') }} " method="POST">
        <input type="number" name="number" min="0" value="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Envoyer</button>
        </form>
        @if(isset($estPremier))
            @if($estPremier)
                <p>Le nombre {{ $nombre }} est premier.</p>
            @else
                <p>Le nombre {{ $nombre }} n'est pas premier.</p>
            @endif
        @endif
    </body>
</html>