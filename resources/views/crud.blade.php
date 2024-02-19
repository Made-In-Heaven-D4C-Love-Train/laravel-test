<html>
    <body>
        <form action="{{ url('/crud') }} " method="POST">
        @if(!isset($userUpdate))
        Nom : <input type="text" name="name"><br>
        Email : <input type="email" name="email"><br>
        Mot de passe : <input type="text" name="password">
        @else
        Nom : <input type="text" name="name" value="{{ $userUpdate->name }}"><br>
        Email : <input type="email" name="email" value="{{ $userUpdate->email }}"><br>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Envoyer</button>
        </form>
        @if(isset($userUpdate))
        <a href="{{ route('crud.delete', ['id' => $userUpdate->id] ) }}">Supprimer</a>
        @endif
        @if(isset($users))
            @foreach($users as $user)
                <p>Nom : {{ $user->name }}  </p>
                <p>Email : {{ $user->email }}</p>
                <a href="{{ route('crud', ['id' => $user->id] ) }}">Modifier</a>
        @endforeach
        @endif
        <?php
        // if(DB::connection()->getPdo())
        // {
        //     echo "Connexion ok =>". DB::connection()->getDatabaseName();
        // }
        ?>
    </body>
</html>